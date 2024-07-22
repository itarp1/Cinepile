<?php 
session_start();
include 'ft.php';
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | CinePile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .head {
            text-align: center;
            margin-bottom: 20px;
        }
        .head h1 {
            color: #343a40;
        }
        .form-group label {
            color: #495057;
        }
        .btn-primary {
            background-color: #726297;
            border-color: #726297;
        }
        .btn-primary:hover {
            background-color: #5e5079;
            border-color: #5e5079;
        }
        .form-text {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="head">
            <h1>Login to CinePile</h1>
        </div>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            <p class="already">Don't have an account? <a style="color: #FF9800;" href="registeradmin.php"> Register</a></p>
        </form>
    </div>

    <?php 
    if (isset($_POST['submit'])) {
        $user = $_POST['uname'];
        $pwd = $_POST['pwd'];
        $query = "SELECT * FROM admin WHERE uname = '$user' and pwd='$pwd'";
        $run = mysqli_query($con, $query);
        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_assoc($run)) {
                if ( $pwd === $row['pwd']) {
                    $_SESSION['loginsuccesfull'] = 1;
                    $_SESSION['user'] = $user;
                    echo "<script>alert('Logged in successfully'); window.location.href='index.php';</script>";
                } else {
                    echo "<script>alert('Incorrect password');</script>";
                }
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }
    }
    ?>
</body>
</html>
