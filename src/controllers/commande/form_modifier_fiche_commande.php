<?php

class FormModifCommande {
    public function execute(int $id_commande) {
        $cr = new CommandeRepository();
        $cr->connection = new DatabaseConnection();
        $commande = $cr->getCommandById($id_commande);
        require('templates/commande/modifier_fiche_commande.php');
    }
    
}

?>