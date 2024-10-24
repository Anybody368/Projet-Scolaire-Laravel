TP6 - Sessions et Middleware
============================

Objectifs
---------

Dans le TP précédent, nous avons mis en place une application de base avec modèle, vues, contrôleur et routage. Cette version est fonctionnelle mais ne profite pas de tous les avantages de Laravel.

Dans ce TP, l'objectif est de supprimer complètement les sessions PHP pour ne plus utiliser que les sessions Laravel, et de créer un middleware pour l'authentification.

La documentation officielle :

- [pour les sessions](https://laravel.com/docs/10.x/session)
- [pour les redirections avec des sessions "flash"](https://laravel.com/docs/10.x/responses#redirecting-with-flashed-session-data)


Exercice 1 : Messages flash avec les session Laravel
----------------------------------------------------

Laravel gère les sessions en interne et rend l'écriture des contrôleurs et vues plus simple. Pour les questions de cet exercice, basez-vous sur [cette documentation](https://laravel.com/docs/10.x/responses#redirecting-with-flashed-session-data).

1. Dans `UserController`, pour toutes les méthodes, utiliser la directive `with` pour transmettre les messages aux vues à la place de `$_SESSION`.

1. Dans chaque vue, remplacer le bloc d'affichage par un bloc Blade qui utilise `@if` et la fonction globale `session(...)`.

À ce stade, les message doivent fonctionner. Si ce n'est pas le cas, débugguez.


Exercice 2 : Un utilisateur en session Laravel
----------------------------------------------

1. Dans `UserController`, utilisez les sessions Laravel pour [stocker](https://laravel.com/docs/10.x/session#storing-data) et [supprimer](https://laravel.com/docs/10.x/session#deleting-data) l'utilisateur connecté en session, et [vérifier](https://laravel.com/docs/10.x/session#determining-if-an-item-exists-in-the-session) qu'il est connecté. **Attention**, on ne stocke plus juste son login en session mais bien l'objet de type `MyUser`. Adaptez `UserController` en conséquence.

1. Dans les vues nécessitant que l'utilisateur soit connecté, supprimer simplement les blocs PHP correspondants.

1. Dans la vue `account`, utilisez Blade pour afficher le login de l'utilisateur stocké en session.

Exercice 3 : Middleware d'authentification
------------------------------------------

1. Avec `artisan`, créer un middleware `AuthenticateMyUser`.

1. Compléter sa méthode `handle` pour :
	- rediriger vers la route `signin` s'il n'y a pas d'utilisateur en session
	- stocker dans une nouvelle variable `$request->user` l'utilisateur qui est actuellement en session, s'il existe.

1. Enregistrer le middleware comme `auth.myuser` dans `Kernel.php`.

1. Dans le fichier de routage `web.php`, créer un groupe de route contenant les routes qui nécessitent d'être authentifié et ajouter le middleware précédemment créé à ce groupe.

1. Dans `UserController`, utiliser la nouvelle variable `$request->user` lorsque c'est possible.
