<?php
$pageTitle   = 'Home';
$currentPage = 'index';
include 'includes/header.php';
?>

  <div class="site-body">
<?php include 'includes/sidebar.php'; ?>

    <main class="main-content">
<!-- Reviewer Popup Modal -->
      <div class="popup-overlay" id="reviewerPopup">
        <div class="popup-box">
          <button class="popup-close" id="popupClose" aria-label="Close">&times;</button>
          <img src="images/creative.jpg" alt="We are looking for Expert Peer Reviewers — GNA Journal">
        </div>
      </div>

      <h1 class="page-title">About Journal</h1>
      <p>The <em>GNA Journal of Management and Technology (GJMT)</em> previously known as GNA IMT is a double-blind peer-reviewed academic publication of GNA University, Punjab, India. It is dedicated to publishing scholarly work in areas such as management, business administration, information technology, entrepreneurship, and related disciplines.</p>
      <p>The journal features a variety of contributions, including research articles, review papers, case analyses, and conceptual studies that reflect current academic and industry perspectives.</p>
      <p>The GNA Journal of Management and Technology was originally established and published by GNA Institute of Management and Technology (GNA-IMT), Phagwara, Punjab, since the year 2007. In the year 2014, GNA-IMT was granted University status and was formally converted into GNA University, Phagwara, Punjab. Since then, all academic and research activities, including the publication of the journal, are being carried out under the name and authority of GNA University.</p>
      <p>Initially, the journal was published in print format only. However, keeping pace with the growing demand for digital access, the GNA Journal of Management and Technology has been made available in electronic format (e-print/soft copy) from the year 2019 onwards. All issues published from 2019 are accessible online in digital format, with each article available as an individually downloadable PDF file.</p>

      <h2>Aim &amp; Scope</h2>
      <p>The GNA Journal of Management and Technology (GJMT) operates as an open-access, bi-annual multidisciplinary journal published by S. Amar Singh Educational Charitable Trust. Its primary objective is to advance knowledge by encouraging the publication of innovative empirical and theoretical studies that strengthen academic understanding and practical applications in management and technology domains.</p>
      <p>The journal provides a platform for intellectual exchange by bringing together contributions from diverse fields such as engineering, sciences, social sciences, and management. It also supports scholarly engagement through book reviews and critical discussions addressing contemporary developments, emerging trends, and real-world challenges.</p>

      <p><strong>The following types of papers will be considered for publication:</strong></p>
      <ul>
        <li>Original research works, both theoretical &amp; empirical, in management science &amp; technology and related fields.</li>
        <li>Exhaustive surveys of literature of an upcoming new research area.</li>
        <li>Book review of a recently published, path-breaking book in management.</li>
      </ul>



      <!-- Reviewer Banner (inline) -->
      <div class="reviewer-banner" id="reviewerBanner">
        <div class="rb-text">
          <strong>We&#39;re Looking for Expert Peer Reviewers</strong>
          <span>GNA Journal of Management and Technology — Join our reviewer panel today</span>
        </div>
        <a href="become-reviewer.php" class="rb-btn">Learn More</a>
        <button class="rb-close" id="bannerClose" aria-label="Close">&times;</button>
      </div>
    </main>
  </div>

<?php include 'includes/footer.php'; ?>
