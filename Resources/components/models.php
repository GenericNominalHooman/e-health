<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health2/site_config.php");
require_once(COMPONENTS_DIR."/config.php");
?>
<?php
class Models{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Create a new user
    public function createUser($tableName, $data)
    {
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_map(function ($value) {
            return "?";
        }, $data));
        $sql = "INSERT INTO $tableName ($columns) VALUES ($values)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(str_repeat('s', count($data)), ...array_values($data));
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    // Update an existing user
    public function updateUser($tableName, $idColumnName, $id, $data)
    {
        $updateColumns = implode(',', array_map(function ($column) {
            return "$column=?";
        }, array_keys($data)));
        $sql = "UPDATE $tableName SET $updateColumns WHERE $idColumnName=?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(str_repeat('s', count($data) + 1), ...array_merge(array_values($data), [$id]));
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    // Delete a user
    public function deleteUser($tableName, $idColumnName, $id)
    {
        $sql = "DELETE FROM $tableName WHERE $idColumnName=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }
}

class LoginModel extends Models{
    public function __construct($conn){
      // Call parent constructor method
      parent::__construct($conn);
    }

    // Pentadbir
    public function getAllPentadbir() {
        $stmt = $this->conn->prepare("SELECT * FROM loginpentadbir");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPentadbirWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM loginpentadbir WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Guru Bertugas
    public function getAllGuru() {
        $stmt = $this->conn->prepare("SELECT * FROM loginguru");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllGuruWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM loginguru WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Warden 
    public function getAllWarden() {
        $stmt = $this->conn->prepare("SELECT * FROM loginwarden");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllWardenWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM loginwarden WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Warden 
    public function getAllPelajar() {
        $stmt = $this->conn->prepare("SELECT * FROM loginpelajar");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPelajarWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM loginpelajar WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }    
}

class RegisterModel extends Models{
    public function createPelajar($id, $nama, $hashed_katalaluan, $gambarprofilpelajar) {
        $sql = "INSERT INTO loginpelajar (id, namapelajar, katalaluanpelajar, gambarprofilpelajar) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isss", $id, $nama, $hashed_katalaluan, $gambarprofilpelajar);
        return $stmt->execute();
    }

    public function createPentadbir($id, $nama, $hashed_katalaluan, $gambarprofilpentadbir) {
        $sql = "INSERT INTO loginpentadbir (id, namapentadbir, katalaluanpentadbir, gambarprofilpentadbir) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isss", $id, $nama, $hashed_katalaluan, $gambarprofilpentadbir);
        return $stmt->execute();
    }

    public function createGuru($id, $nama, $hashed_katalaluan, $gambarprofilguru) {
        $sql = "INSERT INTO loginguru (id, namaguru, katalaluanguru, gambarprofilguru) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isss", $id, $nama, $hashed_katalaluan, $gambarprofilguru);
        return $stmt->execute();
    }

    public function createWarden($id, $nama, $hashed_katalaluan, $gambarprofilwarden) {
        $sql = "INSERT INTO loginwarden (id, namawarden, katalaluanwarden, gambarprofilwarden) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isss", $id, $nama, $hashed_katalaluan, $gambarprofilwarden);
        return $stmt->execute();
    }
}

class ProfilModel extends Models{
    public function __construct($conn){
      // Call parent constructor method
      parent::__construct($conn);
    }

    // Guru Bertugas
    public function getAllGuru() {
        $stmt = $this->conn->prepare("SELECT * FROM profilguru");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllGuruWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM profilguru WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Warden 
    public function getAllWarden() {
        $stmt = $this->conn->prepare("SELECT * FROM profilwarden");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllWardenWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM profilwarden WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    // Pelajar 
    public function getAllPelajar() {
        $stmt = $this->conn->prepare("SELECT * FROM profilpelajar");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPelajarWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM profilpelajar WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

class JadualModel extends Models{
        // Guru Bertugas 
        public function getAllGuru() {
            $stmt = $this->conn->prepare("SELECT * FROM jadualguru");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    
        public function getAllGuruWhere($columnName, $columnValue) {
            $stmt = $this->conn->prepare("SELECT * FROM jadualguru WHERE $columnName='$columnValue'");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }    

        // Warden 
        public function getAllWarden() {
            $stmt = $this->conn->prepare("SELECT * FROM jadualwarden");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    
        public function getAllWardenWhere($columnName, $columnValue) {
            $stmt = $this->conn->prepare("SELECT * FROM jadualwarden WHERE $columnName='$columnValue'");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }    

}

class MCSlipModel extends Models{
    // Guru Bertugas 
    public function getAllMCSlip() {
        $stmt = $this->conn->prepare("SELECT * FROM mcslip");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllMCSlipWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM mcslip WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }    
}

class JanjitemuModel extends Models{
    // Janjitemu 
    public function getAllJanjitemu() {
        $stmt = $this->conn->prepare("SELECT * FROM janjitemupelajar");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllJanjitemuWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM janjitemupelajar WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }    

    public function getAllJanjitemuColumns($columns) {
        // Sanitize column names to avoid SQL injection
        $sanitizedColumns = array_map(function($column) {
            return preg_replace('/[^a-zA-Z0-9_]/', '', $column);
        }, $columns);
    
        // Create a comma-separated list of column names
        $columnList = implode(',', $sanitizedColumns);
    
        // Prepare and execute the SELECT statement
        $stmt = $this->conn->prepare("SELECT $columnList FROM janjitemupelajar");
        $stmt->execute();
    
        // Fetch the result as an associative array
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllJanjitemuColumnsWhere($columns, $whereRules) {
        // Sanitize column names to avoid SQL injection
        $sanitizedColumns = array_map(function($column) {
            return preg_replace('/[^a-zA-Z0-9_]/', '', $column);
        }, $columns);
    
        // Create a comma-separated list of column names
        $columnList = implode(',', $sanitizedColumns);
    
        // Prepare and execute the SELECT statement
        $stmt = $this->conn->prepare("SELECT $columnList FROM janjitemupelajar WHERE $whereRules");
        $stmt->execute();
    
        // Fetch the result as an associative array
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllJanjitemuCountWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT COUNT(*) AS TOTAL FROM janjitemupelajar WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }    

    public function getAllJanjitemuColumnsCountWhere($columns, $columnName, $columnValue) {
        // Sanitize column names to avoid SQL injection
        $sanitizedColumns = array_map(function($column) {
            return preg_replace('/[^a-zA-Z0-9_]/', '', $column);
        }, $columns);
    
        // Create a comma-separated list of column names
        $columnList = implode(',', $sanitizedColumns);
    
        // Prepare and execute the SELECT statement
        $stmt = $this->conn->prepare("SELECT COUNT($columnList) FROM janjitemupelajar WHERE $columnName='$columnValue'");
        $stmt->execute();
    
        // Fetch the result as an associative array
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>