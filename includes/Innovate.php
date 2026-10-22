<section class="cvg-unlock" id="cvg-unlock">
    <!-- moving background light + grid -->
    <span class="cvg-unlock-glow cvg-unlock-glow--a" aria-hidden="true"></span>
    <span class="cvg-unlock-glow cvg-unlock-glow--b" aria-hidden="true"></span>
    <span class="cvg-unlock-grid" aria-hidden="true"></span>

   
<div class="cvg-unlock-inner">

    <div class="cvg-unlock-head">
        <p class="cvg-unlock-eyebrow cvg-unlock-rv">Who We Help</p>

        <h2 class="cvg-unlock-title">
            <span class="cvg-unlock-line">
                <span>Solutions That Reflect</span>
            </span>
            <span class="cvg-unlock-line">
                <span>Different Business Journeys</span>
            </span>
        </h2>
    </div>

    <div class="cvg-unlock-grid-cards">

        <article class="cvg-unlock-card cvg-unlock-rv" style="--d:0s">
            <span class="cvg-unlock-icon" aria-hidden="true">
                <img src="assets/img/play.png" alt="">
            </span>

            <h3 class="cvg-unlock-card-title">Startups &amp; New Businesses</h3>

            <p class="cvg-unlock-card-text">
                Build a credible starting point with a clear brand identity,
                a professional website and a focused digital presence.
            </p>

            <a href="#" class="cvg-unlock-more">
                <span class="cvg-unlock-more-ic" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </span>
                Learn More
            </a>
        </article>

        <article class="cvg-unlock-card cvg-unlock-rv" style="--d:.12s">
            <span class="cvg-unlock-icon" aria-hidden="true">
                <img src="assets/img/Icon2.png" alt="">
            </span>

            <h3 class="cvg-unlock-card-title">eCommerce Brands</h3>

            <p class="cvg-unlock-card-text">
                Develop a more intuitive online store experience that helps
                customers discover products and navigate the purchase journey.
            </p>

            <a href="#" class="cvg-unlock-more">
                <span class="cvg-unlock-more-ic" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </span>
                Learn More
            </a>
        </article>

        <article class="cvg-unlock-card cvg-unlock-rv" style="--d:.24s">
            <span class="cvg-unlock-icon" aria-hidden="true">
                <img src="assets/img/Icon3.png" alt="">
            </span>

            <h3 class="cvg-unlock-card-title">Service-Based Businesses</h3>

            <p class="cvg-unlock-card-text">
                Communicate your expertise clearly, present your services
                effectively and make it easier for potential customers to contact you.
            </p>

            <a href="#" class="cvg-unlock-more">
                <span class="cvg-unlock-more-ic" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </span>
                Learn More
            </a>
        </article>

        <article class="cvg-unlock-card cvg-unlock-rv" style="--d:.36s">
            <span class="cvg-unlock-icon" aria-hidden="true">
                <img src="assets/img/Icon4.png" alt="">
            </span>

            <h3 class="cvg-unlock-card-title">Growing Organizations</h3>

            <p class="cvg-unlock-card-text">
                Bring different digital activities together through coordinated
                branding, web development and marketing solutions.
            </p>

            <a href="#" class="cvg-unlock-more">
                <span class="cvg-unlock-more-ic" aria-hidden="true">
                    <svg viewBox="0 0 24 24">
                        <path d="M5 12h14M13 6l6 6-6 6" />
                    </svg>
                </span>
                Learn More
            </a>
        </article>

    </div>
</div>

</section>
<style>

    .cvg-unlock {
        --cvg-mint: #00D4A3;
        --cvg-mint-light: #5FF0C8;
        --cvg-ink: #04342C;
        --cvg-text: #F2F5F4;
        --cvg-text-2: #D9F5EE;
        --cvg-ease: cubic-bezier(.2, .9, .2, 1);

        position: relative;
        overflow: hidden;
        isolation: isolate;
        box-sizing: border-box;
        width: 100%;
        padding: 110px 40px 120px;
        background-color: #04725F;
        background-image: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, 0.45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
        color: var(--cvg-text);
        font-family: 'Poppins', sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    .cvg-unlock *,
    .cvg-unlock *::before,
    .cvg-unlock *::after {
        box-sizing: border-box;
    }

    /* ---------- Animated background ---------- */
    .cvg-unlock .cvg-unlock-glow {
        position: absolute;
        z-index: -1;
        border-radius: 50%;
        filter: blur(90px);
        pointer-events: none;
    }

    .cvg-unlock .cvg-unlock-glow--a {
        width: 560px;
        height: 560px;
        left: -120px;
        top: -180px;
        background: #5FF0C8;
        opacity: .28;
        animation: cvgUnlockDriftA 16s ease-in-out infinite;
    }

    .cvg-unlock .cvg-unlock-glow--b {
        width: 640px;
        height: 640px;
        right: -180px;
        bottom: -260px;
        background: #00211B;
        opacity: .7;
        animation: cvgUnlockDriftB 20s ease-in-out infinite;
    }

    @keyframes cvgUnlockDriftA {

        0%,
        100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(260px, 120px);
        }
    }

    @keyframes cvgUnlockDriftB {

        0%,
        100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(-220px, -80px);
        }
    }

    .cvg-unlock .cvg-unlock-grid {
        position: absolute;
        inset: 0;
        z-index: -1;
        pointer-events: none;
        background-image:
            linear-gradient(rgba(255, 255, 255, .06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, .06) 1px, transparent 1px);
        background-size: 72px 72px;
        -webkit-mask-image: radial-gradient(ellipse 70% 70% at 30% 30%, #000 10%, transparent 75%);
        mask-image: radial-gradient(ellipse 70% 70% at 30% 30%, #000 10%, transparent 75%);
        animation: cvgUnlockGrid 24s linear infinite;
    }

    @keyframes cvgUnlockGrid {
        to {
            background-position: 72px 72px, 72px 72px;
        }
    }

    /* ---------- Layout ---------- */
    .cvg-unlock .cvg-unlock-inner {
        max-width: 1060px;
        margin: 0 auto;
    }

    .cvg-unlock .cvg-unlock-head {
        max-width: 640px;
        margin-bottom: 70px;
    }

    .cvg-unlock .cvg-unlock-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        margin: 0 0 16px;
        padding: 0;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: .02em;
        color: var(--cvg-text);
    }

    .cvg-unlock .cvg-unlock-eyebrow::before {
        content: "";
        width: 36px;
        height: 2px;
        background: var(--cvg-mint-light);
    }

    .cvg-unlock .cvg-unlock-title {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        font-size: clamp(32px, 4vw, 46px);
        font-weight: 500;
        line-height: 1.15;
        letter-spacing: -.01em;
        color: var(--cvg-text);
        text-transform: none;
    }

    .cvg-unlock .cvg-unlock-line {
        display: block;
        overflow: hidden;
        padding-bottom: .06em;
    }

    .cvg-unlock .cvg-unlock-line>span {
        display: inline-block;
    }

    /* ---------- Cards ---------- */
    .cvg-unlock .cvg-unlock-grid-cards {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 24px;
    }

    .cvg-unlock .cvg-unlock-card {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin: 0;
        padding: 28px 24px 26px;
        border-radius: 22px;
        background: rgba(0, 33, 27, .14);
        backdrop-filter: blur(6px);
        transition: transform .5s var(--cvg-ease), background .4s ease, border-color .4s ease, box-shadow .5s ease;
    }

    .cvg-unlock .cvg-unlock-card:hover {
        transform: translateY(-10px);
        background: rgba(0, 33, 27, .38);
        border-color: rgba(95, 240, 200, .55);
        box-shadow: 0 30px 60px rgba(0, 33, 27, .45);
    }

    .cvg-unlock .cvg-unlock-icon {
        position: relative;
        margin-bottom: 26px;
        display: grid;
        place-items: center;
        transition: background .4s ease, transform .5s var(--cvg-ease);
    }

    .cvg-unlock .cvg-unlock-card:nth-child(2) .cvg-unlock-icon::after {
        animation-delay: .8s;
    }

    .cvg-unlock .cvg-unlock-card:nth-child(3) .cvg-unlock-icon::after {
        animation-delay: 1.6s;
    }

    .cvg-unlock .cvg-unlock-card:nth-child(4) .cvg-unlock-icon::after {
        animation-delay: 2.4s;
    }

    @keyframes cvgUnlockPing {
        0% {
            opacity: .9;
            transform: scale(1);
        }

        70%,
        100% {
            opacity: 0;
            transform: scale(1.45);
        }
    }

    .cvg-unlock .cvg-unlock-icon svg {
        width: 26px;
        height: 26px;
        fill: none;
        stroke: var(--cvg-mint-light);
        stroke-width: 1.8;
        stroke-linecap: round;
        stroke-linejoin: round;
        transition: stroke .4s ease;
    }

    .cvg-unlock .cvg-unlock-card-title {
        margin: 0 0 12px;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        font-size: 19px;
        font-weight: 600;
        line-height: 1.3;
        color: var(--cvg-text);
        text-transform: none;
    }

    .cvg-unlock .cvg-unlock-card-text {
        flex: 1;
        margin: 0 0 24px;
        padding: 0;
        font-size: 14px;
        line-height: 1.65;
        color: var(--cvg-text-2);
    }

    .cvg-unlock .cvg-unlock-more {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        font-weight: 500;
        color: var(--cvg-text);
        text-decoration: none;
        transition: color .3s ease, gap .3s ease;
    }

    .cvg-unlock .cvg-unlock-more-ic {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        flex: none;
        display: grid;
        place-items: center;
        background: var(--cvg-text);
        transition: background .3s ease, transform .4s var(--cvg-ease);
    }

    .cvg-unlock .cvg-unlock-more-ic svg {
        width: 14px;
        height: 14px;
        fill: none;
        stroke: #014C3F;
        stroke-width: 2.6;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .cvg-unlock .cvg-unlock-more:hover {
        color: var(--cvg-mint-light);
        gap: 16px;
    }

    .cvg-unlock .cvg-unlock-more:hover .cvg-unlock-more-ic {
        background: var(--cvg-mint-light);
        transform: rotate(-45deg);
    }

    .cvg-unlock .cvg-unlock-more:focus-visible {
        outline: 2px solid var(--cvg-mint-light);
        outline-offset: 4px;
        border-radius: 4px;
    }

    /* ---------- Scroll-in animation (only when JS adds .cvg-unlock--js) ---------- */
    /* Easy control: how far the side cards travel */
    .cvg-unlock {
        --cvg-in-distance: 160px;
    }

    .cvg-unlock.cvg-unlock--js .cvg-unlock-rv {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity .9s var(--cvg-ease) var(--d, 0s), transform .9s var(--cvg-ease) var(--d, 0s),
            background .4s ease, border-color .4s ease, box-shadow .5s ease;
    }

    /* Cards: moved by the mouse scroll (see script below).
       1st comes from the LEFT, 4th from the RIGHT, middle two rise from below.
       Scroll back up and they slide back out. */
    .cvg-unlock.cvg-unlock--js .cvg-unlock-card.cvg-unlock-rv {
        opacity: var(--cvg-o, 1);
        transform: none;
        translate: var(--cvg-x, 0px) var(--cvg-y, 0px);
        transition: background .4s ease, border-color .4s ease, box-shadow .5s ease, transform .5s var(--cvg-ease);
        will-change: translate, opacity;
    }

    .cvg-unlock.cvg-unlock--js .cvg-unlock-line>span {
        transform: translateY(105%);
        transition: transform 1s var(--cvg-ease);
    }

    .cvg-unlock.cvg-unlock--in .cvg-unlock-rv:not(.cvg-unlock-card) {
        opacity: 1;
        transform: none;
    }

    .cvg-unlock.cvg-unlock--js .cvg-unlock-card.cvg-unlock-rv:hover {
        transform: translateY(-10px);
    }

    .cvg-unlock.cvg-unlock--in .cvg-unlock-line>span {
        transform: none;
    }

    .cvg-unlock.cvg-unlock--in .cvg-unlock-line:nth-child(2)>span {
        transition-delay: .12s;
    }

    /* Your PNG icons */
    .cvg-unlock .cvg-unlock-icon img {
        display: block;
        width: 28px;
        height: 28px;
        object-fit: contain;
        transition: filter .4s ease;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 1024px) {
        .cvg-unlock {
            padding: 90px 24px 100px;
        }

        .cvg-unlock .cvg-unlock-grid-cards {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .cvg-unlock .cvg-unlock-head {
            margin-bottom: 50px;
        }
    }

    @media (max-width: 600px) {
        .cvg-unlock {
            padding: 70px 16px 80px;
        }

        .cvg-unlock .cvg-unlock-grid-cards {
            grid-template-columns: minmax(0, 1fr);
        }

        .cvg-unlock .cvg-unlock-card {
            padding: 24px 20px;
        }

        .cvg-unlock {
            --cvg-in-distance: 70px;
        }

        .cvg-unlock .cvg-unlock-line {
            display: inline;
            overflow: visible;
        }

        .cvg-unlock.cvg-unlock--js .cvg-unlock-line>span {
            display: inline;
            transform: none;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .cvg-unlock .cvg-unlock-glow,
        .cvg-unlock .cvg-unlock-grid,
        .cvg-unlock .cvg-unlock-icon::after {
            animation: none;
        }

        .cvg-unlock .cvg-unlock-card,
        .cvg-unlock .cvg-unlock-icon,
        .cvg-unlock .cvg-unlock-more,
        .cvg-unlock .cvg-unlock-more-ic {
            transition: none;
        }

        .cvg-unlock.cvg-unlock--js .cvg-unlock-card.cvg-unlock-rv {
            opacity: 1;
            translate: none;
        }
    }
</style>
<script>
(function () {
  var root = document.getElementById('cvg-unlock');
  if (!root) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  root.classList.add('cvg-unlock--js');

  /* Heading: reveals once */
  if ('IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) { if (e.isIntersecting) { root.classList.add('cvg-unlock--in'); io.disconnect(); } });
    }, { threshold: 0.2 });
    io.observe(root);
  } else { root.classList.add('cvg-unlock--in'); }

  /* ---------- Cards follow the mouse scroll ----------
     SMOOTH: 0.06 = very smooth/slow, 0.15 = snappier
     START / END: where in the screen the move begins and finishes
     (1 = bottom edge of the screen, 0 = top edge)                  */
  var SMOOTH = 0.07, START = 0.98, END = 0.55, STAGGER = 0.08;

  var grid  = root.querySelector('.cvg-unlock-grid-cards');
  var cards = Array.prototype.slice.call(root.querySelectorAll('.cvg-unlock-card'));
  /* direction per card: [x, y]  (-1 = from left, 1 = from right, y 1 = from below) */
  var dirs  = [[-1, 0], [0, 1], [0, 1], [1, 0]];
  var cur = cards.map(function () { return 0; });
  var target = cur.slice(), raf = 0;

  function clamp(v) { return v < 0 ? 0 : v > 1 ? 1 : v; }
  function ease(t) { return 1 - Math.pow(1 - t, 3); }
  function distance() {
    var d = parseFloat(getComputedStyle(root).getPropertyValue('--cvg-in-distance'));
    return isNaN(d) ? 160 : d;
  }

  function measure() {
    var vh = window.innerHeight || 800;
    var top = grid.getBoundingClientRect().top;          /* grid is never translated, so this is stable */
    var p = (START * vh - top) / ((START - END) * vh);   /* 0 when grid enters, 1 when it reaches END */
    cards.forEach(function (c, i) {
      var order = (i === 0 || i === cards.length - 1) ? 0 : 1;   /* side cards move first */
      target[i] = ease(clamp((p - order * STAGGER) / (1 - STAGGER)));
    });
  }

  function paint() {
    var D = distance(), moving = false;
    cards.forEach(function (c, i) {
      cur[i] += (target[i] - cur[i]) * SMOOTH;
      if (Math.abs(target[i] - cur[i]) > 0.001) moving = true; else cur[i] = target[i];
      var k = 1 - cur[i], dir = dirs[i] || [0, 1];
      c.style.setProperty('--cvg-x', (dir[0] * D * k).toFixed(2) + 'px');
      c.style.setProperty('--cvg-y', (dir[1] * 70 * k).toFixed(2) + 'px');
      c.style.setProperty('--cvg-o', (0.15 + 0.85 * cur[i]).toFixed(3));
    });
    raf = moving ? requestAnimationFrame(paint) : 0;
  }

  function update() { measure(); if (!raf) raf = requestAnimationFrame(paint); }
  window.addEventListener('scroll', update, { passive: true });
  window.addEventListener('resize', update);
  measure();
  cards.forEach(function (c, i) { cur[i] = target[i]; });   /* no jump if the page loads mid-section */
  paint();
})();
</script>