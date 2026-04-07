<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_ajout_loc.css">
    <title>Document</title>
</head>
<body>
   <?php
include "../database.php";

   session_start();
    if(!isset($_SESSION["user_id"])){
    header("Location: ../index.php");
    exit;

}
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id_animaux = $_POST['id_animaux'];
    $id_enclos = $_POST['id_enclos'];
    $date_arrivee = $_POST['date_arrivee'];
    $date_sortie = !empty($_POST['date_sortie']) ? $_POST['date_sortie'] : NULL;

    // Vérifier si l'animal est déjà dans un enclos
    $check = $pdo->prepare("SELECT id FROM loc_animaux WHERE id_animaux = :id AND date_sortie IS NULL");
    $check->execute([':id' => $id_animaux]);

    if ($check->rowCount() > 0) {
        die("<p style='color:red; font-weight:bold;'>Erreur : cet animal est déjà dans un enclos.</p>");
    }

    // Insertion
    $sql = "INSERT INTO loc_animaux (date_arrivee, date_sortie, id_animaux, id_enclos)
            VALUES (:date_arrivee, :date_sortie, :id_animaux, :id_enclos)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':date_arrivee' => $date_arrivee,
            ':date_sortie' => $date_sortie,
            ':id_animaux' => $id_animaux,
            ':id_enclos' => $id_enclos
        ]);

        echo "<p>Animal ajouté dans l'enclos avec succès !</p>";
        echo "<a href='form_ajout_loc_animaux.php'>Ajouter un autre</a>";

    } catch (PDOException $e) {
        echo "Erreur lors de l'ajout : " . $e->getMessage();
    }
}
?>



</body>
</html>