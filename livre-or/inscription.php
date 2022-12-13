<?php require "serveur.php";

    $request = 'SELECT * FROM utilisateurs';
    $req = mysqli_query($bdd,$request);

    $result = mysqli_fetch_assoc($req);

@$submit= $_POST["envoi"];

if(isset($submit)){
        
    $login = htmlspecialchars($_POST["login"]);
    $mdp = $_POST["mdp"];
    $repeatpassword = $_POST["confmdp"];

    $erreur="";

    if(empty($login) && empty($mdp)){
        $erreur="Veuillez saisir tous les champs";
    }elseif(!empty($login) && empty($mdp)){
        $erreur="Veuillez saisir un mot de passe";
    }elseif(!empty($login) && $mdp!=$repeatpassword){
        $erreur="Veuillez saisir le même mot de passe";
    }elseif(!empty($login) && $mdp==$repeatpassword){

            $selectlogin = "SELECT login,password FROM utilisateurs WHERE login = '$login'";
            $sql2 = mysqli_query($bdd,$selectlogin);
            $result = mysqli_fetch_assoc($sql2);
            $login_exist=$result['login'];
            
            if ($login==$login_exist) {
                echo "<p id='error'>Ce login est déjà utilisé/p>";
            }else {
            $sql= "INSERT INTO `utilisateurs` ( `login`, `password`) VALUES ('$login', '$mdp')"; // Préparation de la requete 
            $res = mysqli_query($bdd, $sql);// envoie de la requete   
            header('Location: connexion.php');
            }

        

                }
        else{
           echo "Un problème est survenu lors de votre inscription";
       }
}

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8>
        <meta http-equiv="X-UA-Compatinble" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style_inscription.css">
        <title>Inscription</title>
</head>

<?php include "header.php" ?>

<body>
        <form method="POST">
        <div class="inscription"><h2><strong>Inscription</strong></h2></div>
        <br>

            <label for="Votre pseudo" class="form-label">Pseudo:</label>

            <input type="text" placeholder="Login" name="login" value="" required>
            <br>
            <label for="Mot de passe" class="form-label">Mot de passe:</label>

            <input type="password" placeholder="mdp" name="mdp" value="" required>
            <br>
            <label for="Confirmer le mot de passe" class="form-label">Confirmer le mot de passe:</label>

            <input type="password" placeholder="Confirmer le mdp" name="confmdp" required>
            <br>
            <input type="submit" name="envoi">
            <br>
            <br>
            <?= @$erreur ?>
            </form>
     </body>

     <footer>
    <a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="css/image/git.png"></a>
</footer>
</html>