<!DOCTYPE html>
<html>

<head>
    <title>Feedback Form</title>

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

        .outer {
            display: flex;
            margin-left: 300px;
        }

        .fcontainer {
            width: 50%;
            max-width: 600px;
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
            padding: 20px;
            text-align: start;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="">
        <?php include('stsidebar.php'); ?>

        <div class="thead-main">
            <div class="dlabel">
                Feedback
            </div>
            <div class="outer">
                <div class="fcontainer">
                    <h1>Feedback Form</h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="<?php echo $student ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <input type="submit" value="Submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $feedback = $_POST['message'];
        $sql = "INSERT INTO feedback(name,feedback)VALUES('$name','$feedback')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<script> alert("Feedback add successfully");</script>';
            echo '<script> window.location.href = "studentdashboard.php";</script>';
    } 
}?>