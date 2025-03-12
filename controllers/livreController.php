<?php
$action=$_GET['action'];
switch($action){
        case 'list';
            $lesLivres = Livre::findAll();
            $lesAuteurs=Auteur::findAll();
            $lesGenres=Auteur::findAll();
            include('vues/livre/listeLivre.php');
            break;

        case 'add';
            $mode="Ajouter";
            $lesAuteurs=Auteur::findAll();
            $lesGenres=Genre::findAll();
            include('vues/livre/formLivre.php');
            break;

        case 'update';
            $mode="Modifier";
            $lesAuteurs=Auteur::findAll();
            $lesGenres=Auteur::findAll();
            $livre=Livre::findById($_GET['num']);
            include('vues/livre/formLivre.php');
            break;

        case 'delete';
            $livre=Livre::findById($_GET['num']);
            $nb=Livre::delete($livre);
            if($nb==1){
                $_SESSION['message']=["success"=>"Le livre a bien été supprimé"];
            }else{
                $_SESSION['message']=["danger"=>"Le livre n'a pas été supprimé"];
            }
            header('location:index.php?uc=livre&action=list');
            break;

        case 'valideForm';
            $livre=new Livre();
            if(empty($_POST['num'])){
                $livre->setIsbn($_POST['isbn']);
                $livre->setTitre($_POST['titre']);
                $livre->setPrix($_POST['prix']);
                $livre->setEditeur($_POST['editeur']);
                $livre->setAnnee($_POST['annee']);
                $livre->setLangue($_POST['langue']);
                $livre->setAuteur($_POST['auteur']);
                $livre->setGenre($_POST['genre']);
                $nb=Livre::add($livre);
                $message ="ajouté"; 
            }else{
                $livre->setNum($_POST['num']);
                $livre->setIsbn($_POST['isbn']);
                $livre->setTitre($_POST['titre']);
                $livre->setPrix($_POST['prix']);
                $livre->setEditeur($_POST['editeur']);
                $livre->setAnnee($_POST['annee']);
                $livre->setLangue($_POST['langue']);
                $livre->setAuteur($_POST['auteur']);
                $livre->setGenre($_POST['genre']);
                $nb=Livre::update($livre);
                $message ="modifié";
            }
            if($nb==1){
                $_SESSION['message']=["success"=>"Le livre a bien été $message"];
            }else{
                $_SESSION['message']=["danger"=>"Le livre n'a pas été $message"];
            }
            header('location:index.php?uc=livre&action=list');
            break;
}