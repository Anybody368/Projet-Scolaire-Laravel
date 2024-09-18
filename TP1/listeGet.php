<!DOCTYPE html>
 
<html>
 
  <head>
    <title>Exercice 2.2</title>
  </head>

  <body>
    <ul>
    <?php if(isset($_GET['nbItems']) && is_numeric($_GET['nbItems']))
    {
        for($i = 0; $i < (int) $_GET['nbItems']; $i++)
        {
            echo "<li>Un élément d'une liste</li>";
        }
    }?>
    </ul>
  </body>
 
</html>
