<?php

@session_start();
include("./inc/config.php");

?>

  <html>

  <head>
    <?php include("./inc/head.php"); ?>

  </head>

  <body>

    <?php include("./inc/nav.php"); ?>

    <!-- FIN -->

		<div class="boutique_table">
    <?php echo(@$_SESSION["status"]); $_SESSION["status"] = "";?>
		</div>
		
		
			
			<div class="jumbotron boutique_table">
				<h1 class="display-3">Bienvenue sur NetStream !</h1>
				<p>Le service de films en ligne le plus propre, le plus simple !</p>
				<p><a class="btn btn-primary btn-lg" href="./film.php">En savoir plus</a></p>
			</div>

<?php

		$result = mysqli_query($bdd, "SELECT * FROM `tfe_film` WHERE note = (SELECT max(note) FROM tfe_film)" );
    $row = $result->fetch_array(MYSQLI_BOTH);
		
		
?>


		<div class="card boutique_table">
			<h3 class="card-header">Le film le plus populaire</h3>
			<div class="card-body">
				<h5 class="card-title"><?php echo($row["nom"]); ?></h5>
				<h6 class="card-subtitle text-muted"><?php echo(substr($row["resume"], 0, 120)) ?>...</h6>
			</div>
			<img style="max-width: 20%; display: block;" src="<?php echo($row["img"]); ?>" alt="Card image">
			<div class="card-body">
				<a href="#" class="card-link">Note : <?php echo($row["note"]); ?> / 5</a>
			</div>
			<div class="card-footer text-muted">
				Merci pour vos notes !
			</div>
		</div>


			
			
			
			
  </body>

  </html>