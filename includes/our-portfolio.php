<?php
$tabs = [
  'web'      => 'Web',
  'logo'     => 'Logo',
  'branding' => 'Branding',
  'video'    => 'Video Animations',
];

$portfolio = [

  'web' => 'assets/img/portfolio-img-*.webp',
                         
  'logo' => [
    'assets/img/portfolio/logo/37.png', 'assets/img/portfolio/logo/37.jpg', 'assets/img/portfolio/logo/38.png', 'assets/img/portfolio/logo/36.png',
    'assets/img/portfolio/logo/32.jpg', 'assets/img/portfolio/logo/34.png', 'assets/img/portfolio/logo/31.jpg', 'assets/img/portfolio/logo/35.png',
    'assets/img/portfolio/logo/29.jpg', 'assets/img/portfolio/logo/30.jpg', 'assets/img/portfolio/logo/28.jpg', 'assets/img/portfolio/logo/26.jpg',
    'assets/img/portfolio/logo/27.jpg', 'assets/img/portfolio/logo/20.png', 'assets/img/portfolio/logo/17.png', 'assets/img/portfolio/logo/18.png',
    'assets/img/portfolio/logo/19.png', 'assets/img/portfolio/logo/15.png', 'assets/img/portfolio/logo/16.png', 'assets/img/portfolio/logo/25.jpg',
  ],
  'branding' => [
    'assets/img/portfolio/branding/branding-06.jpg', 'assets/img/portfolio/branding/branding-08-1.jpg', 'assets/img/portfolio/branding/branding-04.jpg',
    'assets/img/portfolio/branding/branding-09.jpg', 'assets/img/portfolio/branding/branding-05.jpg', 'assets/img/portfolio/branding/branding-02.jpg',
    'assets/img/portfolio/branding/branding-03.jpg', 'assets/img/portfolio/branding/branding-01.jpg',
  ],
  'video' => [
    'assets/img/portfolio/video/1.jpg', 'assets/img/portfolio/video/img-8.png', 'assets/img/portfolio/video/2.png',
    'assets/img/portfolio/video/3.jpg', 'assets/img/portfolio/video/4.png', 'assets/img/portfolio/video/5.jpg',
  ],
];

/* Alt text / label har category ke liye */
$labels = [
  'web'      => 'Website design',
  'logo'     => 'Logo design',
  'branding' => 'Branding',
  'video'    => 'Video animation',
];


require_once __DIR__ . '/init.php';
$siteUrl = cvg_url('');

$viewAllLink = cvg_url('cases/index.php');

$cvgRoot = dirname(__DIR__);  

if (!function_exists('cvg_e')) {
  function cvg_e($s) { return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8'); }
}

/* Site ka base URL khud nikalna */
if ($siteUrl === '') {
  $docRoot  = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
  $rootReal = realpath($cvgRoot);
  $sub = '';
  if ($docRoot && $rootReal && strpos(str_replace('\\', '/', $rootReal), str_replace('\\', '/', $docRoot)) === 0) {
    $sub = substr(str_replace('\\', '/', $rootReal), strlen(str_replace('\\', '/', $docRoot)));
  }
  $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
  $host   = $_SERVER['HTTP_HOST'] ?? '';
  $siteUrl = ($host !== '' ? $scheme . '://' . $host : '') . rtrim($sub, '/') . '/';
}

if (!function_exists('cvg_port_url')) {
  function cvg_port_url($path, $siteUrl) {
    $path = trim(str_replace('\\', '/', $path));
    if (preg_match('~^(https?:)?//~i', $path)) return $path;
    return rtrim($siteUrl, '/') . '/' . ltrim($path, '/');
  }
}
/* File folder mein hai ya nahi */
if (!function_exists('cvg_port_has')) {
  function cvg_port_has($path, $root) {
    $path = trim(str_replace('\\', '/', $path));
    if ($path === '') return false;
    if (preg_match('~^(https?:)?//~i', $path)) return true;
    return is_file(rtrim($root, '/\\') . '/' . ltrim($path, '/'));
  }
}
if (!function_exists('cvg_port_images')) {
  function cvg_port_images($source, $root) {
    if (is_array($source)) return array_values(array_filter($source, 'strlen'));
    $files = glob(rtrim($root, '/\\') . '/' . ltrim($source, '/'), GLOB_NOSORT) ?: [];
    natcasesort($files);                                  /* 2 se pehle 10 na aaye */
    $rel = [];
    foreach ($files as $f) {
      $rel[] = ltrim(substr(str_replace('\\', '/', $f), strlen(str_replace('\\', '/', rtrim($root, '/\\')))), '/');
    }
    return $rel;
  }
}

$activeTab = array_key_first($tabs);
$arrowSvg  = '<svg viewBox="0 0 24 24"><path d="M7 17L17 7M8 7h9v9" /></svg>';
$playSvg   = '<svg viewBox="0 0 24 24"><path d="M8 5l11 7-11 7z" /></svg>';
?>
<section class="cvg-port" id="cvg-portfolio">
  <div class="cvg-port-inner">

    <div class="cvg-port-head">
      <p class="cvg-port-eyebrow">Selected work</p>
      <h2 class="cvg-port-title">Our <span class="cvg-port-title-mint">Portfolio</span></h2>
    </div>

    <div class="cvg-port-tabs" role="group" aria-label="Filter portfolio">
      <?php foreach ($tabs as $key => $name): $on = ($key === $activeTab); ?>
        <button type="button" class="cvg-port-tab<?= $on ? ' cvg-port-tab--active' : '' ?>" data-filter="<?= cvg_e($key) ?>" aria-pressed="<?= $on ? 'true' : 'false' ?>"><?= cvg_e($name) ?></button>
      <?php endforeach; ?>
    </div>

    <div class="cvg-port-frame">
      <div class="cvg-port-grid" data-view="<?= cvg_e($activeTab) ?>">
        <?php foreach ($portfolio as $cat => $source):
          if (!isset($tabs[$cat])) continue;
          $label = $labels[$cat] ?? $tabs[$cat];
          foreach (cvg_port_images($source, $cvgRoot) as $img):
            if (!cvg_port_has($img, $cvgRoot)) continue;
            $url = cvg_port_url($img, $siteUrl);
            $hide = ($cat === $activeTab) ? '' : ' cvg-port-hide';
        ?>
        <a href="<?= cvg_e($url) ?>" class="cvg-port-item cvg-port-item--<?= cvg_e($cat) ?><?= $hide ?>" data-cat="<?= cvg_e($cat) ?>" aria-label="<?= cvg_e($label) ?>: open large image">
          <span class="cvg-port-media"><img src="<?= cvg_e($url) ?>" alt="<?= cvg_e($label) ?> project" loading="lazy" class="cvg-port-img"></span>
          <?php if ($cat === 'video'): ?>
          <span class="cvg-port-play" aria-hidden="true"><?= $playSvg ?></span>
          <?php endif; ?>
          <span class="cvg-port-overlay" aria-hidden="true"><span class="cvg-port-view"><?= $arrowSvg ?></span></span>
        </a>
        <?php endforeach; endforeach; ?>
      </div>
    </div>

    <div class="cvg-port-more">
      <a href="<?= cvg_e($viewAllLink) ?>" class="cvg-port-btn">
        View all work
        <svg class="cvg-port-btn-icon" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M7 17L17 7M8 7h9v9" />
        </svg>
      </a>
    </div>
  </div>

  <!-- Lightbox -->
  <div class="cvg-port-lightbox" role="dialog" aria-modal="true" aria-label="Portfolio image" hidden>
    <button type="button" class="cvg-port-lb-close" aria-label="Close">&times;</button>
    <button type="button" class="cvg-port-lb-nav cvg-port-lb-prev" aria-label="Previous image">&#8249;</button>
    <div class="cvg-port-lb-stage"><img class="cvg-port-lb-img" src="" alt=""></div>
    <button type="button" class="cvg-port-lb-nav cvg-port-lb-next" aria-label="Next image">&#8250;</button>
  </div>
</section>
<style>
  .cvg-port {
    --cvg-bg: #0E1412;
    --cvg-surface: #111614;
    --cvg-line: #1E2A27;
    --cvg-line-2: #2A3A36;
    --cvg-mint: #00D4A3;
    --cvg-mint-light: #5FF0C8;
    --cvg-ink: #04342C;
    --cvg-text: #F2F5F4;
    --cvg-text-2: #C9D6D2;

    position: relative;
    box-sizing: border-box;
    width: 100%;
    padding: 12px 20px 40px;
    background: var(--cvg-bg);
    color: var(--cvg-text);
    font-family: 'Poppins', sans-serif;
    -webkit-font-smoothing: antialiased;
  }

  .cvg-port *,
  .cvg-port *::before,
  .cvg-port *::after {
    box-sizing: border-box;
  }

  .cvg-port .cvg-port-inner {
    max-width: 1160px;
    margin: 0 auto;
  }

  /* ---------- Heading ---------- */
  .cvg-port .cvg-port-head {
    text-align: center;
  }

  .cvg-port .cvg-port-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 16px;
    padding: 0;
    font-size: 13px;
    font-weight: 500;
    line-height: 1.4;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--cvg-mint);
  }

  .cvg-port .cvg-port-eyebrow::before {
    content: "";
    width: 36px;
    height: 2px;
    background: var(--cvg-mint);
  }

  .cvg-port .cvg-port-title {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    font-size: 54px;
    font-weight: 700;
    line-height: 1.05;
    letter-spacing: -0.025em;
    text-transform: none;
    color: var(--cvg-text);
  }

  .cvg-port .cvg-port-title-mint {
    color: var(--cvg-mint);
  }

  /* ---------- Tabs ---------- */
  .cvg-port .cvg-port-tabs {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin: 28px 0 46px;
  }

  .cvg-port .cvg-port-tab {
    position: relative;
    height: 44px;
    margin: 0;
    padding: 0 22px;
    background: transparent;
    color: var(--cvg-text-2);
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 500;
    line-height: 1;
    text-transform: none;
    letter-spacing: 0;
    cursor: pointer;
     
    transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
  }

  .cvg-port .cvg-port-tab:hover {
    background: transparent;
    border-color: var(--cvg-mint);
    color: var(--cvg-mint-light);
  }

  .cvg-port .cvg-port-tab--active,
  .cvg-port .cvg-port-tab--active:hover {

    color: var(--cvg-mint);
  }

  .cvg-port .cvg-port-tab:focus-visible {
    outline: 2px solid var(--cvg-mint-light);
    outline-offset: 3px;
  }

  /* ---------- Frame + grid ---------- */
  .cvg-port .cvg-port-frame {
    padding: 18px;
    background: var(--cvg-surface);
    box-shadow: 0 40px 80px rgba(0, 0, 0, 0.40);
  }

  .cvg-port .cvg-port-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
    transition: opacity 0.28s ease, transform 0.28s ease;
  }

  .cvg-port .cvg-port-grid--out {
    opacity: 0;
    transform: translateY(12px);
  }

  /* ---------- Items ---------- */
  .cvg-port .cvg-port-item {
    position: relative;
    display: block;
    overflow: hidden;
    background: #0A0F0E;
    outline: none;
    text-decoration: none;
    opacity: 0;
    transform: translateY(24px) scale(0.98);
    transition:
      opacity 0.6s cubic-bezier(.2, .9, .2, 1) var(--cvg-d, 0s),
      transform 0.6s cubic-bezier(.2, .9, .2, 1) var(--cvg-d, 0s),
      box-shadow 0.4s ease;
  }

  .cvg-port .cvg-port-item.cvg-port-in {
    opacity: 1;
    transform: none;
  }

  .cvg-port .cvg-port-item.cvg-port-hide {
    display: none;
  }


  .cvg-port .cvg-port-media {
    position: relative;
    display: block;
    width: 100%;
    overflow: hidden;
  }

  .cvg-port .cvg-port-img {
    display: block;
    width: 100%;
    max-width: none;
    margin: 0;
    border-radius: 0;
  }

  /* Website screenshots: tall card, scrolls top-to-bottom on hover */
  .cvg-port .cvg-port-item--web .cvg-port-media {
    height: 440px;
  }

  .cvg-port .cvg-port-item--web .cvg-port-img {
    height: auto;
    transform: translateY(0);
    transition: transform 1s ease-in-out;
    will-change: transform;
  }

  /* Logos, branding and videos: fixed shapes, gentle zoom on hover */
  .cvg-port .cvg-port-item--logo .cvg-port-media {
    aspect-ratio: 300 / 190;
  }

  .cvg-port .cvg-port-item--branding .cvg-port-media {
    aspect-ratio: 1 / 1;
  }

  .cvg-port .cvg-port-item--video .cvg-port-media {
    aspect-ratio: 446 / 283;
  }

  .cvg-port .cvg-port-item--logo .cvg-port-img,
  .cvg-port .cvg-port-item--branding .cvg-port-img,
  .cvg-port .cvg-port-item--video .cvg-port-img {
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s cubic-bezier(.2, .9, .2, 1);
  }

  .cvg-port .cvg-port-item--logo:hover .cvg-port-img,
  .cvg-port .cvg-port-item--branding:hover .cvg-port-img,
  .cvg-port .cvg-port-item--video:hover .cvg-port-img {
    transform: scale(1.06);
  }

  /* Mint overlay + arrow on hover */
  .cvg-port .cvg-port-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: flex-end;
    justify-content: flex-end;
    padding: 14px;
    background: linear-gradient(180deg, rgba(0, 33, 27, 0) 50%, rgba(0, 33, 27, 0.65) 100%);
    opacity: 0;
    transition: opacity 0.4s ease;
    pointer-events: none;
  }

  .cvg-port .cvg-port-item:hover .cvg-port-overlay,
  .cvg-port .cvg-port-item:focus-visible .cvg-port-overlay {
    opacity: 1;
  }

  .cvg-port .cvg-port-view {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: var(--cvg-mint);
    display: grid;
    place-items: center;
    transform: translateY(10px) rotate(-45deg);
    transition: transform 0.45s cubic-bezier(.2, .9, .2, 1);
  }

  .cvg-port .cvg-port-item:hover .cvg-port-view,
  .cvg-port .cvg-port-item:focus-visible .cvg-port-view {
    transform: none;
  }

  .cvg-port .cvg-port-view svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: var(--cvg-ink);
    stroke-width: 2.4;
    stroke-linecap: round;
  }

  /* Play button on video thumbnails */
  .cvg-port .cvg-port-play {
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 2;
    width: 58px;
    height: 58px;
    margin: -29px 0 0 -29px;
    border-radius: 50%;
    background: var(--cvg-mint);
    display: grid;
    place-items: center;
    box-shadow: 0 0 0 10px rgba(0, 212, 163, 0.18);
    animation: cvgPortPulse 2.4s ease-in-out infinite;
    pointer-events: none;
  }

  .cvg-port .cvg-port-play svg {
    width: 20px;
    height: 20px;
    margin-left: 3px;
    fill: var(--cvg-ink);
  }

  @keyframes cvgPortPulse {

    0%,
    100% {
      box-shadow: 0 0 0 0 rgba(0, 212, 163, 0.45);
    }

    70% {
      box-shadow: 0 0 0 16px rgba(0, 212, 163, 0);
    }
  }

  /* ---------- View all button ---------- */
  .cvg-port .cvg-port-more {
    display: flex;
    justify-content: center;
    margin-top: 44px;
  }

  .cvg-port .cvg-port-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    height: 54px;
    padding: 0 28px;
    border-radius: 999px;
    background: var(--cvg-mint);
    color: var(--cvg-ink);
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-weight: 600;
    line-height: 1;
    text-decoration: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .cvg-port .cvg-port-btn:hover {
    color: var(--cvg-ink);
    transform: translateY(-2px);
    box-shadow: 0 0 0 6px rgba(0, 212, 163, 0.12), 0 18px 48px rgba(0, 212, 163, 0.40);
  }

  .cvg-port .cvg-port-btn-icon {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.4;
    stroke-linecap: round;
    transition: transform 0.3s ease;
  }

  .cvg-port .cvg-port-btn:hover .cvg-port-btn-icon {
    transform: translate(3px, -3px);
  }

  /* ---------- Lightbox (moved to <body> by the script) ---------- */
  .cvg-port-lightbox {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    padding: 40px 20px;
    box-sizing: border-box;
    background: rgba(5, 8, 7, 0.92);
    -webkit-backdrop-filter: blur(6px);
    backdrop-filter: blur(6px);
    opacity: 0;
    transition: opacity 0.25s ease;
    font-family: 'Poppins', sans-serif;
  }

  .cvg-port-lightbox[hidden] {
    display: none;
  }

  .cvg-port-lightbox.cvg-port-lightbox--open {
    opacity: 1;
  }

  .cvg-port-lightbox .cvg-port-lb-stage {
    max-width: min(1100px, 100%);
    max-height: 100%;
    overflow: auto;
    border-radius: 14px;
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.6);
  }

  .cvg-port-lightbox .cvg-port-lb-img {
    display: block;
    max-width: 100%;
    max-height: calc(100vh - 80px);
    margin: 0 auto;
    border-radius: 14px;
  }

  /* Long website screenshots: full width, scroll inside */
  .cvg-port-lightbox.cvg-port-lightbox--tall .cvg-port-lb-stage {
    width: min(900px, 100%);
    max-height: calc(100vh - 80px);
  }

  .cvg-port-lightbox.cvg-port-lightbox--tall .cvg-port-lb-img {
    width: 100%;
    max-height: none;
    border-radius: 0;
  }

  .cvg-port-lightbox .cvg-port-lb-close,
  .cvg-port-lightbox .cvg-port-lb-nav {
    flex: none;
    width: 48px;
    height: 48px;
    margin: 0;
    padding: 0;
    border: 1px solid rgba(95, 240, 200, 0.35);
    border-radius: 50%;
    background: rgba(17, 22, 20, 0.85);
    color: #F2F5F4;
    font-family: 'Poppins', sans-serif;
    font-size: 28px;
    line-height: 1;
    cursor: pointer;
    display: grid;
    place-items: center;
    transition: background 0.3s ease, color 0.3s ease;
  }

  .cvg-port-lightbox .cvg-port-lb-close {
    position: absolute;
    top: 18px;
    right: 18px;
  }

  .cvg-port-lightbox .cvg-port-lb-close:hover,
  .cvg-port-lightbox .cvg-port-lb-nav:hover {
    background: #00D4A3;
    color: #04342C;
  }

  .cvg-port-lightbox button:focus-visible {
    outline: 2px solid #5FF0C8;
    outline-offset: 3px;
  }

  /* ---------- Responsive ---------- */
  @media (max-width: 1024px) {
    .cvg-port {
      padding: 90px 24px 100px;
    }

    .cvg-port .cvg-port-title {
      font-size: 44px;
    }

    .cvg-port .cvg-port-grid {
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .cvg-port .cvg-port-item--web .cvg-port-media {
      height: 400px;
    }
  }

  @media (max-width: 767px) {
    .cvg-port {
      padding: 70px 16px 80px;
    }

    .cvg-port .cvg-port-title {
      font-size: 36px;
    }

    .cvg-port .cvg-port-tabs {
      margin: 22px 0 30px;
      gap: 8px;
    }

    .cvg-port .cvg-port-tab {
      padding: 0 16px;
      font-size: 13px;
    }

    .cvg-port .cvg-port-frame {
      padding: 10px;
      border-radius: 20px;
    }

    .cvg-port .cvg-port-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 10px;
    }

    .cvg-port .cvg-port-item--web .cvg-port-media {
      height: 300px;
    }

    .cvg-port .cvg-port-play {
      width: 46px;
      height: 46px;
      margin: -23px 0 0 -23px;
    }

    .cvg-port-lightbox {
      padding: 70px 10px 20px;
    }

    .cvg-port-lightbox .cvg-port-lb-nav {
      position: absolute;
      bottom: 18px;
    }

    .cvg-port-lightbox .cvg-port-lb-prev {
      left: calc(50% - 60px);
    }

    .cvg-port-lightbox .cvg-port-lb-next {
      right: calc(50% - 60px);
    }

    .cvg-port-lightbox .cvg-port-lb-stage {
      max-height: calc(100vh - 160px);
    }
  }

  @media (prefers-reduced-motion: reduce) {

    .cvg-port .cvg-port-grid,
    .cvg-port .cvg-port-item,
    .cvg-port .cvg-port-img,
    .cvg-port .cvg-port-overlay,
    .cvg-port .cvg-port-view,
    .cvg-port .cvg-port-tab,
    .cvg-port .cvg-port-btn,
    .cvg-port-lightbox {
      transition: none;
    }

    .cvg-port .cvg-port-play {
      animation: none;
    }

    .cvg-port .cvg-port-item {
      opacity: 1;
      transform: none;
    }
  }
</style>
<!-- JS: our-portfolio.js -->
<script src="<?= cvg_e(rtrim($siteUrl, '/') . '/assets/js/our-portfolio.js') ?>"></script>