<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../animeaux/style_liste.css">

    <title>afficher enclos</title>
</head>

<body>
    <?php
    if(!isset($_SESSION)){
    header("Location: ../index.php");
    exit;

}
    include "../database.php";
    $sql = "SELECT * FROM enclos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchAll();



    ?>

    <h1>liste des enclos</h1>
    <table>
        <th>id</th>
        <th>nom enclos</th>
        <th>capacité max</th>
        <th>eau</th>
        <th>taille en m2</th>
        <th>responsable</th>
        <?php
        foreach ($row as $rows) {
            echo "<tr>";
            echo "<td>" . $rows["id"] . "</td>";
            echo "<td>" . $rows["nom_enclos"] . "</td>";
            echo "<td>" . $rows["capacite_max"] . "</td>";
            echo "<td>" . $rows["eau"] . "</td>";
            echo "<td>" . $rows["taille"] . "</td>";
            echo "<td>" . $rows["id_responsable"] . "</td>";
        }


        ?>






    </table>

    <a href="../index.php">menu</a>


</body>

</html>