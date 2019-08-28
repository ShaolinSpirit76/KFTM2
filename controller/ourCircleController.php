<?php
session_start();
require '../../model/DataBase.php'; 
require '../../model/User.php';

// Variable pour le css
$PageCSS = '../../assets/CSS/PageCSS/ourCircle.css';

// Variables dynamiques pour la navbar à partir de pages
$home = '../../index.php';
$schoolDoors = 'schoolDoors.php';
$news = 'news.php';
$kungfu = 'kungfu.php';
$taichi = 'taichi.php';
$sanda = 'sanda.php';
$ourCircle = 'ourCircle.php';
$pictures = 'pictures.php';
$video = 'video.php';
$techniques = 'techniques.php';
$otherSchools = 'otherSchools.php';
$contact = '../form/contact.php';
$shop = 'shop.php';
$connexion = '../form/connexion.php';
$myAccount = '../form/myAccount.php';
$checkCalendar = '../form/checkCalendar.php';
$inscriptionPage = '../form/inscriptionForm.php';
$connexionPage = '../templates/connexion.php';
$deconnexionPage = '../templates/deconnexion.php';
$admin = '../../admin/admin.php';

       


$User = new User();

$displayUsersResult = $User->displayUser();

// $rankCheckingResult = $User->rankChecking();


// Variables dynamiques pour la navbar à partir à partir de pages
$AssoInfos = '../mentions/AssoInfos.php';
$legalInfos = '../mentions/legalInfos.php';
$CGU = '../mentions/CGU.php';
$RGPD = '../mentions/RGPD.php';
