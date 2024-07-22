<?php
// Step 1: Include necessary files (header.php, footer.php, db.php)
include 'header.php'; // Adjust path as per your file structure
include 'ft.php'; // Adjust path as per your file structure
include 'db.php'; // Adjust path as per your file structure

// Step 2: Check if ID parameter is provided via GET or POST
if(isset($_GET['id'])) {
    // Step 3: Sanitize the ID parameter to prevent SQL injection
    $id = intval($_GET['id']);

    // Step 4: Prepare SQL statement for deletion
    $sql = "DELETE FROM signup WHERE id = ?";
    $query = $con->prepare($sql);

    if($query === false) {
        // Handle prepare error
        die('SQL Prepare Error: ' . htmlspecialchars($con->error));
    }

    // Step 5: Bind ID parameter to the prepared statement
    $query->bind_param('i', $id);

    // Step 6: Execute the query
    if($query->execute()) {
        // Success message if deletion is successful
        echo "User with ID $id deleted successfully.";
    } else {
        // Error message if deletion fails
        echo "Error deleting user: " . htmlspecialchars($query->error);
    }

    // Step 7: Close the prepared statement
    $query->close();
}

// Step 8: Close the database connection
$con->close();

// Step 9: Redirect back to the page where user list is displayed (adjust URL as per your file structure)
header("Location: user.php");
exit();
?>