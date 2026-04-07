<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_conf.css">
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
$file = $_FILES["image"];
$file_name = $_FILES["image"]["name"];
$file_tmp_name = $_FILES["image"]["tmp_name"];


// Préparation de la requête
$sql = "INSERT INTO animaux (id_espece, date_de_naissance, sexe, nom_animal, commentaire, photo)
        VALUES (:id_espece, :date_naissance, :sexe, :nom, :commentaire, :photo)";

$stmt = $pdo->prepare($sql);

if(move_uploaded_file($file_tmp_name, "../images_animaux/" . $file_name)) {
   if ($stmt->execute([
    ':id_espece' => $id_espece,
    ':date_naissance' => $date_naissance,
    ':sexe' => $sexe,
    ':nom' => $nom,
    ':commentaire' => $commentaire,
    ':photo' => $file_name
])) {
echo "<div class='message-box'>";
echo "Animal ajouté avec succès !";
echo "<br><br><a href='form_ajouter_animal.php'>Ajouter un autre animal</a>";
echo "</div>";
} else {
    echo "Erreur lors de l'ajout de l'animal.";
}
}


?>
</body>
</html>