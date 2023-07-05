<?php
// THIS CODE SNIPPET IS REQUIRED ON EVERY PAGE FOR HEADER & FOOTER FUNCTIONALITY TO WORK - Iz
// Import site settings
require_once($_SERVER["DOCUMENT_ROOT"]."/e-health/site_config.php");
// Import verification
require_once(COMPONENTS_DIR . "/verification.php");
// Import header
require_once(COMPONENTS_DIR . "/header.php");
// Import profile image manager
require_once(COMPONENTS_DIR . "/profile_image_manager.php");
// Import models
require_once(COMPONENTS_DIR . "/models.php");
// Import message handler
require_once(COMPONENTS_DIR . "/message_handler.php");
// Import config
require_once(COMPONENTS_DIR . "/config.php");
// Import warden sidebar template
require_once(TEMPLATE_DIR . "/sidebar2_warden.php");

$databaseObj = new Database();
$conn = $databaseObj->getConnection();

?>

<?php
//delete record from database

if (isset($_GET['id'])) {
	$query="DELETE profilpelajar, loginpelajar
    FROM profilpelajar
    INNER JOIN loginpelajar ON profilpelajar.id_login = loginpelajar.id
    WHERE profilpelajar.nokp = '$nokp'";

	$sql=mysqli_query($conn,$query);

}

if (mysqli_query($conn, $sql)) {

	echo "<script type='text/javascript'>alert('Data sedang diprose, Sila tunggu');location='pelajar_urus.php';</script>";

}

else {

	echo "<script type=\"text/javascript\">alert('Error memadam rekod :'+'mysqli_error($conn)') </script>";
}

//Close MySQL connection
mysqli_close($conn);
?>