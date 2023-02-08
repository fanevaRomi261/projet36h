<link rel="stylesheet" href="<?php echo base_url('assets/css/demande.css'); ?>">
<div class="container ctn">

    <?php for ($i=0; $i < count($proposition); $i++) { ?>
        <div class="row">
            <div class="col-md-4">
                <span>
                    <img src="<?php echo base_url($proposition[$i]['sary1']['path']); ?>">
                </span>
                <span>
                    <p>Nom de l'objet :<?php echo $proposition[$i]['nom_obj1']; ?></p>
                    <p>Proprietaire :<?php echo $proposition[$i]['username_obj1']; ?>(vous)</p>
                    <p>Prix :<?php echo $proposition[$i]['prix_obj1']; ?></p>
                </span>
            </div>
            <div class="col-md-2">
                <b>echanger contre</b>
            </div>
            <div class="col-md-4">
                <span>
                    <img src="<?php echo base_url($proposition[$i]['sary2']['path']); ?>">
                </span>
                <span>
                    <p>Nom de l'objet :<?php echo $proposition[$i]['nom_obj2']; ?></p>
                    <p>Proprietaire :<?php echo $proposition[$i]['username_obj2']; ?></p>
                    <p>Prix :<?php echo $proposition[$i]['prix_obj2']; ?></p>
                </span>
            </div>
            <div class="col-md-2">
                <p>
                    <?php echo anchor('home/accepterechange?idechange='.$proposition[$i]['idEchange'],'accepter','class="btn btn-primary" type="button"'); ?>
                    <?php echo anchor('home/refuserechange?idechange='.$proposition[$i]['idEchange'],'refuser','class="btn btn-danger" type="button"'); ?>
                </p>
            </div>
        </div>
        <hr class="tsipika">
    <?php } ?>

    
</div>