-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db:3306
-- Généré le : lun. 18 déc. 2023 à 18:20
-- Version du serveur : 8.0.30
-- Version de PHP : 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_library`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_author`
--

CREATE TABLE `t_author` (
  `idAuthor` int NOT NULL,
  `autLastName` varchar(50) DEFAULT NULL,
  `autFirstName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_author`
--

INSERT INTO `t_author` (`idAuthor`, `autLastName`, `autFirstName`) VALUES
(1, 'Smith', 'John'),
(2, 'Johnson', 'Mary'),
(3, 'Brown', 'David'),
(4, 'Wilson', 'Emma'),
(5, 'Miller', 'James'),
(6, 'Davis', 'Sophia'),
(7, 'Garcia', 'Michael'),
(8, 'Rodriguez', 'Emily'),
(9, 'Martinez', 'Daniel'),
(10, 'Jackson', 'Olivia');

-- --------------------------------------------------------

--
-- Structure de la table `t_book`
--

CREATE TABLE `t_book` (
  `idBook` int NOT NULL,
  `booTitle` varchar(50) DEFAULT NULL,
  `booNumberPages` int DEFAULT NULL,
  `booExcerpt` varchar(50) DEFAULT NULL,
  `booSummary` varchar(500) DEFAULT NULL,
  `booEditionYear` int DEFAULT NULL,
  `booImageURL` varchar(200) DEFAULT NULL,
  `booEditorName` varchar(50) DEFAULT NULL,
  `fkUser` int NOT NULL,
  `fkAuthor` int NOT NULL,
  `fkCategory` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_book`
--

INSERT INTO `t_book` (`idBook`, `booTitle`, `booNumberPages`, `booExcerpt`, `booSummary`, `booEditionYear`, `booImageURL`, `booEditorName`, `fkUser`, `fkAuthor`, `fkCategory`) VALUES
(1, 'The Secret Garden', 300, 'An enchanting story...', 'Discover the magic...', 1998, 'secret_garden.jpg', 'Vintage Books', 1, 1, 1),
(2, 'Neuromancer', 350, 'Case was the sharpest...', 'A classic in cyberpunk...', 1984, 'neuromancer.jpg', 'Ace Books', 2, 2, 2),
(3, 'The Da Vinci Code', 500, 'A gripping modern classic...', 'Crack the code...', 2003, 'da_vinci_code.jpg', 'Doubleday', 3, 3, 3),
(4, 'Pride and Prejudice', 400, 'It is a truth universally acknowledged...', 'A timeless love story...', 1813, 'pride_prejudice.jpg', 'Thomas Egerton', 1, 4, 1),
(5, 'Dune', 600, 'In the far future...', 'A sci-fi masterpiece...', 1965, 'dune.jpg', 'Chilton Books', 2, 5, 2),
(6, 'To Kill a Mockingbird', 320, 'When he was nearly thirteen...', 'A powerful tale of justice...', 1960, 'mockingbird.jpg', 'J.B. Lippincott & Co.', 3, 6, 3),
(7, 'One Hundred Years of Solitude', 450, 'Many years later...', 'A magical realist epic...', 1967, 'solitude.jpg', 'Harper & Row', 1, 7, 1),
(8, 'The Great Gatsby', 250, 'In my younger and more vulnerable years...', 'A portrait of the Jazz Age...', 1925, 'gatsby.jpg', 'Charles Scribners Sons', 2, 8, 2),
(9, 'The Hobbit', 320, 'In a hole in the ground there lived a hobbit...', 'A classic fantasy adventure...', 1937, 'hobbit.jpg', 'George Allen & Unwin', 3, 9, 3),
(10, 'Harry Potter and the Sorcerers Stone', 400, 'Mr. and Mrs. Dursley...', 'The start of a magical journey...', 1997, 'harry_potter.jpg', 'Bloomsbury', 1, 10, 1),
(11, 'The Witcher', 222, 'urlPDF', 'The start of a magical journey...', 1999, 'harry_potter.jpg', 'Bloomsbury', 1, 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_category`
--

CREATE TABLE `t_category` (
  `idCategory` int NOT NULL,
  `catName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_category`
--

INSERT INTO `t_category` (`idCategory`, `catName`) VALUES
(1, 'Romance'),
(2, 'Science-Fiction'),
(3, 'Thriller'),
(4, 'Essay'),
(5, 'Poetry'),
(6, 'Classics'),
(7, 'Horror'),
(8, 'Historical Fiction');

-- --------------------------------------------------------

--
-- Structure de la table `t_evaluation`
--

CREATE TABLE `t_evaluation` (
  `fkBook` int NOT NULL,
  `fkUser` int NOT NULL,
  `evaluation` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` int NOT NULL,
  `useLogin` varchar(50) DEFAULT NULL,
  `usePassword` varchar(255) NOT NULL,
  `useAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `useRegisterDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `useLogin`, `usePassword`, `useAdmin`, `useRegisterDate`, `useNumberBooks`, `useNumberReviews`) VALUES
(1, 'Alice', 'alice', 1, '2022-01-15'),
(2, 'Bob', 'bob', 0, '2021-05-20'),
(3, 'Charlie', 'charlie', 1, '2020-08-10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_author`
--
ALTER TABLE `t_author`
  ADD PRIMARY KEY (`idAuthor`);

--
-- Index pour la table `t_book`
--
ALTER TABLE `t_book`
  ADD PRIMARY KEY (`idBook`),
  ADD KEY `fkUser` (`fkUser`),
  ADD KEY `fkAuthor` (`fkAuthor`),
  ADD KEY `fkCategory` (`fkCategory`);

--
-- Index pour la table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `t_evaluation`
--
ALTER TABLE `t_evaluation`
  ADD PRIMARY KEY (`fkBook`,`fkUser`),
  ADD KEY `fkUser` (`fkUser`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_author`
--
ALTER TABLE `t_author`
  MODIFY `idAuthor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `t_book`
--
ALTER TABLE `t_book`
  MODIFY `idBook` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `idCategory` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_book`
--
ALTER TABLE `t_book`
  ADD CONSTRAINT `t_book_ibfk_1` FOREIGN KEY (`fkUser`) REFERENCES `t_user` (`idUser`),
  ADD CONSTRAINT `t_book_ibfk_2` FOREIGN KEY (`fkAuthor`) REFERENCES `t_author` (`idAuthor`),
  ADD CONSTRAINT `t_book_ibfk_3` FOREIGN KEY (`fkCategory`) REFERENCES `t_category` (`idCategory`);

--
-- Contraintes pour la table `t_evaluation`
--
ALTER TABLE `t_evaluation`
  ADD CONSTRAINT `t_evaluation_ibfk_1` FOREIGN KEY (`fkBook`) REFERENCES `t_book` (`idBook`),
  ADD CONSTRAINT `t_evaluation_ibfk_2` FOREIGN KEY (`fkUser`) REFERENCES `t_user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
