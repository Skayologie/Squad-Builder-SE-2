<?php
require ("config.php");
require("Cards.php")

?>

<!-- Table Players -->
<table class="w-full text-sm text-left rtl:text-right text-white dark:text-white">
    <thead style="background-color:#155e75;" class="text-xs text-white uppercase ">
        <tr>
            <th scope="col" class="px-6 py-3 flex gap-[40px]">
                <p>ID</p>    
                <p>Players</p>
            </th>
            <th scope="col" class="px-6 py-3">
                Position
            </th>
            <th style="cursor: pointer;" onclick="loadDashboard()" scope="col" class="px-6 py-3">
                Rating
            </th>
            <th scope="col" class="px-6 py-3">
                Pace
            </th>
            <th scope="col" class="px-6 py-3">
                Shooting
            </th>
            <th scope="col" class="px-6 py-3">
                Passing
            </th>
            <th scope="col" class="px-6 py-3">
                Dribbling
            </th>
            <th scope="col" class="px-6 py-3">
                defending
            </th>
            <th scope="col" class="px-6 py-3">
                physical
            </th>
            <th scope="col" class="px-6 py-3">
                Functions
            </th>
        </tr>
    </thead>
    <tbody id="playerSearchResult">
        <?php
        $sql = ("SELECT * FROM players_stats 
        JOIN players ON players.player_id = players_stats.player_id AND players.isArchive = 0
        JOIN nations ON nations.nation_id = players.nation_id
        JOIN clubs ON clubs.club_id = players.club_id ORDER BY rating DESC");
        $result = $conn->query($sql);
        if ($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                    $sql = $row["p_name"];
                    echo '  
                    <tr class="bg-[#155e75] border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-[#08475b]">
                        
                        <th scope="row" class="flex gap-2 items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <p class="text-white">'. $row["player_id"].'</p>
                            <img id="photo'.$row["player_id"].'" class="w-[40px]" src="'. $row["photo"].'" alt="">
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
                            <div onclick="updateThisPlayer('.$row["player_id"].')"  href="#" class="font-medium text-2xl  hover:text-blue-500 ">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                            <div onclick="archiveThisPlayer('.$row["player_id"].')" href="#" class="font-medium text-2xl  hover:text-blue-500 ml-[10px]">
                                <i class="fa-solid fa-box-archive"></i>
                            </div>
                        </td>
                    </tr>
                    ';
            }
        }
        ?>
    </tbody>
</table>