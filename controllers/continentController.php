<?php
$action=$_GET['action'];
switch($action){
    case 'list':
        $lesContinents=Continent::findAll();
        include('vues/listeContinent');
        break;
    case 'add' :

        break;
    case 'update':

        break;
    case 'delete' :
    
        break;
}
?>