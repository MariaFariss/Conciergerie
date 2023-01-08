<?php $title = "Gestion des clients"; ?>

<?php ob_start(); ?>
<h1 class="gestions-des-clients">GESTION DES CLIENTS</h1>
    <div class="gestion_clients">
      <div class="overlap">
        <div class= "rectangle-4"></div>
        <div class= "rectangle-5"></div>
      </div>
        <?= $clients[0]->nom ?>
    </div>
<?php

?>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>