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

    public function addClient( string $nom, string $adresse, string $email, string $telephone, string $facebook, string $instagram):bool {
        #creer un nouveau client
        $statement1 = $this->connection->getConnection()->prepare(
            "INSERT INTO client (nom, adresse, email, telephone, facebook, instagram, id_membership) VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        #initialiser le nombre de point pour chaque clients avec id_solde	nombre_points	date_expiration	
        $statement2 = $this->connection->getConnection()->prepare(
            "INSERT INTO solde_de_points (nombre_points, date_expiration) VALUES (?, ?)"
        );
        #lier le client avec son solde de points
        $statement3 = $this->connection->getConnection()->prepare(
            "INSERT INTO client_solde (id_client, id_solde) VALUES (?, ?)"
        );
        $res1 = $statement1->execute([$nom, $adresse, $email, $telephone, $facebook, $instagram, 1]);
        if($res1>0){
            $idClient = $this->connection->getConnection()->lastInsertId();
            $res2 = $statement2->execute([0, null]);
            if($res2>0){
                $idSolde = $this->connection->getConnection()->lastInsertId();
                $res3 = $statement3->execute(array($idClient, $idSolde));
                if($res3>0){
                    return true;
                }
            }
        }
        return false;
    }

    public function deleteClient(int $id_client):bool {
        $statement1 = $this->connection->getConnection()->prepare(
            "DELETE FROM client WHERE id_client = ?"
        );
        $statement2 = $this->connection->getConnection()->prepare(
            "DELETE FROM solde_de_points join client_solde on client_solde.id_solde = solde_de_points.id_solde WHERE id_client = ?"
        );
        $statement3 = $this->connection->getConnection()->prepare(
            "DELETE FROM client_solde WHERE id_client = ?"
        );
        $res1 = $statement1->execute([$id_client]);
        if($res1>0){
            $res2 = $statement2->execute([$id_client]);
            if($res2>0){
                $res3 = $statement3->execute([$id_client]);
                if($res3>0){
                    return true;
                }
            }
        }
        return false;
    }

}
?>