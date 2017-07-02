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

// On vide les dossier de sortie
if (count($old_swf_files) > 0)
{
	echo "Deleting older generated SWF files (".count($old_swf_files).")".PHP_EOL;

	foreach ($old_swf_files as $swf_file)
	{
		unlink($swf_file);
	}
}

if (count($old_data_files) > 0)
{
	echo "Deleting older data files (".count($old_data_files).")".PHP_EOL;

	foreach ($old_data_files as $data_file)
	{
		unlink($data_file);
	}
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
echo "Trying to generate new SWF files (".count($items).")".PHP_EOL;

foreach ($items as $item)
{
	$path = 'clips/items/'.$item['type'].'/'.$item['gfx'].'.swf';

	if (file_exists($path))
	{
		if (!copy($path, 'files/'.$item['id'].'.swf'))
		{
			array_push($errors, "Fail to generate SWF for item ".$item['id']);
		}
	}
	else
	{
		array_push($errors, "Unable to find file: ".$path);
	}
}

echo "SWF files successfully generated (".count($errors)." error(s) on ".count($items)." items)".PHP_EOL;

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