-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 15, 2025 at 02:35 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

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
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lore`
--

INSERT INTO `lore` (`id`, `title`, `text`, `image`) VALUES
(1, 'Feanor', 'Fëanor was a Ñoldorin Elf, second King of the Noldor, and one of the Elven kindred that departed from Valinor in the land of Aman, where they had lived with the Valar.&#13;&#10;&#13;&#10;He was born in Valinor, the only child of Finwë (High King of the Ñoldor) and Finwë&#39;s first wife Míriel Therindë. He was a craftsman, gem-smith, and warrior, maker of the Silmarils, and inventor of the Tengwar script. He was also the creator of the Palantíri.&#13;&#10;&#13;&#10;Fëanor was made the mightiest in all parts of body and mind; countenance, understanding, skill, and subtlety, of all the Children of Ilúvatar. However his personality was riddled with flaws, foremost among them selfishness and pride, which would lead to his own downfall and bring much anguish to his people.', '/images/lore/feanor.webp'),
(2, 'Fingolfin', 'Fingolfin was the first High King of the Ñoldor in Beleriand. He was the eldest son of Finwë and Indis, younger brother of Findis, older brother of Irimë and Finarfin, and the younger half-brother of Fëanor. He founded the House of Fingolfin, which ruled the Ñoldor in Middle-earth. His wife was Anairë and his children were Fingon, Turgon, Aredhel, and Argon. Fingolfin was said to be the strongest, wisest, and most valiant of Finwë\'s sons', '/images/lore/fingolfin.webp'),
(3, 'Fingon', 'Fingon the \"Valiant\" was a Ñoldorin Elf, the eldest son of Fingolfin, and older brother of Turgon, Aredhel, and Argon.[2]\r\n\r\nHe was High King of the Ñoldor in Middle-earth during the First Age after the death of his father. He was instrumental in healing the rift between the Sons of Fëanor and the followers of his father after their desertion of them in Araman.', '/images/lore/fingon.webp'),
(4, 'Turgon', 'Turgon was a Ñoldor Elf of Gondolin, second son of Fingolfin, brother of Fingon, Aredhel, Argon, and father of Idril. In Middle-earth, Turgon was the King of Gondolin and the High King of the Ñoldor. For centuries of the late First Age, Turgon remained successfully hidden from Morgoth until a betrayal by Maeglin, one of his subjects, caused its downfall.', '/images/lore/turgon.webp'),
(5, 'Morgoth', 'Melkor (Quenya: \"He who arises in might\"), commonly known as Morgoth (Sindarin: \"Black Foe of the World\"),[1] was the rebel Vala, the first Dark Lord, and the primordial source of evil in Eä in the Elder Days. He coveted Arda and all that it contained, but when he was rejected in his lordship by his fellow Ainur, he sought instead to destroy, corrupt or pervert all that which they would create or steward. Defying the will of his creator, Ilúvatar, and sowing discord among the Ainur, Melkor would be at the root of virtually all the misfortunes which befell Eä and those who dwelt within it.', '/images/lore/morgoth.webp'),
(6, 'Manwe', 'Manwë (Quenya: &#34;Blessed One&#34;) was the leader of the Ainur, one of the Aratar, King of the Valar, husband of Varda, brother of the Dark Lord Melkor, and King of Arda. He was also known as Súlimo, Mânawenûz, or Valahiru, and lived atop Mount Taniquetil in Valinor, the highest mountain of the world. The winds and airs were his servants.&#13;&#10;&#13;&#10;He was the greatest in power, of all the Valar, as Melkor was far more powerful, but was not included amongst the Valar due to rebelling against the will of Eru Ilúvatar. It is said that he was the only Vala who took council from Eru from time to time.', '/images/lore/manwe.webp'),
(7, 'Ungoliant', 'Ungoliant (Sindarin; IPA: [uŋˈɡoljant]) was a spirit who took on the form of a monstrous Spider. She was initially an ally of Melkor in Aman, and for a short time in Middle-earth as well. She was a distant mother of Shelob, and the oldest and first giant spider of Arda. She was the destroyer of the Two Trees of Valinor.', '/images/lore/ungoliant.webp'),
(8, 'Eru Iluvatar', 'Eru Ilúvatar was the supreme being of Eä. He was the single creator of existence, all-knowing and all-powerful, and the only entity with the power to create souls. Though the Ainur attempted to shape and govern Eä according to Eru&#39;s general will (which they understood imperfectly), he never allowed those who exist within the world to do as they will, and only rarely was known to intervene in the affairs of Eä.&#13;&#10;&#13;&#10;Eru was central to parts of The Silmarillion, but was not mentioned by name in Tolkien&#39;s most famous works, The Hobbit and The Lord of the Rings, although he was alluded to as &#34;the One&#34; in a part of Appendix A speaking of the downfall of Númenor, and in &#34;Cirion and Eorl and the Friendship of Gondor and Rohan&#34; in Unfinished Tales as &#34;the One who is above all thrones for ever&#34;.', '/images/lore/eru.webp'),
(9, 'Finwe', 'Finwë was the first King of the Ñoldor who led his people on the journey from Middle-earth to Valinor in the blessed realm of Aman. He was a great friend of Elu Thingol, the King of Doriath. He was the father of Fëanor, Fingolfin, Finarfin, Írimë, and Findis. As founder of the House of Finwë, he and his first and second wives were the sires of the three noble houses of Fëanor, Fingolfin, and Finarfin, who afterwards ruled great realms in Middle-earth and succeeded him in Aman. His bloodline also mixed its way into the race of Men.', '/images/lore/finwe.webp'),
(10, 'Maedhros', 'Maedhros, also called Maedhros the Tall,[3] was a prince of the Ñoldor, eldest of the seven Sons of Fëanor, and head of the House of Fëanor following the death of his father in Middle-earth. He was highly renowned for his skills as warrior and diplomat. For centuries, he led his House against the forces of Morgoth, but the Oath that he and his six brothers had sworn to recover the Silmarils constrained him and ultimately brought his demise.', '/images/lore/maedros.webp'),
(11, 'Maglor ', 'Maglor was the second son of Fëanor and Nerdanel. He was the greatest poet and minstrel of the Ñoldor and was said to have inherited more of his mother\'s gentler temperament.\r\nAmong the seven brothers, only Maglor, Caranthir, and Curufin were married, but nothing is known of their wives.', '/images/lore/maglor.webp'),
(12, 'Celegorm', 'Celegorm, called Celegorm the Fair,[3] was the third son of Fëanor and Nerdanel, most closely associated with another brother, Curufin. He is somewhat anomalously described as having fair hair, rather than the black or red hair of his parents and his six siblings.\r\n\r\nCelegorm was a great huntsman, and a friend of the Vala Oromë. From Oromë he learned great skill of birds and beasts, and could understand a number of their languages. He had brought with him from Valinor the great hound Huan, a gift from Oromë.', '/images/lore/celegorm.webp'),
(36, 'Curufin', 'Curufin, also called Curufin the Crafty,[3] was a Ñoldorin prince and the fifth of the seven Sons of Fëanor and Nerdanel. Curufin was the father of Celebrimbor, master Jewel-smith of Eregion who would later forge the three Elvish Rings of Power.&#13;&#10;&#13;&#10;Among his seven brothers, Curufin was his father&#39;s favorite and was most like his father in skill of hand and in appearance.', '/images/lore/1742332799.7719curufin.webp'),
(37, 'Celebrimbor', 'Celebrimbor was a Ñoldorin prince and the last in the line of the House of Fëanor, who lived in Middle-earth. He was a ruler of Eregion in the Second Age, and a master smith. He is remembered primarily for his creation of the Three Rings of Power: Nenya, Vilya, and Narya, but also he made the second Elfstone (in one version of history) for Galadriel, who would later give it to Aragorn.', '/images/lore/1742332863.3858Celebrimbor_by_Filat.webp'),
(38, 'Nerdanel', 'Nerdanel (Quenya), also known as Nerdanel the Wise, was the daughter of the Ñoldorin smith Mahtan and the wife of the infamous Fëanor, eldest son of King Finwë. &#13;&#10;After marrying Fëanor, Nerdanel bore him seven sons: Maedhros, Maglor, Celegorm, Caranthir, Curufin, Amrod and Amras.&#13;&#10;&#13;&#10;&#13;&#10;', '/images/lore/1742332947.5442Nerdanel_person_S_Morello.webp'),
(39, 'Caranthir', 'Caranthir, also known as Caranthir the Dark,[4] was an Elf, the fourth son of Fëanor and the harshest and the quickest to anger of his seven brothers. As with his brothers, Caranthir was bound by an oath to recover his father&#39;s Silmarils, which had been stolen by the Dark Lord Morgoth in Aman. This oath took the seven brothers to Middle-earth during the First Age, where they established realms in exile, waged war against armies of Morgoth, fought their own Elvish kind on occasion, and eventually brought ruin upon themselves.&#13;&#10;', '/images/lore/1742333004.6031Caranthir_S_Morello.webp'),
(40, 'Dior', 'Dior, also known as Dior Eluchîl, was the son of Beren Erchamion of the House of Bëor and the princess Lúthien Tinúviel, daughter of King Thingol and Melian. He later became the second (and last) King of Doriath as the only heir of Thingol, and thereby the High King of the Sindar also. Dior was called the Fair and was the first Half-elf in Middle-earth&#39;s history,[3] for his father was of the race of Men, and his mother inherited Elven blood.', '/images/lore/1742333761.8319dior.webp'),
(41, 'Luthien ', 'Lúthien, also known as Tinúviel, was the immortal princess of Doriath, wife of Beren Erchamion, and most beautiful of all the Children of Ilúvatar to ever live. Her love of the mortal man Beren, for whom she was prepared to risk everything, including her life, was legendary and lamented forever in song and story. She and Beren braved Morgoth&#39;s horrors, eventually winning a Silmaril from his crown and the approval of their marriage by King Thingol. Though their actions later resulted in both their deaths, their deeds won them the pity of the Vala Mandos and a second life in Middle-earth.[2] Her romance with Beren was one of the great stories of the Elder Days that were told for many ages after she lived, and it was said her bloodline will never perish. She was known as the most &#39;magic&#39; dancer, with Ivárë and Tinfang coming in second.', '/images/lore/1742333847.7884luthien.webp'),
(42, 'Beren', 'Beren, also called Beren Erchamion, was a man of the First House of the Edain, and a hero whose romance with the Elf-maiden Lúthien was one of the great stories of the Elder Days told for many ages after.&#13;&#10;&#13;&#10;With Lúthien he fathered Dior Eluchîl, whose grandsons would be Elros Tar-Minyatur and Elrond Half-elven.', '/images/lore/1742385278.3621beren.webp'),
(43, 'Tulkas', 'Tulkas (Quenya: &#34;Strong&#34; or &#34;Steadfast&#34;) was an Ainu; a Vala responsible for participating in war and the last of them to descend into Arda, coming to the aid of the others when he heard of their war with Melkor. He was also called Tulukastāz or Astaldo. Having heard of his fellow Valar\'s struggle against Melkor, Tulkas was the last of the Valar to descend upon Arda, tipping the scales of battle against Melkor. Melkor fled before him, and the Spring of Arda began.', '/images/lore/1743021116.4113Tulkas_the_Warrior.webp'),
(44, 'Aule', 'Aulë (Quenya; IPA: [ˈaʊle] - &#34;Invention&#34;) was an Ainu, one of the Aratar and the Vala responsible for fashioning and crafting the substances of which Arda, the world, was composed. He was also called Mahal (Khuzdûl: &#34;Maker&#34;), Oli (Sindarin: &#34;Dream&#34;), and Návatar, and delighted in the nature of substances and in works of skill, but was not concerned with possession or mastery. Besides the shaping of Arda, Aulë&#39;s greatest works were the Two Lamps of the Valar, the vessels of the Sun and Moon, and the Dwarves. He also created Angainor, the chain of Melkor.', '/images/lore/1743021200.8611aule.webp'),
(45, 'Sauron', 'Sauron (Quenya; [ˈsaʊron] or [ˈθaʊron]), the eponymous Lord of the Rings, was the greatest fallen Maia, maker of the One Ring, renowned disciple of Aulë, and chief agent of Morgoth in the Elder Days. After Morgoth&#39;s ousting by the Valar, Sauron became the second Dark Lord and sought to conquer Middle-earth as his former master had.&#13;&#10;&#13;&#10;At the end of the Second Age, Sauron caused the Downfall of Númenor, but was subsequently defeated during the War of the Last Alliance of Elves and Men united under Gil-galad and Elendil. In the final battle, Isildur managed to cut the One Ring from his hand, destroying his corporeal form and robbing him of much of his power. After centuries of lying dormant and rebuilding his strength, Sauron returned to power late in the Third Age and again strove to dominate Middle-earth. Ultimately he was vanquished when the One Ring was cast into Mount Doom, unmaking it and breaking his power forever.', '/images/lore/1743040769.743Sauron-2.webp'),
(47, 'Ulmo', 'Ulmo (Quenya: &#34;Pourer&#34; or &#34;Rainer&#34;), also known as Ulubôz or Ullubôz, was an Ainu, one of the Aratar, and the Vala responsible for the control over the oceans of Arda. A lover of water, Ulmo was one of the Arda&#39;s chief architects and was always in a close friendship with Manwë. He always distrusted Melkor, and the Dark Lord feared the Sea almost as much as he feared Varda because the sea cannot be tamed. Ulmo had no dwelling in Valinor or any permanent dwelling on land, as he preferred the deeps of the seas and the rivers. His palace, on the bottom of Vaiya, was called Ulmonan.', '/images/lore/1743040981.4463ulmo.webp');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `incorrect_answers` json NOT NULL,
  `correct_answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(28, 'Who was the leader of the Ainur, one of the Aratar, King of the Valar, husband of Varda, brother of the Dark Lord Melkor, and King of Arda??', '[\"Aulë\", \"Mandos\", \"Eru Ilúvatar\"]', 'Manwë'),
(46, 'Which of Morgoth&#39;s actions was most hated by Eru Iluvatar?', '[\"The destruction of the Two Trees of Valinor\", \"The theft of the Silmarils\", \"The corruption of some Maiar\"]', 'The creation of the Orcs'),
(47, 'Which of these words was not a name for the Dwarves?', '[\"Khazad\", \"Gonnhirrm\", \"Naugrim\"]', 'Golodhrim'),
(48, 'How many times was Huan permitted to speak in his lifetime?', '[\"He could speak whenever he wanted\", \"Never\", \"Once\"]', 'Three times'),
(49, 'Who were Elrond&#39;s mother and father?', '[\"Luthien and Beren\", \"Galadriel and Celeborn\", \"Melian and Thingol\"]', 'Elwing and Earendil');

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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(72, 7, 90),
(73, 7, 100),
(74, 7, 20),
(75, 7, 100),
(76, 7, 70);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(22, 'test2', 'test2@test.com', '$2y$10$tPqWPnyot74yBlWTIPAlj..Vzm7h9Fdgz/ZTodNcjGbRUCz40aE6K', 0, '2025-01-13 14:15:52'),
(23, 'grrrrr', 'grrrr@gmail.com', '$2y$10$7AdZnA.9Q9WCH0MF4j0CWuX.YO/dJFjdXc3TuHcD50DNT1UNoxBqG', 0, '2025-10-08 12:29:33');

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
