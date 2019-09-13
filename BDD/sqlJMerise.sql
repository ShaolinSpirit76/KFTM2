#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: KFTM_USERS
#------------------------------------------------------------

CREATE TABLE KFTM_USERS(
        ID            Int  Auto_increment  NOT NULL ,
        gender        Varchar (50) NOT NULL ,
        lastName      Varchar (50) NOT NULL ,
        firstName     Varchar (50) NOT NULL ,
        birthDate     Date ,
        phoneNumber   Varchar (50) ,
        mail          Varchar (50) NOT NULL ,
        picture       Varchar (50) ,
        avatar        Varchar (50) ,
        userLog       Varchar (50) NOT NULL ,
        password      Varchar (50) NOT NULL ,
        status        Varchar (50) ,
        studentCourse Varchar (50) ,
        studentYear   Varchar (50) ,
        childBelt     Varchar (50) ,
        studentBelt   Varchar (50) ,
        teacherCourse Varchar (50) ,
        teacherRank   Varchar (50) ,
        rankNumber    Int NOT NULL ,
        groupAge      Varchar (50) ,
        presentation  Text ,
        verification  TinyINT NOT NULL ,
        showProfil    TinyINT NOT NULL ,
        admin         TinyINT NOT NULL
	,CONSTRAINT KFTM_USERS_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: KFTM_EVENTS
#------------------------------------------------------------

CREATE TABLE KFTM_EVENTS(
        ID                Int  Auto_increment  NOT NULL ,
        eventType         Varchar (50) NOT NULL ,
        eventCourse       Varchar (50) NOT NULL ,
        eventDate         Date NOT NULL ,
        eventHour         Varchar (50) NOT NULL ,
        eventMaxUser      Int ,
        eventDescription  Text ,
        eventPicture      Varchar (50) ,
        registeredPicture Varchar (50)
	,CONSTRAINT KFTM_EVENTS_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: KFTM_COURSES
#------------------------------------------------------------

CREATE TABLE KFTM_COURSES(
        ID                 Int  Auto_increment  NOT NULL ,
        courseType         Varchar (50) NOT NULL ,
        courseDay          Varchar (50) NOT NULL ,
        courseHours        Varchar (50) NOT NULL ,
        courseStart        Date NOT NULL ,
        courseEnd          Date NOT NULL ,
        courseHolidayStart Date ,
        courseHolidayEnd   Date ,
        teachers           Varchar (255) ,
        assistants         Varchar (255)
	,CONSTRAINT KFTM_COURSES_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: KFTM_SHOP
#------------------------------------------------------------

CREATE TABLE KFTM_SHOP(
        ID                 Int  Auto_increment  NOT NULL ,
        articleName        Varchar (50) NOT NULL ,
        articlePicture     Varchar (50) NOT NULL ,
        articleQuantity    Int ,
        articleDescription Text ,
        articlePrice       Int NOT NULL
	,CONSTRAINT KFTM_SHOP_PK PRIMARY KEY (ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: KFTM_MESSAGES
#------------------------------------------------------------

CREATE TABLE KFTM_MESSAGES(
        ID            Int  Auto_increment  NOT NULL ,
        name          Varchar (50) ,
        mail          Varchar (50) NOT NULL ,
        topic         Varchar (50) ,
        message       Text NOT NULL ,
        date          Date NOT NULL ,
        CHECKED       TinyINT NOT NULL ,
        ID_KFTM_USERS Int NOT NULL
	,CONSTRAINT KFTM_MESSAGES_PK PRIMARY KEY (ID)

	,CONSTRAINT KFTM_MESSAGES_KFTM_USERS_FK FOREIGN KEY (ID_KFTM_USERS) REFERENCES KFTM_USERS(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: KFTM_PARTICIPATING
#------------------------------------------------------------

CREATE TABLE KFTM_PARTICIPATING(
        ID            Int NOT NULL ,
        ID_KFTM_USERS Int NOT NULL ,
        CHECKED       TinyINT NOT NULL
	,CONSTRAINT KFTM_PARTICIPATING_PK PRIMARY KEY (ID,ID_KFTM_USERS)

	,CONSTRAINT KFTM_PARTICIPATING_KFTM_EVENTS_FK FOREIGN KEY (ID) REFERENCES KFTM_EVENTS(ID)
	,CONSTRAINT KFTM_PARTICIPATING_KFTM_USERS0_FK FOREIGN KEY (ID_KFTM_USERS) REFERENCES KFTM_USERS(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: KFTM_CHECKING
#------------------------------------------------------------

CREATE TABLE KFTM_CHECKING(
        ID            Int NOT NULL ,
        ID_KFTM_USERS Int NOT NULL ,
        CHECKED       TinyINT NOT NULL
	,CONSTRAINT KFTM_CHECKING_PK PRIMARY KEY (ID,ID_KFTM_USERS)

	,CONSTRAINT KFTM_CHECKING_KFTM_COURSES_FK FOREIGN KEY (ID) REFERENCES KFTM_COURSES(ID)
	,CONSTRAINT KFTM_CHECKING_KFTM_USERS0_FK FOREIGN KEY (ID_KFTM_USERS) REFERENCES KFTM_USERS(ID)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: KFTM_BOOKING
#------------------------------------------------------------

CREATE TABLE KFTM_BOOKING(
        ID            Int NOT NULL ,
        ID_KFTM_USERS Int NOT NULL ,
        CHECKED       TinyINT NOT NULL
	,CONSTRAINT KFTM_BOOKING_PK PRIMARY KEY (ID,ID_KFTM_USERS)

	,CONSTRAINT KFTM_BOOKING_KFTM_SHOP_FK FOREIGN KEY (ID) REFERENCES KFTM_SHOP(ID)
	,CONSTRAINT KFTM_BOOKING_KFTM_USERS0_FK FOREIGN KEY (ID_KFTM_USERS) REFERENCES KFTM_USERS(ID)
)ENGINE=InnoDB;

