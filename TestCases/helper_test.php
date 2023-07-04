<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/helper.php");
require_once(COMPONENTS_DIR."/config.php");
require_once(COMPONENTS_DIR."/models.php");

$dbObj = new Database();
$janjitemuModel = new JanjitemuModel($dbObj->getConnection());
$janjitemuRows = $janjitemuModel->getAllJanjitemu();
$janjitemuJSON = json_encode($janjitemuRows);
$janjitemuJSONArray = JSONConverter::convertArray($janjitemuJSON);
// Dump json encoded arary for reference
$assocArray = ["column 1"=>"value 1", "column 2"=>"value 2", "column 3"=>"value 3"];
d(json_encode(["column 1"=>"value 1", "column 2"=>"value 2", "column 3"=>"value 3"]));
d($janjitemuJSONArray);
?>
<script>
    let janjitemuJSONArray = JSON.parse(<?php echo("'".$janjitemuJSONArray."'");?>);
    console.log(janjitemuJSONArray);
</script>