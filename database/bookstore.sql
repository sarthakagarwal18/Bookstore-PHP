-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 06:38 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'qwertyuiop');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(25) NOT NULL,
  `price` int(10) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `stock` int(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `author`, `price`, `details`, `stock`, `image`, `genre`) VALUES
(1, 'The Godfather', 'Mario Puzo', 1000, 'Don Vito Corleone, head of a mafia family, decides to hand over his empire to his youngest son Michael. However, his decision unintentionally puts the lives of his loved ones in grave danger.', 0, 'images/godfather.jpg', 'Drama'),
(2, 'Game of Thrones', 'GRR Martin', 1400, 'Several royal families desire the Iron Throne to gain control of Westeros. Whilst kingdoms fight each other for power, a sinister force lurks beyond the Wall in the north.', 2, 'images/got.jpeg', 'Drama'),
(3, 'The Immortals of Meluha', 'Amish Tripathy', 500, 'The Immortals of Meluha is the first novel of the Shiva trilogy series by Amish Tripathi. The story is set in the land of Meluha and starts with the arrival of the Shiva. The Meluhans believe that Shiva is their fabled saviour Neelkanth. ', 3, 'images/immortals.jpg', 'Mythology'),
(4, 'The Inferno', 'Dan Brown', 1500, 'Famous symbologist Robert Langdon (Tom Hanks) follows a trail of clues tied to Dante, the great medieval poet. When Langdon wakes up in an Italian hospital with amnesia, he teams up with Sienna Brooks (Felicity Jones), a doctor he hopes will help him recover his memories. Together, they race across Europe and against the clock to stop a madman (Ben Foster) from unleashing a virus that could wipe out half of the world\'s population.', 11, 'images/inferno.jpg', 'Mystery'),
(5, 'Lost Symbol', 'Dan Brown', 1200, 'The Lost Symbol is a 2009 novel written by American writer Dan Brown. It is a thriller set in Washington, D.C., after the events of The Da Vinci Code, and relies on Freemasonry for both its recurring theme and its major characters. ', 0, 'images/lostsymbol.jpg', 'Mystery'),
(6, 'To Kill a Mockingbird', 'Harper Lee', 1300, 'To Kill a Mockingbird is a novel by Harper Lee published in 1960. It was immediately successful, winning the Pulitzer Prize, and has become a classic of modern American literature. ', 15, 'images/mocking.jpg', 'Drama'),
(7, '50 Shades of Grey', 'E.L. James', 800, 'Fifty Shades of Grey is a 2011 erotic romance novel by British author E. L. James. It is the first instalment in the Fifty Shades trilogy that traces the deepening relationship between a college graduate.', 18, 'images/shades.jpg', 'Romance'),
(8, 'War and Peace', 'Leo Tolstoy', 2500, 'War and Peace is a novel by the Russian author Leo Tolstoy, which is regarded as a central work of world literature and one of Tolstoy\'s finest literary achievements.', 12, 'images/tolstoy.jpg', 'Drama');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `cart`
--
DELIMITER $$
CREATE TRIGGER `check1` BEFORE INSERT ON `cart` FOR EACH ROW UPDATE `book` SET stock=stock-new.quantity WHERE new.book_id=book.book_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check2` BEFORE UPDATE ON `cart` FOR EACH ROW UPDATE `book` SET stock=stock-new.quantity+old.quantity WHERE old.book_id=book.book_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check3` BEFORE DELETE ON `cart` FOR EACH ROW INSERT INTO history VALUES (old.book_id,old.user_id,CURRENT_DATE,old.quantity,CURRENT_TIME)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `book_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`book_id`, `user_id`, `date`, `quantity`, `time`) VALUES
(2, 1, '2017-04-04', 2, '20:09:21'),
(3, 1, '2017-04-04', 1, '20:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'Sarthak', 'sarthak', 'qwertyuiop'),
(2, 'Sar', 'agarwal', '123456789'),
(3, 'sahil', 'sahil', 'qwertyuiop'),
(4, 'akhil', 'akhil', 'qwertyuiop');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`book_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`book_id`,`user_id`,`date`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
