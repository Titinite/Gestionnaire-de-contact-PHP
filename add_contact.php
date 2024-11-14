<?php
    include "header.php";
    require_once 'data.php';

    // Vérifier que le formulaire a bien été soumis en POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Récupérer les données du formulaire
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Appeler la fonction pour ajouter un contact dans la base de données
        addContact($name, $email, $phone);

        // Rediriger vers la page principale après l'ajout
        header('Location: index.php');
    }
?>