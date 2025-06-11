<?php

require 'connexion.php';

$id = 3;

$requete = $db->prepare("SELECT * FROM users WHERE id = :id");

$requete->execute(['id' => $id]);

$utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

var_dump($utilisateur);

var_dump($db);