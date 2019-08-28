<?php
//il faut tjrs appeler la base de donnée dans le controller
require '../../model/DataBase.php'; 
require '../../model/User.php';


// On crée un tableau error qui s'auto-incrémentera avec la valeur de l'erreur que nous lui assignerons au cas par cas, si la regex n'est pas franchie. Chaque cellule remplie comptera pour 1.
$error = [];
$user = new User();

// On teste les regex si le formulaire est rempli
if (count($_POST) > 0):


  
    // Déclaration de variables qui prennent les valeurs des $_POST respectives
    $ID = $_SESSION['userInfos'][0]['ID'];
    $newLastName = $_POST['newLastName'];
    $newFirstName = $_POST['newFirstName'];
    $newBirthDate = $_POST['newBirthDate'];
    if(isset($_FILES['newPicture']) && !empty($_FILES['newPicture']['name'])){
        $newPicture = $_FILES['newPicture']['name'];
    }else if(isset($_FILES['firstPicture']) && !empty($_FILES['firstPicture']['name'])){
        $newPicture = $_FILES['firstPicture']['name'];
    }else{
        $newPicture = $_SESSION['userInfos'][0]['picture'];
    }
    $newMail = $_POST['newMail'];
    $newPhoneNumber = $_POST['newPhoneNumber'];
    $newUserLog = $_POST['newUserLog'];
    $newPassword = $_POST['newPassword'];
    $newStatus = $_POST['newStatus'];
    $newStudentCourse = $_POST['newStudentCourse'];
    $newTeacherCourse = $_POST['newTeacherCourse'];
    $newGroupAge = $_POST['newGroupAge'];
    $newStudentYear = $_POST['newStudentYear'];
    $newChildBelt = $_POST['newChildBelt'];
    $newStudentBelt = $_POST['newStudentBelt'];
    $newTeacherRank = $_POST['newTeacherRank'];
    $newPresentation = $_POST['newPresentation'];
    $newShowProfil = $_POST['newShowProfil'];

    $lastName = $_SESSION['userInfos'][0]['lastName'];
    $firstName = $_SESSION['userInfos'][0]['firstName'];
    $birthDate = $_SESSION['userInfos'][0]['birthDate'];
    $picture = $_SESSION['userInfos'][0]['picture'];
    $mail = $_SESSION['userInfos'][0]['mail'];
    $phoneNumber = $_SESSION['userInfos'][0]['phoneNumber'];
    $userLog = $_SESSION['userInfos'][0]['userLog'];
    $password = $_SESSION['userInfos'][0]['password'];
    $status = $_SESSION['userInfos'][0]['status'];
    $studentCourse = $_SESSION['userInfos'][0]['studentCourse'];
    $teacherCourse = $_SESSION['userInfos'][0]['teacherCourse'];
    $groupAge = $_SESSION['userInfos'][0]['groupAge'];
    $studentYear = $_SESSION['userInfos'][0]['studentYear'];
    $childBelt = $_SESSION['userInfos'][0]['childBelt'];
    $studentBelt = $_SESSION['userInfos'][0]['studentBelt'];
    $teacherRank = $_SESSION['userInfos'][0]['teacherRank'];
    $presentation = $_SESSION['userInfos'][0]['presentation'];
    $showProfil = $_SESSION['userInfos'][0]['showProfil'];
    


    
    $_POST = array_map('strip_tags', $_POST); // Ligne à mettre absolument pour la sécurité : interdit l'injection de script (balises non autorisées)

    if (isset($_POST['newLastName'])):
        if ( !preg_match ($regexName, $_POST['newLastName'] ) ):
        $error['errorLastName'] = 'Votre nom de famille est incorrect.';
        elseif (empty($_POST['newLastName'])):
            $user->lastName = $_SESSION['userInfos'][0]['lastName'];
        elseif (preg_match ($regexName, $_POST['newLastName'] )):
//objet qui contient les attributs et les méthodes de la class User
            $user->lastName = $newLastName;
    endif;
else:
    $user->lastName = $_SESSION['userInfos'][0]['lastName'];
endif;

    if (isset($_POST['newFirstName'])):
        if ( !preg_match ($regexName, $_POST['newFirstName'] ) ):
        $error['errorFirstName'] = 'Votre prénom est incorrect.';
        elseif (empty($_POST['newFirstName'])):
            $user->firstName = $_SESSION['userInfos'][0]['firstName'];
        elseif (preg_match ($regexName, $_POST['newFirstName'] )):
            $user->firstName = $newFirstName;
     endif;
    else:
        $user->firstName = $_SESSION['userInfos'][0]['firstName'];
endif;

if (isset($_POST['newBirthDate'])):
     if ( !preg_match ($regexDate, date('d/m/Y',strtotime($_POST['newBirthDate']) ) )):
        $error['errorBirthDate'] = 'Votre date de naissance est incorrecte.';
        elseif (empty($_POST['newBirthDate'])):
            $user->birthDate = $_SESSION['userInfos'][0]['birthDate'];
        elseif (preg_match ($regexDate, date('d/m/Y',strtotime($_POST['newBirthDate']) ))):
            $user->birthDate = $newBirthDate;
    endif; 
else:
    $user->birthDate = $_SESSION['userInfos'][0]['birthDate'];
endif;

if (isset($newPicture)):
        $user->picture = $newPicture;
else:
    $user->picture = $_SESSION['userInfos'][0]['picture'];
endif;


    if (isset($_POST['newMail'])):
        if ( !preg_match ($regexMail, $_POST['newMail'] ) ):
        $error['errorMail'] = 'Votre adresse mail est incorrecte.';
        elseif (empty($_POST['newMail'])):
            $user->mail = $_SESSION['userInfos'][0]['mail'];
        elseif (preg_match ($regexMail, $_POST['newMail'] )):
            $user->mail = $newMail;
    endif;
else: 
    $user->mail = $_SESSION['userInfos'][0]['mail'];
endif;

if (isset($_POST['newPhoneNumber'])):
    if ( !preg_match ($regexPhone, $_POST['newPhoneNumber'] ) ):
        $error['errorPhone'] = 'Votre numéro de téléphone est incorrect.';
        elseif (empty($_POST['newPhoneNumber'])):
            $user->phoneNumber = $_SESSION['userInfos'][0]['phoneNumber'];
        elseif(preg_match ($regexPhone, $_POST['newPhoneNumber'])):
            $user->phoneNumber = $newPhoneNumber;
        endif;
elseif (empty($phoneNumber)):
    $user->phoneNumber = $_SESSION['userInfos'][0]['phoneNumber'];
    endif; 


if (isset($_POST['newUserLog'])):
    if ( !preg_match ($regexLogin, $_POST['newUserLog'] ) ):
        $error['errorLogin'] = 'Votre login est non conforme.';
        elseif (empty($_POST['newUserLog'])):
            $user->userLog = $_SESSION['userInfos'][0]['userLog'];
        elseif(preg_match ($regexLogin, $_POST['newUserLog'])):
            $user->userLog = $newUserLog;
    endif;
else:
    $user->userLog = $_SESSION['userInfos'][0]['userLog'];
 endif; 



if (isset($_POST['newPassword'])):
    if ( !preg_match ($regexPassword, $_POST['newPassword'] ) ):
        $error['errorPassword'] = 'Votre mot de passe est incorrect.';
        elseif (empty($_POST['newPassword'])):
            $user->password = $_SESSION['userInfos'][0]['password'];
        elseif(preg_match ($regexPassword, $_POST['newPassword'])):
            $user->password = password_hash($newPassword, PASSWORD_BCRYPT);
    endif;
else:
    $user->password = $_SESSION['userInfos'][0]['password'];
 endif; 


 if (isset($_POST['newConfirmPassword'])):
    if ( !preg_match ($regexPassword, $_POST['newConfirmPassword'] ) ):
        $error['errorConfirmPassword'] = 'La confirmation de votre mot de passe est incorrecte.';
    endif;
endif;

    
if (isset($_POST['newStatus'])):
    if (empty($_POST['newStatus'])):
        $user->status = $_SESSION['userInfos'][0]['status'];
    else:
        $user->status = $newStatus;
    endif;
else: 
    $user->status = $_SESSION['userInfos'][0]['status'];   
endif;


if (isset($_POST['newStudentCourse'])):
    if (empty($_POST['newStudentCourse'])):
        $user->studentCourse = $_SESSION['userInfos'][0]['studentCourse'];
    else: 
        $user->studentCourse = $newStudentCourse;
    endif;
else: 
    $user->studentCourse = $_SESSION['userInfos'][0]['studentCourse'];   
endif;


if (isset($_POST['newTeacherCourse'])):
    if (empty($_POST['newTeacherCourse'])):
        $user->teacherCourse = $_SESSION['userInfos'][0]['teacherCourse'];
    else: 
        $user->teacherCourse = $newTeacherCourse;
    endif;
else: 
    $user->teacherCourse = $_SESSION['userInfos'][0]['teacherCourse'];   
endif;


if (isset($_POST['newGroupAge'])):
    if (empty($_POST['newGroupAge'])):
        $user->groupAge = $_SESSION['userInfos'][0]['groupAge'];
    else: 
        $user->groupAge = $newGroupAge;
    endif;
else: 
    $user->groupAge = $_SESSION['userInfos'][0]['groupAge'];   
endif;


if (isset($_POST['newStudentYear'])):
    if (empty($_POST['newStudentYear'])):
        $user->studentYear = $_SESSION['userInfos'][0]['studentYear'];
    else: 
        $user->studentYear = $newStudentYear;
    endif;
else: 
    $user->studentYear = $_SESSION['userInfos'][0]['studentYear'];   
endif;


if (isset($_POST['newChildBelt'])):
    if (empty($_POST['newChildBelt'])):
        $user->childBelt = $_SESSION['userInfos'][0]['childBelt'];
    else: 
        $user->childBelt = $newChildBelt;
    endif;
else: 
    $user->childBelt = $_SESSION['userInfos'][0]['childBelt'];   
endif;

 
if (isset($_POST['newStudentBelt'])):
    if (empty($_POST['newStudentBelt'])):
        $user->studentBelt = $_SESSION['userInfos'][0]['studentBelt'];
    else: 
        $user->studentBelt = $newStudentBelt;
    endif;
else: 
    $user->studentBelt = $_SESSION['userInfos'][0]['studentBelt'];   
endif;

  
if (isset($_POST['newTeacherRank'])):
    if (empty($_POST['newTeacherRank'])):
        $user->teacherRank = $_SESSION['userInfos'][0]['teacherRank'];
    else: 
        $user->teacherRank = $newTeacherRank;
    endif;
else: 
    $user->teacherRank = $_SESSION['userInfos'][0]['teacherRank'];   
endif;


if (isset($_POST['newPresentation'])):
    if (empty($_POST['newPresentation'])):
       $user->presentation = $presentation;
    else: 
        $user->presentation = $newPresentation;
    endif;
else: 
    $user->presentation = $presentation;   
endif;

    if ($_POST['newShowProfil'] == 'on'):
       $user->showProfil = 1;
    else: 
        $user->showProfil = 0;
    endif;

$user->ID = $_SESSION['userInfos'][0]['ID'];

    // $user->verification = $verification;
 
    // modal error s'il y a une erreur
    if(!empty($error)):
        $swalErrorForm = true;
        endif; 
   
endif;




// Modification des données sensibles
if(isset($_POST['verificationButton'])):
    $passwordConnect = htmlspecialchars($_POST['passwordConnect']);
    if ((isset($_POST['passwordConnect'])) && !password_verify($_POST['passwordConnect'], $_SESSION['userInfos'][0]['password'])):
        $error['errorCheckPassword'] = 'Ceci n\'est pas votre mot de passe actuel.';
        $mdpFailed = true; 
    else:
        $identificationSuccess = true;
        endif;
endif;






// Filtre des doublons

if (isset($_POST['modifRequest'])) { // test bouton d'enregistrement / update

// on check le doublon du mail on prenant compte du mail de session
    $mail = $_POST['newMail'];
    $user->mail = $mail;
    $mailResult = $user->mailChecking2();
    if ($mail != $_SESSION['userInfos'][0]['mail']){
        
        if (count($mailResult) > 0){
            $swalErrorForm = true;
            $error['errorMailChecking'] = 'Cette adresse mail est déjà utilisée.';
        } else {

            if (isset($_POST['newMail'])):
                if ( !preg_match ($regexMail, $_POST['newMail'] ) ):
                $error['errorMail'] = 'Votre adresse mail est incorrecte.';
                elseif (empty($_POST['newMail'])):
                    $user->mail = $_SESSION['userInfos'][0]['mail'];
                elseif (preg_match ($regexMail, $_POST['newMail'] )):
                    $user->mail = $newMail;
            endif;
        else: 
            $user->mail = $_SESSION['userInfos'][0]['mail'];
        endif;

        }

    } 

// On check le doublon de l'identifiant en prenant en compte l'identifiant de session
    $userLog = $_POST['newUserLog'];
    $user->userLog = $userLog;
    $userLogResult = $user->logChecking2();
    if ($userLogResult[0]['userLog'] != $_SESSION['userInfos'][0]['userLog']){

        if (count($userLogResult) > 0){
            $swalErrorForm = true;
            $error['errorUserLogChecking'] = 'Cet identifiant est déjà utilisé.';
        } else {

            if (isset($_POST['newUserLog'])):
                if ( !preg_match ($regexLogin, $_POST['newUserLog'] ) ):
                    $error['errorLogin'] = 'Votre login est non conforme.';
                    elseif (empty($_POST['newUserLog'])):
                        $user->userLog = $_SESSION['userInfos'][0]['userLog'];
                    elseif(preg_match ($regexLogin, $_POST['newUserLog'])):
                        $user->userLog = $newUserLog;
                endif;
            else:
                $user->userLog = $_SESSION['userInfos'][0]['userLog'];
             endif; 

        }

    } 







    // Validation de la mise à jour du profil
    if(empty($error)):
        $user->updateUser();

    $_SESSION['userInfos'][0]['lastName'] = $_POST['newLastName'];
    $_SESSION['userInfos'][0]['firstName'] = $_POST['newFirstName'];
    $_SESSION['userInfos'][0]['birthDate'] = $_POST['newBirthDate'];
    if(isset($_FILES['newPicture']) && !empty($_FILES['newPicture']['name'])){
    $_SESSION['userInfos'][0]['picture'] = $_FILES['newPicture']['name'];
}else if (isset($_FILES['firstPicture']) && !empty($_FILES['firstPicture']['name'])){
    $_SESSION['userInfos'][0]['picture'] = $_FILES['firstPicture']['name'];
}else {
    $_SESSION['userInfos'][0]['picture'] = $_SESSION['userInfos'][0]['picture'];
}
    $_SESSION['userInfos'][0]['mail'] = $_POST['newMail'];
    $_SESSION['userInfos'][0]['phoneNumber'] = $_POST['newPhoneNumber'];
    if(isset($_POST['newStatus'])){
    $_SESSION['userInfos'][0]['status'] = $_POST['newStatus'];
}else{
    $_SESSION['userInfos'][0]['status'] = $_SESSION['userInfos'][0]['status'];
}
if(isset($_POST['newStudentCourse'])){
$_SESSION['userInfos'][0]['studentCourse'] = $_POST['newStudentCourse'];
}else{
    $_SESSION['userInfos'][0]['studentCourse'] = $_SESSION['userInfos'][0]['studentCourse'];
}
if(isset($_POST['newTeacherCourse'])){
    $_SESSION['userInfos'][0]['teacherCourse'] = $_POST['newTeacherCourse'];
}else{
    $_SESSION['userInfos'][0]['teacherCourse'] = $_SESSION['userInfos'][0]['teacherCourse'];
}
    if(isset($_POST['newGroupAge'])){
    $_SESSION['userInfos'][0]['groupAge'] = $_POST['newGroupAge'];
}else{
    $_SESSION['userInfos'][0]['groupAge'] = $_SESSION['userInfos'][0]['groupAge'];
}
if(isset($_POST['newStudentYear'])){
    $_SESSION['userInfos'][0]['studentYear'] = $_POST['newStudentYear'];
}else{
    $_SESSION['userInfos'][0]['studentYear'] =  $_SESSION['userInfos'][0]['studentYear'];
}
if(isset($_POST['newChildBelt'])){
    $_SESSION['userInfos'][0]['childBelt'] = $_POST['newChildBelt'];
}else{
    $_SESSION['userInfos'][0]['childBelt'] = $_SESSION['userInfos'][0]['childBelt'];
}
if(isset($_POST['newStudentBelt'])){
    $_SESSION['userInfos'][0]['studentBelt'] = $_POST['newStudentBelt'];
}else{
    $_SESSION['userInfos'][0]['studentBelt'] =  $_SESSION['userInfos'][0]['studentBelt'];
}
if(isset($_POST['newTeacherRank'])){
    $_SESSION['userInfos'][0]['teacherRank'] = $_POST['newTeacherRank'];
}else{
    $_SESSION['userInfos'][0]['teacherRank'] = $_SESSION['userInfos'][0]['teacherRank'];
}


    $_SESSION['userInfos'][0]['presentation'] = $_POST['newPresentation'];
    if($_POST['newShowProfil'] == 'on'){
        $_SESSION['userInfos'][0]['showProfil'] = 1;
    }else{
        $_SESSION['userInfos'][0]['showProfil'] = 0;
    }
    
    // alert success s'il n'y a pas d'erreur
        $updateSuccess = true;
    endif; 

    }
    
 
    if (isset($_POST['IDmodifRequest'])) { // test bouton d'enregistrement / update
        if(empty($error)):
        $user->updateIDUser();
    $_SESSION['userInfos'][0]['userLog'] = $_POST['newUserLog'];
    $_SESSION['userInfos'][0]['password'] = $_POST['newPassword'];
// alert success s'il n'y a pas d'erreur
$IDmodifSuccess = true;
        endif;
    }




// Supprimer le profil
    if (isset($_POST['deleteRequest'])) {
        $passwordConnect = htmlspecialchars($_POST['passwordConnect']);
        if ((isset($_POST['passwordConnect'])) && !password_verify($_POST['passwordConnect'], $_SESSION['userInfos'][0]['password'])):
            $error['errorCheckPassword'] = 'Ceci n\'est pas votre mot de passe actuel.';
            $mdpFailed = true; 
        else:
            $deleteSuccess = true;
            $user->deleteUser();
            // fonction pour supprimer la photo du dossier miniatures
            unlink('miniatures/'.($_SESSION['userInfos'][0]['picture']));
            session_destroy();
            endif;
           
    }


    




    
        





