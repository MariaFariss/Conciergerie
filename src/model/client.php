<?php

require_once('src/lib/database.php');

class Client  
{
    public int $id_client;
    public string $nom;
    public string $adresse;
    public string $email;
    public string $telephone;
    public string $facebook;
    public string $instagram;
    public int $id_membership;
}

class ClientRepository
{
    public DatabaseConnection $connection;

    public function getClients(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM client ORDER BY id_client"
        );
        $clients = [];
        while (($row = $statement->fetch())) {
            $client = new Client();
            $client->id_client = $row['id_client'];
            $client->nom = $row['nom'];
            $client->adresse = $row['adresse'];
            $client->email = $row['email'];
            $client->telephone = $row['telephone'];
            $client->facebook = $row['facebook'];
            $client->instagram = $row['instagram'];
            $client->id_membership = $row['id_membership'];
            $clients[] = $client;
        }
        return $clients;
    }

}
?>