<?
require "connectDB.php";
?>
<!doctype php>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Корзина</title>
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

        <div class="cart-main-area bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Фото</th>
                                            <th class="product-name-1">Продукт</th>
                                            <th class="product-price-1">Цена</th>
                                            <th class="product-remove">Удалить</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if (count($_COOKIE) > 0) {
                                        $productFromCookies = '';

                                        foreach ($_COOKIE as $key => $val) {
                                            if (!(strpos($key, 'product') === false)) {

                                                $productFromCookies .= "," . $val;
                                            }
                                        }
                                        $productFromCookies = trim($productFromCookies, ',');
                                        if ($productFromCookies != '') {

                                            $query = "SELECT product_properties.Value, product.NameProduct, product.PriceProduct, product.IdProduct
                                                from product join product_properties 
                                                on product_properties.IdProduct = product.IdProduct
                                                where product_properties.IdCharacteristic = 3 and product.IdProduct in ($productFromCookies)";

                                            $result = mysqli_query($db, $query);



                                            while ($all_product_list = mysqli_fetch_array($result)) {
                                    ?>
                                                <tr id="<?= $all_product_list[3] ?>p">
                                                    <td class="product-thumbnail"><a href="product.php?id=<?= $all_product_list[3] ?>"><img src="<?= $all_product_list[0] ?>" alt="product img" /></a></td>
                                                    <td class="product-name"><a href="product.php?id=<?= $all_product_list[3] ?>"><?= $all_product_list[1] ?></a></td>
                                                    <td class="product-price"><span class="amount"><?= $all_product_list[2] ?>₽</span></td>
                                                    <td class="product-remove"><a onclick="deleteFromCart(this)" id="<?= $all_product_list[3] ?>">X</a></td>
                                                </tr>
                                    <?
                                            }
                                        }
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="buttons-cart">
                                        <a href="index.php">Продолжить покупки</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="cart_totals">
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                <tr class="order-total">
                                                    <th>Всего: </th>
                                                    <td>
                                                        <strong><span id="amount_cart" class="amount" onload=></span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout pt--50">
                                            <a id="buy_but" href="">Оплатить</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                function SumProduct() {
                    sum = 0;
                    // console.log(sum);
                    buy_product = '';
                    product = document.getElementsByClassName('product-price');
                    nameProduct = document.getElementsByClassName('product-name');
                    for (i = 0; i < product.length; i++) {
                        buy_product += i + 1 + '. ' + nameProduct[i].textContent + '-               -\n';
                        // console.log(buy_product);
                        sum += Number(product[i].textContent.slice(0, product[i].textContent.length - 1));
                    }

                    user = sessionStorage.getItem("idUsers");
                    // alert(user);
                    if (user) {
                        document.getElementById('buy_but').href = 'https://oplata.qiwi.com/create?publicKey=48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iPqL6r9k4rCb9NrdmV8vVUNYLzDi2HvXpwwquSbSCKx6VNhYAPDgW1mFwV1jJYn6BCWzgSaZjjbo7M2LRmCwpfhnhzXGNs1BRRZEjvXy45r&amount=' + sum + '&successUrl=http://project/success.php&comment=' + buy_product + '&sum=' + sum;
                    } else {
                        document.getElementById('buy_but').href = "login-register.php";
                    }


                    document.getElementById("amount_cart").textContent = sum + '₽';
                }

                function deleteFromCart(elem) {
                    let idProduct = elem.id;
                    document.cookie = 'product' + idProduct + '= ; expires = Thu, 01 Jan 1970 00:00:00 GMT';
                    let tr = document.getElementById(idProduct + "p");
                    tr.remove();
                    SumProduct();
                };

                window.onload = SumProduct;
            </script>
        </div>
        <!-- cart-main-area end -->
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


    <script src="js/idel.js"></script>

</body>

</html>