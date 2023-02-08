<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/header.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/footer.css'); ?>">
</head>
<body>
    <header class="main-header clearfix" role="header">
        <div class="logo">
        <a href="<?php echo base_url('home'); ?>"><em>e</em>-fanakalo</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">
            <!-- admin -->

            <?php if($_SESSION['isadmin'] == 1){ ?>
                <li><?php echo anchor('home/gerercategorie','Gerer categorie'); ?></li>
            <?php } ?>

            <?php if($_SESSION['isadmin'] == 0){ ?>
                <li><?php echo anchor('home','Home'); ?></li>
                <li><?php echo anchor('home/mylist','Mes objets'); ?></li>
                <li><?php echo anchor('home/demande','Liste proposition'); ?></li>
            <?php } ?>

            <li><?php echo anchor('home/logout','Deconnecter'); ?></li>
        </ul>
        </nav>
    </header>
    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script> 
