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
$matatitle        = $service['meta-title'] ?? $service['mata-title'] ?? ($title . ' | Creative Converge');
$matadescription  = $service['meta-description'] ?? $service['mata-description'] ?? $description;
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
$faqButtonUrl  = $service['faqButtonUrl'] ?? cvg_url('contact-us');

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
    <link rel="stylesheet" href="<?= cvg_url('assets/css/service-detail.css') ?>">
    <style>
        /* Pricing cards: aakhri line ke cards (jaise Customized) center mein aayein */
        #svc-pricing-sec .pricing-container {
            --pc-gap: 24px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: stretch;
            gap: var(--pc-gap);
        }

        #svc-pricing-sec .pricing-container > .pricing-card {
            flex: 0 1 calc((100% - 2 * var(--pc-gap)) / 3);
            min-width: 0;
            box-sizing: border-box;
            max-width: calc((100% - 2 * var(--pc-gap)) / 3);
        }

        @media (max-width: 900px) {
            #svc-pricing-sec .pricing-container > .pricing-card {
                flex-basis: calc((100% - var(--pc-gap)) / 2);
                max-width: calc((100% - var(--pc-gap)) / 2);
            }
        }

        @media (max-width: 600px) {
            #svc-pricing-sec .pricing-container > .pricing-card {
                flex-basis: 100%;
                max-width: 100%;
            }
        }
    </style>
    <script>
        document.documentElement.classList.add('js');
    </script>
    <!-- Start of velotix Zendesk Widget script (sirf EK baar, poore page par) -->
    <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=832e42ad-4c5d-4c97-8f07-1e27982ea22a"></script>
    <!-- End of velotix Zendesk Widget script -->
    <script>
        // Page load/reload par chat window band rahe, sirf icon nazar aaye
        (function closeZendeskOnLoad(tries) {
            if (typeof window.zE === "function") {
                try { zE("messenger", "close"); } catch (e) {} // naya Zendesk Messaging
                try { zE("webWidget", "close"); } catch (e) {} // purana Classic Web Widget
                return;
            }
            if (tries < 20) setTimeout(function () { closeZendeskOnLoad(tries + 1); }, 500);
        })(0);

        // "Chat Now" buttons ke liye — user click kare tab khule
        function openLiveChat() {
            if (typeof window.zE !== "function") return;
            try { zE("messenger", "open"); } catch (e) {}
            try { zE("webWidget", "open"); } catch (e) {}
        }
    </script>
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
                        $rawPrice = trim((string) ($plan['price'] ?? ''));
                        // Price khaali ya number nahi (jaise "Customized") = custom quote, $0.00 nahi
                        $isCustom = $rawPrice === '' || !is_numeric($rawPrice) || (float) $rawPrice <= 0;
                        $price    = $isCustom ? 0 : (float) $rawPrice;
                        $whole    = (int) floor($price);
                        $cents    = str_pad((string) round(($price - $whole) * 100), 2, '0', STR_PAD_LEFT);
                        $featured = !empty($plan['featured']);
                    ?>
                        <div class="pricing-card <?= $featured ? 'featured-card' : '' ?>">

                            <?php if (!empty($plan['badge'])): ?>
                                <div class="badge-popular"><?= h($plan['badge']) ?></div>
                            <?php endif; ?>

                            <h3 class="card-title"><?= h(trim($plan['name'] ?? 'Package')) ?></h3>

                            <?php if ($isCustom): ?>
                                <div class="price-tag price-tag--custom">
                                    <span class="amount">Custom Quote</span>
                                </div>
                                <p class="price-note">Pricing based on your requirements</p>
                            <?php else: ?>
                                <div class="price-tag">
                                    <span class="currency">$</span>
                                    <span class="amount"><?= h($whole) ?></span>
                                    <span class="decimals">.<?= h($cents) ?></span>
                                </div>
                            <?php endif; ?>

                            <p class="package-includes">Package includes</p>

                            <ul class="feature-list">
                                <?php foreach (($plan['features'] ?? []) as $feature): ?>
                                    <li>
                                        <span class="check-icon">✓</span>
                                        <span><?= h($feature) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <a href="<?= h(cvg_url($plan['link'] ?? 'contact-us')) ?>"
                                class="btn-buy <?= $featured ? 'featured-btn' : '' ?>"><?= $isCustom ? 'Get a Quote' : 'Buy now' ?></a>
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