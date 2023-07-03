<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// Import verification
require_once(COMPONENTS_DIR . "/verification.php");
// Import header
require_once(COMPONENTS_DIR . "/header.php");
// Import profile image manager
require_once(COMPONENTS_DIR . "/profile_image_manager.php");
// Import models
require_once(COMPONENTS_DIR . "/models.php");
// Import message handler
require_once(COMPONENTS_DIR . "/message_handler.php");
// Import config
require_once(COMPONENTS_DIR . "/config.php");
// Import pelajar sidebar template
require_once(TEMPLATE_DIR . "/sidebar2_pelajar.php");
?>

<!-- CONTENT BEGIN -->
<?php
// Declaring Global Variables
$messageHandlerObj = new MessageHandler();
$databaseObj = new Database();
$conn = $databaseObj->getConnection();
?>

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
        background-color: var(--bs-body-bg);
    }

    .card-profile .info button {
        height: 30px;
        width: auto;
        padding: 4px;
        border: none;
        color: #fff;
        border-radius: 4px;
        background-color: #172065;
        cursor: pointer;
        text-transform: uppercase
    }

    .card-profile .forms {
        background-color: var(--bs-body-bg);
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
<style>
    /* Alert Message */
    .container {

        margin-top: 100px;
    }



    .alert.alert-general {
        background: #d9d9d9
    }

    .alert.alert-help {
        background: #91e3fd
    }

    .alert.alert-error {
        background: #f6bcc3
    }

    .alert .close,
    .info-box .close {
        filter: alpha(opacity=100);
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        -moz-opacity: 1;
        -khtml-opacity: 1;
        opacity: 1;
        font-weight: normal;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
        text-shadow: none;
        float: none;
        position: absolute;
        top: 8px;
        right: 8px
    }

    .close:before {
        content: "\f00d";
        font-family: FontAwesome
    }

    .fa {
        color: #fff;
    }

    /* End Alert Message */
</style>
<!-- Alert Message -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- MESSAGE HANDLER BACKEND BEGIN -->
            <!-- Container to display error message -->
            <div id="errorMessageContainer">
            </div>
            <!-- Handle failed login attempt -->
            <div class="col-md-6 mb-4">
                <?php
                if (isset($_POST["msg"])) {
                    $message = $_POST["msg"];
                    $messageHandlerObj->addMessage("error", $message);
                }
                ?>
            </div>
            <!-- MESSAGE HANDLER BACKEND ENDS -->
        </div>
    </div>
</div>
<!-- End Alert Message -->
<!-- User Profile & Navigation Menu -->
<div class="container-xxl justify-content-center align-items-start">
    <div class="row">
        <div class="col-12 col-md-6 mt-4">
            <div class="container-profile-form">
                <div class="card-profile">
                    <div class="info"> <span>Profil</span> <button id="savebutton">Kemaskini</button> </div>

                    <!-- PROFILE INFO MANAGER BEGINS -->
                    <script>
                        let userProfileArray = null;
                        let userLoginArray = null;
                    </script>

                    <?php
                    // Profile manager backend
                    // Import model & config
                    require_once(COMPONENTS_DIR . "/config.php");
                    require_once(COMPONENTS_DIR . "/models.php");
                    require_once(COMPONENTS_DIR . "/auth.php");
                    $dbObj = new Database();
                    $profilModel = new ProfilModel($dbObj->getConnection());
                    $authObj = new Auth($dbObj->getConnection());
                    // Check whether current user has been authenthicated
                    if ($authObj->isAuth()) {
                        // Fetches appropiate user profile page for addiitonal user information
                        $userProfile = $profilModel->getAllPelajarWhere("id_login", $_SESSION["Auth"]["id"]);

                        // Check whether the current user has filled out its own profile page credentials
                        if (empty($userProfile)) {
                            $messageHandlerObj->addMessage("help", "Anda perlu melengkapkan senarai maklumat peribadi anda sebelum boleh membuat temu janji.");
                        }

                        echo ("
                                <script>
                                    userProfileArray = JSON.parse('" . json_encode($userProfile) . "');
                                    userLoginArray = JSON.parse('" . json_encode($_SESSION['Auth']) . "');
                                </script>
                            ");
                    }
                    ?>

                    <script>
                        // JS class to handle rendition of userProfle and userLogin info to the frontend
                        class ProfileInfoManager {
                            constructor(data) {
                                this.post_name = data.post_name;
                                this.title = data.title;
                                this.data = data.data;
                            }

                            renderImage() {
                                return "<div class='inputs'>" +
                                    "<div class='card__img d-flex justify-content-center align-items-center'>" +
                                    "<img src='" + this.data + "' alt='Gambar Profil' width='100%' height='auto'>" +
                                    "</div>" +
                                    "</div>";
                            }

                            renderImageInput() {
                                return "<div class='inputs d-none' id='gambarProfilBaru'>" +
                                    "<span>" + this.title + "</span>" +
                                    "<input class='input_field' type='file' name='" + this.post_name + "' value='" + this.data + "' readonly='readonly'>" +
                                    "</div>";
                            }

                            render() {
                                return "<div class='inputs'>" +
                                    "<span>" + this.title + "</span>" +
                                    "<input class='input_field' type='text' name='" + this.post_name + "' value='" + this.data + "' readonly='readonly'>" +
                                    "</div>";
                            }

                            renderForgotPassword(url) {
                                return "<div class='inputs'>" +
                                    "<a href='" + url + "'>Tukar kata laluan</a>" +
                                    "</div>";
                            }
                        }

                        function rerenderProfile(verificationObj) {
                            if (!verificationObj.isEmpty(userLoginArray)) { // User has registered
                                // Instansiate ProfileInfoManager & render basic user information(user hasn't completed the profile page yet)
                                let nama = new ProfileInfoManager({
                                    title: 'Nama',
                                    post_name: 'nama',
                                    data: userLoginArray['nama'],
                                });
                                <?php
                                // Instansiating profile image manager object for gambarLocation & gambarInput
                                $dbObj = new Database();
                                $loginModel = new LoginModel($dbObj->getConnection());
                                $profileImageManger = new ProfileImageManager($loginModel);
                                ?>
                                let gambarLocation = new ProfileInfoManager({
                                    title: 'Gambar Profil',
                                    post_name: 'gambar_profil',
                                    data: '<?php echo (UPLOADS_URL . "/profile_images" . "/" . $profileImageManger->getProfileImage("pelajar", $_SESSION["Auth"]["id"])); ?>',
                                });
                                let gambarInput = new ProfileInfoManager({
                                    title: 'Gambar Profil(Muat Naik)',
                                    post_name: 'gambar_profil_baru',
                                    data: "",
                                });

                                let profileHTML = gambarLocation.renderImage() + gambarInput.renderImageInput() + nama.render();

                                // User has completed user profile information
                                if (!verificationObj.isEmpty(userProfileArray)) {
                                    let no_kp = new ProfileInfoManager({
                                        title: 'No Kad Pengenalan',
                                        post_name: 'no_kad_pengenalan',
                                        data: userProfileArray[0]['nokp'],
                                    });
                                    let no_matrik = new ProfileInfoManager({
                                        title: 'No Matrik',
                                        post_name: 'no_matrik',
                                        data: userProfileArray[0]['nomatrikpelajar'],
                                    });
                                    let dorm = new ProfileInfoManager({
                                        title: 'Dorm',
                                        post_name: 'dorm',
                                        data: userProfileArray[0]['dorm'],
                                    });
                                    let no_telefon_pelajar = new ProfileInfoManager({
                                        title: 'No Telefon',
                                        post_name: 'no_telefon',
                                        data: userProfileArray[0]['notelpelajar'],
                                    });
                                    let nama_bapa = new ProfileInfoManager({
                                        title: 'Bapa',
                                        post_name: 'bapa',
                                        data: userProfileArray[0]['namabapapelajar'],
                                    });
                                    let no_telefon_bapa = new ProfileInfoManager({
                                        title: 'No Telefon Bapa',
                                        post_name: 'no_telefon_bapa',
                                        data: userProfileArray[0]['notelbapapelajar'],
                                    });
                                    let nama_ibu = new ProfileInfoManager({
                                        title: 'Ibu',
                                        post_name: 'ibu',
                                        data: userProfileArray[0]['namaibupelajar'],
                                    });
                                    let no_telefon_ibu = new ProfileInfoManager({
                                        title: 'No Telefon Ibu',
                                        post_name: 'no_telefon_ibu',
                                        data: userProfileArray[0]['notelibupelajar'],
                                    });
                                    let penyakit_pelajar = new ProfileInfoManager({
                                        title: 'Penyakit Kronik',
                                        post_name: 'penyakit',
                                        data: userProfileArray[0]['penyakitpelajar'],
                                    });
                                    let alamat = new ProfileInfoManager({
                                        title: 'Alamat Rumah',
                                        post_name: 'alamat_rumah',
                                        data: userProfileArray[0]['alamatpelajar'],
                                    });
                                    let alahan_pelajar = new ProfileInfoManager({
                                        title: 'Alahan',
                                        post_name: 'alahan',
                                        data: userProfileArray[0]['alahan'],
                                    });

                                    // Add additional elements to render
                                    profileHTML += no_kp.render() + no_matrik.render() + dorm.render() + no_telefon_pelajar.render() + nama_bapa.render() + no_telefon_bapa.render() + nama_ibu.render() + no_telefon_ibu.render() + penyakit_pelajar.render() + alamat.render() + alahan_pelajar.render();
                                }else{ // Empty placeholder field for users to fill out
                                    let no_kp = new ProfileInfoManager({
                                        title: 'No Kad Pengenalan',
                                        post_name: 'no_kad_pengenalan',
                                        data: '123',
                                    });
                                    let no_matrik = new ProfileInfoManager({
                                        title: 'No Matrik',
                                        post_name: 'no_matrik',
                                        data: '213',
                                    });
                                    let dorm = new ProfileInfoManager({
                                        title: 'Dorm',
                                        post_name: 'dorm',
                                        data: '123',
                                    });
                                    let no_telefon_pelajar = new ProfileInfoManager({
                                        title: 'No Telefon',
                                        post_name: 'no_telefon',
                                        data: '123',
                                    });
                                    let nama_bapa = new ProfileInfoManager({
                                        title: 'Bapa',
                                        post_name: 'bapa',
                                        data: 'Bapa 1',
                                    });
                                    let no_telefon_bapa = new ProfileInfoManager({
                                        title: 'No Telefon Bapa',
                                        post_name: 'no_telefon_bapa',
                                        data: '123',
                                    });
                                    let nama_ibu = new ProfileInfoManager({
                                        title: 'Ibu',
                                        post_name: 'ibu',
                                        data: 'Ibu 1',
                                    });
                                    let no_telefon_ibu = new ProfileInfoManager({
                                        title: 'No Telefon Ibu',
                                        post_name: 'no_telefon_ibu',
                                        data: '123',
                                    });
                                    let penyakit_pelajar = new ProfileInfoManager({
                                        title: 'Penyakit Kronik',
                                        post_name: 'penyakit',
                                        data: 'Penyakit 1',
                                    });
                                    let alamat = new ProfileInfoManager({
                                        title: 'Alamat Rumah',
                                        post_name: 'alamat_rumah',
                                        data: 'Alamat 1',
                                    });
                                    let alahan_pelajar = new ProfileInfoManager({
                                        title: 'Alahan',
                                        post_name: 'alahan',
                                        data: 'Alahan 1',
                                    });

                                    // Add additional elements to render
                                    profileHTML += no_kp.render() + no_matrik.render() + dorm.render() + no_telefon_pelajar.render() + nama_bapa.render() + no_telefon_bapa.render() + nama_ibu.render() + no_telefon_ibu.render() + penyakit_pelajar.render() + alamat.render() + alahan_pelajar.render();

                                }

                                // Render as HTML
                                $(document).ready(function() {
                                    $('.forms').html(profileHTML);
                                });
                            }
                        }

                        // Render profile
                        let verificationObj = new Verification();
                        rerenderProfile(verificationObj);
                    </script>
                    <!-- PROFILE INFO MANAGER ENDS -->
                    <form action="profil_kemaskini.php" method="post" enctype="multipart/form-data" id="uploadProfil">
                        <div class="forms">
                        </div>
                    </form>
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
                            <li class="nav-item">
                                <a style='color:#172065' href='<?php echo(PELAJAR_URL."/Profil/tukar_kata_laluan.php");?>' class="nav-link">
                                    <i class='bx bxs-key'></i>
                                    Tukar kata laluan
                            </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
?>
<script>
    $(document).ready(function() {
        var savebutton = document.getElementById('savebutton');
        var readonly = true;
        var inputs = document.querySelectorAll('input[type="text"]');
        var fileInput = document.querySelector('input[type="file"]');

        savebutton.addEventListener('click', function(e) {
            // Prevent sending POST form
            e.preventDefault();

            // Frontend: Change text based on savebutton state
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].toggleAttribute('readonly');
            };

            // Toggle upload profile image field when editing
            if (fileInput.parentElement.classList.contains("d-none")) {
                fileInput.parentElement.classList.remove("d-none");
                fileInput.value = "";
            } else {
                fileInput.parentElement.classList.add("d-none");
            }

            if (savebutton.innerHTML == "Kemaskini") {
                savebutton.innerHTML = "Simpan";
            } else {
                savebutton.innerHTML = "Kemaskini";
            }

            // Backend: Create an ppdate query to the database
            if (savebutton.innerHTML == "Kemaskini") {
                // Change id field name to avoid conflicting entry 
                userLoginArray.id_login = userLoginArray.id;
                delete userLoginArray.id;
                // let userLoginProfileArray = null;
                // if(!verificationObj.isEmpty(userProfileArray[0])){
                    userProfileArray[0].id_profil = userProfileArray[0].id;
                    delete userProfileArray[0].id;
                    // Grab old profile data from the database
                    let userLoginProfileArray = {
                        ...userLoginArray,
                        ...userProfileArray[0]
                    };
                // }else{
                //     userLoginProfileArray = {
                //         ...userLoginArray,
                //     };                    
                // }

                // AJAX for updating DB
                console.log(userLoginProfileArray);
                let formData = new FormData($("#uploadProfil")[0]);
                formData.append("profile_data_old", JSON.stringify(userLoginProfileArray));
                $.ajax({
                    url: '<?php echo (PELAJAR_URL . "/Profil/profil_kemaskini.php"); ?>',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(result) {
                        // Reloading the page for reflecting profile iamge changes
                        window.alert(result);
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });


    })
</script>

<!-- MESSAGE HANDLER FRONTEND BEGIN -->
<script>
    let messageHandlerObj = '<?php echo ($messageHandlerObj->getMessagesJSON()); ?>' || null;
    if (messageHandlerObj != null) {
        let messageHandlerJSON = new MessageHandlerJSON(messageHandlerObj);
        messageHandlerJSON.displayMessages("errorMessageContainer");
    }
</script>
<!-- MESSAGE HANDLER FRONTEND END -->

<!-- End Content -->
<?php
// Import footer
require_once(COMPONENTS_DIR . "/footer.php");
?>