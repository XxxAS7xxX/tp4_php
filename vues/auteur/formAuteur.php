<div class="container mt-5">
<h2 class='pt-3 text-center'><?php echo $mode ?> un auteur</h2>
    <form action="index.php?uc=auteur&action=valideForm" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
            <div class="form-group">
                <label for='nom' > Nom </label>
                <input type="text" class='form-control' id='nom' placeholder='Saisir le nom' name='nom' 
                value="<?php if($mode == "Modifier") {echo $auteur->getNom() ;} ?>">

                <label for='prenom' > Prenom </label>
                <input type="text" class='form-control' id='prenom' placeholder='Saisir le prenom' name='prenom' 
                value="<?php if($mode == "Modifier") {echo $auteur->getPrenom() ;} ?>">

                <label for="nationalite" > Nationalite </label>
                <select name="nationalite" class="form-control">
                <?php 
                    foreach($lesNationalites as $nationalite){
                        if($mode == "Modifier"){
                        $selection=$nationalite->numero== $auteur->getNationalite()->getNum() ? 'selected' : '';
                        }
                        echo "<option value='".$nationalite->numero ."'". $selection .">". $nationalite->libNation ."</option>";
                    }
                    ?>
                </select>
                
            </div>
            
            <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $auteur->getNum();} ?>">
            <div class="row">
                <div class="col"> <a href="index.php?uc=auteur&action=list" class='btn btn-warning btn-block'>Revenir à la liste</a> </div>
                <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button> </div>
            </div>
    </form>
</div>