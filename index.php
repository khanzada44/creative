<?php
require_once __DIR__ . '/includes/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Converge</title>
    <base href="<?= htmlspecialchars(cvg_url('')) ?>">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/global.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/header.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/footer.css') ?>">
    <link rel="stylesheet" href="<?= cvg_url('assets/css/home.css') ?>">
</head>

<body id="top">

    <?php include __DIR__ . '/includes/header.php'; ?>

    <main>
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
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>

    <script src="<?= cvg_url('assets/js/home.js') ?>"></script>
    <script src="<?= cvg_url('assets/js/favicon-animate.js') ?>"></script>
</body>

</html>