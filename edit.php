<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); 
            background-size: cover;
            background-position: center;
            color: #181717; /* Text color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Set the body height to fill the viewport */
        }

        form {
            width: 350px;
            padding: 60px;
            background: rgba(155, 143, 143, 0.244); /* Semi-transparent background */
            border-radius: 10px;
            backdrop-filter: blur(1px);
            transition: 0.1s;
        }

        h2 {
            text-align: center;
            margin-top: 0; /* Remove default margin */
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: calc(100% - 12px); /* Adjusting width for padding */
            padding: 5px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 5px;
            background-color: #05e1ec; /* Green */
            color: rgb(46, 45, 45);
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ec6d05; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <?php
    session_start();

    require 'db.php';

    $user = $_SESSION['email'];
    $sql = "SELECT * FROM signup WHERE email='$user'";
    $result = mysqli_query($conn, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $firstname = $row['Firstname'];
        $lastname = $row['Lastname'];
        $address = $row['Address'];
        $email = $row['Email'];

        echo "<form method='post' action='update_profile.php'>";
        echo "<h2>Edit Profile</h2>";
        echo "<label for='firstname'>First Name:</label><input type='text' name='firstname' value='$firstname'><br>";
        echo "<label for='lastname'>Last Name:</label><input type='text' name='lastname' value='$lastname'><br>";
        echo "<label for='address'>Address:</label><input type='text' name='address' value='$address'><br>";
        echo "<label for='email'>Email:</label><input type='text' name='email' value='$email' disabled><br>";
        echo "<input type='submit' value='Save Changes' name='save_changes'>";
        echo '</form>';
    } else {
        echo "Error fetching user profile for editing.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
