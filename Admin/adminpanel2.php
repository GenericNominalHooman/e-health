
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<style>
		body{
			background-color:aliceblue;
		}
	</style>
</head>
<body>


<div class="container-fluid" >
<?php include "headergurubertugas.php";?>
          
          
<div class="text-center">
          <img src="images/logo.png" alt="Logo" width="250" height="85" class="img-fluid">
        <img src="images/logo2remove.png" alt="Logo" width="260" height="100" class="img-fluid">
        </div>
        <div class="container" style="background-color:aliceblue;">
          <div class="mt-3">
          <div class="row">
  <div class="col-sm-3 mb-3 mb-sm-0">
    <div class="card" style="background-color:skyblue;">
      <div class="card-body">
        <h5 class="card-title"> 
          <?php 
						include "config.php";
						$dash_category_query = "SELECT * FROM janjitemu";
						$dash_category_query_run = mysqli_query($conn, $dash_category_query);
						if($category_total = mysqli_num_rows($dash_category_query_run)){
							echo "$category_total";
						}else {
							echo "No Data";
						}
						
						?></h5>
        <p class="card-text">Pelajar Berdaftar</p>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="background-color:skyblue;">
      <div class="card-body">
        <h5 class="card-title">   <?php 
						include "config.php";
						$dash_category_query = "SELECT * FROM janjitemu WHERE status='Tidak Sah'";
						$dash_category_query_run = mysqli_query($conn, $dash_category_query);
						if($category_total = mysqli_num_rows($dash_category_query_run)){
							echo "$category_total";
						}else {
							echo "No Data";
						}
						
						?>  </h5>
        <p class="card-text">Permohonan tidak berjaya</p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="background-color:skyblue;">
      <div class="card-body">
        <h5 class="card-title">   <?php 
						include "config.php";
						$dash_category_query = "SELECT * FROM janjitemu WHERE status='pending'";
						$dash_category_query_run = mysqli_query($conn, $dash_category_query);
						
						if($category_total = mysqli_num_rows($dash_category_query_run)){
							echo "$category_total";
						}else {
							echo "No Data";
						}
						
						
						?>  </h5>
        <p class="card-text">Permohonan sedang diproses</p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="background-color:skyblue;">
      <div class="card-body">
        <h5 class="card-title"> <?php 
						include "config.php";
						$dash_category_query = "SELECT * FROM janjitemu WHERE status='Sah'";
						$dash_category_query_run = mysqli_query($conn, $dash_category_query);
						
						if($category_total = mysqli_num_rows($dash_category_query_run)){
							echo "$category_total";
						}else {
							echo "No Data";
						}
						
						
						?></h5>
        <p class="card-text">Permohonan berjaya</p>
        
      </div>
    </div>
  </div>
          </div></div>
<div class="mt-3">
<p class="display-4">Senarai pelajar</p>
<table id="example" class="table table-striped " width="100%">
			<thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. Kad Pengenalan</th>
                    <th>Program</th>
                    <th>Tahun</th>	
			        <th>Waktu Janji Temu</th>
			        <th>Tarikh Janji Temu</th>
                    <th>No Telefon Pelajar</th>
					<th>No Telefon Penjaga</th>
					<th>Alamat</th>
					<th>Jantina</th>
					<th>Sebab</th>
			        <th>Status</th>
			        <th>Delete </th>
                
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
			<td>{$row['notel']}</td>
			<td>{$row['notelpen']}</td>
			<td>{$row['alamat']}</td>
			<td>{$row['jantina']}</td>
			<td>{$row['sebab']}</td>
			<td>{$row['status']}</td>
			<td><a href=\"delete.php?id_janjitemu={$row['id_janjitemu']}\"><button class='btn btn-outline-danger' ><i class='fa-solid fa-trash'></i>&nbsp;Delete</button></a></td>
		</tr>";
		$cnt++; }       
	}
}
		

			
		 ?>
		 	
    </tbody>
</table>

				
			
</div>


        <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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