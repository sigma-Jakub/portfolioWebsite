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
                        if($row["role"] == "admin") {
                            $_SESSION["display"] = "admin";
                            header("Location: index.php");
                        } elseif($row["role"] == "visitor") {
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
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <label for="un">Username</label>
        <input type="text" name="un" id="un">
        <label for="ps">Password</label>
        <input type="text" name="pw" id="pw">
        <input type="submit" name="submit" id="submit">
    </form>
    <?php
        echo $errorMessage;
    ?>
</body>
</html>