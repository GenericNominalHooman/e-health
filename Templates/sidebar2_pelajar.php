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
             url: <?php echo ("'" . PELAJAR_URL . "/utama.php'"); ?>,
             name: 'Utama',
             icon_class: 'bx bx-home',
         };
         const linkHome = new NavLink(linkDataHome);
         const linkHomeHTML = linkHome.render();

         // Profil
         const linkDataProfil = {
             url: <?php echo ("'" . PELAJAR_URL . "/Profil/profil.php'"); ?>,
             name: 'Profil',
             icon_class: 'bx bx-user-circle',
         };
         const linkProfil = new NavLink(linkDataProfil);
         const linkProfilHTML = linkProfil.render();

         // Janjitemu urus
         const linkDataJanjiTemuUrus = {
             url: <?php echo ("'" . PELAJAR_URL . "/JanjiTemu/janji_temu_urus.php'"); ?>,
             name: 'Urus Janji Temu',
             icon_class: 'bx bx-list-ol',
         };
         const linkJanjiTemuUrus = new NavLink(linkDataJanjiTemuUrus);
         const linkJanjiTemuUrusHTML = linkJanjiTemuUrus.render();

         // Janjitemu buat
         const linkDataJanjiTemuBuat = {
             url: <?php echo ("'" . PELAJAR_URL . "/JanjiTemu/janji_temu_buat.php'"); ?>,
             name: 'Buat Janji Temu',
             icon_class: 'bx bx-plus',
         };
         const linkJanjiTemuBuat = new NavLink(linkDataJanjiTemuBuat);
         const linkJanjiTemuBuatHTML = linkJanjiTemuBuat.render();

          // Sign out
          const linkDataSignOut = {
             url: <?php echo ("'" . PELAJAR_URL . "/logout.php'"); ?>,
             name: 'Log Keluar',
             icon_class: 'bx bx-log-out',
         };
         const linkSignOut = new NavLink(linkDataSignOut);
         const linkSignOutHTML = linkSignOut.render();
         
         // Render all sidebar items
        $(".nav_list").html(linkHomeHTML + linkProfilHTML + linkJanjiTemuUrusHTML + linkJanjiTemuBuatHTML);
        //  Render signout
        $("#nav_logout").html(linkSignOutHTML);
     });
 </script>
 <!-- END SIDEBAR COMPONENT CONFIGURATION -->
