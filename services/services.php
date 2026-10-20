<?php
/* =========================================================
   services/services.php — Creative Converge "Our services" page
   Reads every service from services-data.php (titles, descriptions,
   sub-services and plan prices), so new services appear automatically.
   ========================================================= */
require_once dirname(__DIR__) . '/includes/init.php';
require_once __DIR__ . '/services-data.php';

/* ---------- Banner ---------- */
$spHero = [
  'eyebrow' => 'What we do',
  'title'   => 'Our services',
  'lead'    => 'Design, development, branding, video and marketing, delivered by one senior team in Texas. White-label for agencies, or under your own brand.',
];

/* ---------- Icon for each service (by slug). Options:
   logo, web, code, illustration, branding, cart, video, mobile, marketing, combo */
$spIconFor = [
  'logo-design-solutions'       => 'logo',
  'illustration-design'         => 'illustration',
  'web-design-solutions'        => 'web',
  'web-developer-solutions'     => 'code',
  'branding'                    => 'branding',
  'ecommerce-website-solutions' => 'cart',
  'video-animation-services'    => 'video',
  'mobile-apps'                 => 'mobile',
  'digital-marketing'           => 'marketing',
  'advance-combo-packages'      => 'combo',
];

/* ---------- Bottom call-to-action ---------- */
$spCta = [
  'title' => 'Not sure which service <span>you need?</span>',
  'text'  => 'Tell us about your project and we\'ll recommend the right package, with a clear quote, within one business day.',
  'btn'   => 'Get a free consultation',
  'link'  => 'contact-us/index.php',
];

/* ================= Nothing to change below this line ================= */

if (!function_exists('cvg_h')) {
  function cvg_h($value) { return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8'); }
}
$services = is_array($services ?? null) ? $services : [];

$spIcons = [
  'logo'         => '<path d="M12 3l2.5 5 5.5.8-4 3.9.9 5.5L12 15.6 7.1 18.2 8 12.7 4 8.8 9.5 8z"/>',
  'web'          => '<rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 8h18M7 21h10M12 18v3"/>',
  'code'         => '<path d="M16 18l6-6-6-6M8 6l-6 6 6 6M14 4l-4 16"/>',
  'illustration' => '<path d="M3 21l4-1 11-11-3-3L4 17z"/><path d="M14 5l3 3M3 21c5-2 9 1 14-2"/>',
  'branding'     => '<circle cx="12" cy="12" r="9"/><circle cx="8.5" cy="10" r="1.5"/><circle cx="12" cy="7.5" r="1.5"/><circle cx="15.5" cy="10" r="1.5"/><path d="M12 21c-1.5 0-2-1-2-2s1-2 2.5-2H15a3 3 0 003-3"/>',
  'cart'         => '<path d="M3 4h2l2.4 11.2a2 2 0 002 1.6h7.7a2 2 0 002-1.5L21 8H6"/><circle cx="10" cy="20.5" r="1.3"/><circle cx="17" cy="20.5" r="1.3"/>',
  'video'        => '<rect x="3" y="5" width="18" height="14" rx="3"/><path d="M10 9.5v5l4.5-2.5z"/>',
  'mobile'       => '<rect x="6" y="2.5" width="12" height="19" rx="2.5"/><path d="M10.5 18.5h3"/>',
  'marketing'    => '<path d="M3 11v3a1 1 0 001 1h2l5 4V6L6 10H4a1 1 0 00-1 1z"/><path d="M15 9a4 4 0 010 6M18 6a8 8 0 010 12"/>',
  'combo'        => '<path d="M12 3l9 5-9 5-9-5z"/><path d="M3 13l9 5 9-5M3 17.5l9 5 9-5"/>',
];
$spArrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';

/* lowest plan price of a service, for "From $X" */
$spFrom = function ($svc) {
  $min = null;
  foreach (($svc['plans'] ?? []) as $p) {
    $v = isset($p['price']) ? (float) $p['price'] : null;
    if ($v !== null && $v > 0 && ($min === null || $v < $min)) $min = $v;
  }
  return $min;
};
$spDetail = function ($slug) {
  return $slug !== '' ? cvg_url('services/service-detail.php?slug=' . rawurlencode($slug)) : '#';
};
?>
<link rel="stylesheet" href="<?= cvg_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= cvg_url('assets/css/footer.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

<?php include dirname(__DIR__) . '/includes/header.php'; ?>

<main class="cvg-sp" id="cvg-services-page">
  <section class="cvg-sp-hero">
    <div class="cvg-sp-grid-bg" aria-hidden="true"></div>
    <div class="cvg-sp-word" aria-hidden="true">SERVICES</div>
    <div class="cvg-sp-wrap cvg-sp-hero-inner">
      <p class="cvg-sp-eyebrow cvg-sp-reveal"><?= cvg_h($spHero['eyebrow']) ?></p>
      <h1 class="cvg-sp-title cvg-sp-reveal" style="--d:.06s"><?= cvg_h($spHero['title']) ?><span>.</span></h1>
      <p class="cvg-sp-lead cvg-sp-reveal" style="--d:.12s"><?= cvg_h($spHero['lead']) ?></p>
      <div class="cvg-sp-actions cvg-sp-reveal" style="--d:.18s">
        <a class="cvg-sp-btn cvg-sp-btn--mint" href="<?= cvg_url('contact-us/index.php') ?>">Get a free quote <?= $spArrow ?></a>
        <a class="cvg-sp-btn cvg-sp-btn--ghost" href="<?= cvg_url('pricing/index.php') ?>">View pricing</a>
      </div>
    </div>
  </section>

  <!-- ================= 2. ALL SERVICES ================= -->
  <section class="cvg-sp-list" id="services">
    <div class="cvg-sp-wrap">
      <div class="cvg-sp-cards">
        <?php foreach ($services as $i => $svc):
          $title = trim((string) ($svc['title'] ?? 'Service'));
          $slug  = trim((string) ($svc['slug'] ?? ''));
          $desc  = trim((string) ($svc['description'] ?? ''));
          $subs  = is_array($svc['sub_services'] ?? null) ? $svc['sub_services'] : [];
          $from  = $spFrom($svc);
          $icon  = $spIcons[$spIconFor[$slug] ?? 'web'] ?? $spIcons['web'];
          $wide  = count($subs) > 0;
        ?>
          <article class="cvg-sp-card<?= $wide ? ' cvg-sp-card--wide' : '' ?> cvg-sp-reveal" style="--d:<?= min($i % 3, 2) * 0.08 ?>s">
            <a class="cvg-sp-cover" href="<?= cvg_h($spDetail($slug)) ?>" aria-label="<?= cvg_h($title) ?>"></a>
            <div class="cvg-sp-card-top">
              <span class="cvg-sp-ic"><svg viewBox="0 0 24 24" aria-hidden="true"><?= $icon ?></svg></span>
              <span class="cvg-sp-num"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
            </div>
            <h2 class="cvg-sp-card-title"><?= cvg_h($title) ?></h2>
            <?php if ($desc !== ''): ?><p class="cvg-sp-desc"><?= cvg_h($desc) ?></p><?php endif; ?>

            <?php if ($wide): ?>
              <ul class="cvg-sp-subs" aria-label="<?= cvg_h($title) ?> options">
                <?php foreach ($subs as $sub):
                  $st = is_array($sub) ? trim((string) ($sub['title'] ?? '')) : trim((string) $sub);
                  $ss = is_array($sub) ? trim((string) ($sub['slug'] ?? '')) : '';
                  if ($st === '') continue; ?>
                  <li><a href="<?= cvg_h($spDetail($ss)) ?>"><?= cvg_h($st) ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <div class="cvg-sp-card-foot">
              <span class="cvg-sp-more"><i><?= $spArrow ?></i>Read more</span>
              <?php if ($from !== null): ?>
                <span class="cvg-sp-from">From <strong>$<?= cvg_h(number_format($from, $from == floor($from) ? 0 : 2)) ?></strong></span>
              <?php endif; ?>
            </div>
          </article>
        <?php endforeach; ?>

        <!-- last tile: help choosing -->
        <article class="cvg-sp-card cvg-sp-card--help cvg-sp-reveal">
          <a class="cvg-sp-cover" href="<?= cvg_url('contact-us/index.php') ?>" aria-label="Talk to us"></a>
          <div class="cvg-sp-card-top">
            <span class="cvg-sp-ic"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 12a8 8 0 01-11.6 7.1L4 20l1-4.6A8 8 0 1121 12z"/><path d="M9.5 10a2.5 2.5 0 114 2c-.9.6-1.5 1-1.5 2M12 16.5v.01"/></svg></span>
          </div>
          <h2 class="cvg-sp-card-title">Need something custom?</h2>
          <p class="cvg-sp-desc">Mix any services into one plan that fits your goals and budget.</p>
          <div class="cvg-sp-card-foot"><span class="cvg-sp-more"><i><?= $spArrow ?></i>Talk to us</span></div>
        </article>
      </div>
    </div>
  </section>

  <!-- ================= 3. HOW WE WORK ================= -->
  <section class="cvg-sp-steps">
    <div class="cvg-sp-wrap">
      <div class="cvg-sp-head cvg-sp-reveal">
        <p class="cvg-sp-eyebrow">How it works</p>
        <h2 class="cvg-sp-h2">From brief to launch in <span>four steps.</span></h2>
      </div>
      <ol class="cvg-sp-step-list">
        <li class="cvg-sp-reveal"><span>01</span><strong>Discover</strong><p>We learn your goals, audience and brand.</p></li>
        <li class="cvg-sp-reveal" style="--d:.08s"><span>02</span><strong>Design</strong><p>Custom concepts you review and approve.</p></li>
        <li class="cvg-sp-reveal" style="--d:.16s"><span>03</span><strong>Build</strong><p>Responsive, fast and SEO-ready development.</p></li>
        <li class="cvg-sp-reveal" style="--d:.24s"><span>04</span><strong>Launch &amp; grow</strong><p>Deployment, then support whenever you need it.</p></li>
      </ol>
    </div>
  </section>

  <!-- ================= 4. CTA ================= -->
  <section class="cvg-sp-cta">
    <div class="cvg-sp-wrap">
      <div class="cvg-sp-cta-box cvg-sp-reveal">
        <div>
          <h2 class="cvg-sp-h2"><?= strip_tags($spCta['title'], '<span><br>') ?></h2>
          <p><?= cvg_h($spCta['text']) ?></p>
        </div>
        <a class="cvg-sp-btn cvg-sp-btn--mint cvg-sp-btn--lg" href="<?= cvg_url($spCta['link']) ?>"><?= cvg_h($spCta['btn']) ?> <?= $spArrow ?></a>
      </div>
    </div>
  </section>
</main>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>

<style>
html, body { margin: 0; padding: 0; }
body { overflow-x: hidden; background: #0A0A0A; }

.cvg-sp{
  --sp-bg:#0A0A0A; --sp-card:#111614; --sp-line:#1E2A27; --sp-mint:#00D4A3; --sp-mint-l:#5FF0C8; --sp-ink:#04342C;
  --sp-text:#F2F5F4; --sp-text-2:#C9D6D2; --sp-muted:#8FA39E;
  --sp-grad: radial-gradient(70% 90% at 12% 10%, rgba(28,197,169,.45) 0%, rgba(28,197,169,0) 60%), linear-gradient(160deg, rgb(3,134,111) 0%, rgb(0,67,55) 48%, rgb(0,33,27) 100%);
  --sp-ease: cubic-bezier(.2,.9,.2,1);
  display:block; overflow:hidden; background:var(--sp-bg); color:var(--sp-text);
  font-family:'Poppins',sans-serif; font-size:16px; line-height:1.65; -webkit-font-smoothing:antialiased;
}
.cvg-sp *,.cvg-sp *::before,.cvg-sp *::after{box-sizing:border-box}
.cvg-sp p{margin:0}
.cvg-sp a{text-decoration:none;color:inherit}
.cvg-sp .cvg-sp-wrap{position:relative;max-width:1200px;margin:0 auto;padding:0 32px}
.cvg-sp a:focus-visible{outline:2px solid var(--sp-mint-l);outline-offset:3px}

/* shared bits */
.cvg-sp .cvg-sp-eyebrow{display:inline-flex;align-items:center;gap:12px;margin:0 0 16px;font-size:13px;font-weight:500;letter-spacing:.2em;text-transform:uppercase;color:var(--sp-mint-l)}
.cvg-sp .cvg-sp-eyebrow::before{content:"";width:36px;height:2px;background:currentColor}
.cvg-sp .cvg-sp-h2{margin:0;font-family:'Poppins',sans-serif;font-size:clamp(30px,3.8vw,48px);font-weight:700;line-height:1.08;letter-spacing:-.025em;color:var(--sp-text);text-transform:none}
.cvg-sp .cvg-sp-h2 span{color:var(--sp-mint)}
.cvg-sp .cvg-sp-btn{display:inline-flex;align-items:center;gap:10px;height:52px;padding:0 26px;border-radius:999px;font-size:15px;font-weight:600;line-height:1;transition:transform .3s,box-shadow .3s,background .3s,border-color .3s,color .3s}
.cvg-sp .cvg-sp-btn svg{width:17px;height:17px;fill:none;stroke:currentColor;stroke-width:2.4;stroke-linecap:round;transition:transform .3s}
.cvg-sp .cvg-sp-btn:hover svg{transform:translate(3px,-3px)}
.cvg-sp .cvg-sp-btn--mint{background:var(--sp-mint);color:var(--sp-ink)}
.cvg-sp .cvg-sp-btn--mint:hover{color:var(--sp-ink);transform:translateY(-2px);box-shadow:0 0 0 6px rgba(0,212,163,.14),0 18px 40px rgba(0,0,0,.3)}
.cvg-sp .cvg-sp-btn--ghost{border:1px solid rgba(242,245,244,.35);color:var(--sp-text)}
.cvg-sp .cvg-sp-btn--ghost:hover{border-color:var(--sp-mint-l);color:var(--sp-mint-l)}
.cvg-sp .cvg-sp-btn--lg{height:58px;padding:0 30px;font-size:16px}

/* ===== 1. Banner ===== */
.cvg-sp .cvg-sp-hero{position:relative;overflow:hidden;padding:170px 0 110px;background:var(--sp-grad)}
.cvg-sp .cvg-sp-grid-bg{position:absolute;inset:0;pointer-events:none;background-image:linear-gradient(rgba(242,245,244,.06) 1px,transparent 1px),linear-gradient(90deg,rgba(242,245,244,.06) 1px,transparent 1px);background-size:72px 72px;
  -webkit-mask-image:radial-gradient(ellipse 70% 80% at 75% 30%,#000 10%,transparent 72%);mask-image:radial-gradient(ellipse 70% 80% at 75% 30%,#000 10%,transparent 72%);animation:cvgSpGrid 20s linear infinite}
@keyframes cvgSpGrid{to{background-position:72px 72px,72px 72px}}
.cvg-sp .cvg-sp-word{position:absolute;right:-30px;bottom:-30px;font-size:210px;font-weight:700;letter-spacing:-.04em;line-height:1;color:transparent;-webkit-text-stroke:1px rgba(242,245,244,.12);white-space:nowrap;pointer-events:none;user-select:none}
.cvg-sp .cvg-sp-hero-inner{z-index:1}
.cvg-sp .cvg-sp-crumbs{display:flex;gap:10px;margin-bottom:26px;font-size:14px;color:rgba(242,245,244,.7)}
.cvg-sp .cvg-sp-crumbs a:hover,.cvg-sp .cvg-sp-crumbs [aria-current]{color:var(--sp-mint-l)}
.cvg-sp .cvg-sp-title{margin:0;font-family:'Poppins',sans-serif;font-size:clamp(54px,8.4vw,116px);font-weight:700;line-height:.95;letter-spacing:-.045em;color:var(--sp-text);text-transform:none}
.cvg-sp .cvg-sp-title span{color:var(--sp-mint-l)}
.cvg-sp .cvg-sp-lead{max-width:600px;margin-top:24px;font-size:18px;color:#D9F5EE}
.cvg-sp .cvg-sp-actions{display:flex;flex-wrap:wrap;gap:12px;margin-top:34px}
.cvg-sp .cvg-sp-count{margin-top:34px;font-size:14px;color:rgba(242,245,244,.75)}
.cvg-sp .cvg-sp-count strong{font-size:28px;color:var(--sp-mint-l);margin-right:6px}

/* ===== 2. Services grid ===== */
.cvg-sp .cvg-sp-list{padding:110px 0 90px}
.cvg-sp .cvg-sp-cards{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}
.cvg-sp .cvg-sp-card{position:relative;display:flex;flex-direction:column;min-height:330px;padding:30px 30px 26px;border-radius:24px;overflow:hidden;
  background:linear-gradient(160deg,#141B19 0%,#0F1413 100%);border:1px solid var(--sp-line);
  transition:transform .5s var(--sp-ease),background .4s,border-color .4s,box-shadow .5s}
.cvg-sp .cvg-sp-card--wide{grid-column:span 2}
.cvg-sp .cvg-sp-cover{position:absolute;inset:0;z-index:1;border-radius:inherit}
.cvg-sp .cvg-sp-card-top{display:flex;justify-content:space-between;align-items:flex-start}
.cvg-sp .cvg-sp-ic{width:64px;height:64px;border-radius:18px;display:grid;place-items:center;background:rgba(0,212,163,.1);border:1px solid rgba(0,212,163,.3);transition:background .4s,border-color .4s,transform .5s var(--sp-ease)}
.cvg-sp .cvg-sp-ic svg{width:30px;height:30px;fill:none;stroke:var(--sp-mint-l);stroke-width:1.6;stroke-linecap:round;stroke-linejoin:round;transition:stroke .4s}
.cvg-sp .cvg-sp-num{font-size:14px;font-weight:600;color:rgba(242,245,244,.3);transition:color .4s}
.cvg-sp .cvg-sp-card-title{margin:34px 0 10px;font-family:'Poppins',sans-serif;font-size:22px;font-weight:600;line-height:1.25;letter-spacing:-.01em;color:var(--sp-text);text-transform:none}
.cvg-sp .cvg-sp-desc{font-size:14.5px;line-height:1.65;color:var(--sp-muted);display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:3;overflow:hidden}
.cvg-sp .cvg-sp-card--wide .cvg-sp-desc{max-width:640px}
.cvg-sp .cvg-sp-subs{position:relative;z-index:2;display:flex;flex-wrap:wrap;gap:8px;margin:20px 0 0;padding:0;list-style:none}
.cvg-sp .cvg-sp-subs li{margin:0;padding:0}
.cvg-sp .cvg-sp-subs li::before{content:none}
.cvg-sp .cvg-sp-subs a{display:inline-flex;height:32px;align-items:center;padding:0 13px;border-radius:999px;border:1px solid rgba(95,240,200,.22);background:rgba(0,212,163,.06);font-size:12.5px;font-weight:500;color:var(--sp-text-2);transition:background .3s,color .3s,border-color .3s}
.cvg-sp .cvg-sp-subs a:hover{background:var(--sp-mint);border-color:var(--sp-mint);color:var(--sp-ink)}
.cvg-sp .cvg-sp-card-foot{display:flex;align-items:center;justify-content:space-between;gap:12px;margin-top:auto;padding-top:24px}
.cvg-sp .cvg-sp-more{display:inline-flex;align-items:center;gap:10px;font-size:14px;font-weight:600;color:var(--sp-mint-l)}
.cvg-sp .cvg-sp-more i{width:34px;height:34px;border-radius:50%;border:1px solid rgba(95,240,200,.45);display:grid;place-items:center;transition:background .4s,border-color .4s,color .4s,transform .4s}
.cvg-sp .cvg-sp-more svg{width:15px;height:15px;fill:none;stroke:currentColor;stroke-width:2.2;stroke-linecap:round}
.cvg-sp .cvg-sp-from{font-size:13px;color:var(--sp-muted)}
.cvg-sp .cvg-sp-from strong{font-size:18px;color:var(--sp-text);margin-left:3px}

.cvg-sp .cvg-sp-card:hover,.cvg-sp .cvg-sp-card:focus-within{transform:translateY(-8px);border-color:var(--sp-mint);background:#0A0A0A;box-shadow:none}
.cvg-sp .cvg-sp-card:hover .cvg-sp-ic{background:var(--sp-mint);border-color:var(--sp-mint);transform:rotate(-8deg)}
.cvg-sp .cvg-sp-card:hover .cvg-sp-ic svg{stroke:var(--sp-ink)}
.cvg-sp .cvg-sp-card:hover .cvg-sp-num{color:var(--sp-mint)}
.cvg-sp .cvg-sp-card:hover .cvg-sp-more i{background:var(--sp-mint);border-color:var(--sp-mint);color:var(--sp-ink);transform:rotate(45deg)}

/* help tile */
.cvg-sp .cvg-sp-card--help{background:var(--sp-grad);border-color:rgba(95,240,200,.3)}
.cvg-sp .cvg-sp-card--help .cvg-sp-desc{color:#D9F5EE}
.cvg-sp .cvg-sp-card--help .cvg-sp-ic{background:rgba(10,10,10,.35)}

/* ===== 3. Steps ===== */
.cvg-sp .cvg-sp-steps{padding:40px 0 100px}
.cvg-sp .cvg-sp-head{margin-bottom:44px}
.cvg-sp .cvg-sp-step-list{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:22px;margin:0;padding:0;list-style:none;counter-reset:none}
.cvg-sp .cvg-sp-step-list li{position:relative;margin:0;padding:28px 24px 26px;border-top:2px solid var(--sp-line);transition:border-color .4s}
.cvg-sp .cvg-sp-step-list li::before{content:"";position:absolute;left:0;top:-2px;width:0;height:2px;background:var(--sp-mint);transition:width .8s var(--sp-ease)}
.cvg-sp .cvg-sp-step-list li:hover::before{width:100%}
.cvg-sp .cvg-sp-step-list span{display:block;font-size:13px;font-weight:600;color:var(--sp-mint)}
.cvg-sp .cvg-sp-step-list strong{display:block;margin:12px 0 8px;font-size:20px;font-weight:600;color:var(--sp-text)}
.cvg-sp .cvg-sp-step-list p{font-size:14.5px;color:var(--sp-muted)}

/* ===== 4. CTA ===== */
.cvg-sp .cvg-sp-cta{padding:0 0 110px}
.cvg-sp .cvg-sp-cta-box{display:flex;align-items:center;justify-content:space-between;gap:40px;padding:52px 56px;border-radius:30px;background:var(--sp-grad);border:1px solid rgba(95,240,200,.25)}
.cvg-sp .cvg-sp-cta-box .cvg-sp-h2 span{color:var(--sp-mint-l)}
.cvg-sp .cvg-sp-cta-box p{max-width:520px;margin-top:14px;color:#D9F5EE}
.cvg-sp .cvg-sp-cta-box .cvg-sp-btn{flex:none}

/* ===== Scroll reveal ===== */
.cvg-sp.cvg-sp--js .cvg-sp-reveal{opacity:0;transform:translateY(32px);transition:opacity .9s var(--sp-ease) var(--d,0s),transform .9s var(--sp-ease) var(--d,0s),background .4s,border-color .4s,box-shadow .5s}
.cvg-sp.cvg-sp--js .cvg-sp-reveal.cvg-sp-in{opacity:1;transform:none}
.cvg-sp.cvg-sp--js .cvg-sp-card.cvg-sp-in:hover,.cvg-sp.cvg-sp--js .cvg-sp-card.cvg-sp-in:focus-within{transform:translateY(-8px);transition-delay:0s}

/* ===== Responsive ===== */
@media (max-width:1024px){
  .cvg-sp .cvg-sp-cards{grid-template-columns:repeat(2,minmax(0,1fr))}
  .cvg-sp .cvg-sp-step-list{grid-template-columns:repeat(2,minmax(0,1fr))}
  .cvg-sp .cvg-sp-word{font-size:150px}
}
@media (max-width:760px){
  .cvg-sp .cvg-sp-cta-box{flex-direction:column;align-items:flex-start;padding:36px 28px}
}
@media (max-width:600px){
  .cvg-sp .cvg-sp-wrap{padding:0 16px}
  .cvg-sp .cvg-sp-hero{padding:130px 0 80px}
  .cvg-sp .cvg-sp-lead{font-size:16px}
  .cvg-sp .cvg-sp-word{font-size:90px;bottom:-14px}
  .cvg-sp .cvg-sp-list{padding:70px 0 60px}
  .cvg-sp .cvg-sp-cards{grid-template-columns:minmax(0,1fr);gap:16px}
  .cvg-sp .cvg-sp-card--wide{grid-column:auto}
  .cvg-sp .cvg-sp-card{min-height:0;padding:26px 22px 22px}
  .cvg-sp .cvg-sp-step-list{grid-template-columns:minmax(0,1fr)}
  .cvg-sp .cvg-sp-cta{padding-bottom:80px}
}
@media (prefers-reduced-motion:reduce){
  .cvg-sp *,.cvg-sp *::before,.cvg-sp *::after{animation:none!important;transition:none!important}
}
</style>

<script>
(function () {
  var root = document.getElementById('cvg-services-page');
  if (!root) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) return;
  root.classList.add('cvg-sp--js');
  var io = new IntersectionObserver(function (es) {
    es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('cvg-sp-in'); io.unobserve(e.target); } });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
  Array.prototype.forEach.call(root.querySelectorAll('.cvg-sp-reveal'), function (el) { io.observe(el); });
})();
</script>