<?php
//class Event qui hérite de DataBase.php (DB)
class Event extends DB{

    public $ID;
    public $eventType;
    public $eventCourse;
    public $eventDate;
    public $eventHour;
    public $eventMaxUser;
    public $eventDescription;
    public $eventPicture;
   

    public function __construct(){
        //On récupere le constructeur de la page DataBase.php qui est le parent de la class Event
        parent::__construct();
 }


    public function addEvent(){

        $query = 'INSERT INTO `KFTM_EVENTS`(`eventType`, `eventCourse`, `eventDate`, `eventHour`, `eventMaxUser`,
        `eventDescription`, `eventPicture`) VALUES (:eventType, :eventCourse, :eventDate, :eventHour, :eventMaxUser,
        :eventDescription, :eventPicture)';
        // création de la variable $addEvent qui nous a permis de préparer la requête
        $addEvent = $this->db->prepare($query);
        $addEvent->bindValue(':eventType', $this->eventType, PDO::PARAM_STR);
        $addEvent->bindValue(':eventCourse', $this->eventCourse, PDO::PARAM_STR);
        $addEvent->bindValue(':eventDate', $this->eventDate, PDO::PARAM_STR);
        $addEvent->bindValue(':eventHour', $this->eventHour, PDO::PARAM_STR);
        $addEvent->bindValue(':eventMaxUser',$this->eventMaxUser, PDO::PARAM_INT);
        $addEvent->bindValue(':eventDescription', $this->eventDescription, PDO::PARAM_STR);
        $addEvent->bindValue(':eventPicture', $this->eventPicture, PDO::PARAM_STR);
        
        if($addEvent->execute()){
            return true;
        }
    }



    public function displayEvent(){
        $query = 'SELECT * FROM `KFTM_EVENTS` ORDER BY `eventDate` ASC';
        $selectEvent = $this->db->prepare($query);
        $selectEvent->execute();
        $displayEvents=$selectEvent->fetchAll(PDO::FETCH_ASSOC);
        return $displayEvents;
     }

    
     
     public function displayEventPicture(){
        $query = 'SELECT * FROM `KFTM_EVENTS` WHERE eventPicture = :eventPicture';
        $displayEventPicture = $this->db->prepare($query);
        $displayEventPicture->bindValue(':eventPicture', $this->eventPicture, PDO::PARAM_STR);
        if($displayEventPicture->execute()):
            $displayEventPictureResult = $displayEventPicture->fetchAll(PDO::FETCH_ASSOC);
            return $displayEventPictureResult;
        endif;
     }


     public function showUpdateEvent(){
        $query = "SELECT * FROM `KFTM_EVENTS` WHERE ID = :ID";
        $showUpdateEvent = $this->db->prepare($query);
        $showUpdateEvent->bindValue(':ID', $this->ID, PDO::PARAM_INT);
        if($showUpdateEvent->execute()){
            $displayEvent=$showUpdateEvent->fetchAll(PDO::FETCH_ASSOC);
           return $displayEvent;
        } else {
            return false;
        }
     }



     public function updateEvent(){
   
        $query = 'UPDATE `KFTM_EVENTS` SET eventType = :newEventType, eventCourse = :newEventCourse, eventDate = :newEventDate, eventHour = :newEventHour, eventMaxUser = :newEventMaxUser, eventDescription = :newEventDescription, eventPicture = :newEventPicture WHERE ID = :ID';
        $updateEvent = $this->db->prepare($query);
        $updateEvent->bindValue(':ID', $this->ID, PDO::PARAM_INT);
        $updateEvent->bindValue(':newEventType', $this->eventType, PDO::PARAM_STR);
        $updateEvent->bindValue(':newEventCourse', $this->eventCourse, PDO::PARAM_STR);
        $updateEvent->bindValue(':newEventDate', $this->eventDate, PDO::PARAM_STR);
        $updateEvent->bindValue(':newEventHour', $this->eventHour, PDO::PARAM_STR); 
        $updateEvent->bindValue(':newEventMaxUser', $this->eventMaxUser, PDO::PARAM_INT); 
        $updateEvent->bindValue(':newEventDescription', $this->eventDescription, PDO::PARAM_STR); 
        $updateEvent->bindValue(':newEventPicture', $this->eventPicture, PDO::PARAM_STR);        
        
           
        if($updateEvent->execute()){
            return true;
        }
    }















     public function countEvent(){
        $query = "SELECT COUNT(`ID`) AS `number` FROM `KFTM_EVENTS`";
        $countEvent = $this->db->query($query);
        $countEventResult = $countEvent->fetchAll(PDO::FETCH_ASSOC);
        return $countEventResult;
    }

    


}