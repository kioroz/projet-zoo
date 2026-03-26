<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_inscription_directeur.css">
    <title>Document</title>
</head>
<body>
    <?php
@include '../database.php';
/*
session_start();
if(!isset($_SESSION['fonction']) || $_SESSION['fonction'] !== 'Directeur') {
    header("Location: ../index.html");
    exit;
}*/
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$date_naissance = $_POST['date_naissance'] ?? '';
$sexe = $_POST['sexe'] ?? '';
$salaire = $_POST['salaire'] ?? '';
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if ($nom && $prenom && $date_naissance && $sexe && $salaire && $login && $password) {
    // Vérifier si le login existe déjà
    $stmt = $pdo->prepare("SELECT id FROM personnel WHERE login = ?");
    $stmt->execute([$login]);
    if ($stmt->fetch()) {
        echo "<p>Ce login est déjà utilisé. Veuillez en choisir un autre.</p>";
        echo "<a href='inscription_Directeur.html'> retourner </a>";
    } else {
        // Insérer le nouvel utilisateur
        $stmt = $pdo->prepare("INSERT INTO personnel (nom, prenom, date_de_naissance, sexe, login, password, fonction, salaire ) VALUES (:nom, :prenom, :date_naissance, :sexe, :login, :pass, :fonction, :salaire)");
        if ($stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':date_naissance' => $date_naissance,
            ':sexe' => $sexe,
            ':login' => $login,
            ':pass' => password_hash($password, PASSWORD_DEFAULT),
            ':fonction' => 'Directeur',
            ':salaire' => $salaire
        ])) {
            echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
            echo "<a href='inscription_Directeur.html'> retourner </a>";
        } else {
            echo "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
            echo "<a href='inscription_Directeur.html'> retourner </a>";
        }
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}

?>
</body>
</html>