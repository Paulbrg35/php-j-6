<?php
require "connexion.php"; // Connexion à la base

// Récupération des données du formulaire
$id = intval($_POST["id"] ?? 0);
$street = trim($_POST["street"] ?? '');
$city = trim($_POST["city"] ?? '');
$zipcode = trim($_POST["zipcode"] ?? '');

if ($id <= 0 || empty($street) || empty($city) || empty($zipcode)) {
    echo "Tous les champs sont obligatoires.";
    exit;
}

try {
    $query = $db->prepare("
        UPDATE address
        SET street = :street,
            city = :city,
            zipcode = :zipcode
        WHERE id = :id
    ");

    $parameters = [
        ':street' => $street,
        ':city' => $city,
        ':zipcode' => $zipcode,
        ':id' => $id
    ];

    $query->execute($parameters);

    if ($query->rowCount() > 0) {
        echo "Adresse mise à jour avec succès.";
    } else {
        echo "Aucune modification effectuée. Vérifie si l'ID existe.";
    }

} catch (PDOException $e) {
    echo "Erreur lors de la modification : " . $e->getMessage();
}
