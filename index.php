<?php

include("adresse.php");
include("adressemanager.php");

$connexiondb =new PDO(
'mysql:host=localhost;dbname=exepdo;charset=utf8', 'root', '');

$adressemanager = new AdresseManager($connexiondb);

$adresse = new adresse();
$adresse->setRue("Rue de la Casquette");
$adresse->setNumero("15");
$adresse->setLocalite("Liege");
$adresse->setCodepostal("4000");
$adresse->setPays("Belgique");


$adressemanager->create($adresse);

/*
 * $adresse->setRue("Rue de la Casquette");
$adresse->setNumero("15");
$adresse->setLocalite("Liege");
$adresse->setCodepostal("4000");
$adresse->setPays("Belgique");
*/
//echo $adresse->getAdresseComplete();