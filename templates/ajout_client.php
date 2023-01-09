<?php $title = "Gestion des clients"; ?>

<?php ob_start(); ?>
<?php require('background.php') ?>
<h1 class="title">Ajouter un client</h1>
<iconify-icon icon="material-symbols:home" width="40" class="icone2"></iconify-icon>
<div class="formulaire">
    <form action="ajout_client.php" method="post" >
        <div class="group-1">
            <label for="nom">Nom</label></br>
            <input type="text" id="nom" name="nom" placeholder="Nom du client" required></br>
            <label for="facebook">facebook</label></br>
            <input type="facebook" id="facebook" name="facebook" placeholder="facebook" required></br>
            <label for="tel">Téléphone</label></br>
            <input type="tel" id="telephone" name="tel" placeholder="Téléphone du client" required></br>
        </div>
        <div class="group-2">
            <label for="adresse">Adresse</label></br>
            <input type="adresse" id="adresse" name="adresse" placeholder="Adresse du client" required></br>
            <label for="instagram">Instagram</label></br>
            <input type="instagram" id="instagram" name="instagram" placeholder="Instagram" required></br>
            <label for="email">Email</label></br>
            <input type="email" id="email" name="email" placeholder="Email du client" required></br>
        </div>
        <input type="submit" class="boutton" value="Ajouter">
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>