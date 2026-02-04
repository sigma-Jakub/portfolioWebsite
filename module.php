<?php
    session_start();

    function showGuestTable($module) {
        require_once("dbHandler.php");
        if($dbHandler) {
            try {
                $stmt = $dbHandler->prepare("SELECT * FROM `file` WHERE `module` = :module;");
                $stmt->bindParam("module", $module, PDO::PARAM_STR);
                $stmt->execute();
                $row = $stmt->fetchall(PDO::FETCH_ASSOC);

                foreach($row as $result) {
                    echo 
                    '<tr>
                        <td>' . $result["title"] . '</td>
                        <td>' . $result["description"] . '</td>
                        <td><a href="FILEPATH">VIEW</a></td>
                        <td><a href="FILEPATH">SAVE</a></td>
                    </tr>';
                }
                
            } catch(Exception $ex) {
                echo $ex;
            }
        }
    }

    function showAdminTable($module) {
        require_once("dbHandler.php");
        if($dbHandler) {
            try {
                $stmt = $dbHandler->prepare("SELECT * FROM `file` WHERE `module` = :module;");
                $stmt->bindParam("module", $module, PDO::PARAM_STR);
                $stmt->execute();
                $row = $stmt->fetchall(PDO::FETCH_ASSOC);

                foreach($row as $result) {
                    echo 
                    '<tr>
                        <td>' . $result["title"] . '</td>
                        <td>' . $result["description"] . '</td>
                        <td><a href="FILEPATH">VIEW</a></td>
                        <td><a href="FILEPATH">SAVE</a></td>
                        <td>' . $result["access"] . '</td>
                        <td><a href="FILEPATH">EDIT</a></td>
                    </tr>';
                }
                
            } catch(Exception $ex) {
                echo $ex;
            }
        }
    }

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
    <table>
        <th>Title</th>
        <th>Description</th>
        <th>View</th>
        <th>Save</th>
        <?php
            if($_SESSION["display"] == "admin") {
                // showAdminTable();
            } elseif($_SESSION["display"] == "guest") {
                // showGuestTable();
            }
        ?>
    </table>
</body>
</html>