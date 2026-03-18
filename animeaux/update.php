<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php

include '../database.php';

$id   = $_POST['id'];
$nom  = $_POST['nom'];
$date = $_POST['date'];
$com  = $_POST['com'];

// Requête sécurisée
$requete = "UPDATE animaux 
            SET nom_animal = :nom,
                date_de_naissance = :date,
                commentaire = :com
            WHERE id = :id";

$stmt = $pdo->prepare($requete);

$ok = $stmt->execute([
    ':nom'  => $nom,
    ':date' => $date,
    ':com'  => $com,
    ':id'   => $id
]);

if ($ok) {
    echo "Modification effectuée avec succès";
} else {
    echo "Échec de la modification";
}

?>

</body>
</html>