<?php
require_once 'vendor/autoload.php';
use App\classes\Student;

/*For delete part starts here*/
$message='';

if (isset($_GET['delete'])){
    $id = $_GET['id'];
    $message = Student::deleteStudentInfo($id);
}

/*For delete part ends here*/


/*For view part ends here*/
$queryResult = Student::getAllStudentInfo();
/*For view part ends here*/

?>





<hr/>
<a href="add-students.php">Add student</a>
<a href="view-student.php">View student</a>
<h1 style="..."><?php echo $message;?></h1>
<hr/>



<table border="1"width="700" align="center">
    <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Student Email</th>
        <th>Student Mobile</th>
        <th>Action</th>
    </tr>
   <?php while ($student = mysqli_fetch_assoc($queryResult)) {?>
    <tr>
        <td><?php echo $student['id']; ?></td>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['mobile']; ?></td>
        <td>
            <a href="edit-student.php?id=<?php echo $student['id']; ?>">Edit</a>
            <a href="?delete=true&id=<?php echo $student['id']; ?>" onclick="return confirm('Are you sure to delete this');">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
