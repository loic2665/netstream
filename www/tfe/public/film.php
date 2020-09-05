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

    <div class="well boutique-body">
      <h2>
        <center>Films</center></h2>
    </div>
		<div class="boutique_table">
    <?php echo(@$_SESSION["status"]); $_SESSION["status"] = "";?>

    
      <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr class="thead-dark boutique_table_tr">
            <th>#</th>
            <th>Nom</th>
            <th>Image</th>
            <th>Prix</th>
            <th>Quantitée restante</th>
            <th>Voir</th>
          </tr>
        </thead>
        <tbody>


        <?php
          $result = mysqli_query($bdd, "SELECT * FROM `boutique_tfe`.`tfe_film`" );
          $row = $result->fetch_array(MYSQLI_ASSOC);
          $result_nb_film = mysqli_query($bdd, "SELECT count(*) FROM `boutique_tfe`.`tfe_film` where disponible > 0");

          $row_nb_film = $result->fetch_array(MYSQLI_NUM); //aussi => MYSQLI_BOTH pour les 
          $nb_film = $row_nb_film[0]; //nb_film vaut le nombre de film disponible dans la table tfe_films
        ?>



            

          <?php
					$sql = "SELECT * FROM `boutique_tfe`.`tfe_film` where type like 'Film'";
					$result = $bdd->query($sql);
						
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) { //mettre les resultats dans un tableau associatif (id = film)
          ?>
				        <tr>
                  <td>
                  <?php echo($row["id"]); ?>
                  </td>
                  <td><?php echo($row["nom"]); ?></td>
                  <td><center><img src="<?php echo($row["img"]); ?>" alt="<?php echo($row["nom"]); ?>" style="max-width: 15%" /></center></td>
                  <td><?php echo($row["prix"]); ?> €</td>
                  <td><?php echo($row["quantite"]); ?> copies restantes</td>
                  <td><a href="./voir.php?id=<?php echo($row["id"]); ?>" class="btn btn-info">Info</a></td>
                </tr>
 					 <?php
            }
					}
					?>

        </tbody>
      </table>
    </div>

  </body>

  </html>