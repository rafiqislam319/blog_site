
<?php
session_start();
if ($_SESSION['id'] ==null){
    header('Location:index.php');
}


require_once '../vendor/autoload.php';
$login = new App\classes\Login();
$category = new App\classes\Category();
use App\classes\Category;

//for edit data start here
 $id = $_GET['id'];
 $queryResult = Category::getCategoryInfoById($id);
 $categoryInfo = mysqli_fetch_assoc($queryResult);
 //echo '<pre>';
// print_r($categoryInfo);

//for edit data ends here



if (isset($_GET['logout'])){
    $login->adminLogout();
}





$message = '';
if (isset($_POST['btn'])){
    $message = $category->updateCategoryInformation($_POST);
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
        <div class="col-sm-8 mx-auto">
            <div class="card">

                <div class="card-body">

                    <h1><?php echo $message;?></h1>

                    <form action="" method="POST">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="category_name" value="<?php echo $categoryInfo['category_name']; ?>">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $categoryInfo['id']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="category_description"><?php echo $categoryInfo['category_description']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio"  name="status" value="1" <?php if ($categoryInfo['status'] =='1') echo "checked";?> >Published
                                <input type="radio"  name="status" value="2" <?php if ($categoryInfo['status'] =='2') echo "checked";?> >Unpublished
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Update Category Info</button>
                            </div>
                        </div>
                    </form>
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