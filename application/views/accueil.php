<link rel="stylesheet" href="<?php echo base_url('assets/css/accueil.css'); ?>">

<div class="blog">
    <div class="container">
        <div class="section-header text-center">
            <h2>Zavatra misy</h2>
        </div>
        <div class="row">
            <?php for ($i=0; $i < count($listeObjet); $i++) { ?>
                <div class="col-md-3">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img class="sary" src="<?php echo base_url($listeObjet[$i]['sary']['path']); ?>">
                        </div>
                        <div class="blog-text">
                            <h3><a href="#"><?php echo $listeObjet[$i]['nom_obj']; ?></a></h3>
                            <p><b>Proprietaire :</b><?php echo $listeObjet[$i]['username']; ?></p>
                            
                            <p><b>Categorie :</b><?php echo $listeObjet[$i]['categ']; ?></p>

                            <p><b>Prix :</b><?php echo $listeObjet[$i]['prix']; ?></p>

                            <p>
                                <?php echo $listeObjet[$i]['description']; ?>
                            </p>
                            <p>
                                <p><?php echo anchor('home/detail?id='.$listeObjet[$i]['idObjet'],'voir plus','class="btn btn-primary" type="button"'); ?></p>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>