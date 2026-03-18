<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>accueil</title>
</head>
<body>
    <nav>
        <ul>
            <?php
           session_start(); 
        if (!isset($_SESSION["fonction"])){
            echo "<li><a href='connexion-inscription/connexion.html'>connexion</a></li>";
        }
        else if($_SESSION["fonction"] == "Employer"){
            echo "<li> <a href='menu/menu-employer.php'> menu employer</a> </li>";

        }else  if($_SESSION["fonction"] == "Directeur"){
            echo "<li> <a href='menu/menu-Directeur.php'> menu Directeur</a> </li>";
        }

            ?>            
            <li><a href="animaux.html">animaux</a></li>
            <li><a href="categories.html">catégories/Espèces</a></li>
            <li><a href="contact.html">contact</a></li>
        </ul>
    </nav>
    <h1>BIENVENUE AU ZOO DE PALMYRE</h1>
    <div class="presentation">
    <p> Le zoo de Palmyre est un parc zoologique situé en France, dans la commune de Les Mathes,</p>
    <p> en Charente-Maritime. Il a été créé en 1966 par Claude Caillé et est aujourd'hui l'un des zoos les plus populaires de France.</p>
    <p> Le zoo de Palmyre abrite une grande variété d'animaux, notamment des lions, des tigres, des éléphants, des girafes, des singes et de nombreuses espèces d'oiseaux.</p>
    <p> Le parc s'étend sur environ 18 hectares et propose également des spectacles et des animations pour les visiteurs. C'est un lieu idéal pour découvrir la faune et sensibiliser à la conservation des espèces animales.</p>
    </div>

    <h2>INFO</h2>
    <div class="info">
    <p>Le zoo de Palmyre est ouvert tous les jours de l'année, sauf le 25 décembre et le 1er janvier. Les horaires d'ouverture varient en fonction de la saison, mais généralement, le zoo ouvre à 9h30 et ferme à 18h00.</p>
    <p>Le prix d'entrée pour les adultes est d'environ 20 euros, tandis que les enfants de moins de 12 ans bénéficient d'un tarif réduit. Il est également possible d'acheter des billets en ligne à l'avance pour éviter les files d'attente.</p>
    </div>

</body>
</html>