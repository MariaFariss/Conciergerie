<?php

require_once('src/lib/database.php');
require_once('src/model/commande.php');

class GestionCommandes
{
    public function execute()
    {
        $connection = new DatabaseConnection();
        $commandeRepository = new CommandeReposirtory();
        $commandeRepository->connection = $connection;
        $clients = $commandeRepository->getCommande();
        require('templates/gestion_commandes.php');
        
    }
}


