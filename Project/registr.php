<?php require "connectDB.php"; 
?>
<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>
    <form action="registr.php" method="post">
        <p>Логин: <input type="text" name="reglogin" /></p>
        <p>Пароль: <input type="password" name="regpassword" /></p>
        <p><input type="submit" value="Зарегистрироваться"/></p>
    </form>
    <?php      
        if(isset($_POST['reglogin']) and isset($_POST['regpassword'])){
            $sql = "INSERT INTO user (login, password) VALUES ({$_POST['reglogin']}, {$_POST['regpassword']})";
            mysqli_query($conn, $sql);
            $new_url = 'index.php';
            header('Location: '.$new_url);
        }
    ?>
</body>
</php>