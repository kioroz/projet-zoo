<?php


session_start();

if($_SESSION["fonction"] != "Employer"){
    header("Location: menu-Directeur.php");

}else{
    header("Location : ../index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu employer</title>
</head>
<body>
    <?php 
    echo "<h1> bienvenue" . $_SESSION["prenom"] ." " . $_SESSION["fonction"]."</h1>";
    ?>
</body>
</html>