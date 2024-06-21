<?php
require_once 'classes/DbConnector.php';

// Assuming you have received form data to update a specific record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create an instance of DbConnector
    $dbConnector = new classes\DbConnector();

    // Get form data
    $section = $_POST['section'];
    $image = $_FILES['image']['name']; // Assuming you're uploading an image file

    // Upload image file to a directory (optional)
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Define the SQL query based on the selected section
    $query = "";
    $params = array(
        ':image' => $image
    );

    switch ($section) {
        case 'nature':
            $query = "INSERT INTO nature (image) VALUES (:image)";
            break;
        case 'astro':
            $query = "INSERT INTO astro (image) VALUES (:image)";
            break;
        case 'wedding':
            $query = "INSERT INTO wedding (image) VALUES (:image)";
            break;
        case 'model':
            $query = "INSERT INTO model (image) VALUES (:image)";
            break;
        case 'design':
            $query = "INSERT INTO design (image) VALUES (:image)";
            break;
        case 'videography':
            $url = $_POST['url']; // Assuming you're also getting URL for videography
            $query = "INSERT INTO videography (image, url) VALUES (:image, :url)";
            $params[':url'] = $url;
            break;
        default:
            // Handle invalid section
            break;
    }

    try {
        // Execute the query using the executeQuery method of DbConnector
        $stmt = $dbConnector->executeQuery($query, $params);

        // Check if the insertion was successful
        if ($stmt->rowCount() > 0) {
            echo "Data inserted successfully";
        } else {
            echo "Failed to insert data";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Portfolio Admin Page">
    <meta name="keywords" content="portfolio, admin, html, css, php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio Admin</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <style>
        body {
            background: url('img/breadcrumb-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            padding-top: 50px; /* Add some space at the top */
        }

        h2 {
            color: #fff; /* Change h2 color to white */
        }

        .section {
            display: none;
        }

        .active {
            display: block;
        }

        .btn-primary {
            color: #fff; /* Change font color of buttons to white */
        }
    </style>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => section.classList.remove('active'));
            document.getElementById(sectionId).classList.add('active');
        }
    </script>
</head>

<body>
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
                                <li><a href="./index.php">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <h2>Select Section</h2>
                <br>

                <button class="btn btn-primary" onclick="showSection('natureSection')">Nature</button>
                <button class="btn btn-primary" onclick="showSection('astroSection')">Astro</button>
                <button class="btn btn-primary" onclick="showSection('weddingSection')">Wedding</button>
                <button class="btn btn-primary" onclick="showSection('modelSection')">Model</button>
                <button class="btn btn-primary" onclick="showSection('designSection')">Design</button>
                <button class="btn btn-primary" onclick="showSection('videographySection')">Videography</button>
            </div>
        </div>

        <div class="row section mt-5" id="natureSection">
            <div class="col-lg-12">
                <h2>Nature Photos</h2>
                <!-- Form for Nature Photos -->
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="section" value="nature">
                    <div class="form-group">
                        <label for="natureImage">Image:</label>
                        <input type="file" class="form-control" id="natureImage" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row section mt-5" id="astroSection">
            <div class="col-lg-12">
                <h2>Astro Photos</h2>
                <!-- Form for Astro Photos -->
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="section" value="astro">
                    <div class="form-group">
                        <label for="astroImage">Image:</label>
                        <input type="file" class="form-control" id="astroImage" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row section mt-5" id="weddingSection">
            <div class="col-lg-12">
                <h2>Wedding Photos</h2>
                <!-- Form for Wedding Photos -->
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="section" value="wedding">
                    <div class="form-group">
                        <label for="weddingImage">Image:</label>
                        <input type="file" class="form-control" id="weddingImage" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row section mt-5" id="modelSection">
            <div class="col-lg-12">
                <h2>Model Photos</h2>
                <!-- Form for Model Photos -->
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="section" value="model">
                    <div class="form-group">
                        <label for="modelImage">Image:</label>
                        <input type="file" class="form-control" id="modelImage" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row section mt-5" id="designSection">
            <div class="col-lg-12">
                <h2>Design Photos</h2>
                <!-- Form for Design Photos -->
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="section" value="design">
                    <div class="form-group">
                        <label for="designImage">Image:</label>
                        <input type="file" class="form-control" id="designImage" name="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row section mt-5" id="videographySection">
            <div class="col-lg-12">
                <h2>Videography</h2>
                <!-- Form for Videography -->
                <form action="admin.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="section" value="videography">
                    <div class="form-group">
                        <label for="videoImage">Image:</label>
                        <input type="file" class="form-control" id="videoImage" name="image" required>
                    </div>
                    <div class="form-group">
                        <label for="videoTitle">Title:</label>
                        <input type="text" class="form-control" id="videoTitle" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="videoSubtitle">Subtitle:</label>
                        <input type="text" class="form-control" id="videoSubtitle" name="subtitle" required>
                    </div>
                    <div class="form-group">
                        <label for="videoUrl">URL:</label>
                        <input type="text" class="form-control" id="videoUrl" name="url" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
