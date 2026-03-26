<?php
require_once "../database.php";
session_start();

/* ── Vérification de la session et du rôle ── */
if (!isset($_SESSION["fonction"])) {
    header("Location: ../index.html");
    exit();
}

if ($_SESSION["fonction"] != "Directeur") {
    header("Location: menu-employer.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Menu Directeur – Zoo de la Palmyre</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="menu.css"/>
</head>
<body>


<nav class="sidebar">

    <div class="sidebar-logo">
        <h1>🦁 Zoo de la Palmyre</h1>
        <span>Gestion du parc</span>
    </div>

    <div class="role-badge">👔 Directeur</div>

    <ul style="list-style:none; padding:0;">

        <li><div class="nav-section-label">Tableau de bord</div></li>
        <li class="nav-item">
            <a href="../index.php" class="nav-link active">
                <span class="nav-icon">🏠</span>
                <span>Accueil</span>
            </a>
        </li>
        <li><hr class="nav-divider"/></li>

        <li><div class="nav-section-label">Gestion des animaux</div></li>

        <li class="nav-item">
            <div class="nav-link" onclick="toggleSub(this, 'subAnimaux')">
                <span class="nav-icon">🐾</span>
                <span>Animaux</span>
                <span class="nav-arrow">▶</span>
            </div>
            <ul class="submenu" id="subAnimaux">
                <li class="nav-item">
                    <a href="../animeaux/liste_animaux.php" class="submenu-link">
                        <span class="submenu-dot"></span>Liste des animaux
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../animeaux/form_ajouter_animal.php" class="submenu-link">
                        <span class="submenu-dot"></span>Ajouter un animal
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../animeaux/recherche_animeaux.html" class="submenu-link">
                        <span class="submenu-dot"></span>Rechercher un animal
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../animeaux/form_modifier_animal.html" class="submenu-link">
                        <span class="submenu-dot"></span> Modifier un animal
                    </a>
                    </li>
                </li>
            </ul>
        </li>





      
        <li><hr class="nav-divider"/></li>


<li><div class="nav-section-label">Gestion des enclos</div></li>

        <li class="nav-item">
            <div class="nav-link" onclick="toggleSub(this, 'subEnclos')">
                <span class="nav-icon">🐾</span>
                <span>enclos</span>
                <span class="nav-arrow">▶</span>
            </div>
            <ul class="submenu" id="subEnclos">
                <li class="nav-item">
                    <a href="../enclos/afficher_enclos.php" class="submenu-link">
                        <span class="submenu-dot"></span>Liste des Enclos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../enclos/ajouter_enclos.php" class="submenu-link">
                        <span class="submenu-dot"></span>Ajouter un enclos
                    </a>
                </li>
                <li class="nav-item">

                </li>
            </ul>
        </li>



        <li><hr class="nav-divider"/></li>

  <li><div class="nav-section-label">Gestion des especes</div></li>

        <li class="nav-item">
            <div class="nav-link" onclick="toggleSub(this, 'subEspeces')">
                <span class="nav-icon">🐾</span>
                <span>Especes</span>
                <span class="nav-arrow">▶</span>
            </div>
            <ul class="submenu" id="subEspeces">
                <li class="nav-item">
                    <a href="../especes/afficher_especes.php" class="submenu-link">
                        <span class="submenu-dot"></span>Liste des Especes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../especes/ajouter_espece.php" class="submenu-link">
                        <span class="submenu-dot"></span>Ajouter une Especes
                    </a>
                </li>

            </ul>
        </li>

        
        <li><hr class="nav-divider"/></li>

      

        <li><div class="nav-section-label">Gestion du personnel</div></li>

        <li class="nav-item">
            <div class="nav-link" onclick="toggleSub(this,'subDirecteurs')">
                <span class="nav-icon">👨‍💼</span>
                <span>Directeurs</span>
                <span class="nav-arrow">▶</span>
            </div>
            <ul class="submenu" id="subDirecteurs">
                <li class="nav-item">
                    <a href="../directeur/afficher_directeur.php" class="submenu-link">
                        <span class="submenu-dot"></span>liste des directeurs 
                    </a>
                </li>
                <li>
                    <a href="../connexion-inscription/inscription_Directeur.html" class="submenu-link">
                        <span class="submenu-dot"> </span>ajouter directeurs
                    </a>
                </li>
            </ul>
            <div class="nav-link" onclick="toggleSub(this, 'subEmployes')">
                <span class="nav-icon">👥</span>
                <span>Employés</span>
                <span class="nav-arrow">▶</span>
            </div>
            <ul class="submenu" id="subEmployes">
                <li class="nav-item">
                    <a href="../employer/afficher_employer.php" class="submenu-link">
                        <span class="submenu-dot"></span>Liste des employés
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../connexion-inscription/inscription_Employer.html" class="submenu-link">
                        <span class="submenu-dot"></span>Ajouter un employé
                    </a>
                </li>
            </ul>
        </li>

        <li><hr class="nav-divider"/></li>


        <li class="nav-item">
            <a href="../deconexxion.php" class="nav-link logout">
                <span class="nav-icon">🚪</span>
                <span>Déconnexion</span>
            </a>
        </li>

    </ul>
</nav>


<main class="main">
    <div class="welcome-card">
        <h2>
            Bienvenue, <?php echo htmlspecialchars($_SESSION["nom"] . " " . $_SESSION["prenom"]); ?> 👋
        </h2>
        <p>Vous êtes connecté en tant que <strong><?php echo htmlspecialchars($_SESSION["fonction"]); ?></strong>.<br/>
           Utilisez le menu latéral pour naviguer dans l'application.</p>
    </div>
</main>


<script>
  
    function toggleSub(btn, id) {
        const sub    = document.getElementById(id);
        const isOpen = sub.classList.contains('open');

        /* Fermer tous les sous-menus ouverts */
        document.querySelectorAll('.submenu.open').forEach(el => el.classList.remove('open'));
        document.querySelectorAll('.nav-link.open').forEach(el => el.classList.remove('open'));

        /* Ouvrir le sous-menu ciblé s'il était fermé */
        if (!isOpen) {
            sub.classList.add('open');
            btn.classList.add('open');
        }
    }
</script>

</body>
</html>