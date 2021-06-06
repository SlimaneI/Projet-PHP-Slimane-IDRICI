<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])) {

	header('Location: accueil.php');

}
include('ConnexionBd.php');
  $requete = $conn->query("Select  login, nom, prenom FROM users where login != '".$_SESSION['username']."'");
  $result = mysqli_fetch_all($requete);
?>
<html>

	<head>
		<title>Administrateur</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">
	</head>

	<body>
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

<a href="Admin.php">Admin</a>
<a href="User.php"><?=$_SESSION['username'] ?></a>


<a href='accueil.php?deconnexion=true'>Déconnexion</a>

<!-- tester si l'utilisateur est connecté -->


</nav>
</header>



<section style="height: 55rem" id="main" align="center" class="wrapper">
<div class="inner" align= "center">
<h1 class="logo" >Les utilisateurs</h1><br>
<table>
  <thead align="center" style="display: table-header-group">
  <tr>
     <th>identifiant </th>
     <th>Nom </th>
     <th>Prenom</th>
     <th>Supprimer</th>
  </tr>
  </thead>
<tbody>
<?php
 foreach($result as $user) {
  print '<tr class="item_row">';
  print   '<td> '.$user[0].'</td>';
  print   '<td>'.$user[1].' </td>';
  print   '<td> '.$user[2].'</td>';
  print    '<td style=" height: 32px; width: 32px; padding-left: 1px;">';
  print	'<form action="supprimeUserBdd.php" method="POST"><input  type="submit" id="submit" name="supp" value="'.$user[0].'"  ></form></td>';
  print'</tr>';
 }
  ?>
</tbody>
</table>
<?php

		                if(isset($_GET['suppression'])){
		                    $err = $_GET['suppression'];
		                    if($err=='true')
		                        echo "<p style='color:green'>l'utilisateur est supprimé</p>";
		                }
						if(isset($_GET['erreur'])){
		                    $err = $_GET['erreur'];
		                    if($err==1)
		                        echo "<p style='color:red'>la suppression n'a pas fonctionné</p>";
		                }
		                ?>


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
