-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 10:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge-09`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `agentcode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`id`, `firstname`, `lastname`, `nickname`, `date_of_birth`, `agentcode`) VALUES
(1, 'Tom', 'Hanks', 'Tom', '1956-07-09', 'A123'),
(2, 'Leonardo', 'DiCaprio', 'Leo', '1974-11-11', 'B456'),
(3, 'Brad', 'Pitt', NULL, '1963-12-18', 'C789'),
(4, 'Meryl', 'Streep', NULL, '1949-06-22', 'D987'),
(5, 'Johnny', 'Depp', 'Johnny', '1963-06-09', 'E654'),
(6, 'Scarlett', 'Johansson', 'ScarJo', '1984-11-22', 'F321'),
(7, 'Robert', 'Downey Jr.', 'RDJ', '1965-04-04', 'G654'),
(8, 'Jennifer', 'Lawrence', 'J-Law', '1990-08-15', 'H789'),
(9, 'Denzel', 'Washington', NULL, '1954-12-28', 'I987'),
(10, 'Emma', 'Stone', NULL, '1988-11-06', 'J321');

-- --------------------------------------------------------

--
-- Table structure for table `actor_critic`
--

CREATE TABLE `actor_critic` (
  `actorid` int(11) DEFAULT NULL,
  `criticid` int(11) DEFAULT NULL,
  `acting_grade` int(10) DEFAULT NULL,
  `expression_grade` int(10) DEFAULT NULL,
  `naturalness_grade` int(10) DEFAULT NULL,
  `devotion_grade` int(10) DEFAULT NULL,
  `final_grade` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor_critic`
--

INSERT INTO `actor_critic` (`actorid`, `criticid`, `acting_grade`, `expression_grade`, `naturalness_grade`, `devotion_grade`, `final_grade`) VALUES
(1, 1, 8, 9, 7, 8, 8),
(2, 1, 7, 8, 6, 7, 7),
(3, 2, 9, 8, 9, 9, 9),
(4, 2, 6, 7, 8, 7, 7),
(5, 3, 7, 6, 8, 7, 7),
(6, 4, 8, 9, 7, 8, 8),
(7, 5, 9, 8, 9, 9, 9),
(8, 6, 6, 7, 8, 7, 7),
(9, 3, 7, 6, 8, 7, 7),
(10, 5, 8, 9, 7, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `actor_movie`
--

CREATE TABLE `actor_movie` (
  `id` int(11) NOT NULL,
  `actorid` int(11) DEFAULT NULL,
  `movieid` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor_movie`
--

INSERT INTO `actor_movie` (`id`, `actorid`, `movieid`, `payment`) VALUES
(1, 1, 1, 3758212),
(2, 2, 2, 5924616),
(3, 3, 3, 7342180),
(4, 4, 4, 2178105),
(5, 5, 5, 9165308),
(6, 6, 6, 6557422),
(7, 7, 7, 4631023),
(8, 8, 8, 8495931),
(9, 9, 9, 2628962),
(10, 10, 10, 9786623),
(11, 10, 1, 6443856),
(12, 9, 2, 2572450),
(13, 8, 3, 7421346),
(14, 7, 4, 2572450),
(15, 6, 5, 5043791),
(16, 5, 6, 7592944),
(17, 4, 7, 3942100),
(18, 3, 8, 9225408),
(19, 2, 9, 5389715),
(20, 1, 10, 7971020),
(21, 3, 5, 6912187),
(22, 4, 6, 3789640),
(23, 5, 7, 5628972),
(24, 6, 8, 8238513),
(25, 7, 9, 5389715),
(26, 8, 10, 9774615);

-- --------------------------------------------------------

--
-- Table structure for table `critic`
--

CREATE TABLE `critic` (
  `id` int(11) NOT NULL,
  `first_name` varchar(16) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `c_password` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critic`
--

INSERT INTO `critic` (`id`, `first_name`, `last_name`, `username`, `c_password`) VALUES
(1, 'John', 'Smith', 'jsmith', 'password1'),
(2, 'Emily', 'Johnson', 'ejohnson', 'password2'),
(3, 'Michael', 'Brown', 'mbrown', 'password3'),
(4, 'Sarah', 'Davis', 'sdavis', 'password4'),
(5, 'David', 'Miller', 'dmiller', 'password5'),
(6, 'Olivia', 'Wilson', 'owilson', 'password6');

-- --------------------------------------------------------

--
-- Table structure for table `critique`
--

CREATE TABLE `critique` (
  `id` int(10) UNSIGNED NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `critic_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critique`
--

INSERT INTO `critique` (`id`, `movie_id`, `critic_id`, `rating`) VALUES
(1, 1, 1, 4),
(2, 2, 3, 3),
(3, 1, 2, 5),
(4, 3, 1, 4),
(5, 2, 2, 3),
(6, 3, 3, 5),
(7, 4, 4, 2),
(8, 5, 6, 4),
(9, 6, 5, 3),
(10, 7, 2, 5),
(11, 8, 3, 4),
(12, 9, 1, 3),
(13, 10, 6, 4),
(14, 11, 5, 2),
(15, 12, 4, 3),
(16, 13, 2, 4),
(17, 14, 1, 5),
(18, 15, 3, 3),
(19, 16, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `firstName` varchar(16) DEFAULT NULL,
  `lastName` varchar(32) DEFAULT NULL,
  `mostly_directed_genre` varchar(32) DEFAULT NULL,
  `expertise` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `firstName`, `lastName`, `mostly_directed_genre`, `expertise`) VALUES
(1, 'Christopher', 'Nolan', 'Thriller', 'Mind-bending narratives'),
(2, 'Steven', 'Spielberg', 'Adventure', 'Blockbuster filmmaking'),
(3, 'Quentin', 'Tarantino', 'Crime', 'Dialogue-driven storytelling'),
(4, 'Greta', 'Gerwig', 'Drama', 'Character-driven narratives'),
(5, 'Martin', 'Scorsese', 'Crime', 'Gritty and intense storytelling'),
(6, 'Kathryn', 'Bigelow', 'Action', 'Realistic and immersive filmmaking'),
(7, 'Denis', 'Villeneuve', 'Science Fiction', 'Visually stunning and thought-provoking films');

-- --------------------------------------------------------

--
-- Table structure for table `director_film`
--

CREATE TABLE `director_film` (
  `id` int(11) NOT NULL,
  `filmid` int(11) DEFAULT NULL,
  `directorid` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director_film`
--

INSERT INTO `director_film` (`id`, `filmid`, `directorid`, `payment`) VALUES
(11, 1, 1, 6145231),
(12, 2, 3, 3872518),
(13, 3, 4, 7953722),
(14, 4, 2, 5601289),
(15, 5, 7, 4356971),
(16, 6, 5, 8217336),
(17, 7, 4, 9639028),
(18, 8, 6, 2853409),
(19, 9, 3, 6752813),
(20, 10, 1, 3997625);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `movieid` int(11) DEFAULT NULL,
  `premiere_city` varchar(32) DEFAULT NULL,
  `first_week_revenue` int(11) DEFAULT NULL,
  `premiere_format` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `movieid`, `premiere_city`, `first_week_revenue`, `premiere_format`) VALUES
(1, 1, 'Chicago', 501684453, '2D'),
(2, 2, 'Houston', 633770115, '2D'),
(3, 3, 'Phoenix', 147255735, '3D'),
(4, 4, 'Philadelphia', 338529800, '2D'),
(5, 5, 'San Antonio', 37973922, '3D'),
(6, 6, 'San Diego', 903540297, '3D'),
(7, 7, 'Dallas', 673808219, '3D'),
(8, 8, 'San Jose', 538264086, '2D'),
(9, 9, 'Austin', 275715941, '2D'),
(10, 10, 'Jacksonville', 816060822, '3D');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `premiere` date DEFAULT NULL,
  `release_year` int(11) DEFAULT NULL,
  `genre` varchar(32) DEFAULT NULL,
  `country_of_origin` varchar(32) DEFAULT NULL,
  `production_name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `premiere`, `release_year`, `genre`, `country_of_origin`, `production_name`) VALUES
(1, 'The Shawshank Redemption', '1994-09-23', 1994, 'Drama', 'United States', 'Castle Rock Entertainment'),
(2, 'The Godfather', '1972-03-24', 1972, 'Crime', 'United States', 'Paramount Pictures'),
(3, 'Pulp Fiction', '1994-05-21', 1994, 'Crime', 'United States', 'Miramax Films'),
(4, 'The Dark Knight', '2008-07-18', 2008, 'Action', 'United States', 'Warner Bros.'),
(5, 'Fight Club', '1999-10-15', 1999, 'Drama', 'United States', '20th Century Fox'),
(6, 'Inception', '2010-07-16', 2010, 'Sci-Fi', 'United States', 'Legendary Pictures'),
(7, 'The Matrix', '1999-03-31', 1999, 'Sci-Fi', 'United States', 'Warner Bros.'),
(8, 'Forrest Gump', '1994-07-06', 1994, 'Drama', 'United States', 'Paramount Pictures'),
(9, 'Interstellar', '2014-11-07', 2014, 'Sci-Fi', 'United States', 'Paramount Pictures'),
(10, 'The Lord of the Rings: The Fellowship of the Ring', '2001-12-19', 2001, 'Fantasy', 'New Zealand', 'New Line Cinema'),
(11, 'TV Series 1', '2023-01-01', 2023, 'Drama', 'USA', 'Production 1'),
(12, 'TV Series 2', '2022-07-15', 2022, 'Comedy', 'USA', 'Production 2'),
(13, 'TV Series 3', '2023-03-10', 2023, 'Thriller', 'USA', 'Production 3'),
(14, 'TV Series 4', '2022-12-05', 2022, 'Sci-Fi', 'USA', 'Production 4'),
(15, 'TV Series 5', '2023-02-20', 2023, 'Mystery', 'USA', 'Production 5'),
(16, 'TV Series 6', '2022-11-18', 2022, 'Action', 'USA', 'Production 6');

-- --------------------------------------------------------

--
-- Table structure for table `oscar_winner`
--

CREATE TABLE `oscar_winner` (
  `id` int(11) NOT NULL,
  `actorid` int(11) DEFAULT NULL,
  `movieid` int(11) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `year_won` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oscar_winner`
--

INSERT INTO `oscar_winner` (`id`, `actorid`, `movieid`, `role`, `year_won`) VALUES
(1, 1, 1, 'Lead Actor', '2023'),
(2, 1, 10, 'Supporting Role', '2014'),
(3, 2, 9, 'Lead Actor', '2015'),
(4, 3, 8, 'Lead Actor', '2016'),
(5, 4, 7, 'Lead Actor', '2017'),
(6, 5, 6, 'Lead Actor', '2018'),
(7, 6, 5, 'Lead Actor', '2019'),
(8, 7, 4, 'Lead Actor', '2020'),
(9, 8, 10, 'Lead Actor', '2014'),
(10, 9, 2, 'Lead Actor', '2022'),
(11, 10, 1, 'Supporting Role', '2023'),
(12, 7, 9, 'Supporting Role', '2015'),
(13, 6, 8, 'Supporting Role', '2016'),
(14, 8, 3, 'Lead Actor', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `sequel`
--

CREATE TABLE `sequel` (
  `id` int(10) UNSIGNED NOT NULL,
  `filmid` int(11) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sequel`
--

INSERT INTO `sequel` (`id`, `filmid`, `name`) VALUES
(1, 1, 'Sequel 1'),
(2, 2, 'Sequel 2'),
(3, 3, 'Sequel 3'),
(4, 4, 'Sequel 4'),
(5, 5, 'Sequel 5'),
(6, 6, 'Sequel 6');

-- --------------------------------------------------------

--
-- Table structure for table `tv_series`
--

CREATE TABLE `tv_series` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_of_expected_seasons` int(11) DEFAULT NULL,
  `number_of_episodes` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tv_series`
--

INSERT INTO `tv_series` (`id`, `number_of_expected_seasons`, `number_of_episodes`, `movie_id`) VALUES
(1, 5, 60, 11),
(2, 3, 24, 12),
(3, 6, 72, 13),
(4, 4, 48, 14),
(5, 7, 84, 15),
(6, 5, 60, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actor_critic`
--
ALTER TABLE `actor_critic`
  ADD KEY `actorid` (`actorid`),
  ADD KEY `criticid` (`criticid`);

--
-- Indexes for table `actor_movie`
--
ALTER TABLE `actor_movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actorid` (`actorid`),
  ADD KEY `movieid` (`movieid`);

--
-- Indexes for table `critic`
--
ALTER TABLE `critic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `critique`
--
ALTER TABLE `critique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `critic_id` (`critic_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director_film`
--
ALTER TABLE `director_film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filmid` (`filmid`),
  ADD KEY `directorid` (`directorid`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movieid` (`movieid`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oscar_winner`
--
ALTER TABLE `oscar_winner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actorid` (`actorid`),
  ADD KEY `movieid` (`movieid`);

--
-- Indexes for table `sequel`
--
ALTER TABLE `sequel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filmid` (`filmid`);

--
-- Indexes for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor_movie`
--
ALTER TABLE `actor_movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `critic`
--
ALTER TABLE `critic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `critique`
--
ALTER TABLE `critique`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `director_film`
--
ALTER TABLE `director_film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `oscar_winner`
--
ALTER TABLE `oscar_winner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sequel`
--
ALTER TABLE `sequel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tv_series`
--
ALTER TABLE `tv_series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor_critic`
--
ALTER TABLE `actor_critic`
  ADD CONSTRAINT `actor_critic_ibfk_1` FOREIGN KEY (`actorid`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `actor_critic_ibfk_2` FOREIGN KEY (`criticid`) REFERENCES `critic` (`id`);

--
-- Constraints for table `actor_movie`
--
ALTER TABLE `actor_movie`
  ADD CONSTRAINT `actor_movie_ibfk_1` FOREIGN KEY (`actorid`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `actor_movie_ibfk_2` FOREIGN KEY (`movieid`) REFERENCES `movie` (`id`);

--
-- Constraints for table `critique`
--
ALTER TABLE `critique`
  ADD CONSTRAINT `critique_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `critique_ibfk_2` FOREIGN KEY (`critic_id`) REFERENCES `critic` (`id`);

--
-- Constraints for table `director_film`
--
ALTER TABLE `director_film`
  ADD CONSTRAINT `director_film_ibfk_1` FOREIGN KEY (`filmid`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `director_film_ibfk_2` FOREIGN KEY (`directorid`) REFERENCES `director` (`id`);

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`movieid`) REFERENCES `movie` (`id`);

--
-- Constraints for table `oscar_winner`
--
ALTER TABLE `oscar_winner`
  ADD CONSTRAINT `oscar_winner_ibfk_1` FOREIGN KEY (`actorid`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `oscar_winner_ibfk_2` FOREIGN KEY (`movieid`) REFERENCES `movie` (`id`);

--
-- Constraints for table `sequel`
--
ALTER TABLE `sequel`
  ADD CONSTRAINT `sequel_ibfk_1` FOREIGN KEY (`filmid`) REFERENCES `film` (`id`);

--
-- Constraints for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD CONSTRAINT `tv_series_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
