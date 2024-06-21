<?php
// Include the dbConnector file and use the classes namespace
require_once 'classes/dbConnector.php';

use classes\DbConnector;

// Create a new instance of the DbConnector class
$db = new DbConnector();
$conn = $db->getConnection();

// Fetch videography items from the database
$sql = "SELECT * FROM videography";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thilina Rathnayaka | Portfolio</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- Css from new template -->
    <link rel="stylesheet" href="css/style2.css"/>

</head>

<body>
    <!-- Page Preloader -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__nav__option">
                        <nav class="header__nav__menu mobile-menu">
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <li><a href="./photography.php">Photography</a></li>
                                <li class="active"><a href="./videography.php">Videography</a></li>
                                <li><a href="./about.php">About</a></li>
                                <li><a href="./contact.php">Contact</a></li>
                            </ul>
                        </nav>
                        <div class="header__nav__social">
                            <a href="https://www.facebook.com/thilinarathnayakaofficial?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a>
                            <a href="https://x.com/ThilinaR011?t=dpk1pfjFmIeBHUCCq55mqQ&s=09"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/thilina011?igsh=ZnlpZ2thejVveXl5"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UCLumlhlKMxeXpA6OPdNyhvA"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Work</h2>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Home</a>
                            <span>Videography | Editing</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Portfolio Section Begin -->
    <section class="portfolio spad">
        <div class="container">
            <div class="row portfolio__gallery">
                <!-- Fetch and display videography items dynamically -->
                <?php
                if ($result->rowCount() > 0) {
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col-lg-4 col-md-6 col-sm-6 mix branding">';
                        echo '<div class="portfolio__item">';
                        echo '<div class="portfolio__item__video set-bg" data-setbg="uploads/' . $row["image"] . '">';
                        echo '<a href="' . $row["url"] . '" class="play-btn video-popup"><i class="fa fa-play"></i></a>';
                        echo '</div>';
                        echo '<div class="portfolio__item__text">';
                        echo '<h4>' . $row["title"] . '</h4>';
                        echo '<ul>';
                        echo '<li>' . $row["subtitle"] . '</li>';
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "No videos found.";
                }
                ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination__option">
                        <a href="#" class="arrow__pagination left__arrow"><span class="arrow_left"></span> Prev</a>
                        <a href="#" class="number__pagination">1</a>
                        <a href="#" class="number__pagination">2</a>
                        <a href="#" class="arrow__pagination right__arrow">Next <span class="arrow_right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer__top__logo">
                            <a href="#"><img src="img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer__top__social">
                            <a href="https://www.facebook.com/thilinarathnayakaofficial?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a>
                            <a href="https://x.com/ThilinaR011?t=dpk1pfjFmIeBHUCCq55mqQ&s=09"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/thilina011?igsh=ZnlpZ2thejVveXl5"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UCLumlhlKMxeXpA6OPdNyhvA"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
