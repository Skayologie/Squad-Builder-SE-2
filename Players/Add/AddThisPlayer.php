<?php
session_start();
require ("../../config/config.php");
include("../utils/utils.php");




if (isset($_POST['p_name']) && isset($_POST['nation']) && isset($_POST['Club']) && isset($_POST['position']) &&
    isset($_POST['DivPace']) && isset($_POST['HandShot']) && isset($_POST['KickPassing']) && 
    isset($_POST['RefDrib']) && isset($_POST['SpeedDeff']) && isset($_POST['PositionPc']) && 
    isset($_POST['p_Rating']) ) {
    
    $sqlGetId = "SELECT * FROM players ORDER BY player_id DESC";
    
    $p_name = validate_input($_POST['p_name'],"string");
    $nation = intval($_POST['nation']);
    $club = intval($_POST['Club']);
    $position = validate_input($_POST['position'],"string");
    $p_rating = intval($_POST['p_Rating']);

    $divPace = $_POST['DivPace'];
    $handShot = $_POST['HandShot'];
    $kickPassing = $_POST['KickPassing'];
    $refDrib = $_POST['RefDrib'];
    $speedDeff = $_POST['SpeedDeff'];
    $positionPc = $_POST['PositionPc'];
    $photo = $_POST['p_image'];
    if ($p_name && $position) {
        $sql = "INSERT INTO `players` (`p_name`, `photo`, `position`, `availibility`, `rating`, `nation_id`, `club_id`, `isArchive`, `isDeleted`) 
                VALUES (?, ?, ?, '1', ?, ?, ?,'0','0')";
        $stmt = $conn->prepare($sql);
    
        $sqlStats = "INSERT INTO `players_stats` (`player_id`, `diving_or_pace`, `handling_or_shooting`, `kicking_or_passing`, `reflexes_or_dribbling`, `speed_or_defending`, `positioning_or_physical`) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmtStats = $conn->prepare($sqlStats);
    
        if ($stmt && $stmtStats) {
            // Bind parameters to the prepared statement
            $stmt->bind_param("ssssss",$p_name, $photo, $position, $p_rating, $nation, $club);
            
    
            // Execute the statement
            if ($stmt->execute()) {
                $result = $conn->query($sqlGetId);
                $row = $result-> fetch_assoc();
                $id = $row["player_id"];
    
                $stmtStats->bind_param("sssssss",$id, $divPace, $handShot, $kickPassing, $refDrib, $speedDeff, $positionPc);
                if ($stmtStats->execute()) {
                    $_SESSION["messageBack"] = "Player added successfully.";
                    $_SESSION["messageColor"] = "green";
                }
            } else {
                    $_SESSION["messageBack"] = "There Is A Problem , Please Check Your Inputs !";
                    $_SESSION["messageColor"] = "red";
            }
    
            // Close the statement
            $stmt->close();
        }else {
            $_SESSION["messageBack"] = "Error preparing the SQL statement.";
            $_SESSION["messageColor"] = "red";
        }
        
    }else{
        $_SESSION["messageBack"] = "There Is A Problem In Name Input , Please Enter Name Without Numbers !";
        $_SESSION["messageColor"] = "red";
    }
}else{
    print_r($_POST);
    $_SESSION["messageBack"] = "There Is A Problem , Please Check Your Inputs !";
    $_SESSION["messageColor"] = "red";

}
session_unset();