<?php

set_time_limit(0);

try
{
	$db = new PDO('mysql:host=localhost;dbname=dofusdb', 'root', '');
	$db->exec('SET NAMES utf8');
}
catch (Exception $e)
{
	exit($e->getMessage());
}

$path = 'data/data.json';

if (file_exists($path))
{
	$items = json_decode(file_get_contents($path), true);

	echo "Trying to synchronize ".count($items)." items".PHP_EOL;

	foreach ($items as $item)
	{
		$query = $db->prepare('UPDATE `item_template` SET `desc`=?, `gfx`=?, `wd`=?  WHERE `id`=?;');		
		$query->bindValue(1, $item['desc'], PDO::PARAM_STR);
		$query->bindValue(2, $item['gfx'], PDO::PARAM_INT);
		$query->bindValue(3, $item['wd'], PDO::PARAM_STR);
		$query->bindValue(4, $item['id'], PDO::PARAM_INT);	
		$query->execute();
	}

	echo count($items)." items were synchronized".PHP_EOL;
}
else
{
	exit("Unable to find JSON data files.".PHP_EOL);
}
