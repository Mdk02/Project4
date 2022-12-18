<h2>addCommentPage</h2>


<? if (isset($_POST['сommentText']) & isset($_POST['rating'])) {
    $today = date("Y-m-d H:i:s");
    $sql = "INSERT INTO comment (IdUser, IdProduct, DateOfCreate, Score, CommentText) VALUES ( '{$_SESSION['idUsers']}','{$_GET['id']}','{$today}','{$_POST['rating']}', '{$_POST['сommentText']}')";
    mysqli_query($db, $sql);
    header("Location: login-register.php");
    die;
} ?>