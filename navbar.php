<ul>
    <li><a href="./index.php">Accueil</a></li>
    <?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
        <li><a href="./signup.php"> Créer une liste</a></li>
    <?php else : ?>
        <li><a href="espacePersonnel.php">Espace personnel</a></li>
    <?php endif ; ?>
    <li><a href="./projects.php">Parcourir les listes</a></li>
    <li><a href="./impression.php">Idées cadeaux</a></li>
</ul>