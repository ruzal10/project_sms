<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculties & Semesters</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <style>
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
            background-color:#29c493;
            text-decoration: none;
        }
        .popup-container {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.popup-content {
  background-color: #fefefe;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #ddd;
  width: 80%;
  max-width: 500px;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
}

.popup-content h4 {
  margin-top: 15px;
}

.popup-content input[type="text"],
.popup-content input[type="number"],
.popup-content input[type="email"],
.popup-content input[type="password"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 15px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.popup-content input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.popup-content input[type="submit"]:hover {
  background-color: #45a049;
}
    </style>
    <script>
        function openPopup() {
            var popup = document.getElementById("popupContainer");
            popup.style.display = "flex";
        }

        function closePopup() {
            var popup = document.getElementById("popupContainer");
            popup.style.display = "none";
        }

        function openPopup2() {
            var popup = document.getElementById("popupContainer2");
            popup.style.display = "flex";
        }

        function closePopup2() {
            var popup = document.getElementById("popupContainer2");
            popup.style.display = "none";
        }
    </script>

</head>

<body>
    <!-- start work from container  -->
    <div class="container">

        <?php include('sidebar.php')  ?>
        <div class="thead-main">
            <div class="dlabel">
                Faculty & Semester
            </div>
            <div class="dlabel" style="border-bottom:none;">
                <button class="btn" onclick="openPopup2()">Add Faculty</button>
                <button class="btn" onclick="openPopup()">Add Semester</button>
            </div>
            <div>
                <div class="dlabel">
                    Our Faculties
                </div>

                <div>
                    <table id="facultyTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Faculty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $fsql = "SELECT * FROM faculty ORDER BY id";
                            $result = $conn->query($fsql);

                            while ($frow = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $frow['id']; ?></td>
                                    <td><?php echo $frow['faculty_name']; ?></td>
                                    <td>
                                        <button class="btn">Edit</button>
                                        <button class="btn" style="background-color: red;">Delete</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <script>
                                $(document).ready(function() {
                                    $('#facultyTable').DataTable({});
                                });
                            </script>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="dlabel">
                    Our Semesters
                </div>

                <div>
                    <table id="semTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Faculty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ssql = "SELECT * FROM semester ORDER BY id";
                            $result2 = mysqli_query($conn, $ssql);

                            while ($srow = mysqli_fetch_assoc($result2)) {
                            ?>
                                <tr>
                                    <td><?php echo $srow['id']; ?></td>
                                    <td><?php echo $srow['semester_name']; ?></td>
                                    <td>
                                        <button class="btn">Edit</button>
                                        <button class="btn" style="background-color: red;">Delete</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <script>
                                $(document).ready(function() {
                                    $('#semTable').DataTable({});
                                });
                            </script>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
    <div class="popup-container" id="popupContainer">
        <div class="popup-content">
            <span onclick="closePopup()"><i class="ri-close-line"></i></span>
            <div>
                <form action="" method="post">
                    <label for="sem">Enter Semester/Year Name :</label>
                    <input type="text" name="sem" required> <br>
                    <input class="btn" type="submit" value="Save" name="ssubmit">
                </form>
            </div>
        </div>
    </div>

    <div class="popup-container" id="popupContainer2">
        <div class="popup-content">
            <span onclick="closePopup2()"><i class="ri-close-line"></i></span>
            <div>
                <form action="" method="post">
                    <label for="sem">Enter Faculty :</label>
                    <input type="text" name="faculty" required> <br>
                    <input class="btn" type="submit" value="Save" name="fsubmit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['fsubmit'])) {
    $faculty = $_POST['faculty'];
    $sql = "INSERT INTO faculty(faculty_name)VALUES('$faculty')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Faculty added sucessfully")</script>';
        echo '<script>window.location.href="faculty.php"</script>';

        set_time_limit(30);
    } else {
        echo '<script>alert("Error")</script>';
        echo '<script>window.location.href="faculty.php"</script>';
    }
}
if (isset($_POST['ssubmit'])) {
    $sem = $_POST['sem'];
    $sql = "INSERT INTO semester(semester_name)VALUES('$sem')";
    $result = mysqli_query($conn, $sql);
    if ($result) {

        echo '<script>alert("Semester added sucessfully")</script>';
        echo '<script>window.location.href="faculty.php"</script>';

        set_time_limit(30);
    } else {
        echo '<script>alert("Error")</script>';
        echo '<script>window.location.href="faculty.php"</script>';
    }
}
?>