<?php
    session_start();

    if(!isset($_SESSION["display"])) {
        header("Location: denied.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakub Mazur &vert; About</title>
    <link rel="icon" href="images/general/porfolio-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/about.css">
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
            <p class="page-title">About</p>
            <div class="main-container">
                <div class="main-left-section">
                    <img class="about-img" src="images/about/about-img.png" alt="my-pic">
                </div>
                <div class="main-right-section">
                    <p class="info-text"><span class="info-title">Full Name: </span>Jakub Mazur</p>
                    <p class="info-text"><span class="info-title">Age: </span>20</p>
                    <p class="info-text"><span class="info-title">Location: </span>Emmen, Netherlands</p>
                    <p class="info-text"><span class="info-title">Role: </span>Student</p>
                    <p class="info-text"><span class="info-title">Nationality: </span>Polish</p>
                </div>
            </div>
            <div class="about-info-grid">
                <div class="content-container">
                    <p class="content-title">Technical Skills</p>
                    <ul class="content-list">
                        <li class="content-text"><span class="list-item-title">Frontend</span>HTML, CSS, JavaScript</li>
                        <li class="content-text"><span class="list-item-title">Backend</span>PHP, SQL, Python, Java</li>
                        <li class="content-text"><span class="list-item-title">Tools</span>Figma, GitHub, VS Code, Docker, phpMyAdmin, Useberry</li>
                    </ul>
                </div>
                <div class="content-container">
                    <p class="content-title">Education</p>
                    <ul class="content-list">
                        <li class="content-text"><span class="list-item-title">Highschool</span>II Liceum Ogólnokształcące im. J. Śniadeckiego w Kielcach (2020 - 2024)</li>
                        <li class="content-text"><span class="list-item-title">Higher Education</span>NHL Stenden University of Applied Sciences (2025 - present)</li>
                    </ul>
                </div>
                <div class="content-container">
                    <p class="content-title">Work Experience</p>
                    <ul class="content-list">
                        <!-- <li class="content-text">Lorem ipsum, dolor sit amet consectetur</li>
                        <li class="content-text">Lorem ipsum, dolor sit amet consectetur</li> -->
                    </ul>
                </div>
                <div class="content-container">
                    <p class="content-title">Projects</p>
                    <ul class="content-list">
                        <li class="content-text"><span class="list-item-title">Personal Portfolio</span>(HTML, CSS, PHP, SQL, JavaScript)</li>
                        <li class="content-text"><span class="list-item-title">Bug Reporter Tool</span>(HTML, CSS, PHP, SQL)</li>
                    </ul>
                </div>
                <div class="content-container">
                    <p class="content-title">Certifications</p>
                    <ul class="content-list">
                        <li class="content-text"><span class="list-item-title">"Python 3: From Beginner to Expert" (2024)</span>instructor: Arkadiusz Włodarczyk</li>
                        <li class="content-text"><span class="list-item-title">"Pre Security Learning Path" (2023)</span>instructors: Ashu Savani, Ben Spring</li>
                    </ul>
                </div>
                <div class="content-container">
                    <p class="content-title">Known Languages</p>
                    <ul class="content-list">
                        <li class="content-text"><span class="list-item-title">Polish</span>Native</li>
                        <li class="content-text"><span class="list-item-title">English</span>Upper-intermediate - IELTS 7.0 (2025)</li>
                        <li class="content-text"><span class="list-item-title">German</span>Basic</li>
                    </ul>
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