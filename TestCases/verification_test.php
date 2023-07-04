<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// Import verification component
require_once(COMPONENTS_DIR."/verification.php");

// MessageHandler class remains the same

$handler = new MessageHandler();
$verification = new Verification($handler);

// Validate email
$email = "@example.com";
if (!$verification->validateEmail($email)) {
    $verification->handleError('Invalid email address');
}

// Validate URL
$url = "https://www.example.com";
if (!$verification->validateURL($url)) {
    $verification->handleError('Invalid URL');
}

// Validate integer
$integer = "42";
if (!$verification->validateInt($integer)) {
    $verification->handleError('Invalid integer');
}

// Validate image
$file = IMG_DIR."/adasdamin.png";
if (!$verification->validateImage($file)) {
    $verification->handleError('Unsupported image, please upload only .GIF .JPG .PNG .SWF .SWC .PSD .TIFF .BMP .IFF .JP2 .JPX .JB2 .JPC .XBM .WBMP file');
}
?>

<div id="errorMessageContainer"></div>

<script>
    let jsonMessages = '<?php echo($handler->getMessagesJSON());?>';
    let messageHandler = new MessageHandlerJSON(jsonMessages);
    messageHandler.displayMessages("errorMessageContainer");
</script>
