<div class="container" style="margin: 8% auto auto auto">
<h2 class="text-center"><?php echo $mode ?> un continent</h2>
   <form action="index.php?uc=continent&action=valideForm" method="post" class="col-md-6 offset-md-3 border border-dark p-3 rounded">
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id='libelle' placeholder="Saisir le libellé" name='libelle' value="<?php if($mode == "Modifier"){ echo $continent->getLibelle();} ?>">
        </div>
        <input type="hidden" name="num" id="num" value="<?php if($mode == "Modifier"){echo $continent->getNum();} ?>">
        <div class="row">
            <div class="col"><a href="index.php?uc=continent&action=list" class='btn btn-warning btn-block'>Revenir à la liste</a></div>
            <div class="col"><button type="submit" class='btn btn-success btn-block'><?php echo $mode ?></button></div>
        </div>
   </form>
</div>

<!-- <?php echo $action ?> -->