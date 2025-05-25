<?php
session_start();
if(!isset($_SESSION["nom"])){
    header("Location: seconnecter.php");
}
require_once("connection.php");

if($_GET["id"] == $_SESSION["id"]){
    if(isset($_POST["nom"])){
        $nom = $_POST["nom"];
        $prenom = $_POST["Prenom"];
        $email = $_POST["email"];
        $bac = $_POST["bac"];
        $id = $_GET["id"];

        $sqlupd ="UPDATE stagiaire SET nom = '$nom', prenom = '$prenom', email = '$email', id_bac = $bac WHERE id = $id";
        if($con->query($sqlupd)){
            $_SESSION["nom"] = $_POST["nom"];
            $_SESSION["prenom"] = $_POST["Prenom"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["bacname"] = $_POST["bac"];
            header("Location: index.php");
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <?php require_once("header.php") ?>
       <div id="container1">
        
        <h2 id="titr1">Modifier les information du compte</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id"><br>
            <input type="text" placeholder="Nom" name="nom" value="<?= $_SESSION["nom"] ?>"><br>
            <input type="text" placeholder="Prénom" name="Prenom" value="<?= $_SESSION["prenom"] ?>"><br>
            <input type="text" placeholder="Email" name="email" value="<?= $_SESSION["email"] ?>"><br>
            <select name="bac" id="bac">
                <?php
                $sqlbac = "select * from Baccalaureat";
                $d1 = $con->query($sqlbac);
                while($databac = $d1->fetch_object()):
                ?>
                <?php if($databac->id_bac == $_SESSION["id_bac"]): ?>
                    <option value="<?= $databac->id_bac ; ?>" selected><?= $databac->bac_nom ; ?></option>
                    <?php else: ?>
                <option value="<?= $databac->id_bac ; ?>"><?= $databac->bac_nom ; ?></option>
                <?php endif ?>
                <?php endwhile ?>
            </select><br>
           
            
            
            <input type="submit" value="Enregistrer les modification" name="submit"><br>
            <button><a href="index.php" id = "annuler">Annuler</a></button>
            <button id="Supprimer"><a href="Supprimer.php?id=<?=$_SESSION["id"]?>" id="Supprimertext" >Supprimer mon compte </a></button>
        </form>
       
       </div> 
    </section>
</body>
</html>