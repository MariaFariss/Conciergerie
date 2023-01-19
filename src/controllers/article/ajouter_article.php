<?php

require_once('src/lib/database.php');
require_once('src/model/client.php');
class AjoutArticle
{
    public function execute(array $input) {
        $article = new ArticleRepository();
        $article->connection = new DatabaseConnection();
        $success = $article->addArticle($input['nom'], $input['prenom'], $input['adresse'], $input['telephone'], $input['email'], $input['date_naissance'], $input['sexe'], $input['ville'], $input['code_postal'], $input['pays'], $input['type_client']);
        $stock = $article->getStock();
        if (!$success) {
            throw new \Exception('Impossible d\'ajouter le client !');
        } else {
            header('Location: index.php?action=gestion_commande');
        }
    }
}