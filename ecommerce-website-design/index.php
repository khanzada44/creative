<?php
if (!function_exists('cvg_url')) {
  function cvg_url($path = '')
  {
    return '/' . ltrim($path, '/');
  }
}
require_once __DIR__ . '/includes/init.php';
$cc_phone      = '(855) 677-4898';
$cc_phone_link = '+18556774898';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ecommerce Store Management Services | Creative Converge</title>
  <meta name="description"
    content="Creative Converge runs your Amazon, Walmart, Etsy, TikTok Shop and eBay stores: product research, listings, orders, ads and reviews. Get a free store audit.">
  <meta property="og:title" content="Ecommerce Store Management Services | Creative Converge">
  <meta property="og:description"
    content="We run your online stores so you can grow the business. Get a free store audit.">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#050708">
  <link rel="icon"
    href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='-70 -70 140 140'%3E%3Cpath d='M38.3 -32.1 A50 50 0 1 0 38.3 32.1' fill='none' stroke='%231AD0C8' stroke-width='16' stroke-linecap='round'/%3E%3Cpath d='M23 -19.3 A30 30 0 1 0 23 19.3' fill='none' stroke='%231E8FD0' stroke-width='7' stroke-linecap='round'/%3E%3Ccircle cx='42' cy='0' r='9' fill='%232BC98F'/%3E%3C/svg%3E">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;800&amp;family=Poppins:wght@500;600;700;800;900&amp;family=Mulish:wght@400;500;600;700;800&amp;display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17742584929"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'AW-17742584929');
  </script>
</head>

<body>
  <div
    style="font-family: Mulish, system-ui, sans-serif; color: #ffffff; background: #050708; width: 100%; overflow: hidden">
    <!-- ===== OFFER BAR ===== -->
    <div class="cc-offerbar" role="region" aria-label="Limited offer">
      <div class="cc-offerbar-in">
        <span class="cc-offer-tag">Limited offer</span>
        <span class="cc-offer-txt"><strong>15% OFF</strong> winning products, shop setup &amp; automation this week</span>
        <span class="cc-cd" data-countdown aria-label="Offer ends in"><span><b data-cd="d">00</b><i>d</i></span><span><b data-cd="h">00</b><i>h</i></span><span><b data-cd="m">00</b><i>m</i></span><span><b data-cd="s">00</b><i>s</i></span></span>
        <a href="#cvg-pp-packages" class="cc-offer-cta">Claim 15% Off</a>
      </div>
    </div>
    <!-- ===== NAV ===== -->
    <header
      style="position: relative; z-index: 3; border-bottom: 1px solid rgba(255,255,255,0.07); background: rgba(5,7,8,0.85)">
      <nav aria-label="Main"
        style="max-width: 1240px; margin: 0 auto; padding: 18px 24px; display: flex; align-items: center; justify-content: space-between; gap: 24px; flex-wrap: wrap">

        <a href="/" class="cvg-alogo" aria-label="Creative Converge home">
          <svg class="cvg-alogo-mark" viewBox="-70 -70 140 140" aria-hidden="true">
            <defs>
              <linearGradient id="cvgAlogoGrad" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0" stop-color="#7EF0F1" />
                <stop offset=".5" stop-color="#1FD6D8" />
                <stop offset="1" stop-color="#0B7D80" />
              </linearGradient>
            </defs>
            <path class="cvg-alogo-ring" pathLength="1" d="M38.3 -32.1 A50 50 0 1 0 38.3 32.1" fill="none"
              stroke="url(#cvgAlogoGrad)" stroke-width="16" stroke-linecap="round" />
            <g>
              <path class="cvg-alogo-ring2" pathLength="1" d="M23 -19.3 A30 30 0 1 0 23 19.3" fill="none"
                stroke="#7EF0F1" stroke-width="5" stroke-linecap="round" />
              <animateTransform attributeName="transform" type="rotate" from="0 0 0" to="360 0 0" dur="7s" begin="1.4s"
                repeatCount="indefinite" />
            </g>
            <circle class="cvg-alogo-halo" cx="42" cy="0" r="9" fill="#1FD6D8" />
            <circle class="cvg-alogo-dot" cx="42" cy="0" r="9" fill="#1FD6D8" />
          </svg>
          <span class="cvg-alogo-text" aria-hidden="true">
            <span class="cvg-alogo-w1"><span style="--i:0">C</span><span style="--i:1">r</span><span
                style="--i:2">e</span><span style="--i:3">a</span><span style="--i:4">t</span><span
                style="--i:5">i</span><span style="--i:6">v</span><span style="--i:7">e</span></span>
            <span class="cvg-alogo-w2"><span style="--i:0">C</span><span style="--i:1">o</span><span
                style="--i:2">n</span><span style="--i:3">v</span><span style="--i:4">e</span><span
                style="--i:5">r</span><span style="--i:6">g</span><span style="--i:7">e</span><span style="--i:8"
                class="cvg-alogo-dotc"></span></span>
          </span>
        </a>

        <div class="cc-navlinks" style="align-items: center; gap: 30px; font-size: 14px; font-weight: 600">

        </div>
        <div style="display: flex; align-items: center; gap: 16px">
          <a class="cc-hide-sm" href="tel:<?= $cc_phone_link ?>" style="font-size: 14px; font-weight: 700; color: #ffffff"><?= $cc_phone ?></a>
          <a class="cc-btn" href="#audit"
            style="display: inline-flex; align-items: center; min-height: 44px; padding: 0 22px; border-radius: 999px; background: #1fd6d8; color: #04201f; font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px">Free
            Store Audit</a>
        </div>
      </nav>
    </header>
    <!-- ===== HERO ===== -->
    <section id="top" class="cc-hero" style="position: relative; padding: 90px 24px 120px; isolation: isolate; overflow: hidden">
      <div class="cc-hero-photo" aria-hidden="true" style="background-image: url('https://images.unsplash.com/photo-1770013413878-2530e2c3d82b?auto=format&fit=crop&w=1800&q=70')"></div>

      <div class="cc-orb" aria-hidden="true"
        style="position: absolute; z-index: -1; top: -120px; right: -80px; width: 620px; height: 620px; border-radius: 50%; background: radial-gradient(circle, rgba(31,214,216,0.30), transparent 65%)">
      </div>
      <div class="cc-orb" aria-hidden="true"
        style="position: absolute; z-index: -1; bottom: -200px; left: -160px; width: 560px; height: 560px; border-radius: 50%; background: radial-gradient(circle, rgba(11,125,128,0.35), transparent 65%); animation-delay: -6s">
      </div>
      <div aria-hidden="true"
        style="position: absolute; z-index: -1; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px); background-size: 64px 64px; mask-image: radial-gradient(ellipse at 60% 40%, #000 30%, transparent 75%); -webkit-mask-image: radial-gradient(ellipse at 60% 40%, #000 30%, transparent 75%)">
      </div>
      <div style="max-width: 1240px; margin: 0 auto; display: flex; flex-wrap: wrap; align-items: center; gap: 64px">
        <div style="flex: 1 1 520px; min-width: 0">
          <ul class="cc-hero-pills" aria-label="What we do">
            <li><span class="cc-hp-ic cc-hp-ic--a" aria-hidden="true"><svg viewBox="0 0 24 24">
                  <path d="M12 3l2.6 5.6L20 9.5l-4 4 1 5.5-5-2.8L7 19l1-5.5-4-4 5.4-.9z" />
                </svg></span>Winning products</li>
            <li><span class="cc-hp-ic cc-hp-ic--b" aria-hidden="true"><svg viewBox="0 0 24 24">
                  <path d="M4 10h16l-1.5 10h-13zM8 10V7a4 4 0 0 1 8 0v3" />
                </svg></span>Shop setup</li>
            <li><span class="cc-hp-ic cc-hp-ic--c" aria-hidden="true"><svg viewBox="0 0 24 24">
                  <path d="M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM12 2v3M12 19v3M2 12h3M19 12h3M5 5l2 2M17 17l2 2M5 19l2-2M17 7l2-2" />
                </svg></span>Automation</li>
          </ul>
          <h1
            style="margin: 0 0 24px; font-family: Poppins, sans-serif; font-weight: 800; font-size: 10px; line-height: 1.02; letter-spacing: -0.035em">
            Launch Your Own Automated<br> E-Commerce Store for <br>Just $499!<span style="color: #1fd6d8">.</span></h1>
          <h2>$340.2 Billion in US Online Retail Sales in Q2 2026.</h2>
          <p
            style="margin: 0 0 34px; max-width: 560px; font-size: 18.5px; line-height: 1.65; color: rgba(255,255,255,0.74)">
            7.7 million stores worldwide using dropshipping as their main method.</p>


          <form class="cc-heroform cc-form" aria-label="Get a free product and store plan"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px; max-width: 580px; padding: 10px; border-radius: 22px; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.14)"
            action="email.php"
            method="post"
            novalidate>

            <!-- spam trap: real users never see or fill this -->
            <input type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true"
              style="position:absolute;left:-9999px;width:1px;height:1px;opacity:0">

            <!-- tells email.php where the lead came from -->
            <input type="hidden" id="msg_subject" name="msg_subject" value="Free store audit request (ecommerce landing page)">

            <label for="name" style="display: block; min-width: 0">
              <span class="cc-sr">Your name</span>
              <input id="name" type="text" name="name" autocomplete="name" placeholder="Your name" required maxlength="100"
                style="width: 100%; min-height: 50px; padding: 0 18px; border: 1px solid rgba(255,255,255,0.12); border-radius: 14px; background: rgba(255,255,255,0.05); color: #ffffff; font: inherit; font-size: 16px; outline: none">
            </label>

            <label for="email" style="display: block; min-width: 0">
              <span class="cc-sr">Your email</span>
              <input id="email" type="email" name="email" autocomplete="email" placeholder="Your email" required
                style="width: 100%; min-height: 50px; padding: 0 18px; border: 1px solid rgba(255,255,255,0.12); border-radius: 14px; background: rgba(255,255,255,0.05); color: #ffffff; font: inherit; font-size: 16px; outline: none">
            </label>

            <label for="phone" style="display: block; min-width: 0">
              <span class="cc-sr">Your phone number</span>
              <input id="phone" type="tel" name="phone" autocomplete="tel" inputmode="tel" maxlength="20" placeholder="Phone number" required
                pattern="[0-9+()\-\s]{7,20}" title="Please enter a valid phone number"
                aria-describedby="cvg-phone-error"
                style="width: 100%; min-height: 50px; padding: 0 18px; border: 1px solid rgba(255,255,255,0.12); border-radius: 14px; background: rgba(255,255,255,0.05); color: #ffffff; font: inherit; font-size: 16px; outline: none">
              <span id="cvg-phone-error" class="cvg-consult-error" aria-live="polite"
                style="display: block; margin-top: 4px; font-size: 13px; color: #ff9a8a"></span>
            </label>

            <button class="cc-btn" type="submit"
              style="min-height: 50px; padding: 0 26px; border: 0; border-radius: 14px; background: #1fd6d8; color: #04201f; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px; cursor: pointer">Get
              My Free Audit</button>
          </form>
        </div>
        <!-- hero visual: live dashboard -->
        <div style="flex: 1 1 440px; min-width: 0; display: flex; justify-content: center">
          <div style="position: relative; width: 100%; max-width: 480px; padding: 30px 10px">
            <a href="#cvg-pp-packages" class="cc-sticker" aria-label="15% off all packages this week">
              <svg viewBox="0 0 200 200" aria-hidden="true">
                <defs>
                  <path id="ccStickerPath" d="M100,100 m-74,0 a74,74 0 1,1 148,0 a74,74 0 1,1 -148,0"></path>
                </defs>
                <text class="cc-sticker-ring">
                  <textPath href="#ccStickerPath">THIS WEEK ONLY • ALL PACKAGES • THIS WEEK ONLY • ALL PACKAGES •</textPath>
                </text>
              </svg>
              <span class="cc-sticker-core"><b>15%</b><span>OFF</span></span>
            </a>
            <div
              style="position: relative; border-radius: 24px; padding: 24px; background: linear-gradient(160deg, rgba(20,30,34,0.95), rgba(8,12,14,0.95)); border: 1px solid rgba(255,255,255,0.12);">
              <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px">
                <div>
                  <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.55)">Sample dashboard</span>
                  <span style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 17px">All stores ·
                    Today</span>
                </div>
              </div>
              <div style="border-radius: 16px; padding: 16px; background: rgba(255,255,255,0.04); margin-bottom: 16px">
                <div style="display: flex; justify-content: space-between; align-items: baseline">
                  <span style="font-size: 13px; color: rgba(255,255,255,0.6)">Orders this week</span>
                  <span style="font-size: 12px; font-weight: 800; color: #7ef0f1">▲ trending up</span>
                </div>
                <svg viewBox="0 0 400 110" width="100%" height="110" aria-hidden="true"
                  style="display: block; margin-top: 8px">
                  <defs>
                    <linearGradient id="ccArea" x1="0" y1="0" x2="0" y2="1">
                      <stop offset="0" stop-color="#1fd6d8" stop-opacity="0.35"></stop>
                      <stop offset="1" stop-color="#1fd6d8" stop-opacity="0"></stop>
                    </linearGradient>
                  </defs>
                  <path d="M0 92 C40 88 60 70 100 74 S160 58 200 50 S260 46 300 30 S360 16 400 10 L400 110 L0 110 Z"
                    fill="url(#ccArea)"></path>
                  <path class="cc-draw" d="M0 92 C40 88 60 70 100 74 S160 58 200 50 S260 46 300 30 S360 16 400 10"
                    fill="none" stroke="#1fd6d8" stroke-width="3" stroke-linecap="round"></path>
                  <circle class="cc-pulse" cx="400" cy="10" r="5" fill="#7ef0f1"></circle>
                </svg>
              </div>
              <span style="display: block; margin-bottom: 10px; font-size: 13px; color: rgba(255,255,255,0.6)">Incoming
                orders</span>
              <div
                style="height: 214px; overflow: hidden; mask-image: linear-gradient(180deg, transparent, #000 14%, #000 86%, transparent); -webkit-mask-image: linear-gradient(180deg, transparent, #000 14%, #000 86%, transparent)">
                <div class="cc-feed">
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #ff9900; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">A</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Wireless
                        earbuds</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">Amazon ·
                        Shipped</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$39</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #f1641e; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">E</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Hand-thrown
                        ceramic mug</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">Etsy · Paid</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$24</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #fe2c55; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">T</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">LED
                        desk lamp</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">TikTok Shop ·
                        New</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$29</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #0071ce; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">W</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Yoga
                        mat set</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">Walmart ·
                        Shipped</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$45</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #86b817; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">e</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Vintage
                        camera lens</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">eBay · Sold</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$89</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #ff9900; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">A</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Stainless
                        water bottle</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">Amazon ·
                        Delivered</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$19</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #ff9900; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">A</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Wireless
                        earbuds</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">Amazon ·
                        Shipped</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$39</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #f1641e; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">E</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Hand-thrown
                        ceramic mug</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">Etsy · Paid</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$24</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #fe2c55; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">T</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">LED
                        desk lamp</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">TikTok Shop ·
                        New</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$29</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #0071ce; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">W</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Yoga
                        mat set</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">Walmart ·
                        Shipped</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$45</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #86b817; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">e</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Vintage
                        camera lens</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">eBay · Sold</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$89</span>
                  </div>
                  <div
                    style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; margin-bottom: 8px; border-radius: 12px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06)">
                    <span
                      style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #ff9900; color: #ffffff; font-family: Poppins, sans-serif; font-weight: 800; font-size: 13px; flex: none">A</span>
                    <span style="flex: 1; min-width: 0">
                      <span
                        style="display: block; font-size: 14px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis">Stainless
                        water bottle</span>
                      <span style="display: block; font-size: 12px; color: rgba(255,255,255,0.5)">Amazon ·
                        Delivered</span>
                    </span>
                    <span
                      style="font-family: Poppins, sans-serif; font-weight: 700; font-size: 14px; color: #7ef0f1">$19</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- floating chips -->
            <div class="cc-float"
              style="position: absolute; left: -34px; top: 196px; display: flex; align-items: center; gap: 10px; padding: 12px 16px; border-radius: 16px; background: #ffffff; color: #0b0f12; box-shadow: 0 20px 40px -14px rgba(0,0,0,0.7)">
              <span
                style="display: grid; place-items: center; width: 34px; height: 34px; border-radius: 10px; background: #e6fbfb; color: #0b7d80">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M3 7l9-4 9 4-9 4-9-4zM3 7v10l9 4 9-4V7"></path>
                </svg>
              </span>
              <span><span style="display: block; font-size: 11px; color: #5f6b70">Shipped today</span><span
                  style="font-family: Poppins, sans-serif; font-weight: 800; font-size: 15px">All on time</span></span>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- ===== RIBBONS ===== -->
    <section class="cc-ribbons" aria-label="Marketplaces we work on">
      <div class="cc-ribbon cc-ribbon--a">
        <div class="cc-ribbon-track"><span>Amazon</span><span>Walmart</span><span>Etsy</span><span>TikTok Shop</span><span>eBay</span><span>Shopify</span><span>Amazon</span><span>Walmart</span><span>Etsy</span><span>TikTok Shop</span><span>eBay</span><span>Shopify</span><span>Amazon</span><span>Walmart</span><span>Etsy</span><span>TikTok Shop</span><span>eBay</span><span>Shopify</span><span>Amazon</span><span>Walmart</span><span>Etsy</span><span>TikTok Shop</span><span>eBay</span><span>Shopify</span></div>
      </div>
      <div class="cc-ribbon cc-ribbon--b" aria-hidden="true">
        <div class="cc-ribbon-track"><span>15% off this week</span><span>Free store audit</span><span>Listings that sell</span><span>Ads that pay back</span><span>Orders on autopilot</span><span>Reviews on repeat</span><span>15% off this week</span><span>Free store audit</span><span>Listings that sell</span><span>Ads that pay back</span><span>Orders on autopilot</span><span>Reviews on repeat</span><span>15% off this week</span><span>Free store audit</span><span>Listings that sell</span><span>Ads that pay back</span><span>Orders on autopilot</span><span>Reviews on repeat</span><span>15% off this week</span><span>Free store audit</span><span>Listings that sell</span><span>Ads that pay back</span><span>Orders on autopilot</span><span>Reviews on repeat</span></div>
      </div>
    </section>
    <!-- ===== BUDGET → PRODUCTS → SHOP → AUTOPILOT ===== -->
    <section id="budget" class="cc-bud" aria-labelledby="cc-bud-title">
      <span class="cc-bud-mesh" aria-hidden="true"></span>
      <div class="cc-bud-wrap">
        <div class="cc-bud-head cc-reveal">
          <p class="cc-bud-eyebrow">built around your budget</p>
          <h2 class="cc-bud-title" id="cc-bud-title">Your budget in.<br><span class="cc-shine">A selling store</span> out.</h2>
          <p class="cc-bud-sub">One team handles all three steps. We find products that sell within your budget, build your shop, then automate the daily work.</p>
        </div>

        <ol class="cc-flow" aria-label="How we turn your budget into a store">
          <li class="cc-flow-step cc-flow-step--a">
            <span class="cc-flow-num">Step 1</span>
            <h3>Winning products, on budget</h3>
            <p>We research demand, competition and margin, then shortlist products your budget can stock and still profit from.</p>
            <div class="cc-prod" aria-hidden="true">
              <div class="cc-prod-stack">
                <div class="cc-prod-item"><span class="cc-prod-img cc-prod-img--1"></span><b>Portable blender</b><i>Kitchen</i></div>
                <div class="cc-prod-item"><span class="cc-prod-img cc-prod-img--2"></span><b>Pet hair roller</b><i>Pets</i></div>
                <div class="cc-prod-item"><span class="cc-prod-img cc-prod-img--3"></span><b>LED strip lights</b><i>Home</i></div>
              </div>
              <div class="cc-meter"><span>Demand</span><em><u style="--w:86%"></u></em></div>
              <div class="cc-meter"><span>Competition</span><em><u style="--w:32%" class="is-low"></u></em></div>
              <div class="cc-meter"><span>Margin</span><em><u style="--w:72%"></u></em></div>
              <span class="cc-prod-fit"><svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M5 12.5l4.5 4.5L19 7.5" />
                </svg>Fits your budget</span>
            </div>
          </li>
          <li class="cc-flow-step cc-flow-step--b">
            <span class="cc-flow-num">Step 2</span>
            <h3>Shop set up for you</h3>
            <p>Store, listings, photos, checkout and payments, built and connected on the marketplaces you choose.</p>
            <div class="cc-shop" aria-hidden="true">
              <div class="cc-shop-bar"><i></i><i></i><i></i><span>yourstore.com</span></div>
              <div class="cc-shop-hero"></div>
              <div class="cc-shop-grid"><span></span><span></span><span></span><span></span><span></span><span></span></div>

            </div>
          </li>
          <li class="cc-flow-step cc-flow-step--c">
            <span class="cc-flow-num">Step 3</span>
            <h3>Automated from day one</h3>
            <p>Orders, stock sync, repricing and review requests run on their own, and our team watches over them daily.</p>
            <ul class="cc-auto" aria-hidden="true">
              <li><span>Order processing</span><i></i></li>
              <li><span>Inventory sync</span><i></i></li>
              <li><span>Smart repricing</span><i></i></li>
              <li><span>Review requests</span><i></i></li>
              <li class="cc-auto-run"><b></b>Running 24/7</li>
            </ul>
          </li>
        </ol>

        <div class="cc-bp" data-bp>
          <div class="cc-bp-left">
            <p class="cc-bp-q" id="cc-bp-q">What's your budget?</p>
            <div class="cc-bp-chips" role="radiogroup" aria-labelledby="cc-bp-q">
              <button type="button" role="radio" aria-checked="false" data-bp-key="0">Under $800</button>
              <button type="button" role="radio" aria-checked="true" data-bp-key="1">$800 – $1,500</button>
              <button type="button" role="radio" aria-checked="false" data-bp-key="2">$1,500 – $3,000</button>
              <button type="button" role="radio" aria-checked="false" data-bp-key="3">$3,000 – $6,000</button>
              <button type="button" role="radio" aria-checked="false" data-bp-key="4">$6,000+</button>
            </div>
            <p class="cc-bp-offer"><span class="cc-bp-offer-badge">-15%</span>This week's price. Offer ends in <b data-cd-short>—</b></p>
          </div>
          <div class="cc-bp-right" aria-live="polite">
            <p class="cc-bp-label">Recommended for your budget</p>
            <h3 class="cc-bp-name" data-bp-name>Essential-Commerce Package</h3>
            <p class="cc-bp-price"><s data-bp-was>$999.00</s><span class="cc-bp-now">$<b data-bp-now>849</b><small data-bp-cents>.15</small></span><span class="cc-bp-save" data-bp-save>Save $149.85</span></p>
            <div class="cc-bp-cols">
              <div>
                <p class="cc-bp-h"><span class="cc-hp-ic cc-hp-ic--a" aria-hidden="true"><svg viewBox="0 0 24 24">
                      <path d="M12 3l2.6 5.6L20 9.5l-4 4 1 5.5-5-2.8L7 19l1-5.5-4-4 5.4-.9z" />
                    </svg></span>Products</p>
                <p data-bp-p>Product picks checked for demand, competition and margin, sized to your budget.</p>
              </div>
              <div>
                <p class="cc-bp-h"><span class="cc-hp-ic cc-hp-ic--b" aria-hidden="true"><svg viewBox="0 0 24 24">
                      <path d="M4 10h16l-1.5 10h-13zM8 10V7a4 4 0 0 1 8 0v3" />
                    </svg></span>Shop setup</p>
                <p data-bp-s>Product pages, responsive design, secure checkout, SEO-friendly URLs and SSL.</p>
              </div>
              <div>
                <p class="cc-bp-h"><span class="cc-hp-ic cc-hp-ic--c" aria-hidden="true"><svg viewBox="0 0 24 24">
                      <path d="M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM12 2v3M12 19v3M2 12h3M19 12h3M5 5l2 2M17 17l2 2M5 19l2-2M17 7l2-2" />
                    </svg></span>Automation</p>
                <p data-bp-a>Inventory management system and basic website analytics.</p>
              </div>
            </div>
            <div class="cc-bp-ctas">
              <a href="#audit" class="cc-bp-btn cc-bp-btn--main">Plan My Store For This Budget</a>
              <button type="button" class="cc-bp-btn cc-bp-btn--ghost" data-chat>Chat With An Expert</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ===== PAIN POINTS ===== -->
    <section class="cc-light cc-light--warm" style="padding: 120px 24px 90px; background: #fff5ef; color: #0b0f12">
      <div class="cc-reveal" style="max-width: 1240px; margin: 0 auto">
        <div style="text-align: center; max-width: 780px; margin: 0 auto 60px">
          <p
            style="margin: 0 0 14px; display: inline-flex; align-items: center; gap: 14px; font-family: Poppins, sans-serif; font-weight: 500; font-size: 14px; color: rgba(11,15,18,0.85)">
            <span style="display: inline-block; width: 48px; height: 2px; background: #ff5e5b"></span>sound
            familiar?<span style="display: inline-block; width: 48px; height: 2px; background: #ff5e5b"></span>
          </p>
          <h2
            style="margin: 0; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(2.2rem, 1.5rem + 2.4vw, 3.5rem); line-height: 1.08; letter-spacing: -0.025em">
            Running a store shouldn't<br>run your whole life<span style="color: #0a8a8d">.</span></h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(270px, 1fr)); gap: 18px">
          <article class="cc-lift"
            style="position: relative; padding: 34px 30px; border-radius: 22px; background: #ffffff; box-shadow: 0 24px 50px -32px rgba(11,15,18,0.35); border: 1px solid rgba(11,15,18,0.1); overflow: hidden">
            <span
              style="position: absolute; right: 18px; top: 8px; font-family: Poppins, sans-serif; font-weight: 900; font-size: 90px; color: rgba(11,15,18,0.04); line-height: 1"
              aria-hidden="true">01</span>
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: rgba(254,90,90,0.12); color: #e5484d; margin-bottom: 22px">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 7v5l3 2M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18z"></path>
              </svg>
            </span>
            <h3 style="margin: 0 0 10px; font-family: Poppins, sans-serif; font-weight: 700; font-size: 20px">Orders eat
              your day</h3>
            <p style="margin: 0 0 20px; font-size: 15.5px; line-height: 1.6; color: rgba(11,15,18,0.66)">Packing
              slips, tracking numbers and returns leave no time for growth.</p>
            <p
              style="margin: 0; padding-top: 16px; border-top: 1px solid rgba(11,15,18,0.08); display: flex; gap: 10px; font-size: 15px; font-weight: 700; color: #0b7d80">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                <path d="M5 12.5l4.5 4.5L19 7.5"></path>
              </svg>We process every order, every day.
            </p>
          </article>
          <article class="cc-lift"
            style="position: relative; padding: 34px 30px; border-radius: 22px; background: #ffffff; box-shadow: 0 24px 50px -32px rgba(11,15,18,0.35); border: 1px solid rgba(11,15,18,0.1); overflow: hidden">
            <span
              style="position: absolute; right: 18px; top: 8px; font-family: Poppins, sans-serif; font-weight: 900; font-size: 90px; color: rgba(11,15,18,0.04); line-height: 1"
              aria-hidden="true">02</span>
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: rgba(254,90,90,0.12); color: #e5484d; margin-bottom: 22px">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M3 3v18h18M7 14l4-4 3 3 5-6"></path>
              </svg>
            </span>
            <h3 style="margin: 0 0 10px; font-family: Poppins, sans-serif; font-weight: 700; font-size: 20px">Listings
              that don’t sell</h3>
            <p style="margin: 0 0 20px; font-size: 15.5px; line-height: 1.6; color: rgba(11,15,18,0.66)">Weak titles
              and photos bury your products on page five.</p>
            <p
              style="margin: 0; padding-top: 16px; border-top: 1px solid rgba(11,15,18,0.08); display: flex; gap: 10px; font-size: 15px; font-weight: 700; color: #0b7d80">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                <path d="M5 12.5l4.5 4.5L19 7.5"></path>
              </svg>We rewrite listings that rank and convert.
            </p>
          </article>
          <article class="cc-lift"
            style="position: relative; padding: 34px 30px; border-radius: 22px; background: #ffffff; box-shadow: 0 24px 50px -32px rgba(11,15,18,0.35); border: 1px solid rgba(11,15,18,0.1); overflow: hidden">
            <span
              style="position: absolute; right: 18px; top: 8px; font-family: Poppins, sans-serif; font-weight: 900; font-size: 90px; color: rgba(11,15,18,0.04); line-height: 1"
              aria-hidden="true">03</span>
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: rgba(254,90,90,0.12); color: #e5484d; margin-bottom: 22px">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 2c1 4 6 5 6 11a6 6 0 0 1-12 0c0-3 2-4 2-7 2 1 3 3 3 5 1-2 1-6 1-9z"></path>
              </svg>
            </span>
            <h3 style="margin: 0 0 10px; font-family: Poppins, sans-serif; font-weight: 700; font-size: 20px">Ads
              burning cash</h3>
            <p style="margin: 0 0 20px; font-size: 15.5px; line-height: 1.6; color: rgba(11,15,18,0.66)">Clicks go
              up, sales don’t, and you can’t tell which campaign works.</p>
            <p
              style="margin: 0; padding-top: 16px; border-top: 1px solid rgba(11,15,18,0.08); display: flex; gap: 10px; font-size: 15px; font-weight: 700; color: #0b7d80">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                <path d="M5 12.5l4.5 4.5L19 7.5"></path>
              </svg>We run ads around profit, not clicks.
            </p>
          </article>
        </div>
      </div>
    </section>
    <!-- ===== MARKETPLACE SHOWCASE ===== -->
    <section id="marketplaces"
      style="position: relative; padding: 100px 24px 120px; background: radial-gradient(70% 60% at 50% 0%, rgba(31,214,216,0.12), transparent 70%), #050708">
      <div class="cc-reveal" style="max-width: 1240px; margin: 0 auto">
        <div
          style="display: flex; flex-wrap: wrap; align-items: flex-end; justify-content: space-between; gap: 24px; margin-bottom: 40px">
          <div style="flex: 1 1 520px; min-width: 0">
            <p
              style="margin: 0 0 14px; display: flex; align-items: center; gap: 14px; font-family: Poppins, sans-serif; font-weight: 500; font-size: 14px; color: rgba(255,255,255,0.85)">
              <span style="display: inline-block; width: 48px; height: 2px; background: #ffffff"></span>pick your
              marketplace
            </p>
            <h2
              style="margin: 0; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(2.2rem, 1.5rem + 2.4vw, 3.5rem); line-height: 1.08; letter-spacing: -0.025em">
              One team. Every channel<span style="color: #1fd6d8">.</span></h2>
          </div>
          <p
            style="margin: 0; flex: 1 1 340px; max-width: 440px; font-size: 16.5px; line-height: 1.65; color: rgba(255,255,255,0.7)">
            Each marketplace has its own rules, fees and buyers. We run each one the way it needs to be run.</p>
        </div>
        <div role="tablist" aria-label="Marketplaces"
          style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 26px">
          <button class="cc-tab" type="button" role="tab" id="cc-tab-0" aria-controls="cc-panel-0" aria-selected="true"
            tabindex="0" data-tab="0"
            style="display: inline-flex; align-items: center; gap: 10px; min-height: 50px; padding: 0 22px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.16); background: rgba(255,255,255,0.04); color: #ffffff; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px; cursor: pointer">
            <span style="width: 10px; height: 10px; border-radius: 50%; background: #ff9900"></span>Amazon
          </button>
          <button class="cc-tab" type="button" role="tab" id="cc-tab-1" aria-controls="cc-panel-1" aria-selected="false"
            tabindex="-1" data-tab="1"
            style="display: inline-flex; align-items: center; gap: 10px; min-height: 50px; padding: 0 22px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.16); background: rgba(255,255,255,0.04); color: #ffffff; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px; cursor: pointer">
            <span style="width: 10px; height: 10px; border-radius: 50%; background: #f1641e"></span>Etsy
          </button>
          <button class="cc-tab" type="button" role="tab" id="cc-tab-2" aria-controls="cc-panel-2" aria-selected="false"
            tabindex="-1" data-tab="2"
            style="display: inline-flex; align-items: center; gap: 10px; min-height: 50px; padding: 0 22px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.16); background: rgba(255,255,255,0.04); color: #ffffff; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px; cursor: pointer">
            <span style="width: 10px; height: 10px; border-radius: 50%; background: #25f4ee"></span>TikTok Shop
          </button>
          <button class="cc-tab" type="button" role="tab" id="cc-tab-3" aria-controls="cc-panel-3" aria-selected="false"
            tabindex="-1" data-tab="3"
            style="display: inline-flex; align-items: center; gap: 10px; min-height: 50px; padding: 0 22px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.16); background: rgba(255,255,255,0.04); color: #ffffff; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px; cursor: pointer">
            <span style="width: 10px; height: 10px; border-radius: 50%; background: #4aa8ff"></span>Walmart
          </button>
          <button class="cc-tab" type="button" role="tab" id="cc-tab-4" aria-controls="cc-panel-4" aria-selected="false"
            tabindex="-1" data-tab="4"
            style="display: inline-flex; align-items: center; gap: 10px; min-height: 50px; padding: 0 22px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.16); background: rgba(255,255,255,0.04); color: #ffffff; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px; cursor: pointer">
            <span style="width: 10px; height: 10px; border-radius: 50%; background: #86b817"></span>eBay
          </button>
        </div>
        <div class="cc-panel" role="tabpanel" id="cc-panel-0" aria-labelledby="cc-tab-0"
          style="display: flex; flex-wrap: wrap; gap: 0; border-radius: 28px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1); background: #0b0f12">
          <!-- illustration -->
          <div
            style="flex: 1 1 480px; min-width: 0; position: relative; background: radial-gradient(80% 80% at 50% 30%, #1d2a33, #0d1418); display: grid; place-items: center; padding: 28px; min-height: 380px">
            <svg class="cc-scene" viewBox="0 0 480 360" width="100%" style="max-width: 520px" role="img"
              aria-label="Illustration of boxes moving along a fulfilment conveyor">
              <rect x="40" y="40" width="400" height="200" rx="18" fill="rgba(255,255,255,0.04)"
                stroke="rgba(255,255,255,0.08)"></rect>
              <g fill="rgba(255,255,255,0.07)">
                <rect x="70" y="70" width="70" height="140" rx="6"></rect>
                <rect x="160" y="70" width="70" height="140" rx="6"></rect>
                <rect x="250" y="70" width="70" height="140" rx="6"></rect>
                <rect x="340" y="70" width="70" height="140" rx="6"></rect>
              </g>
              <g fill="#c8955a">
                <rect x="78" y="80" width="54" height="40" rx="3"></rect>
                <rect x="78" y="128" width="54" height="40" rx="3"></rect>
                <rect x="168" y="112" width="54" height="56" rx="3"></rect>
                <rect x="258" y="80" width="54" height="40" rx="3"></rect>
                <rect x="348" y="96" width="54" height="72" rx="3"></rect>
              </g>
              <g stroke="#e8c48f" stroke-width="3">
                <path d="M105 80v40M105 128v40M195 112v56M285 80v40M375 96v72"></path>
              </g>
              <rect x="20" y="276" width="440" height="26" rx="13" fill="#1b2328"></rect>
              <path class="cc-belt" d="M34 289H446" stroke="#3a4a52" stroke-width="6" stroke-linecap="round"></path>
              <g class="cc-slide">
                <rect x="40" y="232" width="62" height="44" rx="4" fill="#d8a46a"></rect>
                <path d="M71 232v44" stroke="#f2d2a0" stroke-width="3"></path>
                <path d="M48 244h20" stroke="#8a5a2c" stroke-width="3" stroke-linecap="round"></path>
              </g>
              <g class="cc-slide-2">
                <rect x="40" y="240" width="48" height="36" rx="4" fill="#c8955a"></rect>
                <path d="M64 240v36" stroke="#f2d2a0" stroke-width="3"></path>
              </g>
              <g class="cc-bob">
                <rect x="330" y="18" width="128" height="40" rx="20" fill="#1fd6d8"></rect><text x="394" y="44"
                  text-anchor="middle" font-family="Poppins, sans-serif" font-weight="800" font-size="16"
                  fill="#04201f">FBA ready</text>
              </g>
              <g class="cc-bob-2">
                <rect x="24" y="14" width="150" height="40" rx="20" fill="#ffffff"></rect><text x="99" y="40"
                  text-anchor="middle" font-family="Poppins, sans-serif" font-weight="700" font-size="14"
                  fill="#0b0f12">Stock synced ✓</text>
              </g>
            </svg>
          </div>
          <!-- copy -->
          <div class="cc-scene"
            style="flex: 1 1 420px; min-width: 0; padding: 48px 44px; display: flex; flex-direction: column; gap: 18px">
            <span
              style="display: inline-flex; align-self: flex-start; align-items: center; padding: 6px 14px; border-radius: 999px; background: rgba(255,255,255,0.06); font-size: 13px; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; color: #ff9900"><span
                style="width: 8px; height: 8px; border-radius: 50%;"></span>Amazon</span>
            <h3
              style="margin: 0; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(1.7rem, 1.3rem + 1.2vw, 2.4rem); line-height: 1.12; letter-spacing: -0.02em">
              Win the Buy Box and keep it.</h3>
            <p style="margin: 0; font-size: 16.5px; line-height: 1.65; color: rgba(255,255,255,0.7)">Wholesale FBA or
              your own private label brand, we handle sourcing, listings, shipments to Amazon warehouses, ads and
              account health.</p>
            <ul
              style="margin: 6px 0 8px; padding: 0; list-style: none; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px 20px">
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Product &amp; supplier research
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Keyword-rich listings + A+ content
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>FBA shipments &amp; restock planning
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>PPC campaigns &amp; account health
              </li>
            </ul>
            <div style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center">
              <a class="cc-btn" href="#audit"
                style="display: inline-flex; align-items: center; gap: 10px; min-height: 54px; padding: 0 28px; border-radius: 999px; background: #1fd6d8; color: #04201f; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px">Grow
                my Amazon store
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12h14M13 6l6 6-6 6"></path>
                </svg>
              </a>
              <span style="font-size: 13px; color: rgba(255,255,255,0.55)">Free audit · Reply in [24] hours</span>
            </div>
          </div>
        </div>
        <div class="cc-panel" role="tabpanel" id="cc-panel-1" aria-labelledby="cc-tab-1" hidden
          style="display: flex; flex-wrap: wrap; gap: 0; border-radius: 28px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1); background: #0b0f12">
          <!-- illustration -->
          <div
            style="flex: 1 1 480px; min-width: 0; position: relative; background: radial-gradient(80% 80% at 50% 30%, #3a2014, #1a0d07); display: grid; place-items: center; padding: 28px; min-height: 380px">
            <svg class="cc-scene" viewBox="0 0 480 360" width="100%" style="max-width: 520px" role="img"
              aria-label="Illustration of handmade products: a mug, a yarn ball and a price tag">
              <rect x="30" y="250" width="420" height="16" rx="8" fill="rgba(0,0,0,0.25)"></rect>
              <g class="cc-bob">
                <path d="M90 140h110v96a14 14 0 0 1-14 14h-82a14 14 0 0 1-14-14z" fill="#fff4ea"></path>
                <path d="M200 160h18a22 22 0 0 1 0 44h-18" fill="none" stroke="#fff4ea" stroke-width="12"></path>
                <path d="M100 176h90" stroke="#f1641e" stroke-width="8" stroke-linecap="round"></path>
                <path d="M118 196h54" stroke="#ffb38a" stroke-width="6" stroke-linecap="round"></path>
                <path d="M120 118c0-14 12-14 12-28M150 118c0-14 12-14 12-28" stroke="rgba(255,255,255,0.5)"
                  stroke-width="4" stroke-linecap="round" fill="none"></path>
              </g>
              <g class="cc-bob-2">
                <circle cx="320" cy="200" r="52" fill="#f1641e"></circle>
                <path
                  d="M276 176c30 6 60 30 74 66M284 214c26-4 54 6 72 24M300 154c22 14 40 40 44 72M330 150c8 24 4 54-10 82"
                  stroke="#ffb38a" stroke-width="4" fill="none" stroke-linecap="round"></path>
                <path d="M368 222c30 10 50 4 62-16" stroke="#ffb38a" stroke-width="4" fill="none"
                  stroke-linecap="round"></path>
              </g>
              <g class="cc-float">
                <path d="M300 60h110l26 26-26 26H300z" fill="#ffffff"></path>
                <circle cx="318" cy="86" r="6" fill="#f1641e"></circle><text x="372" y="94" text-anchor="middle"
                  font-family="Poppins, sans-serif" font-weight="800" font-size="22" fill="#2a1710">$24</text>
              </g>
              <g class="cc-bob" fill="#ffc94d">
                <path d="M70 70l5 10 11 2-8 8 2 11-10-5-10 5 2-11-8-8 11-2z"></path>
                <path d="M230 50l4 8 9 1-6 6 1 9-8-4-8 4 1-9-6-6 9-1z"></path>
              </g>
              <g class="cc-bob-2">
                <rect x="40" y="290" width="190" height="40" rx="20" fill="#ffffff"></rect><text x="135" y="316"
                  text-anchor="middle" font-family="Poppins, sans-serif" font-weight="700" font-size="14"
                  fill="#2a1710">Handmade · Ships in 2 days</text>
              </g>
            </svg>
          </div>
          <!-- copy -->
          <div class="cc-scene"
            style="flex: 1 1 420px; min-width: 0; padding: 48px 44px; display: flex; flex-direction: column; gap: 18px">
            <span
              style="display: inline-flex; align-self: flex-start; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; background: rgba(255,255,255,0.06); font-size: 13px; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; color: #f1641e"><span
                style="width: 8px; height: 8px; border-radius: 50%; background: #f1641e"></span>Etsy</span>
            <h3
              style="margin: 0; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(1.7rem, 1.3rem + 1.2vw, 2.4rem); line-height: 1.12; letter-spacing: -0.02em">
              Turn your craft into a busy shop.</h3>
            <p style="margin: 0; font-size: 16.5px; line-height: 1.65; color: rgba(255,255,255,0.7)">Search-friendly
              listings, print-on-demand setups and warm customer care that earns repeat buyers and five-star reviews.
            </p>
            <ul
              style="margin: 6px 0 8px; padding: 0; list-style: none; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px 20px">
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Etsy SEO titles &amp; tags
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Print-on-demand setup
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Orders &amp; buyer messages
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Photos &amp; shop branding
              </li>
            </ul>
            <div style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center">
              <a class="cc-btn" href="#audit"
                style="display: inline-flex; align-items: center; gap: 10px; min-height: 54px; padding: 0 28px; border-radius: 999px; background: #1fd6d8; color: #04201f; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px">Grow
                my Etsy shop
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12h14M13 6l6 6-6 6"></path>
                </svg>
              </a>
              <span style="font-size: 13px; color: rgba(255,255,255,0.55)">Free audit · Reply in [24] hours</span>
            </div>
          </div>
        </div>
        <div class="cc-panel" role="tabpanel" id="cc-panel-2" aria-labelledby="cc-tab-2" hidden
          style="display: flex; flex-wrap: wrap; gap: 0; border-radius: 28px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1); background: #0b0f12">
          <!-- illustration -->
          <div
            style="flex: 1 1 480px; min-width: 0; position: relative; background: radial-gradient(80% 80% at 50% 30%, #1b1726, #0a0910); display: grid; place-items: center; padding: 28px; min-height: 380px">
            <svg class="cc-scene" viewBox="0 0 480 360" width="100%" style="max-width: 520px" role="img"
              aria-label="Illustration of a phone showing a live shopping video with hearts floating up">
              <rect x="168" y="14" width="144" height="300" rx="24" fill="#0b0b0f" stroke="#2a2a33" stroke-width="4">
              </rect>
              <rect x="178" y="26" width="124" height="276" rx="16" fill="url(#ccTT2)"></rect>
              <defs>
                <linearGradient id="ccTT2" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0" stop-color="#25f4ee" stop-opacity="0.55"></stop>
                  <stop offset="1" stop-color="#fe2c55" stop-opacity="0.7"></stop>
                </linearGradient>
              </defs>
              <rect x="186" y="36" width="44" height="18" rx="9" fill="#fe2c55"></rect><text x="208" y="49"
                text-anchor="middle" font-family="Poppins, sans-serif" font-weight="800" font-size="10" fill="#ffffff"
                class="cc-blink">LIVE</text>
              <circle cx="240" cy="120" r="34" fill="rgba(255,255,255,0.85)"></circle>
              <path d="M228 104l28 16-28 16z" fill="#fe2c55"></path>
              <rect x="190" y="214" width="100" height="60" rx="10" fill="#ffffff"></rect>
              <rect x="198" y="222" width="34" height="34" rx="6" fill="#ffd1dc"></rect>
              <rect x="238" y="226" width="44" height="8" rx="4" fill="#d9d9e3"></rect>
              <rect x="238" y="240" width="30" height="8" rx="4" fill="#fe2c55"></rect>
              <rect x="198" y="260" width="84" height="8" rx="4" fill="#25f4ee"></rect>
              <g fill="#fe2c55">
                <path class="cc-heart" d="M330 250c-8-8-20 0-12 10l12 12 12-12c8-10-4-18-12-10z"></path>
                <path class="cc-heart-2" d="M356 262c-6-6-15 0-9 8l9 9 9-9c6-8-3-14-9-8z" fill="#ff8fa3"></path>
                <path class="cc-heart-3" d="M318 270c-5-5-12 0-7 6l7 7 7-7c5-6-2-11-7-6z" fill="#25f4ee"></path>
              </g>
              <g class="cc-float">
                <rect x="18" y="70" width="136" height="64" rx="16" fill="#ffffff"></rect><text x="86" y="96"
                  text-anchor="middle" font-family="Poppins, sans-serif" font-weight="600" font-size="12"
                  fill="#5f6b70">Creator video</text><text x="86" y="118" text-anchor="middle"
                  font-family="Poppins, sans-serif" font-weight="800" font-size="16" fill="#0b0b0f">Add to cart ✓</text>
              </g>
              <g class="cc-float-b">
                <rect x="330" y="96" width="132" height="44" rx="22" fill="#25f4ee"></rect><text x="396" y="124"
                  text-anchor="middle" font-family="Poppins, sans-serif" font-weight="800" font-size="14"
                  fill="#0b0b0f">Going viral ↑</text>
              </g>
            </svg>
          </div>
          <!-- copy -->
          <div class="cc-scene"
            style="flex: 1 1 420px; min-width: 0; padding: 48px 44px; display: flex; flex-direction: column; gap: 18px">
            <span
              style="display: inline-flex; align-self: flex-start; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; background: rgba(255,255,255,0.06); font-size: 13px; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; color: #25f4ee"><span
                style="width: 8px; height: 8px; border-radius: 50%; background: #25f4ee"></span>TikTok Shop</span>
            <h3
              style="margin: 0; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(1.7rem, 1.3rem + 1.2vw, 2.4rem); line-height: 1.12; letter-spacing: -0.02em">
              Turn scrolling into shopping.</h3>
            <p style="margin: 0; font-size: 16.5px; line-height: 1.65; color: rgba(255,255,255,0.7)">We set up your
              shop, list your products and connect you with creators who make the videos and lives that sell.</p>
            <ul
              style="margin: 6px 0 8px; padding: 0; list-style: none; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px 20px">
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Shop setup &amp; product listings
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Creator &amp; affiliate outreach
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Short-form video ideas
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Live shopping support
              </li>
            </ul>
            <div style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center">
              <a class="cc-btn" href="#audit"
                style="display: inline-flex; align-items: center; gap: 10px; min-height: 54px; padding: 0 28px; border-radius: 999px; background: #1fd6d8; color: #04201f; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px">Launch
                on TikTok Shop
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12h14M13 6l6 6-6 6"></path>
                </svg>
              </a>
              <span style="font-size: 13px; color: rgba(255,255,255,0.55)">Free audit · Reply in [24] hours</span>
            </div>
          </div>
        </div>
        <div class="cc-panel" role="tabpanel" id="cc-panel-3" aria-labelledby="cc-tab-3" hidden
          style="display: flex; flex-wrap: wrap; gap: 0; border-radius: 28px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1); background: #0b0f12">
          <!-- illustration -->
          <div
            style="flex: 1 1 480px; min-width: 0; position: relative; background: radial-gradient(80% 80% at 50% 30%, #0e2a47, #071626); display: grid; place-items: center; padding: 28px; min-height: 380px">
            <svg class="cc-scene" viewBox="0 0 480 360" width="100%" style="max-width: 520px" role="img"
              aria-label="Illustration of a shopping cart full of products with a fast delivery badge">
              <g class="cc-bob">
                <path d="M70 90h40l34 150h200l30-110H130" fill="none" stroke="#ffffff" stroke-width="10"
                  stroke-linecap="round" stroke-linejoin="round"></path>
                <rect x="160" y="120" width="60" height="70" rx="6" fill="#ffc220"></rect>
                <rect x="228" y="100" width="52" height="90" rx="6" fill="#7fc3ff"></rect>
                <rect x="288" y="130" width="54" height="60" rx="6" fill="#ffffff"></rect>
                <path d="M300 150h30M300 166h20" stroke="#0071ce" stroke-width="5" stroke-linecap="round"></path>
                <circle cx="170" cy="276" r="18" fill="#ffffff"></circle>
                <circle cx="320" cy="276" r="18" fill="#ffffff"></circle>
                <circle cx="170" cy="276" r="7" fill="#0071ce"></circle>
                <circle cx="320" cy="276" r="7" fill="#0071ce"></circle>
              </g>
              <g class="cc-float">
                <rect x="300" y="24" width="156" height="58" rx="18" fill="#ffc220"></rect><text x="378" y="50"
                  text-anchor="middle" font-family="Poppins, sans-serif" font-weight="600" font-size="12"
                  fill="#0b2a4a">Fulfilled by WFS</text><text x="378" y="70" text-anchor="middle"
                  font-family="Poppins, sans-serif" font-weight="800" font-size="16" fill="#0b2a4a">2-day
                  delivery</text>
              </g>
              <g class="cc-float-b">
                <rect x="20" y="20" width="150" height="44" rx="22" fill="#ffffff"></rect><text x="95" y="48"
                  text-anchor="middle" font-family="Poppins, sans-serif" font-weight="700" font-size="14"
                  fill="#0b2a4a">Buy Box won ✓</text>
              </g>
            </svg>
          </div>
          <!-- copy -->
          <div class="cc-scene"
            style="flex: 1 1 420px; min-width: 0; padding: 48px 44px; display: flex; flex-direction: column; gap: 18px">
            <span
              style="display: inline-flex; align-self: flex-start; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; background: rgba(255,255,255,0.06); font-size: 13px; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; color: #4aa8ff"><span
                style="width: 8px; height: 8px; border-radius: 50%; background: #4aa8ff"></span>Walmart</span>
            <h3
              style="margin: 0; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(1.7rem, 1.3rem + 1.2vw, 2.4rem); line-height: 1.12; letter-spacing: -0.02em">
              Reach millions of new shoppers.</h3>
            <p style="margin: 0; font-size: 16.5px; line-height: 1.65; color: rgba(255,255,255,0.7)">Seller approval,
              listings and Walmart Fulfillment Services set up properly, so your products show up fast and ship fast.
            </p>
            <ul
              style="margin: 6px 0 8px; padding: 0; list-style: none; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px 20px">
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Seller approval &amp; onboarding
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Listing &amp; catalog setup
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>WFS fulfillment
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Pricing &amp; Buy Box strategy
              </li>
            </ul>
            <div style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center">
              <a class="cc-btn" href="#audit"
                style="display: inline-flex; align-items: center; gap: 10px; min-height: 54px; padding: 0 28px; border-radius: 999px; background: #1fd6d8; color: #04201f; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px">Start
                selling on Walmart
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12h14M13 6l6 6-6 6"></path>
                </svg>
              </a>
              <span style="font-size: 13px; color: rgba(255,255,255,0.55)">Free audit · Reply in [24] hours</span>
            </div>
          </div>
        </div>
        <div class="cc-panel" role="tabpanel" id="cc-panel-4" aria-labelledby="cc-tab-4" hidden
          style="display: flex; flex-wrap: wrap; gap: 0; border-radius: 28px; overflow: hidden; border: 1px solid rgba(255,255,255,0.1); background: #0b0f12">
          <!-- illustration -->
          <div
            style="flex: 1 1 480px; min-width: 0; position: relative; background: radial-gradient(80% 80% at 50% 30%, #1d2533, #0c1018); display: grid; place-items: center; padding: 28px; min-height: 380px">
            <svg class="cc-scene" viewBox="0 0 480 360" width="100%" style="max-width: 520px" role="img"
              aria-label="Illustration of product listing cards with price tags and a sold badge">
              <g class="cc-bob">
                <rect x="40" y="60" width="180" height="230" rx="18" fill="#ffffff"></rect>
                <rect x="56" y="76" width="148" height="110" rx="12" fill="#e9eef7"></rect>
                <circle cx="130" cy="131" r="34" fill="#86b817"></circle>
                <circle cx="130" cy="131" r="14" fill="#e9eef7"></circle>
                <rect x="56" y="200" width="120" height="12" rx="6" fill="#cfd6e3"></rect><text x="56" y="250"
                  font-family="Poppins, sans-serif" font-weight="800" font-size="26" fill="#0b0f12">$89.00</text><text
                  x="56" y="274" font-family="Poppins, sans-serif" font-weight="600" font-size="13" fill="#5f6b70">Free
                  shipping</text>
              </g>
              <g class="cc-bob-2">
                <rect x="250" y="90" width="180" height="230" rx="18" fill="#ffffff"></rect>
                <rect x="266" y="106" width="148" height="110" rx="12" fill="#fff3d6"></rect>
                <rect x="310" y="130" width="60" height="62" rx="10" fill="#f5af02"></rect>
                <rect x="266" y="230" width="110" height="12" rx="6" fill="#cfd6e3"></rect><text x="266" y="280"
                  font-family="Poppins, sans-serif" font-weight="800" font-size="26" fill="#0b0f12">$42.50</text><text
                  x="266" y="304" font-family="Poppins, sans-serif" font-weight="600" font-size="13" fill="#5f6b70">12
                  watching</text>
              </g>
              <g class="cc-float">
                <rect x="330" y="40" width="120" height="44" rx="22" fill="#e53238"></rect><text x="390" y="68"
                  text-anchor="middle" font-family="Poppins, sans-serif" font-weight="800" font-size="16"
                  fill="#ffffff">SOLD</text>
              </g>
              <g class="cc-float-b">
                <rect x="20" y="16" width="190" height="40" rx="20" fill="#0064d2"></rect><text x="115" y="42"
                  text-anchor="middle" font-family="Poppins, sans-serif" font-weight="700" font-size="14"
                  fill="#ffffff">Top-rated seller ✓</text>
              </g>
            </svg>
          </div>
          <!-- copy -->
          <div class="cc-scene"
            style="flex: 1 1 420px; min-width: 0; padding: 48px 44px; display: flex; flex-direction: column; gap: 18px">
            <span
              style="display: inline-flex; align-self: flex-start; align-items: center; gap: 8px; padding: 6px 14px; border-radius: 999px; background: rgba(255,255,255,0.06); font-size: 13px; font-weight: 800; letter-spacing: 0.06em; text-transform: uppercase; color: #86b817"><span
                style="width: 8px; height: 8px; border-radius: 50%; background: #86b817"></span>eBay</span>
            <h3
              style="margin: 0; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(1.7rem, 1.3rem + 1.2vw, 2.4rem); line-height: 1.12; letter-spacing: -0.02em">
              Sell faster, rank higher.</h3>
            <p style="margin: 0; font-size: 16.5px; line-height: 1.65; color: rgba(255,255,255,0.7)">Clean listings,
              smart pricing and fast dispatch that keep your seller rating at the top and your stock moving.</p>
            <ul
              style="margin: 6px 0 8px; padding: 0; list-style: none; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px 20px">
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Listing optimisation
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Pricing &amp; promotions
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Fast dispatch &amp; returns
              </li>
              <li style="display: flex; gap: 10px; font-size: 15px; font-weight: 600; color: rgba(255,255,255,0.9)">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1fd6d8" stroke-width="2.6"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="flex: none; margin-top: 2px">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>Top-rated seller status
              </li>
            </ul>
            <div style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center">
              <a class="cc-btn" href="#audit"
                style="display: inline-flex; align-items: center; gap: 10px; min-height: 54px; padding: 0 28px; border-radius: 999px; background: #1fd6d8; color: #04201f; font-family: Poppins, sans-serif; font-weight: 700; font-size: 15px">Grow
                my eBay store
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12h14M13 6l6 6-6 6"></path>
                </svg>
              </a>
              <span style="font-size: 13px; color: rgba(255,255,255,0.55)">Free audit · Reply in [24] hours</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ===== SERVICES (teal) ===== -->
    <section id="services"
      style="position: relative; padding: 110px 24px; background: linear-gradient(125deg, rgba(6,74,77,0.94) 0%, rgba(21,94,156,0.9) 50%, rgba(91,63,214,0.92) 100%), url('https://images.unsplash.com/photo-1563013544-824ae1b704d3?auto=format&fit=crop&w=1800&q=70') center/cover; overflow: hidden">
      <div aria-hidden="true"
        style="position: absolute; top: 40px; right: 40px; width: 300px; height: 180px;">
      </div>
      <div aria-hidden="true"
        style="position: absolute; bottom: -40px; left: -20px; font-family: Poppins, sans-serif; font-weight: 900; font-size: 240px; line-height: 1; color: transparent; -webkit-text-stroke: 1.5px rgba(255,255,255,0.12)">
        CC.</div>
      <div class="cc-reveal" style="position: relative; max-width: 1240px; margin: 0 auto">
        <p
          style="margin: 0 0 14px; display: flex; align-items: center; gap: 14px; font-family: Poppins, sans-serif; font-weight: 500; font-size: 14px; color: rgba(255,255,255,0.9)">
          <span style="display: inline-block; width: 48px; height: 2px; background: #ffffff"></span>our services
        </p>
        <h2
          style="margin: 0 0 16px; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(2.2rem, 1.5rem + 2.4vw, 3.5rem); line-height: 1.08; letter-spacing: -0.025em">
          We do everything<span style="color: #7ef0f1">.</span></h2>
        <p
          style="margin: 0 0 56px; max-width: 620px; font-size: 17px; line-height: 1.65; color: rgba(255,255,255,0.86)">
          Pick one service or hand us the whole store. Every service comes with a dedicated manager and weekly reports.
        </p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 18px">
          <article class="cc-lift"
            style="display: flex; flex-direction: column; gap: 14px; padding: 30px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: linear-gradient(135deg, rgba(126,240,241,0.25), rgba(255,255,255,0.05)); color: #7ef0f1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M3 7l9-4 9 4-9 4-9-4zM3 7v10l9 4 9-4V7M12 11v10"></path>
              </svg>
            </span>
            <h3 style="margin: 0; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">Amazon Wholesale
              FBA</h3>
            <p style="margin: 0; flex: 1; font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.82)">
              Brand-approved sourcing, FBA shipments, restock planning and account health, end to end.</p>
            <a href="#audit"
              style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; font-weight: 800; font-size: 14px; color: #7ef0f1">Get
              started<span style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">
                with Amazon Wholesale FBA</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14M13 6l6 6-6 6"></path>
              </svg>
            </a>
          </article>
          <article class="cc-lift"
            style="display: flex; flex-direction: column; gap: 14px; padding: 30px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: linear-gradient(135deg, rgba(126,240,241,0.25), rgba(255,255,255,0.05)); color: #7ef0f1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M20 12l-8 8-9-9V3h8l9 9zM7.5 7.5h.01"></path>
              </svg>
            </span>
            <h3 style="margin: 0; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">Amazon Private
              Label</h3>
            <p style="margin: 0; flex: 1; font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.82)">Research,
              suppliers, branding, packaging and a launch plan for a brand you own.</p>
            <a href="#audit"
              style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; font-weight: 800; font-size: 14px; color: #7ef0f1">Get
              started<span style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">
                with Amazon Private Label</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14M13 6l6 6-6 6"></path>
              </svg>
            </a>
          </article>
          <article class="cc-lift"
            style="display: flex; flex-direction: column; gap: 14px; padding: 30px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: linear-gradient(135deg, rgba(126,240,241,0.25), rgba(255,255,255,0.05)); color: #7ef0f1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M4 10h16l-1.5 10h-13L4 10zM8 10V7a4 4 0 0 1 8 0v3"></path>
              </svg>
            </span>
            <h3 style="margin: 0; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">Walmart
              Marketplace</h3>
            <p style="margin: 0; flex: 1; font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.82)">Approval,
              listings, order flow and Walmart Fulfillment Services set up right.</p>
            <a href="#audit"
              style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; font-weight: 800; font-size: 14px; color: #7ef0f1">Get
              started<span style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">
                with Walmart Marketplace</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14M13 6l6 6-6 6"></path>
              </svg>
            </a>
          </article>
          <article class="cc-lift"
            style="display: flex; flex-direction: column; gap: 14px; padding: 30px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: linear-gradient(135deg, rgba(126,240,241,0.25), rgba(255,255,255,0.05)); color: #7ef0f1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 3l2.6 5.6L20 9.5l-4 4 1 5.5-5-2.8L7 19l1-5.5-4-4 5.4-.9L12 3z"></path>
              </svg>
            </span>
            <h3 style="margin: 0; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">Etsy Shop
              Management</h3>
            <p style="margin: 0; flex: 1; font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.82)">Etsy SEO,
              print-on-demand, orders and customer care for creative brands.</p>
            <a href="#audit"
              style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; font-weight: 800; font-size: 14px; color: #7ef0f1">Get
              started<span style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">
                with Etsy Shop Management</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14M13 6l6 6-6 6"></path>
              </svg>
            </a>
          </article>
          <article class="cc-lift"
            style="display: flex; flex-direction: column; gap: 14px; padding: 30px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: linear-gradient(135deg, rgba(126,240,241,0.25), rgba(255,255,255,0.05)); color: #7ef0f1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M9 18a3 3 0 1 1 0-6M9 18V4c1 2.5 3 4 6 4"></path>
              </svg>
            </span>
            <h3 style="margin: 0; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">TikTok Shop
              Growth</h3>
            <p style="margin: 0; flex: 1; font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.82)">Shop setup,
              creator partnerships and videos that turn views into orders.</p>
            <a href="#audit"
              style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; font-weight: 800; font-size: 14px; color: #7ef0f1">Get
              started<span style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">
                with TikTok Shop Growth</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14M13 6l6 6-6 6"></path>
              </svg>
            </a>
          </article>
          <article class="cc-lift"
            style="display: flex; flex-direction: column; gap: 14px; padding: 30px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: linear-gradient(135deg, rgba(126,240,241,0.25), rgba(255,255,255,0.05)); color: #7ef0f1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M4 6h16v12H4zM4 10h16M8 15h3"></path>
              </svg>
            </span>
            <h3 style="margin: 0; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">eBay Store
              Management</h3>
            <p style="margin: 0; flex: 1; font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.82)">Listings,
              pricing, buyer messages and fast dispatch for a top seller rating.</p>
            <a href="#audit"
              style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; font-weight: 800; font-size: 14px; color: #7ef0f1">Get
              started<span style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">
                with eBay Store Management</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14M13 6l6 6-6 6"></path>
              </svg>
            </a>
          </article>
          <article class="cc-lift"
            style="display: flex; flex-direction: column; gap: 14px; padding: 30px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: linear-gradient(135deg, rgba(126,240,241,0.25), rgba(255,255,255,0.05)); color: #7ef0f1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M3 11l15-6v14L3 13zM7 13v5a2 2 0 0 0 4 0v-4"></path>
              </svg>
            </span>
            <h3 style="margin: 0; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">Marketplace
              Advertising</h3>
            <p style="margin: 0; flex: 1; font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.82)">Sponsored
              ads on Amazon and Walmart, planned around margin and tuned weekly.</p>
            <a href="#audit"
              style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; font-weight: 800; font-size: 14px; color: #7ef0f1">Get
              started<span style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">
                with Marketplace Advertising</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14M13 6l6 6-6 6"></path>
              </svg>
            </a>
          </article>
          <article class="cc-lift"
            style="display: flex; flex-direction: column; gap: 14px; padding: 30px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span
              style="display: grid; place-items: center; width: 54px; height: 54px; border-radius: 16px; background: linear-gradient(135deg, rgba(126,240,241,0.25), rgba(255,255,255,0.05)); color: #7ef0f1">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM4 21a8 8 0 0 1 16 0"></path>
              </svg>
            </span>
            <h3 style="margin: 0; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">Ecommerce Virtual
              Assistants</h3>
            <p style="margin: 0; flex: 1; font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.82)">Trained VAs
              for research, listings, orders and support, on your hours.</p>
            <a href="#audit"
              style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; font-weight: 800; font-size: 14px; color: #7ef0f1">Get
              started<span style="position: absolute; width: 1px; height: 1px; overflow: hidden; clip: rect(0 0 0 0)">
                with Ecommerce Virtual Assistants</span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M5 12h14M13 6l6 6-6 6"></path>
              </svg>
            </a>
          </article>
        </div>
      </div>
    </section>
    <!-- ===== PROCESS ===== -->
    <section class="cc-light cc-light--cool" id="process" style="padding: 120px 24px; background: #effafa; color: #0b0f12">
      <div class="cc-reveal" style="max-width: 1240px; margin: 0 auto">
        <div style="text-align: center; max-width: 760px; margin: 0 auto 64px">
          <p
            style="margin: 0 0 14px; display: inline-flex; align-items: center; gap: 14px; font-family: Poppins, sans-serif; font-weight: 500; font-size: 14px; color: rgba(11,15,18,0.85)">
            <span style="display: inline-block; width: 48px; height: 2px; background: #ff5e5b"></span>how it works<span
              style="display: inline-block; width: 48px; height: 2px; background: #ff5e5b"></span>
          </p>
          <h2
            style="margin: 0 0 16px; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(2.2rem, 1.5rem + 2.4vw, 3.5rem); line-height: 1.08; letter-spacing: -0.025em">
            From audit to autopilot in <span class="cc-shine">4 steps</span>.</h2>
          <p style="margin: 0; font-size: 17px; line-height: 1.65; color: rgba(11,15,18,0.7)">A clear path, with a
            named person responsible at every step.</p>
        </div>
        <div style="position: relative">
          <div class="cc-line cc-hide-sm" aria-hidden="true"
            style="position: absolute; top: 34px; left: 12%; right: 12%; height: 2px; background: linear-gradient(90deg, #1fd6d8, #0b7d80, #1fd6d8)">
          </div>
          <ol
            style="position: relative; margin: 0; padding: 0; list-style: none; display: grid; grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)); gap: 24px">
            <li style="text-align: center; padding: 0 10px">
              <span class="cc-pulse"
                style="display: grid; place-items: center; width: 68px; height: 68px; margin: 0 auto 22px; border-radius: 50%; background: #ffffff; border: 2px solid #1fd6d8; font-family: Poppins, sans-serif; font-weight: 800; font-size: 22px; color: #0a8a8d">1</span>
              <h3 style="margin: 0 0 10px; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">Free
                store audit</h3>
              <p style="margin: 0 0 10px; font-size: 15px; line-height: 1.6; color: rgba(11,15,18,0.66)">We review
                your store, products and competitors and send a written plan.</p>
              <span
                style="display: inline-block; padding: 5px 12px; border-radius: 999px; background: rgba(31,214,216,0.1); font-size: 12px; font-weight: 800; color: #0b7d80">Day
                1–2</span>
            </li>
            <li style="text-align: center; padding: 0 10px">
              <span class="cc-pulse"
                style="display: grid; place-items: center; width: 68px; height: 68px; margin: 0 auto 22px; border-radius: 50%; background: #ffffff; border: 2px solid #1fd6d8; font-family: Poppins, sans-serif; font-weight: 800; font-size: 22px; color: #0a8a8d">2</span>
              <h3 style="margin: 0 0 10px; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">Strategy
                call</h3>
              <p style="margin: 0 0 10px; font-size: 15px; line-height: 1.6; color: rgba(11,15,18,0.66)">We agree
                goals, channels and budget with you, in plain language.</p>
              <span
                style="display: inline-block; padding: 5px 12px; border-radius: 999px; background: rgba(31,214,216,0.1); font-size: 12px; font-weight: 800; color: #0b7d80">Week
                1</span>
            </li>
            <li style="text-align: center; padding: 0 10px">
              <span class="cc-pulse"
                style="display: grid; place-items: center; width: 68px; height: 68px; margin: 0 auto 22px; border-radius: 50%; background: #ffffff; border: 2px solid #1fd6d8; font-family: Poppins, sans-serif; font-weight: 800; font-size: 22px; color: #0a8a8d">3</span>
              <h3 style="margin: 0 0 10px; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">Setup
                &amp; fixes</h3>
              <p style="margin: 0 0 10px; font-size: 15px; line-height: 1.6; color: rgba(11,15,18,0.66)">Listings,
                inventory, ads and processes are rebuilt the right way.</p>
              <span
                style="display: inline-block; padding: 5px 12px; border-radius: 999px; background: rgba(31,214,216,0.1); font-size: 12px; font-weight: 800; color: #0b7d80">Weeks
                2–4</span>
            </li>
            <li style="text-align: center; padding: 0 10px">
              <span class="cc-pulse"
                style="display: grid; place-items: center; width: 68px; height: 68px; margin: 0 auto 22px; border-radius: 50%; background: #ffffff; border: 2px solid #1fd6d8; font-family: Poppins, sans-serif; font-weight: 800; font-size: 22px; color: #0a8a8d">4</span>
              <h3 style="margin: 0 0 10px; font-family: Poppins, sans-serif; font-weight: 700; font-size: 19px">
                Autopilot &amp; growth</h3>
              <p style="margin: 0 0 10px; font-size: 15px; line-height: 1.6; color: rgba(11,15,18,0.66)">We run the
                store daily and push growth with weekly reports.</p>
              <span
                style="display: inline-block; padding: 5px 12px; border-radius: 999px; background: rgba(31,214,216,0.1); font-size: 12px; font-weight: 800; color: #0b7d80">Ongoing</span>
            </li>
          </ol>
        </div>
      </div>
    </section>
    <!-- ===== COMPARISON ===== -->
    <section class="cc-light cc-light--cool" style="padding: 20px 24px 120px; background: #effafa; color: #0b0f12">
      <div class="cc-reveal" style="max-width: 1000px; margin: 0 auto">
        <div style="text-align: center; margin-bottom: 44px">
          <h2
            style="margin: 0 0 12px; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(2rem, 1.4rem + 2vw, 3rem); line-height: 1.1; letter-spacing: -0.025em">
            Doing it yourself vs. <span style="color: #0a8a8d">Creative Converge</span></h2>
          <p style="margin: 0; font-size: 16.5px; color: rgba(11,15,18,0.65)">Same store. Very different week.</p>
        </div>
        <div style="overflow-x: auto; border-radius: 24px; border: 1px solid rgba(11,15,18,0.1)">
          <table style="width: 100%; min-width: 620px; border-collapse: collapse; font-size: 15.5px">
            <thead>
              <tr>
                <th scope="col"
                  style="text-align: left; padding: 22px 26px; background: rgba(11,15,18,0.03); font-family: Poppins, sans-serif; font-size: 14px; color: rgba(11,15,18,0.6)">
                  The work</th>
                <th scope="col"
                  style="text-align: left; padding: 22px 26px; background: rgba(11,15,18,0.03); font-family: Poppins, sans-serif; font-size: 15px">
                  On your own</th>
                <th scope="col"
                  style="text-align: left; padding: 22px 26px; background: linear-gradient(120deg, #0a6466, #0b7d80); color: #ffffff; font-family: Poppins, sans-serif; font-size: 15px">
                  With Creative Converge</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"
                  style="text-align: left; padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); font-weight: 700">
                  Daily order processing</th>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); color: rgba(11,15,18,0.6)">
                  <span style="color: #e5484d; font-weight: 800; margin-right: 8px" aria-hidden="true">✕</span>Hours of
                  your time
                </td>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); background: rgba(31,214,216,0.06); font-weight: 600">
                  <span style="color: #0a8a8d; font-weight: 800; margin-right: 8px" aria-hidden="true">✓</span>Handled
                  by our team
                </td>
              </tr>
              <tr>
                <th scope="row"
                  style="text-align: left; padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); font-weight: 700">
                  Listings &amp; SEO</th>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); color: rgba(11,15,18,0.6)">
                  <span style="color: #e5484d; font-weight: 800; margin-right: 8px" aria-hidden="true">✕</span>Guesswork
                </td>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); background: rgba(31,214,216,0.06); font-weight: 600">
                  <span style="color: #0a8a8d; font-weight: 800; margin-right: 8px"
                    aria-hidden="true">✓</span>Researched and tested
                </td>
              </tr>
              <tr>
                <th scope="row"
                  style="text-align: left; padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); font-weight: 700">
                  Inventory &amp; restocks</th>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); color: rgba(11,15,18,0.6)">
                  <span style="color: #e5484d; font-weight: 800; margin-right: 8px"
                    aria-hidden="true">✕</span>Stock-outs and overstock
                </td>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); background: rgba(31,214,216,0.06); font-weight: 600">
                  <span style="color: #0a8a8d; font-weight: 800; margin-right: 8px" aria-hidden="true">✓</span>Planned
                  weeks ahead
                </td>
              </tr>
              <tr>
                <th scope="row"
                  style="text-align: left; padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); font-weight: 700">
                  Advertising</th>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); color: rgba(11,15,18,0.6)">
                  <span style="color: #e5484d; font-weight: 800; margin-right: 8px" aria-hidden="true">✕</span>Wasted ad
                  spend
                </td>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); background: rgba(31,214,216,0.06); font-weight: 600">
                  <span style="color: #0a8a8d; font-weight: 800; margin-right: 8px" aria-hidden="true">✓</span>Managed
                  for profit
                </td>
              </tr>
              <tr>
                <th scope="row"
                  style="text-align: left; padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); font-weight: 700">
                  Customer messages &amp; reviews</th>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); color: rgba(11,15,18,0.6)">
                  <span style="color: #e5484d; font-weight: 800; margin-right: 8px" aria-hidden="true">✕</span>Slow
                  replies
                </td>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); background: rgba(31,214,216,0.06); font-weight: 600">
                  <span style="color: #0a8a8d; font-weight: 800; margin-right: 8px" aria-hidden="true">✓</span>Answered
                  fast, every day
                </td>
              </tr>
              <tr>
                <th scope="row"
                  style="text-align: left; padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); font-weight: 700">
                  New marketplaces</th>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); color: rgba(11,15,18,0.6)">
                  <span style="color: #e5484d; font-weight: 800; margin-right: 8px" aria-hidden="true">✕</span>Too risky
                  to try
                </td>
                <td
                  style="padding: 18px 26px; border-top: 1px solid rgba(11,15,18,0.08); background: rgba(31,214,216,0.06); font-weight: 600">
                  <span style="color: #0a8a8d; font-weight: 800; margin-right: 8px" aria-hidden="true">✓</span>Launched
                  with a plan
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- ===== PRICING ===== -->
    <section class="cvg-pp cvg-pp-packages" id="cvg-pp-packages" aria-labelledby="cvg-pp-title">
      <span class="cvg-pp-glow cvg-pp-glow--a" aria-hidden="true"></span>
      <span class="cvg-pp-glow cvg-pp-glow--b" aria-hidden="true"></span>
      <span class="cvg-pp-gridbg" aria-hidden="true"></span>
      <div class="cvg-pp-wrap">
        <div class="cvg-pp-head" data-wm="Pricing">
          <p class="cvg-pp-eyebrow cvg-pp-rv">How much does it cost</p>
          <h2 class="cvg-pp-h2 cvg-pp-rv" id="cvg-pp-title" style="--d:.1s">Find the Right Fit for <span class="cvg-pp-mint">Your Next Move.</span></h2>
          <p class="cvg-pp-sub cvg-pp-rv" style="--d:.2s">Every business is at a different stage, and every store comes with its own priorities. Our ecommerce website packages give you a clear starting point, so you can compare the options and pick the one that fits your store today.</p>
        </div>

        <div class="cvg-pp-controls">
          <button type="button" class="cvg-pp-arrow" data-pp-prev aria-label="Previous packages"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M15 6l-6 6 6 6"></path>
            </svg></button>
          <button type="button" class="cvg-pp-arrow" data-pp-next aria-label="Next packages"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M9 6l6 6-6 6"></path>
            </svg></button>
        </div>

        <div class="cvg-pp-cards" data-pp-track>
          <article class="cvg-pp-card" style="--i:0" aria-labelledby="cvg-pp-name-0">


            <p class="cvg-pp-timer">Ends in <b data-cd-short>—</b></p>
            <div class="cvg-pp-card-top">
              <div>
                <h3 class="cvg-pp-name" id="cvg-pp-name-0">Starter-Shop Package</h3>
                <p class="cvg-pp-tier">Starter</p>
              </div>

            </div>
            <p class="cvg-pp-was"><s>$799.00</s><span class="cvg-pp-save">Save $119.85</span></p>
            <p class="cvg-pp-price"><span class="cvg-pp-cur">$</span>499<span class="cvg-pp-cents">.00</span></p>
            <p class="cvg-pp-after">this week with 15% off</p>
            <p class="cvg-pp-count">9 features included</p>
            <ul class="cvg-pp-list" tabindex="0" aria-label="Starter-Shop Package features">
              <li class="cvg-pp-li">Starter website pages</li>
              <li class="cvg-pp-li">Up to 50 products</li>
              <li class="cvg-pp-li">Shopping cart functionality</li>
              <li class="cvg-pp-li">Secure checkout process</li>
              <li class="cvg-pp-li">Payment gateway integration</li>
              <li class="cvg-pp-li">Product search feature</li>
              <li class="cvg-pp-li">Revisions included</li>
              <li class="cvg-pp-li">Home page</li>
              <li class="cvg-pp-li">About Us page</li>
            </ul>
            <div class="cvg-pp-ctas">
              <button type="button" class="cvg-pp-btn cvg-pp-btn--mint cvg-pp-btn--block" data-chat>Chat Now To Learn More</button>
              <a href="tel:<?= $cc_phone_link ?>" class="cvg-pp-btn cvg-pp-btn--ghost cvg-pp-btn--block">Call To Get Started</a>
            </div>
          </article>
          <article class="cvg-pp-card cvg-pp-card--featured" style="--i:1" aria-labelledby="cvg-pp-name-1">
            <span class="cvg-pp-shine" aria-hidden="true"></span>

            <p class="cvg-pp-timer">Ends in <b data-cd-short>—</b></p>
            <div class="cvg-pp-card-top">
              <div>
                <h3 class="cvg-pp-name" id="cvg-pp-name-1">Essential-Commerce Package</h3>
                <p class="cvg-pp-tier">Most popular</p>
              </div>
              <span class="cvg-pp-badge">Most popular</span>
            </div>
            <p class="cvg-pp-was"><s>$999.00</s><span class="cvg-pp-save">Save $149.85</span></p>
            <p class="cvg-pp-price"><span class="cvg-pp-cur">$</span>849<span class="cvg-pp-cents">.15</span></p>
            <p class="cvg-pp-after">this week with 15% off</p>
            <p class="cvg-pp-count">21 features included</p>
            <ul class="cvg-pp-list" tabindex="0" aria-label="Essential-Commerce Package features">
              <li class="cvg-pp-li">Home page</li>
              <li class="cvg-pp-li">About Us page</li>
              <li class="cvg-pp-li">Product pages</li>
              <li class="cvg-pp-li">Basic content structure</li>
              <li class="cvg-pp-li">Shopping cart functionality</li>
              <li class="cvg-pp-li">Secure checkout process</li>
              <li class="cvg-pp-li">Payment gateway integration</li>
              <li class="cvg-pp-li">Product search feature</li>
              <li class="cvg-pp-li">Responsive design</li>
              <li class="cvg-pp-li">User-friendly navigation</li>
              <li class="cvg-pp-li">Basic branding</li>
              <li class="cvg-pp-li">Inventory management system</li>
              <li class="cvg-pp-li">Detailed product descriptions</li>
              <li class="cvg-pp-li">High-quality product images</li>
              <li class="cvg-pp-li">Meta titles and descriptions</li>
              <li class="cvg-pp-li">SEO-friendly URLs</li>
              <li class="cvg-pp-li">Extended training for website management</li>
              <li class="cvg-pp-li">Email and chat support</li>
              <li class="cvg-pp-li">SSL certificate for secure data encryption</li>
              <li class="cvg-pp-li">Enhanced security features</li>
              <li class="cvg-pp-li">Basic website analytics</li>
            </ul>
            <div class="cvg-pp-ctas">
              <button type="button" class="cvg-pp-btn cvg-pp-btn--mint cvg-pp-btn--block" data-chat>Chat Now To Learn More</button>
              <a href="tel:<?= $cc_phone_link ?>" class="cvg-pp-btn cvg-pp-btn--ghost cvg-pp-btn--block">Call To Get Started</a>
            </div>
          </article>
          <article class="cvg-pp-card" style="--i:2" aria-labelledby="cvg-pp-name-2">


            <p class="cvg-pp-timer">Ends in <b data-cd-short>—</b></p>
            <div class="cvg-pp-card-top">
              <div>
                <h3 class="cvg-pp-name" id="cvg-pp-name-2">Premium-Store Package</h3>
                <p class="cvg-pp-tier">Enterprise</p>
              </div>

            </div>
            <p class="cvg-pp-was"><s>$2,499.00</s><span class="cvg-pp-save">Save $374.85</span></p>
            <p class="cvg-pp-price"><span class="cvg-pp-cur">$</span>2,124<span class="cvg-pp-cents">.15</span></p>
            <p class="cvg-pp-after">this week with 15% off</p>
            <p class="cvg-pp-count">24 features included</p>
            <ul class="cvg-pp-list" tabindex="0" aria-label="Premium-Store Package features">
              <li class="cvg-pp-li">Home page</li>
              <li class="cvg-pp-li">About Us page</li>
              <li class="cvg-pp-li">Up to 200 product pages</li>
              <li class="cvg-pp-li">Rich multimedia content</li>
              <li class="cvg-pp-li">Advanced shopping cart</li>
              <li class="cvg-pp-li">Seamless checkout experience</li>
              <li class="cvg-pp-li">Multiple payment options</li>
              <li class="cvg-pp-li">Intuitive navigation</li>
              <li class="cvg-pp-li">Extended branding integration</li>
              <li class="cvg-pp-li">Product management system</li>
              <li class="cvg-pp-li">Robust inventory management</li>
              <li class="cvg-pp-li">Enhanced product descriptions</li>
              <li class="cvg-pp-li">High-quality product images</li>
              <li class="cvg-pp-li">SEO optimization</li>
              <li class="cvg-pp-li">Advanced SEO strategies</li>
              <li class="cvg-pp-li">SEO-friendly URLs</li>
              <li class="cvg-pp-li">Customer support features</li>
              <li class="cvg-pp-li">Live chat integration</li>
              <li class="cvg-pp-li">Security measures with enhanced protection</li>
              <li class="cvg-pp-li">Social media integration for marketing and engagement</li>
              <li class="cvg-pp-li">Email marketing integration</li>
              <li class="cvg-pp-li">Loyalty program integration</li>
              <li class="cvg-pp-li">Advanced analytics and reporting tools</li>
              <li class="cvg-pp-li">Advanced customization options</li>
            </ul>
            <div class="cvg-pp-ctas">
              <button type="button" class="cvg-pp-btn cvg-pp-btn--mint cvg-pp-btn--block" data-chat>Chat Now To Learn More</button>
              <a href="tel:<?= $cc_phone_link ?>" class="cvg-pp-btn cvg-pp-btn--ghost cvg-pp-btn--block">Call To Get Started</a>
            </div>
          </article>
          <article class="cvg-pp-card" style="--i:3" aria-labelledby="cvg-pp-name-3">


            <p class="cvg-pp-timer">Ends in <b data-cd-short>—</b></p>
            <div class="cvg-pp-card-top">
              <div>
                <h3 class="cvg-pp-name" id="cvg-pp-name-3">Elite-Market Package</h3>
                <p class="cvg-pp-tier">Elite</p>
              </div>

            </div>
            <p class="cvg-pp-was"><s>$4,999.00</s><span class="cvg-pp-save">Save $749.85</span></p>
            <p class="cvg-pp-price"><span class="cvg-pp-cur">$</span>4,249<span class="cvg-pp-cents">.15</span></p>
            <p class="cvg-pp-after">this week with 15% off</p>
            <p class="cvg-pp-count">27 features included</p>
            <ul class="cvg-pp-list" tabindex="0" aria-label="Elite-Market Package features">
              <li class="cvg-pp-li">Custom home page</li>
              <li class="cvg-pp-li">Advanced About Us page</li>
              <li class="cvg-pp-li">Up to 300 product pages</li>
              <li class="cvg-pp-li">Immersive multimedia content</li>
              <li class="cvg-pp-li">Advanced shopping cart functionality</li>
              <li class="cvg-pp-li">Seamless checkout experience</li>
              <li class="cvg-pp-li">Multiple payment options</li>
              <li class="cvg-pp-li">AI-powered product search</li>
              <li class="cvg-pp-li">Fully custom responsive design</li>
              <li class="cvg-pp-li">Interactive navigation</li>
              <li class="cvg-pp-li">Advanced branding integration</li>
              <li class="cvg-pp-li">Comprehensive product management</li>
              <li class="cvg-pp-li">Advanced inventory management system</li>
              <li class="cvg-pp-li">Immersive product descriptions</li>
              <li class="cvg-pp-li">High-quality product visuals</li>
              <li class="cvg-pp-li">Comprehensive SEO strategies</li>
              <li class="cvg-pp-li">SEO-friendly URLs</li>
              <li class="cvg-pp-li">Customer support features</li>
              <li class="cvg-pp-li">VIP support for priority assistance</li>
              <li class="cvg-pp-li">State-of-the-art security features</li>
              <li class="cvg-pp-li">Marketing and engagement tools</li>
              <li class="cvg-pp-li">Social media integration</li>
              <li class="cvg-pp-li">Email marketing automation</li>
              <li class="cvg-pp-li">VIP customer loyalty program</li>
              <li class="cvg-pp-li">Analytics and reporting tools</li>
              <li class="cvg-pp-li">Advanced analytics dashboard</li>
              <li class="cvg-pp-li">Unlimited customization options</li>
            </ul>
            <div class="cvg-pp-ctas">
              <button type="button" class="cvg-pp-btn cvg-pp-btn--mint cvg-pp-btn--block" data-chat>Chat Now To Learn More</button>
              <a href="tel:<?= $cc_phone_link ?>" class="cvg-pp-btn cvg-pp-btn--ghost cvg-pp-btn--block">Call To Get Started</a>
            </div>
          </article>
          <article class="cvg-pp-card" style="--i:4" aria-labelledby="cvg-pp-name-4">


            <p class="cvg-pp-timer">Ends in <b data-cd-short>—</b></p>
            <div class="cvg-pp-card-top">
              <div>
                <h3 class="cvg-pp-name" id="cvg-pp-name-4">Ultimate-Emporium Package</h3>
                <p class="cvg-pp-tier">Ultimate</p>
              </div>

            </div>
            <p class="cvg-pp-was"><s>$7,999.00</s><span class="cvg-pp-save">Save $1,199.85</span></p>
            <p class="cvg-pp-price"><span class="cvg-pp-cur">$</span>6,799<span class="cvg-pp-cents">.15</span></p>
            <p class="cvg-pp-after">this week with 15% off</p>
            <p class="cvg-pp-count">21 features included</p>
            <ul class="cvg-pp-list" tabindex="0" aria-label="Ultimate-Emporium Package features">
              <li class="cvg-pp-li">Custom website architecture for optimal user experience and conversion</li>
              <li class="cvg-pp-li">Completely bespoke website design reflecting the client&#x27;s brand identity and values</li>
              <li class="cvg-pp-li">Custom graphics, animations, and interactive elements for a visually stunning experience</li>
              <li class="cvg-pp-li">Cutting-edge e-commerce functionality</li>
              <li class="cvg-pp-li">Seamless and intuitive shopping cart</li>
              <li class="cvg-pp-li">Intuitive and streamlined checkout process</li>
              <li class="cvg-pp-li">Multiple payment options for flexibility</li>
              <li class="cvg-pp-li">Product management system</li>
              <li class="cvg-pp-li">Interactive and immersive product descriptions</li>
              <li class="cvg-pp-li">High-quality visuals for products</li>
              <li class="cvg-pp-li">Comprehensive SEO strategies for better visibility</li>
              <li class="cvg-pp-li">SEO-friendly URLs for enhanced search engine ranking</li>
              <li class="cvg-pp-li">Customer engagement with personalized user journeys</li>
              <li class="cvg-pp-li">24/7 support for customer assistance</li>
              <li class="cvg-pp-li">State-of-the-art security measures for data protection</li>
              <li class="cvg-pp-li">Omni-channel marketing integration for a seamless customer experience</li>
              <li class="cvg-pp-li">Predictive analytics for marketing insights</li>
              <li class="cvg-pp-li">Exclusive VIP loyalty program to retain customers</li>
              <li class="cvg-pp-li">Advanced analytics and reporting tools for deeper insights</li>
              <li class="cvg-pp-li">Custom analytics dashboard for personalized reporting</li>
              <li class="cvg-pp-li">Unlimited customization options to meet specific business needs</li>
            </ul>
            <div class="cvg-pp-ctas">
              <button type="button" class="cvg-pp-btn cvg-pp-btn--mint cvg-pp-btn--block" data-chat>Chat Now To Learn More</button>
              <a href="tel:<?= $cc_phone_link ?>" class="cvg-pp-btn cvg-pp-btn--ghost cvg-pp-btn--block">Call To Get Started</a>
            </div>
          </article>
        </div>

        <div class="cvg-pp-dots"><button type="button" class="cvg-pp-dot" data-pp-dot="0" aria-label="Go to Starter-Shop Package"></button><button type="button" class="cvg-pp-dot" data-pp-dot="1" aria-label="Go to Essential-Commerce Package"></button><button type="button" class="cvg-pp-dot" data-pp-dot="2" aria-label="Go to Premium-Store Package"></button><button type="button" class="cvg-pp-dot" data-pp-dot="3" aria-label="Go to Elite-Market Package"></button><button type="button" class="cvg-pp-dot" data-pp-dot="4" aria-label="Go to Ultimate-Emporium Package"></button></div>
        <p class="cvg-pp-foot">Need something custom? <a href="#audit">Tell us about your store</a> or call <a href="tel:<?= $cc_phone_link ?>"><?= $cc_phone ?></a>.</p>
      </div>
    </section>

    <!-- ===== RESULTS + TESTIMONIALS (teal) ===== -->
    <section id="results"
      style="position: relative; padding: 110px 24px; background: linear-gradient(125deg, #3d2bb3 0%, #8a2f9e 50%, #e9506a 100%)">
      <div class="cc-reveal" style="max-width: 1240px; margin: 0 auto">
        <div
          style="display: flex; flex-wrap: wrap; align-items: flex-end; justify-content: space-between; gap: 28px; margin-bottom: 48px">
          <div style="flex: 1 1 520px; min-width: 0">
            <p
              style="margin: 0 0 14px; display: flex; align-items: center; gap: 14px; font-family: Poppins, sans-serif; font-weight: 500; font-size: 14px; color: rgba(255,255,255,0.9)">
              <span style="display: inline-block; width: 48px; height: 2px; background: #ffffff"></span>proof, not
              promises
            </p>
            <h2
              style="margin: 0; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(2.2rem, 1.5rem + 2.4vw, 3.5rem); line-height: 1.08; letter-spacing: -0.025em">
              It's all about results<span style="color: #7ef0f1">.</span></h2>
          </div>
          <p
            style="margin: 0; flex: 1 1 340px; max-width: 440px; font-size: 15px; line-height: 1.6; color: rgba(255,255,255,0.8)">
            </p>
        </div>
        <div
          style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 18px; margin-bottom: 18px">
          <div class="cc-lift"
            style="padding: 32px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span class="cc-count" data-count="153" data-suffix="+"
              style="display: block; font-family: Poppins, sans-serif; font-weight: 800; font-size: 48px; letter-spacing: -0.03em; line-height: 1; font-variant-numeric: tabular-nums">153+</span>
            <span style="display: block; margin-top: 10px; font-size: 15px; color: rgba(255,255,255,0.84)">Stores
              managed</span>
          </div>
          <div class="cc-lift"
            style="padding: 32px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span class="cc-count" data-count="1.3" data-decimals="1" data-prefix="$" data-suffix="M"
              style="display: block; font-family: Poppins, sans-serif; font-weight: 800; font-size: 48px; letter-spacing: -0.03em; line-height: 1; font-variant-numeric: tabular-nums">$1.3M</span>
            <span style="display: block; margin-top: 10px; font-size: 15px; color: rgba(255,255,255,0.84)">Client sales
              per year</span>
          </div>
          <div class="cc-lift"
            style="padding: 32px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span class="cc-count" data-count="22" data-suffix="%"
              style="display: block; font-family: Poppins, sans-serif; font-weight: 800; font-size: 48px; letter-spacing: -0.03em; line-height: 1; font-variant-numeric: tabular-nums">22%</span>
            <span style="display: block; margin-top: 10px; font-size: 15px; color: rgba(255,255,255,0.84)">Average order
              growth</span>
          </div>
          <div class="cc-lift"
            style="padding: 32px 26px; border-radius: 20px; background: rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.14)">
            <span class="cc-count" data-count="97" data-suffix="+"
              style="display: block; font-family: Poppins, sans-serif; font-weight: 800; font-size: 48px; letter-spacing: -0.03em; line-height: 1; font-variant-numeric: tabular-nums">97+</span>
            <span style="display: block; margin-top: 10px; font-size: 15px; color: rgba(255,255,255,0.84)">Ecommerce
              specialists</span>
          </div>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 18px">

          <figure class="cc-lift"
            style="margin: 0; display: flex; flex-direction: column; gap: 18px; padding: 30px 28px; border-radius: 20px; background: #050708; border: 1px solid rgba(255,255,255,0.1)">
            <div style="display: flex; justify-content: space-between; align-items: center">
              <span style="color: #ffc94d; letter-spacing: 2px" aria-label="5 out of 5 stars">★★★★★</span>
              <span
                style="padding: 5px 12px; border-radius: 999px; background: rgba(31,214,216,0.12); font-size: 12px; font-weight: 800; color: #1fd6d8">+195%
                orders</span>
            </div>
            <blockquote style="margin: 0; flex: 1; font-size: 16px; line-height: 1.65; color: rgba(255,255,255,0.85)">
              “I heard about Creative Converge from one of my friends, and choosing their team to manage our eCommerce store was a great decision. They managed everything efficiently, from store optimization to product listing management, make sure our store performed smoothly. Literally Highly recommend them!”</blockquote>
            <figcaption
              style="display: flex; align-items: center; gap: 12px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.08)">
              <img src="images/Julie.jpg" alt="" width="42" height="42" loading="lazy"
                style="width: 42px; height: 42px; flex: none; border-radius: 50%; object-fit: cover; background: #1fd6d8">
              <span><span style="display: block; font-weight: 800">Julie</span><span
                  style="font-size: 13px; color: rgba(255,255,255,0.55)">eCommerce · Amazon</span></span>
            </figcaption>
          </figure>

          <figure class="cc-lift"
            style="margin: 0; display: flex; flex-direction: column; gap: 18px; padding: 30px 28px; border-radius: 20px; background: #050708; border: 1px solid rgba(255,255,255,0.1)">
            <div style="display: flex; justify-content: space-between; align-items: center">
              <span style="color: #ffc94d; letter-spacing: 2px" aria-label="5 out of 5 stars">★★★★★</span>
              <span
                style="padding: 5px 12px; border-radius: 999px; background: rgba(31,214,216,0.12); font-size: 12px; font-weight: 800; color: #1fd6d8">98
                hrs/week saved</span>
            </div>
            <blockquote style="margin: 0; flex: 1; font-size: 16px; line-height: 1.65; color: rgba(255,255,255,0.85)">
              “Not gonna lie, I'm so glad I found this team! Creative Converge helped us improve our ecommerce store with structured product listings, better store management, and a seamless shopping experience. Entire experience worthwhile without burning a hole in my pockets!”</blockquote>
            <figcaption
              style="display: flex; align-items: center; gap: 12px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.08)">
              <img src="images/Testimonial-Jacomien-Nel.jpg " alt="" width="42" height="42" loading="lazy"
                style="width: 42px; height: 42px; flex: none; border-radius: 50%; object-fit: cover; background: #ff7a6b">
              <span><span style="display: block; font-weight: 800">Stephany</span><span
                  style="font-size: 13px; color: rgba(255,255,255,0.55)">ecommerce · Etsy</span></span>
            </figcaption>
          </figure>

          <figure class="cc-lift"
            style="margin: 0; display: flex; flex-direction: column; gap: 18px; padding: 30px 28px; border-radius: 20px; background: #050708; border: 1px solid rgba(255,255,255,0.1)">
            <div style="display: flex; justify-content: space-between; align-items: center">
              <span style="color: #ffc94d; letter-spacing: 2px" aria-label="5 out of 5 stars">★★★★★</span>
              <span
                style="padding: 5px 12px; border-radius: 999px; background: rgba(31,214,216,0.12); font-size: 12px; font-weight: 800; color: #1fd6d8">$25k
                first month</span>
            </div>
            <blockquote style="margin: 0; flex: 1; font-size: 16px; line-height: 1.65; color: rgba(255,255,255,0.85)">
              “Our sales and overall store performance improved significantly after partnering with Creative Converge. Their team streamlined our ecommerce operations, optimized product listings, and managed our store efficiently. Their consistent support made running our online business so much easier. Truly impressed!”</blockquote>
            <figcaption
              style="display: flex; align-items: center; gap: 12px; padding-top: 16px; border-top: 1px solid rgba(255,255,255,0.08)">
              <img src="images/Shawn.jpg" alt="" width="42" height="42" loading="lazy"
                style="width: 42px; height: 42px; flex: none; border-radius: 50%; object-fit: cover; background: #7c5cff">
              <span><span style="display: block; font-weight: 800">Shawn</span><span
                  style="font-size: 13px; color: rgba(255,255,255,0.55)">ecommerce · TikTok Shop</span></span>
            </figcaption>
          </figure>

        </div>
      </div>
    </section>
    <!-- ===== FREE AUDIT OFFER + FORM ===== -->
    <section id="audit" style="position: relative; padding: 120px 24px; background: #050708; isolation: isolate; overflow: hidden">
      <div class="cc-audit-photo" aria-hidden="true" style="background-image: url('https://images.unsplash.com/photo-1449247666642-264389f5f5b1?auto=format&fit=crop&w=1800&q=70')" background-image: url('https://images.unsplash.com/photo-1449247666642-264389f5f5b1?auto=format&fit=crop&w=1800&q=70')"></div>
      <div class="cc-orb" aria-hidden="true"
        style="position: absolute; z-index: -1; top: 60px; left: 50%; width: 700px; height: 500px; margin-left: -350px; border-radius: 50%; background: radial-gradient(circle, rgba(31,214,216,0.18), transparent 65%)">
      </div>
      <div class="cc-reveal"
        style="max-width: 1240px; margin: 0 auto; display: flex; flex-wrap: wrap; gap: 56px; align-items: flex-start">
        <div style="flex: 1 1 420px; min-width: 0">
          <p
            style="margin: 0 0 14px; display: flex; align-items: center; gap: 14px; font-family: Poppins, sans-serif; font-weight: 500; font-size: 14px; color: rgba(255,255,255,0.85)">
            <span style="display: inline-block; width: 48px; height: 2px; background: #ffffff"></span>free, no strings
          </p>
          <h2
            style="margin: 0 0 18px; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(2.2rem, 1.5rem + 2.4vw, 3.5rem); line-height: 1.06; letter-spacing: -0.025em">
            Get your free<br><span class="cc-shine">store audit</span>.</h2>
          <p
            style="margin: 0 0 28px; max-width: 480px; font-size: 17px; line-height: 1.65; color: rgba(255,255,255,0.72)">
            Send us your store link. Within [24] hours an ecommerce specialist sends back a clear, written plan you can
            use whether or not you hire us.</p>
          <h3 style="margin: 0 0 16px; font-family: Poppins, sans-serif; font-weight: 700; font-size: 17px">What's
            inside your audit</h3>
          <ul style="margin: 0 0 30px; padding: 0; list-style: none; display: grid; gap: 14px">
            <li style="display: flex; gap: 14px; align-items: flex-start">
              <span
                style="display: grid; place-items: center; width: 28px; height: 28px; border-radius: 50%; background: #1fd6d8; color: #04201f; flex: none">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>
              </span>
              <span style="font-size: 16px; line-height: 1.5; color: rgba(255,255,255,0.88)">Listing score with the
                exact fixes to make</span>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start">
              <span
                style="display: grid; place-items: center; width: 28px; height: 28px; border-radius: 50%; background: #1fd6d8; color: #04201f; flex: none">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>
              </span>
              <span style="font-size: 16px; line-height: 1.5; color: rgba(255,255,255,0.88)">Keyword gaps your
                competitors are winning</span>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start">
              <span
                style="display: grid; place-items: center; width: 28px; height: 28px; border-radius: 50%; background: #1fd6d8; color: #04201f; flex: none">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>
              </span>
              <span style="font-size: 16px; line-height: 1.5; color: rgba(255,255,255,0.88)">Ad spend review: what to
                cut, what to scale</span>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start">
              <span
                style="display: grid; place-items: center; width: 28px; height: 28px; border-radius: 50%; background: #1fd6d8; color: #04201f; flex: none">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>
              </span>
              <span style="font-size: 16px; line-height: 1.5; color: rgba(255,255,255,0.88)">Inventory and pricing
                risks</span>
            </li>
            <li style="display: flex; gap: 14px; align-items: flex-start">
              <span
                style="display: grid; place-items: center; width: 28px; height: 28px; border-radius: 50%; background: #1fd6d8; color: #04201f; flex: none">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                  stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <path d="M5 12.5l4.5 4.5L19 7.5"></path>
                </svg>
              </span>
              <span style="font-size: 16px; line-height: 1.5; color: rgba(255,255,255,0.88)">A 90-day growth plan for
                your store</span>
            </li>
          </ul>
          <div
            style="display: flex; align-items: center; gap: 14px; padding: 18px 20px; border-radius: 18px; background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.1)">
            <span
              style="display: grid; place-items: center; width: 46px; height: 46px; border-radius: 14px; background: rgba(31,214,216,0.14); color: #1fd6d8; flex: none">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"></path>
                <path d="M8.5 12l2.5 2.5 4.5-5"></path>
              </svg>
            </span>
            <p style="margin: 0; font-size: 14.5px; line-height: 1.55; color: rgba(255,255,255,0.75)"><strong
                style="color: #ffffff">Your data stays private.</strong> We only use read-only access and never change
              anything without your approval.</p>
          </div>
        </div>


        <form class="cc-form"
          data-cc-form
          aria-label="Free store audit request"
          action="email.php"
          method="post"
          style="flex: 1.15 1 480px; min-width: 0; position: relative; padding: 36px; border-radius: 26px; background: linear-gradient(160deg, rgba(20,30,34,0.96), rgba(8,12,14,0.96)); border: 1px solid rgba(31,214,216,0.3); display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px">

          <!-- Spam protection -->
          <input type="text"
            name="website"
            tabindex="-1"
            autocomplete="off"
            aria-hidden="true"
            style="position:absolute;left:-9999px;width:1px;height:1px;opacity:0">

          <!-- Email subject -->
          <input type="hidden"
            name="msg_subject"
            value="Free Store Audit Request - Ecommerce Landing Page">

          <!-- Form heading -->
          <div style="grid-column: 1 / -1; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; margin-bottom: 4px">
            <span style="font-family: Poppins, sans-serif; font-weight: 800; font-size: 22px">
              Claim your free audit
            </span>
          </div>

          <!-- Full Name -->
          <label style="display: grid; gap: 8px; font-size: 13px; font-weight: 800; color: rgba(255,255,255,0.82)">
            Full name
            <input type="text"
              name="name"
              autocomplete="name"
              id="name"
              placeholder="Jane Smith"
              required
              maxlength="100"
              style="min-height: 52px; padding: 0 16px; border-radius: 14px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.05); color: #ffffff; font: inherit; font-weight: 600; font-size: 15px">
          </label>

          <!-- Email -->
          <label style="display: grid; gap: 8px; font-size: 13px; font-weight: 800; color: rgba(255,255,255,0.82)">
            Email
            <input type="email"
              name="email"
              autocomplete="email"
              placeholder="jane@store.com"
              required
              style="min-height: 52px; padding: 0 16px; border-radius: 14px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.05); color: #ffffff; font: inherit; font-weight: 600; font-size: 15px">
          </label>

          <!-- Phone -->
          <label style="display: grid; gap: 8px; font-size: 13px; font-weight: 800; color: rgba(255,255,255,0.82)">
            Phone
            <input type="tel"
              name="phone"
              id="phone"
              autocomplete="tel"
              inputmode="tel"
              placeholder="+1 555 000 0000"
              required
              maxlength="20"
              pattern="[0-9+()\- ]{7,20}"
              title="Please enter a valid phone number"
              style="min-height: 52px; padding: 0 16px; border-radius: 14px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.05); color: #ffffff; font: inherit; font-weight: 600; font-size: 15px">
          </label>

          <!-- Monthly Sales -->
          <label style="display: grid; gap: 8px; font-size: 13px; font-weight: 800; color: rgba(255,255,255,0.82)">
            Monthly sales
            <select name="revenue"
              required
              style="min-height: 52px; padding: 0 16px; border-radius: 14px; border: 1px solid rgba(255,255,255,0.18); background: #0b0f12; color: #ffffff; font: inherit; font-weight: 600; font-size: 15px">
              <option value="Not selling yet">Not selling yet</option>
              <option value="Under $10k">Under $10k</option>
              <option value="$10k - $50k">$10k – $50k</option>
              <option value="$50k - $250k">$50k – $250k</option>
              <option value="$250k+">$250k+</option>
            </select>
          </label>

          <!-- Store Link -->
          <label style="grid-column: 1 / -1; display: grid; gap: 8px; font-size: 13px; font-weight: 800; color: rgba(255,255,255,0.82)">
            Store link (optional)
            <input type="url"
              name="store"
              placeholder="https://amazon.com/shops/your-store"
              style="min-height: 52px; padding: 0 16px; border-radius: 14px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.05); color: #ffffff; font: inherit; font-weight: 600; font-size: 15px">
          </label>

          <!-- Selling Channels -->
          <fieldset style="grid-column: 1 / -1; margin: 0; padding: 0; border: 0">

            <legend style="margin-bottom: 10px; font-size: 13px; font-weight: 800; color: rgba(255,255,255,0.82)">
              Where do you sell?
            </legend>

            <div style="display: flex; flex-wrap: wrap; gap: 8px">

              <label style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; padding: 0 16px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.03); font-size: 14px; font-weight: 700; cursor: pointer">
                <input type="checkbox" name="channels[]" value="Amazon" style="width: 16px; height: 16px; accent-color: #1fd6d8">
                Amazon
              </label>

              <label style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; padding: 0 16px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.03); font-size: 14px; font-weight: 700; cursor: pointer">
                <input type="checkbox" name="channels[]" value="Walmart" style="width: 16px; height: 16px; accent-color: #1fd6d8">
                Walmart
              </label>

              <label style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; padding: 0 16px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.03); font-size: 14px; font-weight: 700; cursor: pointer">
                <input type="checkbox" name="channels[]" value="Etsy" style="width: 16px; height: 16px; accent-color: #1fd6d8">
                Etsy
              </label>

              <label style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; padding: 0 16px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.03); font-size: 14px; font-weight: 700; cursor: pointer">
                <input type="checkbox" name="channels[]" value="TikTok Shop" style="width: 16px; height: 16px; accent-color: #1fd6d8">
                TikTok Shop
              </label>

              <label style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; padding: 0 16px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.03); font-size: 14px; font-weight: 700; cursor: pointer">
                <input type="checkbox" name="channels[]" value="eBay" style="width: 16px; height: 16px; accent-color: #1fd6d8">
                eBay
              </label>

              <label style="display: inline-flex; align-items: center; gap: 8px; min-height: 44px; padding: 0 16px; border-radius: 999px; border: 1px solid rgba(255,255,255,0.18); background: rgba(255,255,255,0.03); font-size: 14px; font-weight: 700; cursor: pointer">
                <input type="checkbox" name="channels[]" value="Not yet" style="width: 16px; height: 16px; accent-color: #1fd6d8">
                Not yet
              </label>

            </div>
          </fieldset>

          <!-- Consent -->
          <label style="grid-column: 1 / -1; display: flex; gap: 12px; align-items: flex-start; font-size: 12.5px; line-height: 1.55; color: rgba(255,255,255,0.6)">
            <input type="checkbox"
              name="consent"
              value="Yes"
              required
              style="width: 18px; height: 18px; margin-top: 2px; accent-color: #1fd6d8; flex: none">
            <span>
              I agree to be contacted by Creative Converge about my audit by email, phone or SMS. I can opt out any time. See the
              <a href="https://creativeconverge.com/privacy-policy/" target="_blank" rel="noopener noreferrer" style="color: #1fd6d8">
                Privacy Policy
              </a>.
            </span>
          </label>

          <!-- Submit Button -->
          <button class="cc-btn"
            type="submit"
            style="grid-column: 1 / -1; display: inline-flex; align-items: center; justify-content: center; gap: 10px; min-height: 58px; border: 0; border-radius: 999px; background: #1fd6d8; color: #04201f; font-family: Poppins, sans-serif; font-weight: 800; font-size: 16px; cursor: pointer">
            Send Me My Free Audit

            <svg width="18" height="18"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2.4"
              stroke-linecap="round"
              stroke-linejoin="round"
              aria-hidden="true">
              <path d="M5 12h14M13 6l6 6-6 6"></path>
            </svg>
          </button>

          <!-- Note -->
          <p style="grid-column: 1 / -1; margin: 0; text-align: center; font-size: 13px; color: rgba(255,255,255,0.5)">
            Takes 60 seconds · No contract · No credit card
          </p>

        </form>

      </div>
    </section>
    <!-- ===== FAQ ===== -->
    <!-- ===== FINAL CTA ===== -->
    <section style="padding: 0 24px 110px; background: #0b0f12">
      <div class="cc-reveal"
        style="position: relative; max-width: 1240px; margin: 0 auto; padding: 70px 48px; border-radius: 32px; background: linear-gradient(120deg, rgba(255,94,91,0.92), rgba(124,92,255,0.9) 55%, rgba(31,214,216,0.9)), url('https://images.unsplash.com/photo-1539278383962-a7774385fa02?auto=format&fit=crop&w=1800&q=70') center/cover; overflow: hidden; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 32px">
        <span class="cc-confetti" aria-hidden="true"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></span>
        <div aria-hidden="true" class="cc-spin"
          style="position: absolute; right: -90px; top: -90px; width: 320px; height: 320px; border-radius: 50%; border: 2px dashed rgba(255,255,255,0.25)">
        </div>
        <div aria-hidden="true"
          style="position: absolute; right: 60px; bottom: -60px; width: 220px; height: 220px; border-radius: 50%; background: radial-gradient(circle, rgba(126,240,241,0.5), transparent 70%)">
        </div>
        <div style="position: relative; flex: 1 1 520px; min-width: 0">
          <h2
            style="margin: 0 0 12px; font-family: Poppins, sans-serif; font-weight: 800; font-size: clamp(2rem, 1.4rem + 2.2vw, 3.2rem); line-height: 1.08; letter-spacing: -0.025em">
            Ready to put your store on autopilot?</h2>
          <p style="margin: 0; font-size: 17px; line-height: 1.6; color: rgba(255,255,255,0.88)">Start with a free
            audit. Keep the plan even if you never hire us.</p>
        </div>
        <div style="position: relative; display: flex; flex-wrap: wrap; gap: 12px">
          <a class="cc-btn" href="#audit"
            style="display: inline-flex; align-items: center; min-height: 58px; padding: 0 32px; border-radius: 999px; background: #ffffff; color: #04201f; font-family: Poppins, sans-serif; font-weight: 800; font-size: 16px">Get
            My Free Audit</a>
          <a href="tel:<?= $cc_phone_link ?>"
            style="display: inline-flex; align-items: center; min-height: 58px; padding: 0 28px; border-radius: 999px; border: 2px solid rgba(255,255,255,0.7); color: #ffffff; font-family: Poppins, sans-serif; font-weight: 700; font-size: 16px">Talk
            to an Expert</a>
        </div>
      </div>
    </section>
    <!-- ===== FOOTER ===== -->
    <footer
      style="position: relative; padding: 70px 24px 34px; background: linear-gradient(180deg, rgba(0,0,0,0.86) 0%, rgba(0,0,0,0.93) 100%), url('images/footer-image.webp') center / cover no-repeat, #000000">
      <div style="max-width: 1240px; margin: 0 auto">
        <div
          style="display: flex; flex-wrap: wrap; gap: 48px; justify-content: space-between; padding-bottom: 44px; border-bottom: 1px solid rgba(255,255,255,0.08)">
          <div style="flex: 1 1 280px; max-width: 340px">

            <a href="/" class="cvg-alogo" aria-label="Creative Converge home" style="margin-bottom: 22px">
              <svg class="cvg-alogo-mark" viewBox="-70 -70 140 140" aria-hidden="true">
                <defs>
                  <linearGradient id="cvgAlogoGradFoot" x1="0" y1="0" x2="1" y2="1">
                    <stop offset="0" stop-color="#7EF0F1" />
                    <stop offset=".5" stop-color="#1FD6D8" />
                    <stop offset="1" stop-color="#0B7D80" />
                  </linearGradient>
                </defs>
                <path class="cvg-alogo-ring" pathLength="1" d="M38.3 -32.1 A50 50 0 1 0 38.3 32.1" fill="none"
                  stroke="url(#cvgAlogoGradFoot)" stroke-width="16" stroke-linecap="round" />
                <g>
                  <path class="cvg-alogo-ring2" pathLength="1" d="M23 -19.3 A30 30 0 1 0 23 19.3" fill="none"
                    stroke="#7EF0F1" stroke-width="5" stroke-linecap="round" />
                  <animateTransform attributeName="transform" type="rotate" from="0 0 0" to="360 0 0" dur="7s"
                    begin="1.4s" repeatCount="indefinite" />
                </g>
                <circle class="cvg-alogo-halo" cx="42" cy="0" r="9" fill="#1FD6D8" />
                <circle class="cvg-alogo-dot" cx="42" cy="0" r="9" fill="#1FD6D8" />
              </svg>
              <span class="cvg-alogo-text" aria-hidden="true">
                <span class="cvg-alogo-w1"><span style="--i:0">C</span><span style="--i:1">r</span><span
                    style="--i:2">e</span><span style="--i:3">a</span><span style="--i:4">t</span><span
                    style="--i:5">i</span><span style="--i:6">v</span><span style="--i:7">e</span></span>
                <span class="cvg-alogo-w2"><span style="--i:0">C</span><span style="--i:1">o</span><span
                    style="--i:2">n</span><span style="--i:3">v</span><span style="--i:4">e</span><span
                    style="--i:5">r</span><span style="--i:6">g</span><span style="--i:7">e</span><span style="--i:8"
                    class="cvg-alogo-dotc"></span></span>
              </span>
            </a>

            <p style="margin: 0; font-size: 14.5px; line-height: 1.65; color: rgba(255,255,255,0.7)">A digital agency
              for web design, development and ecommerce. We build, run and grow online stores across every major
              marketplace.</p>
          </div>
          <nav aria-label="Marketplaces" style="flex: 0 1 200px">
            <h3 style="margin: 0 0 16px; font-family: Poppins, sans-serif; font-size: 15px; font-weight: 700">
              Marketplaces</h3>
            <ul style="margin: 0; padding: 0; list-style: none; display: grid; gap: 10px; font-size: 14px">
              <li><a href="#marketplaces" style="color: rgba(255,255,255,0.72)">Amazon</a></li>
              <li><a href="#marketplaces" style="color: rgba(255,255,255,0.72)">Walmart</a></li>
              <li><a href="#marketplaces" style="color: rgba(255,255,255,0.72)">Etsy</a></li>
              <li><a href="#marketplaces" style="color: rgba(255,255,255,0.72)">TikTok Shop</a></li>
              <li><a href="#marketplaces" style="color: rgba(255,255,255,0.72)">eBay</a></li>
            </ul>
          </nav>
          <nav aria-label="Company" style="flex: 0 1 200px">
            <h3 style="margin: 0 0 16px; font-family: Poppins, sans-serif; font-size: 15px; font-weight: 700">Company
            </h3>
            <ul style="margin: 0; padding: 0; list-style: none; display: grid; gap: 10px; font-size: 14px">
              <li><a href="https://creativeconverge.com/services/" style="color: rgba(255,255,255,0.72)">Services</a></li>
              <li><a href="https://creativeconverge.com/services/service-detail/ecommerce-website-solutions" style="color: rgba(255,255,255,0.72)">How it works</a></li>
            </ul>
          </nav>
          <div style="flex: 0 1 240px">
            <h3 style="margin: 0 0 16px; font-family: Poppins, sans-serif; font-size: 15px; font-weight: 700">Get in
              touch</h3>
            <p style="margin: 0 0 8px; font-size: 14px; color: rgba(255,255,255,0.72)">info@creativeconverge.com</p>
            <p style="margin: 0; font-size: 14px; color: rgba(255,255,255,0.72)"><?= $cc_phone ?></p>
          </div>
        </div>
        <div
          style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 16px; padding-top: 26px; font-size: 13px; color: rgba(255,255,255,0.6)">
          <span>© <?= date('Y') ?> Creative Converge. All rights reserved. Marketplace names belong to their owners.</span>
          <span style="display: flex; gap: 22px; flex-wrap: wrap"><a href="https://creativeconverge.com/privacy-policy/"
              style="color: rgba(255,255,255,0.65)">Privacy Policy</a><a href="https://creativeconverge.com/terms-conditions/"
              style="color: rgba(255,255,255,0.65)">Terms &amp; Conditions</a></span>
        </div>
      </div>
    </footer>
  </div>

  <!-- ===== OFFER DOCK (appears after scrolling) ===== -->
  <div class="cc-dock" data-dock hidden>
    <span class="cc-dock-badge">-15%</span>
    <span class="cc-dock-txt"><strong>15% off all packages</strong><span>Ends in <b data-cd-short>—</b></span></span>
    <a href="#cvg-pp-packages" class="cc-dock-cta">Claim offer</a>
    <button type="button" class="cc-dock-x" data-dock-close aria-label="Hide offer">×</button>
  </div>
</body>
<script>
  (function() {
    // true = load ke baad chat EK dafa khud khule | false = sirf icon, user click kare to khule
    var AUTO_OPEN_CHAT = true;
    var ZENDESK_KEY = "8777e637-9ac3-4499-ae88-6312dcdd69a3"; // velotix widget

    var started = false;

    function loadScript(src, id, onload) {
      var s = document.createElement("script");
      if (id) s.id = id;
      s.src = src;
      s.async = true;
      if (onload) s.onload = onload;
      document.body.appendChild(s);
    }

    function openChat() {
      if (typeof window.zE !== "function") return;
      try {
        zE("messenger", "open");
      } catch (e) {} // naya Zendesk Messaging
      try {
        zE("webWidget", "open");
      } catch (e) {} // purana Classic Web Widget
    }

    function startExtras() {
      if (started) return;
      started = true;

      // 1) Favicon animation

      // 2) Zendesk — loop/setInterval nahi, sirf ek dafa
      loadScript("https://static.zdassets.com/ekr/snippet.js?key=" + ZENDESK_KEY, "ze-snippet", function() {
        if (AUTO_OPEN_CHAT) setTimeout(openChat, 1500);
      });
    }

    ["scroll", "click", "touchstart", "keydown", "mousemove"].forEach(function(ev) {
      window.addEventListener(ev, startExtras, {
        once: true,
        passive: true
      });
    });
    window.addEventListener("load", function() {
      setTimeout(startExtras, 8000);
    });

    // "Chat Now" buttons: zaroorat ho to Zendesk usi waqt load karke kholo
    window.openLiveChat = function() {
      if (typeof window.zE === "function") return openChat();
      startExtras();
      var tries = 0;
      var t = setInterval(function() {
        tries++;
        if (typeof window.zE === "function") {
          clearInterval(t);
          openChat();
        } else if (tries > 20) clearInterval(t);
      }, 300);
    };
  })();
</script>
<script>
  (function() {
    // Same rules as the consult form: digits only (one "+" at the start), 10–15 digits
    function sanitize(v) {
      v = v.replace(/[^\d+]/g, '');
      return v.replace(/(?!^)\+/g, '').slice(0, 16);
    }

    function phoneError(v) {
      var digits = (v || '').replace(/\D/g, '');
      if (!v) return 'Phone number is required';
      if (digits.length < 10) return 'Phone number must be at least 10 digits';
      if (digits.length > 15) return 'Phone number cannot be more than 15 digits';
      if (/^(\d)\1+$/.test(digits)) return 'Enter a valid phone number';
      return '';
    }
    document.querySelectorAll('form.cc-form').forEach(function(form) {
      var phone = form.querySelector('input[name="phone"]');
      if (!phone) return;
      var err = form.querySelector('.cvg-consult-error');
      if (!err) { // the bottom form has no error line yet: add one
        err = document.createElement('span');
        err.className = 'cvg-consult-error';
        err.setAttribute('aria-live', 'polite');
        err.style.cssText = 'display:block;margin-top:4px;font-size:13px;color:#ff9a8a';
        phone.insertAdjacentElement('afterend', err);
      }

      function show(msg) {
        err.textContent = msg;
        phone.style.borderColor = msg ? '#ff6b6b' : '';
        phone.setAttribute('aria-invalid', msg ? 'true' : 'false');
      }
      phone.removeAttribute('pattern');
      phone.addEventListener('input', function() {
        var clean = sanitize(phone.value);
        if (clean !== phone.value) phone.value = clean; // letters are removed as you type
        if (err.textContent) show('');
      });
      form.addEventListener('submit', function(e) {
        var msg = phoneError(phone.value);
        show(msg);
        if (msg || !form.checkValidity()) {
          e.preventDefault();
          if (msg) {
            phone.focus();
            return;
          }
          form.reportValidity();
        }
        // valid: the form posts normally to email.php, which redirects to thankYou
      });
    });
  })();
</script>

</html>