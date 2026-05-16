<?php
// includes/footer.php
?>
  <footer>
    <div class="footer-inner">
      <div class="footer-brand">
        <img src="<?php echo $baseUrl ?? ''; ?>images/logo.png" alt="GNA University">
        <p>An open-access, peer-reviewed multidisciplinary academic journal dedicated to advancing knowledge in management, technology, and allied disciplines since 2007.</p>
      </div>
      <div class="footer-col">
        <h5>Quick Links</h5>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About GJMT</a></li>
          <li><a href="advisory-board.php">Editorial Advisory Board</a></li>
          <li><a href="editorial-board.php">Editorial Board</a></li>
          <li><a href="author-guidelines.php">Author Guidelines</a></li>
          <li><a href="current-issue.php">Current Issue</a></li>
          <li><a href="archived-issues.php">Archived Issues</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Contact</h5>
        <div class="footer-contact-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <span>GNA University, Sri Hargobindgarh, Phagwara-Hoshiarpur Road, Phagwara, Punjab 144401 (INDIA)</span>
        </div>
        <div class="footer-contact-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l.91-.91a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 21.73 16.92z"/></svg>
          <span>01824-504999 &nbsp;|&nbsp; +91 70873-02404</span>
        </div>
        <div class="footer-contact-item">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <a href="mailto:gna.journal@gnauniversity.edu.in">gna.journal@gnauniversity.edu.in</a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> GNA University. All rights reserved. Published by S. Amar Singh Charitable Trust, Jalandhar.</p>
      <div class="footer-issn"><strong>ISSN:</strong> 0974-5726</div>
    </div>
  </footer>
  <script src="<?php echo $baseUrl ?? ''; ?>js/main.js"></script>
</body>
</html>
