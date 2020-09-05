<?php

session_start();


if(!isset($_SESSION["id_client"])){
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Veuillez vous connecter pour effectuer cette opération.</div>";
  header("../connexion.php");
  die();
}



//die();

if (!isset($_POST["id_produit"]) || !isset($_POST["quantite"])){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Requête d'ajout incorrecte !</div>";
  header("Location: ../index.php");
  die();
  
}
include("../inc/config.php");


$id_produit = addslashes($_POST["id_produit"]);
$quantite = addslashes($_POST["quantite"]);



$sql = "SELECT * FROM `boutique_tfe`.`tfe_produits` where id = $id_produit";
$result = $bdd->query($sql);
if ($result->num_rows == 0) {

  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>L'article demandé n'est pas dans notre base de donnée !</div>";
  header("Location: ../index.php");
  die();

}


echo($_POST["quantite"]);
echo($_POST["id_produit"]);


//array_push($panier,$_POST["id_produit"],$_POST["quantite"]);

$result = mysqli_query($bdd, "SELECT * FROM `boutique_tfe`.`tfe_produits` WHERE id like '$id_produit'");

$row = $result->fetch_array(MYSQLI_ASSOC);

$nom_produit = $row["nom"];

array_push($_SESSION["panier_client"],$_POST["id_produit"], $nom_produit,$_POST["quantite"]);

//print_r($_SESSION["panier_client"]);


$_SESSION["status"] = "<div class='alert alert-success' role='alert'>Produit ajouté !</div>";
  header("Location: ../index.php");
  die();
?>
