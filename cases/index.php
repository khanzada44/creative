<?php
$casesHero = [
  'eyebrow' => 'Our work',
  'title'   => 'Cases',
  'lead'    => 'Websites, brands and motion we have crafted for businesses across the US. Real projects, real results.',
];

$latestCases = [
  ['assets/img/cases/AR_RED_02.jpg',      'Website design',        'Web design'],
  ['assets/img/cases/AR_RED_1A.jpg',      'Website design',        'Web design'],
  ['assets/img/cases/AR_Red_03.jpg',      'Website design',        'Web design'],
  ['assets/img/cases/AR_Rev_01.jpg',      'Website redesign',      'Web design'],
  ['assets/img/cases/AR_Rev_02.jpg',      'Website redesign',      'Web design'],
  ['assets/img/cases/AR_Web_01.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_02.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_03.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_04.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_05.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_06.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_07.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_08.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_09.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_10.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/AR_Web_11.jpg',      'Business website',      'Web design'],
  ['assets/img/cases/delight.jpg',        'Delight',               'Web design'],
  ['assets/img/cases/emerald.jpg',        'Emerald',               'Web design'],
  ['assets/img/cases/job-portal.jpg',     'Job portal',            'Web application'],
  ['assets/img/cases/mobileapp-boxed.jpg', 'Mobile app',            'App design'],
  ['assets/img/cases/pretzel.jpg',        'Pretzel',               'Web design'],
  ['assets/img/cases/roshetta.jpg',       'Roshetta',              'Web design'],
];

$casesFirstBatch = 8;

$portfolioTabs = [
  'all'      => 'All',
  'web'      => 'Web',
  'logo'     => 'Logo',
  'branding' => 'Branding',
  'video'    => 'Video Animations',
];

$portfolioItems = [
  'logo' => [
    'assets/img/portfolio/logo/39.jpg',
    'assets/img/portfolio/logo/38.png',
    'assets/img/portfolio/logo/37.png',
    'assets/img/portfolio/logo/37.jpg',
    'assets/img/portfolio/logo/36.png',
    'assets/img/portfolio/logo/35.png',
    'assets/img/portfolio/logo/34.png',
    'assets/img/portfolio/logo/33.png',
    'assets/img/portfolio/logo/32.jpg',
    'assets/img/portfolio/logo/31.jpg',
    'assets/img/portfolio/logo/30.jpg',
    'assets/img/portfolio/logo/29.jpg',
    'assets/img/portfolio/logo/28.jpg',
    'assets/img/portfolio/logo/27.jpg',
    'assets/img/portfolio/logo/26.jpg',
    'assets/img/portfolio/logo/25.jpg',
    'assets/img/portfolio/logo/20.png',
    'assets/img/portfolio/logo/19.png',
    'assets/img/portfolio/logo/18.png',
    'assets/img/portfolio/logo/17.png',
    'assets/img/portfolio/logo/16.png',
    'assets/img/portfolio/logo/15.png',
    'assets/img/portfolio/logo/13.png',
    'assets/img/portfolio/logo/12.png',
    'assets/img/portfolio/logo/11.jpg',
    'assets/img/portfolio/logo/10.png',
    'assets/img/portfolio/logo/9.png',
    'assets/img/portfolio/logo/8.png',
    'assets/img/portfolio/logo/7.jpg',
    'assets/img/portfolio/logo/6.png',
  ],
  /* Web: every assets/img/portfolio-img-*.webp, sorted by name */
  'web' => 'assets/img/portfolio-img-*.webp',
  'branding' => [
    'assets/img/portfolio/branding/branding-01.jpg',
    'assets/img/portfolio/branding/branding-02.jpg',
    'assets/img/portfolio/branding/branding-03.jpg',
    'assets/img/portfolio/branding/branding-04.jpg',
    'assets/img/portfolio/branding/branding-05.jpg',
    'assets/img/portfolio/branding/branding-06.jpg',
    'assets/img/portfolio/branding/branding-08.jpg',
    'assets/img/portfolio/branding/branding-08-1.jpg',
    'assets/img/portfolio/branding/branding-09.jpg',
  ],
  'video' => [
    'assets/img/portfolio/video/5.jpg',
    'assets/img/portfolio/video/4.png',
    'assets/img/portfolio/video/3.jpg',
    'assets/img/portfolio/video/2.png',
    'assets/img/portfolio/video/1.jpg',
    'assets/img/portfolio/video/img-8.png',
  ],
  'apps' => [
    'assets/img/portfolio/apps/cb316a174565023.64a4ae0db7808-removebg-preview.png',
  ],
];

$portfolioLabels = [
  'logo' => 'Logo design',
  'web' => 'Website design',
  'branding' => 'Branding',
  'video' => 'Video animation',
  'apps' => 'Mobile app',
];

/* ---------- Bottom call to action ---------- */
$casesCtaLink = 'contact-us/index.php';   /* relative to your site root */

require_once dirname(__DIR__) . '/includes/init.php';
$siteUrl = cvg_url('');

/* ================= Nothing to change below this line ================= */

$cvgRoot = dirname(__DIR__);   /* project root (folder above includes/) */
if (!is_dir($cvgRoot . '/assets')) $cvgRoot = __DIR__;   /* file placed in the root instead */

if (!function_exists('cvg_e')) {
  function cvg_e($s)
  {
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
  }
}
/* Image ka URL (full https:// link bhi chalega) */
if (!function_exists('cvg_cs_img')) {
  function cvg_cs_img($path)
  {
    $path = trim(str_replace('\\', '/', $path));
    if (preg_match('~^(https?:)?//~i', $path)) return $path;
    return cvg_url(ltrim($path, '/'));
  }
}
/* File folder mein hai? Nahi hai to card nahi dikhega (khali/toota card nahi) */
if (!function_exists('cvg_cs_has')) {
  function cvg_cs_has($path, $root)
  {
    $path = trim(str_replace('\\', '/', $path));
    if ($path === '') return false;
    if (preg_match('~^(https?:)?//~i', $path)) return true;
    return is_file(rtrim($root, '/\\') . '/' . ltrim($path, '/'));
  }
}
if (!function_exists('cvg_port_images')) {
  function cvg_port_images($source, $root)
  {
    if (is_array($source)) return array_values(array_filter($source, 'strlen'));
    $files = glob(rtrim($root, '/\\') . '/' . ltrim($source, '/'), GLOB_NOSORT) ?: [];
    natcasesort($files);
    $base = str_replace('\\', '/', rtrim($root, '/\\'));
    $rel = [];
    foreach ($files as $f) $rel[] = ltrim(substr(str_replace('\\', '/', $f), strlen($base)), '/');
    return $rel;
  }
}
$cvgArrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';
$cvgPlay  = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5l11 7-11 7z"/></svg>';
$firstTab = array_key_first($portfolioTabs);
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<link rel="stylesheet" href="<?= cvg_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= cvg_url('assets/css/footer.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Scroll-reveal flag: set BEFORE the page renders (no flash). Skipped if reduced motion / no IntersectionObserver. -->
<script>
  (function() {
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduce || !('IntersectionObserver' in window)) return;
    document.documentElement.className += ' cvg-js';
    /* Safety net: if the main script never starts, show everything */
    setTimeout(function() {
      if (!window.cvgCasesReady) document.documentElement.className = document.documentElement.className.replace(/\bcvg-js\b/, '');
    }, 4000);
  })();
</script>

<!-- ================= STYLES (placed before <main> so the page is styled on first paint) ================= -->
<style>
 /* Scrollbar ki width */
::-webkit-scrollbar {
  width: 10px;
}

/* Scrollbar ki background track */
::-webkit-scrollbar-track {
  background: #0b2b26; /* Apne dark theme ke hisab se change karein */
}

::-webkit-scrollbar-thumb {
  background: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, 0.45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
  border-radius: 5px;  
}

/* Hover karne par thumb ka color */
::-webkit-scrollbar-thumb:hover {
  background: #00a8a8;
}
  html,
  body {
    margin: 0;
    padding: 0;
  }

  body {
    overflow-x: hidden;
  }

  /* =========================================================
   Creative Converge — Cases page. Every rule is scoped to
   .cvg-cs (lightbox: .cvg-cs-lb), so nothing here touches
   the rest of your site.
   ========================================================= */
  .cvg-cs {
    --cs-bg: #0A0A0A;
    --cs-surface: #111614;
    --cs-line: #1E2A27;
    --cs-line-2: #2A3A36;
    --cs-mint: #00D4A3;
    --cs-mint-l: #5FF0C8;
    --cs-ink: #04342C;
    --cs-text: #F2F5F4;
    --cs-text-2: #C9D6D2;
    --cs-muted: #8FA39E;
    --cs-grad: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, .45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
    --cs-ease: cubic-bezier(.2, .9, .2, 1);
    display: block;
    overflow: hidden;
    background: var(--cs-bg);
    color: var(--cs-text);
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    line-height: 1.65;
    -webkit-font-smoothing: antialiased;
  }

  .cvg-cs *,
  .cvg-cs *::before,
  .cvg-cs *::after {
    box-sizing: border-box
  }

  .cvg-cs img {
    display: block;
    max-width: 100%;
    border-radius: 0;
    margin: 0;
    box-shadow: none
  }

  .cvg-cs p {
    margin: 0
  }

  .cvg-cs a {
    text-decoration: none
  }

  .cvg-cs .cvg-cs-wrap {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 32px
  }

  .cvg-cs .cvg-cs-mint {
    color: var(--cs-mint)
  }

  .cvg-cs .cvg-cs-mint-l {
    color: var(--cs-mint-l)
  }

  .cvg-cs .cvg-cs-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 16px;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--cs-mint)
  }

  .cvg-cs .cvg-cs-eyebrow::before {
    content: "";
    width: 36px;
    height: 2px;
    background: currentColor
  }

  .cvg-cs .cvg-cs-eyebrow.cvg-cs-light {
    color: var(--cs-mint-l)
  }

  .cvg-cs .cvg-cs-h2 {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: clamp(34px, 4.4vw, 56px);
    font-weight: 700;
    line-height: 1.06;
    letter-spacing: -.025em;
    color: var(--cs-text);
    text-transform: none
  }

  .cvg-cs .cvg-cs-head {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-end;
    gap: 24px;
    margin-bottom: 56px
  }

  .cvg-cs .cvg-cs-head-lead {
    max-width: 420px;
    color: var(--cs-muted);
    font-size: 17px
  }

  .cvg-cs .cvg-cs-head--center {
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 28px
  }

  .cvg-cs .cvg-cs-center {
    display: flex;
    justify-content: center;
    margin-top: 48px
  }

  /* Buttons */
  .cvg-cs .cvg-cs-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    height: 54px;
    margin: 0;
    padding: 0 28px;
    border-radius: 999px;
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-weight: 600;
    line-height: 1;
    cursor: pointer;
    transition: transform .3s, box-shadow .3s, border-color .3s, color .3s, background .3s
  }

  .cvg-cs .cvg-cs-btn svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.4;
    stroke-linecap: round;
    transition: transform .3s
  }

  .cvg-cs .cvg-cs-btn:hover svg {
    transform: translate(3px, -3px)
  }

  .cvg-cs .cvg-cs-btn--mint {
    border: 0;
    background: var(--cs-mint);
    color: var(--cs-ink);
  }

  .cvg-cs .cvg-cs-btn--mint:hover {
    color: var(--cs-ink);
    transform: translateY(-2px);
  }

  .cvg-cs .cvg-cs-btn--ghost {
    border: 1px solid var(--cs-line-2);
    background: transparent;
    color: var(--cs-text)
  }

  .cvg-cs .cvg-cs-btn--ghost:hover {
    border-color: var(--cs-mint);
    color: var(--cs-mint-l);
    background: transparent
  }

  .cvg-cs a:focus-visible,
  .cvg-cs button:focus-visible {
    outline: 2px solid var(--cs-mint-l);
    outline-offset: 3px
  }

  /* ===== 1. Banner (your gradient) ===== */
  .cvg-cs .cvg-cs-hero {
    position: relative;
    overflow: hidden;
    padding: 170px 0 120px;
    background: var(--cs-grad)
  }

  .cvg-cs .cvg-cs-hero-grid {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(242, 245, 244, .06) 1px, transparent 1px), linear-gradient(90deg, rgba(242, 245, 244, .06) 1px, transparent 1px);
    background-size: 72px 72px;
    -webkit-mask-image: radial-gradient(ellipse 70% 70% at 30% 40%, #000 15%, transparent 75%);
    mask-image: radial-gradient(ellipse 70% 70% at 30% 40%, #000 15%, transparent 75%);
    animation: cvgCsGrid 20s linear infinite
  }

  @keyframes cvgCsGrid {
    to {
      background-position: 72px 72px, 72px 72px
    }
  }

  .cvg-cs .cvg-cs-hero-word {
    position: absolute;
    right: -.04em;
    bottom: -.2em;
    font-size: clamp(140px, 24vw, 380px);
    font-weight: 700;
    letter-spacing: -.05em;
    line-height: 1;
    color: transparent;
    -webkit-text-stroke: 1.5px rgba(95, 240, 200, .22);
    pointer-events: none;
    user-select: none;
    white-space: nowrap
  }

  .cvg-cs .cvg-cs-hero-inner {
    z-index: 1
  }

  .cvg-cs .cvg-cs-crumbs {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-bottom: 26px;
    font-size: 14px;
    color: rgba(242, 245, 244, .7)
  }

  .cvg-cs .cvg-cs-crumbs a {
    color: rgba(242, 245, 244, .7)
  }

  .cvg-cs .cvg-cs-crumbs a:hover {
    color: var(--cs-mint-l)
  }

  .cvg-cs .cvg-cs-crumbs [aria-current] {
    color: var(--cs-mint-l)
  }

  .cvg-cs .cvg-cs-hero-title {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: clamp(64px, 10vw, 140px);
    font-weight: 700;
    line-height: .95;
    letter-spacing: -.045em;
    color: var(--cs-text);
    text-transform: none
  }

  .cvg-cs .cvg-cs-hero-title span {
    color: var(--cs-mint-l)
  }

  .cvg-cs .cvg-cs-hero-lead {
    max-width: 560px;
    margin-top: 24px;
    font-size: 18px;
    color: #D9F5EE
  }

  /* ===== 2. Latest cases ===== */
  .cvg-cs .cvg-cs-latest {
    padding: 120px 0
  }

  .cvg-cs .cvg-cs-cases {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 22px
  }

  .cvg-cs .cvg-cs-case {
    display: block;
    padding: 10px;
    color: var(--cs-text);
    transition: border-color .4s, transform .5s var(--cs-ease),
  }

  .cvg-cs .cvg-cs-case:hover {
    border-color: rgba(0, 212, 163, .6);
    transform: translateY(-6px);
  }

  .cvg-cs .cvg-cs-case-media {
    position: relative;
    display: block;
    height: 380px;
    overflow: hidden;
    background: #0D1211
  }

  .cvg-cs .cvg-cs-case-img {
    width: 100%;
    height: auto;
    max-width: none;
    transform: translateY(0);
    transition: transform 1s ease-in-out;
    will-change: transform
  }

  .cvg-cs .cvg-cs-case-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    padding: 16px 8px 6px
  }

  .cvg-cs .cvg-cs-case-meta strong {
    display: block;
    font-size: 16px;
    font-weight: 600;
    line-height: 1.3
  }

  .cvg-cs .cvg-cs-case-meta small {
    display: block;
    font-size: 13px;
    color: var(--cs-muted)
  }

  .cvg-cs .cvg-cs-go {
    width: 42px;
    height: 42px;
    flex: none;
    border-radius: 50%;
    border: 1px solid var(--cs-line-2);
    display: grid;
    place-items: center;
    color: var(--cs-mint);
    transition: background .4s, border-color .4s, transform .5s var(--cs-ease), color .4s
  }

  .cvg-cs .cvg-cs-go svg {
    width: 17px;
    height: 17px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.4;
    stroke-linecap: round
  }

  .cvg-cs .cvg-cs-case:hover .cvg-cs-go {
    background: var(--cs-mint);
    border-color: var(--cs-mint);
    color: var(--cs-ink);
    transform: rotate(45deg)
  }

  .cvg-cs .cvg-cs-more-item.cvg-cs-collapsed {
    display: none
  }

  /* ===== 3. Portfolio (gradient section) ===== */
  .cvg-cs .cvg-cs-port {
    padding: 120px 0;
    background: var(--cs-grad)
  }

  .cvg-cs .cvg-cs-tabs {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin: 0 0 44px
  }

  .cvg-cs .cvg-cs-tab {
    height: 44px;
    margin: 0;
    padding: 0 22px;
    color: var(--cs-text);
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 500;
    line-height: 1;
    text-transform: none;
    cursor: pointer;
    transition: background .3s, color .3s, border-color .3s
  }

  .cvg-cs .cvg-cs-tab:hover {
    border-color: var(--cs-mint-l);
    color: var(--cs-mint-l)
  }

  .cvg-cs .cvg-cs-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
    transition: opacity .28s, transform .28s
  }

  .cvg-cs .cvg-cs-grid--out {
    opacity: 0;
    transform: translateY(12px)
  }

  .cvg-cs .cvg-cs-item {
    position: relative;
    display: block;
    overflow: hidden;
    border-radius: 4px;
    background: #0A0F0E;
    opacity: 0;
    transform: translateY(24px) scale(.98);
    transition: opacity .6s var(--cs-ease) var(--cs-d, 0s), transform .6s var(--cs-ease) var(--cs-d, 0s), box-shadow .4s
  }

  .cvg-cs .cvg-cs-item.cvg-cs-in {
    opacity: 1;
    transform: none
  }

  .cvg-cs .cvg-cs-item.cvg-cs-hide {
    display: none
  }

  .cvg-cs .cvg-cs-item:hover,
  .cvg-cs .cvg-cs-item:focus-visible {
    box-shadow: 0 0 0 2px var(--cs-mint), 0 20px 50px rgba(0, 212, 163, .2)
  }

  .cvg-cs .cvg-cs-item-media {
    position: relative;
    display: block;
    overflow: hidden;
    aspect-ratio: 4/3
  }

  .cvg-cs .cvg-cs-item-img {
    width: 100%;
    height: 100%;
    max-width: none;
    object-fit: cover;
    transition: transform .8s var(--cs-ease)
  }

  .cvg-cs .cvg-cs-item:hover .cvg-cs-item-img {
    transform: scale(1.06)
  }

  .cvg-cs .cvg-cs-item--branding .cvg-cs-item-media {
    aspect-ratio: 1/1
  }

  .cvg-cs .cvg-cs-item--apps .cvg-cs-item-img {
    object-fit: contain;
    background: #0E1412
  }

  /* Website screenshots: tall card that scrolls on hover */
  .cvg-cs .cvg-cs-item--web .cvg-cs-item-media {
    aspect-ratio: auto;
    height: 420px
  }

  .cvg-cs .cvg-cs-item--web .cvg-cs-item-img {
    height: auto;
    object-fit: initial;
    transition: transform 1s ease-in-out
  }

  .cvg-cs .cvg-cs-item--web:hover .cvg-cs-item-img {
    transform: none
  }

  .cvg-cs .cvg-cs-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 10px;
    padding: 14px;
    background: linear-gradient(180deg, rgba(0, 33, 27, 0) 45%, rgba(0, 33, 27, .8) 100%);
    opacity: 0;
    transition: opacity .4s;
    pointer-events: none
  }

  .cvg-cs .cvg-cs-item:hover .cvg-cs-overlay,
  .cvg-cs .cvg-cs-item:focus-visible .cvg-cs-overlay {
    opacity: 1
  }

  .cvg-cs .cvg-cs-tag {
    font-size: 12px;
    font-weight: 600;
    color: var(--cs-text);
    padding: 6px 12px;
    border-radius: 999px;
    background: rgba(10, 10, 10, .6)
  }

  .cvg-cs .cvg-cs-overlay .cvg-cs-go {
    background: var(--cs-mint);
    border-color: var(--cs-mint);
    color: var(--cs-ink)
  }

  .cvg-cs .cvg-cs-play {
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 2;
    width: 56px;
    height: 56px;
    margin: -28px 0 0 -28px;
    border-radius: 50%;
    background: var(--cs-mint);
    display: grid;
    place-items: center;
    animation: cvgCsPulse 2.4s ease-in-out infinite;
    pointer-events: none
  }

  .cvg-cs .cvg-cs-play svg {
    width: 20px;
    height: 20px;
    margin-left: 3px;
    fill: var(--cs-ink)
  }

  @keyframes cvgCsPulse {

    0%,
    100% {
      box-shadow: 0 0 0 0 rgba(0, 212, 163, .45)
    }

    70% {
      box-shadow: 0 0 0 16px rgba(0, 212, 163, 0)
    }
  }

  /* ===== 4. CTA ===== */
  .cvg-cs .cvg-cs-cta {
    padding: 110px 0
  }

  .cvg-cs .cvg-cs-cta-inner {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 30px
  }

  /* ===== Scroll reveal (flag .cvg-js is set on <html> before first paint) ===== */
  .cvg-js .cvg-cs .cvg-cs-reveal {
    opacity: 0;
    transform: translateY(36px);
    transition: opacity .9s var(--cs-ease) var(--d, 0s), transform .9s var(--cs-ease) var(--d, 0s), border-color .4s, box-shadow .5s
  }

  .cvg-js .cvg-cs .cvg-cs-reveal.cvg-cs-shown {
    opacity: 1;
    transform: none
  }

  .cvg-js .cvg-cs .cvg-cs-case.cvg-cs-shown:hover {
    transform: translateY(-6px);
    transition-delay: 0s
  }

  /* ===== Lightbox ===== */
  .cvg-cs-lb {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    padding: 40px 20px;
    box-sizing: border-box;
    background: rgba(5, 8, 7, .93);
    backdrop-filter: blur(6px);
    opacity: 0;
    transition: opacity .25s;
    font-family: 'Poppins', sans-serif
  }

  .cvg-cs-lb[hidden] {
    display: none
  }

  .cvg-cs-lb.cvg-cs-lb--open {
    opacity: 1
  }

  .cvg-cs-lb .cvg-cs-lb-stage {
    max-width: min(1100px, 100%);
    max-height: calc(100vh - 80px);
    overflow: auto;
    border-radius: 14px;
    box-shadow: 0 30px 80px rgba(0, 0, 0, .6)
  }

  .cvg-cs-lb .cvg-cs-lb-img {
    display: block;
    max-width: 100%;
    max-height: calc(100vh - 80px);
    margin: 0 auto
  }

  .cvg-cs-lb.cvg-cs-lb--tall .cvg-cs-lb-stage {
    width: min(900px, 100%)
  }

  .cvg-cs-lb.cvg-cs-lb--tall .cvg-cs-lb-img {
    width: 100%;
    max-height: none
  }

  .cvg-cs-lb button {
    flex: none;
    width: 48px;
    height: 48px;
    margin: 0;
    padding: 0;
    border: 1px solid rgba(95, 240, 200, .35);
    border-radius: 50%;
    background: rgba(17, 22, 20, .85);
    color: #F2F5F4;
    font-size: 28px;
    line-height: 1;
    cursor: pointer;
    display: grid;
    place-items: center;
    transition: background .3s, color .3s
  }

  .cvg-cs-lb button:hover {
    background: #00D4A3;
    color: #04342C
  }

  .cvg-cs-lb button:focus-visible {
    outline: 2px solid #5FF0C8;
    outline-offset: 3px
  }

  .cvg-cs-lb .cvg-cs-lb-close {
    position: absolute;
    top: 18px;
    right: 18px
  }

  .cvg-cs-lb .cvg-cs-lb-count {
    position: absolute;
    left: 50%;
    bottom: 18px;
    transform: translateX(-50%);
    margin: 0;
    color: #8FA39E;
    font-size: 13px
  }

  /* ===== Responsive ===== */
  @media (max-width:1100px) {

    .cvg-cs .cvg-cs-cases,
    .cvg-cs .cvg-cs-grid {
      grid-template-columns: repeat(3, minmax(0, 1fr))
    }
  }

  @media (max-width:767px) {
    .cvg-cs .cvg-cs-wrap {
      padding: 0 16px
    }

    .cvg-cs .cvg-cs-hero {
      padding: 130px 0 90px
    }

    .cvg-cs .cvg-cs-hero-lead {
      font-size: 16px
    }

    .cvg-cs .cvg-cs-latest,
    .cvg-cs .cvg-cs-port {
      padding: 80px 0
    }

    .cvg-cs .cvg-cs-head {
      margin-bottom: 36px
    }

    .cvg-cs .cvg-cs-cases,
    .cvg-cs .cvg-cs-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 10px
    }

    .cvg-cs .cvg-cs-case {
      padding: 6px;
      border-radius: 16px
    }

    .cvg-cs .cvg-cs-case-media {
      height: 260px
    }

    .cvg-cs .cvg-cs-case-meta {
      padding: 10px 4px 4px
    }

    .cvg-cs .cvg-cs-case-meta strong {
      font-size: 14px
    }

    .cvg-cs .cvg-cs-go {
      width: 34px;
      height: 34px
    }

    .cvg-cs .cvg-cs-frame {
      padding: 10px;
      border-radius: 20px
    }

    .cvg-cs .cvg-cs-item--web .cvg-cs-item-media {
      height: 300px
    }

    .cvg-cs .cvg-cs-tab {
      padding: 0 16px;
      font-size: 13px
    }

    .cvg-cs-lb {
      padding: 70px 10px 70px
    }

    .cvg-cs-lb .cvg-cs-lb-nav {
      position: absolute;
      bottom: 14px
    }

    .cvg-cs-lb .cvg-cs-lb-prev {
      left: calc(50% - 64px)
    }

    .cvg-cs-lb .cvg-cs-lb-next {
      right: calc(50% - 64px)
    }

    .cvg-cs-lb .cvg-cs-lb-count {
      bottom: auto;
      top: 30px
    }
  }

  @media (prefers-reduced-motion:reduce) {

    .cvg-cs *,
    .cvg-cs *::before,
    .cvg-cs *::after,
    .cvg-cs-lb {
      animation: none !important;
      transition: none !important
    }

    .cvg-cs .cvg-cs-item,
    .cvg-js .cvg-cs .cvg-cs-reveal {
      opacity: 1;
      transform: none
    }
  }
</style>

<main class="cvg-cs" id="cvg-cases-page">

  <!-- ================= 1. BANNER ================= -->
  <section class="cvg-cs-hero">
    <div class="cvg-cs-hero-grid" aria-hidden="true"></div>
    <div class="cvg-cs-hero-word" aria-hidden="true"><?= cvg_e($casesHero['title']) ?></div>
    <div class="cvg-cs-wrap cvg-cs-hero-inner">
      <p class="cvg-cs-eyebrow cvg-cs-light"><?= cvg_e($casesHero['eyebrow']) ?></p>
      <h1 class="cvg-cs-hero-title"><?= cvg_e($casesHero['title']) ?><span>.</span></h1>
      <p class="cvg-cs-hero-lead"><?= cvg_e($casesHero['lead']) ?></p>
    </div>
  </section>

  <!-- ================= 2. OUR LATEST CASES ================= -->
  <section class="cvg-cs-latest" id="cvg-cs-latest">
    <div class="cvg-cs-wrap">
      <div class="cvg-cs-head cvg-cs-reveal">
        <div>
          <p class="cvg-cs-eyebrow">Portfolio</p>
          <h2 class="cvg-cs-h2">Our latest <span class="cvg-cs-mint">cases.</span></h2>
        </div>
        <p class="cvg-cs-head-lead">We always try to implement our creative ideas at the highest level. You can see it by looking at our portfolio.</p>
      </div>

      <div class="cvg-cs-cases">
        <?php $latestCases = array_values(array_filter($latestCases, function ($c) use ($cvgRoot) { return !empty($c[0]) && cvg_cs_has($c[0], $cvgRoot); }));
        foreach ($latestCases as $i => $c):
          if (empty($c[0]) || !cvg_cs_has($c[0], $cvgRoot)) continue;
          $url  = cvg_cs_img($c[0]);
          $more = ($casesFirstBatch > 0 && $i >= $casesFirstBatch) ? ' cvg-cs-more-item' : '';
        ?>
          <a href="<?= cvg_e($url) ?>" class="cvg-cs-case cvg-cs-reveal<?= $more ?>" data-lb="cases" style="--d:<?= ($i % 4) * 0.07 ?>s" aria-label="<?= cvg_e($c[1]) ?>: open large image">
            <span class="cvg-cs-case-media"><img src="<?= cvg_e($url) ?>" alt="<?= cvg_e($c[1]) ?>" loading="lazy" class="cvg-cs-case-img"></span>
            <span class="cvg-cs-case-meta">
              <span><strong><?= cvg_e($c[1]) ?></strong><small><?= cvg_e($c[2] ?? '') ?></small></span>
              <span class="cvg-cs-go"><?= $cvgArrow ?></span>
            </span>
          </a>
        <?php endforeach; ?>
      </div>

      <?php if ($casesFirstBatch > 0 && count($latestCases) > $casesFirstBatch): ?>
        <div class="cvg-cs-center">
          <button type="button" class="cvg-cs-btn cvg-cs-btn--ghost cvg-cs-loadmore" aria-expanded="false">Load more cases</button>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- ================= 3. OUR PORTFOLIO (tabs) ================= -->
  <section class="cvg-cs-port" id="cvg-cs-portfolio">
    <div class="cvg-cs-wrap">
      <div class="cvg-cs-head cvg-cs-head--center cvg-cs-reveal">
        <p class="cvg-cs-eyebrow cvg-cs-light">Selected work</p>
        <h2 class="cvg-cs-h2">Our <span class="cvg-cs-mint-l">Portfolio</span></h2>
      </div>

      <div class="cvg-cs-tabs cvg-cs-reveal" role="group" aria-label="Filter portfolio">
        <?php foreach ($portfolioTabs as $key => $name): $on = ($key === $firstTab); ?>
          <button type="button" class="cvg-cs-tab<?= $on ? ' cvg-cs-tab--on' : '' ?>" data-filter="<?= cvg_e($key) ?>" aria-pressed="<?= $on ? 'true' : 'false' ?>"><?= cvg_e($name) ?></button>
        <?php endforeach; ?>
      </div>

      <div class="cvg-cs-frame">
        <div class="cvg-cs-grid">
          <?php foreach ($portfolioItems as $cat => $source):
            if (!isset($portfolioTabs[$cat])) continue;
            $label = $portfolioLabels[$cat] ?? $portfolioTabs[$cat];
            foreach (cvg_port_images($source, $cvgRoot) as $img):
              if (!cvg_cs_has($img, $cvgRoot)) continue;
              $url  = cvg_cs_img($img);
              $show = ($firstTab === 'all' || $firstTab === $cat);
          ?>
              <a href="<?= cvg_e($url) ?>" class="cvg-cs-item cvg-cs-item--<?= cvg_e($cat) ?><?= $show ? ' cvg-cs-in' : ' cvg-cs-hide' ?>" data-cat="<?= cvg_e($cat) ?>" data-lb="port" aria-label="<?= cvg_e($label) ?>: open large image">
                <span class="cvg-cs-item-media"><img src="<?= cvg_e($url) ?>" alt="<?= cvg_e($label) ?> project" loading="lazy" class="cvg-cs-item-img"></span>
                <?php if ($cat === 'video'): ?><span class="cvg-cs-play"><?= $cvgPlay ?></span><?php endif; ?>
                <span class="cvg-cs-overlay" aria-hidden="true"><span class="cvg-cs-tag"><?= cvg_e($label) ?></span><span class="cvg-cs-go"><?= $cvgArrow ?></span></span>
              </a>
          <?php endforeach;
          endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 4. CTA ================= -->
  <section class="cvg-cs-cta">
    <div class="cvg-cs-wrap cvg-cs-cta-inner cvg-cs-reveal">
      <h2 class="cvg-cs-h2">Like what you see?<br><span class="cvg-cs-mint">Let's build yours next.</span></h2>
      <a href="<?= cvg_e(preg_match('~^(https?:)?//~i', $casesCtaLink) ? $casesCtaLink : $siteUrl . ltrim($casesCtaLink, '/')) ?>" class="cvg-cs-btn cvg-cs-btn--mint">Start a project <?= $cvgArrow ?></a>
    </div>
  </section>

  <!-- Lightbox -->
  <div class="cvg-cs-lb" role="dialog" aria-modal="true" aria-label="Project image" hidden>
    <button type="button" class="cvg-cs-lb-close" aria-label="Close">&times;</button>
    <button type="button" class="cvg-cs-lb-nav cvg-cs-lb-prev" aria-label="Previous image">&#8249;</button>
    <div class="cvg-cs-lb-stage"><img class="cvg-cs-lb-img" src="" alt=""></div>
    <button type="button" class="cvg-cs-lb-nav cvg-cs-lb-next" aria-label="Next image">&#8250;</button>
    <p class="cvg-cs-lb-count" aria-live="polite"></p>
  </div>
</main>
<?php include __DIR__ . '/../includes/footer.php'; ?>

<script>
  (function() {
    var root = document.getElementById('cvg-cases-page');
    if (!root) return;
    window.cvgCasesReady = true;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var $$ = function(s, c) {
      return Array.prototype.slice.call((c || root).querySelectorAll(s));
    };

    /* ---------- Load more cases ---------- */
    var more = root.querySelector('.cvg-cs-loadmore');
    var extra = $$('.cvg-cs-more-item');
    if (more && extra.length) {
      extra.forEach(function(el) {
        el.classList.add('cvg-cs-collapsed');
      });
      more.addEventListener('click', function() {
        var open = more.getAttribute('aria-expanded') === 'true';
        extra.forEach(function(el, i) {
          el.classList.toggle('cvg-cs-collapsed', open);
          if (!open) {
            el.classList.remove('cvg-cs-shown');
            setTimeout(function() {
              el.classList.add('cvg-cs-shown');
            }, 30 + (i % 4) * 60);
          }
        });
        more.setAttribute('aria-expanded', String(!open));
        more.textContent = open ? 'Load more cases' : 'Show fewer cases';
        if (open) document.getElementById('cvg-cs-latest').scrollIntoView({
          behavior: reduce ? 'auto' : 'smooth'
        });
      });
    }

    /* ---------- Tall screenshots scroll top-to-bottom on hover ---------- */
    function hoverScroll(card, mediaSel, imgSel) {
      var media = card.querySelector(mediaSel),
        img = card.querySelector(imgSel);
      if (!media || !img) return;

      function start() {
        var d = img.offsetHeight - media.offsetHeight;
        if (d <= 0 || reduce) return;
        img.style.transitionDuration = Math.min(Math.max(d / 220, 2), 9) + 's';
        img.style.transform = 'translateY(' + (-d) + 'px)';
      }

      function stop() {
        img.style.transitionDuration = '1s';
        img.style.transform = 'translateY(0)';
      }
      card.addEventListener('mouseenter', start);
      card.addEventListener('mouseleave', stop);
      card.addEventListener('focus', start);
      card.addEventListener('blur', stop);
    }
    $$('.cvg-cs-case').forEach(function(c) {
      hoverScroll(c, '.cvg-cs-case-media', '.cvg-cs-case-img');
    });
    $$('.cvg-cs-item--web').forEach(function(c) {
      hoverScroll(c, '.cvg-cs-item-media', '.cvg-cs-item-img');
    });

    /* ---------- Portfolio tabs ---------- */
    var tabs = $$('.cvg-cs-tab'),
      grid = root.querySelector('.cvg-cs-grid'),
      items = $$('.cvg-cs-item'),
      busy = false;
    tabs.forEach(function(t) {
      t.addEventListener('click', function() {
        if (busy || t.classList.contains('cvg-cs-tab--on')) return;
        busy = true;
        tabs.forEach(function(x) {
          var on = x === t;
          x.classList.toggle('cvg-cs-tab--on', on);
          x.setAttribute('aria-pressed', String(on));
        });
        var cat = t.getAttribute('data-filter');
        grid.classList.add('cvg-cs-grid--out');
        setTimeout(function() {
          var n = 0;
          items.forEach(function(it) {
            var on = cat === 'all' || it.getAttribute('data-cat') === cat;
            it.classList.toggle('cvg-cs-hide', !on);
            it.classList.remove('cvg-cs-in');
            if (on) it.style.setProperty('--cs-d', (Math.min(n++, 11) * 0.05) + 's');
          });
          grid.classList.remove('cvg-cs-grid--out');
          requestAnimationFrame(function() {
            requestAnimationFrame(function() {
              items.forEach(function(it) {
                if (!it.classList.contains('cvg-cs-hide')) it.classList.add('cvg-cs-in');
              });
            });
          });
          busy = false;
        }, reduce ? 0 : 280);
      });
    });

    /* ---------- Lightbox (cases and portfolio each page through their own visible images) ---------- */
    var lb = root.querySelector('.cvg-cs-lb'),
      lbImg = lb.querySelector('.cvg-cs-lb-img'),
      lbCount = lb.querySelector('.cvg-cs-lb-count');
    var list = [],
      idx = 0,
      last = null;
    document.body.appendChild(lb);

    function visible(group) {
      return $$('[data-lb="' + group + '"]').filter(function(el) {
        return !el.classList.contains('cvg-cs-hide') && !el.classList.contains('cvg-cs-collapsed');
      });
    }

    function render() {
      var el = list[idx],
        img = el.querySelector('img');
      lbImg.src = el.getAttribute('href');
      lbImg.alt = img ? img.alt : '';
      var tall = el.classList.contains('cvg-cs-case') || el.classList.contains('cvg-cs-item--web');
      lb.classList.toggle('cvg-cs-lb--tall', tall);
      lb.querySelector('.cvg-cs-lb-stage').scrollTop = 0;
      lbCount.textContent = (idx + 1) + ' / ' + list.length;
    }

    function open(el) {
      list = visible(el.getAttribute('data-lb'));
      idx = list.indexOf(el);
      last = el;
      render();
      lb.hidden = false;
      requestAnimationFrame(function() {
        lb.classList.add('cvg-cs-lb--open');
      });
      document.documentElement.style.overflow = 'hidden';
      lb.querySelector('.cvg-cs-lb-close').focus();
    }

    function close() {
      lb.classList.remove('cvg-cs-lb--open');
      document.documentElement.style.overflow = '';
      setTimeout(function() {
        lb.hidden = true;
        lbImg.src = '';
      }, reduce ? 0 : 250);
      if (last) last.focus();
    }

    function step(d) {
      idx = (idx + d + list.length) % list.length;
      render();
    }
    $$('[data-lb]').forEach(function(el) {
      el.addEventListener('click', function(e) {
        e.preventDefault();
        open(el);
      });
    });
    lb.querySelector('.cvg-cs-lb-close').addEventListener('click', close);
    lb.querySelector('.cvg-cs-lb-prev').addEventListener('click', function() {
      step(-1);
    });
    lb.querySelector('.cvg-cs-lb-next').addEventListener('click', function() {
      step(1);
    });
    lb.addEventListener('click', function(e) {
      if (e.target === lb) close();
    });
    document.addEventListener('keydown', function(e) {
      if (lb.hidden) return;
      if (e.key === 'Escape') close();
      if (e.key === 'ArrowRight') step(1);
      if (e.key === 'ArrowLeft') step(-1);
    });

    /* ---------- Scroll reveal (the .cvg-js flag was already set in <head> area) ---------- */
    if (!document.documentElement.classList.contains('cvg-js')) return;
    var io = new IntersectionObserver(function(es) {
      es.forEach(function(e) {
        if (e.isIntersecting) {
          e.target.classList.add('cvg-cs-shown');
          io.unobserve(e.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });
    $$('.cvg-cs-reveal').forEach(function(el) {
      io.observe(el);
    });
  })();
</script>
<script src="<?= cvg_url('assets/js/favicon-animate.js') ?>"></script>