<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un animal dans un enclos</title>
    <link rel="stylesheet" href="style_ajout_loc.css">
</head>
<body>

<h1>Ajouter un animal dans un enclos</h1>

<form action="ajout_loc_animaux.php" method="POST">

    <label for="id_animaux">Animal :</label>
    <select name="id_animaux" id="id_animaux" required>
        <?php
        if(!isset($_SESSION)){
    header("Location: ../index.php");
    exit;

}
        include "../database.php";
        $animaux = $pdo->query("SELECT id, nom_animal FROM animaux");
        foreach ($animaux as $a) {
            echo "<option value='{$a['id']}'>{$a['nom_animal']}</option>";
        }
        ?>
    </select>
    <br><br>

    <label for="id_enclos">Enclos :</label>
    <select name="id_enclos" id="id_enclos" required>
        <?php
        $enclos = $pdo->query("SELECT id, nom_enclos FROM enclos");
        foreach ($enclos as $e) {
            echo "<option value='{$e['id']}'>{$e['nom_enclos']}</option>";
        }
        ?>
    </select>
    <br><br>

    <label for="date_arrivee">Date d'arrivée :</label>
    <input type="date" name="date_arrivee" required>
    <br><br>

    <label for="date_sortie">Date de sortie (optionnel) :</label>
    <input type="date" name="date_sortie">
    <br><br>

    <button type="submit">Ajouter</button>
        <a href="../index.php">menu</a>

</form>

</body>
</html>