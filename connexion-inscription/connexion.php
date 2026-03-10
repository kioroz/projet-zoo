<?php
require_once '../database.php'; 

session_start();


$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';

if ($login && $password) {
    $stmt = $pdo->prepare("SELECT id, prenom, nom, password, fonction FROM personnel WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['fonction'] = $user['fonction'];
        $_SESSION['prenom'] = $user['prenom'];


        if($_SESSION['fonction'] == "Directeur"){
            header("Location: ../menu/menu-Directeur.php");
            exit;
        }else{
                        header("Location: ../menu/menu-employer.php");
                        exit;

        }
        exit;
    } else {
        echo "Login ou mot de passe incorrect.";
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}


?>