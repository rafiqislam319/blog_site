<?php


namespace App\classes;
use App\classes\Database;


class Login
{
    public function adminLoginCheck($data){
        $email = $data['email'];
        $password = md5($data['password']);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password='$password'";
        if (mysqli_query(Database::dbConnection(),$sql)){

            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            $user = mysqli_fetch_assoc($queryResult);
            if ($user){

                /* for securing the login and logout process starts here*/
                session_start();
                $_SESSION['id'] =$user['id']; ////ei id and name just ekankar id databse or form theke ase nai
                $_SESSION['name'] = $user['name'];
                /* for securing the login and logout process ends here*/

                header('Location: dashboard.php');
            }else{
                $message = "Please use valid email and password";
                return $message;
            }
        }else{
            die("Query problem".mysqli_error(Database::dbConnecion()));
        }
    }

    //For logout
    public function adminLogout(){
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location:index.php');
    }
}