<?php $app = "http://localhost/projects/project1/Anime%20Streaming%20Service" ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime Streaming Service</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo $app ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $app ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $app ?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $app ?>/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $app ?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $app ?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $app ?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $app ?>/css/style.css" type="text/css">
    <link rel="shortcut icon" href="<?php echo $app ?>/img/logo.png" type="image/x-icon">
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
                        <a href="<?php echo $app ?>/index.php">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="<?php echo $app ?>/index.php">Homepage</a></li>
                                <li><a href="<?php echo $app ?>/categories.php">Categories <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo $app ?>/categories.php">Categories</a></li>
                                        <li><a href="<?php echo $app ?>/anime-details.php">Anime Details</a></li>
                                        <li><a href="<?php echo $app ?>/anime-watching.php">Anime Watching</a></li>
                                        <li><a href="<?php echo $app ?>/blog-details.php">Blog Details</a></li>
                                        <li><a href="<?php echo $app ?>/signup.php">Sign Up</a></li>
                                        <li><a href="<?php echo $app ?>/login.php">Login</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo $app ?>/blog.php">Our Blog</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <a href="<?php echo $app ?>/login.php"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->