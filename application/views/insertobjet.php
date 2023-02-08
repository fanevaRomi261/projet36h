<link rel="stylesheet" href="<?php echo base_url('assets/css/insertobjet.css'); ?>">

<div class="container ctn">
    <h2>Inserer nouvelle objet</h2>
    <form action="<?php echo base_url('home/finalinsertobjet'); ?>" enctype='multipart/form-data' method="post">
        <p><input type="text" placeholder="nom" class="form-control inp" name="nom"></p>
        <p><textarea cols="30" rows="5" placeholder="description" class="form-control area" name="desc"></textarea></p>
        <p><input type="number" placeholder="prix" class="form-control inp" name="prix"></p>
        <p><input type="file" name="img" placeholder="image" class="form-control inp"></p>

        <p>Categorie :</p>
            <?php foreach($categorie as $c){ ?>
                <p><?php echo $c['nom']; ?><input type="checkbox" class="chk" value="<?php echo$c['idCategorie']; ?>" name="categ[]"></p>
            <?php } ?>
        
            <?php //var_dump($_SESSION); ?>
        <p><button type="submit" class="btn btn-primary">Inserer</button></p>
    </form>
</div>