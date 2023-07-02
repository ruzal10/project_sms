<!DOCTYPE html>
<html>

<head>
    <title>Notice</title>
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
            border-color: #2e6da4;
            text-decoration: none;
            background-color: lightseagreen;
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
        .table{
            padding-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php include('sidebar.php'); ?>
        <div class="thead-main">
            <div class="dlabel">
                Feedbacks
            </div>
            <div class="table-responsive">
                <table id="feedbackTable" class="table table-striped">
                    <thead>
                        <tr class="th-tr">
                            <th>SN</th>
                            <th>Username</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM feedback";
                        $result = $conn->query($sql);
                        $x = 1;
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $x ?></td>

                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['feedback']; ?></td>
                                <td>
                                    <a href="deletefeedback.php?id=<?php echo $row['id']; ?>" class="button" style="background-color: red;" onclick="return confirm('Are you sure you want to delete this notice?')">Delete</a>
                                </td>
                            </tr>
                        <?php
                            $x++;
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#feedbackTable').DataTable();
        });
    </script>

    <style>

    </style>
</body>

</html>