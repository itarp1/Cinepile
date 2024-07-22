<?php
include 'db.php';
include 'header.php';
include 'ft.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Sanitize and Escape User Input
    $googleId = mysqli_real_escape_string($conn, $_POST['googleId']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    // 2. Check if user already exists (by email)
    $sql_check = "SELECT * FROM userss WHERE email = '$email'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        // User already exists, update Google ID
        $sql = "UPDATE userss SET google_id = '$googleId' WHERE email = '$email'";
        if ($conn->query($sql) === TRUE) {
            $response = "success";
        } else {
            $response = "Error updating user: " . $conn->error;
        }
    } else {
        // New user, insert into database
        $sql = "INSERT INTO userss (google_id, email, username) VALUES ('$googleId', '$email', '$name')";
        if ($conn->query($sql) === TRUE) {
            $response = "success";
        } else {
            $response = "Error inserting user: " . $conn->error;
        }
    }

    echo json_encode($response);
}

$conn->close();
?>