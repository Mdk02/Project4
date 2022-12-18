<?php
ob_start();
require "connectDB.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Авторизация</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo.svg">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
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

    <!-- Body main wrapper start -->
    <div class="wrapper fixed__footer">
        <!-- components/header.php -->
        <? include('components/header.php'); ?>


        <div class="body__overlay"></div>

        <!-- Start Login Register Area -->
        <div class="htc__login__register bg__white pt--200 pb--300">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="#login" id="open_login" role="tab" data-toggle="tab">Вход</a></li>
                            <li role="presentation" class="register"><a href="#register" id="open_register" role="tab" data-toggle="tab">Регистрация</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Start Login Register Content -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="htc__login__register__wrap">
                            <!-- Start Single Content -->
                            <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                                <form class="login" method="post" action="login-register.php" id="login_form">
                                    <input type="email" placeholder="Почта*" name="userEmail">
                                    <input type="password" placeholder="Пароль*" name="userPassword">
                                </form>
                                <div class="tabs__checkbox">
                                    <input type="checkbox">
                                    <span> Запомнить</span>
                                    <span class="forget"><a href="#">Забыли пароль?</a></span>
                                </div>
                                <div class="htc__login__btn mt--30">
                                    <input form="login_form" type="submit" value="Войти" />
                                </div>
                            </div>
                            <?
                            if (isset($_POST['userEmail']) & isset($_POST['userPassword'])) {


                                $sql = 'SELECT * from mydb.users';
                                $result = mysqli_query($db, $sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    if ($row[5] == $_POST['userEmail']) {
                                        if ($row[7] == $_POST['userPassword']) {
                                            session_start();
                                            $id = $row[0];
                                            $_SESSION['idUsers'] = $id;
                                            session_write_close();
                                            $new_url = 'index.php';
                                            header('Location: ' . $new_url);
                                        }
                                    }
                                }
                            }
                            ?>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <?
                            if (isset($_POST['tel']) & isset($_POST['mail'])) {
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $sql = 'SELECT * from mydb.users';
                                    $result1 = mysqli_query($db, $sql);
                                    $errors = [];

                                    while ($row = mysqli_fetch_array($result1)) {
                                        if ($row[6] == $_POST['tel']) {
                                            $errors['tel'] = "Этот номер телефона уже использует кто-то другой";
                                        } else if ($row[5] == $_POST['mail']) {
                                            $errors['mail'] = "Эта почта используется кем-то другим";
                                        }
                                    }

                                    if (count($errors) < 1 and !isset($_POST['userEmail']) and !isset($_POST['userPassword'])) {
                                        $sql = "INSERT INTO users (SurnameUser, NameUser, LastnameUser, Birthday, Email, TelNumber, Password, IdRole) VALUES ('{$_POST['surname']}','{$_POST['name']}', '{$_POST['lastname']}', '{$_POST['birth']}', '{$_POST['mail']}', '{$_POST['tel']}', '{$_POST['password']}', '2')";
                                        mysqli_query($db, $sql);
                                        header("Location: login-register.php");
                                        die;
                                    }
                                }
                            }
                            ?>
                            <!-- Добавить паттерны для строк, очистить форму -->
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                <form class="login" method="post">
                                    <input type="text" placeholder="Фамилия*" name="surname" required pattern="[А-ЯЁ]{1}[а-яё]*">
                                    <input type="text" placeholder="Имя*" name="name" required pattern="[А-ЯЁ]{1}[а-яё]*">
                                    <input type="text" placeholder="Отчество*" name="lastname" required pattern="[А-ЯЁ]{1}[а-яё]*">
                                    <input type="date" placeholder="День рождения*" name="birth" required max="2006-01-01">
                                    <small class="validation_error"><?php echo $errors['tel'] ?? '' ?></small>
                                    <input type="text" placeholder="Номер телефона*" name="tel" required pattern="[0-9]{10}">
                                    <small class="validation_error"><?php echo $errors['mail'] ?? '' ?></small>
                                    <input type="email" placeholder="Email*" name="mail" required>
                                    <input type="password" placeholder="Пароль*" name="password" required>
                                    <div class="htc__login__btn">
                                        <input type="submit" value="Зарегистрироваться">
                                    </div>
                                </form>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
                <!-- End Login Register Content -->
            </div>
        </div>
        <!-- End Login Register Area -->


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