<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
?>
<?php
// Component function: provide mysqli access to php
class Database
{
    private $connection;

    public function __construct()
    {
        $host = DB_HOST;
        $user = DB_USER;
        $password = DB_PASS;
        $database = DB_NAME;

        $this->connection = new mysqli($host, $user, $password, $database);

        if ($this->connection->connect_error) {
            throw new Exception('Failed to connect to the database: ' . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
?>