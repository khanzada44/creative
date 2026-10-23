<?php include __DIR__ . '/topbar.php'; ?>
<?php require_once __DIR__ . '/init.php'; ?>
<?php
/* ---------- Which menu item is active (mint colour) ---------- */
$cvgNavPath = strtolower(parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '');
if (!function_exists('cvg_nav_on')) {
  function cvg_nav_on($needle, $path)
  {
    return strpos($path, '/' . $needle) !== false ? ' is-on' : '';
  }
}
?>

<header class="header cvg-glass" id="cvgHeader">
  <div class="header-inner">
    <div class="header-left">
      <div class="logo">
        <a href="<?= cvg_url('index.php') ?>" class="cvg-alogo" aria-label="Creative Converge home">
          <svg class="cvg-alogo-mark" viewBox="-70 -70 140 140" aria-hidden="true">
            <defs>
              <linearGradient id="cvgAlogoGrad" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0" stop-color="#5FF0C8" />
                <stop offset=".5" stop-color="#00D4A3" />
                <stop offset="1" stop-color="#008A72" />
              </linearGradient>
            </defs>
            <!-- Outer C -->
            <path class="cvg-alogo-ring" pathLength="1" d="M38.3 -32.1 A50 50 0 1 0 38.3 32.1"
              fill="none" stroke="url(#cvgAlogoGrad)" stroke-width="16" stroke-linecap="round" />
            <g>
              <path class="cvg-alogo-ring2" pathLength="1" d="M23 -19.3 A30 30 0 1 0 23 19.3"
                fill="none" stroke="#5FF0C8" stroke-width="5" stroke-linecap="round" />
              <animateTransform attributeName="transform" type="rotate" from="0 0 0" to="360 0 0"
                dur="7s" begin="1.4s" repeatCount="indefinite" />
            </g>
            <!-- Dot + its pulse halo -->
            <circle class="cvg-alogo-halo" cx="42" cy="0" r="9" fill="#5FF0C8" />
            <circle class="cvg-alogo-dot" cx="42" cy="0" r="9" fill="#5FF0C8" />
          </svg>

          <span class="cvg-alogo-text">
            <span class="cvg-alogo-w1"><span style="--i:0">C</span><span style="--i:1">r</span><span style="--i:2">e</span><span style="--i:3">a</span><span style="--i:4">t</span><span style="--i:5">i</span><span style="--i:6">v</span><span style="--i:7">e</span></span>
            <span class="cvg-alogo-w2"><span style="--i:0">C</span><span style="--i:1">o</span><span style="--i:2">n</span><span style="--i:3">v</span><span style="--i:4">e</span><span style="--i:5">r</span><span style="--i:6">g</span><span style="--i:7">e</span><span style="--i:8" class="cvg-alogo-dotc">.</span></span>
          </span>
        </a>
      </div>
    </div>

    <!-- CENTER: desktop nav -->
    <nav class="desktop-nav" aria-label="Main">

      <!-- Services dropdown -->
      <div class="services-dropdown" id="servicesDropdown">
        <button class="services-btn<?= cvg_nav_on('services', $cvgNavPath) ?>" id="servicesBtn" aria-haspopup="true" aria-expanded="false">
          <a href="<?= cvg_url('services/services.php') ?>" class="panel-link">Services</a>
          <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </button>
        <div class="services-menu" id="servicesMenu">
          <ul>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=logo-design-solutions') ?>">Logo Design</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=illustration-design') ?>">Illustration Design</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=web-design-solutions') ?>">Web Design</a></li>

            <!-- Web Developer + flyout -->
            <li class="has-sub">
              <a href="<?= cvg_url('services/service-detail.php?slug=web-developer-solutions') ?>" class="sub-trigger" aria-haspopup="true">
                Web Developer
                <svg class="sub-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <polyline points="9 6 15 12 9 18"></polyline>
                </svg>
              </a>
              <ul class="services-submenu">
                <li><a href="<?= cvg_url('services/service-detail.php?slug=laravel') ?>">Laravel</a></li>
                <li><a href="<?= cvg_url('services/service-detail.php?slug=node-js') ?>">Node Js</a></li>
                <li><a href="<?= cvg_url('services/service-detail.php?slug=custom-php-development') ?>">Custom PHP Development</a></li>
                <li><a href="<?= cvg_url('services/service-detail.php?slug=next-js') ?>">Next.js</a></li>
                <li><a href="<?= cvg_url('services/service-detail.php?slug=wordpress-development') ?>">WordPress Development</a></li>
                <li><a href="<?= cvg_url('services/service-detail.php?slug=shopify') ?>">Shopify</a></li>
                <li><a href="<?= cvg_url('services/service-detail.php?slug=magento') ?>">Magento</a></li>
                <li><a href="<?= cvg_url('services/service-detail.php?slug=woocommerce') ?>">WooCommerce</a></li>
                <li><a href="<?= cvg_url('services/service-detail.php?slug=cms-development') ?>">CMS Development</a></li>
                <li><a href="<?= cvg_url('services/service-detail.php?slug=website-maintenance') ?>">Website Maintenance</a></li>
              </ul>
            </li>

            <li><a href="<?= cvg_url('services/service-detail.php?slug=branding') ?>">Branding</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=ecommerce-website-solutions') ?>">Ecommerce Website</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=video-animation-services') ?>">Video Animation</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=digital-marketing') ?>">Digital Marketing</a></li>
            <!-- <li><a href="<?= cvg_url('services/service-detail.php?slug=advance-combo-packages') ?>">Advance Combo Packages</a></li> -->
          </ul>
        </div>
      </div>

      <a href="<?= cvg_url('pricing/index.php') ?>" class="nav-link<?= cvg_nav_on('pricing', $cvgNavPath) ?>">Pricing</a>
      <a href="<?= cvg_url('cases/index.php') ?>" class="nav-link<?= cvg_nav_on('cases', $cvgNavPath) ?>">Cases</a>
      <a href="<?= cvg_url('about/index.php') ?>" class="nav-link<?= cvg_nav_on('about', $cvgNavPath) ?>">About</a>
      <a href="<?= cvg_url('contact-us/index.php') ?>" class="nav-link<?= cvg_nav_on('contact-us', $cvgNavPath) ?>">Contact</a>
    </nav>

    <!-- RIGHT: quote button + mobile menu button -->
    <div class="cvg-glass-right">
      <a href="<?= cvg_url('contact-us/index.php') ?>" class="cvg-glass-cta">
        Get a quote
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path d="M7 17L17 7M8 7h9v9" />
        </svg>
      </a>
      <button class="menu-btn" id="menuBtn" aria-label="Open menu" aria-controls="sidePanel" aria-expanded="false">
        <span class="cvg-burger" aria-hidden="true"><i></i><i></i><i></i></span>
      </button>
    </div>
  </div>
</header>

<!-- ===== Dark overlay ===== -->
<div class="overlay" id="overlay"></div>

<!-- ===== Mobile slide-in panel ===== -->
<aside class="side-panel" id="sidePanel" aria-hidden="true">

  <div class="panel-close-wrap">
    <span class="panel-title">Menu</span>
    <button class="panel-close-btn" id="closePanelBtn" aria-label="Close menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
  </div>

  <ul class="panel-menu">
    <li><a href="<?= cvg_url('index.php') ?>" class="panel-link">Home</a></li>

    <!-- Services accordion -->
    <li>
      <button class="panel-services-btn" id="panelServicesBtn">
        <span>Services</span>
        <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
      </button>

      <ul class="panel-services-list" id="panelServicesList">
        <li><a href="<?= cvg_url('services/services.php') ?>" class="panel-sub-link">All services</a></li>
        <li><a href="<?= cvg_url('services/service-detail.php?slug=logo-design-solutions') ?>" class="panel-sub-link">Logo Design</a></li>
        <li><a href="<?= cvg_url('services/service-detail.php?slug=illustration-design') ?>" class="panel-sub-link">Illustration Design</a></li>
        <li><a href="<?= cvg_url('services/service-detail.php?slug=web-design-solutions') ?>" class="panel-sub-link">Web Design</a></li>

        <!-- Web Developer (nested accordion) -->
        <li>
          <button type="button" class="panel-sub-btn panel-sub-link" id="panelDevBtn" aria-expanded="false">
            Web Developer
            <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
          <ul class="panel-sub-list" id="panelDevList">
            <li><a href="<?= cvg_url('services/service-detail.php?slug=laravel') ?>">Laravel</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=node-js') ?>">Node Js</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=custom-php-development') ?>">Custom PHP Development</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=next-js') ?>">Next.js</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=wordpress-development') ?>">WordPress Development</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=shopify') ?>">Shopify</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=magento') ?>">Magento</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=woocommerce') ?>">WooCommerce</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=cms-development') ?>">CMS Development</a></li>
            <li><a href="<?= cvg_url('services/service-detail.php?slug=website-maintenance') ?>">Website Maintenance</a></li>
          </ul>
        </li>

        <li><a href="<?= cvg_url('services/service-detail.php?slug=branding') ?>" class="panel-sub-link">Branding</a></li>
        <li><a href="<?= cvg_url('services/service-detail.php?slug=ecommerce-website-solutions') ?>" class="panel-sub-link">Ecommerce Website</a></li>
        <li><a href="<?= cvg_url('services/service-detail.php?slug=video-animation-services') ?>" class="panel-sub-link">Video Animation</a></li>
        <li><a href="<?= cvg_url('services/service-detail.php?slug=digital-marketing') ?>" class="panel-sub-link">Digital Marketing</a></li>
        <li><a href="<?= cvg_url('services/service-detail.php?slug=advance-combo-packages') ?>" class="panel-sub-link">Advance Combo Packages</a></li>
      </ul>
    </li>

    <li><a href="<?= cvg_url('pricing/index.php') ?>" class="panel-link">Pricing</a></li>
    <li><a href="<?= cvg_url('cases/index.php') ?>" class="panel-link">Cases</a></li>
    <li><a href="<?= cvg_url('about/index.php') ?>" class="panel-link">About us</a></li>
    <li><a href="<?= cvg_url('contact-us/index.php') ?>" class="panel-link">Contact us</a></li>
  </ul>

  <div class="panel-foot">
    <a href="<?= cvg_url('contact-us/index.php') ?>" class="cvg-glass-cta cvg-glass-cta--block">Get a quote
      <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M7 17L17 7M8 7h9v9" />
      </svg>
    </a>
    <a href="mailto:info@creativeconverge.com" class="panel-mail">info@creativeconverge.com</a>
    <div class="panel-socials">
      <a href="https://linkedin.com" target="_blank" rel="noreferrer">LinkedIn</a>
      <a href="https://facebook.com" target="_blank" rel="noreferrer">Facebook</a>
    </div>
  </div>
</aside>

<style>
  .cvg-alogo {
    --cvg-alogo-size: 19px;
    display: inline-flex;
    align-items: center;
    gap: 0.42em;
    font-size: 16px;
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    line-height: 1;
    text-decoration: none;
    -webkit-font-smoothing: antialiased;
  }

  .cvg-alogo:hover {
    text-decoration: none;
  }

  .cvg-alogo .cvg-alogo-mark {
    width: 2.4em;
    height: 2.4em;
    flex: none;
    overflow: visible;
  }

  .cvg-alogo .cvg-alogo-text {
    display: flex;
    flex-direction: column;
    letter-spacing: -0.02em;
    line-height: 1;
  }

  .cvg-alogo .cvg-alogo-w1 {
    color: #F2F5F4;
    overflow: hidden;
    padding-bottom: 0.08em;
  }

  .cvg-alogo .cvg-alogo-w2 {
    color: #00D4A3;
  }

  .cvg-alogo .cvg-alogo-dotc {
    color: #5FF0C8;
  }

  .cvg-alogo .cvg-alogo-w1 span,
  .cvg-alogo .cvg-alogo-w2 span {
    display: inline-block;
  }

  .cvg-alogo.cvg-alogo--dark .cvg-alogo-w1 {
    color: #0A0A0A;
  }

  .cvg-alogo .cvg-alogo-ring,
  .cvg-alogo .cvg-alogo-ring2 {
    stroke-dasharray: 1;
  }

  .cvg-alogo .cvg-alogo-ring {
    animation: cvgAlogoDraw 1.3s ease-in-out both;
  }

  .cvg-alogo .cvg-alogo-ring2 {
    animation: cvgAlogoDrawRev 1s ease-in-out 0.35s both;
  }

  .cvg-alogo .cvg-alogo-dot,
  .cvg-alogo .cvg-alogo-halo {
    transform-box: fill-box;
    transform-origin: center;
  }

  .cvg-alogo .cvg-alogo-dot {
    animation: cvgAlogoPop 0.6s cubic-bezier(.3, 1.6, .5, 1) 1.2s both,
      cvgAlogoPulse 2.4s ease-in-out 2s infinite;
  }

  .cvg-alogo .cvg-alogo-halo {
    opacity: 0;
    animation: cvgAlogoHalo 2.4s ease-out 2s infinite;
  }

  .cvg-alogo .cvg-alogo-w1 span {
    animation: cvgAlogoRise 0.6s cubic-bezier(.2, .9, .2, 1) calc(1.5s + var(--i) * 0.045s) both,
      cvgAlogoShine 3.6s ease-in-out calc(3.4s + var(--i) * 0.07s) infinite;
  }

  .cvg-alogo .cvg-alogo-w2 span {
    animation: cvgAlogoSlide 0.6s cubic-bezier(.2, .9, .2, 1) calc(1.65s + var(--i) * 0.04s) both,
      cvgAlogoShine 3.6s ease-in-out calc(3.4s + var(--i) * 0.07s) infinite;
  }

  @keyframes cvgAlogoDraw {
    from { stroke-dashoffset: 1; }
    to { stroke-dashoffset: 0; }
  }

  @keyframes cvgAlogoDrawRev {
    from { stroke-dashoffset: -1; }
    to { stroke-dashoffset: 0; }
  }

  @keyframes cvgAlogoPop {
    from { transform: scale(0); }
    to { transform: scale(1); }
  }

  @keyframes cvgAlogoPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.18); }
  }

  @keyframes cvgAlogoHalo {
    0% { transform: scale(1); opacity: .55; }
    100% { transform: scale(2.6); opacity: 0; }
  }

  @keyframes cvgAlogoRise {
    from { transform: translateY(110%); }
    to { transform: none; }
  }

  @keyframes cvgAlogoSlide {
    from { transform: translateX(-0.8em); opacity: 0; }
    to { transform: none; opacity: 1; }
  }

  @keyframes cvgAlogoShine {
    0%, 24%, 100% { filter: brightness(1) drop-shadow(0 0 0 rgba(95, 240, 200, 0)); }
    10% { filter: brightness(1.5) drop-shadow(0 0 6px rgba(95, 240, 200, .9)); }
  }

  /* =========================================================
     HEADER PILL
     Position ab sirf CSS se: shuru mein topbar ke neeche (60px),
     scroll ke baad upar chipak jata hai (12px). Koi inline style nahi.
     ========================================================= */
  .header.cvg-glass {
    position: fixed;
    z-index: 50;
    top: 60px;
    left: 0;
    right: 0;
    width: auto;
    padding: 0 24px;
    background: none;
    pointer-events: none;
    font-family: 'Poppins', sans-serif;
    transition: top .35s ease;
  }

  .header.cvg-glass .header-inner {
    pointer-events: auto;
    position: relative;
    max-width: 1176px;
    height: 68px;
    margin: 0 auto;
    padding: 0 10px 0 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    border-radius: 999px;
    background: rgba(10, 14, 13, .45);
    -webkit-backdrop-filter: blur(16px) saturate(140%);
    backdrop-filter: blur(16px) saturate(140%);
    border: 1px solid rgba(95, 240, 200, .18);
    box-shadow: 0 20px 50px rgba(0, 0, 0, .35);
    transition: height .35s ease, background .35s ease, box-shadow .35s ease, border-color .35s ease;
  }

  /* after scrolling: pill moves up */
  .header.cvg-glass.is-scrolled {
    top: 12px;
  }

  /* after scrolling: pill gets a bit smaller and darker */
  .header.cvg-glass.is-scrolled .header-inner {
    height: 60px;
    background: rgba(8, 12, 11, .82);
    border-color: rgba(95, 240, 200, .26);
    box-shadow: 0 14px 40px rgba(0, 0, 0, .5);
  }

  .header.cvg-glass .header-left {
    display: flex;
    align-items: center;
    gap: 0;
    flex: none;
  }

  .header.cvg-glass .logo img {
    height: auto;
  }

  /* ---------- Center links ---------- */
  .header.cvg-glass .desktop-nav {
    display: none;
    align-items: center;
    gap: 6px;
    font-size: 14.5px;
    font-weight: 500;
  }

  .header.cvg-glass .desktop-nav .nav-link,
  .header.cvg-glass .services-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    height: 40px;
    padding: 0 14px;
    border-radius: 999px;
    color: rgba(242, 245, 244, .86);
    transition: color .25s ease, background .25s ease;
  }

  .header.cvg-glass .services-btn {
    font: inherit;
    border: 0;
    cursor: pointer;
  }

  .header.cvg-glass .services-btn .panel-link {
    display: inline;
    padding: 0;
    color: inherit;
    font: inherit;
  }

  .header.cvg-glass .desktop-nav .nav-link:hover,
  .header.cvg-glass .services-btn:hover,
  .header.cvg-glass .services-btn.open {
    color: #fff;
    background: rgba(242, 245, 244, .08);
  }

  .header.cvg-glass .desktop-nav .nav-link.is-on,
  .header.cvg-glass .services-btn.is-on {
    color: #5FF0C8;
  }

  /* ---------- Services dropdown ---------- */
  .header.cvg-glass .services-menu {
    padding-top: 14px;
    left: 50%;
    translate: -50% 0;
  }

  .header.cvg-glass .services-menu>ul {
    width: 300px;
    padding: 8px;
    border-radius: 18px;
    background: rgba(10, 14, 13, .94);
    -webkit-backdrop-filter: blur(16px);
    backdrop-filter: blur(16px);
    border: 1px solid rgba(95, 240, 200, .16);
    box-shadow: 0 24px 60px rgba(0, 0, 0, .55);
    overflow: visible !important;
  }

  .header.cvg-glass .services-menu>ul>li>a {
    display: flex;
    padding: 11px 14px;
    border-radius: 10px;
    font-size: 13.5px;
    text-transform: none;
    letter-spacing: 0;
    color: #E3ECE9;
    transition: background .2s ease, color .2s ease;
  }

  .header.cvg-glass .services-menu>ul>li>a:hover,
  .header.cvg-glass .services-menu li.has-sub:hover>a,
  .header.cvg-glass .services-menu li.has-sub:focus-within>a,
  .header.cvg-glass .services-menu li.has-sub.open>a {
    background: rgba(0, 212, 163, .14);
    color: #5FF0C8;
  }

  .header.cvg-glass .services-menu li.has-sub {
    position: relative;
  }

  .header.cvg-glass .services-menu .sub-trigger {
    align-items: center;
    justify-content: space-between;
    gap: 16px;
  }

  .header.cvg-glass .services-menu .sub-trigger .sub-arrow {
    flex: none;
    width: 14px;
    height: 14px;
    opacity: .85;
  }

  .header.cvg-glass .services-menu ul.services-submenu {
    position: absolute;
    top: -8px;
    left: 100%;
    z-index: 20;
    min-width: 260px;
    margin: 0 0 0 12px;
    padding: 8px;
    border-radius: 18px;
    background: rgba(10, 14, 13, .96);
    border: 1px solid rgba(95, 240, 200, .16);
    box-shadow: 0 24px 60px rgba(0, 0, 0, .55);
    opacity: 0;
    visibility: hidden;
    transform: translateX(10px);
    transition: opacity .25s ease, transform .25s ease, visibility .25s;
  }

  /* invisible bridge so the mouse can cross the gap */
  .header.cvg-glass .services-menu ul.services-submenu::before {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: -16px;
    width: 16px;
  }

  .header.cvg-glass .services-menu li.has-sub:hover>ul.services-submenu,
  .header.cvg-glass .services-menu li.has-sub:focus-within>ul.services-submenu,
  .header.cvg-glass .services-menu li.has-sub.open>ul.services-submenu {
    opacity: 1;
    visibility: visible;
    transform: none;
  }

  .header.cvg-glass .services-menu ul.services-submenu li a {
    display: block;
    padding: 10px 14px;
    border-radius: 10px;
    font-size: 13.5px;
    text-transform: none;
    letter-spacing: 0;
    color: #D3DCE0;
    background: transparent;
  }

  .header.cvg-glass .services-menu ul.services-submenu li a:hover,
  .header.cvg-glass .services-menu ul.services-submenu li a:focus-visible {
    background: rgba(0, 212, 163, .14);
    color: #5FF0C8;
  }

  /* ---------- Right: CTA + burger ---------- */
  .header.cvg-glass .cvg-glass-right {
    display: flex;
    align-items: center;
    gap: 8px;
    flex: none;
  }

  .cvg-glass-cta {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    height: 48px;
    padding: 0 17px;
    border-radius: 999px;
    background: #00D4A3;
    color: #04342C !important;
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    text-decoration: none;
    transition: background .25s ease, transform .25s ease, box-shadow .25s ease;
  }

  .cvg-glass-cta svg {
    width: 15px;
    height: 15px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.4;
    stroke-linecap: round;
    transition: transform .25s ease;
  }

  .cvg-glass-cta:hover {
    background: #5FF0C8;
    transform: translateY(-1px);
    box-shadow: 0 0 0 5px rgba(0, 212, 163, .15);
  }

  .cvg-glass-cta:hover svg {
    transform: translate(2px, -2px);
  }

  .header.cvg-glass.is-scrolled .cvg-glass-cta {
    height: 44px;
  }

  .header.cvg-glass .menu-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(242, 245, 244, .08);
    border: 1px solid rgba(95, 240, 200, .25);
    cursor: pointer;
  }

  .cvg-burger {
    display: grid;
    gap: 5px;
  }

  .cvg-burger i {
    display: block;
    width: 18px;
    height: 2px;
    border-radius: 2px;
    background: #F2F5F4;
    transition: transform .3s ease, opacity .3s ease, width .3s ease;
  }

  .cvg-burger i:nth-child(2) {
    width: 12px;
    margin-left: 6px;
    background: #5FF0C8;
  }

  .menu-btn[aria-expanded="true"] .cvg-burger i:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
  }

  .menu-btn[aria-expanded="true"] .cvg-burger i:nth-child(2) {
    opacity: 0;
  }

  .menu-btn[aria-expanded="true"] .cvg-burger i:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
  }

  /* desktop: show links, hide burger */
  @media (min-width: 992px) {
    .header.cvg-glass .desktop-nav {
      display: flex;
    }

    .header.cvg-glass .menu-btn {
      display: none !important;
    }
  }

  /* tablet + phone */
  @media (max-width: 991px) {
    .header.cvg-glass .desktop-nav {
      display: none !important;
    }
  }

  @media (max-width: 600px) {
    .header.cvg-glass {
      padding: 0 12px;
    }

    .header.cvg-glass .header-inner {
      height: 60px;
      padding: 0 7px 0 14px;
      gap: 10px;
    }

    .header.cvg-glass.is-scrolled .header-inner {
      height: 56px;
    }

    .header.cvg-glass .cvg-alogo {
      --cvg-alogo-size: 16px;
    }

    .header.cvg-glass .cvg-glass-right .cvg-glass-cta {
      height: 40px;
      padding: 0 14px;
      font-size: 13px;
    }

    .header.cvg-glass .cvg-glass-right .cvg-glass-cta svg {
      display: none;
    }

    .header.cvg-glass .menu-btn {
      width: 42px;
      height: 42px;
    }
  }

  @media (max-width: 380px) {
    .header.cvg-glass .cvg-glass-right .cvg-glass-cta {
      display: none;
    }
  }

  /* =========================================================
     MOBILE PANEL (slides in from the right)
     ========================================================= */
  .overlay {
    position: fixed;
    inset: 0;
    z-index: 60;
    background: rgba(0, 0, 0, .6);
    -webkit-backdrop-filter: blur(3px);
    backdrop-filter: blur(3px);
    opacity: 0;
    pointer-events: none;
    transition: opacity .3s ease;
  }

  .overlay.active {
    opacity: 1;
    pointer-events: auto;
  }

  .side-panel {
    position: fixed;
    z-index: 70;
    top: 12px;
    bottom: 12px;
    right: 12px;
    left: auto;
    width: min(360px, calc(100vw - 24px));
    height: auto;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    padding: 0 0 20px;
    border-radius: 24px;
    background: rgba(10, 14, 13, .96);
    border: 1px solid rgba(95, 240, 200, .16);
    box-shadow: 0 30px 80px rgba(0, 0, 0, .6);
    color: #F2F5F4;
    font-family: 'Poppins', sans-serif;
    transform: translateX(calc(100% + 24px));
    transition: transform .45s cubic-bezier(.2, .9, .2, 1);
  }

  .side-panel.open {
    transform: none;
  }

  .side-panel .panel-close-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 18px 10px 24px;
  }

  .side-panel .panel-title {
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: #5FF0C8;
  }

  .side-panel .panel-close-btn {
    width: 40px;
    height: 40px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: rgba(242, 245, 244, .08);
    color: #F2F5F4;
    cursor: pointer;
  }

  .side-panel .panel-menu {
    margin: 0;
    padding: 4px 14px;
    list-style: none;
    font-size: 16px;
  }

  .side-panel .panel-menu>li {
    border-bottom: 1px solid rgba(242, 245, 244, .07);
  }

  .side-panel .panel-link,
  .side-panel .panel-services-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 15px 10px;
    font-family: inherit;
    font-size: 16px;
    font-weight: 500;
    color: #F2F5F4;
    text-align: left;
    background: none;
    border: 0;
    cursor: pointer;
  }

  .side-panel .panel-link:hover,
  .side-panel .panel-services-btn:hover {
    color: #5FF0C8;
  }

  .side-panel .panel-services-btn .chevron-icon {
    width: 14px;
    height: 14px;
    transition: transform .25s ease;
  }

  .side-panel .panel-services-btn.open .chevron-icon {
    transform: rotate(180deg);
  }

  .side-panel .panel-services-list {
    margin: 0;
    padding: 0 0 0 8px;
    list-style: none;
    max-height: 0;
    overflow: hidden;
    opacity: 0;
    transition: max-height .35s ease, opacity .3s ease;
  }

  .side-panel .panel-services-list.open {
    max-height: 1400px !important;
    opacity: 1;
    padding-bottom: 10px;
  }

  .side-panel .panel-sub-link,
  .side-panel .panel-sub-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 10px 12px;
    border-radius: 10px;
    font-family: inherit;
    font-size: 14px;
    line-height: 1.3;
    color: rgba(242, 245, 244, .82);
    text-align: left;
    background: none;
    border: 0;
    cursor: pointer;
  }

  .side-panel .panel-sub-link:hover,
  .side-panel .panel-sub-btn:hover {
    background: rgba(0, 212, 163, .12);
    color: #5FF0C8;
  }

  .side-panel .panel-sub-btn .chevron-icon {
    width: 12px;
    height: 12px;
    transition: transform .25s ease;
  }

  .side-panel .panel-sub-btn.open .chevron-icon {
    transform: rotate(180deg);
  }

  .side-panel .panel-sub-list {
    max-height: 0;
    margin: 0;
    padding: 0 0 0 14px;
    list-style: none;
    overflow: hidden;
    transition: max-height .35s ease;
  }

  .side-panel .panel-sub-list.open {
    max-height: 600px;
  }

  .side-panel .panel-sub-list a {
    display: block;
    padding: 9px 12px;
    border-radius: 10px;
    font-size: 13.5px;
    color: rgba(242, 245, 244, .72);
  }

  .side-panel .panel-sub-list a:hover {
    background: rgba(0, 212, 163, .12);
    color: #5FF0C8;
  }

  .side-panel .panel-foot {
    margin-top: auto;
    padding: 22px 24px 4px;
    display: grid;
    gap: 14px;
  }

  .cvg-glass-cta--block {
    width: 100%;
    height: 52px;
  }

  .side-panel .panel-mail {
    font-size: 14px;
    color: rgba(242, 245, 244, .75);
    text-align: center;
  }

  .side-panel .panel-mail:hover {
    color: #5FF0C8;
  }

  .side-panel .panel-socials {
    display: flex;
    justify-content: center;
    gap: 28px;
    margin: 0;
    padding: 0;
    font-size: 12px;
    letter-spacing: .1em;
    text-transform: uppercase;
    color: rgba(242, 245, 244, .6);
  }

  .side-panel .panel-socials a:hover {
    color: #5FF0C8;
  }

  /* the panel is only for small screens */
  @media (min-width: 992px) {
    .side-panel,
    .overlay {
      display: none !important;
    }
  }

  @media (prefers-reduced-motion: reduce) {
    .cvg-alogo .cvg-alogo-ring,
    .cvg-alogo .cvg-alogo-ring2,
    .cvg-alogo .cvg-alogo-dot,
    .cvg-alogo .cvg-alogo-halo,
    .cvg-alogo .cvg-alogo-w1 span,
    .cvg-alogo .cvg-alogo-w2 span {
      animation: none;
    }

    .header.cvg-glass,
    .header.cvg-glass .header-inner,
    .side-panel {
      transition: none;
    }
  }
</style>

<script>
  (function() {
    "use strict";

    var header = document.getElementById("cvgHeader");
    var menuBtn = document.getElementById("menuBtn");
    var closePanelBtn = document.getElementById("closePanelBtn");
    var overlay = document.getElementById("overlay");
    var sidePanel = document.getElementById("sidePanel");

    var servicesBtn = document.getElementById("servicesBtn");
    var servicesMenu = document.getElementById("servicesMenu");
    var servicesDropdown = document.getElementById("servicesDropdown");

    var panelServicesBtn = document.getElementById("panelServicesBtn");
    var panelServicesList = document.getElementById("panelServicesList");
    var panelDevBtn = document.getElementById("panelDevBtn");
    var panelDevList = document.getElementById("panelDevList");

    /* ===== Scroll: sirf class lagti hai, koi inline style nahi ===== */
    function onScroll() {
      header.classList.toggle("is-scrolled", window.scrollY > 40);
    }
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();

    /* Agar koi doosri script header par inline top / --g-top lagaye, to hata do */
    function cleanInline() {
      if (header.style.getPropertyValue("top")) header.style.removeProperty("top");
      if (header.style.getPropertyValue("--g-top")) header.style.removeProperty("--g-top");
    }
    cleanInline();
    window.addEventListener("load", cleanInline);
    if ("MutationObserver" in window) {
      new MutationObserver(cleanInline).observe(header, {
        attributes: true,
        attributeFilter: ["style"]
      });
    }

    /* ===== Mobile panel ===== */
    function openPanel() {
      sidePanel.classList.add("open");
      overlay.classList.add("active");
      sidePanel.setAttribute("aria-hidden", "false");
      menuBtn.setAttribute("aria-expanded", "true");
      document.documentElement.style.overflow = "hidden";
    }

    function closePanel() {
      sidePanel.classList.remove("open");
      overlay.classList.remove("active");
      sidePanel.setAttribute("aria-hidden", "true");
      menuBtn.setAttribute("aria-expanded", "false");
      document.documentElement.style.overflow = "";
      panelServicesList.classList.remove("open");
      panelServicesBtn.classList.remove("open");
      panelDevList.classList.remove("open");
      panelDevBtn.classList.remove("open");
      panelDevBtn.setAttribute("aria-expanded", "false");
    }

    menuBtn.addEventListener("click", function() {
      sidePanel.classList.contains("open") ? closePanel() : openPanel();
    });
    closePanelBtn.addEventListener("click", closePanel);
    overlay.addEventListener("click", closePanel);
    window.addEventListener("keydown", function(e) {
      if (e.key === "Escape") closePanel();
    });
    sidePanel.querySelectorAll("a").forEach(function(link) {
      link.addEventListener("click", closePanel);
    });

    /* ===== Desktop Services dropdown (hover) ===== */
    var closeTimer = null;

    function openServices() {
      clearTimeout(closeTimer);
      servicesMenu.classList.add("open");
      servicesBtn.classList.add("open");
      servicesBtn.setAttribute("aria-expanded", "true");
    }

    function closeServices() {
      closeTimer = setTimeout(function() {
        servicesMenu.classList.remove("open");
        servicesBtn.classList.remove("open");
        servicesBtn.setAttribute("aria-expanded", "false");
        servicesMenu.querySelectorAll("li.has-sub.open").forEach(function(li) {
          li.classList.remove("open");
        });
      }, 140);
    }

    servicesDropdown.addEventListener("mouseenter", openServices);
    servicesDropdown.addEventListener("mouseleave", closeServices);
    servicesDropdown.addEventListener("focusin", openServices);
    servicesDropdown.addEventListener("focusout", function(e) {
      if (!servicesDropdown.contains(e.relatedTarget)) closeServices();
    });

    /* touch: first tap opens the flyout, second tap follows the link */
    servicesMenu.querySelectorAll("li.has-sub > a.sub-trigger").forEach(function(trigger) {
      trigger.addEventListener("click", function(e) {
        if (!window.matchMedia("(hover: none)").matches) return;
        var li = trigger.parentElement;
        if (!li.classList.contains("open")) {
          e.preventDefault();
          li.classList.add("open");
        }
      });
    });

    /* ===== Mobile accordions ===== */
    panelServicesBtn.addEventListener("click", function() {
      var isOpen = panelServicesList.classList.toggle("open");
      panelServicesBtn.classList.toggle("open", isOpen);
    });

    panelDevBtn.addEventListener("click", function() {
      var isOpen = panelDevList.classList.toggle("open");
      panelDevBtn.classList.toggle("open", isOpen);
      panelDevBtn.setAttribute("aria-expanded", String(isOpen));
    });
  })();
</script>