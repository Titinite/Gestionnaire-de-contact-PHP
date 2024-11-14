<?php

    // Se connecter à la base de données avec PDO
    function connectDB() {
        try {
            $base = new PDO('mysql:host=127.0.0.1;dbname=contacts_db', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $base;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

?>