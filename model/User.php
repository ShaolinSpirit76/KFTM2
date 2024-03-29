<?php
//class User qui hérite de DataBase.php (DB)
// Je crée une classe User dont le parent est DB, donc User hérite de tous ses attributs.
// La class User va permettre d'accéder à la table KFTM_USERS de la database ThieuLam.
class User extends DB{
// Attributs en public
    public $ID;
    public $gender;
    public $firstName;
    public $lastName;
    public $birthDate;
    public $picture;
    public $mail;
    public $phoneNumber;
    public $userLog;
    public $password;
    public $status;
    public $studentCourse;
    public $teacherCourse;
    public $groupAge;
    public $studentYear;
    public $childBelt;
    public $studentBelt;
    public $teacherRank;
    public $rankNumber;
    public $presentation;
    public $verification;
    public $showProfil;
    public $admin;
    
    public function __construct(){
        //On récupere le constructeur de la page DataBase.php qui est le parent de la class User
        parent::__construct();
 }
    public function addUser(){
        
        $query = 'INSERT INTO `KFTM_USERS`(`gender`, `firstName`, `lastName`, `birthDate`, `picture`, `mail`, `phoneNumber`, `userLog`, `password`, `status`, 
        `studentCourse`, `teacherCourse`, `groupAge`, `studentYear`, `childBelt`, `studentBelt`, `teacherRank`, `rankNumber`, `presentation`, `showProfil`) VALUES (:gender, :firstName, :lastName, :birthDate, :picture, :mail, :phoneNumber, :userLog, :password, :status, :studentCourse, :teacherCourse, :groupAge, :studentYear, :childBelt, :studentBelt, :teacherRank, :rankNumber, :presentation, :showProfil)';
        // création de la variable $addUser qui nous a permis de préparer la requête
        $addUser = $this->db->prepare($query);
        $addUser->bindValue(':gender', $this->gender, PDO::PARAM_STR);
        $addUser->bindValue(':lastName', $this->lastName, PDO::PARAM_STR);
        $addUser->bindValue(':firstName', $this->firstName, PDO::PARAM_STR);
        $addUser->bindValue(':birthDate', $this->birthDate == '' ? NULL : $this->birthDate);
        $addUser->bindValue(':picture', $this->picture, PDO::PARAM_STR); 
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR); 
        $addUser->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR); 
        $addUser->bindValue(':userLog', $this->userLog, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':status', $this->status, PDO::PARAM_STR);
        $addUser->bindValue(':studentCourse', $this->studentCourse, PDO::PARAM_STR);
        $addUser->bindValue(':teacherCourse', $this->teacherCourse, PDO::PARAM_STR);
        $addUser->bindValue(':groupAge', $this->groupAge, PDO::PARAM_STR);
        $addUser->bindValue(':studentYear', $this->studentYear, PDO::PARAM_STR);
        $addUser->bindValue(':childBelt', $this->childBelt, PDO::PARAM_STR);
        $addUser->bindValue(':studentBelt', $this->studentBelt, PDO::PARAM_STR);
        $addUser->bindValue(':teacherRank', $this->teacherRank, PDO::PARAM_STR);
        $addUser->bindValue(':rankNumber', $this->rankNumber, PDO::PARAM_INT);
        $addUser->bindValue(':presentation', $this->presentation, PDO::PARAM_STR);
        $addUser->bindValue(':showProfil', $this->showProfil, PDO::PARAM_INT);
        // $addUser->bindValue(':verification', $this->verification, PDO::PARAM_INT);            
        if($addUser->execute()){
            return true;
        }
    }
    public function rankChecking() {
        $query = 'SELECT teacherRank FROM `KFTM_USERS`';
        $rankChecking = $this->db->prepare($query);
        $rankChecking->execute();
        $rankCheckingFetch = $rankChecking->fetchAll(PDO::FETCH_ASSOC);
        return $rankCheckingFetch;
    }
    public function mailChecking() {
        $query = 'SELECT mail FROM `KFTM_USERS` WHERE mail = :mail';
        $mailChecking = $this->db->prepare($query);
        $mailChecking->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $mailChecking->execute();
        $mailCheckingFetch = $mailChecking->fetchAll(PDO::FETCH_ASSOC);
        return $mailCheckingFetch;
    }
    public function mailChecking2() {
        $query = 'SELECT mail FROM `KFTM_USERS` WHERE mail = :newMail';
        $mailChecking = $this->db->prepare($query);
        $mailChecking->bindValue(':newMail', $this->mail, PDO::PARAM_STR);
        $mailChecking->execute();
        $mailCheckingFetch = $mailChecking->fetchAll(PDO::FETCH_ASSOC);
        return $mailCheckingFetch;
    }
    public function logChecking() {
        $query = 'SELECT userLog FROM `KFTM_USERS` WHERE userLog = :userLog';
        $logChecking = $this->db->prepare($query);
        $logChecking->bindValue(':userLog', $this->userLog, PDO::PARAM_STR);
        $logChecking->execute();
        $logCheckingFetch = $logChecking->fetchAll(PDO::FETCH_ASSOC);
        return $logCheckingFetch;
    }
    public function logChecking2() {
        $query = 'SELECT userLog FROM `KFTM_USERS` WHERE userLog = :newUserLog';
        $logChecking = $this->db->prepare($query);
        $logChecking->bindValue(':newUserLog', $this->userLog, PDO::PARAM_STR);
        $logChecking->execute();
        $logCheckingFetch = $logChecking->fetchAll(PDO::FETCH_ASSOC);
        return $logCheckingFetch;
    }
    public function pictureChecking() {
        $query = 'SELECT picture FROM `KFTM_USERS` WHERE picture = :picture';
        $pictureChecking = $this->db->prepare($query);
        $pictureChecking->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $pictureChecking->execute();
        $pictureCheckingFetch = $pictureChecking->fetchAll(PDO::FETCH_ASSOC);
        return $pictureCheckingFetch;
    }
    public function pictureChecking2() {
        $query = 'SELECT picture FROM `KFTM_USERS` WHERE picture = :newPicture';
        $pictureChecking = $this->db->prepare($query);
        $pictureChecking->bindValue(':newPicture', $this->picture, PDO::PARAM_STR);
        $pictureChecking->execute();
        $pictureCheckingFetch = $pictureChecking->fetchAll(PDO::FETCH_ASSOC);
        return $pictureCheckingFetch;
    }
    public function connectionUser() {
        $query = 'SELECT * FROM `KFTM_USERS` WHERE userLog = :userLog';
        $connectUser = $this->db->prepare($query);
        $connectUser->bindValue(':userLog', $this->userLog, PDO::PARAM_STR);
        if($connectUser->execute()):
            $connectUserResult = $connectUser->fetchAll(PDO::FETCH_ASSOC);
            return $connectUserResult;
        endif;
    }
    
    // Méthode qui permet, à la fois d'afficher les membres inscrits,
    // mais de le faire de façon hiérarchique grâce au rankNumber, qui relie
    // un int croissant en fonction du grade.
     public function displayUser(){
        $query = 'SELECT * FROM `KFTM_USERS` ORDER BY `rankNumber` ASC';
        $selectUser = $this->db->prepare($query);
        $selectUser->execute();
        $displayUsers=$selectUser->fetchAll(PDO::FETCH_ASSOC);
        return $displayUsers;
     }
     public function displayPicture(){
        $query = 'SELECT * FROM `KFTM_USERS` WHERE picture = :picture';
        $displayPicture = $this->db->prepare($query);
        $displayPicture->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        if($displayPicture->execute()):
            $displayPictureResult = $displayPicture->fetchAll(PDO::FETCH_ASSOC);
            return $displayPictureResult;
        endif;
     }
   
     
public function updateUser(){
   
    $query = 'UPDATE `KFTM_USERS` SET lastName = :newLastName, firstName = :newFirstName, birthDate = :newBirthDate, picture = :newPicture, mail = :newMail, phoneNumber = :newPhoneNumber, status = :newStatus, studentCourse = :newStudentCourse, teacherCourse = :newTeacherCourse, groupAge = :newGroupAge, studentYear = :newStudentYear, childBelt = :newChildBelt, studentBelt = :newStudentBelt, teacherRank = :newTeacherRank, rankNumber = :newRankNumber, presentation = :newPresentation, showProfil = :newShowProfil WHERE ID = :ID';
    $updateUser = $this->db->prepare($query);
    $updateUser->bindValue(':ID', $_SESSION['userInfos'][0]['ID'], PDO::PARAM_STR);
    $updateUser->bindValue(':newLastName', $this->lastName, PDO::PARAM_STR);
    $updateUser->bindValue(':newFirstName', $this->firstName, PDO::PARAM_STR);
    $updateUser->bindValue(':newBirthDate', $this->birthDate == '' ? NULL : $this->birthDate);
    $updateUser->bindValue(':newPicture', $this->picture, PDO::PARAM_STR); 
    $updateUser->bindValue(':newMail', $this->mail, PDO::PARAM_STR); 
    $updateUser->bindValue(':newPhoneNumber', $this->phoneNumber, PDO::PARAM_STR); 
    $updateUser->bindValue(':newStatus', $this->status, PDO::PARAM_STR);
    $updateUser->bindValue(':newStudentCourse', $this->studentCourse, PDO::PARAM_STR);
    $updateUser->bindValue(':newTeacherCourse', $this->teacherCourse, PDO::PARAM_STR);
    $updateUser->bindValue(':newGroupAge', $this->groupAge, PDO::PARAM_STR);
    $updateUser->bindValue(':newStudentYear', $this->studentYear, PDO::PARAM_STR);
    $updateUser->bindValue(':newChildBelt', $this->childBelt, PDO::PARAM_STR);
    $updateUser->bindValue(':newStudentBelt', $this->studentBelt, PDO::PARAM_STR);
    $updateUser->bindValue(':newTeacherRank', $this->teacherRank, PDO::PARAM_STR);
    $updateUser->bindValue(':newRankNumber', $this->rankNumber, PDO::PARAM_INT);
    $updateUser->bindValue(':newPresentation', $this->presentation, PDO::PARAM_STR);
    $updateUser->bindValue(':newShowProfil', $this->showProfil, PDO::PARAM_INT);
    
    
       
    if($updateUser->execute()){
        return true;
    }
}


public function updateIDUser(){
   
    $query = 'UPDATE `KFTM_USERS` SET userLog = :newUserLog, password = :newPassword WHERE ID = :ID';
 $updateUser = $this->db->prepare($query);
 $updateUser->bindValue(':ID', $_SESSION['userInfos'][0]['ID'], PDO::PARAM_INT);
 $updateUser->bindValue(':newUserLog', $this->userLog, PDO::PARAM_STR);
 $updateUser->bindValue(':newPassword', $this->password, PDO::PARAM_STR);
 
 if($updateUser->execute()){
     return true;
 }
}
     
     public function deleteUser(){
        $query = "DELETE FROM `KFTM_USERS` WHERE ID = :ID";
        $deleteUser = $this->db->prepare($query);
        $deleteUser->bindValue(':ID', $_SESSION['userInfos'][0]['ID'], PDO::PARAM_INT);
        if($deleteUser->execute()){
           return true;
        }
     }


     public function adminDeleteUser(){
        $query = "DELETE FROM `KFTM_USERS` WHERE ID = :ID";
        $adminDeleteUser = $this->db->prepare($query);
        $adminDeleteUser->bindValue(':ID', $this->ID, PDO::PARAM_INT);
        if($adminDeleteUser->execute()){
           return true;
        }
     }

     public function countUsers(){
         $query = "SELECT COUNT(`ID`) AS `number` FROM `KFTM_USERS`";
         $countUsers = $this->db->query($query);
         $countUsersResult = $countUsers->fetchAll(PDO::FETCH_ASSOC);
         return $countUsersResult;
     }

     public function countMen(){
        $query = "SELECT COUNT(`gender`) AS `numberMen` FROM `KFTM_USERS` WHERE `gender` = 'Homme'";
        $countMen = $this->db->query($query);
        $countMenResult = $countMen->fetchAll(PDO::FETCH_ASSOC);
        return $countMenResult;
    }

    public function countWomen(){
        $query = "SELECT COUNT(`gender`) AS `numberWomen` FROM `KFTM_USERS` WHERE `gender` = 'Femme'";
        $countWomen = $this->db->query($query);
        $countWomenResult = $countWomen->fetchAll(PDO::FETCH_ASSOC);
        return $countWomenResult;
    }

    public function countAdmin(){
        $query = "SELECT COUNT(`admin`) AS `numberAdmin` FROM `KFTM_USERS` WHERE `admin` = 1";
        $countAdmin = $this->db->query($query);
        $countAdminResult = $countAdmin->fetchAll(PDO::FETCH_ASSOC);
        return $countAdminResult;
    }


    public function adminPower(){
        $query = 'UPDATE `KFTM_USERS` SET admin = 1 WHERE ID = :ID';
        $adminPower = $this->db->prepare($query);
        $adminPower->bindValue(':ID', $this->ID, PDO::PARAM_INT);
        if($adminPower->execute()){
            return true;
        }
    }

    public function adminFired(){
        $query = 'UPDATE `KFTM_USERS` SET admin = 0 WHERE ID = :ID';
        $adminFired = $this->db->prepare($query);
        $adminFired->bindValue(':ID', $this->ID, PDO::PARAM_INT);
        if($adminFired->execute()){
            return true;
        }
    }
   
     
    
}

