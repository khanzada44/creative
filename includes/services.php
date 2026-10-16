<?php /* services.php - use: <?php include __DIR__ . '/includes/services.php'; ?> */
$services = [
  ['LOGO DESIGN<br>SOLUTIONS',            'logo-design-solutions/index.php',            'logo'],
  ['WEB DESIGN<br>SOLUTIONS',             'web-design-solutions/index.php',             'web'],
  ['ILLUSTRATION<br>DESIGN',              'illustration-design/index.php',              'social'],
  ['BRANDING',                            'branding/index.php',                         'globe'],
  ['ADVANCE COMBO<br>PACKAGES',           'advance-combo-packages/index.php',           'logo'],
  ['DIGITAL<br>MARKETING',                'digital-marketing/index.php',                'social'],
  ['MOBILE<br>APPS',                      'mobiles-apps/index.php',                     'web'],
  ['VIDEO<br>ANIMATIONS',                 'stunning-video-animation-services/index.php', 'globe'],
];
$icons = [
  'logo'  => 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/icon-branding.png',
  'web'   => 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/icon-branding.png',
  'social' => 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/icon-branding.png',
  'globe' => 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/icon-branding.png',
];
?>
<style>
  .svc {
    --svc-green: #0a7454;
    --svc-card: #074b39;
    --svc-dark: #020a07;
    --svc-accent: #1fa57f;
    position: relative;
    overflow: hidden;
    background: linear-gradient(100deg, #17a67e 0%, #0a7454 48%, #04513c 100%);
    font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
    color: #fff;
    padding: 50px 0 190px;
  }

  .svc * {
    box-sizing: border-box
  }

  .svc-bg {
    position: absolute;
    top: 0;
    right: 0;
    width: 560px;
    max-width: 60%;
    height: auto;
    z-index: 0;
    pointer-events: none;
    user-select: none
  }

  .svc-wrap {
    position: relative;
    z-index: 2;
    max-width: 1360px;
    margin: 0 auto;
    padding: 0 20px
  }

  .svc-head {
    padding: 0 20px;
    margin-bottom: 30px;
    max-width: 760px
  }

  .svc-eyebrow {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 15px;
    text-transform: lowercase
  }

  .svc-eyebrow:before {
    content: "";
    width: 62px;
    height: 2px;
    background: #fff
  }

  .svc-head h2 {
    margin: 6px 0 14px;
    font-size: clamp(40px, 5vw, 60px);
    font-weight: 700;
    line-height: 1.1
  }

  .svc-head p {
    margin: 0;
    font-size: 18px;
    line-height: 1.45
  }

  .svc-viewport {
    overflow: hidden
  }

  .svc-track {
    display: flex;
    gap: 8px;
    transition: transform .5s ease;
    --per: 4
  }

  .svc-card {
    flex: 0 0 calc((100% - (var(--per) - 1) * 8px) / var(--per));
    min-height: 390px;
    background: var(--svc-card);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding: 60px 20px 20px;
    text-align: center;
    text-decoration: none;
    color: inherit;
    transition: background .3s ease;
  }

  .svc-icon {
    width: 70px;
    height: 70px;
    margin-bottom: 34px;
    transition: transform .3s ease
  }

  .svc-icon svg {
    width: 100%;
    height: 100%;
    fill: none;
    stroke: #6fb89f;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
    transition: stroke .3s
  }

  .svc-card h3 {
    margin: 0 0 22px;
    font-size: 19px;
    font-weight: 600;
    line-height: 1.25;
    color: #cfe3da;
    text-transform: uppercase;
    transition: color .3s
  }

  .svc-more {
    font-size: 16px;
    font-weight: 500;
    text-transform: uppercase;
    color: var(--svc-accent)
  }

  .svc-card:hover {
    background: var(--svc-dark)
  }

  .svc-card:hover h3 {
    color: #fff
  }

  .svc-card:hover .svc-icon {
    transform: scale(1.12)
  }

  .svc-card:hover .svc-icon svg {
    stroke: #fff
  }

  .svc-arrows {
    position: absolute;
    top: -62px;
    right: 30px;
    display: flex;
    gap: 30px;
    z-index: 3
  }

  .svc-arrow {
    background: none;
    border: 0;
    cursor: pointer;
    color: rgba(255, 255, 255, .65);
    padding: 6px;
    line-height: 0
  }

  .svc-arrow:hover {
    color: #fff
  }

  .svc-arrow svg {
    width: 16px;
    height: 22px;
    fill: none;
    stroke: currentColor;
    stroke-width: 3;
    stroke-linecap: round;
    stroke-linejoin: round
  }

  .svc-marquee {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 10px;
    overflow: hidden;
    white-space: nowrap;
    z-index: 1;
    pointer-events: none
  }

  .svc-marquee span {
    display: inline-block;
    padding-left: 100%;
    animation: svcMarq 22s linear infinite;
    will-change: transform
  }

  .svc-marquee img {
    display: block;
    height: 88px;
    width: auto;
    max-width: none
  }

  @keyframes svcMarq {
    to {
      transform: translateX(-100%)
    }
  }

  @media (max-width:1024px) {
    .svc-track {
      --per: 2
    }

    .svc-arrows {
      top: -52px
    }
  }

  @media (max-width:640px) {
    .svc {
      padding-bottom: 150px
    }

    .svc-track {
      --per: 1
    }

    .svc-marquee img {
      height: 90px
    }

    .svc-head p {
      font-size: 16px
    }

    .svc-arrows {
      top: auto;
      bottom: -46px;
      right: auto;
      left: 50%;
      transform: translateX(-50%)
    }

    .svc {
      padding-bottom: 210px
    }
  }

  /* ---------- scroll reveal (repeat on scroll) ---------- */
  .svc-js .svc-eyebrow {
    opacity: 0;
    transform: translateX(-24px);
    transition: opacity .3s ease, transform .3s ease
  }

  .svc-js .svc-eyebrow:before {
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .3s ease
  }

  .svc-js .svc-eyebrow.is-in {
    opacity: 1;
    transform: none;
    transition: opacity .7s ease, transform .7s cubic-bezier(.2, .9, .2, 1)
  }

  .svc-js .svc-eyebrow.is-in:before {
    transform: scaleX(1);
    transition: transform .8s cubic-bezier(.2, .9, .2, 1) .1s
  }

  .svc-line {
    display: inline-block;
    overflow: hidden;
    vertical-align: top;
    padding-bottom: .12em;
    margin-bottom: -.12em
  }

  .svc-line-in {
    display: inline-block
  }

  .svc-js .svc-line-in {
    transform: translateY(110%);
    transition: transform .3s ease
  }

  .svc-js .svc-head h2.is-in .svc-line-in {
    transform: none;
    transition: transform 1s cubic-bezier(.2, .9, .2, 1) .1s
  }

  .svc-js .svc-head h2.is-in .svc-line:nth-child(2) .svc-line-in {
    transition-delay: .25s
  }

  .svc-js [data-reveal="up"] {
    opacity: 0;
    transform: translateY(36px);
    transition: opacity .3s ease, transform .3s ease
  }

  .svc-js [data-reveal="up"].is-in {
    opacity: 1;
    transform: none;
    transition: opacity .9s ease calc(var(--d, 0s) * .7), transform .9s cubic-bezier(.2, .9, .2, 1) calc(var(--d, 0s) * .7)
  }

  /* cards: scroll ke saath neeche se upar (JS --p set karti hai) */
  .svc-viewport {
    translate: 0 var(--ty, 0px);
    opacity: var(--op, 1);
    will-change: translate, opacity
  }

  @media (prefers-reduced-motion:reduce) {

    .svc-js .svc-eyebrow,
    .svc-js .svc-eyebrow:before,
    .svc-js .svc-line-in,
    .svc-js [data-reveal] {
      opacity: 1 !important;
      transform: none !important;
      transition: none !important
    }

    .svc-viewport {
      translate: none !important;
      opacity: 1 !important
    }
  }
</style>

<section class="svc" id="services">
  <img class="svc-bg" src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/bg-object.png" alt="" aria-hidden="true">

  <div class="svc-wrap">
    <div class="svc-head">
      <div class="svc-eyebrow" data-io>our services</div>
      <h2 data-io><span class="svc-line"><span class="svc-line-in">We do</span></span> <span class="svc-line"><span class="svc-line-in">everything</span></span></h2>
      <p data-reveal="up" data-io style="--d:.3s">You may be interested in what we can offer you. More services you can find below. We do everything at a high level.</p>
    </div>

    <div style="position:relative">
      <div class="svc-arrows">
        <button class="svc-arrow" id="svcPrev" aria-label="Previous"><svg viewBox="0 0 16 22">
            <path d="M12 3L4 11l8 8" />
          </svg></button>
        <button class="svc-arrow" id="svcNext" aria-label="Next"><svg viewBox="0 0 16 22">
            <path d="M4 3l8 8-8 8" />
          </svg></button>
      </div>
      <div class="svc-viewport">
        <div class="svc-track" id="svcTrack">
          <?php foreach ($services as $s):
            $icon  = $icons[$s[2]] ?? '';
            $title = str_replace('&lt;br&gt;', '<br>', htmlspecialchars($s[0], ENT_QUOTES, 'UTF-8'));
          ?>
            <a class="svc-card" href="<?= htmlspecialchars($s[1], ENT_QUOTES, 'UTF-8') ?>">
              <span class="svc-icon">
                <?php if (preg_match('~^(https?:)?//|\.(png|jpe?g|webp|gif|svg)$~i', $icon)): ?>
                  <img src="<?= htmlspecialchars($icon, ENT_QUOTES, 'UTF-8') ?>" alt="" loading="lazy">
                <?php else: ?>
                  <?= $icon ?>
                <?php endif; ?>
              </span>

              <h3><?= $title ?></h3>

              <span class="svc-more">read more</span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="svc-marquee" aria-hidden="true"><span><img src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/WEBS-DESIGN-USA.png" alt=""></span></div>
</section>

<script>
  (function() {
    var track = document.getElementById('svcTrack'),
      cards = track.children,
      i = 0,
      timer;

    function per() {
      return parseInt(getComputedStyle(track).getPropertyValue('--per')) || 4
    }

    function go(n) {
      var max = cards.length - per();
      i = n > max ? 0 : (n < 0 ? max : n);
      var step = cards[0].getBoundingClientRect().width + 8;
      track.style.transform = 'translateX(' + (-i * step) + 'px)';
    }

    function auto() {
      clearInterval(timer);
      timer = setInterval(function() {
        go(i + 1)
      }, 5000)
    }
    document.getElementById('svcNext').onclick = function() {
      go(i + 1);
      auto()
    };
    document.getElementById('svcPrev').onclick = function() {
      go(i - 1);
      auto()
    };
    track.parentNode.parentNode.addEventListener('mouseenter', function() {
      clearInterval(timer)
    });
    track.parentNode.parentNode.addEventListener('mouseleave', auto);
    window.addEventListener('resize', function() {
      go(i)
    });
    auto();
  })();

  (function() {
    var root = document.documentElement;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    var sec = document.getElementById('services'),
      els = sec.querySelectorAll('[data-io]');
    sec.classList.add('svc-js');
    // text reveal: andar aaye to .is-in, bahar jaye to hat jaye (scroll par repeat)
    if ('IntersectionObserver' in window) {
      var io = new IntersectionObserver(function(es) {
        es.forEach(function(e) {
          e.target.classList.toggle('is-in', e.isIntersecting)
        });
      }, {
        threshold: .25
      });
      els.forEach(function(el) {
        io.observe(el)
      });
    } else els.forEach(function(el) {
      el.classList.add('is-in')
    });

    // cards: sab ek saath, smooth (lerp) move hote hain
    var view = document.querySelector('.svc-viewport'),
      tY = 0,
      tO = 1,
      cY = null,
      cO = null,
      raf = 0;

    function clamp(v, a, b) {
      return Math.max(a, Math.min(b, v))
    }

    function target() {
      var vh = window.innerHeight,
        r = view.getBoundingClientRect(),
        cur = parseFloat(view.style.getPropertyValue('--ty')) || 0;
      var top = r.top - cur; // translate hata kar asli position
      var d = top - vh * .12;
      tY = clamp(d * .38, -60, 170);
      tO = clamp(1 - Math.max(0, d) / (vh * .5) * .85, .12, 1);
    }

    function tick() {
      if (cY === null) {
        cY = tY;
        cO = tO
      }
      cY += (tY - cY) * .12;
      cO += (tO - cO) * .12; // 0.12 = smoothness (kam = aur smooth)
      view.style.setProperty('--ty', cY.toFixed(2) + 'px');
      view.style.setProperty('--op', cO.toFixed(3));
      if (Math.abs(tY - cY) > .1 || Math.abs(tO - cO) > .002) raf = requestAnimationFrame(tick);
      else raf = 0;
    }

    function req() {
      target();
      if (!raf) raf = requestAnimationFrame(tick)
    }
    window.addEventListener('scroll', req, {
      passive: true
    });
    window.addEventListener('resize', req);
    req();
  })();
</script>