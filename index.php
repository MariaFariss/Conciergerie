<?php

require_once('src/controllers/autres/accueil.php');
require_once('src/controllers/client/gestion_clients.php');
require_once('src/controllers/client/ajout_client.php');
require_once('src/controllers/client/form_ajoutclient.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'gestion_clients') {
            (new GestionClients())->execute();
        }
        else if ($_GET['action'] === 'form_ajoutclient') {
            (new FormAjoutClient())->execute();
        }
        else if ($_GET['action'] === 'ajout_client') {
            (new AjoutClient())->execute($_POST);
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
