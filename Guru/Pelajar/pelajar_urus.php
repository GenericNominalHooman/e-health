<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");

    // Auth component is dependent on header and config component
    require_once(COMPONENTS_DIR."/header.php");

    require_once(TEMPLATE_DIR . "/sidebar2_guru.php");

?>



<?php

    require_once(COMPONENTS_DIR . "/footer.php"); 
