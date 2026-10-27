<?php
require_once dirname(__DIR__) . '/includes/init.php';
require_once __DIR__ . '/services-data.php';

/* ---------- Banner ---------- */
$spHero = [
  'eyebrow' => 'What we do',
  'title'   => 'Our services',
  'lead'    => 'A brand that stands out. A website that works harder. A digital experience built around your business. We bring the right skills together to help make it happen.',
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


$spCta = [
    'title' => 'Got an idea but not a plan?',
    'text'  => "That's a good place to start. Share what's on your mind, and we'll help you turn the possibilities into a clear direction for your project.",
    'btn'   => 'Get a free consultation',
    'link'  => 'contact-us/index.php',
];



if (!function_exists('cvg_h')) {
  function cvg_h($value)
  {
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
  }
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
<?php
/* Header + mobile viewport fix:
   the viewport tag is added inside <head> if header.php does not already have one.
   (Stylesheets now load AFTER the header, so nothing prints before <!doctype html>.) */
ob_start();
include dirname(__DIR__) . '/includes/header.php';
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
<link rel="stylesheet" href="<?= cvg_url('assets/css/service.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">



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
            <span class="cvg-sp-ic"><svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M21 12a8 8 0 01-11.6 7.1L4 20l1-4.6A8 8 0 1121 12z" />
                <path d="M9.5 10a2.5 2.5 0 114 2c-.9.6-1.5 1-1.5 2M12 16.5v.01" />
              </svg></span>
          </div>
          <h2 class="cvg-sp-card-title">Need something custom?</h2>
          <p class="cvg-sp-desc">Mix any services into one plan that fits your goals and budget.</p>
          <div class="cvg-sp-card-foot"><span class="cvg-sp-more"><i><?= $spArrow ?></i>Talk to us</span></div>
        </article>
      </div>
    </div>
  </section>
  <section class="cvg-sp-steps">
    <div class="cvg-sp-wrap">
      <div class="cvg-sp-head cvg-sp-reveal">
        <p class="cvg-sp-eyebrow">How it works</p>
        <h2 class="cvg-sp-h2">Turn the Thinking Into a <span>Direction.</span></h2>
      </div>
     
<ol class="cvg-sp-step-list">

    <li class="cvg-sp-reveal">
        <span>01</span>
        <strong>Start With the Right Questions.</strong>
        <p>
            Every good solution starts with understanding the problem.
            We get to know your goals, your audience, and what you're
            trying to change.
        </p>
    </li>

    <li class="cvg-sp-reveal" style="--d:.08s">
        <span>02</span>
        <strong>Connect the Dots.</strong>
        <p>
            We turn scattered ideas into a clear direction, finding
            the right mix of creativity, strategy, and technology
            for your project.
        </p>
    </li>

    <li class="cvg-sp-reveal" style="--d:.16s">
        <span>03</span>
        <strong>Make Things Happen.</strong>
        <p>
            Ideas leave the drawing board and take shape. We design,
            build, and refine the details that turn a concept into
            something real.
        </p>
    </li>

    <li class="cvg-sp-reveal" style="--d:.24s">
        <span>04</span>
        <strong>Get It Ready for the World.</strong>
        <p>
            We polish the final details, check that everything works
            as intended, and get your project ready to make its mark.
        </p>
    </li>

</ol>


    </div>
  </section>
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



<script>
  (function() {
    var root = document.getElementById('cvg-services-page');
    if (!root) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches || !('IntersectionObserver' in window)) return;
    root.classList.add('cvg-sp--js');
    var io = new IntersectionObserver(function(es) {
      es.forEach(function(e) {
        if (e.isIntersecting) {
          e.target.classList.add('cvg-sp-in');
          io.unobserve(e.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });
    Array.prototype.forEach.call(root.querySelectorAll('.cvg-sp-reveal'), function(el) {
      io.observe(el);
    });
  })();
</script>
<script src="<?= cvg_url('assets/js/favicon-animate.js') ?>"></script>