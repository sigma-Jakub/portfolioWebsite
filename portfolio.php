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
    <div>
        <a href="modules.php?id=1">Year 1</a>
    </div>
    <div>
        <a href="modules.php?id=2">Year 2</a>
    </div>
    <div>
        <a href="modules.php?id=3">Year 3</a>
    </div>
    <div>
        <a href="modules.php?id=4">Year 4</a>
    </div>
</body>
</html>