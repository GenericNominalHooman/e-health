<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health2/site_config.php");
require_once(COMPONENTS_DIR."/header.php");
?>
<div class="container-xxl overflow-auto">
    <table id="table_janjitemu" class="table table-striped table-bordered col-md-12">
    </table>
</div>
<script>
    class TableContentManager {
        constructor(tableData) {
            this.tableData = tableData;
            this.tableHeaderArray = Object.keys(tableData[0]);
        }

        renderTableHeader() {
            let header = '<thead><tr>';
            this.tableHeaderArray.forEach((headerItem) => {
                header += `<th>${headerItem}</th>`;
            });
            header += '</tr></thead>';
            return header;
        }

        renderTableContent() {
            let content = '<tbody>';
            this.tableData.forEach((contentItem) => {
                content += '<tr>';
                this.tableHeaderArray.forEach((headerItem) => {
                    content += `<td>${contentItem[headerItem]}</td>`;
                });
                content += '</tr>';
            });
            content += '</tbody>';
            return content;
        }

        render() {
            const tableHeader = this.renderTableHeader();
            const tableContent = this.renderTableContent();
            return tableHeader + tableContent;
        }
    }
</script>