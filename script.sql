drop database if exists crud;

create database crud;

use crud;

create table etudiant(
    id int(4) primary key auto_increment,
    nom varchar(20),
    prenom varchar(100),
    filiere varchar(10),
    scolarite DECIMAL(10,2) DEFAULT NULL
);