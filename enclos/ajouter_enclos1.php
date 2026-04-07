<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_ajout_enclos.css">
    <title>Document</title>
</head>

<body>

    <?php
    include "../database.php";
if(!isset($_SESSION)){
    header("Location: ../index.php");
    exit;

}

    // Vérifier que le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Récupération des données
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $capacite = $_POST['capacite'];
        $eau = $_POST['eau'];
        $taille = $_POST['taille'];
        $id_responsable = $_POST['id_responsable'];

        // Vérification 
        if (empty($id) || empty($nom) || empty($capacite) || !isset($eau) || empty($taille) || empty($id_responsable)) {
            die("<p>Erreur : tous les champs doivent être remplis.</p>");
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

            echo "<div class='message-box'>";
            echo "Enclos ajouté avec succès !";
            echo "<br><br><a href='ajouter_enclos.php'>Ajouter un autre enclos</a>";
            echo "</div>";
        } catch (PDOException $e) {
            echo "<p>Erreur lors de l'ajout : </p>" . $e->getMessage();
        }
    }
    ?>

</body>

</html>