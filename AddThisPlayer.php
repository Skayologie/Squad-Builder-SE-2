<?php
require ("config.php");
if (isset($_POST['p_name']) && isset($_POST['nation']) && isset($_POST['Club']) && isset($_POST['position']) &&
    isset($_POST['DivPace']) && isset($_POST['HandShot']) && isset($_POST['KickPassing']) && 
    isset($_POST['RefDrib']) && isset($_POST['SpeedDeff']) && isset($_POST['PositionPc']) && 
    isset($_POST['p_Rating']) && isset($_POST['p_image'])) {
    
    $sqlGetId = "SELECT * FROM players ORDER BY player_id DESC";
    
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
    $photo = $_POST['p_image'];

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
                echo "Player added successfully.";
            }
        } else {
            echo "Error adding player: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }else {
        echo "Error preparing the SQL statement.";
    }



}




    // $insert = "INSERT INTO `players` (`player_id`, `p_name`, `photo`, `position`, `availibility`, `rating`, `nation_id`, `club_id`, `isArchive`, `isDeleted`) 
    // VALUES (NULL, 'Jawad Boulmal', 'default.png', 'GK', '1', '12', '12', '15', '0', '0')"


    // $stmt = $conn->prepare($insert_stats_query);
    // $stmt->bind_param("iiiiii", $pace, $shooting, $passing, $dribbling, $defending, $physical);

    // if ($stmt->execute()) {

    // $normal_player_id = $stmt->insert_id;
    // } else {
    // echo "Error inserting player statistics: " . $stmt->error;
    // exit;
    // }