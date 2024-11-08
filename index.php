<?php
include 'data.php';

$events = getEvents();
?>

<?php include 'header.php'; ?>

<h2>My Events</h2>
<a href="add_event.php">Add New Event</a> | <a href="logout.php">Logout</a>

<table border="1">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($events as $event): ?>
    <tr>
        <td><?= htmlspecialchars($event['title']); ?></td>
        <td><?= htmlspecialchars($event['description']); ?></td>
        <td><?= htmlspecialchars($event['event_date']); ?></td>
        <td>
            <a href="edit_event.php?event_id=<?= $event['event_id']; ?>">Edit</a>
            <a href="events.php?action=delete&event_id=<?= $event['event_id']; ?>" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'footer.php'; ?>
