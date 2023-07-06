<?php
    // 
    // DEVELOPMENT CONFIG(PLEASE REMOVE IF MIGRATING TO PRODUCTION)
    // 
    require_once('vendor/autoload.php');

    // Hospital site configuration
    define("HOST", $_SERVER['SERVER_NAME']);
    define("HOST_URL", "http://".HOST);
    define("SITE_NAME", "e-health");
    define("SITE_URL", HOST_URL."/".SITE_NAME);
    define("SITE_DIR", $_SERVER["DOCUMENT_ROOT"]."/".SITE_NAME);

    // Static content resources(directories)
    define("CSS_DIR", SITE_DIR."/"."css");
    define("JS_DIR", SITE_DIR."/"."js");
    define("IMG_DIR", SITE_DIR."/"."img");
    define("COMPONENTS_DIR", SITE_DIR."/"."components");
    define("TEMPLATES_DIR", SITE_DIR."/"."templates");
    
    // Static content resources(URLs)
    define("CSS_URL", SITE_URL."/"."css");
    define("JS_URL", SITE_URL."/"."js");
    define("IMG_URL", SITE_URL."/"."img");
    define("COMPONENTS_URL", SITE_URL."/"."components");
    define("TEMPLATES_URL", SITE_URL."/"."templates");

    // DB configuration
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "Kafin-12");
    define("DB_NAME", "hospital2");

    // User profile pages(directories)
    define("PELAJAR_DIR", SITE_DIR."/"."Pelajar");
    define("GURU_DIR", SITE_DIR."/"."GuruBertugas");
    define("ADMIN_DIR", SITE_DIR."/"."Admin");

    // Static content resources(URLs)
    define("PELAJAR_URL", SITE_URL."/"."Pelajar");
    define("GURU_URL", SITE_URL."/"."GuruBertugas");
    define("ADMIN_URL", SITE_URL."/"."Admin");
?>
