<?php
require_once('src/lib/database.php');
require_once('src/model/commande.php');
class AjoutFacture
{
    public function execute(int $id_commande, array $input) {
        $cr = new CommandeRepository();
        $cr->connection = new DatabaseConnection();
        unset($input['valider']);
        $id_facture = $cr->addFacture($id_commande, $input);
        
        
    }
}