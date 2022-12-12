<?php include "header.php" ?>
<?php
include('serveur.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Feuille de style css  -->
    <link rel="stylesheet" href="css/style_livre-or.css">
    <title>Livre d'or</title>
</head>

<html>

<?php
        $query=mysqli_query($bdd,"SELECT commentaires.date,  utilisateurs.login, commentaires.commentaire FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur=utilisateurs.id ORDER BY date DESC");
        $rowcount=mysqli_num_rows($query);
        $row=mysqli_fetch_all($query,MYSQLI_ASSOC);

       /* for($i=0;$i<$rowcount;$i++)
        {
            echo "<p>".$row[$i]['login']." ".$row[$i]['commentaire']." ".$row[$i]['date']."</p>";             
        }*/
?>

<section class="container_formulaire">
    <h3>LIVRE D'OR</h3>

   <!-- <div class="livre_or"> -->

        <?php
        foreach ($row as $row){
            echo "<table>";
            echo "<td"."<div class='result'>";
            echo "<div id='info'>";
            echo "<h2>"."Posté le " . $row["date"] . "." . " Par " . $row["login"].":" . "</h2>";
            echo "</div>";
            echo "<div id='com'>";
            echo $row['commentaire']."</td>";
            echo "</div></table>";
           // if(@$_SESSION['login'] == $row['login']){
               // echo "<form method='POST'><button type='submit' name='delete' value=".$row['id'].">Supprimer</button></form>"; // Mehdi Romdhani - Thank you !
          //  }
            echo "</div>";
        }
        ?>
        <?php if(empty($_SESSION['login'])){
            echo "<p>Connectez-vous pour laisser un commentaire</p>";
            echo "<div id='butt'>";
            echo "<a href='connexion.php'><button class='modifier' id='button_com' type='submit' name='submit'>Se connecter</button></a>";
            echo "</div>";
        }else{
            echo "<div id='butt'>";
            echo "<a href='commentaire.php'><button class='modifier' id='button_com' type='submit' name='submit'>Écrire un commentaire</button></a>";
            echo "</div>";
        }
        ?>
   <!-- </div> -->

</section>

<footer>
    <a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="css/image/git.png"></a>
</footer>


