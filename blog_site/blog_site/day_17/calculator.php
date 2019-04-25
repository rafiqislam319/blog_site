
<?php
    $result = ' ';
if (isset($_POST['btn'])){
    require_once 'FullName.php';
    $fullName = new FullName();
     $result = $fullName->myCalculator($_POST);
}
?>


<form action="" method="post">
    <table>
        <tr>
            <th>First Numner</th>
            <td><input type="text" name="first_number" value="<?php echo $_POST['first_number'];?>"></td>
        </tr>
        <tr>
            <th>Last Numner</th>
            <td><input type="text" name="last_number" value="<?php echo $_POST['last_number'];?>"></td>
        </tr>
        <tr>
            <th>Result</th>
            <td><input type="text" value="<?php echo $result?>" name="result"></td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="submit" name="btn" value="+">
                <input type="submit" name="btn" value="-">
                <input type="submit" name="btn" value="*">
                <input type="submit" name="btn" value="/">
                <input type="submit" name="btn" value="%">
            </td>
        </tr>
    </table>
</form>