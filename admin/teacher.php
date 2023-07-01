<!DOCTYPE html>
<html>

<head>
    <title>Student Table</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

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

        .popup-content input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .popup-content input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .popup-content input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php include('sidebar.php'); ?>
        <div class="thead-main">
            <div class="dlabel">
                Our Teachers
            </div>
            <div class="dlabel" style="border-bottom:none;">
                <button class="button2" onclick="openPopup()">Add Teacher</button>
            </div>
            <div class="table-responsive">
                <table id="teacherTable" class="table table-striped">
                    <thead>
                        <tr class="th-tr">
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile No.</th>
                            <th>Gmail</th>
                            <th>Main Subject</th>
                            <th>Qualification</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM teachers";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td><?php echo $row['gmail']; ?></td>
                                <td><?php echo $row['main_subject']; ?></td>
                                <td><?php echo  $row['qualification']; ?></td>
                                <td><a href="deleteteacher.php?id=<?php echo $row['id'] ?>"><button class="button" onclick="return confirm('Are you sure to delete?')">Delete </button></a></td>
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
            <span onclick="closePopup()"><i class="ri-close-line"></i></span>
            <div id="registration-form">
                <div class="fieldset">
                    <legend>Teacher Registration</legend>
                    <form action="" method="post" data-validate="parsley">
                        <div class="row">
                            <label for="tname">Name</label>
                            <input type="text" placeholder="Enter Name" name="tname" id="tname" required>
                        </div>
                        <div class="row">
                            <label for="taddress">Address</label>
                            <input type="text" placeholder="Enter Address" name="taddress" id="taddress" required>
                        </div>
                        <div class="row">
                            <label for="tmobile">Mobile No.</label>
                            <input type="number" placeholder="Enter Mobile Number" name="tmobile" id="tmobile" required>
                        </div>
                        <div class="row">
                            <label for="tgmail">Gmail</label>
                            <input type="email" placeholder="Enter Gmail" name="tgmail" id="tgmail" required>
                        </div>
                        <div class="row">
                            <label for="tsubject">Main Subject</label>
                            <input type="text" placeholder="Enter Main Subject" name="tsubject" id="tsubject" required>
                        </div>
                        <div class="row">
                            <label for="tedu">Qualification</label>
                            <input type="text" placeholder="Enter Qualification" name="tedu" id="tedu" required>
                        </div>
                        <div class="row">
                            <label for="username">Username</label>
                            <input type="text" placeholder="Enter Username" name="username" id="username" required>
                        </div>
                        <div class="row">
                            <label for="password">Password</label>
                            <input type="password" placeholder="Enter Password" name="password" id="password" required>
                        </div>
                        <input class="btn" type="submit" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#teacherTable').DataTable();
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

    </style>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $tname = $_POST['tname'];
  $taddress = $_POST['taddress'];
  $tmobile = $_POST['tmobile'];
  $tgmail = $_POST['tgmail'];
  $tsubject = $_POST['tsubject'];
  $tedu = $_POST['tedu'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "INSERT INTO teachers (name, address, mobile, gmail,   main_subject, qualification, username, password) VALUES ('$tname', '$taddress', '$tmobile', '$tgmail', '$tsubject', '$tedu', '$username', '$password')";
if(mysqli_query($conn,$query))
{
    
    echo '<script>alert("Teacher Added Sucessfully")</script>';
    echo "<script>window.location.href='teacher.php'</script>";
}else{
    echo '<script>alert("Error please try again.")</script>';
    echo "<script>window.location.href='teacher.php'</script>";
}
}
$conn->close();
?>
