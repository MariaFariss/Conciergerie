<?php

require_once('src/controllers/autres/accueil.php');
require_once('src/controllers/client/gestion_clients.php');
require_once('src/controllers/client/ajout_client.php');
require_once('src/controllers/client/form_ajoutclient.php');
require_once('src/controllers/client/delete_client.php');
require_once('src/controllers/client/modifier_fiche_client.php');
require_once('src/controllers/client/form_modifier_fiche_client.php');
require_once('src/controllers/commande/gestion_commandes.php');
require_once('src/controllers/commande/export_csv.php');
require_once('src/controllers/client/consulter_fiche_client.php');

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
        else if ($_GET['action'] === 'delete_client') {
            if(isset($_GET['id_client']) && $_GET['id_client']>0){
                (new DeleteClient())->execute($_GET['id_client']);
            }
            
        }
        else if ($_GET['action'] === 'form_modifier_fiche_client') {
            if(isset($_GET['id_client']) && $_GET['id_client']>0){
                (new FormModifClient())->execute($_GET['id_client']);   
            }
            
        }
        else if ($_GET['action'] === 'modifier_fiche_client') {
            if(isset($_GET['id_client']) && $_GET['id_client']>0){
                (new UpdateClient())->execute($_GET['id_client'], $_POST);   
            }
            }
        else if ($_GET['action'] === 'gestion_commandes') {
            (new GestionCommandes())->execute();
        } else if ($_GET['action'] === 'export_csv') {
            (new ExportCSV())->execute();
        }
        else if ($_GET['action'] === 'consulter_fiche_client') {
            if(isset($_GET['id_client']) && $_GET['id_client']>0){
                (new ConsulterFicheClient())->execute($_GET['id_client']);   
            }
        }   
        
        else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
        
    } else {
        (new Accueil())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('./templates/autres/error.php');
}
