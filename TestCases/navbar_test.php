<script>
    let navbarManagerObj = new NavbarManager();
    navbarManagerObj.addTitle("Navigasi Halaman");
    navbarManagerObj.addListHeader("Utama");
    navbarManagerObj.addListItem("bx bx-home", '<?php echo (SITE_URL . "/index.php"); ?>', "Utama");
    navbarManagerObj.render("navbar");
</script>