<?php
namespace App\controller;

use App\model\User;
use App\manager\UserManager;

class UserController extends AbstractController {

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(!empty($_POST['email']) && !empty($_POST['password'])){

                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = new User;
                $user->setEmail($email);
                $user->setPassword($password);

                $email = $user->getEmail();
                $password = $user->getPassword();

                $userManager = new UserManager;
                
                if($userManager->findUser($email, $password)){
                    $this->redirect('/dashboard');
                    exit();
                } else {
                    $error = "Nom d'utilisateur ou mot de passe invalide";
                    $this->render('login', [
                        'title' => 'Page | Connexion',
                        'first_title' => 'connexion',
                        'title_default' => 'Page | Chocolaterie',
                        'name' => 'login',
                        'error' => $error
                    ]);
                }
            } else {
                $msg_error = "*champs obligatoire";
                $this->render('login', [
                    'title' => 'Page | Connexion',
                    'first_title' => 'connexion',
                    'title_default' => 'Page | Chocolaterie',
                    'name' => 'login',
                    'msg_error' => $msg_error
                ]);
            }
        }
    }
}