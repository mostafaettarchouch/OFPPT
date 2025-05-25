<?php

session_start();
if(!isset($_SESSION["nom"])){
    header("Location: seconnecter.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <section>
    <?php require_once("header.php") ?>
    <div id="container1">
        
        <h2 id="titr1">CONNEXION</h2>
        <div id="info2">
        <p>Nom : <?= $_SESSION["nom"] ?></p>
        <p>Prénom : <?= $_SESSION["prenom"] ?></p>
        <p>Email : <?= $_SESSION["email"] ?></p>
        <p>Beecalouréat : <?= $_SESSION["bacname"] ?> <a href="Editer.php?id=<?= $_SESSION["id"] ?>">Editer</a></p>
        <p>Spécialite : <?= $_SESSION["Specialitenom"] ?> </p>
        
        </div>
        
        <h3>Les pesonnes dans la méme spécialité</h3>
        <table border="1">
            <tr>
                <th>Nom</th>
                <th>prénom</th>
                <th>Email</th>
            </tr>
            <?php
                require_once("connection.php"); 
                $idsp = $_SESSION["id_Specialite"];
                $sqltout = "SELECT * FROM stagiaire WHERE id_Specialite = $idsp ";
                $data = $con->query($sqltout);
                while($dt = $data->fetch_object()):
            ?>
            <tr>
                <td><?= $dt->nom ?></td>
                <td><?= $dt->prenom ?></td>
                <td><?= $dt->email ?></td>
            </tr>
        <?php endwhile ?>
        </table>
    </div> 
    </section>
</body>
</html>