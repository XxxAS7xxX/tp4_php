<div class="container" style="margin: 5% auto auto auto">

  
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des continents</h2></div>
        <div class="col"><a href="index.php?uc=continent&action=add" class="btn btn-success"><i class="fas fa-plus-circle"></i>Créer un continent</a></div>
    </div>
    <table class="table table-hover table-dark">
        <thead>
            <tr class="d-flex">
            <th scope="col" class="col-md-2">Numéro</th>
            <th scope="col" class="col-md-8">Libellé</th>
            <th scope="col" class="col-md-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($lesContinents as $continent){
                echo "<tr class='d-flex'>";
                echo "<td scope='row' class='col-md-2'>" . $continent->getNum() . "</td>";
                echo "<td scope='row' class='col-md-8'>" . $continent->getLibelle() . "</td>";
                echo "<td scope='row' class='col-md-2'>
                    <a href='index.php?uc=continent&action=update&num=".$continent->getNum()."' class='btn btn-info'><i class='fas fa-pen'></i></a>";
                echo "<a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer ce continent ?' data-suppression='index.php?uc=continent&action=delete&num=".$continent->getNum()."' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>" . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>