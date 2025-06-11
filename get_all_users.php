<?php

// Inclusion du fichier de connexion
require 'connexion.php';

try {
    // Requête pour récupérer tous les utilisateurs
    $requete = $db->query("SELECT * FROM users");

    // Récupération de tous les résultats dans un tableau associatif
    $utilisateurs = $requete->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des résultats
    var_dump($utilisateurs);

} catch (PDOException $e) {
    die("Erreur lors de la requête : " . $e->getMessage());
}
var_dump($db);
?>