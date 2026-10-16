<section class="hero" id="hero">

  <div class="hero-inner">
    <img class="hero-media"
         src="assets/img/hero-3d.png"
         alt="" aria-hidden="true">

    <div class="hero-content">
      <h1 class="hero-title"><span>Welcome to</span>WebsDesignUSA</h1>
      <h3 class="hero-sub">Custom Web Design | E-Commerce Solutions | SEO That Drives Results</h3>
      <p class="hero-text">We create new technologies for your business thanks to our wonderful team of professionals.</p>

      <button class="hero-play" id="playBtn" type="button" aria-label="Play video">
        <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 150 150" fill="none" aria-hidden="true">
          <circle cx="75" cy="75" r="40" fill="#057662"/>
          <g opacity="0.65" filter="url(#f0)"><circle cx="75" cy="75" r="49" stroke="#057662" stroke-width="2"/></g>
          <g opacity="0.45" filter="url(#f1)"><circle cx="75" cy="75" r="64" stroke="#057662" stroke-width="2"/></g>
          <path d="M84.2453 74.0085C85.2516 74.5895 85.2516 76.042 84.2453 76.623L67.2642 86.427C66.2579 87.008 65 86.2818 65 85.1198L65 65.5117C65 64.3497 66.2579 63.6235 67.2642 64.2045L84.2453 74.0085Z" fill="white"/>
          <defs>
            <filter id="f0" x="19" y="19" width="112" height="112" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feGaussianBlur stdDeviation="3"/></filter>
            <filter id="f1" x="0" y="0" width="150" height="150" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feGaussianBlur stdDeviation="5"/></filter>
          </defs>
        </svg>
      </button>
    </div>
  </div>
</section>

<!-- ============ ABOUT ============ -->
<section class="cvg-about" id="cvg-about">
  <div class="cvg-about-inner">

    <figure class="cvg-about-media" data-reveal="media">
      <img class="cvg-about-photo" loading="lazy"
           src="assets/img/home-about-section.jpg"
           alt="Designer looking at a city skyline with floating digital screens">
    </figure>

    <div class="cvg-about-content">
      <p class="cvg-about-eyebrow" data-reveal="eyebrow">About us</p>

      <h2 class="cvg-about-title" data-reveal="title">
        <span class="cvg-line"><span class="cvg-line-in">We are Experts in</span></span>
        <span class="cvg-line"><span class="cvg-line-in cvg-about-title-mint">Digital Solutions</span></span>
      </h2>

      <p class="cvg-about-text" data-reveal="up" style="--d:.35s">
        At <strong class="cvg-about-strong">CREATIVE CONVERGE</strong>, we are passionate about crafting visually stunning and
        high-performing websites that drive results. With a team of innovative designers, skilled
        developers, and strategic marketers, we transform ideas into digital realities tailored to
        your unique business goals.
      </p>
      <p class="cvg-about-text" data-reveal="up" style="--d:.5s">
        Our expertise spans across responsive web design, e-commerce development, and user
        experience (UX) optimization. We pride ourselves on creating websites that not only look
        great but also rank higher on search engines, driving organic traffic and conversions.
      </p>

      <div class="cvg-about-actions" data-reveal="up" style="--d:.65s">
        <a href="about-us/" class="cvg-about-btn cvg-about-btn-mint">
          Read more
          <svg class="cvg-about-btn-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>
        </a>
        <a href="services/" class="cvg-about-btn cvg-about-btn-ghost">Our services</a>
      </div>
    </div>
  </div>

  <img class="cvg-about-rocket" data-reveal="rocket" src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/08/rocket-no-bg.png" alt="" aria-hidden="true">
</section>

<!-- ============ ABOUT: scroll reveal JS ============ -->
<script>
(function () {
  document.documentElement.classList.add('cvg-js');
  var section = document.getElementById('cvg-about');
  if (!section) return;
  var els = section.querySelectorAll('[data-reveal]:not(.cvg-about-rocket)');
  var rocket = section.querySelector('.cvg-about-rocket');

  /* ---- Rocket: scroll ke saath neeche se upar ---- */
  if (rocket) {
    var ticking = false;
    var updateRocket = function () {
      ticking = false;
      var r = section.getBoundingClientRect(), vh = window.innerHeight;
      var p = (vh - r.top) / (vh + r.height);          // 0 = section abhi aaya, 1 = section nikal gaya
      p = Math.min(1, Math.max(0, p));
      var range = window.innerWidth < 768 ? 260 : 700;  // kitna upar jaye (px) - badal sakte ho
      rocket.style.setProperty('--ry', ((0.5 - p) * range).toFixed(1) + 'px');
    };
    var onScroll = function () {
      if (!ticking) { ticking = true; requestAnimationFrame(updateRocket); }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);
    updateRocket();
  }

  /* ---- Text / image reveal (scroll up/down par repeat) ---- */
  if (!('IntersectionObserver' in window)) {
    els.forEach(function (el) { el.classList.add('is-in'); });
    return;
  }
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting && e.intersectionRatio >= 0.15) e.target.classList.add('is-in');
      else if (!e.isIntersecting) e.target.classList.remove('is-in');
    });
  }, { threshold: [0, 0.15], rootMargin: '0px 0px -6% 0px' });
  els.forEach(function (el) { io.observe(el); });
})();
</script>