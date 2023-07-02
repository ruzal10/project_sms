<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student dashboard</title>
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
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include('stsidebar.php') ?>

        <div class="thead-main">
            <div class="dlabel">
                My Result
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM results WHERE username='{$student}'";
                        $res = mysqli_query($conn, $sql);
                        $i = 1;
                        while ($rows = mysqli_fetch_array($res)) {
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['subject1']; ?></td>
                                <td><?php echo $rows['mask1']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $rows['subject2']; ?></td>
                                <td><?php echo $rows['mask2']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $i + 2; ?></td>
                                <td><?php echo $rows['subject3']; ?></td>
                                <td><?php echo $rows['mask3']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $i + 3; ?></td>
                                <td><?php echo $rows['subject4']; ?></td>
                                <td><?php echo $rows['mask4']; ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $i + 4; ?></td>
                                <td><?php echo $rows['subject5']; ?></td>
                                <td><?php echo $rows['mask5']; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</body>

</html>