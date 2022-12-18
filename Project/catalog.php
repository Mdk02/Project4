<!doctype php>
<htmml class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Каталог</title>
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

    <body class="search__box__show__hide">
        <!-- ПОТОМ УБРАТЬ КЛАСС -->

        <?php
        require "connectDB.php";


        $sort;

        $search_by_text = $_GET["search"];
        if ($search_by_text) {

            $search_by_text_sql = 'UPPER(product.NameProduct) LIKE UPPER(\'%' . $search_by_text . '%\') and ';
            $search_by_text = '&search=' . $search_by_text;
        };

        $category_id = $_GET["category"];
        switch ($category_id) {
            case 'монитор':
                $category_id = 1;
                break;
            case 'ноутбук':
                $category_id = 2;
                break;
            case 'телевизор LED':
                $category_id = 3;
                break;
            case 'смартфон':
                $category_id = 4;
                break;
        }
        if ($category_id != 0) {
            $category_sql = 'product.IdCategory =' . $category_id . ' and ';
        };

        ?>
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

            <section class="htc__shop__sidebar bg__white ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                            <div class="htc__shop__left__sidebar">



                                <?


                                // Категории найденных товаров
                                if (!isset($category_id)) {

                                    $query = 'select category.NameCategory , Count(*) from product , category
                                where ' . $search_by_text_sql . '
                                product.IdCategory = category.IdCategory
                                GROUP BY category.NameCategory';
                                    $result = mysqli_query($db, $query);
                                    $final = mysqli_fetch_all($result);



                                    if (count($final) > 1) {
                                ?>
                                        <div class="categories-menu mrg-xs">
                                            <div class="category-heading">
                                                <h3>Категории </h3>
                                            </div>

                                            <div class="category-menu-list">
                                                <ul>
                                                    <?
                                                    if (count($final) > 1) {
                                                        foreach ($final as $q) {
                                                    ?>
                                                            <li>
                                                                <a href="/catalog.php?category=<?= $q[0] . $search_by_text ?>">
                                                                    <img alt="" src="images/icons/thum8.png">
                                                                    <?= $q[0] ?> <i class="zmdi">
                                                                        <?= $q[1] ?>
                                                                    </i></a>
                                                            </li>
                                                    <?
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                <?
                                    };
                                };
                                ?>
                                <!-- Start Range -->
                                <!-- Фильтр цены -->
                                <div class="htc-grid-range pt--100">
                                    <h4 class="section-title-4">Поиск по цене</h4>
                                    <div class="content-shopby">
                                        <div class="price_filter s-filter clear">
                                            <form action="#" method="GET">
                                                <div id="slider-range"></div>
                                                <div class="slider__range--output">
                                                    <div class="price__output--wrap">
                                                        <div class="price--output">
                                                            <span>Цена :</span><input type="text" id="amount" readonly>
                                                        </div>
                                                        <div class="price--filter">
                                                            <input type="submit" placeholder="Показать" />
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


                                    <form id="filter-form" action="catalog.php?category=<?= $_GET['category'] ?>" method="post">
                                        <script>
                                            function Filter(aColorFilter, classFilter) {
                                                if (!(aColorFilter.classList.contains(classFilter))) {
                                                    aColorFilter.style.backgroundColor = '#C0C0C0';
                                                    aColorFilter.classList.add(classFilter);
                                                } else {
                                                    aColorFilter.style.backgroundColor = ''
                                                    aColorFilter.className = '';
                                                }
                                            }
                                        </script>
                                        <?
                                        $category_list_sql = "";

                                        $Diagonal = '';
                                        $Matric = '';
                                        if ($category_id == 1) { ?>
                                            <div class="htc__shop__cat">
                                                <h4 class="section-title-4">Диаганаль</h4>
                                                <ul class="sidebar__list">
                                                    <?
                                                    $query = 'SELECT product_properties.Value , COUNT(*) from product_properties join product on product_properties.IdProduct = product.IdProduct WHERE product_properties.IdCharacteristic = 13 and product.IdCategory = 1 GROUP BY product_properties.Value;';
                                                    $result1 = mysqli_query($db, $query);
                                                    $final_Diag = mysqli_fetch_all($result1);
                                                    foreach ($final_Diag as $monitors_diag) {
                                                    ?>
                                                        <li><a onclick="Filter(this,'FilterSelectedDiag')" href="#"><?= $monitors_diag[0] ?><span><?= $monitors_diag[1] ?></span></a></li>
                                                    <?
                                                    }
                                                    ?>
                                                </ul>
                                            </div>

                                            <div class="htc__shop__cat">
                                                <h4 class="section-title-4">Тип матрицы</h4>
                                                <ul class="sidebar__list">
                                                    <?
                                                    $query = 'SELECT `Value`, COUNT(*) FROM `product_properties` WHERE `IdCharacteristic` = 16 GROUP BY `Value`';
                                                    $result = mysqli_query($db, $query);
                                                    $final_monitor = mysqli_fetch_all($result);
                                                    foreach ($final_monitor as $monitors_ips) {
                                                    ?>
                                                        <li><a onclick="Filter(this,'FilterSelectedMonitorMatric')" href="#"><?= $monitors_ips[0] ?><span><?= $monitors_ips[1] ?></span></a></li>
                                                    <?
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        <? };

                                        if ($category_id == 3) { ?>
                                            <div class="htc__shop__cat">
                                                <h4 class="section-title-4">Диаганаль</h4>
                                                <ul class="sidebar__list">
                                                    <li><a href="#"> Меннее 20</a></li>
                                                    <li><a href="#"> 20 - 25</a></li>
                                                    <li><a href="#"> 25.1 - 27</a></li>
                                                    <li><a href="#"> 27.1 - 32</a></li>
                                                    <li><a href="#"> 32 - 38.9</a></li>
                                                    <li><a href="#"> 39 - 48.9</a></li>
                                                    <li><a href="#"> 49 - 54.9 3</a></li>
                                                    <li><a href="#"> 65 и более</a></li>



                                                </ul>
                                            </div>
                                            <div class="htc__shop__cat">
                                                <h4 class="section-title-4">Тип матрицы</h4>
                                                <ul class="sidebar__list">
                                                    <li><a href="#"> MVA<span>0</span></a></li>
                                                    <li><a href="#"> VA<span>0</span></a></li>
                                                    <li><a href="#"> HVA<span>0</span></a></li>
                                                    <li><a href="#"> TFT<span>0</span></a></li>
                                                </ul>
                                            </div>

                                        <? };

                                        if ($category_id == 2) { ?>
                                            <div class="htc__shop__cat">
                                                <h4 class="section-title-4">Диаганаль</h4>
                                                <ul class="sidebar__list">
                                                    <li><a href="#"> Менее 12.9<span>0</span></a></li>
                                                    <li><a href="#"> 13 - 13.9<span>0</span></a></li>
                                                    <li><a href="#"> 14 - 14.9<span>0</span></a></li>
                                                    <li><a href="#"> 15 - 15.9<span>0</span></a></li>
                                                    <li><a href="#"> 16 и более<span>0</span></a></li>

                                                </ul>
                                            </div>
                                            <div class="htc__shop__cat">
                                                <h4 class="section-title-4">Тип матрицы</h4>
                                                <ul class="sidebar__list">
                                                    <li><a href="#"> MVA<span>0</span></a></li>
                                                    <li><a href="#"> VA<span>0</span></a></li>
                                                    <li><a href="#"> HVA<span>0</span></a></li>
                                                    <li><a href="#"> TFT<span>0</span></a></li>
                                                </ul>
                                            </div>

                                        <? };



                                        if ($category_id == 4) { ?>
                                            <div class="htc__shop__cat">

                                                <h4 class="section-title-4">Диаганаль</h4>
                                                <ul class="sidebar__list">
                                                    <?
                                                    $query = 'SELECT product_properties.Value , COUNT(*) from product_properties join product on product_properties.IdProduct = product.IdProduct WHERE product_properties.IdCharacteristic = 13 and product.IdCategory = 4 GROUP BY product_properties.Value;';
                                                    $result = mysqli_query($db, $query);
                                                    $final_monitor = mysqli_fetch_all($result);
                                                    foreach ($final_monitor as $monitors_ips) {
                                                        if (strpos($_POST['PhoneDiag'], '\'' .str_replace('"', '*', $monitors_ips[0]) . '\'')    !==  false){
                                                    ?>
                                                        <li><a onclick="getSelectedPhoneFilter()"><input class="checkboxPhoneDiag" type="checkbox" name="PhoneDiag" value="<?= $monitors_ips[0] ?>" checked> <?= $monitors_ips[0] ?><span><?= $monitors_ips[1] ?></span></a></li>
                                                        <?}else{?>

                                                        <li><a onclick="getSelectedPhoneFilter()"><input class="checkboxPhoneDiag" type="checkbox" name="PhoneDiag" value="<?= $monitors_ips[0] ?>"> <?= $monitors_ips[0] ?><span><?= $monitors_ips[1] ?></span></a></li>
                                                    
                                                    <?
                                                    }}
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="htc__shop__cat">
                                                <h4 class="section-title-4">Тип матрицы</h4>
                                                <ul class="sidebar__list">
                                                    <?
                                                    $query = 'SELECT `Value`, count(*) FROM `product_properties` WHERE `IdCharacteristic` = 205 group BY `Value`;';
                                                    $result = mysqli_query($db, $query);
                                                    $final_monitor = mysqli_fetch_all($result);
                                                    foreach ($final_monitor as $monitors_ips) {

                                                        if (strpos($_POST['PhoneMatric'], '\'' . $monitors_ips[0] . '\'')    !==  false) {
                                                    ?>
                                                            <li><a onclick="getSelectedPhoneFilter()"><input class="checkboxPhoneMatric" type="checkbox" name="PhoneMatric" value="<?= $monitors_ips[0] ?>" checked> <?= $monitors_ips[0] ?><span><?= $monitors_ips[1] ?></span></a></li>
                                                        <? } else {

                                                        ?>

                                                            <li><a onclick="getSelectedPhoneFilter()"><input class="checkboxPhoneMatric" type="checkbox" name="PhoneMatric" value="<?= $monitors_ips[0] ?>"> <?= $monitors_ips[0] ?><span><?= $monitors_ips[1] ?></span></a></li>
                                                    <?
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>


                                            <div class="htc__shop__cat">
                                                <h4 class="section-title-4">Объем встроенной памяти</h4>






                                                <ul class="sidebar__list">
                                                    <?
                                                    $query = 'SELECT `Value` , COUNT(*) FROM `product_properties` WHERE `IdCharacteristic` = 214 GROUP BY `Value`';
                                                    $result = mysqli_query($db, $query);
                                                    $final_monitor = mysqli_fetch_all($result);
                                                    foreach ($final_monitor as $monitors_ips) {
                                                        
                                                        if (strpos($_POST['PhoneGB'], '\'' .$monitors_ips[0] . '\'')    !==  false) {
                                                    ?>
                                                            <li><a onclick="getSelectedPhoneFilter()"><input class="checkboxPhoneGB" type="checkbox" name="PhoneGB" value="<?= $monitors_ips[0] ?>" checked> <?= $monitors_ips[0] ?><span><?= $monitors_ips[1] ?></span></a></li>
                                                        <?
                                                        } else {


                                                        ?>
                                                            <li><a onclick="getSelectedPhoneFilter()"><input class="checkboxPhoneGB" type="checkbox" name="PhoneGB" value="<?= $monitors_ips[0] ?>"> <?= $monitors_ips[0] ?><span><?= $monitors_ips[1] ?></span></a></li>
                                                    <?
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </div>

                                        <?

                                        }; ?>







                                    </form>


                                    <form id="comment-form2" name="form1" action="catalog.php?category=<?= $_GET['category'] ?>" method="post">



                                        <div id="addInfo">
                                        </div>


                                        <div class="htc__login__btn mt--30">

                                            <input form="comment-form2" type="submit" value="Показать">
                                        </div>
                                    </form>
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
                                                <select class="select-color selectpicker" id="sortCatalog" onchange="getOption()">
                                                    <option value="noSort">Без сортировки</option>
                                                    <option value='sortPriceAsce'>По возрастанию цены</option>
                                                    <option value='sortPriceDesce'>По убыванию цены</option>
                                                    <option value='raiting'>Рейтинг</option>
                                                </select>
                                            </div>
                                            <script>
                                                function getOption() {
                                                    let elem = document.getElementById('sortCatalog');
                                                    if (elem.value == 'sortPriceAsce') {
                                                        console.log(elem.value)
                                                        <? $sort = 'product.PriceProduct' ?>
                                                    } else if (elem.value == 'sortPriceDesce') {
                                                        console.log(elem.value)
                                                        <? $sort = 'product.PriceProduct desc' ?>
                                                    } else if (elem.value == 'raiting') {
                                                        console.log(elem.value)
                                                        <? $sort = 'Score' ?>
                                                    } else {
                                                        <? $sort = 'product.idproduct' ?>
                                                    }

                                                }
                                            </script>
                                        </div>

                                        <!-- <ul class="view__mode" role="tablist">
                                            <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                            <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                        </ul> -->

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="shop__grid__view__wrap another-product-style">
                                    <!-- Start Single View -->
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <?



                                        $query = 'select nameproduct, value, priceproduct, product.idproduct , product.DescriptionProduct from product,product_properties 
                                        where ' . $category_sql . $search_by_text_sql . ' product.idproduct = product_properties.idproduct 
                                        and product_properties.idcharacteristic=3 
                                        order by ' . $sort;






                                        if (isset($_POST['PhoneGB']) & isset($_POST['PhoneMatric']) & isset($_POST['PhoneDiag'])) {
                                            $delete = '"';
                                            $query = 'SELECT nameproduct, value, priceproduct, product.idproduct , product.DescriptionProduct from  product,product_properties WHERE product.idproduct = product_properties.IdProduct and product_properties.IdCharacteristic=3 and product.IdProduct in 
                                        (select product.idproduct from product,product_properties where product.IdCategory =4 and product.idproduct = product_properties.idproduct and product_properties.idcharacteristic=214 and VALUE IN (' . $_POST['PhoneGB'] . ') and product.IdProduct in
                                        (select product.idproduct from product,product_properties where product.IdCategory =4 and product.idproduct = product_properties.idproduct and product_properties.idcharacteristic=205 and VALUE IN (' . $_POST['PhoneMatric'] . ')
                                        and product.IdProduct in 
                                        (SELECT product.idproduct from product_properties join product on product_properties.IdProduct = product.IdProduct WHERE product_properties.IdCharacteristic = 13 and product.IdCategory = 4 and VALUE in (' . str_replace("*", $delete,  $_POST['PhoneDiag']) . ') 
                                        
                                        
                                        )))';
                                        }









                                        $result = mysqli_query($db, $query);
                                        $delete = '"';
                                        ?>
                                        <script>
                                            function getSelectedPhoneFilter() {


                                                PhoneDiag = getSelectedFiltersDiag('checkboxPhoneDiag');
                                                PhoneMatric = getSelectedFiltersCharac('checkboxPhoneMatric');
                                                PhoneGB = getSelectedFiltersCharac('checkboxPhoneGB');

                                                if (PhoneDiag.length == 0) {

                                                }

                                                document.getElementById('addInfo').innerHTML = '<input  type="hidden" name="PhoneGB" value=\"' + PhoneGB + '\">';
                                                document.getElementById('addInfo').innerHTML += '<input  type="hidden" name="PhoneDiag" value=\"' + PhoneDiag + '\">';
                                                document.getElementById('addInfo').innerHTML += '<input  type="hidden" name="PhoneMatric" value=\"' + PhoneMatric + '\">';






                                            }

                                            function getSelectedFiltersDiag(nameClass) {
                                                var checkboxes = document.getElementsByClassName(nameClass);
                                                var checkboxesChecked = [];

                                                for (var index = 0; index < checkboxes.length; index++) {
                                                    if (checkboxes[index].checked) {
                                                        checkboxesChecked.push('\'' + checkboxes[index].value + '*' + '\'');
                                                    }
                                                }
                                                if (checkboxesChecked.length == 0) {
                                                    for (var index = 0; index < checkboxes.length; index++) {

                                                        checkboxesChecked.push('\'' + checkboxes[index].value + '*' + '\'');

                                                    }
                                                }

                                                return checkboxesChecked;
                                            }


                                            function getSelectedFiltersCharac(nameClass) {
                                                var checkboxes = document.getElementsByClassName(nameClass);
                                                var checkboxesChecked = [];
                                                for (var index = 0; index < checkboxes.length; index++) {
                                                    if (checkboxes[index].checked) {
                                                        checkboxesChecked.push('\'' + checkboxes[index].value + '\'');

                                                    }
                                                }
                                                if (checkboxesChecked.length == 0) {
                                                    for (var index = 0; index < checkboxes.length; index++) {

                                                        checkboxesChecked.push('\'' + checkboxes[index].value + '\'');


                                                    }
                                                }


                                                return checkboxesChecked;
                                            }

                                            a = <?= ((mysqli_fetch_array($result))[3]); ?>;
                                            console.log('asdfsadfds');
                                            console.log(a);
                                        </script>
                                        <?
                                        while ($all_product_list = mysqli_fetch_array($result)) {
                                        ?>


                                            <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12" id=''>
                                                <div class="product">
                                                    <div class="product__inner">
                                                        <div class="pro__thumb">
                                                            <a href="product.php?id=<?= $all_product_list[3] ?>">
                                                                <img src="<?= $all_product_list[1] ?>" alt="product images">
                                                            </a>
                                                        </div>
                                                        <div class="product__hover__info">
                                                            <ul class="product__action">
                                                                <li>
                                                                    <a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#" onclick="idelVer1('<?= $all_product_list[3] ?>','<?= $all_product_list[1] ?>','<? echo str_replace($delete, ' ', $all_product_list[0]) ?>' ,'Рейтинг','<?= $all_product_list[2] ?>', '<?= $all_product_list[2] ?>', '<? echo str_replace($delete, ' ', $all_product_list[4]) ?>')">
                                                                        <span class="ti-eye"></span>
                                                                    </a>
                                                                </li>
                                                                <li><a title="Добавить в корзину" id=<?= $all_product_list[3] ?> onclick="addToCart(this)"><span class="ti-shopping-cart"></span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product__details">
                                                        <h2><a href="product.php?id=<?= $all_product_list[3] ?>"><?= $all_product_list[0] ?></a></h2>
                                                        <ul class="product__price">
                                                            <li class="new__price"><?= $all_product_list[2] ?> ₽</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?
                                        }
                                        ?>
                                    </div>
                                    <!-- End Single View -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Our ShopSide Area -->


            <!-- Быстрой просмотр  -->


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
                                        <div class="rating__and__review">
                                            <ul class="rating">
                                                <li><span class="ti-star"></span></li>
                                                <li><span class="ti-star"></span></li>
                                                <li><span class="ti-star"></span></li>
                                                <li><span class="ti-star"></span></li>
                                                <li><span class="ti-star"></span></li>
                                            </ul>
                                            <div class="review">
                                                <a href="#">4 customer reviews</a>
                                            </div>
                                        </div>
                                        <div class="price-box-3">
                                            <div class="s-price-box">
                                                <span id="new-price-quick" class="new-price">новыая цена</span>
                                                <span id="old-price-quick" class="old-price">старая цена</span>
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

            <!-- Конец Быстрого про смотра  -->







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

</htmml>