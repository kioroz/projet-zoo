<?php

include "../database.php";
// Récupération des espèces pour la liste déroulante
$req = $pdo->query("SELECT id, nom_espece FROM especes ORDER BY nom_espece");
$especes = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un animal</title>
</head>
<body>

<h2>Ajouter un animal</h2>

<form action="ajouter_animal.php" method="post">

    <label>Espèce :</label>
    <select name="id_espece" required>
        <option value="">-- Choisir --</option>
        <?php foreach ($especes as $e): ?>
            <option value="<?= $e['id'] ?>"><?= $e['nom_espece'] ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>nom :</label>
    <input type="text" name="nom" required>
    <br><br>

    <label>Date de naissance :</label>
    <input type="date" name="date_de_naissance">
    <br><br>

    <label>Sexe :</label>
    <select name="sexe">
        <option value="">-- Non défini --</option>
        <option value="M">M</option>
        <option value="F">F</option>
    </select>
    <br><br>

    <label>Commentaire :</label><br>
    <textarea name="commentaire" rows="4" cols="40"></textarea>
    <br><br>

    <button type="submit">Ajouter</button>

</form>

</body>
</html>