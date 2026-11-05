<section class="hero" id="hero">

<style>
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
  contain: layout paint;      /* andar ki animation baqi page ko repaint na karaye */
}
/* glow peeche */
.cc-h3d::before {
  content: "";
  position: absolute;
  inset: 18% 14% 10%;
  border-radius: 50%;
  /* blur() filter hata diya — har frame repaint hota tha (scroll atakta tha) */
  background: radial-gradient(closest-side, rgba(0,212,163,.30), rgba(0,212,163,.12) 55%, rgba(0,212,163,0));
  animation: cc-h3d-glow 6s ease-in-out infinite;
  will-change: opacity;
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
  will-change: translate;
  transition:
    opacity .6s ease calc(var(--i) * .07s),
    scale .8s cubic-bezier(.2,1.4,.3,1) calc(var(--i) * .07s);
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
  will-change: rotate;
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
/* Sirf ek animation (spin). Orbit wali doosri animation hata di — har image par
   do animations + var() wale keyframes scroll ke dauran bhaari padte the */
.cc-h3d-part img {
  backface-visibility: hidden;
}
/* Spin tab shuru ho jab images decode ho chuki hon aur entrance khatam ho
   (reload ke baad pehle scroll ka atkaav isi se aata tha) */
.cc-h3d--run .cc-h3d-part img {
  animation: cc-h3d-spin-self var(--spin, 20s) linear infinite var(--dir, normal);
}
.cc-h3d--torus img  { --spin: 40s; --dir: reverse; --r: 6px;  --orb: 14s; --tilt: 0deg; }
.cc-h3d--big img    { --spin: 22s; --dir: normal;  --r: 10px; --orb: 8s;  --tilt: 0deg; }
/* drop-shadow ghoomti image par bahut bhari thi — ab neeche ek static saya */
.cc-h3d--big::after {
  content: "";
  position: absolute;
  left: 12%; right: 12%; bottom: -14%;
  height: 18%;
  border-radius: 50%;
  background: radial-gradient(closest-side, rgba(0,0,0,.45), rgba(0,0,0,0));
  z-index: -1;
  pointer-events: none;
}
.cc-h3d--dark img   { --spin: 12s; --dir: normal;  --r: 22px; --orb: 9s;  --tilt: 0deg; }
.cc-h3d--captop img { --spin: 14s; --dir: reverse; --r: 18px; --orb: 12s; --tilt: 0deg; }
.cc-h3d--capbot img { --spin: 16s; --dir: normal;  --r: 20px; --orb: 11s; --tilt: 0deg; }
.cc-h3d--small img  { --spin: 8s;  --dir: reverse; --r: 26px; --orb: 7s;  --tilt: 0deg; }

/* apne center par 360 ghoomna ('rotate' property, transform se alag) */
@keyframes cc-h3d-spin-self {
  from { rotate: 0deg; }
  to   { rotate: 360deg; }
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
  0%, 100% { opacity: .6; }
  50%      { opacity: 1; }
}

/* hero screen se bahar ho to saari animation ruk jaye (scroll smooth rehta hai) */
.cc-h3d--paused::before,
.cc-h3d--paused .cc-h3d-part img,
.cc-h3d--paused .cc-h3d-ring,
.cc-scrolling .cc-h3d::before,
.cc-scrolling .cc-h3d-part img,
.cc-scrolling .cc-h3d-ring { animation-play-state: paused; }
/* rocket ko apni GPU layer — scroll ke saath hilta hai */
.cvg-about-rocket { will-change: transform; }

/* Phone / tablet: halki version — torus aur rings nahi ghoomte, glow static */
@media (max-width: 1024px), (hover: none) {
  .cc-h3d::before { animation: none; opacity: .8; }
  .cc-h3d--torus img { animation: none; }
  .cc-h3d-ring--2 { animation: none; }
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
/* ---------- HERO LAYOUT: text left, 3D right, both inside the same container ---------- */
#hero .abt-inner {
  position: relative;
  z-index: 1;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 32px;
  box-sizing: border-box;
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(0, 480px);
  align-items: center;
  gap: 40px;
}
#hero .hero-inner {
  grid-column: 1;
  grid-row: 1;
  max-width: none;
  margin: 0;
  padding: 0;
}
#hero .hero-content {
  max-width: 600px;
  margin: 0;
  text-align: left;
}
/* 3D sits in the right column (not stuck to the screen edge any more) */
#hero .cc-h3d {
  position: relative !important;
  grid-column: 2;
  grid-row: 1;
  top: auto;
  right: auto;
  width: 100% !important;
  max-width: 480px;
  justify-self: end;
  transform: none;
}

@media (max-width: 1024px) {
  #hero .abt-inner {
    grid-template-columns: minmax(0, 1fr) minmax(0, 380px);
    gap: 24px;
  }
  #hero .cc-h3d { width: 100% !important; opacity: 1; }
}
@media (max-width: 767px) {
  #hero .abt-inner {
    grid-template-columns: minmax(0, 1fr);
    padding: 0 20px;
    gap: 8px;
  }
  /* phone: shapes on top, text below, everything centered */
  #hero .cc-h3d {
    grid-column: 1;
    grid-row: 1;
    justify-self: center;
    width: 78% !important;
    max-width: 320px;
    bottom: auto;
    opacity: 1;
  }
  #hero .hero-inner { grid-row: 2; }
  #hero .hero-content { max-width: none; text-align: center; }
  #hero .hero-text { margin-left: auto; margin-right: auto; }
}
</style>

 <div class="abt-inner">
  <div class="cc-h3d" id="ccH3d" aria-hidden="true">
    <!-- ghoomte hue gol orbit rings -->
    <i class="cc-h3d-ring cc-h3d-ring--1"><b></b></i>
    <i class="cc-h3d-ring cc-h3d-ring--2"><b></b></i>
    <span class="cc-h3d-part cc-h3d--torus"    style="--dp:.35;--sx:-60;--sy:40;--i:0"><img decoding="async" fetchpriority="low" src="assets/img/cropped/torus.webp" alt=""></span>
    <span class="cc-h3d-part cc-h3d--big"      style="--dp:.7; --sx:0;  --sy:-90;--i:1"><img decoding="async" src="assets/img/cropped/sphere-big.webp" alt=""></span>
    <span class="cc-h3d-part cc-h3d--dark"     style="--dp:1.3;--sx:-120;--sy:-80;--i:2"><img decoding="async" fetchpriority="low" src="assets/img/cropped/sphere-dark.webp" alt=""></span>
    <span class="cc-h3d-part cc-h3d--captop"   style="--dp:1;  --sx:120;--sy:-90;--i:3"><img decoding="async" fetchpriority="low" src="assets/img/cropped/capsule-top.webp" alt=""></span>
    <span class="cc-h3d-part cc-h3d--capbot"   style="--dp:1.5;--sx:-140;--sy:90;--i:4"><img decoding="async" fetchpriority="low" src="assets/img/cropped/capsule-bottom.webp" alt=""></span>
    <span class="cc-h3d-part cc-h3d--small"    style="--dp:1.8;--sx:130;--sy:100;--i:5"><img decoding="async" fetchpriority="low" src="assets/img/cropped/sphere-small.webp" alt=""></span>
  </div>

  <div class="hero-inner">
    <div class="hero-content">
      <h1 class="hero-title"><span>Welcome to</span>Creative Converge</h1>
      <h3 class="hero-sub">From Concept to Click, a premium web design company in Dallas!</h3>
      <p class="hero-text">Every great vision needs professional execution. Let Creative Converge, one of the best web design companies in Dallas, bring your idea to life with perfection.</p>
    </div>
  </div>
 </div><!-- /.abt-inner (ye band nahi tha) -->

</section>

<!-- ============ HERO 3D: mouse parallax + scroll spread ============ -->
<script>
(function () {
  var scene = document.getElementById('ccH3d');
  if (!scene) return;
  var hero = scene.closest('.hero') || scene.parentNode;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // entrance: pehle saari images decode, phir dikhao, phir ghumao
  var imgs = Array.prototype.slice.call(scene.querySelectorAll('img'));
  Promise.all(imgs.map(function (im) {
    return im.decode ? im.decode().catch(function () {}) : Promise.resolve();
  })).then(function () {
    requestAnimationFrame(function () { scene.classList.add('cc-h3d--in'); });
    if (!reduce) setTimeout(function () { scene.classList.add('cc-h3d--run'); }, 1000);
  });
  if (reduce) return;

  var tx = 0, ty = 0, cx = 0, cy = 0, sp = 0, lastSp = -1, raf = null, visible = true;

  // Ek hi frame loop: mouse + scroll dono yahin (pehle scroll har event par style likhta tha)
  function frame() {
    raf = null;
    cx += (tx - cx) * 0.08;
    cy += (ty - cy) * 0.08;
    scene.style.setProperty('--mx', cx.toFixed(1));
    scene.style.setProperty('--my', cy.toFixed(1));
    if (sp !== lastSp) { scene.style.setProperty('--sp', sp.toFixed(3)); lastSp = sp; }
    if (Math.abs(tx - cx) > 0.1 || Math.abs(ty - cy) > 0.1) kick();
  }
  function kick() { if (!raf && visible) raf = requestAnimationFrame(frame); }

  // mouse (sirf desktop)
  if (window.matchMedia('(hover: hover)').matches) {
    hero.addEventListener('mousemove', function (e) {
      var r = hero.getBoundingClientRect();
      tx = ((e.clientX - r.left) / r.width - 0.5) * 40;
      ty = ((e.clientY - r.top) / r.height - 0.5) * 40;
      kick();
    }, { passive: true });
    hero.addEventListener('mouseleave', function () { tx = 0; ty = 0; kick(); });
  }

  // scroll: sirf frame mein ek dafa, sirf jab hero dikh raha ho, aur sirf desktop par
  // (phone par scroll ke saath shapes hilana scroll ko bhaari karta tha)
  var desktop = window.matchMedia('(min-width: 1025px) and (hover: hover)').matches;
  var heroH = hero.offsetHeight || 1;
  window.addEventListener('resize', function () { heroH = hero.offsetHeight || 1; }, { passive: true });
  if (desktop) window.addEventListener('scroll', function () {
    if (!visible) return;
    var top = hero.getBoundingClientRect().top;
    sp = Math.round(Math.min(1, Math.max(0, -top / heroH)) * 100) / 100;
    kick();
  }, { passive: true });

  // Scroll ke dauran saari ghoomti animations ruk jati hain (browser ka poora zor scroll par),
  // scroll rukte hi 150ms baad wapas chal padti hain — aankh ko farq mehsoos nahi hota
  var root = document.documentElement, stopT = null;
  window.addEventListener('scroll', function () {
    if (!stopT) root.classList.add('cc-scrolling');
    clearTimeout(stopT);
    stopT = setTimeout(function () { root.classList.remove('cc-scrolling'); stopT = null; }, 150);
  }, { passive: true });

  // hero screen se bahar → animations pause, wapas aaye → chalu
  if ('IntersectionObserver' in window) {
    new IntersectionObserver(function (entries) {
      visible = entries[0].isIntersecting;
      scene.classList.toggle('cc-h3d--paused', !visible);
      if (visible) kick();
    }).observe(hero);
  }
})();
</script>


<section class="cvg-about" id="cvg-about">
  <div class="cvg-about-inner">

    <figure class="cvg-about-media" data-reveal="media">
      <img class="cvg-about-photo" loading="eager" decoding="async" fetchpriority="low"
           src="assets/img/home-about-section.webp"
           alt="Designer looking at a city skyline with floating digital screens">
    </figure>

    <div class="cvg-about-content">
      <p class="cvg-about-eyebrow" data-reveal="eyebrow">About us</p>

      <h2 class="cvg-about-title" data-reveal="title">
        <span class="cvg-line"><span class="cvg-line-in">More Than a Website Design Agency.</span></span>
        <span class="cvg-line"><span class="cvg-line-in cvg-about-title-mint">Your Partner in Making Things Happen.</span></span>
      </h2>

      <p class="cvg-about-text" data-reveal="up" style="--d:.35s">
        With nearly a decade of experience in custom web <strong class="cvg-about-strong">DESIGN SERVICES</strong> . We’re more than just a digital agency. We’re problem solvers to help you stand out in the competitive digital world. 
      </p>
      <p class="cvg-about-text" data-reveal="up" style="--d:.5s">
       At Creative Converge, we make sure that every business has a unique story, which is why we promise that your story connects and makes a memorable impact. We push ourselves 24/7 to face all the complications while dealing with clients or rather than projects. If you’re at the initial stage or have a big vision to be very honest you’re just one quick call away. 
        <!-- <ul class="cvg-about-text">
        <li>24/7 support </li>
        <li>Meet deadlines every time </li>
        <li>Quality Work Delivered</li>
        <li>Authentic and Professional Experts </li>
      </ul> -->
      </p>

      <div class="cvg-about-actions" data-reveal="up" style="--d:.65s">
        <a href="<?= cvg_url('about/index.php') ?>" class="cvg-about-btn cvg-about-btn-mint">
          Read more
          <svg class="cvg-about-btn-icon" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>
        </a>
        <a href="<?= cvg_url('services') ?>" class="cvg-about-btn cvg-about-btn-ghost">Our services</a>
      </div>
    </div>
  </div>

  <img class="cvg-about-rocket" data-reveal="rocket" decoding="async" src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/08/rocket-no-bg.png" alt="" aria-hidden="true">
</section>

<script>
(function () {
  document.documentElement.classList.add('cvg-js');
  var section = document.getElementById('cvg-about');
  if (!section) return;
  var els = section.querySelectorAll('[data-reveal]:not(.cvg-about-rocket)');

  /* Page load ke baad, khaali waqt mein, neeche wali images pehle se decode kar lo —
     taa ke pehli dafa scroll karte waqt browser ko decode na karna pade */
  var predecode = function () {
    section.querySelectorAll('img').forEach(function (im) {
      if (im.decode) im.decode().catch(function () {});
    });
  };
  window.addEventListener('load', function () {
    (window.requestIdleCallback || function (f) { setTimeout(f, 300); })(predecode);
  });
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
    var near = true;
    var onScroll = function () {
      if (near && !ticking) { ticking = true; requestAnimationFrame(updateRocket); }
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    // Section screen se door ho to rocket ka hisaab hi na lagao
    if ('IntersectionObserver' in window) {
      new IntersectionObserver(function (en) { near = en[0].isIntersecting; if (near) onScroll(); },
        { rootMargin: '200px 0px' }).observe(section);
    }
    updateRocket();
  }

  /* ---- Text / image reveal (scroll up/down par repeat) ---- */
  if (!('IntersectionObserver' in window)) {
    els.forEach(function (el) { el.classList.add('is-in'); });
    return;
  }
  // Ek dafa reveal (pehle har scroll up/down par dobara animate hota tha — scroll bhaari)
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting && e.intersectionRatio >= 0.15) {
        e.target.classList.add('is-in');
        io.unobserve(e.target);
      }
    });
  }, { threshold: [0, 0.15], rootMargin: '0px 0px -6% 0px' });
  els.forEach(function (el) { io.observe(el); });
})();
</script>