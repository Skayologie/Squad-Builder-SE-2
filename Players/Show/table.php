<!-- Table Players -->
<div class="w-full overflow-scroll relative">
    <div style="z-index:50;" id="spinnerLoading" class="hidden bg-[#152e4d]/70 w-[100%] absolute flex justify-center items-center h-full">
        <div role="status absolute">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>
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
                <th title="FILTER BY RATING" style="cursor: pointer;" onclick="showFiltredData()" scope="col" class="px-6 py-3">
                    <div class="flex justify-center  items-center gap-2" >
                        Rating
                        <i class="fa-solid fa-filter"></i>
                    </div>
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
            JOIN clubs ON clubs.club_id = players.club_id ORDER BY players.player_id ASC");
            $result = $conn->query($sql);
            if ($result-> num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                        $sql = $row["p_name"];
                        echo '  
                        <tr class="bg-[#155e75] border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-[#08475b]">
                            
                            <th scope="row" class="flex gap-2 items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <p class="text-white">'. $row["player_id"].'</p>
                                <img id="photo'.$row["player_id"].'" class="w-[40px]" src="'. $row["photo"].'" alt="">
                                <p class=" text-white" style="text-overflow: ellipsis; overflow: hidden;width: 200px;white-space: nowrap;">'. $row["p_name"].'</p>
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

</div>