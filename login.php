<?php
session_start();
require_once(__DIR__ . '/functions.php');
require_once(__DIR__ .'/databaseConnect.php');
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mon Coin cadeau - Connexion</title>

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
            <div class="traitement-formulaire">
            <?php
                if (isset($_POST['username']) && isset($_POST['pswd'])) {
                    $username = htmlspecialchars($_POST['username']); 
                    $pswd = htmlspecialchars($_POST['pswd']);

                    $loginStatement = $dbco->prepare("SELECT username FROM users WHERE username = :username AND pswd = :pswd");
                    $loginStatement->bindParam(':username', $username);
                    $loginStatement->bindParam(':pswd', $pswd);
                    $loginStatement->execute();
                    $fetch = $loginStatement->fetch(PDO::FETCH_ASSOC);

                    if (isset($fetch['username'])) {
                        $user = $fetch['username'];
    
                        $_SESSION['LOGGED_USER'] = [
                            'user_name' => $user,
                        ];
                        header('Location: index.php');
                    } else {
                        echo "<p>Les informations envoyées ne permettent pas de vous identifier.</p>";
                    }
                }
                ?>
            </div>
            <form action="#" method="POST">
                <div>
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" aria-describedby="username-help" required>
                    <p id="username-help">L'identifiant utilisé lors de la création du compte.</p>
                </div>
                <div>
                    <label for="pswd">Mot de passe</label>
                    <input type="password" id="pswd" name="pswd" required>
                </div>
                <button type="submit" class="btn-session">Me connecter</button>
            </form>
            
            <p class="invitation-session">Pas de compte ? <a href="signup.php" class="lien-session">Inscrivez-vous</a></p>
        </main>
    </div>
</body>

</html>