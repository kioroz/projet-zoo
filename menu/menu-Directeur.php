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
            <a href="index.php" class="nav-link active">
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
                    <a href="animaux/liste.php" class="submenu-link">
                        <span class="submenu-dot"></span>Liste des animaux
                    </a>
                </li>
                <li class="nav-item">
                    <a href="animaux/ajouter.php" class="submenu-link">
                        <span class="submenu-dot"></span>Ajouter un animal
                    </a>
                </li>
                <li class="nav-item">
                    <a href="animaux/recherche.php" class="submenu-link">
                        <span class="submenu-dot"></span>Rechercher un animal
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <div class="nav-link" onclick="toggleSub(this, 'subEspeces')">
                <span class="nav-icon">📋</span>
                <span>Espèces</span>
                <span class="nav-arrow">▶</span>
            </div>
            <ul class="submenu" id="subEspeces">
                <li class="nav-item">
                    <a href="especes/liste.php" class="submenu-link">
                        <span class="submenu-dot"></span>Liste des espèces
                    </a>
                </li>
                <li class="nav-item">
                    <a href="especes/ajouter.php" class="submenu-link">
                        <span class="submenu-dot"></span>Ajouter une espèce
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <div class="nav-link" onclick="toggleSub(this, 'subEnclos')">
                <span class="nav-icon">🏕️</span>
                <span>Enclos</span>
                <span class="nav-arrow">▶</span>
            </div>
            <ul class="submenu" id="subEnclos">
                <li class="nav-item">
                    <a href="enclos/liste.php" class="submenu-link">
                        <span class="submenu-dot"></span>Liste des enclos
                    </a>
                </li>
                <li class="nav-item">
                    <a href="enclos/occupation.php" class="submenu-link">
                        <span class="submenu-dot"></span>Occupation des enclos
                    </a>
                </li>
            </ul>
        </li>

        <li><hr class="nav-divider"/></li>

        <li><div class="nav-section-label">Gestion du personnel</div></li>

        <li class="nav-item">
            <div class="nav-link" onclick="toggleSub(this, 'subEmployes')">
                <span class="nav-icon">👥</span>
                <span>Employés</span>
                <span class="nav-arrow">▶</span>
            </div>
            <ul class="submenu" id="subEmployes">
                <li class="nav-item">
                    <a href="employes/liste.php" class="submenu-link">
                        <span class="submenu-dot"></span>Liste des employés
                    </a>
                </li>
                <li class="nav-item">
                    <a href="employes/ajouter.php" class="submenu-link">
                        <span class="submenu-dot"></span>Ajouter un employé
                    </a>
                </li>
            </ul>
        </li>

        <li><hr class="nav-divider"/></li>

        <!-- ── Mon compte ── -->
        <li><div class="nav-section-label">Mon compte</div></li>
        <li class="nav-item">
            <a href="profil.php" class="nav-link">
                <span class="nav-icon">👤</span>
                <span>Mon profil</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link logout">
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
    /**
     * Ouvre ou ferme un sous-menu.
     * Ferme tous les autres sous-menus ouverts avant d'ouvrir le nouveau.
     * @param {HTMLElement} btn  - Le bouton cliqué
     * @param {string}      id   - L'id du sous-menu cible
     */
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