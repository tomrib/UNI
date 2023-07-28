#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: JG7b_business
#------------------------------------------------------------

CREATE TABLE JG7b_business(
        id      Int  Auto_increment  NOT NULL ,
        name    Varchar (255) NOT NULL ,
        address Varchar (255) NOT NULL ,
        phone   Int NOT NULL ,
        email   Varchar (255) NOT NULL
	,CONSTRAINT business_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: JG7b_Who
#------------------------------------------------------------

CREATE TABLE JG7b_Who(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT Who_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: JG7b_users
#------------------------------------------------------------

CREATE TABLE JG7b_users(
        id          Int  Auto_increment  NOT NULL ,
        lastname    Varchar (25) NOT NULL ,
        forstname   Varchar (50) NOT NULL ,
        email       Varchar (255) NOT NULL ,
        address     Varchar (255) NOT NULL ,
        phone       Int NOT NULL ,
        contra      Varchar (50) NOT NULL ,
        cq          Varchar (20) NOT NULL ,
        id_Who Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_Who_FK FOREIGN KEY (id_Who) REFERENCES JG7b_Who(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: JG7b_time
#------------------------------------------------------------

CREATE TABLE JG7b_time(
        id            Int  Auto_increment  NOT NULL ,
        arrived       Time NOT NULL ,
        disparates    Time NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT time_PK PRIMARY KEY (id)

	,CONSTRAINT time_users_FK FOREIGN KEY (id_users) REFERENCES JG7b_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: JG7B_intervention
#------------------------------------------------------------

CREATE TABLE JG7B_intervention(
        id               Int  Auto_increment  NOT NULL ,
        text             Text NOT NULL ,
        img              Varchar (255) NOT NULL ,
        id_business Int NOT NULL
	,CONSTRAINT intervention_PK PRIMARY KEY (id)

	,CONSTRAINT intervention_business_FK FOREIGN KEY (id_business) REFERENCES JG7b_business(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: JG7b_block
#------------------------------------------------------------

CREATE TABLE JG7b_block(
        id   Int  Auto_increment  NOT NULL ,
        text Text NOT NULL
	,CONSTRAINT block_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: JG7b_businessUsers
#------------------------------------------------------------

CREATE TABLE JG7b_businessUsers(
        id_business            Int NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT businessUsers_PK PRIMARY KEY (id_business,id_users)

	,CONSTRAINT businessUsers_business_FK FOREIGN KEY (id_business) REFERENCES JG7b_business(id)
	,CONSTRAINT businessUsers_users0_FK FOREIGN KEY (id_users) REFERENCES JG7b_users(id)
)ENGINE=InnoDB;

