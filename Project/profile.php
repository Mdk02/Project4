<!doctype html>
<html class="no-js" lang="en">

<?php
require "connectDB.php";

session_start();
$userID = $_SESSION['idUsers'];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>


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

<body class="search__box__show__hide">
    <div class="wrapper fixed__footer">
        <? include('components/header.php'); ?>

        <div class="body__overlay"></div>

        <section class="bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <?
                    if (isset($_SESSION['idUsers'])) { ?>
                        <h2 class="section-title-3 pb--20">Профиль</h2>
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style" role="tablist">
                                    <li class="active">
                                        <a href="#info" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>Информация </h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#edit" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>Редактировать </h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#orders" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>Заказы</h4>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content another-product-style jump">
                                <div class="tab-pane active" id="info">
                                    <div class="row">
                                        <?
                                        session_start();
                                        $userID = $_SESSION['idUsers'];
                                        session_write_close();
                                        ?>



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
                                        <a class="btn" onclick="exit()">Выйти</a>
                                    </div>
                                </div>
                                <div class="tab-pane" id="edit">
                                    <div class="row">

                                    </div>
                                </div>
                                <div class="tab-pane" id="orders">
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                    <? } else {
                        header("Location: login-register.php");
                    } ?>
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

    <script>
        function exit() {
            <? session_start();
            session_unset();
            session_destroy();
            header("Location: login-register.php"); ?>
        }
    </script>
</body>

</html>