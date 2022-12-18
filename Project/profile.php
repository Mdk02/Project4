<?php
require "connectDB.php";
session_start();
if (isset($_SESSION['idUsers'])) {
    $query = 'select * from `users` where idUsers = ' . $_SESSION["idUsers"];
    // var_dump($query);
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_row($result);
?>

    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $user[2] ?></title>


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
                                                    <h4>Мои заказы</h4>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#comments" data-toggle="tab">
                                                <div class="tab-menu-text">
                                                    <h4>Мои отзывы</h4>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content another-product-style jump pt--20">
                                    <div class="tab-pane active" id="info">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div role="tabpanel" class="single__tabs__panel tab-pane fade active in">
                                                    <form class="сharacteristics_list" method="post">
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">Фамилия</div>
                                                            <div class="сharacteristic_value wide"><?= $user[1] ?></div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">Имя</div>
                                                            <div class="сharacteristic_value wide"><?= $user[2] ?></div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">Отчество</div>
                                                            <div class="сharacteristic_value wide"><?= $user[3] ?></div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">День рождения</div>
                                                            <div class="сharacteristic_value wide"><?= $user[4] ?></div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">Номер телефона</div>
                                                            <div class="сharacteristic_value wide"><?= $user[6] ?></div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">Email</div>
                                                            <div class="сharacteristic_value wide"><?= $user[5] ?></div>
                                                        </div>
                                                        <!-- <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name ">Пароль</div>
                                                            <div class="сharacteristic_value"><?= $user[7] ?></div>
                                                        </div> -->
                                                    </form>
                                                    <br>
                                                    <div class="htc__login__btn red">
                                                        <!-- СДЕЛАТЬ ВЫХОД -->
                                                        <!-- <input type="submit" onclick="exit()" value="Выйти"> -->
                                                        <a class="p--20 btn-red" href="exit.php">ВЫЙТИ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="edit">
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div role="tabpanel" class="single__tabs__panel tab-pane fade active in">
                                                    <form class="сharacteristics_list" method="post">
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">
                                                                Фамилия
                                                            </div>
                                                            <div class="сharacteristic_value">
                                                                <input type="text" placeholder="Фамилия*" name="surname" required pattern="[А-ЯЁ]{1}[а-яё]*" value="<?= $user[1] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">
                                                                Имя
                                                            </div>
                                                            <div class="сharacteristic_value"><input type="text" placeholder="Имя*" name="name" required pattern="[А-ЯЁ]{1}[а-яё]*" value="<?= $user[2] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">
                                                                Отчество
                                                            </div>
                                                            <div class="сharacteristic_value"><input type="text" placeholder="Отчество*" name="lastname" required pattern="[А-ЯЁ]{1}[а-яё]*" value="<?= $user[3] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">
                                                                День рождения
                                                            </div>
                                                            <div class="сharacteristic_value"><input type="date" placeholder="День рождения*" name="birth" required max="2006-01-01" value="<?= $user[4] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">
                                                                Номер телефона
                                                            </div>
                                                            <div class="сharacteristic_value"><small class="validation_error"><?php echo $errors['tel'] ?? '' ?></small>
                                                                <input type="text" placeholder="Номер телефона*" name="tel" required pattern="[0-9]{10}" value="<?= $user[6] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">
                                                                Email
                                                            </div>
                                                            <div class="сharacteristic_value"><small class="validation_error"><?php echo $errors['mail'] ?? '' ?></small>
                                                                <input type="email" placeholder="Email*" name="mail" required value="<?= $user[5] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="сharacteristic_row">
                                                            <div class="сharacteristic_name vert-middle">
                                                                Пароль
                                                            </div>
                                                            <div class="сharacteristic_value"><input type="password" placeholder="Пароль*" name="password" required value="<?= $user[7] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="htc__login__btn">
                                                            <input type="submit" value="Сохранить"> <!-- СДЕЛАТЬ СОХРАНЕНИЕ -->
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="orders">
                                        <div class="row">
                                            <div class="table-content table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th class="order-thumbnail">ID заказа</th>
                                                            <th class="order-dates">Даты</th>
                                                            <th class="order-content">Содержимое</th>
                                                            <th class="order-price">Цена</th>
                                                            <th class="order-status">Статус</th>
                                                        </tr>
                                                    </thead>
                                                    <?

                                                    $query_o = "SELECT o.* 
                                                        FROM `order` as o 
                                                        WHERE o.IdUser = '3'";

                                                    $result_o = mysqli_query($db, $query_o);

                                                    while ($order = mysqli_fetch_array($result_o)) { ?>
                                                        <tr id="<?= $order[0] ?>">
                                                            <td class="order-thumbnail">
                                                                <span><?= $order[0] ?></span>
                                                            </td>
                                                            <td class="order-dates">
                                                                <span><?= $order[3] ?></span>
                                                                <br>
                                                                <span><?= $order[4] ?></span>
                                                            </td>
                                                            <td class="order-content">
                                                                <?
                                                                $query_p_op = "SELECT p.IdProduct, p.NameProduct, op.Count 
                                                                    FROM `order_product` as op, `product` as p 
                                                                    WHERE op.IdProduct = p.IdProduct AND op.IdOrder = " . $order[0] . "";
                                                                $result_p_op = mysqli_query($db, $query_p_op);

                                                                while ($row = mysqli_fetch_array($result_p_op)) { ?>
                                                                    <div>
                                                                        <a href="product.php?id=<?= $row[0] ?>"> <?= $row[1] ?> </a>
                                                                        <!-- <span> - </span>
                                                                        <span><?= $row[2] ?></span>
                                                                        <span> шт.</span> -->
                                                                    </div>
                                                                <? }
                                                                ?>
                                                            </td>
                                                            <td class="order-price">
                                                                <span class="amount"><?= $order[2] ?> ₽</span>
                                                            </td>
                                                            <td class="order-status">
                                                                <span class="amount"><?= $order[5] ?></span>
                                                            </td>
                                                        </tr>
                                                    <? }

                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="comments">
                                        <div class="row">
                                            <div class="table-content table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th class="comment-product">Продукт</th>
                                                            <th class="comment-date">Дата</th>
                                                            <th class="comment-score">Оценка</th>
                                                            <th class="comment-text">Текст</th>
                                                        </tr>
                                                    </thead>
                                                    <?

                                                    $query_c_p = "SELECT c.*, p.idProduct, p.NameProduct 
                                                        FROM `сomment` as c, `product` as p 
                                                        WHERE c.IdProduct = p.IdProduct AND c.IdUser = '3'";

                                                    $result_c_p = mysqli_query($db, $query_c_p);

                                                    while ($comment = mysqli_fetch_array($result_c_p)) { ?>
                                                        <tr id="<?= $comment[0] ?>">
                                                            <td class="comment-product">
                                                                <a href="product.php?id=<?= $comment[6] ?>"> <?= $comment[7] ?> </a>
                                                            </td>
                                                            <td class="comment-date">
                                                                <span><?= $comment[3] ?></span>
                                                            </td>
                                                            <td class="comment-score">
                                                                <span><?= $comment[4] ?></span>
                                                            </td>
                                                            <td class="comment-text">
                                                                <span><?= $comment[5] ?></span>
                                                            </td>
                                                        </tr>
                                                    <? }

                                                    ?>
                                                </table>
                                            </div>
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

        <!-- <script>
            function exit() {
                <?
                // session_start();
                // session_unset();
                // session_destroy();
                // header("Location: login-register.php"); 
                ?>
            }
        </script> -->
    </body>

    </html>


<? session_write_close();
} else {
    session_write_close();
    header("Location: login-register.php");
} ?>