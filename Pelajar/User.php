<?php 

function getUserById($id_pelajar, $db){
    $sql = "SELECT * FROM user_form WHERE id_pelajar = ?";
	$stmt = $db->prepare($sql);
	$stmt->execute([$id_pelajar]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        return $user;
    }else {
        return 0;
    }
}

 ?>