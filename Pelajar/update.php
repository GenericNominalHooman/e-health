<?php 
include("config.php");


if(isset($_POST['submit']))
{
    $id_janjitemu = mysqli_real_escape_string($conn, $_POST['id_janjitemu']);

    $nama = mysqli_real_escape_string($conn, $_POST['name']);
    $nokp = mysqli_real_escape_string($conn, $_POST['nokp']);
    $program = mysqli_real_escape_string($conn, $_POST['program']);
    $tahun = mysqli_real_escape_string($conn, $_POST['tahun']);
    $waktu = mysqli_real_escape_string($conn, $_POST['waktu']);
    $tarikh = mysqli_real_escape_string($conn, $_POST['tarikh']);
    $notel = mysqli_real_escape_string($conn, $_POST['notel']);
    $notelpen = mysqli_real_escape_string($conn, $_POST['notelpen']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jantina = mysqli_real_escape_string($conn, $_POST['jantina']);
    $sebab = mysqli_real_escape_string($conn, $_POST['sebab']);
    
    $query = mysqli_query($conn, "UPDATE `janjitemu` SET nama='$nama', nokp='$nokp', program='$program', tahun='$tahun', waktu='$waktu', tarikh='$tarikh', notel='$notel', notelpen='$notelpen', alamat='$alamat', jantina='$jantina', sebab='$sebab' WHERE id_janjitemu='$id_janjitemu' ") or die('query failed');
    $query_run = mysqli_query($conn, $query);

    /*if(mysqli_query($conn, $query_run)){
      header("Location: update.php?id_janjitemu=".$id_janjitemu."&success=update");
  }else {
      array_push($errors, mysqli_error($conn));
      array_push($errors, $query_run);
  }
  if($query_run){	
      echo 'Update BERJAYA!';
      header("Location: update.php");
    }
    else{
      echo "Update GAGAL";
      header("Location: update.php?id_janjitemu=$row['id_janjitemu']");//echo urlencode($current_id['id_janjitemu']);*/
    }
//}
    

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width">
   <title>E-HEALTH</title>

   <!-- custom css file link  
   <link rel="stylesheet" href="css/style.css">-->
   <link rel="shortcut icon" href="images/logo2remove.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">




<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <!--<div class="col-12 col-lg-9 col-xl-7">-->
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
          
<div class="mt-3">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">KEMASKINI MAKLUMAT PELAJAR</h3>
            <?php
            if (isset($_GET['id_janjitemu'])) {
              include("config.php");
              $id_janjitemu = $_GET['id_janjitemu'];
              $sql = "SELECT * FROM janjitemu WHERE id_janjitemu=$id_janjitemu";
              $result = mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($result);
              
              /*if(isset($_GET['id_janjitemu'])){
                $id_janjitemu=mysqli_real_escape_string($conn, $_GET['id_janjitemu']);
                $query="SELECT * FROM janjitemu WHERE id_janjitemu='$id_janjitemu'";
                $query_run=mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run)>0){
                  $row = mysqli_fetch_array($query_run);*/
                
            ?>
            <!--BORANG MULA-->
            <form action="update.php" method="GET">
				
            <?php include ('message.php');?>
              <div class="row">
               <div class="col-md-6 mb-4">
                  <div class="form-outline">
                  <input type="hidden" name="id_janjitemu" value="<?= $row['id_janjitemu']; ?>">
                    <input type="text" name="nama" class="form-control form-control-lg" value="<?php echo $row['nama'];?>"/>
                    <label class="form-label" for="nama">Nama</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="nokp" class="form-control form-control-lg" value="<?= $row['nokp'];?>"  disabled/>
                    <label class="form-label" for="nokp">No. Kad Pengenalan</label>
                  </div>
                </div>
              </div>
			  
			  <div class="row">
              <div class="col-md-6 mb-4">
                  <select class="form-select form-select-lg mb-3" name="waktu" id="waktu" >
                  <option value ="<?= $row['waktu'];?>" >Waktu</option>
                     <option value="WAKTU" disabled>Pilihan Waktu hanya</option>
		               <option value ="<?php if($row['waktu'] == "9.00 A.M"){echo "selected";}?>">9.00 A.M</option>
		               <option value =" <?php if($row['waktu'] == "3.00 P.M"){echo "selected";}?>">3.00 P.M</option>
                  </select>
                </div>
				<div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="date" name="tarikh" class="form-control form-control-lg" value="<?= $row['tarikh'];?>"/>
                    <label class="form-label" for="tarikh" >Tarikh Janji Temu</label>
                  </div>
                </div>
              </div>


              <div class="row">
              <div class="col-md-6 mb-4">
                  <select class="form-select form-select-lg mb-3" name="program" id="program">
                     <option value="program" disabled>Program</option>
		               <option value =" <?php if($row['program'] == "KPD"){echo "selected";}?>">KPD</option>
		               <option value ="<?php if($row['program'] == "KSK"){echo "selected";}?>"">KSK</option>
		               <option value =" <?php if($row['program'] == "HSK"){echo "selected";}?>">HSK</option>
		               <option value =" <?php if($row['program'] == "HBP"){echo "selected";}?>"">HBP</option>
		               <option value =" <?php if($row['program'] == "BAK"){echo "selected";}?>">BAK</option>
		               <option value =" <?php if($row['program'] == "BPP"){echo "selected";}?>"">BPP</option>
		               <option value ="<?php if($row['program'] == "MTK"){echo "selected";}?>">MTK</option>
		               <option value =" <?php if($row['program'] == "WTP"){echo "selected";}?>"">WTP</option></select>
                  </select>
                </div>
				<div class="col-md-6 mb-4">
                <select class="form-select form-select-lg mb-3" name="tahun" id="tahun">
                     <option value="tahun" disabled>Tahun</option>
                     <option value ="<?php if($row['tahun'] == "Tahun 1 SVM"){echo "selected";}?>">Tahun 1 SVM</option>
		               <option value = "<?php if($row['tahun'] == "Tahun 2 SVM"){echo "selected";}?>"">Tahun 2 SVM</option>
		               <option value =  "<?php if($row['tahun'] == "Tahun 1 DVM"){echo "selected";}?>">Tahun 1 DVM</option>
		               <option value = "<?php if($row['tahun'] == "Tahun 2 DVM"){echo "selected";}?>"">Tahun 2 DVM</option>
		               </select>
                </div></div>

                <div class="row">
               <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="notel" class="form-control form-control-lg" value="<?php echo $row['notel'];?>"/>
                    <label class="form-label" for="notel">  No Telofon Pelajar</table></label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="notelpen" class="form-control form-control-lg" value="<?= $row['notelpen'];?>" />
                    <label class="form-label" for="notelpen">No Telefon Penjaga</label>
                  </div>
                </div>
              </div>
              <div class="form-outline mb-4">
                        <label for="alamat" class="form-label">Alamat :</label>
                        <textarea class="form-control form-control-lg" style="resize:none;" name="alamat" cols="25" rows="5" value="<?= $row['alamat'];?>"></textarea>
                </div>
               
                <div class="form-outline mb-4">
                  <h6 class="mb-2 pb-1">Jantina: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jantina" 
                      value="<?php if($row['jantina'] == "perempuan"){echo "selected";}?>" checked />
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jantina" 
                      value="<?php if($row['jantina'] == "lelaki"){echo "selected";}?>" />
                    <label class="form-check-label" for="lelaki">Lelaki</label>
                  </div>
                </div>
              </div>
              <div class="form-outline mb-4">
                            
                  <input type="text"  name="sebab" class="form-control" value="<?= $row['sebab'];?>" placeholder="Sebab Ke Hospital" />
                  <label  for="sebab">Sebab Ke Hospital</label></div>
                 
                <!--<input type="file"  name="update_image" class="box form-control" accept="image/jpg, image/jpeg, image/png">-->
                <div class="mt-3">
              <input type="submit" class="btn btn-outline-info" name="submit" value="EDIT"></div>
			  </div>
            </form>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<?php } ?>


</form>

</div>
</body>
</html>
<?PHP mysqli_close($conn);  include "footer.php";?>
