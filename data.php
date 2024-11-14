<?php
    // Inclure le fichier de connexion à la base de données
    require_once 'db.php';

    // Définir une variable pour stocker les données de contacts (le tableau sur la page web)
    $contacts = array();


    // Définir une fonction pour ajouter un contact à la base de données
    function addContact($name, $email, $phone) {
        // Obtenir une connexion à la base de données
        $db = connectDB();
        // Créer une requête SQL pour ajouter un nouveau contact
        $addNewContactSQL = "INSERT INTO contact (Name, Email, Phone) VALUES (:name, :email, :phone)";
        // Exécuter la requête SQL
        $newContact = $db->prepare($addNewContactSQL);
        $newContact->bindParam(':name', $name, PDO::PARAM_STR);
        $newContact->bindParam(':email', $email, PDO::PARAM_STR);
        $newContact->bindParam(':phone', $phone, PDO::PARAM_STR);
        $newContact->execute();
    }


    // Définir une fonction pour modifier un contact à la base de données
    function updateContact($id, $name, $email, $phone){
        $db = connectDB();
        $query = $db->prepare("UPDATE contact SET Name = :name, Email = :email, Phone = :phone WHERE Id_people = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->bindParam(":name", $name, PDO::PARAM_STR);
        $query->bindParam(":email", $email, PDO::PARAM_STR);
        $query->bindParam(":phone", $phone, PDO::PARAM_STR);
        $query->execute();
    }

    // Définir une fonction pour supprimer un contact
    function deleteContact($id) {
        $db = connectDB();
        $query = $db->prepare("DELETE FROM contact WHERE Id_people = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
    }


    // Définir une fonction pour obtenir tous les contacts de la base de données
    function getContacts() {
        $db = connectDB();
        $result = $db->query('SELECT * FROM contact');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    // Définir une fonction pour obtenir tous les contacts de la base de données à partie d'un ID
    function getContactById($id) {
        $db = connectDB();
        $query = $db->prepare("SELECT * FROM contact WHERE Id_people = :id");
        $query->bindParam(":id", $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
?>
