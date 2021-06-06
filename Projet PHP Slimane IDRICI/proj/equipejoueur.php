<!DOCTYPE html>
<?php
  session_start();
	if(!isset($_SESSION['username'])) {

		header('Location: accueil.php');

	}
	include('ConnexionBd.php');
	$use = $conn->query("Select * FROM users where login = '".$_SESSION['username']."'");
	$results = mysqli_fetch_object($use );

 ?>
<html>
	<head>
		<title>Joueur par equipe</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/style.css">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">


	</head>

	<body class="is-preload" ng-app="myApp" ng-controller="Myctrl">
		
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

		if ($results->admin == '1'){
			echo '<a href="Admin.php">Admin</a>';
		}
        
	?>	
<a href="User.php"><?=$_SESSION['username'] ?></a>


<a href='accueil.php?deconnexion=true'>Déconnexion</a>

<!-- tester si l'utilisateur est connecté -->


</nav>
</header>



<section  id="main" align="center" class="wrapper">
<div class="inner" align= "center">
<h1 class="logo" >Choisir un joueur</h1>
    <?php



require_once( "sparqllib.php" );
 
$db = sparql_connect( "https://dbpedia.org/sparql" );
if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
sparql_ns( "rdf","http://www.w3.org/1999/02/22-rdf-syntax-ns#" );
sparql_ns( "dbp","http://dbpedia.org/property/" );
sparql_ns( "dbo","http://dbpedia.org/ontology/" );
sparql_ns( "xsd","http://www.w3.org/2001/XMLSchema#" );

$equipe = $_GET['equipe'];

$equipe = str_replace(' ','_',$equipe);

 
$sparql = "select distinct ?name where { 
    {
    ?joueur dbo:team dbr:$equipe . 
    ?joueur foaf:name ?name .
    
    } 
    union
    {
    ?joueur dbo:careerStation ?career .
    ?career dbo:team dbr:$equipe . 
    ?joueur foaf:name ?name .
    
    }
    }
    ";

$result = sparql_query( $sparql ); 
if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
 
$fields = sparql_field_array( $result );
 
print "<p>Joueurs : ".sparql_num_rows( $result )." results.</p>";
print "<table class='example_table'>";

while( $row = sparql_fetch_array( $result ) )
{
	print "<tr>";
	foreach( $fields as $field )
	{
		print "<td><a href='./joueurDetail.php?joueur=$row[$field]'>$row[$field]</a></td>";
	}
	print "</tr>";
}
print "</table>";

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

