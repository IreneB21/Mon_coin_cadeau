<?php
session_start();
require_once(__DIR__ . '/functions.php');
require ('databaseConnect.php');

$retrieveUserLists = $dbco->prepare("SELECT l.title FROM users u, listes l WHERE u.username = l.author");
$retrieveUserLists-> execute();
$listsAuthor = $retrieveUserLists->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon Coin Cadeau - Espace personnel</title>

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

        <main class="page-espace-perso">
            <div class="bulle trente-trois"></div>
            <div class="bulle trente-quatre"></div>
            <div class="bulle trente-cinq"></div>
            <div class="bulle trente-six"></div>
            <div class="bulle trente-sept-satellites" id="sat-un"></div>
            <div class="bulle trente-sept-satellites" id="sat-deux"></div>
            <div class="bulle trente-sept-satellites" id="sat-trois"></div>
            <div class="bulle trente-sept-satellites" id="sat-quatre"></div>
            <div class="bulle trente-sept-satellites" id="sat-cinq"></div>
            <div id="bulle-trente-sept" class="bulle trente-sept"></div>
            <div class="bulle trente-huit"></div>
            <div class="bulle trente-neuf"></div>
            <div class="bulle quarante"></div>

            <section class="presentation-espace-perso">
                <h1>Bienvenue dans votre espace personnel</h1>
                <p>Ici, vous pouvez donner libre cours à vos envies et réaliser celles de vos proches, dire aux autres comment vous faire plaisir ou couvrir de cadeaux vos amis. 
                    Mariage, anniversaire, baptême, pot de départ... Toutes les occasions sont bonnes pour créer une liste d'envies. Vous pourrez en créer jusqu'à dix et les partager avec qui vous voulez !
                </p>
                <div class="scroll" onclick="scroll(0, 600);">
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </section>

            <section class="section-listes">
                <h1>Vos listes</h1>
                <?php if ($listsAuthor !== []) : ?>
                    <?php foreach ($listsAuthor as $list) : ?>
                        <div class="container-list">
                            <img src="" alt="">
                            <h3><?php echo($list); ?></h3>
                            <i class="fa-solid fa-chevron-down"></i>
                            <div class="affichage-items">
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <a class="cta" href="createList.php">Créer une nouvelle liste</a>
                <?php else : ?>
                    <div class="container-no-list">
                        <p>Vous n'avez pas encore de listes. <br>Mais pas de panique, c'est le moment de créer votre première !</p>
                        <a class="cta" href="createList.php">C'est parti</a>
                    </div>   
                <?php endif; ?>
            </section>

            <section class="info-user">
                <h2>Vos informations personnelles</h2>
                <div>
                </div>
            </section>
        </main>

        <footer>
            <?php require_once(__DIR__ . '/footer.php'); ?>
        </footer>
    </div>
</body>

</html>