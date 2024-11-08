<?php
    require_once 'header.php';
?>

<body>
    <form action="" method="post">
        <div class="forms-style">
            <fieldset>
                <legend>Nom d'utilisateur</legend>
                <input type="text" name="username" required>
            </fieldset>

            <fieldset>
                <legend>Mot de passe</legend>
                <input type="password" name="password" required>
            </fieldset>

            <div class="center">
                <button type="submit">Connexion</button>
            </div>
        </div>
    </form>
</body>

<?php 
    require_once 'footer.php'; 
?>