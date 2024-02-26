<?php
session_start();
require_once(__DIR__ . '/functions.php');
require ('databaseConnect.php');
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon Coin Cadeau - Mes listes</title>

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
                <a class="cta-session login" href="login.php">Connexion</a>
                <a class="cta-session signup" href="signup.php">M'inscrire</a>
                <!-- afficher bouton Déconnexion si utilisateur connecté -->
            </div>
        </header>

        <main class="page-creation-liste">
            <div class="bulle trente-trois"></div>
            <div class="bulle trente-quatre"></div>
            <div class="bulle trente-cinq"></div>
            <div class="bulle trente-six"></div>
            <div class="bulle trente-sept-satellites" id="sat-un"></div>
            <div class="bulle trente-sept-satellites" id="sat-deux"></div>
            <div class="bulle trente-sept-satellites" id="sat-trois"></div>
            <div id="bulle-trente-sept" class="bulle trente-sept"></div>
            <div class="bulle trente-huit"></div>
            <div class="bulle trente-neuf"></div>
            <div class="bulle quarante"></div>

            <section class="presentation-creation-liste">
                <h1>Bienvenue dans votre coin listes</h1>
                <p>Ici, vous pouvez donner libre cours à vos envies et réaliser celles de vos proches, dire aux autres comment vous faire plaisir ou couvrir de cadeaux vos amis. 
                    Mariage, anniversaire, baptême, pot de départ... Toutes les occasions sont bonnes pour créer une liste d'envies. Vous pourrez en créer jusqu'à dix et les partager avec qui vous voulez !
                </p>
            </section>

            <section class="section-creation-liste">
                <?php ?>
            </section>
        </main>

        <footer>
            <?php require_once(__DIR__ . '/footer.php'); ?>
        </footer>
    </div>
</body>

</html>