<!DOCTYPE html>
<?php
  session_start();
	if(!isset($_SESSION['username'])) {

		header('Location: accueil.php');



	}
  include('ConnexionBd.php');
  $use = $conn->query("Select distinct * FROM users where login = '".$_SESSION['username']."'");
  $result = mysqli_fetch_object($use );

 ?>
<html>
	<head>
		<title>Utilisateur</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">


	</head>

	<body class="is-preload" ng-app="myApp" ng-controller="Myctrl">
		<div class="#menu">
		<!-- Header -->
			<header id="header">


				<a style="color: #ffffff;
    				font-size: 1rem;
    				height: inherit;
    				line-height: inherit;
    				text-decoration: none;" href="PageAccueil.php">Basketball Players</a>



				<nav style="font-size: small" style="color: #ffffff;
    				font-size: 1rem;
    				height: inherit;
    				line-height: inherit;
    				text-decoration: none;">

        <?php

			if ($result->admin == '1'){
				echo '<a href="Admin.php">Admin</a>';
		}
		?>

				<a href='accueil.php?deconnexion=true'>Déconnexion</a>

				<!-- tester si l'utilisateur est connecté -->


				</nav>
			</header>

		<!-- Nav -->

		<!-- Banner -->
    <section id="main"  class="wrapper">
      <div class="inner logo" align= "left">
         <h2>Votre compte :</h2>
         <h6 >identifiant : <?= $_SESSION['username']?></h6>

<?php
	echo '


			   <h6>Nom : '.$result->nom.'</h6>

			   <h6>Prenom : '.$result->prenom.'</h6>

   		';


 ?>
 <div align="center">
   <form  action="updatePasswordBdd.php" method="POST">
          <h2>Modifier le mot de passe</h2>

		  <label><b>Mot de passe actuel</b></label>
          <input class="col-6" type="password" placeholder="Entrer le mot de passe" name="passwordA" required>

          <label><b>Mot de passe</b></label>
          <input class="col-6" type="password" placeholder="Entrer le mot de passe" name="password" required>

          <label><b>Mot de passe verification</b></label>
          <input class="col-6" type="password" placeholder="Entrer le mot de passe" name="password2" required>



          <input class="col-4" type="submit" id='submit' value='modifier' style="margin-top : 10px;" >
          <br>

                <?php

                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<p style='color:red'>Le mot de passe actuel est incorrect</p>";
                    if ($err==2)
                        echo "<p style='color:red'>Les mots de passe sont differents</p>";

                }
                ?>
            </form>

               </div>
            </div>

      </div>

    </section>
		<!-- Footer -->
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
