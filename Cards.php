<?php
require("config.php");
$sql = "SELECT count(*) AS COUNT FROM players WHERE isArchive = 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
}
$topPlayerSql = "SELECT * FROM players WHERE isArchive = 0 ORDER BY rating DESC LIMIT 1";
$resultTopPlayer = $conn->query($topPlayerSql);
if ($resultTopPlayer->num_rows > 0) {
    // output data of each row
    $rowTOPPLAYER = $resultTopPlayer->fetch_assoc();
}
$ids = $rowTOPPLAYER['player_id'];
$sqlAllPlayers = ("SELECT * FROM players_stats 
        JOIN players ON players.player_id = '$ids'
        JOIN nations ON nations.nation_id = players.nation_id
        JOIN clubs ON clubs.club_id = players.club_id");

$resultAllPlayer = $conn->query($sqlAllPlayers);
if ($resultAllPlayer->num_rows > 0) {
    // output data of each row
    $rowALLPLAYER = $resultAllPlayer->fetch_assoc();
}

?>
<div class="mt-2">
<!-- State cards -->
<div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
<!-- Value card -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
    <h6
        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
    >
        Total Players
    </h6>
    <span class="text-xl font-semibold"><?php echo $row["COUNT"] ?> Player</span>
    </div>
    <div>
    <span>
        <i style="color:#22c55e;font-size:40px;" class="fa-solid fa-users"></i>
    </span>
    </div>
</div>

<!-- Users card -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
    <h6
        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
    >
        Top Player
    </h6>
    <div class=" items-center justify-center">
        <span class="text-xl font-semibold"><?= $rowALLPLAYER['p_name'] ?> (<?= $rowALLPLAYER['position'] ?>)</span>
        <div style="height:20px;" class="text-xl flex  font-semibold items-center ">
            <div style="height:100%;"><img style="height:100%;" src="<?= $rowALLPLAYER['nation_logo'] ?>" alt=""></div>
            <div style="height:100%;"><img style="height:100%;" src="<?= $rowALLPLAYER['club_logo'] ?>" alt=""></div>
            <span class=" pl-2"><?= $rowALLPLAYER['rating'] ?></span>
        </div>
    </div>
    </div>
    <div style="width:20%; border-radius:8px; overflow:hidden;">
    <span >
        <img src="<?= $rowALLPLAYER['photo'] ?>" alt="">
    </span>
    
    </div>
</div>

<!-- Orders card -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
    <h6
        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
    >
        Orders
    </h6>
    <span class="text-xl font-semibold">45,021</span>
    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
        +3.1%
    </span>
    </div>
    <div>
    <span>
        <svg
        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
        />
        </svg>
    </span>
    </div>
</div>

<!-- Tickets card -->
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
    <h6
        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
    >
        Tickets
    </h6>
    <span class="text-xl font-semibold">20,516</span>
    <span class="inline-block px-2 py-px ml-2 text-xs text-green-500 bg-green-100 rounded-md">
        +3.1%
    </span>
    </div>
    <div>
    <span>
        <svg
        class="w-12 h-12 text-gray-300 dark:text-primary-dark"
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
        >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"
        />
        </svg>
    </span>
    </div>
</div>
</div>


</div>
