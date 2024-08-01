<?php

namespace App\Controller;

use App\Manager\ListManager;

class DashboardController extends AbstractController
{
    private ListManager $listManager;

    public function __construct()
    {
        parent::__construct();
        $this->listManager = new ListManager();
    }

    /**
     * Display dashboard
     */
    public function index()
    {
        // Vérifier si l'utilisateur est connecté
        $this->startSession();
        if (!$this->getSession('user_id')) {
            header('Location: /login');
            exit();
        }

        return $this->twig->render('dashboard.html.twig', [
            'lists' => $this->listManager->getLists($_SESSION['user_id']),
        ]);
    }
}
