#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: jg7b_customers
#------------------------------------------------------------

CREATE TABLE jg7b_customers(
        id          Int  Auto_increment  NOT NULL ,
        name        Varchar (255) NOT NULL ,
        contactName Varchar (50) NOT NULL ,
        address     Varchar (255) NOT NULL ,
        phone       Varchar (50) NOT NULL ,
        email       Varchar (255) NOT NULL
	,CONSTRAINT customers_PK PRIMARY KEY (id)
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
        birthday               Date NOT NULL ,
        beginningContract      Date NOT NULL ,
        endContract            Date ,
        id_usersTypes     Int NOT NULL ,
        id_contractsTypes Int
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_usersTypes_FK FOREIGN KEY (id_usersTypes) REFERENCES jg7b_usersTypes(id)
	,CONSTRAINT users_contractsTypes0_FK FOREIGN KEY (id_contractsTypes) REFERENCES jg7b_contractsTypes(id)
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
# Table: jg7b_typesInterventions
#------------------------------------------------------------

CREATE TABLE jg7b_typesInterventions(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT typesInterventions_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_subcontractor
#------------------------------------------------------------

CREATE TABLE jg7b_subcontractor(
        id          Int  Auto_increment  NOT NULL ,
        name        Varchar (50) NOT NULL ,
        contracName Varchar (50) NOT NULL ,
        address     Varchar (255) NOT NULL ,
        phone       Varchar (20) NOT NULL ,
        email       Varchar (255) NOT NULL
	,CONSTRAINT subcontractor_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7B_interventions
#------------------------------------------------------------

CREATE TABLE jg7B_interventions(
        id                         Int  Auto_increment  NOT NULL ,
        text                       Text ,
        img                        Varchar (255) ,
        datetime                   Datetime NOT NULL ,
        id_customers          Int NOT NULL ,
        id_users              Int NOT NULL ,
        id_typesInterventions Int NOT NULL ,
        id_subcontractor      Int NOT NULL
	,CONSTRAINT interventions_PK PRIMARY KEY (id)

	,CONSTRAINT interventions_customers_FK FOREIGN KEY (id_customers) REFERENCES jg7b_customers(id)
	,CONSTRAINT interventions_users0_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id)
	,CONSTRAINT interventions_typesInterventions1_FK FOREIGN KEY (id_typesInterventions) REFERENCES jg7b_typesInterventions(id)
	,CONSTRAINT interventions_subcontractor2_FK FOREIGN KEY (id_subcontractor) REFERENCES jg7b_subcontractor(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_dates
#------------------------------------------------------------

CREATE TABLE jg7b_dates(
        id   Int  Auto_increment  NOT NULL ,
        date Date NOT NULL
	,CONSTRAINT dates_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: jg7b_imgInterventions
#------------------------------------------------------------

CREATE TABLE jg7b_imgInterventions(
        id                    Int  Auto_increment  NOT NULL ,
        img                   Varchar (255) NOT NULL ,
        id_interventions Int NOT NULL
	,CONSTRAINT imgInterventions_PK PRIMARY KEY (id)

	,CONSTRAINT imgInterventions_interventions_FK FOREIGN KEY (id_interventions) REFERENCES JG7B_interventions(id)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: jg7b_customersUsers
#------------------------------------------------------------

CREATE TABLE jg7b_customersUsers(
        id_users                Int NOT NULL ,
        id_customers Int NOT NULL ,
        id_dates     Int NOT NULL ,
        startDatePlanned  Datetime ,
        endDatePlanned    Datetime ,
        startDateReal     Datetime ,
        endDateReal       Datetime
	,CONSTRAINT customersUsers_PK PRIMARY KEY (id_users,id_customers,id_dates)

	,CONSTRAINT customersUsers_users_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id)
	,CONSTRAINT customersUsers_customers0_FK FOREIGN KEY (id_customers) REFERENCES jg7b_customers(id)
	,CONSTRAINT customersUsers_dates1_FK FOREIGN KEY (id_dates) REFERENCES jg7b_dates(id)
)ENGINE=InnoDB;

