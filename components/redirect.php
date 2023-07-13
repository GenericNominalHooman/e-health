<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
require_once(E_HEALTH_DIR."/site_config.php");

?>
<?php
class Redirect {
    public static function redirect($page) {
        $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting</title>
</head>
<body>
    <form id="redirectForm" action="' . htmlentities($page) . '" method="get">
    </form>
    <script type="text/javascript">
        document.getElementById("redirectForm").submit();
    </script>
</body>
</html>';
        echo $html;
        exit;
    }

    public static function redirectWithMsg($page, $msg) {
        $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting</title>
</head>
<body>
    <form id="redirectForm" action="' . htmlentities($page) . '" method="post">
        <input type="hidden" name="msg" value="' . htmlentities($msg) . '">
    </form>
    <script type="text/javascript">
        document.getElementById("redirectForm").submit();
    </script>
</body>
</html>';
        echo $html;
        exit;
    }
}
?>
<noscript>
    <input type="submit" value="Click here if you are not redirected."/>
</noscript>