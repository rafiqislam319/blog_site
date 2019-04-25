
<?php
session_start();
if ($_SESSION['id'] ==null){
    header('Location:index.php');
}


require_once '../vendor/autoload.php';
$login = new App\classes\Login();
$blog = new App\classes\Blog();
use App\classes\Blog;

$queryResult2 = $blog->getAllPublishedCategoryInfo();
//for edit data start here
$id = $_GET['id'];
$queryResult = Blog::getBlogInfoById($id);
$blogInfo = mysqli_fetch_assoc($queryResult);
// echo '<pre>';
// print_r($blogInfo);

//for edit data ends here


if (isset($_GET['logout'])){
    $login->adminLogout();
}

$message = '';
if (isset($_POST['btn'])){
    $message = Blog::updateBlogInfo($_POST);
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



                    <form action="" method="POST" name="editBlogForm" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                                <select name="category_id" class="form-control">
                                    <option>---Select Category Name---</option>
                                    <?php while ($category = mysqli_fetch_assoc($queryResult2)) {?>
                                        <option value="<?php echo $category['id'];?>"><?php echo $category['category_name'];?></option>
                                    <?php }?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="blog_title" value="<?php echo $blogInfo['blog_title'];?>" class="form-control"/>

                            </div>
                            <div>
                                <input type="hidden" name="blog_id" value="<?php echo $blogInfo['id'];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description"><?php echo $blogInfo['short_description'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control textarea" name="long_description"><?php echo $blogInfo['long_description'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Blog Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="blog_image" accept="image/*"/>
                                <img src="<?php echo $blogInfo['blog_image']?>"alt="" height="100"width="100"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Publication Status</label>
                            <div class="col-sm-9">
                                <input type="radio"  name="status" value="1"<?php if ($blogInfo['status'] =='1') echo "checked";?>>Published
                                <input type="radio"  name="status" value="2"<?php if ($blogInfo['status'] =='2') echo "checked";?>>Unpublished
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Update Blog Info</button>
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
<script src="../assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'.textarea' });</script>
<script src="../assets/js/bootstrap.min.js"></script>

<script>
    document.forms['editBlogForm'].elements['category_id'].value = '<?php echo $blogInfo['category_id'];?>';
</script>
</body>
</html>