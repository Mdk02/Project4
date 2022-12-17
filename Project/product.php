<!doctype php>
<php class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Продукт</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
        <link rel="shortcut icon" type="image/x-icon" href="images/logo.svg">
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

    <?php
    require 'connectDB.php';
    ?>

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
                                <h2 class="bradcaump-title">Product Details sticky</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">sticky right</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
            <!-- End Bradcaump area -->
            <!-- Start Product Details -->
            <section class="htc__product__details pb--100 bg__white">
                <div class="container">
                    <div class="scroll-active">
                        <div class="row">
                            <?
                            $query = 'select nameproduct, priceproduct, descriptionproduct, idproduct from product where product.idproduct = ' . $_GET["id"] . '';
                            $result = mysqli_query($db, $query);
                            $q = mysqli_fetch_array($result);

                            $queryImage = 'select сharacteristic.NameСharacteristic, product_properties.Value from product_properties join сharacteristic on сharacteristic.IdСharacteristic = product_properties.IdCharacteristic where idproduct = ' . $_GET["id"] . '';
                            $resultImage = mysqli_query($db, $queryImage);
                            while ($qe = mysqli_fetch_array($resultImage)) {
                                if ($qe[0] == 'img') {
                                    $imageString = $qe[1];
                                    break;
                                }
                            }
                            ?>
                            <div class="col-md-7 col-lg-7 col-sm-5 col-xs-12">
                                <div class="product__details__container product-details-5">
                                    <div class="scroll-single-product mb--30">
                                        <img src="<?= $imageString ?>" alt="full-image">
                                    </div>
                                    <!-- <div class="scroll-single-product mb--30">
                                    <img src="images/product-details/big-img/11.jpg" alt="full-image">
                                </div>
                                <div class="scroll-single-product mb--30">
                                    <img src="images/product-details/big-img/12.jpg" alt="full-image">
                                </div> -->
                                </div>
                            </div>

                            <div class="sidebar-active col-md-5 col-lg-5 col-sm-7 col-xs-12 xmt-30">
                                <div class="htc__product__details__inner ">
                                    <div class="pro__detl__title">
                                        <h2><?= $q[0] ?></h2>
                                    </div>
                                    <div class="pro__dtl__rating">
                                        <ul class="pro__rating">
                                            <li><span class="ti-star"></span></li>
                                            <li><span class="ti-star"></span></li>
                                            <li><span class="ti-star"></span></li>
                                            <li><span class="ti-star"></span></li>
                                            <li><span class="ti-star"></span></li>
                                        </ul>
                                        <span class="rat__qun">(Рейтинг)</span>
                                    </div>

                                    <ul class="pro__dtl__prize">
                                        <li><?= $q[1] ?> ₽</li>
                                    </ul>
                                    
                                    
                                    <ul class="pro__dtl__btn">
                                        <li class="buy__now__btn"><a href="#">В корзину</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Product Details -->
            <!-- Start Product tab -->
            <section class="htc__product__details__tab bg__white pb--120">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <ul class="product__deatils__tab mb--60" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#description" role="tab" data-toggle="tab">Описание</a>
                                </li>
                                <li role="presentation">
                                    <a href="#sheet" role="tab" data-toggle="tab">характеристики</a>
                                </li>
                                <li role="presentation">
                                    <a href="#reviews" role="tab" data-toggle="tab">Отзывы</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product__details__tab__content">
                                <!-- Start Single Content -->
                                <div role="tabpanel" id="description" class="product__tab__content fade in active">
                                    <div class="product__description__wrap">
                                        <div class="product__desc">
                                            <h2 class="title__6">Описание</h2>
                                            <p><?= $q[2] ?></p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div role="tabpanel" id="sheet" class="product__tab__content fade">
                                    <div class="pro__feature">
                                        <h2 class="title__6">Характеристики</h2>
                                        <ul class="feature__list">
                                            <?
                                            $queryChars = 'select сharacteristic.NameСharacteristic, product_properties.Value from product_properties join сharacteristic
                                             on сharacteristic.IdСharacteristic = product_properties.IdCharacteristic
                                              where idproduct = ' . $q[3] . '';
                                            $resultChars = mysqli_query($db, $queryChars);
                                            while ($q = mysqli_fetch_array($resultChars)) {
                                                if ($q[0] != 'img') {
                                            ?><li><i class="zmdi zmdi-play-circle"></i><?= $q[0] ?> : <?= $q[1] ?></li><?
                                                                                                                            }
                                                                                                                        }
                                                                                                                                ?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div role="tabpanel" id="reviews" class="product__tab__content fade">
                                    <div class="review__address__inner">
                                        <!-- Start Single Review -->
                                        <div class="pro__review">
                                            <div class="review__thumb">
                                                <img src="images/review/1.jpg" alt="review images">
                                            </div>
                                            <div class="review__details">
                                                <div class="review__info">
                                                    <h4><a href="#">Gerald Barnes</a></h4>
                                                    <ul class="rating">
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star-half"></i></li>
                                                        <li><i class="zmdi zmdi-star-half"></i></li>
                                                    </ul>
                                                    <div class="rating__send">
                                                        <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="review__date">
                                                    <span>27 Jun, 2016 at 2:30pm</span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Review -->
                                        <!-- Start Single Review -->
                                        <div class="pro__review ans">
                                            <div class="review__thumb">
                                                <img src="images/review/2.jpg" alt="review images">
                                            </div>
                                            <div class="review__details">
                                                <div class="review__info">
                                                    <h4><a href="#">Шарипов Идель</a></h4>
                                                    <ul class="rating">
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star"></i></li>
                                                        <li><i class="zmdi zmdi-star-half"></i></li>
                                                        <li><i class="zmdi zmdi-star-half"></i></li>
                                                    </ul>
                                                    <div class="rating__send">
                                                        <a href="#"><i class="zmdi zmdi-mail-reply"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="review__date">
                                                    <span>27 Июня 2016</span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at estei to bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Review -->
                                    </div>
                                    <!-- Start RAting Area -->
                                    <?

                                    
                                    if (!isset($_SESSION['idUsers'])) {
                                        ?> 
                                        <h2 class="rating-title">Ваш отзыв</h2> <?
                                        $queryChars = 'select order_product.IdProduct from `order` join order_product 
                                        on `order`.IdOrder = order_product.IdOrder 
                                        WHERE order_product.IdProduct ='.$_GET['id'].
                                        'and `order`.`IdUser` =' .$_SESSION['idUsers'].';' .'';
                                        $resultChars = mysqli_query($db, $queryChars);
                                        if (!$resultChars){
                                    ?>

                                       





                                        <!-- End RAting Area -->
                                        <div class="review__box">
                                            <form id="review-form">
                                                <div class="single-review-form">
                                                    <div class="review-box message">
                                                        <textarea placeholder="Напишите ваш отзыв"></textarea>
                                                    </div>
                                                </div>


                                                <div class="rating__wrap">
                                            <h4 class="rating-title-2"> Ваш рейтинг товара</h4>
                                            <div class="rating-area1">
                                                <input type="radio" id="star-5" name="rating" value="5">
                                                <label for="star-5" title="Оценка «5»"></label>
                                                <input type="radio" id="star-4" name="rating" value="4">
                                                <label for="star-4" title="Оценка «4»"></label>
                                                <input type="radio" id="star-3" name="rating" value="3">
                                                <label for="star-3" title="Оценка «3»"></label>
                                                <input type="radio" id="star-2" name="rating" value="2">
                                                <label for="star-2" title="Оценка «2»"></label>
                                                <input type="radio" id="star-1" name="rating" value="1">
                                                <label for="star-1" title="Оценка «1»"></label>
                                            </div>


                                        </div>



                                                <div class="review-btn">
                                                    <a class="fv-btn" onclick="alert('Сохранено')" href="#">Оставить отзыв</a>
                                                </div>
                                            </form>
                                        </div>
                                    <? }}; ?>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Product tab -->

            <!-- components/footer.php -->
            <? include('components/footer.php'); ?>
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

</php>