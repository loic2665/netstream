<?php

include("../inc/config.php");

@session_start();


if($_SESSION["email_recup"] == NULL || $_SESSION["email_recup"] == ""){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Sans email, vous ne pourrez pas changer votre mot de passe !</div>";
  header("Location: ../recup_step_1.php");
  die();
  
  
}


if($_POST["new_mdp"] == ""){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Sans mot de passe, il n'est pas possible de changer de mot de passe !</div>";
  header("Location: ../recup_step_3.php");
  die();
  
  
}

$email_recup = $_SESSION["email_recup"];
$new_mdp = sha1($_POST["new_mdp"]);

$result = mysqli_query($bdd, "UPDATE `boutique_tfe`.`tfe_clients` set mdp='$new_mdp' WHERE email like '$email_recup'");

$_SESSION["status"] = "<div class='alert alert-success' role='alert'>Mot de passe changé ! Connectez vous !</div>";
header("Location: ../connexion.php");
die();


?>