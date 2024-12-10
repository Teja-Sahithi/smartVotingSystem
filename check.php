<?php
session_start();



// Check if the user has already voted
$mysqli = require __DIR__ . "/database.php";

// Replace 'user_id' and 'votes' with your actual table and column names
$sql = "SELECT aadhar FROM vote WHERE aadhar = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_SESSION['aadhar']);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // User has already voted
   // echo "You have already voted. You cannot vote again.";
    header("Location:no.html");
    // Display additional messages or hide the voting options here
} else {
    
    header("Location: choice.html");
}
?>
