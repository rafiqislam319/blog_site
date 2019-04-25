
<?php
session_start();
if ($_SESSION['id'] ==null){
    header('Location:index.php');
}


require_once '../vendor/autoload.php';
$login = new App\classes\Login();
$category = new App\classes\Category();

/* for delete part starts here*/
$message ='' ;
if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $message = $category->deleteCategoryInformation($id);

}
/*for delete part ends here */

$queryResult = $category->getAllCategoryInfo();





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
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Description</th>
                            <th scope="col">Publication Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <?php while ($categoryResult = mysqli_fetch_assoc($queryResult)) { ?>
                        <tbody>
                        <tr>
                            <th scope="row"><?php echo $categoryResult['id'] ?></th>
                            <td><?php echo $categoryResult['category_name'] ?></td>
                            <td><?php echo $categoryResult['category_description'] ?></td>
                            <td><?php echo $categoryResult['status'] ?></td>
                            <td>
                                <a href="edit-category.php?id=<?php echo $categoryResult['id'];?>">Edit</a>
                                <a href="?delete=true&id=<?php echo $categoryResult['id']; ?>" onclick="return confirm('Are you sure to delete this');">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>


                        </tbody>
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