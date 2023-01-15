<?php

require_once('src/lib/database.php');
require_once('src/model/commande.php');
require_once('src/model/Membership.php');

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
            "DELETE solde_de_points FROM solde_de_points join client_solde on client_solde.id_solde = solde_de_points.id_solde WHERE id_client = ?"
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


    public function updateClient(int $id_client, string $nom, string $adresse, string $email, string $telephone, string $facebook, string $instagram):bool {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE client SET nom = ?, adresse = ?, email = ?, telephone = ?, facebook = ?, instagram = ? WHERE id_client = ?"
        );
        $res = $statement->execute([$nom, $adresse, $email, $telephone, $facebook, $instagram, $id_client]);
        if($res>0){
            return true;
        }
        return false;
    }

    public function getClientById(int $id_client): Client {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM client WHERE id_client = ?"
        );
        $statement->execute([$id_client]);
        $row = $statement->fetch();
        $client = new Client();
        $client->id_client = $row['id_client'];
        $client->nom = $row['nom'];
        $client->adresse = $row['adresse'];
        $client->email = $row['email'];
        $client->telephone = $row['telephone'];
        $client->facebook = $row['facebook'];
        $client->instagram = $row['instagram'];
        $client->id_membership = $row['id_membership'];
        return $client;
    }

    public function getCommandsClient(int $id_client) : array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM commande WHERE id_client = ?"
        );
        $statement->execute([$id_client]);
        $commandes = [];
        while (($row = $statement->fetch())) {
            $commande = new Commande();
            $commande->id_commande = $row['id_commande'];
            $commande->date_commande = $row['date_commande'];
            $commande->total = $row['total'];
            $commande->date_livraison = $row['date_livraison'];
            $commande->frais_depot = $row['frais_depot'];
            $commande->restant_a_payer = $row['restant_a_payer'];
            $commande->frais_livraison = $row['frais_livraison'];
            $commande->statut = $row['statut'];
            $commande->note = $row['note'];
            $commande->id_client = $row['id_client'];
            $commandes[] = $commande;
        }
        return $commandes;
    }

    // public function getPointsClient(int $id_client) : array
    // {
    //     $statement = $this->connection->getConnection()->prepare(
    //         "SELECT * FROM solde_de_points join client_solde on client_solde.id_solde = solde_de_points.id_solde WHERE id_client = ?"
    //     );
    //     $statement->execute([$id_client]);
    //     $points = [];
    //     while (($row = $statement->fetch())) {
    //         $point = new SoldeDePoints();
    //         $point->id_solde = $row['id_solde'];
    //         $point->nombre_points = $row['nombre_points'];
    //         $point->date_expiration = $row['date_expiration'];
    //         $points[] = $point;
    //     }
    //     return $points;
    // }

    public function getMembershipClient(int $id_client) : array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM membership join client_membership on client_membership.id_membership = membership.id_membership WHERE id_client = 10SELECT * FROM membership join client_membership on client_membership.id_membership = membership.id_membership WHERE id_client = 10SELECT FROM membership join client on client.id_membership = membership.id_membership WHERE id_client = ?"
        );
        $statement->execute([$id_client]);
        $memberships = [];
        $row = $statement->fetch();
        $membership = new Membership();
        $membership->id_membership = $row['id_membership'];
        $membership->nom_membership = $row['nom_membership'];
        $membership->solde_min = $row['solde_min'];
        $membership->solde_max = $row['solde_max']; 
        $memberships[] = $membership;
        return $memberships;
    }
}
?>