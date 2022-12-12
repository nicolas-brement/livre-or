<?php include "header.php" ?>
<?php
include('serveur.php');

echo "<br>";
?>

<div class="message_acc">
  <?php
    if (isset($_SESSION['login']))
    { echo "<h3>Pourfendeur " . $_SESSION['login'] . "," ."<br>" . " transmet un message à ton corbeau messager" ."</h3>" ; } 
    ?>


<?php
if (!isset($_SESSION['login']))
{ echo "Veuillez vous connecter pour pouvoir écrire un commentaire."; }
?>
</div>

<?php
echo "<br>";

if(isset($_POST['submit'])){

   
    $session=$_SESSION['login'];
    $comment=$_POST['commentaire'];
    $mess_error="";
    $date=date('Y/m/d H:i:s');

    $req= mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE login='$session'");
    $tab_result=mysqli_fetch_all($req,MYSQLI_ASSOC);
    $id_user=intval($tab_result[0]['id']);
 
    if(!empty($log) && empty($comment)){
        $mess_error="Veuillez rentrez un commentaire";
    }else{
        
        $comment=mysqli_query($bdd,"INSERT INTO commentaires(commentaire,id_utilisateur,date) VALUES ('$comment','$id_user','$date')");

        
    }
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Feuille de style css  -->
    <link rel="stylesheet" href="css/style_commentaire.css">
    <title>Livre d'or</title>
</head>

<body>
    
<?php if(isset($_SESSION['login'])) ?>
<form action="" method="POST">

    <fieldset>
        <label for="comment"><p>Message</p></label>
        <br>
        <br>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="transmettre">
        <br>
        <br>
        

    </fieldset>
</form>
    
<footer>
    <a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="css/image/git.png"></a>
</footer>

</body>
</html>