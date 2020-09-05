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

    <div class="boutique_recup">

      <?php echo(@$_SESSION["status"]);
						 $_SESSION["status"] = "";?>
      
      <form class="form-horizontal" action="./php/recup.php" method="POST">
        <fieldset>
          <legend>Récuperer son compte</legend>
          <div class="form-group">
            <label for="email_recup" class="col-lg-2 control-label">Votre email où changer votre mot de passe : </label>
            <div class="col-lg-10">
              <input type="email" name="email_recup" class="form-control" id="email_recup" placeholder="Adresse e-mail">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-success">Chercher le compte</button>
            </div>
          </div>

        </fieldset>
      </form>
    </div>
  </body>

  </html>