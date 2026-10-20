<!-- Poppins font (agar site mein pehle se load hai to hata do) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">


<link rel="stylesheet" href="assets/css/latest-cases.css">


<script>document.documentElement.classList.add('olc-js');</script>


<section class="olc" id="olc">
  <div class="olc-container">

    <!-- Header -->
    <div class="olc-header">

      <span class="olc-watermark" aria-hidden="true">portfolio</span>

      <div class="olc-head-left">
        <div class="olc-reveal" style="--from:.8;--delay:100ms">
          <div class="olc-reveal-in">
            <div class="olc-eyebrow">
              <span class="olc-eyebrow-line"></span>
              <span class="olc-eyebrow-text">portfolio</span>
            </div>
          </div>
        </div>

        <div class="olc-reveal" style="--from:.85;--delay:200ms">
          <div class="olc-reveal-in">
            <h2 class="olc-title">Our latest cases<span class="olc-dot">.</span></h2>
          </div>
        </div>

        <div class="olc-reveal" style="--from:.9;--delay:300ms">
          <div class="olc-reveal-in">
            <p class="olc-lead">
              We always try to implement our creative ideas at the highest level. You can see it by looking at our portfolio.
            </p>
          </div>
        </div>
      </div>

      <div class="olc-head-right">
        <div class="olc-reveal" style="--from:.9;--delay:400ms">
          <div class="olc-reveal-in">
            <a href="<?= cvg_url('cases/index.php') ?>" class="olc-viewall">VIEW ALL CASES</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Grid -->
    <div class="olc-grid">

      <!-- Card 1 -->
      <div class="olc-reveal" style="--from:.85;--delay:150ms">
        <div class="olc-reveal-in">
          <div class="olc-card" tabindex="0" role="button"
               data-title="Web site design for curious company"
               data-popup="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/08/AR_FF.jpg">
            <img class="olc-card-img" loading="lazy"
                 src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/08/AR_FF.jpg"
                 alt="Web site design for curious company">
            <div class="olc-card-shade"></div>
            <div class="olc-card-body">
              <span class="olc-card-cat">Mobile App / Fintech</span>
              <h3 class="olc-card-title">Web site design for curious company</h3>
              <div class="olc-card-more"><span>Explore Project</span><span>→</span></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="olc-reveal" style="--from:.85;--delay:250ms">
        <div class="olc-reveal-in">
          <div class="olc-card" tabindex="0" role="button"
               data-title="Modern Kitchen &amp; Furniture Showcase"
               data-popup="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/08/appscreens.jpg">
            <img class="olc-card-img" loading="lazy"
                 src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/08/appscreens.jpg"
                 alt="Modern Kitchen &amp; Furniture Showcase">
            <div class="olc-card-shade"></div>
            <div class="olc-card-body">
              <span class="olc-card-cat">E-Commerce / Interior</span>
              <h3 class="olc-card-title">Modern Kitchen &amp; Furniture Showcase</h3>
              <div class="olc-card-more"><span>Explore Project</span><span>→</span></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="olc-reveal" style="--from:.85;--delay:350ms">
        <div class="olc-reveal-in">
          <div class="olc-card" tabindex="0" role="button"
               data-title="Fruit N Boba Tea Storefront"
               data-popup="https://images.unsplash.com/photo-1551024506-0bccd828d307?q=80&amp;w=800&amp;auto=format&amp;fit=crop">
            <img class="olc-card-img" loading="lazy"
                 src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&amp;w=1000&amp;auto=format&amp;fit=crop"
                 alt="Fruit N Boba Tea Storefront">
            <div class="olc-card-shade"></div>
            <div class="olc-card-body">
              <span class="olc-card-cat">Food &amp; Beverage</span>
              <h3 class="olc-card-title">Fruit N Boba Tea Storefront</h3>
              <div class="olc-card-more"><span>Explore Project</span><span>→</span></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="olc-reveal" style="--from:.85;--delay:450ms">
        <div class="olc-reveal-in">
          <div class="olc-card" tabindex="0" role="button"
               data-title="Browse Nature's Remedy &amp; CBD"
               data-popup="https://images.unsplash.com/photo-1608248543803-ba4f8c70ae0b?q=80&amp;w=800&amp;auto=format&amp;fit=crop">
            <img class="olc-card-img" loading="lazy"
                 src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&amp;w=1000&amp;auto=format&amp;fit=crop"
                 alt="Browse Nature's Remedy &amp; CBD">
            <div class="olc-card-shade"></div>
            <div class="olc-card-body">
              <span class="olc-card-cat">Health &amp; Wellness</span>
              <h3 class="olc-card-title">Browse Nature's Remedy &amp; CBD</h3>
              <div class="olc-card-more"><span>Explore Project</span><span>→</span></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Lightbox (JS isko <body> mein shift kar deti hai) -->
  <div class="olc-lb" id="olcLb" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="olc-lb-backdrop" data-close></div>

    <div class="olc-lb-bar">
      <button type="button" id="olcLbFs" title="Fullscreen" aria-label="Fullscreen">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
      </button>
      <button type="button" id="olcLbZoom" title="Zoom" aria-label="Zoom">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
      </button>
      <button type="button" id="olcLbShare" title="Share" aria-label="Copy link">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3.316 3.316 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3.316 3.316 0 00-5.368-2.684z"/></svg>
      </button>
      <button type="button" class="olc-lb-x" data-close title="Close" aria-label="Close">✕</button>
    </div>

    <div class="olc-lb-stage" id="olcLbStage">
      <div class="olc-lb-box" id="olcLbBox">
        <img id="olcLbImg" src="" alt="" draggable="false">
      </div>
    </div>

    <div class="olc-lb-foot"><span id="olcLbTitle"></span></div>
  </div>
</section>
<style>
    /* =========================================================
   OUR LATEST CASES  (Tailwind/React -> plain CSS)
   Breakpoints: sm = 640px, md = 768px, lg = 1024px
   ========================================================= */

.olc, .olc *, .olc *::before, .olc *::after,
.olc-lb, .olc-lb *, .olc-lb *::before, .olc-lb *::after { box-sizing: border-box; }

.olc {
  position: relative;
  overflow: hidden;
  padding: 80px 24px;
  background: #000;
  color: #fff;
  font-family: 'Poppins', sans-serif;
}
.olc img { display: block; max-width: 100%; }
.olc h2, .olc h3, .olc p { margin: 0; font-weight: 400; }

.olc-container { width: 100%; max-width: 1280px; margin: 0 auto; }

/* ---------- reveal (scale from --from -> 1) ---------- */
.olc-reveal-in { transform-origin: center; }
.olc-js .olc-reveal-in { opacity: 0; transform: scale(var(--from, .85)); }
.olc-js .olc-reveal.is-in .olc-reveal-in {
  opacity: 1; transform: scale(1);
  transition: opacity .9s ease-out var(--delay, 0ms),
              transform .9s cubic-bezier(.22,.61,.36,1) var(--delay, 0ms);
}

/* ---------- header ---------- */
.olc-header {
  position: relative; margin-bottom: 56px;
  display: flex; flex-direction: column;
}
.olc-watermark {
  position: absolute; top: -40px; left: 0; z-index: 0;
  font-size: 72px; line-height: 1;
  text-transform: uppercase; letter-spacing: .05em;
  color: rgba(255,255,255,.04);
  pointer-events: none; user-select: none;
}
.olc-head-left, .olc-head-right { position: relative; z-index: 10; }
.olc-head-right { margin-top: 24px; }

.olc-eyebrow { display: flex; align-items: center; gap: 12px; }
.olc-eyebrow-line { display: inline-block; width: 48px; height: 2px; background: #fff; }
.olc-eyebrow-text { font-size: 14px; line-height: 20px; font-weight: 400; letter-spacing: .025em; color: rgba(255,255,255,.8); }

.olc-title { margin-top: 8px !important; font-size: 36px; line-height: 40px; letter-spacing: -.025em; }
.olc-dot { color: #00A8A8; }
.olc-lead {
  margin-top: 12px !important; max-width: 600px;
  font-size: 14px; line-height: 1.625; color: rgba(255,255,255,.7);
}
.olc-viewall {
  display: inline-flex; align-items: center; gap: 8px;
  font-size: 14px; line-height: 20px; font-weight: 500; letter-spacing: .05em;
  color: #fff; text-decoration: none;
  transition: color .15s ease;
}
.olc-viewall:hover { color: #00A8A8; }

/* ---------- grid ---------- */
.olc-grid { display: grid; grid-template-columns: 1fr; gap: 24px; }

.olc-card {
  position: relative; width: 100%; height: 420px;
  overflow: hidden; cursor: pointer; background: #171717;
}
.olc-card:focus-visible { outline: 2px solid #00A8A8; outline-offset: 2px; }

.olc-card-img {
  position: absolute; inset: 0; width: 100%; height: 100%;
  object-fit: cover; object-position: top;
  transition: transform .7s ease-out;
}
.olc-card:hover .olc-card-img { transform: scale(1.05); }

.olc-card-shade {
  position: absolute; inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,.8), rgba(0,0,0,.2), transparent);
  opacity: .6; transition: opacity .3s ease;
}
.olc-card:hover .olc-card-shade { opacity: .9; }

.olc-card-body {
  position: absolute; inset: 0; padding: 24px;
  display: flex; flex-direction: column; justify-content: flex-end; color: #fff;
}
.olc-card-cat { margin-bottom: 4px; font-size: 12px; line-height: 16px; font-weight: 500; color: #00A8A8; }
.olc-card-title { font-size: 18px; line-height: 1.375; }
.olc-card-more {
  margin-top: 16px; display: flex; align-items: center; gap: 8px;
  font-size: 14px; line-height: 20px; font-weight: 500; color: rgba(255,255,255,.8);
  opacity: 0; transform: translateY(8px);
  transition: all .3s ease;
}
.olc-card:hover .olc-card-more,
.olc-card:focus-visible .olc-card-more { opacity: 1; transform: translateY(0); }

/* ---------- lightbox ---------- */
.olc-lb {
  position: fixed; inset: 0; z-index: 9999;
  display: flex; flex-direction: column; user-select: none;
  font-family: 'Poppins', sans-serif;
  opacity: 0; visibility: hidden;
  transition: opacity .25s ease, visibility 0s linear .25s;
}
.olc-lb.is-open { opacity: 1; visibility: visible; transition: opacity .25s ease; }

.olc-lb-backdrop {
  position: absolute; inset: 0;
  background: rgba(0,0,0,.9);
  -webkit-backdrop-filter: blur(24px); backdrop-filter: blur(24px);
}
.olc-lb-bar {
  position: relative; z-index: 20;
  display: flex; align-items: center; justify-content: flex-end; gap: 24px;
  padding: 16px 24px; color: #fff;
}
.olc-lb-bar button {
  padding: 0; border: 0; background: none; cursor: pointer;
  color: rgba(255,255,255,.7); line-height: 0;
  transition: color .15s ease;
}
.olc-lb-bar button:hover { color: #fff; }
.olc-lb-bar button svg { width: 20px; height: 20px; }
.olc-lb-bar .olc-lb-x { padding: 4px; font-size: 20px; line-height: 28px; font-family: inherit; }

.olc-lb-stage {
  position: relative; z-index: 10;
  display: flex; flex: 1 1 0%; align-items: center; justify-content: center;
  overflow: hidden; padding: 0 16px 16px;
}
.olc-lb-box {
  display: flex; align-items: center; justify-content: center; overflow: hidden;
  max-height: 85vh; max-width: 90vw;
  border-radius: 8px; background: #fff;
  box-shadow: 0 25px 50px -12px rgba(0,0,0,.25);
  opacity: 0; transform: translateY(20px) scale(.95);
  transition: opacity .2s ease, transform .2s ease, max-width .3s ease;
}
.olc-lb.is-open .olc-lb-box {
  opacity: 1; transform: none;
  transition: opacity .35s cubic-bezier(.22,1,.36,1),
              transform .35s cubic-bezier(.22,1,.36,1),
              max-width .3s ease;
}
.olc-lb-box.is-zoomed { max-width: 96vw; }
.olc-lb-box img {
  display: block; max-height: 85vh; max-width: 100%;
  width: auto; height: auto; object-fit: contain;
}

.olc-lb-foot { position: relative; z-index: 20; padding: 12px 0; text-align: center; }
.olc-lb-foot span { font-size: 14px; line-height: 20px; letter-spacing: .05em; color: rgba(255,255,255,.8); }

/* ---------- sm >= 640px ---------- */
@media (min-width: 640px) {
  .olc { padding-left: 40px; padding-right: 40px; }
  .olc-watermark { font-size: 96px; }
  .olc-title { font-size: 48px; line-height: 1; }
  .olc-lead { font-size: 16px; line-height: 1.625; }
  .olc-grid { grid-template-columns: 1fr 1fr; }
  .olc-card { height: 450px; }
  .olc-card-title { font-size: 20px; line-height: 1.375; }
}
/* ---------- md >= 768px ---------- */
@media (min-width: 768px) {
  .olc-header { flex-direction: row; align-items: flex-end; justify-content: space-between; }
  .olc-watermark { top: -64px; }
  .olc-head-right { margin-top: 0; }
}
/* ---------- lg >= 1024px ---------- */
@media (min-width: 1024px) {
  .olc { padding: 130px 100px; }
  .olc-watermark { font-size: 140px; }
  .olc-title { font-size: 60px; }
  .olc-grid { grid-template-columns: repeat(4, 1fr); }
}

/* ---------- reduced motion ---------- */
@media (prefers-reduced-motion: reduce) {
  .olc-js .olc-reveal-in { opacity: 1 !important; transform: none !important; transition: none !important; }
  .olc-lb, .olc-lb-box, .olc-card-img, .olc-card-shade, .olc-card-more { transition: none !important; }
}
</style>
<!-- JS: latest-cases.js -->
<script src="assets/js/latest-cases.js"></script>