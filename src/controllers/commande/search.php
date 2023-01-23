<?php
require_once('src/lib/database.php');
require_once('src/model/commande.php');
Class SearchArticle
{
    public function execute(array $input) {
        $search = new CommandeRepository();
        $search->connection = new DatabaseConnection();
        $results = $search->searchArticles($input['search_query']);
        if ($results) {
            require('templates/commande/ajouter_article_pour_commande.php');
        } else{
            throw new \Exception('Impossible de trouver l\'article !');
        }
        
    }
}