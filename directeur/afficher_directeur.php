<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../animeaux/style_liste.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afficher employer</title>
</head>
<body>
    <?php
@include "../database.php";
   session_start();
    if($_SESSION["user_id"] != "Directeur"){
    header("Location: ../index.php");
    exit;

}

echo "Bienvenue, " . htmlspecialchars($_SESSION['nom'] . ' ' . $_SESSION['prenom']) . ' ' . $_SESSION['fonction']." 👋";

    $sql = "SELECT * FROM personnel WHERE fonction = 'Directeur'";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    $row = $stmt->fetchAll();
    echo "<h1>Liste des employer</h1>";
    echo "<table>";
    echo "<th> id</th>";
    echo "<th> nom</th>";
    echo "<th> prenom</th>";
    echo "<th> date de naissance</th>";
    echo "<th> sexe</th>";
    echo "<th> salaire</th>";
    echo "<th> photo</th>";
    foreach($row as $rows){
        echo "<tr>";
        echo "<td>" . $rows["id"]."</td>";
        echo "<td>" . $rows["nom"]."</td>";
        echo "<td>" . $rows["prenom"]."</td>";
        echo "<td>" . $rows["date_de_naissance"]."</td>";
        echo "<td>" . $rows["sexe"]."</td>";
        echo "<td>" . $rows["salaire"]."</td>";
        echo "<td><img src='../images_employe/" . $rows["photo"] . "' alt='" . $rows["nom"] . "' width='100'></td>";


    }

    echo "</table>"

    ?>

        <a href="../index.php">menu</a>

    
</body>
</html>