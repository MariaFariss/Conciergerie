<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>
<p>Derniers billets du blog :</p>

<?php
foreach ($posts as $post) {
?>
<div class="aceuil'>
        <div class="overlap-group">
            <div class="rectangle-4"></div>
            <div class="rectangle-5"></div>
            <img
                class="rectange-2"
                scr="../assets/imgs/Menu1-removebg-preview.png"
                alt= "Rectangle 1"/>
            <img class="rectangle-2" 
                scr="../assets/imgs/Menu2-removebg-preview.png"
                alt= "Rectangle 2"/>
            <h1 class="gestion-des-commandes">Gestion des commandes</h1>
            <div class="gestion-des clients">Gestion des clients</div>
        </div>
</div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>