<?php
$input_user = array();

if(isset($_POST["name"])) {
    $name = $_POST["name"];
    $h2name = htmlspecialchars($name);
    echo "<h2>$h2name Waddup?</h2>";
    $input_user[] = $h2name;
}


?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Please Enter Your Name</h2>
<form action="index.php" method="POST">
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name"><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>