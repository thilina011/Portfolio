<?php
// Include the database connection file
require_once 'classes/DbConnector.php'; // Adjust the path as per your directory structure

use classes\DbConnector;

// Create an instance of DbConnector
$dbConnector = new DbConnector();

// Function to fetch images from database tables
function fetchImages($dbConnector, $category) {
    $query = "SELECT image FROM $category"; // Assuming image_path is the column name in your database
    $stmt = $dbConnector->executeQuery($query);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

// Fetch images for each category
$categories = ['astro', 'design', 'model', 'nature', 'wedding']; // Adjust categories as per your database table names
$images = [];
foreach ($categories as $category) {
    $images[$category] = fetchImages($dbConnector, $category);
}
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
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <!-- Css from new template -->
    <link rel="stylesheet" href="css/style2.css" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="csss/bootstrap.min.css" />
    <link rel="stylesheet" href="csss/font-awesome.min.css" />
    <link rel="stylesheet" href="csss/magnific-popup.css" />
    <link rel="stylesheet" href="csss/slicknav.min.css" />
    <link rel="stylesheet" href="csss/owl.carousel.min.css" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="csss/style.css" />

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="header__nav__option">
                        <nav class="header__nav__menu mobile-menu">
                            <ul>
                                <li><a href="./index.php">Home</a></li>
                                <li class="active"><a href="./photography.php">Photography</a></li>
                                <li><a href="./videography.php">Videography</a></li>
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
                            <span>Photography</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Portfolio Section -->
    <section class="portfolio-section">
        <div class="container port-container" >
            <div class="portfolio-filter controls text-center">
                <ul>
                    <li class="control" data-filter="all">All</li>
                    <li class="control" data-filter=".nature">Nature</li>
                    <li class="control" data-filter=".studio">Astro</li>
                    <li class="control" data-filter=".weddings">Weddings</li>
                    <li class="control" data-filter=".lifestyle">Model</li>
                    <li class="control" data-filter=".fashion">Design</li>
                </ul>
            </div>

            <div class="row portfolio-gallery">
                <?php
                foreach ($images as $category => $categoryImages) {
                    foreach ($categoryImages as $image) {
                        echo '<div class="mix col-xl-2 col-md-3 col-sm-4 col-6 p-0 ' . $category . '">';
                        echo '<a href="uploads/' . $image . '" class="portfolio-item img-popup set-bg" data-setbg="uploads/' . $image . '"></a>';
                        echo '</div>';
                    }
                }
                ?>
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
                            <a href="./index.php"><img src="img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer__top__social">
                            <a href="https://www.facebook.com/thilinarathnayakaofficial?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a>
                            <a href="https://x.com/ThilinaR011?t=dpk1pfjFmIeBHUCCq55mqQ&s=09"><i class="fa fa-twitter"></i></a>
                            <!-- <a href="#"><i class="fa fa-fiver"></i></a> -->
                            <a href="https://www.instagram.com/thilina011?igsh=ZnlpZ2thejVveXl5"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UCLumlhlKMxeXpA6OPdNyhvA"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__option">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer__option__item">
                            <h5>About us</h5>
                            <p>Established in 2024, showcase the creative talents of Thilina Rathnayaka</p>
                            <p>Developed by Lashan Sachintha </p>
                            <a href="./about.php" class="read__more">Read more <span class="arrow_right"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <!-- <div class="footer__option__item">
                            <h5>Who we are</h5>
                            <ul>
                                <li><a href="#">Team</a></li>
                                <li><a href="#">Carrers</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="#">Locations</a></li>
                            </ul>
                        </div> -->
                    </div>
                    <!-- <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="footer__option__item">
                            <h5>Our work</h5>
                            <ul>
                                <li><a href="#">Feature</a></li>
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Browse Archive</a></li>
                                <li><a href="#">Video for web</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__option__item">
                            <h5>Newsletter</h5>
                            <p>Get new updates from Thilina</p>
                            <form action="#">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__copyright">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="footer__copyright__text">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | Thilina Rathnayaka
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.mixitup.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Js from new template -->
    <script src="jss/jquery-3.3.1.min.js"></script>
    <script src="jss/bootstrap.min.js"></script>
    <script src="jss/jquery.magnific-popup.min.js"></script>
    <script src="jss/jquery.slicknav.js"></script>
    <script src="jss/owl.carousel.min.js"></script>
    <script src="jss/jquery.mixitup.min.js"></script>
    <script src="jss/main.js"></script>

</body>

</html>
