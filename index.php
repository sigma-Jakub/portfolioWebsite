<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakub Mazur &vert; Home</title>
    <link rel="icon" href="images/general/porfolio-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/general.css">
    <script src="scripts/graduation.js"></script>
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
            <div class="hero-container">
                <p class="hero-text">
                    <span class="hero-break"> Hi, </span>  
                    <span class="hero-break"> I'm <span class="blue-highlight">Jakub</span> </span> 
                    <span class="hero-break"> NHL Stenden </span> 
                    <span class="hero-break"> <span class="blue-highlight">Information </span> <span class="blue-highlight">Technology</span> </span>
                    <span class="hero-break"> undergraduate </span>
                </p>
                <img class="hero-img" src="images/home/home-img.jpeg" alt="my-picture">
            </div>
            <div class="content-container">
                <p class="welcome-title">
                    Welcome to my portfolio!
                </p>
                <p class="welcome-text">
                    This website is a collection of my school and professional work. 
                    By sharing my projects and assignments, I want to show the hard work and growth that drive my passion for IT. 
                    I invite you to explore my work, and I hope you will come back often to see how my skills and projects continue to improve.
                </p>
            </div>
            <div class="index-info-grid">
                <div class="info-container">
                    <div class="info-padding">
                        <p class="info-title">
                            Bachelor of Science ETA
                        </p>
                        <div class="timer-container">
                            <p id="timer"></p>
                        </div>
                    </div>
                </div>
                <div class="info-container">
                    <div class="info-padding">
                        <p class="info-title">
                            Quick Access Links
                        </p>
                        <div class="links-container">
                            <a href="files.php?id=1">
                                <div class="quick-link">
                                    <img class="quick-link-img" src="images/home/website-icon.png" alt="website-icon">
                                    <p class="quick-link-year">year 1</p>
                                    <p class="quick-link-text">Web Dev</p>
                                </div>
                            </a>
                            <a href="files.php?id=2">
                                <div class="quick-link">
                                    <img class="quick-link-img" src="images/home/server-icon.png" alt="server-icon">
                                    <p class="quick-link-year">year 1</p>
                                    <p class="quick-link-text">DB Eng</p>
                                </div>                              
                            </a>
                            <a href="files.php?id=3">
                                <div class="quick-link">
                                    <img class="quick-link-img" src="images/home/robot-icon.png" alt="robot-icon">
                                    <p class="quick-link-year">year 1</p>
                                    <p class="quick-link-text">Battlebots</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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