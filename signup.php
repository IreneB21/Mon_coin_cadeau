<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon Coin cadeau - Inscription</title>

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

    <div class="bulle vingt-deux"></div>
    <div class="bulle vingt-trois"></div>
    <div class="bulle vingt-quatre"></div>
    <div class="bulle vingt-cinq"></div>
    <div class="bulle vingt-six"></div>
    <div class="bulle vingt-sept"></div>

    <div id="content-wrap-session">
    <header>
        <?php require_once(__DIR__ . '/hamburgerMenu.php'); ?>
        <div>
            <img src="./images/logo.png" alt="" class="logo">
        </div>
    </header>

    <main>
        <form action="postForm.php" method="POST">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="you@exemple.com" pattern="[^@\s]+@[^@\s]+\.[^@\s]+">
            </div>
            <div>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" maxlength="40" required>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" id="pswd" name="pswd" required>
            </div>
            <button type="submit" class="btn-session">M'inscrire</button>
        </form>
        <p class="invitation-session">Déjà inscrit ? <a href="login.php" class="lien-session">Connectez-vous</a></p>
    </main>
    </div>
</body>

</html>