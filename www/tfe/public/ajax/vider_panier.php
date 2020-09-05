<?php

session_start();


if(!isset($_SESSION["id_client"])){
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Veuillez vous connecter pour effectuer cette opération.</div>";
  header("../connexion.php");
  die();
}


include("../inc/config.php");

$_SESSION["panier_client"] = array();


$_SESSION["status"] = "<div class='alert alert-success' role='alert'>Produit vidé !</div>";
  header("Location: ../index.php");
  die();
?>
