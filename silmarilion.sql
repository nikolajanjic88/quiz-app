-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2025 at 11:43 AM
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
-- Table structure for table `lore`
--

DROP TABLE IF EXISTS `lore`;
CREATE TABLE IF NOT EXISTS `lore` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lore`
--

INSERT INTO `lore` (`id`, `title`, `text`, `image`) VALUES
(1, 'Fëanor', 'Fëanor was a Ñoldorin Elf, second King of the Noldor, and one of the Elven kindred that departed from Valinor in the land of Aman, where they had lived with the Valar.\r\n\r\nHe was born in Valinor, the only child of Finwë (High King of the Ñoldor) and Finwë\'s first wife Míriel Therindë. He was a craftsman, gem-smith, and warrior, maker of the Silmarils, and inventor of the Tengwar script. He was also the creator of the Palantíri.\r\n\r\nFëanor was made the mightiest in all parts of body and mind; countenance, understanding, skill, and subtlety, of all the Children of Ilúvatar. However his personality was riddled with flaws, foremost among them selfishness and pride, which would lead to his own downfall and bring much anguish to his people.', '/images/lore/feanor.webp'),
(2, 'Fingolfin', 'Fingolfin was the first High King of the Ñoldor in Beleriand. He was the eldest son of Finwë and Indis, younger brother of Findis, older brother of Irimë and Finarfin, and the younger half-brother of Fëanor. He founded the House of Fingolfin, which ruled the Ñoldor in Middle-earth. His wife was Anairë and his children were Fingon, Turgon, Aredhel, and Argon. Fingolfin was said to be the strongest, wisest, and most valiant of Finwë\'s sons', '/images/lore/fingolfin.webp'),
(3, 'Fingon', 'Fingon the \"Valiant\" was a Ñoldorin Elf, the eldest son of Fingolfin, and older brother of Turgon, Aredhel, and Argon.[2]\r\n\r\nHe was High King of the Ñoldor in Middle-earth during the First Age after the death of his father. He was instrumental in healing the rift between the Sons of Fëanor and the followers of his father after their desertion of them in Araman.', '/images/lore/fingon.webp'),
(4, 'Turgon', 'Turgon was a Ñoldor Elf of Gondolin, second son of Fingolfin, brother of Fingon, Aredhel, Argon, and father of Idril. In Middle-earth, Turgon was the King of Gondolin and the High King of the Ñoldor. For centuries of the late First Age, Turgon remained successfully hidden from Morgoth until a betrayal by Maeglin, one of his subjects, caused its downfall.', '/images/lore/turgon.webp'),
(5, 'Morgoth', 'Melkor (Quenya: \"He who arises in might\"), commonly known as Morgoth (Sindarin: \"Black Foe of the World\"),[1] was the rebel Vala, the first Dark Lord, and the primordial source of evil in Eä in the Elder Days. He coveted Arda and all that it contained, but when he was rejected in his lordship by his fellow Ainur, he sought instead to destroy, corrupt or pervert all that which they would create or steward. Defying the will of his creator, Ilúvatar, and sowing discord among the Ainur, Melkor would be at the root of virtually all the misfortunes which befell Eä and those who dwelt within it.', '/images/lore/morgoth.webp'),
(6, 'Manwë ', 'Manwë (Quenya: \"Blessed One\") was the leader of the Ainur, one of the Aratar, King of the Valar, husband of Varda, brother of the Dark Lord Melkor, and King of Arda. He was also known as Súlimo, Mânawenûz, or Valahiru, and lived atop Mount Taniquetil in Valinor, the highest mountain of the world. The winds and airs were his servants.\r\n\r\nHe was the greatest in power, of all the Valar, as Melkor was far more powerful, but was not included amongst the Valar due to rebelling against the will of Eru Ilúvatar. It is said that he was the only Vala who took council from Eru from time to time.', '/images/lore/manwe.webp'),
(7, 'Ungoliant', 'Ungoliant (Sindarin; IPA: [uŋˈɡoljant]) was a spirit who took on the form of a monstrous Spider. She was initially an ally of Melkor in Aman, and for a short time in Middle-earth as well. She was a distant mother of Shelob, and the oldest and first giant spider of Arda. She was the destroyer of the Two Trees of Valinor.', '/images/lore/ungoliant.webp'),
(8, 'Eru Ilúvatar', 'Eru Ilúvatar was the supreme being of Eä. He was the single creator of existence, all-knowing and all-powerful, and the only entity with the power to create souls. Though the Ainur attempted to shape and govern Eä according to Eru\'s general will (which they understood imperfectly), he never allowed those who exist within the world to do as they will, and only rarely was known to intervene in the affairs of Eä.\r\n\r\nEru was central to parts of The Silmarillion, but was not mentioned by name in Tolkien\'s most famous works, The Hobbit and The Lord of the Rings, although he was alluded to as \"the One\" in a part of Appendix A speaking of the downfall of Númenor, and in \"Cirion and Eorl and the Friendship of Gondor and Rohan\" in Unfinished Tales as \"the One who is above all thrones for ever\".', '/images/lore/eru.webp'),
(9, 'Finwë', 'Finwë was the first King of the Ñoldor who led his people on the journey from Middle-earth to Valinor in the blessed realm of Aman. He was a great friend of Elu Thingol, the King of Doriath. He was the father of Fëanor, Fingolfin, Finarfin, Írimë, and Findis. As founder of the House of Finwë, he and his first and second wives were the sires of the three noble houses of Fëanor, Fingolfin, and Finarfin, who afterwards ruled great realms in Middle-earth and succeeded him in Aman. His bloodline also mixed its way into the race of Men.', '/images/lore/finwe.webp'),
(10, 'Maedhros', 'Maedhros, also called Maedhros the Tall,[3] was a prince of the Ñoldor, eldest of the seven Sons of Fëanor, and head of the House of Fëanor following the death of his father in Middle-earth. He was highly renowned for his skills as warrior and diplomat. For centuries, he led his House against the forces of Morgoth, but the Oath that he and his six brothers had sworn to recover the Silmarils constrained him and ultimately brought his demise.', '/images/lore/maedros.webp'),
(11, 'Maglor ', 'Maglor was the second son of Fëanor and Nerdanel. He was the greatest poet and minstrel of the Ñoldor and was said to have inherited more of his mother\'s gentler temperament.\r\nAmong the seven brothers, only Maglor, Caranthir, and Curufin were married, but nothing is known of their wives.', '/images/lore/maglor.webp'),
(12, 'Celegorm', 'Celegorm, called Celegorm the Fair,[3] was the third son of Fëanor and Nerdanel, most closely associated with another brother, Curufin. He is somewhat anomalously described as having fair hair, rather than the black or red hair of his parents and his six siblings.\r\n\r\nCelegorm was a great huntsman, and a friend of the Vala Oromë. From Oromë he learned great skill of birds and beasts, and could understand a number of their languages. He had brought with him from Valinor the great hound Huan, a gift from Oromë.', '/images/lore/celegorm.webp');

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `score`) VALUES
(25, 6, 40),
(43, 6, 20),
(63, 7, 100),
(67, 6, 30),
(68, 6, 60),
(69, 22, 70),
(70, 7, 90),
(71, 7, 100),
(72, 7, 90);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `created_at`) VALUES
(6, 'diablo', 'diablo@gmail.com', '$2y$10$meOf7SqMR/HN.E.oF8h1x.jVK4FOhyfePIRRhVR0lBk.tRVhAyFE.', 0, '2023-10-04 13:53:49'),
(7, 'nikola', 'nikola@gmail.com', '$2y$10$In4vTCne44riyhdkVtk.2.G72oDGNter/8uhGUUJH6h2LQ0IPfI7y', 1, '2023-10-04 14:09:42'),
(18, 'test', 'test@test.com', '$argon2i$v=19$m=65536,t=4,p=1$VnM0UlBPRW1UWXpwWUhMdg$B+CdWAT1Hw04eojrlotV3xR3GBcaOzwYhFUUoge5ELI', 0, '2024-12-31 17:27:54'),
(19, 'r2d2', 'r2d2@gmail.com', '$2y$10$/ibtXEd3v4UxU.6ntGuJS.FaV1MnwW5Ox8pqqUKqJz8h2miT2NflG', 0, '2025-01-09 20:37:39'),
(20, 'Mr Wick', 'mrwick@gmail.com', '$2y$10$Vt2qy7YZpXycTGHJu5P3YOJOciy9xcrm38i6TO32AqgHCTiXIWaUy', 0, '2025-01-10 16:20:09'),
(21, 'x', 'asd@gmail.com', '$2y$10$6RAXbeoZWFhNXPiKnGsSdekH58yEfFfVDVSFAtPxHM3mTfz/SmFbm', 0, '2025-01-13 14:07:30'),
(22, 'test2', 'test2@test.com', '$2y$10$tPqWPnyot74yBlWTIPAlj..Vzm7h9Fdgz/ZTodNcjGbRUCz40aE6K', 0, '2025-01-13 14:15:52');

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
