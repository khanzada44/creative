<?php
/* =========================================================
   Creative Converge — About page
   Scroll counter, side rail, theme ribbon line, sticky story,
   3D project tunnel, expertise accordion.
   Everything is scoped to .cvg-abx
   ========================================================= */
require_once dirname(__DIR__) . '/includes/init.php';

/* ---------- Numbers ---------- */
$abStats = [
    ['10',  '+', 'Years of experience'],
    ['354', '',  'Projects delivered'],
    ['235', '',  'Satisfied clients'],
    ['15',  '',  'Awards won'],
];

/* ---------- 3D gallery images (only files that exist are shown) ---------- */
$abGallery = [
    'assets/images/portfolio/laravel-1.webp',
    'assets/images/portfolio/laravel-2.webp',
    'assets/images/portfolio/laravel-3.webp',
    'assets/images/portfolio/laravel-4.webp',
    'assets/images/portfolio/laravel-5.webp',
    'assets/images/portfolio/laravel-6.webp',
    'assets/images/portfolio/laravel-7.webp',
    'assets/images/portfolio/laravel-8.webp',
    'assets/img/home-about-section.webp',
    'assets/img/about-page-picture.jpg',
    'assets/img/about-careers-image.jpg',
    'assets/img/contact-us-image.jpg',
];

/* ---------- Expertise (accordion) ---------- */
$abSkills = [
    'Design'      => ['Brand Identity', 'UI / UX Design', 'Figma', 'Adobe Creative Cloud', 'Illustration'],
    'Development' => ['WordPress', 'Shopify', 'WooCommerce', 'Custom PHP', 'Laravel', 'React', 'Vue.js', 'Next.js', 'Node.js'],
    'Motion'      => ['After Effects', '2D Animation', '3D Animation', 'Explainer Videos'],
    'Marketing'   => ['SEO', 'Paid Ads', 'Social Media', 'Content Strategy', 'Analytics'],
];

$abFounder = [
    'quote' => 'When I started Creative Converge, I wanted to build a company that could take an idea and do something real with it. Not just make things look good, but think through the details, solve the problems, and build work that people can actually use. That’s still what drives us today, and it’s what I want Creative Converge to be known for.',
    'name'  => 'Founder',
    'role'  => 'Founder & Managing Director',
    'photo' => 'assets/img/founder-picture.jpg', /* '' = shows "CC" circle */
];

$abContactLink = 'contact-us/index.php';
$abCareersLink = 'contact-us/index.php';

/* ---------- helpers ---------- */
if (!function_exists('cvg_e')) {
    function cvg_e($s)
    {
        return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
    }
}
$cvgRoot = dirname(__DIR__);
$abGallery = array_values(array_filter($abGallery, function ($p) use ($cvgRoot) {
    return is_file($cvgRoot . '/' . ltrim($p, '/'));
}));
$abFounderPhoto = ($abFounder['photo'] !== '' && is_file($cvgRoot . '/' . ltrim($abFounder['photo'], '/'))) ? $abFounder['photo'] : '';
$arrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';

/* positions of the floating gallery cards (vw, vh) */
$abSpots = [[-30, -24], [28, -22], [-26, 22], [30, 24], [-8, -31], [10, 31], [-37, 0], [37, -2], [-18, -10], [19, 11], [-20, 30], [22, -32]];

/* Header + mobile viewport fix */
ob_start();
include __DIR__ . '/../includes/header.php';
$cvgHead = ob_get_clean();
$cvgViewport = '<meta name="viewport" content="width=device-width, initial-scale=1">';
if (stripos($cvgHead, 'name="viewport"') === false && stripos($cvgHead, "name='viewport'") === false) {
    if (stripos($cvgHead, '</head>') !== false) {
        $cvgHead = preg_replace('~</head>~i', $cvgViewport . "\n</head>", $cvgHead, 1);
    } else {
        $cvgHead = $cvgViewport . "\n" . $cvgHead;
    }
}
echo $cvgHead;
?>
<link rel="stylesheet" href="<?= cvg_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= cvg_url('assets/css/footer.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Instrument+Serif:ital@1&display=swap">
<title>Driven by Design, Powered by Tech: Meet the Creative Converge Dallas Team</title>
<meta name="description" content="Meet the creative team behind Creative Converge. We combine design thinking and technology to deliver memorable digital experiences in Dallas.">

<style>
    ::-webkit-scrollbar { width: 10px }
    ::-webkit-scrollbar-track { background: #0b2b26 }
    ::-webkit-scrollbar-thumb {
        background: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, .45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
        border-radius: 5px
    }
    html, body { margin: 0; padding: 0 }
    body { background: #0A0A0A; overflow-x: hidden }

    /* ================= BASE ================= */
    .cvg-abx {
        --mint: #00D4A3;
        --mint-l: #5FF0C8;
        --ink: #04342C;
        --bg: #0A0A0A;
        --bg2: #0D1211;
        --card: #111614;
        --line: #22302C;
        --text: #F2F5F4;
        --text2: #C9D6D2;
        --muted: #8FA39E;
        --grad: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, .45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
        --ease: cubic-bezier(.2, .8, .2, 1);
        position: relative;
        display: block;
        overflow-x: clip;
        background: var(--bg);
        color: var(--text);
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        line-height: 1.65;
        -webkit-font-smoothing: antialiased;
    }
    .cvg-abx *, .cvg-abx *::before, .cvg-abx *::after { box-sizing: border-box }
    .cvg-abx h1, .cvg-abx h2, .cvg-abx h3, .cvg-abx p, .cvg-abx ul, .cvg-abx ol, .cvg-abx figure, .cvg-abx blockquote { margin: 0; padding: 0 }
    .cvg-abx ul, .cvg-abx ol { list-style: none }
    .cvg-abx a { color: inherit; text-decoration: none }
    .cvg-abx img, .cvg-abx video { display: block; max-width: 100% }
    .cvg-abx .abx-wrap { position: relative; z-index: 2; width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 32px }
    .cvg-abx .abx-sec { position: relative; padding: 130px 0 }
    .cvg-abx .abx-mint { color: var(--mint) }
    .cvg-abx .abx-serif { font-weight: 400; letter-spacing: 0 }

    .cvg-abx .abx-eyebrow {
        display: inline-flex; align-items: center; gap: 12px; margin: 0 0 16px;
        font-size: 13px; font-weight: 500; letter-spacing: .2em; text-transform: uppercase; color: var(--mint)
    }
    .cvg-abx .abx-eyebrow::before { content: ""; width: 36px; height: 2px; background: currentColor; flex-shrink: 0 }
    .cvg-abx .abx-h2 { font-size: clamp(30px, 4vw, 48px); font-weight: 700; line-height: 1.12; letter-spacing: -.025em }

    /* big faded word behind labels */
    .cvg-abx [data-wm] { position: relative; isolation: isolate; padding-top: clamp(34px, 5vw, 70px) }
    .cvg-abx [data-wm]::after {
        content: attr(data-wm); position: absolute; left: -4px; bottom: 4px; z-index: -1;
        font: 800 clamp(56px, 9vw, 130px)/.78 'Poppins', sans-serif; letter-spacing: .02em; text-transform: uppercase; white-space: nowrap;
        color: transparent; background: linear-gradient(180deg, rgba(255, 255, 255, .09), rgba(255, 255, 255, .015));
        -webkit-background-clip: text; background-clip: text; pointer-events: none; user-select: none
    }

    /* buttons */
    .cvg-abx .abx-btn {
        display: inline-flex; align-items: center; justify-content: center; gap: 10px; height: 54px; padding: 0 28px;
        border-radius: 999px; font-size: 15px; font-weight: 600; line-height: 1; cursor: pointer;
        transition: transform .3s, box-shadow .3s, background .3s, color .3s, border-color .3s
    }
    .cvg-abx .abx-btn svg { width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.4; stroke-linecap: round; transition: transform .3s }
    .cvg-abx .abx-btn:hover svg { transform: translate(3px, -3px) }
    .cvg-abx .abx-btn--mint { background: var(--mint); color: var(--ink) }
    .cvg-abx .abx-btn--mint:hover { transform: translateY(-2px); box-shadow: 0 0 0 6px rgba(0, 212, 163, .12), 0 18px 48px rgba(0, 212, 163, .4) }
    .cvg-abx .abx-btn--ghost { border: 1px solid rgba(242, 245, 244, .35); color: var(--text) }
    .cvg-abx .abx-btn--ghost:hover { border-color: var(--mint-l); color: var(--mint-l) }
    .cvg-abx a:focus-visible, .cvg-abx button:focus-visible { outline: 2px solid var(--mint-l); outline-offset: 3px }

    /* reveal */
    .cvg-abx.abx-js .abx-rv { opacity: 0; transform: translateY(40px); transition: opacity .9s var(--ease) var(--d, 0s), transform .9s var(--ease) var(--d, 0s) }
    .cvg-abx.abx-js .abx-rv.is-in { opacity: 1; transform: none }

    /* ================= FIXED UI: section rail ================= */
    .cvg-abx .abx-rail { position: fixed; right: 18px; top: 50%; z-index: 40; transform: translateY(-50%); display: flex; flex-direction: column; align-items: flex-end; gap: 8px }
    .cvg-abx .abx-rail a { position: relative; display: block; width: 14px; height: 30px; transition: height .5s var(--ease) }
    .cvg-abx .abx-rail a i { position: absolute; right: 0; top: 0; bottom: 0; width: 2px; border-radius: 2px; background: rgba(242, 245, 244, .2); transition: background .4s }
    .cvg-abx .abx-rail a b {
        position: absolute; right: 12px; top: 50%; transform: translate(6px, -50%); white-space: nowrap;
        font-size: 11px; font-weight: 600; color: var(--text); opacity: 0; transition: opacity .4s, transform .4s var(--ease); pointer-events: none
    }
    .cvg-abx .abx-rail a:hover b { opacity: .6; transform: translate(0, -50%) }
    .cvg-abx .abx-rail a.is-on { height: 64px }
    .cvg-abx .abx-rail a.is-on i { background: var(--mint) }
    .cvg-abx .abx-rail a.is-on b { opacity: 1; transform: translate(0, -50%); color: var(--mint-l) }

    /* ================= RIBBON LINE ================= */
    .cvg-abx .abx-ribbon { position: absolute; left: 0; right: 0; z-index: 1; pointer-events: none }
    .cvg-abx .abx-ribbon svg { display: block; width: 100%; height: 100%; overflow: visible }
    .cvg-abx .abx-ribbon { top: 60vh; bottom: 0; overflow: hidden }
    .cvg-abx .abx-ribbon path { fill: none; stroke-linecap: round; stroke-linejoin: round; stroke-width: 74 }
    .cvg-abx .abx-ribbon .abx-rib-glow { stroke-width: 120 }
    .cvg-abx .abx-tunnel-stage { z-index: 2 }

    /* ================= 1. HERO ================= */
    .cvg-abx .abx-hero { position: relative; min-height: 100svh; display: flex; align-items: flex-end; padding: 170px 0 120px; overflow: hidden }
    .cvg-abx .abx-hero-video { position: absolute; inset: 0; width: 100%; height: 100%; max-width: none; object-fit: cover }
    .cvg-abx .abx-hero-shade {
        position: absolute; inset: 0;
        background: linear-gradient(180deg, rgba(10, 10, 10, .55) 0%, rgba(10, 10, 10, .35) 40%, rgba(10, 10, 10, .92) 100%),
            radial-gradient(60% 70% at 15% 20%, rgba(28, 197, 169, .28) 0%, rgba(28, 197, 169, 0) 60%)
    }
    .cvg-abx .abx-hero-title { font-size: clamp(42px, 6.6vw, 100px); font-weight: 700; line-height: 1.02; letter-spacing: -.04em; max-width: 1050px }
    .cvg-abx .abx-line { display: block; overflow: hidden; padding-bottom: .06em }
    .cvg-abx .abx-line > span { display: inline-block; transform: translateY(105%); animation: abxUp 1.1s var(--ease) forwards; animation-delay: calc(var(--i) * .12s + .2s) }
    .cvg-abx .abx-hero-title .abx-serif { color: var(--mint-l) }
    @keyframes abxUp { to { transform: none } }
    .cvg-abx .abx-hero-lead { max-width: 620px; margin-top: 26px; font-size: 18px; color: #D9F5EE }
    .cvg-abx .abx-hero-actions { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 34px }
    .cvg-abx .abx-video-toggle {
        position: absolute; right: 64px; bottom: 40px; z-index: 3; width: 46px; height: 46px; display: grid; place-items: center;
        border: 1px solid rgba(242, 245, 244, .3); border-radius: 50%; background: rgba(10, 10, 10, .35); color: var(--text); cursor: pointer
    }
    .cvg-abx .abx-video-toggle svg { width: 16px; height: 16px; fill: none; stroke: currentColor; stroke-width: 2.4; stroke-linecap: round }
    .cvg-abx .abx-video-toggle .abx-ic-play { display: none }
    .cvg-abx .abx-video-toggle[aria-pressed="true"] .abx-ic-play { display: block }
    .cvg-abx .abx-video-toggle[aria-pressed="true"] .abx-ic-pause { display: none }

    /* ================= 2. STORY (sticky list + preview) ================= */
    .cvg-abx .abx-story { background: var(--bg); padding-bottom: 60px }
    .cvg-abx .abx-story-head { margin-bottom: 30px; max-width: 780px }
    .cvg-abx .abx-story-grid { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: 70px; align-items: start }
    .cvg-abx .abx-story-item { min-height: 78vh; padding: 12vh 0; border-top: 1px solid var(--line) }
    .cvg-abx .abx-story-item:first-child { border-top: 0 }
    .cvg-abx .abx-story-num { display: block; margin-bottom: 14px; font-size: 12px; font-weight: 600; letter-spacing: .1em; color: #ffff }
    .cvg-abx .abx-story-title {
        font-size: clamp(28px, 3.3vw, 44px); font-weight: 600; line-height: 1.12; letter-spacing: -.025em;
        color: #34433F; transition: color .6s var(--ease)
    }
    .cvg-abx .abx-story-body { margin-top: 22px; opacity: .35; transition: opacity .6s var(--ease) }
    .cvg-abx .abx-story-item.is-on .abx-story-title { color: var(--text) }
    .cvg-abx .abx-story-item.is-on .abx-story-num { color: var(--mint) }
    .cvg-abx .abx-story-item.is-on .abx-story-body { opacity: 1 }
    .cvg-abx .abx-story-body p { color: #ffff; margin-top: 14px; max-width: 540px }
    .cvg-abx .abx-values { display: grid; gap: 12px; margin-top: 24px }
    .cvg-abx .abx-values li { padding: 16px 18px; border: 1px solid var(--line); border-radius: 14px; background: var(--card) }
    .cvg-abx .abx-values strong { display: block; font-size: 16px; font-weight: 600; color: var(--text) }
    .cvg-abx .abx-values span { display: block; margin-top: 4px; font-size: 14.5px; color: #ffff }
    .cvg-abx .abx-steps { margin-top: 24px }
    .cvg-abx .abx-steps li { padding: 16px 0; border-top: 1px solid var(--line); font-size: 14.5px; color: #ffff }
    .cvg-abx .abx-steps li span { display: block; margin-bottom: 4px; font-size: 16px; font-weight: 600; color: var(--text) }
    .cvg-abx .abx-steps li span em { font-style: normal; color: var(--mint) }

    .cvg-abx .abx-story-media { position: sticky; top: 16vh; height: 68vh; border-radius: 22px; overflow: hidden; background: #0E1412; border: 1px solid var(--line); box-shadow: 0 40px 90px rgba(0, 0, 0, .5) }
    .cvg-abx .abx-story-media > figure { position: absolute; inset: 0; opacity: 0; transform: scale(1.08); transition: opacity .8s var(--ease), transform 1.2s var(--ease) }
    .cvg-abx .abx-story-media > figure.is-on { opacity: 1; transform: none }
    .cvg-abx .abx-story-media img, .cvg-abx .abx-story-media video { width: 100%; height: 100%; max-width: none; object-fit: cover }
    .cvg-abx .abx-story-media::after { content: ""; position: absolute; inset: 0; background: linear-gradient(180deg, rgba(10, 10, 10, .45) 0%, rgba(10, 10, 10, 0) 25%, rgba(0, 33, 27, .55) 100%); pointer-events: none }
    .cvg-abx .abx-media-bar {
        position: absolute; left: 18px; right: 18px; top: 16px; z-index: 2; display: flex; justify-content: space-between;
        font-size: 10.5px; font-weight: 600; letter-spacing: .14em; text-transform: uppercase; color: rgba(242, 245, 244, .75)
    }
    .cvg-abx .abx-media-bar b { color: var(--mint-l); font-weight: 600 }
    .cvg-abx .abx-story-m { display: none }

    /* ================= 3. NUMBERS ================= */
    .cvg-abx .abx-summary { background: var(--bg2); border-top: 1px solid var(--line); border-bottom: 1px solid var(--line) }
    .cvg-abx .abx-statement { max-width: 980px; font-size: clamp(26px, 3.4vw, 44px); font-weight: 600; line-height: 1.25; letter-spacing: -.02em }
    .cvg-abx .abx-stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); margin-top: 60px; border: 1px solid var(--line); border-radius: 24px; overflow: hidden; background: var(--card) }
    .cvg-abx .abx-stat { padding: 34px 30px; border-left: 1px solid var(--line) }
    .cvg-abx .abx-stat:first-child { border-left: 0 }
    .cvg-abx .abx-stat strong { display: flex; align-items: baseline; gap: 2px; font-size: clamp(40px, 4.4vw, 60px); font-weight: 700; line-height: 1; letter-spacing: -.04em }
    .cvg-abx .abx-stat strong em { font-style: normal; color: var(--mint) }
    .cvg-abx .abx-stat > span { display: block; margin-top: 12px; font-size: 14px; color: #ffff }

    /* ================= 4. 3D TUNNEL GALLERY ================= */
    .cvg-abx .abx-tunnel { position: relative; height: 340vh; background: var(--bg) }
    .cvg-abx .abx-tunnel-stage { position: sticky; top: 0; height: 100vh; overflow: hidden; perspective: 900px; perspective-origin: 50% 50% }
    .cvg-abx .abx-tcard {
        position: absolute; left: 50%; top: 50%; width: clamp(150px, 17vw, 270px); aspect-ratio: 4 / 3; margin: 0;
        border-radius: 10px; overflow: hidden; background: #111; opacity: 0; will-change: transform, opacity;
        box-shadow: 0 30px 60px rgba(0, 0, 0, .55); transform: translate3d(-50%, -50%, -2400px)
    }
    .cvg-abx .abx-tcard:nth-child(3n) { aspect-ratio: 3 / 4; width: clamp(110px, 12vw, 190px) }
    .cvg-abx .abx-tcard img { width: 100%; height: 100%; max-width: none; object-fit: cover; object-position: top }
    .cvg-abx .abx-tunnel-text {
        position: absolute; left: 50%; top: 50%; z-index: 5; width: min(860px, 88vw); transform: translate(-50%, -50%);
        text-align: center; font-size: clamp(28px, 3.6vw, 52px); font-weight: 500; line-height: 1.22; letter-spacing: -.02em; pointer-events: none
    }
    .cvg-abx .abx-tunnel-text .abx-serif { color: var(--mint-l) }
    .cvg-abx .abx-tunnel-label {
        position: absolute; left: 50%; bottom: 46px; z-index: 5; transform: translateX(-50%);
        font-size: 11px; font-weight: 600; letter-spacing: .2em; text-transform: uppercase; color: #ffff
    }

    /* ================= 5. PROCESS VIDEO ================= */
    .cvg-abx .abx-pv { background: var(--grad); overflow: hidden }
    .cvg-abx .abx-pv::before {
        content: ""; position: absolute; inset: 0; pointer-events: none;
        background-image: linear-gradient(rgba(95, 240, 200, .07) 1px, transparent 1px), linear-gradient(90deg, rgba(95, 240, 200, .07) 1px, transparent 1px);
        background-size: 64px 64px;
        -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000 30%, transparent 85%);
        mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000 30%, transparent 85%)
    }
    .cvg-abx .abx-pv-head { max-width: 760px; margin: 0 auto 46px; text-align: center }
    .cvg-abx .abx-pv-head .abx-eyebrow { color: var(--mint-l) }
    .cvg-abx .abx-pv-head > p:last-child { margin-top: 16px; font-size: 17px; color: var(--text2) }
    .cvg-abx .abx-pv-head .abx-h2 span { color: var(--mint-l) }
    .cvg-abx .abx-pv-head[data-wm]::after { left: 0; top: -18px; bottom: auto }
    .cvg-abx .abx-pv-frame { padding: 10px; border-radius: 20px; background: rgba(0, 33, 27, .55); border: 1px solid rgba(95, 240, 200, .22); box-shadow: 0 40px 100px rgba(0, 0, 0, .5), 0 0 80px rgba(0, 212, 163, .15) }
    .cvg-abx .abx-pv-bar { display: flex; align-items: center; gap: 7px; padding: 6px 8px 14px }
    .cvg-abx .abx-pv-bar i { width: 10px; height: 10px; border-radius: 50%; background: rgba(95, 240, 200, .35) }
    .cvg-abx .abx-pv-bar i:first-child { background: var(--mint-l) }
    .cvg-abx .abx-pv-bar b { margin-left: 12px; padding: 4px 14px; border-radius: 99px; font-size: 11px; font-weight: 500; letter-spacing: .08em; color: #ffff; background: rgba(0, 0, 0, .25) }
    .cvg-abx .abx-pv-video { width: 100%; aspect-ratio: 1600 / 720; object-fit: cover; border-radius: 12px; background: #00211B }
    .cvg-abx .abx-pv-steps { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 16px; margin-top: 34px }
    .cvg-abx .abx-pv-steps li { padding: 20px 20px 22px; border-radius: 14px; background: rgba(0, 0, 0, .22); border: 1px solid rgba(95, 240, 200, .14); font-size: 14px; color: var(--text2) }
    .cvg-abx .abx-pv-steps em { display: block; margin-bottom: 10px; font-style: normal; font-size: 12px; font-weight: 600; letter-spacing: .12em; color: var(--mint-l) }
    .cvg-abx .abx-pv-steps strong { display: block; margin-bottom: 6px; font-size: 16px; font-weight: 600; color: var(--text) }

    /* ================= 6. EXPERTISE ================= */
    .cvg-abx .abx-skills-grid { display: grid; grid-template-columns: minmax(0, 1.1fr) minmax(0, .9fr); gap: 80px; align-items: start }
    .cvg-abx .abx-skills-statement { font-size: clamp(26px, 3vw, 40px); font-weight: 800; line-height: 1.12; letter-spacing: -.01em; text-transform: uppercase }
    .cvg-abx .abx-skills-statement span { color: var(--mint) }
    .cvg-abx .abx-skills-link { display: inline-flex; align-items: center; gap: 8px; margin-top: 40px; font-size: 13px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: var(--text) }
    .cvg-abx .abx-skills-link:hover { color: var(--mint-l) }
    .cvg-abx .abx-skills-link:hover::after { transform: rotate(180deg) }
    .cvg-abx .abx-acc-item { border-bottom: 1px solid var(--line) }
    .cvg-abx .abx-acc-btn {
        display: flex; align-items: center; justify-content: space-between; width: 100%; padding: 22px 0; margin: 0;
        border: 0; background: none; color: var(--text); font: 500 clamp(22px, 2.2vw, 30px)/1.2 'Poppins', sans-serif; text-align: left; cursor: pointer; transition: color .3s
    }
    .cvg-abx .abx-acc-btn:hover { color: var(--mint-l) }
    .cvg-abx .abx-acc-btn i { position: relative; width: 16px; height: 16px; flex: none }
    .cvg-abx .abx-acc-btn i::before, .cvg-abx .abx-acc-btn i::after { content: ""; position: absolute; left: 0; right: 0; top: 50%; height: 1.5px; margin-top: -.75px; background: currentColor; transition: transform .4s var(--ease) }
    .cvg-abx .abx-acc-btn i::after { transform: rotate(90deg) }
    .cvg-abx .abx-acc-btn[aria-expanded="true"] i::after { transform: rotate(0) }
    .cvg-abx .abx-acc-panel { display: grid; grid-template-rows: 0fr; transition: grid-template-rows .55s var(--ease) }
    .cvg-abx .abx-acc-panel > ul { overflow: hidden }
    .cvg-abx .abx-acc-item.is-open .abx-acc-panel { grid-template-rows: 1fr }
    .cvg-abx .abx-acc-panel li { padding: 4px 0; font-size: 14px; color: #ffff; opacity: 0; transform: translateX(-10px); transition: opacity .4s, transform .4s var(--ease) }
    .cvg-abx .abx-acc-panel li:last-child { padding-bottom: 24px }
    .cvg-abx .abx-acc-item.is-open .abx-acc-panel li { opacity: 1; transform: none; transition-delay: calc(var(--k) * 45ms + .1s) }

    /* ================= 7. CAREERS ================= */
    .cvg-abx .abx-careers { padding-top: 0 }
    .cvg-abx .abx-careers-card { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); border-radius: 28px; overflow: hidden; background: var(--grad); border: 1px solid rgba(95, 240, 200, .25) }
    .cvg-abx .abx-careers-body { padding: 60px 56px }
    .cvg-abx .abx-careers-body .abx-eyebrow { color: var(--mint-l) }
    .cvg-abx .abx-careers-body > p:not(.abx-eyebrow) { margin: 18px 0 30px; max-width: 420px; font-size: 17px; color: #D9F5EE }
    .cvg-abx .abx-careers-img { position: relative; min-height: 380px }
    .cvg-abx .abx-careers-img img { position: absolute; inset: 0; width: 100%; height: 100%; max-width: none; object-fit: cover; filter: grayscale(.2) }
    .cvg-abx .abx-careers-img::before { content: ""; position: absolute; inset: 0; z-index: 1; background: linear-gradient(90deg, rgba(0, 67, 55, .9) 0%, rgba(0, 67, 55, 0) 40%) }

    /* ================= 8. FOUNDER ================= */
    .cvg-abx .abx-quote { padding-top: 0 }
    .cvg-abx .abx-quote-card { position: relative; max-width: 980px; margin: 0 auto; padding: 60px 64px; border-radius: 28px; background: var(--card); border: 1px solid var(--line) }
    .cvg-abx .abx-quote-mark { width: 52px; height: 40px; margin-bottom: 24px; fill: var(--mint) }
    .cvg-abx .abx-quote-card blockquote { font-size: clamp(19px, 2vw, 25px); line-height: 1.6; color: var(--text) }
    .cvg-abx .abx-quote-card figcaption { display: flex; align-items: center; gap: 14px; margin-top: 32px }
    .cvg-abx .abx-quote-avatar { width: 56px; height: 56px; flex: none; display: grid; place-items: center; overflow: hidden; border-radius: 50%; background: var(--grad); font-weight: 700; color: var(--mint-l) }
    .cvg-abx .abx-quote-avatar img { width: 100%; height: 100%; object-fit: cover }
    .cvg-abx .abx-quote-card strong { display: block; font-size: 16px }
    .cvg-abx .abx-quote-card small { display: block; font-size: 13px; color: #ffff }

    /* ================= 9. CTA ================= */
    .cvg-abx .abx-cta { overflow: hidden; text-align: center; border-top: 1px solid var(--line); background: var(--bg2) }
    .cvg-abx .abx-cta-title { max-width: 900px; margin: 0 auto; font-size: clamp(34px, 5vw, 68px); font-weight: 700; line-height: 1.06; letter-spacing: -.035em }
    .cvg-abx .abx-cta-title .abx-serif { color: var(--mint-l) }
    .cvg-abx .abx-cta p { max-width: 600px; margin: 20px auto 34px; font-size: 17px; color: #ffff }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 1024px) {
        .cvg-abx .abx-rail { display: none }
        .cvg-abx .abx-stats { grid-template-columns: repeat(2, minmax(0, 1fr)) }
        .cvg-abx .abx-stat:nth-child(3) { border-left: 0 }
        .cvg-abx .abx-stat:nth-child(n+3) { border-top: 1px solid var(--line) }
        .cvg-abx .abx-pv-steps { grid-template-columns: repeat(2, minmax(0, 1fr)) }
        .cvg-abx .abx-skills-grid { gap: 50px }
    }
    @media (max-width: 900px) {
        .cvg-abx .abx-sec { padding: 90px 0 }
        .cvg-abx .abx-story-grid, .cvg-abx .abx-skills-grid, .cvg-abx .abx-careers-card { grid-template-columns: minmax(0, 1fr) }
        .cvg-abx .abx-story-media { display: none }
        .cvg-abx .abx-story-m { display: block; margin-top: 24px; border-radius: 18px; overflow: hidden; aspect-ratio: 4 / 3; background: #0E1412 }
        .cvg-abx .abx-story-m img, .cvg-abx .abx-story-m video { width: 100%; height: 100%; max-width: none; object-fit: cover }
        .cvg-abx .abx-story-item { min-height: 0; padding: 50px 0 }
        .cvg-abx .abx-story-title { color: var(--text) }
        .cvg-abx .abx-story-body { opacity: 1 }
        .cvg-abx .abx-careers-img { min-height: 240px; order: -1 }
        .cvg-abx .abx-careers-img::before { background: linear-gradient(0deg, rgba(0, 67, 55, .9) 0%, rgba(0, 67, 55, 0) 50%) }
        .cvg-abx .abx-tunnel { height: 260vh }
        .cvg-abx .abx-ribbon path { stroke-width: 46 }
        .cvg-abx .abx-ribbon .abx-rib-glow { stroke-width: 80 }
    }
    @media (max-width: 600px) {
        .cvg-abx .abx-wrap { padding: 0 18px }
        .cvg-abx .abx-sec { padding: 72px 0 }
        .cvg-abx .abx-hero { padding: 130px 0 96px; min-height: 92svh }
        .cvg-abx .abx-hero-title { font-size: clamp(36px, 10.5vw, 46px) }
        .cvg-abx .abx-hero-lead { font-size: 15.5px }
        .cvg-abx .abx-hero-actions .abx-btn { flex: 1 1 auto }
        .cvg-abx .abx-video-toggle { right: 18px; bottom: 24px; width: 40px; height: 40px }
        .cvg-abx .abx-eyebrow { font-size: 12px; letter-spacing: .16em }
        .cvg-abx .abx-stat { padding: 22px 18px }
        .cvg-abx .abx-stat strong { font-size: 38px }
        .cvg-abx .abx-pv-steps { grid-template-columns: minmax(0, 1fr) }
        .cvg-abx .abx-pv-video { aspect-ratio: 16 / 9 }
        .cvg-abx .abx-pv-bar b { display: none }
        .cvg-abx .abx-tcard { width: 34vw }
        .cvg-abx .abx-tcard:nth-child(3n) { width: 24vw }
        .cvg-abx .abx-careers-body { padding: 30px 22px 34px }
        .cvg-abx .abx-quote-card { padding: 34px 22px 30px; border-radius: 20px }
        .cvg-abx .abx-btn { height: 52px; padding: 0 22px }
    }

    /* reduced motion: no flying, everything visible */
    @media (prefers-reduced-motion: reduce) {
        .cvg-abx *, .cvg-abx *::before, .cvg-abx *::after { animation: none !important; transition: none !important }
        .cvg-abx .abx-line > span { transform: none }
        .cvg-abx .abx-ribbon path { stroke-dasharray: none !important }
        .cvg-abx .abx-tunnel { height: auto; padding: 100px 0 }
        .cvg-abx .abx-tunnel-stage { position: relative; height: auto; display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 14px; padding: 140px 32px 0; perspective: none }
        .cvg-abx .abx-tcard, .cvg-abx .abx-tcard:nth-child(3n) { position: relative; left: auto; top: auto; width: auto; aspect-ratio: 4 / 3; opacity: 1; transform: none }
        .cvg-abx .abx-tunnel-text { top: 50px; transform: translateX(-50%) }
        .cvg-abx .abx-tunnel-label { display: none }
    }
</style>

<main class="cvg-abx" id="cvg-about-page">

    <!-- section rail -->
    <nav class="abx-rail" aria-label="Page sections"></nav>

    <!-- theme ribbon: one line from the hero all the way to the bottom (path is built by JS) -->
    <div class="abx-ribbon" aria-hidden="true" data-abx-ribbon>
        <svg xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="abxRib" gradientUnits="objectBoundingBox" x1="0" y1="0" x2=".35" y2=".12" spreadMethod="reflect">
                    <stop offset="0" stop-color="#5FF0C8" />
                    <stop offset=".3" stop-color="#1CC5A9" />
                    <stop offset=".65" stop-color="#03866F" />
                    <stop offset="1" stop-color="#004337" />
                </linearGradient>
                <filter id="abxGlow" x="-10%" y="-10%" width="120%" height="120%"><feGaussianBlur stdDeviation="22" /></filter>
            </defs>
            <path class="abx-rib-glow" stroke="#00D4A3" opacity=".2" filter="url(#abxGlow)" />
            <path class="abx-rib-main" stroke="url(#abxRib)" />
        </svg>
    </div>

    <!-- ================= 1. HERO ================= -->
    <section class="abx-hero" id="abx-intro" data-abx-label="Intro" aria-labelledby="abx-title">
        <video class="abx-hero-video" autoplay muted loop playsinline preload="auto" aria-hidden="true">
            <source src="<?= cvg_url('assets/videos/about-page-2.mp4') ?>" type="video/mp4">
        </video>
        <div class="abx-hero-shade" aria-hidden="true"></div>

        <div class="abx-wrap">
            <p class="abx-eyebrow abx-rv">About Creative Converge</p>
            <h1 class="abx-hero-title" id="abx-title">
                <span class="abx-line"><span style="--i:0">Your Digital Presence</span></span>
                <span class="abx-line"><span style="--i:1">Should Work as <span class="abx-serif">Hard</span></span></span>
                <span class="abx-line"><span style="--i:2">as You Do.</span></span>
            </h1>
            <p class="abx-hero-lead abx-rv" style="--d:.5s">A website can look impressive and still leave visitors wondering what a business does. A brand can have a polished logo but struggle to stand apart from its competitors. And a marketing campaign can bring traffic without bringing the right customers.</p>
            <div class="abx-hero-actions abx-rv" style="--d:.65s">
                <a href="<?= cvg_url($abContactLink) ?>" class="abx-btn abx-btn--mint">Start a project <?= $arrow ?></a>
                <a href="#abx-story" class="abx-btn abx-btn--ghost">Our story</a>
            </div>
        </div>

        <button type="button" class="abx-video-toggle" aria-label="Pause background video" aria-pressed="false">
            <svg class="abx-ic-pause" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5v14M16 5v14" /></svg>
            <svg class="abx-ic-play" viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5l11 7-11 7z" /></svg>
        </button>
    </section>

    <!-- ================= 2. STORY ================= -->
    <section class="abx-sec abx-story" id="abx-story" data-abx-label="About">
        <div class="abx-wrap">
            <div class="abx-story-head abx-rv">
                <p class="abx-eyebrow" data-wm="About">About Creative Converge</p>
                <h2 class="abx-h2">Turning Requirements Into <span class="abx-mint">Meaningful Digital Work.</span></h2>
            </div>

            <div class="abx-story-grid">
                <div class="abx-story-list">

                    <article class="abx-story-item is-on" data-abx-story="0">
                        <span class="abx-story-num">(01)</span>
                        <h3 class="abx-story-title">What Is Creative Converge?</h3>
                        <div class="abx-story-body">
                            <p>Creative Converge is a trusted web design agency in Dallas, Texas, that helps businesses turn their requirements into practical, well-considered work. We work across different areas of digital development and creative communication, but our role goes beyond producing individual deliverables.</p>
                            <p>With our experienced web design team, we help businesses make decisions about how they present themselves, how their digital presence serves their audience, and how the different parts fit together.</p>
                        </div>
                        <div class="abx-story-m"><img src="<?= cvg_url('assets/img/home-about-section.webp') ?>" alt="Creative digital design and development" loading="lazy"></div>
                    </article>

                    <article class="abx-story-item" data-abx-story="1">
                        <span class="abx-story-num">(02)</span>
                        <h3 class="abx-story-title">Your Vision Deserves More Than a Promise.</h3>
                        <div class="abx-story-body">
                            <p>You have a business to grow, a budget to protect, and ideas you want to see brought to life. But choosing the wrong creative partner can mean missed expectations, wasted investment, and results that fall short. At Creative Converge, our experienced website design team helps you move forward with a clearer plan, a shared understanding, and work built around what your business actually needs.</p>
                            <ul class="abx-values">
                                <li><strong>The Right Direction</strong><span>Your project starts with your business goals, not a prepackaged solution. We focus on what you need to achieve before deciding what the work should look like.</span></li>
                                <li><strong>Clarity Before Commitment</strong><span>Understand the proposed scope, deliverables, and expectations before moving ahead. No guesswork about what your investment is meant to cover.</span></li>
                                <li><strong>A Team That Gets the Brief</strong><span>Your ideas shouldn't get lost between conversations and execution. We keep the project anchored to your requirements and the purpose behind them.</span></li>
                                <li><strong>Work With a Purpose</strong><span>Every project should address a real business need. The aim is to give you work you can put to use, not simply another item to tick off your list.</span></li>
                            </ul>
                        </div>
                        <div class="abx-story-m"><img src="<?= cvg_url('assets/img/about-page-picture.jpg') ?>" alt="Creative Converge team planning business-focused digital solutions" loading="lazy"></div>
                    </article>

                    <article class="abx-story-item" data-abx-story="2">
                        <span class="abx-story-num">(03)</span>
                        <h3 class="abx-story-title">Good Ideas Don't Happen by Accident.</h3>
                        <div class="abx-story-body">
                            <p>The quality of a finished project depends on decisions made before production begins. What deserves attention? Which requirements are essential? Where should the budget go? At Creative Converge, we treat these questions as part of the work itself, because getting the direction right matters as much as getting the execution right.</p>
                            <ol class="abx-steps">
                                <li><span><em>01.</em> Understand the Business Behind the Brief</span>A request tells us what you want made. The context tells us what it needs to accomplish. We look at your business, intended audience, existing challenges, and expectations to establish the thinking behind the assignment.</li>
                                <li><span><em>02.</em> Make the Important Decisions First</span>Scope, functionality, creative direction, and budget influence one another. We establish the relevant priorities before production so the project has a defined basis for decisions, rather than relying on assumptions as the work progresses.</li>
                                <li><span><em>03.</em> Put the Thinking Into Practice</span>This is where the agreed direction takes shape through design, development, or other relevant creative work. Each decision needs to serve the brief, whether it concerns the visual details, the user experience, or the technical requirements.</li>
                                <li><span><em>04.</em> Evaluate the Work Against the Brief</span>We review the finished work against the agreed requirements, creative direction, and project goals to ensure the outcome reflects the original brief.</li>
                            </ol>
                        </div>
                        <div class="abx-story-m"><video autoplay muted loop playsinline preload="metadata" aria-hidden="true"><source src="<?= cvg_url('assets/videos/about-page-2.mp4') ?>" type="video/mp4"></video></div>
                    </article>
                </div>

                <div class="abx-story-media" aria-hidden="true">
                    <div class="abx-media-bar"><span data-abx-media-num>(01)</span><b>Creative Converge</b></div>
                    <figure class="is-on"><img src="<?= cvg_url('assets/img/home-about-section.webp') ?>" alt="" loading="lazy"></figure>
                    <figure><img src="<?= cvg_url('assets/img/about-page-picture.jpg') ?>" alt="" loading="lazy"></figure>
                    <figure><video muted loop playsinline preload="metadata"><source src="<?= cvg_url('assets/videos/about-page-2.mp4') ?>" type="video/mp4"></video></figure>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 3. NUMBERS ================= -->
    <section class="abx-sec abx-summary" id="abx-numbers" data-abx-label="Numbers">
        <div class="abx-wrap">
            <p class="abx-statement abx-rv">At Creative Converge, we connect the dots between <span class="abx-mint">what you imagine and what your business needs.</span></p>
            <div class="abx-stats abx-rv" style="--d:.15s">
                <?php foreach ($abStats as $st): ?>
                    <div class="abx-stat">
                        <strong><span data-abx-num="<?= (int) $st[0] ?>">0</span><?php if ($st[1] !== ''): ?><em><?= cvg_e($st[1]) ?></em><?php endif; ?></strong>
                        <span><?= cvg_e($st[2]) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= 4. 3D GALLERY ================= -->
    <?php if (count($abGallery) >= 4): ?>
        <section class="abx-tunnel" id="abx-gallery" data-abx-label="Gallery" data-abx-tunnel>
            <div class="abx-tunnel-stage">
                <?php foreach ($abGallery as $i => $g): $sp = $abSpots[$i % count($abSpots)]; ?>
                    <figure class="abx-tcard" data-x="<?= $sp[0] ?>" data-y="<?= $sp[1] ?>">
                        <img src="<?= cvg_url($g) ?>" alt="Creative Converge project <?= $i + 1 ?>" loading="lazy">
                    </figure>
                <?php endforeach; ?>
                <p class="abx-tunnel-text" data-abx-ttext>Every project is a chance to <span class="abx-serif">learn, experiment</span> and push our limits.</p>
                <span class="abx-tunnel-label" aria-hidden="true">Scroll to explore</span>
            </div>
        </section>
    <?php endif; ?>

    <!-- ================= 5. PROCESS VIDEO ================= -->
    <section class="abx-sec abx-pv" id="abx-process" data-abx-label="Process" aria-labelledby="abx-pv-title">
        <div class="abx-wrap">
            <div class="abx-pv-head abx-rv" data-wm="Process">
                <p class="abx-eyebrow">Our process</p>
                <h2 class="abx-h2" id="abx-pv-title">From brief to launch, <span>one team.</span></h2>
                <p>Every project moves through the same clear path: your brief, our team, your review, then launch.</p>
            </div>
            <div class="abx-pv-frame abx-rv" style="--d:.15s">
                <div class="abx-pv-bar" aria-hidden="true"><i></i><i></i><i></i><b>creativeconverge.com / process</b></div>
                <video class="abx-pv-video" muted loop playsinline preload="metadata"
                    poster="<?= cvg_url('assets/videos/creative-converge-process-poster.png') ?>" aria-label="How a Creative Converge project moves from brief to launch">
                    <source src="<?= cvg_url('assets/videos/creative-converge-process.webm') ?>" type="video/webm">
                    <source src="<?= cvg_url('assets/videos/creative-converge-process.mp4') ?>" type="video/mp4">
                </video>
            </div>
            <ol class="abx-pv-steps abx-rv" style="--d:.3s">
                <li><em>01</em><strong>Brief &amp; discovery</strong>We learn your goals, audience and brand.</li>
                <li><em>02</em><strong>Wireframe &amp; design</strong>Layouts you approve before any code.</li>
                <li><em>03</em><strong>Build &amp; review</strong>Our team builds, you review, we refine.</li>
                <li><em>04</em><strong>Launch</strong>Deployed, tested and ready to grow.</li>
            </ol>
        </div>
    </section>

    <!-- ================= 6. EXPERTISE ================= -->
    <section class="abx-sec abx-skills" id="abx-skills" data-abx-label="Skills">
        <div class="abx-wrap abx-skills-grid">
            <div class="abx-rv">
                <p class="abx-eyebrow" data-wm="Skills">Expertise</p>
                <h2 class="abx-skills-statement">A Dallas web design agency combining <span>design thinking</span> and <span>technology</span> to build digital work people can actually use.</h2>
                <a href="<?= cvg_url($abContactLink) ?>" class="abx-skills-link">Contact us</a>
            </div>
            <div class="abx-acc abx-rv" style="--d:.15s">
                <?php $n = 0; foreach ($abSkills as $group => $items): $open = ($n === 0); ?>
                    <div class="abx-acc-item<?= $open ? ' is-open' : '' ?>">
                        <button type="button" class="abx-acc-btn" aria-expanded="<?= $open ? 'true' : 'false' ?>" aria-controls="abx-acc-<?= $n ?>" id="abx-acc-btn-<?= $n ?>">
                            <?= cvg_e($group) ?><i aria-hidden="true"></i>
                        </button>
                        <div class="abx-acc-panel" id="abx-acc-<?= $n ?>" role="region" aria-labelledby="abx-acc-btn-<?= $n ?>">
                            <ul>
                                <?php foreach ($items as $k => $it): ?><li style="--k:<?= $k ?>"><?= cvg_e($it) ?></li><?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php $n++; endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= 7. CAREERS ================= -->
    <section class="abx-sec abx-careers" id="abx-careers" data-abx-label="Careers">
        <div class="abx-wrap">
            <div class="abx-careers-card abx-rv">
                <div class="abx-careers-body">
                    <p class="abx-eyebrow">Join us</p>
                    <h2 class="abx-h2">Careers at<br>Creative Converge</h2>
                    <p>Designers, developers and animators who care about craft: we'd love to hear from you.</p>
                    <a href="<?= cvg_url($abCareersLink) ?>" class="abx-btn abx-btn--mint">View open roles <?= $arrow ?></a>
                </div>
                <div class="abx-careers-img"><img src="<?= cvg_url('assets/img/about-careers-image.jpg') ?>" alt="The Creative Converge team discussing a project" loading="lazy"></div>
            </div>
        </div>
    </section>

    <!-- ================= 8. FOUNDER ================= -->
    <section class="abx-sec abx-quote" id="abx-founder" data-abx-label="Founder">
        <div class="abx-wrap">
            <figure class="abx-quote-card abx-rv">
                <svg class="abx-quote-mark" viewBox="0 0 48 36" aria-hidden="true"><path d="M0 36V20C0 9 6 2 18 0l2 5c-7 2-10 6-10 12h8v19H0zm28 0V20C28 9 34 2 46 0l2 5c-7 2-10 6-10 12h8v19H28z" /></svg>
                <blockquote><?= cvg_e($abFounder['quote']) ?></blockquote>
                <figcaption>
                    <span class="abx-quote-avatar"><?php if ($abFounderPhoto !== ''): ?><img src="<?= cvg_url($abFounderPhoto) ?>" alt=""><?php else: ?>CC<?php endif; ?></span>
                    <span><strong><?= cvg_e($abFounder['name']) ?></strong><small><?= cvg_e($abFounder['role']) ?></small></span>
                </figcaption>
            </figure>
        </div>
    </section>

    <!-- ================= 9. CTA ================= -->
    <section class="abx-sec abx-cta" id="abx-contact" data-abx-label="Contact">
        <div class="abx-wrap abx-rv">
            <h2 class="abx-cta-title">Got Something <span class="abx-serif">Converge-Worthy?</span><br>Let's Talk.</h2>
            <p>Got an idea you're excited about, a problem you can't quite solve, or something you know could work better? We'd love to hear about it.</p>
            <a href="<?= cvg_url($abContactLink) ?>" class="abx-btn abx-btn--mint">Tell Us About Your Project <?= $arrow ?></a>
        </div>
    </section>
</main>

<script>
    (function() {
        var root = document.getElementById('cvg-about-page');
        if (!root) return;
        var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        var $$ = function(s, el) { return Array.prototype.slice.call((el || root).querySelectorAll(s)); };
        var clamp = function(v, a, b) { return Math.max(a, Math.min(b, v)); };
        var hasIO = 'IntersectionObserver' in window;

        /* ---------- hero video pause / play ---------- */
        var hv = root.querySelector('.abx-hero-video'), tg = root.querySelector('.abx-video-toggle');
        if (hv && tg) {
            if (reduce) { hv.pause(); tg.setAttribute('aria-pressed', 'true'); }
            tg.addEventListener('click', function() {
                var paused = tg.getAttribute('aria-pressed') === 'true';
                if (paused) { hv.play(); tg.setAttribute('aria-pressed', 'false'); tg.setAttribute('aria-label', 'Pause background video'); }
                else { hv.pause(); tg.setAttribute('aria-pressed', 'true'); tg.setAttribute('aria-label', 'Play background video'); }
            });
        }

        /* ---------- reveal on scroll ---------- */
        if (hasIO && !reduce) {
            root.classList.add('abx-js');
            var rio = new IntersectionObserver(function(es) {
                es.forEach(function(e) { if (e.isIntersecting) { e.target.classList.add('is-in'); rio.unobserve(e.target); } });
            }, { threshold: .12, rootMargin: '0px 0px -40px 0px' });
            $$('.abx-rv').forEach(function(el) { rio.observe(el); });
        }

        /* ---------- side rail (built from sections) ---------- */
        var rail = root.querySelector('.abx-rail');
        var secs = $$('[data-abx-label]');
        var links = secs.map(function(s) {
            var a = document.createElement('a');
            a.href = '#' + s.id;
            a.innerHTML = '<i></i><b>' + s.getAttribute('data-abx-label') + '</b>';
            a.setAttribute('aria-label', s.getAttribute('data-abx-label'));
            rail.appendChild(a);
            return a;
        });
        function setRail(i) { links.forEach(function(a, k) { a.classList.toggle('is-on', k === i); }); }
        setRail(0);
        if (hasIO) {
            var sio = new IntersectionObserver(function(es) {
                es.forEach(function(e) { if (e.isIntersecting) setRail(secs.indexOf(e.target)); });
            }, { rootMargin: '-50% 0px -50% 0px' });
            secs.forEach(function(s) { sio.observe(s); });
        }

        /* ---------- story: active item swaps the sticky preview ---------- */
        var items = $$('[data-abx-story]');
        var figs = $$('.abx-story-media > figure');
        var mnum = root.querySelector('[data-abx-media-num]');
        function setStory(i) {
            items.forEach(function(it, k) { it.classList.toggle('is-on', k === i); });
            figs.forEach(function(f, k) {
                f.classList.toggle('is-on', k === i);
                var v = f.querySelector('video');
                if (v) { if (k === i && !reduce) { var p = v.play(); if (p && p.catch) p.catch(function() {}); } else v.pause(); }
            });
            if (mnum) mnum.textContent = '(0' + (i + 1) + ')';
        }
        if (hasIO) {
            var tio = new IntersectionObserver(function(es) {
                es.forEach(function(e) { if (e.isIntersecting) setStory(items.indexOf(e.target)); });
            }, { rootMargin: '-45% 0px -45% 0px' });
            items.forEach(function(it) { tio.observe(it); });
        }

        /* ---------- numbers count up ---------- */
        var nums = $$('[data-abx-num]');
        function countUp(el) {
            var end = parseInt(el.getAttribute('data-abx-num'), 10) || 0;
            if (reduce) { el.textContent = end; return; }
            var t0 = null;
            (function step(t) {
                if (!t0) t0 = t;
                var k = Math.min(1, (t - t0) / 1600);
                el.textContent = Math.round(end * (1 - Math.pow(1 - k, 3)));
                if (k < 1) requestAnimationFrame(step);
            })(performance.now());
        }
        if (hasIO) {
            var nio = new IntersectionObserver(function(es) {
                es.forEach(function(e) { if (e.isIntersecting) { countUp(e.target); nio.unobserve(e.target); } });
            }, { threshold: .6 });
            nums.forEach(function(n) { nio.observe(n); });
        } else nums.forEach(countUp);

        /* ---------- accordion ---------- */
        var accs = $$('.abx-acc-item');
        accs.forEach(function(it) {
            var b = it.querySelector('.abx-acc-btn');
            b.addEventListener('click', function() {
                var open = !it.classList.contains('is-open');
                accs.forEach(function(x) { x.classList.remove('is-open'); x.querySelector('.abx-acc-btn').setAttribute('aria-expanded', 'false'); });
                if (open) { it.classList.add('is-open'); b.setAttribute('aria-expanded', 'true'); }
            });
        });

        /* ---------- process video plays only when visible ---------- */
        var pv = root.querySelector('.abx-pv-video');
        if (pv && hasIO && !reduce) {
            new IntersectionObserver(function(es) {
                es.forEach(function(e) { if (e.isIntersecting) { var p = pv.play(); if (p && p.catch) p.catch(function() {}); } else pv.pause(); });
            }, { threshold: .2 }).observe(pv);
        }

        /* ---------- ribbon: build one wavy line for the full page height ---------- */
        var rib = root.querySelector('[data-abx-ribbon]');
        var ribSvg = rib ? rib.querySelector('svg') : null;
        var ribPaths = rib ? $$('path', rib) : [];
        var ribLen = 0;
        function buildRibbon() {
            if (!rib) return;
            var W = rib.clientWidth, H = rib.clientHeight;
            if (!W || !H) return;
            ribSvg.setAttribute('width', W);
            ribSvg.setAttribute('height', H);
            ribSvg.setAttribute('viewBox', '0 0 ' + W + ' ' + H);
            var step = Math.max(700, window.innerHeight * 1.05);
            var pts = [[-W * .06, 0]];
            var y = step * .45, k = 0, loops = 0;
            while (y < H - 120) {
                var x = (k % 2 === 0) ? W * .2 : W * .8;
                if (k % 3 === 1 && y + step < H) {
                    /* a loop, like the reference */
                    var r = Math.min(W * .09, 130), dir = (k % 2 === 0) ? 1 : -1;
                    pts.push([x - dir * r, y - r * .2], [x, y + r], [x + dir * r, y], [x, y - r], [x - dir * r * .7, y + r * .3]);
                    loops++;
                } else {
                    pts.push([x, y]);
                }
                y += step; k++;
            }
            pts.push([(k % 2 === 0) ? W * .25 : W * .75, H - 60], [W * .5, H + 80]);
            /* smooth curve through the points (Catmull-Rom → Bezier) */
            var d = 'M' + pts[0][0].toFixed(1) + ' ' + pts[0][1].toFixed(1);
            for (var i = 0; i < pts.length - 1; i++) {
                var p0 = pts[i - 1] || pts[i], p1 = pts[i], p2 = pts[i + 1], p3 = pts[i + 2] || p2;
                var c1x = p1[0] + (p2[0] - p0[0]) / 6, c1y = p1[1] + (p2[1] - p0[1]) / 6;
                var c2x = p2[0] - (p3[0] - p1[0]) / 6, c2y = p2[1] - (p3[1] - p1[1]) / 6;
                d += ' C' + c1x.toFixed(1) + ' ' + c1y.toFixed(1) + ' ' + c2x.toFixed(1) + ' ' + c2y.toFixed(1) + ' ' + p2[0].toFixed(1) + ' ' + p2[1].toFixed(1);
            }
            ribPaths.forEach(function(path) { path.setAttribute('d', d); });
            ribLen = ribPaths[0].getTotalLength();
            ribPaths.forEach(function(path) { path.style.strokeDasharray = ribLen + ' ' + ribLen; });
        }
        buildRibbon();
        var rbt;
        function rebuild() { clearTimeout(rbt); rbt = setTimeout(function() { buildRibbon(); frame(); }, 150); }
        window.addEventListener('resize', rebuild);
        window.addEventListener('load', rebuild);
        if ('ResizeObserver' in window && rib) new ResizeObserver(rebuild).observe(rib);

        /* ---------- scroll: ribbon + 3D gallery ---------- */
        var tunnel = root.querySelector('[data-abx-tunnel]');
        var cards = tunnel ? $$('.abx-tcard', tunnel) : [];
        var ttext = tunnel ? tunnel.querySelector('[data-abx-ttext]') : null;
        var mobile = window.matchMedia('(max-width: 600px)');

        function frame() {
            var vh = window.innerHeight;
            if (reduce) return;

            if (rib && ribLen) {
                /* line is drawn down to the point that is 75% down the screen */
                var rc = rib.getBoundingClientRect();
                var p = clamp((vh * .75 - rc.top) / rc.height, 0, 1);
                if (window.innerHeight + window.pageYOffset >= document.documentElement.scrollHeight - 4) p = 1;
                ribPaths.forEach(function(path) { path.style.strokeDashoffset = (ribLen * (1 - p)).toFixed(1); });
            }

            if (tunnel && cards.length) {
                var tr = tunnel.getBoundingClientRect();
                if (tr.bottom > 0 && tr.top < vh) {
                    var p = clamp(-tr.top / Math.max(1, tr.height - vh), 0, 1);
                    var n = cards.length, spread = mobile.matches ? .6 : 1;
                    cards.forEach(function(c, i) {
                        var s = (i / n) * .62;
                        var t = (p - s) / .38;
                        if (t <= 0 || t >= 1) { c.style.opacity = 0; return; }
                        var z = -2400 + t * 2950;
                        var op = t < .1 ? t / .1 : (t > .82 ? (1 - t) / .18 : 1);
                        var x = parseFloat(c.getAttribute('data-x')) * spread, y = parseFloat(c.getAttribute('data-y'));
                        c.style.opacity = op.toFixed(3);
                        c.style.transform = 'translate3d(-50%,-50%,0) translate3d(' + x + 'vw,' + y + 'vh,' + z.toFixed(1) + 'px)';
                    });
                    if (ttext) {
                        var a = clamp((p - .04) / .14, 0, 1);
                        ttext.style.opacity = a.toFixed(3);
                        ttext.style.filter = 'blur(' + ((1 - a) * 12).toFixed(1) + 'px)';
                    }
                }
            }
        }
        var ticking = false;
        function onScroll() { if (!ticking) { ticking = true; requestAnimationFrame(function() { ticking = false; frame(); }); } }
        window.addEventListener('scroll', onScroll, { passive: true });
        window.addEventListener('resize', onScroll);
        frame();
    })();
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="<?= cvg_url('assets/js/favicon-animate.js') ?>"></script>