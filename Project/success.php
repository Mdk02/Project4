<!doctype html>
<html class="no-js" lang="en">
<?php require "connectDB.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Данные об оплате</title>


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
                    <h2>Оплата прошла успешно</h2>
                </div>
            </div>
        </section>
        <?
            session_start();
            $sum = $_GET['sum'];
            $currentDate = date('Y-m-d');
            $getLastID = "SELECT max(IdOrder) from `order`";
            $id = mysqli_fetch_array(mysqli_query($db, $getLastID))[0];
            $idUser = $_SESSION['idUsers'];

            if($id === null){
                $id = 1;
            }
            else{
                $id += 1;
            }

            $sql = "INSERT INTO `order` (IdOrder, IdUser, Sum, DateOrder, Status) values ('$id', '$idUser', '$sum', '$currentDate', 'Оформление заказа')";
            mysqli_query($db, $sql);

            foreach ($_COOKIE as $key => $val) {
                if (!(strpos($key, 'product') === false)) {             
                    $getPrice = "SELECT PriceProduct from Product where IdProduct = '$val'";
                    $price = mysqli_fetch_array(mysqli_query($db, $getPrice))[0];

                    $sqlOrderProduct = "INSERT INTO `order_product` (IdOrder, IdProduct, Count, Price) VALUES ('$id', '$val', 1, '$price')";
                    mysqli_query($db, $sqlOrderProduct);
                    setcookie($key, "", time() - 3600);
                }
            }

            header("Refresh: 2;/index.php");
        ?>
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