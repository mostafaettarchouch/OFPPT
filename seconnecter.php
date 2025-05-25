<?php
require_once("connection.php");

if(isset($_POST["email"])){
    $email = $_POST["email"];
    $pas = $_POST["pas"];
    $sqlcon = "SELECT s.*,b.bac_nom as bacname ,r.Specialite_nom as Specialitenom  FROM stagiaire s JOIN baccalaureat b ON s.id_bac = b.id_bac 
JOIN Specialite r ON s.id_Specialite = r.id_Specialite WHERE email = '$email' AND pas = '$pas' ";
    
   
        $data = $con->query($sqlcon);
        $userdata = $data->fetch_object();
        session_start();
        $_SESSION["id"] = $userdata->id;
        $_SESSION["nom"] = $userdata->nom;
        $_SESSION["prenom"] = $userdata->prenom;
        $_SESSION["email"] = $userdata->email;
        $_SESSION["img"] = $userdata->img;
        $_SESSION["id_bac"] = $userdata->id_bac;
        $_SESSION["id_Specialite"] = $userdata->id_Specialite;
        $_SESSION["bacname"] = $userdata->bacname;
        $_SESSION["Specialitenom"] = $userdata->Specialitenom;
        
    
    header("Location: index.php");
    exit();
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>se connecter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <?php require_once("header.php") ?>
       <div id="container1">
        
        <h2 id="titr1">CONNEXION</h2>
        <form action="#" method="post">
            <input type="text" placeholder="Email" name="email" required><br>
            <input type="password" placeholder="password" name="pas" required><br>
            <input type="submit" value="SE CONNECTER" name="submit"><br>
        </form>
        <a href="Créeruncompte.php">Créer un compte </a>
       </div> 
    </section>
</body>
</html>