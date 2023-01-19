<?php
require_once('src/lib/database.php');
require_once('src/model/commande.php');
class AjoutFacture
{
    public function execute(int $id_commande, array $input) {
        $cr = new CommandeRepository();
        $cr->connection = new DatabaseConnection();
        unset($input['valider']);
        $facture = $cr->addFacture($id_commande, $input);
        if ($facture) {
            header('Location: index.php');
        } else{
            throw new \Exception('Impossible d\'ajouter la facture !');
        }
        
    }
}