
<?php
$link = mysqli_connect('localhost','root','','bitm');

    echo '<pre>';
    print_r($_POST);
//    print_r($_FILES);
//    echo $_FILES['image_file']['name'];

if (isset($_POST['btn'])){








    $fileName = $_FILES['image_file']['name'];
    $directory = 'images/';
    $imageUrl = $directory.$fileName;

    $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES['image_file']['tmp_name']);
    if ($check){
        if ($check){
            if (file_exists($imageUrl)){
                die('This file already exist,please select anothher image');

            }else{
                if($_FILES['image_file']['size'] > 500000){
                    die('Your image is too large,select within 10kb!!!!');
                }else{
                    if ($fileType !='jpg'&&$fileType!= 'png'&&$fileType!= 'JPG'){
                        die('Image type is not supported, please use jpg or png');
                    }else{

                        move_uploaded_file($_FILES['image_file']['tmp_name'], $imageUrl);
                        $sql = "INSERT INTO image(image_file) VALUES('$imageUrl')";
                        mysqli_query($link, $sql);
                        echo 'Image upload and save successfully';
                    }
                }
            }
        }

    }else{
        die('Please choose a image file');
    }
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Select File</th>
            <td><input type="file" name="image_file"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="submit"></td>
        </tr>
    </table>
</form>

<hr/>


<?php
    $sql = "SELECT * FROM image ";
    $queryResult = mysqli_query($link,$sql);
?>

<table>
    <?php while ($image = mysqli_fetch_assoc($queryResult)) { ?>
    <tr>
        <td><img src="<?php echo $image['image_file'];?>" alt="" height="100" width="100"></td>
    </tr>
    <?php }?>
</table>