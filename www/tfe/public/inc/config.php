<?php



$bdd = mysqli_connect("localhost", "root" ,"loickcnz7158" ,"boutique_tfe");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Echec de la connexion à MySQL: " . mysqli_connect_error();
  die();
  }
ini_set('default_charset', 'UTF-8');
?>