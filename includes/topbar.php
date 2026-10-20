<?php
$tbMessages = [
    ['White-label web design for agencies, under your brand', 'contact-us/'],
    ['Free consultation: we reply within one business day',  'contact-us/'],
    ['Logo design from $99',                                   'pricing/'],
    ['Websites from $299',                                     'pricing/'],
    ['354+ projects delivered for 235+ happy clients',         'cases/'],
];

/* ---------- Right side ---------- */

/* Scroll speed in seconds for one full loop (bigger = slower) */
$tbSpeed = 40;

/* Keep the bar fixed at the top of the screen while scrolling (true / false) */
$tbSticky = true;

/* Pause the moving text when the mouse is over it (true / false) */
$tbPauseOnHover = false;

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

?>
<?php if ($tbSticky): ?><div class="cvg-tb-spacer" id="cvg-topbar-spacer" aria-hidden="true"></div><?php endif; ?>
<div class="cvg-tb<?= $tbSticky ? ' cvg-tb--sticky' : '' ?><?= $tbPauseOnHover ? ' cvg-tb--pause' : '' ?>" id="cvg-topbar" role="region" aria-label="Announcements" style="--tb-speed:<?= (int) $tbSpeed ?>s">

    <div class="cvg-tb-marquee">
        <div class="cvg-tb-track">
            <?php for ($copy = 0; $copy < 2; $copy++): ?>
                <ul class="cvg-tb-set" <?= $copy ? ' aria-hidden="true"' : '' ?>>
                    <?php foreach ($tbMessages as $m): $href = $tbUrl($m[1] ?? ''); ?>
                        <li>

                            <?php if ($href !== ''): ?>
                                <a href="<?= cvg_tb_e($href) ?>" <?= $copy ? ' tabindex="-1"' : '' ?>><?= cvg_tb_e($m[0]) ?></a>
                            <?php else: ?>
                                <span><?= cvg_tb_e($m[0]) ?></span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endfor; ?>
        </div>
    </div>
</div>

<style>
    .cvg-tb {
        --tb-mint: #00D4A3;
        --tb-mint-l: #5FF0C8;
        --tb-ink: #04342C;
        --tb-text: #F2F5F4;
        position: relative;
        z-index: 1001;
        display: flex;
        align-items: center;
        gap: 18px;
        height: 42px;
        padding: 0 18px 0 16px;
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

    /* "New" pill */
    .cvg-tb .cvg-tb-badge {
        flex: none;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        height: 24px;
        padding: 0 11px;
        border-radius: 999px;
        background: #0A0A0A;
        color: var(--tb-mint-l);
        font-size: 11px;
        font-weight: 600;
        letter-spacing: .12em;
        text-transform: uppercase
    }

    .cvg-tb .cvg-tb-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--tb-mint);
        animation: cvgTbPulse 1.8s ease-out infinite
    }

    @keyframes cvgTbPulse {
        0% {
            
        }

        100% {
            
        }
    }

    /* Moving text */
    .cvg-tb .cvg-tb-marquee {
        flex: 1;
        min-width: 0;
        overflow: hidden;
        -webkit-mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent);
        mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent)
    }

    .cvg-tb .cvg-tb-track {
        display: flex;
        width: max-content;
        animation: cvgTbMove var(--tb-speed, 40s) linear infinite
    }

    .cvg-tb.cvg-tb--pause:hover .cvg-tb-track,
    .cvg-tb.cvg-tb--pause:focus-within .cvg-tb-track {
        animation-play-state: paused
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

    /* Keep it fixed even if the theme sets a position on it */
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
        gap: 14px;
        margin: 0;
        padding: 0 14px;
        white-space: nowrap
    }

    .cvg-tb .cvg-tb-set li::before {
        content: none
    }

    .cvg-tb .cvg-tb-set a,
    .cvg-tb .cvg-tb-set span {
        color: #E6FBF5;
        transition: color .25s
    }

    .cvg-tb .cvg-tb-set a:hover {
        color: var(--tb-mint-l);
        text-decoration: underline;
        text-underline-offset: 3px
    }

    .cvg-tb .cvg-tb-star {
        flex: none;
        width: 11px;
        height: 11px;
        fill: var(--tb-mint-l)
    }

    /* Right side */
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
        display: inline-flex;
        align-items: center;
        gap: 6px;
        height: 28px;
        padding: 0 13px;
        border-radius: 999px;
        background: var(--tb-mint);
        color: var(--tb-ink);
        font-size: 12px;
        font-weight: 600;
        transition: background .25s, transform .25s
    }

    .cvg-tb .cvg-tb-cta:hover {
        background: var(--tb-mint-l);
        color: var(--tb-ink);
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
        .cvg-tb .cvg-tb-dot {
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
            if (sticky || pos === 'absolute') top = h;                 /* navbar always sits right below the bar */
            else top = Math.max(0, h - window.scrollY);                /* bar not sticky: navbar slides up as you scroll */
            nav.style.setProperty('top', top + 'px', 'important');     /* 'important' so header.css can't override it */
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