/* Creative Converge — ecommerce landing page interactions */
(function () {
  'use strict';

  /* ---------- Marketplace tabs ---------- */
  var tabs = Array.prototype.slice.call(document.querySelectorAll('[data-tab]'));
  function selectTab(i, focus) {
    tabs.forEach(function (t, k) {
      var on = k === i;
      t.setAttribute('aria-selected', on ? 'true' : 'false');
      t.tabIndex = on ? 0 : -1;
      var panel = document.getElementById(t.getAttribute('aria-controls'));
      if (panel) panel.hidden = !on; // showing a panel restarts its scene animations
    });
    if (focus) tabs[i].focus();
  }
  tabs.forEach(function (t, i) {
    t.addEventListener('click', function () { selectTab(i); });
    t.addEventListener('keydown', function (e) {
      if (e.key === 'ArrowRight') { e.preventDefault(); selectTab((i + 1) % tabs.length, true); }
      if (e.key === 'ArrowLeft') { e.preventDefault(); selectTab((i - 1 + tabs.length) % tabs.length, true); }
    });
  });

  /* ---------- FAQ: one answer open at a time ---------- */
  var faqBtns = Array.prototype.slice.call(document.querySelectorAll('[data-faq]'));
  function setFaq(btn, open) {
    btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    var icon = btn.querySelector('.cc-faq-ic');
    if (icon) icon.textContent = open ? '−' : '+';
    var answer = document.getElementById(btn.getAttribute('aria-controls'));
    if (answer) answer.hidden = !open;
  }
  faqBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var willOpen = btn.getAttribute('aria-expanded') !== 'true';
      faqBtns.forEach(function (b) { setFaq(b, false); });
      if (willOpen) setFaq(btn, true);
    });
  });

  /* ---------- Forms ----------
     Set FORM_ENDPOINT to your form handler (Formspree, your PHP mailer, a CRM webhook).
     Left empty, the forms validate and show a thank-you message without sending. */
  var FORM_ENDPOINT = '';

 Array.prototype.forEach.call(
  document.querySelectorAll('[data-cc-form]'),
  function (form) {
    var status = document.createElement('p');
    status.className = 'cc-form-status';
    status.setAttribute('role', 'status');
    form.appendChild(status);

    var email = form.querySelector('input[type="email"]');
    if (email) email.required = true;

    var name = form.querySelector('input[name="name"]');
    if (name) name.required = true;

    form.addEventListener('submit', function (e) {
      status.classList.remove('is-err');

      if (!form.checkValidity()) {
        e.preventDefault();
        form.reportValidity();
        return;
      }

      var button = form.querySelector('[type="submit"]');

      if (button) button.disabled = true;

      status.textContent = 'Sending your request...';

      // Valid form: normal POST to email.php
      // No preventDefault(), no fetch(), no AJAX.
    });
  }
);
})();


/* ---------- Pricing slider (cvg-pp) ---------- */
(function () {
  'use strict';
  var track = document.querySelector('[data-pp-track]');
  if (!track) return;
  var cards = Array.prototype.slice.call(track.children);
  var prev = document.querySelector('[data-pp-prev]');
  var next = document.querySelector('[data-pp-next]');
  var dots = Array.prototype.slice.call(document.querySelectorAll('[data-pp-dot]'));

  function step() {
    var gap = parseFloat(getComputedStyle(track).columnGap) || 22;
    return cards[0].getBoundingClientRect().width + gap;
  }
  function update() {
    var max = track.scrollWidth - track.clientWidth;
    var i = Math.round(track.scrollLeft / step());
    if (track.scrollLeft >= max - 4) i = cards.length - 1;
    dots.forEach(function (d, k) { d.setAttribute('aria-current', k === i ? 'true' : 'false'); });
    if (prev) prev.disabled = track.scrollLeft <= 4;
    if (next) next.disabled = track.scrollLeft >= max - 4;
  }
  if (prev) prev.addEventListener('click', function () { track.scrollBy({ left: -step() }); });
  if (next) next.addEventListener('click', function () { track.scrollBy({ left: step() }); });
  dots.forEach(function (d, k) {
    d.addEventListener('click', function () { track.scrollTo({ left: cards[k].offsetLeft - cards[0].offsetLeft }); });
  });
  track.addEventListener('scroll', function () { requestAnimationFrame(update); }, { passive: true });
  window.addEventListener('resize', update);
  update();

  /* fade the bottom of a feature list only when it has more to scroll */
  Array.prototype.forEach.call(track.querySelectorAll('.cvg-pp-list'), function (list) {
    list.classList.toggle('is-scroll', list.scrollHeight > list.clientHeight + 2);
  });
})();

/* ---------- "Chat Now" buttons ----------
   Opens your live chat if the page has one (openLiveChat), otherwise goes to the audit form. */
Array.prototype.forEach.call(document.querySelectorAll('[data-chat]'), function (btn) {
  btn.addEventListener('click', function () {
    if (typeof window.openLiveChat === 'function') { window.openLiveChat(); return; }
    var form = document.getElementById('audit');
    if (form) form.scrollIntoView({ behavior: 'smooth' });
  });
});


/* =====================================================================
   Offer widgets: countdown, offer dock, popup, card tilt, confetti
   ===================================================================== */
(function () {
  'use strict';
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  function store(kind) { try { return window[kind]; } catch (e) { return null; } }
  var session = store('sessionStorage');

  /* ---------- Countdown to the end of this week (Sunday 23:59:59, visitor's time) ---------- */
  function weekEnd() {
    var d = new Date();
    var end = new Date(d.getFullYear(), d.getMonth(), d.getDate() + ((7 - d.getDay()) % 7), 23, 59, 59);
    return end;
  }
  var end = weekEnd();
  var full = document.querySelectorAll('[data-countdown]');
  var short = document.querySelectorAll('[data-cd-short]');
  function pad(n) { return (n < 10 ? '0' : '') + n; }
  function tick() {
    var left = Math.max(0, end - new Date());
    if (left === 0) { end = new Date(end.getTime() + 7 * 864e5); left = end - new Date(); }
    var s = Math.floor(left / 1000);
    var d = Math.floor(s / 86400), h = Math.floor(s % 86400 / 3600), m = Math.floor(s % 3600 / 60), sec = s % 60;
    Array.prototype.forEach.call(full, function (el) {
      var set = function (k, v) { var b = el.querySelector('[data-cd="' + k + '"]'); if (b) b.textContent = pad(v); };
      set('d', d); set('h', h); set('m', m); set('s', sec);
    });
    var txt = (d ? d + 'd ' : '') + pad(h) + 'h ' + pad(m) + 'm ' + pad(sec) + 's';
    Array.prototype.forEach.call(short, function (el) { el.textContent = txt; });
  }
  tick();
  setInterval(tick, 1000);

  /* ---------- Floating offer dock: shows after the hero, hides near the pricing and forms ---------- */
  var dock = document.querySelector('[data-dock]');
  var dockClosed = session && session.getItem('ccDockClosed') === '1';
  var hideNear = ['budget', 'cvg-pp-packages', 'audit'].map(function (id) { return document.getElementById(id); }).filter(Boolean);
  function inView(el) { var r = el.getBoundingClientRect(); return r.top < window.innerHeight * 0.8 && r.bottom > window.innerHeight * 0.2; }
  function dockUpdate() {
    if (!dock || dockClosed) return;
    var show = window.scrollY > 700 && !hideNear.some(inView);
    dock.hidden = !show;
  }
  if (dock) {
    window.addEventListener('scroll', function () { requestAnimationFrame(dockUpdate); }, { passive: true });
    dockUpdate();
    var x = dock.querySelector('[data-dock-close]');
    if (x) x.addEventListener('click', function () {
      dockClosed = true; dock.hidden = true;
      try { session.setItem('ccDockClosed', '1'); } catch (e) {}
    });
  }

  /* ---------- Offer popup: once per visit, after 18 seconds or when the mouse leaves the page ---------- */
  var pop = document.querySelector('[data-pop]');
  if (pop && typeof pop.showModal === 'function') {
    var shown = false;
    try { shown = session && session.getItem('ccPopShown') === '1'; } catch (e) {}
    var open = function () {
      if (shown || pop.open || document.querySelector('dialog[open]')) return;
      shown = true;
      try { session.setItem('ccPopShown', '1'); } catch (e) {}
      pop.showModal();
    };
    var timer = setTimeout(open, 18000);
    document.addEventListener('mouseout', function (e) {
      if (!e.relatedTarget && e.clientY <= 0) open();
    });
    Array.prototype.forEach.call(pop.querySelectorAll('[data-pop-close]'), function (b) {
      b.addEventListener('click', function () { pop.close(); });
    });
    pop.addEventListener('click', function (e) { if (e.target === pop) pop.close(); });
    pop.addEventListener('cc:sent', function () { setTimeout(function () { pop.close(); }, 1800); });
    pop.addEventListener('close', function () { clearTimeout(timer); });
  }

  /* ---------- 3D tilt on pricing cards ---------- */
  if (!reduce && window.matchMedia('(hover: hover)').matches) {
    Array.prototype.forEach.call(document.querySelectorAll('.cvg-pp-card'), function (card) {
      card.addEventListener('pointermove', function (e) {
        var r = card.getBoundingClientRect();
        var px = (e.clientX - r.left) / r.width - 0.5, py = (e.clientY - r.top) / r.height - 0.5;
        card.style.transform = 'perspective(900px) rotateY(' + (px * 8).toFixed(2) + 'deg) rotateX(' + (-py * 8).toFixed(2) + 'deg) translateY(-8px)';
      });
      card.addEventListener('pointerleave', function () { card.style.transform = ''; });
    });
  }

  /* ---------- Confetti burst (used when a form is sent) ---------- */
  window.ccConfetti = function (from) {
    if (reduce) return;
    var r = from.getBoundingClientRect();
    var cx = r.left + r.width / 2, cy = r.top + r.height / 2;
    var colors = ['#1fd6d8', '#ff5e5b', '#7c5cff', '#ffd23f', '#ffffff'];
    for (var i = 0; i < 40; i++) {
      var p = document.createElement('span');
      p.className = 'cc-burst-piece';
      p.style.left = cx + 'px'; p.style.top = cy + 'px';
      p.style.background = colors[i % colors.length];
      document.body.appendChild(p);
      var ang = Math.random() * Math.PI * 2, dist = 80 + Math.random() * 180;
      p.animate([
        { transform: 'translate(0,0) rotate(0)', opacity: 1 },
        { transform: 'translate(' + Math.cos(ang) * dist + 'px,' + (Math.sin(ang) * dist + 160) + 'px) rotate(' + (Math.random() * 720) + 'deg)', opacity: 0 }
      ], { duration: 1100 + Math.random() * 600, easing: 'cubic-bezier(.2,.7,.3,1)' }).onfinish = (function (el) { return function () { el.remove(); }; })(p);
    }
  };
})();

/* ---------- Budget picker: budget → recommended package ---------- */
(function () {
  'use strict';
  var box = document.querySelector('[data-bp]');
  if (!box) return;
  var plans = [
    { name: 'AI Automation Starter', price: 499,
      p: 'A short list of products a starter budget can stock, checked for demand and margin.',
      s: 'Starter website pages, up to 50 products, secure checkout and payment gateway.',
      a: 'Shopping cart, product search and order flow ready from launch.' },
    { name: 'AI Store Launch', price: 999,
      p: 'Product picks checked for demand, competition and margin, sized to your budget.',
      s: 'Product pages, responsive design, secure checkout, SEO-friendly URLs and SSL.',
      a: 'Inventory management system and basic website analytics.' },
    { name: 'AI Business Pro', price: 2499,
      p: 'A wider product range planned around your budget and your best-selling category.',
      s: 'Up to 200 product pages, multiple payment options and advanced SEO.',
      a: 'Robust inventory management, email marketing and live chat integration.' },
    { name: 'AI Fully Autopilot Empire ', price: 4999,
      p: 'A full catalogue plan with products chosen for demand, margin and repeat buyers.',
      s: 'Up to 300 product pages, fully custom responsive design and AI-powered search.',
      a: 'Email marketing automation, an advanced analytics dashboard and VIP support.' },
  
  ];
  var right = box.querySelector('.cc-bp-right');
  var $ = function (sel) { return box.querySelector(sel); };
  var nowEl = $('[data-bp-now]'), current = 999;   // matches the price shown in the HTML

  // price counts up/down to the new figure
  function countTo(target) {
    var start = current, t0 = performance.now(), dur = 600;
    function step(t) {
      var k = Math.min(1, (t - t0) / dur), v = Math.round(start + (target - start) * (1 - Math.pow(1 - k, 3)));
      nowEl.textContent = v.toLocaleString('en-US');
      if (k < 1) requestAnimationFrame(step); else current = target;
    }
    requestAnimationFrame(step);
  }

  function pick(i) {
    var plan = plans[i];
    Array.prototype.forEach.call(box.querySelectorAll('[data-bp-key]'), function (b) {
      b.setAttribute('aria-checked', String(+b.getAttribute('data-bp-key') === i));
    });
    $('[data-bp-name]').textContent = plan.name;
    $('[data-bp-p]').textContent = plan.p;
    $('[data-bp-s]').textContent = plan.s;
    $('[data-bp-a]').textContent = plan.a;
    countTo(plan.price);                             // the plan's full price, no discount
    right.classList.remove('is-swap'); void right.offsetWidth; right.classList.add('is-swap');
  }

  var chips = Array.prototype.slice.call(box.querySelectorAll('[data-bp-key]'));
  chips.forEach(function (b, i) {
    b.addEventListener('click', function () { pick(i); });
    b.addEventListener('keydown', function (e) {
      var n = e.key === 'ArrowRight' || e.key === 'ArrowDown' ? 1 : e.key === 'ArrowLeft' || e.key === 'ArrowUp' ? -1 : 0;
      if (!n) return;
      e.preventDefault();
      var j = (i + n + chips.length) % chips.length; pick(j); chips[j].focus();
    });
  });
})();
/* ---------- Number counters: count up when the stats come into view ---------- */
(function () {
  'use strict';
  var els = document.querySelectorAll('.cc-count[data-count]');
  if (!els.length) return;
  var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function format(el, value) {
    var dec = parseInt(el.getAttribute('data-decimals') || '0', 10);
    var num = value.toLocaleString('en-US', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    return (el.getAttribute('data-prefix') || '') + num + (el.getAttribute('data-suffix') || '');
  }

  function run(el) {
    var target = parseFloat(el.getAttribute('data-count'));
    if (isNaN(target) || reduce) { el.textContent = format(el, target); return; }
    var start = performance.now(), dur = 1800;
    (function step(now) {
      var k = Math.min(1, (now - start) / dur);
      var eased = 1 - Math.pow(1 - k, 3); // fast start, smooth stop
      el.textContent = format(el, target * eased);
      if (k < 1) requestAnimationFrame(step);
      else el.textContent = format(el, target);
    })(start);
  }

  if (!('IntersectionObserver' in window)) { Array.prototype.forEach.call(els, run); return; }
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      io.unobserve(entry.target); // count only once
      run(entry.target);
    });
  }, { threshold: 0.4 });
  Array.prototype.forEach.call(els, function (el) { io.observe(el); });
})();