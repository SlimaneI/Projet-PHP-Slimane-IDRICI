<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
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

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $usename = htmlspecialchars($_POST["username"]);
    $pasword = htmlspecialchars($_POST["password"]);




    if($usename !== "" && $pasword !== "")
    {
        $requete = "SELECT password FROM users where
              login = '".$usename."'";
        $reponse  = $conn->query($requete);
        $result = mysqli_fetch_object($reponse);


        if($reponse->num_rows >0) // nom d'utilisateur et mot de passe correctes
        {

          if(password_verify($pasword, $result->password)){
           $_SESSION['username'] = $usename;
           header('Location: PageAccueil.php');
         }else
         {
            header('Location: accueil.php?erreur=1'); // utilisateur ou mot de passe incorrect
         }

        }
        else
        {
           header('Location: accueil.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: accueil.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: accueil.php');
}

?>
