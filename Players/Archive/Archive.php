<?php
require '../../vendor/autoload.php'; // Composer autoloader 
require ("../../config/config.php");
$sql = "SELECT count(*) AS COUNT FROM players where isArchive = 1 AND isDeleted = 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
}
?>

<!-- Value card -->
<div class="mt-2">
<!-- State cards -->
<div class="grid grid-cols-1 gap-8 p-4 lg:grid-cols-2 xl:grid-cols-4">
<div class="flex items-center justify-between p-4 bg-white rounded-md dark:bg-darker">
    <div>
    <h6
        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light"
    >
        Total Players Archived
    </h6>
    <span class="text-xl font-semibold"><?php echo $row["COUNT"] ?> Player</span>
    </div>
    <div>
    <span>
        <i style="color: #8b5cf6;" class="text-3xl fa-solid fa-box-archive"></i>
    </span>
    </div>
</div>
</div>
</div>

<!-- Table Players -->
<div class="w-full overflow-scroll">
    <table id="tableDATA" class="w-full text-sm text-left rtl:text-right text-white dark:text-white">
        <thead style="background-color:#155e75;" class="text-xs text-white uppercase ">
            <tr>
                <th scope="col" class="px-6 py-3 flex gap-[40px]">
                    <p>ID</p>    
                    <p>Players</p>
                </th>
                <th scope="col" class="px-6 py-3">
                    Position
                </th>
                <th scope="col" class="px-6 py-3">
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
            JOIN players ON players.player_id = players_stats.player_id AND players.isArchive = 1 AND players.isDeleted = 0
            JOIN nations ON nations.nation_id = players.nation_id
            JOIN clubs ON clubs.club_id = players.club_id");
            $result = $conn->query($sql);
            if ($result-> num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                        $sql = $row["p_name"];
                        echo '
                        <tr class="bg-[#155e75] border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-[#08475b]">
                            
                            <th scope="row" class="flex gap-2 items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <p class="text-white">'. $row["player_id"].'</p>
                                <img class="w-[40px]" src="'. $row["photo"].'" alt="">
                                <p class="text-white"  style="text-overflow: ellipsis; overflow: hidden;width: 200px;white-space: nowrap;">'. $row["p_name"].'</p>
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
                            <td class="flex justify-center px-6 py-4">
                                <div onclick="restoreThisPlayer('. $row["player_id"].')" class="font-medium text-2xl  hover:text-blue-500 ">
                                    <i class="fa-solid fa-trash-can-arrow-up"></i>
                                </div>
                                <div onclick="deleteThisPlayer('.$row["player_id"].')" class="font-medium text-2xl  hover:text-blue-500 ml-[10px]">
                                    <i class="fa-solid fa-trash"></i>
                                </div>
                            </td>
                        </tr>
                        ';
                }
            }
            ?>
        </tbody>
    </table>
</div>