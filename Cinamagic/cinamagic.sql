-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 10:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinamagic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `email`, `password`) VALUES
(1, 'Laila', 'Laila@gmail.com', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `name`, `description`) VALUES
(1, 'Action', 'A genre with intense action, fighting, chase scenes, driving sequences, acrobatics, gun fights, martial arts, dangerous situations, or some element that fuels the audience with adrenaline. '),
(2, 'Adventure', 'A genre that revolves around the conquests and explorations of a protagonist. The purpose of the conquest can be to retrieve a person or treasure, but often the main focus is simply the pursuit of the unknown. These films generally take place in exotic locations and play on historical myths.'),
(3, 'Comedy', 'A genre of film in which the main emphasis is on humour. These films are designed to make the audience laugh through amusement and most often work by exaggerating characteristics for humorous effect. Films in this style traditionally have a happy ending (black comedy being an exception).'),
(4, 'Drama', 'a genre that relies on the emotional and relational development of realistic characters. While Drama film relies heavily on this kind of development, dramatic themes play a large role in the plot as well. Often, these dramatic themes are taken from intense, real life issues. Whether heroes or heroines are facing a conflict from the outside or a conflict within themselves, Drama film aims to tell an honest story of human struggles.'),
(5, 'Fantasy', 'A genre that incorporates imaginative and fantastic themes. These themes usually involve magic, supernatural events, or fantasy worlds. A fantasy film does not need to be rooted in fact. This element allows the audience to be transported into a new and unique world. Often, these films center on an ordinary hero in an extraordinary situation.'),
(6, 'Horror', 'A genre that aims to create a sense of fear, panic, alarm, and dread for the audience. These films are often unsettling and rely on scaring the audience through a portrayal of their worst fears and nightmares. Horror films usually center on the arrival of an evil force, person, or event. Many Horror films include mythical creatures such as ghosts, vampires, and zombies. Traditionally, Horror films incorporate a large amount of violence and gore into the plot.'),
(7, 'Mystery', 'A genre of film that centers on a person of authority, usually a detective, that is trying to solve a mysterious crime. The main protagonist uses clues, investigation, and logical reasoning. The biggest element in these films is a sense of “whodunit” suspense, usually created through visual cues and unusual plot twists.'),
(8, 'Romance', 'A genre wherein the plot revolves around the love between two protagonists. This genre usually has a theme that explores an issue within love, including but not limited to: love at first sight, forbidden love, love triangles, and sacrificial love. The tone of Romance film can vary greatly. Whether the end is happy or tragic, Romance film aims to evoke strong emotions in the audience.');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `age` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID`, `name`, `logo`, `categoryID`, `trailer`, `description`, `age`, `date`) VALUES
(1, 'Dune', 'https://helios-i.mashable.com/imagery/articles/06YFRvbzSjLAjwYIf998QNF/images-178.fit_lim.size_2000x.v1633974312.png', 2, 'https://www.youtube.com/embed/8g18jFHCLXk', 'A mythic and emotionally charged hero’s journey, “Dune” tells the story of Paul Atreides, a brilliant and gifted young man born into a great destiny beyond his understanding, who must travel to the most dangerous planet in the universe to ensure the future of his family and his people. As malevolent forces explode into conflict over the planet’s exclusive supply of the most precious resource in existence—a commodity capable of unlocking humanity’s greatest potential—only those who can conquer their fear will survive.', 'PG12', '2021-10-22'),
(2, 'Resident Evil: Welcome to Raccoon City', 'https://mlpnk72yciwc.i.optimole.com/cqhiHLc.WqA8~2eefa/w:auto/h:auto/q:75/https://bleedingcool.com/wp-content/uploads/2021/10/resident_evil_welcome_to_raccoon_city_ver3_xxlg.jpg', 6, 'https://www.youtube.com/embed/4q6UGCyHZCI', 'Once the booming home of pharmaceutical giant Umbrella Corporation, Raccoon City is now a dying Midwestern town. The company\'s exodus left the city a wasteland with great evil brewing below the surface. When that evil is unleashed, the townspeople are forever changed and a small group of survivors must work together to uncover the truth behind Umbrella and make it through the night.', 'R18', '2021-11-25'),
(3, 'Encanto', 'https://lumiere-a.akamaihd.net/v1/images/p_encanto_payoff_21512_e2c5d246.jpeg?region=0%2C0%2C540%2C810', 3, 'https://www.youtube.com/embed/CaimKeDcudo', 'Encanto tells the tale of an extraordinary family, the Madrigals, who live hidden in the mountains of Colombia, in a magical house, in a vibrant town, in a wondrous, charmed place called an Encanto. The magic of the Encanto has blessed every child in the family with a unique gift from super strength to the power to heal-every child except one, Mirabel. But when she discovers that the magic surrounding the Encanto is in danger, Mirabel decides that she, the only ordinary Madrigal, might just be her exceptional family\'s last hope.', 'PG', '2021-11-25'),
(4, 'King Richard', 'https://m.media-amazon.com/images/M/MV5BYTcyNmY4ZGEtYmE4Zi00ZDViLTlmYzMtMmQ4ZTM4OWNmZjQxXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_.jpg', 4, 'https://www.youtube.com/embed/BKP_0z52ZAw', 'Richard Williams is determined to write his two daughters, Venus and Serena, into the history books. Training on tennis courts in Compton, Richard shapes the girls\' adamant commitment and intense intuition. Together, the Williams family defies the odds.', 'PG12', '2021-11-18'),
(5, 'Venom: Let There Be Carnage', 'https://oyster.ignimgs.com/wordpress/stg.ign.com/2021/05/VNM2_OnLine_1400x2100_TSR_RD3DDCIMAX_02.jpg', 1, 'https://www.youtube.com/embed/-FmWuCgJmxo', 'Eddie Brock struggles to adjust to his new life as the host of the alien symbiote Venom, which grants him super-human abilities in order to be a lethal vigilante. Brock attempts to reignite his career by interviewing serial killer Cletus Kasady, who becomes the host of the symbiote Carnage and escapes prison after a failed execution.', 'PG12', '2021-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `item_ID` int(5) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `name`, `item_ID`, `body`, `rating`) VALUES
(1, 'Sara', 1, 'I love it, Dune is easily one of the best visually & audibly crafted films of 2021. Hans Zimmer\'s score is perfection. ', 5),
(20, 'Muneera', 3, 'For Disney to make a film about Colombian folk culture is a gorgeous, original choice. ', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `email`, `password`) VALUES
(1, 'Areej', 'Areej@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `item_ID` (`item_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`item_ID`) REFERENCES `item` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
