<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_SESSION["display"])) {
            echo '<a class="login-button" href="login.php">Log in</a>';
        } else {
            echo '<a class="login-button" href="logout.php">Log out</a>';
            echo '<p class="logged-as">Logged as: ' . $_SESSION["display"] . ' </p>';
        }
    ?>
</body>
</html>