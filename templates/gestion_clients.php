<?php $title = "Gestion des clients"; ?>

<?php ob_start(); ?>
<!-- <?php require('background.php') ?> -->
<h1 class="title">GESTION DES CLIENTS</h1>
<iconify-icon icon="ic:round-person-add" width="40" class="icone1"></iconify-icon>
<iconify-icon icon="material-symbols:home" width="40" class="icone2"></iconify-icon>
<table border=1 frame=void rules=rows>
    <thead>
        <th>N°</th>
        <th>Nom</th>
        <th>Tel</th>
        <th>Email</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?php
        foreach ($clients as $client) {
        ?>
            <tr>
                <td>
                    <?= $client->id_client ?>
                </td>
                <td>
                    <?= $client->nom ?>
                </td>
                <td>
                    <?= $client->telephone ?>
                </td>
                <td>
                    <?= $client->email ?>
                </td>
                <td>
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

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>