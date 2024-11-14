<?php
    include "data.php";
    include "header.php";

    // Charger les données du contact à partir de l'ID
    $id = $_GET['Id_people'];
    $contact = getContactById($id);
?>

<body>
    <!-- Formulaire pour modifier le contact -->
    <form action="edit_contact.php" method="POST" class="form-contact">
        <div>
            <!-- Champ caché pour l'ID du contact -->
            <input type="hidden" name="id" value="<?= htmlspecialchars($contact['Id_people']); ?>">

            <fieldset>
                <legend>Nom du contact</legend>
                <input type="text" name="name" required value="<?= htmlspecialchars($contact['Name']); ?>">
            </fieldset>

            <fieldset>
                <legend>Email du contact</legend>
                <input type="email" name="email" required value="<?= htmlspecialchars($contact['Email']); ?>">
            </fieldset>

            <fieldset>
                <legend>Téléphone du contact</legend>
                <input type="tel" name="phone" required value="<?= htmlspecialchars($contact['Phone']); ?>">
            </fieldset>

            <div>
                <button type="submit">Modifier</button>
            </div>
        </div>
    </form>
</body>

<?php
    include "footer.php";
?>
