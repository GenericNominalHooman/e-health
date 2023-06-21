 <?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
    ?>
 <?php
    require_once(COMPONENTS_DIR . "/header.php");
    // Import sidebar components
    require_once(COMPONENTS_DIR . "/sidebar2.php");
    ?>
 <!-- CONTENT -->
 <div class="container-xxl m-4 p-4 rounded shadow-lg bg-primary-custom">
    <?php
        require_once(COMPONENTS_DIR . "/jadual_carousel.php");
        ?>
 </div>
 <div class="m-4 p-4 container-xxl justify-content-center align-items-center bg-primary-custom shadow-lg rounded">
    <div class="row text-center p-4">
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
            const tableData = JSON.parse('<?php  echo($janjitemuRowsJSON);?>');

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
 <!-- SIDEBAR COMPONENT CONFIGURATION -->
 <script>
     // Sidebar icons
     $(document).ready(function() {
         // Pelajar(sidebar item)
         const linkDataLoginPelajar = {
             url: <?php echo ("'" . PELAJAR_URL . "/login.php'"); ?>,
             name: 'Login Pelajar',
             icon_class: 'bxs-user',
         };
         const linkLoginPelajar = new NavLink(linkDataLoginPelajar);
         const linkLoginPelajarHTML = linkLoginPelajar.render();

         // Pentadbir(sidebar item)
         const linkDataLoginPentadbir = {
             url: <?php echo ("'" . ADMIN_URL . "/login.php'"); ?>,
             name: 'Login Pentadbir',
             icon_class: 'bxs-user',
         };
         const linkLoginPentadbir = new NavLink(linkDataLoginPentadbir);
         const linkLoginPentadbirHTML = linkLoginPentadbir.render();

         // Warden(sidebar item)
         const linkDataLoginWarden = {
             url: <?php echo ("'" . WARDEN_URL . "/login.php'"); ?>,
             name: 'Login Warden',
             icon_class: 'bxs-user',
         };
         const linkLoginWarden = new NavLink(linkDataLoginWarden);
         const linkLoginWardenHTML = linkLoginWarden.render();

         // Guru(sidebar item)
         const linkDataLoginGuru = {
             url: <?php echo ("'" . GURU_URL . "/login.php'"); ?>,
             name: 'Login Guru',
             icon_class: 'bxs-user',
         };
         const linkLoginGuru = new NavLink(linkDataLoginGuru);
         const linkLoginGuruHTML = linkLoginGuru.render();

         // Render all sidebar items
         $(".nav_list").html(linkLoginPentadbirHTML + linkLoginWardenHTML + linkLoginGuruHTML + linkLoginPelajarHTML);
     });
 </script>
 <!-- END SIDEBAR COMPONENT CONFIGURATION -->
 <?php
    // Import footer
    require_once(COMPONENTS_DIR . "/footer.php");
    ?>