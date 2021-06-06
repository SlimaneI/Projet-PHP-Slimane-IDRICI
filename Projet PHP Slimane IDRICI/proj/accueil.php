<!DOCTYPE html>
<?php
session_start();
		if(isset($_GET['deconnexion']))
		{
			 if($_GET['deconnexion']==true)
			 {
					session_unset();
					header("location: accueil.php");

			 }
		}


?>

<script src="assets/angular-1.7.9/angular.min.js"></script>

<html>

	<head>
		<title>Basketball players</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>

	<body  class="is-preload" ng-app="myApp" ng-controller="Myctrl">
		<div class="#menu">
		<!-- Header -->
			<header id="header">
				<h1 class="logo">Basketball Players</h1>


			</header>


		<!-- Banner -->
			<section style="background-image: url('assets/img/banner.jpg')" id="banner">
				<div class="inner">
					<div align = "center">
						<form action="verificationConnexionBdd.php" method="POST">
		                <h1>Connexion</h1>

		                <label><b>Nom d'utilisateur</b></label>
		                <input  class="col-6" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

		                <label><b>Mot de passe</b></label>
		                <input class="col-6" type="password" placeholder="Entrer le mot de passe" name="password" required>

		                <input  class="col-4" type="submit" id='submit' value='LOGIN' style="margin-top : 10px;" >
										<br>


									  <a href='inscription.php'>S'inscrire </a>

										<?php

		                if(isset($_GET['erreur'])){
		                    $err = $_GET['erreur'];
		                    if($err==1 || $err==2)
		                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
		                }
		                ?>
		            </form>
		 </div>

				</div>

			</section>


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
