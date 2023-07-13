<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR . "/config.php");

class Models
{
  protected $conn;

  public function __construct($conn)
  {
    $this->conn = $conn;
  }
}

class UserModel extends Models
{
  public function __construct($conn)
  {
    // Call parent constructor method
    parent::__construct($conn);
  }

  public function getAllGuruBertugas()
  {
    $query = "SELECT * FROM gurubertugas";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllAdmin()
  {
    $query = "SELECT * FROM loginadmin";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getGuruBertugasWhere($columnName, $columnValue){
    $query = "SELECT * FROM gurubertugas WHERE $columnName='$columnValue'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllPelajar()
  {
    $query = "SELECT * FROM user_form";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPelajarWhere($columnName, $columnValue){
    $query = "SELECT * FROM user_form WHERE $columnName='$columnValue'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}

class ModelsFactory{
  public function createUserModel(){
    $dbObj = new Database();
    return new UserModel($dbObj->getConnection());
  }
}
?>
