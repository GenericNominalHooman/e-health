
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css">
    <style>
      body {
        background-color:#ffff;
      }
    </style>
</head>
<body>

<div class="container-fluid" style="background-color:#ffff;">
<?php include "headergurubertugas.php";?>
</div>
<div class="container" style="background-color:#ffff;">
        <img src="images/logoremove.png" alt="Logo" width="250" height="85" class="d-inline-block align-text-top-center ">
        <img src="images/logo2remove.png" alt="Logo" width="260" height="100" class="d-inline-block align-text-top-center">
        
        
          <div class="mt-3">
          <div class="row">
  <div class="col-sm-3 mb-3 mb-sm-0" >
    <div class="card" style="background-color:#172065; color: white;">
      <div class="card-body">
        <h5 class="card-title" > 
          <?php 
						require_once(COMPONENTS_DIR."/config.php");
						$dash_category_query = "SELECT * FROM user_form";
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
    <div class="card" style="background-color:#172065; color: white;">
      <div class="card-body">
        <h5 class="card-title">   <?php 
						require_once(COMPONENTS_DIR."/config.php");
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
    <div class="card" style="background-color:#172065; color: white;">
      <div class="card-body">
        <h5 class="card-title">   <?php 
						require_once(COMPONENTS_DIR."/config.php");
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
    <div class="card" style="background-color:#172065; color: white;">
      <div class="card-body">
        <h5 class="card-title"> <?php 
						require_once(COMPONENTS_DIR."/config.php");
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
          </div>
<div class="mt-3">
<?php include "urus.php"?>
</div>
</div>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src= "https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>
        <script src= ""></script>
        <script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
        <script src ="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>

    <?php include('footer2.php');?>