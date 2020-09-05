<?php
@session_start();
include("./inc/config.php");


if (!isset($_SESSION["vrai_question_secu"]))
{
  $_SESSION["status"] = "<div class='alert alert-danger' role='alert'>Sans email, vous ne pourrez pas changer votre mot de passe !</div>";
  header("Location: ./recup_step_1.php");
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

    <div class="boutique_recup">

      <?php echo(@$_SESSION["status"]);
						 $_SESSION["status"] = "";?>
      
      <form class="form-horizontal" action="./php/recup_2.php" method="POST">
        <fieldset>
          <legend>Récuperer son compte - Question de sécurité : <em><?php echo($_SESSION["vrai_question_secu"]);?></em></legend>
          <div class="form-group">
            <label for="reponse_securite" class="col-lg-2 control-label">Votre réponse : </label>
            <div class="col-lg-10">
              <input type="text" name="reponse_securite" class="form-control" id="reponse_securite" placeholder="Réponse">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-success">Suivant</button>
            </div>
          </div>

        </fieldset>
      </form>
    </div>
  </body>

  </html>