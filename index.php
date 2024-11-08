<?php
    require_once 'header.php';
    require 'data.php';
?>

<body>
    <form action="" method="post">
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
            <td><button>Modifier</button></td>
            <td><button>Supprimer</button></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

<?php 
    require_once 'footer.php'; 
?>
