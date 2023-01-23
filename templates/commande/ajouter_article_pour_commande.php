<?php $title = "Ajout d'une commande"; ?>
<?php ob_start(); ?>
<?php require('./templates/autres/background.php') ?>
<h1 class="title">Ajouter un article pour une commande</h1>
<a href="index.php"><iconify-icon icon="material-symbols:home" width="40" class="icone2"></iconify-icon></a>
<form action="search.php" method="post">
  <input type="text" name="search_query" placeholder="Rechercher...">
  <input type="submit" value="Rechercher">
</form>
<h2>Résultats de la recherche</h2>
<ul>
  <?php foreach ($results as $result): ?>
    <li><?= $result->id_article ?></li>
    <li><?= $result->nom_article ?></li>
  <?php endforeach; ?>
</ul>

<?php $content = ob_get_clean(); ?>
<?php require('./templates/autres/layout.php') ?>