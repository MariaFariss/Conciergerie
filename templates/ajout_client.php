<?php $title = "Gestion des clients"; ?>

<?php ob_start(); ?>
<?php require('background.php') ?>
<h1 class="title">Ajouter un client</h1>
<iconify-icon icon="material-symbols:home" width="40" class="icone2"></iconify-icon>
<form action="ajout_client.php" method="post" class="formulaire">
    <div class="group-1">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" placeholder="Nom du client" required>
        <label for="facebook">facebook</label>
        <input type="facebook" id="facebook" name="facebook" placeholder="facebook" required>
        <label for="tel">Téléphone</label>
        <input type="tel" id="telephone" name="tel" placeholder="Téléphone du client" required>
    </div>
    <div class="group-2">
        <label for="adresse">Adresse</label>
        <input type="adresse" id="adresse" name="adresse" placeholder="Adresse du client" required>
        <label for="instagram">Instagram</label>
        <input type="instagram" id="instagram" name="instagram" placeholder="Instagram" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email du client" required>
    </div>
    <input type="submit" value="Ajouter">
</form>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>