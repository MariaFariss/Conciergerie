<?php

class Article {
    public int $id_article;
    public string $nom_article;
    public float $prix_commande;
    public float $prix_magasin;
    public float $prix_vip;
    
}

class ArticleRepository
{
    public DatabaseConnection $connection;
    
    //getArticle
    public function getArticles(): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM article ORDER BY id_article"
        );
        $articles = [];
        $statement->execute();
        while (($row = $statement->fetch())){
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

    //addArticle
    public function addArticle(string $nom_article, float $prix_commande, float $prix_magasin, float $prix_vip, string $statut_article, int $quantite_produit): bool
    {
        $statement1 = $this->connection->getConnection()->prepare(
            "INSERT INTO article (nom_article, prix_commande, prix_magasin, prix_vip) VALUES (?, ?, ?, ?)"
        );
        #initialiser le stock
        $statement2 = $this->connection->getConnection()->prepare(
            "INSERT INTO stock (statut_article, quantite_produit, id_article) VALUES (?, ?, ?)"
        );
       $res1 = $statement1->execute([$nom_article, $prix_commande, $prix_magasin, $prix_vip]);
        if($res1>0){
            $idArticle = $this->connection->getConnection()->lastInsertId();
            $res2 = $statement2->execute([$statut_article, $quantite_produit, $idArticle]);
            if($res2>0){
                return true;
            }
        }
        return false;
    }

    //getquentite and statut from stock
    public function getStock(): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM stock ORDER BY id_stock"
        );
        $stocks = [];
        $statement->execute();
        while (($row = $statement->fetch())){
            $stock = new Stock();
            $stock->id_stock = $row['id_stock'];
            $stock->statut_article = $row['statut_article'];
            $stock->quantite_produit = $row['quantite_produit'];
            $stock->id_article = $row['id_article'];
            $stocks[] = $stock;
        }
        return $stocks;
    }
}