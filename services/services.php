<?php
require_once __DIR__ . '/services-data.php';

function cvg_h($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

$services = is_array($services ?? null) ? $services : [];

$serviceIcons = [
    'logo'   => 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/icon-branding.png',
    'web'    => 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/icon-branding.png',
    'social' => 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/icon-branding.png',
    'globe'  => 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/icon-branding.png',
];

$defaultIcon = $serviceIcons['logo'];
?>

<link rel="stylesheet" href="../assets/css/header.css">
<link rel="stylesheet" href="../assets/css/footer.css">

<?php include __DIR__ . '../../includes/header.php'; ?>
<div class="services-container">
  <h1 class="services-title">Our Services</h1>
</div>
<style>
    .services-container {
  width: 100%;
  height: 60vh;
  background: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, 0.45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
  display: flex;
  justify-content: center;
  align-items: center;
}

.services-title {
  color: #ffffff;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 3rem;
  font-weight: bold;
  letter-spacing: 1px;
}
</style>
<section class="svc" id="services">

    <img
        class="svc-bg"
        src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/bg-object.png"
        alt=""
        aria-hidden="true"
    >

    <div class="svc-wrap">

        <!-- Heading -->
        <div class="svc-head">
            <div class="svc-eyebrow" data-io>Our Services</div>

            <h1 class="svc-main-heading" data-io>
                <span class="svc-line">
                    <span class="svc-line-in">We do</span>
                </span>
                <span class="svc-line">
                    <span class="svc-line-in">everything</span>
                </span>
            </h1>

            <p data-reveal="up" style="--d:.3s">
                Everything your brand needs to look great and grow online.
                Explore our design, development, branding and digital marketing
                services, delivered by one team.
            </p>
        </div>

        <!-- Carousel -->
        <div class="svc-carousel">

            <div class="svc-arrows">
                <button
                    class="svc-arrow"
                    type="button"
                    data-svc-prev
                    aria-label="Previous services"
                >
                    <svg viewBox="0 0 16 22" aria-hidden="true">
                        <path d="M12 3L4 11l8 8"/>
                    </svg>
                </button>

                <button
                    class="svc-arrow"
                    type="button"
                    data-svc-next
                    aria-label="Next services"
                >
                    <svg viewBox="0 0 16 22" aria-hidden="true">
                        <path d="M4 3l8 8-8 8"/>
                    </svg>
                </button>
            </div>

            <div class="svc-viewport">
                <div class="svc-track">

                    <?php foreach ($services as $service): ?>

                        <?php
                        $title = trim((string) ($service['title'] ?? 'Service'));

                        $slug = trim((string) ($service['slug'] ?? ''));

                        $description = trim(
                            (string) ($service['description'] ?? '')
                        );

                        $icon = $service['icon'] ?? $defaultIcon;

                        if (!filter_var($icon, FILTER_VALIDATE_URL)) {
                            $icon = $defaultIcon;
                        }

                        $detailUrl = $slug !== ''
                            ? 'service-detail.php?slug=' . rawurlencode($slug)
                            : '#services';

                        $subServices = $service['sub_services'] ?? [];
                        ?>

                        <a
                            class="svc-card"
                            href="<?= cvg_h($detailUrl) ?>"
                        >

                            <span class="svc-icon">
                                <img
                                    src="<?= cvg_h($icon) ?>"
                                    alt=""
                                    loading="lazy"
                                >
                            </span>

                            <h2 class="svc-card-title">
                                <?= cvg_h($title) ?>
                            </h2>

                            <?php if ($description !== ''): ?>
                                <p class="svc-description">
                                    <?= cvg_h($description) ?>
                                </p>
                            <?php endif; ?>

                            <?php if (is_array($subServices) && !empty($subServices)): ?>
                                <span class="svc-sub-services">
                                    <?php
                                    $subTitles = [];

                                    foreach ($subServices as $sub) {
                                        $subTitle = is_array($sub)
                                            ? ($sub['title'] ?? '')
                                            : $sub;

                                        if (trim((string) $subTitle) !== '') {
                                            $subTitles[] = $subTitle;
                                        }
                                    }

                                    echo cvg_h(implode(' · ', array_slice($subTitles, 0, 3)));
                                    ?>
                                </span>
                            <?php endif; ?>

                            <span class="svc-more">
                                Read more
                                <?php if (isset($service['price']) && $service['price'] !== ''): ?>
                                    <span class="svc-price">
                                        From $<?= cvg_h($service['price']) ?>
                                    </span>
                                <?php endif; ?>
                            </span>

                        </a>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>

    <!-- Decorative marquee -->
    <div class="svc-marquee" aria-hidden="true">
        <span>
            <img
                src="https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/WEBS-DESIGN-USA.png"
                alt=""
            >
        </span>
    </div>

</section>

<?php include __DIR__ . '../../includes/footer.php'; ?>

<style>
.svc {
    --svc-green: #0a7454;
    --svc-card: #074b39;
    --svc-dark: #020a07;
    --svc-accent: #1fa57f;

    position: relative;
    isolation: isolate;
    overflow: hidden;
    width: 100%;
    padding: 70px 0 190px;
    background: radial-gradient(45% 60% at 85% 85%, rgba(0, 212, 163, .10) 0%, rgba(0, 212, 163, 0) 70%), radial-gradient(40% 50% at 10% 20%, rgba(0, 67, 55, .45) 0%, rgba(0, 67, 55, 0) 70%);
    color: var(--cvg-text);
    color: #fff;
    font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
}

.svc,
.svc * {
    box-sizing: border-box;
}

.svc h1,
.svc h2,
.svc p {
    margin-top: 0;
}

.svc-bg {
    position: absolute;
    top: 0;
    right: 0;
    z-index: -1;
    width: 560px;
    max-width: 60%;
    height: auto;
    pointer-events: none;
    user-select: none;
}

.svc-wrap {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 1360px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Heading */

.svc-head {
    max-width: 760px;
    padding: 0 20px;
    margin-bottom: 45px;
}

.svc-eyebrow {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
    font-size: 15px;
    font-weight: 500;
    text-transform: lowercase;
}

.svc-eyebrow::before {
    content: "";
    width: 62px;
    height: 2px;
    flex-shrink: 0;
    background: #fff;
}

.svc-main-heading {
    margin-bottom: 18px;
    font-size: clamp(40px, 5vw, 60px);
    font-weight: 700;
    line-height: 1.1;
    color: #fff;
}

.svc-line {
    display: inline-block;
    overflow: hidden;
    vertical-align: top;
    padding-bottom: .12em;
    margin-bottom: -.12em;
}

.svc-line-in {
    display: inline-block;
}

.svc-head > p {
    max-width: 650px;
    margin-bottom: 0;
    font-size: 18px;
    line-height: 1.7;
    color: rgba(255,255,255,.9);
}

/* Carousel */

.svc-carousel {
    position: relative;
}

.svc-viewport {
    overflow: hidden;
    width: 100%;
    border-radius: 2px;
}

.svc-track {
    --per: 4;
    display: flex;
    align-items: stretch;
    gap: 8px;
    transition: transform .5s ease;
    will-change: transform;
}

/* Cards */

.svc-card {
    position: relative;
    flex: 0 0 calc(
        (100% - (var(--per) - 1) * 8px) / var(--per)
    );
    min-width: 0;
    min-height: 390px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding: 48px 20px 25px;
    background: #00D4A3;
    color: inherit;
    text-align: center;
    text-decoration: none !important;
    overflow: hidden;
    transition: background .3s ease;
}

.svc-card:hover,
.svc-card:focus-visible {
    background: var(--svc-dark);
    color: #fff;
}

.svc-card:focus-visible {
    outline: 2px solid #fff;
    outline-offset: -4px;
}

.svc-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 70px;
    height: 70px;
    margin-bottom: 27px;
    transition: transform .3s ease;
}

.svc-icon img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.svc-card:hover .svc-icon {
    transform: scale(1.12);
}

.svc-card-title {
    width: 100%;
    margin: 0 0 14px !important;
    font-size: 19px;
    font-weight: 600;
    line-height: 1.35;
    color: black;
    text-transform: uppercase;
    overflow-wrap: anywhere;
    transition: color .3s ease;
}

.svc-card:hover .svc-card-title {
    color: #fff;
}

.svc-description {
    display: -webkit-box;
    width: 100%;
    margin: 0 0 14px !important;
    overflow: hidden;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 4;
    font-size: 13px;
    line-height: 1.7;
    color: rgba(255,255,255,.75);
}

.svc-sub-services {
    display: -webkit-box;
    width: 100%;
    margin-bottom: 18px;
    overflow: hidden;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    font-size: 11px;
    line-height: 1.7;
    color: #b8d8cb;
}

.svc-more {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    margin-top: auto;
    padding-top: 18px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    color: #6de0b7;
}

.svc-price {
    font-size: 12px;
    font-weight: 500;
    text-transform: none;
    color: #cfe3da;
}

.svc-card:hover .svc-more,
.svc-card:hover .svc-price {
    color: #fff;
}

/* Arrows */

.svc-arrows {
    position: absolute;
    top: -62px;
    right: 20px;
    z-index: 3;
    display: flex;
    gap: 24px;
}

.svc-arrow {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 36px;
    padding: 5px;
    border: 0;
    background: transparent;
    color: rgba(255,255,255,.75);
    cursor: pointer;
}

.svc-arrow:hover {
    color: #fff;
}

.svc-arrow:focus-visible {
    outline: 2px solid #fff;
}

.svc-arrow:disabled {
    opacity: .35;
    cursor: not-allowed;
}

.svc-arrow svg {
    width: 16px;
    height: 22px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.5;
    stroke-linecap: round;
    stroke-linejoin: round;
}

/* CTA */

.svc-cta {
    max-width: 760px;
    margin: 65px auto 0;
    padding: 35px 25px;
    border: 1px solid rgba(255,255,255,.2);
    background: rgba(2,10,7,.16);
    text-align: center;
}

.svc-cta h2 {
    margin-bottom: 12px !important;
    font-size: clamp(25px, 3vw, 36px);
    font-weight: 700;
    line-height: 1.2;
    color: #fff;
}

.svc-cta p {
    margin-bottom: 0;
    font-size: 15px;
    line-height: 1.7;
    color: rgba(255,255,255,.85);
}

.svc-cta-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    min-height: 50px;
    margin-top: 24px;
    padding: 0 25px;
    background: #fff;
    color: #07523d !important;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none !important;
    transition: transform .3s ease, background .3s ease;
}

.svc-cta-btn:hover {
    transform: translateY(-3px);
    background: #dff9ed;
}

/* Marquee */

.svc-marquee {
    position: absolute;
    right: 0;
    bottom: 10px;
    left: 0;
    z-index: 1;
    overflow: hidden;
    white-space: nowrap;
    pointer-events: none;
}

.svc-marquee span {
    display: inline-block;
    padding-left: 100%;
    animation: svcMarquee 22s linear infinite;
}

.svc-marquee img {
    display: block;
    width: auto;
    max-width: none;
    height: 88px;
}

@keyframes svcMarquee {
    to {
        transform: translateX(-100%);
    }
}

/* Scroll reveal */

.svc.svc-js .svc-eyebrow,
.svc.svc-js [data-reveal="up"] {
    opacity: 0;
    transform: translateY(24px);
    transition: opacity .7s ease, transform .7s ease;
}

.svc.svc-js .svc-eyebrow {
    transform: translateX(-24px);
}

.svc.svc-js .svc-eyebrow.is-in,
.svc.svc-js [data-reveal="up"].is-in {
    opacity: 1;
    transform: none;
}

.svc.svc-js .svc-line-in {
    transform: translateY(110%);
    transition: transform .9s cubic-bezier(.2,.9,.2,1);
}

.svc.svc-js .svc-main-heading.is-in .svc-line-in {
    transform: none;
}

.svc.svc-js .svc-main-heading.is-in .svc-line:nth-child(2) .svc-line-in {
    transition-delay: .15s;
}

/* Responsive */

@media (max-width: 1024px) {
    .svc-track {
        --per: 2;
    }

    .svc-card {
        min-height: 370px;
    }

    .svc-arrows {
        top: -57px;
    }
}

@media (max-width: 640px) {
    .svc {
        padding: 55px 0 175px;
    }

    .svc-wrap {
        padding: 0 16px;
    }

    .svc-head {
        padding: 0 4px;
        margin-bottom: 60px;
    }

    .svc-main-heading {
        font-size: clamp(36px, 10vw, 46px);
    }

    .svc-head > p {
        font-size: 15px;
    }

    .svc-track {
        --per: 1;
    }

    .svc-card {
        min-height: 350px;
        padding: 42px 24px 25px;
    }

    .svc-card-title {
        font-size: 20px;
    }

    .svc-description {
        max-width: 340px;
        font-size: 14px;
    }

    .svc-arrows {
        top: -48px;
        right: 4px;
        gap: 15px;
    }

    .svc-cta {
        margin-top: 55px;
        padding: 28px 18px;
    }

    .svc-marquee img {
        height: 70px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .svc *,
    .svc *::before,
    .svc *::after {
        scroll-behavior: auto !important;
        animation: none !important;
        transition: none !important;
    }

    .svc.svc-js .svc-eyebrow,
    .svc.svc-js [data-reveal="up"],
    .svc.svc-js .svc-line-in {
        opacity: 1 !important;
        transform: none !important;
    }
}
</style>

<script>
(function () {
    const sections = document.querySelectorAll('.svc');

    sections.forEach(function (section) {
        if (section.dataset.svcInitialized === 'true') return;
        section.dataset.svcInitialized = 'true';

        const track = section.querySelector('.svc-track');
        const viewport = section.querySelector('.svc-viewport');
        const prev = section.querySelector('[data-svc-prev]');
        const next = section.querySelector('[data-svc-next]');

        if (!track || !viewport || !prev || !next) return;

        const cards = Array.from(track.children);

        if (!cards.length) {
            prev.hidden = true;
            next.hidden = true;
            return;
        }

        let index = 0;
        let timer = null;
        let resizeTimer = null;

        function perPage() {
            return parseInt(
                getComputedStyle(track).getPropertyValue('--per'),
                10
            ) || 4;
        }

        function maxIndex() {
            return Math.max(0, cards.length - perPage());
        }

        function render() {
            index = Math.max(0, Math.min(index, maxIndex()));

            const cardWidth = cards[0].getBoundingClientRect().width;
            const gap = parseFloat(getComputedStyle(track).gap) || 8;

            track.style.transform =
                'translateX(' + (-index * (cardWidth + gap)) + 'px)';

            prev.disabled = index === 0;
            next.disabled = index === maxIndex();

            if (pagination) {
                pagination.textContent =
                    'Services ' + (index + 1) + '–' +
                    Math.min(index + perPage(), cards.length) +
                    ' of ' + cards.length;
            }

            const canSlide = cards.length > perPage();

            prev.hidden = !canSlide;
            next.hidden = !canSlide;
            if (pagination) pagination.hidden = !canSlide;
        }

        function goTo(newIndex) {
            if (newIndex > maxIndex()) {
                index = 0;
            } else if (newIndex < 0) {
                index = maxIndex();
            } else {
                index = newIndex;
            }

            render();
        }

        function stopAuto() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        function startAuto() {
            stopAuto();

            if (
                window.matchMedia('(prefers-reduced-motion: reduce)').matches ||
                cards.length <= perPage()
            ) {
                return;
            }

            timer = setInterval(function () {
                goTo(index >= maxIndex() ? 0 : index + 1);
            }, 5000);
        }

        next.addEventListener('click', function () {
            goTo(index >= maxIndex() ? 0 : index + 1);
            startAuto();
        });

        prev.addEventListener('click', function () {
            goTo(index <= 0 ? maxIndex() : index - 1);
            startAuto();
        });

        section.addEventListener('mouseenter', stopAuto);
        section.addEventListener('mouseleave', startAuto);

        section.addEventListener('focusin', stopAuto);
        section.addEventListener('focusout', startAuto);

        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function () {
                render();
                startAuto();
            }, 120);
        });

        render();
        startAuto();
    });
})();

(function () {
    const section = document.getElementById('services');

    if (!section) return;

    const reduceMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)'
    ).matches;

    const revealElements = section.querySelectorAll(
        '[data-io], [data-reveal="up"]'
    );

    if (reduceMotion || !('IntersectionObserver' in window)) {
        revealElements.forEach(function (element) {
            element.classList.add('is-in');
        });
        return;
    }

    section.classList.add('svc-js');

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            entry.target.classList.toggle(
                'is-in',
                entry.isIntersecting
            );
        });
    }, {
        threshold: 0.15
    });

    revealElements.forEach(function (element) {
        observer.observe(element);
    });
})();
</script>