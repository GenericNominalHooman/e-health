<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit.fontawesome.com/c7ad192f5f.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
</head>


<div class="container d-flex justify-content-center" style="background-color:aliceblue;">
 <div class="col-md-12" style="background-color:aliceblue;">
  
   <form action="kemaskini.php" method="POST">
              <!--<input type="text" name="keyword" autofocus autocomplete="off" >
              <button type="submit" name="cari">Search</button>-->
              <div class="row">
              <div class="col-md-9">
              <div class="input-group mb-3">
              <input type="text" class="form-control text-center"  name="search" style="border-color:skyblue;" placeholder="Masukkan No. Kad Pengenalan...."  autocomplete="off">
                        <button type="submit" class="btn btn-outline-bg-dark"  style="background-color:skyblue;" name="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
                 <!--<div class="input-group">
                    <div class="input-group-text"><i class="fas fa-search"></i></div><input type="text" class="form-control"  name="search" placeholder="Masukkan No. Kad Pengenalan...." autocomplete="off">
                        </div></div>
                              <div class="col-md-3">
                                   <button type="submit" name="submit" value="Search" class="btn btn-outline-info" ></button>
                                         </div>
                                               </div>-->
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
        <?php
        if(isset($_POST['submit'])){
            $search =  $_POST['search'];

            $sql="SELECT * FROM `janjitemu` WHERE id_janjitemu='$search' OR nokp='$search'";
            $result = mysqli_query($conn,$sql);

            if($result){
               if(mysqli_num_rows($result)>0){
                echo'<thead>
                <tr>
                 
                            <th>Nama</th>
                            <th>No.K/P</th>
                            <th>Waktu Janji Temu</th>
                            <th>Tarikh Janji Temu</th>
                            <th>Program</th>
                            <th>Tahun</th>
                            <th>No Telefon Pelajar</th>
                            <th>No Telefon Penjaga</th>
                            <th>Alamat</th>
                            <th>Jantina</th>
                            <th>Sebab</th>
                            <th>Status</th>
                           
                        </tr>
                    </thead>
                ';
                while($row=mysqli_fetch_assoc($result)){
                echo '<tbody>
                        <tr>
                        
                        <td>'.$row['nama'].'</td>
                        <td>'.$row['nokp'].'</td>
                        <td>'.$row['waktu'].'</td>
                        <td>'.$row['tarikh'].'</td>
                        <td>'.$row['program'].'</td>
                        <td>'.$row['tahun'].'</td>
                        <td>'.$row['notel'].'</td>
                        <td>'.$row['notelpen'].'</td>
                        <td>'.$row['alamat'].'</td>
                        <td>'.$row['jantina'].'</td>
                        <td>'.$row['sebab'].'</td>
                        <td>'.$row['status'].'</td>';?>
                        <td class="d-print-none">
                        <td><a href="update.php?id_janjitemu=<?= $row['id_janjitemu'];?>"class="btn btn-outline-secondary"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
                        <!--<a href="tambah.php?id_janjitemu=<?= $row['id_janjitemu'];?>"class="btn btn-outline-secondary"><i class="fa-regular fa-square-plus"></i>&nbsp;Tambah Maklumat</a>-->
                        <a href="butiran.php?id_janjitemu=<?= $row['id_janjitemu']; ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i>&nbsp;Butiran</a>
                        <a href="padam.php?id_janjitemu=<?= $row['id_janjitemu'];?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        <a href="upload2.php" class="btn btn-sm btn-outline-danger">Muat naik MC</a></td>
                        </tr>
                      </tbody>
                      <?php
               }
            }else{
                echo '<h2> Data tidak dijumpai</h2>';
               }
            }

        }
        ?>
       
    </table>
                        