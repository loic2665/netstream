<?php

include("../inc/config.php");
// echo("ok|200|Bienvenue !|continue");
$result = mysqli_query($bdd, "SELECT * FROM `boutique_tfe`.`tfe_config`" );
$row = $result->fetch_array(MYSQLI_ASSOC);

$nom = $row["site_name"];

die($nom);


?>