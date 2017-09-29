<?php

set_time_limit(0);

if (!file_exists('item.txt'))
{
	exit("Unable to find item txt file".PHP_EOL);
}

$data = file_get_contents('item.txt');
$old_swf_files = glob('files/*.swf');
$old_data_files = glob('data/*');
$errors = array();
$items = array();

// Parser du fichier texte
foreach (explode(';', $data) as $line)
{
	preg_match('/(I\.u\[([0-9]+)\])/', $line, $iu);
	preg_match('/(t:([0-9]+))/', $line, $t);
	preg_match('/(g:([0-9]+))/', $line, $g);
	preg_match('/(d:"(.+)",)/', $line, $d);
	preg_match('/(wd: ([a-z]+),)/', $line, $wd);
	preg_match('/(fm:([a-z]+),)/', $line, $fm);
	
	array_push($items, [
		'id' => intval($iu[2]),
		'type' => intval($t[2]),
		'gfx' => intval($g[2]),
		'desc' => $d[2],
		'wd' => $wd[2],
		'fm' => $fm[2],
	]);
}
// Sauvegarde des erreurs dans un fichier texte
$error_file = fopen('data/error.txt', 'w');

foreach ($errors as $message)
{
	fwrite($error_file, $message.PHP_EOL);
}

fclose($error_file);

// Enregistrement des données dans un fichier JSON
file_put_contents('data/data.json', json_encode($items, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo "JSON file successfully generated".PHP_EOL;
