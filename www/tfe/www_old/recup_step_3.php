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
      
      <form class="form-horizontal" action="./php/recup_3.php" method="POST">
        <fieldset>
          <legend>Changer mon mot de passe</legend>
          <div class="form-group">
            <label for="new_mdp" class="col-lg-2 control-label">Votre nouveau mot de passe : </label>
            <div class="col-lg-10">
              <input type="password" name="new_mdp" class="form-control" id="new_mdp" placeholder="Nouveau mot de passe">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-success">Changer mon mot de passe</button>
            </div>
          </div>

        </fieldset>
      </form>
    </div>
  </body>

  </html>