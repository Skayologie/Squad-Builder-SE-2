<?php
require("config.php");
if (isset($_GET["inputClub"])) {
    $sql = "SELECT * FROM clubs WHERE club_name LIKE '%".$_GET['inputClub']."%'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div id="'.$row["club_id"].'" onclick="addToInput('."'".$row["club_name"]."'".')" class="Country cursor-pointer hover:bg-slate-400 flex items-center px-5">
                <img class="h-5" src="'.$row["club_logo"].'" alt="">
                <p class="p-5 ">'.$row["club_name"].'</p> 
            </div>
        ';
    }
}
