<form method="POST"> 
    <input type="text" name="student_name" placeholder="Student name" required autofocus />
    <input type="submit" value="Add Student" name="Submit">
</form>

<?php
if (isset($_POST['Submit'])) { 
    require_once("config.php");

    $student_name = mysqli_real_escape_string($db, $_POST['student_name']);
    
    $query = "INSERT INTO attendance_table (student_name) VALUES ('$student_name')"; 
    
    if (mysqli_query($db, $query)) {
        echo "Student has been added successfully.";
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>
