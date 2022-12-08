<?php require "serveur.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Livre d'or</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/style.css">
</head>

<header>
  <?php include "header.php" ?>
</header>

<body>
  <div class="message_acc">
    <h1>Bonjour à toi</h1>
  <?php
    if (isset($_SESSION['login']))
    { echo "<h1>" . $_SESSION['login'] . "</h1>" ; } 
    ?>
  <h1>pourfendeur de démon</h1>
  </div>

</body>

<footer><a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="css/image/git.png"></a>
    </footer>
</html>