<?php require "connectDB.php"; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
    <form action="enter.php" method="post">
        <p>Логин: <input type="text" name="enterlogin" /></p>
        <p>Пароль: <input type="password" name="password" /></p>
        <p><input type="submit" value="Войти"/></p>
    </form>
    <?php
        if(isset($_POST['enterlogin']) and isset($_POST['password'])){
            $sql = 'SELECT * from user';

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                if($row['login'] == $_POST['enterlogin']){
                    if($row['password'] == $_POST['password']){
                        session_start();
                        $id = $row['user_id'];
                        $_SESSION['id'] = $id;
                        $new_url = 'index.php';
                        header('Location: '.$new_url);
                    }
                }
            }
        }
    ?>
</body>
</html>