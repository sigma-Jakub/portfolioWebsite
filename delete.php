<?php
    session_start();
    
    if($_SESSION["display"] !== "admin") {
        header("Location: 404page.php");
        exit();
    } else {
        $id = $_GET["id"];
        $filePath = "files/";

        require_once("dbHandler.php");
        if($dbHandler) {
            try {
                $stmt = $dbHandler->prepare("SELECT * FROM `file` WHERE `fileId` = :id;");
                $stmt->bindParam("id",  $id, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if(file_exists($filePath . $result["filePath"])) {
                    unlink($filePath . $result["filePath"]);
                }

                $stmt2 = $dbHandler->prepare("DELETE FROM `file` WHERE `fileId` = :id;");
                $stmt2->bindParam("id", $id, PDO::PARAM_INT);
                $stmt2->execute();

                header("Location: portfolio.php");
                exit();
            } catch(Exception $ex) {
                echo $ex;
            }
        }
    }
?>