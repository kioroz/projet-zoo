<?php
include "../database.php";

// Vérifier que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Récupération des données
    $id_nourriture = $_POST['id_nourriture'];
    $nom = $_POST['nom'];
    $duree_vie = $_POST['duree_vie'];
    $aquatique = $_POST['aquatique'];

    // Vérification simple
    if (empty($id_nourriture) || empty($nom) || empty($duree_vie) || $aquatique === "") {
        die("Erreur : tous les champs doivent être remplis.");
    }

    // Requête préparée
    $sql = "INSERT INTO especes (nom_espece, duree_vie_moyenne, aquatique, id_nourriture)
            VALUES (:nom, :duree_vie, :aquatique, :id_nourriture)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':nom' => $nom,
            ':duree_vie' => $duree_vie,
            ':aquatique' => $aquatique,
            ':id_nourriture' => $id_nourriture
        ]);

        echo "Espèce ajoutée avec succès !";

    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout : " . $e->getMessage();
    }
}
?>