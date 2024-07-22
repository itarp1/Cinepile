<?php
include 'db.php';
include 'header.php';
include 'ft.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Sanitize and Escape User Input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // 2. Retrieve user data from the database
    $sql = "SELECT * FROM userss WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // 3. Verify the password using password_verify()
        if (password_verify($password, $hashedPassword)) {
            // Password matches!
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $response = "success"; 
        } else {
            $response = "Invalid username or password.";
        }
    } else {
        $response = "Invalid username or password.";
    }

    echo json_encode($response);
}

$conn->close();
?>