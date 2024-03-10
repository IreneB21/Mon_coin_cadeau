<?php
session_start();
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ .'/databaseConnect.php');

$list = $_POST['list-id'];

if (isset($_POST['item-title']) && isset($_POST['item-link']) && isset($_POST['item-description']) && isset($_POST['item-price']) && isset($_POST['list-id'])) {
    $listID = $_POST['list-id'];
    $title = $_POST['item-title'];
    $link = $_POST['item-link'];
    $price = $_POST['item-price'];
    $informations = $_POST['item-description'];

    $addNewItem = $dbco->prepare('INSERT INTO list_items (item_name, list_id, link, price, informations) VALUES (:title, :list, :link, :price, :informations)');
    $addNewItem->bindParam(':title', $title);
    $addNewItem->bindParam(':list', $listID);
    $addNewItem->bindParam(':link', $link);
    $addNewItem->bindParam(':price', $price);
    $addNewItem->bindParam(':informations', $informations);
    $addNewItem->execute();

    header('Location: espacePersonnel.php');
}
?>

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
        <form action="#" method="POST" id="container-creation-item">
            <h2 id="container-title" >Ajouter un article à votre liste :</h2>
            <div class="item-form-inputs">
                <label for="item-title">Nom de l'article</label>
                <input type="text" id="item-title" name="item-title" placeholder="N'hésitez pas à choisir un titre descriptif">
            </div>
            <div class="item-form-inputs">
                <label for="item-link">Lien de l'article</label>
                <input type="text" id="item-link" name="item-link">
            </div>
            <div class="item-form-inputs">
                <label for="item-description">Informations complémentaires</label>
                <textarea id="item-description" name="item-description" placeholder="Ex : Taille M, couleur beige, cuir véritable..."></textarea>
            </div>
            <div class="item-form-inputs">
                <label for="item-price">Prix indicatif (en euros)</label>
                <input type="text" id="item-price" name="item-price">
            </div>
            <div class="item-form-inputs hidden-input">
                <label for="list-id"></label>
                <input type="text" id="list-id" name="list-id" class="hidden-input" value="<?php echo $list; ?>">
            </div>
            <!--<div class="item-form-inputs">
                <label for="item-illustration">Illustration</label>
                <textarea id="item-illustration" name="item-illustration"></textarea>
            </div> -->
            <button type="submit" class="cta cta-item-creation">Ajouter l'article</button>
        </form>
    </main>
    </div>
</body>

</html>