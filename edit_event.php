<?php
include 'data.php';

if (!isset($_GET['Id'])) {
    header("Location: index.php");
    exit();
}

$Id = $_GET['Id'];
$events = getEvents();

// Recherche de l'événement à modifier
$event = null;
foreach ($events as $ev) {
    if ($ev['Id'] == $Id) {
        $event = $ev;
        break;
    }
}

if (!$event) {
    echo "Event not found.";
    exit();
}
?>

<form method="POST" action="">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="event_id" value="<?= $event['Id']; ?>">
    
    <label>Title: <input type="text" name="title" value="<?= htmlspecialchars($event['title']); ?>" required></label><br>
    <label>Description: <textarea name="description" required><?= htmlspecialchars($event['event_description']); ?></textarea></label><br>
    <label>Date: <input type="datetime-local" name="event_date" value="<?= htmlspecialchars($event['event_date']); ?>" required></label><br>
    <button type="submit">Update Event</button>
</form>
