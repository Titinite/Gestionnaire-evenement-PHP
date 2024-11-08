<?php
session_start();
include 'data.php';

if (!isset($_GET['event_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$event_id = $_GET['event_id'];
$events = getEvents($user_id);

// Recherche de l'événement à modifier
$event = null;
foreach ($events as $ev) {
    if ($ev['event_id'] == $event_id) {
        $event = $ev;
        break;
    }
}

if (!$event) {
    echo "Event not found.";
    exit();
}
?>

<form method="POST" action="events.php">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="event_id" value="<?= $event['event_id']; ?>">
    
    <label>Title: <input type="text" name="title" value="<?= htmlspecialchars($event['title']); ?>" required></label><br>
    <label>Description: <textarea name="description" required><?= htmlspecialchars($event['description']); ?></textarea></label><br>
    <label>Date: <input type="datetime-local" name="event_date" value="<?= htmlspecialchars($event['event_date']); ?>" required></label><br>
    <button type="submit">Update Event</button>
</form>
