<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>SMS | Login</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f1f1f1;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
}

.box {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
    max-width: 400px;
    width: 100%;
    text-align: center;
}

.box .container {
    margin-top: 30px;
}

.box .top {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 30px;
}

.box .top span {
    color: #777;
    font-size: 14px;
    margin-bottom: 10px;
}

.box .top header {
    font-size: 24px;
    font-weight: bold;
}

.box .input-field {
    position: relative;
    margin-bottom: 20px;
}

.box .input-field .input {
    border: none;
    border-bottom: 2px solid #ccc;
    outline: none;
    font-size: 16px;
    padding: 10px;
    width: 100%;
}

.box .input-field i {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 10px;
    color: #888;
}

.box .input-field .submit {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 20px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    width: 100%;
}

.box .input-field .submit:hover {
    background-color: #45a049;
}

.box .two-col {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.box .two-col .one label,
.box .two-col .two label {
    font-size: 14px;
    color: #777;
}

.box .two-col .one input[type="checkbox"] {
    margin-right: 5px;
}

.box .two-col .two a {
    color: #777;
    font-size: 14px;
    text-decoration: none;
}

.box .two-col .two a:hover {
    text-decoration: underline;
}
    </style>
</head>

<body>
    <div class="box">
        <div class="container">

            <div class="top">
                <span>Admin Login</span>
                <header>Login</header>
            </div>

            <form action="" method="post">
                <div class="input-field">

                    <input type="text" class="input" placeholder="Username" name="name" required>
                    <i class='bx bx-user'></i>

                </div>

                <div class="input-field">
                    <input type="password" class="input" placeholder="Password" name="password" required>
                    <i class='bx bx-lock-alt'></i>
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" value="Login" name="submit">
                </div>
            </form>

            <div class="two-col">
                <div class="one">
                    <input type="checkbox" name="" id="check">
                    <label for="check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
$con = mysqli_connect('localhost', 'root', '', 'smsdb');
if (!$con) {
    die('Error connection');
}
if (isset($_POST['submit'])) {
    $admin = $_POST['name'];
    $pass = $_POST['password'];
    $qry = "SELECT * FROM admin WHERE name='$admin' AND password=md5('$pass')";
    if ($res = mysqli_query($con, $qry)) {
        if (mysqli_num_rows($res) > 0) {
            $_SESSION['admin']=$admin;
            echo '<script>window.location.href="admindashboard.php";</script>';
            
        } else {
            echo '<script>alert("Invalid Username or Password")</script>';
        }
    }
}
$con->close();
?>