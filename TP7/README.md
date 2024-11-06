TP7 - Blade, routes nommées et groupes préfixés
===============================================


Objectif
--------

Dans le TP précédent, nous avons mis en place la gestion des sessions par Laravel et créé un middleware d'authentification.

Dans ce TP7, nous allons mettre en place un template Blade, utiliser des routes nommées et préfixer le groupe de route existant.


Exercice 1 : Un template global Blade
-------------------------------------

Objectif : simplifier l'écriture des vues. Référez-vous à la documentation des [layouts basés sur l'héritage](https://laravel.com/docs/11.x/blade#layouts-using-template-inheritance).

1. Créez un répertoire `layouts` dans `resources/views`

1. Dans ce répertoire, créez un fichier `mainLayout.blade.php` qui contient la structure de base d'un page HTML avec en entête un titre modifiable (`@yield`) et une section centrale `content`.

1. Modifier vos 4 vues pour qu'elles étendent `mainLayout`.


Exercice 2 : Un bloc Blade pour les messages
--------------------------------------------

Objectif : éviter de dupliquer les parties redondantes d'une page à l'autre.

1. Créez un répertoire `shared` dans `resources/views`.

1. Dans ce répertoire, créez un fichier `message.blade.php` qui affiche le message présent session s'il existe. En principe, ce morceau de code est déjà présent sur toutes vos vues de façon identique.

1. Modifiez votre layout principal pour qu'il insère le contenu de `message.blade.php` à la fin du `<body>`.

1. Simplifiez vos vues en conséquence.


Exercice 3 : Des routes nommées
-------------------------------

L'objectif des routes nommées consiste à décorréler son URL de son nom utilisé dans les contrôleurs et les vues pour l'appeler. Ainsi, plus tard, un changement d'URL ne nécessitera pas de modifier les vues ou les contrôleurs.

1. Nommez toutes les routes dans `routes/web.php` ([voir doc ici](https://laravel.com/docs/11.x/routing#named-routes)) avec :
	- un nom préfixé par `view_` pour les routes qui affichent une vue
	- un nom préixé par `user_` pour les routes qui exécutent une méthode de `UserController`

1. Dans les classes `UserController` et `AuthenticateMyUser`, modifiez toutes les redirections pour faire appel aux routes nommées en utilisant [`to_route(...)`](https://laravel.com/docs/11.x/routing#generating-urls-to-named-routes).

1. Dans toutes les vues, replacez toutes les références à des routes des formulaires et des liens par des références à des routes nommées avec la directive blade `{{ route('nom de la route') }}`.


Exercice 4 : Un groupe préfixé
------------------------------

Grâce aux routes nommées définies à l'exercice précédent, l'ajout d'un préfixe à un groupe de routes peut être réalisé sans toucher ni aux vues ni aux contrôleurs.

1. Ajoutez au groupe de routes authentifiées le préfixe `admin` ([voir ici](https://laravel.com/docs/11.x/routing#route-groups)).

1. Assurez-vous que tout votre site fonctionne, notamment que lorsque vous vous authentifiez, l'URL de la page `account` est bien `http://127.0.0.1:8000/admin/account`.
