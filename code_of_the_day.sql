-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2017 at 06:05 AM
-- Server version: 5.7.20
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evans_data_corp`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `winner` tinyint(4) NOT NULL DEFAULT '0',
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `user_id`, `question_id`, `timestamp`, `winner`, `answer`) VALUES
(1, 54321, 1, '2017-12-15 11:24:47', 1, 'Answer is 1.'),
(2, 54322, 1, '2017-12-15 11:24:47', 0, 'Answer is 2.'),
(74, 54323, 1, '2017-12-15 11:58:24', 0, 'Answer is 3.');

-- --------------------------------------------------------

--
-- Table structure for table `answers_comments`
--

CREATE TABLE `answers_comments` (
  `answer_comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `answers_ratings`
--

CREATE TABLE `answers_ratings` (
  `answer_rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `user_rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `user_id`, `question`, `timestamp`, `posted`) VALUES
(1, 54321, '						def what( x, n ):<br>\r\n										if n < 0:         <br>\r\n												n = -n         <br>\r\n												x = 1.0 / x     <br>\r\n										z = 1.0    <br>\r\n										while n > 0:<br>\r\n												if n % 2 == 1: <br>\r\n														z *= x <br>\r\n												x *= x <br>\r\n												n /= 2 <br>\r\n										return z<br>', '2017-12-15 11:22:46', 1),
(2, 54322, '										public class HelloWorld\r\n{ <br>\r\n	public static void main(String[] args) { <br>\r\n		System.out.println(\"Hello World!\");<br>\r\n	}<br>\r\n', '2017-12-15 11:22:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions_comments`
--

CREATE TABLE `questions_comments` (
  `question_comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions_comments`
--

INSERT INTO `questions_comments` (`question_comment_id`, `user_id`, `question_id`, `comment`) VALUES
(1, 54323, 2, 'Good Questions!');

-- --------------------------------------------------------

--
-- Table structure for table `questions_ratings`
--

CREATE TABLE `questions_ratings` (
  `question_rating_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_rating` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`) VALUES
(54321, 'mrcoder'),
(54322, 'mrscoder'),
(54323, 'thirdcoder');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `fk_answers_questions` (`question_id`),
  ADD KEY `fk_answers_users` (`user_id`);

--
-- Indexes for table `answers_comments`
--
ALTER TABLE `answers_comments`
  ADD PRIMARY KEY (`answer_comment_id`),
  ADD KEY `fk_answersComments_answers` (`answer_id`),
  ADD KEY `fk_answersComments_users` (`user_id`);

--
-- Indexes for table `answers_ratings`
--
ALTER TABLE `answers_ratings`
  ADD PRIMARY KEY (`answer_rating_id`),
  ADD KEY `fk_answersRating_answers` (`answer_id`),
  ADD KEY `fk_answersRating_users` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `fk_questions_users` (`user_id`);

--
-- Indexes for table `questions_comments`
--
ALTER TABLE `questions_comments`
  ADD PRIMARY KEY (`question_comment_id`),
  ADD KEY `fk_questionsComments_questions` (`question_id`),
  ADD KEY `fk_questionsComments_users` (`user_id`);

--
-- Indexes for table `questions_ratings`
--
ALTER TABLE `questions_ratings`
  ADD PRIMARY KEY (`question_rating_id`),
  ADD KEY `fk_questionsRatings_questions` (`question_id`),
  ADD KEY `fk_questionsRatings_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `answers_comments`
--
ALTER TABLE `answers_comments`
  MODIFY `answer_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answers_ratings`
--
ALTER TABLE `answers_ratings`
  MODIFY `answer_rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `questions_ratings`
--
ALTER TABLE `questions_ratings`
  MODIFY `question_rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answers_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_answers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `answers_comments`
--
ALTER TABLE `answers_comments`
  ADD CONSTRAINT `fk_answersComments_answers` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`answer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_answersComments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `answers_ratings`
--
ALTER TABLE `answers_ratings`
  ADD CONSTRAINT `fk_answersRating_answers` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`answer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_answersRating_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions_comments`
--
ALTER TABLE `questions_comments`
  ADD CONSTRAINT `fk_questionsComments_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_questionsComments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions_ratings`
--
ALTER TABLE `questions_ratings`
  ADD CONSTRAINT `fk_questionsRatings_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_questionsRatings_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
