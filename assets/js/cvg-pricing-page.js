/* Creative Converge — Pricing page interactions (no libraries) */
(function () {
  var root = document.getElementById('cvg-pricing-page');
  if (!root) return;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Tabs (click, arrow keys, and #web style links) ---------- */
  var tabs = Array.prototype.slice.call(root.querySelectorAll('.cvg-pp-tab'));
  var panels = Array.prototype.slice.call(root.querySelectorAll('.cvg-pp-panel'));

  function activate(tab, focus, updateHash) {
    var key = tab.getAttribute('data-key');
    tabs.forEach(function (t) {
      var on = t === tab;
      t.classList.toggle('is-active', on);
      t.setAttribute('aria-selected', String(on));
      t.setAttribute('tabindex', on ? '0' : '-1');
    });
    panels.forEach(function (p) {
      var on = p.id === 'cvg-pp-panel-' + key;
      p.hidden = !on;
      p.classList.toggle('is-active', on);
      p.classList.remove('is-entering');
      if (on && !reduce) { void p.offsetWidth; p.classList.add('is-entering'); }
    });
    if (focus) tab.focus();
    tab.scrollIntoView({ block: 'nearest', inline: 'center', behavior: reduce ? 'auto' : 'smooth' });
    if (updateHash && history.replaceState) history.replaceState(null, '', '#' + key);
  }

  tabs.forEach(function (t, i) {
    t.addEventListener('click', function () { activate(t, false, true); });
    t.addEventListener('keydown', function (e) {
      var n = null;
      if (e.key === 'ArrowRight') n = tabs[(i + 1) % tabs.length];
      if (e.key === 'ArrowLeft') n = tabs[(i - 1 + tabs.length) % tabs.length];
      if (e.key === 'Home') n = tabs[0];
      if (e.key === 'End') n = tabs[tabs.length - 1];
      if (n) { e.preventDefault(); activate(n, true, true); }
    });
  });

  /* Open a tab from the URL, e.g. pricing/#web or pricing/#combo */
  function fromHash() {
    var hash = (location.hash || '').replace('#', '');
    var t = tabs.filter(function (x) { return x.getAttribute('data-key') === hash; })[0];
    if (t) {
      activate(t, false, false);
      var sec = document.getElementById('cvg-pp-packages');
      if (sec) sec.scrollIntoView({ behavior: reduce ? 'auto' : 'smooth' });
    }
  }
  fromHash();
  window.addEventListener('hashchange', fromHash);

  /* ---------- "+ more features" toggles ---------- */
  root.querySelectorAll('.cvg-pp-more').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var card = btn.closest('.cvg-pp-card');
      var open = card.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', String(open));
      btn.textContent = open ? '− Show less' : btn.getAttribute('data-more');
    });
  });

  /* ---------- Accordion ---------- */
  var accItems = Array.prototype.slice.call(root.querySelectorAll('.cvg-pp-acc-item'));
  accItems.forEach(function (item) {
    var btn = item.querySelector('button');
    btn.addEventListener('click', function () {
      var willOpen = !item.classList.contains('is-open');
      accItems.forEach(function (o) { o.classList.remove('is-open'); o.querySelector('button').setAttribute('aria-expanded', 'false'); });
      if (willOpen) { item.classList.add('is-open'); btn.setAttribute('aria-expanded', 'true'); }
    });
  });

  /* ---------- Quote form: basic check before sending ---------- */
  var form = root.querySelector('.cvg-pp-form');
  if (form) {
    var err = form.querySelector('.cvg-pp-form-error');
    form.addEventListener('submit', function (e) {
      var name = form.elements.name.value.trim();
      var email = form.elements.email.value.trim();
      var ok = name !== '' && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
      if (!ok) { e.preventDefault(); err.hidden = false; (name ? form.elements.email : form.elements.name).focus(); return; }
      err.hidden = true;
      if (form.getAttribute('action') === '#') {   /* no handler connected yet */
        e.preventDefault();
        form.reset();
        var msg = form.querySelector('.cvg-pp-form-ok') || document.createElement('p');
        msg.className = 'cvg-pp-form-ok'; msg.setAttribute('role', 'status');
        msg.textContent = 'Thanks! We will get back to you within one business day.';
        form.appendChild(msg);
      }
    });
    form.addEventListener('input', function () { err.hidden = true; });
  }

  /* ---------- Reveal on scroll ---------- */
  if (reduce || !('IntersectionObserver' in window)) return;
  root.classList.add('cvg-pp--js');
  requestAnimationFrame(function () { requestAnimationFrame(function () { root.classList.add('cvg-pp--ready'); }); });
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-in'); io.unobserve(en.target); } });
  }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });
  root.querySelectorAll('.cvg-pp-rv').forEach(function (el) { io.observe(el); });
})();
