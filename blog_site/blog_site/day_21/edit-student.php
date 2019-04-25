<?php
require_once 'vendor/autoload.php';
use App\classes\Student;

$id = $_GET['id'];
$queryResult = Student::getStudentInfoById($id);
$student = mysqli_fetch_assoc($queryResult);


if (isset($_POST['btn'])){
    Student::updateStudentInfo($_POST);
}
?>



<hr/>

<a href="add-students.php">Add student</a>
<a href="view-student.php">View student</a>


<hr/>
<form action="" method="post">
    <table align="center">
        <tr>
            <th>Name</th>
            <td>
                <input type="text" name="name" value="<?php echo $student['name'];?>">
                <input type="hidden" name="id" value="<?php echo $student['id'];?>">
            </td>
        </tr>
        <th>Email</th>
        <td><input type="email" name="email" value="<?php echo $student['email'];?>"></td>
        </tr>
        <th>Mobile</th>
        <td><input type="number" name="mobile" value="<?php echo $student['mobile'];?>"></td>
        </tr>
        <th></th>
        <td><input type="submit" name="btn" value="Update"></td>
        </tr>
    </table>

</form>