/* Creative Converge — About Us page interactions (no libraries) */
(function () {
  var root = document.getElementById('cvg-about-page');
  if (!root) return;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Background video: pause button + respect reduced motion ---------- */
  var heroVideo = root.querySelector('.cvg-ab-hero-video');
  var toggle = root.querySelector('.cvg-ab-video-toggle');
  function setPaused(paused) {
    if (!heroVideo) return;
    if (paused) heroVideo.pause(); else { var p = heroVideo.play(); if (p && p.catch) p.catch(function () {}); }
    if (toggle) {
      toggle.setAttribute('aria-pressed', String(paused));
      toggle.setAttribute('aria-label', paused ? 'Play background video' : 'Pause background video');
    }
  }
  if (toggle) toggle.addEventListener('click', function () { setPaused(!heroVideo.paused); });
  if (reduce) {
    setPaused(true);
    root.querySelectorAll('video').forEach(function (v) { v.removeAttribute('autoplay'); v.pause(); });
  }

  /* Pause the section video while it is off screen (saves battery) */
  if ('IntersectionObserver' in window && !reduce) {
    var vio = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        var v = e.target;
        if (v === heroVideo && toggle && toggle.getAttribute('aria-pressed') === 'true') return;
        if (e.isIntersecting) { var p = v.play(); if (p && p.catch) p.catch(function () {}); } else { v.pause(); }
      });
    }, { threshold: 0.1 });
    root.querySelectorAll('video').forEach(function (v) { vio.observe(v); });
  }

  if (reduce || !('IntersectionObserver' in window)) {
    root.querySelectorAll('[data-cvg-count]').forEach(function (el) { el.textContent = el.getAttribute('data-cvg-count'); });
    return;
  }

  /* ---------- Intro + scroll reveals ---------- */
  root.classList.add('cvg-ab--js');
  requestAnimationFrame(function () { requestAnimationFrame(function () { root.classList.add('cvg-ab--ready'); }); });

  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) { e.target.classList.add('cvg-ab-in'); io.unobserve(e.target); }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
  root.querySelectorAll('.cvg-ab-reveal').forEach(function (el) { io.observe(el); });

  /* ---------- Counting numbers ---------- */
  function count(el) {
    var target = parseInt(el.getAttribute('data-cvg-count'), 10) || 0, start = null;
    function step(ts) {
      if (!start) start = ts;
      var k = Math.min((ts - start) / 1800, 1);
      el.textContent = Math.round(target * (1 - Math.pow(1 - k, 4)));
      if (k < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }
  var cio = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) { if (e.isIntersecting) { count(e.target); cio.unobserve(e.target); } });
  }, { threshold: 0.6 });
  root.querySelectorAll('[data-cvg-count]').forEach(function (el) { cio.observe(el); });
})();