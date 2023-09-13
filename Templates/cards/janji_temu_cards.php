<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"]."/projects_config.php");
    require_once(E_HEALTH_DIR."/site_config.php");
?>
<?php
// IMPORT BEGIN
require_once(COMPONENTS_DIR."/card.php");
// IMPORT ENDS
?>
<?php
// CONTENT BEGIN
$card = new Card();
$card->addCard(['white', '#e15531', 'Card One', 'cardDescription', 'bx bxl-dribbble']);
$card->renderCards();
// CONTENT ENDS
?>