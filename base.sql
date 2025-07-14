create database finalbase;

use finalbase;

create table
    final_membre (
        id_membre int AUTO_INCREMENT,
        nom varchar(50),
        date_de_naissance DATE,
        genre char,
        email varchar(75),
        ville varchar(50),
        mdp varchar(50),
        image_profil varchar(150),
        primary key (id_membre)
    );

create table
    final_categorie_objet (
        id_categorie int AUTO_INCREMENT,
        nom_categorie varchar(50),
        primary key (id_categorie)
    );

create table
    final_objet (
        id_objet int AUTO_INCREMENT,
        nom_objet varchar(50),
        id_categorie int,
        id_membre int,
        primary key (id_objet),
        FOREIGN KEY (id_categorie) REFERENCES final_categorie_objet (id_categorie) ON DELETE CASCADE,
        FOREIGN KEY (id_membre) REFERENCES final_membre (id_membre) ON DELETE CASCADE
    );

create table
    final_images_objet (
        id_image int AUTO_INCREMENT,
        id_objet int,
        id_membre int,
        date_emprunt date,
        date_retour date,
        primary key (id_image),
        FOREIGN KEY (id_objet) REFERENCES final_objet (id_objet) ON DELETE CASCADE,
        FOREIGN KEY (id_membre) REFERENCES final_membre (id_membre) ON DELETE CASCADE
    );

    