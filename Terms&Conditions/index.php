<?php

$termsTitle   = 'Terms & Conditions';
$termsUpdated = 'October 16, 2026';
$termsIntro   = 'Please read these terms carefully before using our website or ordering any of our services.';

$company = [
  'name'    => 'Creative Converge',
  'email'   => 'info@creativeconverge.com',
  'phone'   => '(855) 677-4898',
  'address'    => 'USA: 1910 Pacific Ave Suite 2000 #2372, Dallas, TX 75201',
];

$terms = [
  ['Introduction', [
    'These Terms & Conditions ("Terms") govern your use of the ' . $company['name'] . ' website and every service we provide, including website design, development, white-label work for agencies, maintenance, hosting support and related digital services ("Services").',
    'By using our website, approving a quote, or paying an invoice, you agree to these Terms. If you do not agree, please do not use our website or Services.',
  ]],
  ['Our Services', [
    'The exact scope, deliverables, price and timeline of every project are described in the quote or proposal you approve. Anything not listed there is outside the scope and may be quoted separately.',
    'We provide services such as:',
    ['Custom website design and development (WordPress, Shopify, Wix, Squarespace and custom builds)', 'E-commerce stores and payment integration', 'White-label design and development for agencies', 'Website maintenance, updates and speed optimization', 'Basic on-page SEO setup'],
  ]],
  ['Quotes, Payments & Refunds', [
    'Quotes are valid for 30 days unless stated otherwise. Work begins once the deposit shown on your quote has been received.',
    ['Unless agreed otherwise, projects require a 50% deposit before work starts and the remaining balance before the website goes live or files are handed over.', 'Monthly plans (maintenance, hosting support) are billed in advance and renew automatically until cancelled.', 'Invoices not paid within 14 days may pause work on the project.', 'Deposits cover time already reserved and work started, so they are non-refundable once design work has begun. Refunds for any other amount are handled case by case.'],
  ]],
  ['Client Responsibilities', [
    'To keep your project on time, you agree to:',
    ['Provide content (text, images, logos, product details) and log-in details when requested', 'Give feedback and approvals within a reasonable time', 'Make sure you own or have permission to use every material you send us', 'Review the website before launch and report any issues'],
    'Delays in content or feedback may move the delivery date.',
  ]],
  ['Timelines & Revisions', [
    'Timelines in your quote are estimates that start once we have your deposit and the content we need. Each quote includes a set number of revision rounds; extra rounds or new features requested after approval may be charged at our hourly rate.',
  ]],
  ['White-Label & Confidentiality', [
    'For agency partners, we work under your brand. We do not contact your clients directly, place our name or links on delivered work, or share your client details with anyone, unless you ask us to.',
    'Both parties agree to keep each other\'s business information, pricing and client information confidential, during the project and after it ends.',
  ]],
  ['Intellectual Property', [
    'Once the project is paid in full, ownership of the final design and custom code we created for you transfers to you (or to your client, for white-label work).',
    'Third-party items such as themes, plugins, fonts and stock images remain under their own licenses. We may keep using our general tools, code snippets and know-how in other projects. Unless you are a white-label partner or ask us not to, we may show completed work in our portfolio.',
  ]],
  ['Domains, Hosting & Third-Party Services', [
    'Domains, hosting, plugins, payment gateways and other third-party services are provided by their own companies and are subject to their terms. We are not responsible for their outages, price changes or policy changes. Renewal fees for domains and hosting are your responsibility unless included in your plan.',
  ]],
  ['Warranties & Limitation of Liability', [
    'We fix bugs in our own work reported within 30 days of launch at no charge. We do not guarantee specific search rankings, traffic or sales results.',
    'To the fullest extent allowed by law, our total liability for any claim related to a project is limited to the amount you paid for that project. We are not liable for indirect losses such as lost profits, lost data or business interruption.',
  ]],
  ['Termination', [
    'Either party may end a project with written notice. You will pay for all work completed up to that date, and we will hand over the work that has been paid for. We may stop work if invoices are unpaid or if these Terms are broken.',
  ]],
  ['Privacy', [
    'We only use the personal information you share with us to provide our Services and reply to you. We never sell your information.',
  ]],
  ['Governing Law', [
    'These Terms are governed by the laws of the State of Texas, United States. Any dispute will be handled in the courts located in Texas.',
  ]],
  ['Changes to These Terms', [
    'We may update these Terms from time to time. The "Last updated" date at the top of this page shows when they last changed. Continuing to use our website or Services after a change means you accept the new Terms.',
  ]],
];

/* ---------- URLs ---------- */
require_once dirname(__DIR__) . '/includes/init.php';
$siteUrl = cvg_url('');

/* ================= Nothing to change below this line ================= */

$cvgRoot = dirname(__DIR__);
if (!is_dir($cvgRoot . '/assets')) $cvgRoot = __DIR__;
if (!function_exists('cvg_e')) {
  function cvg_e($s) { return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8'); }
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
  background: #0b2b26; /* Apne dark theme ke hisab se change karein */
}

::-webkit-scrollbar-thumb {
  background: radial-gradient(70% 90% at 12% 10%, rgba(28, 197, 169, 0.45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
  border-radius: 5px;  
}

/* Hover karne par thumb ka color */
::-webkit-scrollbar-thumb:hover {
  background: #00a8a8;
}html, body { margin: 0; padding: 0; }
body { overflow-x: hidden; }

/* =========================================================
   Creative Converge — Terms page. Every rule is scoped to
   .cvg-tc, so nothing here touches the rest of your site.
   ========================================================= */
.cvg-tc{
  --tc-bg:#0C0F0E; --tc-card:#111614; --tc-line:#1E2A27; --tc-mint:#00D4A3; --tc-mint-l:#5FF0C8; --tc-ink:#04342C;
  --tc-text:#F2F5F4; --tc-text-2:#C9D6D2; --tc-muted:#A9C2BC;
  --tc-grad: radial-gradient(70% 90% at 12% 10%, rgba(28,197,169,.45) 0%, rgba(28,197,169,0) 60%), linear-gradient(160deg, rgb(3,134,111) 0%, rgb(0,67,55) 48%, rgb(0,33,27) 100%);
  --tc-ease: cubic-bezier(.2,.9,.2,1);
  display:block; background:var(--tc-bg); color:var(--tc-text);
  font-family:'Poppins',sans-serif; font-size:16px; line-height:1.75; -webkit-font-smoothing:antialiased;
}
.cvg-tc *,.cvg-tc *::before,.cvg-tc *::after{box-sizing:border-box}
.cvg-tc p{margin:0}
.cvg-tc a{text-decoration:none;color:inherit}
.cvg-tc .cvg-tc-wrap{position:relative;max-width:1200px;margin:0 auto;padding:0 32px}
.cvg-tc a:focus-visible,.cvg-tc button:focus-visible{outline:2px solid var(--tc-mint-l);outline-offset:3px}

/* ===== Banner ===== */
.cvg-tc .cvg-tc-hero{position:relative;overflow:hidden;padding:170px 0 96px;background:var(--tc-grad);text-align:center}
.cvg-tc .cvg-tc-hero-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(242,245,244,.06) 1px,transparent 1px),linear-gradient(90deg,rgba(242,245,244,.06) 1px,transparent 1px);background-size:72px 72px;
  -webkit-mask-image:radial-gradient(ellipse 60% 80% at 50% 40%,#000 15%,transparent 75%);mask-image:radial-gradient(ellipse 60% 80% at 50% 40%,#000 15%,transparent 75%);animation:cvgTcGrid 20s linear infinite}
@keyframes cvgTcGrid{to{background-position:72px 72px,72px 72px}}
.cvg-tc .cvg-tc-hero-inner{z-index:1}
.cvg-tc .cvg-tc-crumbs{display:flex;justify-content:center;gap:10px;margin-bottom:22px;font-size:14px;color:rgba(242,245,244,.7)}
.cvg-tc .cvg-tc-crumbs a:hover,.cvg-tc .cvg-tc-crumbs [aria-current]{color:var(--tc-mint-l)}
.cvg-tc .cvg-tc-hero-title{margin:0;font-family:'Poppins',sans-serif;font-size:clamp(40px,6.6vw,92px);font-weight:700;line-height:1;letter-spacing:-.04em;color:var(--tc-text);text-transform:none}
.cvg-tc .cvg-tc-hero-title span{color:var(--tc-mint-l)}
.cvg-tc .cvg-tc-hero-lead{max-width:560px;margin:20px auto 0;font-size:17px;color:#D9F5EE}
.cvg-tc .cvg-tc-updated{display:inline-flex;align-items:center;gap:8px;margin-top:26px;padding:8px 16px;border-radius:999px;border:1px solid rgba(242,245,244,.25);background:rgba(10,10,10,.25);font-size:13px;font-weight:500;color:var(--tc-text-2)}
.cvg-tc .cvg-tc-updated svg{width:15px;height:15px;fill:none;stroke:var(--tc-mint-l);stroke-width:2;stroke-linecap:round}

/* ===== Body ===== */
.cvg-tc .cvg-tc-body{padding:80px 0 110px}
.cvg-tc .cvg-tc-doc{max-width:1100px;margin:0 auto}
.cvg-tc .cvg-tc-sec + .cvg-tc-sec{margin-top:34px}
.cvg-tc .cvg-tc-sec h2{margin:0 0 10px;font-family:'Poppins',sans-serif;font-size:20px;font-weight:600;line-height:1.35;letter-spacing:0;color:var(--tc-text);text-transform:none}
.cvg-tc .cvg-tc-sec p{color:var(--tc-muted);font-size:15px}
.cvg-tc .cvg-tc-sec p + p,.cvg-tc .cvg-tc-sec ul + p,.cvg-tc .cvg-tc-sec p + ul{margin-top:10px}
.cvg-tc .cvg-tc-sec ul{margin:0;padding:0 0 0 22px;list-style:disc}
.cvg-tc .cvg-tc-sec li{margin:0 0 6px;padding:0;color:var(--tc-muted);font-size:15px}
.cvg-tc .cvg-tc-sec li::before{content:none}
.cvg-tc .cvg-tc-sec li::marker{color:var(--tc-mint)}
.cvg-tc .cvg-tc-sec a{color:var(--tc-mint-l);text-decoration:underline;text-underline-offset:3px}
.cvg-tc .cvg-tc-sec a:hover{color:var(--tc-mint)}

/* ===== Responsive ===== */
@media (max-width:600px){
  .cvg-tc .cvg-tc-wrap{padding:0 16px}
  .cvg-tc .cvg-tc-hero{padding:130px 0 70px}
  .cvg-tc .cvg-tc-hero-lead{font-size:15.5px}
  .cvg-tc .cvg-tc-body{padding:56px 0 80px}
  .cvg-tc .cvg-tc-sec h2{font-size:18px}
}
@media (prefers-reduced-motion:reduce){
  .cvg-tc *,.cvg-tc *::before,.cvg-tc *::after{animation:none!important;transition:none!important}
}
</style>


<?php include __DIR__ . '/../includes/footer.php'; ?>