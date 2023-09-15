#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
#------------------------------------------------------------
# Table: jg7b_customerss
#------------------------------------------------------------
CREATE TABLE jg7b_customerss(
        id Int Auto_increment NOT NULL,
        name Varchar (255) NOT NULL,
        contactName Varchar (50) NOT NULL,
        address Varchar (255) NOT NULL,
        phone Varchar (50) NOT NULL,
        email Varchar (255) UNiQUE NOT NULL,
        CONSTRAINT customerss_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: jg7b_usersTypes
#------------------------------------------------------------
CREATE TABLE jg7b_usersTypes(
        id Int Auto_increment NOT NULL,
        name Varchar (20) NOT NULL,
        CONSTRAINT usersTypes_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: jg7b_contractsTypes
#------------------------------------------------------------
CREATE TABLE jg7b_contractsTypes(
        id Int Auto_increment NOT NULL,
        name Varchar (20) NOT NULL,
        CONSTRAINT contractsTypes_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: jg7b_users
#------------------------------------------------------------
CREATE TABLE jg7b_users(
        id Int Auto_increment NOT NULL,
        lastname Varchar (25) NOT NULL,
        firstname Varchar (50) NOT NULL,
        email Varchar (255) UNiQUE NOT NULL,
        password Varchar (255) NOT NULL,
        address Varchar (255),
        phone Varchar (15),
        socialInsuranceNumber Varchar (20),
        birthday Date NOT NULL,
        beginningContract Date NOT NULL,
        endContract Date,
        id_usersTypes Int NOT NULL,
        id_contractsTypes Int,
        CONSTRAINT users_PK PRIMARY KEY (id),
        CONSTRAINT users_usersTypes_FK FOREIGN KEY (id_usersTypes) REFERENCES jg7b_usersTypes(id),
        CONSTRAINT users_contractsTypes0_FK FOREIGN KEY (id_contractsTypes) REFERENCES jg7b_contractsTypes(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: jg7b_notes
#------------------------------------------------------------
CREATE TABLE jg7b_notes(
        id Int Auto_increment NOT NULL,
        text Text NOT NULL,
        date Datetime NOT NULL,
        id_users Int NOT NULL,
        CONSTRAINT notes_PK PRIMARY KEY (id),
        CONSTRAINT notes_users_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: jg7b_archives
#------------------------------------------------------------
CREATE TABLE jg7b_archives(
        id Int Auto_increment NOT NULL,
        file Varchar (255) NOT NULL,
        id_users Int NOT NULL,
        CONSTRAINT archives_PK PRIMARY KEY (id),
        CONSTRAINT archives_users_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: jg7b_typesInterventions
#------------------------------------------------------------
CREATE TABLE jg7b_typesInterventions(
        id Int Auto_increment NOT NULL,
        name Varchar (50) NOT NULL,
        CONSTRAINT typesInterventions_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: jg7b_subcontractor
#------------------------------------------------------------
CREATE TABLE jg7b_subcontractor(
        id Int Auto_increment NOT NULL,
        name Varchar (50) NOT NULL,
        contracName Varchar (50) NOT NULL,
        address Varchar (255) NOT NULL,
        phone Varchar (20) NOT NULL,
        email Varchar (255) UNiQUE NOT NULL,
        CONSTRAINT subcontractor_PK PRIMARY KEY (id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: jg7b_interventions
#------------------------------------------------------------
CREATE TABLE jg7b_interventions(
        id Int Auto_increment NOT NULL,
        text Text,
        img Varchar (255),
        datetime Datetime NOT NULL,
        id_customerss Int NOT NULL,
        id_users Int NOT NULL,
        id_typesInterventions Int NOT NULL,
        id_subcontractor Int NOT NULL,
        CONSTRAINT interventions_PK PRIMARY KEY (id),
        CONSTRAINT interventions_customerss_FK FOREIGN KEY (id_customerss) REFERENCES jg7b_customerss(id),
        CONSTRAINT interventions_users0_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id),
        CONSTRAINT interventions_typesInterventions1_FK FOREIGN KEY (id_typesInterventions) REFERENCES jg7b_typesInterventions(id),
        CONSTRAINT interventions_subcontractor2_FK FOREIGN KEY (id_subcontractor) REFERENCES jg7b_subcontractor(id)
) ENGINE = InnoDB;

#------------------------------------------------------------
# Table: jg7b_customersUsers
#------------------------------------------------------------
CREATE TABLE jg7b_customersUsers(
        id_customers Int NOT NULL,
        id_users Int NOT NULL,
        date Date,
        startDatePlanned Datetime,
        endDatePlanned Datetime,
        startDateReal Datetime,
        endDateReal Datetime,
        CONSTRAINT customersUsers_PK PRIMARY KEY (id_customers, id_users),
        CONSTRAINT customersUsers_customers_FK FOREIGN KEY (id_customers) REFERENCES jg7b_customers(id),
        CONSTRAINT customersUsers_users0_FK FOREIGN KEY (id_users) REFERENCES jg7b_users(id)
) ENGINE = InnoDB;