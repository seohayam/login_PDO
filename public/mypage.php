<?php
session_start();
require_once('../classes/LogicFunc.php');
require_once('../security.php');

$result = Logic::loginConfBySession();

if(!$result){
    $_SESSION['error@mypage'];
    header('Location:login.php');
    return;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
</head>
<body>
    <h1>マイページ</h1>
    <p>名前：<?php echo xss($_SESSION['session_login_user']['name']);?></p>
    <p>email：<?php echo xss($_SESSION['session_login_user']['email']);?></p>

    <form action="logoutForm.php" method="POST">

        <input type="submit" name="logout" value="logout">

    </form>
</body>
</html>