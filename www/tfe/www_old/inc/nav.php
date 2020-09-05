<?php


@session_start();
include("./inc/config.php");
$result = mysqli_query($bdd, "SELECT * FROM `boutique_tfe`.`tfe_config` WHERE id = 1");

$row = $result->fetch_array(MYSQLI_ASSOC);


?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/"><?php echo($row["site_name"]); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a></li>
      <li class="nav-item"><a class="nav-link" href="/film.php">Films</a></li>
      <li class="nav-item"><a class="nav-link" href="/serie.php">Séries</a></li>
    </ul>
     <!-- NAV DROITE (c'est un bloc divisé en deux, faut BIEN faire attention ) --> 
    <div class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">
        <?php if(isset($_SESSION["id_client"])){ ?>
        <li class="nav-item"><a class="nav-link" href="/profil.php"><?php echo("[ ".$_SESSION["nom_client"]." ".$_SESSION["prenom_client"]." ]"); ?></a></li>
        <li class="nav-item"><a class="nav-link" href="/php/deconnexion.php">Se déconnecter</a></li>
        <?php }else{ ?>
        
        <li class="nav-item"><a class="nav-link" href="/connexion.php">Connexion</a></li>
        <li class="nav-item"><a class="nav-link" href="/inscription.php">Inscription</a></li>
        <?php } ?>
      
      </ul>
    </div>
  </div>
</nav>
<br />