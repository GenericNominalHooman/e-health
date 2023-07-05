<!DOCTYPE html>
<html>
<head>
  <title>Student Hospital Visit Form</title>
</head>
<body>
  <h1>Student Hospital Visit Form</h1>
  
  <form action="next_page.php" method="post">
    <label for="reasons">Reason:</label><br>
    <textarea id="reasons" name="reasons" rows="4" cols="50"></textarea><br><br>
    
    <label for="time">Time:</label><br>
    <select id="time" name="time">
      <option value="9.00 am">9.00 AM</option>
      <option value="3.00 pm">3.00 PM</option>
      <option value="custom">Custom</option>
    </select><br><br>
    
    <div id="custom-time-field" style="display: none;">
      <label for="custom-time">Custom Time:</label><br>
      <input type="text" id="custom-time" name="custom-time"><br><br>
    </div>
    
    <input type="submit" value="Submit">
  </form>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var timeSelect = document.getElementById("time");
      var customTimeField = document.getElementById("custom-time-field");

      timeSelect.addEventListener("change", function() {
        if (timeSelect.value === "custom") {
          customTimeField.style.display = "block";
        } else {
          customTimeField.style.display = "none";
        }
      });
    });
  </script>
</body>
</html>
