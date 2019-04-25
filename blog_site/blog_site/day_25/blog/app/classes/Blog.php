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

        /* for uploading image code strats here */
        $fileName = $_FILES['blog_image']['name'];
        $directory = '../assets/images/';
        $imageUrl = $directory.$fileName;

        $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES['blog_image']['tmp_name']);
        if ($check){
            if ($check){
                if (file_exists($imageUrl)){
                    die('This file already exist,please select anothher image');

                }else{
                    if($_FILES['blog_image']['size'] > 500000){
                        die('Your image is too large,select within 10kb!!!!');
                    }else{
                        if ($fileType !='jpg'&&$fileType!= 'png'&&$fileType!= 'JPG'){
                            die('Image type is not supported, please use jpg or png');
                        }else{

                            move_uploaded_file($_FILES['blog_image']['tmp_name'], $imageUrl);
                            $sql = "INSERT INTO blogsss(category_id,blog_title,short_description,long_description,blog_image,status) VALUES('$data[category_id]','$data[blog_title]','$data[short_description]','$data[long_description]','$imageUrl','$data[status]')";
                            if (mysqli_query(Database::dbConnection(), $sql)) {
                                $message = "Insert Successfully";
                                return $message;
                            } else {
                                die("Query Problem" . mysqli_error(Database::dbConnection()));
                            }

                        }
                    }
                }
            }

        }else{
            die('Please choose a image file');
        }
        /* for uploading image code ends here */

    }





    public function getAllBlogInfo()
    {
        $sql = "SELECT b.*, c.category_name FROM blogsss AS b, categories AS c WHERE b.category_id=c.id";
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
        $blogImage = $_FILES['blog_image']['name'];
        if ($blogImage){

            $sql = "SELECT * FROM blogsss WHERE id = '$data[blog_id]'";
            $queryResult = mysqli_query(Database::dbConnection(),$sql);
            $blogInfo = mysqli_fetch_assoc($queryResult);
            unlink($blogInfo['blog_image']);


            /* for uploading image code strats here */
            $fileName = $_FILES['blog_image']['name'];
            $directory = '../assets/images/';
            $imageUrl = $directory.$fileName;

            $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
            $check = getimagesize($_FILES['blog_image']['tmp_name']);
            if ($check){
                if ($check){
                    if (file_exists($imageUrl)){
                        die('This file already exist,please select anothher image');

                    }else{
                        if($_FILES['blog_image']['size'] > 50000000){
                            die('Your image is too large,select within 10kb!!!!');
                        }else{
                            if ($fileType !='jpg'&&$fileType!= 'png'&&$fileType!= 'JPG'){
                                die('Image type is not supported, please use jpg or png');
                            }else{

                                move_uploaded_file($_FILES['blog_image']['tmp_name'], $imageUrl);
                                $sql = "UPDATE blogsss SET category_id = '$data[category_id]', blog_title = '$data[blog_title]', short_description = '$data[short_description]',long_description = '$data[long_description]', blog_image = '$imageUrl',  status = '$data[status]' WHERE id = '$data[blog_id]'";
                                if (mysqli_query(Database::dbConnection(), $sql)) {
                                    header('Location:manage-blog.php');
                                } else {
                                    die("Query Problem" . mysqli_error(Database::dbConnection()));
                                }

                            }
                        }
                    }
                }

            }else{
                die('Please choose a image file');
            }
            /* for uploading image code ends here */



        }else{
            $sql = "UPDATE blogsss SET category_id = '$data[category_id]', blog_title = '$data[blog_title]', short_description = '$data[short_description]',long_description = '$data[long_description]', status = '$data[status]' WHERE id = '$data[blog_id]'";
            if (mysqli_query(Database::dbConnection(), $sql)) {
                header('Location:manage-blog.php');
            } else {
                die("Query Problem" . mysqli_error(Database::dbConnection()));
            }

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

    public function getAllPublishedCategoryInfo(){
        $sql = "SELECT * FROM categories WHERE status = 1";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);

            //echo '<pre>';
            //print_r($queryResult);
            return $queryResult;
        } else {
            die("Query Problem" . mysqli_error(Database::dbConnection()));
        }
    }
}