<!DOCTYPE html>
<?php if(isset($_COOKIE['nbr']) && is_numeric($_COOKIE['nbr']))
{
    setcookie('nbr', $_COOKIE['nbr']+1, time() +1000);
}
else {
    setcookie('nbr', 1, time()+1000);
}?>

<html>
 
  <head>
    <title>Exercice 4</title>
  </head>

  <body>
    <?php echo "<p>Cette page a été visitée ".htmlspecialchars($_COOKIE['nbr'])." fois</p>";?>
    
    <a href="resetCounter.php">Remettre le compteur à 0</a>
  </body>
 
</html>
