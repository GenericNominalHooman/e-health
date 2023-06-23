<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
require_once(COMPONENTS_DIR."/config.php");
?>
<?php
class Models{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
}

class LoginModel extends Models{
    public function __construct($conn){
      // Call parent constructor method
      parent::__construct($conn);
    }

    // Admin
    public function getAllAdmin() {
        $stmt = $this->conn->prepare("SELECT * FROM loginadmin");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllAdminWhere($columnName, $columnValue) {
        $stmt = $this->conn->prepare("SELECT * FROM loginadmin WHERE $columnName='$columnValue'");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Guru Bertugas
    public function getAllGuruBertugas() {
        $stmt = $this->conn->prepare("SELECT * FROM loginguru");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllGuruBertugasWhere($columnName, $columnValue) {
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

class ProfilModel extends Models{
    public function __construct($conn){
      // Call parent constructor method
      parent::__construct($conn);
    }

    // Guru Bertugas
    public function getAllGuruBertugas() {
        $stmt = $this->conn->prepare("SELECT * FROM profilguru");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllGuruBertugasWhere($columnName, $columnValue) {
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
        public function getAllGuruBertugas() {
            $stmt = $this->conn->prepare("SELECT * FROM jadualguru");
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    
        public function getAllGuruBertugasWhere($columnName, $columnValue) {
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