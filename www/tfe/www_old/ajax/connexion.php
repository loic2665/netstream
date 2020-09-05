<?php
include("../inc/config.php");

@session_start();

$email = htmlspecialchars($_POST["email"]);
$password = sha1(htmlspecialchars($_POST["password"]));

//$sql = "SELECT * FROM `boutique_tfe`.`tfe_clients` where email='$email'";
//$result = $bdd->query($sql);

$result = mysqli_query($bdd, "SELECT * FROM `boutique_tfe`.`tfe_clients` WHERE email like '$email'");

$row = $result->fetch_array(MYSQLI_ASSOC);

$email_bd = $row["email"];
$password_db = $row["mdp"];

if($email == ""){
  
  die("False|<div class='alert alert-danger' role='alert'>L'email entré est vide.</div>");
  
  
}

if($email_bd == ""){
  
  die("False|<div class='alert alert-danger' role='alert'>L'email entré ne correspond à aucun compte, <a href='./inscription.php'>cliquez ici pour vous inscrire</a> !</div>");
  
  
}


elseif($password != $password_db){
  
  die("False|<div class='alert alert-danger' role='alert'>L'email ou le mot de passe entré n'est pas correct ! <a href='./recup_step_1.php'>Mot de passe oublié ?</a></div>");
  
  
}

else{
  
$_SESSION["id_client"] = $row["id"];
$_SESSION["nom_client"] = $row["nom"];
$_SESSION["prenom_client"] = $row["prenom"];
$_SESSION["sexe_client"] = $row["sexe"];
$_SESSION["date_naiss_client"] = $row["date_naiss"];
$_SESSION["rue_client"] = $row["rue"];
$_SESSION["num_maison_client"] = $row["num_maison"];
$_SESSION["postal_client"] = $row["postal"];
$_SESSION["localite_client"] = $row["localite"];
$_SESSION["pays_client"] = $row["pays"];
$_SESSION["tel_client"] = $row["tel"];
$_SESSION["email_client"] = $row["email"];
$_SESSION["question_secu_client"] = $row["question_secu"];
$_SESSION["panier_client"] = array();

    
die("True|<div class='alert alert-success' role='alert'>Connexion réussie ! Vous allez être redirigé dans 5 secondes. Si vous restez bloqué ici, cliquez <a href='./profil.php'>ici</a></div>");

}
?>