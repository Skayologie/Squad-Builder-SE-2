<?php 
require '../../vendor/autoload.php'; // Composer autoloader 
require("../../config/config.php");

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $sql = ("SELECT * FROM players_stats 
    JOIN players ON players.player_id = players_stats.player_id
    JOIN nations ON nations.nation_id = players.nation_id
    JOIN clubs ON clubs.club_id = players.club_id
    WHERE players.player_id = $id AND players.isArchive = 0");
    $result = $conn->query($sql);
    
    $row = $result-> fetch_assoc();
    // Player Name
    $name = $row["p_name"];
    // Country
    $CountryId = $row["nation_id"];
    $CountryName = $row["nation_name"];
    // Club 
    $ClubID = $row["club_id"];
    $ClubName = $row["club_name"];
    $image = $row["photo"];

    $position = $row["position"];

    $divPace = $row['diving_or_pace'];
    $handShot = $row['handling_or_shooting'];
    $kickPassing = $row['kicking_or_passing'];
    $refDrib = $row['reflexes_or_dribbling'];
    $speedDeff = $row['speed_or_defending'];
    $positionPc = $row['positioning_or_physical'];
    $rating = $row['rating'];

}
?>
<div style="justify-self:center;" class="w-[500px]  flex justify-center gap-5">
    
    <div class="flex flex-col items-center">
        <div class="flex flex-col items-center">
            <div class="imageUpdate">
                <img id="imageOutput" src="<?php echo $image; ?>" alt="">
            </div>
            <div class="grid grid-cols-2 items-end mt-6 ">
                <!-- NAME INPUT -->
                <div class="relative ForInput z-0 w-full mb-5 group col-span-1">
                    <input type="text" value="<?php echo $name; ?>" name="playerName" id="player_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="player_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Player Name</label>
                </div>
                <div class="relative z-0 w-full mb-5 group col-span-1">
                    <input onchange="getImage()" type="file" name="file" id="file" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rating</label>
                </div>
                
            </div>
            <!-- NATION INPUT -->
            <div class="relative ForInput z-0 w-full mb-5 group z-30">
                <select name="playerCountry" value="<?php echo $CountryId; ?>" id="results-nations" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="<?php echo $CountryId; ?>" selected><?php echo $CountryName; ?></option>
                    <?php
                        $sql = "SELECT * FROM nations";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '
                                <option value="'.$row["nation_id"].'">'.$row["nation_name"].'</option>
                            ';
                        }
                        
                    ?>
                </select>
            </div>

            <!-- CLUB INPUT -->
            <div class="relative ForInput z-0 w-full mb-5 group z-30">
                <select name="playerClub" value="<?php echo $ClubID; ?>" id="playerClub" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="<?php echo $ClubID; ?>" selected><?php echo $ClubName; ?></option>
                    <?php
                    $sql = "SELECT * FROM clubs";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <option value="'.$row["club_id"].'">'.$row["club_name"].'</option>
                        ';
                    }
                    ?>
                </select>
            </div>
        </div>

        <!-- POSITION INPUT -->
        <div class="relative ForInput z-0 w-full mb-5 group z-30">
            <select value="<?php echo $position; ?>" name="playerPosition" id="playerPosition" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option  value="<?php echo $position; ?>" selected><?php echo $position; ?></option>
                <?php
                    $sql = "SELECT DISTINCT position FROM players";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <option value="'.$row["position"].'">
                                '.$row["position"].'
                            </option>
                        ';
                    }
                    
                ?>
            </select>
        </div> 

        <!-- Stats INPUT -->
        <div style="width:100%;" class=" ForInput grid md:grid-cols-4 md:gap-6 relative z-[20]">
            <div class="relative z-0 w-full mb-5 group">
                <input required max="2" min="2"  value="<?php echo $divPace; ?>"  type="number" name="divingpace" id="divingpace" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pace</label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input required max="2" min="2"  value="<?php echo $handShot; ?>" type="number" name="handlingShoting" id="handlingShoting" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Shooting</label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input required max="2" min="2"  value="<?php echo $kickPassing; ?>"  type="number" name="kickingpassing" id="kickingpassing" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Passing</label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input required max="2" min="2"  value="<?php echo $refDrib; ?>"  type="number" name="RefDribb" id="RefDribb" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dribbling</label>
            </div>
        </div>
        <div style="width:100%;" class=" ForInput grid md:grid-cols-3 md:gap-6 relative z-[20]">

            <div class="relative z-0 w-full mb-5 group">
                <input required max="2" min="2"   value="<?php echo $speedDeff; ?>"  type="number" name="speedDeff" id="speedDeff" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deff</label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input required max="2" min="2"  value="<?php echo $positionPc; ?>"  type="number" name="PositioningPhisical" id="PositioningPhisical" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phisical</label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input required max="2" min="2"  value="<?php echo $rating; ?>"  type="number" name="playerRating" id="playerRating" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rating</label>
            </div>
        </div>

            
            <button style="width:100%;" onclick="updatePlayer('<?php echo $id; ?>')" class="col-span-4 text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </div>

    </div>      
</div>
