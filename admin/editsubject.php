<?php
$sid = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Table</title>
    <style>
        .button {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #fff;
            background-color: red;
            border-color: #2e6da4;
            text-decoration: none;
        }

        .button2 {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #fff;
            background-color: lightseagreen;
            border-color: #2e6da4;
            text-decoration: none;
        }

        .container {
            display: flex;
            padding: 10px;
        }

        .dlabel {
            color: black;
            padding: 10px 10px;
            text-align: start;
            font-size: 40px;
            border-bottom: solid blue 2px;
        }

        .thead-main {
            text-align: center;
            height: 100%;
            width: 100%;
            margin-left: 175px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .th-tr {
            background-color: lightblue;
        }

        .fieldset {
            border: 1px solid #ccc;
            padding: 20px;
            width: 400px;
            height: 500px;
            margin: 100px auto;
            background-color: lightblue;

        }

        .fieldset legend {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .fieldset .row {
            margin-bottom: 15px;
        }

        .fieldset label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .fieldset input,.fieldset select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .fieldset .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .fieldset .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php include('sidebar.php'); ?>
        <div class="thead-main">
            <div class="dlabel">
                Edit Faculty
            </div>

            <?php
            $sql = "SELECT * FROM subject WHERE id = $sid";
            $result = $conn->query($sql);
            $row = mysqli_fetch_assoc($result);

            $facultyQuery = "SELECT * FROM faculty";
            $facultyResult = mysqli_query($conn, $facultyQuery);

            $semesterQuery = "SELECT * FROM semester";
            $semesterResult = mysqli_query($conn, $semesterQuery);
            ?>
            <div class="fieldset">
                <form action="" method="post" data-validate="parsley">
                    <div class="row">
                        <label for="subjectcode">Subject Code</label>
                        <input type="text" value="<?php echo $row['subjectcode'] ?>" name="subjectcode" id="subjectcode" required>
                    </div>
                    <div class="row">
                        <label for="subjectname">Subject Name</label>
                        <input type="text" value="<?php echo $row['subjectname'] ?>" name="subjectname" id="subjectname" required>
                    </div>
                    <div class="row">
                        <label for="credithour">Credit Hour</label>
                        <input type="number" value="<?php echo $row['credithour'] ?>" name="credithour" id="credithour" required>
                    </div>
                    <div class="row">
                        <label for="faculty">Faculty</label>
                        <select name="faculty" required>
                            <?php
                            while ($facultyRow = mysqli_fetch_assoc($facultyResult)) {
                                echo '<option value="' . $facultyRow['faculty_name'] . '">' . $facultyRow['faculty_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row">
                        <label for="semester">Semester</label>
                        <select name="semester" required>
                            <?php
                            while ($semesterRow = mysqli_fetch_assoc($semesterResult)) {
                                echo '<option value="' . $semesterRow['semester_name'] . '">' . $semesterRow['semester_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <input class="btn" type="submit" value="Update">
                </form>

            </div>
        </div>
    </div>
    </div>
    </div>

    <style>

    </style>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $subjectcode = $_POST['subjectcode'];
    $subjectname = $_POST['subjectname'];
    $credithour = $_POST['credithour'];
    $faculty = $_POST['faculty'];
    $semester = $_POST['semester'];

    $query = "UPDATE subject SET subjectname = '$subjectname', credithour = '$credithour', faculty = '$faculty', semester = '$semester' WHERE subjectcode = '$subjectcode'";
    if (mysqli_query($conn, $query)) {

        echo '<script>alert("Subject Updated Sucessfully")</script>';
        echo "<script>window.location.href='subject.php'</script>";
    } else {
        echo '<script>alert("Error please try again.")</script>';
        echo "<script>window.location.href='subject.php'</script>";
    }
}
$conn->close();
?>