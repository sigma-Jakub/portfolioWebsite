<?php
    session_start();

    $id = $_GET["id"];

    if(!isset($_SESSION["display"])) {
        header("Location: denied.php");
    }

    if(!in_array($id, [1, 2, 3, 4])) {
        header("Location: 404page.php");
    }

    function displayModules($id) {

        if($id == 1) {
            echo '
                <div>
                    <div>
                        <a href="files.php?id=1">Web Development & Design</a>
                    </div>
                    <div>
                        <a href="files.php?id=2">Database Engineering</a>
                    </div>
                    <div>
                        <a href="files.php?id=3">Project Battlebot</a>
                    </div>
                    <div>
                        <a href="files.php?id=4">Project Innovate</a>
                    </div>
                </div>
            ';
        } elseif($id == 2) {
            echo '
                <div>
                    <div>
                        <a href="files.php?id=5">Object-Oriented Programming 2</a>
                    </div>
                    <div>
                        <a href="files.php?id=6">Data Processing</a>
                    </div>
                    <div>
                        <a href="files.php?id=7">Software Quality</a>
                    </div>
                    <div>
                        <a href="files.php?id=8">App Development</a>
                    </div>
                </div>
            ';
        } elseif($id == 3) {
            echo '
                <div>
                    <div>
                        <a href="files.php?id=9">Internship</a>
                    </div>
                </div>
            ';
        } elseif($id == 4) {
            echo '
                <div>
                    <div>
                        <a href="files.php?id=10">Applied AI</a>
                    </div>
                    <div>
                        <a href="files.php?id=11">Graduation</a>
                    </div>
                </div>
            ';
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
    <?php
        displayModules($id);
    ?>
</body>
</html>