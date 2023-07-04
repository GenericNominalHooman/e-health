<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
?>
<?php
//Directory where uploaded images are saved
$dirname = UPLOADS_DIR."/Test";
$uploadfile = $dirname . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

$log_data = "";

foreach($_POST as $key => $value) {
    $log_data .= $key.": ".$value."\n";
}

//Put details into a log file, you should use a database instead.
file_put_contents('logs.txt', $log_data, FILE_APPEND);

echo 'Here is some more debugging info:';
print_r($_FILES);
?>
