# Gestion d'évènement en PHP

Ce code est une application web permettant de gérer des événements via une interface simple en HTML/CSS et un backend en PHP. L'application facilite la gestion d'événements en ligne en permettant l'ajout, l'édition, la suppression, et la visualisation des événements enregistrés dans une base de données SQL.


## Table des Matières
1. [Fonctionnalités](#fonctionnalités)
2. [Installation](#installation)
3. [Utilisation](#utilisation)
4. [Structure du Projet](#structure-du-projet)
5. [Explication du Code](#explication-du-code)
6. [Technologies](#technologies)
7. [Auteurs](#auteurs)


## Fonctionnalités

- **Ajout d’événement** : Formulaire pour enregistrer un nouvel événement avec des détails spécifiques.
- **Liste des événements** : Affichage dynamique de tous les événements stockés dans la base de données.
- **Modification et Suppression** : Capacité de mettre à jour ou de supprimer des événements existants.


## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/Titinite/GestionEvent_PHP.git
   ```
2. Modifiez `data.php` pour configurer les informations de connexion à la base de données.
3. Lancez un serveur local (par exemple XAMPP ou WAMP) et accédez à `index.php` via votre navigateur.


## Utilisation

- **Page d'Accueil** (`index.php`) : Liste tous les événements et permet l'accès aux fonctions d'ajout, édition et suppression.
- **Ajout d’un Événement** : Remplissez un formulaire pour enregistrer un nouvel événement.
- **Header et Footer** : Éléments récurrents dans l’interface pour une navigation simplifiée.


## Structure du Projet

- **index.php** : Page principale affichant tous les événements et les boutons d'interaction.
- **add_event.php** : Formulaire pour ajouter un événement.
- **edit_event.php** : Permet de modifier un événement existant.
- **delete_event.php** : Supprime un événement sélectionné.
- **data.php** : Fichier de configuration de la base de données et fonctions.
- **style.css** : Feuille de style pour l’apparence de l’interface.


## Explication du Code

### 1. Connexion à la base de données
Connexion avec PDO :
```php
$base = new PDO('mysql:host=127.0.0.1;dbname=event_db', 'root', '');
```

### 2. Ajout d’événement
Insère un nouvel événement en base de données :
```php
$addEvent = "INSERT INTO events (title, date) VALUES (:title, :date)";
```

### 3. Gestion des Événements
Les événements sont affichés via `index.php`, récupérés en utilisant une requête SQL pour un rendu en tableau.


## Technologies

- **PHP** : Gestion des opérations et interactions serveur.
- **SQL** : Stockage des informations d'événements.
- **HTML/CSS** : Interface utilisateur simple et fonctionnelle.


## Auteurs
Développé par Titinite et Kant1_18. Retrouvez le projet complet dans le dépôt [GitHub](https://github.com/Titinite/GestionEvent_PHP).
