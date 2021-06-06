<?php
session_start();
if(isset($_POST['supp']))
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
    
            $user = htmlspecialchars($_POST["supp"]);
            var_dump($user);
            // on applique htmlspecialchars
            // pour éliminer toute attaque de type injection 
            

            $requete = "SELECT * FROM users where
                login = '".$_SESSION['username']."'";
            $reponse  = $conn->query($requete);
            $result = mysqli_fetch_object($reponse);



            if($reponse->num_rows >0){
                    $sql ="DELETE FROM users
                    WHERE login ='$user'";
                    
                    $conn->query($sql);

                    
                    header('Location: admin.php?suppression=true');
                }else{
                header('Location: Admin.php?erreur=1');
                }



            
        }

   
?>
