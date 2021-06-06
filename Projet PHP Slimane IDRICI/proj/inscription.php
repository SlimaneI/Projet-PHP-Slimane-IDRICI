<!DOCTYPE html>
<?php
session_start();

?>

<html>

	<head>
		<title>Inscription</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>

	<body>



     <section id="main" align="center" class="wrapper">
 			<div class="inner" align= "center">
        <form action="insertUserBDD.php" method="POST">
          <h1>Inscription</h1>

          <label><b>Nom d'utilisateur</b></label>
          <input class="col-6" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

          <label><b>Mot de passe</b></label>
          <input class="col-6" type="password" placeholder="Entrer le mot de passe" name="password" required>

          <label><b>Mot de passe verification</b></label>
          <input class="col-6" type="password" placeholder="Entrer le mot de passe" name="password2" required>

          <label><b>Nom</b></label>
          <input class="col-6"  type="text" placeholder="Entrer votre nom" name="nom" required>

          <label><b>Prenom</b></label>
          <input class="col-6"  type="text" placeholder="Entrer votre prenom" name="prenom" required>


          <input class="col-4" type="submit" id='submit' value='LOGIN' style="margin-top : 10px;" >
          <br>

                <?php

                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<p style='color:red'>Nom d'utilisateur existe déjà</p>";
                    if ($err==2)
                        echo "<p style='color:red'>Les mots de passe sont differents</p>";

                }
                ?>
            </form>

 							 </div>
 	    	 		</div>

				</div>

			</section>
    </body>


			<footer id="footer">
				<div class="inner">
					<div class="content">

					</div>
				</div>
			</footer>





		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>


	</body>
</html>
