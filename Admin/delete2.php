<?php 
//connect to database
require_once(COMPONENTS_DIR."/config.php");

//delete record from database

if (isset($_GET['id'])) {
	$query="DELETE FROM mc WHERE id='".$_GET['id']."'";

	$sql=mysqli_query($conn,$query);
    echo "<script type='text/javascript'>alert('Data sedang diprose, Sila tunggu');location='display_pdf.php';</script>";

	/*echo "<script>alert('Data sedang diprose, Sila tunggu');</script>;"
    header('Location: display_pdf.php');
    exit;*/
    
}
else {
	echo "<script type='text/javascript'>alert('Data Gagal diproses');location='display_pdf.php';</script>";

}
if($sql)



//Close MySQL connection
mysqli_close($conn);
?>