<!-- Poppins font (agar site mein pehle se load hai to hata do) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;800&display=swap" rel="stylesheet">

<!-- CSS: why-choose-us.css apne main css mein paste karo ya link karo -->
<link rel="stylesheet" href="assets/css/why-choose-us.css">

<!-- JS-enabled flag (flash se bachne ke liye section se pehle) -->
<script>document.documentElement.classList.add('wcu-js');</script>

<!-- ============ WHY CHOOSE US ============ -->
<section class="wcu" id="wcu">

  <!-- Bottom marquee graphic -->
  <div class="wcu-marquee-wrap" aria-hidden="true">
    <div class="wcu-marquee">
      <img src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/WEBS-DESIGN-USA.png" alt="">
      <img src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/WEBS-DESIGN-USA.png" alt="">
    </div>
  </div>

  <span class="wcu-bgword" aria-hidden="true">CHOOSE</span>

  <div class="wcu-grid">

    <!-- LEFT: stat cards -->
    <div class="wcu-left">
      <div class="wcu-cards">

        <div class="wcu-par" data-par="0">
          <div class="wcu-enter" style="--i:0">
            <div class="wcu-card">
              <div class="wcu-num"><span class="wcu-count" data-to="235">0</span></div>
              <span class="wcu-line"></span>
              <div class="wcu-label">Satisfied Clients</div>
            </div>
          </div>
        </div>

        <div class="wcu-par" data-par="1">
          <div class="wcu-enter" style="--i:1">
            <div class="wcu-card">
              <div class="wcu-num"><span class="wcu-count" data-to="15">0</span></div>
              <span class="wcu-line"></span>
              <div class="wcu-label">Awards Winning</div>
            </div>
          </div>
        </div>

        <div class="wcu-par" data-par="2">
          <div class="wcu-enter" style="--i:2">
            <div class="wcu-card">
              <div class="wcu-num"><span class="wcu-count" data-to="235">0</span></div>
              <span class="wcu-line"></span>
              <div class="wcu-label">Satisfied Clients</div>
            </div>
          </div>
        </div>

        <div class="wcu-par" data-par="3">
          <div class="wcu-enter" style="--i:3">
            <div class="wcu-card">
              <div class="wcu-num"><span class="wcu-count" data-to="354">0</span></div>
              <span class="wcu-line"></span>
              <div class="wcu-label">Successful Projects</div>
            </div>
          </div>
        </div>

      </div>

      <!-- Diagonal line decoration -->
      <div class="wcu-deco" aria-hidden="true">
        <img src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/choose.png"
             alt="" width="500" height="500">
      </div>
    </div>

    <!-- RIGHT: content -->
    <div class="wcu-right">

      <div class="wcu-reveal" style="--from:.8;--delay:100ms">
        <div class="wcu-reveal-in">
          <div class="wcu-sub">
            <span class="wcu-sub-line"></span>
            <span class="wcu-sub-text">a few words</span>
          </div>
        </div>
      </div>

      <div class="wcu-reveal" style="--from:.185;--delay:200ms">
        <div class="wcu-reveal-in">
          <h2 class="wcu-title">Why choose us</h2>
        </div>
      </div>

      <div class="wcu-reveal" style="--from:.129;--delay:300ms">
        <div class="wcu-reveal-in">
          <p class="wcu-desc">
            We’ve got a lot of awards for our products and services that became
            popular in the world.
          </p>
        </div>
      </div>

      <div class="wcu-reveal" style="--from:.119;--delay:400ms">
        <div class="wcu-reveal-in">
          <div class="wcu-feature wcu-feature-1">
            <h3>Modern Technologies</h3>
            <p>
              As a web design company, we utilize a range of modern technologies
              to create dynamic, responsive websites. We use design tools like
              Figma, Adobe XD, and Sketch for collaborative, high-quality design
              work. For frontend development, we rely on HTML5, CSS3,
              JavaScript, and frameworks like React.js and Vue.js. On the
              backend, we work with technologies such as Node.js, PHP, and
              Python
            </p>
          </div>
        </div>
      </div>

      <div class="wcu-reveal" style="--from:.110;--delay:800ms">
        <div class="wcu-reveal-in">
          <div class="wcu-feature wcu-feature-2">
            <h3>Huge Digital Experience</h3>
            <p>
              Our company has been developing digital products for 15 years.
              We’ve got a lot of awards for our work.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<style>
    /* =========================================================
   WHY CHOOSE US  (Tailwind/React -> plain CSS)
   Breakpoints: sm = 640px, lg = 1024px
   ========================================================= */

.wcu, .wcu *, .wcu *::before, .wcu *::after { box-sizing: border-box; }

.wcu {
  --wcu-grad: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, 0.45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
  position: relative;
  overflow: hidden;
  padding: 80px 24px;
  background: var(--wcu-grad);
  font-family: 'Poppins', sans-serif;
  color: #fff;
}
.wcu h2, .wcu h3, .wcu p { margin: 0; font-weight: 400; }
.wcu img { display: block; }

/* ---------- bottom marquee ---------- */
.wcu-marquee-wrap {
  position: absolute; bottom: 0; left: 0; z-index: 0;
  width: 100%; overflow: hidden; opacity: .25;
  pointer-events: none; user-select: none;
}
.wcu-marquee {
  display: flex; width: max-content;
  animation: wcu-marquee 20s linear infinite;
}
.wcu-marquee img { flex-shrink: 0; height: 80px; margin: 0 16px; object-fit: contain; }
@keyframes wcu-marquee {
  0%   { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

/* ---------- big outlined word ---------- */
.wcu-bgword {
  position: absolute; top: 16px; left: 0; z-index: 0;   /* -top-6 + mt-10 */
  font-size: 72px; line-height: 1; font-weight: 800;
  text-transform: uppercase; letter-spacing: .1em;
  color: rgba(255,255,255,.04);
  pointer-events: none; user-select: none;
}

/* ---------- main grid ---------- */
.wcu-grid {
  position: relative; z-index: 10;
  display: grid; grid-template-columns: 1fr;
  align-items: center; gap: 56px;
  width: 100%; max-width: 1750px; margin: 0 auto;
}

/* ---------- LEFT ---------- */
.wcu-left { position: relative; }
.wcu-cards { display: grid; grid-template-columns: 1fr; gap: 20px; }

.wcu-par { position: relative; z-index: 10; will-change: transform; }   /* JS parallax yahan lagta hai */

/* entrance (fade + scale + up), stagger via --i */
.wcu-enter { transition: none; }
.wcu-js .wcu-enter { opacity: 0; transform: translateY(30px) scale(.92); }
.wcu-js .wcu-enter.is-in {
  opacity: 1; transform: none;
  transition: opacity .8s cubic-bezier(.22,1,.36,1) calc(var(--i) * .12s),
              transform .8s cubic-bezier(.22,1,.36,1) calc(var(--i) * .12s);
}

.wcu-card {
  position: relative; overflow: hidden; cursor: default;
  display: flex; flex-direction: column; align-items: center; justify-content: center;
  width: 100%; height: 180px; text-align: center; color: #fff;
  background: var(--wcu-grad);
  border: 0; border-radius: 0;
  box-shadow: 0 20px 50px rgba(0,0,0,.4);
  transition: translate .4s cubic-bezier(.22,1,.36,1), scale .4s cubic-bezier(.22,1,.36,1), box-shadow .5s ease;
}
.wcu-card:hover { translate: 0 -8px; scale: 1.03; box-shadow: 0 30px 70px rgba(0,0,0,.6); }

.wcu-num { position: relative; font-size: 48px; line-height: 1; letter-spacing: -.025em; }
.wcu-line {
  position: relative; display: block; margin-top: 12px;
  width: 40px; height: 2px; border-radius: 999px;
  background: rgba(255,255,255,.7);
  transition: width .5s ease;
}
.wcu-card:hover .wcu-line { width: 80px; }
.wcu-label { position: relative; margin-top: 12px; font-size: 16px; line-height: 24px; font-weight: 400; letter-spacing: .025em; color: rgba(255,255,255,.9); }

/* diagonal decoration (mobile par hidden) */
.wcu-deco {
  display: none; position: absolute; top: -64px; left: 16px; z-index: 20;
  opacity: .4; mix-blend-mode: overlay; pointer-events: none;
}
.wcu-deco img { width: 500px; height: auto; max-width: none; object-fit: contain; }

/* ---------- RIGHT ---------- */
.wcu-right { position: relative; display: flex; flex-direction: column; justify-content: center; overflow: hidden; }

/* reveal (scale from --from -> 1) */
.wcu-reveal-in { transform-origin: center; }
.wcu-js .wcu-reveal-in { opacity: 0; transform: scale(var(--from, .85)); }
.wcu-js .wcu-reveal.is-in .wcu-reveal-in {
  opacity: 1; transform: scale(1);
  transition: opacity .9s ease-out var(--delay, 0ms),
              transform .9s cubic-bezier(.22,.61,.36,1) var(--delay, 0ms);
}

.wcu-sub { position: relative; z-index: 10; display: flex; align-items: center; gap: 12px; }
.wcu-sub-line { display: inline-block; width: 48px; height: 2px; background: #fff; }
.wcu-sub-text { font-size: 14px; line-height: 20px; font-weight: 400; }

.wcu-title {
  position: relative; z-index: 10; margin-top: 8px !important;
  font-size: 48px; line-height: 1.25; letter-spacing: -.025em;
}
.wcu-desc {
  position: relative; z-index: 10; margin-top: 12px !important;
  max-width: 760px; font-size: 16px; line-height: 1.625; color: #fff;
}
.wcu-feature { position: relative; z-index: 10; padding-left: 0; }
.wcu-feature-1 { margin-top: 40px; }
.wcu-feature-2 { margin-top: 32px; }
.wcu-feature h3 { font-size: 20px; line-height: 28px; font-weight: 500; }
.wcu-feature p  { margin-top: 12px; font-size: 14px; line-height: 1.7; font-weight: 300; color: #fff; }

/* ---------- sm >= 640px ---------- */
@media (min-width: 640px) {
  .wcu { padding-left: 40px; padding-right: 40px; }
  .wcu-bgword { font-size: 96px; top: 0; }                 /* md: -top-10 + mt-10 */
  .wcu-cards { grid-template-columns: 1fr 1fr; column-gap: 28px; row-gap: 36px; }
  .wcu-card { height: 210px; }
  .wcu-num { font-size: 60px; }
  .wcu-label { font-size: 18px; line-height: 28px; }
  .wcu-deco { display: block; }
  .wcu-title { font-size: 60px; }
  .wcu-desc { font-size: 18px; line-height: 1.625; }
  .wcu-feature { padding-left: 48px; }
  .wcu-feature h3 { font-size: 24px; line-height: 32px; }
  .wcu-feature p { font-size: 15px; }
}

/* ---------- lg >= 1024px ---------- */
@media (min-width: 1024px) {
  .wcu { padding: 130px 100px; }
  .wcu-bgword { font-size: 130px; }
  .wcu-grid { grid-template-columns: 1.2fr 1fr; gap: 56px; }
  .wcu-left { padding-right: 16px; }
  .wcu-card { height: 240px; }
  .wcu-marquee img { height: 128px; }
  .wcu-title { font-size: 72px; }
}

/* ---------- reduced motion ---------- */
@media (prefers-reduced-motion: reduce) {
  .wcu-marquee { animation: none; }
  .wcu-js .wcu-enter, .wcu-js .wcu-reveal-in {
    opacity: 1 !important; transform: none !important; transition: none !important;
  }
}
</style>
<!-- JS: why-choose-us.js -->
<script src="assets/js/why-choose-us.js"></script>