<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
    require_once(COMPONENTS_DIR . "/header.php");
    require_once(COMPONENTS_DIR . "/config.php");
    require_once(COMPONENTS_DIR . "/auth.php");
    require_once(COMPONENTS_DIR . "/models.php");
    
    // Display sidebar based on user type
    $dbObj = new Database();
    $authObj = new Auth($dbObj->getConnection());
    if($authObj->isAuth()){ // User has logged in
        $userAuth = $_SESSION["Auth"];
        switch($userAuth["jenispengguna"]){
            case "pelajar":
                // Import peljar sidebar template
                require_once(TEMPLATE_DIR . "/sidebar2_pelajar.php");
                break;
            case "pentadbir":
                // Import pentadbir sidebar template
                require_once(TEMPLATE_DIR . "/sidebar2_pentadbir.php");
                break;
            case "warden":
                // Import warden sidebar template
                require_once(TEMPLATE_DIR . "/sidebar2_warden.php");
                break;
            case "guru":
                // Import guru sidebar template
                require_once(TEMPLATE_DIR . "/sidebar2_guru.php");
            break;
        }
    }else{ // User hasn't logged in
        // Import guest sidebar template
        require_once(TEMPLATE_DIR . "/sidebar2_guest.php");
    }
?>
    
<!-- CONTENT -->
<div class="container-xxl m-4 p-4 rounded shadow-lg bg-primary-custom">
    <div class="container-fluid p-4">
        <h2>Jadual Guru & Warden Bertugas</h2>
        <hr>
        <!--BEGIN SLICK CAROUSEL SLIDER-->
        <div class="items p-4 m-4">
        <?php
require_once(COMPONENTS_DIR . "/jadual_carousel.php");
require_once(COMPONENTS_DIR . "/models.php");

$jadualModel = new JadualModel($dbObj->getConnection());
$slideshowManager = new SlideshowManager();
$slideshowManager->addImage(UPLOADS_URL."/jadual"."/".$jadualModel->getAllGuru("id_gambar", sizeof($jadualModel->getAllGuru())+1)[0]["gambar"]); // Jadual guru
$slideshowManager = new SlideshowManager();
$slideshowManager->addImage(UPLOADS_URL."/jadual"."/".$jadualModel->getAllWardenWhere("id_gambar", sizeof($jadualModel->getAllWarden()))[0]["gambar"]); // Jadual warden
// $slideshowManager->addImage(); // Jadual pemandu
?>
</div>
        <script>
            // Slickify the slideshow
            $(document).ready(function() {
                $('.items').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            });
        </script>
        <!-- END SLICK CAROUSEL SLIDER -->
    </div>
</div>
<div class="m-4 p-4 container-xxl justify-content-center align-items-center bg-primary-custom shadow-lg rounded">
    <div class="row p-4">
        <h2>Info Semasa</h2>
        <hr>
    </div>
    <div class="row">
        <?php
            require(COMPONENTS_DIR . "/status_card_janjitemu_dibenarkan.php");
            require(COMPONENTS_DIR . "/status_card_janjitemu_diproses.php");
        ?>
    </div>
    <div class="row mt-4">
        <?php
            require_once(COMPONENTS_DIR . "/table.php");
        ?>
        <script>
            // TABLE CONFIGURATION
            <?php
                // Fetch janji temu data from db
                require_once(COMPONENTS_DIR . "/models.php");
                require_once(COMPONENTS_DIR . "/config.php");
                $conn = new Database();
                $janjitemuModel = new JanjitemuModel($conn->getConnection());
                $janjitemuRows = $janjitemuModel->getAllJanjitemuColumns(["namapelajar", "programjtpelajar", "waktujtpelajar", "tarikhjtpelajar", "sebabjt", "status"]);
                // Converts janjitemupelajar entries into JSON so that it can be parsed by JS
                $janjitemuRowsJSON = json_encode($janjitemuRows);
            ?>
            // Convert the janjitemu JSON entries to JS array
            const tableData = JSON.parse('<?php echo ($janjitemuRowsJSON); ?>');

            // Create <th> and <td> based on the tableData array
            const tableManager = new TableContentManager(tableData);

            // Replace the content of janjitemu table with tableManager.render()
            $(document).ready(function() {
                $("#table_janjitemu").html(tableManager.render());
            });

            // Create datatable from the #table_janjitemu table so that it can have data table features(pagination&search)
            $(document).ready(function() {
                $('#table_janjitemu').DataTable();
            });
            // END TABLE CONFIGURATION
        </script>
    </div>
</div>
<!-- END CONTENT -->

<?php
    // Import footer
    require_once(COMPONENTS_DIR . "/footer.php");
?>
