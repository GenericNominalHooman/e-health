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

//rename
if (isset($_POST['submit'])) {
	
	$waktu=$_POST['waktu'];
	$tarikh=$_POST['tarikh'];
	
$query="INSERT INTO janjitemu( waktu, tarikh,status) VALUES 
('$waktu','$tarikh','pending')";

/*$result=mysqli_query($conn,"INSERT INTO janjitemu VALUES 
('$nama','$nokp','$notel','$notelpen','$waktu','$tarikh','$alamat','$program','$tahun','$jantina')");
if($result){
	echo"Success";
}
else{
	echo"failed";
}
}*/
mysqli_query($conn,$query);

echo "<script>alert('Data sedang diprose, Sila tunggu');</script>";
}
//klau nk masuk insert dkt sini



?>