<?php
session_start();
require '../../vendor/autoload.php'; // Composer autoloader 
require ("../../config/config.php");


if (isset($_POST['p_name'])) {
    $id = $_POST['id'];
    $p_name = $_POST['p_name'];
    $nation = intval($_POST['nation']);
    $club = intval($_POST['Club']);
    $position = $_POST['position'];
    $p_rating = intval($_POST['p_Rating']);

    $divPace = $_POST['DivPace'];
    $handShot = $_POST['HandShot'];
    $kickPassing = $_POST['KickPassing'];
    $refDrib = $_POST['RefDrib'];
    $speedDeff = $_POST['SpeedDeff'];
    $positionPc = $_POST['PositionPc'];
    
    if (isset($_POST['p_image'])) {
        $photo = $_POST['p_image'];
    }else{
        $image = "SELECT photo FROM players WHERE player_id = $id";
        $stmtImage = $conn->query($image);
        $row = $stmtImage-> fetch_assoc();
        $photo = $row["photo"];
    }

    $sql = "UPDATE `players` 
            SET `p_name` = ?, `photo` = ?, `position` = ?, `availibility` = '1', `rating` = ?, `nation_id` = ?, `club_id` = ?, `isArchive` = '0', `isDeleted` = '0' 
            WHERE `player_id` = $id";
    $stmt = $conn->prepare($sql);

    $sqlStats = "UPDATE `players_stats` 
                 SET `diving_or_pace` = ?, `handling_or_shooting` = ?, `kicking_or_passing` = ?, `reflexes_or_dribbling` = ?, `speed_or_defending` = ?, `positioning_or_physical` = ? 
                 WHERE `player_id` = $id";
    $stmtStats = $conn->prepare($sqlStats);

    if ($stmt && $stmtStats) {
        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssss",$p_name, $photo, $position, $p_rating, $nation, $club);
        

        // Execute the statement
        if ($stmt->execute()) {
            $stmtStats->bind_param("ssssss", $divPace, $handShot, $kickPassing, $refDrib, $speedDeff, $positionPc);
            if ($stmtStats->execute()) {
                $_SESSION["messageBack"] = "Player Updated successfully.";
                $_SESSION["messageColor"] = "green";
            }
        } else {
                $_SESSION["messageBack"] = "There is problem ";
                $_SESSION["messageColor"] = "red";
        }

        // Close the statement
        $stmt->close();
    }else {
        echo "Error preparing the SQL statement.";
    }
}

