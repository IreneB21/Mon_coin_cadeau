<?php
//require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/functions.php');

/*setcookie(
    'LOGGED_USER',
    'utilisateur@exemple.com',
    [
        'expires' => time() + 365*24*3600,
        'secure' => true,
        'httponly' => true,
    ]
);*/
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon Coin cadeau - Connexion</title>

    <!-- google font and icons links -->

    <script src="https://kit.fontawesome.com/f61418b52c.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- css and preload links -->

    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <nav id="main-nav">   
        <?php require_once(__DIR__ . '/navbar.php'); ?>
    </nav>

    <div id="content-wrap">
    <header>
            <div class="navbar" onclick="ouvrirMenu()">
                <input type="checkbox">
                <span class="barre-une"></span>
                <span class="barre-deux"></span>
            </div>
            <div>
                <img src="./images/logo.png" alt="" class="logo">
            </div>
        </header>

        <main>
        <!-- On affiche le formulaire de connexion pour utilisateur déjà inscrit -->
            <form action="#" method="POST">
                <div>
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" aria-describedby="username-help">
                    <div id="username-help">L'identifiant utilisé lors de la création du compte.</div>
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                </div>
                <button type="submit" class="cta">Me connecter</button>
            </form>
            
        <!-- Traitement du formulaire -->
            <div class="submit_form">
            <?php

            $message = '';

            if (isset($_POST['username']) && isset($_POST['password'])) {
                
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM users WHERE username = :username";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['username' => $username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    //header('Location: dashboard.php');
                } else {
                    $message = 'Les informations envoyées ne permettent pas de vous identifier.';
                }
            }

            redirectToUrl('index.php');
            
            ?>

            </div>
        <!-- Si utilisateur n'a pas de compte on renvoie vers le formulaire d'inscription -->
            <a href="signup.php" class="cta">Pas de compte ? Inscrivez-vous</a>
        </main>

        <footer>
            <?php require_once(__DIR__ . '/footer.php'); ?>
        </footer>
    </div>
</body>