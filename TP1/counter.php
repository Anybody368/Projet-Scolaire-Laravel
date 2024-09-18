<!DOCTYPE html>
<?php session_start(); ?>

<html>
 
  <head>
    <title>Exercice 3.1</title>
  </head>

  <body>
    <?php if(!isset($_SESSION['nbr']))
    {
        $_SESSION['nbr'] = 0;
    }
    else {
        $_SESSION['nbr']++;
    }
    
    echo "<p>Cette page a été visitée ".$_SESSION['nbr']." fois</p>";?>
  </body>
 
</html>
