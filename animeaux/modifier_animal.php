<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
 	<link rel="stylesheet" href="style_recherche.css">
</head>
<body>
<?php
 	include "../database.php";
	$d= $_POST['id'];
    $requete = "SELECT * FROM animaux WHERE id = :id";
    $stmt = $pdo->prepare($requete);
    $stmt->execute([':id' => $d]);
    $enreg = $stmt->fetch(); // un seul enregistrement

   session_start();
    if(!isset($_SESSION["user_id"])){
    header("Location: ../index.php");
    exit;

}

?>
 
	<?php
	if (!$enreg) {
	    echo "<p>Aucun animal trouvé avec l'ID : " . htmlspecialchars($d) . "</p>";
	    exit;	
	}
    echo "Voici les informations concernant l'animal : " . $enreg['nom_animal'] .  "<br>";
	echo ' <form action="update.php" method="post">';
echo '<input type="hidden" name="id" value="' . $enreg['id'] . '">';

    echo "<p name='id'> id de l'animal " . $enreg['id'] ."</p>"; 
    echo '<input type="date" name ="date" value="'.$enreg['date_de_naissance'].'">';
    echo '<input type="text" name ="nom" value="'.$enreg['nom_animal'].'">';
    echo '<input type="text" name ="com" value="'.$enreg['commentaire'].'">';





 
	echo '<input type="submit" value="modifier">';
	echo '<br><a href="form_modifier_animal.html">retour</a>';
	echo '</form>'
	?>
 
</body>
</html>
