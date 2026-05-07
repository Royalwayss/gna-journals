<!-- ══════════════════════════════════════
     NAVBAR
══════════════════════════════════════ -->
<nav>
  <a href="<?php echo $homeURL; ?>" class="logo">
    <img src="images/gna_university_logo.png" alt="GNA University">
  </a>

  <ul class="nav-center">
    <li><a href="<?php echo $homeURL; ?>" class="active">Home</a></li>

    <li>
      <a href="#" >For Authors
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
      </a>
      <div class="dropdown">
        <a target="_blank" href="pdf/Guidelines-for-Authors-2026.pdf">Guidelines for Authors</a>
        <a target="_blank" href="pdf/GJMT_Copyright_Form_v2.pdf">Author Declaration &amp; Copyright Form</a>
      </div>
    </li>

    <li>
      <a href="#">Board Members
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"/></svg>
      </a>
      <div class="dropdown">
        <a href="editorial-board.php">Editorial Board</a>
        <a href="advisory-board.php">Advisory Board</a>
      </div>
    </li>

    <li><a href="volume.php">Volume</a></li>
  </ul>

  <button class="nav-hamburger" aria-label="Toggle menu" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu">
  <a href="<?php echo $homeURL; ?>">Home</a>
  <a href="#">For Authors</a>
  <a target="_blank" href="pdf/Guidelines-for-Authors-2026.pdf" class="sub">Guidelines for Authors</a>
  <a target="_blank" href="pdf/GJMT_Copyright_Form_v2.pdf" class="sub">Author Declaration &amp; Copyright Form</a>
  <a href="#">Board Members</a>
  <a href="editorial-board.php" class="sub">Editorial Board</a>
  <a href="advisory-board.php" class="sub">Advisory Board</a>
  <a href="volume.php">Volume</a>
</div>