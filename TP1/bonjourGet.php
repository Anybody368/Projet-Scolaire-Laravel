<!DOCTYPE html>
 
<html>
 
   <head>
     <title>Exercice 2</title>
   </head>
 
   <body>
     <p>Juste un test pour afficher du texte</p>
     <?php if(isset($_GET['module']) && $_GET['module'] != "")
     {
        echo "<p>La variable 'module' vaut " . htmlspecialchars($_GET['module']) . "</p>";
     }
     else
     {
         echo "'module' n'est pas déclarée";
     }?>
   </body>
 
</html>
