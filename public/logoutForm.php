<?PHP

    session_start();
    require_once('../classes/LogicFunc.php');

    // セッションが切れていたら、ログインし直してと言うもの
    $result = Logic::loginConfBySession();
    if(!$result){
        exit('セッションが切れてます。ログインし直してちょ！');
    }
    
    // ログアウト関数
    $logout = Logic::logOut();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
    <h1>ログアウト完了</h1>
    <a href="login.php">login</a>
</body>
</html>