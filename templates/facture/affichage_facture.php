<?php $title = "Gestion des clients"; ?>

<?php ob_start(); ?>
<!-- <?php require('templates/autres/background.php') ?> -->
<h1 class="title">GESTION DES COMMANDES</h1>
<a href="index.php?action=export_csv"><iconify-icon icon="material-symbols:export-notes" width="40" class="icone1"></iconify-icon></a>
<a href="index.php"><iconify-icon icon="material-symbols:home" width="40" class="icone2"></iconify-icon></a>

<div>
    <h2>Facture</h2>
    <p>Numéro de facture : <?= $facture->id_facture ?></p>
    <p>Date de la facture : <?= $facture->date_facture ?></p>
    <p>Client : <?= $facture->nom_client ?></p>
    <p>Adresse : <?= $facture->adresse_client ?></p>
    <p>Numéro de téléphone : <?= $facture->telephone_client ?></p>
    <p>Adresse email : <?= $facture->email_client ?></p>
</div>
<div class="ligne">
    <table border=1 frame=void rules=rows>
        <thead>
            <th>N°</th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Prix total</th>
        </thead>
        <tbody>
            <?php
            foreach ($articles as $article) {
            ?>
                <tr>
                    <td>
                        <?= $article->id_article ?>
                    </td>
                    <td>
                        <?= $article->nom_article ?>
                    </td>
                    <td>
                        <?= $quantites[$article->id_article] ?>
                    </td>
                    <td>
                        <?= $article->prix_magasin ?> $
                    </td>
                    <td>
                        <?= $article->prix_magasin * $quantites[$article->id_article] ?> 
                    </td>
                </tr>

            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('templates/autres/layout.php') ?>