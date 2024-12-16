<?php
require("config.php");
$playerName = $_POST['playerName'];
$playerPhoto = "photo";
$playerPosition = $_POST['playerPosition'];
$playerRating = intval($_POST['playerRating']);
$playerCountry = $_POST['playerCountry'];
$playerClub = $_POST['playerClub'];

$divingpace = intval($_POST['divingpace']);
$handlingShoting = intval($_POST['handlingShoting']);
$kickingpassing = intval($_POST['kickingpassing']);
$RefDribb = intval($_POST['RefDribb']);
$speedDeff = intval($_POST['speedDeff']);
$PositioningPhisical = intval($_POST['PositioningPhisical']);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sqlPlayers = 'INSERT INTO players(p_name,photo,position,rating,availibility,nation_id,club_id) VALUES("awad",null,"GK",45,TRUE,1,2)';
    $runPlayers = $conn->prepare($sqlPlayers);
    $runPlayers->bind_param("sssiiii", $playerName, $playerPhoto, $playerPosition, $playerRating, $playerCountry, $playerClub);
    $runPlayers->execute();

    $sqlGetPlayers = "SELECT player_id FROM players WHERE p_name = $playerName";
    $runPlayers = $conn->query($sqlGetPlayers);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            echo $row["player_id"];
        }
        
    }

    $sqlStats = 'INSERT INTO players_stats(p_name,photo,position,rating,availibility,nation_id,club_id) VALUES("awad",null,"GK",45,TRUE,1,2)';


}


$runPlayers->close();
$conn->close();