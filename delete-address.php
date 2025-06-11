<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

require 'connexion.php';

if (!isset($db) || !is_object($db)) {
    die("Erreur : \$pdo n'est pas défini ou n'est pas un objet.");
}

if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("Erreur : Aucun ID fourni.");
}

$id = intval($_POST['id']);

$sql = "DELETE FROM address WHERE id = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$id]);

if ($stmt->rowCount() > 0) {
    echo "Adresse avec l'ID $id a été supprimée.";
} else {
    echo "Aucune adresse trouvée avec l'ID $id.";
}
?>