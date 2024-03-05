<?php
session_start();
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ .'/databaseConnect.php');?>
<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon Coin Cadeau - Création liste</title>

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

    <div class="bulle quinze"></div>
    <div class="bulle seize"></div>
    <div class="bulle dix-sept"></div>
    <div class="bulle dix-huit"></div>
    <div class="bulle dix-neuf"></div>
    <div class="bulle vingt"></div>
    <div class="bulle vingt-et-un"></div>

    <div id="content-wrap-session">
    <header>
        <?php require_once(__DIR__ . '/hamburgerMenu.php'); ?>
        <div>
            <img src="./images/logo.png" alt="" class="logo">
        </div>
    </header>

    <main>
        <form action="#" method="POST" id="container-creation-list">
            <h2>Création d'une nouvelle liste :</h2>
            <p>Vous pourrez ensuite y ajouter tous les articles que vous voulez.</p>
            <div class="list-form-inputs">
                <label for="list-title">Titre de votre liste</label>
                <input type="text" id="list-title" name="list-title" placeholder="N'hésitez pas à choisir un titre descriptif">
            </div>
            <div class="list-form-inputs">
                <label for="list-type">Type de liste</label>
                <select id="list-type" name="list-type">
                    <option value="">Choisissez un type de liste</option>
                    <option value="wishlist">Wishlist</option>
                    <option value="birthday">Liste d'anniversaire</option>
                    <option value="baby">Liste de naissance</option>
                    <option value="wedding">Liste de mariage</option>
                    <option value="xmas">Liste de Noël</option>
                    <option value="baptism">Liste de baptême</option>
                    <option value="housewarming">Liste de crémaillère</option>
                </select>
            </div>
            <div class="list-form-inputs">
                <label for="list-description">Texte d'introduction</label>
                <textarea id="list-description" name="list-description" placeholder="Écrivez quelques mots pour présenter votre liste"></textarea>
            </div>
            <div class="list-form-inputs">
                <p>Paramètres de votre liste</p>
                <div class="toggle-switch">
                    <p>Mode surprise</p>
                    <label class="switch">
                        <input type="checkbox" />
                        <span></span>
                    </label>
                </div>
                <div class="toggle-switch">
                    <p>Participants anonymes</p>
                    <label class="switch">
                        <input type="checkbox" />
                        <span></span>
                    </label>
                </div>
            </div>
            <p>Et voilà, vous pouvez maintenant valider votre liste !</p>
            <button type="submit" class="cta">Je crée ma liste</button>
        </form>
    </main>
    </div>
</body>

</html>