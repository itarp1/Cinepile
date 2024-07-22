<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up page</title>
  <style>
    * {
      text-decoration: none;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20;
     
    }
    body {
      background-color: rgb(206, 160, 150);
      min-height: 70vh;
      background-color:#7393B3 ;
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-card {
      background-color: #7393B3 
      box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1);
      margin-top: 20px;
      border-radius: 16px;
      padding: 20px;
      border: 2px solid #fff;
      transition: 0.5s;
      backdrop-filter: blur(10px);
      width: 320px;
    }
    .login-card .form-header {
      text-align: center;
      font-size: 20px;
      font-weight: 500;
      margin-bottom: 8px;
    }
    .login-card input {
      width: calc(100% - 20px);
      padding: 5px;
      margin-bottom: 7px;
      font-size: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    .login-card .name-box {
      width: 100%;
    }
    .login-card .email-box {
      width: 100%;
    }
    .login-card .password-box {
      width: 100%;
    }
    .login-card .signup-button {
      width: 100%;
      background: #FF9800;
      c
      border: 1px solid white;
      padding: 8px;
      font-size: 15px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.2s;
      margin-top: 10px;
    }
    .login-card .signup-button:hover {
      background: #f57c00; /* Darker shade on hover */
    }
    .login-card .already {
      text-align: center;
      margin-top: 17px;
      font-size: 17px;
      color: black;
    }
    .login-card .already a {
      color: green;
      text-decoration: none;
      font-size:20px;
    }
  </style>
</head>
<body>

<div class="login-card">
<img src="img/logo.png" alt="Logo" style="height: 50px; width: auto; max-width: 100%; margin-bottom: 10px;">
  <div class="form-header">Register</div>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div style="display: flex; justify-content: space-between;">
      <div style="width: 48%;">
        <p>First name</p>
        <input name="fname" class="name-box" type="text" placeholder="First Name" id="fname" required>
      </div>
      <div style="width: 48%;">
        <p>Last name</p>
        <input name="lname" class="name-box" type="text" placeholder="Last Name" id="lname" required>
      </div>
    </div>
    <p style="margin-top: 10px;">Address</p>
    <input name="address" class="email-box" type="text" placeholder="Enter your Address" id="address" required>
    <p>Email Address</p>
    <input name="email" class="email-box" type="email" placeholder="Enter your email" id="email" required>
    <p>Password</p>
    <input name="password" class="password-box" type="password" placeholder="Enter your password" id="password" required>
    <p>Confirm Password</p>
    <input name="cpassword" class="password-box" type="password" placeholder="Reenter your password" id="cpassword" required>
    <p style="color:red;" id="warning"></p>
    <input class="signup-button" type="submit" value="Signup">
    <p class="already">Already have an account? <a href="login.php">Login</a></p>
  </form>
</div>

</body>
</html>

<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Firstname = $_POST['fname'];
    $Lastname = $_POST['lname'];
    $Address = $_POST['address'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $ConfirmPassword = $_POST['cpassword']; // Added variable for Confirm Password field

    if ($Firstname != "" && $Lastname != "" && $Address != "" && $Email != "" && $Password != "" && $ConfirmPassword != "") {
        if ($Password === $ConfirmPassword) { // Check if Passwords match
            // Hash the password

            $sql = "INSERT INTO signup (Firstname, Lastname, Address, Email, Password) 
                    VALUES ('$Firstname','$Lastname','$Address','$Email','$Password')";

            $data = mysqli_query($con, $sql);

            if ($data) {
                // Redirect to login page
                header("Location: http://localhost/cinepile/login.php");
                exit();
            } else {
                echo '<script>alert("Error: ' . mysqli_error($con) . '");</script>';
            }
        } else {
            echo '<script>alert("Passwords do not match!");</script>';
        }
    } else {
        echo '<script>alert("All fields are required!");</script>';
    }
}
?>
