<?php


namespace App\classes;


class Student
{
    public function saveStudentInfo($data){
        $link = mysqli_connect('localhost','root','','bitm');
        $sql = "INSERT INTO students(name,email,mobile) VALUES('$data[name]','$data[email]','$data[mobile]')";

        if (mysqli_query($link,$sql)){
            $message = "save successfully";
            return $message;

        }else{
            die('Query problem'.mysqli_connect_error($link));
        }
    }

    //for view student info

    public function getAllStudentInfo(){
        $link = mysqli_connect('localhost','root','','bitm');
        $sql = "SELECT * FROM students";
        if (mysqli_query($link,$sql)){
            $queryResult = mysqli_query($link,$sql);
            return $queryResult;

        }else{
            die('Query Problem'.mysqli_error($link));
        }
    }
}