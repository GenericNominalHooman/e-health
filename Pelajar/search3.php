<?php require_once(COMPONENTS_DIR."/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit.fontawesome.com/c7ad192f5f.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="css/search.css"/>
<div class="container mt-4"> 
    <div class="row d-flex justify-content-center"> 
        <div class="col-md-9"> <div class="card p-4 mt-3"> 
            <h3 class="heading mt-5 text-center">SILA MASUKKAN NO K/P </h3> 
            <div class="d-flex justify-content-center px-5"> <div class="search"> 
            <form action="search3.php" method="POST">
                <input type="text" class="search-input" placeholder="NO KAD PENGENALAN" name="search"> 
                <button type="submit" name="submit" class="search-icon"> <i class="fa fa-search"></i> </a> </div> </div> 
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
                        <td>'.$row['sebab'].'</td>
                        <td>'.$row['status'].'</td>';?>
                        <td class="d-print-none">
                        <td><a href="update.php?id_janjitemu=<?= $row['id_janjitemu'];?>"class="btn btn-outline-secondary"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
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
                <!--<div class="row mt-4 g-1 px-4 mb-5"> <div class="col-md-2"> <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                    <img src="https://i.imgur.com/Mb8kaPV.png" width="50"> 
                    <div class="text-center mg-text"> <span class="mg-text">Account</span> </div> </div> 
                </div> <div class="col-md-2"> <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                    <img src="https://i.imgur.com/ueLEPGq.png" width="50"> <div class="text-center mg-text"> 
                        <span class="mg-text">Payments</span> </div> </div> </div> <div class="col-md-2"> 
                            <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                                <img src="https://i.imgur.com/tmqv0Eq.png" width="50"> 
                                <div class="text-center mg-text"> <span class="mg-text">Delivery</span> 
                                </div> </div> </div> <div class="col-md-2"> 
                                    <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                                        <img src="https://i.imgur.com/D0Sm15i.png" width="50"> 
                                        <div class="text-center mg-text"> <span class="mg-text">Product</span> </div> </div> </div> 
                                        <div class="col-md-2"> <div class="card-inner p-3 d-flex flex-column align-items-center"> 
                                            <img src="https://i.imgur.com/Z7BJ8Po.png" width="50"> <div class="text-center mg-text"> <span class="mg-text">Return</span> </div> </div> </div> <div class="col-md-2"> <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/YLsQrn3.png" width="50"> <div class="text-center mg-text"> <span class="mg-text">Guarantee</span> </div> </div> </div> </div> </div> </div> </div> </div>-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
		<script src="./js/app.js"></script>