<?php
// Import site config
require_once($_SERVER["DOCUMENT_ROOT"] . "/e-health/site_config.php");
?>

<!-- CONTENT START -->
<?php
  require_once (COMPONENTS_DIR."/models.php");

  $dbObj = new Database();
  $profilModel = new ProfilModel($dbObj->getConnection());
  $loginModel = new LoginModel($dbObj->getConnection());

  $dataProfilPelajar = $profilModel->getAllPelajar();
  $dataLoginPelajar = $loginModel->getAllPelajar();
?>
<table>
  <tr>
    <th>Checkbox</th>
    <th>Row</th>
    <th>Student Name</th>
    <th>KP Number</th>
    <th>Matrix Number</th>
    <th>Dorm</th>
    <th>Student Phone Number</th>
    <th>Father's Phone Number</th>
    <th>Mother's Name</th>
    <th>Mother's Phone Number</th>
    <th>Address</th>
    <th>Actions</th>
  </tr>
  <?php 
  d($dataProfilPelajar);
  foreach($dataProfilPelajar as $key=>$row): ?>
    <tr id="<?php echo $row['matrix_number'] . $row['nokp']; ?>">
      <td><input type="checkbox" class="checkbox"></td>
      <td><?php echo $key+1; ?></td>
      .
      .
      <!-- Add other fields here -->
      .
      .
      <td>
        <button class="btn-view">View</button>
        <button class="btn-delete">Delete</button>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    // Single row selection
    $("button.btn-view").click(function() {
      var rowID = $(this).closest('tr').attr('id'); 
      var url = "detailsPage.php"; 
      $.post(url, {'selected_id': rowID}, function(response) {
        // handle response
      });
    });
    
    $("button.btn-delete").click(function() {
      var rowID = $(this).closest('tr').attr('id'); 
      var url = "deletePage.php"; 
      $.post(url, {'selected_id': rowID}, function(response) {
        location.reload(); // Refresh the page
      });
    });

    // Multiple row selection
    $("input[type='checkbox'].checkbox").change(function(){
      var checked = $("input[type='checkbox'].checkbox:checked").length > 0;
      $("#btn-view-top, #btn-delete-top").prop('disabled', !checked);
    });

    $("#btn-view-top").click(function(){
      var selectedIDs = {};
      $("input[type='checkbox'].checkbox:checked").each(function(){
        selectedIDs[$(this).closest('tr').attr('id')] = true;
      });
      var url = "detailsPage.php";
      $.post(url, {'selected_ids': selectedIDs}, function(response){
        // handle response
      });
    });

    $("#btn-view-top").click(function(){
      var selectedIDs = {};
      $("input[type='checkbox'].checkbox:checked").each(function(){
        selectedIDs[$(this).closest('tr').attr('id')] = true;
      });
      var url = "deletePage.php";
      $.post(url, {'selected_ids': selectedIDs}, function(response){
        location.reload(); // Refresh the page
      });
    });
  });
</script>
<!-- CONTENT END -->