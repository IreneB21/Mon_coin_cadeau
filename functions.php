<?php

function isConnected(): bool {
    return !empty($_SESSION['logged']);
}

function redirectToUrl(string $url): never {
    header("Location: {$url}");
    exit();
}

?>