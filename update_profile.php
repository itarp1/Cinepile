<?php
session_start();

require 'db.php';



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["save_changes"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $address = $_POST["address"];
    $email = $_SESSION['email'];

    $sql = "UPDATE signup SET Firstname='$firstname', Lastname='$lastname', Address='$address' WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile.";
    }
}

mysqli_close($conn);
?>
