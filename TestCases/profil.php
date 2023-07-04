<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/header.php");;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<h2>Profile Upload</h2>

<form id="uploadProfile" method="post" enctype="multipart/form-data">
    Image: <br> <input type="file" id="image" name="image" required><br>
    NOKP: <br> <input type="number" id="nokp" name="nokp" required><br>
    Nomatrik Pelajar: <br> <input type="number" id="nomatrikpelajar" name="nomatrikpelajar" required><br>
    Dorm: <br> <input type="number" id="dorm" name="dorm" required><br>
    No Tel Pelajar: <br> <input type="number" id="notelpelajar" name="notelpelajar" required><br>
    Nama Bapa Pelajar: <br> <input type="text" id="namabapapelajar" name="namabapapelajar" required><br>
    No Tel Bapa Pelajar: <br> <input type="number" id="notelbapapelajar" name="notelbapapelajar" required><br>
    Nama Ibu Pelajar: <br> <input type="text" id="namaibupelajar" name="namaibupelajar" required><br>
    No Telp Ibu Pelajar: <br> <input type="number" id="notelibupelajar" name="notelibupelajar" required><br>
    Penyakit Pelajar: <br> <input type="text" id="penyakitpelajar" name="penyakitpelajar" required><br>
    Alamat Pelajar: <br> <textarea id="alamatpelajar" name="alamatpelajar" required> </textarea><br>
    Alahan: <br> <input type="text" id="alahan" name="alahan" required><br>
    <input type="submit" value="Submit">
</form>

<script>
    $(document).ready(function () {
    $('#uploadProfile').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'post',
            url: 'profil_kemaskini.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(response) {
                alert(response);
            }
        });
    });
});
</script> <!-- jQuery Script -->

</body>
</html>
