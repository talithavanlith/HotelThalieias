<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- COMP212 Assignment Talitha van Lith August 2018 Student ID: vanta342 8078082-->
    <!-- Home page for Hotel Thaleias website-->
    <title>Hotel Thaleias: Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="leaflet.css"/>
    <?php
    if (isset($scriptList) && is_array($scriptList)) {
        foreach ($scriptList as $script) {
            echo "<script src='$script'></script>";
        }
    }
    ?>
</head>
<body>
<!-- Start of page header -->

<header class="header_bkg">
    <h1 id="header1">Hotel</h1>
    <figure>
        <!-- logo designed myself on photoshop -->
        <img class="header_image" src="images/logoSmall.png" alt="Hotel logo">
    </figure>
    <h1>Thaleias</h1>
</header>
<!-- End of page header -->
<nav>
    <ul class="nav">
        <?php
        $currentPage = basename($_SERVER['PHP_SELF']);
        if ($currentPage === 'index.php') {
            echo "<li class=\"button\"><a class=\"active\">home</a>";
        } else {
            echo "<li class=\"button\"><a href='index.php'>home</a>";
        }
        if ($currentPage === 'rooms.php') {
            echo "<li class=\"button\"><a class=\"active\">rooms</a>";
        } else {
            echo "<li class=\"button\"><a href='rooms.php'>rooms</a>";
        }
        if ($currentPage === 'findus.php') {
            echo "<li class=\"button\"><a class=\"active\">find us</a>";
        } else {
            echo "<li class=\"button\"><a href='findus.php'>find us</a>";
        }
        if ($currentPage === 'book.php') {
            echo "<li class=\"button\"><a class=\"active\">book</a>";
        } else {
            echo "<li class=\"button\"><a href='book.php'>book</a>";
        }
        if ($currentPage === 'admin.php') {
            echo "<li class=\"button\"><a class=\"active\">admin</a>";
        }
        ?>
    </ul>
</nav>