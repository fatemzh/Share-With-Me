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

--
-- Structure de la table `t_category`
--

CREATE TABLE t_category(
   `idCategory` INT AUTO_INCREMENT,
   `catName` VARCHAR(50),
   PRIMARY KEY(`idCategory`)
);

--
-- Structure de la table `t_user`
--

CREATE TABLE t_user(
   `idUser` INT AUTO_INCREMENT,
   `useNickname` VARCHAR(50),
   `useRegisterDate` INT,
   `useNumberBooks` INT,
   `useNumberReviews` INT,
   PRIMARY KEY(`idUser`)
);

--
-- Structure de la table `t_book`
--

CREATE TABLE t_book(
   `idBook` INT AUTO_INCREMENT,
   `booTitle` VARCHAR(50),
   `booNumberPages` INT,
   `booExcerpt` VARCHAR(50),
   `booResume` VARCHAR(500),
   `booEditionYear` INT,
   `booImageURL` VARCHAR(200),
   `booEditorName` VARCHAR(50),
   `fkUser` INT NOT NULL,
   `fkAuthor` INT NOT NULL,
   `fkCategory` INT NOT NULL,
   PRIMARY KEY(`idBook`),
   FOREIGN KEY(`fkUser`) REFERENCES t_user(`idUser`),
   FOREIGN KEY(`fkAuthor`) REFERENCES t_author(`idAuthor`),
   FOREIGN KEY(`fkCategory`) REFERENCES t_category(`idCategory`)
);

--
-- Structure de la table `t_evaluate`
--

CREATE TABLE t_evaluation(
   `fkBook` INT,
   `fkUser` INT,
   `evaluation` TINYINT,
   PRIMARY KEY(`fkBook`, `fkUser`),
   FOREIGN KEY(`fkBook`) REFERENCES t_book(`idBook`),
   FOREIGN KEY(`fkUser`) REFERENCES t_user(`idUser`)
);
