<?php  $title = "Gestion des commandes";  ?>
<?php  ob_start();  ?>
<?php  require('templates/autres/background.php')  ?>
<h1 class="title">GESTION DES COMMANDES</h1>
<a href="index.php"><iconify-icon icon="material-symbols:home" width="40" class="icone2"></iconify-icon></a>
<div class="formulaire">
    <form action="index.php?action=modifier_fiche_client&id_client=<?= $client->id_client ?>" method="post" >
        <div class="group-1">
            <label for="date_commande">Date de commande</label></br>
            <input type="text" id="date_commande" name="date_commande" placeholder="date commande" value="<?= $client->date_commande ?>" required></br>
            <label for="total">Total</label></br>
            <input type="text" id="total" name="total" placeholder="total" value="<?= $client->total ?>" required></br>
            <label for="date_livraison">Date de livraison</label></br>
            <input type="text" id="date_livraison" name="date_livraison" placeholder="date livraison" value="<?= $client->date_livraison ?>" required></br>
            <label for="frais_depot">Frais de depot</label></br>
            <input type="text" id="frais_depot" name="frais_depot" placeholder="frais depot" value="<?= $client->frais_depot ?>" required></br>
            <label for="restant_a_payer">Restant a payer</label></br>
            <input type="text" id="restant_a_payer" name="restant_a_payer" placeholder="restant a payer" value="<?= $client->restant_a_payer ?>" required></br>
            
        </div>
        <div class="group-2">
        <label for="frais_livraison">Frais de livraison</label></br>
            <input type="text" id="frais_livraison" name="frais_livraison" placeholder="frais livraison" value="<?= $client->frais_livraison ?>" required></br>
            <label for="statut">Statut</label></br>
            <input type="text" id="statut" name="statut" placeholder="statut" value="<?= $client->statut ?>" required></br>
            <label for="date_expedition">Date d'expedition</label></br>
            <input type="text" id="date_expedition" name="date_expedition" placeholder="date expedition" value="<?= $client->date_expedition ?>" required></br>
            <label for="note">Note</label></br>
            <input type="text" id="note" name="note" placeholder="note" value="<?= $client->note ?>" required></br>
            <label for="id_client">Id client</label></br>
            <input type="text" id="id_client" name="id_client" placeholder="id client" value="<?= $client->id_client ?>" required></br>
            
        <input type="submit" class="boutton" value="Modifier">
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('./templates/autres/layout.php') ?>