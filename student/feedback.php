<!DOCTYPE html>
<html>

<head>
    <title>Feedback Form</title>

    <style>
        body {
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
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
            margin-left: 18%;
        }

        .outer {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
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
                My Profile
            </div>
            <div class="outer">
                <div class="container">
                    <h1>Feedback Form</h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
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
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $feedback = $_POST['message'];


        $sql = "INSERT INTO feedback(name,feedback)VALUES('$name','$feedback')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
    ?>
            <script>
                alert("Feedback add successfully");
                window.open("studentdashboard.php");
            </script>
    <?php }
    } ?>
</body>

</html>