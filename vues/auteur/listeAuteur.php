<div class="container" style="margin: 5% auto auto 12%">
    
    <div class="row pt-3">
        <div class="col-9">
            <h2>Liste des auteurs</h2>
        </div>
        <div class="col-3"><a href="index.php?uc=auteur&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer un auteur</a> </div>
        
    </div>

    <table class="table table-hover table-dark">
        <thead>
            <tr class="d-flex">
            <th scope="col" class="col-md-2">Numéro</th>
            <th scope="col" class="col-md-4">Nom</th>
            <th scope="col" class="col-md-3">Prénom</th>
            <th scope="col" class="col-md-3">Nationalité</th>
            <th scope="col" class="col-md-2">Actions</th>
            </tr>
        </thead>
    <tbody>
        <?php

        foreach($lesAuteurs as $auteur){
            echo "<tr class='d-flex'>";
            echo "<td class='col-md-2'>".$auteur->num."</td>";
            echo "<td class='col-md-4'>".$auteur->nom."</td>";
            echo "<td class='col-md-3'>".$auteur->prenom."</td>";
            echo "<td class='col-md-3'>".$auteur->libnation."</td>";

  
            
            echo "<td class='col-md-2'>
                <a href='index.php?uc=auteur&action=update&num=".$auteur->num."' class='btn btn-info'><i class='fas fa-pen'></i></a>
                <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer ce auteur ?' data-suppression='index.php?uc=auteur&action=delete&num=".$auteur->num."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
            echo "</tr>";
        }

        ?>
            
    </tbody>
    </table>

</div>