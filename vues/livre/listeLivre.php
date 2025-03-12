<div class="container" style="margin: 5% auto auto 6%">
    
    <div class="row pt-3">
        <div class="col-9">
            <h2>Liste des livres</h2>
        </div>
        <div class="col-3"><a href="index.php?uc=livre&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer un livre</a> </div>
        
    </div>

    <table class="table table-hover table-dark">
        <thead>
            <tr class="d-flex">
            <th scope="col" class="col-md-1">Numéro</th>
            <th scope="col" class="col-md-2">ISBN</th>
            <th scope="col" class="col-md-2">Titre</th>
            <th scope="col" class="col-md-1">Prix</th>
            <th scope="col" class="col-md-1">Editeur</th>
            <th scope="col" class="col-md-1">Année</th>
            <th scope="col" class="col-md-1">Langue</th>
            <th scope="col" class="col-md-2">Auteur</th>
            <th scope="col" class="col-md-2">Genre</th>
            <th scope="col" class="col-md-2">Action</th>
        </tr>
        </thead>
    <tbody>
        <?php
        foreach($lesLivres as $livre){
            echo "<tr class='d-flex'>";
            echo "<td class='col-md-1'>".$livre->num."</td>";
            echo "<td class='col-md-2'>".$livre->isbn."</td>";
            echo "<td class='col-md-2'>".$livre->titre."</td>";
            echo "<td class='col-md-1'>".$livre->prix."</td>";
            echo "<td class='col-md-1'>".$livre->editeur."</td>";
            echo "<td class='col-md-1'>".$livre->annee."</td>";
            echo "<td class='col-md-1'>".$livre->langue."</td>";
            echo "<td class='col-md-2'>".$livre->nomauteur."</td>";
            echo "<td class='col-md-2'>".$livre->nomgenre."</td>";

            echo "<td class='col-md-2'>
                <a href='index.php?uc=livre&action=update&num=".$livre->num."' class='btn btn-info'><i class='fas fa-pen'></i></a>
                <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer ce livre ?' data-suppression='index.php?uc=livre&action=delete&num=".$livre->num."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
            echo "</tr>";
        }

        ?>
            
    </tbody>
    </table>

</div>