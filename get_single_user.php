<?php

require 'connexion.php';

$id = 1;

$requete = $db->prepare("SELECT id, nom, prenom FROM users WHERE id = :id");

$requete->execute(['id' => $id]);

$utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

var_dump($utilisateur);
?>
