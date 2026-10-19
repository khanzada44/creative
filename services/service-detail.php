<?php
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
$introImages      = $service['introImages'] ?? [];
$portfolio        = $service['portfolio'] ?? [];
$portfolioLabel   = $service['portfolioLabel'] ?? '';
$plans            = $service['plans'] ?? [];   // ab sirf isi service ke apne plans

$faqTitle      = $service['faqTitle'] ?? 'Frequently Asked Questions';
$faqSubtitle   = $service['faqSubtitle'] ?? '';
$faqItems      = $service['faqItems'] ?? [];
$faqCtaText    = $service['faqCtaText'] ?? 'Still have a question?';
$faqButtonText = $service['faqButtonText'] ?? 'Get a quote';
$faqButtonUrl  = $service['faqButtonUrl'] ?? '/creative/contact-us/index.php';

/* FAQ schema (is service ke FAQs se automatically banta hai) */
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
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <script>document.documentElement.classList.add('js');</script>
    <style>
        .cvg-svc {
            --wcu-grad: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, .45) 0%, transparent 60%), linear-gradient(160deg, #03866f 0%, #004337 48%, #00211b 100%);
            --cvg-bg: #0a0a0a;
            --cvg-bg-2: #0d1211;
            --cvg-line: #22302c;
            --cvg-mint: #00d4a3;
            --cvg-mint-light: #5ff0c8;
            --cvg-ink: #04342c;
            --cvg-text: #f2f5f4;
            --cvg-text-2: #c9d6d2;
            --cvg-muted: #8fa39e;
            position: relative;
            width: 100%;
            overflow: clip;
            background: var(--cvg-bg);
            color: var(--cvg-text);
            font-family: Poppins, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .cvg-svc,
        .cvg-svc *,
        .cvg-svc *::before,
        .cvg-svc *::after { box-sizing: border-box }

        .cvg-svc h1, .cvg-svc h2, .cvg-svc h3, .cvg-svc p, .cvg-svc ul { margin: 0; padding: 0 }
        .cvg-svc ul { list-style: none }

        .cvg-svc-wrap { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 24px }
        .cvg-center { text-align: center; justify-content: center }

        /* ---------- Hero ---------- */
        .cvg-svc-hero { background: var(--wcu-grad); padding: 110px 0 120px; text-align: center }
        .cvg-svc-h1 { font-size: 58px; font-weight: 700; line-height: 1.08; letter-spacing: -.025em; text-transform: uppercase; color: #fff }
        .cvg-svc-sub { margin: 16px auto 0; max-width: 700px; font-size: 18px; line-height: 1.6; color: rgba(255, 255, 255, .88) }

        .cvg-svc-sec { padding: 90px 0 }
        .cvg-svc-sec-alt { background: var(--cvg-bg-2) }

        .cvg-svc-eyebrow {
            display: flex; align-items: center; gap: 12px; margin-bottom: 14px;
            font-size: 13px; font-weight: 500; letter-spacing: .2em; text-transform: uppercase; color: var(--cvg-mint)
        }
        .cvg-svc-hero .cvg-svc-eyebrow { justify-content: center; color: var(--cvg-mint-light) }
        .cvg-svc-eyebrow::before { content: ""; width: 36px; height: 2px; background: currentColor; flex-shrink: 0 }
        .cvg-svc-eyebrow.cvg-center { justify-content: center }

        .cvg-svc-h2 { font-size: 40px; font-weight: 700; line-height: 1.15; letter-spacing: -.02em; color: var(--cvg-text) }
        .cvg-svc-h3 { margin: 28px 0 14px; font-size: 18px; font-weight: 600; color: var(--cvg-text) }
        .cvg-svc-text { margin-top: 18px; font-size: 16px; line-height: 1.75; color: var(--cvg-muted); max-width: 540px }

        /* ---------- Intro ---------- */
        .cvg-svc-intro { display: grid; grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: 60px; align-items: center }
        .cvg-svc-intro.no-media { grid-template-columns: minmax(0, 1fr) }
        .cvg-svc-list { margin-top: 20px !important }
        .cvg-svc-list li { position: relative; padding-left: 28px; margin-bottom: 12px; font-size: 15px; color: var(--cvg-text-2) }
        .cvg-svc-list li::before {
            content: ""; position: absolute; left: 0; top: 7px; width: 10px; height: 10px; border-radius: 50%;
            background: var(--cvg-mint); box-shadow: 0 0 0 4px rgba(0, 212, 163, .15)
        }
        .cvg-svc-intro-media {
            position: relative; display: flex; align-items: center; justify-content: center; gap: 24px;
            min-height: 360px; border-radius: 24px; padding: 32px;
        }
        .cvg-svc-intro-media img { max-width: 48%; max-height: 320px; height: auto; object-fit: contain }
        .cvg-svc-intro-media img:only-child { max-width: 80% }

        /* ---------- Portfolio ---------- */
        .cvg-svc-portfolio { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 20px; margin-top: 48px }
        .cvg-svc-portfolio-tag {
            display: table; margin: 14px auto 0; padding-bottom: 4px;
            border-bottom: 2px solid var(--cvg-mint); color: var(--cvg-mint); font-weight: 500
        }
        .cvg-svc-work {
            position: relative; display: block; width: 100%; aspect-ratio: 4/3; padding: 0;
            border: 2px solid rgba(0, 212, 163, .5); border-radius: 14px; overflow: hidden; cursor: pointer; background: #fff;
            transition: transform .3s, box-shadow .3s, border-color .3s
        }
        .cvg-svc-work img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform .4s }
        .cvg-svc-work-overlay {
            position: absolute; inset: 0; display: flex; align-items: center; justify-content: center;
            background: var(--wcu-grad); opacity: 0; transition: opacity .3s; font-size: 14px; font-weight: 600; color: #fff
        }
        .cvg-svc-work:hover { transform: translateY(-4px); border-color: var(--cvg-mint); box-shadow: 0 18px 48px rgba(0, 212, 163, .25) }
        .cvg-svc-work:hover .cvg-svc-work-overlay { opacity: .88 }
        .cvg-svc-work:hover img { transform: scale(1.05) }

        /* ---------- Lightbox ---------- */
        .cvg-svc-lightbox {
            position: fixed; inset: 0; z-index: 999999; display: flex; align-items: center; justify-content: center;
            padding: 40px 20px; background: rgba(0, 0, 0, .88)
        }
        .cvg-svc-lightbox[hidden] { display: none }
        .cvg-svc-lightbox img { max-width: min(900px, 100%); max-height: 100%; border-radius: 12px; background: #fff }
        .cvg-svc-lightbox-close {
            position: absolute; top: 18px; right: 22px; width: 44px; height: 44px; border: 0; border-radius: 50%;
            background: var(--cvg-mint); color: var(--cvg-ink); font-size: 28px; line-height: 1; cursor: pointer
        }

        /* ---------- Scroll reveal ---------- */
        .js .reveal { opacity: 0; transform: translateY(40px); transition: opacity .8s ease, transform .8s cubic-bezier(.2, .8, .2, 1) }
        .js .reveal.is-visible { opacity: 1; transform: none }

        /* ================= PRICING ================= */
        .pricing-section {
            --p-mint: #00d4a3;
            --p-mint-soft: rgba(0, 212, 163, .15);
            --p-card: #0f1514;
            --p-line: #1e3a33;
            --p-text: #f2f5f4;
            --p-muted: #8fa39e;
            background: #0a0a0a;
            padding: 90px 20px 110px;
        }

        .pricing-head { max-width: 1200px; margin: 0 auto 56px }

        .pricing-container {
            max-width: 1200px; margin: 0 auto; display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 28px; align-items: stretch
        }

        .pricing-card {
            position: relative; display: flex; flex-direction: column;
            padding: 34px 40px 40px; border: 1px solid var(--p-line); border-radius: 28px;
            background: var(--p-card); color: var(--p-text); overflow: hidden;
            transition: transform .4s ease, box-shadow .4s ease, border-color .4s ease
        }

        .js .pricing-container:not(.is-visible) .pricing-card { opacity: 0 }

        .pricing-container.is-visible .pricing-card {
            animation: pCardIn .9s cubic-bezier(.2, .8, .2, 1) backwards, pFloat 6s ease-in-out infinite
        }
        .pricing-container.is-visible .pricing-card:nth-child(1) { animation-delay: 0s, 0s }
        .pricing-container.is-visible .pricing-card:nth-child(2) { animation-delay: .15s, -2s }
        .pricing-container.is-visible .pricing-card:nth-child(3) { animation-delay: .3s, -4s }

        .pricing-card:hover { transform: translateY(-10px); border-color: var(--p-mint); }

        .pricing-card.featured-card {
            background:
                radial-gradient(80% 60% at 15% 0%, rgba(28, 197, 169, .45) 0%, transparent 60%),
                linear-gradient(165deg, #0fa07f 0%, #006b55 30%, #004337 65%, #00211b 100%);
            border-color: rgba(95, 240, 200, .5);
            box-shadow: 0 25px 70px rgba(0, 212, 163, .18)
        }
        .pricing-card.featured-card:hover { box-shadow: 0 30px 80px rgba(0, 212, 163, .35) }

        .badge-popular {
            position: absolute; top: 28px; right: 28px; padding: 7px 14px; border-radius: 999px;
            background: #050807; color: var(--p-mint); font-size: 13px; font-weight: 600; line-height: 1; white-space: nowrap;
            animation: pBadgePulse 2.4s ease-in-out infinite
        }

        .pricing-card .card-title { font-size: 21px; font-weight: 600; color: var(--p-text); text-align: left; margin-bottom: 18px; padding-right: 120px }

        .pricing-card .price-tag { display: flex; align-items: flex-start; gap: 4px; line-height: 1; margin-bottom: 18px }
        .pricing-card .currency { margin-top: 14px; font-size: 30px; font-weight: 700; color: var(--p-mint) }
        .pricing-card .amount { font-size: 84px; font-weight: 700; letter-spacing: -.04em; color: #fff; transition: transform .4s ease }
        .pricing-card:hover .amount { transform: scale(1.04) }
        .pricing-card .decimals { margin-top: 30px; font-size: 26px; font-weight: 600; color: #fff }

        .pricing-card .package-includes { font-size: 16px; color: var(--p-muted); margin-bottom: 18px }
        .pricing-card.featured-card .package-includes { color: rgba(255, 255, 255, .8) }

        /* scrollable feature list */
        .pricing-card .feature-list {
            list-style: none; flex: 1; height: 285px; max-height: 285px; overflow-y: auto;
            padding-right: 10px; margin-bottom: 28px; scrollbar-width: thin; scrollbar-color: var(--p-mint) transparent
        }
        .pricing-card .feature-list::-webkit-scrollbar { width: 5px }
        .pricing-card .feature-list::-webkit-scrollbar-track { background: transparent }
        .pricing-card .feature-list::-webkit-scrollbar-thumb { background: var(--p-mint); border-radius: 10px }

        .pricing-card .feature-list li {
            display: flex; align-items: center; gap: 14px; padding: 0; margin-bottom: 15px;
            font-size: 16px; line-height: 1.4; color: #dbe5e2
        }
        .pricing-card .feature-list li::before { display: none }
        .js .pricing-card .feature-list li { opacity: 0 }
        .pricing-container.is-visible .feature-list li { animation: pItemIn .5s ease forwards }
        .pricing-container.is-visible .feature-list li:nth-child(1) { animation-delay: .35s }
        .pricing-container.is-visible .feature-list li:nth-child(2) { animation-delay: .42s }
        .pricing-container.is-visible .feature-list li:nth-child(3) { animation-delay: .49s }
        .pricing-container.is-visible .feature-list li:nth-child(4) { animation-delay: .56s }
        .pricing-container.is-visible .feature-list li:nth-child(5) { animation-delay: .63s }
        .pricing-container.is-visible .feature-list li:nth-child(6) { animation-delay: .70s }
        .pricing-container.is-visible .feature-list li:nth-child(n+7) { animation-delay: .75s }

        .pricing-card .check-icon {
            flex-shrink: 0; display: inline-flex; align-items: center; justify-content: center;
            width: 26px; height: 26px; border-radius: 50%; background: var(--p-mint-soft); color: var(--p-mint);
            font-size: 12px; font-weight: 700; transition: transform .3s ease, background .3s ease, color .3s ease
        }
        .pricing-card .feature-list li:hover .check-icon { transform: scale(1.2) rotate(360deg); background: var(--p-mint); color: #04342c }
        .pricing-card.featured-card .check-icon { background: rgba(0, 0, 0, .35) }

        .pricing-card .btn-buy {
            position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;
            width: 100%; min-height: 66px; border: 1px solid var(--p-line); border-radius: 999px;
            background: #0a0f0e; color: #fff; font-size: 17px; font-weight: 600; text-decoration: none;
            transition: background .3s ease, color .3s ease, border-color .3s ease, box-shadow .3s ease, transform .3s ease
        }
        .pricing-card .btn-buy.featured-btn { background: #050807; border-color: #050807 }
        .pricing-card .btn-buy::after {
            content: ""; position: absolute; top: 0; left: -75%; width: 50%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, .35), transparent); transform: skewX(-20deg)
        }
        .pricing-card .btn-buy:hover::after { animation: pShine .8s ease }
        .pricing-card .btn-buy:hover {
            background: var(--p-mint); border-color: var(--p-mint); color: #04342c;
            box-shadow: 0 0 0 7px rgba(0, 212, 163, .15); transform: scale(1.02)
        }
        .pricing-card .btn-buy:active { transform: scale(.98) }
        .pricing-card .btn-buy:focus-visible { outline: 2px solid var(--cvg-mint-light); outline-offset: 3px }

        @keyframes pCardIn { from { opacity: 0; transform: translateY(50px) scale(.95) } to { opacity: 1; transform: translateY(0) scale(1) } }
        @keyframes pFloat { 0%, 100% { translate: 0 0 } 50% { translate: 0 -14px } }
        @keyframes pItemIn { from { opacity: 0; transform: translateX(-14px) } to { opacity: 1; transform: translateX(0) } }
        @keyframes pBadgePulse { 0%, 100% { box-shadow: 0 0 0 0 rgba(0, 212, 163, .5) } 50% { box-shadow: 0 0 0 8px rgba(0, 212, 163, 0) } }
        @keyframes pShine { from { left: -75% } to { left: 130% } }

        /* ---------- Responsive ---------- */
        @media (max-width: 1100px) {
            .pricing-card { padding: 30px 28px 34px }
            .pricing-card .amount { font-size: 68px }
            .pricing-card .card-title { padding-right: 100px; font-size: 19px }
        }

        @media (max-width: 1024px) {
            .cvg-svc-h1 { font-size: 44px }
            .cvg-svc-h2 { font-size: 34px }
            .cvg-svc-portfolio { grid-template-columns: repeat(3, minmax(0, 1fr)) }
            .cvg-svc-intro { gap: 36px }
        }

        @media (max-width: 900px) {
            .pricing-container { grid-template-columns: minmax(0, 1fr); max-width: 480px }
            .pricing-container.is-visible .pricing-card { animation: pCardIn .9s cubic-bezier(.2, .8, .2, 1) backwards }
        }

        @media (max-width: 767px) {
            .cvg-svc-hero { padding: 80px 0 90px }
            .cvg-svc-h1 { font-size: 34px }
            .cvg-svc-h2 { font-size: 28px }
            .cvg-svc-sub { font-size: 16px }
            .cvg-svc-sec { padding: 60px 0 }
            .cvg-svc-intro { grid-template-columns: minmax(0, 1fr) }
            .cvg-svc-intro-media { min-height: 280px }
            .cvg-svc-portfolio { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px }
            .pricing-section { padding: 60px 16px 80px }
        }

        @media (prefers-reduced-motion: reduce) {
            .cvg-svc *, .cvg-svc *::before, .cvg-svc *::after { animation: none !important; transition: none !important }
            .js .reveal, .js .pricing-card, .js .pricing-card .feature-list li { opacity: 1 !important; transform: none !important }
        }
    </style>
</head>

<body>
    <?php include __DIR__ . '../../includes/header.php'; ?>

    <div class="cvg-svc" id="cvg-svc">

        <!-- ============ HERO ============ -->
        <section class="cvg-svc-hero">
            <div class="cvg-svc-wrap">
                <p class="cvg-svc-eyebrow">Our Services</p>
                <h1 class="cvg-svc-h1"><?= h($title) ?></h1>
                <p class="cvg-svc-sub"><?= h($subtitle) ?></p>
            </div>
        </section>

        <!-- ============ INTRO ============ -->
        <section class="cvg-svc-sec">
            <div class="cvg-svc-wrap">
                <div class="cvg-svc-intro reveal <?= empty($introImages) ? 'no-media' : '' ?>">
                    <div>
                        <p class="cvg-svc-eyebrow">Introduction</p>
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
                        <div class="cvg-svc-intro-media">
                            <?php foreach ($introImages as $i => $img): ?>
                                <img src="<?= h($img) ?>" alt="<?= h($title) ?> <?= (int) $i + 1 ?>" loading="lazy">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- ============ PORTFOLIO ============ -->
        <?php if (!empty($portfolio)): ?>
            <section class="cvg-svc-sec cvg-svc-sec-alt" id="svc-portfolio-sec">
                <div class="cvg-svc-wrap">
                    <div class="reveal">
                        <p class="cvg-svc-eyebrow cvg-center">Our Work</p>
                        <h2 class="cvg-svc-h2 cvg-center">Our Portfolio</h2>
                        <?php if ($portfolioLabel !== ''): ?>
                            <span class="cvg-svc-portfolio-tag"><?= h($portfolioLabel) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="cvg-svc-portfolio">
                        <?php foreach ($portfolio as $index => $image): ?>
                            <button type="button" class="cvg-svc-work reveal" style="transition-delay: <?= min($index, 7) * 70 ?>ms"
                                data-src="<?= h($image) ?>" aria-label="View portfolio image <?= (int) $index + 1 ?>">
                                <img src="<?= h($image) ?>" alt="<?= h($title) ?> portfolio <?= (int) $index + 1 ?>" loading="lazy">
                                <span class="cvg-svc-work-overlay">View Larger</span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <!-- ============ PRICING (service-specific plans) ============ -->
        <?php if (!empty($plans)): ?>
            <section class="pricing-section" id="svc-pricing-sec">
                <div class="pricing-head reveal">
                    <p class="cvg-svc-eyebrow cvg-center">Packages</p>
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

                            <a href="<?= h($plan['link'] ?? '/contact-us/') ?>"
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

<?php if (!empty($faqItems)): ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#0b0d0e; --card:#111517; --line:#1f2a28; --text:#f2f5f4; --muted:#9aa7a3;
    --green:#14d4a0; --green-deep:#0a7f63;
  }
  *{box-sizing:border-box}
  body{margin:0;background:var(--bg);color:var(--text);font-family:Poppins,system-ui,sans-serif}

  /* ===== FAQ SECTION ===== */
  .faq{padding:90px 20px;background:var(--bg)}
  .faq-inner{max-width:860px;margin:0 auto}
  .faq-eyebrow{display:flex;align-items:center;justify-content:center;gap:12px;color:var(--green);font-size:13px;letter-spacing:.18em;text-transform:uppercase}
  .faq-eyebrow::before{content:"";width:34px;height:2px;background:var(--green)}
  .faq h2{margin:10px 0 8px;text-align:center;font-size:clamp(28px,4vw,40px);font-weight:600}
  .faq-sub{text-align:center;color:var(--muted);margin:0 auto 44px;max-width:520px;font-size:15px;line-height:1.6}

  .faq details{background:var(--card);border:1px solid var(--line);border-radius:16px;margin-bottom:14px;transition:border-color .2s, background .2s}
  .faq details[open]{border-color:var(--green-deep);background:linear-gradient(135deg,#0c2a24 0%,#111517 70%)}
  .faq summary{list-style:none;cursor:pointer;display:flex;align-items:center;justify-content:space-between;gap:16px;padding:20px 24px;font-size:16px;font-weight:500}
  .faq summary::-webkit-details-marker{display:none}
  .faq summary:focus-visible{outline:2px solid var(--green);outline-offset:2px;border-radius:16px}
  .faq .icon{flex:none;width:30px;height:30px;border-radius:50%;border:1px solid var(--green-deep);position:relative}
  .faq .icon::before,.faq .icon::after{content:"";position:absolute;left:50%;top:50%;width:12px;height:2px;background:var(--green);transform:translate(-50%,-50%);transition:transform .25s}
  .faq .icon::after{transform:translate(-50%,-50%) rotate(90deg)}
  .faq details[open] .icon::after{transform:translate(-50%,-50%) rotate(0)}
  .faq .answer{padding:0 24px 22px;color:var(--muted);font-size:14.5px;line-height:1.75}
  .faq .answer ul{margin:10px 0 0;padding-left:20px}
  .faq .answer li{margin-bottom:4px}
  .faq .answer a{color:var(--green)}

  .faq-cta{margin-top:40px;text-align:center;color:var(--muted);font-size:15px}
  .faq-cta a.btn{display:inline-block;margin-top:14px;padding:12px 30px;border:1px solid var(--green-deep);border-radius:999px;color:var(--text);text-decoration:none;font-weight:500;background:#06130f;transition:background .2s}
  .faq-cta a.btn:hover{background:var(--green-deep)}
  @media (max-width:560px){.faq{padding:60px 16px}.faq summary{padding:16px 18px;font-size:15px}.faq .answer{padding:0 18px 18px}}
  @media (prefers-reduced-motion:reduce){.faq *{transition:none!important}}

  /* ===== Animations ===== */
  :root{interpolate-size:allow-keywords}

  .faq details::details-content{block-size:0;overflow:hidden;transition:block-size .4s ease, content-visibility .4s allow-discrete}
  .faq details[open]::details-content{block-size:auto}
  .faq details[open] .answer{animation:faqFade .5s ease .08s both}
  @keyframes faqFade{from{opacity:0;transform:translateY(-8px)}to{opacity:1;transform:none}}

  .faq details{transition:border-color .25s, background .25s, transform .25s, box-shadow .25s}
  .faq details:hover{transform:translateX(6px);border-color:var(--green-deep)}
  .faq summary{transition:color .2s}
  .faq summary:hover{color:var(--green)}
  .faq .icon{transition:background .25s, transform .4s, border-color .25s}
  .faq details:hover .icon{background:rgba(20,212,160,.12)}
  .faq details[open] .icon{transform:rotate(180deg);background:var(--green-deep);border-color:var(--green)}
  .faq details[open] .icon::before,.faq details[open] .icon::after{background:#fff}

  .faq details[open]{animation:faqGlow 1.2s ease-out}
  @keyframes faqGlow{0%{box-shadow:0 0 0 0 rgba(20,212,160,.45)}100%{box-shadow:0 0 0 14px rgba(20,212,160,0)}}

  .faq.js .reveal{opacity:0;transform:translateY(28px)}
  .faq.js .reveal.in{opacity:1;transform:none;transition:opacity .7s ease, transform .7s cubic-bezier(.2,.7,.2,1);transition-delay:var(--d,0s)}
  .faq.js details.reveal.in{transition:opacity .7s ease var(--d,0s), transform .7s cubic-bezier(.2,.7,.2,1) var(--d,0s), border-color .25s, background .25s}
  .faq.js .faq-eyebrow::before{width:0;transition:width .8s ease .2s}
  .faq.js .faq-eyebrow.in::before{width:34px}

  .faq-cta a.btn{position:relative;overflow:hidden}
  .faq-cta a.btn::after{content:"";position:absolute;top:0;left:-70%;width:50%;height:100%;background:linear-gradient(100deg,transparent,rgba(20,212,160,.35),transparent);transform:skewX(-20deg);animation:faqShine 3.2s ease-in-out infinite}
  @keyframes faqShine{0%,55%{left:-70%}100%{left:130%}}
  .faq-cta a.btn:hover{transform:translateY(-2px)}
  @media (prefers-reduced-motion:reduce){.faq *,.faq *::after{animation:none!important;transition:none!important}.faq.js .reveal{opacity:1!important;transform:none!important}}
  /* ===== END FAQ SECTION ===== */
</style>

<section class="faq" id="faq">
    <div class="faq-inner">

        <div class="faq-eyebrow">FAQ</div>

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
(function(){
  var sec=document.getElementById('faq'); if(!sec) return;
  var items=sec.querySelectorAll('.faq-eyebrow, h2, .faq-sub, details, .faq-cta');
  items.forEach(function(el,i){el.classList.add('reveal'); el.style.setProperty('--d',(i*0.07)+'s');});
  sec.classList.add('js');
  if(!('IntersectionObserver' in window)){items.forEach(function(el){el.classList.add('in')});return;}
  var io=new IntersectionObserver(function(es){
    es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target);} });
  },{threshold:.15});
  items.forEach(function(el){io.observe(el)});
})();
</script>
<script type="application/ld+json">
<?= json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?>
</script>
<?php endif; ?>

    <?php include __DIR__ . '../../includes/footer.php'; ?>

    <script>
        (function () {
            var root = document.getElementById('cvg-svc');
            if (!root) return;

            /* ---- Lightbox ---- */
            var lightbox = root.querySelector('#svc-lightbox');
            var preview = lightbox.querySelector('img');

            function closeBox() { lightbox.hidden = true; preview.src = ''; }

            root.addEventListener('click', function (event) {
                var work = event.target.closest('.cvg-svc-work');
                if (work && root.contains(work)) {
                    preview.src = work.getAttribute('data-src');
                    lightbox.hidden = false;
                    return;
                }
                if (event.target === lightbox || event.target.closest('.cvg-svc-lightbox-close')) closeBox();
            });

            document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeBox(); });

            /* ---- Scroll reveal (sections + pricing cards) ---- */
            var targets = root.querySelectorAll('.reveal, #pricing-container');

            if (!('IntersectionObserver' in window)) {
                targets.forEach(function (el) { el.classList.add('is-visible'); });
                return;
            }

            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            targets.forEach(function (el) { io.observe(el); });
        })();
    </script>
</body>

</html>