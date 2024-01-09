-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db:3306
-- Généré le : mar. 09 jan. 2024 à 07:37
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
(1, 'Zola', 'Emile'),
(2, 'Gibson', 'William'),
(3, 'Brown', 'Dan'),
(4, 'Austin', 'Jane'),
(5, 'Herbert', 'Frank'),
(6, 'Lee', 'Harper'),
(7, 'Marquez', 'Gabriel Garcia'),
(8, 'Fitzgerald', 'F.Scott'),
(9, 'Tolkien', 'J.R.R'),
(10, 'Rowling', 'J:K'),
(11, 'Sapkowski', 'Andrzej'),
(12, 'Yazawa', 'Ai');

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
(2, 'Le neuromancien', 350, 'Case was the sharpest...', 'Le roman suit Case, un hacker déchu, qui est recruté pour un dernier travail de piratage. Dans un futur où la technologie est omniprésente et la réalité virtuelle appelée le \"cyberespace\" est un nouvel horizon, Case s\'aventure dans un monde de conspirations, d\'intelligence artificielle et de manipulations. Ce livre explore des thèmes comme l\'identité, la technologie et la réalité, et a profondément influencé le genre cyberpunk.', 1984, 'neuromancer.jpg', 'Ace Books', 2, 2, 2),
(3, 'Le Da Vinci Code', 500, 'A gripping modern classic...', 'Dans \"Le Code Da Vinci\" de Dan Brown, le professeur Robert Langdon se trouve mêlé à un meurtre mystérieux au Louvre. Avec l\'aide de Sophie Neveu, cryptologue, ils découvrent des indices liés à l\'œuvre de Léonard de Vinci. Le roman mélange des énigmes historiques, des théories de conspiration, et des secrets de l\'Église catholique. Il pose des questions sur l\'histoire de Jésus-Christ et le rôle de Marie-Madeleine, offrant un mélange captivant de suspense, d\'histoire et de mystère.', 2003, 'theDaVinciCode.jpg', 'Doubleday', 3, 3, 3),
(4, 'Orgueil et préjugés', 400, 'It is a truth universally acknowledged...', '\"Orgueil et Préjugés\" de Jane Austen est un classique de la littérature romantique. Le livre suit Elizabeth Bennet, intelligente et indépendante, et son tumultueux rapport avec le fier Mr. Darcy. Dans un monde de conventions sociales strictes, Elizabeth navigue entre les préjugés et les malentendus pour découvrir l\'amour véritable. Austen y critique l\'influence de la classe et du statut sur les relations, et peint un portrait vivant de la société anglaise du début du XIXe siècle.', 1813, 'prideAndPrejudice.jpg', 'Thomas Egerton', 1, 4, 1),
(5, 'Dune', 600, 'In the far future...', '\"Dune\" de Frank Herbert est une épopée de science-fiction se déroulant sur la planète désertique Arrakis. L\'histoire suit Paul Atreides, héritier d\'une maison noble, alors que sa famille est trahie et détruite par ses rivaux. Paul s\'échappe dans le désert, s\'allie avec les Fremen indigènes, et devient le messianique Muad\'Dib. Le roman aborde des thèmes tels que la politique, l\'écologie, et la religion, et est connu pour son univers complexe et sa profondeur philosophique.', 1965, 'dune.jpg', 'Chilton Books', 2, 5, 2),
(6, 'Ne tirez pas sur l\'oiseau moqueur', 320, 'When he was nearly thirteen...', 'Dans \"Ne tirez pas sur l\'oiseau moqueur\" de Harper Lee, Scout Finch raconte son enfance dans une petite ville du sud des États-Unis. Son père, l\'avocat Atticus Finch, défend un homme noir accusé à tort de viol. Le roman explore les thèmes du racisme, de l\'injustice et de la perte de l\'innocence à travers les yeux d\'une enfant. Il est salué pour sa chaleur et son humour, tout en traitant de sujets graves et complexes.', 1960, 'mockingbird.png', 'J.B. Lippincott & Co.', 3, 6, 6),
(7, 'Cent ans de solitude', 450, 'Many years later...', '\"Cent ans de solitude\" de Gabriel García Márquez est un chef-d\'œuvre du réalisme magique. Le roman raconte l\'histoire de la famille Buendía sur plusieurs générations dans le village fictif de Macondo. Mêlant le fantastique et le réel, il explore les thèmes de la solitude, du destin, et de l\'histoire cyclique. Le style unique de Márquez et sa façon de tisser des éléments surnaturels dans une narration réaliste ont établi ce livre comme un pilier de la littérature mondiale.', 1967, 'oneHundredYearsOfSolitude.jpg', 'Harper & Row', 1, 7, 8),
(8, 'Gatsby le magnifique', 250, 'In my younger and more vulnerable years...', 'Dans \"The Great Gatsby\" de F. Scott Fitzgerald, le narrateur, Nick Carraway, raconte l\'histoire de son voisin mystérieux, Jay Gatsby. Gatsby, un homme riche et charismatique, organise de somptueuses fêtes dans l\'espoir de reconquérir son ancien amour, Daisy Buchanan. Situé dans les années 1920 à New York, le roman dépeint la poursuite du rêve américain, l\'illusion du bonheur matériel, et la corruption morale de la haute société.', 1925, 'theGreatGatsby.jpg', 'Charles Scribners Sons', 2, 8, 6),
(9, 'Le Hobbit', 320, 'In a hole in the ground there lived a hobbit...', 'Dans \"The Hobbit\" de J.R.R. Tolkien, Bilbon Sacquet, un hobbit paisible, est entraîné dans une quête épique par le sage magicien Gandalf et un groupe de nains. Ils cherchent à récupérer leur trésor volé par le dragon Smaug. Le voyage de Bilbon le mène à affronter des dangers, à découvrir un anneau puissant et à se transformer en un héros improbable. Ce récit de courage et d\'amitié pose les bases du monde plus vaste de la Terre du Milieu.', 1937, 'theHobbit.jpg', 'George Allen & Unwin', 3, 9, 4),
(10, 'Harry Potter à l\'école des sorciers', 400, 'Mr. and Mrs. Dursley...', 'C\'est l\'histoire d\'Harry Potter, un jeune garçon qui découvre qu\'il est un sorcier le jour de son 11ème anniversaire. Envoyé à l\'école de sorcellerie de Poudlard, Harry se lie d\'amitié avec Ron Weasley et Hermione Granger. Ensemble, ils découvrent un complot lié à la pierre philosophale et affrontent le maléfique Voldemort. Ce premier livre est un mélange captivant de magie, d\'aventure, et de l\'importance de l\'amitié.', 1997, 'sorcerersStone.jpg', 'Bloomsbury', 1, 10, 4),
(11, 'Le sorceleur', 222, 'urlPDF', 'Ce livre raconte l\'histoire de Geralt de Riv, un chasseur de monstres professionnel dans un monde médiéval fantastique. Geralt, doté de pouvoirs surnaturels, navigue dans un monde moral complexe, luttant contre des créatures dangereuses tout en étant souvent confronté à des choix éthiques difficiles. Le livre mêle des éléments de mythologie slave, de politique et de magie, et explore les thèmes de la destinée, de l\'amour et de l\'humanité.', 1999, 'theWitcher.jpg', 'Bloomsbury', 1, 11, 4),
(12, 'Nana', 100, 'urlPDF', '\"Nana\", un manga de Ai Yazawa, suit les vies croisées de deux jeunes femmes nommées Nana. Nana Osaki est une chanteuse punk ambitieuse, tandis que Nana Komatsu est une fille rêveuse à la recherche de l\'amour. À Tokyo, leurs chemins se croisent et elles deviennent colocataires. Le manga explore les thèmes de l\'amour, de l\'amitié, et des défis de la vie adulte, tout en présentant le monde de la musique rock japonaise.', 2000, 'Nana-T01.jpg', 'Shueisha', 1, 12, 1);

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
(4, 'Fantasy'),
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
  `evaGrade` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_evaluation`
--

INSERT INTO `t_evaluation` (`fkBook`, `fkUser`, `evaGrade`) VALUES
(2, 1, 1),
(2, 2, 3),
(2, 3, 5),
(3, 1, 1),
(3, 2, 3),
(3, 3, 5),
(4, 1, 1),
(4, 2, 3),
(4, 3, 5),
(5, 1, 1),
(5, 2, 3),
(5, 3, 5),
(6, 1, 1),
(6, 2, 3),
(6, 3, 5),
(7, 1, 1),
(7, 2, 3),
(7, 3, 5),
(8, 1, 1),
(8, 2, 3),
(8, 3, 5),
(9, 1, 1),
(9, 2, 3),
(9, 3, 5),
(10, 1, 1),
(10, 2, 3),
(10, 3, 5),
(12, 1, 5);

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

INSERT INTO `t_user` (`idUser`, `useLogin`, `usePassword`, `useAdmin`, `useRegisterDate`) VALUES
(1, 'Alice', '$2a$12$q51NrqV8xgUT4xrHqBZlfOWIBF8czFKH5YisPOL9XCbC2e5HQg0d2', 1, '2022-01-15'),
(2, 'Bob', '$2a$12$9pZivQ4E014jyiQfE1Wczu95GTv6LEGnE0aWxNUR1p/hicBB3ZO6a', 0, '2021-05-20'),
(3, 'Charlie', '$2a$12$TkSE1WqcsKCz6j8/NZkrbejYkoTvpva/V1/QlmCiF3mxkUmemCxpK', 1, '2020-08-10');

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
  MODIFY `idAuthor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `t_book`
--
ALTER TABLE `t_book`
  MODIFY `idBook` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
