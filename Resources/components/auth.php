<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
class Auth {
    public $userModel;
    
    public function __construct($dbObj)
    {
        require_once(COMPONENTS_DIR."/models.php");
        $this->dbObj = $dbObj;

    }
    
    public function isAuth() {
        return isset($_SESSION["Auth"]);
    }

    public function authPelajar($no_kad_pengenalan, $password) {
        // Assuming you have a function to query the database
        $pelajar = get_pelajar_by_no_kad_pengenalan_and_password($no_kad_pengenalan, $password);

        if ($pelajar) {
            $_SESSION["Auth"] = [
                'id' => $pelajar['id'],
                'nama' => $pelajar['nama'],
                'no_kad_pengenalan' => $pelajar['no_kad_pengenalan'],
                'no_matrik' => $pelajar['no_matrik'],
                'no_telefon_pelajar' => $pelajar['no_telefon_pelajar'],
                'nama_bapa_pelajar' => $pelajar['nama_bapa_pelajar'],
                'no_telefon_bapa_pelajar' => $pelajar['no_telefon_bapa_pelajar'],
                'nama_ibu_pelajar' => $pelajar['nama_ibu_pelajar'],
                'no_telefon_ibu_pelajar' => $pelajar['no_telefon_ibu_pelajar'],
                'penyakit_pelajar' => $pelajar['penyakit_pelajar'],
                'alamat_pelajar' => $pelajar['alamat_pelajar'],
                'alahan' => $pelajar['alahan'],
                'profil_gambar' => $pelajar['profil_gambar']
            ];
            return true;
        }
        return false;
    }

    public function authPentadbir($no_kad_pengenalan, $password) {
        $pentadbir = get_pentadbir_by_no_kad_pengenalan_and_password($no_kad_pengenalan, $password);

        if ($pentadbir) {
            $_SESSION["Auth"] = [
                'id' => $pentadbir['id'],
                'nama' => $pentadbir['nama'],
                'no_kad_pengenalan' => $pentadbir['no_kad_pengenalan'],
                'profil_gambar' => $pentadbir['profil_gambar']
            ];
            return true;
        }
        return false;
    }

    public function authGuru($no_kad_pengenalan, $password) {
        $guru = get_guru_by_no_kad_pengenalan_and_password($no_kad_pengenalan, $password);

        if ($guru) {
            $_SESSION["Auth"] = [
                'id' => $guru['id'],
                'nama' => $guru['nama'],
                'no_kad_pengenalan' => $guru['no_kad_pengenalan'],
                'profil_gambar' => $guru['profil_gambar']
            ];
            return true;
        }
        return false;
    }

    public function authWarden($no_kad_pengenalan, $password) {
        $warden = get_warden_by_no_kad_pengenalan_and_password($no_kad_pengenalan, $password);

        if ($warden) {
            $_SESSION["Auth"] = [
                'id' => $warden['id'],
                'nama' => $warden['nama'],
                'no_kad_pengenalan' => $warden['no_kad_pengenalan'],
                'profil_gambar' => $warden['profil_gambar']
            ];
            return true;
        }
        return false;
    }
}
?>