<?php

$contact = [
  'email'      => 'info@creativeconverge.com',
  'phone'      => '(855) 677-4898',
  'phone_link' => '+19496205684',
  'address'    => 'USA: 1910 Pacific Ave Suite 2000 #2372, Dallas, TX 75201',
  'hours'      => 'Mon – Fri: 9 am – 6 pm',
  'hours_note' => 'Sat & Sun: closed',
];

$contactSendTo = $contact['email'];

$contactShowMap = true;

/* ---------- Banner ---------- */
$contactHero = [
  'eyebrow' => 'Get in touch',
  'title'   => 'Contact us',
  'lead'    => 'Tell us about your project. We reply within one business day with a clear plan and a quote.',
];

/* ---------- Images (uploads folder, assets folder or full URL) ---------- */
$contactImages = [
  'rocket'       => '2024/08/rocket-no-bg.png',
  'photo'        => '2024/08/contact-page.png',
  'illustration' => '2024/08/contact-page-Illustration-Art.png',
];

/* ---------- "Create your own world" accordion ---------- */
$contactFaq = [
  ['Analyzing Research', 'Analyzing research refers to the process of carefully examining and interpreting the data or information gathered through research to draw meaningful conclusions, identify patterns, and generate insights.'],
  ['Integrated Learning', 'Integrated learning refers to an approach that connects different subjects, disciplines, or areas of knowledge to provide a more holistic and interconnected experience.'],
  ['Considering Innovation', 'Considering innovation refers to the process of evaluating and exploring new ideas, methods, technologies, or approaches that can lead to improvements in a particular area or field.'],
];

/* ---------- Newsletter form action (e.g. your Mailchimp/Formspree URL; '#' = off) ---------- */
$newsletterAction = '#';

/* ---------- URLs ---------- */
require_once dirname(__DIR__) . '/includes/init.php';
$uploads = $uploads ?? 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/';
$siteUrl = cvg_url('');

/* ================= Nothing to change below this line ================= */

$cvgRoot = dirname(__DIR__);
if (!is_dir($cvgRoot . '/assets')) $cvgRoot = __DIR__;
if (!function_exists('cvg_e')) {
  function cvg_e($s)
  {
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
  }
}
if (!function_exists('cvg_img_url')) {
  function cvg_img_url($path, $uploads, $siteUrl)
  {
    $path = trim(str_replace('\\', '/', $path));
    if (preg_match('~^(https?:)?//~i', $path)) return $path;
    if (preg_match('~^/?assets/~i', $path)) return cvg_url($path);
    return rtrim($uploads, '/') . '/' . ltrim($path, '/');
  }
}
$img = [];
foreach ($contactImages as $k => $p) $img[$k] = cvg_img_url($p, $uploads, $siteUrl);

/* ---------- Contact form handling (PHP mail) ---------- */
$cf = ['name' => '', 'phone' => '', 'email' => '', 'subject' => '', 'message' => ''];
$cfErrors = [];
$cfStatus = '';   /* '', 'sent', 'failed' */
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['cvg_contact_form'])) {
  foreach ($cf as $k => $v) $cf[$k] = trim((string) ($_POST[$k] ?? ''));
  $honeypot = trim((string) ($_POST['website'] ?? ''));   /* bots fill this hidden field */
  if ($cf['name'] === '')    $cfErrors['name']    = 'Enter your name';
  if (!filter_var($cf['email'], FILTER_VALIDATE_EMAIL)) $cfErrors['email'] = 'Enter a valid email address';
  if ($cf['message'] === '') $cfErrors['message'] = 'Tell us a little about your project';
  if (!$cfErrors && $honeypot === '') {
    $clean = function ($s) {
      return str_replace(["\r", "\n"], ' ', $s);
    };
    $subject = 'Website enquiry: ' . ($cf['subject'] !== '' ? $clean($cf['subject']) : 'New message');
    $body = "Name: {$cf['name']}\nEmail: {$cf['email']}\nPhone: {$cf['phone']}\nSubject: {$cf['subject']}\n\nMessage:\n{$cf['message']}\n";
    $headers = "From: Website <no-reply@" . preg_replace('~^www\.~', '', $_SERVER['HTTP_HOST'] ?? 'localhost') . ">\r\n"
      . "Reply-To: " . $clean($cf['name']) . " <" . $clean($cf['email']) . ">\r\n"
      . "Content-Type: text/plain; charset=UTF-8\r\n";
    $cfStatus = @mail($contactSendTo, $subject, $body, $headers) ? 'sent' : 'failed';
    if ($cfStatus === 'sent') $cf = array_map(function () {
      return '';
    }, $cf);
  } elseif (!$cfErrors) {
    $cfStatus = 'sent';   /* silently "accept" bot submissions */
  }
}
$mapSrc = 'https://www.google.com/maps?q=' . rawurlencode($contact['address']) . '&output=embed';
$mapLink = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($contact['address']);
$cvgArrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<link rel="stylesheet" href="<?= cvg_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= cvg_url('assets/css/footer.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

<main class="cvg-ct" id="cvg-contact-page">

  <!-- ================= 1. BANNER ================= -->
  <section class="cvg-ct-hero">
    <div class="cvg-ct-hero-grid" aria-hidden="true"></div>
    <div class="cvg-ct-wrap cvg-ct-hero-inner">
      <div>
        <p class="cvg-ct-eyebrow cvg-ct-light"><?= cvg_e($contactHero['eyebrow']) ?></p>
        <h1 class="cvg-ct-hero-title"><?= cvg_e($contactHero['title']) ?><span>.</span></h1>
        <p class="cvg-ct-hero-lead"><?= cvg_e($contactHero['lead']) ?></p>
        <div class="cvg-ct-hero-quick">
          <a href="mailto:<?= cvg_e($contact['email']) ?>"><?= cvg_e($contact['email']) ?></a>
          <a href="tel:<?= cvg_e($contact['phone_link']) ?>"><?= cvg_e($contact['phone']) ?></a>
        </div>
      </div>
      <img src="../assets/img/hero-3d.png" alt="" class="cvg-ct-rocket" aria-hidden="true">
    </div>
  </section>

  <!-- ================= 2. FREE CONSULTATION + FORM ================= -->
  <section class="cvg-ct-form-sec" id="cvg-ct-form">
    <svg class="cvg-ct-waves" viewBox="0 0 1440 320" preserveAspectRatio="none" aria-hidden="true">
      <path d="M0 210 C 240 120, 420 300, 720 200 S 1200 90, 1440 180" />
      <path d="M0 230 C 260 150, 440 310, 740 220 S 1220 120, 1440 205" />
      <path d="M0 250 C 280 180, 460 320, 760 240 S 1240 150, 1440 230" />
      <path d="M0 270 C 300 210, 480 330, 780 260 S 1260 180, 1440 255" />
      <path d="M0 290 C 320 240, 500 340, 800 280 S 1280 210, 1440 280" />
    </svg>
    <div class="cvg-ct-wrap cvg-ct-form-grid">
      <div class="cvg-ct-form-text cvg-ct-reveal">
        <p class="cvg-ct-eyebrow">Lets Get Started</p>
        <h2 class="cvg-ct-h2">Get a Free<br>Consultation<span class="cvg-ct-mint">.</span></h2>
        <p class="cvg-ct-lead">We always try to implement our creative ideas at the highest level. Tell us about your project and we will make it work.</p>
      </div>

      <div class="cvg-ct-photo cvg-ct-reveal" style="--d:.08s">
        <img src="../assets/img/conbg.png" alt="Creative Converge support specialist with a headset" loading="lazy">
      </div>

      <form class="cvg-ct-form cvg-ct-reveal" method="post" action="#cvg-ct-form" novalidate style="--d:.16s">
        <input type="hidden" name="cvg_contact_form" value="1">
        <div class="cvg-ct-hp" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

        <?php if ($cfStatus === 'sent'): ?>
          <p class="cvg-ct-alert cvg-ct-alert--ok" role="status">Thank you! Your message has been sent. We'll reply within one business day.</p>
        <?php elseif ($cfStatus === 'failed'): ?>
          <p class="cvg-ct-alert cvg-ct-alert--err" role="alert">Sorry, your message couldn't be sent right now. Please email us at <a href="mailto:<?= cvg_e($contact['email']) ?>"><?= cvg_e($contact['email']) ?></a>.</p>
        <?php endif; ?>

        <div class="cvg-ct-field<?= isset($cfErrors['name']) ? ' cvg-ct-field--err' : '' ?>">
          <input id="cvg-ct-name" name="name" type="text" placeholder=" " required autocomplete="name" value="<?= cvg_e($cf['name']) ?>">
          <label for="cvg-ct-name">Name</label><i aria-hidden="true"></i>
          <small class="cvg-ct-err"><?= cvg_e($cfErrors['name'] ?? 'Enter your name') ?></small>
        </div>
        <div class="cvg-ct-field">
          <input id="cvg-ct-phone" name="phone" type="tel" placeholder=" " autocomplete="tel" value="<?= cvg_e($cf['phone']) ?>">
          <label for="cvg-ct-phone">Phone</label><i aria-hidden="true"></i>
        </div>
        <div class="cvg-ct-field<?= isset($cfErrors['email']) ? ' cvg-ct-field--err' : '' ?>">
          <input id="cvg-ct-email" name="email" type="email" placeholder=" " required autocomplete="email" value="<?= cvg_e($cf['email']) ?>">
          <label for="cvg-ct-email">Email</label><i aria-hidden="true"></i>
          <small class="cvg-ct-err"><?= cvg_e($cfErrors['email'] ?? 'Enter a valid email address') ?></small>
        </div>
        <div class="cvg-ct-field">
          <textarea id="cvg-ct-subject" name="subject" rows="1" placeholder=" "><?= cvg_e($cf['subject']) ?></textarea>
          <label for="cvg-ct-subject">Subject</label><i aria-hidden="true"></i>
        </div>
        <div class="cvg-ct-field<?= isset($cfErrors['message']) ? ' cvg-ct-field--err' : '' ?>">
          <textarea id="cvg-ct-message" name="message" rows="3" placeholder=" " required><?= cvg_e($cf['message']) ?></textarea>
          <label for="cvg-ct-message">Message</label><i aria-hidden="true"></i>
          <small class="cvg-ct-err"><?= cvg_e($cfErrors['message'] ?? 'Tell us a little about your project') ?></small>
        </div>
        <button type="submit" class="cvg-ct-send">Send Message <?= $cvgArrow ?></button>
      </form>
    </div>
  </section>

  <!-- ================= 3. CONTACT CARDS ================= -->
  <section class="cvg-ct-info">
    <img src="../assets/img/contact-page-Illustration-Art.png" alt="" class="cvg-ct-illus" aria-hidden="true" loading="lazy">
    <div class="cvg-ct-wrap">
      <div class="cvg-ct-cards">
        <a class="cvg-ct-card cvg-ct-reveal" href="<?= cvg_e($mapLink) ?>" target="_blank" rel="noopener">
          <span class="cvg-ct-ic"><svg viewBox="0 0 24 24">
              <path d="M12 21s-7-6.2-7-11a7 7 0 0114 0c0 4.8-7 11-7 11z" />
              <circle cx="12" cy="10" r="2.5" />
            </svg></span>
          <strong>Location</strong><span><?= cvg_e($contact['address']) ?></span><em>Get directions</em>
        </a>
        <a class="cvg-ct-card cvg-ct-reveal" href="tel:<?= cvg_e($contact['phone_link']) ?>" style="--d:.08s">
          <span class="cvg-ct-ic"><svg viewBox="0 0 24 24">
              <path d="M5 4h4l2 5-2.5 1.5a11 11 0 005 5L15 13l5 2v4a2 2 0 01-2 2A16 16 0 013 6a2 2 0 012-2" />
            </svg></span>
          <strong>Phone</strong><span><?= cvg_e($contact['phone']) ?></span><em>Call us</em>
        </a>
        <a class="cvg-ct-card cvg-ct-reveal" href="mailto:<?= cvg_e($contact['email']) ?>" style="--d:.16s">
          <span class="cvg-ct-ic"><svg viewBox="0 0 24 24">
              <rect x="3" y="5" width="18" height="14" rx="2" />
              <path d="M3 7l9 6 9-6" />
            </svg></span>
          <strong>Email</strong><span><?= cvg_e($contact['email']) ?></span><em>Write to us</em>
        </a>
        <div class="cvg-ct-card cvg-ct-reveal" style="--d:.24s">
          <span class="cvg-ct-ic"><svg viewBox="0 0 24 24">
              <circle cx="12" cy="12" r="9" />
              <path d="M12 7v5l3 2" />
            </svg></span>
          <strong>Working hours</strong><span><?= cvg_e($contact['hours']) ?></span><em><?= cvg_e($contact['hours_note']) ?></em>
        </div>
      </div>
    </div>
  </section>
  <?php include __DIR__ . '/../includes/world-section.php'; ?>
</main>

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
  }

  /* =========================================================
   Creative Converge — Contact page. Every rule is scoped to
   .cvg-ct, so nothing here touches the rest of your site.
   ========================================================= */
  .cvg-ct {
    --ct-bg: #0A0A0A;
    --ct-surface: #111614;
    --ct-field: #0D1211;
    --ct-line: #1E2A27;
    --ct-line-2: #2A3A36;
    --ct-mint: #00D4A3;
    --ct-mint-l: #5FF0C8;
    --ct-ink: #04342C;
    --ct-text: #F2F5F4;
    --ct-text-2: #C9D6D2;
    --ct-muted: #8FA39E;
    --ct-err: #FF8A80;
    --ct-grad: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, .45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
    --ct-ease: cubic-bezier(.2, .9, .2, 1);
    display: block;
    overflow: hidden;
    background: var(--ct-bg);
    color: var(--ct-text);
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    line-height: 1.65;
    -webkit-font-smoothing: antialiased;
  }

  .cvg-ct *,
  .cvg-ct *::before,
  .cvg-ct *::after {
    box-sizing: border-box
  }

  .cvg-ct img {
    display: block;
    max-width: 100%;
    height: auto;
    border-radius: 0;
    margin: 0;
  }

  .cvg-ct p {
    margin: 0
  }

  .cvg-ct a {
    text-decoration: none;
    color: inherit
  }

  .cvg-ct .cvg-ct-wrap {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 32px
  }

  .cvg-ct .cvg-ct-mint {
    color: var(--ct-mint)
  }

  .cvg-ct .cvg-ct-mint-l {
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-sr,
  .cvg-ct .cvg-ct-hp {
    position: absolute !important;
    width: 1px;
    height: 1px;
    overflow: hidden;
    clip: rect(0 0 0 0);
    white-space: nowrap
  }

  .cvg-ct .cvg-ct-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 16px;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: .2em;
    text-transform: uppercase;
    color: var(--ct-mint)
  }

  .cvg-ct .cvg-ct-eyebrow::before {
    content: "";
    width: 36px;
    height: 2px;
    background: currentColor
  }

  .cvg-ct .cvg-ct-eyebrow.cvg-ct-light {
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-h2 {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: clamp(34px, 4.4vw, 56px);
    font-weight: 700;
    line-height: 1.06;
    letter-spacing: -.025em;
    color: var(--ct-text);
    text-transform: none
  }

  .cvg-ct .cvg-ct-h3 {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: clamp(22px, 2.4vw, 30px);
    font-weight: 700;
    line-height: 1.25;
    letter-spacing: -.015em;
    color: var(--ct-text);
    text-transform: none
  }

  .cvg-ct .cvg-ct-lead {
    max-width: 470px;
    margin-top: 18px;
    font-size: 17px;
    color: var(--ct-muted)
  }

  .cvg-ct .cvg-ct-lead--light {
    color: #D9F5EE
  }

  /* Buttons */
  .cvg-ct .cvg-ct-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    height: 54px;
    margin: 0;
    padding: 0 28px;
    border: 0;
    border-radius: 999px;
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    font-weight: 600;
    line-height: 1;
    text-transform: none;
    cursor: pointer;
    transition: transform .3s, box-shadow .3s
  }

  .cvg-ct .cvg-ct-btn svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.4;
    stroke-linecap: round;
    transition: transform .3s
  }

  .cvg-ct .cvg-ct-btn:hover svg {
    transform: translate(3px, -3px)
  }

  .cvg-ct .cvg-ct-btn--mint {
    background: var(--ct-mint);
    color: var(--ct-ink);
  }

  .cvg-ct .cvg-ct-btn--mint:hover {
    background: var(--ct-mint);
    color: var(--ct-ink);
    transform: translateY(-2px);
    box-shadow: 0 0 0 6px rgba(0, 212, 163, .12), 0 18px 48px rgba(0, 212, 163, .4)
  }

  .cvg-ct .cvg-ct-btn--block {
    width: 100%
  }

  .cvg-ct a:focus-visible,
  .cvg-ct button:focus-visible {
    outline: 2px solid var(--ct-mint-l);
    outline-offset: 3px
  }

  /* ===== 1. Banner ===== */
  .cvg-ct .cvg-ct-hero {
    position: relative;
    overflow: hidden;
    padding: 170px 0 110px;
    background: var(--ct-grad)
  }

  .cvg-ct .cvg-ct-hero-grid {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(242, 245, 244, .06) 1px, transparent 1px), linear-gradient(90deg, rgba(242, 245, 244, .06) 1px, transparent 1px);
    background-size: 72px 72px;
    -webkit-mask-image: radial-gradient(ellipse 70% 70% at 30% 40%, #000 15%, transparent 75%);
    mask-image: radial-gradient(ellipse 70% 70% at 30% 40%, #000 15%, transparent 75%);
    animation: cvgCtGrid 20s linear infinite
  }

  @keyframes cvgCtGrid {
    to {
      background-position: 72px 72px, 72px 72px
    }
  }

  .cvg-ct .cvg-ct-hero-inner {
    z-index: 1;
    display: grid;
    grid-template-columns: minmax(0, 1fr) auto;
    align-items: center;
    gap: 40px
  }

  .cvg-ct .cvg-ct-crumbs {
    display: flex;
    gap: 10px;
    align-items: center;
    margin-bottom: 26px;
    font-size: 14px;
    color: rgba(242, 245, 244, .7)
  }

  .cvg-ct .cvg-ct-crumbs a:hover {
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-crumbs [aria-current] {
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-hero-title {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: clamp(56px, 8.5vw, 120px);
    font-weight: 700;
    line-height: .95;
    letter-spacing: -.045em;
    color: var(--ct-text);
    text-transform: none
  }

  .cvg-ct .cvg-ct-hero-title span {
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-hero-lead {
    max-width: 540px;
    margin-top: 22px;
    font-size: 18px;
    color: #D9F5EE
  }

  .cvg-ct .cvg-ct-hero-quick {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 30px
  }

  .cvg-ct .cvg-ct-hero-quick a {
    padding: 10px 18px;
    border-radius: 999px;
    border: 1px solid rgba(242, 245, 244, .25);
    background: rgba(10, 10, 10, .25);
    font-size: 14px;
    font-weight: 500;
    transition: border-color .3s, color .3s
  }

  .cvg-ct .cvg-ct-hero-quick a:hover {
    border-color: var(--ct-mint-l);
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-rocket {
    width: 300px;
    filter: hue-rotate(-17deg) saturate(1.1) drop-shadow(0 30px 50px rgba(0, 0, 0, .45));
    animation: cvgCtRocket 6s ease-in-out infinite
  }

  @keyframes cvgCtRocket {

    0%,
    100% {
      transform: translateY(0) rotate(6deg)
    }

    50% {
      transform: translateY(-18px) rotate(2deg)
    }
  }

  /* ===== 2. Form section ===== */
  .cvg-ct .cvg-ct-form-sec {
    position: relative;
    overflow: hidden;
    padding: 110px 0 120px;
    background: #0C0F0E
  }

  .cvg-ct .cvg-ct-waves {
    position: absolute;
    left: -5%;
    bottom: 40px;
    width: 110%;
    height: 320px;
    fill: none;
    stroke-width: 1;
    animation: cvgCtWaves 14s ease-in-out infinite alternate
  }

  @keyframes cvgCtWaves {
    to {
      transform: translateX(4%) scaleY(1.08)
    }
  }

  .cvg-ct .cvg-ct-form-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.12fr) minmax(0, .88fr);
    grid-template-areas: "text form" "photo form";
    column-gap: 0;
    align-items: start
  }

  .cvg-ct .cvg-ct-form-text {
    grid-area: text;
    position: relative;
    z-index: 2;
    padding-bottom: 26px
  }

  .cvg-ct .cvg-ct-form-text .cvg-ct-eyebrow {
    letter-spacing: .06em;
    text-transform: none;
    font-size: 14px;
    color: var(--ct-text-2)
  }

  .cvg-ct .cvg-ct-form-text .cvg-ct-eyebrow::before {
    width: 56px;
    height: 1px;
    background: var(--ct-mint)
  }

  .cvg-ct .cvg-ct-form-text .cvg-ct-h2 {
    font-size: clamp(38px, 4.6vw, 62px);
    line-height: 1.04
  }

  .cvg-ct .cvg-ct-form-text .cvg-ct-lead {
    max-width: 430px;
    margin-top: 14px;
    font-size: 16px;
    color: #A9C9C1
  }

  .cvg-ct .cvg-ct-photo {
    grid-area: photo;
    position: relative;
    z-index: 1;
    margin: 0 -70px 0 0;
    border-radius: 6px;
    overflow: hidden;
    aspect-ratio: 7/5;
    background: #0E1412
  }

  .cvg-ct .cvg-ct-photo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: grayscale(1) contrast(1.05);
    transition: filter .8s, transform 1.2s var(--ct-ease)
  }

  .cvg-ct .cvg-ct-photo:hover img {
    filter: grayscale(.15) contrast(1.05);
    transform: scale(1.03)
  }

  .cvg-ct .cvg-ct-photo::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(200deg, rgba(0, 212, 163, .10), rgba(0, 0, 0, 0) 40%), linear-gradient(180deg, rgba(0, 0, 0, 0) 60%, rgba(0, 33, 27, .7));
    pointer-events: none
  }

  .cvg-ct .cvg-ct-badge {
    position: absolute;
    left: 20px;
    bottom: 20px;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    border-radius: 12px;
    background: rgba(10, 10, 10, .75);
    border: 1px solid rgba(95, 240, 200, .25);
    backdrop-filter: blur(8px)
  }

  .cvg-ct .cvg-ct-badge strong {
    font-size: 26px;
    line-height: 1;
    color: var(--ct-mint)
  }

  .cvg-ct .cvg-ct-badge span {
    font-size: 12px;
    line-height: 1.35;
    color: var(--ct-text-2)
  }

  .cvg-ct .cvg-ct-form {
    grid-area: form;
    position: relative;
    z-index: 3;
    align-self: start;
    margin-top: 96px;
    display: grid;
    gap: 26px;
    padding: 40px 46px 44px;
    border-radius: 6px;
    background: linear-gradient(180deg, #141A18, #101513);
    box-shadow: 0 40px 90px rgba(0, 0, 0, .55)
  }

  .cvg-ct .cvg-ct-field {
    position: relative
  }

  .cvg-ct .cvg-ct-field input,
  .cvg-ct .cvg-ct-field textarea {
    display: block;
    width: 100%;
    margin: 0;
    padding: 22px 8px 9px;
    border: 0;
    border-bottom: 1px solid rgba(201, 214, 210, .45);
    border-radius: 0;
    background: transparent;
    color: var(--ct-text);
    font: 400 15px/1.5 'Poppins', sans-serif;
    box-shadow: none;
    outline: none;
    -webkit-appearance: none;
    appearance: none;
    transition: border-color .3s
  }

  .cvg-ct .cvg-ct-field input {
    height: auto
  }

  .cvg-ct .cvg-ct-field textarea {
    min-height: 56px;
    resize: vertical
  }

  .cvg-ct .cvg-ct-field #cvg-ct-message {
    min-height: 84px
  }

  .cvg-ct .cvg-ct-field label {
    position: absolute;
    left: 8px;
    top: 14px;
    margin: 0;
    color: var(--ct-muted);
    font-size: 14px;
    line-height: 1.4;
    pointer-events: none;
    transform-origin: left top;
    transition: transform .3s var(--ct-ease), color .3s
  }

  .cvg-ct .cvg-ct-field i {
    position: absolute;
    left: 0;
    right: 0;
    top: auto;
    height: 2px;
    margin-top: -2px;
    background: var(--ct-mint);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .45s var(--ct-ease);
    display: block
  }

  .cvg-ct .cvg-ct-field input:hover,
  .cvg-ct .cvg-ct-field textarea:hover {
    border-bottom-color: rgba(201, 214, 210, .7)
  }

  .cvg-ct .cvg-ct-field input:focus,
  .cvg-ct .cvg-ct-field textarea:focus {
    border-bottom-color: transparent;
    box-shadow: none
  }

  .cvg-ct .cvg-ct-field input:focus~i,
  .cvg-ct .cvg-ct-field textarea:focus~i {
    transform: scaleX(1)
  }

  .cvg-ct .cvg-ct-field input:focus+label,
  .cvg-ct .cvg-ct-field input:not(:placeholder-shown)+label,
  .cvg-ct .cvg-ct-field textarea:focus+label,
  .cvg-ct .cvg-ct-field textarea:not(:placeholder-shown)+label {
    transform: translateY(-14px) scale(.8);
    color: var(--ct-mint)
  }

  .cvg-ct .cvg-ct-err {
    display: none;
    margin-top: 6px;
    font-size: 12px;
    color: var(--ct-err)
  }

  .cvg-ct .cvg-ct-field--err input,
  .cvg-ct .cvg-ct-field--err textarea {
    border-bottom-color: var(--ct-err)
  }

  .cvg-ct .cvg-ct-field--err .cvg-ct-err {
    display: block
  }

  .cvg-ct .cvg-ct-alert {
    padding: 12px 16px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 500
  }

  .cvg-ct .cvg-ct-alert--ok {
    background: rgba(0, 212, 163, .12);
    border: 1px solid rgba(0, 212, 163, .4);
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-alert--err {
    background: rgba(255, 138, 128, .1);
    border: 1px solid rgba(255, 138, 128, .4);
    color: var(--ct-err)
  }

  .cvg-ct .cvg-ct-alert a {
    text-decoration: underline
  }

  .cvg-ct .cvg-ct-send {
    justify-self: start;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    height: 46px;
    margin: 14px 0 0;
    padding: 0 24px;
    border: 1px solid var(--ct-mint);
    border-radius: 999px;
    background: transparent;
    color: var(--ct-mint);
    font: 500 14px 'Poppins', sans-serif;
    text-transform: none;
    letter-spacing: .01em;
    cursor: pointer;
    box-shadow: none;
    transition: background .35s, color .35s, box-shadow .35s, transform .35s
  }

  .cvg-ct .cvg-ct-send svg {
    width: 16px;
    height: 16px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.2;
    stroke-linecap: round;
    transition: transform .35s
  }

  .cvg-ct .cvg-ct-send:hover {
    background: var(--ct-mint);
    color: var(--ct-ink);
    transform: translateY(-2px);
  }

  .cvg-ct .cvg-ct-send:hover svg {
    transform: translate(3px, -3px)
  }

  @media (max-width:860px) {
    .cvg-ct .cvg-ct-form-grid {
      grid-template-columns: minmax(0, 1fr);
      grid-template-areas: "text" "photo" "form"
    }

    .cvg-ct .cvg-ct-photo {
      margin: 0
    }

    .cvg-ct .cvg-ct-badge {
      top: 16px;
      bottom: auto;
      left: 16px
    }

    .cvg-ct .cvg-ct-form {
      margin: -70px 18px 0
    }
  }

  @media (max-width:600px) {
    .cvg-ct .cvg-ct-form {
      margin: -50px 0 0;
      padding: 30px 22px 32px
    }

    .cvg-ct .cvg-ct-form::before {
      left: 22px;
      right: 22px
    }

    .cvg-ct .cvg-ct-photo {
      aspect-ratio: 4/4
    }
  }

  /* ===== 3. Contact cards ===== */
  .cvg-ct .cvg-ct-info {
    position: relative;
    padding: 150px 0 120px;
    background: var(--ct-grad)
  }

  .cvg-ct .cvg-ct-illus {
    position: absolute;
    left: 50%;
    top: -60px;
    width: 300px;
    transform: translateX(-50%);
    z-index: 2;
    filter: drop-shadow(0 30px 40px rgba(0, 0, 0, .4));
    animation: cvgCtFloat 7s ease-in-out infinite
  }

  @keyframes cvgCtFloat {

    0%,
    100% {
      transform: translateX(-50%) translateY(0)
    }

    50% {
      transform: translateX(-50%) translateY(-14px)
    }
  }

  .cvg-ct .cvg-ct-cards {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px
  }

  .cvg-ct .cvg-ct-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 6px;
    padding: 34px 22px;
    border-radius: 24px;
    background: rgba(10, 10, 10, .45);
    border: 1px solid rgba(95, 240, 200, .22);
    backdrop-filter: blur(6px);
    color: var(--ct-text);
    transition: transform .5s var(--ct-ease), background .4s, border-color .4s, box-shadow .5s
  }

  .cvg-ct a.cvg-ct-card:hover {
    transform: translateY(-8px);
    background: rgba(10, 10, 10, .7);
    border-color: var(--ct-mint-l);
    box-shadow: 0 26px 60px rgba(0, 0, 0, .35)
  }

  .cvg-ct .cvg-ct-ic {
    width: 62px;
    height: 62px;
    margin-bottom: 12px;
    border-radius: 50%;
    display: grid;
    place-items: center;
    background: var(--ct-mint);
    box-shadow: 0 0 0 8px rgba(0, 212, 163, .15);
    transition: transform .5s var(--ct-ease)
  }

  .cvg-ct a.cvg-ct-card:hover .cvg-ct-ic {
    transform: rotate(-10deg) scale(1.08)
  }

  .cvg-ct .cvg-ct-ic svg {
    width: 26px;
    height: 26px;
    fill: none;
    stroke: var(--ct-ink);
    stroke-width: 1.9;
    stroke-linecap: round;
    stroke-linejoin: round
  }

  .cvg-ct .cvg-ct-card strong {
    font-size: 19px;
    font-weight: 600
  }

  .cvg-ct .cvg-ct-card span {
    font-size: 15px;
    color: #D9F5EE;
    word-break: break-word
  }

  .cvg-ct .cvg-ct-card em {
    margin-top: 6px;
    font-style: normal;
    font-size: 13px;
    font-weight: 600;
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-map {
    margin-top: 40px;
    height: 380px;
    border-radius: 24px;
    overflow: hidden;
    border: 1px solid rgba(95, 240, 200, .22);
    box-shadow: 0 30px 60px rgba(0, 0, 0, .35)
  }

  .cvg-ct .cvg-ct-map iframe {
    display: block;
    width: 100%;
    height: 100%;
    border: 0;
    filter: grayscale(1) invert(.92) contrast(.9) hue-rotate(160deg)
  }

  /* ===== 4. World + accordion ===== */
  .cvg-ct .cvg-ct-world {
    padding: 120px 0;
    background: linear-gradient(90deg, #0A0A0A 0%, #0E1412 55%, #00211B 100%);
    border-top: 1px solid var(--ct-line)
  }

  .cvg-ct .cvg-ct-world-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 70px;
    align-items: center
  }

  .cvg-ct .cvg-ct-acc {
    border-top: 1px solid rgba(95, 240, 200, .18)
  }

  .cvg-ct .cvg-ct-acc-item {
    border-bottom: 1px solid rgba(95, 240, 200, .18)
  }

  .cvg-ct .cvg-ct-acc-head {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    margin: 0;
    padding: 24px 0;
    border: 0;
    background: none;
    color: var(--ct-text);
    font: 600 19px/1.3 'Poppins', sans-serif;
    text-align: left;
    text-transform: none;
    cursor: pointer;
    box-shadow: none;
    transition: color .3s
  }

  .cvg-ct .cvg-ct-acc-head:hover {
    background: none;
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-acc-ic {
    position: relative;
    flex: none;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    border: 1px solid var(--ct-line-2);
    transition: background .4s, border-color .4s, transform .5s var(--ct-ease)
  }

  .cvg-ct .cvg-ct-acc-ic::before,
  .cvg-ct .cvg-ct-acc-ic::after {
    content: "";
    position: absolute;
    left: 50%;
    top: 50%;
    width: 12px;
    height: 2px;
    margin: -1px 0 0 -6px;
    background: currentColor;
    transition: transform .4s
  }

  .cvg-ct .cvg-ct-acc-ic::after {
    transform: rotate(90deg)
  }

  .cvg-ct .cvg-ct-acc-item--open .cvg-ct-acc-head {
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-acc-item--open .cvg-ct-acc-ic {
    background: var(--ct-mint);
    border-color: var(--ct-mint);
    color: var(--ct-ink);
    transform: rotate(180deg)
  }

  .cvg-ct .cvg-ct-acc-item--open .cvg-ct-acc-ic::after {
    transform: rotate(0)
  }

  .cvg-ct .cvg-ct-acc-body {
    display: grid;
    grid-template-rows: 0fr;
    transition: grid-template-rows .5s var(--ct-ease)
  }

  .cvg-ct .cvg-ct-acc-body p {
    overflow: hidden;
    color: var(--ct-muted);
    font-size: 15px
  }

  .cvg-ct .cvg-ct-acc-item--open .cvg-ct-acc-body {
    grid-template-rows: 1fr
  }

  .cvg-ct .cvg-ct-acc-item--open .cvg-ct-acc-body p {
    padding-bottom: 24px
  }

  /* ===== 5. Newsletter ===== */
  .cvg-ct .cvg-ct-news {
    padding: 100px 0
  }

  .cvg-ct .cvg-ct-news-box {
    display: grid;
    grid-template-columns: minmax(0, 1fr) minmax(0, 1.05fr);
    gap: 44px;
    align-items: center;
    padding: 48px 52px;
    border-radius: 30px;
    background: var(--ct-grad);
    border: 1px solid rgba(95, 240, 200, .25)
  }

  .cvg-ct .cvg-ct-news-box .cvg-ct-eyebrow {
    color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-news-form {
    position: relative;
    display: flex;
    gap: 8px;
    padding: 8px;
    border-radius: 999px;
    background: rgba(10, 10, 10, .6);
    border: 1px solid rgba(95, 240, 200, .25)
  }

  .cvg-ct .cvg-ct-news-form input {
    flex: 1;
    min-width: 0;
    height: auto;
    margin: 0;
    padding: 0 18px;
    border: 0;
    border-radius: 0;
    background: transparent;
    color: var(--ct-text);
    font: 500 15px 'Poppins', sans-serif;
    box-shadow: none;
    outline: none
  }

  .cvg-ct .cvg-ct-news-form input::placeholder {
    color: var(--ct-muted)
  }

  .cvg-ct .cvg-ct-news-form:focus-within {
    border-color: var(--ct-mint-l)
  }

  .cvg-ct .cvg-ct-news-form .cvg-ct-btn {
    height: 48px;
    flex: none
  }

  .cvg-ct .cvg-ct-news-msg {
    position: absolute;
    left: 24px;
    top: calc(100% + 10px);
    font-size: 13px;
    color: #D9F5EE
  }

  /* ===== Scroll reveal ===== */
  .cvg-ct.cvg-ct--js .cvg-ct-reveal {
    opacity: 0;
    transform: translateY(36px);
    transition: opacity .9s var(--ct-ease) var(--d, 0s), transform .9s var(--ct-ease) var(--d, 0s), background .4s, border-color .4s, box-shadow .5s
  }

  .cvg-ct.cvg-ct--js .cvg-ct-reveal.cvg-ct-shown {
    opacity: 1;
    transform: none
  }

  .cvg-ct.cvg-ct--js a.cvg-ct-card.cvg-ct-shown:hover {
    transform: translateY(-8px);
    transition-delay: 0s
  }

  /* ===== Responsive ===== */
  @media (max-width:1024px) {
    .cvg-ct .cvg-ct-cards {
      grid-template-columns: repeat(2, minmax(0, 1fr))
    }

    .cvg-ct .cvg-ct-rocket {
      width: 220px
    }
  }

  @media (max-width:860px) {

    .cvg-ct .cvg-ct-hero-inner,
    .cvg-ct .cvg-ct-world-grid,
    .cvg-ct .cvg-ct-news-box {
      grid-template-columns: minmax(0, 1fr)
    }

    .cvg-ct .cvg-ct-rocket {
      position: absolute;
      right: -20px;
      top: -40px;
      width: 150px;
      opacity: .6
    }

    .cvg-ct .cvg-ct-world-grid {
      gap: 40px
    }
  }

  @media (max-width:600px) {
    .cvg-ct .cvg-ct-wrap {
      padding: 0 16px
    }

    .cvg-ct .cvg-ct-hero {
      padding: 130px 0 80px
    }

    .cvg-ct .cvg-ct-hero-lead {
      font-size: 16px
    }

    .cvg-ct .cvg-ct-form-sec,
    .cvg-ct .cvg-ct-world {
      padding: 80px 0
    }

    .cvg-ct .cvg-ct-row {
      grid-template-columns: minmax(0, 1fr)
    }

    .cvg-ct .cvg-ct-info {
      padding: 120px 0 80px
    }

    .cvg-ct .cvg-ct-illus {
      width: 200px;
      top: -40px
    }

    .cvg-ct .cvg-ct-cards {
      grid-template-columns: minmax(0, 1fr)
    }

    .cvg-ct .cvg-ct-map {
      height: 300px
    }

    .cvg-ct .cvg-ct-news {
      padding: 70px 0
    }

    .cvg-ct .cvg-ct-news-box {
      padding: 30px 22px
    }

    .cvg-ct .cvg-ct-news-form {
      flex-direction: column;
      border-radius: 20px;
      padding: 10px
    }

    .cvg-ct .cvg-ct-news-form input {
      height: 48px
    }

    .cvg-ct .cvg-ct-news-msg {
      position: static;
      padding: 0 8px
    }
  }

  @media (prefers-reduced-motion:reduce) {

    .cvg-ct *,
    .cvg-ct *::before,
    .cvg-ct *::after {
      animation: none !important;
      transition: none !important
    }

    .cvg-ct.cvg-ct--js .cvg-ct-reveal {
      opacity: 1;
      transform: none
    }
  }
</style>

<script>
  (function() {
    var root = document.getElementById('cvg-contact-page');
    if (!root) return;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var $$ = function(s) {
      return Array.prototype.slice.call(root.querySelectorAll(s));
    };

    /* ---------- Contact form: check fields before sending ---------- */
    var form = root.querySelector('.cvg-ct-form');
    var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function check(field) {
      var input = field.querySelector('input, textarea');
      if (!input || !input.required) return true;
      var v = input.value.trim();
      var ok = v !== '' && (input.type !== 'email' || emailRe.test(v));
      field.classList.toggle('cvg-ct-field--err', !ok);
      return ok;
    }
    if (form) {
      $$('.cvg-ct-field').forEach(function(f) {
        var i = f.querySelector('input, textarea');
        if (i) i.addEventListener('input', function() {
          if (f.classList.contains('cvg-ct-field--err')) check(f);
        });
      });
      form.addEventListener('submit', function(e) {
        var ok = $$('.cvg-ct-form .cvg-ct-field').map(check).every(Boolean);
        if (!ok) {
          e.preventDefault();
          var first = form.querySelector('.cvg-ct-field--err input, .cvg-ct-field--err textarea');
          if (first) first.focus();
        }
      });
    }

    /* ---------- Newsletter (only checks the email; your action URL does the rest) ---------- */
    var nf = root.querySelector('.cvg-ct-news-form');
    if (nf) nf.addEventListener('submit', function(e) {
      var inp = nf.querySelector('input'),
        msg = nf.querySelector('.cvg-ct-news-msg');
      if (!emailRe.test(inp.value.trim())) {
        e.preventDefault();
        msg.textContent = 'Enter a valid email address';
        inp.focus();
        return;
      }
      if (nf.getAttribute('action') === '#') {
        e.preventDefault();
        msg.textContent = 'Thanks for subscribing!';
        inp.value = '';
      }
    });

    /* ---------- Accordion (one open at a time) ---------- */
    var items = $$('.cvg-ct-acc-item');
    items.forEach(function(it) {
      var head = it.querySelector('.cvg-ct-acc-head');
      head.addEventListener('click', function() {
        var willOpen = !it.classList.contains('cvg-ct-acc-item--open');
        items.forEach(function(x) {
          x.classList.remove('cvg-ct-acc-item--open');
          x.querySelector('.cvg-ct-acc-head').setAttribute('aria-expanded', 'false');
        });
        if (willOpen) {
          it.classList.add('cvg-ct-acc-item--open');
          head.setAttribute('aria-expanded', 'true');
        }
      });
    });

    /* ---------- Scroll reveal ---------- */
    if (reduce || !('IntersectionObserver' in window)) return;
    root.classList.add('cvg-ct--js');
    var io = new IntersectionObserver(function(es) {
      es.forEach(function(e) {
        if (e.isIntersecting) {
          e.target.classList.add('cvg-ct-shown');
          io.unobserve(e.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });
    $$('.cvg-ct-reveal').forEach(function(el) {
      io.observe(el);
    });
  })();
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>