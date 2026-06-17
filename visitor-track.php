<?php
// save_visitor.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once('includes/config.php');

// ── Helper: detect device type from User-Agent ──
function getDevice($ua) {
    if (preg_match('/Mobile|Android|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i', $ua)) {
        return 'Mobile';
    } elseif (preg_match('/iPad|Tablet/i', $ua)) {
        return 'Tablet';
    }
    return 'Desktop';
}

// ── Helper: detect OS from User-Agent ──
function getOS($ua) {
    if (preg_match('/Windows NT 10/i', $ua))      return 'Windows 10/11';
    if (preg_match('/Windows NT 6.3/i', $ua))     return 'Windows 8.1';
    if (preg_match('/Windows NT 6.1/i', $ua))     return 'Windows 7';
    if (preg_match('/Windows/i', $ua))             return 'Windows';
    if (preg_match('/Mac OS X/i', $ua))            return 'macOS';
    if (preg_match('/Android/i', $ua))             return 'Android';
    if (preg_match('/iPhone|iPad|iPod/i', $ua))    return 'iOS';
    if (preg_match('/Linux/i', $ua))               return 'Linux';
    return 'Unknown';
}

// ── Helper: detect Browser from User-Agent ──
function getBrowser($ua) {
    if (preg_match('/Edg\//i', $ua))               return 'Microsoft Edge';
    if (preg_match('/OPR|Opera/i', $ua))           return 'Opera';
    if (preg_match('/Chrome/i', $ua))              return 'Chrome';
    if (preg_match('/Firefox/i', $ua))             return 'Firefox';
    if (preg_match('/Safari/i', $ua))              return 'Safari';
    if (preg_match('/MSIE|Trident/i', $ua))        return 'Internet Explorer';
    return 'Unknown';
}

// ── Get real IP (handles proxies) ──
function getRealIP1() {
  
	foreach (['HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','REMOTE_ADDR'] as $key) {
        if (!empty($_SERVER[$key])) {
            $ip = trim(explode(',', $_SERVER[$key])[0]);
            if (filter_var($ip, FILTER_VALIDATE_IP)) return $ip;
        }
    }
    return '0.0.0.0';
}
function getRealIP() {
if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        return $_SERVER['HTTP_CF_CONNECTING_IP'];
    }

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    }

    return $_SERVER['REMOTE_ADDR'];
}



// ── Accept only POST ──
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
   // http_response_code(405);
    //echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
   // exit;
}

// ── Read JSON body sent from JS ──
$data = json_decode(file_get_contents('php://input'), true);

$ua            = $_SERVER['HTTP_USER_AGENT'] ?? '';
$ip            = getRealIP();
if (strpos($ip, '2401:4900') !== false || strpos($ip, '*') !== false) { $ip = '';  echo json_encode(['status' => 'success']); die();} 
$referrer      = isset($data['referrer'])      ? substr($data['referrer'], 0, 500)  : null;
$page_url      = isset($data['page_url'])      ? substr($data['page_url'], 0, 500)  : null;
$screen_width  = isset($data['screen_width'])  ? (int)$data['screen_width']         : null;
$screen_height = isset($data['screen_height']) ? (int)$data['screen_height']        : null;
$browser       = getBrowser($ua);
$os            = getOS($ua);
$device        = getDevice($ua);

// ── Geo lookup via cURL (more reliable than file_get_contents) ──
function getGeoData($ip) {
    $result = ['country' => null, 'city' => null];

    if (!function_exists('curl_init')) return $result;

    // Try ip-api.com first (free, no key needed, 45 req/min)
    $ch = curl_init("http://ip-api.com/json/{$ip}?fields=status,country,city");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 3,       // max 3 seconds
        CURLOPT_CONNECTTIMEOUT => 2,
        CURLOPT_FOLLOWLOCATION => true,
    ]);
    $response = curl_exec($ch);
    $err      = curl_errno($ch);
    curl_close($ch);

    if (!$err && $response) {
        $geo = json_decode($response, true);
        if (isset($geo['status']) && $geo['status'] === 'success') {
            $result['country'] = $geo['country'] ?? null;
            $result['city']    = $geo['city']    ?? null;
            return $result;
        }
    }

    // Fallback: ipinfo.io (free up to 50k/month, no key needed)
    $ch2 = curl_init("https://ipinfo.io/{$ip}/json");
    curl_setopt_array($ch2, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 3,
        CURLOPT_CONNECTTIMEOUT => 2,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTPHEADER     => ['Accept: application/json'],
    ]);
    $response2 = curl_exec($ch2);
    $err2      = curl_errno($ch2);
    curl_close($ch2);

    if (!$err2 && $response2) {
        $geo2 = json_decode($response2, true);
        if (!empty($geo2['country'])) {
            $result['country'] = $geo2['country'] ?? null; // returns country code e.g. "IN"
            $result['city']    = $geo2['city']    ?? null;
        }
    }

    return $result;
}

$country = null;
$city    = null;
$localIPs = ['127.0.0.1', '::1', '0.0.0.0','2401:4900:9154:5dd0:d470:6101:4d96:92981'];


//if (!in_array($ip, $localIPs) && filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)) {
    $geo     = getGeoData($ip);
    $country = $geo['country'];
    $city    = $geo['city'];

$visited_at = date('Y-m-d H:i:s');
// ── Insert into DB ──
$stmt = $conn->prepare(
    "INSERT INTO visitors (ip_address, country, city, browser, os, device, referrer, page_url, screen_width, screen_height, visited_at)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    'ssssssssiis',
    $ip, $country, $city, $browser, $os, $device,
    $referrer, $page_url, $screen_width, $screen_height, $visited_at
);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Insert failed']);
}



$stmt->close();
$conn->close();

//}
