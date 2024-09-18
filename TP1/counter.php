<!DOCTYPE html>
<?php session_start(); ?>

<html>
 
  <head>
    <title>Exercice 3.1 et 3.3</title>
  </head>

  <body>
    <?php if(!isset($_SESSION['nbr']))
    {
        $_SESSION['nbr'] = 1;
    }
    else {
        $_SESSION['nbr']++;
    }
    echo "<p>Cette page a été visitée ".$_SESSION['nbr']." fois</p>";?>
    
    <a href="resetCounter.php">Remettre le compteur à 0</a>
  </body>
 
</html>
