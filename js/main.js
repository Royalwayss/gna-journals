document.addEventListener('DOMContentLoaded', function () {

  /* ── Active link + auto-open parent sub-menu ── */
  var page = window.location.pathname.split('/').pop() || 'index.php';
  // strip query string
  page = page.split('?')[0];

  document.querySelectorAll('.snav a').forEach(function(a) {
    var href = (a.getAttribute('href') || '').split('#')[0].split('?')[0];
    if (href === page) a.classList.add('active');
  });

  document.querySelectorAll('.snav li.has-sub').forEach(function(li) {
    li.querySelectorAll('.sub-menu a').forEach(function(a) {
      var href = (a.getAttribute('href') || '').split('#')[0];
      if (href === page) {
        li.classList.add('open');
        a.classList.add('active');
      }
    });
  });

  /* ── Sub-menu toggle — stays open when active ── */
  document.querySelectorAll('.snav li.has-sub > a').forEach(function(a) {
    a.addEventListener('click', function(e) {
      var li = this.closest('li.has-sub');
      if (!li.classList.contains('open')) {
        e.preventDefault();
        li.classList.add('open');
      }
    });
  });

  /* ── Popup ── */
  var popup = document.getElementById('reviewerPopup');
  var popClose = document.getElementById('popupClose');
  if (popup && !sessionStorage.getItem('popupSeen')) {
    setTimeout(function() { popup.classList.add('active'); sessionStorage.setItem('popupSeen','1'); }, 1200);
    if (popClose) popClose.addEventListener('click', function() { popup.classList.remove('active'); });
    popup.addEventListener('click', function(e) { if (e.target===popup) popup.classList.remove('active'); });
    document.addEventListener('keydown', function(e) { if (e.key==='Escape') popup.classList.remove('active'); });
  }

  /* ── Banner close ── */
  var bc = document.getElementById('bannerClose'), bn = document.getElementById('reviewerBanner');
  if (bc && bn) bc.addEventListener('click', function() { bn.style.display='none'; });

  /* ── Smooth scroll ── */
  document.querySelectorAll('a[href^="#"]').forEach(function(a) {
    a.addEventListener('click', function(e) {
      var t = document.querySelector(this.getAttribute('href'));
      if (t) { e.preventDefault(); window.scrollTo({top: t.getBoundingClientRect().top + window.pageYOffset - 70, behavior:'smooth'}); }
    });
  });

  /* ── Scroll-in animation ── */
  var items = document.querySelectorAll('.board-card,.member-item,.article-row,.contact-card');
  if ('IntersectionObserver' in window && items.length) {
    items.forEach(function(el) { el.style.cssText += 'opacity:0;transform:translateY(10px);transition:opacity .32s ease,transform .32s ease;'; });
    var io = new IntersectionObserver(function(entries) {
      entries.forEach(function(en) { if (en.isIntersecting) { en.target.style.opacity='1'; en.target.style.transform='translateY(0)'; io.unobserve(en.target); } });
    }, {threshold:0.1});
    items.forEach(function(el) { io.observe(el); });
  }

  /* ── Accordion ── */
  document.querySelectorAll('.acc-header').forEach(function(btn) {
    btn.addEventListener('click', function() {
      var item = this.closest('.acc-item');
      var body = item.querySelector('.acc-body');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.acc-item').forEach(function(el) {
        el.classList.remove('open');
        el.querySelector('.acc-header').setAttribute('aria-expanded','false');
        el.querySelector('.acc-body').style.display='none';
      });
      if (!isOpen) { item.classList.add('open'); btn.setAttribute('aria-expanded','true'); body.style.display='block'; }
    });
  });
});
