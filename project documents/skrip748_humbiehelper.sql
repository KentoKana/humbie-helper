-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2019 at 07:51 PM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skrip748_humbiehelper`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` int(11) NOT NULL,
  `agenda_title` varchar(50) NOT NULL,
  `agenda_description` varchar(500) NOT NULL,
  `agenda_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_id` int(11) NOT NULL,
  `isArchived` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id`, `agenda_title`, `agenda_description`, `agenda_date`, `project_id`, `isArchived`) VALUES
(1, 'Agenda #3', '{\"agenda_date\":\"May 12, 2019\",\"agenda_time\":\"12:30pm - 1:30pm\",\"agenda_location\":\"M100\",\"old_business\":[\"Old Business 1 \",\" Old Business 2\"],\"new_business\":[\"New Business 1 \",\" New Business 2\"],\"other_business\":[\"Other Business 1 \",\" Other Business 2\"]}', '2019-03-22 13:29:54', 7, 1),
(2, 'Agenda #2', '{\"agenda_date\":\"April 29, 2019\",\"agenda_time\":\"12:30pm -1:30pm\",\"agenda_location\":\"K107\",\"old_business\":[\"Item 1\"],\"new_business\":[\"New Business 1\"],\"other_business\":[\"Other Business\"]}', '2019-03-22 15:42:38', 7, 0),
(3, 'Agenda #4', '{\"agenda_date\":\"June 12, 2019\",\"agenda_time\":\"12:30pm - 1:30pm\",\"agenda_location\":\"K107\",\"old_business\":[\"Old Business1 \",\" Old Business 2\"],\"new_business\":[\"New Business 1 \",\" New Business 2\"],\"other_business\":[\"Other Business 1 \",\" Other Business 2\"]}', '2019-03-22 20:47:16', 7, 0),
(4, 'Agenda1', '&lt;p&gt;sdfsamnbjasdbasdasdasdasdsadasd&lt;/p&gt;\r\n', '2019-04-19 19:16:11', 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `announcement_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `announcement` varchar(1000) NOT NULL,
  `announcement_title` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement_time`, `announcement`, `announcement_title`, `student_id`, `project_id`) VALUES
(41, '2019-04-18 14:49:35', 'Make sure to get all your work done by tomorrow!', 'Upcoming deadline for Php!', 15, 14),
(43, '2019-04-19 05:09:29', 'Test', 'Test', 19, 33),
(45, '2019-04-19 18:13:30', 'test announcement', 'Test announcement', 20, 32);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer_content` varchar(500) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `answer_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `card_description` varchar(225) NOT NULL,
  `card_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `card_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `card_name`, `card_description`, `card_date`, `card_index`) VALUES
(1, 'task 1', 'sadasdasd', '2019-04-19 12:43:05', 1),
(2, 'card 2', 'asdasdadassd', '2019-04-19 13:08:57', 2),
(3, 'Test Task', 'Test Desc\n', '2019-04-19 13:23:34', 3),
(4, 'asdfasdf', 'asdfasdf', '2019-04-19 13:24:10', 4),
(5, 'Card1', 'Card1', '2019-04-19 14:14:27', 5),
(6, 'Test', 'TEst', '2019-04-19 14:14:39', 6),
(7, '', '', '2019-04-19 14:14:52', 7);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `faq_question` varchar(500) NOT NULL,
  `faq_answer` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `category_id`, `faq_question`, `faq_answer`) VALUES
(1, 4, 'What is this site?', 'A great tool to help students of the humber web development program!'),
(2, 4, 'Who is Humbie?', 'Our super helpful mascot who is here to help answer your questions!'),
(3, 6, 'How can I add students to a project?', 'Visit the project details page and you\'ll see a tab that says \"students\", from there you\'ll find a button to add students to your project!'),
(4, 4, 'Who made this site?', 'Some awesome humber students who wanted to make life easier for future web development students!'),
(5, 6, 'How many students can I add to a project?', 'As many as you want!');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `category_name`) VALUES
(4, 'General'),
(5, 'Projects'),
(6, 'Students');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_title` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `project_id` int(11) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_title`, `file_path`, `project_id`, `upload_date`) VALUES
(44, 'Me', '12.jpg', 18, '2019-04-12 22:16:58'),
(51, 'cats', 'ben-jerri-03-2019.png', 33, '2019-04-18 22:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `minutes`
--

CREATE TABLE `minutes` (
  `id` int(11) NOT NULL,
  `minutes_title` varchar(200) NOT NULL,
  `minutes_description` text NOT NULL,
  `minutes_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `minutes`
--

INSERT INTO `minutes` (`id`, `minutes_title`, `minutes_description`, `minutes_date`, `project_id`) VALUES
(1, 'Minutes of the Meeting #1', '&lt;p&gt;&lt;strong&gt;Date: May 12, 2019&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Time: 10:30am - 11:30am&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Present:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Jane&lt;/p&gt;\r\n\r\n&lt;p&gt;Bob&lt;/p&gt;\r\n\r\n&lt;p&gt;Joe&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Absent:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;Peter&lt;/p&gt;\r\n\r\n&lt;p&gt;Paul&lt;/p&gt;\r\n\r\n&lt;p&gt;Mary&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Minutes:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;&amp;nbsp;dkasjdksad&lt;/li&gt;\r\n	&lt;li&gt;sdhsajkdhas&lt;/li&gt;\r\n	&lt;li&gt;dasdjsadikasjd&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Action Items:&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;asdksajdaks&lt;/li&gt;\r\n	&lt;li&gt;asdkljaskid&lt;/li&gt;\r\n	&lt;li&gt;woieowiejw&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', '2019-04-01 17:01:00', 23),
(2, 'Minutes of the Meeting #2', '&lt;p&gt;Date&lt;/p&gt;\r\n\r\n&lt;p&gt;sdadasd&lt;/p&gt;\r\n\r\n&lt;p&gt;asdas&lt;/p&gt;\r\n\r\n&lt;p&gt;dasd&lt;/p&gt;\r\n\r\n&lt;p&gt;asd&lt;/p&gt;\r\n\r\n&lt;p&gt;asd&lt;/p&gt;\r\n\r\n&lt;p&gt;asd&lt;/p&gt;\r\n\r\n&lt;p&gt;a&lt;/p&gt;\r\n', '2019-04-01 20:21:00', 23),
(4, 'sadsad', '&lt;p&gt;sdasdas&lt;/p&gt;\r\n', '2019-04-02 09:24:51', 23),
(5, 'sdasdasd', '&lt;p&gt;sadad&lt;/p&gt;\r\n', '2019-04-02 09:25:15', 23),
(6, 'Minutes of the Meeting #1', '&lt;p&gt;sadasdasdsadsad&lt;/p&gt;\r\n', '2019-04-19 19:21:23', 34);

-- --------------------------------------------------------

--
-- Table structure for table `motivational_quotes`
--

CREATE TABLE `motivational_quotes` (
  `id` int(11) NOT NULL,
  `quote` varchar(500) NOT NULL,
  `quote_author` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motivational_quotes`
--

INSERT INTO `motivational_quotes` (`id`, `quote`, `quote_author`) VALUES
(41, 'Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy.', 'Norman Vincent Peale'),
(42, 'Do not wait; the time will never be â€˜just right.â€™ Start where you stand, and work with whatever tools you may have at your command, and better tools will be found as you go along.', 'George Herbert'),
(43, 'Press forward. Do not stop, do not linger in your journey, but strive for the mark set before you.', 'George Whitefield'),
(44, 'The future belongs to those who believe in the beauty of their dreams.', 'Eleanor Roosevelt'),
(45, 'You just canâ€™t beat the person who never gives up.', 'Babe Ruth');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `notes_title` varchar(100) NOT NULL,
  `notes_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `notes_content` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `notes_title`, `notes_date`, `project_id`, `student_id`, `notes_content`) VALUES
(6, 'Humbie Helper', '2019-03-28 10:36:06', 17, 15, '<p>We are designing a really cool project:</p>\r\n\r\n<ol>\r\n	<li>Helps students</li>\r\n	<li>Better than blackboard</li>\r\n</ol>\r\n'),
(7, 'Php Note', '2019-03-28 17:40:26', 18, 15, '<p><em><strong>Here is a note for php!</strong></em></p>\r\n'),
(8, 'Rich Text Testing', '2019-04-14 20:51:10', 14, 15, '<p>Hello! This is my first note for our first team meeting. We talked about</p>\r\n\r\n<ol>\r\n	<li>Our features</li>\r\n	<li>Roles on the team</li>\r\n	<li>Schedule for the semester</li>\r\n</ol>\r\n\r\n<p><strong>Keep in mind important due dates! Next meeting is next monday!!</strong></p>\r\n'),
(9, 'PHP notes', '2019-04-16 08:28:04', 14, 15, '<p>What are the features we need to fix?</p>\r\n\r\n<p>How do we create a new class?&nbsp;</p>\r\n\r\n<p>Can we use other classes?</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_description` varchar(225) NOT NULL,
  `student_id` int(11) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_description`, `student_id`, `is_deleted`) VALUES
(2, 'Test 1234', '    Testing my project    ', 1, 0),
(3, 'Another one', 'blahblahblah', 1, 0),
(4, '555', '1234354', 1, 0),
(5, '78910', 'blah blah blah', 1, 0),
(6, '78910', 'blah blah blah', 1, 0),
(7, 'My Project', 'try it man', 9, 0),
(8, 'Bev\'s Project', ' Hello! My name is bev', 1, 0),
(9, 'Test project', 'Test project description\r\n', 1, 1),
(10, 'Test Project', 'test proj desc\r\n', 1, 0),
(11, 'Test Project', 'test', 1, 1),
(12, 'test', 'test', 1, 0),
(13, 'Test project', 'test proj description\r\n\r\n', 14, 0),
(14, 'Hospital Project', 'Makeover of a hospital website in ASP.NET using visual studio.', 15, 0),
(15, 'Php Project', 'Here is my php project', 15, 1),
(16, 'My Php project 2', ' Details here ', 15, 1),
(17, 'PHP Project!', 'Working on our php project!', 15, 1),
(18, 'PHP Project!', 'Working on humbie helper!', 15, 1),
(19, '                    ', '                                          ', 15, 1),
(20, '                    ', '                                          ', 15, 1),
(21, 'Testing', '                                                                                    ', 15, 1),
(22, 'Testing', '                    ', 15, 1),
(23, 'Test Project', 'test', 16, 0),
(24, 'Test Project!', 'Test Project!\r\n', 13, 0),
(25, 'New Project 2', 'New Project', 13, 0),
(26, 'Hospital Project', 'This is my hospital project with my team!', 17, 0),
(27, 'Test Project 1dd', 'Test Project Desc 1ddddddddddddddd', 18, 0),
(28, 'Test Project 2', 'Test Project Desc 2', 18, 1),
(29, 'P1', 'P1', 20, 1),
(30, 'Hello', 'Hello', 20, 1),
(31, 'Testing Again', 'Test again', 20, 1),
(32, 'Testing Again', 'Test again', 20, 1),
(33, 'TestingFiles', 'A Project To Test File Upload Feature', 19, 0),
(34, 'Project Diva', 'jsahdjsa', 16, 0),
(35, 'Test Project Name', 'Test Project Description', 19, 0),
(36, 'Test Project', 'New Project', 20, 0);

--
-- Triggers `projects`
--
DELIMITER $$
CREATE TRIGGER `new_project_trigger` AFTER INSERT ON `projects` FOR EACH ROW INSERT INTO projects_students VALUES(null, NEW.id, NEW.student_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `projects_students`
--

CREATE TABLE `projects_students` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects_students`
--

INSERT INTO `projects_students` (`id`, `project_id`, `student_id`) VALUES
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(7, 3, 4),
(17, 6, 1),
(18, 7, 1),
(19, 7, 9),
(20, 8, 1),
(21, 7, 4),
(22, 9, 1),
(23, 10, 1),
(24, 11, 1),
(25, 12, 1),
(26, 13, 14),
(27, 14, 15),
(28, 14, 2),
(29, 14, 4),
(30, 14, 9),
(31, 15, 15),
(32, 16, 15),
(33, 16, 2),
(34, 16, 9),
(35, 16, 11),
(36, 14, 2),
(37, 14, 10),
(38, 17, 15),
(39, 18, 15),
(40, 19, 15),
(41, 20, 15),
(42, 21, 15),
(43, 22, 15),
(44, 18, 3),
(45, 18, 2),
(46, 18, 9),
(47, 18, 10),
(48, 18, 12),
(49, 18, 14),
(50, 23, 16),
(51, 24, 13),
(52, 25, 13),
(53, 26, 17),
(54, 27, 18),
(55, 28, 18),
(56, 18, 19),
(57, 29, 20),
(58, 30, 20),
(59, 31, 20),
(60, 32, 20),
(61, 33, 19),
(62, 33, 21),
(63, 34, 16),
(64, 35, 19),
(65, 32, 17),
(66, 32, 26),
(67, 32, 27),
(68, 36, 20);

-- --------------------------------------------------------

--
-- Table structure for table `project_deadlines`
--

CREATE TABLE `project_deadlines` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` datetime NOT NULL,
  `event_description` varchar(225) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_deadlines`
--

INSERT INTO `project_deadlines` (`id`, `event_name`, `event_date`, `event_description`, `project_id`) VALUES
(27, 'Test', '2019-03-07 00:00:00', 'Test', 24),
(28, 'Test', '2019-03-07 00:00:00', 'Test', 24),
(55, 'This is a deadline test', '2019-03-16 00:00:00', 'Test for deadline edit', 25),
(59, 'XML', '2019-04-09 00:00:00', 'Desc', 18),
(60, 'PHP Project due!', '2019-04-19 00:00:00', 'Php final project is due!', 14),
(62, 'PHP Project due!', '2019-04-18 00:00:00', 'It&#39;s due!', 14),
(63, 'Test', '2019-04-30 00:00:00', 'Test', 32),
(65, 'Test1jkghjkhgkhjg', '2019-04-18 00:00:00', 'Test112121212', 35),
(66, 'New Test Deadline', '2019-04-30 00:00:00', 'Test Deadline', 32),
(67, 'Test', '2019-04-25 00:00:00', 'Test', 14);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_content` varchar(500) NOT NULL,
  `project_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resolved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'student'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_fname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_phone` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_fname`, `student_lname`, `student_email`, `student_phone`, `username`, `password`, `role_id`, `is_deleted`) VALUES
(1, 'Jenna', 'Bess', 'jbg@gmail.com', '1234567890', 'jennabg', 'abcd', NULL, 0),
(2, 'Nick', 'G', 'ngg@gmail.com', '111111111', 'ngg', 'test', NULL, 0),
(3, 'Jamie', 'MG', 'JMG@123.com', '1231212', 'jmg_93', 'elvis', NULL, 0),
(4, 'Avi', 'R', 'avi@test.com', '1232425', 'avroth16', '5678', NULL, 0),
(9, 'MarkyMark', 'Martinate', 'mark@martin.ca', '222-222-2222', 'porkalmighty', '', 1, 0),
(10, 'Kento', 'K', 'test@test.com', '222-222-2222', 'kento', '$2y$10$5NrxMEWZWhyjKgJrmrvTaeXb/JtHhNjGiVlW64Q0OzNAbcV8cpxl2', 1, 0),
(11, 'MarkyMark', 'M', 'test@test.com', '222-222-2222', 'MarkyMark', '$2y$10$p9.h6jKmmZixDIWVpbCaUujDNQXRIx.rcgIbxrpkkOYtIVMhBOu8S', 1, 0),
(12, 'test', 'test', 'test@test.com', '222-222-2222', 'test', '$2y$10$DjNQdmGO1bglQPQwyROcmOZ2m1YGNDOob11rteTZZUDAlU4IFY6Lu', 1, 0),
(13, 'test', 'test', 'test@test.com', '222-222-2222', 'test', '', 1, 0),
(14, 'Test4', 'test4', 'test@test.com', '222-222-2222', 'Test4', '$2y$10$AfhgXgouWJQwcXQLt6sJ6ec8fjHXbgA4AYIOzZ74YHH9m6fVkpW5q', 1, 0),
(15, 'Jenna', 'GB', 'jenna@test.com', '666-333-1111', 'Jennabg16', '$2y$10$wdlgZ8ORSY8afKgGaC98POPFUWb7njRxKT5voUrc8UBK9lVzAZI7i', 1, 0),
(16, 'Macario', 'Martinez', 'macariomartinez@yahoo.com', '222-222-2222', 'macario', '$2y$10$UPwoh0DSKPgtPBJB49PH5eyyz2LYR33qjG7k23ua9Q0Ml3N1v.HYC', 1, 0),
(17, 'Jenna', 'BG', 'jenna@test.gmail.com', '123-456-7891', 'JennaBG1616', '$2y$10$K4hmLMdaTnq3l3k0Ryze9eFVZVpYnTWKVCF7UfRznXVaUYkkXEDXe', 1, 0),
(18, 'Timothy', 'Thesmen', 'Tim@test.ca', '416-909-9090', 'Timmy', '$2y$10$WmmtKcMCPxpm7rDSsdwvdemIqnvHHMIJxdoQY8LE1HKuHnHw6mIWO', 1, 0),
(19, 'Jimy', 'NoDelete', 'test1@test.ca', '222-222-2222', 'qwerty', '$2y$10$jalYbXwPBXD0PAHDkEC1Cu0nmSVa6QgLfiM.YH2hHcn18DCAlQXIm', 1, 0),
(20, 'Test', 'Tester', 'test@test.com', '222-222-2222', 'Test', '$2y$10$EJ7Uz3fW5Irjy7DI67L09OG1bHNNmETtP4IKOOfs0SLK9tNxF75T6', 1, 0),
(21, 'Billy', 'Bob', 'test@test.ca', '905-985-5543', 'qwerty1', '$2y$10$M0wFenC.OD.8eU4Z0f5Qqeaz.kx/Aw/b/I.jwe51IabfYfS0Cvs5G', 1, 0),
(22, 'Kento', 'K', 'kento@kento.com', '222-222-2222', 'kento', '$2y$10$dYHeDcmlzMq5uCbQLN6WvO/cSELQVei2TAJPwPx5x048a6e6hoPqC', 1, 0),
(23, 'Kento', 'K', 'kento@kento.com', '222-222-2222', 'kento', '$2y$10$1Ec.RkXWQKzuElnJIInLbeOGL2i9bezMj5DXA2yznMROujV7I9XXy', 1, 0),
(24, 'Kento', 'K', 'kento@kento.com', '222-222-2222', 'kento', '$2y$10$t1sdomCs1SMaV1sUqdO2W./SE5Wbfo4.YcJREcIpaBOTae9.8ampa', 1, 0),
(25, 'Kento', 'K', 'kento@kento.com', '222-222-2222', 'kento', '$2y$10$Ush1FTCm5F8F4lcdvmTRiuCP./ZZcgXFPD0X1PjJi2XI33IhsdS4W', 1, 0),
(26, 'Kento', 'K', 'test@test.com', '222-222-2222', 'Kento', '$2y$10$0b.VHD2KjxpD93z01UORJ.VPUESFNGWsEmGIjeZIYG.DRY/0nFOlC', 1, 0),
(27, 'Kento', 'K', 'test@test.com', '222-222-2222', 'Kento', '$2y$10$LcptzrasyShbL5skrHfAweA8Unx32rZrmMniDAAWdBZ1cUfHWUJVS', 1, 0),
(28, 'Kento', 'K', 'test@test.com', '222-222-2222', 'Kento', '$2y$10$LZqUyJEedLdX4mh3enotw.dfzs/M3ZV7AmwK4VqkKZd2Q2bnIuQJW', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasklists`
--

CREATE TABLE `tasklists` (
  `id` int(11) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `task_description` varchar(500) NOT NULL,
  `task_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_index` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasklists`
--

INSERT INTO `tasklists` (`id`, `task_name`, `task_description`, `task_date`, `task_index`, `project_id`) VALUES
(1, 'To Do', 'a todo list for the project', '2019-04-19 12:41:46', 1, 34),
(2, 'Doing', 'all tasks that are in progress goes here', '2019-04-19 12:42:29', 2, 34),
(3, 'Done', 'all tasks that are done goes here', '2019-04-19 12:42:52', 3, 34),
(4, 'New Task List', 'Test Description\n', '2019-04-19 13:13:36', 1, 33),
(5, 'Test Task 1', 'Test Desc 1\n', '2019-04-19 13:14:14', 2, 33),
(6, 'Another oneasdfasdfa', 'yes babyasdfasdfa', '2019-04-19 13:23:57', 6, 33),
(7, 'Teaskkskss', '$thone', '2019-04-19 13:25:10', 7, 33),
(8, 'QA', '', '2019-04-19 13:27:37', 6, 34),
(9, 'Test Task', 'Test Task Description', '2019-04-19 14:11:55', 9, 32);

-- --------------------------------------------------------

--
-- Table structure for table `task_cards`
--

CREATE TABLE `task_cards` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_cards`
--

INSERT INTO `task_cards` (`id`, `task_id`, `card_id`) VALUES
(1, 8, 1),
(2, 1, 2),
(3, 4, 3),
(4, 7, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `timers`
--

CREATE TABLE `timers` (
  `id` int(11) NOT NULL,
  `time_taken` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_name` varchar(500) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timers`
--

INSERT INTO `timers` (`id`, `time_taken`, `student_id`, `date_created`, `task_name`, `project_id`) VALUES
(4, 32346, 16, '2019-04-05 01:30:40', '', 14),
(5, 48846, 16, '2019-04-05 01:32:19', '', 14),
(14, 4970, 10, '2019-04-05 13:49:08', 'Test', 14),
(268, 3651, 19, '2019-04-09 10:46:44', 'time1', 18),
(285, 3621, 19, '2019-04-18 21:31:52', 'New timesheet', 33),
(286, 6349, 20, '2019-04-19 14:08:39', 'Test', 32),
(287, 3066, 20, '2019-04-19 14:09:33', 'Test', 32),
(288, 1071, 20, '2019-04-19 14:43:55', 'TEst', 36),
(289, 1063, 20, '2019-04-19 15:08:05', 'Test!', 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_index` (`card_index`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CategoryID` (`category_id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_ibfk_1` (`project_id`);

--
-- Indexes for table `minutes`
--
ALTER TABLE `minutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `motivational_quotes`
--
ALTER TABLE `motivational_quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `projects_students`
--
ALTER TABLE `projects_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `projects_students_ibfk_1` (`project_id`);

--
-- Indexes for table `project_deadlines`
--
ALTER TABLE `project_deadlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_deadlines_ibfk_1` (`project_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `questions_ibfk_1` (`project_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tasklists`
--
ALTER TABLE `tasklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `task_cards`
--
ALTER TABLE `task_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `card_id` (`card_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Indexes for table `timers`
--
ALTER TABLE `timers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `minutes`
--
ALTER TABLE `minutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `motivational_quotes`
--
ALTER TABLE `motivational_quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `projects_students`
--
ALTER TABLE `projects_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `project_deadlines`
--
ALTER TABLE `project_deadlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tasklists`
--
ALTER TABLE `tasklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `task_cards`
--
ALTER TABLE `task_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `timers`
--
ALTER TABLE `timers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `agendas_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `announcements_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `faq_categories` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `minutes`
--
ALTER TABLE `minutes`
  ADD CONSTRAINT `minutes_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `projects_students`
--
ALTER TABLE `projects_students`
  ADD CONSTRAINT `projects_students_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projects_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `project_deadlines`
--
ALTER TABLE `project_deadlines`
  ADD CONSTRAINT `project_deadlines_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `tasklists`
--
ALTER TABLE `tasklists`
  ADD CONSTRAINT `tasklists_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `task_cards`
--
ALTER TABLE `task_cards`
  ADD CONSTRAINT `task_cards_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`),
  ADD CONSTRAINT `task_cards_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasklists` (`id`);

--
-- Constraints for table `timers`
--
ALTER TABLE `timers`
  ADD CONSTRAINT `timers_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `timers_ibfk_3` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
