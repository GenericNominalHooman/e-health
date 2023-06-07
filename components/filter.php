<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/hospital/site_config.php");
?>
<?php
class SQLFilter {
    private $data;
  
    public function __construct($data){
      $this->data = $data;
      return $this;
    }

    public function where($columnToMatch, $valueToMatch) {
      d($this->data);
      // Filter to get only value specified by $valueToMatch
      $this->data = array_values(array_filter($this->data, function($row) use ($columnToMatch, $valueToMatch){
        d($row);        
        d($columnToMatch);        
        d($valueToMatch);        
        foreach($row as $columnName => $columnValue){ // This loops only accessed id column value?
          d($columnName); 
          if($columnName == 'id'){
            echo("ID column is being accessed");
          }elseif($columnName == 'password'){
            echo("Password column is being accessed");
          }

          if(($columnName == $columnToMatch) && ($columnValue == $valueToMatch)){
            return true;
          }else{
            continue;
          }
        }
      }));
      d($this->data);
      return $this;
    }

    public function get(){
      return ($this->data != []) ? $this->data : null;
    }
  }
?>