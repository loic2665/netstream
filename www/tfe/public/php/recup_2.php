<?php
include("../inc/config.php");

@session_start();



if($_SESSION["email_recup"] == NULL || $_SESSION["email_recup"] == ""){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Sans email, vous ne pourrez pas changer votre mot de passe !</div>";
  header("Location: ../recup_step_1.php");
  die();
  
  
}

$email_recup = $_SESSION["email_recup"];

//$sql = "SELECT * FROM `boutique_tfe`.`tfe_clients` where email='$email'";
//$result = $bdd->query($sql);

$result = mysqli_query($bdd, "SELECT * FROM `boutique_tfe`.`tfe_clients` WHERE email like '$email_recup'");

$row = $result->fetch_array(MYSQLI_ASSOC);

$reponse_secu = $row["reponse"];


if ($_POST["reponse_securite"] != $reponse_secu){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Réponse incorrecte ! Vous devez recommencer !</div>";
  $_SESSION["vrai_question_secu"] = NULL;
  $_POST["email_recup"] = NULL;
  header("Location: ../recup_step_1.php");
  die();
  
}

else{
  
  $_SESSION["status"] = "<div class='alert alert-success' role='alert'>Réponse correcte ! Choisissez votre mot de passe. Ne l'oubliez plus !</div>";
  header("Location: ../recup_step_3.php");
  die();
  
  
}

?>