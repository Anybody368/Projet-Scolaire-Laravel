<!DOCTYPE html>
 
<html>
 
  <head>
    <title>Exercice 2.3</title>
  </head>

  <body>
    <ul>
    <?php if(isset($_POST['nbItems']) && is_numeric($_POST['nbItems']))
    {
        for($i = 0; $i < (int) $_POST['nbItems']; $i++)
        {
            echo "<li>Un élément d'une liste</li>";
        }
    }?>
    </ul>
  </body>
 
</html>
