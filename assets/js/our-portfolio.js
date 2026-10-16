(function () {
  var root = document.getElementById('cvg-portfolio');
  if (!root) return;
  var tabs = root.querySelectorAll('.cvg-port-tab');
  var grid = root.querySelector('.cvg-port-grid');
  var items = Array.prototype.slice.call(root.querySelectorAll('.cvg-port-item'));
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var busy = false;

  /* ---------- Tab filter with fade ---------- */
  function show(cat) {
    if (busy) return;
    busy = true;
    grid.classList.add('cvg-port-grid--out');
    setTimeout(function () {
      grid.setAttribute('data-view', cat);
      var n = 0;
      items.forEach(function (it) {
        var on = it.getAttribute('data-cat') === cat;
        it.classList.toggle('cvg-port-hide', !on);
        it.classList.remove('cvg-port-in');
        if (on) it.style.setProperty('--cvg-d', (Math.min(n++, 11) * 0.05) + 's');
      });
      grid.classList.remove('cvg-port-grid--out');
      requestAnimationFrame(function () {
        items.forEach(function (it) { if (!it.classList.contains('cvg-port-hide')) it.classList.add('cvg-port-in'); });
      });
      busy = false;
    }, reduce ? 0 : 280);
  }
  tabs.forEach(function (t) {
    t.addEventListener('click', function () {
      if (t.classList.contains('cvg-port-tab--active')) return;
      tabs.forEach(function (x) {
        var on = x === t;
        x.classList.toggle('cvg-port-tab--active', on);
        x.setAttribute('aria-pressed', String(on));
      });
      show(t.getAttribute('data-filter'));
    });
  });
  items.forEach(function (it) { if (!it.classList.contains('cvg-port-hide')) it.classList.add('cvg-port-in'); });

  /* ---------- Website screenshots scroll on hover ---------- */
  items.forEach(function (it) {
    if (it.getAttribute('data-cat') !== 'web') return;
    var media = it.querySelector('.cvg-port-media');
    var img = it.querySelector('.cvg-port-img');
    function start() {
      var dist = img.offsetHeight - media.offsetHeight;
      if (dist <= 0 || reduce) return;
      img.style.transitionDuration = Math.min(Math.max(dist / 220, 2), 9) + 's';
      img.style.transform = 'translateY(' + (-dist) + 'px)';
    }
    function stop() {
      img.style.transitionDuration = '1s';
      img.style.transform = 'translateY(0)';
    }
    it.addEventListener('mouseenter', start);
    it.addEventListener('mouseleave', stop);
    it.addEventListener('focus', start);
    it.addEventListener('blur', stop);
  });

  /* ---------- Lightbox ---------- */
  var lb = root.querySelector('.cvg-port-lightbox');
  var lbImg = root.querySelector('.cvg-port-lb-img');
  var list = [], idx = 0, lastFocus = null;
  document.body.appendChild(lb);
  function visible() { return items.filter(function (it) { return !it.classList.contains('cvg-port-hide'); }); }
  function render() {
    var it = list[idx];
    lbImg.src = it.getAttribute('href');
    lbImg.alt = it.querySelector('.cvg-port-img').alt;
    lb.classList.toggle('cvg-port-lightbox--tall', it.getAttribute('data-cat') === 'web');
    lb.querySelector('.cvg-port-lb-stage').scrollTop = 0;
  }
  function open(it) {
    list = visible(); idx = list.indexOf(it); lastFocus = it;
    render();
    lb.hidden = false;
    requestAnimationFrame(function () { lb.classList.add('cvg-port-lightbox--open'); });
    document.documentElement.style.overflow = 'hidden';
    lb.querySelector('.cvg-port-lb-close').focus();
  }
  function close() {
    lb.classList.remove('cvg-port-lightbox--open');
    document.documentElement.style.overflow = '';
    setTimeout(function () { lb.hidden = true; lbImg.src = ''; }, reduce ? 0 : 250);
    if (lastFocus) lastFocus.focus();
  }
  function step(d) { idx = (idx + d + list.length) % list.length; render(); }
  items.forEach(function (it) {
    it.addEventListener('click', function (e) { e.preventDefault(); open(it); });
  });
  lb.querySelector('.cvg-port-lb-close').addEventListener('click', close);
  lb.querySelector('.cvg-port-lb-prev').addEventListener('click', function () { step(-1); });
  lb.querySelector('.cvg-port-lb-next').addEventListener('click', function () { step(1); });
  lb.addEventListener('click', function (e) { if (e.target === lb) close(); });
  document.addEventListener('keydown', function (e) {
    if (lb.hidden) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowRight') step(1);
    if (e.key === 'ArrowLeft') step(-1);
  });
})();
