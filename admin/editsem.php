<?php
$semid = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Table</title>
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

        .fieldset {
            border: 1px solid #ccc;
            padding: 20px;
            width: 400px;
            margin: 100px auto;
        }

        .fieldset legend {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .fieldset .row {
            margin-bottom: 15px;
        }

        .fieldset label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .fieldset input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .fieldset .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .fieldset .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php include('sidebar.php'); ?>
        <div class="thead-main">
            <div class="dlabel">
                Edit Semester
            </div>

            <?php
            $qry = "SELECT * FROM semester WHERE id = $semid";
            $res = mysqli_query($conn, $qry);
            $row = mysqli_fetch_assoc($res);

            ?>
            <div class="fieldset">
                <legend>Edit Semester</legend>
                <form action="" method="post" data-validate="parsley">
                    <div class="row">
                        <label for="sname">Semester Name</label>
                        <input type="text" value="<?php echo $row['semester_name']; ?>" id="sname" readonly>
                    </div>
                    <div class="row">
                        <label for="nsname">New Semester Name</label>
                        <input type="text" placeholder="Enter New Faculty Nam" name="nsname" id="nsname" required>
                    </div>
                    <input class="btn" type="submit" value="Update" name="submit">
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <style>

    </style>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $nsname = $_POST['nsname'];

    $query = "UPDATE semester set semester_name = '$nsname' WHERE id = $semid";
    if (mysqli_query($conn, $query)) {

        echo '<script>alert("Semester Edited Sucessfully")</script>';
        echo "<script>window.location.href='faculty.php'</script>";
    } else {
        echo '<script>alert("Error please try again.")</script>';
        echo "<script>window.location.href='faculty.php'</script>";
    }
}
$conn->close();
?>