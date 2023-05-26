
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
	
    <title>Admin Panel</title>
</head>

<body>

    <div class="side-menu">
        <div class="brand-name">
            <h1>Dashboard</h1>
        </div>
        <ul>
            <li><a href="adminpanel.php"> <span>Dashboard</a></span></li>

            <li><a href="maklumatpelajar.php"><span>Maklumat Pelajar</a></span></li>

            <li><a href="uploadjadul.php"><span>Jadual Guru Bertugas</a></span> </li>
            
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="search.png" alt=""></button>
                </div>
                <div class="user">
                   <!-- <a href="#" class="btn">Add New</a>
                    <img src="notifications.png" alt="">
                    <div class="img-case">
                        <img src="user.png" alt="">
                    </div>-->
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">

					<h1><?php 
						include"config.php";
						$dash_category_query = "SELECT * FROM user_form";
						$dash_category_query_run = mysqli_query($conn, $dash_category_query);
						if($category_total = mysqli_num_rows($dash_category_query_run)){
							echo "$category_total";
						}else {
							echo "No Data";
						}
						
						?></h1>
                        <h3>Pelajar Berdaftar</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/pelajar.jpg" alt="" >
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php 
						include"config.php";
						$dash_category_query = "SELECT * FROM janjitemu WHERE status='rejected'";
						$dash_category_query_run = mysqli_query($conn, $dash_category_query);
						if($category_total = mysqli_num_rows($dash_category_query_run)){
							echo "$category_total";
						}else {
							echo "No Data";
						}
						
						?></h1>
                        <h3>Bilangan Pelajar  Yang Memohon Ke Hospital pada harini</h3>
						
						
                    </div>
                    <div class="icon-case">
                        <img src="img/pelajar.jpg" alt="" >
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <h1><?php 
						include"config.php";
						$dash_category_query = "SELECT * FROM janjitemu WHERE status='pending'";
						$dash_category_query_run = mysqli_query($conn, $dash_category_query);
						
						if($category_total = mysqli_num_rows($dash_category_query_run)){
							echo "$category_total";
						}else {
							echo "No Data";
						}
						
						
						?></h1>
						
						
                        <h3>Bilangan pelajar yang Telah Mendapat Pengesahan</h3>
						
						
                    </div>
                    <div class="icon-case">
                       <img src="img/jadua.png" alt="" width="40" height="40">
                    </div>
                </div>
				
				<div class="card">
                    <div class="box">
                       <h1><?php 
						include"config.php";
						$dash_category_query = "SELECT * FROM janjitemu WHERE status='Accepted'";
						$dash_category_query_run = mysqli_query($conn, $dash_category_query);
						
						if($category_total = mysqli_num_rows($dash_category_query_run)){
							echo "$category_total";
						}else {
							echo "No Data";
						}
						
						
						?></h1>
                        <h3>Bilangan Pelajar yang Telah Mendapat Pengesahan</h3>
						
						
                    </div>
                    <div class="icon-case">
                       <img src="img/jadua.png" alt="" width="40" height="40">
                    </div>
                </div>
				
				<div class="card">
                    <div class="box">
                        <h1>53</h1>
                        <h3>Bilangan pelajar Yang Telah Ditolak</h3>
                    </div>
                    <div class="icon-case">
                       <img src="img/jadua.png" alt="" width="40" height="40">
                    </div>
                </div>
				
                <!--<div class="card">
                    <div class="box">
                        <h1>5</h1>
                        <h3>Schools</h3>
                    </div>
                    <div class="icon-case">
                        <img src="schools.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>350000</h1>
                        <h3>Income</h3>
                    </div>
                    <div class="icon-case">
                        <img src="income.png" alt="">
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                       <!-- <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>-->
                   <table>
				
		
		<tr>
		
			<?php include "urus.php";?>
			<!--<input type ="button" name="approve" value="approve"/>-->
		
                        <!--<tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>


<tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Students</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>option</th>
                        </tr>
                        <tr>
                            <td><img src="user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>-->

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>