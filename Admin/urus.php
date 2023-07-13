<html>
<head>
<title>URUSAN PELAJAR KE HOSPITAL</title>
<!--<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, {
  text-align: left;
  padding: 20px;
}
th, {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #D6EEEE;
}

</style>-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-HOSPTAL KVG</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!--<script type="text/javascript">

	$(document).ready(function () {
    	$('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: '../server_side/scripts/server_processing.php',
    });
});
$(document).ready(function() {
    $('#example').DataTable();
} );


    </script>-->
</head>

<body>
<?php include "headergurubertugas.php"; ?>
	<div class="container">
		<div class="mt-6">
         <h5>Senarai Pelajar</h5>
			<table id="example" class="table table-striped " width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>No.K/P</th>
					<th>Waktu Janji Temu</th>
					<th>Tarikh Janji Temu</th>
					<th>Program</th>
					<th>Tahun</th>
					<th>Status</th>
					<th>Delete Pelajar</th>
		
				</tr>
			</thead>
			<tbody>
		<?php
	include "config.php";
	global $row;
	$query = mysqli_query($conn,"SELECT * FROM janjitemu ");
	
	$numrow = mysqli_num_rows($query);

   if($query){
		
		if($numrow!=0){
			 $cnt=1;

			  while($row = mysqli_fetch_assoc($query)){
				echo "
		<tr>
			<td>$cnt</td>
			<td>{$row['nama']}</td>
			<td>{$row['nokp']}</td>
			<td>{$row['program']}</td>
			<td>{$row['tahun']}</td>
			<td>{$row['waktu']}</td>
			<td>{$row['tarikh']}</td>
			<td>{$row['status']}</td>
			<td><a href=\"delete.php?id_janjitemu={$row['id_janjitemu']}\"><button class='btn btn-outline-danger' ><i class='fa-solid fa-trash'></i>&nbsp;Delete</button></a></td>
		</tr>";
		$cnt++; }       
	}
}
		

			
		/*if(isset($_POST['approve'])){
			$id_pelajar=$_GET['id_pelajar'];
			
			$select="UPDATE janjitemu SET status='approved' WHERE id_pelajar='$id_pelajar'";
			$sql=mysqli_query($conn,$query);
			
			echo'<script type ="text/javascript">';
			echo 'alert("User Approved");';
			echo 'window/location.href="urus.php"';
			echo '</script>';
		}
		
		if(isset($_POST['deny'])){
			$nokp=$_POST['nokp'];
			
			$select="DELETE janjitemu SET status='deny' WHERE nokp='$nokp'";
			$sql=mysqli_query($conn,$query);
			
			echo'<script type ="text/javascript">';
			echo 'alert("User Denid");';
			echo 'window/location.href="urus.php"';
			echo '</script>';
			}*/
			
		 ?>
		 	
    </tbody>
</table>
			<!--<td>-->
				<?php
				/*if($row['Status']==1){
					echo "pending";
				}
				if($row['Status']==2){
					echo "Accept";
				}
				if($row['Status']==3){
					echo "Reject";
				}*/
				/*if($row['status']==1){
					echo '<p><a href="status.php?nokp='.$row['nokp'].'&status=0">Sah</a></p>';

				}else{
					echo '<p><a href="status.php?nokp='.$row['nokp'].'&status=0">Tidak Sah</a></p>';

				}*/
				?>
				<!--<a href=\"sah.php\"><button class='btn-success btn-sm' >Accept</button></a>
				<a href=\"tidaksah.php\"><button class='btn-danger btn-sm' >Reject</button></a></td>-->
			
</div>


		<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
		<script src="./js/app.js"></script>
		<script>
            $(document).ready(function () {
                $('#example').DataTable();
                    });
        </script>
		<?php include "footer.php"; ?>
</body>
</html>