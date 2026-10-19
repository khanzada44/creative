(function () {
  var CFG = window.CVG_SP || {};
  var SERVICES = CFG.services || [];
  var PAGE = CFG.page || '/services/';
  var CONTACT = CFG.contact || '/contact-us/';

  var root = document.getElementById('cvg-sp');
  var $ = function (id) { return document.getElementById(id); };
  var bySlug = {}; SERVICES.forEach(function (s) { bySlug[s.slug] = s; });

  function esc(s) {
    return String(s == null ? '' : s).replace(/[&<>"']/g, function (c) {
      return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
    });
  }
  function url(slug) { return PAGE + '?service=' + encodeURIComponent(slug); }
  function children(slug) { return SERVICES.filter(function (s) { return s.parent === slug; }); }
  function currentSlug() {
    var q = new URLSearchParams(location.search).get('service') || location.hash.replace('#', '');
    return bySlug[q] ? q : root.getAttribute('data-default');
  }
  function show(id, on) { $(id).style.display = on ? '' : 'none'; }

  function render() {
    var slug = currentSlug(), d = bySlug[slug] || SERVICES[0];
    var parent = d.parent ? bySlug[d.parent] : null;
    var kids = children(d.slug);

    document.title = d.title;
    $('sp-title').textContent = d.title;
    $('sp-subtitle').textContent = d.subtitle || '';

    // Breadcrumbs
    var c = '<a href="' + esc(PAGE) + '">Services</a>';
    if (parent) c += '<span>/</span><a href="' + esc(url(parent.slug)) + '" data-go="' + esc(parent.slug) + '">' + esc(parent.short || parent.title) + '</a>';
    c += '<span>/</span><span>' + esc(d.short || d.title) + '</span>';
    $('sp-crumbs').innerHTML = c;

    // Top chips (sirf top-level) + sub chips
    var top = SERVICES.filter(function (s) { return !s.parent; });
    var activeTop = parent ? parent.slug : d.slug;
    $('sp-chips').innerHTML = top.map(function (s) {
      return '<a class="cvg-sp-chip' + (s.slug === activeTop ? ' is-active' : '') + '" role="tab" href="' + esc(url(s.slug)) + '" data-go="' + esc(s.slug) + '">' + esc(s.short || s.title) + '</a>';
    }).join('');
    var sibs = parent ? children(parent.slug) : kids;
    $('sp-subchips').innerHTML = sibs.map(function (s) {
      return '<a class="cvg-sp-chip' + (s.slug === d.slug ? ' is-active' : '') + '" role="tab" href="' + esc(url(s.slug)) + '" data-go="' + esc(s.slug) + '">' + esc(s.short || s.title) + '</a>';
    }).join('');

    // Intro
    $('sp-intro-title').textContent = d.introTitle || '';
    $('sp-intro-text').textContent = d.introText || '';
    $('sp-list-title').textContent = d.listTitle || '';
    $('sp-list').innerHTML = (d.list || []).map(function (t) { return '<li>' + esc(t) + '</li>'; }).join('');
    $('sp-media').innerHTML = (d.introImages && d.introImages.length)
      ? d.introImages.map(function (u) { return '<img src="' + esc(u) + '" alt="" loading="lazy">'; }).join('')
      : '<span class="cvg-sp-media-icon" aria-hidden="true">' + esc(d.icon || '✨') + '</span>';

    // Child cards
    show('sp-children-sec', kids.length > 0);
    if (kids.length) {
      $('sp-children-title').textContent = d.short || d.title;
      $('sp-children').innerHTML = kids.map(function (s) {
        return '<a class="cvg-sp-card" href="' + esc(url(s.slug)) + '" data-go="' + esc(s.slug) + '">' +
          '<span class="cvg-sp-card-ic" aria-hidden="true">' + esc(s.icon || '•') + '</span>' +
          '<span class="cvg-sp-card-t">' + esc(s.short || s.title) + '<span class="cvg-sp-card-s">From $' + esc((s.plans && s.plans[0] && s.plans[0].price) || '') + '</span></span>' +
          '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg></a>';
      }).join('');
    }

    // Portfolio (alternate bg: agar children section dikh raha hai to portfolio bhi theek rahe)
    var hasPf = d.portfolio && d.portfolio.length;
    show('sp-portfolio-sec', hasPf);
    if (hasPf) {
      $('sp-portfolio').innerHTML = d.portfolio.map(function (u, i) {
        return '<button type="button" class="cvg-sp-work" data-src="' + esc(u) + '" aria-label="View work ' + (i + 1) + '"><img src="' + esc(u) + '" alt="' + esc(d.title) + ' portfolio ' + (i + 1) + '" loading="lazy"><span>View Larger</span></button>';
      }).join('');
    }

    // Pricing
    var hasPl = d.plans && d.plans.length;
    show('sp-pricing-sec', hasPl);
    if (hasPl) {
      $('sp-pricing').innerHTML = d.plans.map(function (p) {
        return '<article class="cvg-sp-plan' + (p.featured ? ' is-featured' : '') + '">' +
          (p.badge ? '<span class="cvg-sp-badge">' + esc(p.badge) + '</span>' : '') +
          '<h3 class="cvg-sp-plan-name">' + esc(p.name) + '</h3>' +
          '<div class="cvg-sp-price"><small>$</small><b>' + esc(p.price) + '</b><small>.00</small></div>' +
          (p.addon ? '<p class="cvg-sp-addon">' + esc(p.addon) + '</p>' : '') +
          '<ul class="cvg-sp-feats">' + (p.features || []).map(function (f) { return '<li>' + esc(f) + '</li>'; }).join('') + '</ul>' +
          '<a class="cvg-sp-btn" href="' + esc(p.link || CONTACT) + '">Buy now</a></article>';
      }).join('');
    }
  }

  // Click handling (page reload ke bina content badlo)
  root.addEventListener('click', function (e) {
    var go = e.target.closest('[data-go]');
    if (go && !e.metaKey && !e.ctrlKey) {
      e.preventDefault();
      history.pushState({}, '', url(go.getAttribute('data-go')));
      render();
      root.scrollIntoView({ behavior: 'smooth', block: 'start' });
      return;
    }
    var w = e.target.closest('.cvg-sp-work');
    if (w) { lbImg.src = w.getAttribute('data-src'); lb.hidden = false; return; }
    if (e.target === lb || e.target.closest('.cvg-sp-lightbox-close')) { lb.hidden = true; lbImg.src = ''; }
  });
  var lb = $('sp-lightbox'), lbImg = lb.querySelector('img');
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') lb.hidden = true; });
  window.addEventListener('popstate', render);

  function init() { render(); }
  init();
})();
