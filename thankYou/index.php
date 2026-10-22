<?php
$contact = [
    'email'      => 'info@websdesignusa.com',
    'phone'      => '(949) 620-5684',
    'phone_link' => '+19496205684',
];

$tyHero = [
    'eyebrow' => 'Message received',
    'title'   => 'Thank you',
    'lead'    => 'Your message is with our team. We will reply within one business day with a clear plan and a quote.',
];

/* ---------- "What happens next" steps ---------- */
$tySteps = [
    ['We read your brief',  'A project lead goes through your message and notes any questions.', 'Today'],
    ['We get in touch',     'You get an email or a call to talk through goals, pages and timeline.', 'Within 24 hours'],
    ['You get a plan',      'A written plan with scope, price and delivery dates, so you know what to expect.', '1–2 days'],
];

/* ---------- Links on the page ---------- */
$tyLinks = [
    'home'      => '',                 /* '' = home page */
    'portfolio' => 'cases/',
    'services'  => 'services/',
];

/* Send visitors back to the home page after this many seconds (0 = off) */
$tyRedirectSeconds = 0;

/* ---------- URLs ---------- */
$siteUrl = $siteUrl ?? '';   /* empty = detected automatically */

/* ================= Nothing to change below this line ================= */

$cvgRoot = dirname(__DIR__);
if (!is_dir($cvgRoot . '/assets')) $cvgRoot = __DIR__;
if (!function_exists('cvg_e')) {
    function cvg_e($s)
    {
        return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
    }
}
if ($siteUrl === '') {
    $docRoot  = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
    $rootReal = realpath($cvgRoot);
    $sub = '';
    $norm = function ($p) {
        return str_replace('\\', '/', $p);
    };
    if ($docRoot && $rootReal && strpos($norm($rootReal), $norm($docRoot)) === 0) $sub = substr($norm($rootReal), strlen($norm($docRoot)));
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host   = $_SERVER['HTTP_HOST'] ?? '';
    $siteUrl = ($host !== '' ? $scheme . '://' . $host : '') . rtrim($sub, '/') . '/';
}
$u = function ($p) use ($siteUrl) {
    return rtrim($siteUrl, '/') . '/' . ltrim($p, '/');
};

/* First name from ?name=  (e.g. thank-you/?name=Sarah) */
$tyName = trim((string) ($_GET['name'] ?? ''));
$tyName = preg_replace('~[^\p{L}\p{M}\s\'\-]~u', '', $tyName);
$tyName = $tyName !== '' ? mb_substr(explode(' ', trim($tyName))[0], 0, 24) : '';

$cvgArrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';
?>
<?php
/* Header + mobile viewport fix:
   the viewport tag is added inside <head> if header.php does not already have one */
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
<?php if ($tyRedirectSeconds > 0): ?>
    <meta http-equiv="refresh" content="<?= (int) $tyRedirectSeconds ?>;url=<?= cvg_e($u($tyLinks['home'])) ?>"><?php endif; ?>
<meta name="robots" content="noindex, follow">
<link rel="stylesheet" href="<?= cvg_e($siteUrl) ?>assets/css/header.css">
<link rel="stylesheet" href="<?= cvg_e($siteUrl) ?>assets/css/footer.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

<style>
    html,
    body {
        margin: 0;
        padding: 0
    }

    .cvg-ty {
        --mint: #00D4A3;
        --mint2: #5FF0C8;
        --ink: #04342C;
        --d0: #0A0A0A;
        --d1: #0F1513;
        --d2: #111614;
        --line: #2A3A36;
        --muted: #8FA39E;
        font-family: Poppins, system-ui, sans-serif;
        color: #F2F5F4;
        background: var(--d0);
        overflow: hidden
    }

    .cvg-ty * {
        box-sizing: border-box
    }

    .cvg-ty-wrap {
        width: min(1180px, 100% - 40px);
        margin-inline: auto
    }

    .cvg-ty-mint {
        color: var(--mint)
    }

    /* hero */
    .cvg-ty-hero {
        position: relative;
        padding: 150px 0 110px;
        background: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, .45), transparent 60%), linear-gradient(160deg, #03866f, #004337 55%, #00211b)
    }

    .cvg-ty-grid {
        position: absolute;
        inset: 0;
        opacity: .18;
        pointer-events: none;
        background-image: linear-gradient(rgba(255, 255, 255, .18) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, .18) 1px, transparent 1px);
        background-size: 56px 56px;
        mask-image: radial-gradient(70% 80% at 60% 40%, #000, transparent)
    }

    .cvg-ty-hero-inner {
        position: relative;
        display: grid;
        grid-template-columns: 1.05fr .95fr;
        gap: 40px;
        align-items: center
    }

    .cvg-ty-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin: 0 0 18px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: var(--mint2)
    }

    .cvg-ty-eyebrow--dark {
        color: var(--mint)
    }

    .cvg-ty-live {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        background: var(--mint2);
        box-shadow: 0 0 0 0 rgba(95, 240, 200, .6);
        animation: cvgTyLive 1.8s infinite
    }

    .cvg-ty-title {
        margin: 0;
        font-size: clamp(44px, 6.4vw, 84px);
        line-height: 1.02;
        font-weight: 700;
        letter-spacing: -.02em
    }

    .cvg-ty-title em {
        font-style: normal;
        color: var(--mint2)
    }

    .cvg-ty-lead {
        max-width: 520px;
        margin: 22px 0 34px;
        font-size: 18px;
        line-height: 1.65;
        color: rgba(242, 245, 244, .82)
    }

    .cvg-ty-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 14px
    }

    .cvg-ty-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        height: 54px;
        padding: 0 28px;
        border-radius: 999px;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        transition: transform .25s, background .25s, color .25s
    }

    .cvg-ty-btn svg {
        width: 18px;
        height: 18px;
        fill: none;
        stroke: currentColor;
        stroke-width: 2.2;
        stroke-linecap: round;
        stroke-linejoin: round;
        transition: transform .25s
    }

    .cvg-ty-btn--mint {
        background: var(--mint);
        color: var(--ink)
    }

    .cvg-ty-btn--mint:hover {
        background: var(--mint2);
        transform: translateY(-2px)
    }

    .cvg-ty-btn--mint:hover svg {
        transform: translate(2px, -2px)
    }

    .cvg-ty-btn--ghost {
        border: 1.5px solid rgba(255, 255, 255, .35);
        color: #fff
    }

    .cvg-ty-btn--ghost:hover {
        background: #fff;
        color: var(--ink);
        transform: translateY(-2px)
    }

    .cvg-ty-redirect {
        margin: 20px 0 0;
        font-size: 14px;
        color: rgba(242, 245, 244, .7)
    }

    /* art */
    .cvg-ty-art svg {
        width: 100%;
        max-width: 500px;
        height: auto;
        display: block;
        margin-left: auto;
        overflow: visible
    }

    .cvg-ty-path {
        fill: none;
        stroke: rgba(255, 255, 255, .45);
        stroke-width: 2;
        stroke-dasharray: 2 9;
        stroke-linecap: round;
        stroke-dashoffset: 0;
        animation: cvgTyPath 1.4s ease-out both
    }

    .cvg-ty-plane {
        offset-path: path("M40 330 C 90 250, 60 170, 150 150 S 250 210, 270 170");
        offset-rotate: auto;
        animation: cvgTyFly 1.5s cubic-bezier(.5, 0, .3, 1) .2s both
    }

    .cvg-ty-badge {
        transform-origin: 300px 170px;
        animation: cvgTyPop .6s cubic-bezier(.3, 1.6, .5, 1) 1.55s both
    }

    .cvg-ty-check {
        fill: none;
        stroke: var(--ink);
        stroke-width: 12;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 110;
        stroke-dashoffset: 110;
        animation: cvgTyDraw .5s ease-out 1.95s forwards
    }

    .cvg-ty-ring {
        fill: none;
        stroke: var(--mint2);
        stroke-width: 2;
        transform-origin: 300px 170px;
        opacity: 0;
        animation: cvgTyRing 2.8s ease-out 2.1s infinite
    }

    .cvg-ty-ring--2 {
        animation-delay: 3.5s
    }

    .cvg-ty-conf>* {
        transform-box: fill-box;
        transform-origin: center;
        opacity: 0;
        animation: cvgTyBurst .9s cubic-bezier(.2, .8, .3, 1) 1.8s forwards, cvgTyBob 4s ease-in-out 2.7s infinite
    }

    .cvg-ty-conf>*:nth-child(2n) {
        animation-delay: 1.85s, 3s
    }

    .cvg-ty-conf>*:nth-child(3n) {
        animation-delay: 1.9s, 3.3s
    }

    .cvg-ty-chip {
        opacity: 0;
        animation: cvgTyUp .5s ease-out 2.3s forwards
    }

    @keyframes cvgTyLive {
        70% {
            box-shadow: 0 0 0 10px rgba(95, 240, 200, 0)
        }

        100% {
            box-shadow: 0 0 0 0 rgba(95, 240, 200, 0)
        }
    }

    @keyframes cvgTyPath {
        from {
            stroke-dashoffset: 120;
            opacity: 0
        }

        to {
            stroke-dashoffset: 0;
            opacity: 1
        }
    }

    @keyframes cvgTyFly {
        0% {
            offset-distance: 0%;
            opacity: 0
        }

        10% {
            opacity: 1
        }

        85% {
            opacity: 1;
            transform: scale(1)
        }

        100% {
            offset-distance: 100%;
            opacity: 0;
            transform: scale(.3)
        }
    }

    @keyframes cvgTyPop {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    @keyframes cvgTyDraw {
        to {
            stroke-dashoffset: 0
        }
    }

    @keyframes cvgTyRing {
        0% {
            transform: scale(1);
            opacity: .7
        }

        100% {
            transform: scale(1.55);
            opacity: 0
        }
    }

    @keyframes cvgTyBurst {
        from {
            opacity: 0;
            transform: translate(calc(var(--x, 0px)*-2), calc(var(--y, 0px)*-2)) scale(.2)
        }

        to {
            opacity: 1;
            transform: translate(0, 0) rotate(var(--r, 0deg))
        }
    }

    @keyframes cvgTyBob {

        0%,
        100% {
            transform: translate(0, 0) rotate(var(--r, 0deg))
        }

        50% {
            transform: translate(calc(var(--x, 0px)*.2), calc(var(--y, 0px)*.2)) rotate(calc(var(--r, 0deg) + 25deg))
        }
    }

    @keyframes cvgTyUp {
        from {
            opacity: 0;
            transform: translateY(12px)
        }

        to {
            opacity: 1;
            transform: none
        }
    }

    /* next steps */
    .cvg-ty-next {
        padding: 110px 0 70px;
        background: var(--d0)
    }

    .cvg-ty-h2 {
        margin: 0 0 50px;
        font-size: clamp(30px, 3.8vw, 46px);
        line-height: 1.15;
        font-weight: 700;
        letter-spacing: -.01em;
        max-width: 640px
    }

    .cvg-ty-steps {
        list-style: none;
        margin: 0;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        counter-reset: s;
        position: relative
    }

    .cvg-ty-steps::before {
        content: "";
        position: absolute;
        top: 28px;
        left: 28px;
        width: calc(66.666% + 16px);
        height: 2px;
        background: repeating-linear-gradient(90deg, var(--line) 0 8px, transparent 8px 16px)
    }

    .cvg-ty-step {
        position: relative;
        padding: 0 6px 0 0
    }

    .cvg-ty-num {
        position: relative;
        display: grid;
        place-items: center;
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: var(--d1);
        border: 2px solid var(--line);
        font-weight: 700;
        font-size: 18px;
        color: var(--mint2)
    }

    .cvg-ty-step:first-child .cvg-ty-num {
        background: var(--mint);
        border-color: var(--mint);
        color: var(--ink)
    }

    .cvg-ty-when {
        display: inline-block;
        margin: 24px 0 10px;
        padding: 5px 12px;
        border-radius: 999px;
        background: rgba(0, 212, 163, .12);
        color: var(--mint2);
        font-size: 12px;
        font-weight: 600
    }

    .cvg-ty-step h3 {
        margin: 0 0 8px;
        font-size: 21px;
        font-weight: 600
    }

    .cvg-ty-step p {
        margin: 0;
        color: var(--muted);
        line-height: 1.65;
        font-size: 15px
    }

    /* more */
    .cvg-ty-more {
        padding: 30px 0 120px;
        background: var(--d0)
    }

    .cvg-ty-more-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 22px
    }

    .cvg-ty-card {
        --c: var(--mint);
        position: relative;
        display: block;
        padding: 30px 28px 72px;
        border-radius: 22px;
        background: var(--d2);
        border: 1px solid #1E2A27;
        color: #F2F5F4;
        text-decoration: none;
        transition: transform .3s, border-color .3s, background .3s
    }

    .cvg-ty-card--violet {
        --c: #B39BFF
    }

    .cvg-ty-card--amber {
        --c: #FFC94D
    }

    .cvg-ty-card--coral {
        --c: #FF8A6B
    }

    .cvg-ty-card:hover {
        transform: translateY(-6px);
        border-color: var(--c);
        background: #141b19
    }

    .cvg-ty-ico {
        display: grid;
        place-items: center;
        width: 52px;
        height: 52px;
        border-radius: 14px;
        background: var(--c);
        margin-bottom: 22px
    }

    .cvg-ty-ico svg {
        width: 26px;
        height: 26px;
        fill: none;
        stroke: var(--ink);
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round
    }

    .cvg-ty-card h3 {
        margin: 0 0 8px;
        font-size: 20px;
        font-weight: 600
    }

    .cvg-ty-card p {
        margin: 0;
        color: var(--muted);
        font-size: 15px;
        line-height: 1.6;
        overflow-wrap: anywhere
    }

    .cvg-ty-go {
        position: absolute;
        left: 28px;
        bottom: 24px;
        display: grid;
        place-items: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1.5px solid #2A3A36;
        transition: background .3s, border-color .3s
    }

    .cvg-ty-go svg {
        width: 16px;
        height: 16px;
        fill: none;
        stroke: #F2F5F4;
        stroke-width: 2.2;
        stroke-linecap: round;
        stroke-linejoin: round;
        transition: stroke .3s
    }

    .cvg-ty-card:hover .cvg-ty-go {
        background: var(--c);
        border-color: var(--c)
    }

    .cvg-ty-card:hover .cvg-ty-go svg {
        stroke: var(--ink)
    }

    /* reveal */
    .cvg-ty--js .cvg-ty-reveal {
        opacity: 0;
        transform: translateY(26px);
        transition: opacity .7s ease var(--d, 0s), transform .7s ease var(--d, 0s)
    }

    .cvg-ty--js .cvg-ty-reveal.cvg-ty-shown {
        opacity: 1;
        transform: none
    }

    @media (max-width:900px) {
        .cvg-ty-hero {
            padding: 120px 0 70px
        }

        .cvg-ty-hero-inner {
            grid-template-columns: 1fr;
            gap: 10px
        }

        .cvg-ty-art {
            order: -1
        }

        .cvg-ty-art svg {
            max-width: 340px;
            margin: 0 auto
        }

        .cvg-ty-steps,
        .cvg-ty-more-grid {
            grid-template-columns: 1fr
        }

        .cvg-ty-steps {
            gap: 34px
        }

        .cvg-ty-steps::before {
            display: none
        }

        .cvg-ty-step:not(:last-child)::after {
            content: "";
            position: absolute;
            left: 27px;
            top: 62px;
            bottom: -28px;
            width: 2px;
            background: repeating-linear-gradient(180deg, var(--line) 0 8px, transparent 8px 16px)
        }

        .cvg-ty-step {
            padding-left: 78px
        }

        .cvg-ty-num {
            position: absolute;
            left: 0;
            top: 0
        }

        .cvg-ty-when {
            margin-top: 12px
        }

        .cvg-ty-next {
            padding: 80px 0 50px
        }
    }

    @media (max-width:520px) {
        .cvg-ty-btn {
            width: 100%;
            justify-content: center
        }

        .cvg-ty-lead {
            font-size: 16px
        }
    }

    /* ===== Phone (≤ 600px) ===== */
    @media (max-width:600px) {
        .cvg-ty-wrap {
            width: calc(100% - 32px)
        }

        .cvg-ty-hero {
            padding: 104px 0 60px
        }

        .cvg-ty-art svg {
            max-width: 250px
        }

        .cvg-ty-copy {
            text-align: center
        }

        .cvg-ty-eyebrow {
            font-size: 12px;
            margin-bottom: 12px
        }

        .cvg-ty-title {
            font-size: clamp(36px, 11vw, 46px);
            line-height: 1.08
        }

        .cvg-ty-lead {
            max-width: none;
            margin: 16px auto 26px;
            font-size: 15.5px
        }

        .cvg-ty-btns {
            gap: 10px
        }

        .cvg-ty-btn {
            width: 100%;
            justify-content: center;
            height: 50px;
            padding: 0 20px
        }

        /* steps */
        .cvg-ty-next {
            padding: 60px 0 32px
        }

        .cvg-ty-h2 {
            margin-bottom: 32px;
            font-size: clamp(26px, 7.6vw, 32px)
        }

        .cvg-ty-steps {
            gap: 26px
        }

        .cvg-ty-step:not(:last-child)::after {
            left: 21px;
            top: 50px;
            bottom: -20px
        }

        .cvg-ty-step {
            padding-left: 62px
        }

        .cvg-ty-num {
            width: 44px;
            height: 44px;
            font-size: 16px
        }

        .cvg-ty-when {
            margin: 8px 0 8px;
            font-size: 11.5px
        }

        .cvg-ty-step h3 {
            font-size: 18px
        }

        .cvg-ty-step p {
            font-size: 14.5px
        }

        /* cards: icon left, text right */
        .cvg-ty-more {
            padding: 24px 0 64px
        }

        .cvg-ty-more-grid {
            gap: 12px
        }

        .cvg-ty-card {
            display: grid;
            grid-template-columns: 46px minmax(0, 1fr) 34px;
            column-gap: 14px;
            align-items: center;
            padding: 18px 16px;
            border-radius: 18px
        }

        .cvg-ty-ico {
            grid-row: 1 / span 2;
            width: 46px;
            height: 46px;
            margin: 0;
            border-radius: 12px
        }

        .cvg-ty-ico svg {
            width: 22px;
            height: 22px
        }

        .cvg-ty-card h3 {
            grid-column: 2;
            margin: 0 0 2px;
            font-size: 16.5px
        }

        .cvg-ty-card p {
            grid-column: 2;
            font-size: 13.5px;
            line-height: 1.5
        }

        .cvg-ty-go {
            position: static;
            grid-column: 3;
            grid-row: 1 / span 2;
            width: 34px;
            height: 34px
        }

        .cvg-ty-card:hover {
            transform: none
        }
    }

    @media (prefers-reduced-motion:reduce) {
        .cvg-ty * {
            animation: none !important;
            transition: none !important
        }

        .cvg-ty-plane {
            display: none
        }

        .cvg-ty-check {
            stroke-dashoffset: 0
        }

        .cvg-ty-conf>*,
        .cvg-ty-chip {
            opacity: 1
        }
    }
</style>

<main class="cvg-ty" id="cvg-thank-you">

    <!-- ================= 1. HERO ================= -->
    <section class="cvg-ty-hero">
        <div class="cvg-ty-grid" aria-hidden="true"></div>
        <div class="cvg-ty-wrap cvg-ty-hero-inner">

            <div class="cvg-ty-copy">
                <p class="cvg-ty-eyebrow"><span class=""></span><?= cvg_e($tyHero['eyebrow']) ?></p>
                <h1 class="cvg-ty-title"><?= cvg_e($tyHero['title']) ?><?= $tyName !== '' ? ', <em>' . cvg_e($tyName) . '</em>' : '' ?><span class="cvg-ty-mint">!</span></h1>
                <p class="cvg-ty-lead"><?= cvg_e($tyHero['lead']) ?></p>
                <div class="cvg-ty-btns">
                    <a class="cvg-ty-btn cvg-ty-btn--mint" href="<?= cvg_e($u($tyLinks['home'])) ?>">Back to home <?= $cvgArrow ?></a>
                    <a class="cvg-ty-btn cvg-ty-btn--ghost" href="<?= cvg_e($u($tyLinks['portfolio'])) ?>">See our work</a>
                </div>
                <?php if ($tyRedirectSeconds > 0): ?>
                    <p class="cvg-ty-redirect">Taking you home in <b data-cvg-ty-count><?= (int) $tyRedirectSeconds ?></b>s</p>
                <?php endif; ?>
            </div>

            <!-- Animated "message delivered" art (pure SVG + CSS) -->
            <div class="cvg-ty-art" aria-hidden="true">
                <svg viewBox="0 0 440 400">
                    <defs>
                        <linearGradient id="cvgTyG" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0" stop-color="#5FF0C8" />
                            <stop offset="1" stop-color="#00D4A3" />
                        </linearGradient>
                    </defs>
                    <!-- dotted flight path -->
                    <path class="cvg-ty-path" d="M40 330 C 90 250, 60 170, 150 150 S 250 210, 270 170" />
                    <!-- rings -->
                    <circle class="cvg-ty-ring cvg-ty-ring--2" cx="300" cy="170" r="92" />
                    <circle class="cvg-ty-ring cvg-ty-ring--1" cx="300" cy="170" r="92" />
                    <!-- badge -->
                    <g class="cvg-ty-badge">
                        <circle cx="300" cy="170" r="78" fill="url(#cvgTyG)" />
                        <circle cx="300" cy="170" r="62" fill="none" stroke="#04342C" stroke-opacity=".18" stroke-width="2" />
                        <path class="cvg-ty-check" d="M268 172 l22 22 l44 -48" />
                    </g>
                    <!-- paper plane -->
                    <g class="cvg-ty-plane">
                        <path d="M0 0 L46 -18 L30 22 L20 8 Z" fill="#F2F5F4" />
                        <path d="M20 8 L46 -18 L14 4 Z" fill="#C9D6D2" />
                        <path d="M20 8 L24 20 L30 22 Z" fill="#9FB3AD" />
                    </g>
                    <!-- confetti -->
                    <g class="cvg-ty-conf">
                        <rect x="200" y="70" width="10" height="10" rx="2" fill="#FFC94D" style="--r:-30deg;--x:-24px;--y:-30px" />
                        <rect x="380" y="80" width="12" height="6" rx="3" fill="#FF8A6B" style="--r:50deg;--x:26px;--y:-26px" />
                        <circle cx="398" cy="200" r="6" fill="#B39BFF" style="--x:30px;--y:4px" />
                        <rect x="372" y="270" width="10" height="10" rx="2" fill="#5FF0C8" style="--r:40deg;--x:22px;--y:26px" />
                        <circle cx="222" cy="266" r="5" fill="#FF8A6B" style="--x:-26px;--y:24px" />
                        <rect x="300" y="52" width="12" height="6" rx="3" fill="#9B7BFF" style="--r:-20deg;--x:0px;--y:-34px" />
                        <circle cx="208" cy="170" r="4" fill="#FFC94D" style="--x:-30px;--y:0px" />
                        <rect x="300" y="282" width="8" height="8" rx="2" fill="#FFC94D" style="--r:20deg;--x:0px;--y:32px" />
                    </g>
                    <!-- "Delivered" chip -->
                 
                </svg>
            </div>
        </div>
    </section>

    <!-- ================= 2. WHAT HAPPENS NEXT ================= -->
    <section class="cvg-ty-next">
        <div class="cvg-ty-wrap">
            <p class="cvg-ty-eyebrow cvg-ty-eyebrow--dark">What happens next</p>
            <h2 class="cvg-ty-h2">Here is how it goes from here<span class="cvg-ty-mint">.</span></h2>

            <ol class="cvg-ty-steps">
                <?php foreach ($tySteps as $i => $s): ?>
                    <li class="cvg-ty-step cvg-ty-reveal" style="--d:<?= $i * 0.1 ?>s">
                        <span class="cvg-ty-num"><?= $i + 1 ?></span>
                        <span class="cvg-ty-when"><?= cvg_e($s[2]) ?></span>
                        <h3><?= cvg_e($s[0]) ?></h3>
                        <p><?= cvg_e($s[1]) ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- ================= 3. WHILE YOU WAIT ================= -->
    <section class="cvg-ty-more">
        <div class="cvg-ty-wrap cvg-ty-more-grid">
            <a class="cvg-ty-card cvg-ty-card--violet cvg-ty-reveal" href="<?= cvg_e($u($tyLinks['portfolio'])) ?>">
                <span class="cvg-ty-ico"><svg viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="16" rx="3" />
                        <path d="M3 15l5-5 4 4 3-3 6 6" />
                    </svg></span>
                <h3>Browse our portfolio</h3>
                <p>Logos, websites and videos we have made for brands like yours.</p>
                <span class="cvg-ty-go"><?= $cvgArrow ?></span>
            </a>
            <a class="cvg-ty-card cvg-ty-card--amber cvg-ty-reveal" style="--d:.1s" href="<?= cvg_e($u($tyLinks['services'])) ?>">
                <span class="cvg-ty-ico"><svg viewBox="0 0 24 24">
                        <path d="M4 7h16M4 12h10M4 17h7" />
                        <circle cx="18" cy="16" r="3" />
                    </svg></span>
                <h3>Explore services</h3>
                <p>Design, development, branding and marketing under one roof.</p>
                <span class="cvg-ty-go"><?= $cvgArrow ?></span>
            </a>
            <a class="cvg-ty-card cvg-ty-card--coral cvg-ty-reveal" style="--d:.2s" href="tel:<?= cvg_e($contact['phone_link']) ?>">
                <span class="cvg-ty-ico"><svg viewBox="0 0 24 24">
                        <path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z" />
                    </svg></span>
                <h3>Need it sooner?</h3>
                <p>Call us at <?= cvg_e($contact['phone']) ?> or email <?= cvg_e($contact['email']) ?></p>
                <span class="cvg-ty-go"><?= $cvgArrow ?></span>
            </a>
        </div>
    </section>
</main>



<script>
    (function() {
        var root = document.getElementById('cvg-thank-you');
        if (!root) return;

        /* countdown (only when redirect is on) */
        var c = root.querySelector('[data-cvg-ty-count]');
        if (c) {
            var n = +c.textContent;
            setInterval(function() {
                if (n > 0) c.textContent = --n;
            }, 1000);
        }

        /* scroll reveal */
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) return;
        root.classList.add('cvg-ty--js');
        var io = new IntersectionObserver(function(es) {
            es.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.classList.add('cvg-ty-shown');
                    io.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });
        root.querySelectorAll('.cvg-ty-reveal').forEach(function(el) {
            io.observe(el);
        });
    })();
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>