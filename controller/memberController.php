<?php
session_start();


// Variable pour le css
$PageCSS = '../assets/CSS/PageCSS/member.css';

$User = new User();

$displayUsersResult = $User->displayUser();

// Supprimer le profil
if (isset($_POST['adminDeleteRequest'])) {
    $ID = (int)$_POST['adminDeleteRequest'];
    $User->ID = $ID;
    if($User->adminDeleteUser()){
        $adminDeleteSuccess = true;
        header('Location: member.php');
    }    
}

