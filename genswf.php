<?php

require './Core/Config.php';
require './Core/config.development.php';
require './Core/Request.php';
require './Core/DatabaseFactory.php';



//Recuperer tout les Item Templates
function getItemTemplates()
{
    $database = DatabaseFactory::getFactory()->getConnection();
    $sql      = "SELECT * FROM item_template";
    $query    = $database->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}


$Bugged = array('25001','25002','25003','57532');
if(isset($_GET['v'])){
$version = $_GET['v'];

echo '
FILE_BEGIN = true;<br>
System.security.allowDomain(_parent._url);<br>
VERSION = '.$version.';<br>
I = new Object();<br>
I.us = new Array();<br>
I.us[0] = "Arme éthérée";<br>
I.st = new Object();<br>
I.st[1] = true;<br>
I.st[2] = true;<br>
I.st[3] = true;<br>
I.st[4] = true;<br>
I.st[5] = true;<br>
I.st[6] = false;<br>
I.st[7] = true;<br>
I.st[8] = true;<br>
I.st[9] = true;<br>
I.st[10] = true;<br>
I.st[11] = true;<br>
I.st[12] = true;<br>
I.st[13] = false;<br>
I.st[14] = false;<br>
I.st[15] = true;<br>
I.st[16] = true;<br>
I.st[17] = true;<br>
I.st[18] = true;<br>
I.st[19] = false;<br>
I.st[20] = false;<br>
I.st[21] = false;<br>
I.st[22] = false;<br>
I.ss = new Array();<br>
I.ss[1] = [0];<br>
I.ss[2] = [1];<br>
I.ss[3] = [2, 4];<br>
I.ss[4] = [3];<br>
I.ss[5] = [5];<br>
I.ss[6] = [];<br>
I.ss[7] = [15];<br>
I.ss[8] = [1];<br>
I.ss[9] = [];<br>
I.ss[10] = [6];<br>
I.ss[11] = [7];<br>
I.ss[12] = [8];<br>
I.ss[13] = [9, 10, 11, 12, 13, 14];<br>
I.ss[14] = [];<br>
I.ss[15] = [20];<br>
I.ss[16] = [21];<br>
I.ss[17] = [22, 23];<br>
I.ss[18] = [24, 25];<br>
I.ss[19] = [26];<br>
I.ss[20] = [27];<br>
I.ss[21] = [16];<br>
I.ss[22] = [];<br>
I.ss[24] = [17];<br>
I.t = new Object();<br>
I.t[1] = {t: 1, n: "Amulette"};<br>
I.t[2] = {z: "Pa", t: 2, n: "Arc"};<br>
I.t[3] = {z: "Pa", t: 2, n: "Baguette"};<br>
I.t[4] = {z: "Tb", t: 2, n: "Bâton"};<br>
I.t[5] = {z: "Pa", t: 2, n: "Dague"};<br>
I.t[6] = {z: "Pa", t: 2, n: "Epée"};<br>
I.t[7] = {z: "Xb", t: 2, n: "Marteau"};<br>
I.t[8] = {z: "Pa", t: 2, n: "Pelle"};<br>
I.t[9] = {t: 3, n: "Anneau"};<br>
I.t[10] = {t: 4, n: "Ceinture"};<br>
I.t[11] = {t: 5, n: "Botte"};<br>
I.t[12] = {t: 6, n: "Potion"};<br>
I.t[13] = {t: 6, n: "Parchemin d\'expérience"};<br>
I.t[14] = {t: 6, n: "Objet de dons"};<br>
I.t[15] = {t: 9, n: "Ressource"};<br>
I.t[16] = {t: 10, n: "Chapeau"};<br>
I.t[17] = {t: 11, n: "Cape"};<br>
I.t[18] = {t: 12, n: "Familier"};<br>
I.t[19] = {z: "Pa", t: 2, n: "Hache"};<br>
I.t[20] = {z: "Pa", t: 2, n: "Outil"};<br>
I.t[21] = {z: "Pa", t: 2, n: "Pioche"};<br>
I.t[22] = {z: "Pa", t: 2, n: "Faux"};<br>
I.t[23] = {t: 13, n: "Dofus"};<br>
I.t[24] = {t: 14, n: "Objet de Quête"};<br>
I.t[25] = {t: 6, n: "Document"};<br>
I.t[26] = {t: 9, n: "Potion de forgemagie"};<br>
I.t[27] = {t: 15, n: "Objet de Mutation"};<br>
I.t[28] = {t: 16, n: "Nourriture boost"};<br>
I.t[29] = {t: 17, n: "Bénédiction"};<br>
I.t[30] = {t: 18, n: "Malédiction"};<br>
I.t[31] = {t: 19, n: "Roleplay Buffs"};<br>
I.t[32] = {t: 20, n: "Personnage suiveur"};<br>
I.t[33] = {t: 6, n: "Pain"};<br>
I.t[34] = {t: 9, n: "Céréale"};<br>
I.t[35] = {t: 9, n: "Fleur"};<br>
I.t[36] = {t: 9, n: "Plante"};<br>
I.t[37] = {t: 6, n: "Bière"};<br>
I.t[38] = {t: 9, n: "Bois"};<br>
I.t[39] = {t: 9, n: "Minerai"};<br>
I.t[40] = {t: 9, n: "Alliage"};<br>
I.t[41] = {t: 9, n: "Poisson"};<br>
I.t[42] = {t: 6, n: "Friandise"};<br>
I.t[43] = {t: 6, n: "Potion d\'oubli de sort"};<br>
I.t[44] = {t: 6, n: "Potion d\'oubli de métier"};<br>
I.t[45] = {t: 6, n: "Potion d\'oubli de maîtrise"};<br>
I.t[46] = {t: 9, n: "Fruit"};<br>
I.t[47] = {t: 9, n: "Os"};<br>
I.t[48] = {t: 9, n: "Poudre"};<br>
I.t[49] = {t: 6, n: "Poisson comestible"};<br>
I.t[50] = {t: 9, n: "Pierre précieuse"};<br>
I.t[51] = {t: 9, n: "Pierre brute"};<br>
I.t[52] = {t: 9, n: "Farine"};<br>
I.t[53] = {t: 9, n: "Plume"};<br>
I.t[54] = {t: 9, n: "Poil"};<br>
I.t[55] = {t: 9, n: "Etoffe"};<br>
I.t[56] = {t: 9, n: "Cuir"};<br>
I.t[57] = {t: 9, n: "Laine"};<br>
I.t[58] = {t: 9, n: "Graine"};<br>
I.t[59] = {t: 9, n: "Peau"};<br>
I.t[60] = {t: 9, n: "Huile"};<br>
I.t[61] = {t: 9, n: "Peluche"};<br>
I.t[62] = {t: 9, n: "Poisson vidé "};<br>
I.t[63] = {t: 9, n: "Viande"};<br>
I.t[64] = {t: 9, n: "Viande conservée"};<br>
I.t[65] = {t: 9, n: "Queue"};<br>
I.t[66] = {t: 9, n: "Metaria"};<br>
I.t[68] = {t: 9, n: "Légume"};<br>
I.t[69] = {t: 6, n: "Viande comestible"};<br>
I.t[70] = {t: 6, n: "Teinture"};<br>
I.t[71] = {t: 9, n: "Matériel d\'alchimie"};<br>
I.t[72] = {t: 6, n: "Oeuf de familier"};<br>
I.t[73] = {t: 6, n: "Maîtrise"};<br>
I.t[74] = {t: 6, n: "Fée d\'artifice"};<br>
I.t[75] = {t: 6, n: "Parchemin de sort"};<br>
I.t[76] = {t: 6, n: "Parchemin de caractéristique"};<br>
I.t[77] = {t: 6, n: "Certificat de mise en chanil"};<br>
I.t[78] = {t: 9, n: "Rune de forgemagie"};<br>
I.t[79] = {t: 6, n: "Boisson"};<br>
I.t[80] = {t: 6, n: "Objet de mission"};<br>
I.t[81] = {t: 11, n: "Sac à dos"};<br>
I.t[82] = {t: 7, n: "Bouclier"};<br>
I.t[83] = {t: 8, n: "Pierre d\'âme"};<br>
I.t[84] = {t: 9, n: "Clefs"};<br>
I.t[85] = {t: 6, n: "Pierre d\'âme pleine"};<br>
I.t[86] = {t: 6, n: "Potion d\'oubli percepteur"};<br>
I.t[87] = {t: 6, n: "Parchemin de recherche"};<br>
I.t[88] = {t: 6, n: "Pierre magique"};<br>
I.t[89] = {t: 6, n: "Cadeaux"};<br>
I.t[90] = {t: 9, n: "Fantôme de Familier"};<br>
I.t[91] = {t: 21, n: "Dragodinde"};<br>
I.t[92] = {t: 21, n: "Bouftou"};<br>
I.t[93] = {t: 6, n: "Objet d\'élevage"};<br>
I.t[94] = {t: 6, n: "Objet utilisable"};<br>
I.t[95] = {t: 9, n: "Planche"};<br>
I.t[96] = {t: 9, n: "Ecorce"};<br>
I.t[97] = {t: 6, n: "Certificat de monture"};<br>
I.t[98] = {t: 9, n: "Racine"};<br>
I.t[99] = {t: 8, n: "Filet de capture"};<br>
I.t[100] = {t: 6, n: "Sac de ressources"};<br>
I.t[102] = {z: "Lc", t: 2, n: "Arbalète"};<br>
I.t[103] = {t: 9, n: "Patte"};<br>
I.t[104] = {t: 9, n: "Aile"};<br>
I.t[105] = {t: 9, n: "Oeuf"};<br>
I.t[106] = {t: 9, n: "Oreille"};<br>
I.t[107] = {t: 9, n: "Carapace"};<br>
I.t[108] = {t: 9, n: "Bourgeon"};<br>
I.t[109] = {t: 9, n: "Oeil"};<br>
I.t[110] = {t: 9, n: "Gelée"};<br>
I.t[111] = {t: 9, n: "Coquille"};<br>
I.t[112] = {t: 6, n: "Prisme"};<br>
I.t[113] = {t: 22, n: "Objet vivant"};<br>
I.t[114] = {z: "Pa", t: 2, n: "Arme magique"};<br>
I.t[115] = {t: 6, n: "Fragment d\'âme de Shushu"};<br>
I.t[116] = {t: 6, n: "Potion de familier"};<br>
I.t[117] = {t: 6, n: "Trophé "};<br>
I.t[118] = {z: "Pa", t: 2, n: "Arme robot"};<br>
I.t[119] = {z: "Pa", t: 2, n: "Arme mercenaireé "};<br>
I.t[120] = {t: 6, n: "Objet de combat"};<br>
I.t[121] = {z: "Pa", t: 2, n: "Arme Légendaire"};<br>
I.t[122] = {t: 6, n: "Objet de renforcement"};<br>
I.t[169] = {n: "MultiMan", t: 24};<br>
I.u = new Object();<br>';
$needle = array('\"', '"', 'Ã©');
$haystack = array("\'", "\'", 'é');
foreach (getItemTemplates() as $key => $game) {
	
    $itemId        = $game->id;
    $itemName      = str_replace($needle, $haystack ,$game->name);
    $itemLv        = $game->level;
    $itemPod       = $game->pod;
    $itemPrix      = $game->prix;
    $itemGfx       = $game->gfx;
    $itemType      = $game->type;
    $itemSet       = ($game->panoplie == -1 ? '' : 's: '.$game->panoplie.',');
    $itemDesc      = str_replace($needle, $haystack , $game->desc);
    $itemCondition = ($game->condition == null ? '' : "c: \"" . $game->condition . "\",");
    $itemUsable = ($game->u == null ? '' : "u: " . $game->u . ",");
	$itemWd        = ($game->wd == null ? 'false' : $game->wd);
    $itemFm        = ($game->fm == null ? 'false' : $game->fm);
    $itemWInfo     = $game->armesInfos;	
	if(in_array($itemId, $Bugged)){		
		continue;
	}	
	if($itemGfx == null){
		continue;
	}
    if ($itemWInfo != null) {
        $Weapon        = explode(';', $itemWInfo);
        $PACost        = $Weapon[0];
        $minRange      = $Weapon[1];
        $maxRange      = $Weapon[2];
        $CriticalRate  = $Weapon[3];
        $FailureRate   = $Weapon[4];
        $CriticalBonus = $Weapon[5];
        $isTwoHanded   = (($Weapon[6] == 1) > 0 ? 'true' : 'false');
        $hasLoS        = (!(intval($minRange) == 1 && intval($maxRange) == 1) > 0 ? 'true' : 'false');
        $WeaponFormat  = "[$CriticalBonus, $PACost, $minRange, $maxRange, $CriticalRate, $FailureRate, $isTwoHanded, $hasLoS]";
        echo "I.u[$itemId] = {p: $itemPrix, $itemSet e: $WeaponFormat, $itemCondition w: $itemPod, $itemUsable fm: $itemFm, wd: $itemWd, l: $itemLv, g: $itemGfx, ep: 1, d: \"$itemDesc\", t: $itemType, n: \"$itemName\"}; <br>";
        continue;
    }    
    echo "I.u[$itemId] = {p: $itemPrix, $itemSet $itemCondition w: $itemPod, $itemUsable fm: $itemFm, wd: $itemWd, l: $itemLv, g: $itemGfx, ep: 1, d: \"$itemDesc\", t: $itemType, n: \"$itemName\"}; <br>";   
}
echo"FILE_END = true;<br>";
}