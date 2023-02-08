<link rel="stylesheet" href="<?php echo base_url('assets/css/listeetajout.css'); ?>">

<div class="container ctn">
    <h2>Mes objets</h2>
    <p><?php echo anchor('home/insertobjet','inserer nouvelle objet','class="btn btn-primary" type="button"'); ?></p>

    
    <?php for ($i=0; $i < count($mesObjets); $i++) { ?>
        <div class="row">     
            <div class="col-md-4">
                <img src="<?php echo base_url($mesObjets[$i]['sary']['path']); ?>">
            </div>    
            <div class="col-md-8">
                <p><b>Nom de l'objet :</b> <?php  echo $mesObjets[$i]['nom_obj']; ?></p>
                <p><b>Proprietaire :</b> <?php  echo $mesObjets[$i]['username']; ?></p>
                <p><b>Categorie :</b> <?php  echo $mesObjets[$i]['categ']; ?></p>
                <p><b>Prix :</b> <?php  echo $mesObjets[$i]['prix']; ?></p>
                <p><b>Description :</b> <?php  echo $mesObjets[$i]['description']; ?></p>
            </div>
        </div>
        <hr>
    <?php } ?>
</div>