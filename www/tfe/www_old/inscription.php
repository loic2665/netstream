<?php


@session_start();

if(isset($_SESSION["id_client"])){
  
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Vous êtes déjà connecté ! Inutile de vous ré-inscrire !</div>";
  header("Location: ./profil.php");
  die();
  
}


$_SESSION["nb1"] = rand(1, 20);
$_SESSION["nb2"] = rand(1, 20);
$_SESSION["nb3"] = $_SESSION["nb1"] + $_SESSION["nb2"];

?>
	<html>

	<head>
		<?php include("./inc/head.php"); ?>
	</head>

	<body>
		<?php include("./inc/nav.php"); ?>


		<!-- Fin NAV -->


		<div class="boutique_inscripiton">

			<?php echo(@$_SESSION["status"]);
						 $_SESSION["status"] = "";?>

			<form class="form-horizontal" action="./php/inscription.php" method="POST">
				<fieldset>
					<legend>Inscription</legend>
					<div class="form-group">
						<label for="email" class="col-lg-2 control-label">Votre email : </label>
						<div class="col-lg-10">
							<input type="email" required name="email" class="form-control" id="email" placeholder="Adresse e-mail">
						</div>
					</div>


					<div class="form-group">
						<label for="password" class="col-lg-2 control-label">Votre mot de passe : </label>
						<div class="col-lg-10">
							<input type="password" required name="password" class="form-control" id="password" placeholder="Mot de passe">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-lg-2 control-label">Comfirmez votre mot de passe : </label>
						<div class="col-lg-10">
							<input type="password" required name="passwordc" class="form-control" id="passwordc" placeholder="Mot de passe">
						</div>
					</div>

					<div class="form-group">
						<label for="nom" class="col-lg-2 control-label">Votre nom : </label>
						<div class="col-lg-10">
							<input class="form-control" required name="nom" id="nom" placeholder="Nom"></input>
							<span class="help-block">Veuillez entrer nom valide pour recevoir votre facture !</span>
						</div>
					</div>

					<div class="form-group">
						<label for="prenom" class="col-lg-2 control-label">Votre prénom : </label>
						<div class="col-lg-10">
							<input class="form-control" required name="prenom" id="prenom" placeholder="Prénom"></input>
							<span class="help-block">Veuillez entrer un prénom valide pour recevoir votre facture !</span>
						</div>
					</div>


					<div class="form-group">
						<label class="col-lg-2 control-label">Votre sexe : </label>
						<div class="col-lg-10">
							<div class="radio">
								<label>
            <input type="radio" name="sexe" required  id="sexe" value="Homme">
            Homme
          </label>
							</div>
							<div class="radio">
								<label>
            <input type="radio" name="sexe" required id="sexe" value="Femme">
            Femme
          </label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="rue" class="col-lg-2 control-label">Votre rue : </label>
						<div class="col-lg-10">
							<input class="form-control" id="rue" required name="rue" placeholder="Rue"></input>
							<span class="help-block">Veuillez entrer une rue valide pour recevoir votre facture !</span>
						</div>
					</div>

					<div class="form-group">
						<label for="num_maison" class="col-lg-2 control-label">Votre numéro de maison : </label>
						<div class="col-lg-10">
							<input class="form-control" id="num_maison" required type="text" name="num_maison" placeholder="Numéro de maison"></input>
							<span class="help-block">Veuillez entrer un numéro de maison valide pour recevoir votre facture !</span>
						</div>
					</div>


					<div class="form-group">
						<label for="cp" class="col-lg-2 control-label">Votre code postal : </label>
						<div class="col-lg-10">
							<input class="form-control" name="cp" id="cp" required placeholder="Code postal"></input>

						</div>
					</div>

					<div class="form-group">
						<label for="localite" class="col-lg-2 control-label">Votre localité : </label>
						<div class="col-lg-10">
							<input class="form-control" name="localite" required id="localite" placeholder="Votre localité"></input>

						</div>
					</div>

					<div class="form-group">
						<label for="tel" class="col-lg-2 control-label">Votre numéro téléphone : </label>
						<div class="col-lg-10">
							<input class="form-control" name="tel" id="tel" required  placeholder="Votre numéro de téléphone"></input>

						</div>
					</div>

					<div class="form-group">
						<label for="date_naiss" class="col-lg-2 control-label">Votre date de naissance : </label>
						<div class="col-lg-10">
							<input class="form-control" name="date_naiss" required  type="date" id="date_naiss"></input>
						</div>
					</div>

					<div class="form-group">
						<label for="pays" class="col-lg-2 control-label">Pays</label>
						<div class="col-lg-10">
							<select required  name="pays" class="form-control" id="pays">
          <option value="Belgique">Belgique</option>
          <option value="France">France</option>
          <option value="Luxembourg">Luxembourg</option>
          <option value="Pays-Bas">Pays-Bas</option>
          <option value="Allemagne">Allemagne</option>
        </select>
							<br>
						</div>
					</div>

					<div class="form-group">
						<label for="secu" class="col-lg-2 control-label">Votre question de sécurité : </label>
						<div class="col-lg-10">
							<select name="secu" required  class="form-control" id="secu">
          <option value="amie">Quel est le NOM de votre meilleure ami(e) ?</option>
          <option value="animal">Quelle est le nom de votre premier animal ?</option>
          <option value="mere">Quel est le nom de jeune fille de votre mère ?</option>
        </select>
							<br>
						</div>
					</div>

					<div class="form-group">
						<label for="reponse" class="col-lg-2 control-label">Votre réponse : </label>
						<div class="col-lg-10">
							<input class="form-control"required  name="reponse" type="text" id="reponse" placeholder="Réponse de la question de sécurité"></input>
						</div>
					</div>

					<div class="form-group">
						<label for="captcha" class="col-lg-2 control-label">Vérif. anto-robots : &nbsp;(<?php echo($_SESSION["nb1"]); ?> + <?php echo($_SESSION["nb2"]); ?>) </label>
						<div class="col-lg-10">
							<input class="form-control" required name="captcha" type="number" id="captcha" placeholder="Réponse du calcul"></input>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="reset" class="btn btn-default">Recommencer</button>
							<button type="submit" required class="btn btn-primary">S'inscrire</button>
						</div>
					</div>


				</fieldset>
			</form>

		</div>
	</body>

	</html>