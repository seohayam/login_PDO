<?php

    session_start();
    require_once('../classes/LogicFunc.php');

    $result = Logic::loginConfBySession();

    if($result){
        header('Location:mypage.php');
        return;
    }


    //ここがHTMLへ飛ぶ
    $error = $_SESSION;     //$errorにこの時点で$_SESSIONを代入しなとだめ

    $_SESSION = array();
    session_destroy();



?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    
    <title>ログイン</title>
</head>
<body class="text-center m-5">
    <h1 class="my-3">ログイン</h1>
    <form class="my-3" action="loginConf.php" method="POST">
        <div>
            <?php
                
                if(isset($error['error@mypage'])){
                    echo $error['error@mypage'];
                }
            
            ?>
        </div>

        <div>
            <?php
                
                if(isset($error['message'])){
                    echo $error['message'];
                }
            
            ?>
        </div>
        
        <div>
            <input class="mt-3" type="email" name="email" placeholder="メール">
            <?php
            
                if(isset($error['Semail'])){
                    echo $error['Semail'];
                }
            
            ?>
        </div>

        <div>
            <input class="my-3" type="password" name="password" placeholder="パスワード">
            <?php
            
            if(isset($error['Spass'])){
                echo $error['Spass'];
            }
        
            ?>
        </div>

        <input class="btn btn-secondary" type="submit" value="送信">
    
    </form>
    <a class="my-3 btn btn-info" href="singUp.php">新規登録画面へ　＞</a>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>