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












}