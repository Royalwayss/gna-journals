/* ============================================================
   GNA Journal of Management and Technology
   Main JavaScript
============================================================ */

document.addEventListener('DOMContentLoaded', function () {

  /* ── Mobile menu toggle ── */
  const hamburger = document.querySelector('.nav-hamburger');
  const mobileMenu = document.querySelector('.mobile-menu');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function () {
      mobileMenu.classList.toggle('open');
      const isOpen = mobileMenu.classList.contains('open');
      hamburger.setAttribute('aria-expanded', isOpen);

      // Animate bars
      const bars = hamburger.querySelectorAll('span');
      if (isOpen) {
        bars[0].style.transform = 'translateY(7px) rotate(45deg)';
        bars[1].style.opacity   = '0';
        bars[2].style.transform = 'translateY(-7px) rotate(-45deg)';
      } else {
        bars[0].style.transform = '';
        bars[1].style.opacity   = '';
        bars[2].style.transform = '';
      }
    });

    // Close menu on outside click
    document.addEventListener('click', function (e) {
      if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
        mobileMenu.classList.remove('open');
        hamburger.querySelectorAll('span').forEach(b => {
          b.style.transform = '';
          b.style.opacity   = '';
        });
      }
    });
  }

  /* ── Active nav link highlight ── */
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-center a, .mobile-menu a').forEach(function (link) {
    const href = link.getAttribute('href');
    if (href && href === currentPage) {
      link.classList.add('active');
    }
  });

  /* ── Smooth scroll for anchor links ── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 80; // navbar height
        const top = target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  /* ── Scroll-reveal: fade cards in on scroll ── */
  const revealItems = document.querySelectorAll(
    '.board-card, .member-card, .patron-card, .aim-cover-card'
  );

  if ('IntersectionObserver' in window && revealItems.length) {
    // Set initial hidden state
    revealItems.forEach(function (el) {
      el.style.opacity    = '0';
      el.style.transform  = 'translateY(20px)';
      el.style.transition = 'opacity 0.45s ease, transform 0.45s ease';
    });

    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.style.opacity   = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    revealItems.forEach(function (el) { observer.observe(el); });
  }

  /* ── Navbar shadow on scroll ── */
  const navEl = document.querySelector('nav');
  if (navEl) {
    window.addEventListener('scroll', function () {
      if (window.scrollY > 10) {
        navEl.style.boxShadow = '0 4px 24px rgba(0,0,0,0.15)';
      } else {
        navEl.style.boxShadow = '0 2px 16px rgba(0,0,0,0.1)';
      }
    });
  }

});
