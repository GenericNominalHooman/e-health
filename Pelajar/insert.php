<?php  
include "config.php";

	
/*if( isset($nama)) || isset($nokp)) || isset($notel)) || isset($notelpen)) || isset($waktu)) || isset($tarikh)) || isset($alamat)) || isset($program)) || isset($tahun)) || isset($jantina)) {
	/*$nama=$_POST['nama'];
	$nokp=$_POST['nokp'];
	$notel=$_POST['notel'];
	$notelpen=$_POST['notelpen'];
	$waktu=$_POST['waktu'];
	$tarikh=$_POST['tarikh'];
	$alamat=$_POST['alamat'];
	$program=$_POST['program'];
	$tahun=$_POST['tahun'];
	$jantina=$_POST['jantina'];

$query="INSERT INTO janjitemu (nama,nokp, notel, notelpen, waktu, tarikh,alamat,program, tahun, jantina) VALUES 
('$nama','$nokp','$notel','$notelpen','$waktu','$tarikh','$alamat','$program','$tahun','$jantina')";
}
$sql=mysqli_query($conn,$query);

if($sql){
echo"Record inserted succesfully<br/>";
} else{
	echo"Error iserting record:".mysqli_error($conn)."<br/>";
}

//close database connection
mysqli_close($conn);*/


if (isset($_POST['submit'])) {
	
	$nama=$_POST['nama'];
	$nokp=$_POST['nokp'];
	$program=$_POST['program'];
	$tahun=$_POST['tahun'];
	$waktu=$_POST['waktu'];
	  $tarikh=$_POST['tarikh'];
	$notel=$_POST['notel'];
	$notelpen=$_POST['notelpen'];
	$alamat=$_POST['alamat'];
  
	if (isset($_POST['program'])){
	  $program=$_POST['program'];
	}
	  else {
		$program="";
	}
  
	if (isset($_POST['tahun'])){
	  $tahun=$_POST['tahun'];
	}
	  else {
		$tahun="";
	}
  
  if (isset($_POST['jantina'])){
	$jantina=$_POST['jantina'];
  }
	else {
	  $jantina="";
  }
  $sebab=$_POST['sebab'];
	
$query="INSERT INTO janjitemu( nama, nokp, program, tahun, waktu, tarikh,notel,notelpen,alamat,jantina,sebab,status) VALUES 
('$nama','$nokp','$program','$tahun','$waktu','$tarikh','$notel','$notelpen','$alamat','$jantina','$sebab','dalam proses')";


mysqli_query($conn,$query);

echo "<script>alert('Data sedang diprose, Sila tunggu');</script>";
}
//klau nk masuk insert dkt sini



?>