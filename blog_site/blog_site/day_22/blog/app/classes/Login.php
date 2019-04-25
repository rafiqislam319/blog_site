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
                header('Location: dashboard.php');
            }else{
                $message = "Please use valid email and password";
                return $message;
            }
        }else{
            die("Query problem".mysqli_error(Database::dbConnecion()));
        }
    }
}