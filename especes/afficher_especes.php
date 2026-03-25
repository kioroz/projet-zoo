<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afficher enclos</title>
</head>
<body>
    <?php
    include "../database.php";
 $sql = "SELECT especes.*, types_nourriture.type_nourriture
FROM especes
JOIN types_nourriture
    ON especes.id_nourriture = types_nourriture.id_nourriture;";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll();


    
    ?>
    
<h1>Liste des espèces</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom espèce</th>
        <th>Durée de vie moyenne</th>
        <th>Aquatique ?</th>
        <th>Type de nourriture</th>
    </tr>

    <?php foreach ($row as $rows): ?>
        <tr>
            <td><?= $rows["id"] ?></td>
            <td><?= $rows["nom_espece"] ?></td>
            <td><?= $rows["duree_vie_moyenne"] ?></td>
            <td><?= $rows["aquatique"] == 1 ? "Oui" : "Non" ?></td>
            <td><?= $rows["type_nourriture"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
    




</body>
</html> 