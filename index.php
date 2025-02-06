<?php session_start(); 
include "vues/header.php";
include "modeles/Continent.php";
include "modeles/monPdo.php";

?>

<?php
$uc=empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($uc){
    case 'accueil' :
        include('vues/Accueil.php');
        break;
    case 'continent' :
        include('Controllers/continentController.php');
        break;
}
?>

<?php include "vues/footer.php";?>