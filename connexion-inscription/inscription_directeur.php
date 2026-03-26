<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_confirmation_dir.css">
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
            echo "<div class='message-box'>";
            echo "<p class='error'>Ce login est déjà utilisé. Veuillez en choisir un autre.</p>";
            echo "<a href='inscription_Directeur.html'>Retourner</a>";
            echo "</div>";
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
                echo "<div class='message-box'>";
                echo "<p class='success'>Inscription réussie ! Vous pouvez maintenant vous connecter.</p>";
                echo "<a href='inscription_Directeur.html'>Retourner</a>";
                echo "</div>";
            } else {
                echo "<div class='message-box'>";
                echo "<p class='error'>Une erreur est survenue lors de l'inscription. Veuillez réessayer.</p>";
                echo "<a href='inscription_Directeur.html'>Retourner</a>";
                echo "</div>";
            }
        }
    } else {
        echo "<p>Veuillez remplir tous les champs du formulaire.</p>";
    }

    ?>
</body>

</html>