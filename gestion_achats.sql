-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 19 juin 2022 à 20:54
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_achats`
--

DELIMITER $$
--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `montant_achats` () RETURNS INT(11) BEGIN

   DECLARE mt_achats INT;

    set mt_achats=(select sum(montant_total) from achats);
   

   RETURN mt_achats;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

CREATE TABLE `achats` (
  `id_achat` bigint(20) UNSIGNED NOT NULL,
  `libellé` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_achat` date NOT NULL,
  `montant_total` double NOT NULL,
  `bon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Agent` bigint(20) UNSIGNED NOT NULL,
  `fournisseur` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `achats`
--

INSERT INTO `achats` (`id_achat`, `libellé`, `date_achat`, `montant_total`, `bon`, `Agent`, `fournisseur`, `created_at`, `updated_at`) VALUES
(1, 'imprimante', '2022-05-31', 1200, NULL, 8, 7, '2022-05-31 20:57:33', '2022-05-31 20:57:33'),
(2, 'Bureau', '2022-06-04', 2000, NULL, 8, 6, '2022-05-31 20:57:58', '2022-05-31 20:57:58'),
(3, 'Pc portable', '2022-06-05', 3000, NULL, 7, 6, '2022-05-31 20:59:09', '2022-05-31 20:59:09'),
(4, '3 tapis souris', '2022-06-05', 150, NULL, 7, 6, '2022-05-31 21:00:04', '2022-05-31 21:00:04'),
(9, 'imprimante', '2022-06-20', 1212, 'Khadija Marrake.pdf', 15, 9, '2022-06-16 19:14:38', '2022-06-16 19:14:38');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `achats_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `achats_view` (
`id_achat` bigint(20) unsigned
,`libellé` varchar(255)
,`date_achat` date
,`montant_total` double
,`nom` varchar(255)
,`Agent` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `achats_view_v2`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `achats_view_v2` (
`id_achat` bigint(20) unsigned
,`libellé` varchar(255)
,`date_achat` date
,`montant_total` double
,`fournisseur` varchar(255)
,`agent` varchar(511)
,`id_agent` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id_frn` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_frn`, `nom`, `adresse`, `telephone`, `created_at`, `updated_at`) VALUES
(6, 'STE Olas', 'sidi maarouf casablanca', '06121912921', '2022-05-31 20:56:18', '2022-05-31 20:56:18'),
(7, 'STE Nabil', 'Atlas', '0612181917', '2022-05-31 20:57:15', '2022-05-31 20:57:15'),
(9, 'ham', 'bilal', '121212', '2022-06-16 19:13:51', '2022-06-16 19:14:10');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `frn_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `frn_view` (
`id_frn` bigint(20) unsigned
,`nom` varchar(255)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `frn_view_details`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `frn_view_details` (
`id_frn` bigint(20) unsigned
,`nom` varchar(255)
,`adresse` varchar(255)
,`telephone` varchar(255)
,`nb_achats` bigint(21)
,`mt_achats` double
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `frn_view_v2`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `frn_view_v2` (
`id_frn` bigint(20) unsigned
,`nom` varchar(255)
,`adresse` varchar(255)
,`telephone` varchar(255)
,`libellé` varchar(255)
,`montant_total` double
);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2022_05_24_201515_create_fournisseurs_table', 2),
(20, '2022_05_24_201429_create_achats_table', 3);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `montant_view`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `montant_view` (
`montant` double
);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bilalbajou05@gmail.com', '$2y$10$sSUmr.QFEQDGskbVlcMRQejX.MI/unCk6BRhKbyrL8s0tAkGFjRVu', '2022-06-07 23:11:33');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_utilisateur` enum('agent','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat_compte` enum('A','D') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `email`, `email_verified_at`, `password`, `type_utilisateur`, `etat_compte`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'bilal', 'bajou', 'bajoubilal34@gmail.com', NULL, '$2y$10$yFzmEX6UxD5hYh.pwbsy1uEdom2J0TldL/DnKH9emTMcB3T7rt6Cq', 'admin', 'A', '40p9cEabpZ9eWi7q2sTOvF668u76BII7E7mQjM72grpaxk1WHmo86WCcQlBK', '2022-05-29 11:13:37', '2022-06-16 21:40:10'),
(5, 'bakkali', 'ahmed', 'bakkaliahmed@gmail.com', NULL, '5d368f3676d01ffbdbf1af8cf02854ee', 'agent', 'A', NULL, '2022-05-31 19:24:55', '2022-06-14 12:49:43'),
(6, 'mousssaoui', 'khadija', 'khadija@gmail.com', NULL, '$2y$10$71fgcFHpxKxZCIIrjXqNs.LzHA6piUpTjFWE48/DluVY776mhL.tW', 'agent', 'A', NULL, '2022-05-31 19:26:57', '2022-06-14 12:40:22'),
(7, 'mohammadi', 'hamza', 'hamza01@gmail.com', NULL, '$2y$10$HBIW7wbln38LWI8qZ1.GX.y8QMT9n5xMFr5wh74MycbiMlvM9hPaS', 'agent', 'A', NULL, '2022-05-31 19:32:41', '2022-05-31 19:32:41'),
(8, 'filali', 'yahya', 'filali@gmail.com', NULL, '$2y$10$4ZLvUHB3oLpi4YRXzQg/MeDRQlLV1d.VjUY6GxDou3LHKm4oCd9Ni', 'agent', 'A', NULL, '2022-05-31 19:33:16', '2022-05-31 19:33:16'),
(9, 'falih', 'othmane', 'falih@gmail.com', NULL, '$2y$10$VMCH4eh7mDew3jJ6jKuRzOFGWFfaR79Zit3GBGoGT7Ipz559gEae6', 'agent', 'A', NULL, '2022-05-31 19:34:43', '2022-05-31 19:34:43'),
(10, 'bilal', 'ouzani', 'ouzanibilal@gmail.com', NULL, '$2y$10$UCFdpPHf6B/QxMjv/frhe.zvHUxleAtMX2u/UeJf6DdWTYSUQti4a', 'agent', 'A', NULL, '2022-06-03 22:21:59', '2022-06-03 22:21:59'),
(11, 'filali moha', 'ouzani', 'czazd@gmail.com', NULL, '$2y$10$d3mHTzou87sV4zxNXDwdUeSO5D0OGNItf3dDVS8484pE7HUL3e.J6', 'agent', 'A', NULL, '2022-06-06 16:45:27', '2022-06-06 16:45:27'),
(12, 'hamza', 'filali', 'exemple@gmail.com', NULL, '$2y$10$k.e.K/BSxrNIJJ0rB8U9feNCcg45edJ2NwLHBfghTzOhvMS7mtPfe', 'agent', 'A', NULL, '2022-06-07 17:48:26', '2022-06-07 17:48:26'),
(13, 'dsds ddsdsd', 'qsdsqd', 'bilalbajou05@gmail.com', NULL, '$2y$10$OpT.2M9EpLntlvTkKn0EW.ES/39VfezWe1HHrmlSqiLeS4y0j6IFS', 'agent', 'A', NULL, '2022-06-07 19:41:22', '2022-06-07 19:41:22'),
(15, 'dsds ddsdsd', 'ouzani', 'karimahmadi@gmail.com', NULL, '$2y$10$mbLyN5VesbGE.K80TiGd.uc/DmTe70jO96a/7.RkiHvBKzgnddAsm', 'agent', 'A', NULL, '2022-06-16 07:07:06', '2022-06-16 20:34:46');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `view_agent`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `view_agent` (
`id` bigint(20) unsigned
,`name` varchar(255)
,`first_name` varchar(255)
,`email` varchar(255)
,`nb_achats` bigint(21)
,`mt_achats` double
);

-- --------------------------------------------------------

--
-- Structure de la vue `achats_view`
--
DROP TABLE IF EXISTS `achats_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `achats_view`  AS SELECT `achats`.`id_achat` AS `id_achat`, `achats`.`libellé` AS `libellé`, `achats`.`date_achat` AS `date_achat`, `achats`.`montant_total` AS `montant_total`, `fournisseurs`.`nom` AS `nom`, `achats`.`Agent` AS `Agent` FROM (`achats` join `fournisseurs`) WHERE `achats`.`fournisseur` = `fournisseurs`.`id_frn` ;

-- --------------------------------------------------------

--
-- Structure de la vue `achats_view_v2`
--
DROP TABLE IF EXISTS `achats_view_v2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `achats_view_v2`  AS SELECT `achats`.`id_achat` AS `id_achat`, `achats`.`libellé` AS `libellé`, `achats`.`date_achat` AS `date_achat`, `achats`.`montant_total` AS `montant_total`, `fournisseurs`.`nom` AS `fournisseur`, concat(`users`.`name`,' ',`users`.`first_name`) AS `agent`, `users`.`id` AS `id_agent` FROM ((`achats` join `fournisseurs`) join `users`) WHERE `achats`.`Agent` = `users`.`id` AND `fournisseurs`.`id_frn` = `achats`.`fournisseur` ;

-- --------------------------------------------------------

--
-- Structure de la vue `frn_view`
--
DROP TABLE IF EXISTS `frn_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `frn_view`  AS SELECT `fournisseurs`.`id_frn` AS `id_frn`, `fournisseurs`.`nom` AS `nom` FROM `fournisseurs` ;

-- --------------------------------------------------------

--
-- Structure de la vue `frn_view_details`
--
DROP TABLE IF EXISTS `frn_view_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `frn_view_details`  AS SELECT `fournisseurs`.`id_frn` AS `id_frn`, `fournisseurs`.`nom` AS `nom`, `fournisseurs`.`adresse` AS `adresse`, `fournisseurs`.`telephone` AS `telephone`, count(`achats`.`id_achat`) AS `nb_achats`, sum(`achats`.`montant_total`) AS `mt_achats` FROM (`fournisseurs` join `achats`) WHERE `achats`.`fournisseur` = `fournisseurs`.`id_frn` GROUP BY `fournisseurs`.`id_frn` ;

-- --------------------------------------------------------

--
-- Structure de la vue `frn_view_v2`
--
DROP TABLE IF EXISTS `frn_view_v2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `frn_view_v2`  AS SELECT `fournisseurs`.`id_frn` AS `id_frn`, `fournisseurs`.`nom` AS `nom`, `fournisseurs`.`adresse` AS `adresse`, `fournisseurs`.`telephone` AS `telephone`, `achats`.`libellé` AS `libellé`, `achats`.`montant_total` AS `montant_total` FROM (`fournisseurs` join `achats`) WHERE `fournisseurs`.`id_frn` = `achats`.`fournisseur` ;

-- --------------------------------------------------------

--
-- Structure de la vue `montant_view`
--
DROP TABLE IF EXISTS `montant_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `montant_view`  AS SELECT sum(`achats_view`.`montant_total`) AS `montant` FROM `achats_view` ;

-- --------------------------------------------------------

--
-- Structure de la vue `view_agent`
--
DROP TABLE IF EXISTS `view_agent`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_agent`  AS SELECT `users`.`id` AS `id`, `users`.`name` AS `name`, `users`.`first_name` AS `first_name`, `users`.`email` AS `email`, count(`achats`.`id_achat`) AS `nb_achats`, sum(`achats`.`montant_total`) AS `mt_achats` FROM (`users` join `achats`) WHERE `achats`.`Agent` = `users`.`id` AND `users`.`type_utilisateur` = 'agent' GROUP BY `users`.`id` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`id_achat`),
  ADD KEY `achats_agent_foreign` (`Agent`),
  ADD KEY `achats_fournisseur_foreign` (`fournisseur`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id_frn`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achats`
--
ALTER TABLE `achats`
  MODIFY `id_achat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id_frn` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achats`
--
ALTER TABLE `achats`
  ADD CONSTRAINT `achats_agent_foreign` FOREIGN KEY (`Agent`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `achats_fournisseur_foreign` FOREIGN KEY (`fournisseur`) REFERENCES `fournisseurs` (`id_frn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
