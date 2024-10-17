TP5 - Prise en main de Laravel
==============================

Objectifs
---------

Intégrer l'application d'authentification au framework Laravel.
Vous pouvez vous baser au choix :

- sur vos propres sources résultant du TP4
- sur la proposition du répertoire [correction/TP4](correction/TP4)

Notez que le but de ce TP est d'obtenir une application fonctionnelle **qui respecte le découpage MVC**.

Les TPs suivants permettront d'intégrer progressivement les fonctionnalités de Laravel à votre application.


Exercice 1 : Installation
-------------------------

Suivez les indications données dans [LARAVEL-installation.md](LARAVEL-Installation.md).


Exercice 2 : Préparation des vues
---------------------------------

1. Dans `resources/views/`, supprimez le fichier `welcome.blade.php` et copiez-y les fichiers suivants du TP4 :
	- `account.php`
	- `formpassword.php`
	- `signin.php`
	- `signup.php`

1. Dans `routes/web.php` :
	- Écrivez les routes GET pour les fichiers ci-dessus (ne pas utiliser `Route::view`)
	- Faites en sorte que la vue `signin.php` soit accessible avec la route `/` **ET** la route `/signin`
	- Testez toutes les routes GET. Quels sont les problèmes rencontrés ?

1. Pour chaque fichier de `resources/views/` :
	- renommez-le en `.blade.php`.
 	- remplacez toutes les références à des fichiers PHP par des références à des routes
	- ajoutez à tous les formulaire la directive `@csrf` (voir [la doc sur les CSRF](https://laravel.com/docs/11.x/csrf#preventing-csrf-requests) pour plus d'explications)


Exercice 3 : Préparation de la BDD
----------------------------------

1. Recopiez votre base de donnée du TP4 dans `database/tp5.db`.

1. Complétez votre fichier `.env` pour y déclarer votre base de données `tp5.db`.


Exercice 4 : Préparation du modèle
----------------------------------

1. Copiez le fichier `User.php` du TP4 dans un nouveau fichier `app/Models/MyUser.php` **Attention ** :
	- n'écrasez pas le fichier `User.php` existant déjà dans ce répertoire.**
	- ce n'est pas un vrai modèle Laravel, n'utilisez pas `artisan` pour créer le fichier.
	- Votre classe ne doit pas étendre la classe `Model` de Laravel

1. Dans `MyUser.php` :
	- ajouter le namespace `App\Models`
	- ajouter en entête les deux `use` suivants :
		```php
		use Illuminate\Support\Facades\DB;
		use PDO;
		```
	- remplacer tous les `MyPDO::pdo()` par `DB::connection()->getPdo()`


Exercice 5 : Un contrôleur pour s'authentifier
----------------------------------------------

À l'aide d'`artisan`, créez une contrôleur `UserController`.

1. Créez une méthode `connect` et copiez-y le code de `authenticate.php` du TP4.

1. Remplacez l'utilisation de  `User` par `MyUser`.

1. Dans la méthode `connect` :
	- utilisez l'objet `$request` pour accéder aux données transmises en POST (voir [la documentation de Request](https://laravel.com/docs/11.x/requests)) et remplacez la vérification des données par des méthodes de `$request`,
	- remplacer les `header('Location: ...'); exit;` par la méthode globale `redirect(<route>)` (voir [la documentation des Reponses HTTP](https://laravel.com/docs/11.x/responses#redirects)).
	- Remplacez toutes les `Exception` et `PDOException` par `\Exception` et `\PDOException`

1. Ajoutez une route pour appeler la méthode `connect` après validation du formulaire de `signin.blade.php`.

À ce stade, vous devez être en mesure de vous authentifier via la route `signin` et de vous retrouver sur `account`. Débugguez si ce n'est pas le cas.


Exercice 6 : Un contrôleur complet
----------------------------------

Répétez les questions 1 à 4 de l'exercice précédent pour :

- `adduser.php` dans une méthode `create`
- `changepassword.php` dans une méthode `updatePassword`
- `deleteuser.php` dans une méthode `delete`
- `signout.php` dans une méthode `disconnect`
