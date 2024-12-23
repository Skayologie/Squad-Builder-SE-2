<?php
require '../../vendor/autoload.php'; // Composer autoloader 
require ("../../config/config.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "UPDATE `players` SET `isDeleted` = 1 WHERE `player_id` = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind the 'id' parameter to the prepared statement
        $stmt->bind_param("i", $id); // "i" stands for integer
        $stmt->execute();
        // Execute the statement
        if ($stmt->execute()) {
            // Return success message to the JavaScript AJAX call
            echo "Player archived successfully.";
        } else {
            echo "Failed to archive player.";
        }

        // Close the statement
        $stmt->close();
    }
    $stmt->close();
}



