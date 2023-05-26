<html>
<head>
<title>URUSAN PELAJAR KE HOSPITAL</title>
<!--<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, {
  text-align: left;
  padding: 20px;
}
th, {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #D6EEEE;
}

</style>-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-HOSPTAL KVG</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>

<div class="container">
<table id="example" class="table table-striped" style="width:100%">
        <thead>
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
		<?php
	include "config.php";
	global $row;
	$query = mysqli_query($conn,"SELECT * FROM janjitemu ");
	
	$numrow = mysqli_num_rows($query);

   if($query){
		
		if($numrow!=0){
			 $cnt=1;

			  while($row = mysqli_fetch_assoc($query)){
				echo "
		<tr>
			<td>$cnt</td>
			<td>{$row['nama']}</td>
			<td>{$row['nokp']}</td>
			<td>{$row['program']}</td>
			<td>{$row['tahun']}</td>
			<td>{$row['waktu']}</td>
			<td>{$row['tarikh']}</td>
			<td>{$row['status']}</td>`
		</tr>";
		$cnt++; }       
	}
}
			
		 ?>
    </tbody>
</table>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>


    <script src= "https://code.jquery.com/jquery-3.5.1.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
		<script src= "https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
		<script src="./js/app.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
                    });
        </script>
</body>
</html>