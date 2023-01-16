<?php

require_once('src/lib/database.php');
class Commande{
    public int $id_commande;
    public string $date_commande;
    public float $total;
    public string $date_livraison;
    public float $frais_depot;
    public float $restant_a_payer;
    public float $frais_livraison;
    public String $statut;
    public String $date_expedition;
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

    public function addCommand(String $date_commande, float $total, String $date_livraison, float $frais_depot, float $restant_a_payer, float $frais_livraison, String $statut, String $date_expedition, String $note):bool {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO commande (date_commande, total, date_livraison, frais_depot, restant_a_payer, frais_livraison, statut, date_expedition, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        return $statement->execute([strtotime($date_commande), $total, strtotime($date_livraison), $frais_depot, $restant_a_payer, $frais_livraison, $statut, strtotime($date_expedition), $note]) > 0;
    }

    public function getArticlesByCommande(int $id_commande): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM article join article_commande on article.id_article = article_commande.id_article WHERE id_commande = ?"
        );
        $statement->execute([$id_commande]);
        $articles = [];
        while (($row = $statement->fetch())) {
            $article = new Article();
            $article->id_article = $row['id_article'];
            $article->nom_article = $row['nom_article'];
            $article->prix_commande = $row['prix_commande'];
            $article->prix_magasin = $row['prix_magasin'];
            $article->prix_vip = $row['prix_vip'];
            $articles[] = $article;
        }
        return $articles;
    }
}