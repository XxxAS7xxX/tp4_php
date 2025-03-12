<div class="container mt-5">
<h2 class='pt-3 text-center'><?php echo $mode ?> un livre</h2>
    <form action="index.php?uc=livre&action=valideForm" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
            <div class="form-group">
                <label for='isbn' > ISBN </label>
                <input type="text" class='form-control' id='isbn' placehoder='Saisir ISBN' name='isbn' 
                value="<?php if($mode == "Modifier") {echo $livre->getIsbn() ;} ?>">
                
                <label for='titre' > Titre </label>
                <input type="text" class='form-control ' id='titre' placehoder='Saisir le titre' name='titre' 
                value="<?php if($mode == "Modifier") {echo $livre->getTitre() ;} ?>">
                
                <label for='prix' > Prix </label>
                <input type="text" class='form-control ' id='prix' placehoder='Saisir le prix' name='prix' 
                value="<?php if($mode == "Modifier") {echo $livre->getPrix() ;} ?>">
                
                <label for='editeur' > Editeur </label>
                <input type="text" class='form-control ' id='editeur' placehoder="'Saisir l'editeur'" name='editeur' 
                value="<?php if($mode == "Modifier") {echo $livre->getEditeur() ;} ?>">
                
                <label for='annee' > Année </label>
                <input type="text" class='form-control ' id='annee' placehoder="'Saisir l'annee'" name='annee' 
                value="<?php if($mode == "Modifier") {echo $livre->getAnnee() ;} ?>">

                <label for='langue' > Langue</label>
                <input type="text" class='form-control ' id='langue' placehoder="Saisir la langue" name='langue' 
                value="<?php if($mode == "Modifier") {echo $livre->getLangue() ;} ?>">

                <div class="form-group">
                    <label for="auteur" > auteur </label>
                    <select name="auteur" class="form-control">
                    <?php 
                        foreach($lesAuteurs as $auteur){
                            if($mode == "Modifier"){
                            $selection=$auteur->num== $lauteur->getAuteur()->getNum() ? 'selected' : '';
                            }
                            echo "<option value='".$auteur->num ."'". $selection .">". $auteur->nom ."</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $lauteur->getNum();} ?>">

                <div class="form-group">
                    <label for="genre" > genre </label>
                    <select name="genre" class="form-control">
                    <?php 
                        foreach($lesGenres as $genre){
                            if($mode == "Modifier"){
                            $selection=$genre->getNum()== $legenre->getGenre()->getNum() ? 'selected' : '';
                            }
                            echo "<option value='".$genre->getNum() ."'". $selection .">". $genre->getLibelle() ."</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $legenre->getNum();} ?>">

                


                

            </div>
            <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $livre->getNum();} ?>">
            <div class="row">
                <div class="col"> <a href="index.php?uc=livre&action=list" class='btn btn-warning btn-block'>Revenir à la liste</a> </div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button> </div>
            </div>
    </form>
</div>