<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
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
        .table{
           padding-top: 10px;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .th-tr {
            background-color: lightsalmon;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php include('stsidebar.php') ?>
        <div class="thead-main">
            <div class="dlabel">
                Notices
            </div>
            <div class="table-responsive">
                <table id="noticeTable" class="table table-striped">
                    <thead>
                        <tr class="th-tr">
                            <th>SN</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Audience</th>
                            <th>Expiry Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM Notice";
                        $result = $conn->query($sql);
                        $x=1;
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $x ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['audience']; ?></td>
                                <td><?php echo $row['expiry_date']; ?></td>
                            </tr>
                        <?php
                            $x++;
                        }
                        ?>
                    </tbody>

                </table>
                <script>
                    $(document).ready(function() {
                        $('#noticeTable').DataTable();
                    });
                </script>
            </div>
        </div>

    </div>

</body>

</html>