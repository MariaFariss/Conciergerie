<?php

class Paiement
{
    public int $id_paiement;
    public float $montant;
    public string $date_paiement;
    public string $type;
    public int $id_commande;
}