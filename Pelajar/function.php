<?php

require_once(COMPONENTS_DIR."/config.php");

	
function query($sql) {
	global $conn;
	$result = mysqli_query($conn, $sql);

	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}

	return $rows;
}







/*require_once(COMPONENTS_DIR."/config.php");
//date untk papar formate tertentu
    //echo date("l, d-m-y");
    //time
   // echo time();
function query ($query){
    global $conn;
    $result=mysqli_query($conn, $query);
    $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
        }
        return $rows;
        }

function cari($keyword){
    $query="SELECT * FROM janjitemu
    WHERE nokp LIKE '%$keyword%'";
return query($query);

}*/?>