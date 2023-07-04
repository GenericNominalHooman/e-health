<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health2/site_config.php");
?>
<?php
class JSONConverter {
    public static function convertArray($jsonString) {
        // Replace opening curly braces with square brackets
        $modifiedJsonString = str_replace('{', '[', $jsonString);

        // Replace closing curly braces with square brackets
        $modifiedJsonString = str_replace('}', ']', $modifiedJsonString);

        return $modifiedJsonString;
    }
}

function is_file_included($file) {
    $included_files = get_included_files();
    return in_array($file, $included_files);
}
?>