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

        /* Popup box content */
        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            width: 500px;
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
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .popup-content input[type="submit"]:hover {
            background-color: #45a049;
            cursor: pointer;
        }

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
</head>

<body>

    <div class="container">
        <?php include('sidebar.php'); ?>
        <div class="thead-main">
            <div class="dlabel">
                Notices
            </div>
            <div class="dlabel" style="border-bottom:none;">
                <button class="button" onclick="openPopup()">Add New Notice</button>
            </div>
            <div class="table-responsive">
                <table id="noticeTable" class="table table-striped">
                    <thead>
                        <tr class="th-tr">
                            <th>Date</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Audience</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM Notice";
                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['audience']; ?></td>
                                <td><?php echo $row['expiry_date']; ?></td>
                                <td>
                                    <a href="editnotice.php?id=<?php echo $row['notice_id']; ?>" class="button">Edit</a>
                                    <a href="deletenotice.php?id=<?php echo $row['notice_id']; ?>" class="button" style="background-color: red;" onclick="return confirm('Are you sure you want to delete this notice?')">Delete</a>
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
                <span>Add New Notice</span>
                <span class="close" onclick="closePopup()"><i class="ri-close-line"></i></span>
            </div>
            <div id="registration-form">
                <div class="fieldset">
                    <form action="" method="post" data-validate="parsley">
                        <div class="row">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" required>
                        </div>
                        <div class="row">
                            <label for="title">Title</label>
                            <input type="text" placeholder="Enter Title" name="title" id="title" required>
                        </div>
                        <div class="row">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" placeholder="Enter Description" required></textarea>
                        </div>
                        <div class="row">
                            <label for="audience">Audience</label>
                            <input type="text" placeholder="Enter Audience" name="audience" id="audience" required>
                        </div>
                        <div class="row">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="date" name="expiry_date" id="expiry_date" required>
                        </div>
                        <input style="color:#fff; margin-top:10px; background-color: #4CAF50;" class="btn" type="submit" value="Add">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#noticeTable').DataTable();
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
    $date = $_POST['date'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $audience = $_POST['audience'];
    $expiry_date = $_POST['expiry_date'];

    // Insert the notice into the database
    $query = "INSERT INTO Notice (date, title, description, audience, expiry_date) VALUES ('$date', '$title', '$description', '$audience', '$expiry_date')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Notice Added Successfully")</script>';
        echo "<script>window.location.href='notice.php'</script>";
    } else {
        echo '<script>alert("Error. Please try again.")</script>';
        echo "<script>window.location.href='notice.php'</script>";
    }
}
$conn->close();
?>