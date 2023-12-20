<?php
// Connect to the database
require 'connectDB.php';

// Get the user ID from the query string
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die('User ID not provided.');

// Query to get the profile picture data for the specified user
$sql = "SELECT profilepic FROM users WHERE id = ?";
$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $sql)) {
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // Check if the user exists
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $profilepic);
        mysqli_stmt_fetch($stmt);

        // Set the appropriate content type
        header('Content-Type: image/jpeg'); // Change this based on your image format (e.g., image/png for PNG)

        // Output the image data
        echo $profilepic;
    } else {
        // User not found
        die('User not found.');
    }

    mysqli_stmt_close($stmt);
} else {
    // SQL error
    die('SQL error.');
}

// Close the database connection
mysqli_close($conn);
?>
