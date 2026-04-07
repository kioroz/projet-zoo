<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

<link rel="stylesheet" href="style_update.css">

</head>
<body>

<?php
if(!isset($_SESSION)){
    header("Location: ../index.php");
    exit;

}
include '../database.php';

$id   = $_POST['id'];
$nom  = $_POST['nom'];
$date = $_POST['date'];
$com  = $_POST['com'];

$requete = "UPDATE animaux 
            SET nom_animal = :nom,
                date_de_naissance = :date,
                commentaire = :com
            WHERE id = :id";

$stmt = $pdo->prepare($requete);

$ok = $stmt->execute([
    ':nom'  => $nom,
    ':date' => $date,
    ':com'  => $com,
    ':id'   => $id
]);
?>

<div class="box">
    <?php if ($ok): ?>
        <span class="emoji">🦁🐾</span>
        <p class="success">Modification effectuée avec succès !</p>
    <?php else: ?>
        <span class="emoji">🐍⚠️</span>
        <p class="error">Échec de la modification</p>
    <?php endif; ?>

    <a href="liste_animaux.php">Retour à la liste</a>
</div>

</body>
</html>