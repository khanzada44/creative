(function () {
  'use strict';

  var sec = document.getElementById('wcu');
  if (!sec) return;

  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var reveals = [].slice.call(sec.querySelectorAll('.wcu-reveal'));
  var enters  = [].slice.call(sec.querySelectorAll('.wcu-enter'));
  var counts  = [].slice.call(sec.querySelectorAll('.wcu-count'));
  var pars    = [].slice.call(sec.querySelectorAll('.wcu-par'));

  /* ---------- helpers ---------- */
  function clamp(v, a, b) { return Math.min(b, Math.max(a, v)); }

  // cubic-bezier(x1,y1,x2,y2) easing (bisection)
  function bezier(x1, y1, x2, y2) {
    return function (t) {
      if (t <= 0) return 0;
      if (t >= 1) return 1;
      var lo = 0, hi = 1, m, x;
      for (var i = 0; i < 24; i++) {
        m = (lo + hi) / 2;
        x = 3 * (1 - m) * (1 - m) * m * x1 + 3 * (1 - m) * m * m * x2 + m * m * m;
        if (x < t) lo = m; else hi = m;
      }
      m = (lo + hi) / 2;
      return 3 * (1 - m) * (1 - m) * m * y1 + 3 * (1 - m) * m * m * y2 + m * m * m;
    };
  }

  /* ---------- 3) counter ---------- */
  var easeCount = bezier(0.22, 1, 0.36, 1);
  function runCount(el) {
    var to = parseInt(el.getAttribute('data-to'), 10) || 0;
    if (reduce) { el.textContent = to; return; }
    var dur = 2000, start = null;
    function step(ts) {
      if (start === null) start = ts;
      var p = Math.min(1, (ts - start) / dur);
      el.textContent = Math.round(to * easeCount(p));
      if (p < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  /* ---------- 1,2,3) once-in-view observers ---------- */
  function onceInView(list, bottomMargin, cb) {
    if (!('IntersectionObserver' in window)) { list.forEach(cb); return; }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) { cb(e.target); io.unobserve(e.target); }
      });
    }, { threshold: 0, rootMargin: '0px 0px -' + bottomMargin + 'px 0px' });
    list.forEach(function (el) { io.observe(el); });
  }

  onceInView(reveals, 50, function (el) { el.classList.add('is-in'); });
  onceInView(enters,  60, function (el) { el.classList.add('is-in'); });
  onceInView(counts,  80, runCount);

  /* ---------- 4) scroll parallax + spring ---------- */
  var R = 45;                     // right column ka final drop (px)
  var stops = [0, 0.45, 1];
  var cfg = [
    { axis: 'x', v: [120, 0, 0] },     // card 1
    { axis: 'y', v: [-140, R, R] },    // card 2
    { axis: 'x', v: [220, 0, 0] },     // card 3
    { axis: 'y', v: [150, R, R] }      // card 4
  ];

  function interp(p, v) {              // stops [0,.45,1] par linear interpolation
    if (p <= stops[1]) return v[0] + (v[1] - v[0]) * (p / stops[1]);
    return v[1] + (v[2] - v[1]) * ((p - stops[1]) / (stops[2] - stops[1]));
  }

  var mq = window.matchMedia('(min-width: 640px)');
  function isWide() { return mq.matches && !reduce; }

  function apply(p) {
    var wide = isWide();
    pars.forEach(function (el) {
      var c = cfg[parseInt(el.getAttribute('data-par'), 10)];
      if (!c || !wide) { el.style.transform = ''; return; }
      var val = interp(p, c.v).toFixed(2);
      el.style.transform = c.axis === 'x'
        ? 'translate3d(' + val + 'px,0,0)'
        : 'translate3d(0,' + val + 'px,0)';
    });
  }

  // scrollYProgress: offset ["start end", "end start"]
  function progress() {
    var r = sec.getBoundingClientRect(), vh = window.innerHeight;
    return clamp((vh - r.top) / (vh + r.height), 0, 1);
  }

  // spring (framer: stiffness 70, damping 24, mass .5)
  var K = 70, C = 24, M = 0.5;
  var target = progress(), pos = target, vel = 0, raf = 0, last = 0;

  function tick(now) {
    var dt = Math.min((now - last) / 1000, 1 / 30);
    last = now;
    var a = (K * (target - pos) - C * vel) / M;
    vel += a * dt;
    pos += vel * dt;
    apply(pos);
    if (Math.abs(target - pos) < 0.0005 && Math.abs(vel) < 0.001) {
      pos = target; apply(pos); raf = 0; return;
    }
    raf = requestAnimationFrame(tick);
  }
  function kick() {
    target = progress();
    if (!raf) { last = performance.now(); raf = requestAnimationFrame(tick); }
  }

  apply(pos);
  window.addEventListener('scroll', kick, { passive: true });
  window.addEventListener('resize', kick);
  if (mq.addEventListener) mq.addEventListener('change', kick);
})();