<section class="hero" id="hero">

<style>
/* ---------- HERO 3D SHAPES ---------- */
.cc-h3d {
  --mx: 0; --my: 0; --sp: 0;
  position: absolute !important;
  z-index: 0;
  top: 50%;
  right: 40px;
  width: min(40%, 520px, 78vh) !important;
  aspect-ratio: 1 / 1;
  transform: translateY(-45%);
  pointer-events: none;
  margin: 0 !important;
}
/* glow peeche */
.cc-h3d::before {
  content: "";
  position: absolute;
  inset: 18% 14% 10%;
  border-radius: 50%;
  background: radial-gradient(closest-side, rgba(0,212,163,.32), rgba(0,212,163,0));
  filter: blur(30px);
  animation: cc-h3d-glow 6s ease-in-out infinite;
}
.cc-h3d .cc-h3d-part {
  position: absolute !important;
  display: block;
  /* mouse parallax + scroll spread */
  translate:
    calc(var(--mx) * var(--dp) * 1px + var(--sp) * var(--sx) * 1px)
    calc(var(--my) * var(--dp) * 1px + var(--sp) * var(--sy) * 1px);
  opacity: 0;
  scale: .6;
  transition:
    opacity .9s ease calc(var(--i) * .12s),
    scale 1.2s cubic-bezier(.2,1.4,.3,1) calc(var(--i) * .12s);
}
.cc-h3d--in .cc-h3d-part { opacity: 1; scale: 1; }
.cc-h3d .cc-h3d-part img {
  display: block;
  width: 100% !important;
  height: auto;
  max-width: none;
  margin: 0;
  border-radius: 0;
  box-shadow: none;
  will-change: transform;
}

/* positions (asli image ke hisaab se) */
.cc-h3d--torus  { left: 8.55%;  top: 35.55%; width: 81.27%; z-index: 1; }
.cc-h3d--big    { left: 32.64%; top: 25.36%; width: 37.09%; z-index: 2; }
.cc-h3d--dark   { left: 7.45%;  top: 13.73%; width: 16.18%; z-index: 3; }
.cc-h3d--captop { left: 60.73%; top: 10.45%; width: 33.36%; z-index: 3; }
.cc-h3d--capbot { left: 0;      top: 72.82%; width: 26.18%; z-index: 3; }
.cc-h3d--small  { left: 84.45%; top: 76.73%; width: 11.55%; z-index: 3; }

/* har shape: apni jagah par lagatar ghoomti hai (spin) + halka gol chakkar (orbit)
   --spin = ek chakkar ka time, chhota = tez */
.cc-h3d-part img {
  animation:
    cc-h3d-spin-self var(--spin, 20s) linear infinite var(--dir, normal),
    cc-h3d-round var(--orb, 10s) linear infinite;
}
.cc-h3d--torus img  { --spin: 40s; --dir: reverse; --r: 6px;  --orb: 14s; --tilt: 0deg; }
.cc-h3d--big img    { --spin: 22s; --dir: normal;  --r: 10px; --orb: 8s;  --tilt: 0deg;
                      filter: drop-shadow(0 30px 40px rgba(0,0,0,.45)); }
.cc-h3d--dark img   { --spin: 12s; --dir: normal;  --r: 22px; --orb: 9s;  --tilt: 0deg; }
.cc-h3d--captop img { --spin: 14s; --dir: reverse; --r: 18px; --orb: 12s; --tilt: 0deg; }
.cc-h3d--capbot img { --spin: 16s; --dir: normal;  --r: 20px; --orb: 11s; --tilt: 0deg; }
.cc-h3d--small img  { --spin: 8s;  --dir: reverse; --r: 26px; --orb: 7s;  --tilt: 0deg; }

/* apne center par 360 ghoomna ('rotate' property, transform se alag) */
@keyframes cc-h3d-spin-self {
  from { rotate: 0deg; }
  to   { rotate: 360deg; }
}

@keyframes cc-h3d-torus {
  0%, 100% { transform: translateY(0) rotate(0deg); }
  50%      { transform: translateY(-14px) rotate(-3deg); }
}
@keyframes cc-h3d-big {            /* ring ke andar upar neeche */
  0%, 100% { transform: translateY(0) scale(1); }
  50%      { transform: translateY(-34px) scale(1.02); }
}
/* gol chakkar: shape seedhi rehti hai, sirf circle mein ghoomti hai */
@keyframes cc-h3d-round {
  0%   { transform: rotate(0deg)   translateX(var(--r)) rotate(0deg)    rotate(var(--tilt)); }
  50%  { transform: rotate(180deg) translateX(var(--r)) rotate(-180deg) rotate(calc(var(--tilt) * -1)); }
  100% { transform: rotate(360deg) translateX(var(--r)) rotate(-360deg) rotate(var(--tilt)); }
}

/* ghoomte orbit rings (dashed circle + chamakta dot) */
.cc-h3d-ring {
  position: absolute;
  z-index: 0;
  left: 50%; top: 52%;
  border-radius: 50%;
  translate: -50% -50%;
  pointer-events: none;
}
.cc-h3d-ring::before {
  content: "";
  position: absolute; inset: 0;
  border-radius: 50%;
  border: 1.5px dashed rgba(95,240,200,.42);
}
.cc-h3d-ring--1 { width: 96%;  aspect-ratio: 1; animation: cc-h3d-spin 40s linear infinite; }
.cc-h3d-ring--2 { width: 72%;  aspect-ratio: 1; animation: cc-h3d-spin 26s linear infinite reverse; }
.cc-h3d-ring--2::before { border-style: solid; border-color: rgba(95,240,200,.2); }
.cc-h3d-ring b {
  position: absolute;
  top: -5px; left: 50%;
  width: 10px; height: 10px; margin-left: -5px;
  border-radius: 50%;
  background: #5FF0C8;
  box-shadow: 0 0 12px #00D4A3, 0 0 26px rgba(0,212,163,.7);
}
.cc-h3d-ring--2 b { width: 7px; height: 7px; margin-left: -3.5px; top: -3.5px; }
@keyframes cc-h3d-spin { to { rotate: 360deg; } }

@keyframes cc-h3d-glow {
  0%, 100% { opacity: .6; transform: scale(1); }
  50%      { opacity: 1;  transform: scale(1.08); }
}

@media (max-width: 1024px) {
  .cc-h3d { width: min(60%, 520px) !important; right: 0; opacity: .55; }
}
@media (max-width: 767px) {
  .cc-h3d {
    top: auto; bottom: -30px; right: -12%;
    width: 85% !important; opacity: .4;
    transform: none;
  }
}
@media (prefers-reduced-motion: reduce) {
  .cc-h3d::before, .cc-h3d-part img, .cc-h3d-ring { animation: none; }
  .cc-h3d-part { transition: none; opacity: 1; scale: 1; translate: none; }
}
</style>

  <!-- ===== 3D shapes (alag alag animate hote hain) ===== -->
  <div class="cc-h3d" id="ccH3d" aria-hidden="true">
    <!-- ghoomte hue gol orbit rings -->
    <i class="cc-h3d-ring cc-h3d-ring--1"><b></b></i>
    <i class="cc-h3d-ring cc-h3d-ring--2"><b></b></i>
    <span class="cc-h3d-part cc-h3d--torus"    style="--dp:.35;--sx:-60;--sy:40;--i:0"><img src="assets/img/cropped/torus.png" alt=""></span>
    <span class="cc-h3d-part cc-h3d--big"      style="--dp:.7; --sx:0;  --sy:-90;--i:1"><img src="assets/img/cropped/sphere-big.png" alt=""></span>
    <span class="cc-h3d-part cc-h3d--dark"     style="--dp:1.3;--sx:-120;--sy:-80;--i:2"><img src="assets/img/cropped/sphere-dark.png" alt=""></span>
    <span class="cc-h3d-part cc-h3d--captop"   style="--dp:1;  --sx:120;--sy:-90;--i:3"><img src="assets/img/cropped/capsule-top.png" alt=""></span>
    <span class="cc-h3d-part cc-h3d--capbot"   style="--dp:1.5;--sx:-140;--sy:90;--i:4"><img src="assets/img/cropped/capsule-bottom.png" alt=""></span>
    <span class="cc-h3d-part cc-h3d--small"    style="--dp:1.8;--sx:130;--sy:100;--i:5"><img src="assets/img/cropped/sphere-small.png" alt=""></span>
  </div>

  <div class="hero-inner">
    <div class="hero-content">
      <h1 class="hero-title"><span>Welcome to</span>creativeconverge</h1>
      <h3 class="hero-sub">Custom Web Design | E-Commerce Solutions | SEO That Drives Results</h3>
      <p class="hero-text">We create new technologies for your business thanks to our wonderful team of professionals.</p>
    </div>
  </div>
</section>

<!-- ============ HERO 3D: mouse parallax + scroll spread ============ -->
<script>
(function () {
  var scene = document.getElementById('ccH3d');
  if (!scene) return;
  var hero = scene.closest('.hero') || scene.parentNode;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // entrance
  requestAnimationFrame(function () { scene.classList.add('cc-h3d--in'); });
  if (reduce) return;

  var tx = 0, ty = 0, cx = 0, cy = 0, sp = 0, raf = null;
  function loop() {
    cx += (tx - cx) * 0.06;
    cy += (ty - cy) * 0.06;
    scene.style.setProperty('--mx', cx.toFixed(2));
    scene.style.setProperty('--my', cy.toFixed(2));
    scene.style.setProperty('--sp', sp.toFixed(3));
    if (Math.abs(tx - cx) > 0.05 || Math.abs(ty - cy) > 0.05) raf = requestAnimationFrame(loop);
    else raf = null;
  }
  function kick() { if (!raf) raf = requestAnimationFrame(loop); }

  // mouse (sirf desktop)
  if (window.matchMedia('(hover: hover)').matches) {
    hero.addEventListener('mousemove', function (e) {
      var r = hero.getBoundingClientRect();
      tx = ((e.clientX - r.left) / r.width - 0.5) * 40;   // max ±20px * depth
      ty = ((e.clientY - r.top) / r.height - 0.5) * 40;
      kick();
    });
    hero.addEventListener('mouseleave', function () { tx = 0; ty = 0; kick(); });
  }

  // scroll: shapes thoda bikharte hain
  function onScroll() {
    var r = hero.getBoundingClientRect();
    sp = Math.min(1, Math.max(0, -r.top / r.height));
    scene.style.setProperty('--sp', sp.toFixed(3));
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();
})();
</script>


<section class="cvg-about" id="cvg-about">
  <div class="cvg-about-inner">

    <figure class="cvg-about-media" data-reveal="media">
      <img class="cvg-about-photo" loading="lazy"
           src="assets/img/home-about-section.webp"
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
        <a href="<?= cvg_url('about/index.php') ?>" class="cvg-about-btn cvg-about-btn-mint">
          Read more
          <svg class="cvg-about-btn-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>
        </a>
        <a href="<?= cvg_url('services/services.php') ?>" class="cvg-about-btn cvg-about-btn-ghost">Our services</a>
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