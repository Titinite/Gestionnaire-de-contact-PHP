# Gestionnaire de Contact en PHP

Mon petit projet est une application web permettant de gérer une liste de contacts avec une interface simple, conçue en HTML/CSS et alimentée par un backend en PHP qui interagit avec une base de données SQL.

## Table des Matières
1. [Fonctionnalités](#fonctionnalités)
2. [Installation](#installation)
3. [Utilisation](#utilisation)
4. [Structure du Projet](#structure-du-projet)
5. [Explication du Code](#explication-du-code)
6. [Technologies](#technologies)
7. [Auteurs](#auteurs)


## Fonctionnalités

- **Ajout de Contact** : Ajouter un nouveau contact dans la base de données avec des informations comme le nom, l’email, le téléphone.
- **Liste des Contacts** : Afficher automatiquement la liste de tous les contacts enregistrés avec une mise en page simplifiée.
- **Modification de Contact** : Modifier les informations d'un contact
- **Suppression de Contact** : Supprimer un contact de la base de données
  

## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/Titinite/Gestionnaire-de-contact-PHP.git
   ```
2. Modifiez les informations de connexion à la base de données dans `db.php` pour qu’elles correspondent à votre configuration locale.
3. Lancez un serveur local (par exemple avec XAMPP, WAMP ou MAMP sur Mac) et accédez à `index.php` depuis votre navigateur.


## Utilisation

- **Page d'accueil** (`index.php`) : Affiche la liste des contacts sous forme de tableau.
- **Ajouter un contact** : Formulaire permettant de saisir les informations d’un nouveau contact et de l’enregistrer dans la base de données.
- **Header et footer** : Nom du projet en header et footer copyright (c'est un simple exemple) fixe.


## Structure du Projet

- **db.php** : Fichier de connexion à la base de données
- **index.php** : Page principale affichant tous les contacts avec le formulaire pour en rajouter.
- **data.php** : Fichier avec les différentes fonctions du programme.
- **edit.php** : Page avec le formulaire de modification d'un contact.
- **add_contact.php** : Fichier de récupération des données du formulaire et appel de la fonction pour ajouter un contact
- **edit_contact** : Fichier de récupération des données du tableau pour modifier un contact
- **delete_contact** : Fichier pour appeler la fonction pour supprimer un contact.
- **header.php** : Header du projet
- **footer.php** : Footer du projet
- **style.css** : Fichier avec toutes les propriétés CSS pour la mise en forme et la stylisation de la page.


## Explication du Code

Les parties importantes du projet sont commentées mais voici un aperçu des principales fonctions et parties du code :

### 1. Connexion à la base de données (connectDB)
Dans le fichier db.php, on initialise la connexion à la base de données SQL :
```php
$base = new PDO('mysql:host=127.0.0.1;dbname=contacts_db', 'root', '');
```

### 2. Ajouter un Contact (addContact)
Le formulaire récupère les données utilisateur (nom, email, téléphone) et les insère dans la base de données :
```php
$addNewContactSQL = "INSERT INTO contact (Name, Email, Phone) VALUES (:name, :email, :phone)";
$newContact->bindParam(':name', $name, PDO::PARAM_STR);
$newContact->execute();
```
Le code utilise des requêtes préparées pour éviter les injections SQL (nous en avions discuté rapidement en cours).
De plus, "PDO::PARAM_STR" permet de vérifier que la valeur passée dans le champ du formulaire est un string.

### 3. Modifier un Contact (updateContact)
En cliquant sur le bouton "modifier" dans le tableau, on récupère les données de la ligne et on les insère préalablement dans un formulaire.
```php
$query = $db->prepare("UPDATE contact SET Name = :name, Email = :email, Phone = :phone WHERE Id_people = :id");
$query->bindParam(":id", $id, PDO::PARAM_INT);
$query->execute();
```
Le code utilise des requêtes préparées pour éviter les injections SQL (nous en avions discuté rapidement en cours).
De plus, "PDO::PARAM_INT" permet de vérifier que la valeur passée dans le champ du formulaire est un integer.

### 4. Supprimer un Contact (deleteContact)
En cliquant sur le bouton "supprimer" dans le tableau, on appele le fichier "delete_contact.php" qui récupère les données par l'Id et appele la fonction de suppression "deleteContact".
```php
$query = $db->prepare("DELETE FROM contact WHERE Id_people = :id");
$query->bindParam(":id", $id, PDO::PARAM_INT);
$query->execute();
```

### 5. Récupérer la Liste des Contacts (getContacts ou getContactById)
Les contacts sont récupérés depuis la base de données et affichés dans un tableau. Exemple de requête (géré par la suite dans `index.php`) :
```php
$result = $db->query('SELECT * FROM contact');
return $result->fetchAll(PDO::FETCH_ASSOC);
```
ou
```php
$query = $db->prepare("SELECT * FROM contact WHERE Id_people = :id");
$query->bindParam(":id", $id, PDO::PARAM_INT);
$query->execute();
return $query->fetch(PDO::FETCH_ASSOC);
```


## Technologies

- **PHP** : Gestion de la logique serveur et des interactions avec la base de données.
- **SQL** : Stockage et gestion des informations de contact.
- **HTML/CSS** : Interface utilisateur pour afficher et ajouter les contacts.


## Auteurs
Développé par Titinite en période de cours. Retrouvez plus de détails dans le dépôt [GitHub](https://github.com/Titinite/Gestionnaire-de-contact-PHP).
