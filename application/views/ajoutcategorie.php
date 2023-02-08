<link rel="stylesheet" href="<?php echo base_url('assets/css/ajoutcategorie.css'); ?>">

<div class="container ctn">
    <h2>Ajouter nouvelle categorie</h2>
    <form action="<?php echo base_url('home/validerajoutcategorie'); ?>" method="post">
        <p><input type="text" placeholder="nom categorie" class="form-control inp" name="nom"></p>
        <p><button type="submit" class="btn btn-primary">Ajouter</button></p>
    </form>
</div>