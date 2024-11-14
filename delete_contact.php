<?php
    include "header.php";
    include 'data.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        var_dump($_POST['Id_people']);
        deleteContact($_POST['Id_people']);
    }

    header('Location: index.php');

    include "footer.php";
?>