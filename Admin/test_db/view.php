<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
		}
		.alb {
			width: 200px;
			height: 200px;
			padding: 5px;
		}
		.alb img {
			width: 100%;
			height: 100%;
		}
		a {
			text-decoration: none;
			color: black;
		}
	</style>
</head>
<body>
     <a href="index.php">&#8592;</a>
     <?php
         $select = mysqli_query($conn, "SELECT * FROM `jadual` '") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img class="img-fluid rounded-circle" src="images/default-avatar.png" width="300" height="100">';
         }else{
            echo '<img class="img-fluid rounded-circle" width="150" height="95" src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
</body>
</html>