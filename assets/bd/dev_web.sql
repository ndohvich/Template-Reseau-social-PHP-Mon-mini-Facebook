-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 13 mai 2020 à 10:02
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dev_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `cc`, `url`) VALUES
(5, 'cahier_des_charges_ecommerce.pdf', 'assets/cours/cahier_des_charges_ecommerce.pdf'),
(6, 'Conception et Realisation d\'un - Widad CHOUEF_3993.pdf', 'assets/cours/Conception et Realisation d\'un - Widad CHOUEF_3993.pdf'),
(7, 'LaFabriqueduNet_Cahier_des_charges_de_site_ecommerce_2.pdf', 'assets/cours/LaFabriqueduNet_Cahier_des_charges_de_site_ecommerce_2.pdf'),
(8, 'CV-jules-ndoh.pdf', 'assets/cours/CV-jules-ndoh.pdf'),
(9, 'doc maman.pdf', 'assets/cours/doc maman.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE `inscrit` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscrit`
--

INSERT INTO `inscrit` (`id`, `pseudo`, `mail`, `mdp`, `facebook`, `twitter`, `avatar`, `tel`) VALUES
(1, 'ndoh', 'ndohvich@gmail.com', 'f355e4700da9034be38f4e4d7f5adea770497783', '', '', '1.jpg', '695994054'),
(4, 'obam', 'obam@gmail.com', '199839904026c820c6280bc6a4a0c5afccbe269b', '', '', '4.jpg', ''),
(6, 'mouzong', 'mouzong@gmail.com', 'f355e4700da9034be38f4e4d7f5adea770497783', '', '', '6.jpg', ''),
(7, 'ndohvich', 'ndohmoise@gmail.com', 'f355e4700da9034be38f4e4d7f5adea770497783', '', '', '7.jpg', ''),
(8, 'mefy', 'mefy.yannick@yahoo.fr', '58ad983135fe15c5a8e2e15fb5b501aedcf70dc2', '', '', '8.jpg', ''),
(9, 'zeze', 'zeze@gmail.com', '7c58c469c4a193db75bd91d8a5a36e8ba9c58fb4', '', '', '9.jpeg', ''),
(10, 'mathz', 'mathz@gmail.com', '4b2db5d0d540373ba76e8cfe9e1c6ed98f42820b', '', '', '10.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `noms_cours` varchar(255) NOT NULL,
  `notes_cc` varchar(255) NOT NULL,
  `notes_exam` varchar(255) NOT NULL,
  `notes_final` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`id`, `pseudo`, `noms_cours`, `notes_cc`, `notes_exam`, `notes_final`) VALUES
(61, 'obam', 'génie logiciel', '15', '14', '14,3'),
(62, 'ndoh', 'génie logiciel', '8', '11', '11,9'),
(63, 'mouzong', 'génie logiciel', '18', '9', '11,7'),
(64, 'ngo lissom', 'génie logiciel', '14', '14', '14'),
(65, 'ekotto', 'génie logiciel', '15', '15', '15'),
(66, 'willy', 'génie logiciel', '9', '18', '15,3'),
(67, 'barthelemy', 'génie logiciel', '17', '18', '17,7'),
(68, 'mekongo', 'génie logiciel', '5', '16', '12,7'),
(69, 'parfait', 'génie logiciel', '15,5', '14,5', '14,8'),
(70, 'boris', 'génie logiciel', '14', '18', '16,8'),
(71, 'obam', 'génie logiciel', '15', '14', '14,3'),
(72, 'ndoh', 'génie logiciel', '8', '11', '15'),
(73, 'mouzong', 'génie logiciel', '18', '9', '11,7'),
(74, 'ngo lissom', 'génie logiciel', '14', '14', '14'),
(75, 'ekotto', 'génie logiciel', '15', '15', '15'),
(76, 'willy', 'génie logiciel', '9', '18', '15,3'),
(77, 'barthelemy', 'génie logiciel', '17', '18', '17,7'),
(78, 'mekongo', 'génie logiciel', '5', '16', '12,7'),
(79, 'parfait', 'génie logiciel', '15,5', '14,5', '14,8'),
(80, 'boris', 'génie logiciel', '14', '18', '16,8');

-- --------------------------------------------------------

--
-- Structure de la table `tp_td_corrections`
--

CREATE TABLE `tp_td_corrections` (
  `id_td_tp_correction` int(11) NOT NULL,
  `corr` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tp_td_corrections`
--

INSERT INTO `tp_td_corrections` (`id_td_tp_correction`, `corr`, `url`) VALUES
(1, '213102f.pdf', 'assets/cours/213102f.pdf'),
(2, 'theme de memoire plan de travail.pdf', 'assets/cours/theme de memoire plan de travail.pdf');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `inscrit`
--
ALTER TABLE `inscrit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tp_td_corrections`
--
ALTER TABLE `tp_td_corrections`
  ADD PRIMARY KEY (`id_td_tp_correction`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `inscrit`
--
ALTER TABLE `inscrit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT pour la table `tp_td_corrections`
--
ALTER TABLE `tp_td_corrections`
  MODIFY `id_td_tp_correction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
