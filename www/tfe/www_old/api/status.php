<?php

include("../inc/config.php");
// echo("ok|200|Bienvenue !|continue");
$result = mysqli_query($bdd, "SELECT * FROM `boutique_tfe`.`tfe_config`" );
$row = $result->fetch_array(MYSQLI_ASSOC);

echo($row["status"]."|".$row["code"]."|".$row["detail"]."|".$row["action"]);

?>