<?php
require_once __DIR__ . '/includes/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grow Your Brand with Creative Converge: Premier Dallas Digital Agency</title>
    <meta name="description" content="Creative Converge is a premier digital agency in Dallas offering custom web design, development, branding, and digital marketing to grow your brand.">
    <base href="<?= htmlspecialchars(cvg_url('')) ?>">
    <link rel="icon" href="/favicon.ico" sizes="48x48">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/global.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/header.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/footer.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/home.css') ?>">
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
</head>

<body id="top">

    <?php include __DIR__ . '/includes/header.php'; ?>

    <main>
        <?php include __DIR__ . '/includes/day-widget.php'; ?>
        <?php include __DIR__ . '/includes/home.php'; ?>
        <?php include __DIR__ . '/includes/services.php'; ?>
        <?php include __DIR__ . '/includes/slide-bar.php'; ?>
        <?php include __DIR__ . '/includes/about-section.php'; ?>
        <?php include __DIR__ . '/includes/world-section.php'; ?>
        <?php include __DIR__ . '/includes/why-choose-us.php'; ?>
        <?php include __DIR__ . '/includes/our-portfolio.php'; ?>
        <?php include __DIR__ . '/includes/slide-bar.php'; ?>
        <?php include __DIR__ . '/includes/Innovate.php'; ?>
        <?php include __DIR__ . '/includes/home-page-pricing.php'; ?>
        <?php include __DIR__ . '/includes/testimonials.php'; ?>
        <?php include __DIR__ . '/includes/home-page-fome.php'; ?>
        <?php include __DIR__ . '/includes/faq-section.php'; ?>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>

    <script src="<?= cvg_url('assets/js/home.js') ?>"></script>
    <script>
        (function () {
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
                try { zE("messenger", "open"); } catch (e) {} // naya Zendesk Messaging
                try { zE("webWidget", "open"); } catch (e) {} // purana Classic Web Widget
            }

            function startExtras() {
                if (started) return;
                started = true;

                // 1) Favicon animation
                loadScript("<?= cvg_url('assets/js/favicon-animate.js') ?>");

                // 2) Zendesk — loop/setInterval nahi, sirf ek dafa
                loadScript("https://static.zdassets.com/ekr/snippet.js?key=" + ZENDESK_KEY, "ze-snippet", function () {
                    if (AUTO_OPEN_CHAT) setTimeout(openChat, 1500);
                });
            }

            ["scroll", "click", "touchstart", "keydown", "mousemove"].forEach(function (ev) {
                window.addEventListener(ev, startExtras, { once: true, passive: true });
            });
            window.addEventListener("load", function () {
                setTimeout(startExtras, 8000);
            });

            // "Chat Now" buttons: zaroorat ho to Zendesk usi waqt load karke kholo
            window.openLiveChat = function () {
                if (typeof window.zE === "function") return openChat();
                startExtras();
                var tries = 0;
                var t = setInterval(function () {
                    tries++;
                    if (typeof window.zE === "function") { clearInterval(t); openChat(); }
                    else if (tries > 20) clearInterval(t);
                }, 300);
            };
        })();
    </script>
</body>

</html>