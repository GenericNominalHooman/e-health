<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>
<?php
// Import header
require_once(COMPONENTS_DIR . "/header.php");
// Import table
require_once(COMPONENTS_DIR . "/table.php");
?>
<script>
    const tableData = [{
            "Name": "John",
            "Age": 30,
            "City": "New York"
        },
        {
            "Name": "Jane",
            "Age": 25,
            "City": "Los Angeles"
        },
        {
            "Name": "Doe",
            "Age": 28,
            "City": "Chicago"
        },
        {
            "Name": "Iz",
            "Age": 30,
            "City": "TMN"
        }
    ];

    const tableManager = new TableContentManager(tableData);
    console.log(tableManager.render());

    // Replace the content of janjitemu table with tableManager.render()
    $(document).ready(function() {
        $("#table_janjitemu").html(tableManager.render());
    });

    // Create datatable from the #table_janjitemu table
    $(document).ready(function() {
        $('#table_janjitemu').DataTable();
    });
</script>
<?php
// Import footer
require_once(COMPONENTS_DIR . "/footer.php");
?>