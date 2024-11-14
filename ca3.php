<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Attendance System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .container-fluid {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px;
        }

        .row > * {
            flex: 1 1 auto;
            padding: 10px;
        }

        .attendance-sheet {
            flex: 2 1 0;
        }

        .student-actions {
            flex: 1 1 0;
        }

        @media (max-width: 768px) {
            .attendance-sheet,
            .student-actions {
                flex: 0 0 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <header>
            <div class="row">
                <div class="col-12">
                    <h1>SMART ATTENDANCE MANAGEMENT SYSTEM </h1>
                    <h3>STUDENT ATTENDANCE OF MONTH: <u><?php echo strtoupper(date("F"));?></u></h3>
                </div>
            </div>
        </header>
        <div class="row">
            <div class="attendance-sheet">
               <?php require_once("smartAttendanceSheet.php");?>
            </div>
            <div class="student-actions">
            <?php require_once("addingStudent.php");?>
            <hr>
            <?php require_once("addAttendance.php");?>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
