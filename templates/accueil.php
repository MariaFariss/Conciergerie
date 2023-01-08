<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
<div class="accueil screen'>
        <div class="overlap-group">
            <div class="rectangle-4"></div>
            <div class="rectangle-5"></div>
            <div class="rectangle-1" >
                <a href="">
                <img class= "bordure"
                    src="assets/imgs/Menu1-removebg-preview.png"
                    alt= "Rectangle 1"/>
                <h1 class="gestion-des">Gestion des commandes</h1>
                </a>
            </div>    
            <div class="rectangle-2">
                <a href="index.php?action=gestion_clients">
                    <img class= "bordure"
                        src="assets/imgs/Menu2-removebg-preview.png"
                        alt= "Rectangle 2"/>
                    <h1 class="gestion-des">Gestion des clients</h1>
                </a>    
            </div>    
        </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>