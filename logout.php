<?php

session_start();

// On supprime toutes les variables de session.
$_SESSION = array();

// On détruit le cookie de session pour détruire complètement la session.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// On détruit la session.
session_destroy();

header('Location: login.php');
exit;

?>