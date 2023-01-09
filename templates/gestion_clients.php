<?php $title = "Gestion des clients"; ?>

<?php ob_start(); ?>
<?php require('background.php') ?>
<h1 class="title">GESTION DES CLIENTS</h1>
<iconify-icon icon="ic:round-person-add" width="40" class="icone1"></iconify-icon>
<iconify-icon icon="material-symbols:home" width="40" class="icone2"></iconify-icon>
<?php

?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>