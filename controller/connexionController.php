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

    // Contrôle du recaptcha v2
                    // Ma clé privée
$secret = "6Leno7MUAAAAAOeWcoXZSyl3h6ZwQsmTG4YM58_M";
// Paramètre renvoyé par le recaptcha
$response = $_POST['g-recaptcha-response'];
// On récupère l'IP de l'utilisateur
$remoteip = $_SERVER['REMOTE_ADDR'];

$api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
	    . $secret
	    . "&response=" . $response
	    . "&remoteip=" . $remoteip ;

    $decode = json_decode(file_get_contents($api_url), true);


     // Controller pour se connecter

     if(isset($_POST['loginButton'])):


    if ($decode['success'] == true) :

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
                if (isset($_SESSION['userInfos'][0]['teacherRank']) && ($_SESSION['userInfos'][0]['teacherRank']) == 'Sifu'):
                    $connectAdmin = true;
                else:
                    $connectionSuccess = true;
                    endif;
                
            } else {
                $mdpFailed = true;
            }
        } else {
                $connectionFailed = true;
        }
       endif;



       else :
       
        $reCaptchaError = true;  
        
    endif;

endif;

// Fin controller pour se connecter




// Variable pour le css
$PageCSS = '../../assets/CSS/PageCSS/connexion.css';

// Variables dynamiques pour la navbar à partir de templates
$home = '../../index.php';
$schoolDoors = '../pages/schoolDoors.php';
$news = '../pages/news.php';
$kungfu = '../pages/kungfu.php';
$taichi = '../pages/taichi.php';
$sanda = '../pages/sanda.php';
$ourCircle = '../pages/ourCircle.php';
$pictures = '../pages/pictures.php';
$video = '../pages/video.php';
$techniques = '../pages/techniques.php';
$otherSchools = '../pages/otherSchools.php';
$contact = '../form/contact.php';
$shop = '../pages/shop.php';
$connexion = '../form/connexion.php';
$myAccount = '../form/myAccount.php';
$checkCalendar = '../form/checkCalendar.php';
$myExchanges = '../form/myExchanges.php';
$inscriptionPage = '../form/inscriptionForm.php';
$connexionPage = 'connexion.php';
$deconnexionPage = 'deconnexion.php';
$admin = '../../admin/admin.php';

