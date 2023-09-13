<?php
// Importing site configuration
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");
?>
<?php
class Database{
  private $conn;

  public function __construct(){
    $this->createConnection();
  }

  private function createConnection(){
    // Create a connection
    $this->conn = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);

    // Check the connection
    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }

  public function getConnection(){
    return $this->conn;
  }
}
?>