<!-- ===== World Section ===== -->
<section class="world-section">

    <!-- Background Image (fixed) -->
    <div class="world-bg" aria-hidden="true"></div>

    <!-- Dark Overlays -->
    <div class="world-overlay world-overlay-black" aria-hidden="true"></div>
    <div class="world-overlay world-overlay-dark" aria-hidden="true"></div>

    <!-- Main Content -->
    <div class="world-container">

        <!-- Left Side Content -->
        <div class="world-left">

            <div class="reveal" data-reveal data-from="0.8" data-delay="100">
                <h2 class="world-heading">
                    Create your own<br />
                    <span class="brand-green">world</span> right now<span class="brand-green">.</span>
                </h2>
            </div>

            <div class="reveal" data-reveal data-from="0.9" data-delay="250">
                <p class="world-desc">
                    In our perspective, we prepare for responsible growth with something
                    that we must always pursue and create a structured developed world
                    to be better.
                </p>
            </div>
        </div>

        <!-- Right Side Accordion -->
        <div class="world-right">
            <div class="reveal" data-reveal data-from="0.9" data-delay="200">
                <div class="accordion" id="worldAccordion">

                    <!-- Item 1 -->
                    <div class="accordion-item">
                        <h3>
                            <button type="button" class="accordion-btn" aria-expanded="false"
                                aria-controls="world-accordion-panel-1" id="world-accordion-button-1">
                                <span class="accordion-title">Analyzing Research</span>
                                <svg class="accordion-icon" aria-hidden="true" viewBox="0 0 16 16" fill="none"
                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                    <path d="M2 8h12" />
                                    <path class="icon-vertical" d="M8 2v12" />
                                </svg>
                            </button>
                        </h3>
                        <div id="world-accordion-panel-1" role="region" aria-labelledby="world-accordion-button-1"
                            class="accordion-panel">
                            <div class="accordion-panel-inner">
                                <p class="accordion-text">
                                    Analyzing research refers to the process of carefully examining and interpreting
                                    the data or information gathered through research to draw meaningful conclusions,
                                    identify patterns, and generate insights.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="accordion-item">
                        <h3>
                            <button type="button" class="accordion-btn" aria-expanded="false"
                                aria-controls="world-accordion-panel-2" id="world-accordion-button-2">
                                <span class="accordion-title">Integrated Learning</span>
                                <svg class="accordion-icon" aria-hidden="true" viewBox="0 0 16 16" fill="none"
                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                    <path d="M2 8h12" />
                                    <path class="icon-vertical" d="M8 2v12" />
                                </svg>
                            </button>
                        </h3>
                        <div id="world-accordion-panel-2" role="region" aria-labelledby="world-accordion-button-2"
                            class="accordion-panel">
                            <div class="accordion-panel-inner">
                                <p class="accordion-text">
                                    Integrated learning refers to an educational approach that connects different
                                    subjects, disciplines, or areas of knowledge to provide a more holistic and
                                    interconnected learning experience.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Item 3 (default open) -->
                    <div class="accordion-item">
                        <h3>
                            <button type="button" class="accordion-btn" aria-expanded="true"
                                aria-controls="world-accordion-panel-3" id="world-accordion-button-3">
                                <span class="accordion-title">Considering Innovation</span>
                                <svg class="accordion-icon" aria-hidden="true" viewBox="0 0 16 16" fill="none"
                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                    <path d="M2 8h12" />
                                    <path class="icon-vertical" d="M8 2v12" />
                                </svg>
                            </button>
                        </h3>
                        <div id="world-accordion-panel-3" role="region" aria-labelledby="world-accordion-button-3"
                            class="accordion-panel open">
                            <div class="accordion-panel-inner">
                                <p class="accordion-text">
                                    Considering innovation refers to the process of evaluating, thinking about,
                                    or exploring new ideas, methods, technologies, or approaches that can lead to
                                    improvements or advancements in a particular area or field.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<style>
    /* ===== Base Reset ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        font-family: 'Poppins', sans-serif;
        background: #000;
        color: #fff;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    button {
        background: none;
        border: none;
        cursor: pointer;
        font-family: inherit;
        color: inherit;
    }

    /* Brand color variable */
    :root {
        --brand-green: #00A8A8;
        --hover-green: #4fc07f;
    }

    .brand-green {
        color: var(--brand-green);
    }

    /* ===== World Section ===== */
    .world-section {
        position: relative;
        isolation: isolate;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 550px;
        width: 100%;
        overflow: hidden;
        background: #000;
        padding: 40px 16px;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    @media (min-width: 640px) {
        .world-section {
            padding: 40px 40px;
        }
    }

    @media (min-width: 1024px) {
        .world-section {
            padding: 32px 90px;
        }
    }

    /* ===== Background Image (fixed / parallax) ===== */
    .world-bg {
        position: absolute;
        inset: 0;
        z-index: -20;
        width: 100%;
        height: 100%;
        background-image: url('https://creativeconverge.com/mockups/creativemock/wp-content/uploads/2024/07/tabs-bg.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    /* ===== Dark Overlays ===== */
    .world-overlay {
        position: absolute;
        inset: 0;
        z-index: -10;
    }

    .world-overlay-black {
        background: rgba(0, 0, 0, 0.7);
    }

    .world-overlay-dark {
        background: rgba(13, 17, 23, 0.65);
    }

    /* ===== Main Container (Grid) ===== */
    .world-container {
        display: grid;
        grid-template-columns: 1fr;
        align-items: center;
        gap: 48px;
        width: 100%;
        max-width: 1720px;
        margin: 0 auto;
    }

    @media (min-width: 1024px) {
        .world-container {
            grid-template-columns: 1fr 1fr;
            gap: 64px;
        }
    }

    /* ===== Left Side ===== */
    .world-left {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .world-heading {
        margin-bottom: 24px;
        font-size: 36px;
        line-height: 1.1;
        letter-spacing: -0.02em;
        font-weight: 600;
    }

    @media (min-width: 640px) {
        .world-heading {
            font-size: 48px;
        }
    }

    @media (min-width: 1024px) {
        .world-heading {
            font-size: 68px;
        }
    }

    .world-desc {
        max-width: 820px;
        font-size: 16px;
        line-height: 1.7;
        color: #d1d5db;
        /* gray-300 */
    }

    @media (min-width: 1024px) {
        .world-desc {
            font-size: 17px;
        }
    }

    /* ===== Right Side ===== */
    .world-right {
        width: 100%;
    }

    /* ===== Accordion ===== */
    .accordion {
        width: 100%;
    }

    .accordion-item {
        padding: 14px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .accordion-item:last-child {
        border-bottom: none;
    }

    /* Button */
    .accordion-btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        width: 100%;
        text-align: left;
        font-size: 18px;
        font-weight: 500;
        color: #fff;
        transition: color 0.2s;
    }

    @media (min-width: 640px) {
        .accordion-btn {
            font-size: 22px;
        }
    }

    .accordion-btn:focus-visible {
        outline: 2px solid rgba(255, 255, 255, 0.6);
        outline-offset: 4px;
    }

    .accordion-title {
        transition: color 0.2s;
    }

    .accordion-btn:hover .accordion-title {
        color: var(--hover-green);
    }

    /* ===== Plus / Minus Icon ===== */
    .accordion-icon {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
        color: #fff;
    }

    /* The vertical line of the "+" */
    .accordion-icon .icon-vertical {
        transform-origin: center;
        transform: scaleY(1);
        transition: transform 0.3s ease;
    }

    /* When open, hide the vertical line → becomes "−" */
    .accordion-btn[aria-expanded="true"] .icon-vertical {
        transform: scaleY(0);
    }

    /* ===== Accordion Panel (smooth open/close) ===== */
    .accordion-panel {
        display: grid;
        grid-template-rows: 0fr;
        padding-top: 0;
        opacity: 0;
        transition: grid-template-rows 400ms ease-in-out,
            opacity 400ms ease-in-out,
            padding-top 400ms ease-in-out;
    }

    .accordion-panel.open {
        grid-template-rows: 1fr;
        padding-top: 12px;
        opacity: 1;
    }

    .accordion-panel-inner {
        overflow: hidden;
    }

    .accordion-text {
        max-width: 720px;
        padding-right: 8px;
        font-size: 14px;
        line-height: 1.7;
        color: #9ca3af;
        /* gray-400 */
    }

    @media (min-width: 1024px) {
        .accordion-text {
            font-size: 16px;
        }
    }

    /* ===== Reveal Animation (scroll-in) ===== */
    .reveal>* {
        opacity: 0;
        transform: scale(0.85);
        transform-origin: center;
        transition: none;
    }

    .reveal.in-view>* {
        opacity: 1;
        transform: scale(1);
        transition: opacity 0.9s ease-out, transform 0.9s cubic-bezier(0.22, 0.61, 0.36, 1);
    }
</style>
<script>
    (function () {
        "use strict";

        // ===== Accordion =====
        const accordionItems = document.querySelectorAll(".accordion-item");

        accordionItems.forEach(function (item) {
            const btn = item.querySelector(".accordion-btn");
            const panel = item.querySelector(".accordion-panel");
            if (!btn || !panel) return;

            btn.addEventListener("click", function () {
                const isOpen = panel.classList.contains("open");

                // Close all panels (only one open at a time)
                accordionItems.forEach(function (otherItem) {
                    const otherBtn = otherItem.querySelector(".accordion-btn");
                    const otherPanel = otherItem.querySelector(".accordion-panel");
                    if (otherBtn && otherPanel) {
                        otherPanel.classList.remove("open");
                        otherBtn.setAttribute("aria-expanded", "false");
                    }
                });

                // If the clicked one was closed, open it
                if (!isOpen) {
                    panel.classList.add("open");
                    btn.setAttribute("aria-expanded", "true");
                }
            });
        });

        // ===== Reveal on scroll =====
        const revealEls = document.querySelectorAll("[data-reveal]");

        if ("IntersectionObserver" in window) {
            const observer = new IntersectionObserver(
                function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            const el = entry.target;
                            const from = parseFloat(el.dataset.from || "0.85");
                            const delay = parseInt(el.dataset.delay || "0", 10);

                            // Apply inline styles for scale-from + delay
                            const inner = el.firstElementChild;
                            if (inner) {
                                inner.style.transitionDelay = delay + "ms";
                                // initial state (already set in CSS, but override scale-from)
                                inner.style.transform = "scale(" + from + ")";
                            }

                            // Force reflow then add in-view class
                            void el.offsetWidth;
                            el.classList.add("in-view");

                            observer.unobserve(el);
                        }
                    });
                },
                { rootMargin: "-50px", threshold: 0 }
            );

            revealEls.forEach(function (el) {
                observer.observe(el);
            });
        } else {
            // Fallback: just show everything
            revealEls.forEach(function (el) {
                el.classList.add("in-view");
            });
        }
    })();
</script>