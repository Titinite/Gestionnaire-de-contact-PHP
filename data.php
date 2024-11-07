<?php 
    // Définir une variable pour stocker les données de contacts (le tableau sur la page web)
    $contacts = array();
    

    // Définir une fonction pour obtenir une connexion à la base de données
    function getDatabaseConnection() {
        try {
            $base = new PDO('mysql:host=127.0.0.1;dbname=bootcamp', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $base;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }


    // Définir une fonction pour ajouter un contact à la base de données
    function addContact($name, $email, $phone) {

        // Obtenir une connexion à la base de données
        $db = getDatabaseConnection();

        // Créer une requête SQL pour ajouter un nouveau contact
        $addNewContactSQL = "INSERT INTO contact (Name, Email, Phone) VALUES (:name, :email, :phone)";

        // Exécuter la requête SQL
        $newContact = $db->prepare($addNewContactSQL);
        $newContact->bindParam(':name', $name);
        $newContact->bindParam(':email', $email);
        $newContact->bindParam(':phone', $phone);
        $newContact->execute();
    }


    // Définir une fonction pour obtenir tous les contacts de la base de données
    function getContacts() {
        $db = getDatabaseConnection();
        $result = $db->query('SELECT * FROM contact');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
?>
