<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// COMPONENT START
if(isset($_SESSION["Auth"])){
    switch($_SESSION["Auth"]["jenispengguna"]){
        case "pelajar":
            require_once(TEMPLATE_DIR."/sidebar2_pelajar.php");
            break;
        case "warden":
            require_once(TEMPLATE_DIR."/sidebar2_warden.php");
            break;
        case "guru":
            require_once(TEMPLATE_DIR."/sidebar2_guru.php");
            break;
        case "pentadbir":
            require_once(TEMPLATE_DIR."/sidebar2_pentadbir.php");
            break;
        default:
            require_once(TEMPLATE_DIR."/sidebar2_guest.php");
            break;
        }
}else{
    require_once(TEMPLATE_DIR."/sidebar2_guest.php");    
}
// COMPONENT END
?>