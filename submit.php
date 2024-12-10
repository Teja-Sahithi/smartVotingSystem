<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the selected party from the form
    $selectedParty = $_POST["party"];

    // Assuming you have a database connection (database.php) established
    $mysqli = require 'database.php';

    // Check if the user has already voted
    session_start();
    $aadhar = $_SESSION['aadhar']; // Get the user's Aadhar from the session

    // Store the vote in the database
    $sql = "INSERT INTO vote (aadhar, party_voted) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $aadhar, $selectedParty);
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $mysqli->close();
    header("Location: thanks.html");
}
?>
