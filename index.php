<?php
    require_once 'header.php';
    require 'data.php';
?>

<body>
    <form action="" method="post">
        <div>
            <fieldset>
                <legend>Titre de l'évènement</legend>
                <input type="text" name="title" required>
            </fieldset>

            <fieldset>
                <legend>Description</legend>
                <input type="text" name="description" required>
            </fieldset>

            <fieldset>
                <legend>Date de l'évènement</legend>
                <input type="date" name="event_date" required>
            </fieldset>
        </div>
        <button type="submit">Enregistrer</button>
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
            <td><?php echo htmlspecialchars($event['Title']); ?></td>
            <td><?php echo htmlspecialchars($event['Description']); ?></td>
            <td><?php echo htmlspecialchars($event['Event_Date']); ?></td>
            <td><?php echo htmlspecialchars($event['Created_Date']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

<?php 
    require_once 'footer.php'; 
?>