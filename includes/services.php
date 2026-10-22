<?php /* services.php - use: <?php include __DIR__ . '/includes/services.php'; ?> */
require_once __DIR__ . '/init.php';

/* ---------- Heading ---------- */
$srvEyebrow = 'Our services';
$srvTitle   = 'Everything your brand<br>needs, <span>under one roof.</span>';   /* <span> = mint colour */
$srvLead    = 'From logo to launch, our team designs, builds and grows digital experiences at the highest level, under your brand or ours.';

/* ---------- Services: [title, link, icon, short description] ----------
   Icons: logo, web, illustration, branding, combo, marketing, mobile, video, code */
$services = [
  ['Logo Design Solutions',   cvg_url('services/service-detail.php?slug=logo-design-solutions'),  'logo',         'Custom logos that make a lasting first impression.'],
  ['Web Design Solutions',    cvg_url('services/service-detail.php?slug=web-design-solutions'),   'web',          'Responsive websites built to look great and convert.'],
  ['Illustration Design',     cvg_url('services/service-detail.php?slug=illustration-design'),    'illustration', 'Characters, scenes and artwork with personality.'],
  ['Branding',                cvg_url('services/service-detail.php?slug=branding'),               'branding',     'Identity systems that keep your brand consistent.'],
  ['Advance Combo Packages',  cvg_url('services/service-detail.php?slug=advance-combo-packages'), 'combo',        'Logo, website and more, bundled in one smart package.'],
  ['Digital Marketing',       cvg_url('services/service-detail.php?slug=digital-marketing'),      'marketing',    'SEO, social media and ads that bring real growth.'],
  ['Mobile Apps',             cvg_url('services/service-detail.php?slug=mobile-apps'),            'mobile',       'iOS and Android apps your users will love.'],
  ['Video Animations',        cvg_url('services/service-detail.php?slug=video-animation-services'), 'video',      'Explainer videos and motion that tell your story.'],
];

/* "All services" button ('' = hide) */
$srvAllLink = cvg_url('services/');

/* Auto-slide every X seconds (0 = off) */
$srvAutoplay = 5;
$srvIcons = [
  'logo'         => '<path d="M12 3l2.5 5 5.5.8-4 3.9.9 5.5L12 15.6 7.1 18.2 8 12.7 4 8.8 9.5 8z"/>',
  'web'          => '<rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 8h18M7 21h10M12 18v3"/>',
  'illustration' => '<path d="M3 21l4-1 11-11-3-3L4 17z"/><path d="M14 5l3 3M3 21c5-2 9 1 14-2"/>',
  'branding'     => '<circle cx="12" cy="12" r="9"/><circle cx="8.5" cy="10" r="1.5"/><circle cx="12" cy="7.5" r="1.5"/><circle cx="15.5" cy="10" r="1.5"/><path d="M12 21c-1.5 0-2-1-2-2s1-2 2.5-2H15a3 3 0 003-3"/>',
  'combo'        => '<path d="M12 3l9 5-9 5-9-5z"/><path d="M3 13l9 5 9-5M3 17.5l9 5 9-5"/>',
  'marketing'    => '<path d="M3 11v3a1 1 0 001 1h2l5 4V6L6 10H4a1 1 0 00-1 1z"/><path d="M15 9a4 4 0 010 6M18 6a8 8 0 010 12"/>',
  'mobile'       => '<rect x="6" y="2.5" width="12" height="19" rx="2.5"/><path d="M10.5 18.5h3"/>',
  'video'        => '<rect x="3" y="5" width="18" height="14" rx="3"/><path d="M10 9.5v5l4.5-2.5z"/>',
  'code'         => '<path d="M16 18l6-6-6-6M8 6l-6 6 6 6M14 4l-4 16"/>',
];
if (!function_exists('cvg_srv_e')) {
  function cvg_srv_e($s)
  {
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
  }
}
$srvArrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';
$srvTotal = count($services);
?>
<section class="cvg-srv" id="services" aria-labelledby="cvg-srv-title" data-autoplay="<?= (int) $srvAutoplay ?>">
  <div class="cvg-srv-grid" aria-hidden="true"></div>
  <div class="cvg-srv-word" aria-hidden="true">SERVICES</div>

  <div class="cvg-srv-wrap">
    <div class="cvg-srv-head">
      <div>
        <p class="cvg-srv-eyebrow cvg-srv-reveal"><?= cvg_srv_e($srvEyebrow) ?></p>
        <h2 class="cvg-srv-title cvg-srv-reveal" id="cvg-srv-title" style="--d:.08s"><?= str_ireplace(['<br>', '<br/>', '<br />'], '<br> ', strip_tags($srvTitle, '<br><span>')) ?></h2>
        <p class="cvg-srv-lead cvg-srv-reveal" style="--d:.16s"><?= cvg_srv_e($srvLead) ?></p>
      </div>
      <div class="cvg-srv-nav cvg-srv-reveal" style="--d:.24s">
        <button type="button" class="cvg-srv-btn cvg-srv-prev" aria-label="Previous services"><svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M15 6l-6 6 6 6" />
          </svg></button>
        <button type="button" class="cvg-srv-btn cvg-srv-next" aria-label="Next services"><svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M9 6l6 6-6 6" />
          </svg></button>
      </div>
    </div>
  </div>

  <div class="cvg-srv-wrap cvg-srv-wrap--track">
  <div class="cvg-srv-track" tabindex="0" aria-label="Our services">
    <?php foreach ($services as $i => $s):
      $icon = $srvIcons[$s[2]] ?? $srvIcons['code']; ?>
      <a class="cvg-srv-card cvg-srv-reveal" href="<?= cvg_srv_e($s[1]) ?>" style="--d:<?= min($i, 4) * 0.08 ?>s" draggable="false">
        <span class="cvg-srv-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
        <span class="cvg-srv-ic"><svg viewBox="0 0 24 24" aria-hidden="true"><?= $icon ?></svg></span>
        <h3><?= cvg_srv_e(strip_tags(str_replace('<br>', ' ', $s[0]))) ?></h3>
        <p><?= cvg_srv_e($s[3] ?? '') ?></p>
        <span class="cvg-srv-more"><i><?= $srvArrow ?></i>Read more</span>
      </a>
    <?php endforeach; ?>
  </div>
  </div>

  <div class="cvg-srv-wrap">
    <div class="cvg-srv-foot">
      <?php if ($srvAllLink !== ''): ?>
        <a class="cvg-srv-all" href="<?= cvg_srv_e($srvAllLink) ?>">All services <?= $srvArrow ?></a>
      <?php endif; ?>
    </div>
  </div>
</section>

<style>
  .cvg-srv {
    --srv-mint: #00D4A3;
    --srv-mint-l: #5FF0C8;
    --srv-ink: #04342C;
    --srv-text: #F2F5F4;
    --srv-text-2: #C9D6D2;
    --srv-grad: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, .45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
    --srv-ease: cubic-bezier(.2, .9, .2, 1);
    --srv-gap: 22px;
    position: relative;
    overflow: hidden;
    padding: 110px 0 100px;
    background: var(--srv-grad);
    color: var(--srv-text);
    font-family: 'Poppins', sans-serif;
    -webkit-font-smoothing: antialiased;
  }

  .cvg-srv *,
  .cvg-srv *::before,
  .cvg-srv *::after {
    box-sizing: border-box
  }

  .cvg-srv p {
    margin: 0
  }

  .cvg-srv a {
    text-decoration: none
  }

  .cvg-srv .cvg-srv-grid {
    position: absolute;
    inset: 0;
    pointer-events: none;
    background-image: linear-gradient(rgba(242, 245, 244, .05) 1px, transparent 1px), linear-gradient(90deg, rgba(242, 245, 244, .05) 1px, transparent 1px);
    background-size: 72px 72px;
    -webkit-mask-image: radial-gradient(ellipse 70% 80% at 80% 20%, #000 10%, transparent 70%);
    mask-image: radial-gradient(ellipse 70% 80% at 80% 20%, #000 10%, transparent 70%)
  }

  .cvg-srv .cvg-srv-word {
    position: absolute;
    right: max(-20px, calc((100% - 1200px) / 2));
    top: -27px;
    font-size: 190px;
    font-weight: 700;
    letter-spacing: -.04em;
    line-height: 1;
    color: transparent;
    -webkit-text-stroke: 1px rgba(242, 245, 244, .10);
    white-space: nowrap;
    pointer-events: none;
    user-select: none
  }

  .cvg-srv .cvg-srv-wrap {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 32px
  }

  /* Heading */
  .cvg-srv .cvg-srv-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 40px;
    margin-bottom: 54px
  }

  .cvg-srv .cvg-srv-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 16px;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--srv-mint-l)
  }

  .cvg-srv .cvg-srv-eyebrow::before {
    content: "";
    width: 36px;
    height: 2px;
    background: currentColor
  }

  .cvg-srv .cvg-srv-title {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: clamp(36px, 4.6vw, 60px);
    font-weight: 700;
    line-height: 1.04;
    letter-spacing: -.03em;
    color: var(--srv-text);
    text-transform: none
  }

  .cvg-srv .cvg-srv-title span {
    color: var(--srv-mint-l)
  }

  .cvg-srv .cvg-srv-lead {
    max-width: 470px;
    margin-top: 18px;
    font-size: 16.5px;
    line-height: 1.65;
    color: #D9F5EE
  }

  /* Arrows */
  .cvg-srv .cvg-srv-nav {
    display: flex;
    gap: 12px;
    flex: none
  }

  .cvg-srv .cvg-srv-btn {
    width: 56px;
    height: 56px;
    margin: 0;
    padding: 0;
    border-radius: 50%;
    border: 1px solid rgba(242, 245, 244, .3);
    background: rgba(10, 10, 10, .25);
    display: grid;
    place-items: center;
    cursor: pointer;
     
    transition: background .3s, border-color .3s, transform .3s
  }

  .cvg-srv .cvg-srv-btn svg {
    width: 20px;
    height: 20px;
    fill: none;
    stroke: var(--srv-text);
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
    transition: stroke .3s
  }

  .cvg-srv .cvg-srv-next,
  .cvg-srv .cvg-srv-btn:hover {
    background: var(--srv-mint);
    border-color: var(--srv-mint)
  }

  .cvg-srv .cvg-srv-next svg,
  .cvg-srv .cvg-srv-btn:hover svg {
    stroke: var(--srv-ink)
  }

  .cvg-srv .cvg-srv-btn:hover {
    transform: scale(1.06)
  }

  .cvg-srv .cvg-srv-btn:disabled {
    opacity: .35;
    cursor: default;
    transform: none;
    background: rgba(10, 10, 10, .25);
    border-color: rgba(242, 245, 244, .3)
  }

  .cvg-srv .cvg-srv-btn:disabled svg {
    stroke: var(--srv-text)
  }

  /* Track (scrolls sideways; drag with mouse, swipe on phone) */
  .cvg-srv .cvg-srv-track {
    position: relative;
    display: flex;
    gap: var(--srv-gap);
    overflow-x: auto;
    overflow-y: hidden;
    padding: 14px 0 24px;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
    scrollbar-width: none;
    -ms-overflow-style: none;
    outline: none;
    cursor: grab
  }

  .cvg-srv .cvg-srv-track::-webkit-scrollbar {
    display: none
  }

  .cvg-srv .cvg-srv-track.cvg-srv-dragging {
    cursor: grabbing;
    scroll-snap-type: none;
    scroll-behavior: auto
  }

  .cvg-srv .cvg-srv-track.cvg-srv-dragging .cvg-srv-card {
    pointer-events: none
  }

  .cvg-srv .cvg-srv-track:focus-visible {
    outline: 2px solid var(--srv-mint-l);
    outline-offset: -2px
  }

  /* Cards */
  .cvg-srv .cvg-srv-card {
    position: relative;
    flex: 0 0 calc((100% - 3 * var(--srv-gap)) / 4);
    min-width: 0;
    min-height: 360px;
    scroll-snap-align: start;
    padding: 30px 28px 28px;
    border-radius: 9px;
    background: rgba(10, 10, 10, .38);
    border: 1px solid rgba(95, 240, 200, .16);
    -webkit-backdrop-filter: blur(8px);
    backdrop-filter: blur(8px);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    color: var(--srv-text);
    user-select: none;
    transition: transform .5s var(--srv-ease), background .4s, border-color .4s, box-shadow .5s
  }

  .cvg-srv .cvg-srv-card::after {
    content: "";
    position: absolute;
    left: -30%;
    bottom: -40%;
    width: 160%;
    height: 70%;
    background: radial-gradient(closest-side, rgba(0, 212, 163, .28), transparent);
    opacity: 0;
    transition: opacity .5s;
    pointer-events: none
  }

  .cvg-srv .cvg-srv-num {
    position: absolute;
    right: 24px;
    top: 24px;
    font-size: 14px;
    font-weight: 600;
    color: rgba(242, 245, 244, .35);
    transition: color .4s
  }

  .cvg-srv .cvg-srv-ic {
    flex: none;
    width: 68px;
    height: 68px;
    border-radius: 10px;
    display: grid;
    place-items: center;
    background: rgba(0, 212, 163, .12);
  }

  .cvg-srv .cvg-srv-ic svg {
    width: 32px;
    height: 32px;
    fill: none;
    stroke: var(--srv-mint-l);
    stroke-width: 1.6;
    stroke-linecap: round;
    stroke-linejoin: round;
    transition: stroke .4s
  }

  /* Title always starts at the same height, and has room for 2 lines,
     so titles, descriptions and "Read more" line up across all cards */
  .cvg-srv .cvg-srv-card h3 {
    margin: 44px 0 10px;
    padding-top: 0;
    min-height: 2.5em;
    display: flex;
    align-items: flex-end;
    font-family: 'Poppins', sans-serif;
    font-size: 21px;
    font-weight: 600;
    line-height: 1.25;
    letter-spacing: -.01em;
    color: var(--srv-text);
    text-transform: none
  }

  .cvg-srv .cvg-srv-card p {
    flex: 1 0 auto;
    font-size: 14px;
    line-height: 1.6;
    color: var(--srv-text-2)
  }

  .cvg-srv .cvg-srv-more {
    display: inline-flex;
    align-items: center;
    align-self: flex-start;
    gap: 10px;
    margin-top: 22px;
    font-size: 14px;
    font-weight: 600;
    color: var(--srv-mint-l)
  }

  .cvg-srv .cvg-srv-more i {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    border: 1px solid rgba(95, 240, 200, .45);
    display: grid;
    place-items: center;
    transition: background .4s, border-color .4s, color .4s, transform .4s
  }

  .cvg-srv .cvg-srv-more svg {
    width: 15px;
    height: 15px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.2;
    stroke-linecap: round
  }

  .cvg-srv .cvg-srv-card:hover,
  .cvg-srv .cvg-srv-card:focus-visible {
    background: #0A0A0A;
    transform: translateY(-10px);
    outline: none
  }

  .cvg-srv .cvg-srv-card:hover::after,
  .cvg-srv .cvg-srv-card:focus-visible::after {
    opacity: 1
  }

  .cvg-srv .cvg-srv-card:hover .cvg-srv-ic,
  .cvg-srv .cvg-srv-card:focus-visible .cvg-srv-ic {
    background: var(--srv-mint);
    border-color: var(--srv-mint);
  }

  .cvg-srv .cvg-srv-card:hover .cvg-srv-ic svg,
  .cvg-srv .cvg-srv-card:focus-visible .cvg-srv-ic svg {
    stroke: var(--srv-ink)
  }

  .cvg-srv .cvg-srv-card:hover .cvg-srv-num {
    color: var(--srv-mint)
  }

  .cvg-srv .cvg-srv-card:hover .cvg-srv-more i,
  .cvg-srv .cvg-srv-card:focus-visible .cvg-srv-more i {
    background: var(--srv-mint);
    border-color: var(--srv-mint);
    color: var(--srv-ink);
    transform: rotate(45deg)
  }

  /* Footer: count, progress, button */
  .cvg-srv .cvg-srv-foot {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 30px
  }

  .cvg-srv .cvg-srv-count {
    flex: none;
    font-size: 14px;
    font-weight: 600;
    color: var(--srv-text-2);
    letter-spacing: .08em
  }

  .cvg-srv .cvg-srv-count b {
    color: var(--srv-text);
    font-size: 22px
  }

  .cvg-srv .cvg-srv-bar {
    flex: 1;
    height: 3px;
    border-radius: 3px;
    background: rgba(242, 245, 244, .15);
    overflow: hidden
  }

  .cvg-srv .cvg-srv-bar span {
    display: block;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, var(--srv-mint), var(--srv-mint-l));
    transform-origin: left;
    transform: scaleX(.2);
    transition: transform .4s var(--srv-ease)
  }

  .cvg-srv .cvg-srv-all {
    flex: none;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    height: 52px;
    padding: 0 26px;
    border-radius: 999px;
    background: var(--srv-mint);
    color: var(--srv-ink);
    font-weight: 600;
    font-size: 15px;
    line-height: 1;
    transition: transform .3s, box-shadow .3s
  }

  .cvg-srv .cvg-srv-all svg {
    width: 17px;
    height: 17px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.4;
    stroke-linecap: round;
    transition: transform .3s
  }

  .cvg-srv .cvg-srv-all:hover {
    color: var(--srv-ink);
    transform: translateY(-2px);
    box-shadow: 0 0 0 6px rgba(0, 212, 163, .14), 0 18px 40px rgba(0, 0, 0, .3)
  }

  .cvg-srv .cvg-srv-all:hover svg {
    transform: translate(3px, -3px)
  }

  .cvg-srv a:focus-visible,
  .cvg-srv button:focus-visible {
    outline: 2px solid var(--srv-mint-l);
    outline-offset: 3px
  }

  /* Scroll reveal (only when JS is on) */
  .cvg-srv.cvg-srv--js .cvg-srv-reveal {
    opacity: 0;
    transform: translateY(34px);
    transition: opacity .9s var(--srv-ease) var(--d, 0s), transform .9s var(--srv-ease) var(--d, 0s), background .4s, border-color .4s, box-shadow .5s
  }

  .cvg-srv.cvg-srv--js .cvg-srv-reveal.cvg-srv-in {
    opacity: 1;
    transform: none
  }

  .cvg-srv.cvg-srv--js .cvg-srv-card.cvg-srv-in:hover,
  .cvg-srv.cvg-srv--js .cvg-srv-card.cvg-srv-in:focus-visible {
    transform: translateY(-10px);
    transition-delay: 0s
  }

  /* Responsive */
  @media (max-width:1100px) {
    .cvg-srv .cvg-srv-card {
      flex-basis: calc((100% - 2 * var(--srv-gap)) / 3)
    }
  }

  @media (max-width:860px) {
    .cvg-srv {
      padding: 84px 0 80px
    }

    .cvg-srv .cvg-srv-head {
      flex-direction: column;
      align-items: flex-start;
      gap: 24px;
      margin-bottom: 36px
    }

    .cvg-srv .cvg-srv-word {
      font-size: 120px;
      top: 20px
    }

    .cvg-srv .cvg-srv-card {
      flex-basis: calc((100% - var(--srv-gap)) / 2)
    }
  }

  @media (max-width:600px) {
    .cvg-srv {
      --srv-gap: 14px;
      padding: 70px 0 70px
    }

    /* phone: cards may run to the screen edge so the next one peeks in */
    .cvg-srv .cvg-srv-wrap.cvg-srv-wrap--track {
      padding: 0
    }

    .cvg-srv .cvg-srv-track {
      padding: 14px 16px 24px;
      scroll-padding: 0 16px
    }

    .cvg-srv .cvg-srv-wrap {
      padding: 0 16px
    }

    .cvg-srv .cvg-srv-lead {
      font-size: 15.5px
    }

    .cvg-srv .cvg-srv-title br {
      display: none
    }

    .cvg-srv .cvg-srv-nav {
      display: none
    }

    .cvg-srv .cvg-srv-card {
      flex-basis: 80%;
      min-height: 320px;
      padding: 26px 24px 24px
    }

    .cvg-srv .cvg-srv-card h3 {
      margin-top: 36px;
      font-size: 20px
    }

    .cvg-srv .cvg-srv-ic {
      width: 60px;
      height: 60px
    }

    .cvg-srv .cvg-srv-num {
      right: 20px;
      top: 20px
    }

    .cvg-srv .cvg-srv-foot {
      flex-wrap: wrap;
      gap: 18px
    }

    .cvg-srv .cvg-srv-bar {
      flex-basis: 100%;
      order: 3
    }

    .cvg-srv .cvg-srv-word {
      font-size: 84px
    }
  }

  @media (prefers-reduced-motion:reduce) {

    .cvg-srv *,
    .cvg-srv *::before,
    .cvg-srv *::after {
      transition: none !important;
      animation: none !important
    }

    .cvg-srv .cvg-srv-track {
      scroll-behavior: auto
    }
  }
</style>

<script>
  (function() {
    var sec = document.getElementById('services');
    if (!sec || !sec.classList.contains('cvg-srv')) return;
    var track = sec.querySelector('.cvg-srv-track');
    var cards = Array.prototype.slice.call(track.querySelectorAll('.cvg-srv-card'));
    var prev = sec.querySelector('.cvg-srv-prev'),
      next = sec.querySelector('.cvg-srv-next');
    var cur = sec.querySelector('.cvg-srv-cur'),
      bar = sec.querySelector('.cvg-srv-bar span');
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var autoSec = parseInt(sec.getAttribute('data-autoplay'), 10) || 0;
    if (!cards.length) return;

    function step() {
      return cards.length > 1 ? cards[1].offsetLeft - cards[0].offsetLeft : track.clientWidth;
    }

    function maxScroll() {
      return track.scrollWidth - track.clientWidth;
    }

    function go(dir) {
      var m = maxScroll();
      if (dir > 0 && track.scrollLeft >= m - 4) track.scrollTo({
        left: 0
      }); /* end: back to start */
      else if (dir < 0 && track.scrollLeft <= 4) track.scrollTo({
        left: m
      }); /* start: jump to end */
      else track.scrollBy({
        left: dir * step()
      });
    }

    /* Count + progress bar */
    function update() {
      var m = maxScroll();
      var idx = Math.round(track.scrollLeft / Math.max(1, step()));
      var visible = Math.max(1, Math.floor(track.clientWidth / Math.max(1, step())));
      var shown = Math.min(cards.length, idx + 1);
      if (track.scrollLeft >= m - 4) shown = cards.length;
      if (cur) cur.textContent = (shown < 10 ? '0' : '') + shown; /* only if the counter exists */
      var p = m > 0 ? track.scrollLeft / m : 1;
      var minW = Math.min(1, visible / cards.length);
      if (bar) bar.style.transform = 'scaleX(' + (minW + (1 - minW) * p).toFixed(3) + ')'; /* only if the progress bar exists */
    }
    track.addEventListener('scroll', function() {
      window.requestAnimationFrame(update);
    }, {
      passive: true
    });
    window.addEventListener('resize', update);
    update();

    if (prev) prev.addEventListener('click', function() {
      go(-1);
      restart();
    });
    if (next) next.addEventListener('click', function() {
      go(1);
      restart();
    });
    track.addEventListener('keydown', function(e) {
      if (e.key === 'ArrowRight') {
        e.preventDefault();
        go(1);
      }
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        go(-1);
      }
    });

    /* Drag with the mouse (touch already swipes natively) */
    var down = false,
      moved = false,
      startX = 0,
      startLeft = 0;
    track.addEventListener('pointerdown', function(e) {
      if (e.pointerType !== 'mouse' || e.button !== 0) return;
      down = true;
      moved = false;
      startX = e.clientX;
      startLeft = track.scrollLeft;
    });
    window.addEventListener('pointermove', function(e) {
      if (!down) return;
      var dx = e.clientX - startX;
      if (!moved && Math.abs(dx) > 6) {
        moved = true;
        track.classList.add('cvg-srv-dragging');
      }
      if (moved) track.scrollLeft = startLeft - dx;
    });
    window.addEventListener('pointerup', function() {
      if (!down) return;
      down = false;
      if (moved) {
        track.classList.remove('cvg-srv-dragging');
        var s = step();
        track.scrollTo({
          left: Math.round(track.scrollLeft / s) * s
        }); /* snap to nearest card */
        restart();
      }
    });
    track.addEventListener('click', function(e) {
      if (moved) {
        e.preventDefault();
        moved = false;
      }
    }, true);

    /* Auto-slide, paused while the mouse or keyboard focus is on the section */
    var timer = null,
      paused = false;

    function restart() {
      clearInterval(timer);
      if (!autoSec || reduce) return;
      timer = setInterval(function() {
        if (!paused && !document.hidden) go(1);
      }, autoSec * 1000);
    }
    sec.addEventListener('mouseenter', function() {
      paused = true;
    });
    sec.addEventListener('mouseleave', function() {
      paused = false;
    });
    sec.addEventListener('focusin', function() {
      paused = true;
    });
    sec.addEventListener('focusout', function() {
      paused = false;
    });
    restart();

    /* Scroll reveal */
    if (reduce || !('IntersectionObserver' in window)) return;
    sec.classList.add('cvg-srv--js');
    var io = new IntersectionObserver(function(es) {
      es.forEach(function(en) {
        if (en.isIntersecting) {
          en.target.classList.add('cvg-srv-in');
          io.unobserve(en.target);
        }
      });
    }, {
      threshold: 0.15
    });
    Array.prototype.forEach.call(sec.querySelectorAll('.cvg-srv-reveal'), function(el) {
      io.observe(el);
    });
  })();
</script>