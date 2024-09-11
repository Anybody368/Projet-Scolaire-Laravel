Serveur PHP local
=================

Pour l'environnement de travail, l'utilisation d'**une usine à gaz comme LAMP ou WAMP est inutile : vous n'avez besoin que de PHP**.

Installation sur un ordinateur personnel
----------------------------------------

### Sous Linux

**Note : si vous avez un ordinateur de prêt, tout est déjà installé.**

Sinon, il vous faut les droits root pour installer l'ensemble des paquets dont vous aurez besoin en une seule commande :

```bash
$ sudo apt install php sqlite3 php-sqlite3 sqlitebrowser composer
```

### Sous windows

##### Solution recommandée

Installer une distribution Linux en Dual Boot.

##### Alternative (pour les noobs qui n'ont pas Linux sur leur ordinateur)

Utiliser WSL => [https://learn.microsoft.com/fr-fr/windows/wsl/](https://learn.microsoft.com/fr-fr/windows/wsl/)

Utilisation
-----------

### Lancement d'un serveur local

La procédure à suivre pour lancer un serveur PHP local est détaillée [dans la doc de PHP](https://www.php.net/manual/fr/features.commandline.webserver.php) dont voici un résumé :

0. On suppose que le répertoire `/chemin/vers/mon/repertoire/de/TP/` sera la racine de l'ensemble des fichiers de votre TP.
1. Ouvrir un terminal
2. Lancer un serveur local dont la racine est ce répertoire :
	```bash
	$ php -S 127.0.0.1:port -t /chemin/vers/mon/repertoire/de/TP/
	```
	avec `port` un entier compris entre 1025 et 65535. Si vous avez un message d'erreur, essayez un autre port.

### Accéder au serveur local depuis un navigateur

Pour visualiser le rendu d'un fichier PHP par le serveur que vous avez lancé, il suffit d'ouvrir un navigateur à cette URL :

**`http://127.0.0.1:port`**

et d'ajouter son chemin à la fin de l'URL.

**Exemples**

|                   Fichier à visualiser                 |                      URL                     |
|--------------------------------------------------------|----------------------------------------------|
| `/chemin/vers/mon/repertoire/de/TP/signin.php`         | `http://127.0.0.1:port/signin.php`           |
| `/chemin/vers/mon/repertoire/de/TP/rep1/rep2/test.php` | `http://127.0.0.1:port/rep1/rep2/signin.php` |
