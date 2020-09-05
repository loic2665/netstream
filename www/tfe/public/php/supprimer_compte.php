<?php

@session_start();

if(!isset($_SESSION["id_client"])){
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Veuillez vous connecter pour effectuer cette opération.</div>";
  header("../connexion.php");
  die();
}


if($_SESSION["id_client"] != $_GET["id_client"]){
  
	$_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Accès interdit ! Vous ne pouvez supprimer que votre compte, bien essayé !</div>";
	header("Location: ../profil.php");
	die();

  
}



include("../inc/config.php");

?>

	<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<!--<link rel="stylesheet" type="text/css" href="./css/bootstrap-theme.css">-->
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


	</head>

	<body>

		<div class="boutique_supprimer_compte">
			<?php echo(@$_SESSION["status"]);
						 $_SESSION["status"] = "";?>
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">SUPPRIMER COMPTE CLIENT</h3>
				</div>
				<div class="panel-body">
					Voulez-vous vraiment supprimer votre compte ? Sinon <a href="../profil.php">cliquer ICI.</a>
					<div>
						<br/>
						<form action="./supprimer_compte_mdp.php?id_client=<?php echo($_SESSION["id_client"]); ?>" method="POST">
							<div class="form-group has-error">
								<label class="control-label" for="supprimer_client_pass">Entre votre mot de passe pour supprimer votre compte client</label>
								<input type="password" class="form-control" name="supprimer_client_pass" id="supprimer_client_pass">
								<br/>
								<input type="submit" class="btn btn-danger" value="SUPPRIMER COMPTE">
							</div>
						</form>

						<div class="progress progress-striped active">
							<div class="progress-bar progress-bar-danger" style="width: 100%"></div>
						</div>

					</div>
				</div>
			</div>
		</div>


	</body>

	</html>

	<!-- FIN -->