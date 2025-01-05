<!DOCTYPE html>
<html>
<body>

<?php
$channel01 = $_GET["aa01"]; //týmto si načítam Channel z playlistu, ktorý pozerám

# týmto si načítam prvú časť adresy streamu zo zdrojového Orange playlistu, ktorú potom číta playlist, ktorý pozerám
$section01 = file_get_contents('http://jurooo.wz.cz/Xb/orangetv.playlist.m3u8', FALSE, NULL, 215, 88);

#týmto vytváram url, ktorú si vyskladám z tohoto skriptu a ktorá sa streamuje v pozeranom playliste
$url01 = ($section01.$channel01.".m3u8"); 

header('Location: '.$url01.'');
exit;

$channel02 = $_GET["aa02"]; //týmto si načítam Channel z playlistu, ktorý pozerám

# týmto si načítam prvú časť adresy streamu zo zdrojového Orange playlistu, ktorú potom číta playlist, ktorý pozerám
$section02 = file_get_contents('http://jurooo.wz.cz/Xb/orangetv.playlist.m3u8', FALSE, NULL, 7356, 88);

#týmto vytváram url, ktorú si vyskladám z tohoto skriptu a ktorá sa streamuje v pozeranom playliste
$url02 = ($section02.$channel02.".m3u8"); 

header('Location: '.$url02.'');
exit;


?> 

</body>
</html>
