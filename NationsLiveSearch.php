<?php
require("config.php");
if (isset($_GET["input"])) {
    $sql = "SELECT * FROM nations WHERE nation_name";
    // LIKE '%".$_GET['input']."%'
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <option>'.$row["nation_name"].'</option>
        ';
    }
}

