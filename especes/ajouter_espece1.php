<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajout_espece.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "../database.php";

   session_start();
    if(!isset($_SESSION["user_id"])){
    header("Location: ../index.php");
    exit;

}

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

            echo "<div class='message-box'>";
            echo "Espèce ajoutée avec succès !";
            echo "<br><br><a href='ajouter_espece.php'>Ajouter une autre espèce</a>";
            echo "</div>";
        } catch (PDOException $e) {
            echo "<div class='message-box'>";
            echo "Erreur lors de l'ajout : " . $e->getMessage();
            echo "<br><br><a href='ajouter_espece.php'>Ajouter une autre espèce</a>";
            echo "</div>";
        }
    }
    ?>

        <a href="../index.php">menu</a>


</body>

</html>