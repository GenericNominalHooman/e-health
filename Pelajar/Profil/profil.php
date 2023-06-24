<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// Import header
require_once(COMPONENTS_DIR . "/header.php");
?>
<?php
// Import sidebar
require_once(COMPONENTS_DIR . "/config.php");
$databaseObj = new Database();
$conn = $databaseObj->getConnection();
?>
<?php
// Import pelajar sidebar template
require_once(TEMPLATE_DIR . "/sidebar2_pelajar.php");
?>
<!-- Content Here -->
<style>
    /* User Profile Card styling */
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    * {
        padding: 0;
        margin: 0;
        font-family: 'Poppins', sans-serif
    }

    .container-profile-form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-profile {
        width: 100%;
        height: 750px;
        overflow-y: scroll;
        background-color: #fff;
        box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .card-profile .info {
        padding: 15px;
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #e1dede;
        background-color: #e5e5e5
    }

    .card-profile .info button {
        height: 30px;
        width: 80px;
        border: none;
        color: #fff;
        border-radius: 4px;
        background-color: #000;
        cursor: pointer;
        text-transform: uppercase
    }

    .card-profile .forms {
        padding: 15px
    }

    .card-profile .inputs {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px
    }

    .card-profile .inputs span {
        font-size: 12px
    }

    .card-profile .inputs input {
        height: 40px;
        padding: 0px 10px;
        font-size: 17px;
        box-shadow: none;
        outline: none
    }

    .card-profile .inputs input[type="text"][readonly] {
        border: 2px solid rgba(0, 0, 0, 0)
    }

    .card__img {
        height: 116px;
        width: 116px;
        border-radius: 50%;
        background-color: white;
        margin: 0 auto 15px;
        border: 4px solid var(--primary-color);
        overflow: hidden;
        transition: 0.4s;
        transform: translateY(25px);
        background-color: #e1dede;
    }
</style>
<style>
    /* Side navigatrion menu styling */
    .mt-50 {

        margin-top: 50px;
    }

    .mb-50 {

        margin-bottom: 50px;
    }


    a {
        text-decoration: none !important;
    }


    .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .1875rem;
    }

    .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .nav-sidebar .nav-link {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: start;
        align-items: flex-start;
        padding: .75rem 1.25rem;
        transition: background-color ease-in-out .15s, color ease-in-out .15s;
    }

    .header-elements-inline {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
    }

    .nav-sidebar {
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .bg-teal {
        background-color: #007bff;
        color: #fff;
        border-radius: 1px;
    }


    .bg-teal:hover {
        color: #fff;
        background-color: #007bffb5;
    }

    .sidebar-light .nav-sidebar .nav-link {
        color: rgba(51, 51, 51, .85);
    }

    .badge {
        display: inline-block;
        padding: .3125rem .375rem;
        font-size: 75%;
        font-weight: 500;
        color: #fff;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .125rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .nav-sidebar .nav-link i {
        margin-right: 1.25rem;
        margin-top: .12502rem;
        margin-bottom: .12502rem;
        top: 0;
    }

    .nav-link {
        color: rgba(51, 51, 51, .85);
    }

    .nav-link:not(.disabled):hover {
        color: #333;
        background-color: #f5f5f5;
    }


    [class^=fa] {

        font-style: normal;
        font-weight: 400;
        font-variant: normal;
        text-transform: none;
        line-height: 1;
        min-width: 1em;
        display: inline-block;
        text-align: center;
        font-size: 1rem;
        vertical-align: middle;
        position: relative;
        top: -1px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .nav-sidebar .nav-link {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: start;
        align-items: flex-start;
        padding: .75rem 1.25rem;
        transition: background-color ease-in-out .15s, color ease-in-out .15s;
    }

    .nav-sidebar .nav-item-header {
        padding: .75rem 1.25rem;
        margin-top: .5rem;
    }

    .nav-link {
        display: block;
        padding: .75rem 1.25rem;
    }
</style>
<div class="container-xxl justify-content-center align-items-start">
    <div class="row">
        <div class="col-12 col-md-6 mt-4">
            <div class="container-profile-form">
                <div class="card-profile">
                    <div class="info"> <span>Edit form</span> <button id="savebutton">edit</button> </div>
                        <script>
                            class ProfileInfoManager {
                                constructor(data) {
                                    this.title = data.title;
                                    this.data = data.data;
                                }

                                render() {
                                    return "<div class='inputs'>"+
                                            "<span>" + this.title + "</span>"+
                                            "<input type='text' readonly value='"+this.data+"'>"+
                                        "</div>";
                                }
                            }
                            let userProfileArray = null;
                            let userLoginArray = null;
                        </script>

                        <?php
                        // Import model & config
                        require_once(COMPONENTS_DIR . "/config.php");
                        require_once(COMPONENTS_DIR . "/models.php");
                        require_once(COMPONENTS_DIR . "/auth.php");
                        $dbObj = new Database();
                        $profilModel = new ProfilModel($dbObj->getConnection());
                        $authObj = new Auth($dbObj->getConnection());
                        // Check whether current user has been authenthicated
                        if ($authObj->isAuth()) {
                            d($_SESSION["Auth"]);
                            $userProfile = $profilModel->getAllPelajarWhere("id_login", $_SESSION["Auth"]["id"]);

                            echo("
                                <script>
                                    userProfileArray = JSON.parse('".json_encode($userProfile)."');
                                    userLoginArray = JSON.parse('".json_encode($_SESSION['Auth'])."');
                                </script>
                            ");
                        }                        
                        ?>

                        <script>
                            console.log(userProfileArray);
                        if(userProfileArray != null && userLoginArray != null){
                                // Instansiate ProfileInfoManager
                                let nama = new ProfileInfoManager({
                                    title : 'Nama',
                                    data : userLoginArray['nama'],
                                });
                                let gambarLocation = new ProfileInfoManager({
                                    title : 'Location Gambar Profil',
                                    data : userLoginArray['gambarprofilpelajar'],
                                });
        
                                // Render user profile
                                $(document).ready(function(){
                                    console.log(nama.render());
                                    $('.forms').html(nama.render()+gambarLocation.render());
                                });
                        }
                        </script>
                    <div class="forms">
                        <div class="inputs">
                            <div class="card__img d-flex justify-content-center align-items-center">
                                <img src="https://phongvu.vn/cong-nghe/wp-content/uploads/2019/09/img_7866.jpg" alt="nhan" width="100%" height="auto">
                            </div>
                        </div>
                        <div class='inputs'>
                            <span>Nama</span>
                            <input type='text' readonly value='Nama Pengguna'>
                        </div>
                        <div class="inputs">
                            <span>No Kad Pengenalan</span>
                            <input type="text" readonly value="Doe">
                        </div>
                        <div class="inputs">
                            <span>No Matrik</span>
                            <input type="text" readonly value="john.doe12@gmail.com">
                        </div>
                        <div class="inputs">
                            <span>Dorm</span>
                            <input type="text" readonly value="johndoe12">
                        </div>
                        <div class="inputs">
                            <span>No Telefon</span>
                            <input type="text" readonly value="United States">
                        </div>
                        <div class="inputs">
                            <span>Nama Bapa</span>
                            <input type="text" readonly value="United States">
                        </div>
                        <div class="inputs">
                            <span>No Telefon Bapa</span>
                            <input type="text" readonly value="United States">
                        </div>
                        <div class="inputs">
                            <span>Nama Ibu</span>
                            <input type="text" readonly value="United States">
                        </div>
                        <div class="inputs">
                            <span>No Telefon Ibu</span>
                            <input type="text" readonly value="United States">
                        </div>
                        <div class="inputs">
                            <span>Alamat Rumah</span>
                            <input type="text" readonly value="United States">
                        </div>
                        <div class="inputs">
                            <span>Penyakit Kronik</span>
                            <input type="text" readonly value="United States">
                        </div>
                        <div class="inputs">
                            <span>Alahan</span>
                            <input type="text" readonly value="United States">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mt-4">
            <div class="container-fluid d-flex justify-content-center">

                <div class="card w-100">
                    <div class="card-header bg-transparent header-elements-inline">
                        <span class="card-title mt-3 font-weight-normal">Navigasi Halaman</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="nav nav-sidebar mb-2">
                            <!-- Halaman -->
                            <li class="nav-item">
                                <a href="<?php echo (SITE_URL . "/index.php"); ?>" class="nav-link nav-item-header" data-abc="true">
                                    <i class='bx bx-home'></i>
                                    Utama
                                </a>
                            </li>

                            <!-- Profil -->
                            <li class="nav-item">
                                <a href="<?php echo (PELAJAR_URL . "/Profil/profil.php"); ?>" class="nav-link nav-item-header" data-abc="true">
                                    <i class='bx bx-user-circle'></i>
                                    Profil
                                </a>
                            </li>

                            <!-- Janji Temu -->
                            <li class="nav-item-header">Janji Temu</li>
                            <li class="nav-item">
                                <a href="<?php echo (PELAJAR_URL . "/JanjiTemu/janji_temu_buat.php"); ?>" class="nav-link" data-abc="true">
                                    <i class='bx bxs-plus-circle'></i>
                                    Buat Janji Temu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo (PELAJAR_URL . "/JanjiTemu/janji_temu_urus.php"); ?>" class="nav-link" data-abc="true">
                                    <i class='bx bx-list-ol'></i>
                                    Urus Janji Temu
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var savebutton = document.getElementById('savebutton');
    var readonly = true;
    var inputs = document.querySelectorAll('input[type="text"]');
    savebutton.addEventListener('click', function() {

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].toggleAttribute('readonly');
        };

        if (savebutton.innerHTML == "edit") {
            savebutton.innerHTML = "save";
        } else {
            savebutton.innerHTML = "edit";
        }
    });
</script>
<!-- End Content -->
<?php
// Import footer
require_once(COMPONENTS_DIR . "/footer.php");
?>