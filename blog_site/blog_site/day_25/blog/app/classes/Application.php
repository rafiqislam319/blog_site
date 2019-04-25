<?php
/**
 * Created by PhpStorm.
 * User: 5000 Series
 * Date: 2/1/2019
 * Time: 9:19 PM
 */

namespace App\classes;
use App\classes\Database;


class Application
{
    public function getAllPublishedBlogInfo()
    {
        $sql = "SELECT * FROM blogsss WHERE status = 1";
        if (mysqli_query(Database::dbConnection(), $sql)) {
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        } else {
            die("Query Problem" . mysqli_error(Database::dbConnection()));
        }
    }
}