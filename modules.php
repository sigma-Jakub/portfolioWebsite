<?php
    session_start();

    $id = $_GET["id"];

    if(!isset($_SESSION["display"])) {
        header("Location: denied.php");
    }

    if(!in_array($id, [1, 2, 3, 4])) {
        header("Location: 404page.php");
    }

    if($id == 1) {
        $module1 = '<a href="files.php?id=1" class="module-container">Web Development & Design</a>';
        $module2 = '<a href="files.php?id=2" class="module-container">Database Engineering</a>';
        $module3 = '<a href="files.php?id=3" class="module-container">Project Battlebot</a>';
        $module4 = '<a href="files.php?id=4" class="module-container">Project Innovate</a>';
    } elseif($id == 2) {
        $module1 = '<a href="files.php?id=5" class="module-container">Object-Oriented Programming 2</a>';
        $module2 = '<a href="files.php?id=6" class="module-container">Data Processing</a>';
        $module3 = '<a href="files.php?id=7" class="module-container">Software Quality</a>';
        $module4 = '<a href="files.php?id=8" class="module-container">App Development</a>';
    } elseif($id == 3) {
        $module1 = '<a href="files.php?id=9" class="module-container">Internship</a>';
        $module2 = '<a href="files.php?id=69" class="module-container">PLACEHOLDER</a>';
        $module3 = '<a href="files.php?id=69" class="module-container">PLACEHOLDER</a>';
        $module4 = '<a href="files.php?id=69" class="module-container">PLACEHOLDER</a>';
    } elseif($id == 4) {
        $module1 = '<a href="files.php?id=10" class="module-container">Applied AI</a>';
        $module2 = '<a href="files.php?id=11" class="module-container">Graduation</a>';
        $module3 = '<a href="files.php?id=111" class="module-container">PLACEHOLDER</a>';
        $module4 = '<a href="files.php?id=111" class="module-container">PLACEHOLDER</a>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakub Mazur &vert; Modules</title>
    <link rel="icon" href="images/general/porfolio-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/modules.css">
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
            <p class="page-title"><span class="blue-highlight">Year <?php echo $id ?></span></p>
            <div class="module-container-grid">
                <?php
                    echo $module1;
                    echo $module2;
                    echo $module3;
                    echo $module4;
                ?>
            </div>
            <div class="back-container">
                <a href="portfolio.php" class="back-button">Back To Portfolio</a>
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