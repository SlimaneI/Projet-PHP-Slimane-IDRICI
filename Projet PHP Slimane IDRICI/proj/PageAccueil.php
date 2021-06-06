<!DOCTYPE html>
<?php
  session_start();
	if(!isset($_SESSION['username'])) {

		header('Location: accueil.php');

	}
	include('ConnexionBd.php');
	$use = $conn->query("Select * FROM users where login = '".$_SESSION['username']."'");
	$result = mysqli_fetch_object($use );

 ?>
<html>
	<head>
		<title>Page d'acceuil</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">


	</head>

	<body  class="is-preload" ng-app="myApp" ng-controller="Myctrl">
		
		<!-- Header -->
			<header  id="header">
				<div align="left" >

				<a style="color: #ffffff;
    				font-size: 1rem;
    				height: inherit;
    				line-height: inherit;
    				text-decoration: none;" href="PageAccueil.php">Basketball Players</a>


				</div>
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
        <a href="User.php"><?=$_SESSION['username'] ?></a>


				<a href='accueil.php?deconnexion=true'>Déconnexion</a>

				<!-- tester si l'utilisateur est connecté -->


				</nav>
			</header>

		<!-- Nav -->

		<!-- Banner -->
			<div style="background-image: url('assets/img/equipe.jpg')" id="banner">
				<div class="inner">
					<h1>Cherche ton joueur</h1>
					<br>
					<?php
					echo "<h1>".$_SESSION['username']."</h1>";
					?>
				</div>


			</div>


		<!-- Main -->
		<section id="main" align="center" class="wrapper">
			<div class="inner" align="center" >


	    				<div class="row inner">
	        			<div align="center" class="col-md-6">

									<h1>par Equipe</h1>
									<a href="Equipe.php" ><img  class="img-fluid img-thunbnail"  src="https://i.pinimg.com/originals/f6/38/50/f638506e98a160b223e3b5981f373918.gif" /></a>

								</div>
	        		 <div align="center" class="col-md-6">

								 <h1>par Pays</h1>
								 <a href="pays.php" ><img  class="img-fluid img-thunbnail" src="https://fadeawayworld.net/.image/t_share/MTgwMTMyOTQ4OTExNzkzNDk2/ranking-the-best-nba-player-by-country.jpg" /></a>
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
