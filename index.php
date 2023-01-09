<?php

require_once('src/controllers/accueil.php');
require_once('src/controllers/gestion_clients.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'gestion_clients') {
            (new GestionClients())->execute();
        }
        else if ($_GET['action'] === 'ajout_client') {
            (new GestionClients())->execute();
        }
        else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
        
    } else {
        (new Accueil())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}
