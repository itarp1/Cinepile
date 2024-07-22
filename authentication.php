<?php

require 'db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $sql = "SELECT * FROM signup WHERE Email= '$Email'AND Password = '$Password' ";
    $results = $con->query($sql);

    if ($results->num_rows == 1) {
        $row = $results->fetch_assoc();
        error_log($Password);
        if ($Password === $row['Password']) {
            $_SESSION['name']=$row['Firstname'];
            echo $_SESSION['name'];
            $_SESSION['email']=$row['Email'];
            
            header("Location: http://localhost/cinepile/index1.php");
            exit();
        } else {
            echo "Password didn't match";
        }
    } else {
        echo "User not found";
    }
}

$conn->close();
?>
