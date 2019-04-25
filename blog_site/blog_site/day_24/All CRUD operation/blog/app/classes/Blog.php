<?php
/**
 * Created by PhpStorm.
 * User: 5000 Series
 * Date: 1/21/2019
 * Time: 7:02 PM
 */

namespace App\classes;
use App\classes\Database;


class Blog
{
    public function saveBlogInformation($data)
    {
        $sql = "INSERT INTO blogsss(category_name,blog_title,short_description,long_description,status) VALUES('$data[category_name]','$data[blog_title]','$data[short_description]','$data[long_description]','$data[status]')";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $message = "Insert Successfully";
            return $message;
        } else {
            die("Query Problem" . mysqli_error(Database::dbConnection()));
        }
    }

    public function getAllBlogInfo()
    {
        $sql = "SELECT * FROM blogsss";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);

            //echo '<pre>';
            //print_r($queryResult);
            return $queryResult;
        } else {
            die("Query Problem" . mysqli_error(Database::dbConnection()));
        }

    }

    public function getBlogInfoById($id){
        $sql = "SELECT * FROM blogsss WHERE id = '$id'";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);

            //echo '<pre>';
            //print_r($queryResult);
            return $queryResult;
        } else {
            die("Query Problem" . mysqli_error(Database::dbConnection()));
        }
    }

    public function updateBlogInfo($data){
        $sql = "UPDATE blogsss SET category_name = '$data[category_name]', blog_title = '$data[blog_title]', short_description = '$data[short_description]',long_description = '$data[long_description]', status = '$data[status]' WHERE id = '$data[id]'";
        if (mysqli_query(Database::dbConnection(), $sql)) {


            //echo '<pre>';
            //print_r($queryResult);
           header('Location: manage-blog.php');
        } else {
            die("Query Problem" . mysqli_error(Database::dbConnection()));
        }
    }

    public function deleteBlogInfo($id){
        $sql = "DELETE FROM blogsss WHERE id = '$id'";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Delete Successfully";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
}