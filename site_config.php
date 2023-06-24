<?php
    // 
    // DEVELOPMENT CONFIG(PLEASE REMOVE IF MIGRATING TO PRODUCTION)
    // 
    require_once('vendor/autoload.php');

    // E-health site configuration
    define("HOST", $_SERVER['SERVER_NAME']);
    define("HOST_URL", "http://".HOST);
    define("SITE_NAME", "e-health");
    define("SITE_URL", HOST_URL."/".SITE_NAME);
    define("SITE_DIR", $_SERVER["DOCUMENT_ROOT"]."/".SITE_NAME);

    // Static content resources(directories)
    define("RESOURCES_DIR", SITE_DIR."/Resources");
    define("CSS_DIR", RESOURCES_DIR."/css");
    define("JS_DIR", RESOURCES_DIR."/js");
    define("IMG_DIR", RESOURCES_DIR."/img");
    define("COMPONENTS_DIR", RESOURCES_DIR."/components");

    // Static content resources(URLs)
    define("RESOURCES_URL", SITE_URL."/Resources");
    define("CSS_URL", RESOURCES_URL."/css");
    define("JS_URL", RESOURCES_URL."/js");
    define("IMG_URL", RESOURCES_URL."/img");
    define("COMPONENTS_URL", RESOURCES_URL."/components");

    // Templates directory
    define("TEMPLATE_DIR", SITE_DIR."/Templates");

    // Templates directory
    define("TEMPLATE_URL", SITE_URL."/Templates");
    
    // DB configuration
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "Kafin-12");
    define("DB_NAME", "e-health");

    // User profile pages(directories)
    define("PELAJAR_DIR", SITE_DIR."/"."Pelajar");
    define("GURU_DIR", SITE_DIR."/"."Guru");
    define("ADMIN_DIR", SITE_DIR."/"."Admin");
    define("WARDEN_DIR", SITE_DIR."/"."Warden");

    // Static content resources(URLs)
    define("PELAJAR_URL", SITE_URL."/"."Pelajar");
    define("GURU_URL", SITE_URL."/"."Guru");
    define("ADMIN_URL", SITE_URL."/"."Admin");
    define("WARDEN_URL", SITE_URL."/"."Warden");
?>