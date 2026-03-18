<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter animal</title>
</head>
<body>
    <?php
// Connexion
include "../database.php";
// Récupération des données du formulaire
$id_espece = $_POST['id_espece'];
$nom = $_POST['nom'];
$date_naissance = !empty($_POST['date_de_naissance']) ? $_POST['date_de_naissance'] : NULL;
$sexe = !empty($_POST['sexe']) ? $_POST['sexe'] : NULL;
$commentaire = !empty($_POST['commentaire']) ? $_POST['commentaire'] : NULL;

// Préparation de la requête
$sql = "INSERT INTO animaux (id_espece, date_de_naissance, sexe, nom_animal, commentaire)
        VALUES (:id_espece, :date_naissance, :sexe, :nom, :commentaire)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id_espece' => $id_espece,
    ':date_naissance' => $date_naissance,
    ':sexe' => $sexe,
    ':nom' => $nom,
    ':commentaire' => $commentaire
]);

// Redirection ou message
echo "Animal ajouté avec succès !";
echo "<br><a href='form_ajouter_animal.php'>Ajouter un autre animal</a>";
?>
</body>
</html>