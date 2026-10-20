<?php
/**
 * Creative Converge - Core Init & URL Helper
 *
 * Automatically detects the site root path on any server (localhost, subfolder, live domain root)
 * so that links and assets work seamlessly without hardcoding folder names.
 */

if (!function_exists('cvg_base_url')) {
    function cvg_base_url() {
        static $base = null;
        if ($base !== null) {
            return $base;
        }

        // 1. Primary: match project root on disk with script filename & script name
        $projRoot = rtrim(str_replace('\\', '/', realpath(dirname(__DIR__)) ?: dirname(__DIR__)), '/');
        $scriptFilename = str_replace('\\', '/', realpath($_SERVER['SCRIPT_FILENAME'] ?? '') ?: ($_SERVER['SCRIPT_FILENAME'] ?? ''));
        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');

        if ($projRoot !== '' && $scriptFilename !== '' && stripos($scriptFilename, $projRoot) === 0) {
            $relPath = substr($scriptFilename, strlen($projRoot));
            if ($relPath !== '' && substr($scriptName, -strlen($relPath)) === $relPath) {
                $base = rtrim(substr($scriptName, 0, -strlen($relPath)), '/');
                return $base;
            }
        }

        // 2. Fallback: match known project subfolders
        if ($scriptName !== '') {
            if (preg_match('~^(.*?)/(?:about|services|pricing|cases|contact-us|Terms&Conditions|cvg-services|includes)/~i', $scriptName, $m)) {
                $base = rtrim($m[1], '/');
                return $base;
            }
            $dir = dirname($scriptName);
            $base = ($dir === '/' || $dir === '\\' || $dir === '.') ? '' : rtrim($dir, '/');
            return $base;
        }

        $base = '';
        return $base;
    }
}

if (!function_exists('cvg_url')) {
    function cvg_url($path = '') {
        $path = (string)$path;
        if ($path === '' || $path === '/') {
            $base = cvg_base_url();
            return $base !== '' ? $base . '/' : '/';
        }
        // If already full URL, mailto, tel, or fragment (#), return as-is
        if (preg_match('~^(https?:)?//|^mailto:|^tel:|^#~i', $path)) {
            return $path;
        }
        $base = cvg_base_url();
        return ($base !== '' ? $base . '/' : '/') . ltrim($path, '/');
    }
}

if (!function_exists('cvg_e')) {
    function cvg_e($s) {
        return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
    }
}
