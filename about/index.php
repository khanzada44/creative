<?php
$aboutHero = [
    'eyebrow' => 'Who we are',
    'title'   => 'About us',
    'lead'    => 'A Texas-based white-label web design team that builds fast, beautiful websites for agencies and businesses.',
];

$aboutImages = [
    'photo'  => 'assets/img/about-us.webp',     
    'rocket' => '2024/08/rocket-no-bg.png',
];

$aboutEyebrow = 'About us';
$aboutTitle   = 'We are Experts in<br>Our Field'; 
$aboutBrand   = 'Creative Converge';
$aboutText = [
    'At <strong>' . $aboutBrand . '</strong>, we are passionate about crafting visually stunning and high-performing websites that drive results. With a team of innovative designers, skilled developers, and strategic marketers, we transform ideas into digital realities tailored to your unique business goals.',
    'Our expertise spans across responsive web design, e-commerce development, and user experience (UX) optimization. We pride ourselves on creating websites that not only look good but also rank higher on search engines, driving organic traffic and conversions.',
    'As a customer-focused company, we believe in building long-term partnerships by delivering exceptional solutions on time and within budget. Whether you\'re a small startup or a global enterprise, our goal is to help you establish a robust online presence that sets you apart from the competition.',
];
$aboutSkills = ['Responsive web design', 'E-commerce development', 'UX optimization', 'SEO-ready builds'];
$aboutButton = ['label' => 'Get a free quote', 'link' => 'contact-us/'];   /* '' label = no button */

$uploads = $uploads ?? 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/';
$siteUrl = $siteUrl ?? ''; 

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
if (!function_exists('cvg_img_url')) {
    function cvg_img_url($path, $uploads, $siteUrl)
    {
        $path = trim(str_replace('\\', '/', $path));
        if (preg_match('~^(https?:)?//~i', $path)) return $path;
        if (preg_match('~^/?assets/~i', $path)) return rtrim($siteUrl, '/') . '/' . ltrim($path, '/');
        return rtrim($uploads, '/') . '/' . ltrim($path, '/');
    }
}
$auImg = [];
foreach ($aboutImages as $k => $p) $auImg[$k] = cvg_img_url($p, $uploads, $siteUrl);
$auBtnLink = preg_match('~^(https?:)?//~i', $aboutButton['link']) ? $aboutButton['link'] : $siteUrl . ltrim($aboutButton['link'], '/');
$auSafe = function ($html) {
    return strip_tags($html, '<br><strong><em><b><i>');
};
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<link rel="stylesheet" href="<?= cvg_e($siteUrl) ?>assets/css/header.css">
<link rel="stylesheet" href="<?= cvg_e($siteUrl) ?>assets/css/footer.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

<main class="cvg-au" id="cvg-about-page">
    <section class="cvg-au-hero">
        <div class="cvg-au-hero-grid" aria-hidden="true"></div>
        <div class="cvg-au-wrap cvg-au-hero-inner">
            <h1 class="cvg-au-hero-title"><?= cvg_e($aboutHero['title']) ?><span>.</span></h1>
            <p class="cvg-au-hero-lead"><?= cvg_e($aboutHero['lead']) ?></p>
        </div>
    </section>
    <section class="cvg-au-about">
        <svg class="cvg-au-waves" viewBox="0 0 1440 320" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0 210 C 240 120, 420 300, 720 200 S 1200 90, 1440 180" />
            <path d="M0 232 C 260 150, 440 310, 740 222 S 1220 120, 1440 206" />
            <path d="M0 254 C 280 180, 460 320, 760 244 S 1240 150, 1440 232" />
            <path d="M0 276 C 300 210, 480 330, 780 266 S 1260 180, 1440 258" />
        </svg>

        <div class="cvg-au-media cvg-au-reveal">
            <img src="<?= cvg_e($auImg['photo']) ?>" alt="Creative Converge designer working on a website at night" loading="lazy">
            <span class="cvg-au-scan" aria-hidden="true"></span>
        </div>

        <div class="cvg-au-wrap cvg-au-grid">
            <div class="cvg-au-spacer" aria-hidden="true"></div>
            <div class="cvg-au-content">
                <p class="cvg-au-eyebrow cvg-au-reveal"><?= cvg_e($aboutEyebrow) ?></p>
                <h2 class="cvg-au-title cvg-au-reveal" style="--d:.06s"><?= $auSafe($aboutTitle) ?><span class="cvg-au-dot">.</span></h2>
                <div class="cvg-au-text">
                    <?php foreach ($aboutText as $i => $para): ?>
                        <p class="cvg-au-reveal" style="--d:<?= 0.12 + $i * 0.06 ?>s"><?= $auSafe($para) ?></p>
                    <?php endforeach; ?>
                </div>
                <?php if ($aboutSkills): ?>
                    <ul class="cvg-au-skills cvg-au-reveal" style="--d:.3s">
                        <?php foreach ($aboutSkills as $sk): ?>
                            <li><svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12.5l4.5 4.5L19 7.5" />
                                </svg><?= cvg_e($sk) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if ($aboutButton['label'] !== ''): ?>
                    <a class="cvg-au-btn cvg-au-reveal" style="--d:.36s" href="<?= cvg_e($auBtnLink) ?>"><?= cvg_e($aboutButton['label']) ?>
                        <svg viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M7 17L17 7M8 7h9v9" />
                        </svg></a>
                <?php endif; ?>
            </div>
        </div>

        <img src="<?= cvg_e($auImg['rocket']) ?>" alt="" class="cvg-au-rocket" aria-hidden="true" loading="lazy">
    </section>
</main>

<style>
    html,
    body {
        margin: 0;
        padding: 0;
    }

    body {
        overflow-x: hidden;
    }

    .cvg-au {
        --au-bg: #0C0F0E;
        --au-mint: #00D4A3;
        --au-mint-l: #5FF0C8;
        --au-ink: #04342C;
        --au-text: #F2F5F4;
        --au-text-2: #C9D6D2;
        --au-muted: #A9C2BC;
        --au-grad: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, .45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
        --au-ease: cubic-bezier(.2, .9, .2, 1);
        display: block;
        overflow: hidden;
        background: var(--au-bg);
        color: var(--au-text);
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        line-height: 1.7;
        -webkit-font-smoothing: antialiased;
    }

    .cvg-au *,
    .cvg-au *::before,
    .cvg-au *::after {
        box-sizing: border-box
    }

    .cvg-au img {
        display: block;
        max-width: 100%;
        height: auto;
        border-radius: 0;
        margin: 0;
        box-shadow: none
    }

    .cvg-au p {
        margin: 0
    }

    .cvg-au a {
        text-decoration: none;
        color: inherit
    }

    .cvg-au .cvg-au-wrap {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 32px
    }

    .cvg-au a:focus-visible {
        outline: 2px solid var(--au-mint-l);
        outline-offset: 3px
    }

    /* ===== 1. Banner ===== */
    .cvg-au .cvg-au-hero {
        position: relative;
        overflow: hidden;
        padding: 170px 0 100px;
        background: var(--au-grad);
        text-align: center
    }

    .cvg-au .cvg-au-hero-grid {
        position: absolute;
        inset: 0;
        background-image: linear-gradient(rgba(242, 245, 244, .06) 1px, transparent 1px), linear-gradient(90deg, rgba(242, 245, 244, .06) 1px, transparent 1px);
        background-size: 72px 72px;
        -webkit-mask-image: radial-gradient(ellipse 60% 80% at 50% 40%, #000 15%, transparent 75%);
        mask-image: radial-gradient(ellipse 60% 80% at 50% 40%, #000 15%, transparent 75%);
        animation: cvgAuGrid 20s linear infinite
    }

    @keyframes cvgAuGrid {
        to {
            background-position: 72px 72px, 72px 72px
        }
    }

    .cvg-au .cvg-au-hero-inner {
        z-index: 1
    }

    .cvg-au .cvg-au-crumbs {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 22px;
        font-size: 14px;
        color: rgba(242, 245, 244, .7)
    }

    .cvg-au .cvg-au-crumbs a:hover,
    .cvg-au .cvg-au-crumbs [aria-current] {
        color: var(--au-mint-l)
    }

    .cvg-au .cvg-au-hero-title {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        font-size: clamp(52px, 8vw, 112px);
        font-weight: 700;
        line-height: .95;
        letter-spacing: -.045em;
        color: var(--au-text);
        text-transform: none
    }

    .cvg-au .cvg-au-hero-title span {
        color: var(--au-mint-l)
    }

    .cvg-au .cvg-au-hero-lead {
        max-width: 560px;
        margin: 22px auto 0;
        font-size: 18px;
        color: #D9F5EE
    }

    /* ===== 2. About ===== */
    .cvg-au .cvg-au-about {
        position: relative;
        overflow: hidden;
        min-height: 720px;
        padding: 110px 0 140px;
        background: var(--au-bg)
    }

    .cvg-au .cvg-au-waves {
        position: absolute;
        left: -5%;
        bottom: 20px;
        width: 110%;
        height: 300px;
        fill: none;
        stroke: rgba(95, 240, 200, .12);
        stroke-width: 1;
        animation: cvgAuWaves 14s ease-in-out infinite alternate
    }

    @keyframes cvgAuWaves {
        to {
            transform: translateX(4%) scaleY(1.08)
        }
    }

    /* Photo: full height on the left half, fading into the dark background */
    .cvg-au .cvg-au-media {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 48%;
        overflow: hidden;
        background: #0E1412
    }

    .cvg-au .cvg-au-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transform: scale(1.04);
        transition: transform 1.4s var(--au-ease)
    }

    .cvg-au .cvg-au-media:hover img {
        transform: scale(1.08)
    }

    .cvg-au .cvg-au-media::after {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        background: linear-gradient(90deg, rgba(12, 15, 14, 0) 55%, rgba(12, 15, 14, .85) 92%, #0C0F0E 100%),
            linear-gradient(180deg, rgba(0, 212, 163, .12), rgba(0, 33, 27, .25))
    }

    .cvg-au .cvg-au-scan {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        height: 120px;
        pointer-events: none;
        background: linear-gradient(180deg, rgba(95, 240, 200, 0), rgba(95, 240, 200, .12), rgba(95, 240, 200, 0));
        animation: cvgAuScan 7s linear infinite
    }

    @keyframes cvgAuScan {
        from {
            transform: translateY(-120px)
        }

        to {
            transform: translateY(900px)
        }
    }

    .cvg-au .cvg-au-grid {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
        gap: 60px
    }

    .cvg-au .cvg-au-content {
        padding-top: 40px
    }

    .cvg-au .cvg-au-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        margin: 0 0 14px;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: .06em;
        color: var(--au-text-2)
    }

    .cvg-au .cvg-au-eyebrow::before {
        content: "";
        width: 56px;
        height: 1px;
        background: var(--au-mint)
    }

    .cvg-au .cvg-au-title {
        margin: 0 0 26px;
        font-family: 'Poppins', sans-serif;
        font-size: clamp(36px, 4.4vw, 58px);
        font-weight: 700;
        line-height: 1.05;
        letter-spacing: -.03em;
        color: var(--au-text);
        text-transform: none
    }

    .cvg-au .cvg-au-dot {
        color: var(--au-mint)
    }

    .cvg-au .cvg-au-text {
        display: grid;
        gap: 18px;
        max-width: 540px
    }

    .cvg-au .cvg-au-text p {
        font-size: 15.5px;
        color: var(--au-muted)
    }

    .cvg-au .cvg-au-text strong {
        color: var(--au-mint-l);
        font-weight: 600
    }

    .cvg-au .cvg-au-skills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 28px 0 0;
        padding: 0;
        list-style: none
    }

    .cvg-au .cvg-au-skills li {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin: 0;
        padding: 8px 14px;
        border-radius: 999px;
        border: 1px solid rgba(95, 240, 200, .22);
        background: rgba(0, 212, 163, .06);
        font-size: 13px;
        font-weight: 500;
        color: var(--au-text-2)
    }

    .cvg-au .cvg-au-skills li::before {
        content: none
    }

    .cvg-au .cvg-au-skills svg {
        width: 14px;
        height: 14px;
        fill: none;
        stroke: var(--au-mint);
        stroke-width: 2.6;
        stroke-linecap: round;
        stroke-linejoin: round
    }

    .cvg-au .cvg-au-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        height: 48px;
        margin-top: 32px;
        padding: 0 24px;
        border: 1px solid var(--au-mint);
        border-radius: 999px;
        color: var(--au-mint);
        font-size: 14px;
        font-weight: 500;
        transition: background .35s, color .35s, box-shadow .35s, transform .35s
    }

    .cvg-au .cvg-au-btn svg {
        width: 16px;
        height: 16px;
        fill: none;
        stroke: currentColor;
        stroke-width: 2.2;
        stroke-linecap: round;
        transition: transform .35s
    }

    .cvg-au .cvg-au-btn:hover {
        background: var(--au-mint);
        color: var(--au-ink);
        transform: translateY(-2px);
        box-shadow: 0 14px 34px rgba(0, 212, 163, .3)
    }

    .cvg-au .cvg-au-btn:hover svg {
        transform: translate(3px, -3px)
    }

    .cvg-au .cvg-au-rocket {
        position: absolute;
        right: 4%;
        bottom: 50px;
        z-index: 3;
        width: 210px;
        filter: hue-rotate(-17deg) saturate(1.1) drop-shadow(0 30px 40px rgba(0, 0, 0, .5));
        animation: cvgAuRocket 6s ease-in-out infinite
    }

    @keyframes cvgAuRocket {

        0%,
        100% {
            transform: translateY(0) rotate(-6deg)
        }

        50% {
            transform: translateY(-20px) rotate(-2deg)
        }
    }

    /* ===== Scroll reveal ===== */
    .cvg-au.cvg-au--js .cvg-au-reveal {
        opacity: 0;
        transform: translateY(32px);
        transition: opacity .9s var(--au-ease) var(--d, 0s), transform .9s var(--au-ease) var(--d, 0s), background .35s, color .35s, box-shadow .35s
    }

    .cvg-au.cvg-au--js .cvg-au-media.cvg-au-reveal {
        transform: translateX(-40px)
    }

    .cvg-au.cvg-au--js .cvg-au-reveal.cvg-au-shown {
        opacity: 1;
        transform: none
    }

    .cvg-au.cvg-au--js .cvg-au-btn.cvg-au-shown:hover {
        transform: translateY(-2px);
        transition-delay: 0s
    }

    /* ===== Responsive ===== */
    @media (max-width:960px) {
        .cvg-au .cvg-au-about {
            padding: 0 0 110px;
            min-height: 0
        }

        .cvg-au .cvg-au-media {
            position: relative;
            width: 100%;
            height: auto;
            aspect-ratio: 16/11
        }

        .cvg-au .cvg-au-media::after {
            background: linear-gradient(180deg, rgba(12, 15, 14, 0) 55%, rgba(12, 15, 14, .9) 95%, #0C0F0E 100%), linear-gradient(180deg, rgba(0, 212, 163, .12), rgba(0, 33, 27, .25))
        }

        .cvg-au .cvg-au-grid {
            grid-template-columns: minmax(0, 1fr);
            gap: 0
        }

        .cvg-au .cvg-au-spacer {
            display: none
        }

        .cvg-au .cvg-au-content {
            padding-top: 10px;
            margin-top: -40px
        }

        .cvg-au .cvg-au-rocket {
            width: 140px;
            right: 12px;
            bottom: 24px;
            opacity: .85
        }
    }

    @media (max-width:600px) {
        .cvg-au .cvg-au-wrap {
            padding: 0 16px
        }

        .cvg-au .cvg-au-hero {
            padding: 130px 0 70px
        }

        .cvg-au .cvg-au-hero-lead {
            font-size: 16px
        }

        .cvg-au .cvg-au-text p {
            font-size: 15px
        }

        .cvg-au .cvg-au-rocket {
            width: 110px
        }
    }

    @media (prefers-reduced-motion:reduce) {

        .cvg-au *,
        .cvg-au *::before,
        .cvg-au *::after {
            animation: none !important;
            transition: none !important
        }

        .cvg-au.cvg-au--js .cvg-au-reveal {
            opacity: 1;
            transform: none
        }
    }
</style>

<script>
    (function() {
        var root = document.getElementById('cvg-about-page');
        if (!root) return;
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) return;
        root.classList.add('cvg-au--js');
        var io = new IntersectionObserver(function(es) {
            es.forEach(function(e) {
                if (e.isIntersecting) {
                    e.target.classList.add('cvg-au-shown');
                    io.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -40px 0px'
        });
        Array.prototype.forEach.call(root.querySelectorAll('.cvg-au-reveal'), function(el) {
            io.observe(el);
        });
    })();
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>