<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
    // Auth component is dependent on header and config component
    require_once(COMPONENTS_DIR."/header.php");
    require_once(COMPONENTS_DIR."/models.php");
    require_once(COMPONENTS_DIR . "/config.php");
?>
<?php
class Auth {
    private $loginModel;
    private $registerModel;
    
    public function __construct($conn)
    {
        require_once(COMPONENTS_DIR."/models.php");
        $this->loginModel = new LoginModel($conn);
        $this->registerModel = new RegisterModel($conn);
    }
    
    public function isAuth() {
        return isset($_SESSION["Auth"]);
    }
    
    public function authPelajar($nama, $katalaluan) {
        $pelajar = $this->loginModel->getAllPelajarWhere("namapelajar", $nama);

        if(!empty($pelajar)){
            if(password_verify($katalaluan, $pelajar[0]["katalaluanpelajar"])){
                if ($pelajar) {
                    $_SESSION["Auth"] = [
                        'id' => $pelajar[0]['id'],
                        'nama' => $pelajar[0]['namapelajar'],
                        'gambarprofilpelajar' => $pelajar[0]['gambarprofilpelajar'],
                        'jenispengguna' => "pelajar",
                    ];
                    return true;
                }
            }
        }
        return false;
    }

    public function authPentadbir($nama, $katalaluan) {
        $pentadbir = $this->loginModel->getAllAdminWhere("namapentadbir", $nama);

        if(!empty($pentadbir)){
            if(password_verify($katalaluan, $pentadbir[0]["katalaluanpentadbir"])){
                if ($pentadbir) {
                    $_SESSION["Auth"] = [
                        'id' => $pentadbir[0]['id'],
                        'nama' => $pentadbir[0]['namapentadbir'],
                        'gambarprofilpentadbir' => $pentadbir[0]['gambarprofilpentadbir'],
                        'jenispengguna' => "pentadbir",
                    ];
                    return true;
                }
            }
        }
        return false;
    }

    public function authGuru($nama, $katalaluan) {
        $guru = $this->loginModel->getAllGuruBertugasWhere("namaguru", $nama);
        
        if(!empty($guru)){
            if(password_verify($katalaluan, $guru[0]["katalaluanguru"])){
                if ($guru) {
                    $_SESSION["Auth"] = [
                        'id' => $guru[0]['id'],
                        'nama' => $guru[0]['namaguru'],
                        'gambarprofilguru' => $guru[0]['gambarprofilguru'],
                        'jenispengguna' => "guru",
                    ];
                    return true;
                }
            }
        }
        return false;
        
    }

    public function authWarden($nama, $katalaluan) {
        $warden = $this->loginModel->getAllWardenWhere("namawarden", $nama);

        if(!empty($warden)){
            if(password_verify($katalaluan, $warden[0]["katalaluanwarden"])){
                if ($warden) {
                    $_SESSION["Auth"] = [
                        'id' => $warden[0]['id'],
                        'nama' => $warden[0]['namawarden'],
                        'gambarprofilwarden' => $warden[0]['gambarprofilwarden'],
                        'jenispengguna' => "warden",
                    ];
                    return true;
                }
            }
        }
        return false;
    }

    public function registerPelajar($nama, $katalaluan, $gambarprofilpelajar, $id = null) {
        $hashed_katalaluan = password_hash($katalaluan, PASSWORD_BCRYPT);
        return $this->registerModel->createPelajar($id, $nama, $hashed_katalaluan, $gambarprofilpelajar);
    }

    public function registerPentadbir($nama, $katalaluan, $gambarprofilpentadbir, $id = null) {
        $hashed_katalaluan = password_hash($katalaluan, PASSWORD_BCRYPT);
        return $this->registerModel->createPentadbir($id, $nama, $hashed_katalaluan, $gambarprofilpentadbir);
    }

    public function registerGuru($nama, $katalaluan, $gambarprofilguru, $id = null) {
        $hashed_katalaluan = password_hash($katalaluan, PASSWORD_BCRYPT);
        return $this->registerModel->createGuru($id, $nama, $hashed_katalaluan, $gambarprofilguru);
    }

    public function registerWarden($nama, $katalaluan, $gambarprofilwarden, $id = null) {
        $hashed_katalaluan = password_hash($katalaluan, PASSWORD_BCRYPT);
        return $this->registerModel->createWarden($id, $nama, $hashed_katalaluan, $gambarprofilwarden);
    }
}
?>