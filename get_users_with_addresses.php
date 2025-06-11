<?php

require 'connexion.php';

    $requete = $db->query("SELECT * FROM users");

    $utilisateurs = $requete->fetchAll(PDO::FETCH_ASSOC);

    var_dump($utilisateurs);

var_dump($db);
?>