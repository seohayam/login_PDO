<?php

/*
*xss対策（文字列を暗号化する）
*@param string ＄strin　引数
*@param string string　　リターン 
htmtlspecialchart(文字列、処理項目、文字列の方＜ほとんどがutf8＞)
処理項目：ENT_QUOTES
echoに全てつける
*/

function xss($string){

    return htmlspecialchars($string,ENT_QUOTES,'UTF-8');

}

/*CSRF対策
*二重送信、不正リンク防止
＊＠param void（引数がないと言う事）
＊＠param string $csrf
＊流れ
・トークンを生成                security.php
・フォームからトークンを送信        新規登録画面
・CSRF対策流バリデーション
    確認が面で送られたsession['csr']がない場合      確認画面
    送られたものと$csrfが一致しない場合
        exit()でエラーを表示
・トークンを消去                security.php
*/

function csrf(){

    session_start();
    $csrf = bin2hex(random_bytes(32));
    $_SESSION['csrf'] = $csrf;

    return $csrf;

}


?>