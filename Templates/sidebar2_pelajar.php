<?php
    // Import site config
    require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
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
         // Utama
         const linkDataHome = {
             url: <?php echo ("'" . PELAJAR_URL . "/login.php'"); ?>,
             name: 'Utama',
             icon_class: 'bx bx-home',
         };
         const linkHome = new NavLink(linkDataHome);
         const linkHomeHTML = linkHome.render();

         // Profil
         const linkDataProfil = {
             url: <?php echo ("'" . ADMIN_URL . "/login.php'"); ?>,
             name: 'Profil',
             icon_class: 'bx bx-user-circle',
         };
         const linkProfil = new NavLink(linkDataProfil);
         const linkProfilHTML = linkProfil.render();

         // Janjitemu
         const linkDataJanjiTemu = {
             url: <?php echo ("'" . WARDEN_URL . "/login.php'"); ?>,
             name: 'Janji Temu',
             icon_class: 'bx bx-list-ol',
         };
         const linkJanjiTemu = new NavLink(linkDataJanjiTemu);
         const linkJanjiTemuHTML = linkJanjiTemu.render();

          // Sign out
          const linkDataSignOut = {
             url: <?php echo ("'" . PELAJAR_URL . "/logout.php'"); ?>,
             name: 'Log Keluar',
             icon_class: 'bx bx-log-out',
         };
         const linkSignOut = new NavLink(linkDataSignOut);
         const linkSignOutHTML = linkSignOut.render();
         
         // Render all sidebar items
        $(".nav_list").html(linkHomeHTML + linkProfilHTML + linkJanjiTemuHTML);
        //  Render signout
        $("#nav_logout").html(linkSignOutHTML);
     });
 </script>
 <!-- END SIDEBAR COMPONENT CONFIGURATION -->
