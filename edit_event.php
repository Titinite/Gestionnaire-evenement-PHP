<?php
include "data.php";
include "header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id = $_POST['Id'];
    $title = $_POST['title'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    changeEvent($Id, $title, $event_description, $event_date);

    header('Location: index.php');
}
?>

<body>
    <form action="edit_event.php" method="POST">
        <div class="forms-style">
            <input type="hidden" name="Id" value="<?= $_GET["Id"]; ?>">
            <fieldset>
                <legend>Titre de l'évènement</legend>
                <input type="text" name="title" required value="<?= htmlspecialchars($_GET['title']); ?>">
            </fieldset>

            <fieldset>
                <legend>Description</legend>
                <input type="text" name="event_description" required value="<?= htmlspecialchars($_GET['event_description']); ?>">
            </fieldset>

            <fieldset>
                <legend>Date de l'évènement</legend>
                <input type="date" name="event_date" required value="<?= htmlspecialchars($_GET['event_date']); ?>">
            </fieldset>
            <div class="center">
                <button type="submit" class="button-submit">Enregistrer</button>
            </div>
        </div>
    </form>
</body>
