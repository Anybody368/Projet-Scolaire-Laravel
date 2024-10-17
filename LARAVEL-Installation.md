Laravel
=======

Installation de composer
------------------------

```
$ sudo apt install composer
```

ou téléchargez le script ici : [https://getcomposer.org](https://getcomposer.org).

Installation des dépendances
----------------------------

```
$ sudo apt install php-xml php-curl
```

Installation de Laravel
-----------------------

1. Initialisation d'un projet `[NOM_DU_PROJET]` :

```
$ composer create-project laravel/laravel [NOM_DU_PROJET]
```

ou commande `php composer ...` si vous avez téléchargé le script.

2. Lancement d'un serveur local :

```
$ cd [NOM_DU_PROJET]
$ php artisan serve
Starting Laravel development server: http://127.0.0.1:8000
```

Si tout s'est bien passé, votre navigateur affiche une page avec le contenu suivant pour l'URL `http://127.0.0.1:8000` :

```
Laravel

|---------------|-------------------|
| Documentation | Laracasts         |
|---------------|-------------------|
| Laravel News  | Vibrant Ecosystem |
|---------------|-------------------|
```
