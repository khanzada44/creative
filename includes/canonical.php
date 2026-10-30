<?php
/**
 * Canonical tag — HAR page par khud lag jata hai.
 *
 * Kaise: init.php mein ek line (neeche dekhein). Ye har page ke HTML mein
 * </head> se pehle <link rel="canonical"> daal deta hai — har page ki file
 * alag se edit karne ki zaroorat nahi.
 *
 * Rules:
 *  - Domain hamesha https://creativeconverge.com (localhost/xampp par bhi)
 *  - "index.php" hata deta hai:   /about/index.php      -> /about/
 *  - Folder wale pages slash ke saath: /pricing          -> /pricing/
 *  - Query string hata deta hai (utm, fbclid, #...)
 *  - Service page: /services/service-detail/<slug>  (saaf URL, .htaccess ke mutabiq)
 *  - Baaqi .php pages bina .php ke:  /thank-you.php -> /thank-you
 *  - Agar page mein pehle se canonical ho to dobara nahi lagata
 */

if (!defined('CVG_SITE_URL')) {
    define('CVG_SITE_URL', 'https://creativeconverge.com');
}

function cvg_canonical_url(): string
{
    // Site kis folder mein hai (live par "/", xampp par jaise "/mockups/")
    $basePath = '/';
    if (function_exists('cvg_url')) {
        $basePath = parse_url(cvg_url(''), PHP_URL_PATH) ?: '/';
    }
    $basePath = '/' . trim($basePath, '/');
    $basePath = $basePath === '/' ? '/' : $basePath . '/';

    // Asal PHP file jo chal rahi hai, jaise /mockups/about/index.php
    $script = $_SERVER['SCRIPT_NAME'] ?? '/index.php';
    $path = '/' . ltrim($script, '/');

    // Base folder hata do
    if ($basePath !== '/' && stripos($path, $basePath) === 0) {
        $path = '/' . substr($path, strlen($basePath));
    }

    // index.php -> folder (slash ke saath)
    if (preg_match('~(^|/)index\.php$~i', $path)) {
        $path = preg_replace('~index\.php$~i', '', $path);
    }

    // Service page: /services/service-detail/<slug>  (.htaccess wala saaf URL)
    if (preg_match('~/service-detail\.php$~i', $path) && !empty($_GET['slug'])) {
        $slug = strtolower(preg_replace('~[^a-z0-9\-]~i', '', (string) $_GET['slug']));
        return rtrim(CVG_SITE_URL, '/') . '/services/service-detail/' . $slug;
    }

    // Baaqi pages: .php hata do (.htaccess bhi yahi karta hai) — query string nahi
    $path = preg_replace('~\.php$~i', '', $path);

    return rtrim(CVG_SITE_URL, '/') . $path;
}

function cvg_canonical_tag(): string
{
    return '<link rel="canonical" href="'
        . htmlspecialchars(cvg_canonical_url(), ENT_QUOTES, 'UTF-8') . '">';
}

// Har page ke </head> se pehle canonical khud daal do
if (PHP_SAPI !== 'cli' && empty($GLOBALS['CVG_CANONICAL_STARTED'])) {
    $GLOBALS['CVG_CANONICAL_STARTED'] = true;
    ob_start(function ($html) {
        if (stripos($html, '</head>') === false) return $html;          // HTML page nahi (AJAX/JSON)
        if (preg_match('~<link[^>]+rel=["\']canonical["\']~i', $html)) return $html; // pehle se hai
        return preg_replace('~</head>~i', "    " . cvg_canonical_tag() . "\n</head>", $html, 1);
    });
}

/**
 * Service ka saaf link — header, footer, services page mein ye use karein:
 *   <a href="<?= cvg_service_url('laravel') ?>">Laravel</a>
 */
function cvg_service_url(string $slug): string
{
    $slug = strtolower(preg_replace('~[^a-z0-9\-]~i', '', $slug));
    return function_exists('cvg_url')
        ? cvg_url('services/service-detail/' . $slug)
        : '/services/service-detail/' . $slug;
}
