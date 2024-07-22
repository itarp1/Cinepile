<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); 
            background-size: cover;
            background-position: center;
            color: #181717;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 350px;
            margin: 50px auto;
            padding: 40px;
            background: none;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease-in-out;
            backdrop-filter: blur(5px);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #000; /* Changed color to dark black */
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #555;
        }

    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();

        require 'db.php';

        $user = $_SESSION['email'];
        $sql = "SELECT * FROM signup WHERE email='$user'";
        $result = mysqli_query($conn, $sql);

        $result && $row = mysqli_fetch_assoc($result);
            $firstname = $row['Firstname'];
            $lastname = $row['Lastname'];
            $address = $row['Address'];
            $email = $row['Email'];

            echo '<form method="post" action="update_profile.php">';
            echo "<h2> View Profile</h2>";
            echo "<table>";
            echo "<tr><td><label for='firstname'>First Name:</label></td><td><input type='text' name='firstname' value='$firstname'></td></tr>";
            echo "<tr><td><label for='lastname'>Last Name:</label></td><td><input type='text' name='lastname' value='$lastname'></td></tr>";
            echo "<tr><td><label for='address'>Address:</label></td><td><input type='text' name='address' value='$address'></td></tr>";
            echo "<tr><td><label for='email'>Email:</label></td><td><input type='text' name='email' value='$email' disabled></td></tr>";
            echo "</table>";
            echo '</form>';
        

        mysqli_close($conn);
        ?>
    </div>
</body>
</html>
