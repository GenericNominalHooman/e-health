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
$card->addCard(['bg-secondary-custom', 'tertiary-custom', 'Card One', 'cardDescription', 'bx bxl-dribbble']);
$card->addCard(['bg-blue', 'text-white', 'Card Two','cardDescription', 'bx bxl-facebook']);
$card->renderCards();
// CONTENT ENDS
?>