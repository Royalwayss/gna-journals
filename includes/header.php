<?php
// includes/header.php
// Usage: include 'includes/header.php'; at top of each page
// $pageTitle must be set before including this file
if (!isset($pageTitle)) $pageTitle = 'GNA Journal of Management and Technology';
$baseUrl = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?> — GNA Journal of Management and Technology</title>
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo $baseUrl; ?>css/style.css">
</head>
<body>

  <header class="site-header">
    <div class="header-inner">
      <a href="<?php echo $baseUrl; ?>index.php" class="logo">
        <img src="<?php echo $baseUrl; ?>images/logo.png" alt="GNA University">
      </a>
      <div class="journal-name">
        <h1>GNA Journal of Management and Technology <span class="gjmt-abbr">(GJMT)</span></h1>
      </div>
    </div>
  </header>
