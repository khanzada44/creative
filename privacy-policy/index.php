<?php

$termsTitle   = 'Privacy Policy';
$termsUpdated = 'October 26, 2026';
$termsIntro   = 'Learn how Creative Converge collects, uses, stores, and protects your personal information when you visit our website or use our services.';

$company = [
    'name'    => 'Creative Converge',
    'email'   => 'info@creativeconverge.com',
    'phone'   => '(855) 677-4898',
    'address' => 'USA: 1910 Pacific Ave Suite 2000 #2372, Dallas, TX 75201',
];

$terms = [

    ['General Privacy Terms', [
        'This Privacy Policy explains how ' . $company['name'] . ' collects, uses, and protects personal information obtained through creativeconverge.com and our services.',
        'We respect the privacy of our users and clients. We collect information necessary to respond to inquiries, deliver services, manage projects, and improve the digital experience we provide.',
        'We do not sell personal information to third parties.'
    ]],

    ['Main Purpose of This Policy', [
        'The purpose of this Privacy Policy is to explain why we collect personal information, how we use it, when it may be shared, and the choices available to you.',
        'We may revise this policy from time to time. Any changes will be reflected on this page along with an updated Last Updated date. We encourage visitors to review this policy periodically.'
    ]],

    ['Scope and Definitions', [
        'This Privacy Policy applies to visitors, customers, clients, and other individuals who access or interact with creativeconverge.com or our services.',
        'The terms "you," "your," "customer," and "user" refer to anyone accessing our website or services. The terms "we," "our," and "us" refer to Creative Converge.'
    ]],

    ['Information We Collect', [
        'We may collect the following categories of information depending on how you interact with our website and services:',
        [
            'Personal Information: Your name, email address, phone number, business or residential address, company name, and other information you provide through forms, inquiries, or direct communication.',
            'Business Information: Company details, project requirements, business contacts, support contacts, and other information relevant to delivering our services.',
            'Automatically Collected Information: IP address, browser type, device information, pages visited, browsing activity, and related usage data collected through cookies and similar technologies.'
        ],
        'We aim to collect only the information reasonably necessary to operate our website, provide requested services, and meet our business and legal obligations.'
    ]],

    ['How We Use Your Information', [
        'Creative Converge may use collected information for the following purposes:',
        [
            'Responding to inquiries and providing requested information.',
            'Delivering services and managing client projects.',
            'Communicating project updates, service notices, and support information.',
            'Sending marketing or promotional communications where permitted and, when required, with your consent.',
            'Improving website functionality, content, performance, and user experience.',
            'Maintaining website security and preventing misuse.',
            'Complying with applicable laws and legal obligations.'
        ]
    ]],

    ['Data Handling and Confidentiality', [
        'Our authorized design, development, quality assurance, and support personnel may access relevant client information when necessary to manage projects, provide services, resolve issues, and maintain service quality.',
        'We limit access to personal and client information to individuals who need it for legitimate business purposes and expect them to handle that information confidentially.'
    ]],

    ['Data Security', [
        'Creative Converge uses reasonable technical and organizational measures designed to protect personal information against unauthorized access, alteration, disclosure, loss, or misuse.',
        'Depending on the service and environment, these measures may include encrypted connections such as SSL/TLS and security controls provided by our hosting and technology providers.',
        'No website, transmission method, or electronic storage system can be guaranteed to be completely secure. We therefore cannot promise absolute security.'
    ]],

    ['Third-Party Services and Data Sharing', [
        'We may share relevant information with trusted service providers when reasonably necessary to operate our website, communicate with clients, process inquiries, maintain projects, or deliver contracted services.',
        'These providers may include hosting companies, analytics providers, communication platforms, and other technology partners. They are expected to handle information in accordance with applicable obligations and the services they provide.',
        'We do not sell personal information. Information may also be disclosed where required by law, to respond to lawful requests, or to protect our rights, users, and services.'
    ]],

    ['Cookies and Tracking Technologies', [
        'Our website may use cookies and similar technologies to remember preferences, understand website usage, analyze engagement, and improve content and performance.',
        'You can manage or disable cookies through your browser settings. Blocking certain cookies may affect the availability or functionality of some website features.',
        'Where applicable, analytics and advertising technologies may collect information about interactions with our website. Their use is subject to applicable requirements and the relevant providers’ policies.'
    ]],

    ['Payment Information', [
        'If a payment is processed through a third-party payment provider, your payment information may be collected and handled by that provider under its own privacy policy and security practices.',
        'We do not intentionally retain complete payment card details in our own systems after a transaction unless necessary and permitted for a legitimate purpose and in accordance with applicable requirements.'
    ]],

    ['SMS Consent and Communication', [
        'If you opt in to receive SMS messages from Creative Converge, you consent to receive the types of messages described when you provide your consent, such as service updates, reminders, or promotional messages where applicable.',
        'Your SMS consent and mobile number will not be shared with third parties or affiliates for their own marketing or promotional purposes.',
        'Message frequency may vary. Message and data rates may apply.',
        'You can opt out of SMS messages at any time by replying STOP. For assistance, reply HELP or contact us at ' . $company['email'] . '.',
        'For additional information about text message communications, please review our SMS Terms & Conditions.'
    ]],

    ['Your Privacy Rights and Choices', [
        'Depending on your location and applicable law, you may have the right to:',
        [
            'Request access to personal information we hold about you.',
            'Request a copy of your personal information.',
            'Request correction of inaccurate or incomplete information.',
            'Request deletion of personal information, subject to applicable legal exceptions.',
            'Withdraw consent for marketing communications or SMS messages.',
            'Object to or restrict certain processing activities where applicable.'
        ],
        'To submit a privacy request or ask a question about your information, contact us at ' . $company['email'] . '. We may need to verify your identity before processing certain requests.'
    ]],

    ['Third-Party Websites', [
        'Our website may contain links to websites or services operated by third parties. We do not control their privacy practices or content.',
        'When visiting a third-party website, please review its privacy policy and terms to understand how it collects and uses your information.'
    ]],

    ['Children’s Privacy', [
        'Our website and services are not knowingly directed toward children under 13. We do not knowingly collect personal information from children under 13 without any legally required authorization.',
        'If you believe a child has provided personal information to us, please contact us so we can review the situation and take appropriate action where required by law.'
    ]],

    ['Data Retention', [
        'We retain personal information only for as long as reasonably necessary to fulfill the purposes described in this policy, provide services, resolve disputes, maintain business records, and meet applicable legal obligations.',
        'Retention periods may vary depending on the type of information and the circumstances in which it was collected.'
    ]],

    ['Updates to This Privacy Policy', [
        'Creative Converge may update this Privacy Policy to reflect changes in our practices, technology, services, or legal requirements.',
        'The Last Updated date displayed on this page indicates when this policy was most recently revised. Your continued use of our website after changes are posted is subject to applicable law.'
    ]],

    ['Contact Us', [
        'If you have questions about this Privacy Policy, our data practices, or your privacy rights, please contact us using the details below:',
        'Company: ' . $company['name'],
        'Email: ' . $company['email'],
        'Phone: ' . $company['phone'],
        'Address: ' . $company['address']
    ]],

];

/* ---------- URLs ---------- */
require_once dirname(__DIR__) . '/includes/init.php';
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
$phoneLink = '+1' . preg_replace('~\D~', '', $company['phone']);
?>
<?php include __DIR__ . '/../includes/header.php'; ?>
<link rel="stylesheet" href="<?= cvg_url('assets/css/header.css') ?>">
<link rel="stylesheet" href="<?= cvg_url('assets/css/footer.css') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

<main class="cvg-tc" id="cvg-terms-page">

  <section class="cvg-tc-hero">
    <div class="cvg-tc-hero-grid" aria-hidden="true"></div>
    <div class="cvg-tc-wrap cvg-tc-hero-inner">
      <h1 class="cvg-tc-hero-title"><?= cvg_e($termsTitle) ?><span>.</span></h1>
      <p class="cvg-tc-hero-lead"><?= cvg_e($termsIntro) ?></p>
    </div>
  </section>
  <section class="cvg-tc-body">
    <div class="cvg-tc-wrap">
      <div class="cvg-tc-doc">
        <?php foreach ($terms as $i => $t): ?>
          <div class="cvg-tc-sec">
            <h2><?= cvg_e($t[0]) ?></h2>
            <?php foreach ($t[1] as $block): ?>
              <?php if (is_array($block)): ?>
                <ul><?php foreach ($block as $li): ?><li><?= cvg_e($li) ?></li><?php endforeach; ?></ul>
              <?php else: ?>
                <p><?= cvg_e($block) ?></p>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>

        <div class="cvg-tc-sec">
          <h2>Contact Us</h2>
          <p>If you have any questions about these Terms, please contact us:</p>
          <ul>
            <li>Email: <a href="mailto:<?= cvg_e($company['email']) ?>"><?= cvg_e($company['email']) ?></a></li>
            <li>Phone: <a href="tel:<?= cvg_e($phoneLink) ?>"><?= cvg_e($company['phone']) ?></a></li>
            <li>Address: <?= cvg_e($company['address']) ?></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>

<style>
  ::-webkit-scrollbar {
    width: 10px;
  }

  /* Scrollbar ki background track */
  ::-webkit-scrollbar-track {
    background: #0b2b26;
    /* Apne dark theme ke hisab se change karein */
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
   Creative Converge — Terms page. Every rule is scoped to
   .cvg-tc, so nothing here touches the rest of your site.
   ========================================================= */
  .cvg-tc {
    --tc-bg: #0C0F0E;
    --tc-card: #111614;
    --tc-line: #1E2A27;
    --tc-mint: #00D4A3;
    --tc-mint-l: #5FF0C8;
    --tc-ink: #04342C;
    --tc-text: #F2F5F4;
    --tc-text-2: #C9D6D2;
    --tc-muted: #A9C2BC;
    --tc-grad: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, .45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
    --tc-ease: cubic-bezier(.2, .9, .2, 1);
    display: block;
    background: var(--tc-bg);
    color: var(--tc-text);
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    line-height: 1.75;
    -webkit-font-smoothing: antialiased;
  }

  .cvg-tc *,
  .cvg-tc *::before,
  .cvg-tc *::after {
    box-sizing: border-box
  }

  .cvg-tc p {
    margin: 0
  }

  .cvg-tc a {
    text-decoration: none;
    color: inherit
  }

  .cvg-tc .cvg-tc-wrap {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 32px
  }

  .cvg-tc a:focus-visible,
  .cvg-tc button:focus-visible {
    outline: 2px solid var(--tc-mint-l);
    outline-offset: 3px
  }

  /* ===== Banner ===== */
  .cvg-tc .cvg-tc-hero {
    position: relative;
    overflow: hidden;
    padding: 170px 0 96px;
    background: var(--tc-grad);
    text-align: center
  }

  .cvg-tc .cvg-tc-hero-grid {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(242, 245, 244, .06) 1px, transparent 1px), linear-gradient(90deg, rgba(242, 245, 244, .06) 1px, transparent 1px);
    background-size: 72px 72px;
    -webkit-mask-image: radial-gradient(ellipse 60% 80% at 50% 40%, #000 15%, transparent 75%);
    mask-image: radial-gradient(ellipse 60% 80% at 50% 40%, #000 15%, transparent 75%);
    animation: cvgTcGrid 20s linear infinite
  }

  @keyframes cvgTcGrid {
    to {
      background-position: 72px 72px, 72px 72px
    }
  }

  .cvg-tc .cvg-tc-hero-inner {
    z-index: 1
  }

  .cvg-tc .cvg-tc-crumbs {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-bottom: 22px;
    font-size: 14px;
    color: rgba(242, 245, 244, .7)
  }

  .cvg-tc .cvg-tc-crumbs a:hover,
  .cvg-tc .cvg-tc-crumbs [aria-current] {
    color: var(--tc-mint-l)
  }

  .cvg-tc .cvg-tc-hero-title {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    font-size: clamp(40px, 6.6vw, 92px);
    font-weight: 700;
    line-height: 1;
    letter-spacing: -.04em;
    color: var(--tc-text);
    text-transform: none
  }

  .cvg-tc .cvg-tc-hero-title span {
    color: var(--tc-mint-l)
  }

  .cvg-tc .cvg-tc-hero-lead {
    max-width: 560px;
    margin: 20px auto 0;
    font-size: 17px;
    color: #D9F5EE
  }

  .cvg-tc .cvg-tc-updated {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 26px;
    padding: 8px 16px;
    border-radius: 999px;
    border: 1px solid rgba(242, 245, 244, .25);
    background: rgba(10, 10, 10, .25);
    font-size: 13px;
    font-weight: 500;
    color: var(--tc-text-2)
  }

  .cvg-tc .cvg-tc-updated svg {
    width: 15px;
    height: 15px;
    fill: none;
    stroke: var(--tc-mint-l);
    stroke-width: 2;
    stroke-linecap: round
  }

  /* ===== Body ===== */
  .cvg-tc .cvg-tc-body {
    padding: 80px 0 110px
  }

  .cvg-tc .cvg-tc-doc {
    max-width: 1100px;
    margin: 0 auto
  }

  .cvg-tc .cvg-tc-sec+.cvg-tc-sec {
    margin-top: 34px
  }

  .cvg-tc .cvg-tc-sec h2 {
    margin: 0 0 10px;
    font-family: 'Poppins', sans-serif;
    font-size: 20px;
    font-weight: 600;
    line-height: 1.35;
    letter-spacing: 0;
    color: var(--tc-text);
    text-transform: none
  }

  .cvg-tc .cvg-tc-sec p {
    color: var(--tc-muted);
    font-size: 15px
  }

  .cvg-tc .cvg-tc-sec p+p,
  .cvg-tc .cvg-tc-sec ul+p,
  .cvg-tc .cvg-tc-sec p+ul {
    margin-top: 10px
  }

  .cvg-tc .cvg-tc-sec ul {
    margin: 0;
    padding: 0 0 0 22px;
    list-style: disc
  }

  .cvg-tc .cvg-tc-sec li {
    margin: 0 0 6px;
    padding: 0;
    color: var(--tc-muted);
    font-size: 15px
  }

  .cvg-tc .cvg-tc-sec li::before {
    content: none
  }

  .cvg-tc .cvg-tc-sec li::marker {
    color: var(--tc-mint)
  }

  .cvg-tc .cvg-tc-sec a {
    color: var(--tc-mint-l);
    text-decoration: underline;
    text-underline-offset: 3px
  }

  .cvg-tc .cvg-tc-sec a:hover {
    color: var(--tc-mint)
  }

  /* ===== Responsive ===== */
  @media (max-width:600px) {
    .cvg-tc .cvg-tc-wrap {
      padding: 0 16px
    }

    .cvg-tc .cvg-tc-hero {
      padding: 130px 0 70px
    }

    .cvg-tc .cvg-tc-hero-lead {
      font-size: 15.5px
    }

    .cvg-tc .cvg-tc-body {
      padding: 56px 0 80px
    }

    .cvg-tc .cvg-tc-sec h2 {
      font-size: 18px
    }
  }

  @media (prefers-reduced-motion:reduce) {

    .cvg-tc *,
    .cvg-tc *::before,
    .cvg-tc *::after {
      animation: none !important;
      transition: none !important
    }
  }
</style>

<script src="<?= cvg_url('assets/js/favicon-animate.js') ?>"></script>
<?php include __DIR__ . '/../includes/footer.php'; ?>