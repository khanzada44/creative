<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<div class="cvg-sp" id="cvg-sp" data-default="<?php echo esc_attr( $default ); ?>">

  <!-- HERO -->
  <section class="cvg-sp-hero">
    <div class="cvg-sp-wrap">
      <nav class="cvg-sp-crumbs" id="sp-crumbs" aria-label="Breadcrumb"></nav>
      <h1 class="cvg-sp-h1" id="sp-title"></h1>
      <p class="cvg-sp-sub" id="sp-subtitle"></p>
    </div>
  </section>

  <!-- SERVICE SWITCHER -->
  <div class="cvg-sp-switch">
    <div class="cvg-sp-wrap">
      <div class="cvg-sp-chips" id="sp-chips" role="tablist" aria-label="Services"></div>
      <div class="cvg-sp-chips cvg-sp-chips-sub" id="sp-subchips" role="tablist" aria-label="Sub services"></div>
    </div>
  </div>

  <!-- INTRO -->
  <section class="cvg-sp-sec">
    <div class="cvg-sp-wrap cvg-sp-intro">
      <div>
        <p class="cvg-sp-eyebrow">Introduction</p>
        <h2 class="cvg-sp-h2" id="sp-intro-title"></h2>
        <p class="cvg-sp-text" id="sp-intro-text"></p>
        <h3 class="cvg-sp-h3" id="sp-list-title"></h3>
        <ul class="cvg-sp-list" id="sp-list"></ul>
      </div>
      <div class="cvg-sp-media" id="sp-media"></div>
    </div>
  </section>

  <!-- CHILD SERVICES (sirf parent par) -->
  <section class="cvg-sp-sec cvg-sp-alt" id="sp-children-sec">
    <div class="cvg-sp-wrap">
      <p class="cvg-sp-eyebrow cvg-c">Choose a technology</p>
      <h2 class="cvg-sp-h2 cvg-c" id="sp-children-title"></h2>
      <div class="cvg-sp-cards" id="sp-children"></div>
    </div>
  </section>

  <!-- PORTFOLIO -->
  <section class="cvg-sp-sec cvg-sp-alt" id="sp-portfolio-sec">
    <div class="cvg-sp-wrap">
      <p class="cvg-sp-eyebrow cvg-c">Our Work</p>
      <h2 class="cvg-sp-h2 cvg-c">Our Portfolio</h2>
      <div class="cvg-sp-portfolio" id="sp-portfolio"></div>
    </div>
  </section>

  <!-- PRICING -->
  <section class="cvg-sp-sec" id="sp-pricing-sec">
    <div class="cvg-sp-wrap">
      <p class="cvg-sp-eyebrow cvg-c">Packages</p>
      <h2 class="cvg-sp-h2 cvg-c">Our Pricing</h2>
      <div class="cvg-sp-pricing" id="sp-pricing"></div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cvg-sp-cta">
    <div class="cvg-sp-wrap">
      <h2 class="cvg-sp-h2">Ready to start your project?</h2>
      <p class="cvg-sp-sub cvg-sp-sub-muted">Tell us what you need and we will make it work.</p>
      <a class="cvg-sp-btn-solid" href="/contact-us/">Get a Free Consultation
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>
      </a>
    </div>
  </section>

  <div class="cvg-sp-lightbox" id="sp-lightbox" hidden>
    <button type="button" class="cvg-sp-lightbox-close" aria-label="Close">&times;</button>
    <img src="" alt="">
  </div>
</div>
