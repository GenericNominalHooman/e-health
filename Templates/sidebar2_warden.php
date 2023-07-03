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
         // Utama
         const linkDataHome = {
             url: <?php echo ("'" . WARDEN_URL . "/utama.php'"); ?>,
             name: 'Utama',
             icon_class: 'bx bx-home',
         };
         const linkHome = new NavLink(linkDataHome);
         const linkHomeHTML = linkHome.render();

         // Profil
         const linkDataProfil = {
             url: <?php echo ("'" . WARDEN_URL . "/Profil/profil.php'"); ?>,
             name: 'Profil',
             icon_class: 'bx bx-user-circle',
         };
         const linkProfil = new NavLink(linkDataProfil);
         const linkProfilHTML = linkProfil.render();

        // Janjitemu
        //  PS: ADD JANJI TEMU URUS CHILD ITEM UNDER THIS
         const linkDataJanjiTemu = {
             url: <?php echo ("'" . WARDEN_URL . "/JanjiTemu/janji_temu_urus.php'"); ?>,
             name: 'Urus Janji Temu',
             icon_class: 'bx bx-list-ol',
         };
         const linkJanjiTemu = new NavLink(linkDataJanjiTemu);
         const linkJanjiTemuHTML = linkJanjiTemu.render();

         // Pelajar
         const linkDataUrusPelajar = {
             url: <?php echo ("'" . WARDEN_URL . "/Pelajar/pelajar_urus.php'"); ?>,
             name: 'Urus Pelajar',
             icon_class: 'bx bxs-user',
         };
         const linkUrusPelajar = new NavLink(linkDataUrusPelajar);
         const linkUrusPelajarHTML = linkUrusPelajar.render();

         // Urus Jadual Warden
         const linkDataUrusJadualWarden = {
             url: <?php echo ("'" . WARDEN_URL . "/Jadual/jadual_warden_urus.php'"); ?>,
             name: 'Urus Jadual Warden',
             icon_class: 'bx bx-table',
         };
         const linkUrusJadualWarden = new NavLink(linkDataUrusJadualWarden);
         const linkUrusJadualWardenHTML = linkUrusJadualWarden.render();

          // Sign out
          const linkDataSignOut = {
             url: <?php echo ("'" . WARDEN_URL . "/logout.php'"); ?>,
             name: 'Log Keluar',
             icon_class: 'bx bx-log-out',
         };
         const linkSignOut = new NavLink(linkDataSignOut);
         const linkSignOutHTML = linkSignOut.render();
         
         // Render all sidebar items
        $(".nav_list").html(linkHomeHTML + linkProfilHTML + linkJanjiTemuHTML + linkUrusPelajarHTML + linkUrusJadualWardenHTML);
        //  Render signout
        $("#nav_logout").html(linkSignOutHTML);
     });
 </script>
 <!-- END SIDEBAR COMPONENT CONFIGURATION -->
