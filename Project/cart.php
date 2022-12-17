<?
    require "connectDB.php";                                    
?>
<!doctype php>
<php class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tmart-Minimalist eCommerce php5 Template</title>
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
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- components/header.php -->
        <?  include('components/header.php'); ?>
        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        
        <!-- End Offset Wrapper -->
        <div style="height: 100px;">
            <!-- offset top -->
        </div>
        <div class="cart-main-area bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <script>
                                        var deleteFromCart = function(elem){
                                            let idProduct = elem.id;
                                            document.cookie = 'product'+idProduct+'= ; expires = Thu, 01 Jan 1970 00:00:00 GMT';
                                            let tr = document.getElementById(idProduct+"p");
                                            tr.remove();
                                        };
                                    </script>
                                    <?php
                                        if(count($_COOKIE) > 0){
                                            $productFromCookies = '';
                                            $i = 0;
                                            foreach ($_COOKIE as $key=>$val){
                                                if(!(strpos($key, 'product') === false)){
                                                    if($i == 0){
                                                        $productFromCookies .= $val;
                                                        $i += 1;
                                                    }
                                                    else{
                                                        $productFromCookies .= ",".$val;
                                                    }
                                                }
                                            }

                                            $query = "SELECT product_properties.Value, product.NameProduct, product.PriceProduct, product.IdProduct
                                                from product join product_properties 
                                                on product_properties.IdProduct = product.IdProduct
                                                where product_properties.IdCharacteristic = 3 and product.IdProduct in ($productFromCookies)";

                                            $result = mysqli_query($db, $query);
                                            $sum = 0;
                                            while($all_product_list = mysqli_fetch_array($result)){
                                                $sum += $all_product_list[2];
                                            ?>
                                            <tr id="<?=$all_product_list[3]?>p">
                                                <td class="product-thumbnail"><a href="#"><img src="<?=$all_product_list[0]?>" alt="product img" /></a></td>
                                                <td class="product-name"><a href="#"><?=$all_product_list[1]?></a></td>
                                                <td class="product-price"><span class="amount"><?=$all_product_list[2]?>₽</span></td>
                                                <td class="product-remove"><a onclick="deleteFromCart(this)" id="<?=$all_product_list[3]?>">X</a></td>
                                            </tr>
                                            <?
                                            }
                                        }
                                    ?>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <div class="buttons-cart">
                                        <a href="index.php">Continue Shopping</a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="cart_totals">
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td>
                                                        <strong><span class="amount"><?=$sum?>₽</span></strong>
                                                    </td>
                                                </tr>                                           
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="https://oplata.qiwi.com/create?publicKey=48e7qUxn9T7RyYE1MVZswX1FRSbE6iyCj2gCRwwF3Dnh5XrasNTx3BGPiMsyXQFNKQhvukniQG8RTVhYm3iPqL6r9k4rCb9NrdmV8vVUNYLzDi2HvXpwwquSbSCKx6VNhYAPDgW1mFwV1jJYn6BCWzgSaZjjbo7M2LRmCwpfhnhzXGNs1BRRZEjvXy45r&amount=1&successUrl=http://project/index.php&comment=Привет">Оплатить</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
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

</body>

</php>