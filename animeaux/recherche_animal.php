<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_liste.css">
    <title>Recherche animal</title>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION["user_id"])){
    header("Location: ../index.php");
    exit;

}
    $nom = trim($_POST['nom']);
    
    $sql = "SELECT 
        a.id,
        a.nom_animal,
        a.date_de_naissance,
        a.commentaire,
        a.sexe,
        e.nom_espece
    FROM animaux AS a
    JOIN especes AS e
        ON a.id_espece = e.id
    WHERE a.nom_animal = :nom";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':nom' => $nom]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>Résultats</h1>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nom</th><th>Date de naissance</th><th>Sexe</th><th>Espèce</th></tr>";

    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nom_animal"] . "</td>";
        echo "<td>" . $row["date_de_naissance"] . "</td>";
        echo "<td>" . $row["sexe"] . "</td>";
        echo "<td>" . $row["nom_espece"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
            <a href="../index.php">menu</a>

</body>
</html>