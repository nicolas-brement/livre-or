<?php include "header.php" ?>

<?php require "serveur.php";

if(isset($_POST['envoi'])){
    $login = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];
    $query = "SELECT `password` FROM utilisateurs WHERE login='$login'"; 
    $sql = $bdd->query($query); 
    $result = $sql->fetch_assoc(); 
    echo $result;
    if ($password == $_POST['password']) {
   
        echo "connecté";
        
        $_SESSION['login'] = $login;
            header('Location: profil.php');
        }
    
    if ($password != $_POST['password']){
        echo "Le login ou le mot de passe est incorrect";
    }

    if($login == 'admin') {
        header('Location: admin.php');
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
    <link rel="stylesheet" href="css/style_connexion.css">
    <title>Connexion</title>
</head>

<body>

    <div class="message_connexion">

    <?php
    if (isset($_SESSION['login']))
    { echo "Connecté(e) en tant que " . $_SESSION['login']; } 
    ?>
    </div>

    <form method="POST" action="">
        <div class="connexion"><h2><strong>Connexion</strong></h2></div>
        <br>

        <label for="pseudo" name="login" class="form-label">Pseudo:</label>
      
        <input type="text" placeholder="Login" name="login">
        <br>
        <label for="password" name="password" class="form-label">Password:</label>
   
        <input type="password" placeholder="Mdp" name="password">
        <br>
        <input type="submit" name="envoi">
    </form>
</body>

<footer>
    <a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="css/image/git.png"></a>
</footer>
</html>