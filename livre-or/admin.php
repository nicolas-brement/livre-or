<?php
include "header.php" ;
$mysqli = new mysqli ("localhost", "root", "root", "livreor");
$request = $mysqli -> query("SELECT * FROM utilisateurs");
$result_fetch_all = $request -> fetch_all();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Site</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style_admin.css">
</head>

    <h2>Informations base de données</h2>
    
<table>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>prenom</th>
        <th>nom</th>
        <th>password</th>
    <tr>

<?php

foreach($result_fetch_all as $ligne){
    echo "<tr>";
    foreach($ligne as $champ){
        echo "<td>" . $champ ."</td>";
    }
    echo "</tr>";
}
?>
</table>

<footer>
    <a href="https://github.com/nicolas-brement?tab=repositories"><img id="github" src="css/image/git.png"></a>
</footer>

</html>
