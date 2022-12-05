<?php require "serveur.php";
session_start();

if(isset($_POST['envoi'])){
    $login = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];
    $query = "SELECT `password` FROM utilisateurs WHERE login='$login'"; 
    $sql = $bdd->query($query); 
    $result = $sql->fetch_assoc(); 
    echo $result;
    if ($password == $_POST['password']) {
   
        echo "connecté";
        session_start();
        $_SESSION['login'] = $login;
            header('Location: profil.php');
        }
    
    if ($password != $_POST['password']){
        echo "Le login ou le mot de passe est incorrect";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatinble" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_connexion.css">
    <title>Connexion</title>
</head>

<header>
<div class="connexion"><h2><strong>Connexion</strong></h2></div>
        <br>
</header>

<body>

    <form method="POST" action="">

        <label for="pseudo" name="login" class="form-label">Pseudo:</label>
      
        <input type="text" name="login">
        <br>
        <label for="password" name="password" class="form-label">Password:</label>
   
        <input type="password" name="password">
        <br>
        <input type="submit" name="envoi">
    </form>
</body>

<footer>
    <a href="index.php" class="btn">
                <div class="arrow"></div>
                <h6>Retour à l'accueil</h6></a>
</footer>
</html>