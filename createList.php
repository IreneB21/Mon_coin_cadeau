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
        <h1>Ajouter une recette</h1>
        <form action="recipes_post_create.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Titre de la recette</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help">
                <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Description de la recette</label>
                <textarea class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits." id="recipe" name="recipe"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <div class="creation-list">
                        <div class="invitation-creation-first-list">
                            <p class="pre-add-element">Créez votre première liste</p>
                            <i class="fa-regular fa-square-plus" id="add-new-list"></i>
                        </div>
                        <div class="box-creation-list">
                            <div>
                                <label for="list-title" class="form-label">Titre de la liste</label>
                                <input type="text" class="form-control" id="list-title" name="list-title" aria-describedby="list-title-help">
                                <div id="title-help" class="form-text">N'hésitez pas à choisir un titre descriptif</div>
                            </div>
                            <div class="invitation-ajout-items">
                                <p class="pre-add-element">Maintenant, ajoutez des articles !</p>
                                <i class="fa-regular fa-square-plus" id="add-new-list"></i>
                            </div>
                            <div class="box-creation-list-elements">
                                <label for="item-title" class="form-label">Nom de l'article</label>
                                <input type="text" class="form-control" id="item-title" name="item-title">
                                <label for="item-link" class="form-label">Lien vers l'article</label>
                                <input type="text" class="form-control" id="item-link" name="item-link">
                                <button type="submit" class="cta cta-add">Ajouter article</button>
                            </div>
                            <button type="submit" class="cta cta-add">Ajouter</button>
                        </div>   
                    </div>
    </div>

    </main>
    </div>
</body>

</html>