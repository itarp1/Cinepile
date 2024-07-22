<?php
// Database Connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "cinepile";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Sanitize and Escape User Input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // 2. Check if username or email already exists (optional but recommended for uniqueness)
    $sql_check = "SELECT * FROM userss WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        $response = "Username or email already exists.";
        echo json_encode($response);
        exit;
    }

    // 3. Hash the password (use a strong hashing algorithm like bcrypt or Argon2)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 4. Insert the new user into the database
    $sql = "INSERT INTO userss (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        $response = "success"; 
    } else {
        $response = "Error: " . $sql . "<br>" . $conn->error;
    }

    echo json_encode($response); 
}

$conn->close();
?>