<?php

namespace App\Controller\SecurityController;

use Core\Logger;
use App\Model\User;
use Core\CoreController;
use Core\SecurityService;

class SecurityController extends CoreController
{
    /**
     * Enable to authenticate user
     */
    public function login()
    {
        if (!empty($_POST)) {
            $username = !empty(trim($_POST['username'])) ? trim($_POST['username']) : null;
            $password = !empty($_POST['password']) ? $_POST['password'] : null;

            if (is_null($username) || is_null($password)) {
                Logger::error('Connexion refusée : Information(s) manquante(s)');
                $this->assign('error', 'Information(s) manquante(s)');
                $this->render('pages/security/login');
            }

            $user = new User();
            $user = $user->findByUsername($username);

            if (!$user || !password_verify($password, $user->getPassword())) {
                Logger::error('Connexion refusée : Identifiant ou mot de passe incorrect(s)');
                $this->assign('error', 'Identifiant ou mot de passe incorrect(s)');
                $this->render('pages/security/login');
            }

            $data =[
                'user' => $user,
                'role' => $user->getRole()
            ];

            SecurityService::createSession($data);
            Logger::info('Création de la session de connexion pour ' . h($user->getUsername()));

            redirect('dashboard');
        }

        $this->render('pages/security/login');
    }

    /**
     * Enable to sign-up user
     */
    public function logout()
    {
        SecurityService::closeSession();
        Logger::info('Déconnexion');
        redirect('/');
    }
}
