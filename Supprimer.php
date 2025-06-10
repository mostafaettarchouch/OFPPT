<?php
require_once("connection.php");
session_start();

header("Location: seconnecter.php");
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sqldel = "DELETE from stagiaire WHERE id = $id  ";
    $con->query($sqldel);
    session_unset();
session_destroy();
header("Location: seconnecter.php");
}
?>