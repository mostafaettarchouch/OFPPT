<?php


if(isset($_SESSION["img"])){
    $img = $_SESSION["img"];
    $user = $_SESSION["nom"];
    $cone = "<button><a href='Déconnexion.php'>Déconnexion</a>";
}else{
    $img = "./user.jpg";
    $user = "";
    $cone = "<button><a href='seconnecter.php'>login </a></button><button><a href='Créeruncompte.php'>logUp</a></button>";
}
?>


<div id="baruser"><div id="logo"></div> <div id="userinfo"> <img id="userlogo" src="<?= $img ?>" alt=""><span><?= $user ?></span><?=$cone?></div></div>