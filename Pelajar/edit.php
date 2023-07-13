<?php
include "config.php";
if(isset($_POST['submit']))
{
    $id_janjitemu = mysqli_real_escape_string($conn, $_POST['id_janjitemu']);

    $nama = mysqli_real_escape_string($conn, $_POST['name']);
    $nokp = mysqli_real_escape_string($conn, $_POST['nokp']);
    $program = mysqli_real_escape_string($conn, $_POST['program']);
    $tahun = mysqli_real_escape_string($conn, $_POST['tahun']);
    $waktu = mysqli_real_escape_string($conn, $_POST['waktu']);
    $tarikh = mysqli_real_escape_string($conn, $_POST['tarikh']);

    $query = "UPDATE janjitemu SET nama='$nama', nokp='$nokp', program='$program', tahun='$tahun', waktu='$waktu', tarikh='$tarikh' WHERE id_janjitemu='$id_janjitemu' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: update.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: update.php");
        exit(0);
    }
}
    ?>