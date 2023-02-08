<link rel="stylesheet" href="<?php echo base_url('assets/css/ajoutcategorie.css'); ?>">

<div class="container ctn">
    <h2>Modifier categorie</h2>
    <form action="<?php echo base_url('home/validermodifiercategorie'); ?>" method="post">
        <input type="hidden" value="<?php echo $cat['idCategorie']; ?>" name="idCategorie">
        <p><input type="text" placeholder="nom categorie" value="<?php echo $cat['nom']; ?>" class="form-control inp" name="nom"></p>
        <p><button type="submit" class="btn btn-primary">modifier</button></p>
    </form>
</div>