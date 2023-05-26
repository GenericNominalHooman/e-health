<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-HEALTH</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
    <link rel="stylesheet" href="https://kit.fontawesome.com/c7ad192f5f.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600,700&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">


<link rel="stylesheet" href="css/lanjut.css"/>

</head>

<body>

<div class="tabset">
  <!-- Tab 1 -->
  <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
  <label for="tab1">MC</label>
  <!-- Tab 2 -->
  <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
  <label for="tab2">Time Slip</label>
 
  
  <div class="tab-panels">
    <section id="marzen" class="tab-panel">
      <h2>Butiran</h2>
      <p><strong> 
<div class="file-upload">
<input type="file" value="Masukkan MC" name="pdf" class="box form-control" required>
<div class="form-text">SILA MASUKKAN MC DALAM BENTUK FILE PDF SAHAJA</div>
  <div class="mt-3">
  
</div>
  <div class="mt-3">
    <!--BUTTON SUBMIT-->
  <button type="submit"  class = "btn btn-outline-primary" name="submit">Masukkan MC</button>
  <?php
        include 'config.php';
        

        if (isset($_POST['submit'])) {
          $pdf=$_FILES['pdf']['name'];
          $pdf_type=$_FILES['pdf']['type'];
          $pdf_size=$_FILES['pdf']['size'];
          $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
          $pdf_store="pdf/".$pdf;

          move_uploaded_file($pdf_tem_loc,$pdf_store);

          
          $sql="INSERT INTO mc (pdf) values('$pdf')";
          $query=mysqli_query($conn,$sql);
          
          if($query){
            echo "<script type='text/javascript'>alert('File berjaya dimasukkan')</script>";
      }
          
          

          }
         ?>
         <div class="mt-3">
         Kembali ke <a href="pelajarhome.php">Halaman Utama</a>
        </div>
    </div></strong></p>
  </section>
    <section id="rauchbier" class="tab-panel">
      <h2>Kemaskini</h2>
      <p><strong><?php include "upload2.php";?></p>
     
      

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>





  
</div>


 <!-- Bootstrap JS Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="js/lanjut.js"></script>
 <script src="..\js\lanjut.js"></script>
 <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" "></script>

</body>
</html>
