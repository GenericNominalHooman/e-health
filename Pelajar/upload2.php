
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
    <link rel="stylesheet" href="css/upload.css"/>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <form class="" action="upload2.php" method="post" enctype="multipart/form-data">
    <section class="vh-100 gradient-custom" style="background-color:#ffff;">
  <div class="container py-5 h-100" style="background-color:#ffff;">
    <div class="row justify-content-center align-items-center h-100" >
      <!--<div class="col-12 col-lg-9 col-xl-7" >-->
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px; border-color:#172065; background-color:#ffff;" >
          <div class="card-body p-4 p-md-5" >
          
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">MUAT NAIK MC/TIME SLIP</h3>
             
<div class="file-upload">
  
<select class="form-select form-select-lg mb-3" name="jenis" >
                     <option value="jenis" disabled>MC/Time Slip</option>
                     <option value ="Time Slip">Time Slip</option>
		               <option value ="MC">MC</option>
		               </select>
                
<input type="file" value="Masukkan MC" name="pdf" class="box form-control" required>
<div class="form-text">SILA MASUKKAN MAKLUMAT DALAM BENTUK FILE PDF SAHAJA</div>
  <div class="mt-3">
    <!--BUTTON SUBMIT-->
  <button type="submit"  class = "btn btn-outline-primary" name="submit">Masukkan MC</button>
  <?php
        include 'config.php';
        

        if (isset($_POST['submit'])) {

          if (isset($_POST['jenis'])){
            $jenis=$_POST['jenis'];
          }
            else {
            $jenis="";
          }
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;

          move_uploaded_file($pdf_tem_loc,$pdf_store);

          
          $sql="INSERT INTO mc (pdf,jenis) values('$pdf','$jenis')";
          $query=mysqli_query($conn,$sql);
          
          if($query){
            echo "<script type='text/javascript'>alert('File berjaya dimasukkan')</script>";
      }
          
          

          }
         ?>
         <div class="mt-3">
         Kembali ke <a href="pelajarhome.php">Halaman Utama</a>
        </div>
    </div>
 
  </div>
</div>
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<script src="./js/app.js"></script>
</div>
<!--Container Main end-->
 <!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="js/upload.js"></script>
</html>
<?php include "footer2.php"; ?>