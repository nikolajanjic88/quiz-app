-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2025 at 07:16 PM
-- Server version: 8.0.31
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silmarilion`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `incorrect_answers` json NOT NULL,
  `correct_answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `incorrect_answers`, `correct_answer`) VALUES
(7, 'Seven Gates barred the way to which land?', '[\"Doriath\", \"Beleriand\", \"Mordor\"]', 'Gondolin'),
(8, 'Who inflicted seven wounds on Morgoth in a duel to which he challenged him?', '[\"Gil-Galad\", \"Feanor\", \"Elendil\"]', 'Fingolfin'),
(9, 'After the fifth battle in the Wars of Beleriad, Turgon ordered seven ships be sent into the West. Only one of them came back. And of this ship\'s crew only one sailor survived. What was his name?', '[\"Earendil\", \"Turgon\", \"Tuor\"]', 'Voronwe'),
(10, 'Who was the oldest of the seven sons of Feanor?', '[\"Curufin\", \"Celegorm\", \"Maglor\"]', 'Maedhros'),
(11, ' Feanor is a derivation of the name his mother called him. His original name was Curufinwe. One of his sons bears a similar name, what is it.', '[\"Curufeanor\", \"Curanthir\", \"Curanar\"]', 'Curufin'),
(12, 'How many sons did Feanor have?', '[\"Three\", \"Five\", \"One\"]', 'Seven'),
(13, 'The original Dark Lord was Melkor, later renamed Morgoth. What Does Melkor translate to?', '[\"Evil Lord\", \"The Black Enemy\", \"Powerful Enemy\"]', 'He Who Arises In Might'),
(14, 'Who, among the sons of Feanor, was considered the greatest singer after Daeron, the minstrel of Thingol?', '[\"Celegorm\", \"Curufin\", \"Maedhros\"]', 'Maglor'),
(15, 'During the battle of Gondolin, Ecthelion slew and was slain by Gothmog. Gothmog is a(n)?', '[\"Wolf\", \"Orc\", \"Dragon\"]', 'Balrog'),
(16, 'Which mountain kept Gondolin in secret?', '[\"Edoras\", \"Ered Luin\", \"Ered Wethrin\"]', 'Echoriath'),
(17, 'Who saved Maedhros from Thangorodrim?', '[\"Fingolfin\", \"Maglor\", \"Feanor\"]', 'Fingon'),
(18, 'Battle of Unnumbered Tears or?', '[\"Dagor Aglareb\", \"Dagor-nuin-Giliath\", \"Dagor Bragollach\"]', 'Nírnaeth Arnoediad'),
(27, 'Who was the supreme being of Eä?', '[\"Fëanor \", \"Melkor\", \"Manwë\"]', 'Eru Ilúvatar'),
(28, 'Who was the leader of the Ainur, one of the Aratar, King of the Valar, husband of Varda, brother of the Dark Lord Melkor, and King of Arda?', '[\"Aulë\", \"Mandos\", \"Eru Ilúvatar\"]', 'Manwë');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userID` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `score`) VALUES
(25, 6, 40),
(43, 6, 20),
(63, 7, 100),
(67, 6, 30),
(68, 6, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `created_at`) VALUES
(6, 'diablo', 'diablo@gmail.com', '$2y$10$meOf7SqMR/HN.E.oF8h1x.jVK4FOhyfePIRRhVR0lBk.tRVhAyFE.', 0, '2023-10-04 13:53:49'),
(7, 'nikola', 'nikola@gmail.com', '$2y$10$In4vTCne44riyhdkVtk.2.G72oDGNter/8uhGUUJH6h2LQ0IPfI7y', 1, '2023-10-04 14:09:42'),
(18, 'test', 'test@test.com', '$argon2i$v=19$m=65536,t=4,p=1$VnM0UlBPRW1UWXpwWUhMdg$B+CdWAT1Hw04eojrlotV3xR3GBcaOzwYhFUUoge5ELI', 0, '2024-12-31 17:27:54'),
(19, 'r2d2', 'r2d2@gmail.com', '$2y$10$/ibtXEd3v4UxU.6ntGuJS.FaV1MnwW5Ox8pqqUKqJz8h2miT2NflG', 0, '2025-01-09 20:37:39'),
(20, 'Mr Wick', 'mrwick@gmail.com', '$2y$10$Vt2qy7YZpXycTGHJu5P3YOJOciy9xcrm38i6TO32AqgHCTiXIWaUy', 0, '2025-01-10 16:20:09');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
