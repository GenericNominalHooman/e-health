
<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// Import header
require_once(COMPONENTS_DIR . "/header.php");
// Import sidebar(Please uncomment the appropiate user sidebar for your page)
// require_once(TEMPLATE_DIR . "/sidebar2_pentadbir.php"); // Pentadbir sidebar
// require_once(TEMPLATE_DIR . "/sidebar2_warden.php"); // Warden sidebar
 require_once(TEMPLATE_DIR . "/sidebar2_guru.php"); // Guru sidebar
?>

<!-- CONTENT HERE -->
Hey this is some content
<!-- END CONTENT -->

<?php
// Import header
require_once(COMPONENTS_DIR . "/footer.php");
?>
<?php

include 'config.php';
$id = $_SESSION['Auth']['id'];

if(isset($_POST['update_jadual'])){



   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `loginadmin` SET image = '$update_image' WHERE id = '$id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>
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
    <link rel="stylesheet" href="css/sidebar.css"/>
	<title>E HEALTH</title>
	<style>
		#errorMs {
			color: #a00;
		}
		
	</style>
</head>
<body id="body-pd" style="background-color:aliceblue;">
    <header class="header" id="header" style="background-color:aliceblue;">
        <div class="header_toggle" > <i class='bx bx-menu' id="header-toggle"></i> </div>
        
    </header>

<div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="dashboard.php" class="nav_link"> <i class="fa-solid fa-house"></i><span class="nav_logo-name">E - HEALTH</span> </a>
                <div class="nav_list"> <a href="dashboard.php" class="nav_link  "> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                <a href="jadual.php" class="nav_link active"> <i class="fa-regular fa-calendar-days"></i><span class="nav_name">Jadual Guru Bertugas/span> </a>
                <a href="display_pdf.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">MC/Time Slip Pelajar</span> </a>  
                 </div>
            </div> <a href="logout.php" class="nav_link "> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Log Keluar</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100" style="background-color:aliceblue;">
    <div class="text-center">
          <img src="images/logoremove.png" alt="Logo" width="250" height="85" class="img-fluid">
        <img src="images/logo2remove.png" alt="Logo" width="260" height="100" class="img-fluid">
</div>
<div class="container">
<?php
      $select = mysqli_query($conn, "SELECT * FROM `loginadmin` WHERE id = '$id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
<p class="display-4 text-center"> JADUAL GURU BERTUGAS</p>
    
    <div class="col-12">
        <div class="row">
            <div class="col-md-6">
            <form autocomplete="off" action="" method="post" enctype="multipart/form-data">

  <div class="mb-3 ">
  <input type="file"  name="update_image" class="box form-control" accept="image/jpg, image/jpeg, image/png">
</div>
  <input type="submit" value="MUAT NAIK" name="update_jadual" class="btn btn-primary btn-lg btn-block">
<div class="mt-3">
<p>Kembali ke <a href="dashboard.php">halaman utama</a></p>
    </div>
   </div>

</form>
        <div class="col-md-6">
	   <div class="gallery">
        <p class="display-6">PAPARAN GAMBAR</p>
        
    <?php
         $select = mysqli_query($conn, "SELECT * FROM `loginadmin` WHERE id = '$id'") or die('query failed');
         d($select);
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img class="img-fluid " src="images/default-avatar.png" width="900" height="800">';
         }else{
            echo '<img class="img-fluid " width="900" height="800" src="uploaded_img/'.$fetch['image'].'">';
            
         }
      ?>
	</div>
    </div></div></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
    $(document).ready(function(){
      
      $("#submit").click(function(e){
      	e.preventDefault();

      	let form_data = new FormData();
      	let img = $("#myImage")[0].files;
 
        // Check image selected or not
        if(img.length > 0){
        	form_data.append('my_image', img[0]);

        	$.ajax({
        		url: 'upload.php',
        		type: 'post',
        		data: form_data,
        		contentType: false,
                processData: false,
                success: function(res){
                	const data = JSON.parse(res);

                	if (data.error != 1) {
                       let path = "uploads/"+data.src;
                       $("#preImg").attr("src", path);
                       $("#preImg").fadeOut(1).fadeIn(1000);
                       $("#myImage").val('');

                	}else {
                		$("#errorMs").text(data.em);
                	}
                }

        	});
         
        }else {
           $("#errorMs").text("Please select an image.");
        }
      });
        
    });
	</script>
</body>
</html>
<?php include(COMPONENTS_DIR . "/footer.php");?>