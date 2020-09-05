<?php
@session_start();

if(htmlspecialchars($_POST["captcha"]) != $_SESSION["nb3"]){

  die("False|<div class='alert alert-danger' role='alert'>Le réponse du captcha est incorrecte ! Veuillez ré-essayer !</div>");


}

include("../inc/config.php");

$email = htmlspecialchars($_POST["email"]);
$password = sha1(htmlspecialchars($_POST["password"]));
$nom = htmlspecialchars($_POST["nom"]);
$prenom = htmlspecialchars($_POST["prenom"]);
$sexe = htmlspecialchars($_POST["sexe"]);
$rue = htmlspecialchars($_POST["rue"]);
$num_maison = htmlspecialchars($_POST["num_maison"]);
$cp = htmlspecialchars($_POST["cp"]);
$localite = htmlspecialchars($_POST["localite"]);
$tel = htmlspecialchars($_POST["tel"]);
$date = htmlspecialchars($_POST["date_naiss"]);
$pays = htmlspecialchars($_POST["pays"]);
$secu = htmlspecialchars($_POST["secu"]);
$rep_secu = htmlspecialchars($_POST["reponse"]);


$sql = "SELECT * FROM `boutique_tfe`.`tfe_clients` where email='$email'";
$result = $bdd->query($sql);

if (@$result->num_rows > 0){
  die("False|<div class='alert alert-danger' role='alert'>L'email utilisé existe déjà ! Si vous avez oublié votre mot de passe, cliquez <a href='./recup_mdp.php'>ici</a>. </div>");
}

mysqli_query($bdd, "INSERT INTO `boutique_tfe`.`tfe_clients` (`id`, `nom`, `prenom`, `sexe`,`date_naiss`,`rue`,`num_maison`,`postal`,`localite`,`pays`,`tel`,`email`,`mdp`,`question_secu`,`reponse`) VALUES (NULL, '$nom', '$prenom','$sexe','$date','$rue','$num_maison','$cp','$localite','$pays','$tel','$email','$password','$secu','$rep_secu')");

die("True|<div class='alert alert-success' role='alert'>Bravo, vous êtes inscrit ! Connectez-vous !</div>");


?>
