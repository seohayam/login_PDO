<?php
    require_once('../DB.php');

    Class Logic {


        /**インサート
         * @param array  $userData
         * @return bool $result  
         */

        public static function insert($userData){


            $result = false;

            $sql = 'INSERT INTO user(name,email,password) VALUES(?,?,?)';

            $array = [];
            $array[] = $userData['name'];
            $array[] = $userData['email'];
            $array[] = password_hash($userData['password'],PASSWORD_DEFAULT);

                // $stmt-> bindParam(':name',$userData['name'],PDO::PARAM_STR);
                // $stmt-> bindParam(':email',$userData['email'],PDO::PARAM_STR);
                // $stmt-> bindParam(':password',$userData['password'],PDO::PARAM_STR);

            try{
                $stmt = dbh()->prepare($sql);
                $result = $stmt->execute($array);    

                return $result;

            }catch(\Exception $e){
                return $result;
            }

        }

         /**ログイン機能（パスワード一致とsession生成）
         * @param array     $email,$password
         * @return bool $result  
         * 
         * 流れ
         * emailを照合する
         * パスワードを照合する
         */

        public static function loginFunc($email,$password){

            $result = false;

            if(!$userData = self::getByUserData($email)){
                $_SESSION['message'] = 'メアド一致しなくね？';
                return $result;
            }

            if(password_verify($password,$userData['password'])){

                session_regenerate_id(true);
                $_SESSION['session_login_user'] = $userData;
                $result  = true;
                return $result;

            }else{
                $_SESSION['message'] = 'パスワードちがくね？';
                return $result;
            }


        }



        /**ユーザーデータ取得
         * @param array     $email
         * @return fetch | bool    $result
         */


        public static function getByUserData($email){

            $result = false;

            $sql = "SELECT * FROM user WHERE email = ?";

            $array = [];
            $array[] = $email;

            try{

                $stmt = dbh()->prepare($sql);
                $stmt->execute($array);
                $result = $stmt->fetch();
                return $result;

            } catch(\PDOException $e){

                echo $e->getMessage();
                return $result;

            }

        }

        /**ログインしているかどうかを前に作成したsessionで確認する
         * @param void
         * @return bool    $result
         */


        public static function loginConfBySession(){

            $result = false;

            if(isset($_SESSION['session_login_user']) && $_SESSION['session_login_user']['id'] > 0){
                
                $result =true;

                return $result;
            }

            return $result;

        }

        /**ログアウト
         * @param void
         * @return bool    $result
         */


        public static function logOut(){

            $_SESSION = array();
            session_destroy();            
        }

    }





?>