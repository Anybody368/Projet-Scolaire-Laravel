W31 - Développement web
=======================

**IMPORTANT : Il sera impératif de savoir utiliser ce dépôt pour le TP noté.**

Pour démarrer, vous devez :

1. Mettre en place une clé SSH en suivant le tuto [GITLABSSH.md](GITLABSSH.md)
2. Mettre en place votre environnement de travail en suivant les instructions ci-dessous.

#### Les diapos des cours :

- [CM n°1 : Introduction à PHP](https://adrien.krahenbuhl.fr/courses/IUTRS/W31/CM1/)

#### Moodle exam

- [Les QCM](https://moodle-exam.unistra.fr/course/view.php?id=1271)

1 - Créer un **fork** sur Gitlab
--------------------------------

Il suffit de cliquer sur le bouton "Fork" en haut de la page.

**À FAIRE** : Ajouter le responsable du module et votre enseignant de TP en tant que "Reporter" de votre dépôt, via le menu "Manage -> Members" dans la colonne de gauche de votre fork.

2 - Créer un **clône** sur votre ordinateur
-------------------------------------------

1. Installer git sur votre ordinateur personnel (rien à faire sur les postes de l'IUT) :

```sh
$ sudo apt install git
```

2. Configurer vos informations d'utilisateur :

```sh
$ git config --global user.name "[Prenom] [Nom]"
$ git config --global user.email "[login]@unistra.fr"
```

3. Cloner votre fork :

```sh
$ git clone git@git.unistra.fr:[login]/W31.git
```

3 - Ajouter le **remote "prof"**
--------------------------------

En trois commandes :

```sh
$ cd W31
$ git remote add prof git@git.unistra.fr:W31/w31.git
$ git fetch prof
```

Si tout s'est bien passé, la commande :

```sh
$ git remote -v
```

affiche :

```sh
origin	git@git.unistra.fr:[login]/w31.git (fetch)
origin	git@git.unistra.fr:[login]/w31.git (push)
prof	git@git.unistra.fr:W31/w31.git (fetch)
prof	git@git.unistra.fr:W31/w31.git (push)
```
