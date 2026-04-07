<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_inscription_employer.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
include '../database.php';
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date_naissance = $_POST['date_naissance'];
$sexe = $_POST['sexe'];
$salaire = $_POST['salaire'];
$login = $_POST['login'];
$password = $_POST['password'];
$file = $_FILES["image"];
$file_name = $_FILES["image"]["name"];
$file_tmp_name = $_FILES["image"]["tmp_name"];



if ($nom && $prenom && $date_naissance && $sexe && $salaire && $login && $password) {
    // Vérifier si le login existe déjà
    $stmt = $pdo->prepare("SELECT id FROM personnel WHERE login = ?");
    $stmt->execute([$login]);
    if ($stmt->fetch()) {
        echo "<p>Ce login est déjà utilisé. Veuillez en choisir un autre.</p>";
        echo "<a href='inscription_employer.html'> retourner </a>";

    } else {
        // Insérer le nouvel utilisateur
        $stmt = $pdo->prepare("INSERT INTO personnel (nom, prenom, date_de_naissance, sexe, login, password, fonction, salaire, photo ) VALUES (:nom, :prenom, :date_naissance, :sexe, :login, :pass, :fonction, :salaire, :photo)");
        $path = "../images_employe/" . $file_name;
        if(move_uploaded_file($file_tmp_name, $path)) {
        
        if ($stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':date_naissance' => $date_naissance,
            ':sexe' => $sexe,
            ':login' => $login,
            ':pass' => password_hash($password, PASSWORD_DEFAULT),
            ':fonction' => 'Employer',
            ':salaire' => $salaire,
            ':photo' => $file_name
        ])) {
            echo "<p>Inscription réussie ! Vous pouvez maintenant vous connecter.</p>";
                        echo "<a href='inscription_employer.html'> retourner </a>";

        } else {
            echo "<p>Une erreur est survenue lors de l'inscription. Veuillez réessayer.</p>";
            echo "<a href='inscription_Employer.html'> retourner </a>";
        }
    }
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}





?>
</body>
</html>