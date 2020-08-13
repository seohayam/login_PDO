<?php
    require_once('../classes/LogicFunc.php');

    session_start();


    $error = [];        //errorを入れる箱


    if(!$email = filter_input(INPUT_POST,'email')){              //email
        $error['Semail'] = 'メールを入力して下さい'.'<br>';
    }


    if(!$password = filter_input(INPUT_POST,'password')){   //passowrd_conf
        $error['Spass'] = 'パスワードを入力して下さい'.'<br>';
    }

    // エラーがあれば戻す
    if(count($error) > 0){
        $_SESSION = $error;
        header('Location:login.php');
    }

    //パスワードを一致させ、ユーザーのデータのsessionを作成する
    $userDataBySession = Logic::loginFunc($email,$password);     //ここでの$emalと$passwordはfilter_inputの所で生成されている

    if(!$userDataBySession){        //値がfalseで帰ってきた場合
        header('Location:login.php');
        return $userDataBySession;
    }else{
        echo 'ログインが成功しました';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン完了</title>
</head>
<body>
    <h1>ログイン完了</h1>
    <!-- ログインのエラーを表示 -->
    <!-- <div id="confirm">

        <?php
            if(count($error) > 0){
                // エラーを表示
                foreach($error as $e){
                    echo $e;
                }
            }
        ?>

    </div>
 -->
    <button><a href="mypage.php">マイページへ</a></button>
</body>
</html>