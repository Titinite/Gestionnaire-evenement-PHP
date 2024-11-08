<?php
    require_once 'header.php';
?>

<body>
    <form action="" method="post">
        <div>
            <fieldset>
                <legend>Nom d'utilisateur</legend>
                <input type="text" name="username" required>
            </fieldset>

            <fieldset>
                <legend>Mot de passe</legend>
                <input type="password" name="password" required>
            </fieldset>
        </div>
        <button type="submit">Connexion</button>
    </form>
</body>

<?php 
    require_once 'footer.php'; 
?>