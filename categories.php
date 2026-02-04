<?php
    session_start();

    if(!isset($_SESSION["display"])) {
        header("Location: denied.php");
    }

    if(!isset($_GET["id"])) {
        $id = $_GET["id"];
    }

    // function showModule($id, $mod1, $mod2, $mod3, $mod4) {
    //     echo '
    //         <a href="module.php?id=' . $id . '">' . $mod1 . '</a>
    //         <a href="module.php?id=' . $id + 1 . '">' . $mod2 . '</a>
    //         <a href="module.php?id=' . $id + 2 . '">' . $mod3 . '</a>
    //         <a href="module.php?id=' . $id + 3 . '">' . $mod4 . '</a>
    //     ';
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>