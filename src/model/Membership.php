<?php

require_once('src/lib/database.php');
class Membership
{
    public int $id_membership;
    public String $nom_membership;
    public float $solde_min;
    public float $solde_max;
}

class MembershipRepository
{
    public DatabaseConnection $connection;
    public function getMembership(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM membership ORDER BY id_membership"
        );
        $memberships = [];
        while (($row = $statement->fetch())) {
            $membership = new Membership();
            $membership->id_membership = $row['id_membership'];
            $membership->nom_membership = $row['nom_membership'];
            $membership->solde_min = $row['solde_min'];
            $membership->solde_max = $row['solde_max'];
            $memberships[] = $membership;
        }
        return $memberships;
    }
}