<?php
    // Inclure les fichiers de header et footer avec la méthode require_once pour assurer que le code est exécuté uniquement une fois
    require_once 'header.php';
    require_once 'footer.php';

    // Inclure les fichiers de données avec la méthode require pour assurer que le code est exécuté à chaque requête
    require 'data.php';

    // Vérifier si la requête est une méthode POST. On appelle la fonction addContact() avec les données du formualaire.
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        addContact($name, $email, $phone);
    }

    // Obtenir tous les contacts de la base de données. (Toutes les fonctions sont définies dans le fichier data.php)
    $contacts = getContacts();
?>

<body>
    <form action="index.php" method="post">
        <div>
            <fieldset>
                <legend>Nom du contact</legend>
                <input type="text" name="name" required>
            </fieldset>

            <fieldset>
                <legend>Adresse email</legend>
                <input type="email" name="email" required>
            </fieldset>

            <fieldset>
                <legend>Numéro de téléphone</legend>
                <input type="tel" name="phone" required>
            </fieldset>
        </div>
        <button type="submit">Enregistrer</button>
    </form>

    <!-- Afficher la liste des contacts en utilisant htmlspecialchars pour sécuriser les données (comme vu en cours) -->
    <h2>Liste des Contacts</h2>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
        </tr>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?php echo htmlspecialchars($contact['Name']); ?></td>
            <td><?php echo htmlspecialchars($contact['Email']); ?></td>
            <td><?php echo htmlspecialchars($contact['Phone']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

<?php 
    // Inclure le footer à la fin de la page
    require_once 'footer.php'; 
?>
