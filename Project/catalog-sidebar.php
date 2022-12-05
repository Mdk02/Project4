<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tmart-Minimalist eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
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

<body class="search__box__show__hide"> <!-- ПОТОМ УБРАТЬ КЛАСС -->  
<?php   
       require "connectDB.php";
    ?>
    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header scroll-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-6">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="images/logo/logo.svg" alt="logo">
                                </a>
                            </div>
                        </div>
                         <div class="col-md-8 col-lg-8" >
                                <div class="search__area">
                                    <div class="search__inner">
                                        <form action="#" method="get">
                                            <input placeholder="Search here... " type="text">
                                            <button type="submit"><span class="ti-search"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-1 col-lg-1 col-sm-6 col-xs-6">
                           
                            <!-- End MAinmenu Ares --> 
                            <ul class="menu-extra">
                                
                                <!-- <li class="search search__open hidden-xs"><span class="ti-search"></span></li> -->
                                <li><a href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                <li><a href="login-register.html"><span class="ti-user"></span></a></li>
                                <!-- <li class="cart__menu"><span class="ti-shopping-cart"></span></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <!-- End Offset Wrapper -->
        <div style="height: 100px;">
            <!-- offset top -->
        </div>
        <!-- Start Bradcaump area -->
        <!-- <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Shop Sidebar</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Shop Sidebar</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Bradcaump area --> 
        <!-- Start Our ShopSide Area -->
        <section class="htc__shop__sidebar bg__white ">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                        <div class="htc__shop__left__sidebar">
                            <!-- Start Range -->
                            <!-- Фильтр цены -->
                            <div class="htc-grid-range">
                                <h4 class="section-title-4">FILTER BY PRICE</h4>
                                <div class="content-shopby">
                                    <div class="price_filter s-filter clear">
                                        <form action="#" method="GET">
                                            <div id="slider-range"></div>
                                            <div class="slider__range--output">
                                                <div class="price__output--wrap">

                                                
                                                    <div class="price--output">
                                                        <span>Price :</span><input type="text" id="amount" readonly>
                                                    </div>


                                                    <div class="price--filter">
                                                        <button><a href="#">Filter</a></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Range -->

                                <!-- Фильтр характеристики -->



                             <div>


                             <!-- 
                                монитр: диаганаль , разрешение , частота -->
                             
                                        

                                    <div class="htc__shop__cat">
                                        <h4 class="section-title-4">CHOOSE Diagonal</h4>
                                        <ul class="sidebar__list">
                                            


                                        </ul>
                                    </div>
                                

                            
                            </div>   
                           
                        </div>
                    </div>







                    <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 smt-30">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                <div class="producy__view__container">
                                    <!-- Start Short Form -->
                                    <div class="product__list__option">
                                        <div class="order-single-btn">
                                            <select class="select-color selectpicker">
                                              <option>Sort by newness</option>
                                              <option>Match</option>
                                              <option>Updated</option>
                                              <option>Title</option>
                                              <option>Category</option>
                                              <option>Rating</option>
                                            </select>
                                        </div>
                                        <div class="shp__pro__show">
                                            <span>Showing 1 - 4 of 4 results</span>
                                        </div>
                                    </div>
                                    <!-- End Short Form -->
                                    <!-- Start List And Grid View -->
                                    <ul class="view__mode" role="tablist">
                                        <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                        <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                    </ul>
                                    <!-- End List And Grid View -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="shop__grid__view__wrap another-product-style">
                                <!-- Start Single View -->
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">

                                    <? 
                                        $x = $_GET["category"];
                                        switch($x) {
                                            case 'монитор':
                                                $x = 1;
                                                break;
                                            case 'ноутбук':
                                                $x = 2;
                                                break;
                                            case 'телевизор LED':
                                                $x = 3;
                                                break;
                                            case 'смартфон':
                                                $x = 4;
                                                break;
                                        }
                                        $query = 'select nameproduct, priceproduct, idproduct from product where idcategory = '.$x.'';
                                        $result = mysqli_query($db, $query);
                                        while($q = mysqli_fetch_array($result)){
                                            ?>
                                                <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                                    <div class="product">
                                                        <div class="product__inner">
                                                            <div class="pro__thumb">
                                                                <a href="#">
                                                                    <?
                                                                        $queryImage = 'select value from product_properties where idproduct = '.$q[2].' and idcharacteristic = 3';
                                                                        $resultImage = mysqli_query($db,$queryImage);
                                                                        $qw = mysqli_fetch_array($resultImage);
                                                                    ?>
                                                                    <img src="<?=$qw[0]?>" alt="product images">
                                                                    
                                                                </a>
                                                            </div>
                                                            <div class="product__hover__info">
                                                                <ul class="product__action">
                                                                    <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                                    <li><a title="Add To Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="product__details">
                                                            <h2><a href="product-details.html"><?=$q[0]?></a></h2>
                                                            <ul class="product__price">
                                                                <!-- <li class="old__price">$16.00</li> -->
                                                                <li class="new__price"><?=$q[1]?> ₽</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?
                                        }
                                    ?>

                                    <!-- Start Single Product -->
                                    

                                    <!-- End List Content-->
                                </div>
                                <!-- End Single View -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our ShopSide Area -->
        <!-- Start Footer Area -->
        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                <div class="row">
                    <div class="footer__container clearfix">
                         <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-3 col-sm-6">
                            <div class="ft__widget">
                                <div class="ft__logo">
                                    <a href="index.php">
                                        <img src="images/logo/logo.svg" alt="footer logo" style="margin-left: -20px;">
                                    </a>
                                </div>
                                <div class="footer-address">
                                    <ul>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-pin"></i>
                                            </div>
                                            <div class="address-text">
                                                <p>РФ, г. Уфа ул. Кирова 65</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-email"></i>
                                            </div>
                                            <div class="address-text">
                                                <a href="#"> neverket@gmail.com</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-phone-in-talk"></i>
                                            </div>
                                            <div class="address-text">
                                                <p>7(***)***-**-** </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <ul class="social__icon">
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Categories</h2>
                                <ul class="footer-categories">
                                    <li><a href="shop-sidebar.html">Monitors</a></li>
                                    <li><a href="shop-sidebar.html">Notebooks</a></li>
                                    <li><a href="shop-sidebar.html">TV</a></li>
                                    <li><a href="shop-sidebar.html">Smartphones</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Infomation</h2>
                                <ul class="footer-categories">
                                    <li><a href="about.html">About Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Start Single Footer Widget -->
                        <!-- <div class="col-md-3 col-lg-3 col-lg-offset-1 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Newsletter</h2>
                                <div class="newsletter__form">
                                    <p>Subscribe to our newsletter and get 10% off your first purchase .</p>
                                    <div class="input__box">
                                        <div id="mc_embed_signup">
                                            <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                                <div id="mc_embed_signup_scroll" class="htc__news__inner">
                                                    <div class="news__input">
                                                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
                                                    </div> -->
                                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                                    <!-- <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                                    <div class="clearfix subscribe__btn"><input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="bst__btn btn--white__color">
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>        
                                </div>
                            </div>
                        </div> -->
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2022 <a href="#">MARKET</a>
                                    All Right Reserved.</p>
                                </div>
                                <!-- <ul class="footer__menu">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="shop.html">Product</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    
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

</body>

</html>