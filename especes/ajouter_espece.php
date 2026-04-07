<?php

include "../database.php";
// Récupération des espèces pour la liste déroulante
$req = $pdo->query("SELECT * FROM types_nourriture");
$espece = $req->fetchAll();

if(!isset($_SESSION)){
    header("Location: ../index.php");
    exit;

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter un animal</title>
    <link rel="stylesheet" href="../animeaux/style.css">
</head>
<body>

<h2>Ajouter un animal</h2>

<form action="ajouter_espece1.php" method="post">

    <label>nourriture de l'espece:</label>
    <select name="id_nourriture" required>
        <option value="">-- Choisir --</option>
        <?php foreach ($espece as $e): ?>
            <option value="<?= $e['id_nourriture'] ?>"><?= $e['type_nourriture'] ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>



    <label for="nom"> nom de l'espesce</label>
    <input type="text" name="nom" placeholder="nom espece"> 

<br><br>
<label for="capacité">durée de vie moyenne</label>
<input type="number" name="duree_vie" id="duree_vie">



    <br><br>

        <label for="eau">l'espece est elle aquatique?</label>
        <input type="radio" name="aquatique" id="oui" value="1"> oui
        <input type="radio" name="aquatique" id="non" value="0"> non

    <br><br>

    
    <br><br>



    <button type="submit">Ajouter</button>
        <a href="../index.php">menu</a>

</form>

</body>
</html>