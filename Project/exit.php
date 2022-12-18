<?php 
// setcookie('user', $user['name'], time() - 3600, "/");

session_start();

// 1 способ
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}
if (isset($_SESSION['idUsers'])) {
    unset($_SESSION['idUsers']);
}

// // 2 способ
session_destroy();

header('Location: /');
// echo($_SESSION['idUsers']);
?>
