<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon Coin cadeau - Validation inscription</title>

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

    <div class="bulle vingt-huit"></div>
    <div class="bulle vingt-neuf"></div>
    <div class="bulle trente"></div>
    <div class="bulle trente-et-un"></div>
    <div class="bulle trente-deux"></div>

    <div id="content-wrap-session">
    <header>
        <?php require_once(__DIR__ . '/hamburgerMenu.php'); ?>
        <div>
            <img src="./images/logo.png" alt="" class="logo">
        </div>
    </header>

    <main>
        <div class="validation-inscription">
            <h3>Inscription réussie ! Bienvenue parmi nous !</h3>
            <p>Vous pouvez maintenant : <br>
             - créer et modifier vos propres listes ; <br>
             - offrir ou participer à l'achat de l'article d'une liste ; <br>
             - poster des commentaires. <br>
            Il ne vous reste plus qu'à vous <a href="login.php" class="lien-session">connecter</a> pour profiter de toutes ces fonctionnalités.
            </p>
        </div>
    </main>
    </div>
</body>