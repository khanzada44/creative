<?php

$contact = [
  'email'      => 'info@creativeconverge.com',
  'phone'      => '(855) 677-4898',
  'phone_link' => '+18556774898',
  'address'    => 'USA: 1910 Pacific Ave Suite 2000 #2372, Dallas, TX 75201',
  'hours'      => 'Mon – Fri: 9 am – 6 pm',
  'hours_note' => 'Sat & Sun: closed',
];

$contactSendTo = $contact['email'];

$contactShowMap = true;

$contactHero = [
  'eyebrow' => 'So, What Are We Making Happen?',
  'title'   => 'Contact us',
  'lead'    => "Maybe you've got a business to build, a brand that needs a fresh direction, a website that's no longer doing its job, or an idea you've been meaning to bring to life. Whatever brought you here, let's hear it out and get free web design consultation.",
];

$contactImages = [
  'rocket'       => '2024/08/rocket-no-bg.png',
  'photo'        => '2024/08/contact-page.png',
  'illustration' => '',
];

$contactFaq = [
  ['Analyzing Research', 'Analyzing research refers to the process of carefully examining and interpreting the data or information gathered through research to draw meaningful conclusions, identify patterns, and generate insights.'],
  ['Integrated Learning', 'Integrated learning refers to an approach that connects different subjects, disciplines, or areas of knowledge to provide a more holistic and interconnected experience.'],
  ['Considering Innovation', 'Considering innovation refers to the process of evaluating and exploring new ideas, methods, technologies, or approaches that can lead to improvements in a particular area or field.'],
];

$newsletterAction = '#';

require_once dirname(__DIR__) . '/includes/init.php';
$uploads = $uploads ?? 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/';
$siteUrl = cvg_url('');


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

$cf = ['name' => '', 'phone' => '', 'email' => '', 'subject' => '', 'message' => ''];
$cfErrors = [];
$cfStatus = ''; 
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['cvg_contact_form'])) {
  foreach ($cf as $k => $v) $cf[$k] = trim((string) ($_POST[$k] ?? ''));
  if ($cf['message'] === '') $cf['message'] = trim((string) ($_POST['msg_subject'] ?? ''));   /* form ka message field "msg_subject" hai */
  $honeypot = trim((string) ($_POST['website'] ?? ''));   /* bots fill this hidden field */
  if ($cf['name'] === '')    $cfErrors['name']    = 'Enter your name';

  /* Phone: 10-15 digits, sirf digits / + / space / - / ( ) */
  $pd = preg_replace('/\D/', '', $cf['phone']);
  if ($cf['phone'] === '')                                     $cfErrors['phone'] = 'Phone number is required';
  elseif (!preg_match('/^\+?[\d\s()\-]+$/', $cf['phone']))     $cfErrors['phone'] = 'Phone number can only contain digits';
  elseif (strlen($pd) < 10)                                    $cfErrors['phone'] = 'Phone number must be at least 10 digits';
  elseif (strlen($pd) > 15)                                    $cfErrors['phone'] = 'Phone number cannot be more than 15 digits';
  elseif (preg_match('/^(\d)\1+$/', $pd))                      $cfErrors['phone'] = 'Enter a valid phone number';

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
    $cfStatus = 'sent';  
  }
}
$mapSrc = 'https://www.google.com/maps?q=' . rawurlencode($contact['address']) . '&output=embed';
$mapLink = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($contact['address']);
$cvgArrow = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9"/></svg>';
?>
<?php

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
<link rel="stylesheet" href="<?= cvg_url('assets/css/contact-page.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<title>Tell Us Your Goals: Web Design and Digital Marketing at Creative Converge</title>
<meta name="description" content="Looking for a website design quote near me? Contact Creative Converge Dallas to discuss your project, share your goals and find a scope that fits.">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

<main class="cvg-ct" id="cvg-contact-page">


  <section class="cvg-ct-hero">
    <div class="cvg-ct-hero-grid" aria-hidden="true"></div>
    <div class="cvg-ct-wrap cvg-ct-hero-inner">
      <div>
        <p class="cvg-ct-eyebrow cvg-ct-light" data-wm="Contact"><?= cvg_e($contactHero['eyebrow']) ?></p>
        <h1 class="cvg-ct-hero-title"><?= cvg_e($contactHero['title']) ?><span>.</span></h1>
        <p class="cvg-ct-hero-lead"><?= cvg_e($contactHero['lead']) ?></p>
        <div class="cvg-ct-hero-quick">
          <a href="mailto:<?= cvg_e($contact['email']) ?>"><?= cvg_e($contact['email']) ?></a>
          <a href="tel:<?= cvg_e($contact['phone_link']) ?>"><?= cvg_e($contact['phone']) ?></a>
        </div>
      </div>
      <img src="<?= cvg_url('assets/img/hero-3d.png') ?>" alt="" class="cvg-ct-rocket" aria-hidden="true">
    </div>
  </section>
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
        <p class="cvg-ct-eyebrow" data-wm="Let's Talk">Let's Get Started</p>
        <h2 class="cvg-ct-h2">Every Good Project Starts<br>Somewhere<span class="cvg-ct-mint">.</span></h2>
        <p class="cvg-ct-lead">Tell us what you're trying to achieve, what's getting in the way, or what you'd love to see happen. We'll get a feel for the bigger picture, ask the right questions, provide a website design quote near you, and explore how Creative Converge Dallas can bring your vision to life.</p>
      </div>

      <div class="cvg-ct-photo cvg-ct-reveal" style="--d:.08s">
        <img src="<?= cvg_url('assets/img/contact-us-image.jpg') ?>" alt="Creative Converge support specialist with a headset" loading="lazy">
      </div>

      <form class="cvg-ct-form cvg-ct-reveal" method="post" action="<?= cvg_url('email.php') ?>" novalidate style="--d:.16s">
        <input type="hidden" name="cvg_contact_form" value="1">
        <div class="cvg-ct-hp" aria-hidden="true"><label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>

        <?php if ($cfStatus === 'sent'): ?>
          <p class="cvg-ct-alert cvg-ct-alert--ok" role="status">Thank you! Your message has been sent. We'll reply within one business day.</p>
        <?php elseif ($cfStatus === 'failed'): ?>
          <p class="cvg-ct-alert cvg-ct-alert--err" role="alert">Sorry, your message couldn't be sent right now. Please email us at <a href="mailto:<?= cvg_e($contact['email']) ?>"><?= cvg_e($contact['email']) ?></a>.</p>
        <?php endif; ?>

        <div class="cvg-ct-field<?= isset($cfErrors['name']) ? ' cvg-ct-field--err' : '' ?>">
          <input id="name" name="name" type="text" placeholder=" " required autocomplete="name" value="<?= cvg_e($cf['name']) ?>">
          <label for="name">Name</label><i aria-hidden="true"></i>
          <small class="cvg-ct-err"><?= cvg_e($cfErrors['name'] ?? 'Enter your name') ?></small>
        </div>
        <div class="cvg-ct-field<?= isset($cfErrors['phone']) ? ' cvg-ct-field--err' : '' ?>">
          <input id="phone" name="phone" type="tel" placeholder=" " data-required="1" aria-required="true" autocomplete="tel" inputmode="tel" maxlength="20" value="<?= cvg_e($cf['phone']) ?>">
          <label for="phone">Phone</label><i aria-hidden="true"></i>
          <small class="cvg-ct-err" aria-live="polite"><?= cvg_e($cfErrors['phone'] ?? 'Enter a valid phone number') ?></small>
        </div>
        <div class="cvg-ct-field<?= isset($cfErrors['email']) ? ' cvg-ct-field--err' : '' ?>">
          <input id="email" name="email" type="email" placeholder=" " required autocomplete="email" value="<?= cvg_e($cf['email']) ?>">
          <label for="email">Email</label><i aria-hidden="true"></i>
          <small class="cvg-ct-err"><?= cvg_e($cfErrors['email'] ?? 'Enter a valid email address') ?></small>
        </div>
        <div class="cvg-ct-field">
          <textarea id="subject" name="subject" rows="1" placeholder=" "><?= cvg_e($cf['subject']) ?></textarea>
          <label for="subject">Subject</label><i aria-hidden="true"></i>
        </div>
        <div class="cvg-ct-field<?= isset($cfErrors['message']) ? ' cvg-ct-field--err' : '' ?>">
          <textarea id="msg_subject" name="msg_subject" rows="3" placeholder=" " required><?= cvg_e($cf['message']) ?></textarea>
          <label for="msg_subject">Message</label><i aria-hidden="true"></i>
          <small class="cvg-ct-err"><?= cvg_e($cfErrors['message'] ?? 'Tell us a little about your project') ?></small>
        </div>
        <button type="submit" class="cvg-ct-send">Send Message <?= $cvgArrow ?></button>
      </form>
    </div>
  </section>
  <section class="cvg-ct-info">
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

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="<?= cvg_url('assets/js/contact-us.js') ?>"></script>
<script>
/* ---------- Phone validation (contact form) ---------- */
(function () {
  var form = document.querySelector('#cvg-contact-page .cvg-ct-form');
  if (!form) return;
  var phone = form.querySelector('input[name="phone"]');
  if (!phone) return;
  var field = phone.closest('.cvg-ct-field');
  var small = field ? field.querySelector('.cvg-ct-err') : null;

  /* Sirf digits, +, space, -, ( ) - "+" sirf shuru mein */
  function cleanPhone(v) {
    return v.replace(/[^\d+\s()-]/g, '').replace(/(?!^)\+/g, '').slice(0, 20);
  }
  function phoneError(v) {
    v = (v || '').trim();
    if (!v) return 'Phone number is required';
    var c = v.replace(/[\s()-]/g, '');
    if (!/^\+?\d+$/.test(c)) return 'Phone number can only contain digits';
    var d = c.replace(/\D/g, '');
    if (d.length < 10) return 'Phone number must be at least 10 digits';
    if (d.length > 15) return 'Phone number cannot be more than 15 digits';
    if (/^(\d)\1+$/.test(d)) return 'Enter a valid phone number';
    return '';
  }
  function show(msg) {
    if (small && msg) small.textContent = msg;
    if (field) field.classList.toggle('cvg-ct-field--err', !!msg);
    phone.setAttribute('aria-invalid', msg ? 'true' : 'false');
    return !msg;
  }

  phone.addEventListener('input', function () {
    var c = cleanPhone(phone.value);
    if (c !== phone.value) phone.value = c;
    if (field && field.classList.contains('cvg-ct-field--err')) show(phoneError(phone.value));
  });
  phone.addEventListener('blur', function () {
    if (phone.value) show(phoneError(phone.value));
  });
  form.addEventListener('submit', function (e) {
    if (!show(phoneError(phone.value))) {
      e.preventDefault();
      var first = form.querySelector('.cvg-ct-field--err input, .cvg-ct-field--err textarea');
      (first || phone).focus();
      return;
    }
    phone.value = phone.value.replace(/[\s()-]/g, '');   /* server ko +18669788570 */
  });
})();
</script>
<script src="<?= cvg_url('assets/js/favicon-animate.js') ?>"></script>