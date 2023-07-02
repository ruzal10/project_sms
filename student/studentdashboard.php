<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }

        .table-heading {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php include('stsidebar.php'); ?>
        <div class="thead-main">
            <div class="dlabel">
                My Profile
            </div>
            <div>
                <?php
                $sql = "SELECT * FROM student where username='{$student}'";
                $res = mysqli_query($conn, $sql);
                $rows = mysqli_fetch_array($res) ?>
                <table>
                    <tbody>
                        <tr>
                            <th class="table-heading">Name:</th>
                            <td><?php echo $rows['sname']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-heading">Address:</th>
                            <td><?php echo $rows['address']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-heading">Mobile No.:</th>
                            <td><?php echo $rows['mnumber']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-heading">Gmail:</th>
                            <td><?php echo $rows['email']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-heading">Faculty:</th>
                            <td><?php echo $rows['faculty']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-heading">Semester:</th>
                            <td><?php echo $rows['semyear']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-heading">Father's Name:</th>
                            <td><?php echo $rows['fname']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-heading">Mother's Name:</th>
                            <td><?php echo $rows['mname']; ?></td>
                        </tr>
                        <tr>
                            <th class="table-heading">Username:</th>
                            <td><?php echo $rows['username']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
</body>

</html>