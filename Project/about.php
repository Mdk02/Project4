<!doctype html>
<html class="no-js" lang="en">
<?php require "connectDB.php"; ?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>


    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo/logo2.svg">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel main css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="search__box__show__hide">
    <div class="wrapper fixed__footer">
        <? include('components/header.php'); ?>

        <div class="body__overlay"></div>

        <section class="bg__white pt--100 pb--50">
            <div class="container">
                <div class="row">
                    <h2 class="section-title-3 pb--20 ">О проекте</h2>
                    <div class="simple_text">
                        PROJECT4 - это магазин электроники
                    </div>
                </div>
        </section>

        <section class="bg__white pb--100">
            <div class="container">
                <div class="row">
                    <h2 class="section-title-3 pb--20">
                        Команда разработчиков
                    </h2>

                    <div class="portfolio-style">
                        <div class="row grid">
                            <div class="col-md-3 col-sm-6 col-xs-12 grid-item cat5 cat2">
                                <div class="single-portfolio mb--30 border-simple">
                                    <div class="portfolio-img-title">
                                        <a href="https://github.com/Mdk02">
                                            <img src="images/dev_profiles/vk_bulat.jpg" alt="" />
                                        </a>
                                        <div class="portfolio-title hover-title">
                                            <h3><a href="https://github.com/Mdk02">Булат</a></h3>
                                            <span>Backеnd разработчик, проектировщик БД</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12 grid-item cat5 cat2">
                                <div class="single-portfolio mb--30 border-simple">
                                    <div class="portfolio-img-title">
                                        <a href="https://github.com/soterdone">
                                            <img src="images/dev_profiles/github_gosha.jfif" alt="" />
                                        </a>
                                        <div class="portfolio-title hover-title">
                                            <h3><a href="https://github.com/soterdone">Георгий</a></h3>
                                            <span>Backеnd разработчик, тестировщик</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-xs-12 grid-item cat5 cat2">
                                <div class="single-portfolio mb--30 border-simple">
                                    <div class="portfolio-img-title">
                                        <a href="">
                                            <img src="images/dev_profiles/github_zahar.png" alt="" />
                                        </a>
                                        <div class="portfolio-title hover-title">
                                            <h3><a href="">Захар</a></h3>
                                            <span>Менеджер продукта, тестировщик</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12 grid-item cat1 cat3">
                                <div class="single-portfolio mb--30 border-simple">
                                    <div class="portfolio-img-title">
                                        <a href="https://github.com/aaaminov">
                                            <img src="images/dev_profiles/github_arslan.jfif" alt="" />
                                        </a>
                                        <div class="portfolio-title hover-title">
                                            <h3><a href="https://github.com/aaaminov">Арслан</a></h3>
                                            <span>Frontеnd Разработчик, тестировщик</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6 col-xs-12 grid-item cat5 cat2">
                                <div class="single-portfolio mb--30 border-simple">
                                    <div class="portfolio-img-title">
                                        <a href="https://github.com/Sharik000Idel">
                                            <img src="https://sun9-83.userapi.com/impg/k-MsedLzQptT5bVjYKc1tw7AaSS-HdVJmJ-z9g/gdHdOXPEk74.jpg?size=604x522&quality=95&sign=2aa40c5e5023e816553c96436470486d&c_uniq_tag=WhBtTVVJ__plxcYpFC2hH57w7l8-omra_nqBzcOptNo&type=album" alt="" />
                                        </a>
                                        <div class="portfolio-title hover-title">
                                            <h3><a href="https://github.com/Sharik000Idel">Идель</a></h3>
                                            <span>Backеnd разработчик, менеджер программы</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <? include('components/footer.php'); ?>
    </div>
    <!-- Body main wrapper end -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>

</body>

</html>