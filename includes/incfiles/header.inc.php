<!doctype html>
<?php 
session_start();
include("url.inc.php");
include("connexion.inc.php") ;?>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fayama shop </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?=$url;?>images/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?=$url;?>jscss/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/flaticon.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/slicknav.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/animate.min.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/magnific-popup.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/themify-icons.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/slick.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/nice-select.css">
    <link rel="stylesheet" href="<?=$url;?>jscss/css/style.css">
    <script src="<?=$url;?>jscss/js/sweetalert2@11"></script>
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?=$url;?>images/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="<?=$url;?>images/logo.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="../home/">Accueil</a></li>
                                    <li><a href="../shop/">Boutique</a></li>
                                    </li>
                                    <li><a href="../shop/">Collections</a>
                                        <ul class="submenu">
                                            <li><a href="../checkout/">Accessoires</a></li>
                                            <li><a href="../product_details/">Alimentaires</a></li>
                                            <li><a href="../eleemnts/">Cosmetique</a></li>
                                            <li><a href="../confirmation/">Vestimentairess</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="../about/">A propos</a></li>
                                    <li><a href="../contact/">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                </li>
                                <li> <a href="../login/"><span class="flaticon-user"></span></a></li>
                                <li><a href="../cart/"><span class="flaticon-shopping-cart"></span></a> </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>