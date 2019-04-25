
<?php
session_start();
if ($_SESSION['id'] ==null){
    header('Location:index.php');
}


require_once '../vendor/autoload.php';
$login = new App\classes\Login();
$blog = new App\classes\Blog();

/* for delete part starts here*/
$message ='' ;
if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $message = $blog->deleteBlogInfo($id);

}
/*for delete part ends here */


$id = $_GET['id'];
$queryResult = $blog->getBlogInfoById($id);
$blogInfo = mysqli_fetch_assoc($queryResult);



if (isset($_GET['logout'])){
    $login->adminLogout();
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

<?php include 'includes/menu.php';?>

<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="card">

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Blog Id</th>
                            <th><?php echo $blogInfo['id'];?></th>
                        </tr>
                        <tr>
                            <th>Blog Title</th>
                            <th><?php echo $blogInfo['blog_title'];?></th>
                        </tr>
                        <tr>
                            <th>Category Id</th>
                            <th><?php echo $blogInfo['category_id'];?></th>
                        </tr>
                        <tr>
                            <th>Blog Short Description</th>
                            <th><?php echo $blogInfo['short_description'];?></th>
                        </tr>
                        <tr>
                            <th>Blog Long Description</th>
                            <th><?php echo $blogInfo['long_description'];?></th>
                        </tr>
                        <tr>
                            <th>Blog Image</th>
                            <th><img src="<?php echo $blogInfo['blog_image'];?>" alt="" height="200" width="250"/></th><
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <th><?php echo $blogInfo['status'] ==1 ? 'published': 'unpublished' ?></th>
                        </tr>
                    </table>

                </div>

            </div>
        </div>

    </div>

</div>

<script src="../assets/js/jquery-3.3.1.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>