-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db:3306
-- Généré le : mar. 12 déc. 2023 à 11:15
-- Version du serveur : 8.0.30
-- Version de PHP : 8.0.27

--
-- Base de données : `db_library`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_author`
--

CREATE TABLE t_author(
   `idAuthor` INT AUTO_INCREMENT,
   `autLastName` VARCHAR(50),
   `autFirstName` VARCHAR(50),
   PRIMARY KEY(`idAuthor`)
);

CREATE TABLE t_category(
   `idCategory` INT AUTO_INCREMENT,
   `catName` VARCHAR(50),
   PRIMARY KEY(`idCategory`)
);

CREATE TABLE t_user(
   `idUser` INT AUTO_INCREMENT,
   `utiNickname` VARCHAR(50),
   utiDateEntree INT,
   utiNombreOuvrages INT,
   utiNombreAppreciations INT,
   PRIMARY KEY(id_utilisateur)
);

CREATE TABLE t_ouvrage(
   id_ouvrage INT,
   ouvTitre VARCHAR(50),
   ouvNombrePages INT,
   ouvExtrait VARCHAR(50),
   ouvResume VARCHAR(50),
   ouvAnneeEdition INT,
   ouvCheminImage VARCHAR(200),
   ouvNomEditeur VARCHAR(50),
   fkUtilisateur INT NOT NULL,
   fkAuteur INT NOT NULL,
   fkCategorie INT NOT NULL,
   PRIMARY KEY(id_ouvrage),
   FOREIGN KEY(fkUtilisateur) REFERENCES t_utilisateur(id_utilisateur),
   FOREIGN KEY(fkAuteur) REFERENCES t_auteur(id_auteur),
   FOREIGN KEY(fkCategorie) REFERENCES t_categorie(id_categorie)
);

CREATE TABLE t_evaluer(
   fkOuvrage INT,
   fkUtilisateur INT,
   note TINYINT,
   PRIMARY KEY(fkOuvrage, fkUtilisateur),
   FOREIGN KEY(fkOuvrage) REFERENCES t_ouvrage(id_ouvrage),
   FOREIGN KEY(fkUtilisateur) REFERENCES t_utilisateur(id_utilisateur)
);
