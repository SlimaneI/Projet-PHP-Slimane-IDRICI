<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['prenom']) )
{
    // connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projphp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
 if ($_POST["password"] == $_POST["password2"]) {
   // code...

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $usename = htmlspecialchars($_POST["username"]);
    $pasword = htmlspecialchars($_POST["password"]);
    $nom = htmlspecialchars($_POST["prenom"]);
    $prenom = htmlspecialchars($_POST["nom"]);
    $mdp = password_hash($pasword, PASSWORD_DEFAULT);

    $requete = "SELECT * FROM users where
          login = '".$usename."'";
    $reponse  = $conn->query($requete);



 if($reponse->num_rows >0){
      header('Location: inscription.php?erreur=1');
 }
 else {

    $sql ="INSERT INTO users (id, login, password, nom, prenom, admin)
  	VALUES('', '$usename', '$mdp', '$nom', '$prenom', '0')";
    $conn->query($sql);

    $_SESSION['username'] = $usename;
    header('Location: PageAccueil.php');
 }
}else {
  header('Location: inscription.php?erreur=2');

}
}else
{
   header('Location: accueil.php');
}
?>
