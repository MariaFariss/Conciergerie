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

    // //addArticles
    // public function addArticles(array $articles): void
    // {
    //     $statement = $this->connection->getConnection()->prepare(
    //         "INSERT INTO article (nom_article, prix_commande, prix_magasin, prix_vip) VALUES (?, ?, ?, ?)"
    //     );
    //     foreach ($articles as $article) {
    //         $statement->execute([$article->nom_article, $article->prix_commande, $article->prix_magasin, $article->prix_vip]);
    //     }
    // }

    // //updateArticles
    // public function updateArticles(array $articles): void
    // {
    //     $statement = $this->connection->getConnection()->prepare(
    //         "UPDATE article SET nom_article = ?, prix_commande = ?, prix_magasin = ?, prix_vip = ? WHERE id_article = ?"
    //     );
    //     foreach ($articles as $article) {
    //         $statement->execute([$article->nom_article, $article->prix_commande, $article->prix_magasin, $article->prix_vip, $article->id_article]);
    //     }
    // }
}