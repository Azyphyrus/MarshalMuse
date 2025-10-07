<?php
class Database
{
    private static $instance = null;
    private $pdo;

    private function __construct()
    {
        // Load the .env file
        $envPath = __DIR__ . '/../../.env';
        if (file_exists($envPath)) {
            $env = parse_ini_file($envPath);
            if (isset($env['DATABASE_URL'])) {
                $dbUrl = $env['DATABASE_URL'];

                // Parse DATABASE_URL (e.g., postgresql://user:pass@host:port/dbname)
                $components = parse_url($dbUrl);

                $driver = 'pgsql';
                $host = $components['host'] ?? 'localhost';
                $port = $components['port'] ?? 5432;
                $user = $components['user'] ?? 'postgres';
                $pass = $components['pass'] ?? '';
                $dbname = ltrim($components['path'], '/');

                $dsn = "$driver:host=$host;port=$port;dbname=$dbname";

                try {
                    $this->pdo = new PDO($dsn, $user, $pass, [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]);
                    // Uncomment to debug connection
                    // echo "✅ Connected to local database";
                } catch (PDOException $e) {
                    die("Connection failed: " . $e->getMessage());
                }
                return;
            }
        }

        die("DATABASE_URL not found in .env");
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}
