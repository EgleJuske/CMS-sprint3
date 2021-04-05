<?php
$appPathArray = explode('\\', getcwd());
$appName = strtolower(end($appPathArray));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>404 error</title>
</head>

<body>
  <div class="error-placeholder">
    <h1>404</h1>
    <div>Looks like this page is missing. Don't worry tough, our best main is on the case.</div>
    <div>Meanwhile, why don't try again by going</div><br>
    <?php
    echo '<a class="btn" href="/' . $appName . '">Back home</a>';
    ?>
  </div>
</body>

</html>