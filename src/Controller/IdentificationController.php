<?php

namespace App\Controller;

use App\Manager\IdentificationManager;

class IdentificationController extends AbstractController
{
    private IdentificationManager $identificationManager;

    public function __construct()
    {
        parent::__construct();
        $this->identificationManager = new IdentificationManager();
    }

    /**
     * Display login form
     */
    public function login(): string
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = array_map('htmlentities', array_map('trim', $_POST));

            if (empty($userData['email']) || !filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Votre email doit être renseigné et être au format valide.';
            }

            if (empty($userData['user_password']) || !preg_match('/^[A-Za-zÀ-ÿ0-9 \'.,!@#$%^&*()_-]+$/', $userData['user_password'])) {
                $errors[] = 'Votre mot de passe doit être renseigné et contenir des caractères valides.';
            }
            
            if (empty($errors)) {
                $user = $this->identificationManager->getUserByEmail($userData['email']);

                if (is_array($user)) {
                    if ($user && password_verify($userData['password'], $user['password'])) {
                        // Authentification réussie, démarrage d'une session
                        $this->startSession();
                        $this->setSession('user_id', $user['id']);

                        header('Location: /dashboard');
                        exit();
                    } else {
                        $errors[] = 'Mot de passe incorrect, veuillez réessayer';
                    }
                } else {
                    $errors[] = 'Email incorrect, veuillez réessayer';
                }
            }
        }
        return $this->twig->render('login.html.twig', ['errors' => $errors]);
    }

    public function subscribe(): string
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userData = array_map('htmlentities', array_map('trim', $_POST));

            if (empty($userData['email']) || !filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Vous devez renseigner un email au format valide.';
            }

            if (empty($userData['password']) || !preg_match('/^[A-Za-zÀ-ÿ0-9 \'.,!@#$%^&*()_-]+$/', $userData['password'])) {
                $errors[] = 'Vous devez renseigner un mot de passe contenant des caractères valides.';
            }

            if (empty($errors)) {
                // Hashage du mot de passe avant insertion
                $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

                // Insertion des données utilisateur
                $this->userManager->insert($userData);
                header('Location: /login');
                exit;
            }
        }
        return $this->twig->render('signup.html.twig', ['errors' => $errors]);
    }

    public function logout(): void
    {
        $this->destroySession();

        header('Location: /');
        exit();
    }
}
