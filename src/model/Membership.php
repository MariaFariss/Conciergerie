    <?php

require_once('src/lib/database.php');
class Membership
{
    public int $id_membership;
    public String $nom_membership;
    public float $solde_min;
    public float $solde_max;
}
