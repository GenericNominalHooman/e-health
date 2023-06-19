 <?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/hospital/site_config.php");
?>
<?php
require_once(COMPONENTS_DIR."/header.php");
// Import site config
require_once(COMPONENTS_DIR."/sidebar2.php");
// Import footer
require_once(COMPONENTS_DIR."/footer.php");
?>
<script>
    // Sidebar icons
    $(document).ready(function(){
        // Pelajar(sidebar item)
        const linkDataLoginPelajar = {
            url: <?php echo("'".PELAJAR_URL."/login.php'");?>,
            name: 'Login Pelajar',
            icon_class: 'bxs-user',
        };
        const linkLoginPelajar = new NavLink(linkDataLoginPelajar);
        const linkLoginPelajarHTML = linkLoginPelajar.render();

        // Pentadbir(sidebar item)
        const linkDataLoginPentadbir = {
            url: <?php echo("'".ADMIN_URL."/login.php'");?>,
            name: 'Login Pentadbir',
            icon_class: 'bxs-user',
        };
        const linkLoginPentadbir = new NavLink(linkDataLoginPentadbir);
        const linkLoginPentadbirHTML = linkLoginPentadbir.render();
        
        // Warden(sidebar item)
        const linkDataLoginWarden = {
            url: <?php echo("'".WARDEN_URL."/login.php'");?>,
            name: 'Login Warden',
            icon_class: 'bxs-user',
        };
        const linkLoginWarden = new NavLink(linkDataLoginWarden);
        const linkLoginWardenHTML = linkLoginWarden.render();

        // Guru(sidebar item)
        const linkDataLoginGuru = {
            url: <?php echo("'".GURU_URL."/login.php'");?>,
            name: 'Login Guru',
            icon_class: 'bxs-user',
        };
        const linkLoginGuru = new NavLink(linkDataLoginGuru);
        const linkLoginGuruHTML = linkLoginGuru.render();

        // Render all sidebar items
        $(".nav_list").html(linkLoginPentadbirHTML+linkLoginWardenHTML+linkLoginGuruHTML+linkLoginPelajarHTML);
    });
</script>