<?php
require "connexion.php";

$street = trim($_POST["street"] ?? '');
$city = trim($_POST["city"] ?? '');
$zipcode = trim($_POST["zipcode"] ?? '');

if (empty($street) || empty($city) || empty($zipcode)) {
    echo "Tous les champs doivent être remplis.";
    exit;
}

try {
    $query = $db->prepare("
        INSERT INTO address (street, zipcode, city)
        VALUES (:street, :zipcode, :city)
    ");

    $parameters = [
        ":street" => $street,
        ":zipcode" => $zipcode,
        ":city" => $city
    ];

    $query->execute($parameters);

    echo "Adresse ajoutée avec succès.";
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout : " . $e->getMessage();
}
?>