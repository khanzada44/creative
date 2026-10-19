<!-- ===== Header ===== -->
<header class="header">
  <div class="header-inner">

    <!-- LEFT: icon + logo + nav links -->
    <div class="header-left">

      <!-- Hamburger / menu icon -->
      <button class="menu-btn" id="menuBtn" aria-label="Open Menu">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
          <path d="M0.711397 17.6359C-0.0696518 18.417 -0.0696518 19.6833 0.711397 20.4644C1.49245 21.2454 2.75878 21.2454 3.53982 20.4644L20.5104 3.4938C21.2914 2.71276 21.2914 1.44642 20.5104 0.665376C19.7293 -0.115673 18.463 -0.115672 17.682 0.665376L0.711397 17.6359Z" fill="white" />
          <path d="M2.12558 31.7781C1.34453 30.997 1.34453 29.7307 2.12558 28.9496L19.0961 11.9791C19.8772 11.198 21.1435 11.198 21.9246 11.9791C22.7056 12.7601 22.7056 14.0264 21.9246 14.8075L4.95401 31.7781C4.17296 32.5591 2.90663 32.5591 2.12558 31.7781Z" fill="white" />
          <path d="M13.4393 33.1923C12.6583 32.4112 12.6583 31.1449 13.4393 30.3638L30.4099 13.3933C31.1909 12.6122 32.4572 12.6122 33.2383 13.3933C34.0193 14.1743 34.0193 15.4407 33.2383 16.2217L16.2677 33.1923C15.4867 33.9733 14.2204 33.9733 13.4393 33.1923Z" fill="white" />
        </svg>
      </button>

      <!-- Logo (outer <a> changed to <div>: an <a> inside an <a> is invalid HTML) -->
      <div class="logo">
        <a href="/creative/index.php" class="cvg-alogo" aria-label="Creative Converge home">
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
            <!-- Inner ring (spins forever) -->
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

        <style>
          /* ---------- Size: change only this one number ---------- */
          .cvg-alogo {
            --cvg-alogo-size: 22px;
          }

          .cvg-alogo {
            display: inline-flex;
            align-items: center;
            gap: 0.42em;
            font-size: var(--cvg-alogo-size);
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
            width: 2.6em;
            height: 2.6em;
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

          /* Logo on a white background? add class "cvg-alogo--dark" to the <a> */
          .cvg-alogo.cvg-alogo--dark .cvg-alogo-w1 {
            color: #0A0A0A;
          }

          /* ---------- Intro (plays once) ---------- */
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
            animation:
              cvgAlogoPop 0.6s cubic-bezier(.3, 1.6, .5, 1) 1.2s both,
              cvgAlogoPulse 2.4s ease-in-out 2s infinite;
          }

          .cvg-alogo .cvg-alogo-halo {
            opacity: 0;
            animation: cvgAlogoHalo 2.4s ease-out 2s infinite;
          }

          .cvg-alogo .cvg-alogo-w1 span {
            animation:
              cvgAlogoRise 0.6s cubic-bezier(.2, .9, .2, 1) calc(1.5s + var(--i) * 0.045s) both,
              cvgAlogoShine 3.6s ease-in-out calc(3.4s + var(--i) * 0.07s) infinite;
          }

          .cvg-alogo .cvg-alogo-w2 span {
            animation:
              cvgAlogoSlide 0.6s cubic-bezier(.2, .9, .2, 1) calc(1.65s + var(--i) * 0.04s) both,
              cvgAlogoShine 3.6s ease-in-out calc(3.4s + var(--i) * 0.07s) infinite;
          }

          /* ---------- Keyframes ---------- */
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

          /* Visitors who turned off motion see the finished logo, still */
          @media (prefers-reduced-motion: reduce) {
            .cvg-alogo .cvg-alogo-ring,
            .cvg-alogo .cvg-alogo-ring2,
            .cvg-alogo .cvg-alogo-dot,
            .cvg-alogo .cvg-alogo-halo,
            .cvg-alogo .cvg-alogo-w1 span,
            .cvg-alogo .cvg-alogo-w2 span {
              animation: none;
            }
          }
        </style>

        <!-- ===== Services flyout submenu (Web Developer Solutions) ===== -->
        <style>
          /* header.css has ".services-menu ul { overflow:hidden; width:360px; background:... }"
             which clipped the flyout. Selectors below are stronger so they win. */

          /* ===== Main dropdown: let the flyout stick out ===== */
          .services-dropdown .services-menu > ul { overflow: visible !important; }

          .services-dropdown .services-menu li.has-sub { position: relative; }

          .services-dropdown .services-menu .sub-trigger {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
          }

          .services-dropdown .services-menu .sub-trigger .sub-arrow {
            flex: none;
            width: 14px;
            height: 14px;
            opacity: .85;
          }

          /* Parent row stays highlighted while the flyout is open */
          .services-dropdown .services-menu li.has-sub:hover > a,
          .services-dropdown .services-menu li.has-sub:focus-within > a,
          .services-dropdown .services-menu li.has-sub.open > a {
            background: rgba(4, 120, 87, 0.8);
            color: #fff;
          }

          /* ===== Flyout (slate panel, like the reference) ===== */
          .services-dropdown .services-menu ul.services-submenu {
            position: absolute;
            top: 0;
            left: 100%;
            z-index: 20;
            width: auto;
            min-width: 280px;
            margin: 0 0 0 12px;
            padding: 0;
            overflow: visible;
            background: #0b0d0e;
            box-shadow: 0 14px 38px rgba(0, 0, 0, .45);
            opacity: 0;
            visibility: hidden;
            transform: translateX(10px);
            transition: opacity .25s ease, transform .25s ease, visibility .25s;
          }

          /* invisible bridge so the pointer can cross the gap without closing it */
          .services-dropdown .services-menu ul.services-submenu::before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: -16px;
            width: 16px;
          }

          .services-dropdown .services-menu li.has-sub:hover > ul.services-submenu,
          .services-dropdown .services-menu li.has-sub:focus-within > ul.services-submenu,
          .services-dropdown .services-menu li.has-sub.open > ul.services-submenu {
            opacity: 1;
            visibility: visible;
            transform: none;
          }

          .services-dropdown .services-menu ul.services-submenu li {
            border-bottom: 1px solid rgba(255, 255, 255, .07);
          }

          .services-dropdown .services-menu ul.services-submenu li:last-child { border-bottom: 0; }

          .services-dropdown .services-menu ul.services-submenu li a {
            color: #d3dce0;
            background: transparent;
          }

          .services-dropdown .services-menu ul.services-submenu li a:hover,
          .services-dropdown .services-menu ul.services-submenu li a:focus-visible {
            background: rgba(4, 120, 87, 0.8);
            color: #fff;
          }

          .services-dropdown .services-menu ul.services-submenu li:first-child a { border-radius: 6px 6px 0 0; }
          .services-dropdown .services-menu ul.services-submenu li:last-child a { border-radius: 0 0 6px 6px; }

          /* ===== Mobile side panel: nested accordion ===== */
          .side-panel .panel-services-list.open { max-height: 1400px !important; }

          .side-panel .panel-services-list .panel-sub-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 10px 12px;
            font-size: 12px;
            line-height: 1.3;
            text-align: left;
            color: #fff;
          }

          .side-panel .panel-sub-btn .chevron-icon { width: 12px; height: 12px; transition: transform .25s ease; }
          .side-panel .panel-sub-btn.open .chevron-icon { transform: rotate(180deg); }

          .side-panel .panel-sub-list {
            max-height: 0;
            margin: 0;
            padding: 0 0 0 16px;
            overflow: hidden;
            transition: max-height .35s ease;
          }

          .side-panel .panel-sub-list.open { max-height: 600px; }
          .side-panel .panel-sub-list a { display: block; padding: 9px 12px; font-size: 12px; opacity: .85; }
          .side-panel .panel-sub-list a:hover { opacity: 1; background: #022c22; }
        </style>
      </div>

      <!-- Desktop nav -->
      <nav class="desktop-nav">

        <!-- Services dropdown -->
        <div class="services-dropdown" id="servicesDropdown">
          <button class="services-btn" id="servicesBtn" aria-haspopup="true" aria-expanded="false">
             <a href="/creative/services/services.php" class="panel-link">Services</a>
            <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
          <div class="services-menu" id="servicesMenu">
            <ul>
              <li><a href="/creative/services/service-detail.php?slug=logo-design-solutions">Logo Design Solutions</a></li>
              <li><a href="/creative/services/service-detail.php?slug=illustration-design">Illustration Design</a></li>
              <li><a href="/creative/services/service-detail.php?slug=web-design-solutions">Web Design Solutions</a></li>

              <!-- NEW: Web Developer Solutions + flyout -->
              <li class="has-sub">
                <a href="/creative/services/service-detail.php?slug=web-developer-solutions" class="sub-trigger" aria-haspopup="true">
                  Web Developer Solutions
                  <svg class="sub-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="9 6 15 12 9 18"></polyline>
                  </svg>
                </a>
                <ul class="services-submenu">
                  <li><a href="/creative/services/service-detail.php?slug=laravel">Laravel</a></li>
                  <li><a href="/creative/services/service-detail.php?slug=node-js">Node Js</a></li>
                  <li><a href="/creative/services/service-detail.php?slug=custom-php-development">Custom PHP Development</a></li>
                  <li><a href="/creative/services/service-detail.php?slug=next-js">Next.js</a></li>
                  <li><a href="/creative/services/service-detail.php?slug=wordpress-development">WordPress Development</a></li>
                  <li><a href="/creative/services/service-detail.php?slug=shopify">Shopify</a></li>
                  <li><a href="/creative/services/service-detail.php?slug=magento">Magento</a></li>
                  <li><a href="/creative/services/service-detail.php?slug=woocommerce">WooCommerce</a></li>
                  <li><a href="/creative/services/service-detail.php?slug=cms-development">CMS Development</a></li>
                  <li><a href="/creative/services/service-detail.php?slug=website-maintenance">Website Maintenance</a></li>
                </ul>
              </li>

              <li><a href="/creative/services/service-detail.php?slug=branding">Branding</a></li>
              <li><a href="/creative/services/service-detail.php?slug=ecommerce-website-solutions">Ecommerce Website Solutions</a></li>
              <li><a href="/creative/services/service-detail.php?slug=video-animation-services">Stunning Video Animation Services</a></li>
              <li><a href="/creative/services/service-detail.php?slug=mobile-apps">MOBILES APPS</a></li>
              <li><a href="/creative/services/service-detail.php?slug=digital-marketing">DIGITAL MARKETING</a></li>
              <li><a href="/creative/services/service-detail.php?slug=advance-combo-packages">ADVANCE COMBO PACKAGES</a></li>
            </ul>
          </div>
        </div>

        <a href="/creative/pricing/index.php" class="nav-link">Pricing</a>
        <a href="/creative/cases/index.php" class="nav-link">Cases</a>
        <a href="/creative/contact-us/index.php" class="nav-link">Contact us</a>
      </nav>
    </div>

    <!-- RIGHT: email + Get a quote -->
    <div class="header-right">
      <a href="mailto:info@websdesignusa.com" class="email-link">info@websdesignusa.com</a>
      <a href="/quote" class="quote-btn">Get a quote</a>
    </div>
  </div>
</header>

<!-- ===== Dark overlay ===== -->
<div class="overlay" id="overlay"></div>

<!-- ===== Left slide-in panel ===== -->
<aside class="side-panel" id="sidePanel" aria-hidden="true">

  <!-- Close button -->
  <div class="panel-close-wrap">
    <button class="panel-close-btn" id="closePanelBtn" aria-label="Close Menu">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </button>
  </div>

  <!-- Menu list -->
  <ul class="panel-menu">
    <li>
      <a href="/creative/about/index.php" class="panel-link">About us</a>
    </li>

    <!-- Services accordion -->
    <li>
      <button class="panel-services-btn" id="panelServicesBtn">
         <a href="/creative/services/services.php" class="panel-link">Services</a>
        <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
      </button>

      <ul class="panel-services-list" id="panelServicesList">
        <li><a href="/services/logo-design" class="panel-sub-link">Logo Design Solutions</a></li>
        <li><a href="/services/illustration-design" class="panel-sub-link">Illustration Design</a></li>
        <li><a href="/services/web-design" class="panel-sub-link">Web Design Solutions</a></li>

        <!-- NEW: Web Developer Solutions (nested accordion) -->
        <li>
          <button type="button" class="panel-sub-btn panel-sub-link" id="panelDevBtn" aria-expanded="false">
            Web Developer Solutions
            <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
          </button>
          <ul class="panel-sub-list" id="panelDevList">
            <li><a href="/services/laravel">Laravel</a></li>
            <li><a href="/services/nodejs">Node Js</a></li>
            <li><a href="/services/custom-php-development">Custom PHP Development</a></li>
            <li><a href="/services/nextjs">Next.js</a></li>
            <li><a href="/services/wordpress-development">WordPress Development</a></li>
            <li><a href="/services/shopify">Shopify</a></li>
            <li><a href="/services/magento">Magento</a></li>
            <li><a href="/services/woocommerce">WooCommerce</a></li>
            <li><a href="/services/cms-development">CMS Development</a></li>
            <li><a href="/services/website-maintenance">Website Maintenance</a></li>
          </ul>
        </li>

        <li><a href="/services/branding" class="panel-sub-link">Branding</a></li>
        <li><a href="/services/ecommerce" class="panel-sub-link">Ecommerce Website Solutions</a></li>
        <li><a href="/services/video-animation" class="panel-sub-link">Stunning Video Animation Services</a></li>
        <li><a href="/services/mobile-apps" class="panel-sub-link">Mobile Apps</a></li>
      </ul>
    </li>

    <li><a href="/pricing" class="panel-link">Pricing</a></li>
    <li><a href="/creative/cases/index.php" class="panel-link">Cases</a></li>
    <li><a href="/creative/contact-us/index.php" class="panel-link">Contact us</a></li>
  </ul>

  <!-- Search -->
  <form class="panel-search" onsubmit="return false;">
    <input type="text" placeholder="Search..." class="panel-search-input" />
    <button type="submit" aria-label="Search" class="panel-search-btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>
    </button>
  </form>

  <!-- Social links -->
  <div class="panel-socials">
    <a href="https://linkedin.com" target="_blank" rel="noreferrer">LinkedIn</a>
    <a href="https://facebook.com" target="_blank" rel="noreferrer">Facebook</a>
  </div>
</aside>

<script>
  (function() {
    "use strict";

    // ===== Elements =====
    const menuBtn = document.getElementById("menuBtn");
    const closePanelBtn = document.getElementById("closePanelBtn");
    const overlay = document.getElementById("overlay");
    const sidePanel = document.getElementById("sidePanel");

    const servicesBtn = document.getElementById("servicesBtn");
    const servicesMenu = document.getElementById("servicesMenu");
    const servicesDropdown = document.getElementById("servicesDropdown");

    const panelServicesBtn = document.getElementById("panelServicesBtn");
    const panelServicesList = document.getElementById("panelServicesList");

    const panelDevBtn = document.getElementById("panelDevBtn");
    const panelDevList = document.getElementById("panelDevList");

    // ===== State =====
    let closeTimer = null;

    // ===== Side Panel: open / close =====
    function openPanel() {
      sidePanel.classList.add("open");
      overlay.classList.add("active");
      sidePanel.setAttribute("aria-hidden", "false");
    }

    function closePanel() {
      sidePanel.classList.remove("open");
      overlay.classList.remove("active");
      sidePanel.setAttribute("aria-hidden", "true");
      // close accordions as well
      panelServicesList.classList.remove("open");
      panelServicesBtn.classList.remove("open");
      panelDevList.classList.remove("open");
      panelDevBtn.classList.remove("open");
      panelDevBtn.setAttribute("aria-expanded", "false");
    }

    menuBtn.addEventListener("click", openPanel);
    closePanelBtn.addEventListener("click", closePanel);
    overlay.addEventListener("click", closePanel);

    // Escape key closes panel
    window.addEventListener("keydown", function(e) {
      if (e.key === "Escape") closePanel();
    });

    // Close panel when any panel link is clicked
    sidePanel.querySelectorAll("a").forEach(function(link) {
      link.addEventListener("click", closePanel);
    });

    // ===== Top navbar Services hover dropdown =====
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
        // also close the flyout (touch devices)
        servicesMenu.querySelectorAll("li.has-sub.open").forEach(function(li) {
          li.classList.remove("open");
        });
      }, 120);
    }

    servicesDropdown.addEventListener("mouseenter", openServices);
    servicesDropdown.addEventListener("mouseleave", closeServices);

    // ===== Touch devices: first tap opens the flyout, second tap follows the link =====
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

    // ===== Side panel Services accordion =====
    panelServicesBtn.addEventListener("click", function() {
      const isOpen = panelServicesList.classList.toggle("open");
      panelServicesBtn.classList.toggle("open", isOpen);
    });

    // ===== Side panel: Web Developer Solutions nested accordion =====
    panelDevBtn.addEventListener("click", function() {
      const isOpen = panelDevList.classList.toggle("open");
      panelDevBtn.classList.toggle("open", isOpen);
      panelDevBtn.setAttribute("aria-expanded", String(isOpen));
    });
  })();
</script>