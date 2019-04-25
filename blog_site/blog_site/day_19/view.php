<?php

    $result = [];
    $result['word_length'] = '';
    $result['string_length'] = '';
    if (isset($_POST['btn'])){
        require_once 'Example.php';
        $example = new Example();
        $result = $example->wordCharacterCount($_POST);

    }

    //student class er kaj

    require_once 'app/classes/Student.php';
    use App\classes\Student;
    Student::addition();
?>

<form action="" method="post">
    <table>
        <tr>
            <th>Enter your string</th>
            <td><input type="text" name="given_string" size="50"></td>
        </tr>

        <tr>
            <th>Total Number of Word</th>
            <td><input type="text" value="<?php echo $result['string_length']; ?>"></td>
        </tr>

        <tr>
            <th>Total Number of character</th>
            <td><input type="text" value="<?php echo $result['word_length']; ?>"</td>
        </tr>

        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="submit"></td>
        </tr>
    </table>

</form>