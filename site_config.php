<?php
    // 
    // DEVELOPMENT CONFIG(PLEASE REMOVE IF MIGRATING TO PRODUCTION)
    // 
    require_once('vendor/autoload.php');

    // Hospital site configuration
    define("HOST", $_SERVER['SERVER_NAME']);
    define("HOST_URL", "http://".HOST);
    define("SITE_NAME", "hospital");
    define("SITE_URL", HOST_URL."/".SITE_NAME);
    define("SITE_DIR", $_SERVER["DOCUMENT_ROOT"]."/".SITE_NAME);

    // Static content resources(directories)
    define("CSS_DIR", SITE_DIR."/"."css");
    define("JS_DIR", SITE_DIR."/"."js");
    define("IMG_DIR", SITE_DIR."/"."img");
    define("COMPONENTS_DIR", SITE_DIR."/"."components");

    // Static content resources(URLs)
    define("CSS_URL", SITE_URL."/"."css");
    define("JS_URL", SITE_URL."/"."js");
    define("IMG_URL", SITE_URL."/"."img");
    define("COMPONENTS_URL", SITE_URL."/"."components");

    // DB configuration
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "hospital2");

    // ABC
?>
