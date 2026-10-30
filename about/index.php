<?php

require_once dirname(__DIR__) . '/includes/init.php';


$abStats = [
    ['10',  '+', 'Years of experience'],
    ['354', '',  'Projects delivered'],
    ['235', '',  'Satisfied clients'],
    ['15',  '',  'Awards won'],
];


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
    'photo' => 'assets/img/founder-picture.jpg', 
];

$abContactLink = 'contact-us';
$abCareersLink = 'contact-us';


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


$abSpots = [[-30, -24], [28, -22], [-26, 22], [30, 24], [-8, -31], [10, 31], [-37, 0], [37, -2], [-18, -10], [19, 11], [-20, 30], [22, -32]];

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
<link rel="stylesheet" href="<?= cvg_url('assets/css/about-page.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Instrument+Serif:ital@1&display=swap">
<title>Driven by Design, Powered by Tech: Meet the Creative Converge Dallas Team</title>
<meta name="description" content="Meet the creative team behind Creative Converge. We combine design thinking and technology to deliver memorable digital experiences in Dallas.">


<main class="cvg-abx" id="cvg-about-page">
    <nav class="abx-rail" aria-label="Page sections"></nav>
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
        <?php include dirname(__DIR__) . '/includes/world-section.php'; ?>

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
    <section class="abx-sec abx-cta" id="abx-contact" data-abx-label="Contact">
        <div class="abx-wrap abx-rv">
            <h2 class="abx-cta-title">Got Something <span class="abx-serif">Converge-Worthy?</span><br>Let's Talk.</h2>
            <p>Got an idea you're excited about, a problem you can't quite solve, or something you know could work better? We'd love to hear about it.</p>
            <a href="<?= cvg_url($abContactLink) ?>" class="abx-btn abx-btn--mint">Tell Us About Your Project <?= $arrow ?></a>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<!-- Start of velotix Zendesk Widget script -->
<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=832e42ad-4c5d-4c97-8f07-1e27982ea22a"> </script>
<!-- End of velotix Zendesk Widget script -->

<script>
  // Page load/reload par chat window band rahe, sirf icon nazar aaye
  (function closeZendeskOnLoad(tries) {
    if (typeof window.zE === "function") {
      try { zE("messenger", "close"); } catch (e) {}  // naya Zendesk Messaging
      try { zE("webWidget", "close"); } catch (e) {}  // purana Classic Web Widget
      return;
    }
    // Script abhi load ho rahi hai — 20 dafa tak (10 sec) intezar
    if (tries < 20) setTimeout(function () { closeZendeskOnLoad(tries + 1); }, 500);
  })(0);
</script>
<script src="<?= cvg_url('assets/js/about.js') ?>"></script>
<script src="<?= cvg_url('assets/js/favicon-animate.js') ?>"></script>