<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
?>
<?php
class Database{
  private $conn;

  public function __construct(){
    $this->createConnection();
  }
  
  private function createConnection(){
    // Create connection
    $conn = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $this->conn = $conn;
  }

  public function getConnection(){
    return $this->conn;
  }
}
?>