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

    <title>Mon Coin cadeau - Inscription</title>

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
        <?php require_once(__DIR__ . '/hamburgerMenu.php'); ?>
        <div>
            <img src="./images/logo.png" alt="" class="logo">
        </div>
    </header>

    <main>
    <!-- On affiche le formulaire d'inscription -->
        <form action="#" method="POST">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="you@exemple.com">
            </div>
            <div>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username">
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class="cta">M'inscrire</button>
        </form>
        
    <!-- Traitement du formulaire -->
        <div class="submit_form">
        <?php

        $message = '';

        if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour soumettre le formulaire.';
            } else {
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $email = $_POST['email'];

                $sql = "INSERT INTO users (email, username, password) VALUES (:email, :username, :password)";
                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute(['email' => $email, 'username' => $username, 'password' => $password]);

                if ($result) {
                    $message = 'Inscription réussie ! Bienvenue parmi nous !';
                    //header('Location: login.php');
                } else {
                    $message = 'Erreur lors de l\'inscription.';
                }
            }
        }

        // redirectToUrl('index.php');
        ?>

        </div>
    </main>

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
    </div>
</body>