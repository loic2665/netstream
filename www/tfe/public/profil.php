<?php
session_start();

include("./inc/config.php");

if(!isset($_SESSION["id_client"])){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Vous devez vous connecter pour accéder à votre profil !</div>";
  header("Location: ./connexion.php");
  die();
  
}


?>

	<html>

	<head>
		<?php include("./inc/head.php"); ?>

	</head>

	<body>

		<?php include("./inc/nav.php"); ?>

		<!-- FIN -->
		<div class="boutique_info_client">

			<?php echo(@$_SESSION["status"]);
						 $_SESSION["status"] = "";?>

					<center><h5>Informations client : </h5></center>

					<table class="table table-striped table-hover table-bordered">
  					<thead class="thead-dark">
							<tr>
								<th>Champ</th>
								<th>Valeur</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>ID client</td>
								<td>
									<?php echo(@$_SESSION["id_client"]);?>
								</td>
							</tr>
							<tr>
								<td>Nom</td>
								<td>
									<?php echo(@$_SESSION["nom_client"]);?>
								</td>
							</tr>
							<tr>
								<td>Prénom</td>
								<td>
									<?php echo(@$_SESSION["prenom_client"]);?>
								</td>
							</tr>
							<tr>
								<td>Sexe</td>
								<td>
									<?php if(@$_SESSION["sexe_client"] == "m"){echo("Homme");}else{if(@$_SESSION["sexe_client"] == "f"){echo("Femme");}else{echo("Erreur - Autre donnée ?");}}?>
								</td>
							</tr>
							<tr>
								<td>Date de naissance</td>
								<td>
									<?php echo(@$_SESSION["date_naiss_client"]);?>
								</td>
							</tr>
							<tr>
								<td>Rue</td>
								<td>
									<?php echo(@$_SESSION["rue_client"]);?>
								</td>
							</tr>
							<tr>
								<td>Numéro de maison</td>
								<td>
									<?php echo(@$_SESSION["num_maison_client"]);?>
								</td>
							</tr>
							<tr>
								<td>Code postal - Localité</td>
								<td>
									<?php echo(@$_SESSION["postal_client"]);?> - <?php echo(@$_SESSION["localite_client"]);?>
								</td>
							</tr>
							<tr>
								<td>Pays</td>
								<td>
									<?php echo(@$_SESSION["pays_client"]);?>
								</td>
							</tr>
							<tr>
								<td>Type question de sécurité</td>
								<td>
									<?php 
									
									if (@$_SESSION["question_secu_client"] == "ami"){
										
										echo("Quel est le NOM de votre meilleur ami(e) ?");
									}
									
									if (@$_SESSION["question_secu_client"] == "chien"){
										
										echo("Quelle est le nom de votre premier animal ?");
									}
									
									if (@$_SESSION["question_secu_client"] == "mere"){
										
										echo("Quel est le nom de jeune fille de votre mère ?");
									}
									?>
								</td>
							</tr>
						</tbody>
					</table>
					<hr/>
					<a href="./php/supprimer_compte.php?id_client=<?php echo(@$_SESSION["id_client"]);?>" class="btn btn-danger">Supprimer mon compte</a>

				</div>
			</div>

		</div>

	</body>

	</html>