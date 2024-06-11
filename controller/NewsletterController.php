<?php
namespace App\controller;

use App\model\NewsletterModel;
use App\manager\NewsletterManager;

class NewsletterController {

    public function viewAll():array
    {
        $tableSql = new NewsletterManager;
        $table_subscriber = $tableSql->findAll();

        return $table_subscriber;
    }

    public function newSubscriber()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(!empty($_POST['useremail_news'])){

                $newSubscriber = new NewsletterModel;
                $newSubscriber->setUserEmail($_POST['useremail_news']);
                $subEmail = $newSubscriber->getUserEmail();

                $newSQL = new NewsletterManager;
                if ($newSQL->uplaodSubscriber($subEmail)) {
                    $msg_success = "Vos êtes abonné à la Newsletter";
                    return $msg_success;
                } else {
                    $msg_error = "Votre demande n'a pas été exécuté";
                    return $msg_error;
                }
    
            } else {
                $error = "Vous devez remplir ce champ";
                return $error;
            }
        }
    }

    public function deleteSubscriber(string $email) {
        
        $newSubscriber = new NewsletterModel;
        $newSubscriber->setUserEmail($email);
        $subEmail = $newSubscriber->getUserEmail();

        $newSQL = new NewsletterManager;
        $newSQL->delete($subEmail);
    }

}