<!DOCTYPE html>
 
<html>
 
   <head>
     <title>Exercice 3 et 5</title>
   </head>
 
   <body>
    <?php if($_SERVER['REQUEST_METHOD'] != "POST")
    {
      header("Location: formulaire.html");
    }?>
     <p>Juste un test pour afficher du texte</p>
     <?php if(isset($_POST['firstname']) && isset($_POST['lastname']))
     {
        echo "<p>Le nom complet est ".htmlspecialchars($_POST['firstname'])." ".htmlspecialchars($_POST['lastname'])."</p>";
     }
     else if(isset($_POST['firstname']))
     {
         echo "Le prénom est ".htmlspecialchars($_POST['firstname']);
     }
     else if(isset($_POST['lastname']))
     {
         echo "Le nom de famille est ".htmlspecialchars($_POST['lastname']);
     }
     else
     {
         echo "Le nom n'a pas été transmit";
     }?>
   </body>
 
</html>
