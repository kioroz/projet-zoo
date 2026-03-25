<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../animeaux/style_liste.css">

    <title>Herbivore</title>
</head>
<body>
   <?php
   include "../database.php";

   $sql = "SELECT * FROM especes WHERE id_nourriture = 2";
   $stmt = $pdo -> prepare($sql);
   $stmt -> execute();
   $row = $stmt -> fetchAll();



?>
<h1>animeaux herbivore</h1>

<table border="1">
    <tr>
        <th>Nom espèce</th>
        <th>Durée de vie moyenne</th>
        <th>Aquatique ? </th>
    </tr>

    <?php foreach ($row as $rows): ?>
        <tr>
            <td><?= $rows["nom_espece"] ?></td>
            <td><?= $rows["duree_vie_moyenne"] ?></td>
            <td><?= $rows["aquatique"] == 1 ? "Oui" : "Non" ?></td>
        </tr>
    <?php endforeach; ?>
</table>


</body>
</html>