<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
?>
<?php
class Sanitize{
    public static function sanitize($input){ // Sanitize user input, and convert any passed in data to string
        // Remove any HTML tags from the input
        $filtered = strip_tags($input);
        // Convert any special characters to HTML entities
        $filtered = htmlspecialchars($filtered, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        // Return the sanitized input
        return $filtered;
    }
}
?>