<?php 
    ob_start();
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
        <!-- Start Bradcaump area -->
        <!-- <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">login & Register</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">login & Register</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Bradcaump area -->
        <!-- Start Login Register Area -->
        <div class="htc__login__register bg__white ptb--130">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <ul class="login__register__menu" role="tablist">
                            <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Вход</a></li>
                            <li role="presentation" class="register"><a href="#register" role="tab" data-toggle="tab">Регистрация</a></li>
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
                                    <input type="text" placeholder="Почта*" name="user_email">
                                    <input type="password" placeholder="Пароль*" name="user_password">
                                </form>

                                
                                <div class="tabs__checkbox">
                                    <input type="checkbox">
                                    <span> Запомнить</span>
                                    <span class="forget"><a href="#">Забыли пароль?</a></span>
                                </div>
                                <div class="htc__login__btn mt--30">
                                    <input form="login_form" type="submit" value="Войти"/>
                                </div>


                                <?
                                    $sql = 'SELECT * from mydb.users';
                                    $result = mysqli_query($db, $sql);
                        
                                    while ($row = mysqli_fetch_array($result)) {
                                        if($row[5] == $_POST['user_email']){
                                            if($row[7] == $_POST['user_password']){
                                                session_start();
                                                $id = $row[0];
                                                $_SESSION['idUsers'] = $id;
                                                session_write_close();
                                                $new_url = 'index.php';
                                                header('Location: '.$new_url);
                                            }
                                        }
                                    }
                                ?>
                                </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                                <form class="login" method="post">
                                    <input type="text" placeholder="Фамилия*">
                                    <input type="text" placeholder="Имя*">
                                    <input type="text" placeholder="Отчество*">
                                    <input type="date" placeholder="День рождения*">
                                    <input type="tel" placeholder="Номер телефона*">
                                    <input type="email" placeholder="Email*">
                                    <input type="password" placeholder="Пароль*">
                                    <div class="htc__login__btn">
                                        <input type="submit" value="Зарегистрироваться"/>
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

</php>