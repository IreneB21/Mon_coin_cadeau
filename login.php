<?php
session_start();

setcookie(
    'LOGGED_USER',
    'utilisateur@exemple.com',
    [
        'expires' => time() + 365*24*3600,
        'secure' => true,
        'httponly' => true,
    ]
);
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
        <ul>
            <li><a href="./index.php">Accueil</a></li>
            <?php if (isset($loggedUser)) : ?>
                <li><a href="#">Mes listes</a></li>
            <?php else : ?>
                <li><a href="./signup.php">Créer une liste</a></li>
            <? endif ; ?>
            <li><a href="./projects.php">Trouver une liste</a></li>
            <li><a href="./impression.php">Idées cadeaux</a></li>
        </ul>
    </nav>

    <div id="content-wrap">
        <header>
            <?php require_once(__DIR__ . '/header.php'); ?>
        </header>

        <main>
        <!-- On affiche le formulaire de connexion pour utilisateur déjà inscrit -->
            <form action="#" method="POST">
                <div>
                    <label for="name">Email</label>
                    <input type="name" id="name" name="name" aria-describedby="name-help">
                    <div id="name-help" class="form-text">L'identifiant choisi lors de la création du compte.</div>
                </div>
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
                    <div id="email-help" class="form-text">L'email utilisé lors de la création du compte.</div>
                </div>
                <div>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        <!-- Si utilisateur bien connecté on affiche un message de succès -->
            <div class="alert alert-success" role="alert">
                Bonjour <?php echo $_SESSION['LOGGED_USER']['email']; ?> et bienvenue sur le site !
            </div>
        <!-- Traitement du formulaire -->
            <div class="submit_form">
            <?php
            if (isset($postData['email']) &&  isset($postData['password'])) {
                if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
                     $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour soumettre le formulaire.';
                } else {
                     foreach ($users as $user) {
                         if (
                             $user['email'] === $postData['email'] &&
                             $user['password'] === $postData['password']
                         ) {
                             $_SESSION['LOGGED_USER'] = [
                                 'email' => $user['email'],
                                 'user_id' => $user['user_id'],
                             ];
                         }
                     }
                
                     if (!isset($_SESSION['LOGGED_USER'])) {
                         $_SESSION['LOGIN_ERROR_MESSAGE'] = sprintf(
                             'Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                             $postData['email'],
                             strip_tags($postData['password'])
                         );
                     }
                }
                
                function redirectToUrl(string $url): never {
                    header("Location: {$url}");
                    exit();
                }

                redirectToUrl('index.php');
                }
                ?>

            </div>
        <!-- Si utilisateur n'a pas de compte on renvoie vers le formulaire d'inscription -->
            <a href="signup.php" class="cta">Pas de compte ? Inscrivez-vous</a>
        </main>

        <footer>
            <?php require_once(__DIR__ . '/footer.php'); ?>
        </footer>
    </div>
</body>