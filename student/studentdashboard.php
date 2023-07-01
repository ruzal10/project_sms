<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student dashboard</title>

    <!-- font link  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400&family=Merriweather&family=Ms+Madi&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/ststyle.css">
    <style>
        .custom-table {
            margin-top: 10px;
            width: 50%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .custom-table th {
            padding: 10px;
            font-weight: bold;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .custom-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .table-heading {
            background-color: #f2f2f2;
            color: #333;
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

                <table class="custom-table">
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

        </div>
    </div>

</body>

</html>