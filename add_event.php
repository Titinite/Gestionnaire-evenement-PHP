<?php
include 'data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $created_date = time();

    // Appel de la fonction pour ajouter l'événement
    addEvent($title, $event_description, $event_date, $created_date);

    // Redirection vers la page d'accueil après l'ajout
    header("Location: index.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<h2>Ajouter un Nouvel Événement</h2>

<form method="POST" action="add_event.php">
    <label>Titre de l'événement : <input type="text" name="title" required></label><br>
    <label>Description : <textarea name="description" required></textarea></label><br>
    <label>Date et Heure : <input type="datetime-local" name="event_date" required></label><br>
    <button type="submit">Ajouter l'Événement</button>
</form>

<?php include 'footer.php'; ?>
