<?php
// Folder ka URL khud detect karta hai (localhost/project/ ho ya domain root, dono par chalega)
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/') . '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Converge</title>
    <base href="<?= htmlspecialchars($base) ?>">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/footer.css">
</head>
<body id="top">

<?php include __DIR__ . '/includes/header.php'; ?>

<main>
    <?php include __DIR__ . '/includes/home.php'; ?>
    <?php include __DIR__ . '/includes/services.php'; ?>
    <?php include __DIR__ . '/includes/home-page-fome.php'; ?>
    <?php include __DIR__ . '/includes/about-section.php'; ?>
    <?php include __DIR__ . '/includes/world-section.php'; ?>
    <?php include __DIR__ . '/includes/why-choose-us.php'; ?>
    <?php include __DIR__ . '/includes/latest-cases.php'; ?>
    <?php include __DIR__ . '/includes/our-portfolio.php'; ?>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="assets/js/home.js"></script>
</body>
</html>