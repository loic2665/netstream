<?php
include("../inc/config.php");

@session_start();

$_SESSION["email_recup"] = $_POST["email_recup"];

if($_SESSION["email_recup"] == NULL || $_SESSION["email_recup"] == ""){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Sans email, vous ne pourrez pas changer votre mot de passe !</div>";
  header("Location: ../recup_step_1.php");
  die();
  
  
}

$email_recup = $_POST["email_recup"];

//$sql = "SELECT * FROM `boutique_tfe`.`tfe_clients` where email='$email'";
//$result = $bdd->query($sql);

$result = mysqli_query($bdd, "SELECT * FROM `boutique_tfe`.`tfe_clients` WHERE email like '$email_recup'");

$row = $result->fetch_array(MYSQLI_ASSOC);

$email_bd = $row["email"];


if($email_bd == ""){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>L'email entré ne correspond à aucun compte, veuillez vous inscrire !</div>";
  header("Location: ../inscription.php");
  die();
  
  
}

if ($row["question_secu"] == "amie"){
  
  $_SESSION["vrai_question_secu"] = "Quel est le NOM de votre meilleure ami(e) ?";
}
  
if ($row["question_secu"] == "animal"){
  
  $_SESSION["vrai_question_secu"] = "Quelle est le nom de votre premier animal ?";
}


if ($row["question_secu"] == "mere"){
  
  $_SESSION["vrai_question_secu"] = "Quel est le nom de jeune fille de votre mère ?";
}

header("Location: ../recup_step_2.php");
$_SESSION["status"] = "<div class='alert alert-success' role='alert'>L'email trouvé correspond à un compte, veuillez répondre à la question.</div>";
die();


?>
