<?php $title = "Gestion des clients"; ?>

<?php ob_start(); ?>
<h1 class="title">GESTION DES CLIENTS</h1>
    <div class="gestion_clients">
      <div class="overlap">
        <div class= "rectangle-4"></div>
        <div class= "rectangle-5"></div>
      </div>
      <div > 
        <iconify-icon icon="ic:round-person-add" width="40" class="groupe-1"></iconify-icon> 
        <iconify-icon icon="material-symbols:home"  width="40" class="groupe-2"></iconify-icon> 
      </div>
        <!-- <?= $clients[0]->nom ?> -->
    </div>
<?php

?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>