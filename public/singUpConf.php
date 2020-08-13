<?php
    session_start();
    require_once('../classes/LogicFunc.php');

    $error = [];        //errorを入れる箱

    // セキュリティー
    $csrfPosted = filter_input(INPUT_POST,'csrf_posted');       //送られたトークン

    if(!isset($_SESSION['csrf']) || $_SESSION['csrf']  !== $csrfPosted){

        exit('不正です'); 

    }
    
    unset($_SESSION['csrf']);


    if(!$name = filter_input(INPUT_POST,'name')){               //name
        $error[] = '名前を入力して下さい'.'<br>';
    }

    if(!$emai = filter_input(INPUT_POST,'email')){              //email
        $error[] = 'メールを入力して下さい'.'<br>';
    }

    $password = filter_input(INPUT_POST,'password');            //password
    
    if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)){
        $error[] = 'このパスワードは使用出来ません'.'<br>';
    }

    $password_conf = filter_input(INPUT_POST,'password_conf');   //passowrd_conf

    if(!$password == $password_conf){
        $error[] = 'パスワードが異なっています。'.'<br>';
    }

    if(count($error) === 0){
        Logic::insert($_POST);
    }else{
        $erro[] = 'インサート失敗';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録確認</title>
</head>
<body>
    <h1>登録確認画面</h1>

    <div id="confirm">

        <?php
            if(count($error) > 0){
                // エラーを表示
                foreach($error as $e){
                    echo $e;
                }
            }else{
                //登録完了を表示
                echo '登録完了';
            }
        ?>

    </div>




    <button><a href="singUp.php">登録画面へ戻る</a></button>
</body>
</html>