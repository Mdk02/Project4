<!doctype htpm>
<html class="no-js" lang="en">
<?php
require "connectDB.php";
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Главная</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <!-- ПОТОМ УБРАТЬ КЛАСС -->
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">

        <!-- components/header.php -->
        <? include('components/header.php'); ?>


        <div class="body__overlay"></div>

        <!-- Start Feature Product -->
        <section class="categories-slider-area bg__white pt--100">
            <div class="container">
                <div class="row">
                    <!-- Start Left Feature -->
                    <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                        <!-- Start Slider Area -->
                        <div class="slider__container slider--one with-shadow">
                            <div class="slider__activation__wrap owl-carousel owl-theme">
                                <!-- Start Single Slide -->
                                <div class="slide slider__full--screen slider-height-inherit  slider-text-left" style="background: rgba(0, 0, 0, 0) url(images/slider/bg/aoc.png) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    <h1 class="text--white">Монитор <br><span class="text--theme">AOC 24B2XH</span></h1>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn text--white" href="product.php?id=115">Посмотреть</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide -->
                                <!-- Start Single Slide -->
                                <div class="slide slider__full--screen slider-height-inherit slider-text-left" style="background: rgba(0, 0, 0, 0) url(images/slider/bg/iphones_14_pro.png) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-10 col-lg-8 col-sm-12 col-xs-12   ">
                                                <div class="slider__inner">
                                                    <h1 class="text--black"><span class="text--theme">Iphone<br>14 Pro</span></h1>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn text--black" href="catalog.php?search=iphone 14 pro">Посмотреть</a>
                                                        <!-- ИЗМЕНИТЬ ССЫЛКУ -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide -->
                            </div>
                        </div>
                        <!-- Start Slider Area -->
                    </div>


                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                        <div class="categories-menu mrg-xs">
                            <div class="category-heading">
                                <h3>Categories</h3>
                            </div>
                            <div class="category-menu-list">
                                <ul>
                                    <?
                                    $query = 'select namecategory from category';
                                    $result = mysqli_query($db, $query);
                                    $final = mysqli_fetch_all($result);
                                    foreach ($final as $q) { ?>
                                        <li><a href="/catalog.php?category=<?= $q[0] ?>"><img alt="" src="images/icons/thum8.png"> <?= $q[0] ?> <i class="zmdi zmdi-chevron-right"></i></a></li>
                                    <? } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Left Feature -->


                </div>
            </div>
        </section>
        <!-- End Our Product Area -->

        <!-- Черная пятница 1 -->
        <div class="only-banner ptb--50 bg__white">
            <div class="container">
                <div class="only-banner-img">
                    <img style="width: 100%;" src="/images/new-year/new-year-banner.png" alt="s ng">

                </div>
            </div>
        </div>


        <!-- Start Our Product Area -->
        <section class="htc__product__area bg__white">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style" role="tablist">
                                    <li class="active">
                                        <a href="#home1" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>Новое </h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#home2" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>Лучшая цена </h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#home3" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>Популярное</h4>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="home1">
                                    <div class="row">
                                        <div class="product-slider-active owl-carousel">
                                            <?
                                            $query = 'select nameproduct, value, priceproduct, product.idproduct , product.DescriptionProduct from product,product_properties 
                                                where product.idproduct = product_properties.idproduct and product_properties.idcharacteristic=3
                                                 order by product.idproduct desc limit 8';

                                            $result = mysqli_query($db, $query);
                                            $delete = '"';
                                            while ($q = mysqli_fetch_array($result)) {
                                            ?>
                                                <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                    <div class="product">
                                                        <div class="product__inner">
                                                            <div class="pro__thumb">
                                                                <a href="product.php?id=<?= $q[3] ?>">
                                                                    <img src="<?= $q[1] ?>" alt="product images">
                                                                </a>
                                                            </div>
                                                            <div class="product__hover__info">
                                                                <ul class="product__action">
                                                                    <li>
                                                                        <a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#" onclick="idelVer1('<?= $q[3] ?>','<?= $q[1] ?>','<? echo str_replace($delete, ' ', $q[0]) ?>' ,'Рейтинг','<?= $q[2] ?>', '<?= $q[2] ?>', '<? echo str_replace($delete, ' ', $q[4]) ?>')">
                                                                            <span class="ti-eye"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li><a title="Добавить в корзину" id=<?= $q[3] ?> onclick="addToCart(this)"><span class="ti-shopping-cart"></span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product__details">
                                                            <h2><a href="product.php?id=<?= $q[3] ?>"><?= $q[0] ?></a></h2>
                                                            <ul class="product__price">
                                                                <li class="new__price"><?= $q[2] ?> ₽</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?

                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="home2">
                                    <div class="row">
                                        <div class="product-slider-active owl-carousel">
                                            <?
                                            $query = 'select nameproduct, value, priceproduct, product.idproduct , product.DescriptionProduct from product,product_properties 
                                            where product.idproduct = product_properties.idproduct and product_properties.idcharacteristic=3
                                             order by product.idproduct desc limit 8';

                                            $result = mysqli_query($db, $query);
                                            while ($q = mysqli_fetch_array($result)) {
                                            ?>
                                                <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                    <div class="product">
                                                        <div class="product__inner">
                                                            <div class="pro__thumb">
                                                                <a href="product.php?id=<?= $q[3] ?>">
                                                                    <img src="<?= $q[1] ?>" alt="product images">
                                                                </a>
                                                            </div>
                                                            <div class="product__hover__info">
                                                                <ul class="product__action">
                                                                    <li>
                                                                        <a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#" onclick="idelVer1('<?= $q[3] ?>','<?= $q[1] ?>','<? echo str_replace($delete, ' ', $q[0]) ?>' ,'Рейтинг','<?= $q[2] ?>', '<?= $q[2] ?>', '<? echo str_replace($delete, ' ', $q[4]) ?>')">
                                                                            <span class="ti-eye"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li><a title="Добавить в корзину" id=<?= $q[3] ?> onclick="addToCart(this)"><span class="ti-shopping-cart"></span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product__details">
                                                            <h2><a href="product-details.php"><?= $q[0] ?></a></h2>
                                                            <ul class="product__price">
                                                                <li class="new__price"><?= $q[2] ?> ₽</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="home3">
                                    <div class="row">
                                        <div class="product-slider-active owl-carousel">
                                            <?
                                           $query = 'select nameproduct, value, priceproduct, product.idproduct , product.DescriptionProduct from product,product_properties 
                                           where product.idproduct = product_properties.idproduct and product_properties.idcharacteristic=3
                                            order by product.idproduct desc limit 8';

                                           $result = mysqli_query($db, $query);
                                            while ($q = mysqli_fetch_array($result)) {
                                            ?>
                                                <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                    <div class="product">
                                                        <div class="product__inner">
                                                            <div class="pro__thumb">
                                                                <a href="product.php?id=<?= $q[3] ?>">
                                                                    <img src="<?= $q[1] ?>" alt="product images">
                                                                </a>
                                                            </div>
                                                            <div class="product__hover__info">
                                                                <ul class="product__action">
                                                                    <li>
                                                                        <a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#" onclick="idelVer1('<?= $q[3] ?>','<?= $q[1] ?>','<? echo str_replace($delete, ' ', $q[0]) ?>' ,'Рейтинг','<?= $q[2] ?>', '<?= $q[2] ?>', '<? echo str_replace($delete, ' ', $q[4]) ?>')">
                                                                            <span class="ti-eye"></span>
                                                                        </a>
                                                                    </li>
                                                                    <li><a title="Добавить в корзину" id=<?= $q[3] ?> onclick="addToCart(this)"><span class="ti-shopping-cart"></span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product__details">
                                                            <h2><a href="product.php?id="><?= $q[0] ?></a></h2>
                                                            <ul class="product__price">
                                                                <li class="new__price"><?= $q[2] ?> ₽</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->

        <!-- Черная пятница 2 -->
        <div class="only-banner pt--50 pb--100 bg__white">
            <div class="container">
                <div class="only-banner-img">
                    <a href="shop-sidebar.php"><img src="images/new-product/6.jpg" alt="new product"></a>
                </div>
            </div>
        </div>

        <!-- Start Our Product Area -->

        <!-- End Our Product Area -->


        <!-- components/footer.php -->
        <? include('components/footer.php'); ?>
    </div>
    <!-- Body main wrapper end -->
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product">
                            <!-- Start product images -->
                            <div class="product-images">
                                <div class="main-image images">
                                    <img id="img-quick" alt="big images">
                                    <!-- тут фото -->
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <!-- вот тут имя -->
                                <h1 id="product-name-quick"></h1>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span id="new-price-quick" class="new-price">новыая цена</span>
                                    </div>
                                </div>



                                <div id="quick-desc" class="quick-desc"> описание (если ты это видишь, то оно сломалось )
                                </div>


                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->
    <!-- Placed js at the end of the document so the pages load faster -->

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


    <script src="js/idel.js"></script>

</body>
</php>