<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_liste.css">
    <title>afficher animeaux</title>
</head>
<body>
   <?php
include "../database.php";

$sql = "SELECT animaux.*, especes.nom_espece
        FROM animaux
        JOIN especes
            ON animaux.id_espece = especes.id";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();
?>

<h1>Liste des animaux</h1>

<table>
    <tr>
        <th>Nom animal</th>
        <th>Date de naissance</th>
        <th>Commentaire</th>
        <th>Espèce</th>
        <th>Sexe</th>
        <th>photo</th>
    </tr>

    <?php foreach ($row as $rows): ?>
        <tr>
            <td><?= $rows["nom_animal"] ?></td>
            <td><?= $rows["date_de_naissance"] ?></td>
            <td><?= $rows["commentaire"] ?></td>
            <td><?= $rows["nom_espece"] ?></td>
            <td><?= $rows["sexe"] ?></td>
            <td><img src="../images_animaux/<?= $rows["photo"] ?>" alt="<?= $rows["nom_animal"] ?>" width="100"></td>
        </tr>
    <?php endforeach; ?>
</table>
        <a href="../index.php">menu</a>


</body>
</html>