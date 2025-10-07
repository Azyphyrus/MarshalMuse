<?php
/**
 * Return full asset path (CSS, JS, Images)
 */
function asset($path) {
    return BASE_URL . 'assets/' . ltrim($path, '/');
}

/**
 * Return full URL based on routing
 */
function url($path = '') {
    return BASE_URL . ltrim($path, '/');
}

/**
 * Simple redirect helper
 */
function redirect($path) {
    header('Location: ' . url($path));
    exit;
}

/**
 * Print readable debug info (only if DEBUG = true)
 */
function dd($data) {
    if (DEBUG) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit;
    }
}

/**
 * Current date-time
 */
function now($format = 'Y-m-d H:i:s') {
    return date($format);
}

/**
 * Sanitize user input
 */
function clean($string) {
    return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
}
