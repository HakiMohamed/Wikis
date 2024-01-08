# Système de Gestion de Contenu de Wiki 
Ce projet vise à créer un système de gestion de contenu efficace pour Wiki, associé à un front office convivial, afin de fournir une expérience utilisateur exceptionnelle.

## Présentation du Projet
Wiki nécessite un système robuste permettant aux administrateurs de gérer facilement les catégories, les tags et les wikis. Les auteurs devraient avoir la capacité de créer, modifier et supprimer leur contenu. Le front office priorisera une interface centrée sur l'utilisateur, une inscription simplifiée, une barre de recherche efficace et des affichages dynamiques des derniers wikis et catégories pour une navigation fluide.

L'objectif principal est d'établir un espace collaboratif où les utilisateurs peuvent travailler ensemble, créer, découvrir et partager des wikis de manière engageante et simple.

## Fonctionnalités Principales
### Back Office
Gestion des Catégories : Les administrateurs peuvent créer, modifier et supprimer des catégories pour organiser le contenu. Ils peuvent associer plusieurs wikis à une catégorie.

Gestion des Tags : Créer, modifier et supprimer des tags pour faciliter la recherche précise du contenu. Les tags peuvent être associés aux wikis pour une navigation précise.

Inscription des Auteurs : Les auteurs peuvent s'inscrire sur la plateforme en fournissant des informations de base (nom, e-mail, mot de passe sécurisé).

Gestion des Wikis : Les auteurs peuvent créer, modifier et supprimer leurs wikis. Ils peuvent associer une seule catégorie et plusieurs tags à leurs wikis pour une organisation et une recherche facilitées. Les administrateurs peuvent archiver les wikis inappropriés pour maintenir un environnement sûr.

Page d'Accueil du Tableau de Bord : Accès aux statistiques des entités via le tableau de bord.

### Front Office
Connexion et Inscription : Les utilisateurs peuvent créer des comptes en fournissant les informations nécessaires et se connecter à des comptes existants. Les administrateurs sont redirigés vers le tableau de bord, les autres vers la page d'accueil.

Barre de Recherche : Une barre de recherche sans rafraîchissement de page (utilisant AJAX) pour les wikis, catégories et tags.

Affichage des Derniers Wikis : Accès rapide aux wikis ajoutés récemment sur la plateforme.

Affichage des Dernières Catégories : Découverte rapide des thèmes ajoutés récemment ou mis à jour.

Redirection vers la Page Unique des Wikis : En cliquant sur un wiki, redirection vers une page dédiée avec des détails complets (contenu, catégories associées, tags et informations sur l'auteur).

## Technologies Utilisées
### Technologie Frontend
HTML5, CSS Framework, JavaScript
### Technologie Backend
PHP 8 avec architecture MVC
Base de Données
Driver PDO
