<?php
/* ================= Ticker messages =================
   [ text, link, icon, offer ]
   icon options: tag, spark, trophy, gift, layers, shield, phone, star, flag
   offer = 'vd' / 'bf' → gold rang mein, aur SIRF tab dikhegi jab wo offer chal raha ho
   offer = false       → hamesha dikhegi                                              */
$tbMessages = [
    /* ---- Veterans Day (11 Nov tak) ---- */
    ['Limited Time. Maximum Impact. Lock In 40% Off Premium Execution.',                 'contact-us/', 'flag',   'vd'],
    ["Pretty designs don't pay the bills. Systems built to convert do.",                 'services/',   'spark',  'vd'],
    ['This Veterans Day: up to 40% OFF custom web, app development & growth marketing', 'contact-us/', 'tag',    'vd'],
    ['Enterprise-grade quality without the standard retainers',                          'contact-us/', 'shield', 'vd'],
    /* ---- Black Friday (12 Nov se 30 Nov tak) ---- */
    ['Black Friday: 25% off all packages, ends Nov 30',      'pricing/',          'tag',    'bf'],
    /* ---- Hamesha ---- */
    ['From concept to click',                                 'services/',         'spark',  false],
    ['354+ projects. 235+ happy clients.',                    'cases/',            'trophy', false],
    ['Free logo with every website package',                  'pricing/',          'gift',   false],
    ['Design, development, and marketing under one roof',     'services/',         'layers', false],
    ['You own every pixel. No hidden fees.',                  'pricing/',          'shield', false],
    ["Got an idea? Let's talk today at (855) 677-4898",      'tel:+18556774898',  'phone',  false],
];

/* ---------- Offers (upar wala pehle) ----------
   Jo offer abhi chal raha hai (pehla jiski date nahi guzri) wahi badge, countdown,
   button aur gold lines dikhata hai. Veterans Day khatam → Black Friday khud aa jayega. */
$tbOfferZone = 'America/Chicago';      /* Dallas time */
$tbOffers = [
    'vd' => [
        'ends'  => '2026-11-11 23:59:59',
        'badge' => 'Veterans Day',
        'cta'   => ['Claim Your 40% Growth Discount', 'contact-us/'],
        'short' => 'Claim 40% Off',          /* chhoti screen par button ka text */
        'style' => 'vd',                     /* laal-safed-neela badge */
    ],
    'bf' => [
        'ends'  => '2026-11-30 23:59:59',
        'badge' => 'Black Friday',
        'cta'   => ['Get 25% off', 'pricing/'],
        'short' => 'Get 25% off',
        'style' => '',
    ],
];

/* ---------- Right side ---------- */
$tbPhone      = ['(855) 677-4898', 'tel:+18556774898'];

/* Scroll speed in seconds for one full loop (bigger = slower) */
$tbSpeed = 60;

/* Keep the bar fixed at the top of the screen while scrolling (true / false) */
$tbSticky = true;

/* Pause the moving text when the mouse is over it (true / false) */
$tbPauseOnHover = true;

/* Show a close (×) button. Once closed, the bar stays hidden for this visitor for 1 day */
$tbClosable = false;

/* ---------- URLs ---------- */
$siteUrl = $siteUrl ?? '';   /* empty = detected automatically */

/* ================= Nothing to change below this line ================= */
if (!function_exists('cvg_tb_e')) {
    function cvg_tb_e($s)
    {
        return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
    }
}
if ($siteUrl === '') {
    $tbRoot  = is_dir(dirname(__DIR__) . '/assets') ? dirname(__DIR__) : __DIR__;
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
    $rootReal = realpath($tbRoot);
    $n = function ($p) {
        return str_replace('\\', '/', $p);
    };
    $sub = ($docRoot && $rootReal && strpos($n($rootReal), $n($docRoot)) === 0) ? substr($n($rootReal), strlen($n($docRoot))) : '';
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? '';
    $siteUrl = ($host !== '' ? $scheme . '://' . $host : '') . rtrim($sub, '/') . '/';
}
$tbUrl = function ($p) use ($siteUrl) {
    if ($p === '' || preg_match('~^(https?:|mailto:|tel:|#|//)~i', $p)) return $p;
    return rtrim($siteUrl, '/') . '/' . ltrim($p, '/');
};

/* Abhi kaunsa offer chal raha hai? (server time se) */
$tbActive = null; $tbOfferEndTs = 0;
foreach ($tbOffers as $tbKey => $tbO) {
    try {
        $ts = (new DateTime($tbO['ends'], new DateTimeZone($tbOfferZone)))->getTimestamp();
    } catch (Exception $e) {
        continue;
    }
    if ($ts > time()) { $tbActive = $tbKey; $tbOfferEndTs = $ts; break; }
}
$tbOfferLive  = $tbActive !== null;
$tbOfferBadge = $tbOfferLive ? $tbOffers[$tbActive]['badge'] : '';
$tbOfferCta   = $tbOfferLive ? $tbOffers[$tbActive]['cta'] : ['', ''];
$tbOfferShort = $tbOfferLive ? ($tbOffers[$tbActive]['short'] ?? $tbOfferCta[0]) : '';
$tbOfferStyle = $tbOfferLive ? ($tbOffers[$tbActive]['style'] ?? '') : '';
/* Sirf chalte offer ki lines rakho (doosre offer ki aur khatam ho chuki lines hata do) */
$tbMessages = array_values(array_filter($tbMessages, function ($m) use ($tbActive) {
    return empty($m[3]) || $m[3] === $tbActive;
}));

$tbIcons = [
    'tag'    => '<path d="M20.6 13.4l-7.2 7.2a2 2 0 01-2.8 0L3 13V3h10l7.6 7.6a2 2 0 010 2.8z"/><circle cx="7.5" cy="7.5" r="1.5"/>',
    'spark'  => '<path d="M12 3l1.8 5.2L19 10l-5.2 1.8L12 17l-1.8-5.2L5 10l5.2-1.8z"/><path d="M19 15l.8 2.2L22 18l-2.2.8L19 21l-.8-2.2L16 18l2.2-.8z"/>',
    'trophy' => '<path d="M8 4h8v5a4 4 0 01-8 0z"/><path d="M8 6H5a3 3 0 003 4M16 6h3a3 3 0 01-3 4M12 13v4M8 21h8M10 17h4v4h-4z"/>',
    'gift'   => '<rect x="3" y="8" width="18" height="5" rx="1"/><path d="M5 13v8h14v-8M12 8v13M12 8S10.5 3 8 3.5 7 8 12 8zM12 8s1.5-5 4-4.5S17 8 12 8z"/>',
    'layers' => '<path d="M12 3l9 5-9 5-9-5z"/><path d="M3 13l9 5 9-5M3 17.5l9 5 9-5"/>',
    'shield' => '<path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M9 12l2 2 4-4"/>',
    'phone'  => '<path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6A19.8 19.8 0 012.1 4.2 2 2 0 014.1 2h3a2 2 0 012 1.7c.1.9.4 1.8.7 2.7a2 2 0 01-.5 2.1L8 9.8a16 16 0 006 6l1.3-1.3a2 2 0 012.1-.4c.9.3 1.8.6 2.7.7a2 2 0 011.7 2z"/>',
    'star'   => '<path d="M12 3l2.7 5.6 6.1.9-4.4 4.3 1 6.1L12 17l-5.4 2.9 1-6.1-4.4-4.3 6.1-.9z"/>',
    'flag'   => '<path d="M5 21V4"/><path d="M5 4h12l-2.5 4L17 12H5"/>',
];
$tbIcon = function ($name, $cls = 'cvg-tb-ic') use ($tbIcons) {
    $p = $tbIcons[$name] ?? $tbIcons['star'];
    return '<svg class="' . $cls . '" viewBox="0 0 24 24" aria-hidden="true">' . $p . '</svg>';
};
?>
<?php if ($tbSticky): ?><div class="cvg-tb-spacer" id="cvg-topbar-spacer" aria-hidden="true"></div><?php endif; ?>
<div class="cvg-tb<?= $tbSticky ? ' cvg-tb--sticky' : '' ?><?= $tbPauseOnHover ? ' cvg-tb--pause' : '' ?>" id="cvg-topbar" role="region" aria-label="Announcements" style="--tb-speed:<?= (int) $tbSpeed ?>s">

    <?php if ($tbOfferLive): ?>
        <a class="cvg-tb-badge<?= $tbOfferStyle ? ' cvg-tb-badge--' . cvg_tb_e($tbOfferStyle) : '' ?>" href="<?= cvg_tb_e($tbUrl($tbOfferCta[1])) ?>" data-tb-ends="<?= (int) $tbOfferEndTs ?>">
            <?php if ($tbOfferStyle === 'vd'): ?><?= $tbIcon('star', 'cvg-tb-star') ?><?php else: ?><span class="cvg-tb-dot" aria-hidden="true"></span><?php endif; ?>
            <?= cvg_tb_e($tbOfferBadge) ?>
            <span class="cvg-tb-count" data-tb-count aria-label="Offer ends in"></span>
        </a>
    <?php endif; ?>

    <div class="cvg-tb-marquee">
        <div class="cvg-tb-track">
            <?php for ($copy = 0; $copy < 2; $copy++): ?>
                <ul class="cvg-tb-set" <?= $copy ? ' aria-hidden="true"' : '' ?>>
                    <?php foreach ($tbMessages as $m):
                        $href = $tbUrl($m[1] ?? '');
                        $hot  = !empty($m[3]);
                        $inner = $tbIcon($m[2] ?? 'star') . '<span class="cvg-tb-txt">' . cvg_tb_e($m[0]) . '</span>';
                    ?>
                        <li class="<?= $hot ? 'cvg-tb-hot' : '' ?>">
                            <?php if ($href !== ''): ?>
                                <a href="<?= cvg_tb_e($href) ?>" <?= $copy ? ' tabindex="-1"' : '' ?>><?= $inner ?></a>
                            <?php else: ?>
                                <span class="cvg-tb-item"><?= $inner ?></span>
                            <?php endif; ?>
                            <span class="cvg-tb-sep" aria-hidden="true">✦</span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endfor; ?>
        </div>
    </div>

    <div class="cvg-tb-side">
        <a class="cvg-tb-phone" href="<?= cvg_tb_e($tbPhone[1]) ?>">
            <?= $tbIcon('phone', '') ?><?= cvg_tb_e($tbPhone[0]) ?>
        </a>
        <?php if ($tbOfferLive): ?>
            <a class="cvg-tb-cta" href="<?= cvg_tb_e($tbUrl($tbOfferCta[1])) ?>">
                <span class="cvg-tb-cta-long"><?= cvg_tb_e($tbOfferCta[0]) ?></span><span class="cvg-tb-cta-short"><?= cvg_tb_e($tbOfferShort) ?></span>
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17L17 7M8 7h9v9" /></svg>
            </a>
        <?php endif; ?>
        <?php if ($tbClosable): ?>
            <button type="button" class="cvg-tb-close" aria-label="Close announcement">×</button>
        <?php endif; ?>
    </div>
</div>

<style>
    .cvg-tb {
        --tb-mint: #00D4A3;
        --tb-mint-l: #5FF0C8;
        --tb-ink: #04342C;
        --tb-text: #F2F5F4;
        --tb-gold: #FFC94D;
        position: relative;
        z-index: 1001;
        display: flex;
        align-items: center;
        gap: 16px;
        height: 42px;
        padding: 0 16px;
        overflow: hidden;
        box-sizing: border-box;
        background: radial-gradient(70% 300% at 12% 10%, rgba(28, 197, 169, .45) 0%, rgba(28, 197, 169, 0) 60%), linear-gradient(100deg, rgb(3, 134, 111) 0%, rgb(0, 67, 55) 48%, rgb(0, 33, 27) 100%);
        border-bottom: 1px solid rgba(95, 240, 200, .18);
        color: var(--tb-text);
        font: 500 13px/1 'Poppins', sans-serif;
        -webkit-font-smoothing: antialiased;
        transition: height .35s ease, opacity .35s ease;
    }

    .cvg-tb *,
    .cvg-tb *::before,
    .cvg-tb *::after {
        box-sizing: border-box
    }

    .cvg-tb.cvg-tb--closed {
        height: 0;
        opacity: 0;
        border: 0
    }

    .cvg-tb a {
        color: inherit;
        text-decoration: none
    }

    /* ---------- Black Friday badge (left) ---------- */
    .cvg-tb .cvg-tb-badge {
        flex: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        height: 26px;
        padding: 0 12px 0 10px;
        border-radius: 999px;
        background: #0A0A0A;
        border: 1px solid rgba(255, 201, 77, .35);
        color: var(--tb-gold);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .12em;
        text-transform: uppercase;
        transition: border-color .25s, transform .25s
    }

    /* Veterans Day badge: neela + laal border + chamakta sitara */
    .cvg-tb .cvg-tb-badge--vd {
        background: linear-gradient(90deg, #0b1f4d, #13306f);
        color: #fff
    }

    .cvg-tb .cvg-tb-badge--vd:hover {
        border-color: #ff3b4e
    }

    .cvg-tb .cvg-tb-star {
        width: 13px;
        height: 13px;
        fill: var(--tb-gold);
        stroke: var(--tb-gold);
        stroke-width: 1;
        animation: cvgTbStar 2s ease-in-out infinite
    }

    @keyframes cvgTbStar {
        0%, 100% { transform: scale(1) rotate(0) }
        50% { transform: scale(1.25) rotate(18deg) }
    }

    .cvg-tb .cvg-tb-cta-short {
        display: none
    }

    @media (max-width:1280px) {
        .cvg-tb .cvg-tb-cta-long { display: none }
        .cvg-tb .cvg-tb-cta-short { display: inline }
    }

    .cvg-tb .cvg-tb-badge:hover {
        border-color: var(--tb-gold);
        transform: translateY(-1px)
    }

    .cvg-tb .cvg-tb-dot {
        position: relative;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--tb-gold)
    }

    .cvg-tb .cvg-tb-dot::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 50%;
        background: var(--tb-gold);
        animation: cvgTbPulse 1.8s ease-out infinite
    }

    @keyframes cvgTbPulse {
        0% {
            transform: scale(1);
            opacity: .8
        }

        100% {
            transform: scale(3);
            opacity: 0
        }
    }

    .cvg-tb .cvg-tb-count {
        padding-left: 8px;
        border-left: 1px solid rgba(255, 255, 255, .18);
        color: #E6FBF5;
        font-weight: 600;
        letter-spacing: .04em;
        text-transform: none;
        font-variant-numeric: tabular-nums
    }

    .cvg-tb .cvg-tb-count:empty {
        display: none
    }

    /* ---------- Moving text ---------- */
    .cvg-tb .cvg-tb-marquee {
        flex: 1;
        min-width: 0;
        overflow: hidden;
        -webkit-mask-image: linear-gradient(90deg, transparent, #000 5%, #000 95%, transparent);
        mask-image: linear-gradient(90deg, transparent, #000 5%, #000 95%, transparent)
    }

    .cvg-tb .cvg-tb-track {
        display: flex;
        width: max-content;
        animation: cvgTbMove var(--tb-speed, 60s) linear infinite
    }

    .cvg-tb.cvg-tb--pause:hover .cvg-tb-track,
    .cvg-tb.cvg-tb--pause:focus-within .cvg-tb-track {
        animation-play-state: paused
    }

    @keyframes cvgTbMove {
        to {
            transform: translateX(-50%)
        }
    }

    .cvg-tb .cvg-tb-set {
        display: flex;
        align-items: center;
        margin: 0;
        padding: 0;
        list-style: none
    }

    .cvg-tb .cvg-tb-set li {
        display: inline-flex;
        align-items: center;
        gap: 22px;
        margin: 0;
        padding: 0 0 0 22px;
        white-space: nowrap
    }

    .cvg-tb .cvg-tb-set li::before {
        content: none
    }

    .cvg-tb .cvg-tb-set a,
    .cvg-tb .cvg-tb-item {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #E6FBF5;
        transition: color .25s
    }

    .cvg-tb .cvg-tb-set a:hover {
        color: var(--tb-mint-l)
    }

    .cvg-tb .cvg-tb-set a:hover .cvg-tb-txt {
        text-decoration: underline;
        text-underline-offset: 3px
    }

    .cvg-tb .cvg-tb-ic {
        flex: none;
        width: 15px;
        height: 15px;
        fill: none;
        stroke: var(--tb-mint-l);
        stroke-width: 1.9;
        stroke-linecap: round;
        stroke-linejoin: round
    }

    .cvg-tb .cvg-tb-sep {
        color: var(--tb-mint);
        font-size: 11px;
        opacity: .8
    }

    /* Offer line: gold + halki chamak */
    .cvg-tb .cvg-tb-hot a,
    .cvg-tb .cvg-tb-hot .cvg-tb-item {
        color: var(--tb-gold);
        font-weight: 700
    }

    .cvg-tb .cvg-tb-hot .cvg-tb-ic {
        stroke: var(--tb-gold);
        animation: cvgTbWiggle 2.4s ease-in-out infinite
    }

    @keyframes cvgTbWiggle {

        0%,
        70%,
        100% {
            transform: rotate(0)
        }

        78% {
            transform: rotate(-14deg)
        }

        86% {
            transform: rotate(12deg)
        }

        94% {
            transform: rotate(-6deg)
        }
    }

    /* Always on top while scrolling */
    .cvg-tb.cvg-tb--sticky {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 2147483000 !important;
        transform: none !important
    }

    #cvg-topbar.cvg-tb--sticky {
        position: fixed !important;
        top: 0 !important
    }

    .cvg-tb-spacer {
        height: 42px;
        transition: height .35s ease
    }

    .cvg-tb-spacer.cvg-tb--closed {
        height: 0
    }

    /* ---------- Right side ---------- */
    .cvg-tb .cvg-tb-side {
        flex: none;
        display: flex;
        align-items: center;
        gap: 14px
    }

    .cvg-tb .cvg-tb-phone {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #E6FBF5;
        font-weight: 600;
        transition: color .25s
    }

    .cvg-tb .cvg-tb-phone:hover {
        color: var(--tb-mint-l)
    }

    .cvg-tb .cvg-tb-phone svg {
        width: 14px;
        height: 14px;
        fill: none;
        stroke: currentColor;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round
    }

    .cvg-tb .cvg-tb-cta {
        position: relative;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        height: 28px;
        padding: 0 14px;
        border-radius: 999px;
        background: var(--tb-gold);
        color: #2B1D00;
        font-size: 12px;
        font-weight: 700;
        transition: background .25s, transform .25s
    }

    .cvg-tb .cvg-tb-cta::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(110deg, transparent 30%, rgba(255, 255, 255, .55) 50%, transparent 70%);
        transform: translateX(-100%);
        animation: cvgTbShine 3.2s ease-in-out 1s infinite
    }

    @keyframes cvgTbShine {

        60%,
        100% {
            transform: translateX(100%)
        }
    }

    .cvg-tb .cvg-tb-cta:hover {
        background: #FFD873;
        color: #2B1D00;
        transform: translateY(-1px)
    }

    .cvg-tb .cvg-tb-cta svg {
        width: 13px;
        height: 13px;
        fill: none;
        stroke: currentColor;
        stroke-width: 2.4;
        stroke-linecap: round
    }

    .cvg-tb .cvg-tb-close {
        width: 26px;
        height: 26px;
        margin: 0;
        padding: 0;
        border: 1px solid rgba(242, 245, 244, .25);
        border-radius: 50%;
        background: transparent;
        color: var(--tb-text);
        font: 400 18px/1 'Poppins', sans-serif;
        cursor: pointer;
        display: grid;
        place-items: center;
        transition: background .25s, color .25s, border-color .25s
    }

    .cvg-tb .cvg-tb-close:hover {
        background: #0A0A0A;
        color: var(--tb-mint-l);
        border-color: var(--tb-mint)
    }

    .cvg-tb a:focus-visible,
    .cvg-tb button:focus-visible {
        outline: 2px solid var(--tb-mint-l);
        outline-offset: 2px
    }

    @media (max-width:1024px) {
        .cvg-tb .cvg-tb-count {
            display: none
        }
    }

    @media (max-width:860px) {
        .cvg-tb .cvg-tb-phone {
            display: none
        }
    }

    @media (max-width:600px) {
        .cvg-tb {
            height: 38px;
            gap: 10px;
            padding: 0 10px
        }

        .cvg-tb-spacer {
            height: 38px
        }

        .cvg-tb .cvg-tb-badge,
        .cvg-tb .cvg-tb-cta {
            display: none
        }

        .cvg-tb .cvg-tb-marquee {
            -webkit-mask-image: linear-gradient(90deg, transparent, #000 4%, #000 96%, transparent);
            mask-image: linear-gradient(90deg, transparent, #000 4%, #000 96%, transparent)
        }
    }

    @media (prefers-reduced-motion:reduce) {

        .cvg-tb .cvg-tb-track,
        .cvg-tb .cvg-tb-dot::after,
        .cvg-tb .cvg-tb-hot .cvg-tb-ic,
        .cvg-tb .cvg-tb-cta::after,
        .cvg-tb .cvg-tb-star {
            animation: none
        }

        .cvg-tb .cvg-tb-marquee {
            overflow-x: auto
        }
    }
</style>

<script>
    (function() {
        var bar = document.getElementById('cvg-topbar');
        if (!bar) return;
        var KEY = 'cvgTopbarClosed';
        var sticky = bar.classList.contains('cvg-tb--sticky');
        var spacer = document.getElementById('cvg-topbar-spacer');

        /* Move the bar straight into <body>. If any wrapper around it has a CSS transform,
           filter or smooth-scroll effect, a "fixed" bar would scroll away with the page. */
        if (sticky && document.body && bar.parentNode !== document.body) {
            document.body.insertBefore(bar, document.body.firstChild);
            if (spacer) document.body.insertBefore(spacer, bar);
        }

        /* Offer countdown: "4d 06h 12m" — offer khatam ho to badge, CTA aur offer line hat jayein */
        var badge = bar.querySelector('[data-tb-ends]');
        if (badge) {
            var ends = parseInt(badge.getAttribute('data-tb-ends'), 10) * 1000;
            var out = badge.querySelector('[data-tb-count]');
            var pad = function(n) {
                return (n < 10 ? '0' : '') + n;
            };
            var tick = function() {
                var ms = ends - Date.now();
                if (ms <= 0) {
                    badge.remove();
                    var cta = bar.querySelector('.cvg-tb-cta');
                    if (cta) cta.remove();
                    bar.querySelectorAll('.cvg-tb-hot').forEach(function(li) {
                        li.remove();
                    });
                    clearInterval(timer);
                    return;
                }
                var d = Math.floor(ms / 864e5),
                    h = Math.floor(ms % 864e5 / 36e5),
                    m = Math.floor(ms % 36e5 / 6e4);
                if (out) out.textContent = (d ? d + 'd ' : '') + pad(h) + 'h ' + pad(m) + 'm';
            };
            var timer = setInterval(tick, 30000);
            tick();
        }

        /* Stay hidden for 1 day after the visitor closes it */
        try {
            var t = parseInt(localStorage.getItem(KEY), 10);
            if (bar.querySelector('.cvg-tb-close') && t && Date.now() - t < 864e5) {
                bar.classList.add('cvg-tb--closed');
                if (spacer) spacer.classList.add('cvg-tb--closed');
            }
        } catch (e) {}

        /* If your navbar is fixed/absolute at the top, push it down below the bar */
        var nav = null;

        function findNav() {
            var sib = bar.nextElementSibling;
            while (sib && (sib.tagName === 'STYLE' || sib.tagName === 'SCRIPT' || sib.tagName === 'LINK')) sib = sib.nextElementSibling;
            var candidates = [sib, document.querySelector('header'), document.querySelector('nav')];
            for (var i = 0; i < candidates.length; i++) {
                var el = candidates[i];
                if (el && el !== bar && !bar.contains(el)) {
                    var pos = getComputedStyle(el).position;
                    if (pos === 'fixed' || pos === 'absolute' || pos === 'sticky') return el;
                }
            }
            return null;
        }

        function place() {
            if (!nav) return;
            var h = bar.classList.contains('cvg-tb--closed') ? 0 : bar.offsetHeight;
            var pos = getComputedStyle(nav).position;
            var top;
            if (sticky || pos === 'absolute') top = h;
            else top = Math.max(0, h - window.scrollY);
            nav.style.setProperty('top', top + 'px', 'important');
        }

        function init() {
            nav = findNav();
            place();
        }
        if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
        else init();
        window.addEventListener('load', init);
        window.addEventListener('scroll', place, {
            passive: true
        });
        window.addEventListener('resize', place);

        var close = bar.querySelector('.cvg-tb-close');
        if (close) close.addEventListener('click', function() {
            bar.classList.add('cvg-tb--closed');
            if (spacer) spacer.classList.add('cvg-tb--closed');
            try {
                localStorage.setItem(KEY, String(Date.now()));
            } catch (e) {}
            place();
            setTimeout(place, 400);
        });
    })();
</script>