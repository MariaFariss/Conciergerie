<?php $title = "Gestion des clients"; ?>

<?php ob_start(); ?>
<?php require('autres/background.php') ?>
<h1 class="title">GESTION DES CLIENTS</h1>
<a href="index.php?action=form_ajoutCommande"><iconify-icon icon="ic:round-person-add" width="40" class="icone1" ></iconify-icon></a>
<a href="index.php"><iconify-icon icon="material-symbols:home" width="40" class="icone2"></iconify-icon></a>
<div class="ligne">
    <table border=1 frame=void rules=rows>
        <thead>
            <th>N°</th>
            <th>numero client</th>
            <th>Statut</th>
            <th>Date d'expedition</th>
            <th>frais_livraison</th>
            <th>total</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php
            foreach ($commande as $commande) {
            ?>
                <tr>

                    <td>
                        <?= $commande->id_commande ?>
                    </td>
                    <td>
                        <?= $commande->id_client ?>
                        
                    <td>
                    <td>
                        <?= $commande->statut ?>
                    </td>
                    <td>
                        <?= $commande->date_expedition ?>
                    </td>
                    <td>
                        <?= $commande->frais_livraison ?>
                    </td>
                    <td>
                        <?= $commande->total ?>
                    </td>
                        <a href="#">
                            <iconify-icon icon="ic:baseline-remove-red-eye" width="30"></iconify-icon>
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <iconify-icon icon="material-symbols:edit" width="30"></iconify-icon>
                        </a>
                    </td>

                </tr>


            <?php
            }
            ?>

        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>