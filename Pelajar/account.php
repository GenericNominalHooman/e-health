<?php
 require_once(COMPONENTS_DIR."/config.php");
 require_once ("auth.php");
}
    $findresult = mysqli_query($db, "SELECT * FROM user_form WHERE ")