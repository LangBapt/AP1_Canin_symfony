-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 18 oct. 2024 à 07:22
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbcanineo`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_user_id` int DEFAULT NULL,
  `desc_avis` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_8F91ABF0626DC97C` (`num_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_user_id` int DEFAULT NULL,
  `nom_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_contact` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_tel_contact` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_contact` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_4C62E638626DC97C` (`num_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20241004143344', '2024-10-04 14:34:11', 967),
('DoctrineMigrations\\Version20241011115327', '2024-10-11 11:54:19', 199),
('DoctrineMigrations\\Version20241011120654', '2024-10-11 12:07:04', 77),
('DoctrineMigrations\\Version20241011143244', '2024-10-11 14:33:16', 1387);

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `texte_presentation` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `titre_presentation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `presentation`
--

INSERT INTO `presentation` (`id`, `texte_presentation`, `titre_presentation`) VALUES
(1, 'À propos de Caninéo et de Jack Russel', 'À propos de Caninéo et de Jack Russel'),
(2, 'Fort d\'une expérience de plus de 15 ans au contact de chiens de toutes races et tailles, Jack Russel a toujours eu une affinité particulière avec nos compagnons à quatre pattes. Dès son plus jeune âge, il a été entouré par des chiens et a développé une passion pour leur bien-être, leur éducation et leur bonheur. Aujourd\'hui, grâce à son expertise et son amour des animaux, il vous propose une gamme complète de services spécialement conçus pour répondre aux besoins de vos chiens.', 'Qui est Jack Russel ?'),
(3, 'Au fil des années, Jack a eu l\'occasion de travailler avec une grande variété de races, allant des petits chiens de compagnie comme le Chihuahua et le Beagle, aux plus grands comme le Berger Allemand et le Dogue Argentin. Grâce à cette diversité, il a pu acquérir une connaissance approfondie des comportements spécifiques de chaque race et a su s\'adapter aux besoins uniques de chaque chien.\r\n\r\nJack a également suivi plusieurs formations spécialisées dans le comportement canin, l\'éducation positive et les soins canins, afin de toujours offrir le meilleur pour les chiens et leurs propriétaires. Sa volonté de rester à la pointe des innovations dans le domaine lui permet de proposer des prestations de haute qualité, basées sur des méthodes douces et efficaces.', 'Son parcours et ses expériences'),
(4, 'Sur Caninéo, Jack et son équipe offrent une large gamme de services pour répondre aux différents besoins de vos chiens. Que vous ayez un chiot à éduquer, un chien adulte à entraîner ou simplement besoin d\'un coup de main pour prendre soin de votre animal, nous sommes là pour vous aider.', 'Les prestations proposées par Caninéo'),
(5, 'Grâce à des méthodes d’éducation positive, nous vous aidons à instaurer une relation saine et harmonieuse avec votre chien. Nos séances d\'éducation s\'adaptent à l\'âge, à la race et au caractère de chaque chien. De l\'obéissance de base à la résolution de comportements problématiques, Jack saura vous guider à chaque étape.', '1. Éducation canine'),
(6, 'Pour que votre chien soit toujours propre et en pleine forme, nous proposons des services de toilettage adaptés à chaque race : bain, coupe, brossage, soins des griffes, et plus encore. Votre compagnon mérite le meilleur !', '2. Toilettage'),
(7, 'Besoin de vous absenter ? Nous offrons un service de garde et de pension dans un environnement chaleureux et sécurisé. Que ce soit pour une journée ou une période plus longue, vous pouvez partir l\'esprit tranquille, en sachant que votre chien est entre de bonnes mains.', '3. Garde de chiens et pension'),
(8, 'Pour ceux qui n’ont pas toujours le temps de sortir leur chien, Caninéo propose un service de promenade. Votre chien profitera de sorties régulières et adaptées à ses besoins d’exercice et de socialisation.', '4. Promenade'),
(9, 'L’alimentation joue un rôle clé dans la santé et le bien-être de votre chien. Nous vous conseillons sur les meilleures options alimentaires et vous aidons à choisir les produits qui correspondent aux besoins spécifiques de votre animal.', '5. Conseils en alimentation et bien-être'),
(10, 'Avec Caninéo, Jack Russel s\'engage à prendre soin de votre chien comme s\'il s\'agissait du sien. Son objectif est simple : améliorer la qualité de vie de chaque chien, tout en offrant aux propriétaires un accompagnement personnalisé et bienveillant. Faites confiance à un expert passionné, pour des prestations canines de qualité !', 'Caninéo'),
(11, 'Si vous avez des questions ou souhaitez en savoir plus, n’hésitez pas à nous contacter via notre formulaire de contact ou à consulter nos prestations détaillées sur la page dédiée. Caninéo, pour le bien-être et la joie de vos chiens.', 'Comment nous contacter');

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

DROP TABLE IF EXISTS `prestation`;
CREATE TABLE IF NOT EXISTS `prestation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre_presta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texte_presta` longtext COLLATE utf8mb4_unicode_ci,
  `prix_horaire_presta` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id`, `titre_presta`, `texte_presta`, `prix_horaire_presta`) VALUES
(1, 'Séance d\'éducation canine', 'Jacques Russel propose des séances d\'éducation canine personnalisées pour renforcer la relation maître-chien. Basées sur des méthodes positives, ces séances enseignent des commandes essentielles comme \'assis\', \'rappel\', et \'marche en laisse\', tout en corrigeant les comportements indésirables (sauts, aboiements). Chaque séance est adaptée au tempérament du chien, avec des moments de détente pour favoriser un apprentissage efficace et une intégration harmonieuse dans son environnement.', 45),
(3, 'Séance d\'éducation pour chiots', 'Offrez à votre chiot les bases d’une éducation solide dès ses premiers mois ! Jacques Russel propose des séances dédiées à la socialisation, à l\'apprentissage de la propreté et aux commandes de base (\"assis\", \"rappel\"). Ces séances l’aident à grandir dans un environnement équilibré et à devenir un compagnon obéissant et bien dans sa peau.', 55),
(4, 'Garde du chien', 'Jacques Russel se propose à prendre soin de votre compagnon canin lorsque vous partez en vacances par exemple ou pour tout autre voyage impossible à réaliser avec votre chien.', 1),
(5, 'Entraînement sportif', 'Séance d\'entraînement pour diverses compétitions canines', 50);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(2, 'admin@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$CyF27DtvOIBFiUTZXgVUeuQCCxrr1xhbYqnwZ0Y0DLKMSrt3iZrEm'),
(3, 'langbapt@gmail.com', '[]', '$2y$13$RkiA4NxWThVVqJgecIju5OzSX4Uc9ALxnMsvvoaF2UcfazX6gYrJW');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `FK_8F91ABF0626DC97C` FOREIGN KEY (`num_user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_4C62E638626DC97C` FOREIGN KEY (`num_user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
