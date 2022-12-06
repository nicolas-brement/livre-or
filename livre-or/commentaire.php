<?php require "serveur.php";
session_start();

if(isset($_POST['submit']))
{
    if(!empty($_POST['message']))
{

}else echo "Vous devez saisir tous les champs pour pouvoir poster un commentaire.";
}

?>


<form method="POST" action="commentaire.php">
<hr>
<strong>Poster un commentaire</strong>
<p>Votre message</p>
<textarea name="message" rows="6" cols="35"></textarea><br/><br/>
<input type="submit" name="submit" value="Poster">
</form>