<!DOCTYPE html>
<html>

<head>
    <title>Student Table</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="astyle.css">
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
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
            text-decoration: none;
        }
        .container{
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
    </style>
</head>

<body>
    <div class="container">
        <?php include('sidebar.php'); ?>
        <div class="thead-main">
          
            <div class="dlabel">
                Student Registeration Requests
            </div>
            <div class="table-responsive">
                <table id="studentTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Faculty</th>
                            <th>Semester/Year</th>
                            <th>Father's Name</th>
                            <th>Mother's Name</th>
                            <th>Academic Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'smsdb');
                        if (!$conn) {
                            die('Error connection');
                        }
                        // Fetch data from the "student" table
                        $sql = "SELECT * FROM student WHERE status = 'not verified'";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['sid']; ?></td>
                                <td><?php echo $row['sname']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['mnumber']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['faculty']; ?></td>
                                <td><?php echo $row['semyear']; ?></td>
                                <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['mname']; ?></td>
                                <td><?php echo $row['ayear']; ?></td>
                                <td><a href="addstudent.php?id=<?php echo $row['sid'] ?> " class="button" onclick="return confirm('Are you sure want to add student?')">Add</a></td>
                            </tr>
                        <?php
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#studentTable').DataTable();
        });
    </script>
</body>

</html>

