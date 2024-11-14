<?php
   require_once("config.php");
   $firstDayOfMonth = date("1-m-Y"); 
   $totalDaysInMonth = date("t", strtotime($firstDayOfMonth));
   $fetchingStudents = mysqli_query($db, "SELECT * FROM attendance_table") OR die(mysqli_error($db));
   $totalNumberOfStudents = mysqli_num_rows($fetchingStudents);
   $studentsNamesArray = array();
   $studentsIdArray = array();
   $counter = 0;
   while($students = mysqli_fetch_assoc($fetchingStudents)) {
       $studentsNamesArray[] = $students['student_name'];
       $studentsIdArray[] = $students['id'];
   }
?>

<table border="1" cellspacing="0">
    <tr>
        <td rowspan="2">Names</td>
        <?php
            for ($j = 1; $j <= $totalDaysInMonth; $j++) {
                echo "<td>$j</td>";
            }
        ?>
    </tr>
    <tr>
        <?php
            for ($j = 0; $j < $totalDaysInMonth; $j++) {
                echo "<td>" . date("D", strtotime("+$j days", strtotime($firstDayOfMonth))) . "</td>";
            }
        ?>
    </tr>
    <?php
        for ($i = 0; $i < $totalNumberOfStudents; $i++) {
            echo "<tr>";
            echo "<td>" . $studentsNamesArray[$i] . "</td>";
            for ($j = 1; $j <= $totalDaysInMonth; $j++) {
                $dateOfAttendance = date("Y-m-$j");
                $fetchingStudentsAttendance = mysqli_query($db, "SELECT attendance FROM add_attendance WHERE student_id = '" . $studentsIdArray[$i] . "' AND curr_date = '" . $dateOfAttendance . "'") OR die(mysqli_error($db));
                $isAttendanceAdded = mysqli_num_rows($fetchingStudentsAttendance);
                if($isAttendanceAdded > 0) {
                    $studentAttendance = mysqli_fetch_assoc($fetchingStudentsAttendance);
                    if($studentAttendance['attendance'] == "P") {
                        $color = "green";
                    } else if($studentAttendance['attendance'] == "A") {
                        $color = "red";
                    } else if($studentAttendance['attendance'] == "L") {
                        $color = "brown";
                    } else {
                        $color = "blue";
                    }
                    echo "<td style='background-color:$color; color:white'>" . $studentAttendance['attendance'] . "</td>";
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
    ?>
</table>
