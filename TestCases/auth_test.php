<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
    // Import auth component
    require_once(COMPONENTS_DIR . "/auth.php");

    $dbObj = new Database();
    $authObj = new Auth($dbObj->getConnection());

    // Check whether the current user is currently authenthicated by checking whether the sesion key Auth has been set(Set = True, X Set = False)
    if($authObj->isAuth()){
        echo("<br>Hello I'm an authenthicated user and this is a message for authenthicated user<br>This is my user information<br>");
        d($_SESSION["Auth"]);
    }else{
        echo("<br>Hello I'm a guest, I'm not yet authenthicated<br>");
    }

    // Authenthicate as pelajar, accepts 2 parameters (name, password)
    if($authObj->authPelajar("Iz", "password")){
        echo("<br>Successfully authenthicated as a pelajar<br>");
    }

    // Authenthicate as guru, accepts 2 parameters (name, password)
    if($authObj->authGuru("Guru 1", "password")){
        echo("<br>Successfully authenthicated as a guru<br>");
    }
    
    // Authenthicate as warden, accepts 2 parameters (name, password)
    if($authObj->authWarden("Warden 1", "password")){
        echo("<br>Successfully authenthicated as a warden<br>");
    }

    // Authenthicate as warden, accepts 2 parameters (name, password)
    if($authObj->authPentadbir("Pentadbir 1", "password")){
        echo("<br>Successfully authenthicated as a pentadbir<br>");
    }

    // Check whether the current user is currently authenthicated by checking whether the sesion key Auth has been set(Set = True, X Set = False)
    if($authObj->isAuth()){
        echo("<br>Hello I'm an authenthicated user and this is a message for authenthicated user<br>This is my user information<br>");
        d($_SESSION["Auth"]);
    }else{
        echo("<br>Hello I'm a guest, I'm not yet authenthicated<br>");
    }

    // Erase all session variables PS: do this only on logout
    session_unset();
?>