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
    <title>Jakub Mazur &vert; Portfolio</title>
    <link rel="icon" href="images/general/porfolio-logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/portfolio.css">
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
            <p class="page-title">Portfolio</p>
            <div class="year-container-grid">
                <a href="modules.php?id=1" class="year-container">
                    <span class="year-title">Year 1</span>
                    <span class="year-description">
                        "In your first year, you explore the different aspects of Information Technology and establish a solid foundation as a software engineer. 
                        The programme consists of four periods, each covering a different topic. 
                        You will work in small groups on practical assignments, 
                        supported throughout the year by academic staff and your study career coach, who will help you to develop your professional skills."
                    </span>
                </a>
                <a href="modules.php?id=2" class="year-container">
                    <span class="year-title">Year 2</span>
                    <span class="year-description">
                        "In your second year, you apply your foundational knowledge in AI-driven projects for real organisations, 
                        learning how AI can improve user experiences and optimise business processes. Collaborating with clients, 
                        you create digital solutions with immediate impact, such as AI-enhanced applications or data-driven insights."
                    </span>
                </a>
                <a href="modules.php?id=3" class="year-container">
                    <span class="year-title">Year 3</span>
                    <span class="year-description">
                        "In your third year, you focus on your development as a professional. 
                        You'll do a five-month internship and then select a minor that matches your ambitions, 
                        giving your study a personal direction and enhancing your career prospects."
                    </span>
                </a>
                <a href="modules.php?id=4" class="year-container">
                    <span class="year-title">Year 4</span>
                    <span class="year-description">
                        "In your final year, you'll demonstrate that you are ready for a career as an AI-specialised software professional. 
                        You will work on a major Applied AI project and complete your graduation assignment, 
                        applying your skills to real challenges such as improving user experiences or automating business processes."
                    </span>
                </a>
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