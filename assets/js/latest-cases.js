(function () {
  'use strict';

  var sec = document.getElementById('olc');
  if (!sec) return;

  /* ---------- Reveal on scroll ---------- */
  var reveals = [].slice.call(sec.querySelectorAll('.olc-reveal'));
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { e.target.classList.add('is-in'); io.unobserve(e.target); }
      });
    }, { threshold: 0, rootMargin: '0px 0px -50px 0px' });
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add('is-in'); });
  }

  /* ---------- Lightbox ---------- */
  var lb = document.getElementById('olcLb');
  var box = document.getElementById('olcLbBox');
  var img = document.getElementById('olcLbImg');
  var title = document.getElementById('olcLbTitle');
  var stage = document.getElementById('olcLbStage');

  // fixed positioning safe rakhne ke liye <body> mein shift
  document.body.appendChild(lb);

  var prevOverflow = '';

  function openLb(card) {
    var t = card.getAttribute('data-title') || '';
    img.src = card.getAttribute('data-popup');
    img.alt = t;
    title.textContent = t;
    box.classList.remove('is-zoomed');
    prevOverflow = document.body.style.overflow;
    document.body.style.overflow = 'hidden';
    lb.classList.add('is-open');
    lb.setAttribute('aria-hidden', 'false');
  }
  function closeLb() {
    lb.classList.remove('is-open');
    lb.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = prevOverflow;
  }

  [].slice.call(sec.querySelectorAll('.olc-card')).forEach(function (card) {
    card.addEventListener('click', function () { openLb(card); });
    card.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openLb(card); }
    });
  });

  [].slice.call(lb.querySelectorAll('[data-close]')).forEach(function (el) {
    el.addEventListener('click', closeLb);
  });
  // image area ke khali hisse par click = close
  stage.addEventListener('click', function (e) { if (e.target === stage) closeLb(); });

  document.getElementById('olcLbZoom').addEventListener('click', function () {
    box.classList.toggle('is-zoomed');
  });
  document.getElementById('olcLbFs').addEventListener('click', function () {
    if (document.fullscreenElement) document.exitFullscreen();
    else if (document.documentElement.requestFullscreen) document.documentElement.requestFullscreen();
  });
  document.getElementById('olcLbShare').addEventListener('click', function () {
    if (navigator.clipboard) navigator.clipboard.writeText(window.location.href);
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && lb.classList.contains('is-open')) closeLb();
  });
})();