# Item.Parser
Script PHP récuperant les infos des items depuis les langs de Dofus 1.29.

## Utilisation
Le script est prévu pour être lancé en mode console, pour le lancer, éxécuter cette commande à la racine du dossier:
```
php parser.php
```

Les informations des langs doivent être contenus dans un fichier `item.txt` à la racine du dossier, le script générera les swf dans le dossier `files/`.

Le script génère aussi un fichier contenant les erreurs rencontrés lors de son éxécution ainsi qu'un fichier JSON dans le dossier `data/`.