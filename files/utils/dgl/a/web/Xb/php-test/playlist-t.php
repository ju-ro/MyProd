<!DOCTYPE html>
<html>
<body>

<?php

##### Načítanie poľa znakov, z ktorých budem čítať url mojich streamov (spraviť načítanie z ext. súboru)
$channel = preg_quote($_GET["ch"]);
$string = file_get_contents('http://jurooo.wz.cz/Xb/orangetv.playlist.m3u8');

##### Script na parsovanie - rozložím si pole na menšie celky, z ktorých budem vedieť čítať potrebné údaje, napr. url

$playlist02 = file_get_contents('http://jurooo.wz.cz/Xb/orangetv.playlist1.m3u8');
preg_match_all('/(?<link>http\S+\.m3u8)/', $playlist02, $matches);

$pattern = "/$channel\.m3u8$/";
$result = preg_grep($pattern, $matches["link"]);
#var_export($result);
foreach ($result as $url) {
    echo $url,\n;
}

header('Location: '.$url.'');
exit;

#$channel01 = $_GET["ch"]

?> 

</body>
</html>
