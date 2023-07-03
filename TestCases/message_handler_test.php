<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
?>
<?php
// Import header & message handler
require_once(COMPONENTS_DIR . "/header.php");
require_once(COMPONENTS_DIR . "/message_handler.php");

$messageHandler = new MessageHandler();
$messageHandler->addMessage("general", "This is some general message");
$messageHandler->addMessage("error", "This is some error message");
$messageHandler->addMessage("help", "This is some help message");
?>
<div id="errorMessageContainer"></div>
<script>
    const jsonMessages = '<?php echo $messageHandler->getMessagesJSON(); ?>';
    const messageHandler = new MessageHandlerJSON(jsonMessages);
    messageHandler.displayMessages('errorMessageContainer');
</script>