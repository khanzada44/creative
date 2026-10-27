<?php
require_once dirname(__DIR__) . '/includes/init.php';
require_once __DIR__ . '/services-data.php';


$slug = $_GET['slug'] ?? '';
$service = null;

foreach ($services as $item) {
    if (($item['slug'] ?? '') === $slug) {
        $service = $item;
        break;
    }
    // sub-services (Laravel, Shopify, etc.) bhi dhoondo
    foreach (($item['sub_services'] ?? []) as $sub) {
        if (($sub['slug'] ?? '') === $slug) {
            $service = $sub;
            break 2;
        }
    }
}

if (!$service) {
    http_response_code(404);
    exit('Service not found');
}

function h($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

$title            = $service['title'] ?? 'Our Services';
$description      = $service['description'] ?? '';
$matatitle        = $service['mata-title'] ?? 'Our Services';
$matadescription  = $service['mata-description'] ?? '';
$subtitle         = $service['subtitle'] ?? $description;
$introTitle       = $service['introTitle'] ?? $title;
$introText        = $service['introText'] ?? $description;
$listTitle        = $service['listTitle'] ?? 'Our Services Include';
$list             = $service['list'] ?? [];
$introImages      = (array) ($service['introImages'] ?? []);
$portfolio        = $service['portfolio'] ?? [];
$portfolioLabel   = $service['portfolioLabel'] ?? '';
$plans            = $service['plans'] ?? [];
$heroImage        = $service['bannerImage'] ?? '';

$heroImageUrl = '';
if ($heroImage !== '') {
    if (preg_match('~^(https?:)?//~i', $heroImage)) {
        $heroImageUrl = $heroImage;
    } elseif (is_file(dirname(__DIR__) . '/' . ltrim($heroImage, '/'))) {
        $heroImageUrl = cvg_url(ltrim($heroImage, '/'));
    }
}

$faqTitle      = $service['faqTitle'] ?? 'Frequently Asked Questions';
$faqSubtitle   = $service['faqSubtitle'] ?? '';
$faqItems      = $service['faqItems'] ?? [];
$faqCtaText    = $service['faqCtaText'] ?? 'Still have a question?';
$faqButtonText = $service['faqButtonText'] ?? 'Get a quote';
$faqButtonUrl  = $service['faqButtonUrl'] ?? cvg_url('contact-us/index.php');

$faqSchema = [
    "@context" => "https://schema.org",
    "@type" => "FAQPage",
    "mainEntity" => array_map(function ($f) {
        return [
            "@type" => "Question",
            "name" => (string) ($f['question'] ?? ''),
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => (string) ($f['answer'] ?? ''),
            ],
        ];
    }, $faqItems),
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($matatitle) ?></title>
    <meta name="description" content="<?= h($matadescription) ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/header.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/footer.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/home-page-fome.css') ?>">
    <script>
        document.documentElement.classList.add('js');
    </script>
    <style>
        /* ===== Big faded word behind section labels ===== */
        [data-wm] {
            position: relative;
            isolation: isolate;
            padding-top: clamp(34px, 5vw, 70px) !important;
        }

        [data-wm]::after {
            content: attr(data-wm);
            position: absolute;
            left: -4px;
            bottom: 4px;
            z-index: -1;
            font: 800 clamp(56px, 9vw, 130px)/.78 'Poppins', sans-serif;
            letter-spacing: .02em;
            text-transform: uppercase;
            white-space: nowrap;
            color: transparent;
            background: linear-gradient(180deg, rgba(255, 255, 255, .09) 0%, rgba(255, 255, 255, .015) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            pointer-events: none;
            user-select: none;
        }

        .cvg-svc-eyebrow.cvg-center[data-wm] {
            display: flex !important;
            width: fit-content;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        /* centered sections: big word starts from the LEFT edge of the content */
        .cvg-center[data-wm],
        .faq-eyebrow[data-wm] {
            position: static;
        }

        #svc-portfolio-sec .cvg-svc-wrap>.reveal,
        .pricing-head,
        .faq-inner {
            position: relative;
            isolation: isolate;
        }

        .cvg-center[data-wm]::after,
        .faq-eyebrow[data-wm]::after {
            left: 0;
            right: auto;
            top: -18px;
            bottom: auto;
            transform: none;
        }

        .faq {
            overflow: clip;
        }

        /* ===== Mobile responsive ===== */
        /* intro image (fold visual) never wider than its column */
        .cvg-svc-intro img {
            display: block;
            width: 100%;
            max-width: 560px;
            height: auto;
            margin: 0 auto;
        }

        @media (max-width: 1024px) {
            .cvg-svc-intro {
                gap: 36px;
            }

            /* contact label wraps to 2 lines here: keep the big word above it */
            .cvg-consult [data-wm] {
                padding-top: 52px;
            }

            .cvg-consult [data-wm]::after {
                top: 0;
                bottom: auto;
                font-size: clamp(40px, 7vw, 64px);
            }
        }

        @media (max-width: 767px) {
            .cvg-svc-wrap {
                padding: 0 18px;
            }

            /* hero */
            .cvg-svc-hero {
                padding: 64px 0 72px;
            }

            .cvg-svc-h1 {
                font-size: clamp(28px, 8.6vw, 34px);
                hyphens: auto;
            }

            .cvg-svc-sub {
                font-size: 15px;
            }

            /* intro: image under the text, a little smaller */
            .cvg-svc-intro img {
                max-width: 440px;
            }

            /* big faded word: smaller, and sits above the label (never on top of it) */
            [data-wm] {
                padding-top: 44px !important;
            }

            [data-wm]::after,
            .cvg-consult [data-wm]::after {
                top: 0;
                bottom: auto;
                font-size: clamp(40px, 13vw, 56px);
            }

            .cvg-center[data-wm]::after,
            .faq-eyebrow[data-wm]::after {
                top: -6px;
            }

            .cvg-consult [data-wm] {
                padding-top: 44px;
            }

            /* pricing cards */
            .pricing-card {
                padding: 28px 22px 30px;
                border-radius: 22px;
            }

            .pricing-card .card-title {
                padding-right: 0;
                font-size: 19px;
            }

            .badge-popular {
                position: static;
                align-self: flex-start;
                margin-bottom: 14px;
            }

            .pricing-card .amount {
                font-size: 64px;
            }

            .pricing-card .currency {
                margin-top: 10px;
                font-size: 24px;
            }

            .pricing-card .decimals {
                margin-top: 22px;
                font-size: 22px;
            }

            .pricing-card .feature-list li {
                font-size: 15px;
            }

            .pricing-card .btn-buy {
                min-height: 56px;
                font-size: 16px;
            }

            .pricing-head {
                margin-bottom: 40px;
            }
        }

        @media (max-width: 380px) {
            .pricing-card .amount {
                font-size: 56px;
            }

            .cvg-svc-portfolio {
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <?php include dirname(__DIR__) . '/includes/header.php'; ?>
    <div class="cvg-svc" id="cvg-svc">
        <section class="cvg-svc-hero<?= $heroImageUrl !== '' ? ' cvg-svc-hero--img' : '' ?>" <?= $heroImageUrl !== '' ? ' style="--svc-hero-img:url(&quot;' . h($heroImageUrl) . '&quot;)"' : '' ?>>
            <div class="cvg-svc-wrap">
                <p class="cvg-svc-eyebrow">Our Services</p>
                <h1 class="cvg-svc-h1"><?= h($title) ?></h1>
                <p class="cvg-svc-sub"><?= h($subtitle) ?></p>
            </div>
        </section>
        <section class="cvg-svc-sec">
            <div class="cvg-svc-wrap">
                <div class="cvg-svc-intro reveal <?= empty($introImages) ? 'no-media' : '' ?>">
                    <div>
                        <p class="cvg-svc-eyebrow" data-wm="Intro">Introduction</p>
                        <h2 class="cvg-svc-h2"><?= h($introTitle) ?></h2>
                        <p class="cvg-svc-text"><?= h($introText) ?></p>
                        <?php if (!empty($list)): ?>
                            <h3 class="cvg-svc-h3"><?= h($listTitle) ?></h3>
                            <ul class="cvg-svc-list">
                                <?php foreach ($list as $li): ?>
                                    <li><?= h($li) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($introImages)): ?>
                        <!-- <div class="cvg-svc-intro-media"> -->
                        <div class="">
                            <?php foreach ($introImages as $i => $img): ?>
                                <img src="<?= h(cvg_url($img)) ?>" alt="<?= h($title) ?> <?= (int) $i + 1 ?>" loading="lazy">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <style>
            /* ===== Introduction section: spacing ===== */
.cvg-svc-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  margin: 0 0 14px !important;
}

.cvg-svc-h2 {
  margin: 0 0 22px !important;
  line-height: 1.12 !important;
  letter-spacing: -.02em;
}

.cvg-svc-text {
  margin: 0 0 34px !important;
  max-width: 600px;
  font-size: 16px;
  line-height: 1.85 !important;
  color: #A9BAB5;
}

.cvg-svc-h3 {
  margin: 0 0 18px !important;
  padding-top: 26px;
  font-size: 18px !important;
  line-height: 1.4;
}

.cvg-svc-list {
  display: grid;
  gap: 14px;
  margin: 0 !important;
  padding: 0 !important;
  list-style: none;
}

.cvg-svc-list li {
  margin: 0 !important;
  line-height: 1.5;
}

@media (max-width: 767px) {
  .cvg-svc-h2   { margin-bottom: 16px !important; }
  .cvg-svc-text { margin-bottom: 26px !important; font-size: 15px; line-height: 1.75 !important; }
  .cvg-svc-h3   { padding-top: 22px; font-size: 17px !important; }
  .cvg-svc-list { gap: 12px; }
}
        </style>
        <?php if (!empty($portfolio)): ?>
            <section class="cvg-svc-sec cvg-svc-sec-alt" id="svc-portfolio-sec">
                <div class="cvg-svc-wrap">
                    <div class="reveal">
                        <p class="cvg-svc-eyebrow cvg-center" data-wm="Portfolio">Our Work</p>
                        <h2 class="cvg-svc-h2 cvg-center">Our Portfolio</h2>
                        <?php if ($portfolioLabel !== ''): ?>
                            <span class="cvg-svc-portfolio-tag"><?= h($portfolioLabel) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="cvg-svc-portfolio">
                        <?php foreach ($portfolio as $index => $image): ?>
                            <button type="button" class="cvg-svc-work reveal" style="transition-delay: <?= min($index, 7) * 70 ?>ms"
                                data-src="<?= h(cvg_url($image)) ?>" data-index="<?= (int) $index ?>" aria-label="View portfolio image <?= (int) $index + 1 ?>">
                                <img src="<?= h(cvg_url($image)) ?>" alt="<?= h($title) ?> portfolio <?= (int) $index + 1 ?>" loading="lazy">

                                <span class="cvg-svc-work-overlay">View Larger</span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="cvg-svcx-lb" role="dialog" aria-modal="true" aria-label="Portfolio image" hidden>
                    <button type="button" class="cvg-svcx-lb-close" aria-label="Close">&times;</button>
                    <button type="button" class="cvg-svcx-lb-nav cvg-svcx-lb-prev" aria-label="Previous image">&#8249;</button>
                    <div class="cvg-svcx-lb-stage"><img class="cvg-svcx-lb-img" src="" alt=""></div>
                    <button type="button" class="cvg-svcx-lb-nav cvg-svcx-lb-next" aria-label="Next image">&#8250;</button>
                    <span class="cvg-svcx-lb-count" aria-live="polite"></span>
                </div>
            </section>

            <style>
                #svc-portfolio-sec .cvg-svc-work.cvg-svc-work--tall {
                    position: relative;
                    display: block;
                    height: 440px;
                    aspect-ratio: auto;
                    overflow: hidden;
                    padding: 0;
                }

                #svc-portfolio-sec .cvg-svc-work.cvg-svc-work--tall img {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: auto !important;
                    max-width: none;
                    max-height: none;
                    margin: 0;
                    object-fit: initial;
                    border-radius: 0;
                    transform: translateY(0);
                    transition: transform var(--svcx-dur, 3s) ease-in-out;
                    will-change: transform;
                }

                #svc-portfolio-sec .cvg-svc-work.cvg-svc-work--tall:hover img,
                #svc-portfolio-sec .cvg-svc-work.cvg-svc-work--tall:focus-visible img {
                    transform: translateY(var(--svcx-move, 0px));
                }

                /* "Hover to scroll" hint (only on tall cards) */
                #svc-portfolio-sec .cvg-svc-work-scroll {
                    display: none;
                }

                #svc-portfolio-sec .cvg-svc-work--tall .cvg-svc-work-scroll {
                    position: absolute;
                    left: 12px;
                    top: 12px;
                    z-index: 2;
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    padding: 6px 12px 6px 9px;
                    border-radius: 999px;
                    background: rgba(10, 10, 10, .72);
                    border: 1px solid rgba(95, 240, 200, .3);
                    color: #F2F5F4;
                    font: 500 12px/1 'Poppins', sans-serif;
                    pointer-events: none;
                    transition: opacity .35s ease;
                }

                #svc-portfolio-sec .cvg-svc-work--tall .cvg-svc-work-scroll svg {
                    width: 14px;
                    height: 14px;
                    fill: none;
                    stroke: #00D4A3;
                    stroke-width: 2.4;
                    stroke-linecap: round;
                    stroke-linejoin: round;
                    animation: svcxBob 1.6s ease-in-out infinite;
                }

                #svc-portfolio-sec .cvg-svc-work--tall:hover .cvg-svc-work-scroll {
                    opacity: 0;
                }

                @keyframes svcxBob {

                    0%,
                    100% {
                        transform: translateY(-2px);
                    }

                    50% {
                        transform: translateY(2px);
                    }
                }

                @media (max-width: 1024px) {
                    #svc-portfolio-sec .cvg-svc-work.cvg-svc-work--tall {
                        height: 400px;
                    }
                }

                @media (max-width: 767px) {
                    #svc-portfolio-sec .cvg-svc-work.cvg-svc-work--tall {
                        height: 320px;
                    }
                }

                .cvg-svcx-lb {
                    position: fixed;
                    inset: 0;
                    z-index: 99999;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 16px;
                    padding: 40px 20px;
                    box-sizing: border-box;
                    background: rgba(5, 8, 7, .92);
                    -webkit-backdrop-filter: blur(6px);
                    backdrop-filter: blur(6px);
                    opacity: 0;
                    transition: opacity .25s ease;
                    font-family: 'Poppins', sans-serif;
                }

                .cvg-svcx-lb[hidden] {
                    display: none;
                }

                .cvg-svcx-lb.cvg-svcx-lb--open {
                    opacity: 1;
                }

                .cvg-svcx-lb .cvg-svcx-lb-stage {
                    max-width: min(1100px, 100%);
                    max-height: calc(100vh - 80px);
                    overflow: auto;
                    border-radius: 14px;
                    box-shadow: 0 30px 80px rgba(0, 0, 0, .6);
                    overscroll-behavior: contain;
                }

                .cvg-svcx-lb .cvg-svcx-lb-img {
                    display: block;
                    max-width: 100%;
                    max-height: calc(100vh - 80px);
                    margin: 0 auto;
                    border-radius: 14px;

                }

                /* Tall images: full width, scroll inside */
                .cvg-svcx-lb.cvg-svcx-lb--tall .cvg-svcx-lb-stage {
                    width: min(900px, 100%);
                }

                .cvg-svcx-lb.cvg-svcx-lb--tall .cvg-svcx-lb-img {
                    width: 100%;
                    max-height: none;
                    border-radius: 0;
                }

                .cvg-svcx-lb .cvg-svcx-lb-close,
                .cvg-svcx-lb .cvg-svcx-lb-nav {
                    flex: none;
                    width: 48px;
                    height: 48px;
                    margin: 0;
                    padding: 0;
                    border: 1px solid rgba(95, 240, 200, .35);
                    border-radius: 50%;
                    background: rgba(17, 22, 20, .85);
                    color: #F2F5F4;
                    font: 400 28px/1 'Poppins', sans-serif;
                    cursor: pointer;
                    display: grid;
                    place-items: center;

                    transition: background .3s ease, color .3s ease;
                }

                .cvg-svcx-lb .cvg-svcx-lb-close {
                    position: absolute;
                    top: 18px;
                    right: 18px;
                }

                .cvg-svcx-lb .cvg-svcx-lb-close:hover,
                .cvg-svcx-lb .cvg-svcx-lb-nav:hover {
                    background: #00D4A3;
                    color: #04342C;
                }

                .cvg-svcx-lb button:focus-visible {
                    outline: 2px solid #5FF0C8;
                    outline-offset: 3px;
                }

                .cvg-svcx-lb .cvg-svcx-lb-count {
                    position: absolute;
                    left: 50%;
                    bottom: 16px;
                    transform: translateX(-50%);
                    color: #C9D6D2;
                    font-size: 13px;
                    letter-spacing: .08em;
                }

                .cvg-svcx-lb.cvg-svcx-lb--single .cvg-svcx-lb-nav,
                .cvg-svcx-lb.cvg-svcx-lb--single .cvg-svcx-lb-count {
                    display: none;
                }

                @media (max-width: 767px) {
                    .cvg-svcx-lb {
                        padding: 70px 10px 76px;
                    }

                    .cvg-svcx-lb .cvg-svcx-lb-nav {
                        position: absolute;
                        bottom: 14px;
                    }

                    .cvg-svcx-lb .cvg-svcx-lb-prev {
                        left: 16px;
                    }

                    .cvg-svcx-lb .cvg-svcx-lb-next {
                        right: 16px;
                    }

                    .cvg-svcx-lb .cvg-svcx-lb-count {
                        bottom: 30px;
                    }

                    .cvg-svcx-lb .cvg-svcx-lb-stage {
                        max-height: calc(100vh - 150px);
                    }

                    .cvg-svcx-lb .cvg-svcx-lb-img {
                        max-height: calc(100vh - 150px);
                    }
                }

                @media (prefers-reduced-motion: reduce) {

                    #svc-portfolio-sec .cvg-svc-work.cvg-svc-work--tall img,
                    .cvg-svcx-lb {
                        transition: none;
                    }

                    #svc-portfolio-sec .cvg-svc-work--tall .cvg-svc-work-scroll svg {
                        animation: none;
                    }
                }
            </style>

            <script>
                (function() {
                    var sec = document.getElementById('svc-portfolio-sec');
                    if (!sec) return;
                    var TALL_RATIO = 1.5; /* image height ÷ width above this = "tall" (website screenshot) */
                    var SPEED = 260; /* scroll speed on hover, in pixels per second */

                    var items = Array.prototype.slice.call(sec.querySelectorAll('.cvg-svc-work'));
                    if (!items.length) return;

                    /* ---------- 1. Find tall images and set up hover scroll ---------- */
                    function measure(btn) {
                        var img = btn.querySelector('img');
                        if (!img || !img.naturalWidth) return;
                        var tall = img.naturalHeight / img.naturalWidth > TALL_RATIO;
                        btn.classList.toggle('cvg-svc-work--tall', tall);
                        btn.dataset.tall = tall ? '1' : '';
                        if (!tall) return;
                        var move = Math.max(0, img.offsetHeight - btn.clientHeight);
                        btn.style.setProperty('--svcx-move', -move + 'px');
                        btn.style.setProperty('--svcx-dur', Math.min(8, Math.max(1.2, move / SPEED)).toFixed(2) + 's');
                    }
                    items.forEach(function(btn) {
                        var img = btn.querySelector('img');
                        if (!img) return;
                        if (img.complete && img.naturalWidth) measure(btn);
                        else img.addEventListener('load', function() {
                            measure(btn);
                        });
                    });
                    var rt;
                    window.addEventListener('resize', function() {
                        clearTimeout(rt);
                        rt = setTimeout(function() {
                            items.forEach(measure);
                        }, 150);
                    });

                    /* ---------- 2. Large view with next/prev, keyboard and scroll for tall images ---------- */
                    var lb = sec.querySelector('.cvg-svcx-lb');
                    document.body.appendChild(lb); /* so no parent style can clip it */
                    var stage = lb.querySelector('.cvg-svcx-lb-stage');
                    var big = lb.querySelector('.cvg-svcx-lb-img');
                    var count = lb.querySelector('.cvg-svcx-lb-count');
                    var current = 0,
                        lastFocus = null;
                    if (items.length < 2) lb.classList.add('cvg-svcx-lb--single');

                    function show(i) {
                        current = (i + items.length) % items.length;
                        var btn = items[current],
                            thumb = btn.querySelector('img');
                        var tall = btn.dataset.tall === '1';
                        if (!btn.dataset.tall && thumb && thumb.naturalWidth) tall = thumb.naturalHeight / thumb.naturalWidth > TALL_RATIO;
                        lb.classList.toggle('cvg-svcx-lb--tall', tall);
                        big.src = btn.getAttribute('data-src');
                        big.alt = thumb ? thumb.alt : '';
                        stage.scrollTop = 0;
                        count.textContent = (current + 1) + ' / ' + items.length;
                    }

                    function open(i) {
                        lastFocus = document.activeElement;
                        show(i);
                        lb.hidden = false;
                        document.documentElement.style.overflow = 'hidden';
                        requestAnimationFrame(function() {
                            lb.classList.add('cvg-svcx-lb--open');
                        });
                        lb.querySelector('.cvg-svcx-lb-close').focus();
                    }

                    function close() {
                        lb.classList.remove('cvg-svcx-lb--open');
                        document.documentElement.style.overflow = '';
                        setTimeout(function() {
                            lb.hidden = true;
                            big.src = '';
                        }, 250);
                        if (lastFocus) lastFocus.focus();
                    }

                    /* Capture the click first, so an older lightbox script on the page doesn't open a second one */
                    sec.addEventListener('click', function(e) {
                        var btn = e.target.closest('.cvg-svc-work');
                        if (!btn || !sec.contains(btn)) return;
                        e.preventDefault();
                        e.stopPropagation();
                        open(items.indexOf(btn));
                    }, true);

                    lb.querySelector('.cvg-svcx-lb-close').addEventListener('click', close);
                    lb.querySelector('.cvg-svcx-lb-prev').addEventListener('click', function() {
                        show(current - 1);
                    });
                    lb.querySelector('.cvg-svcx-lb-next').addEventListener('click', function() {
                        show(current + 1);
                    });
                    lb.addEventListener('click', function(e) {
                        if (e.target === lb) close();
                    });
                    document.addEventListener('keydown', function(e) {
                        if (lb.hidden) return;
                        if (e.key === 'Escape') close();
                        else if (e.key === 'ArrowLeft') show(current - 1);
                        else if (e.key === 'ArrowRight') show(current + 1);
                    });
                })();
            </script>
        <?php endif; ?>

        <!-- ============ PRICING (service-specific plans) ============ -->
        <?php if (!empty($plans)): ?>
            <section class="pricing-section" id="svc-pricing-sec">
                <div class="pricing-head reveal">
                    <p class="cvg-svc-eyebrow cvg-center" data-wm="Pricing">Packages</p>
                    <h2 class="cvg-svc-h2 cvg-center"><?= h($title) ?> Pricing</h2>
                </div>

                <div class="pricing-container" id="pricing-container">
                    <?php foreach ($plans as $plan):
                        $price    = (float) ($plan['price'] ?? 0);
                        $whole    = (int) floor($price);
                        $cents    = str_pad((string) round(($price - $whole) * 100), 2, '0', STR_PAD_LEFT);
                        $featured = !empty($plan['featured']);
                    ?>
                        <div class="pricing-card <?= $featured ? 'featured-card' : '' ?>">

                            <?php if (!empty($plan['badge'])): ?>
                                <div class="badge-popular"><?= h($plan['badge']) ?></div>
                            <?php endif; ?>

                            <h3 class="card-title"><?= h($plan['name'] ?? 'Package') ?></h3>

                            <div class="price-tag">
                                <span class="currency">$</span>
                                <span class="amount"><?= h($whole) ?></span>
                                <span class="decimals">.<?= h($cents) ?></span>
                            </div>

                            <p class="package-includes">Package includes</p>

                            <ul class="feature-list">
                                <?php foreach (($plan['features'] ?? []) as $feature): ?>
                                    <li>
                                        <span class="check-icon">✓</span>
                                        <span><?= h($feature) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <a href="<?= h(cvg_url($plan['link'] ?? 'contact-us/index.php')) ?>"
                                class="btn-buy <?= $featured ? 'featured-btn' : '' ?>">Buy now</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <!-- ============ LIGHTBOX ============ -->
        <div class="cvg-svc-lightbox" id="svc-lightbox" hidden>
            <button type="button" class="cvg-svc-lightbox-close" aria-label="Close">&times;</button>
            <img src="" alt="Portfolio preview">
        </div>
    </div>
 <?php include dirname(__DIR__) . '/includes/home-page-fome.php'; ?>
    <?php if (!empty($faqItems)): ?>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  
       
        <section class="faq" id="faq">
            <div class="faq-inner">

                <div class="faq-eyebrow" data-wm="FAQ">FAQ</div>

                <h2><?= h($faqTitle) ?></h2>

                <?php if (!empty($faqSubtitle)): ?>
                    <p class="faq-sub"><?= h($faqSubtitle) ?></p>
                <?php endif; ?>

                <?php foreach ($faqItems as $index => $faq): ?>
                    <details name="faq">
                        <summary>
                            <?= h($faq['question'] ?? '') ?>
                            <span class="icon"></span>
                        </summary>

                        <div class="answer">
                            <?= nl2br(h($faq['answer'] ?? '')) ?>

                            <?php if (!empty($faq['list'])): ?>
                                <ul>
                                    <?php foreach ($faq['list'] as $item): ?>
                                        <li><?= h($item) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <?php if (!empty($faq['linkText']) && !empty($faq['linkUrl'])): ?>
                                <a href="<?= h($faq['linkUrl']) ?>">
                                    <?= h($faq['linkText']) ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </details>
                <?php endforeach; ?>

                <div class="faq-cta">
                    <?= h($faqCtaText) ?>
                    <br>
                    <a class="btn" href="<?= h($faqButtonUrl) ?>">
                        <?= h($faqButtonText) ?>
                    </a>
                </div>

            </div>
        </section>

        <script>
            (function() {
                var sec = document.getElementById('faq');
                if (!sec) return;
                var items = sec.querySelectorAll('.faq-eyebrow, h2, .faq-sub, details, .faq-cta');
                items.forEach(function(el, i) {
                    el.classList.add('reveal');
                    el.style.setProperty('--d', (i * 0.07) + 's');
                });
                sec.classList.add('js');
                if (!('IntersectionObserver' in window)) {
                    items.forEach(function(el) {
                        el.classList.add('in')
                    });
                    return;
                }
                var io = new IntersectionObserver(function(es) {
                    es.forEach(function(e) {
                        if (e.isIntersecting) {
                            e.target.classList.add('in');
                            io.unobserve(e.target);
                        }
                    });
                }, {
                    threshold: .15
                });
                items.forEach(function(el) {
                    io.observe(el)
                });
            })();
        </script>
        <script type="application/ld+json">
            <?= json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?>
        </script>
    <?php endif; ?>

    <?php include dirname(__DIR__) . '/includes/footer.php'; ?>

    <script>
        (function() {
            var root = document.getElementById('cvg-svc');
            if (!root) return;

            /* ---- Lightbox ---- */
            var lightbox = root.querySelector('#svc-lightbox');
            var preview = lightbox.querySelector('img');

            function closeBox() {
                lightbox.hidden = true;
                preview.src = '';
            }

            root.addEventListener('click', function(event) {
                var work = event.target.closest('.cvg-svc-work');
                if (work && root.contains(work)) {
                    preview.src = work.getAttribute('data-src');
                    lightbox.hidden = false;
                    return;
                }
                if (event.target === lightbox || event.target.closest('.cvg-svc-lightbox-close')) closeBox();
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeBox();
            });

            /* ---- Scroll reveal (sections + pricing cards) ---- */
            var targets = root.querySelectorAll('.reveal, #pricing-container');

            if (!('IntersectionObserver' in window)) {
                targets.forEach(function(el) {
                    el.classList.add('is-visible');
                });
                return;
            }

            var io = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15
            });

            targets.forEach(function(el) {
                io.observe(el);
            });
        })();
    </script>
</body>
<script src="<?= cvg_url('assets/js/favicon-animate.js') ?>"></script>

</html>