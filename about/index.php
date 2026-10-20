<?php
$abStats = [
    ['9',   '+', 'Years of experience'],
    ['354', '',  'Projects delivered'],
    ['235', '',  'Satisfied clients'],
    ['15',  '',  'Awards won'],
];

/* ---------- Leadership team ----------
   photo: '' = shows "CC" box. Or a path like 'assets/img/team-john.jpg'  */
$abTeam = [
    ['name' => '[Name]', 'role' => 'Founder & Managing Director', 'photo' => ''],
    ['name' => '[Name]', 'role' => 'Creative Director',           'photo' => ''],
    ['name' => '[Name]', 'role' => 'Head of Development',         'photo' => ''],
    ['name' => '[Name]', 'role' => 'Operations Manager',          'photo' => ''],
    ['name' => '[Name]', 'role' => 'Lead Motion Designer',        'photo' => ''],
    ['name' => '[Name]', 'role' => 'Client Success Manager',      'photo' => ''],
];

/* ---------- Platforms we master ---------- */
$abPlatforms = ['WordPress', 'Shopify', 'Figma', 'Adobe Creative Cloud', 'React', 'Vue.js', 'PHP', 'After Effects'];

/* ---------- "Trusted by" logos (uploads folder, assets folder or full URL) ---------- */
$abLogos = [
    ['2024/07/car1.png', 'Brand Name'],
    ['2024/07/2.png',    'Interior Academia Design'],
    ['2024/07/car4.png', 'Design Studio'],
    ['2024/07/car3.png', 'Harrison Design Studio'],
    ['2024/07/car5.png', 'Handcrafted Studio'],
];

/* ---------- Founder's note ---------- */
$abFounder = [
    'quote' => '[Add a short note from your founder here: why Creative Converge exists, and what every client can expect when they work with you.]',
    'name'  => '[Founder name]',
    'role'  => 'Founder & Managing Director',
    'photo' => '',   /* '' = shows "CC" circle */
];

/* ---------- Links ---------- */
$abContactLink = 'contact-us/index.php';
$abCareersLink = 'contact-us/index.php';

/* ---------- URLs ---------- */
$uploads = $uploads ?? 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/';
$siteUrl = $siteUrl ?? '';   /* empty = detected automatically */


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
$A = function ($p) use ($siteUrl) {
    return cvg_e(rtrim($siteUrl, '/') . '/' . ltrim($p, '/'));
};   /* asset URL */
$L = function ($p) use ($siteUrl) {
    return cvg_e(preg_match('~^(https?:)?//|^#~i', $p) ? $p : rtrim($siteUrl, '/') . '/' . ltrim($p, '/'));
};
$arrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<link rel="stylesheet" href="<?= $A('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= $A('assets/css/footer.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
<link rel="stylesheet" href="<?= $A('assets/css/cvg-about-page.css') ?>">
<style>
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
        background: #0A0A0A;
    }

    /* ===== PROCESS VIDEO SECTION (cvg-ab-pv) ===== */
    .cvg-ab-pv {
        position: relative;
        overflow: hidden;
        padding: 110px 24px 120px;
        background:
            radial-gradient(70% 90% at 12% 10%, rgba(28,197,169,.45) 0%, rgba(28,197,169,0) 60%),
            linear-gradient(160deg, rgb(3,134,111) 0%, rgb(0,67,55) 48%, rgb(0,33,27) 100%);
        font-family: 'Poppins', sans-serif;
        color: #F2F5F4;
    }
    .cvg-ab-pv::before {               /* halki grid lines */
        content: ""; position: absolute; inset: 0; pointer-events: none;
        background-image:
            linear-gradient(rgba(95,240,200,.07) 1px, transparent 1px),
            linear-gradient(90deg, rgba(95,240,200,.07) 1px, transparent 1px);
        background-size: 64px 64px;
        -webkit-mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000 30%, transparent 85%);
        mask-image: radial-gradient(ellipse 70% 60% at 50% 40%, #000 30%, transparent 85%);
    }
    .cvg-ab-pv-in { position: relative; max-width: 1180px; margin: 0 auto; }
    .cvg-ab-pv-head { text-align: center; max-width: 760px; margin: 0 auto 46px; }
    .cvg-ab-pv-eyebrow {
        display: inline-flex; align-items: center; gap: 10px; margin: 0 0 14px;
        font-size: 13px; font-weight: 500; letter-spacing: .2em; text-transform: uppercase; color: #5FF0C8;
    }
    .cvg-ab-pv-eyebrow::before, .cvg-ab-pv-eyebrow::after { content: ""; width: 28px; height: 2px; background: #5FF0C8; }
    .cvg-ab-pv-title { margin: 0 0 16px; font-size: clamp(30px, 4vw, 48px); font-weight: 700; line-height: 1.12; letter-spacing: -.02em; color: #F2F5F4; }
    .cvg-ab-pv-title span { color: #5FF0C8; }
    .cvg-ab-pv-text { margin: 0; font-size: 17px; line-height: 1.65; color: #C9D6D2; }

    /* video frame - browser window look */
    .cvg-ab-pv-frame {
        position: relative;
        border-radius: 20px;
        padding: 10px;
        background: rgba(0,33,27,.55);
        border: 1px solid rgba(95,240,200,.22);
        box-shadow: 0 40px 100px rgba(0,0,0,.5), 0 0 0 1px rgba(0,0,0,.2), 0 0 80px rgba(0,212,163,.15);
    }
    .cvg-ab-pv-bar { display: flex; align-items: center; gap: 7px; padding: 6px 8px 14px; }
    .cvg-ab-pv-bar i { width: 10px; height: 10px; border-radius: 50%; background: rgba(95,240,200,.35); }
    .cvg-ab-pv-bar i:first-child { background: #5FF0C8; }
    .cvg-ab-pv-bar b {
        margin-left: 12px; padding: 4px 14px; border-radius: 99px;
        font-size: 11px; font-weight: 500; letter-spacing: .08em; color: #8FA39E;
        background: rgba(0,0,0,.25);
    }
    .cvg-ab-pv-video {
        display: block; width: 100%; height: auto; aspect-ratio: 1600 / 720;
        object-fit: cover; margin: 0; border-radius: 12px; background: #00211B; box-shadow: none;
    }

    /* steps under the video */
    .cvg-ab-pv-steps {
        list-style: none; margin: 34px 0 0; padding: 0;
        display: grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap: 16px;
    }
    .cvg-ab-pv-steps li {
        padding: 20px 20px 22px; border-radius: 14px;
        background: rgba(0,0,0,.22); border: 1px solid rgba(95,240,200,.14);
        font-size: 14px; line-height: 1.55; color: #C9D6D2;
    }
    .cvg-ab-pv-steps strong { display: block; margin-bottom: 6px; font-size: 16px; font-weight: 600; color: #F2F5F4; }
    .cvg-ab-pv-steps em { display: block; margin-bottom: 10px; font-style: normal; font-size: 12px; font-weight: 600; letter-spacing: .12em; color: #5FF0C8; }

    @media (max-width: 900px) {
        .cvg-ab-pv-steps { grid-template-columns: repeat(2, minmax(0,1fr)); }
    }
    @media (max-width: 600px) {
        .cvg-ab-pv { padding: 80px 16px 90px; }
        .cvg-ab-pv-frame { padding: 6px; border-radius: 14px; }
        .cvg-ab-pv-bar { padding: 4px 6px 10px; }
        .cvg-ab-pv-bar b { display: none; }
        .cvg-ab-pv-video { border-radius: 9px; }
        .cvg-ab-pv-steps { grid-template-columns: minmax(0,1fr); gap: 12px; }
    }
</style>

<main class="cvg-ab" id="cvg-about-page">

    <section class="cvg-ab-hero" aria-labelledby="cvg-ab-title">
        <video class="cvg-ab-hero-video" autoplay muted loop playsinline preload="auto" aria-hidden="true">
            <source src="<?= $A('assets/videos/about-page-2.mp4') ?>" type="video/mp4">
        </video>
        <div class="cvg-ab-hero-shade" aria-hidden="true"></div>

        <div class="cvg-ab-wrap cvg-ab-hero-inner">
            <p class="cvg-ab-eyebrow cvg-ab-reveal">About Creative Converge</p>
            <h1 class="cvg-ab-hero-title" id="cvg-ab-title">
                <span class="cvg-ab-line"><span>9+ years of crafting</span></span>
                <span class="cvg-ab-line"><span><em>memorable</em> digital</span></span>
                <span class="cvg-ab-line"><span>experiences.</span></span>
            </h1>
            <p class="cvg-ab-hero-lead cvg-ab-reveal" style="--d:.5s">
                Creative Converge is a white-label web design studio in Texas. We design and build
                high-performing websites, brands and motion for agencies and businesses that want
                work they're proud to put their name on.
            </p>
            <div class="cvg-ab-hero-actions cvg-ab-reveal" style="--d:.65s">
                <a href="<?= $L($abContactLink) ?>" class="cvg-ab-btn cvg-ab-btn--mint">Start a project <?= $arrow ?></a>
                <a href="#cvg-ab-defines" class="cvg-ab-btn cvg-ab-btn--ghost">Our story</a>
            </div>
        </div>

        <button type="button" class="cvg-ab-video-toggle" aria-label="Pause background video" aria-pressed="false">
            <svg class="cvg-ab-ic-pause" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M8 5v14M16 5v14" />
            </svg>
            <svg class="cvg-ab-ic-play" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M8 5l11 7-11 7z" />
            </svg>
        </button>
        <a href="#cvg-ab-defines" class="cvg-ab-scroll" aria-label="Scroll to content"><span></span></a>
    </section>

    <!-- ================= 2. WHAT DEFINES US ================= -->
    <section class="cvg-ab-defines" id="cvg-ab-defines">
        <div class="cvg-ab-wrap">
            <div class="cvg-ab-head cvg-ab-reveal">
                <p class="cvg-ab-eyebrow">What defines us</p>
                <h2 class="cvg-ab-h2">The people, principles and process<br><span class="cvg-ab-mint">behind every pixel we ship.</span></h2>
            </div>

            <!-- Row 1: Who we are -->
            <article class="cvg-ab-row">
                <div class="cvg-ab-row-media cvg-ab-reveal">
                    <img src="<?= $A('assets/img/home-about-section.webp') ?>" alt="Designer looking out over a city of glowing digital screens" loading="lazy">
                </div>
                <div class="cvg-ab-row-text cvg-ab-reveal" style="--d:.12s">
                    <h3 class="cvg-ab-h3">Who we are</h3>
                    <p>We're a people-led studio of designers, developers, animators and strategists. Every project
                        is handled by a small senior team that stays with it from the first brief to the final launch.</p>
                    <p>Agencies trust us to work quietly behind their brand. Businesses trust us to treat their
                        website like the most important salesperson they have.</p>
                </div>
            </article>

            <!-- Row 2: What drives the work -->
            <article class="cvg-ab-row cvg-ab-row--flip">
                <div class="cvg-ab-row-media cvg-ab-reveal">
                    <img src="<?= $A('assets/img/about-page-picture.jpg') ?>" alt="Creative Converge team at work" loading="lazy">
                </div>
                <div class="cvg-ab-row-text cvg-ab-reveal" style="--d:.12s">
                    <h3 class="cvg-ab-h3">What drives the work</h3>
                    <p>Four principles shape every decision we make, from the first wireframe to the last line of code.</p>
                    <ul class="cvg-ab-values">
                        <li><strong>Craft</strong><span>Pixel-perfect design and clean, fast code.</span></li>
                        <li><strong>Collaboration</strong><span>Your team and ours, working as one.</span></li>
                        <li><strong>Accountability</strong><span>Clear timelines, honest updates, no surprises.</span></li>
                        <li><strong>Results</strong><span>Work that ranks, converts and grows with you.</span></li>
                    </ul>
                </div>
            </article>

            <!-- Row 3: How we work -->
            <article class="cvg-ab-row">
                <div class="cvg-ab-row-media cvg-ab-row-media--video cvg-ab-reveal">
                    <video autoplay muted loop playsinline preload="metadata" aria-hidden="true">
                        <source src="<?= $A('assets/videos/about-page-2.mp4') ?>" type="video/mp4">
                    </video>
                </div>
                <div class="cvg-ab-row-text cvg-ab-reveal" style="--d:.12s">
                    <h3 class="cvg-ab-h3">How Creative Converge works</h3>
                    <p>From concept to launch, we keep the process simple and the budget under control.</p>
                    <ol class="cvg-ab-steps">
                        <li><span>Discover</span>We learn your goals, audience and brand.</li>
                        <li><span>Design</span>Custom layouts you review before any code is written.</li>
                        <li><span>Build</span>Responsive, SEO-ready development on WordPress, Shopify or custom code.</li>
                        <li><span>Launch &amp; grow</span>Complete deployment, then ongoing support when you need it.</li>
                    </ol>
                </div>
            </article>
        </div>
    </section>

    <!-- ================= 3. SUMMARY + STATS ================= -->
    <section class="cvg-ab-summary">
        <div class="cvg-ab-wrap">
            <p class="cvg-ab-statement cvg-ab-reveal">
                For more than nine years, Creative Converge has been turning ideas into
                <span class="cvg-ab-mint">websites, brands and stories</span> that people remember.
            </p>
            <div class="cvg-ab-stats cvg-ab-reveal" style="--d:.15s">
                <?php foreach ($abStats as $st): ?>
                    <div class="cvg-ab-stat"><strong><span data-cvg-count="<?= (int) $st[0] ?>">0</span><?php if ($st[1] !== ''): ?><em><?= cvg_e($st[1]) ?></em><?php endif; ?></strong><span><?= cvg_e($st[2]) ?></span></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ================= PROCESS VIDEO ================= -->
    <section class="cvg-ab-pv" aria-labelledby="cvg-ab-pv-title">
        <div class="cvg-ab-pv-in">
            <div class="cvg-ab-pv-head cvg-ab-reveal">
                <p class="cvg-ab-pv-eyebrow">Our process</p>
                <h2 class="cvg-ab-pv-title" id="cvg-ab-pv-title">From brief to launch, <span>one team.</span></h2>
                <p class="cvg-ab-pv-text">Every project moves through the same clear path: your brief, our team, your review, then launch.</p>
            </div>

            <div class="cvg-ab-pv-frame cvg-ab-reveal" style="--d:.15s">
                <div class="cvg-ab-pv-bar" aria-hidden="true"><i></i><i></i><i></i><b>creativeconverge.com / process</b></div>
                <video class="cvg-ab-pv-video" autoplay muted loop playsinline preload="metadata"
                       poster="<?= $A('assets/videos/creative-converge-process-poster.png') ?>" aria-label="How a Creative Converge project moves from brief to launch">
                    <source src="<?= $A('assets/videos/creative-converge-process.webm') ?>" type="video/webm">
                    <source src="<?= $A('assets/videos/creative-converge-process.mp4') ?>" type="video/mp4">
                </video>
            </div>

            <ol class="cvg-ab-pv-steps cvg-ab-reveal" style="--d:.3s">
                <li><em>01</em><strong>Brief &amp; discovery</strong>We learn your goals, audience and brand.</li>
                <li><em>02</em><strong>Wireframe &amp; design</strong>Layouts you approve before any code.</li>
                <li><em>03</em><strong>Build &amp; review</strong>Our team builds, you review, we refine.</li>
                <li><em>04</em><strong>Launch</strong>Deployed, tested and ready to grow.</li>
            </ol>
        </div>
    </section>

    <?php include __DIR__ . '/../includes/our-portfolio.php'; ?>

    <!-- ================= 7. CAREERS BANNER ================= -->
    <section class="cvg-ab-careers">
        <div class="cvg-ab-wrap">
            <div class="cvg-ab-careers-card cvg-ab-reveal">
                <img src="<?= $A('assets/img/about-careers-image.jpg') ?>" alt="The Creative Converge team discussing a project" loading="lazy" class="cvg-ab-careers-img">
                <div class="cvg-ab-careers-body">
                    <p class="cvg-ab-eyebrow">Join us</p>
                    <h2 class="cvg-ab-h2">Careers at<br><span class="cvg-ab-mint">Creative Converge</span></h2>
                    <p>Designers, developers and animators who care about craft: we'd love to hear from you.</p>
                    <a href="<?= $L($abCareersLink) ?>" class="cvg-ab-btn cvg-ab-btn--mint">View open roles <?= $arrow ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= 8. FOUNDER'S NOTE ================= -->
    <section class="cvg-ab-quote">
        <div class="cvg-ab-wrap">
            <figure class="cvg-ab-quote-card cvg-ab-reveal">
                <svg class="cvg-ab-quote-mark" viewBox="0 0 48 36" aria-hidden="true">
                    <path d="M0 36V20C0 9 6 2 18 0l2 5c-7 2-10 6-10 12h8v19H0zm28 0V20C28 9 34 2 46 0l2 5c-7 2-10 6-10 12h8v19H28z" />
                </svg>
                <blockquote><?= cvg_e($abFounder['quote']) ?></blockquote>
                <figcaption>
                    <span class="cvg-ab-quote-avatar">
                        <?php if ($abFounder['photo'] !== ''): ?>
                            <img src="<?= cvg_e(cvg_img_url($abFounder['photo'], $uploads, $siteUrl)) ?>" alt="" style="width:100%;height:100%;object-fit:cover;border-radius:50%">
                            <?php else: ?>CC<?php endif; ?>
                    </span>
                    <span><strong><?= cvg_e($abFounder['name']) ?></strong><small><?= cvg_e($abFounder['role']) ?></small></span>
                </figcaption>
            </figure>
        </div>
    </section>


    <section class="cvg-ab-cta">
        <!-- <img src="<?= $A('assets/img/about-shapes-3d.png') ?>" alt="" class="cvg-ab-cta-shape" aria-hidden="true"> -->
        <div class="cvg-ab-wrap cvg-ab-cta-inner cvg-ab-reveal">
            <h2 class="cvg-ab-cta-title">Ready to build something<br><span class="cvg-ab-mint">converge-worthy?</span></h2>
            <p>Share your brief and we'll come back within one business day with a plan and a quote.</p>
            <a href="<?= $L($abContactLink) ?>" class="cvg-ab-btn cvg-ab-btn--mint cvg-ab-btn--lg">Book a free consultation <?= $arrow ?></a>
        </div>
    </section>

</main>

<script src="<?= $A('assets/js/cvg-about-page.js') ?>"></script>
<script>
(function () {
    var v = document.querySelector('.cvg-ab-pv-video');
    if (!v) return;
    v.muted = true;
    var play = function () { var p = v.play(); if (p && p.catch) p.catch(function () {}); };
    if ('IntersectionObserver' in window) {
        new IntersectionObserver(function (es) {
            es.forEach(function (e) { e.isIntersecting ? play() : v.pause(); });
        }, { threshold: .2 }).observe(v);
    } else { play(); }
})();
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>