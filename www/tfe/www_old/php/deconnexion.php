<?php
session_start();


$_SESSION["id_client"] = NULL;
$_SESSION["nom_client"] = NULL;
$_SESSION["prenom_client"] = NULL;
$_SESSION["sexe_client"] = NULL;
$_SESSION["date_naiss_client"] = NULL;
$_SESSION["rue_client"] = NULL;
$_SESSION["num_maison_client"] = NULL;
$_SESSION["postal_client"] = NULL;
$_SESSION["localite_client"] = NULL;
$_SESSION["pays_client"] = NULL;
$_SESSION["tel_client"] = NULL;
$_SESSION["email_client"] = NULL;
$_SESSION["question_secu_client"] = NULL;


$_SESSION["status"] = "<div class='alert alert-success' role='alert'>Merci de votre visite ! Votre session est fermée !</div>";
header("Location: ../connexion.php");
die();



?>