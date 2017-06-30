<?php

set_time_limit(0);

if (!file_exists('item.txt'))
{
	exit("Unable to find item txt file.");
}

$data = file_get_contents('item.txt');
$errors = array();
$items = array();

// On vide le dossier de sortie
foreach (glob('output/*') as $file)
{
	unlink($file);
}

// Parser du fichier texte
foreach (explode(';', $data) as $line)
{
	preg_match('/(I\.u\[([0-9]+)\])/', $line, $iu);
	preg_match('/(t:([0-9]+))/', $line, $t);
	preg_match('/(g:([0-9]+))/', $line, $g);
	preg_match('/(d:"(.+)",)/', $line, $d);

	array_push($items, [
		'id' => intval($iu[2]),
		'type' => intval($t[2]),
		'gfx' => intval($g[2]),
		'desc' => $d[2],
	]);
}

// Copie des looks selon les ID des items
foreach ($items as $item)
{
	$path = 'clips/items/'.$item['type'].'/'.$item['gfx'].'.swf';

	if (file_exists($path))
	{
		if (!copy($path, 'output/'.$item['id'].'.swf'))
		{
			array_push($errors, "Fail to generate SWF for item ".$item['id']);
		}
	}
	else
	{
		array_push($errors, "Unable to find file: ".$path);
	}
}

echo "Files successfully generated (".count($errors)." error(s) on ".count($items)." items)".PHP_EOL;

// Sauvegarde des erreurs dans un fichier texte
$error_file = fopen('output/error.txt', 'w');

foreach ($errors as $message)
{
	fwrite($error_file, $message.PHP_EOL);
}

fclose($error_file);

// Enregistrement des données dans un fichier JSON
file_put_contents('output/data.json', json_encode($items));