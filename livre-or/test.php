<?php require "serveur.php";

    $request = 'SELECT * FROM utilisateurs';
    $req = mysqli_query($bdd,$request);

    $result = mysqli_fetch_assoc($req);
    var_dump($result);

if (!empty($_POST["login"]) && !empty($_POST["mdp"]) && !empty($_POST["confmdp"])){
        
    $login = htmlspecialchars($_POST["login"]);
    $mdp = htmlspecialchars($_POST["mdp"]);
    $repeatpassword = htmlspecialchars(($_POST["confmdp"]));

    
    $selectlogin = 'SELECT * FROM utilisateurs WHERE login = :login';
    $sql2 = $bdd->query($selectlogin);
    $result = $sql2->fetch_assoc();
    var_dump($result);
    
    if ($result["login"] == $login) {
        echo "<p id='error'>Ce login est déjà pris</p>";
    }
    
     if($mdp == $repeatpassword){

       $sql= "INSERT INTO `utilisateurs` ( `login`, `password`) VALUES ('$login', '$mdp')"; // Préparation de la requete 
       $res = mysqli_query($bdd, $sql);// envoie de la requete 
   
         // header('Location: connexion.php');

        }
        if ($mdp != $repeatpassword) {
           echo " Les mots de passe ne sont pas identiques!";
       }
}

?>