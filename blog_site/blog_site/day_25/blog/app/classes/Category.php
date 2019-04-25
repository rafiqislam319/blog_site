<?php
/**
 * Created by PhpStorm.
 * User: 5000 Series
 * Date: 1/21/2019
 * Time: 10:29 PM
 */

namespace App\classes;
use App\classes\Database;


class Category
{
    public function saveCategoryInformation($data){
        $sql ="INSERT INTO categories(category_name,category_description,status) VALUES('$data[category_name]','$data[category_description]','$data[status]')";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Insert Successfully";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    public function getAllCategoryInfo(){
        $sql = "SELECT * FROM categories";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $queryResult = mysqli_query(Database::dbConnection(),$sql);

            //echo '<pre>';
            //print_r($queryResult);
            return $queryResult;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }

    }

    public function getCategoryInfoById($id){
        $sql = "SELECT * FROM categories WHERE id = '$id'";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $queryResult = mysqli_query(Database::dbConnection(),$sql);
            return $queryResult;
            //echo '<pre>';
            //print_r($queryResult);
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    public function updateCategoryInformation($data){
        $sql = "UPDATE categories SET category_name ='$data[category_name]',category_description ='$data[category_description]',status ='$data[status]' WHERE id='$data[id]'";
        if(mysqli_query(Database::dbConnection(),$sql)){
            header('Location:manage-category.php');

        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function deleteCategoryInformation($id){
        $sql = "DELETE FROM categories WHERE id='$id'";
        if(mysqli_query(Database::dbConnection(),$sql)){
            $message = "Delete Successfully";
            return $message;
        }else{
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
}