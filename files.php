<?php
    session_start();

    $id = $_GET["id"];

    if(!isset($_SESSION["display"])) {
        header("Location: denied.php");
    }

    if(!in_array($id, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11])) {
        header("Location: 404page.php");
    }

    function showGuestTable($id) {
        require_once("dbHandler.php");
        if($dbHandler) {
            try {
                $stmt = $dbHandler->prepare("SELECT * FROM `file` WHERE `module` = :id ORDER BY `title`;");
                $stmt->bindParam("id", $id, PDO::PARAM_STR);
                $stmt->execute();
                $results = $stmt->fetchall(PDO::FETCH_ASSOC);

                foreach($results as $result) {
                    echo '
                        <tr>
                            <td>' . $result["title"] . '</td>
                            <td>' . $result["description"] . '</td>
                            <td><a href="files/' . $result["filePath"] . '" target="_blank">View</a></td>
                            <td><a href="files/' . $result["filePath"] . '" download>Download</a></td>
                        </tr>
                    ';
                }
            } catch(Exception $ex) {
                echo $ex;
            }
        }
    }

    function showAdminTable($id) {
        require_once("dbHandler.php");
        if($dbHandler) {
            try {
                $stmt = $dbHandler->prepare("SELECT * FROM `file` WHERE `module` = :id ORDER BY `title`;");
                $stmt->bindParam("id", $id, PDO::PARAM_STR);
                $stmt->execute();
                $results = $stmt->fetchall(PDO::FETCH_ASSOC);

                foreach($results as $result) {
                    echo '
                        <tr>
                            <td>' . $result["title"] . '</td>
                            <td>' . $result["description"] . '</td>
                            <td><a href="files/' . $result["filePath"] . '" target="_blank">View</a></td>
                            <td><a href="files/' . $result["filePath"] . '" download>Download</a></td>
                        </tr>
                    ';
                }
            } catch(Exception $ex) {
                echo $ex;
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
    <table>
        <th>Title</th>
        <th>Description</th>
        <th>View</th>
        <th>Save</th>
        <?php
            if($_SESSION["display"] == "guest") {
                showGuestTable($id);
            } elseif($_SEESION["admin"] == "admin") {
                showAdminTable($id);
            }
        ?>
    </table>
</body>
</html>