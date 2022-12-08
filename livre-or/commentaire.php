<?php include "header.php" ?>
<?php
include('serveur.php');

echo "<br>";
#$tab= mysqli_query($bdd,"SELECT * FROM utilisateurs ");
#$req=mysqli_fetch_all($tab,MYSQLI_ASSOC);
#$id_user=intval($req[0]['id']);

echo "Connecté(e) en tant que " . $_SESSION['login'];

echo "<br>";

#var_dump($id_user);



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
        
        //$req="INSERT INTO commentaires(`id_utilisateur`,`commentaire`,`date`) VALUES ('$id','$comment','$date')";
        $comment=mysqli_query($bdd,"INSERT INTO commentaires(commentaire,id_utilisateur,date) VALUES ('$comment','$id_user','$date')");

        
    }
}
//mysqli_close($connect);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Feuille de style css  -->
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>

<body>
    
<?php if(isset($_SESSION['login'])){ ?>
<form action="" method="POST">
    <fieldset>
        
       
        <label for="comment">Commentaires</label>
        <br>
        <br>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
        <br>
        <br>
        <input type="submit" name="submit" value="poster">
        <br>
        <br>
        
        <?= @$mess_error ?>
    </fieldset>
</form>

<?php } ?>

<div class="container-comment">
    
    <?php 

        //$req="SELECT DATE_FORMAT(commentaires.date, '%d/%m/%Y'), utilisateurs.login, commentaires.commentaire FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur=utilisateurs.id ORDER BY date DESC";
        
        $query=mysqli_query($bdd,"SELECT commentaires.date,  utilisateurs.login, commentaires.commentaire FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur=utilisateurs.id ORDER BY date DESC");
        $rowcount=mysqli_num_rows($query);
        $row=mysqli_fetch_all($query,MYSQLI_ASSOC);

        for($i=0;$i<$rowcount;$i++)
        {
           echo "<br> ".$row[$i]['login']." ".$row[$i]['commentaire']." ".$row[$i]['date'];
             
        }

        

    
      

    ?>
</div>
    
</body>
</html>