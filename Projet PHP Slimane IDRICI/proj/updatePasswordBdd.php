<?php
session_start();
if(isset($_POST['passwordA']) && isset($_POST['password']) && isset($_POST['password2']))
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
    $password = htmlspecialchars($_POST["password"]);
    $password2 = htmlspecialchars($_POST["password2"]);

        if ($password == $password2) {
        // code...

            // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
            // pour éliminer toute attaque de type injection SQL et XSS
            $passwordA = htmlspecialchars($_POST["passwordA"]);
            

            $requete = "SELECT * FROM users where
                login = '".$_SESSION['username']."'";
            $reponse  = $conn->query($requete);
            $result = mysqli_fetch_object($reponse);



            if($reponse->num_rows >0){
                if(password_verify($passwordA, $result->password)){
                    $mdp = password_hash($password, PASSWORD_DEFAULT);
                    $sql ="UPDATE users SET password='$mdp' where login='".$_SESSION['username']."'";
                    
                    $conn->query($sql);

                    
                    header('Location: accueil.php?deconnexion=true');
                }else{
                header('Location: User.php?erreur=1');
                }



            }else {

            }
        }else
        {
            header('Location: User.php?erreur=2');
        }
}else
{
    header('Location: User.php?erreur=2');
}

   
?>
