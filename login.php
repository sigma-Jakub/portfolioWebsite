<?php
    session_start();

    $errorMessage = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $errorMessage = validateData();
    }

    function validateData() {
        $un = filter_input(INPUT_POST, "un", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pw = filter_input(INPUT_POST, "pw");

        if(empty($un) || empty($pw)) {
            return "<p class='error'>Both inputs must be filled up.</p>";
        } else {
            require_once("dbHandler.php");
            if($dbHandler) {
                try {
                    $stmt = $dbHandler->prepare("SELECT * FROM `user` WHERE `username` = :un AND `password` = :pw;");
                    $stmt->bindParam("un", $un, PDO::PARAM_STR);
                    $stmt->bindParam("pw", $pw, PDO::PARAM_STR);
                    $stmt->execute();

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if($row) {
                        if($row["permission"] == "admin") {
                            $_SESSION["display"] = "admin";
                            header("Location: index.php");
                        } elseif($row["permission"] == "student") {
                            $_SESSION["display"] = "student";
                            header("Location: index.php");
                        } elseif($row["permission"] == "lecturer") {
                            $_SESSION["display"] = "lecturer";
                            header("Location: index.php");
                        } elseif($row["permission"] == "guest") {
                            $_SESSION["display"] = "guest";
                            header("Location: index.php");
                        }
                    } else {
                        return "<p class='error'>Invalid username or password.</p>";
                    }
                } catch(Exception $ex) {
                    echo $ex;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakub Mazur &vert; Login</title>
    <link rel="icon" href="images/general/porfolio-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/general.css">
</head>
<body>
    <div class="login-container">
        <p class="page-title">Login</p>
        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <div class="login-wrapper">
                    <label for="un">Username</label>
                    <input type="text" name="un" id="un">
                </div>
                <div class="login-wrapper">
                    <label for="ps">Password</label>
                    <input type="password" name="pw" id="pw">
                </div>
                <div class="login-wrapper">
                    <input type="submit" name="submit" id="submit" value="Log in">
                    <a href="index.php" class="bth-button">Back To Home</a>
                </div>
            </form>
        </div>
        <?php
            echo $errorMessage;
        ?>
    </div>
</body>
</html>