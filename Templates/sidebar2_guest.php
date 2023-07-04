<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
?>
<?php
// Table dependent on header component
require_once(COMPONENTS_DIR . "/header.php");
// Import sidebar components
require_once(COMPONENTS_DIR . "/sidebar2.php");
?>
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
             url: <?php echo ("'" . PENTADBIR_URL . "/login.php'"); ?>,
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
