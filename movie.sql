-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 12:15 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `movie_id` int(10) NOT NULL,
  `hall` varchar(50) NOT NULL,
  `seats` int(10) NOT NULL,
  `person_id` int(10) NOT NULL,
  `pay_mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `email`, `time`, `date`, `movie_id`, `hall`, `seats`, `person_id`, `pay_mode`) VALUES
(59, 'jhg@jhg.ckjd', '9:00AM', '6 May', 1, 'City Pride: Satara Road', 7, 2, 'google pay'),
(64, 'jk@bts.com', '9:00AM', '5 May', 5, 'PVR: City One Mall,Pimpri', 1, 3, 'google pay'),
(65, 'katha@h.com', '9:00AM', '6 May', 4, 'Rahul 70 MM: Shivajinagar,Pune', 3, 9, 'google pay'),
(66, 'suga@bts.com', '9:00AM', '6 May', 4, 'Rahul 70 MM: Shivajinagar,Pune', 3, 11, 'google pay');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pno` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `roll` varchar(20) NOT NULL DEFAULT 'User',
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `pno`, `email`, `roll`, `password`) VALUES
(1, 'jk', 1234567890, 'jk@bts.com', 'User', '3821eeb078accbe5424385ea8baa7026'),
(2, 'katha', 234564567, 'katha@hotmail.com', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'jimin', 890786547, 'jimin@bts.com', 'User', 'b2c97ae425dd751b0e48a3acae79cf4a'),
(4, 'jhope', 2147483647, 'jh@bts.com', 'Admin', '2352451358806511007b4258b372ebfb'),
(5, 'sparsh', 45678934, 'sparsh.patel@gmail.com', 'User', '698d51a19d8a121ce581499d7b701668'),
(6, 'Taetae', 12345678, 'v@bts.com', 'User', 'e1d1a9373f2c826a9677f3a8b12445ab'),
(7, 'Kim Namjoon', 171332013, 'rm@bts.com', 'Admin', '71e5b2871c559aa98716223e04e5868e'),
(8, 'kalash', 2147483647, 'kalash@vit.edu', 'User', '202cb962ac59075b964b07152d234b70'),
(9, 'katha', 3763847, 'katha@h.com', 'User', 'c94ed04e8d2104bce9a68bb1a0572bd7'),
(10, 'gre', 344, 'uryetuwur', 'User', '006d2143154327a64d86a264aea225f3'),
(11, 'Suga', 1111000111, 'suga@tan.com', 'User', '3bf1114a986ba87ed28fc1b5884fc2f8');

-- --------------------------------------------------------

--
-- Table structure for table `mov`
--

CREATE TABLE `mov` (
  `mov_id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(400) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `lang` varchar(20) NOT NULL,
  `released_on` date NOT NULL,
  `duration` time NOT NULL,
  `img_url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mov`
--

INSERT INTO `mov` (`mov_id`, `name`, `description`, `rating`, `genre`, `lang`, `released_on`, `duration`, `img_url`) VALUES
(1, 'Black Swan', 'Nina, a ballerina, gets the chance to play the White Swan, Princess Odette. But she finds herself slipping into madness when Thomas, the artistic director, decides that Lily might fit the role better.', '4.6/5', 'Drama/Mystery', 'English', '2020-02-25', '01:50:00', 'https://vignette.wikia.nocookie.net/figure-skating-13/images/7/71/Black-swan_poster-535x792.jpg/revision/latest?cb=20160121044439'),
(2, 'Five Feet Apart', 'Seventeen-year-old Stella spends most of her time in the hospital as a cystic fibrosis patient. Her life is full of routines, boundaries and self-control -- all of which get put to the test when she meets Will, an impossibly charming teen who has the same illness. ', '4.8/5', 'Drama', 'English', '2020-03-15', '01:56:00', 'https://m.media-amazon.com/images/M/MV5BNzVmMjJlN2MtNWQ4Ny00Zjc2LWJjYTgtYjJiNGM5MTM1ZTlkXkEyXkFqcGdeQXVyMjM4NTM5NDY@._V1_UY1200_CR90,0,630,1200_AL_.jpg'),
(3, 'Parasite', 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.', '4.6/5', 'Drama/Mystery', 'Korean', '2020-01-31', '02:12:00', 'https://wallpapercave.com/wp/wp5264425.jpg'),
(4, 'Zindagi na Milegi Dobara', 'Friends Kabir, Imran and Arjun take a vacation in Spain before Kabir\'s marriage. The trip turns into an opportunity to mend fences, heal wounds, fall in love with life and combat their worst fears.', '4.8/5', 'Drama/Romance', 'Hindi', '2020-06-15', '02:35:00', 'https://bestoftheyear.in/wp-content/uploads/2016/03/zindagi-na-milegi-dobara.jpg'),
(5, 'The Nun', 'When a young nun at a cloistered abbey in Romania takes her own life, a priest with a haunted past and a novitiate on the threshold of her final vows are sent by the Vatican to investigate. Together, they uncover the order\'s unholy secret.', '3.7/5', 'Mystery/Thriller', 'English', '2020-09-07', '01:36:00', 'https://m.media-amazon.com/images/M/MV5BMjM3NzQ5NDcxOF5BMl5BanBnXkFtZTgwNzM4MTQ5NTM@._V1_.jpg'),
(6, 'Ice Age', 'Manny the mammoth, Sid the loquacious sloth, and Diego the sabre-toothed tiger go on a comical quest to return a human baby back to his father, across a world on the brink of an ice age.', '3.8/5', 'Fantasy/Adventure', 'English', '2020-05-03', '01:43:00', 'https://i.pinimg.com/originals/e8/7b/cd/e87bcdacd523aa27faacbaa0feb7fb43.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`email`,`movie_id`,`person_id`),
  ADD UNIQUE KEY `unique` (`b_id`),
  ADD KEY `movie` (`movie_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `mov`
--
ALTER TABLE `mov`
  ADD PRIMARY KEY (`mov_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mov`
--
ALTER TABLE `mov`
  MODIFY `mov_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `mov` (`mov_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`person_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
