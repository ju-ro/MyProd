<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Generátor čísla účtu</title>
</head>
<body>
<?php

/* 
	bez licence, volne k vyuziti
	https://k3a.me/cz-generator-bankovniho-cisla-uctu
*/

function cnbMod11($base)
{
	$len = strlen($base);
	if ($len > 10) {
		return false;
	} else if ($len < 10) {
		// dopln nuly zleva
		$base = str_repeat('0', 10-strlen($base)) . $base;	
	}

	$weight = array(1, 2, 4, 8, 5, 10, 9, 7, 3, 6);

	$sum = 0;
	$reversed = strrev($base);
	for ($i = 0; $i < strlen($reversed); $i++)
		$sum += substr($reversed, $i, 1) * $weight[$i];

	if ($sum % 11 == 0)
		return true;
	else 
		return false;
}

$input = 1234567901;
if (array_key_exists("input", $_REQUEST)) {
	$input = intval($_REQUEST['input']);
} else if (array_key_exists("source", $_REQUEST)) {
	echo '<pre>' . htmlentities(file_get_contents('mod11.php')) . '</pre>';
}

echo "<h1>Generátor čísla účtu</h1>";
echo "Podle Modulo 11 algoritmu z vyhlášky ČNB č. 62/2004.<br>";
echo "Číslo může být nejvíc desetimístné. Předčíslí není implementováno.<br>";
echo "<a href='mod11.php?source'>Zobrazit zdrojový kód v PHP</a>";
echo "<br><br>";
echo "Po zadání počátečního čísla se vygenerují validní čísla účtu stejná nebo vyšší zadanému počátečnímu.<br><br>";
echo "<form>Počáteční číslo: <input type='text' name='input' value='$input'><input type='submit' value='Generovat'></form>";


for ($i=0; $i<100; $i++) {
	$num = $input + $i;
	if (cnbMod11($num)) {
		if ($i == 0) 
			echo "<strong>$num</strong><br/>";
		else
			echo "<i>$num</i><br/>";
	}
}
?>
</body>
</html>