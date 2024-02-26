<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon Coin cadeau - Dashboard</title>

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
    <div class="dashboard-container">
        <h2>Bienvenue dans votre espace personnel</h2>
        <p>Vous pouvez maintenant accéder à toutes les fonctionnalités réservées à nos utilisateurs inscrits !</p>
        <a href=""><h3>Mettre à jour mes informations</h3></a>
        <a href=""><h3>Créer une liste</h3></a>
    </div>

    </main>

    <footer>
        <?php require_once(__DIR__ . '/footer.php'); ?>
    </footer>
    </div>
</body>