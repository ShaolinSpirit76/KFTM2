<?php
//class Participating qui hérite de DataBase.php (DB)
class Participating extends DB{
    public $ID;
    public $ID_USERS;
    public $ID_EVENTS;
    public $CHECKED;
    
    public function __construct(){
        //On récupere le constructeur de la page DataBase.php qui est le parent de la class User
        parent::__construct();
 }

//  Pour ajouter une inscription à un évènement
    public function addRegistration(){
        
        $query = 'INSERT INTO `KFTM_PARTICIPATING`(`ID_USERS`, `ID_EVENTS`, `CHECKED`) VALUES (:ID_USERS, :ID_EVENTS, :CHECKED)';
        // création de la variable $addRegistration qui nous a permis de préparer la requête
        $addRegistration = $this->db->prepare($query);
        $addRegistration->bindValue(':ID_USERS', $this->ID_USERS, PDO::PARAM_INT);
        $addRegistration->bindValue(':ID_EVENTS', $this->ID_EVENTS, PDO::PARAM_INT);
        $addRegistration->bindValue(':CHECKED', $this->CHECKED, PDO::PARAM_INT);
                          
        if($addRegistration->execute()){
            return true;
        }
    }

    // Pour afficher les valeurs de la table Participating
    public function displayRegistration(){
        $query = 'SELECT * FROM `KFTM_PARTICIPATING` WHERE ID_EVENTS = :ID_EVENTS AND ID_USERS = :ID_USERS';
        $selectRegistration = $this->db->prepare($query);
        $selectRegistration->bindValue(':ID_USERS', $this->ID_USERS, PDO::PARAM_INT);
        $selectRegistration->bindValue(':ID_EVENTS', $this->ID_EVENTS, PDO::PARAM_INT);
        $selectRegistration->execute();
        $displayRegistration = $selectRegistration->fetchAll(PDO::FETCH_ASSOC);
        return $displayRegistration;
     }

    //  Pour supprimer une inscription à un évènement
     public function userUnregistration(){
        $query = 'DELETE FROM `KFTM_PARTICIPATING` WHERE ID_EVENTS = :ID_EVENTS AND ID_USERS = :ID_USERS';
        $userUnregistration = $this->db->prepare($query);
        $userUnregistration->bindValue(':ID_USERS', $this->ID_USERS, PDO::PARAM_INT);
        $userUnregistration->bindValue(':ID_EVENTS', $this->ID_EVENTS, PDO::PARAM_INT);
        if($userUnregistration->execute()){
            return true;
        }
     }


     public function displayEventRegistration(){
         $query = "SELECT `KFTM_USERS`.ID, `KFTM_USERS`.lastName, `KFTM_USERS`.firstName FROM `KFTM_USERS` FULL JOIN `KFTM_PARTICIPATING` ON `KFTM_PARTICIPATING`.ID_USERS = `KFTM_USERS`.ID FULL JOIN `KFTM_EVENTS` ON `KFTM_PARTICIPATING`.ID_EVENTS = `KFTM_EVENTS`.ID WHERE KFTM.PARTICIPATING.ID_EVENTS = :ID_EVENTS";
         $selectEventRegistration = $this->db->prepare($query);
         
        $selectEventRegistration->bindValue(':ID_EVENTS', $this->ID_EVENTS, PDO::PARAM_INT);
        $selectEventRegistration->execute();
        $displayEventRegistration = $selectEventRegistration->fetchAll(PDO::FETCH_ASSOC);
        return $displayEventRegistration;
     }

     public function displayUserRegistration(){
        $query = "SELECT `KFTM_EVENTS`.eventType, `KFTM_EVENTS`.eventDate, `KFTM_EVENTS`.eventHour,`KFTM_EVENTS`.eventPicture, `KFTM_EVENTS`.registeredPicture FROM `KFTM_EVENTS` FULL JOIN `KFTM_PARTICIPATING` ON `KFTM_PARTICIPATING`.ID_EVENTS = `KFTM_EVENTS`.ID FULL JOIN `KFTM_USERS` ON `KFTM_PARTICIPATING`.ID_USERS = `KFTM_USERS`.ID WHERE KFTM.PARTICIPATING.ID_USERS = :ID_USERS";
        $selectUserRegistration = $this->db->prepare($query);
        $selectUserRegistration->bindValue(':ID_USERS', $this->ID_USERS, PDO::PARAM_INT);
        $selectUserRegistration->execute();
       $displayUserRegistration = $selectUserRegistration->fetchAll(PDO::FETCH_ASSOC);
       return $displayUserRegistration;
    }
    
    // Renvoie le nombre total d'inscrits tout évènement confondu
   public function allInscriptions(){
       $query = "SELECT COUNT(*) FROM `KFTM_PARTICIPATING`";
       $allInscriptions = $this->db->query($query);
       $countSuscribers = $allInscriptions->fetchAll(PDO::FETCH_ASSOC);
       return $countSuscribers;
    }

    // Renvoie le nombre d'inscrit à un évènement
    public function countEventInscriptions(){
        $query = "SELECT COUNT(*) FROM `KFTM_PARTICIPATING` WHERE KFTM.PARTICIPATING.ID_EVENTS = :ID_EVENTS";
        $countEventInscriptions = $this->db->prepare($query);
        $countEventInscriptions->bindValue(':ID_EVENTS', $this->ID_EVENTS, PDO::PARAM_INT);
        $countEventInscriptions->execute();
        $displayCountEventInscriptions = $countEventInscriptions->fetchAll(PDO::FETCH_ASSOC);
        return $displayCountEventInscriptions;
    }
   
   
     
    
}

