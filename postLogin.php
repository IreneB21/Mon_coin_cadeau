<?php
session_start();
require_once(__DIR__ . '/functions.php');
include('databaseConnect.php');

/*setcookie(
    'LOGGED_USER',
    'utilisateur@exemple.com',
    [
        'expires' => time() + 365*24*3600,
        'secure' => true,
        'httponly' => true,
    ]
);*/

/*
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

$username = valid_donnees($_POST["username"]);
$pswd = valid_donnees($_POST["pswd"]);
$message = '';

if (isset($username) && isset($pswd)) {
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($pswd, $user['pswd'])) {
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        header('Location: dashboard.php');
    } else {
        $message = 'Les informations envoyées ne permettent pas de vous identifier.';
    }
}*/

$message = '';

if (isset($_POST['username']) && isset($_POST['pswd'])) {
    //$username = htmlspecialchars($_POST['username']); 
    //$pswd = htmlspecialchars($_POST['pswd']);

    $sth = $dbco->prepare("SELECT * FROM users WHERE username = :username");
    $sth->bindParam(':username', $_POST['username']);
    $sth->execute();
    $row = $sth->fetch(PDO::FETCH_ASSOC);
    $passeword = $row['pswd'];

    if ($_POST['pswd'] === $passeword) {
        $_SESSION['username'] = $row['username'];
        echo "<script>alert('Bienvenue !');</script>";
        //header('Location: index.php');
    } else {
        $message = 'Les informations envoyées ne permettent pas de vous identifier.';
    }
}
?>