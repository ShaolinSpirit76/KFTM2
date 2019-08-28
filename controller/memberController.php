<?php
session_start();


// Variable pour le css
$PageCSS = '../assets/CSS/PageCSS/member.css';

$User = new User();

$displayUsersResult = $User->displayUser();

// Supprimer le profil
if (isset($_POST['adminDeleteRequest'])) {
    $passwordConnect = htmlspecialchars($_POST['passwordConnect']);
    if ((isset($_POST['passwordConnect'])) && !password_verify($_POST['passwordConnect'], $_SESSION['userInfos'][0]['password'])):
        $error['errorCheckPassword'] = 'Ceci n\'est pas votre mot de passe actuel.';
        $mdpFailed = true;
    else:
        $adminDeleteSuccess = true;
        $user->adminDeleteUser();
        endif;

}
