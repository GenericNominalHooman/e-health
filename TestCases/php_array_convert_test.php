<?php
$phpArray = ['apple', 'banana', 'orange'];
// $jsonString = json_encode($phpArray);
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Array to JavaScript Array</title>
</head>
<body>
  <script>
    // Get the JSON string from PHP and parse it into a JavaScript array
    // var jsArray = JSON.parse(jsonString);
    var jsArray = JSON.parse('<?php echo(json_encode($phpArray))?>');

    // Use the JavaScript array
    console.log(jsArray); // Output: ["apple", "banana", "orange"]
  </script>
</body>
</html>
