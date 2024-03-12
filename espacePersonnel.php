<?php
session_start();
require_once(__DIR__ . '/functions.php');
require ('databaseConnect.php');

$retrieveUserLists = $dbco->prepare("SELECT title, description, liste_id 
                                    FROM listes
                                    WHERE author = '" . $_SESSION['LOGGED_USER']['user_name'] . "'");
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
                            <h3><?php echo($list['title']); ?></h3>
                            <p class="text-description-list"><?php echo($list['description']); ?></p>
                            <div id="container-display-items">
                                <input type="checkbox" id="controlDisplayItems" checked>
                                <i class="fa-solid fa-chevron-down see-more" id="see-more"></i>
                                <i class="fa-solid fa-chevron-up see-less" id="see-less"></i>
                            </div>
                            <div id="display-items">
                                <div class="box-item add-item">
                                    <i class="fa-solid fa-plus add-item-icon"></i>
                                    <form action="addItem.php" method="POST" class="add-new-item-form">
                                        <label for="list-id"></label>
                                        <input type="text" id="list-id" name="list-id" value="<?php echo($list['liste_id']); ?>">
                                        <a href="addItem.php"><button type="submit" class="add-new-item-btn"></button>
                                    </form></a>
                                </div>
                                <?php 
                                $retrieveItems = $dbco->prepare("SELECT item_name, link, price, informations, img_link  
                                                                FROM list_items
                                                                WHERE list_id = '" . $list['liste_id'] . "'");
                                $retrieveItems-> execute();
                                $listItems = $retrieveItems->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <?php foreach ($listItems as $item) : ?>
                                    <div class="box-item">
                                        <div class="item-illustration">
                                            <img src="<?php echo($item['img_link']); ?>" alt="">
                                            <i class="fa-regular fa-heart sat-icon" id="add-to-favorites-icon"></i>
                                            <i class="fa-solid fa-gift sat-icon" id="pay-that-item"></i>
                                            <i class="fa-solid fa-trash-can sat-icon" id="add-to-trash-icon"></i>
                                        </div>
                                        <div class="item-all-informations">
                                            <p class="item-elements item-name"><?php echo($item['item_name']); ?></p>
                                            <p class="item-elements item-price"><?php echo($item['price']); ?> euros</p>
                                            <p class="item-elements item-info"><?php echo($item['informations']); ?></p>
                                            <p class="item-elements item-link"><a href=""><?php echo($item['link']); ?></a></p>
                                        </div>
                                    </div>
                                <?php endforeach ; ?>
                            </div>
                        </div>
                    <?php endforeach ; ?>
                    <a class="cta" href="createList.php">Créer une nouvelle liste</a>
                <?php else : ?>
                    <div class="container-no-list">
                        <p>Vous n'avez pas encore de listes. <br>Mais pas de panique, c'est le moment de créer votre première !</p>
                        <a class="cta" href="createList.php">C'est parti</a>
                    </div>   
                <?php endif; ?>
                <div class="scroll" onclick="scroll(0, 600);">
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </section>

            <div class="bulle trente-neuf"></div>
            <div class="bulle quarante"></div>
            <div class="bulle quarante-huit"></div>
            <div class="bulle quarante-neuf"></div>
            <div class="bulle cinquante"></div>
            <div class="bulle cinquante-et-un"></div>
            <div class="bulle cinquante-deux"></div>

            <section class="info-user">
                <h2>Vos informations personnelles</h2>
                <div class="info-summary">
                    <p>Identifiant : <?php echo $_SESSION['LOGGED_USER']['user_name']; ?></p>
                    <p>Email : <?php echo $_SESSION['LOGGED_USER']['user_email']; ?></p>
                </div>
                <a class="cta" href="#">Modifier</a>
            </section>
        </main>

        <footer>
            <?php require_once(__DIR__ . '/footer.php'); ?>
        </footer>
    </div>
</body>

</html>