<?php
    require_once 'header.php';
    require 'data.php';
?>

<body>
    <form action="add_event.php" method="POST">
        <div class="forms-style">
            <fieldset>
                <legend>Titre de l'évènement</legend>
                <input type="text" name="title" required>
            </fieldset>

            <fieldset>
                <legend>Description</legend>
                <input type="text" name="event_description" required>
            </fieldset>

            <fieldset>
                <legend>Date de l'évènement</legend>
                <input type="date" name="event_date" required>
            </fieldset>
            <div class="center">
                <button type="submit">Enregistrer</button>
            </div>
        </div>
    </form>

    <h2>Liste des Evènements</h2>
    <table border="1">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Date de l'évènement</th>
            <th>Date de création</th>
        </tr>
        <?php foreach ($events as $event): ?>
        <tr>
            <td><?php echo htmlspecialchars($event['title']); ?></td>
            <td><?php echo htmlspecialchars($event['event_description']); ?></td>
            <td><?php echo htmlspecialchars($event['event_date']); ?></td>
            <td><?php echo htmlspecialchars($event['created_date']); ?></td>
            <td>
                <form action="edit_event.php" method="GET">
                    <input type="hidden" name="Id" value="<?php echo $event['Id']; ?>">
                    <input type="hidden" name="title" value="<?php echo $event['title']; ?>">
                    <input type="hidden" name="event_description" value="<?php echo $event['event_description']; ?>">
                    <input type="hidden" name="event_date" value="<?php echo $event['created_date']; ?>">
                    <button type="submit">Modifier</button>
                </form>
            </td>
            <td>
                <form action="delete_event.php" method="POST">
                    <input type="hidden" name="Id" value="<?php echo $event['Id']; ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

<?php 
    require_once 'footer.php'; 
?>
