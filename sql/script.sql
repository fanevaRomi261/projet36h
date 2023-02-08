CREATE TABLE user(
    idUser int(10) PRIMARY KEY auto_increment,
    nom varchar(64) NOT NULL,
    pwd varchar(20) NOT NULL,
    isAdmin int NOT NULL
);


CREATE TABLE categorie(
    idCategorie int(10) PRIMARY KEY auto_increment,
    nom varchar(64)
);


CREATE TABLE Objet(
    idObjet int(10) PRIMARY KEY auto_increment,
    nom varchar(64) ,
    description text  DEFAULT NULL,
    prix float NOT NULL,
    idUser int(10),
    FOREIGN KEY(idUser) REFERENCES user(idUser)
);

CREATE TABLE Objet_Categorie(
    idObjet_Categorie int(10) PRIMARY KEY auto_increment,
    idCategorie int(10),
    idObjet int(10),
    FOREIGN KEY(idCategorie) REFERENCES categorie(idCategorie),
    FOREIGN KEY(idObjet) REFERENCES Objet(idObjet)
);


CREATE TABLE sary(
    idsary int(10) PRIMARY KEY auto_increment,
    path varchar(50),
    idObjet int(10),
    FOREIGN KEY(idObjet) REFERENCES Objet(idObjet)
);

CREATE TABLE echange(
    idEchange int(10) PRIMARY KEY auto_increment,
    idObjet1 int(10),
    idObjet2 int(10),
    Etat ENUM('-1','0','1'),
    dateAcceptation DATETIME
);

CREATE TABLE history_echange(
    idhistory_echange int(10) NOT NULL auto_increment,
    idObjet1 int(10),
    iduser_objet1 int(10),
    idObjet2 int(10),
    iduser_objet2 int(10),
    dateEchange DATETIME,
    FOREIGN KEY (idObjet1) REFERENCES Objet (idObjet),
    FOREIGN KEY (idObjet2) REFERENCES Objet (idObjet),
    FOREIGN KEY (iduser_objet1) REFERENCES user(idUser),
    FOREIGN KEY (iduser_objet2) REFERENCES user(idUser),
    PRIMARY KEY (idhistory_echange)
);


INSERT into user (nom,pwd,isAdmin) VALUES ('rod','0000','0');
INSERT into user (nom,pwd,isAdmin) VALUES ('fehizoro','0000','0');
INSERT into user (nom,pwd,isAdmin) VALUES ('faneva','0000','0');
INSERT into user (nom,pwd,isAdmin) VALUES ('admin','1234','1');


INSERT into categorie (nom) VALUES ('vetement');
INSERT into categorie (nom) VALUES ('esthetique');
INSERT into categorie (nom) VALUES ('decoration');
INSERT into categorie (nom) VALUES ('tech');

INSERT into Objet (nom,description,prix,idUser) VALUES ('Chaussure','Neuve et bonne qualite',40000,1);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Creme','Neuve et bonne qualite',20000,1);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Lampe','Neuve et bonne qualite',30000,2);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Casquette','Bonne qualite',50000,2);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Montre','Bon etat',20000,3);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Converse','Tres bon etat',405000,3);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Ecouteur','Neuve',60500,4);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Air max','Assez bon etat',44000,4);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Sweat UA','Neuf',45000,1);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Sweat','Neuve',40500,2);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Chaise','Quasi neuve',45000,3);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Chaise','Bon',4050,4);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Creme','Neuve',5000,3);
INSERT into Objet (nom,description,prix,idUser) VALUES ('Lunette','Sous carton',4050000,1);



INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (1,1);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (2,2);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (3,3);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (1,4);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (1,5);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (1,6);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (4,7);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (1,8);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (1,9);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (1,10);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (3,11);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (3,12);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (2,13);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (1,14);
INSERT into Objet_Categorie (idCategorie,idObjet) VALUES (3,14);



INSERT into sary (path,idObjet) VALUES ('assets/images/item1.jpg',1);
INSERT into sary (path,idObjet) VALUES ('assets/images/item2.jpg',2);
INSERT into sary (path,idObjet) VALUES ('assets/images/item3.jpg',3);
INSERT into sary (path,idObjet) VALUES ('assets/images/item4.jpg',4);
INSERT into sary (path,idObjet) VALUES ('assets/images/item5.jpg',5);
INSERT into sary (path,idObjet) VALUES ('assets/images/item6.jpg',6);
INSERT into sary (path,idObjet) VALUES ('assets/images/item7.jpg',7);
INSERT into sary (path,idObjet) VALUES ('assets/images/item8.jpg',8);
INSERT into sary (path,idObjet) VALUES ('assets/images/item9.jpg',9);
INSERT into sary (path,idObjet) VALUES ('assets/images/item10.jpg',10);
INSERT into sary (path,idObjet) VALUES ('assets/images/item11.jpg',11);
INSERT into sary (path,idObjet) VALUES ('assets/images/item12.jpg',12);
INSERT into sary (path,idObjet) VALUES ('assets/images/item13.jpg',13);
INSERT into sary (path,idObjet) VALUES ('assets/images/item14.jpg',14);







