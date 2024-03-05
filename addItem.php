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

    <title>Mon Coin Cadeau - Ajout article</title>

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
        <form action="#" method="POST" class="id-creation-list">
           
        </form>
    </main>
    </div>
</body>

</html>