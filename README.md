# 🦁 Zoo Manager

![PHP](https://img.shields.io/badge/PHP-8.x-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange?logo=mysql)
![HTML](https://img.shields.io/badge/HTML-5-red?logo=html5)
![CSS](https://img.shields.io/badge/CSS-3-blue?logo=css3)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6-yellow?logo=javascript)
![Status](https://img.shields.io/badge/Status-En%20cours-green)

---

## 📌 Description

**Zoo Manager** est une application web développée en **PHP/MySQL** permettant de gérer un parc zoologique.

Ce projet a été réalisé dans le cadre de la **Mission 11 (PPE1)**.

👉 Il permet de gérer :
- les animaux 🐾  
- les espèces 🐘  
- les employés 👨‍💼  
- les enclos 🏞️  
- les comptes utilisateurs 🔐  

---

## 🚀 Fonctionnalités

### 🔐 Authentification
- Connexion utilisateur
- Inscription (Directeur / Employé)
- Gestion des sessions

### 🐾 Animaux
- Liste des animaux
- Recherche d’un animal
- Ajout / modification

### 🐘 Espèces
- Affichage des espèces
- Ajout d’une espèce

### 👨‍💼 Employés & Directeurs
- Affichage des employés
- Affichage des directeurs

### 🏞️ Enclos
- Ajout d’enclos
- Gestion des localisations des animaux

### 📂 Autres pages
- Page contact
- Catégories (carnivore, herbivore, omnivore)

---

## 🛠️ Technologies utilisées

- **Front-end**
  - HTML
  - CSS
  - JavaScript

- **Back-end**
  - PHP

- **Base de données**
  - MySQL

---

## 📁 Structure du projet

```
projet-zoo/
│── animeaux/              
│── especes/               
│── enclos/                
│── connexion-inscription/ 
│── directeur/             
│── employer/              
│── menu/                  
│── images_animaux/        
│── images_employe/        
│── index.php              
│── database.php           
```

---

## ⚙️ Installation

1. Cloner le projet :
```bash
git clone https://github.com/ton-repo/zoo-manager.git
```

2. Placer le projet dans :
```
htdocs (XAMPP)
```

3. Créer la base de données dans **phpMyAdmin**

4. Configurer la connexion :
```php
database.php
```

5. Lancer le projet :
```
http://localhost/projet-zoo
```

---

## 🔒 Sécurité

- Gestion des sessions
- Séparation des rôles (Directeur / Employé)
- Formulaires avec traitement PHP

---

## 🎯 Objectifs pédagogiques

- Utiliser PHP avec pdo
- Manipuler une base de données relationnelle
- Créer un site web dynamique
- Structurer un projet web

---

## 👤 Auteur

- Nom : Noha Beauvais
- Formation : BTS SIO
- Année : 2026

---

## 📅 Contexte

Projet réalisé pour la **Mission 11 – Gestion d’un site Web (Zoo)**.

---

## 📄 Licence

Projet pédagogique – non destiné à un usage commercial.
