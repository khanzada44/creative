<?php

$tmEyebrow = 'Testimonials';
$tmTitle   = 'Loved by <span>our clients.</span>';   /* <span> = mint colour */
$tmLead    = 'Real words from businesses and agencies we have designed and built for.';
$tmReviews = [
    ['name' => 'Stephany',  'photo' => 'assets/img/Testimonial-Jacomien-Nel.jpg', 'text' => 'Creative designs with attention to detail. They made our vision come alive while ensuring great performance.'],
    ['name' => 'Chris',     'photo' => 'assets/img/i.webp', 'text' => 'The team was patient and professional. Our e-commerce platform is seamless, and sales have already improved!'],
    ['name' => 'Julie',     'photo' => 'assets/img/Julie.jpg', 'text' => 'Fantastic design and smooth functionality! The team captured our brand perfectly. Highly recommend for professional results.'],
    ['name' => 'Allan',     'photo' => 'assets/img/Allan.jpg', 'text' => 'Quick, responsive, and delivered on time. Our new website is clean, user-friendly and mobile-optimized. Excellent service!'],
    ['name' => 'Maria',     'photo' => 'assets/img/Maria.jpg', 'text' => 'Our traffic has doubled since launching the new site. They\'re experts at design and optimization!'],
    ['name' => 'Shawn',     'photo' => 'assets/img/Shawn.jpg', 'text' => 'Efficient, creative, and affordable. The website looks amazing and works perfectly on all devices.'],
    ['name' => 'Jaquliene', 'photo' => 'assets/img/Jaquliene.jpg', 'text' => 'Superb collaboration and results! The team made the process easy and delivered a beautiful, functional site.'],
    ['name' => 'Christina', 'photo' => 'assets/img/Christina.jpg', 'text' => 'Great customer service and attention to detail. They took our ideas and turned them into a professional, eye-catching website.'],
];

$tmVideos = [
    ['video' => 'assets/videos/Review_1.mp4', 'poster' => '', 'photo' => '', 'name' => 'Client name', 'role' => 'Video review', 'text' => ''],
    ['video' => 'assets/videos/Review_2.mp4', 'poster' => '', 'photo' => '', 'name' => 'Client name', 'role' => 'Video review', 'text' => ''],
];
$tmVideoTitle = 'Hear it from them';

$tmRoleLabel = 'Client';
$tmSpeed = 45;
$uploads = $uploads ?? 'https://creativeconverge.com/mockups/creativemock/wp-content/uploads/';
$siteUrl = $siteUrl ?? '';  

/* ================= Nothing to change below this line ================= */
if (!function_exists('cvg_tm_e')) {
    function cvg_tm_e($s)
    {
        return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
    }
}
if ($siteUrl === '') {
    $tmRoot  = is_dir(dirname(__DIR__) . '/assets') ? dirname(__DIR__) : __DIR__;
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
    $rootReal = realpath($tmRoot);
    $n = function ($p) {
        return str_replace('\\', '/', $p);
    };
    $sub = ($docRoot && $rootReal && strpos($n($rootReal), $n($docRoot)) === 0) ? substr($n($rootReal), strlen($n($docRoot))) : '';
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? '';
    $siteUrl = ($host !== '' ? $scheme . '://' . $host : '') . rtrim($sub, '/') . '/';
}
$tmImg = function ($p) use ($uploads, $siteUrl) {
    $p = trim(str_replace('\\', '/', $p));
    if ($p === '' || preg_match('~^(https?:)?//~i', $p)) return $p;
    if (preg_match('~^/?assets/~i', $p)) return rtrim($siteUrl, '/') . '/' . ltrim($p, '/');
    return rtrim($uploads, '/') . '/' . ltrim($p, '/');
};
/* a review with a video file in 'photo' becomes a video review */
foreach ($tmReviews as $k => $r) {
    if (preg_match('~\.(mp4|webm|mov|m4v)(\?.*)?$~i', $r['photo'] ?? '')) {
        $tmVideos[] = ['video' => $r['photo'], 'poster' => '', 'name' => $r['name'], 'role' => $r['role'] ?? 'Video review', 'text' => $r['text'] ?? ''];
        unset($tmReviews[$k]);
    }
}
$tmReviews = array_values($tmReviews);
/* remove duplicate videos (same file twice) */
$tmSeen = [];
$tmVideos = array_values(array_filter($tmVideos ?? [], function ($v) use (&$tmSeen) {
    $f = $v['video'] ?? ''; if ($f === '' || isset($tmSeen[$f])) return false; $tmSeen[$f] = 1; return true;
}));
$tmPlay = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5.5v13l11-6.5z"/></svg>';

/* split reviews into two rows */
$tmHalf = (int) ceil(count($tmReviews) / 2);
$tmRows = [array_slice($tmReviews, 0, $tmHalf), array_slice($tmReviews, $tmHalf)];
if (!$tmRows[1]) $tmRows[1] = $tmRows[0];
foreach ($tmVideos as $vi => $v) {
    $v['is_video'] = true;
    $ri = $vi % 2;
    array_splice($tmRows[$ri], (int) floor(count($tmRows[$ri]) / 2), 0, [$v]);
}
$tmQuote = '<svg class="cvg-tm-q" viewBox="0 0 48 36" aria-hidden="true"><path d="M0 36V20C0 9 6 2 18 0l2 5c-7 2-10 6-10 12h8v19H0zm28 0V20C28 9 34 2 46 0l2 5c-7 2-10 6-10 12h8v19H28z"/></svg>';

if (!function_exists('cvg_tm_card')) {
    function cvg_tm_card($r, $tmImg, $tmQuote, $hidden, $role = 'Client')
    {
        $initial = mb_strtoupper(mb_substr(trim($r['name']), 0, 1));
        if (!empty($r['is_video'])) {
            $vsrc = $tmImg($r['video']);
            $vposter = $tmImg($r['poster'] ?? '');
            $play = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 5.5v13l11-6.5z"/></svg>';
            ob_start(); ?>
        <figure class="cvg-tm-card cvg-tm-card--video" <?= $hidden ? ' aria-hidden="true"' : '' ?>>
            <button type="button" class="cvg-tm-vbtn" data-src="<?= cvg_tm_e($vsrc) ?>" <?= $hidden ? 'tabindex="-1"' : '' ?> aria-label="Play video review from <?= cvg_tm_e($r['name']) ?>">
                <video class="cvg-tm-vprev" src="<?= cvg_tm_e($vsrc) ?>#t=0.1" muted loop playsinline preload="metadata"<?= $vposter !== '' ? ' poster="' . cvg_tm_e($vposter) . '"' : '' ?> aria-hidden="true"></video>
                <span class="cvg-tm-vshade" aria-hidden="true"></span>
                <span class="cvg-tm-vplay" aria-hidden="true"><?= $play ?></span>
                <span class="cvg-tm-vtag" aria-hidden="true"><i></i>Video review</span>
            </button>
            <?php if (!empty($r['text'])): ?><blockquote class="cvg-tm-vtext">&ldquo;<?= cvg_tm_e($r['text']) ?>&rdquo;</blockquote><?php endif; ?>
            <figcaption>
                <?php $ph = $tmImg($r['photo'] ?? ''); if ($ph !== ''): ?><span class="cvg-tm-av"><img src="<?= cvg_tm_e($ph) ?>" alt="" loading="lazy"></span><?php endif; ?>
                <span class="cvg-tm-who"><strong><?= cvg_tm_e($r['name']) ?></strong><small><?= cvg_tm_e($r['role'] ?? $role) ?></small></span>
            </figcaption>
        </figure>
<?php       return ob_get_clean();
        }
        $src = $tmImg($r['photo'] ?? '');
        ob_start(); ?>
        <figure class="cvg-tm-card" <?= $hidden ? ' aria-hidden="true"' : '' ?>>
            <?= $tmQuote ?>
            <blockquote>&ldquo;<?= cvg_tm_e($r['text']) ?>&rdquo;</blockquote>
            <figcaption>
                <span class="cvg-tm-av">
                    <?php if ($src !== ''): ?><img src="<?= cvg_tm_e($src) ?>" alt="<?= $hidden ? '' : cvg_tm_e($r['name']) ?>" loading="lazy"><?php else: ?><?= cvg_tm_e($initial) ?><?php endif; ?>
                </span>
                <span class="cvg-tm-who"><strong><?= cvg_tm_e($r['name']) ?></strong><small><?= cvg_tm_e($r['role'] ?? $role) ?></small></span>
            </figcaption>
        </figure>
<?php return ob_get_clean();
    }
}
?>
<section class="cvg-tm" id="cvg-testimonials" aria-labelledby="cvg-tm-title" style="--tm-speed:<?= (int) $tmSpeed ?>s">
    <div class="cvg-tm-glow" aria-hidden="true"></div>
    <div class="cvg-tm-wrap">
        <p class="cvg-tm-eyebrow"><?= cvg_tm_e($tmEyebrow) ?></p>
        <h2 class="cvg-tm-title" id="cvg-tm-title"><?= strip_tags($tmTitle, '<br><span>') ?></h2>
        <p class="cvg-tm-lead"><?= cvg_tm_e($tmLead) ?></p>
    </div>

    <?php foreach ($tmRows as $ri => $row): ?>
        <div class="cvg-tm-row<?= $ri ? ' cvg-tm-row--rev' : '' ?>">
            <div class="cvg-tm-track">
                <?php for ($copy = 0; $copy < 2; $copy++): ?>
                    <div class="cvg-tm-set">
                        <?php foreach ($row as $r) echo cvg_tm_card($r, $tmImg, $tmQuote, $copy === 1, $tmRoleLabel); ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <?php if ($tmVideos): ?>
    <div class="cvg-tm-modal" role="dialog" aria-modal="true" aria-label="Video review" hidden>
        <button type="button" class="cvg-tm-mclose" aria-label="Close video">&times;</button>
        <div class="cvg-tm-mbox"><video class="cvg-tm-mvideo" controls playsinline></video></div>
    </div>
    <?php endif; ?>
</section>

<style>
    .cvg-tm {
        --tm-mint: #00D4A3;
        --tm-mint-l: #5FF0C8;
        --tm-ink: #04342C;
        --tm-text: #F2F5F4;
        --tm-text-2: #C9D6D2;
        --tm-muted: #8FA39E;
        position: relative;
        overflow: hidden;
        padding: 110px 0 120px;
        background: #0A0A0A;
        color: var(--tm-text);
        font-family: 'Poppins', sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    .cvg-tm *,
    .cvg-tm *::before,
    .cvg-tm *::after {
        box-sizing: border-box
    }

    .cvg-tm .cvg-tm-glow {
        position: absolute;
        left: 50%;
        top: -180px;
        width: 900px;
        height: 520px;
        transform: translateX(-50%);
        pointer-events: none;
        background: radial-gradient(closest-side, rgba(0, 212, 163, .20), rgba(0, 212, 163, 0))
    }

    .cvg-tm .cvg-tm-wrap {
        position: relative;
        max-width: 760px;
        margin: 0 auto 56px;
        padding: 0 24px;
        text-align: center
    }

    .cvg-tm .cvg-tm-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        margin: 0 0 16px;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: var(--tm-mint)
    }

    .cvg-tm .cvg-tm-eyebrow::before,
    .cvg-tm .cvg-tm-eyebrow::after {
        content: "";
        width: 32px;
        height: 2px;
        background: currentColor
    }

    .cvg-tm .cvg-tm-title {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        font-size: clamp(34px, 4.6vw, 58px);
        font-weight: 700;
        line-height: 1.05;
        letter-spacing: -.03em;
        color: var(--tm-text);
        text-transform: none
    }

    .cvg-tm .cvg-tm-title span {
        color: var(--tm-mint)
    }

    .cvg-tm .cvg-tm-lead {
        margin: 16px 0 0;
        font-size: 16.5px;
        line-height: 1.65;
        color: var(--tm-muted)
    }

    /* Rows: slide sideways forever, fade at the edges */
    .cvg-tm .cvg-tm-row {
        position: relative;
        overflow: hidden;
        padding: 14px 0;
        -webkit-mask-image: linear-gradient(90deg, transparent, #000 9%, #000 91%, transparent);
        mask-image: linear-gradient(90deg, transparent, #000 9%, #000 91%, transparent)
    }

    .cvg-tm .cvg-tm-row+.cvg-tm-row {
        margin-top: 6px
    }

    .cvg-tm .cvg-tm-track {
        display: flex;
        width: max-content;
        animation: cvgTmMove var(--tm-speed, 45s) linear infinite
    }

    .cvg-tm .cvg-tm-row--rev .cvg-tm-track {
        animation-direction: reverse
    }

    .cvg-tm .cvg-tm-set {
        display: flex;
        gap: 22px;
        padding-right: 22px
    }

    @keyframes cvgTmMove {
        to {
            transform: translateX(-50%)
        }
    }

    /* Cards */
    .cvg-tm .cvg-tm-card {
        position: relative;
        flex: 0 0 340px;
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 28px 28px 24px;
        border-radius: 24px;
        background: linear-gradient(160deg, #141B19 0%, #0F1413 100%);
        border: 1px solid #1E2A27;
        transition: transform .45s cubic-bezier(.2, .9, .2, 1), border-color .35s, box-shadow .45s, background .35s
    }

    .cvg-tm .cvg-tm-card:hover {
        transform: translateY(-8px) scale(1.03);
        border-color: var(--tm-mint);
        background: radial-gradient(90% 70% at 0% 0%, rgba(28, 197, 169, .22), rgba(28, 197, 169, 0) 60%), linear-gradient(160deg, #0B3B31 0%, #00211B 100%);
        box-shadow: 0 26px 60px rgba(0, 0, 0, .55), 0 0 0 6px rgba(0, 212, 163, .07)
    }

    .cvg-tm .cvg-tm-q {
        position: absolute;
        right: 24px;
        top: 22px;
        width: 34px;
        height: 26px;
        fill: var(--tm-mint);
        opacity: .25;
        transition: opacity .35s, transform .45s
    }

    .cvg-tm .cvg-tm-card:hover .cvg-tm-q {
        opacity: .9;
        transform: scale(1.1)
    }

    .cvg-tm .cvg-tm-card blockquote {
        margin: 0 0 24px;
        padding: 0 30px 0 0;
        border: 0;
        font-size: 15.5px;
        line-height: 1.65;
        font-weight: 400;
        font-style: normal;
        color: var(--tm-text-2);
        quotes: none
    }

    .cvg-tm .cvg-tm-card:hover blockquote {
        color: var(--tm-text)
    }

    .cvg-tm .cvg-tm-card figcaption {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-top: auto;
        padding-top: 18px;
        border-top: 1px solid rgba(95, 240, 200, .12)
    }

    .cvg-tm .cvg-tm-av {
        flex: none;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        overflow: hidden;
        display: grid;
        place-items: center;
        color: var(--tm-ink);
        font-weight: 700;
        font-size: 18px;
    }

    .cvg-tm .cvg-tm-av img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        margin: 0;
        border-radius: 0;
        max-width: none;
        box-shadow: none
    }

    .cvg-tm .cvg-tm-who {
        display: flex;
        flex-direction: column;
        gap: 2px;
        line-height: 1.2
    }

    .cvg-tm .cvg-tm-who strong {
        font-size: 16px;
        font-weight: 600;
        color: var(--tm-text)
    }

    .cvg-tm .cvg-tm-who small {
        font-size: 12px;
        color: var(--tm-mint)
    }

    /* ---------- Video review cards (same card, video instead of text) ---------- */
    .cvg-tm .cvg-tm-card--video {
        padding: 14px 14px 20px
    }

    .cvg-tm .cvg-tm-card--video figcaption {
        margin-top: auto;
        padding: 16px 14px 0;
        border-top: 0
    }

    .cvg-tm .cvg-tm-vbtn {
        position: relative;
        display: block;
        width: 100%;
        height: 170px;
        margin: 0;
        padding: 0;
        border: 0;
        border-radius: 16px;
        overflow: hidden;
        background: #0A0F0E;
        cursor: pointer;
        box-shadow: none
    }

    .cvg-tm .cvg-tm-vbtn:focus-visible {
        outline: 2px solid var(--tm-mint-l);
        outline-offset: 2px
    }

    .cvg-tm .cvg-tm-vprev {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 1s cubic-bezier(.2, .9, .2, 1)
    }

    .cvg-tm .cvg-tm-card--video:hover .cvg-tm-vprev {
        transform: scale(1.06)
    }

    .cvg-tm .cvg-tm-vshade {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0, 33, 27, .05) 30%, rgba(0, 20, 16, .6) 100%)
    }

    .cvg-tm .cvg-tm-vplay {
        position: absolute;
        left: 50%;
        top: 50%;
        width: 58px;
        height: 58px;
        margin: -29px 0 0 -29px;
        border-radius: 50%;
        display: grid;
        place-items: center;
        background: var(--tm-mint);
        animation: cvgTmPulse 2.2s ease-out infinite;
        transition: transform .35s
    }

    .cvg-tm .cvg-tm-card--video:hover .cvg-tm-vplay {
        transform: scale(1.12)
    }

    .cvg-tm .cvg-tm-vplay svg {
        width: 22px;
        height: 22px;
        margin-left: 3px;
        fill: var(--tm-ink)
    }

    @keyframes cvgTmPulse {
        0% { box-shadow: 0 0 0 0 rgba(0, 212, 163, .55) }
        100% { box-shadow: 0 0 0 18px rgba(0, 212, 163, 0) }
    }

    .cvg-tm .cvg-tm-vtag {
        position: absolute;
        left: 12px;
        top: 12px;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 6px 10px;
        border-radius: 999px;
        background: rgba(10, 10, 10, .72);
        color: var(--tm-text);
        font: 600 10px/1 'Poppins', sans-serif;
        letter-spacing: .12em;
        text-transform: uppercase
    }

    .cvg-tm .cvg-tm-vtag i {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #FF5A5A
    }

    .cvg-tm .cvg-tm-card .cvg-tm-vtext {
        margin: 14px 14px 0;
        padding: 0;
        font-size: 14px;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        overflow: hidden
    }

    /* ---------- Video player (opens on click) ---------- */
    .cvg-tm-modal {
        position: fixed;
        inset: 0;
        z-index: 2147483600;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        background: rgba(5, 8, 7, .92);
        -webkit-backdrop-filter: blur(6px);
        backdrop-filter: blur(6px);
        opacity: 0;
        transition: opacity .25s ease
    }

    .cvg-tm-modal[hidden] {
        display: none
    }

    .cvg-tm-modal.cvg-tm-modal--open {
        opacity: 1
    }

    .cvg-tm-modal .cvg-tm-mbox {
        max-width: min(1000px, 100%);
        max-height: 100%;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(95, 240, 200, .3);
        box-shadow: 0 30px 80px rgba(0, 0, 0, .6);
        background: #000
    }

    .cvg-tm-modal .cvg-tm-mvideo {
        display: block;
        max-width: 100%;
        max-height: calc(100vh - 120px);
        margin: 0 auto
    }

    .cvg-tm-modal .cvg-tm-mclose {
        position: absolute;
        top: 18px;
        right: 18px;
        width: 48px;
        height: 48px;
        margin: 0;
        padding: 0;
        border: 1px solid rgba(95, 240, 200, .35);
        border-radius: 50%;
        background: rgba(17, 22, 20, .85);
        color: #F2F5F4;
        font: 400 28px/1 'Poppins', sans-serif;
        cursor: pointer;
        display: grid;
        place-items: center;
        box-shadow: none;
        transition: background .3s, color .3s
    }

    .cvg-tm-modal .cvg-tm-mclose:hover {
        background: #00D4A3;
        color: #04342C
    }

    @media (max-width:600px) {
        .cvg-tm {
            padding: 80px 0 90px
        }

        .cvg-tm .cvg-tm-vbtn {
            height: 150px
        }

        .cvg-tm .cvg-tm-card {
            flex-basis: 280px;
            padding: 24px 22px 20px
        }

        .cvg-tm .cvg-tm-card blockquote {
            font-size: 14.5px
        }

        .cvg-tm .cvg-tm-row {
            -webkit-mask-image: none;
            mask-image: none
        }
    }

    @media (prefers-reduced-motion:reduce) {
        .cvg-tm .cvg-tm-track,
        .cvg-tm .cvg-tm-vplay {
            animation: none
        }

        .cvg-tm .cvg-tm-row {
            overflow-x: auto
        }
    }
</style>

<script>
(function () {
    var sec = document.getElementById('cvg-testimonials');
    if (!sec) return;
    var cards = Array.prototype.slice.call(sec.querySelectorAll('.cvg-tm-vbtn'));
    if (!cards.length) return;
    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* silent preview plays only while the card is on screen */
    if (!reduce && 'IntersectionObserver' in window) {
        var io = new IntersectionObserver(function (es) {
            es.forEach(function (e) {
                var v = e.target.querySelector('video');
                if (e.isIntersecting) { var p = v.play(); if (p && p.catch) p.catch(function () {}); }
                else v.pause();
            });
        }, { threshold: 0.3 });
        cards.forEach(function (b) { io.observe(b); });
    }

    /* full video with sound */
    var modal = sec.querySelector('.cvg-tm-modal');
    document.body.appendChild(modal);
    var player = modal.querySelector('video'), closeBtn = modal.querySelector('.cvg-tm-mclose'), last = null;
    function open(src) {
        last = document.activeElement;
        player.src = src;
        modal.hidden = false;
        document.documentElement.style.overflow = 'hidden';
        requestAnimationFrame(function () { modal.classList.add('cvg-tm-modal--open'); });
        var p = player.play(); if (p && p.catch) p.catch(function () {});
        closeBtn.focus();
    }
    function close() {
        player.pause();
        modal.classList.remove('cvg-tm-modal--open');
        document.documentElement.style.overflow = '';
        setTimeout(function () { modal.hidden = true; player.removeAttribute('src'); player.load(); }, 250);
        if (last) last.focus();
    }
    cards.forEach(function (b) { b.addEventListener('click', function () { open(b.getAttribute('data-src')); }); });
    closeBtn.addEventListener('click', close);
    modal.addEventListener('click', function (e) { if (e.target === modal) close(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && !modal.hidden) close(); });
})();
</script>