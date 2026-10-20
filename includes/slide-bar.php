<!-- ============ CREATIVE CONVERGE — CLIENT LOGOS STRIP ============ -->

<section class="cvg-logos" aria-label="Brands we have worked with">

  <!-- Squiggle shape: rotates 360° non-stop -->
  <img src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/ban.png" alt="" class="cvg-logos-shape" aria-hidden="true">

  <div class="cvg-logos-viewport">
    <div class="cvg-logos-track">

      <!-- Set 1 -->
      <div class="cvg-logos-set">
        <img src="<?= cvg_url('assets/img/car1.png') ?>" alt="Brand Name logo" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/2.png') ?>" alt="Interior Academia Design logo" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car3.png') ?>" alt="Design Studio logo" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car4.png') ?>" alt="Harrison Design Studio logo" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car5.png') ?>" alt="Handcrafted Studio logo" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car1.png') ?>" alt="Brand Name logo" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/2.png') ?>" alt="Interior Academia Design logo" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car3.png') ?>" alt="Design Studio logo" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car4.png') ?>" alt="Harrison Design Studio logo" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car5.png') ?>" alt="Handcrafted Studio logo" class="cvg-logos-img">
      </div>

      <!-- Set 2: exact copy so the loop never shows a gap (hidden from screen readers) -->
      <div class="cvg-logos-set" aria-hidden="true">
        <img src="<?= cvg_url('assets/img/car1.png') ?>" alt="" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/2.png') ?>" alt="" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car4.png') ?>" alt="" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car3.png') ?>" alt="" class="cvg-logos-img">
        <img src="<?= cvg_url('assets/img/car5.png') ?>" alt="" class="cvg-logos-img">
      </div>

    </div>
  </div>
</section>
<style>
    /* =========================================================
   CREATIVE CONVERGE — Client logos strip
   - Logos slide right-to-left non-stop (pauses on hover)
   - Squiggle shape on the left rotates 360° non-stop
   Every rule is scoped to .cvg-logos, so nothing here
   touches the rest of your site.
   ========================================================= */

.cvg-logos {
  /* Easy controls */
  --cvg-logos-speed: 30s;    /* time for one full loop: lower = faster */
  --cvg-logos-spin: 3s;     /* time for one full turn of the shape */
  --cvg-logos-gap: 110px;    /* space between logos */
  --cvg-logos-height: 72px;  /* logo height */

  position: relative;
  overflow: hidden;
  box-sizing: border-box;
  width: 100%;
  padding: 56px 0;
  background: #0A0A0A;
  border-bottom: 1px solid #1E2A27;
}

.cvg-logos *,
.cvg-logos *::before,
.cvg-logos *::after { box-sizing: border-box; }

/* ---------- Rotating squiggle ---------- */
.cvg-logos .cvg-logos-shape {
  position: absolute;
  left: -40px;
  top: 50%;
  z-index: 0;
  width: 300px;
  height: auto;
  max-width: none;
  margin: -150px 0 0;
  opacity: 0.55;
  pointer-events: none;
  animation: cvgLogosSpin var(--cvg-logos-spin) linear infinite;
}

@keyframes cvgLogosSpin {
  from { transform: rotate(0deg); }
  to   { transform: rotate(360deg); }
}

/* ---------- Moving logo bar ---------- */
.cvg-logos .cvg-logos-viewport {
  position: relative;
  z-index: 1;
  overflow: hidden;
  /* Logos fade in and out at the edges */
  -webkit-mask-image: linear-gradient(90deg, transparent 0%, #000 12%, #000 88%, transparent 100%);
          mask-image: linear-gradient(90deg, transparent 0%, #000 12%, #000 88%, transparent 100%);
}

.cvg-logos .cvg-logos-track {
  display: flex;
  width: max-content;
  animation: cvgLogosScroll var(--cvg-logos-speed) linear infinite;
}

.cvg-logos:hover .cvg-logos-track { animation-play-state: paused; }

.cvg-logos .cvg-logos-set {
  display: flex;
  flex: none;
  align-items: center;
  gap: var(--cvg-logos-gap);
  padding-right: var(--cvg-logos-gap);
}

@keyframes cvgLogosScroll {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}

.cvg-logos .cvg-logos-img {
  display: block;
  flex: none;
  width: auto;
  height: var(--cvg-logos-height);
  max-width: none;
  margin: 0;
  border-radius: 0;
  object-fit: contain;
  opacity: 0.55;
  filter: grayscale(1) brightness(1.4);
  transition: opacity 0.4s ease, filter 0.4s ease, transform 0.4s ease;
}

/* Hovered logo lights up in mint */
.cvg-logos .cvg-logos-img:hover {
  opacity: 1;
  filter: grayscale(1) brightness(1.6) sepia(1) hue-rotate(115deg) saturate(4);
  transform: scale(1.08);
}

/* ---------- Responsive ---------- */
@media (max-width: 1024px) {
  .cvg-logos { --cvg-logos-gap: 80px; --cvg-logos-height: 60px; }
  .cvg-logos .cvg-logos-shape { width: 240px; margin-top: -120px; }
}

@media (max-width: 767px) {
  .cvg-logos { --cvg-logos-gap: 56px; --cvg-logos-height: 48px; --cvg-logos-speed: 22s; padding: 40px 0; }
  .cvg-logos .cvg-logos-shape { width: 180px; margin-top: -90px; left: -60px; opacity: 0.4; }
}

/* Visitors who turned off motion get a still, centred row */
@media (prefers-reduced-motion: reduce) {
  .cvg-logos .cvg-logos-track,
  .cvg-logos .cvg-logos-shape { animation: none; }
  .cvg-logos .cvg-logos-set[aria-hidden="true"] { display: none; }
  .cvg-logos .cvg-logos-track { width: 100%; justify-content: center; }
  .cvg-logos .cvg-logos-set { flex-wrap: wrap; justify-content: center; padding-right: 0; }
}
</style>