<?php require_once dirname(__DIR__) . '/includes/init.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-17742584929"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-17742584929');
    </script>
    <!--  FIX: Thank_You event sirf Thank You page par fire hoga -->
    <script>
        // Sirf tab fire karein jab user Thank You page par ho
        if (window.location.pathname.includes('thank-you') || window.location.pathname.includes('thanks') || window.location.pathname.includes('success')) {
            gtag('event', 'Thank_You');
        }
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pricing & Packages – Logo, Website, SEO | Creative Converge</title>
    <meta name="description" content="Transparent pricing for every budget. Choose from logo, website, eCommerce, branding, SEO & animation packages with 100% satisfaction guarantee.">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= cvg_url('assets/css/global.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/header.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/cvg-pricing-page.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/footer.css') ?>">
</head>

<body style="margin:0; background:#0A0A0A;">

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <?php include __DIR__ . '/../includes/pricing-page.php'; ?>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

    <script src="<?= cvg_url('assets/js/cvg-pricing-page.js') ?>"></script>
    <script src="<?= cvg_url('assets/js/favicon-animate.js') ?>"></script>
</body>
<!-- Zendesk chat — sirf EK baar load, sirf EK baar khule -->
<script>
    (function() {
        var KEY = '8777e637-9ac3-4499-ae88-6312dcdd69a3';
        var AUTO_OPEN = true; // false = khud na khule, sirf icon dikhe

        // Agar page par pehle se Zendesk lagi hai (kisi aur file se), dobara mat lagao
        if (window.__cvgZendesk) return;
        window.__cvgZendesk = true;

        var opened = false;

        function openChat() {
            if (typeof window.zE !== 'function') return false;
            try {
                zE('messenger', 'open');
            } catch (e) {} // naya Zendesk Messaging
            try {
                zE('webWidget', 'open');
            } catch (e) {} // purana Classic widget
            return true;
        }

        // Zendesk ready hone tak intezar, phir sirf EK dafa kholo
        function openOnce() {
            if (opened || !AUTO_OPEN) return;
            var tries = 0;
            var t = setInterval(function() {
                tries++;
                if (openChat()) {
                    opened = true;
                    clearInterval(t);
                } else if (tries > 20) clearInterval(t); // 10 sec ke baad koshish band
            }, 500);
        }

        if (!document.getElementById('ze-snippet')) {
            var s = document.createElement('script');
            s.id = 'ze-snippet';
            s.async = true;
            s.src = 'https://static.zdassets.com/ekr/snippet.js?key=' + KEY;
            s.onload = function() {
                setTimeout(openOnce, 1500);
            };
            document.head.appendChild(s);
        } else {
            setTimeout(openOnce, 1500);
        }

        // "Chat Now" buttons ke liye
        window.openLiveChat = function() {
            openChat();
        };
    })();
</script>

</html>