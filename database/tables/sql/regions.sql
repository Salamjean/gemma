-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 21 août 2023 à 13:50
-- Version du serveur : 10.6.12-MariaDB-cll-lve
-- Version de PHP : 7.2.34gemma_code

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u651707526_prod_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'District autonome d\'Abidjan', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(2, 'District autonome de Yamoussoukro', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(3, 'Gbôkle', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(4, 'Nawa', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(5, 'San-Pédro', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(6, 'Indénié-Djuablin', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(7, 'Sud-Comoé', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(8, 'Folon', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(9, 'Kabadougou', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(10, 'Gôh', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(11, 'Lôh-Djiboua', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(12, 'Bélier', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(13, 'Iffou', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(14, 'Moronou', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(15, 'N\'Zi', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(16, 'Agnéby-Tiassa', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(17, 'Grands-Ponts', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(18, 'La Mé', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(19, 'Cavally', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(20, 'Guémon', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(21, 'Tonkpi', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(22, 'Haut-Sassandra', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(23, 'Marahoué', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(24, 'Bagoué', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(25, 'Poro', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(26, 'Tchologo', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(27, 'Gbêkê', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(28, 'Hambol', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(29, 'Bafing', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(30, 'Bounkani', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(31, 'Gontougo', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(32, 'Béré', '2023-05-15 20:26:16', '2023-05-15 20:26:16'),
(33, 'Worodougou', '2023-05-15 20:26:16', '2023-05-15 20:26:16');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regions_name_unique` (`name`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
