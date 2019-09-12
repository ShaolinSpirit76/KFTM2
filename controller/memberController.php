<?php
session_start();


// Variable pour le css
$PageCSS = '../assets/CSS/PageCSS/member.css';

$User = new User();
$participation = new Participating();

$displayUsersResult = $User->displayUser();

// Supprimer le profil
if (isset($_POST['adminDeleteRequest'])) {
    $ID = (int)$_POST['adminDeleteRequest'];
    $User->ID = $ID;
    $participation->ID_USERS = $ID;
    $participationNumber = $participation->participationNumber();
    if((int)$participationNumber>0){
        $participation->deleteAllParticipation();
    }
    if($User->adminDeleteUser()){
        $adminDeleteSuccess = true;
        
        }    
}

// Passer en admin
if (isset($_POST['adminRequest'])) {
    $ID = (int)$_POST['adminRequest'];
    $User->ID = $ID;
    if($User->adminPower()){
        $adminRequestPower = true;
        } 
}

// Retirer l'admin
if (isset($_POST['adminFiredRequest'])) {
    $ID = (int)$_POST['adminFiredRequest'];
    $User->ID = $ID;
    if($User->adminFired()){
        $adminFired = true;
        } 
}

