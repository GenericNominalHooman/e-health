<?php
    // Hospital site configuration
    define("HOST", "http://".$_SERVER['SERVER_NAME']);
    define("SITE_NAME", "hospital");
    define("SITE_URL", HOST."/".SITE_NAME);
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
?>