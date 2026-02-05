<?php
    session_start();
    include "dbHandler.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];

        validateInput();

        header("Location: files.php?id=" . $id . "");
        exit();
    }

    if(!empty($_GET["id"])) {
        $id = $_GET["id"];
    } elseif(!empty($_POST["id"])) {
        $id = $_POST["id"];
    } else {
        header("Location: 404page.php");
    }

    if(!isset($_SESSION["display"])) {
        header("Location: denied.php");
    }

    if(!in_array($id, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11])) {
        header("Location: 404page.php");
    }

    function showGuestTable($id) {
        global $dbHandler;

        if($dbHandler) {
            try {
                $stmt = $dbHandler->prepare("SELECT * FROM `file` WHERE `module` = :id ORDER BY `title`;");
                $stmt->bindParam("id", $id, PDO::PARAM_STR);
                $stmt->execute();
                $results = $stmt->fetchall(PDO::FETCH_ASSOC);

                echo '            
                <table>
                    <th>Title</th>
                    <th>Description</th>
                    <th>View</th>
                    <th>Save</th>
                ';

                foreach($results as $result) {
                    echo '
                        <tr>
                            <td>' . $result["title"] . '</td>
                            <td>' . $result["description"] . '</td>
                            <td>
                                <a href="files/' . $result["filePath"] . '" target="_blank">
                                    <img src="images/files/view-icon.png" alt="view-icon" class="file-img">
                                </a>
                            </td>
                            <td>
                                <a href="files/' . $result["filePath"] . '" download>
                                    <img src="images/files/download-icon.png" alt="download-icon" class="file-img">
                                </a>
                            </td>
                        </tr>
                    ';
                }

                echo '</table>';

            } catch(Exception $ex) {
                echo $ex;
            }
        }
    }

    function showAdminTable($id) {
        global $dbHandler;

        if($dbHandler) {
            try {
                $stmt = $dbHandler->prepare("SELECT * FROM `file` WHERE `module` = :id ORDER BY `title`;");
                $stmt->bindParam("id", $id, PDO::PARAM_STR);
                $stmt->execute();
                $results = $stmt->fetchall(PDO::FETCH_ASSOC);

                echo '            
                <table>
                    <th>Title</th>
                    <th>Description</th>
                    <th>View</th>
                    <th>Save</th>
                    <th>Access</th>
                ';

                foreach($results as $result) {
                    echo '
                        <tr>
                            <td>' . $result["title"] . '</td>
                            <td>' . $result["description"] . '</td>
                            <td>
                                <a href="files/' . $result["filePath"] . '" target="_blank">
                                    <img src="images/files/view-icon.png" alt="view-icon" class="file-img">
                                </a>
                            </td>
                            <td>
                                <a href="files/' . $result["filePath"] . '" download>
                                    <img src="images/files/download-icon.png" alt="download-icon" class="file-img">
                                </a>
                            </td>
                            <td>' . $result["access"] . '</td>
                        </tr>
                    ';
                }

                echo '</table>';

            } catch(Exception $ex) {
                echo $ex;
            }
        }
        echo '
            <div class="table-container">
                <form action="' . $_SERVER["PHP_SELF"] . '" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id" id="id" value="' .  $id . '">

                    <div class="file-wrapper">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div class="file-wrapper">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description">
                    </div>
                    <div class="file-wrapper">
                        <label for="access">Access</label>
                        <div class="access-container">
                            <label for="everyone">everyone</label>
                            <input type="radio" name="accessName" value="everyone" checked>
                            <label for="supervisor">supervisors</label>
                            <input type="radio" name="accessName" value="supervisors">
                            <label for="student">students</label>
                            <input type="radio" name="accessName" value="students">
                        </div>
                    </div>
                    <div class="file-wrapper">
                        <label for="module">Module</label>
                        <select name="module" id="module">
                            <option value="1">Web Dev</option>
                            <option value="2">DB Eng</option>
                            <option value="3">Project Battlebot</option>
                            <option value="4">Project Innovate</option>
                            <option value="5">OOP2</option>
                            <option value="6">Data Processing</option>
                            <option value="7">Software Quality</option>
                            <option value="8">App Dev</option>
                            <option value="9">Internship</option>
                            <option value="10">Applied AI</option>
                            <option value="11">Graduation</option>
                        </select>
                    </div>
                    <div class="file-wrapper">
                        <label for="file">File</label>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="file-wrapper">
                        <input type="submit" name="submit" id="submit" value="Add File">
                    </div>
                </form>
            </div>
        ';   
    }

    function validateInput() {
        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $desc = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $access = filter_input(INPUT_POST, "accessName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $module = filter_input(INPUT_POST, "module", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $fname = $_FILES["file"]["name"];
        $tmp = $_FILES["file"]["tmp_name"];
        $error = $_FILES["file"]["error"];

        $allowedExt = ["application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];

        if(empty($title) || empty($desc) || empty($access) || empty($module) || !empty($error)) {
            echo '<p class="error">Fill up all the inputs.</p>';
        } else {
            $of = finfo_open(FILEINFO_MIME_TYPE);
            $uploadedExt = finfo_file($of, $tmp);

            if(!in_array($uploadedExt, $allowedExt)) {
                echo '<p class="error">Only PDF or DOCX files may be uploaded.</p>';
            } else {
                if($uploadedExt == "application/pdf") {
                    uploadFile($title, $desc, $access, $fname, $module, $tmp);
                } elseif($uploadedExt == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
                    uploadFile($title, $desc, $access, $fname, $module, $tmp);
                }
            }
        }
    }

    function uploadFile($title, $desc, $access, $fname, $module, $tmp) {
        global $dbHandler;

        if($dbHandler) {
            try {
                $stmt = $dbHandler->prepare("INSERT INTO `file`(`title`, `description`, `access`, `filePath`, `module`) VALUES(:title, :desc, :access, :filePath, :module);");
                $stmt->bindParam("title", $title, PDO::PARAM_STR);
                $stmt->bindParam("desc", $desc, PDO::PARAM_STR);
                $stmt->bindParam("access", $access, PDO::PARAM_STR);
                $stmt->bindParam("filePath", $fname, PDO::PARAM_STR);
                $stmt->bindParam("module", $module, PDO::PARAM_STR);
                $stmt->execute();
        
                move_uploaded_file($tmp, "files/" . $fname . "");

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
    <title>Jakub Mazur &vert; Files</title>
    <link rel="icon" href="images/general/porfolio-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/files.css">
    <link rel="stylesheet" href="styles/general.css">
</head>
<body>
    <div class="navbar">
        <div class="header-container">
            <a href="index.php">
                <img src="images/general/porfolio-logo.png" class="logo-img" alt="jm-logo">
            </a>
            <div class="header-buttons">
                <a href="index.php" class="header-button">Home</a>
                <a href="portfolio.php" class="header-button">Portfolio</a>
                <a href="about.php" class="header-button">About</a>
            </div>
            <div class="login-container">
                <?php
                    if(!isset($_SESSION["display"])) {
                        echo '<a href="login.php" class="login-button">Log in</a>';
                    } else {
                        echo '<a href="logout.php" class="login-button">Log out</a>';
                        echo '<p class="logged-label">Logged as: ' . $_SESSION["display"] . '</p>';
                    }
                ?>
            </div>
        </div>
        <hr class="divider">
    </div>
    <div class="content">
        <div class="content-wrapper">
            <p class="page-title">Files</p>
            <div class="table-container">
                <?php
                    if($_SESSION["display"] == "guest") {
                        showGuestTable($id);
                    } elseif($_SESSION["display"] == "admin") {
                        showAdminTable($id);
                    }
                ?>
            </div>
            <div class="module-back-container">
                <a href="portfolio.php" class="module-back-button">Back To Portfolio</a>
            </div>
        </div>
    </div>
    <div class="footer">
        <hr class="divider">
        <div class="footer-container">
            <div class="footer-left-section">
                <p class="footer-title">Jakub Mazur</p>
                <p class="footer-subtext">"It always could be worse"</p>
                <p class="footer-copyright">&copy; <?php echo date("Y"); ?> Jakub Mazur. All rights reserved.</p>
            </div>
            <div class="footer-middle-section">
                <a href="images/general/banana-cat.png" class="footer-middle-title" target="_blank">Designed & Coded with &lt;3</a>
            </div>
            <div class="footer-right-section">
                <p class="footer-title">Get in Touch</p>
                <div class="footer-socials-container">
                    <a class="a-profile" href="https://www.linkedin.com/in/jakub-mazur-39a1aa376/" target="_blank">
                        <img class="footer-img" src="images/general/linkedin-logo.png" alt="linkedin-profile">
                    </a>
                    <a class="a-profile" href="https://github.com/sigma-Jakub" target="_blank">
                        <img class="footer-img" src="images/general/github-logo.png" alt="github-profile">
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>