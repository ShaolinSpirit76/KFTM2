<?php
require '../../model/DataBase.php'; 
require '../../model/User.php';


// On crée un tableau error qui s'auto-incrémentera avec la valeur de l'erreur que nous lui assignerons au cas par cas, si la regex n'est pas franchie. Chaque cellule remplie comptera pour 1.
$error = [];

// On teste les regex si le formulaire est rempli
if (count($_POST) > 0)
 {
    
    $_POST= array_map('strip_tags', $_POST); // Ligne à mettre absolument pour la sécurité : interdit l'injection de script (balises non autorisées)

    if (!preg_match ($regexLogin, $_POST['mailConnect']))
    {
        $error['errorLogin'] = 'Votre login est non conforme.';
    }
    if (!preg_match ($regexPassword, $_POST['passwordConnect']))
    {
        $error['errorPassword'] = 'Votre mot de passe est incorrect.';
    }

}


// Controller pour se connecter
if(isset($_POST['loginButton'])):
    $mailConnect = htmlspecialchars($_POST['mailConnect']);
    $passwordConnect = htmlspecialchars($_POST['passwordConnect']);
    if(!empty($mailConnect)):
        $connectUser = new User();
        $connectUser->userLog = $mailConnect;
        $connectUserResult = $connectUser->connectionUser();

        if (count($connectUserResult) > 0) {


            if (password_verify($_POST['passwordConnect'],$connectUserResult[0]['password'])){
                $_SESSION['id'] = $connectUserResult[0]['id'];
                $_SESSION['userInfos'] = $connectUserResult;
                $_SESSION['connection'] = true;
                $connectionSuccess = true;
              
        } else {
                $mdpFailed = true;
            }

        } else {
                $connectionFailed = true;
        }

       endif;
endif;
// Fin controller pour se connecter






