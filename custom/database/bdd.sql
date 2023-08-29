#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: jg7b_business
#------------------------------------------------------------

CREATE TABLE jg7b_business(
        id      Int  Auto_increment  NOT NULL ,
        name    Varchar (255) NOT NULL ,
        address Varchar (255) NOT NULL ,
        phone   Int NOT NULL ,
        email   Varchar (255) NOT NULL
	,CONSTRAINT business_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_usersTypes
#------------------------------------------------------------

CREATE TABLE jg7b_usersTypes(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT usersTypes_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_contractsTypes
#------------------------------------------------------------

CREATE TABLE jg7b_contractsTypes(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT contractsTypes_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_users
#------------------------------------------------------------

CREATE TABLE jg7b_users(
        id                     Int  Auto_increment  NOT NULL ,
        lastname               Varchar (25) NOT NULL ,
        firstname              Varchar (50) NOT NULL ,
        email                  Varchar (255) NOT NULL ,
        password               Varchar (255) NOT NULL ,
        address                Varchar (255) ,
        phone                  Varchar (15) ,
        socialInsuranceNumber  Varchar (20) ,
        id_usersTypes     Int NOT NULL ,
        id_contractsTypes Int
	,CONSTRAINT users_PK PRIMARY KEY (id)
	,CONSTRAINT users_usersTypes_FK FOREIGN KEY (id_usersTypes) REFERENCES jg7b_usersTypes(id)
	,CONSTRAINT users_contractsTypes0_FK FOREIGN KEY (id_contractsTypes) REFERENCES jg7b_contractsTypes(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_interventions
#------------------------------------------------------------

CREATE TABLE jg7b_interventions(
        id               Int  Auto_increment  NOT NULL ,
        text             Text NOT NULL ,
        img              Varchar (255) NOT NULL ,
        id_business Int NOT NULL ,
        id_users    Int NOT NULL
	,CONSTRAINT interventions_PK PRIMARY KEY (id)
	,CONSTRAINT interventions_business_FK FOREIGN KEY (id_business) REFERENCES jg7b_business(id)
	,CONSTRAINT interventions_users0_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_notes
#------------------------------------------------------------

CREATE TABLE jg7b_notes(
        id            Int  Auto_increment  NOT NULL ,
        text          Text NOT NULL ,
        date          Datetime NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT notes_PK PRIMARY KEY (id)
	,CONSTRAINT notes_users_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_archives
#------------------------------------------------------------

CREATE TABLE jg7b_archives(
        id            Int  Auto_increment  NOT NULL ,
        file          Varchar (255) NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT archives_PK PRIMARY KEY (id)
	,CONSTRAINT archives_users_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_businessUsers
#------------------------------------------------------------

CREATE TABLE jg7b_businessUsers(
        id_business               Int NOT NULL ,
        id_users    Int NOT NULL ,
        comment          Text NOT NULL ,
        startDatePlanned Datetime NOT NULL ,
        endDatePlanned   Datetime NOT NULL ,
        startDateReal    Datetime ,
        endDateReal      Datetime
	,CONSTRAINT businessUsers_PK PRIMARY KEY (id_business,id_users)
	,CONSTRAINT businessUsers_business_FK FOREIGN KEY (id_business) REFERENCES jg7b_business(id)
	,CONSTRAINT businessUsers_users0_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id)
)ENGINE=InnoDB;
