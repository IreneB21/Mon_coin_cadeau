<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
    <a class="cta-session login" href="login.php">Connexion</a>
    <a class="cta-session signup" href="signup.php">M'inscrire</a>
<?php else : ?>
    <a class="cta-session login" href="logout.php">Déconnexion</a>
<?php endif ; ?>