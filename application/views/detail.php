<link rel="stylesheet" href="<?php echo base_url('assets/css/detail.css'); ?>">

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php for ($i=0; $i <count($sary) ; $i++) { ?>
                <img src="<?php echo base_url($sary[$i]['path']); ?>" class="rounded">
            <?php } ?>
        </div>
        <div class="col-md-6">
            <h3><?php echo $detail[0]['nom_obj']; ?></h3>
            <p><b>Proprietaire :</b><?php echo $detail[0]['username']; ?></p>
            <p><b>Categorie :</b><?php echo $detail[0]['categ']; ?></p>
            <p><b>Prix :</b><?php echo $detail[0]['prix']; ?></p>
            <p>
                <?php echo $detail[0]['description']; ?>
            </p>

            <form action="<?php echo base_url('home/proposerechange'); ?>" method="post">
                <p>
                    <input type="hidden" value="<?php echo $detail[0]['idObjet']; ?>" name="idobj1">
                    <h4>Echanger contre mes objets :</h4>
                    <select class="form-control" name="idobj2">
                        <option value="">Choisissez</option>
                        <?php for ($i=0; $i < count($obj); $i++) { ?>
                            <option value="<?php echo $obj[$i]['idObjet']; ?>"><?php echo $obj[$i]['nom_obj']; ?></option>
                        <?php } ?>
                    </select>
                </p>
                <p><button class="btn btn-primary" type="submit">Demander echange</button></p>
            </form>

            <p><?php echo anchor('home','retour','class="btn btn-primary" type="button"'); ?></p>
        </div>
    </div>
</div>