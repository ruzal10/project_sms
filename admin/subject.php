<!DOCTYPE html>
<html>

<head>
    <title>Student Table</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>


    <style>
        .btn {
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

        .btn2 {
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

        .popup-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* Popup box content */
        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            width: 500px;
        }

        /* Close button */
        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }


        .popup-content span i {
            font-size: 18px;
        }

        .popup-content form {
            margin-top: 20px;
        }

        .popup-content label {
            display: block;
            text-align: start;
            margin-bottom: 10px;
        }

        .popup-content input,
        .popup-content select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php include('sidebar.php'); ?>
        <div class="thead-main">
            <div class="dlabel">
                Our Subjects
            </div>
            <div class="dlabel" style="border-bottom:none;">
                <button class="btn2" onclick="openPopup()">Add Subject</button>
            </div>
            <div class="table-responsive">
                <table id="subjecttbl" class="table table-striped">
                    <thead>
                        <tr class="th-tr">
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Credit Hour</th>
                            <th>Faculty</th>
                            <th>Semester</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM subject";
                        $result = $conn->query($sql);

                        $facultyQuery = "SELECT * FROM faculty";
                        $facultyResult = mysqli_query($conn, $facultyQuery);

                        $semesterQuery = "SELECT * FROM semester";
                        $semesterResult = mysqli_query($conn, $semesterQuery);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['subjectcode'] ?></td>
                                <td><?php echo $row['subjectname'] ?></td>
                                <td><?php echo $row['credithour']; ?></td>
                                <td><?php echo $row['faculty']; ?></td>
                                <td><?php echo $row['semester']; ?></td>
                                <td>
                                    <a href="editsubject.php?id=<?php echo $row['id'] ?>" class="btn2">Edit</a>
                                    <a href="deletesubject.php?id=<?php echo $row['id'] ?>" class="btn" onclick="return confirm('Are you sure to delete?')">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="popup-container" id="popupContainer">
        <div class="popup-content">
            <div class="close-div">
                <span>Add Subject</span>
                <span class="close" onclick="closePopup()"><i class="ri-close-line"></i></span>
            </div>
            <div class="fieldset">
                <form action="" method="post" data-validate="parsley">
                    <div class="row">
                        <label for="subjectcode">Subject Code</label>
                        <input type="text" placeholder="Enter Subject Code" name="subjectcode" id="subjectcode" required>
                    </div>
                    <div class="row">
                        <label for="subjectname">Subject Name</label>
                        <input type="text" placeholder="Enter Subject Name" name="subjectname" id="subjectname" required>
                    </div>
                    <div class="row">
                        <label for="credithour">Credit Hour</label>
                        <input type="number" placeholder="Enter Credit Hour" name="credithour" id="credithour" required>
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
                    <input class="btn2" style="background-color: #4CAF50;" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#subjecttbl').DataTable();
        });

        function openPopup() {
            var popup = document.getElementById("popupContainer");
            popup.style.display = "flex";
        }

        function closePopup() {
            var popup = document.getElementById("popupContainer");
            popup.style.display = "none";
        }
    </script>

    <style>
        .close-div {
            display: flex;
            justify-content: space-between;
        }

        .close {
            padding: 5px;
            cursor: pointer;
            font-size: 20px;
        }

        .close:hover {
            background-color: lightslategray;
            transition: 0.5s;
        }
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

    $query = "INSERT INTO subject (subjectcode, subjectname, credithour, faculty, semester)
    VALUES ('$subjectcode', '$subjectname', '$credithour', '$faculty', '$semester')";
    if (mysqli_query($conn, $query)) {

        echo '<script>alert("Subject Added Sucessfully")</script>';
        echo "<script>window.location.href='subject.php'</script>";
    } else {
        echo '<script>alert("Error please try again.")</script>';
        echo "<script>window.location.href='subject.php'</script>";
    }
}
$conn->close();
?>