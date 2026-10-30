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
<!-- Start of velotix Zendesk Widget script -->
    <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=8777e637-9ac3-4499-ae88-6312dcdd69a3"></script>
    <script>
        // 1. Official Zendesk event hooks
        if (typeof zE === 'function') {
            zE('webWidget:on', 'ready', function() {
                zE('webWidget', 'open');
            });
            zE('webWidget:on', 'close', function() {
                // If user closes it, reopen after 8 seconds for eye-catching attention
                setTimeout(function() {
                    try { zE('webWidget', 'open'); } catch(e) {}
                }, 8000);
            });
        }

        // 2. Retry loop: continuously attempts to open Zendesk until it is ready and open
        var zendeskOpenInterval = setInterval(function() {
            if (typeof zE === 'function') {
                try {
                    zE('webWidget', 'open');
                } catch(e) {}
            }
        }, 500);

        // Once window is fully loaded, ensure it opens and ease the polling
        window.addEventListener('load', function() {
            setTimeout(function() {
                if (typeof zE === 'function') {
                    try { zE('webWidget', 'open'); } catch(e) {}
                }
                clearInterval(zendeskOpenInterval);
            }, 5000);
        });

        // 3. Manual trigger for "Chat Now" buttons
        function openLiveChat() {
            if (typeof zE !== 'undefined') {
                zE('webWidget', 'open');
            }
        }
    </script>

</html>