<?php

include 'db.php';
include 'header.php';
include 'ft.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Sanitize and Escape User Input
    $googleId = mysqli_real_escape_string($conn, $_POST['googleId']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // 2. Check if user exists based on Google ID
    $sql = "SELECT * FROM userss WHERE google_id = '$googleId'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // User exists!
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $response = "success"; 
    } else {
        $response = "User not found. Please register first.";
    }

    echo json_encode($response);
}

$conn->close();
?>