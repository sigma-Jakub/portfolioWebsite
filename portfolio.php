<?php
    session_start();

    if(!isset($_SESSION["display"])) {
        header("Location: denied.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="categories.php">Year 1</a>
</body>
</html>