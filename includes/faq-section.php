<?php


if (!function_exists('h')) {
    function h($v) { return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8'); }
}

// Contact page ka sahi URL (har page se chalega — "contact-us/index.php" sirf homepage se chalta tha)
$faqContactUrl = function_exists('cvg_url') ? cvg_url('contact-us') : '/contact-us/';

$faqTitle    = "Frequently Asked Questions";
$faqSubtitle = "Answers to common questions about Creative Converge's web design, development, and digital services.";

$faqItems = [
    [
        "question" => "How much does it cost to hire a web design agency in Dallas like Creative Converge?",
        "answer"   => "The budget for a web design agency in Dallas depends on the size, complexity, and functionality of your website. Creative Converge offers affordable website design and development solutions tailored to your business requirements, so you get the latest features without exceeding your budget."
    ],
    [
        "question" => "What makes Creative Converge different from other web design agencies in Dallas, Texas?",
        "answer"   => "Creative Converge builds websites that align with your business goals and brand identity. Rather than treating a website as a standalone project, our team considers your target audience, user experience, visual identity, and business objectives. We help startups and small businesses establish a strong digital presence in a competitive online market."
    ],
    [
        "question" => "Can Creative Converge build a website from scratch instead of using a ready-made template?",
        "answer"   => "Yes. Creative Converge provides custom website design and development for businesses that need unique designs, advanced functionality, and memorable customer experiences. We work with multiple technologies and platforms, including WordPress, Shopify, Laravel, Next.js, WooCommerce, and custom PHP, to deliver websites that combine visual appeal, functionality, and performance."
    ],
    [
        "question" => "Does Creative Converge offer affordable website design services in the USA?",
        "answer"   => "Yes. Creative Converge offers affordable website design packages for businesses across the USA. Our packages provide different options based on website size, features, and functionality. We also offer customized solutions, so startups and small businesses can invest in professional website design without paying for features they don't need."
    ],
    [
        "question" => "Can Creative Converge design and build an online store for my Dallas business?",
        "answer"   => "Yes. Creative Converge provides eCommerce website design and development for businesses looking to launch or improve their online stores. Depending on your project requirements, we work with platforms such as Shopify, WooCommerce, and Magento. Our solutions focus on easy product discovery, convenient navigation, secure checkout, and essential eCommerce functionality."
    ],
    [
        "question" => "How long does it take Creative Converge to design and develop a business website?",
        "answer"   => "The timeline depends on the number of pages, design complexity, required functionality, and project scope. Some of our website packages offer turnaround times of 48 to 72 hours, while larger custom website projects need more development time. Contact our team to discuss your requirements and expected delivery timeline."
    ],
    [
        "question" => "Can one Dallas creative agency handle my logo, business stationery, and brand illustrations?",
        "answer"   => "Yes. Creative Converge offers multiple creative and branding services under one roof, including custom logo design, business stationery, brand illustrations, and graphic design. Working with one creative agency keeps your branding consistent across all your business materials."
    ],
    [
        "question" => "Does Creative Converge offer website maintenance and support after launch?",
        "answer"   => "Yes. Creative Converge provides website maintenance and support to keep your website running smoothly after launch. You can discuss ongoing maintenance, technical updates, performance improvements, security, troubleshooting, and future development with our team."
    ],
    [
        "question" => "How do I find a trustworthy web design agency in Dallas, Texas for my business website?",
        "answer"   => "When choosing a web design agency in Dallas, look at its experience, portfolio, technical expertise, communication, pricing, delivery timelines, and understanding of your business goals. Creative Converge is a Dallas-based digital agency with nearly a decade of experience in website design, development, branding, and other digital solutions. Explore our portfolio and talk to our team about your project."
    ],
    [
        "question" => "Who is Creative Converge, and how can I contact the website design team?",
        "answer"   => "Creative Converge brings together creativity, technology, content, and digital marketing to help businesses build meaningful digital experiences. We go beyond conventional website design by connecting your brand identity with your online presence. Contact our team to discuss your website requirements, maintenance, available packages, or a custom project quote.",
        "linkText" => "Contact Our Team",
        "linkUrl"  => $faqContactUrl
    ]
];

$faqCtaText    = "Have more questions? Our team is ready to help you.";
$faqButtonText = "Get a Free Consultation";
$faqButtonUrl  = $faqContactUrl;

// FAQ Schema (Google rich results)
$faqSchema = [
    "@context"   => "https://schema.org",
    "@type"      => "FAQPage",
    "mainEntity" => array_map(function ($faq) {
        return [
            "@type"          => "Question",
            "name"           => $faq["question"],
            "acceptedAnswer" => ["@type" => "Answer", "text" => $faq["answer"]]
        ];
    }, $faqItems)
];
?>

<?php if (!empty($faqItems)): ?>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<section class="faq cvg-faq" id="faq">
    <div class="faq-inner">

        <div class="faq-eyebrow">FAQ</div>

        <h2><?= h($faqTitle) ?></h2>

        <?php if (!empty($faqSubtitle)): ?>
            <p class="faq-sub"><?= h($faqSubtitle) ?></p>
        <?php endif; ?>

        <?php foreach ($faqItems as $faq): ?>
            <details name="faq">
                <summary>
                    <?= h($faq['question'] ?? '') ?>
                    <span class="icon" aria-hidden="true"></span>
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
                        <p class="faq-link"><a href="<?= h($faq['linkUrl']) ?>"><?= h($faq['linkText']) ?> →</a></p>
                    <?php endif; ?>
                </div>
            </details>
        <?php endforeach; ?>

        <div class="faq-cta">
            <?= h($faqCtaText) ?>
            <br>
            <a class="btn" href="<?= h($faqButtonUrl) ?>"><?= h($faqButtonText) ?></a>
        </div>

    </div>
</section>

<script>
(function () {
    var sec = document.getElementById('faq');
    if (!sec) return;
    var items = sec.querySelectorAll('.faq-eyebrow, h2, .faq-sub, details, .faq-cta');
    items.forEach(function (el, i) {
        el.classList.add('reveal');
        el.style.setProperty('--d', (Math.min(i, 8) * 0.07) + 's');
    });
    sec.classList.add('js');
    if (!('IntersectionObserver' in window)) {
        items.forEach(function (el) { el.classList.add('in'); });
        return;
    }
    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
        });
    }, { threshold: 0.15 });
    items.forEach(function (el) { io.observe(el); });
    // Agar observer na chale to 2.5s baad sab dikha do (content kabhi chhupa na rahe)
    setTimeout(function () { items.forEach(function (el) { el.classList.add('in'); }); }, 2500);
})();
</script>

<script type="application/ld+json">
<?= json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?>
</script>

<style>
/* Creative Converge FAQ — service pages jaisi styling.
   Variables sirf is section par (poori site ke colors nahi badalte) */
.cvg-faq {
    --bg: #0b0d0e;
    --card: #111517;
    --line: #1f2a28;
    --text: #f2f5f4;
    --muted: #9aa7a3;
    --green: #14d4a0;
    --green-deep: #0a7f63;
    interpolate-size: allow-keywords;
    padding: 90px 20px;
    background: var(--bg);
    color: var(--text);
    font-family: Poppins, system-ui, sans-serif;
}
.cvg-faq *, .cvg-faq *::before, .cvg-faq *::after { box-sizing: border-box; }

.cvg-faq .faq-inner { max-width: 860px; margin: 0 auto; }

.cvg-faq .faq-eyebrow {
    display: flex; align-items: center; justify-content: center; gap: 12px;
    color: var(--green); font-size: 13px; letter-spacing: .18em; text-transform: uppercase;
}
.cvg-faq .faq-eyebrow::before { content: ""; width: 34px; height: 2px; background: var(--green); }

.cvg-faq h2 {
    margin: 10px 0 8px; text-align: center;
    font-size: clamp(28px, 4vw, 40px); font-weight: 600; color: var(--text); line-height: 1.2;
}
.cvg-faq .faq-sub {
    text-align: center; color: var(--muted);
    margin: 0 auto 44px; max-width: 560px; font-size: 15px; line-height: 1.6;
}

.cvg-faq details {
    background: var(--card); border: 1px solid var(--line); border-radius: 16px; margin-bottom: 14px;
    transition: border-color .25s, background .25s, transform .25s, box-shadow .25s;
}
.cvg-faq details:hover { transform: translateX(6px); border-color: var(--green-deep); }
.cvg-faq details[open] {
    border-color: var(--green-deep);
    background: linear-gradient(135deg, #0c2a24 0%, #111517 70%);
    animation: cvgFaqGlow 1.2s ease-out;
}

.cvg-faq summary {
    list-style: none; cursor: pointer;
    display: flex; align-items: center; justify-content: space-between; gap: 16px;
    padding: 20px 24px; font-size: 16px; font-weight: 500; line-height: 1.5; color: var(--text);
    transition: color .2s;
}
.cvg-faq summary::-webkit-details-marker { display: none; }
.cvg-faq summary:hover { color: var(--green); }
.cvg-faq summary:focus-visible { outline: 2px solid var(--green); outline-offset: 2px; border-radius: 16px; }

.cvg-faq .icon {
    flex: none; width: 30px; height: 30px; border-radius: 50%;
    border: 1px solid var(--green-deep); position: relative;
    transition: background .25s, transform .4s, border-color .25s;
}
.cvg-faq .icon::before, .cvg-faq .icon::after {
    content: ""; position: absolute; left: 50%; top: 50%;
    width: 12px; height: 2px; background: var(--green);
    transform: translate(-50%, -50%); transition: transform .25s;
}
.cvg-faq .icon::after { transform: translate(-50%, -50%) rotate(90deg); }
.cvg-faq details:hover .icon { background: rgba(20, 212, 160, .12); }
.cvg-faq details[open] .icon { transform: rotate(180deg); background: var(--green-deep); border-color: var(--green); }
.cvg-faq details[open] .icon::after { transform: translate(-50%, -50%) rotate(0); }
.cvg-faq details[open] .icon::before, .cvg-faq details[open] .icon::after { background: #fff; }

.cvg-faq details::details-content {
    block-size: 0; overflow: hidden;
    transition: block-size .4s ease, content-visibility .4s allow-discrete;
}
.cvg-faq details[open]::details-content { block-size: auto; }

.cvg-faq .answer { padding: 0 24px 22px; color: var(--muted); font-size: 14.5px; line-height: 1.75; }
.cvg-faq details[open] .answer { animation: cvgFaqFade .5s ease .08s both; }
.cvg-faq .answer ul { margin: 10px 0 0; padding-left: 20px; }
.cvg-faq .answer li { margin-bottom: 4px; }
.cvg-faq .answer a { color: var(--green); font-weight: 600; text-decoration: none; }
.cvg-faq .answer a:hover { text-decoration: underline; }
.cvg-faq .faq-link { margin: 12px 0 0; }

.cvg-faq .faq-cta { margin-top: 40px; text-align: center; color: var(--muted); font-size: 15px; }
.cvg-faq .faq-cta a.btn {
    position: relative; overflow: hidden; display: inline-block; margin-top: 14px;
    padding: 12px 30px; border: 1px solid var(--green-deep); border-radius: 999px;
    color: var(--text); text-decoration: none; font-weight: 500; background: #06130f;
    transition: background .2s, transform .2s;
}
.cvg-faq .faq-cta a.btn:hover { background: var(--green-deep); transform: translateY(-2px); }
.cvg-faq .faq-cta a.btn::after {
    content: ""; position: absolute; top: 0; left: -70%; width: 50%; height: 100%;
    background: linear-gradient(100deg, transparent, rgba(20, 212, 160, .35), transparent);
    transform: skewX(-20deg); animation: cvgFaqShine 3.2s ease-in-out infinite;
}

/* Scroll reveal */
.cvg-faq.js .reveal { opacity: 0; transform: translateY(28px); }
.cvg-faq.js .reveal.in {
    opacity: 1; transform: none;
    transition: opacity .7s ease, transform .7s cubic-bezier(.2, .7, .2, 1);
    transition-delay: var(--d, 0s);
}
.cvg-faq.js details.reveal.in {
    transition: opacity .7s ease var(--d, 0s), transform .7s cubic-bezier(.2, .7, .2, 1) var(--d, 0s), border-color .25s, background .25s;
}
.cvg-faq.js .faq-eyebrow::before { width: 0; transition: width .8s ease .2s; }
.cvg-faq.js .faq-eyebrow.in::before { width: 34px; }

@keyframes cvgFaqGlow { 0% { box-shadow: 0 0 0 0 rgba(20, 212, 160, .45); } 100% { box-shadow: 0 0 0 14px rgba(20, 212, 160, 0); } }
@keyframes cvgFaqFade { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: none; } }
@keyframes cvgFaqShine { 0%, 55% { left: -70%; } 100% { left: 130%; } }

@media (max-width: 560px) {
    .cvg-faq { padding: 60px 16px; }
    .cvg-faq summary { padding: 16px 18px; font-size: 15px; }
    .cvg-faq .answer { padding: 0 18px 18px; }
    .cvg-faq details:hover { transform: none; }
}

@media (prefers-reduced-motion: reduce) {
    .cvg-faq *, .cvg-faq *::after { animation: none !important; transition: none !important; }
    .cvg-faq.js .reveal { opacity: 1 !important; transform: none !important; }
}
</style>

<?php endif; ?>