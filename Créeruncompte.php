<?php
require_once("connection.php");
if(isset($_POST["nom"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["Prenom"];
    $email = $_POST["email"];
    $bac = $_POST["bac"];
    $specialite = $_POST["specialite"];
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
        $imagename = $_FILES["image"]["name"];
        $target_file = "imguser/".basename($imagename);
        move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
    }else{
        exit();
    }
    $image = $target_file;
    $pas = $_POST["pas"];
    if($pas == $_POST["conpas"]){
        $sqluser = "INSERT INTO stagiaire (nom, prenom, email, img, id_bac, id_Specialite, pas) VALUES
('$nom', '$prenom', '$email', '$image', $bac, $specialite, '$pas')";
    $con->query($sqluser);
    header("Location: seconnecter.php");
    exit();

    }


    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <?php require_once("header.php") ?>
       <div id="container1">
        <!-- <div id="logo1"></div> -->
        <h2 id="titr1">Créer un compte</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Nom" name="nom" required><br>
            <input type="text" placeholder="Prénom" name="Prenom" required><br>
            <input type="text" placeholder="Email" name="email" required><br>
            <select name="bac" id="bac">
                <?php
                $sqlbac = "select * from Baccalaureat";
                $d1 = $con->query($sqlbac);
                while($databac = $d1->fetch_object()):
                ?>
                <option value="<?= $databac->id_bac ; ?>"><?= $databac->bac_nom ; ?></option>
                <?php endwhile ?>
            </select><br>
            <select name="specialite" id="specialite">
                <?php
                $sqlspe = "select * from Specialite";
                $d2 = $con->query($sqlspe);
                while($dataspe = $d2->fetch_object()):
                ?>
                <option value="<?= $dataspe->id_Specialite ?>"><?= $dataspe->Specialite_nom ?></option>
               <?php endwhile ?>
            </select><br>
            <input type="file" value="image" placeholder="image" name="image" required><br>
            <input type="password" placeholder="password" name="pas" required><br>
            <input type="password" placeholder="confirm password" name="conpas"><br>
            <input type="submit" value="S'INSCRIRE" name="submit" required><br>
        </form>
        <a href="seconnecter.php">Se connecter</a>
       </div> 
    </section>
</body>
</html>