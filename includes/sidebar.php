<?php
// includes/sidebar.php
// $currentPage must be set before including this file (e.g. 'index', 'about', 'editorial-board')
if (!isset($currentPage)) $currentPage = '';

function navLink($href, $label, $currentPage) {
    $page = basename($href, '.php');
    $active = ($page === $currentPage || $href === $currentPage) ? ' class="active"' : '';
    return "<li><a href=\"{$href}\"{$active}>{$label}</a></li>";
}

$aboutOpen = in_array($currentPage, ['about']) ? ' open' : '';
?>
    <aside class="left-sidebar">
      <nav class="snav">
        <ul>
          <?php echo navLink('index.php', 'Home', $currentPage); ?>
          <li class="has-sub<?php echo $aboutOpen; ?>">
            <a href="about.php">About Journal</a>
            <ul class="sub-menu">
              <li><a href="about.php"<?php echo ($currentPage==='about'?' class="active"':''); ?>>About GJMT</a></li>
              <li><a href="about.php#aim-scope">Aim &amp; Scope</a></li>
              <li><a href="about.php#particulars">Journal Particulars</a></li>
            </ul>
          </li>
          <?php echo navLink('advisory-board.php', 'Editorial Advisory Board', $currentPage); ?>
          <?php echo navLink('editorial-board.php', 'Editorial Board', $currentPage); ?>
          <?php echo navLink('author-guidelines.php', 'Guidelines for Authors', $currentPage); ?>
          <li><a href="downloads/Submission_Guidelines.pdf" target="_blank">Submission Guidelines &#8599;</a></li>
          <li><a href="downloads/Sample_Paper.pdf" target="_blank">Sample Paper &#8599;</a></li>
          <?php echo navLink('current-issue.php', 'Current Issue', $currentPage); ?>
          <?php echo navLink('archived-issues.php', 'Archived Issues', $currentPage); ?>
          <?php echo navLink('open-access.php', 'Open Access', $currentPage); ?>
          <?php echo navLink('review-policy.php', 'Peer Review &amp; Publication Policy', $currentPage); ?>
          <?php echo navLink('call-for-submissions.php', 'Call for Papers', $currentPage); ?>
          <?php echo navLink('ethical-guidelines.php', 'Ethic Policy', $currentPage); ?>
          <?php echo navLink('become-reviewer.php', 'Review for this Journal', $currentPage); ?>
          <?php echo navLink('contact.php', 'Contact the Editorial Team', $currentPage); ?>
        </ul>
      </nav>
    </aside>
