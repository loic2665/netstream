<?php
include("../inc/config.php");

@session_start();

if(!isset($_SESSION["id_client"])){
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Veuillez vous connecter pour effectuer cette opération.</div>";
  header("../connexion.php");
  die();
}



if($_GET["id_client"] != $_SESSION["id_client"]){
  
$_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Accès interdit ! Vous ne pouvez supprimer que votre compte, bien essayé !</div>";
header("Location: ../profil.php");
die();

  
}


if($_POST["supprimer_client_pass"] == "" || $_POST["supprimer_client_pass"] == NULL){
    $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Vous DEVEZ introduire votre mot de passe pour pouvoir supprimer votre compte !</div>";
    header("Location: ../profil.php");
    die();
}

$password = sha1($_POST["supprimer_client_pass"]);



$id_client = $_SESSION["id_client"];
$result = mysqli_query($bdd, "SELECT * FROM `boutique_tfe`.`tfe_clients` WHERE id = $id_client");

$row = $result->fetch_array(MYSQLI_ASSOC);
$password_db = $row["mdp"];



if($password != $password_db){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Le mot de passe entré n'est pas correct !</div>";
  header("Location: ./supprimer_compte.php?id_client=");
  die();
  
  
}



$result = mysqli_query($bdd, "DELETE FROM `boutique_tfe`.`tfe_clients` WHERE id = $id_client");

@session_destroy();
@session_start();

$_SESSION["status"] = "<div class='alert alert-success' role='alert'>Compte supprimé. Merci à vous.</div>";
header("Location: ../index.php");
die();


?>