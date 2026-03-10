<?php
include '../database.php';
session_start();

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
        echo "Ce login est déjà utilisé. Veuillez en choisir un autre.";
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
            ':fonction' => 'Employer',
            ':salaire' => $salaire
        ])) {
            echo "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        } else {
            echo "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
        }
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}




?>