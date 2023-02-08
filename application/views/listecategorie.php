<link rel="stylesheet" href="<?php echo base_url('assets/css/listecategorie.css'); ?>">

<div class="container ctn">
    <h2>Liste des categorie</h2>
    <?php echo anchor('home/formajoutcategorie','Ajouter une categorie','class="btn btn-primary" type="button"'); ?>
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Action</th>
        </tr>
        <?php foreach ($categorie as $c) { ?>
        <tr>
            <td><?php echo $c['nom']; ?></td>
            <td><?php echo anchor('home/formmodifiercategorie?idcat='.$c['idCategorie'],'Modifier','class="btn btn-primary" type="button"'); ?></td>
        </tr>
        <?php } ?>
    </table>
</div>