<?php
// Base URL (adjust when uploaded)
define('BASE_URL', 'http://localhost/Marshal_Muse/public/');

// ...existing code...
// Database (if used)
// ...existing code...
// Old static values removed and replaced with env-aware parsing    

// Debug mode
define('DEBUG', true);

// Load DATABASE_URL from environment or .env file
$databaseUrl = getenv('DATABASE_URL');

if (!$databaseUrl) {
    $envPath = realpath(__DIR__ . '/../../.env');
    if ($envPath && is_readable($envPath)) {
        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) {
                continue;
            }
            if (stripos($line, 'DATABASE_URL=') === 0) {
                $databaseUrl = trim(substr($line, strlen('DATABASE_URL=')), " \t\n\r\0\x0B\"'");
                break;
            }
        }
    }
}

if ($databaseUrl) {
    // Robust parse: capture the userinfo up to the LAST '@' so passwords with '@' are preserved.
    $pattern = '#^(?:(?P<scheme>[^:]+)://)?(?P<userinfo>.+)@(?P<host>[^:/]+)(?::(?P<port>\d+))?(?:/(?P<db>[^/?]+))?#';
    if (preg_match($pattern, $databaseUrl, $m)) {
        $userinfo = $m['userinfo'] ?? '';
        $parts = explode(':', $userinfo, 2); // split user and pass (pass may contain colons)
        $dbUser = isset($parts[0]) ? rawurldecode($parts[0]) : '';
        $dbPass = isset($parts[1]) ? rawurldecode($parts[1]) : '';
        $dbHost = $m['host'] ?? 'localhost';
        $dbPort = $m['port'] ?? 5432;
        $dbName = isset($m['db']) ? ltrim($m['db'], '/') : '';
    } else {
        // Fallback to parse_url if regex didn't match
        $parts = parse_url($databaseUrl);
        $dbHost = $parts['host'] ?? 'localhost';
        $dbUser = isset($parts['user']) ? rawurldecode($parts['user']) : '';
        $dbPass = isset($parts['pass']) ? rawurldecode($parts['pass']) : '';
        $dbPort = $parts['port'] ?? 5432;
        $dbName = isset($parts['path']) ? ltrim($parts['path'], '/') : '';
    }

    define('DB_HOST', $dbHost);
    define('DB_USER', $dbUser);
    define('DB_PASS', $dbPass);
    define('DB_NAME', $dbName);
    define('DB_PORT', $dbPort);
} else {
    // Fallback defaults
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'my_database');
    define('DB_PORT', 5432);
}

// Example PDO connection (use where you create DB connection):
// $dsn = "pgsql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;
// $pdo = new PDO($dsn, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);