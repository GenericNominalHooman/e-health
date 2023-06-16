<?php
class Models{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
}

class UserModel extends Models{
    private $connection;

    public function __construct($conn){
      // Call parent constructor method
      parent::__construct($conn);
    }
    public function getAllAdmin() {
        $sql = "SELECT * FROM loginadmin";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllAdminWhere($columnName, $columnValue) {
        $stmt = $this->connection->prepare("SELECT * FROM loginadmin WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>