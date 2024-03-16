<?php
session_start();
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon Coin Cadeau - Accueil</title>

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
            <div class="container-session">
                <?php require_once(__DIR__ . '/ctaSession.php'); ?>
            </div>
        </header>

        <main>
        <section class="landingpage">
            <div class="présentation">
                <h1>Le site pour <br>(se) faire plaisir</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <a href="espacePersonnel.php" class="cta">C'est parti</a>
                <?php else : ?>
                    <a href="login.php" class="cta">C'est parti</a>
                <?php endif ; ?>
            </div>
            <div class="scroll">
                <i class="fa-solid fa-chevron-down" id="scroll-to-explanations"></i>
            </div>
            <div class="box-bulles">
                <div class="bulle un"></div>
                <div class="bulle deux"></div>
                <div class="bulle trois"></div>
                <div class="bulle quatre"></div>
                <div class="bulle cinq"></div>
                <div class="bulle six"></div>
                <div class="bulle sept"></div>
            </div>
        </section>

        <section class="process">
            <div class="explications" id="explanations-part">
                <h1>Pour démarrer, rien de plus facile</h1>
                <p>Expliquer fonctionnement liste, comment en créer une, le but, possibilité de partager... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <?php if (isset($_SESSION['LOGGED_USER'])) : ?>
                    <a href="espacePersonnel.php" class="cta">C'est parti</a>
                <?php else : ?>
                    <a href="login.php" class="cta">C'est parti</a>
                <?php endif ; ?>
            </div>
            <div class="box-bulles">
                <div class="bulle huit"></div>
                <div class="bulle neuf"></div>
                <div class="bulle dix"></div>
                <div class="bulle onze"></div>
                <div class="bulle douze"></div>
                <div class="bulle treize"></div>
                <div class="bulle quatorze"></div>
            </div>
        </section>
        </main>

        <footer>
            <?php require_once(__DIR__ . '/footer.php'); ?>
        </footer>
    </div>
</body>

</html>