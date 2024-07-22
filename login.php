<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login page</title>
  <style>
    *
    {
      text-decoration: none;
      font-family: arial;
      margin: 0;
      padding: 0;
    }
    body
    {
      /* background-color: rgb(206, 160, 150); */
      min-height: 100vh;
      background-color: #7393B3;
      background-size: cover;
      background-position: center;
      position: relative;
      z-index: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-card
    {
      margin-top: 20px;
      background-color: #7393B3 /* Semi-transparent white background */
      backdrop-filter: blur(10px);
      box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1);
      border-radius: 16px;
      padding: 20px;
      border-color: #fff;
      border-style: solid;
      border-width: 2px;
      transition: 0.2s;
      width: 300px;
    }
    .email-box
    {
      width: 100%;
      margin-bottom: 10px;
      padding: 8px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    .form-header
    {
      font-size: 25px;
      font-weight: 600;
      text-align: center;
      margin-bottom: 15px;
    }
    .login-card input
    {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }
    .signup-button
    {
      color: white;
      background: #4CAF50;
      margin-top: 10px;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }
    .signup-button:hover
    {
      background-color: #45a049;
    }
    .already
    {
      text-align: center;
      margin-top: 10px;
      font-size: 12px;
    }
    .already a
    {
      color: green;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <img src="img/logo.png" alt="Logo" style="height: 50px; width: auto; max-width: 100%; margin-bottom: 10px;">
    <div style="padding-bottom: 15px; border-bottom: 2px solid #e6e6e6;">
      <p class="form-header">Login</p>
    </div>
    <form action="authentication.php" method="post">
      <p>Email Address</p>
      <input class="email-box" type="email" placeholder="Enter your email" name="email" required>
      <p>Password</p>
      <input class="email-box" type="password" placeholder="Enter your password" name="password" required>
      <input class="signup-button" type="submit" value="Login" name="login">
      <p class="already">Don't have an account? <a href="register.php">Register</a></p>
    </form>
  </div>
</body>
</html>
