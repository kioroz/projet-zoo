<?php

include "../database.php";
// Récupération des espèces pour la liste déroulante
$req = $pdo->query("SELECT id, nom FROM personnel WHERE fonction = 'Employer'");
$employer = $req->fetchAll();

   session_start();
    if(!isset($_SESSION["user_id"])){
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

<form action="ajouter_enclos1.php" method="post">

    <label>Responsable de l'enclos l'enclos:</label>
    <select name="id_responsable" required>
        <option value="">-- Choisir --</option>
        <?php foreach ($employer as $e): ?>
            <option value="<?= $e['id'] ?>"><?= $e['nom'] ?></option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label>id de l'enclos (veuillez respecter les consignes pour les noms de l'enclos par exemple AX04):</label>
    <input type="text" name="id" required>
    <br><br>

    <label for="nom"> nom de l'enclos</label>
    <input type="text" name="nom" placeholder="nom enclos"> 

<br><br>
<label for="capacité"> capacité max</label>
<input type="number" name="capacite" id="capacite">



    <br><br>

        <label for="eau">l'enclos possède t-il de l'eau?</label>
        <input type="radio" name="eau" id="oui" value="1"> oui
        <input type="radio" name="eau" id="non" value="0"> non

    <br><br>

    <label>taille :</label>
<input type="number" name="taille" id="taille">
    
    <br><br>



    <button type="submit">Ajouter</button>
        <a href="../index.php">menu</a>

</form>

</body>
</html>