<?php
@session_start();
include("./inc/config.php");

if(isset($_SESSION["id_client"])){
header("Location: ./profil.php");
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
<div class="boutique_table">
    <?php echo(@$_SESSION["status"]); $_SESSION["status"] = "";?>
		</div>
   
<script>	
			
function sleep (time) {
  return new Promise((resolve) => setTimeout(resolve, time));
}
	
	

$(document).ready(function(){
    $(".login").click(function(){
        $.post("/ajax/connexion.php",
        {
          email: $('input[name=email]').val(),
          password: $('input[name=password]').val()
        },
        function(data,status){
            var result = data.split("|");
						if(result[0] == "False"){
							document.getElementById("msg_serv").innerHTML = result[1];
							return false;
						}
					if(result[0] == "True"){
							document.getElementById("msg_serv").innerHTML = result[1];
						
						sleep(2000).then(() => {
						 	window.location.replace("./profil.php");
						})
						 }
        });
    });
});
</script>
			
			
			
			<br />
			
       <div class="boutique_connexion">
			<div id="msg_serv">
				
			</div>
			
      <div>
				<fieldset>
					<legend>Se connecter</legend>
					<div class="form-group">
						<label for="exampleInputEmail1">Email :</label>
						<input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" type="email">
						<small id="emailHelp" class="form-text text-muted">Email utilisé lors de l'inscription</small>
					</div>
					
					<div class="form-group">
						<label for="exampleInputPassword1">Mot de passe :</label>
						<input class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" name="password" type="password">
					</div>
					
					<div class="form-check">
					<button type="submit" class="btn btn-success login">Se connecter</button>
					</div>
				</fieldset>
			</form>

        </fieldset>
      </div>
    </div>
  </body>

  </html>