<?php

require_once('src/lib/database.php');
require_once('src/model/client.php');
class UpdateClient
{
    public function execute(array $input) {
        if($input !== null){
            $nom = null; 
            $adresse = null;
            $email = null;
            $telephone = null;
            $facebook = null;
            $instagram = null;
            if(!empty($input['nom']) && !empty($input['adresse']) && !empty($input['email']) && !empty($input['telephone']) && !empty($input['facebook']) && !empty($input['instagram'])){
                $nom = $input['nom'];
                $adresse = $input['adresse'];
                $email = $input['email'];
                $telephone = $input['telephone'];
                $facebook = $input['facebook'];
                $instagram = $input['instagram'];
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
        }
        $client = new ClientRepository();
        $client->connection = new DatabaseConnection();
        $success = $client->updateClient($input['id_client'], $input['nom'], $input['adresse'], $input['email'], $input['telephone'], $input['facebook'], $input['instagram']);
        if (!$success) {
            throw new \Exception('Impossible de modifier le client !');
        } else {
            header('Location: index.php?action=gestion_clients');
        }
    }
}