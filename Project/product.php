<!doctype php>
<html class="no-js" lang="zxx">

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
        <section class="htc__product__details pt--100 pb--50 bg__white">
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
                        <div class="col-md-6 col-lg-6 col-sm-5 col-xs-12">
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

                        <div class="sidebar-active col-md-6 col-lg-6 col-sm-7 col-xs-12 xmt-30">
                        <div class="pt--100"></div>
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
                                    <div class="description_row">
                                        <div><?= $q[2] ?></div>
                                    </div>

                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="sheet" class="product__tab__content fade">
                                <div class="pro__feature">
                                <div class="сharacteristics_list">
                                        <?
                                        $queryChars = 'select сharacteristic.NameСharacteristic, product_properties.Value from product_properties join сharacteristic
                                             on сharacteristic.IdСharacteristic = product_properties.IdCharacteristic
                                              where idproduct = ' . $q[3] . '';
                                        $resultChars = mysqli_query($db, $queryChars);
                                        while ($q = mysqli_fetch_array($resultChars)) {
                                            if ($q[0] != 'img') { ?>
                                                <div class="сharacteristic_row">
                                                    <!-- <i class="zmdi zmdi-play-circle"></i> -->
                                                    <div class="сharacteristic_name">
                                                        <?= $q[0] ?>
                                                    </div>
                                                    <div class="сharacteristic_value">
                                                        <?= $q[1] ?>
                                                    </div>
                                                </div>
                                        <? }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="reviews" class="product__tab__content fade">
                                <div class="review__address__inner">
                                    <?
                                    $queryComment = 'SELECT users.SurnameUser, users.NameUser, `сomment`.*    FROM `сomment` inner join users ON `сomment`.`IdUser` = users.idUsers WHERE IdProduct=' . $_GET['id'];

                                    $resultComment = mysqli_query($db, $queryComment);
                                    //SELECT * FROM `сomment` inner join users ON `сomment`.`IdUser` = users.idUsers WHERE IdProduct= 109;
                                    while ($comments = mysqli_fetch_array($resultComment)) { ?>





                                        <!-- Start Single Review -->
                                        <div class="pro__review ans">
                                            <div class="review__thumb">
                                                <img src="images/review/2.jpg" alt="review images">
                                            </div>
                                            <div class="review__details">
                                                <div class="review__info">
                                                    <h4><?= ($comments[0] . " " . $comments[1]) ?></h4>
                                                    <div class="rating-result">
                                                        <?for ($i = 0 ; $i < $comments[6]; $i++ ){?>
                                                        <span class="active"></span>
                                                        
                                                        <?}  
                                                        for ($i = 0 ; $i < (5-$comments[6]); $i++ ){?>
                                                            
                                                            <span></span>
                                                        
                                                        <?}?>
                                                    </div>
                                                </div>
                                                <div class="review__date">
                                                    <span><?=$comments[5]?></span>
                                                </div>
                                                <p><?= $comments[7] ?></p>
                                            </div>
                                        </div>
                                        <!-- End Single Review -->
                                    <? }
                                    ?>
                                </div>
                                <!-- Start RAting Area -->
                                <?


                                if (isset($_SESSION['idUsers'])) {

                                    $queryChars = 'select order_product.IdProduct from `order` join order_product 
                                        on `order`.IdOrder = order_product.IdOrder 
                                        WHERE order_product.IdProduct =' . $_GET['id'] .
                                        'and `order`.`IdUser` =' . $_SESSION['idUsers'] . ';' . '';
                                    $resultChars = mysqli_query($db, $queryChars);
                                    if ($resultChars) {
                                ?>
                                        <h2 class="rating-title">Ваш отзыв</h2>
                                        <!-- End RAting Area -->
                                        <div class="review__box">
                                            <form id="comment-form" action="product.php?id=<?= $_GET['id'] ?>&" method="post">
                                                <div class="single-review-form">
                                                    <div class="review-box message">
                                                        <textarea name="сommentText" placeholder="Напишите ваш отзыв"></textarea>
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



                                                <div class="htc__login__btn mt--30">
                                                    <input class="fv-btn" form="comment-form" type="submit" value="Оставить отзыв" />
                                                </div>
                                            </form>

                                            <? if (isset($_POST['сommentText']) & isset($_POST['rating'])) {

                                                $today = date("Y-m-d");
                                                //INSERT INTO 'comment' (IdСomment, IdUser, IdProduct, DateOfCreate, Score, CommentText) VALUES (NULL,'20','113','2022-12-17','2', '222')

                                                //INSERT INTO `сomment` (`IdСomment`, `IdUser`, `IdProduct`, `DateOfCreate`, `Score`, `CommentText`) VALUES (NULL, '20', '113', '2022-12-02', '2', '2223123wdsads');
                                                //$sql = "INSERT INTO 'comment' ('IdСomment', 'IdUser', 'IdProduct', 'DateOfCreate', 'Score', 'CommentText') VALUES (NULL,'{$_SESSION['idUsers']}','{$_GET['id']}','{$today}','{$_POST['rating']}', '{$_POST['сommentText']}')";
                                                $sql = "INSERT INTO `сomment` (`IdСomment`, `IdUser`, `IdProduct`, `DateOfCreate`, `Score`, `CommentText`) VALUES (NULL, '{$_SESSION['idUsers']}', '{$_GET['id']}', '{$today}', '{$_POST['rating']}', '{$_POST['сommentText']}')";

                                                mysqli_query($db, $sql);
                                                //header( 'Location: index.php' );
                                            } ?>


                                        </div>
                                <? }
                                }; ?>
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

</html>