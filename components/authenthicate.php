<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
?>
<?php
// Import models
require_once(COMPONENTS_DIR."/models.php");

class Auth {
  private $username;
  private $password;

  public function __construct($username, $password) {
    $this->username = $username;
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  public function checkCredentials($inputUsername, $inputPassword) {
    if ($inputUsername === $this->username && password_verify($inputPassword, $this->password)) {
      return true;
    }
    return false;
  }
}

class Login {
  private $userModel;

  public function __construct()
  {
    $modelsFactory = new ModelsFactory();
    $this->userModel = $modelsFactory->createUserModel();
  }
  
  public function authenticate($username, $password) {
    // Fetch password from username
    $passwordFromUsername = $this->fetchPasswordFromUsername($username);

    $auth = new Auth($username, $passwordFromUsername);
    return $auth->checkCredentials($username, $password);
  }

  private function fetchPasswordFromUsername($username){
    // Get password hash from user model based on inputted usernmae
    return ($this->userModel->getGuruBertugasWhere('username', $username)[0]['password']);
  }
}
?>