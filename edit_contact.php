<?php
    include "header.php";
    require_once 'data.php';

    // Vérifier que le formulaire a bien été soumis en POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer l'ID du contact et les nouvelles données du formulaire
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Appeler la fonction pour mettre à jour le contact dans la base de données
        updateContact($id, $name, $email, $phone);

        // Rediriger vers la page principale après la modification
        header('Location: index.php');
    }
?>