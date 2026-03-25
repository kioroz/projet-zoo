<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
include "../database.php";

// Vérifier que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération des données
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $capacite = $_POST['capacite'];
    $eau = $_POST['eau'];
    $taille = $_POST['taille'];
    $id_responsable = $_POST['id_responsable'];

    // Vérification simple
    if (empty($id) || empty($nom) || empty($capacite) || empty($eau) || empty($taille) || empty($id_responsable)) {
        die("Erreur : tous les champs doivent être remplis.");
    }

    // Requête préparée
    $sql = "INSERT INTO enclos (id, nom_enclos, capacite_max, eau, taille, id_responsable)
            VALUES (:id, :nom, :capacite, :eau, :taille, :id_responsable)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':id' => $id,
            ':nom' => $nom,
            ':capacite' => $capacite,
            ':eau' => $eau,
            ':taille' => $taille,
            ':id_responsable' => $id_responsable
        ]);

        echo "Enclos ajouté avec succès !";

    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout : " . $e->getMessage();
    }
}
?>

</body>
</html>