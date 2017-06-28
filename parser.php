<?php

set_time_limit(0);

$data = file_get_contents('item.txt');
$array = array();

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

	array_push($array, [
		'id' => intval($iu[2]),
		'type' => intval($t[2]),
		'gfx' => intval($g[2]),
		'desc' => $d[2],
	]);
}

// Copie des looks selon les ID des items
foreach ($array as $item)
{
	$path = 'clips/items/'.$item['type'].'/'.$item['gfx'].'.swf';

	if (file_exists($path))
	{
		try
		{
			copy($path, 'output/'.$item['id'].'.swf');

			echo 'SWF for item '.$item['id'].' successfully generated.<br />';
		}
		catch (Exception $e)
		{
			echo 'Fail to generate SWF for item '.$item['id'].'<br />';
		}
	}
	else
	{
		echo 'Unable to find file: '.$path.'<br />';
	}
}

// Enregistrement des données dans un fichier JSON
file_put_contents('output/data.json', json_encode($array));