<?php 
require_once(COMPONENTS_DIR."/config.php");
require 'function.php';
if( isset($_GET['cari']) ) {
$keyword = $_GET['keyword'];
$sql = "SELECT * FROM janjitemu
			WHERE
		 nokp LIKE '$keyword' 
		";
$pelajar = query($sql);
} //else {
	//$pelajar = query("select * from janjitemu");
//}

    /* <?php
    
	
        /*if(isset($_POST['submit'])){
            $search =  $_POST['search'];

            $sql="SELECT * FROM `janjitemu` WHERE id_janjitemu='$search'";
            $result = mysqli_query($conn,$sql);

            if($result){
                $num=mysqli_num_rows($result);
                echo $num;
            }

        }

             //echo $output;//}}}
    $peljar=query("SELECT * FROM janjitemu");
    if(isset($_POST["cari"])){
        $pelajar=cari($_POST["keyword"]);
    }$con=mysqli_connect('localhost','root','','hospital2');
        if (isset($_GET['submit'])){
            $nokp = $_GET['nokp'];
            $sql ="SELECT * FROM janjitemu WHERE nokp LIKE '%nokp%'";
            $exe = mysqli_query($con,$sql) or die ("Query Failed !!");
            if (mysqli_num_rows($exe)>0) {
                $count=0;
                while($row=mysqli_fetch_assoc($exe)){
              $count++
        
              $connect=mysqli_connect("localhost","root","","hospital2");

              $output="";

              if(isset($_POST['search'])){
                $input = $_POST['input'];

                    if(!empty($input)){
                        $query = "SELECT * FROM  janjitemu WHERE id_janjitemu LIKE '%$input%'";

                        $res = mysqli_query($connect,$query);

                        $output .= "
       
                        <table class = 'table table-bordered table-stripted'>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No.K/P</th>
                            <th>Waktu Janji Temu</th>
                            <th>Tarikh Janji Temu</th>
                            <th>Program</th>
                            <th>Tahun</th>
                            <th>Status</th>
                        </tr>
                        ";
                    }
                    if (mysqli_num_rows($res)<1){
                        $output .="
                        <tr>
                        <td colspan='6' class='text-center'>No data found</td>
                        </tr>
                        ";
                    }else{
                        while ($row = mysqli_etch_array($res)){
                            $output .="
                            <tr>
			                    <td>".$row['nama']."?></td>
			                    <td>".$row['nokp']."?></td>
			                    <td>".$row['program']."?></td>
			                    <td>".$row['tahun']."?></td>
			                    <td>".$row['waktu']."?></td>
			                    <td>".$row['tarikh']."?></td>
			                    <td>".$row['status']."?></td>
		                     </tr>
                            ";
                        }
                    }
              }*/
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HOSPITAL KVG</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit.fontawesome.com/c7ad192f5f.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>


<div class="container d-flex justify-content-center">
 <div class="col-md-12">
  
   <form action="kemaskini.php" method="GET">
              <!--<input type="text" name="keyword" autofocus autocomplete="off" >
              <button type="submit" name="cari">Search</button>-->
              <div class="row">
              <div class="col-md-9">
                 <div class="input-group">
                    <div class="input-group-text"><i class="fas fa-search"></i></div><input type="text" class="form-control"  name="keyword" placeholder="Masukkan No. Kad Pengenalan...." autocomplete="off">
                        </div></div>
                              <div class="col-md-3">
                                   <input type="submit" name="cari" value="Search" class="btn btn-outline-info" >
                                         </div>
                                               </div>
            </div></div>
            <!--<table>
                <tr><div class="row">
     <div class="col-md-9">
     <div class="input-group">
    <div class="input-group-text"><i class="fas fa-search"></i></div><input type="text" class="form-control"  placeholder="Masukkan No. Kad Pengenalan...." name="search">
  </div></div>
       <div class="col-md-3">
         <input type="submit"  value="Search" class="btn btn-outline-info" >
           </div>
              </div>

                <th>No</th>
					<th>Nama</th>
					<th>No.K/P</th>
					<th>Waktu Janji Temu</th>
					<th>Tarikh Janji Temu</th>
					<th>Program</th>
					<th>Tahun</th>
					<th>Status</th>
                </tr>-->
        </form>
        <table class = 'table table-bordered table-stripted'>
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
                        </tr>
                        </thead>
			            <tbody>
                        <?php if( empty($pelajar) ) : ?>
		                    <tr>
			                    <td colspan="7" align="center">data pelajar tidak ditemukan</td>
		                    </tr>
	                    <?php endif; ?>
                        </tbody>
                        <?php $i = 1; ?>
	                    <?php foreach( $pelajar as $row ) { ?>
	                    <tr>
		                    <td><?= $i; ?></td>
		                    <td><?= $row["nama"]; ?></td>
		                    <td><?= $row["nokp"]; ?></td>
		                    <td><?= $row["program"]; ?></td>
		                    <td><?= $row["tahun"]; ?></td>
		                    <td><?= $row["waktu"]; ?></td>
                            <td><?= $row["tarikh"]; ?></td>
                            <td><?= $row["status"]; ?></td>
                            </tr>
	            <?php $i++; ?>
	            <?php } ?>
                </table>
                        
   
      
  
