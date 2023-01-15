<?php

require_once('src/lib/database.php');
class commande{
    public int $id_commande;
    public string $date_commande;
    public float $total;
    public string $date_livraison;
    public float $frais_depot;
    public float $restant_a_payer;
    public float $frais_livraison;
    public String $statut;
    public string $date_expedition;
    public String $note;
    public int $id_client;
}

class CommandeRepository
{
    public DatabaseConnection $connection;
public function getCommands(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM commande ORDER BY id_commande"
        );
        $commandes = [];
        while (($row = $statement->fetch())) {
            $commande = new commande();
            $commande->id_commande = $row['id_commande'];
            $commande->date_commande = $row['date_commande'];
            $commande->total = $row['total'];
            $commande->date_livraison = $row['date_livraison'];
            $commande->frais_depot = $row['frais_depot'];
            $commande->restant_a_payer = $row['restant_a_payer'];
            $commande->frais_livraison = $row['frais_livraison'];
            $commande->statut = $row['statut'];
            $commande->date_expedition = $row['date_expedition'];
            $commande->note = $row['note'];
            $commande->id_client = $row['id_client'];
            $commandes[] = $commande;
        }
        return $commandes;
    }

    public function addCommand(DateTime $date_commande, float $total, DateTime $date_livraison, float $frais_depot, float $restant_a_payer, float $frais_livraison, String $statut, DateTime $date_expedition, String $note):bool {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO commande (date_commande, total, date_livraison, frais_depot, restant_a_payer, frais_livraison, statut, date_expedition, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        return $statement->execute([$date_commande, $total, $date_livraison, $frais_depot, $restant_a_payer, $frais_livraison, $statut, $date_expedition, $note]) > 0;
    }
}