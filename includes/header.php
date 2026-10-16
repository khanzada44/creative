
  <!-- ===== Header ===== -->
  <header class="header">
    <div class="header-inner">

      <!-- LEFT: icon + logo + nav links -->
      <div class="header-left">

        <!-- Hamburger / menu icon -->
        <button class="menu-btn" id="menuBtn" aria-label="Open Menu">
          <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
            <path d="M0.711397 17.6359C-0.0696518 18.417 -0.0696518 19.6833 0.711397 20.4644C1.49245 21.2454 2.75878 21.2454 3.53982 20.4644L20.5104 3.4938C21.2914 2.71276 21.2914 1.44642 20.5104 0.665376C19.7293 -0.115673 18.463 -0.115672 17.682 0.665376L0.711397 17.6359Z" fill="white"/>
            <path d="M2.12558 31.7781C1.34453 30.997 1.34453 29.7307 2.12558 28.9496L19.0961 11.9791C19.8772 11.198 21.1435 11.198 21.9246 11.9791C22.7056 12.7601 22.7056 14.0264 21.9246 14.8075L4.95401 31.7781C4.17296 32.5591 2.90663 32.5591 2.12558 31.7781Z" fill="white"/>
            <path d="M13.4393 33.1923C12.6583 32.4112 12.6583 31.1449 13.4393 30.3638L30.4099 13.3933C31.1909 12.6122 32.4572 12.6122 33.2383 13.3933C34.0193 14.1743 34.0193 15.4407 33.2383 16.2217L16.2677 33.1923C15.4867 33.9733 14.2204 33.9733 13.4393 33.1923Z" fill="white"/>
          </svg>
        </button>

        <!-- Logo -->
        <a href="/" class="logo">
          <img src="https://creativeconverge.com/assets/images/logo-dark.png" alt="Creative Converge" />
        </a>

        <!-- Desktop nav -->
        <nav class="desktop-nav">

          <!-- Services dropdown -->
          <div class="services-dropdown" id="servicesDropdown">
            <button class="services-btn" id="servicesBtn" aria-haspopup="true" aria-expanded="false">
              Services
              <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
              </svg>
            </button>
            <div class="services-menu" id="servicesMenu">
              <ul>
                <li><a href="/services/logo-design">Logo Design Solutions</a></li>
                <li><a href="/services/illustration-design">Illustration Design</a></li>
                <li><a href="/services/web-design">Web Design Solutions</a></li>
                <li><a href="/services/branding">Branding</a></li>
                <li><a href="/services/ecommerce">Ecommerce Website Solutions</a></li>
                <li><a href="/services/video-animation">Stunning Video Animation Services</a></li>
              </ul>
            </div>
          </div>

          <a href="/pricing" class="nav-link">Pricing</a>
          <a href="/cases" class="nav-link">Cases</a>
          <a href="/contact" class="nav-link">Contact us</a>
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
        <a href="/about" class="panel-link">About us</a>
      </li>

      <!-- Services accordion -->
      <li>
        <button class="panel-services-btn" id="panelServicesBtn">
          Services
          <svg class="chevron-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="6 9 12 15 18 9"></polyline>
          </svg>
        </button>

        <ul class="panel-services-list" id="panelServicesList">
          <li><a href="/services/logo-design" class="panel-sub-link">Logo Design Solutions</a></li>
          <li><a href="/services/illustration-design" class="panel-sub-link">Illustration Design</a></li>
          <li><a href="/services/web-design" class="panel-sub-link">Web Design Solutions</a></li>
          <li><a href="/services/branding" class="panel-sub-link">Branding</a></li>
          <li><a href="/services/ecommerce" class="panel-sub-link">Ecommerce Website Solutions</a></li>
          <li><a href="/services/video-animation" class="panel-sub-link">Stunning Video Animation Services</a></li>
          <li><a href="/services/mobile-apps" class="panel-sub-link">Mobile Apps</a></li>
        </ul>
      </li>

      <li><a href="/pricing" class="panel-link">Pricing</a></li>
      <li><a href="/cases" class="panel-link">Cases</a></li>
      <li><a href="/contact" class="panel-link">Contact us</a></li>
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
  (function () {
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
    // close accordion as well
    panelServicesList.classList.remove("open");
    panelServicesBtn.classList.remove("open");
  }

  menuBtn.addEventListener("click", openPanel);
  closePanelBtn.addEventListener("click", closePanel);
  overlay.addEventListener("click", closePanel);

  // Escape key closes panel
  window.addEventListener("keydown", function (e) {
    if (e.key === "Escape") closePanel();
  });

  // Close panel when any panel link is clicked
  sidePanel.querySelectorAll("a").forEach(function (link) {
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
    closeTimer = setTimeout(function () {
      servicesMenu.classList.remove("open");
      servicesBtn.classList.remove("open");
      servicesBtn.setAttribute("aria-expanded", "false");
    }, 120);
  }

  servicesDropdown.addEventListener("mouseenter", openServices);
  servicesDropdown.addEventListener("mouseleave", closeServices);

  // ===== Side panel Services accordion =====
  panelServicesBtn.addEventListener("click", function () {
    const isOpen = panelServicesList.classList.toggle("open");
    panelServicesBtn.classList.toggle("open", isOpen);
  });
})();
</script>
