<?php
$imagePath = "./assets/public/images/playerImage/rodri.webp";
$imageBinary = fread(fopen($imagePath,"r"),filesize($imagePath));
$imageString = base64_encode($imageBinary);

echo $imageString;
echo "<img src='data:image/gif;based64,".$imageString."'/>";