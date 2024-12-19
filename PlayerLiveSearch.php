<?php
require("config.php");
if (isset($_GET["searchText"])) {
    $sql = "SELECT * FROM players 
    JOIN nations ON nations.nation_id = players.nation_id 
    JOIN clubs ON clubs.club_id = players.club_id 
    JOIN players_stats ON players_stats.player_id = players.player_id
    WHERE players.p_name LIKE '%".$_GET['searchText']."%' AND players.isArchive = 0";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <tr class="bg-[#155e75] border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-[#08475b]">
                
                <th scope="row" class="flex gap-2 items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <p class="text-white">'. $row["player_id"].'</p>
                    <img class="w-[40px]" src="'. $row["photo"].'" alt="">
                    <p class="text-white">'. $row["p_name"].'</p>
                    <div class="flex h-[15px] gap-3">
                        <img class="h-[100%]" src="'. $row["nation_logo"].'" alt="">
                        <img class="h-[100%]" src="'. $row["club_logo"].'" alt="">
                    </div>

                </th>
                <td class=" px-6 py-4">
                    '. $row["position"].'
                </td>
                <td class=" px-6 py-4">
                    '. $row["rating"].'
                </td>
                <td class=" px-6 py-4">
                    '. $row["diving_or_pace"].'
                </td>
                <td class=" px-6 py-4">
                    '. $row["handling_or_shooting"].'
                </td>
                <td class=" px-6 py-4">
                    '. $row["kicking_or_passing"].'
                </td>
                <td class=" px-6 py-4">
                    '. $row["reflexes_or_dribbling"].'
                </td>
                <td class=" px-6 py-4">
                    '. $row["speed_or_defending"].'
                </td>
                <td class=" px-6 py-4">
                    '. $row["positioning_or_physical"].'
                </td>
                 <td class="flex items-center justify-center px-6 py-4">
                    <div onclick="updateThisPlayer('.$row["player_id"].')" class="font-medium text-2xl  hover:text-blue-500 ">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                    <div onclick="archiveThisPlayer('.$row["player_id"].')" href="#" class="font-medium text-2xl  hover:text-blue-500 ml-[10px]">
                        <i class="fa-solid fa-box-archive"></i>
                    </div>
                </td>
            </tr>
        ';
    }}
    $conn->close();
}
