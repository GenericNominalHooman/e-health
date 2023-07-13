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
    try {
      $conn = new PDO("mysql:host=".HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    $this->conn = $conn;
  }

  public function getConnection(){
    return $this->conn;
  }
}
?>