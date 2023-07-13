<?php
session_start();
if (isset($_SESSION['id_pelajar']) && isset($_SESSION['nokp'])) {
@include 'config.php';
include 'auth.php';
include 'User.php';
$user = getUserById($_SESSION['id_pelajar'], $conn);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if ($user) { ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<div class="shadow w-350 p-3 text-center">
    		
    		     class="img-fluid rounded-circle">
            <h3 class="display-4 "><?=$user['fname']?></h3>
            <a href="edit.php" class="btn btn-primary">
            	Edit Profile
            </a>
             <a href="logout.php" class="btn btn-warning">
                Logout
            </a>
		</div>
    </div>
    <?php }else { 
     header("Location: login.php");
     exit;
    } ?>
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>