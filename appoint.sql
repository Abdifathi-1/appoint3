-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2021 at 10:53 AM
-- Server version: 5.7.34-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `appointment_date` varchar(100) NOT NULL,
  `appointment_time` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `short_desc` varchar(100) NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `patient_id`, `address`, `appointment_date`, `appointment_time`, `service`, `short_desc`, `modified_at`, `created_at`) VALUES
(1, 'mike@gmail.com', 'Nairobi', '2021-01-15', '11pm', '', 'This is a short Description that am typing', '2021-01-12 04:05:11', '2021-01-12 09:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sent_to` varchar(100) NOT NULL,
  `sent_by` varchar(100) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `message_received` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sent_to`, `sent_by`, `message`, `message_received`, `created_at`, `modified_at`) VALUES
(1, 'patrick2@gmail.com', 'joseph@gmail.com', 'Hello Francis', NULL, '2019-12-09 05:08:25', NULL),
(2, 'patrick2@gmail.com', 'joseph@gmail.com', 'Hello Francis', NULL, '2019-12-09 05:08:31', NULL),
(3, 'patrick2@gmail.com', 'patrick2@gmail.com', 'Hello Joseph', NULL, '2019-12-09 07:35:15', NULL),
(4, 'patrick2@gmail.com', 'patrick2@gmail.com', 'this is my message', NULL, '2019-12-09 07:39:38', NULL),
(5, 'patrick2@gmail.com', 'patrick2@gmail.com', 'Hello Joseph', NULL, '2019-12-09 08:05:25', NULL),
(6, 'patrick2@gmail.com', 'patrick2@gmail.com', 'heloo', NULL, '2019-12-09 08:08:36', NULL),
(7, 'joseph@gmail.com', 'patrick2@gmail.com', 'Hello Joseph', NULL, '2019-12-09 08:09:45', NULL),
(8, 'linus@gmail.com', 'james@gmail.com', 'Am doing good Joseph', NULL, '2021-08-10 14:17:04', NULL),
(9, 'james@gmail.com', 'linus@gmail.com', 'Hello', NULL, '2021-08-10 14:00:54', '2021-08-10 10:00:54'),
(10, 'james@gmail.com', 'linus@gmail.com', 'Hello', NULL, '2021-08-10 14:26:21', '2021-08-10 10:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `records_history`
--

CREATE TABLE `records_history` (
  `record_id` int(11) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `signs` varchar(200) NOT NULL,
  `lab_results` varchar(200) NOT NULL,
  `prescriptions` varchar(200) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `doctor` int(11) NOT NULL,
  `hidden` text NOT NULL,
  `registered_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records_history`
--

INSERT INTO `records_history` (`record_id`, `ref`, `signs`, `lab_results`, `prescriptions`, `disease`, `doctor`, `hidden`, `registered_on`) VALUES
(2, '#KNHL-180790140/2019', 'kdfkdfk dfkldslkfd', 'fdkdjf skjdskjjkd', 'fdkjdfj kdfkldkl', 'Malaria', 32197058, '', '2019-03-28 20:26:44'),
(3, '#KNHL-180790140/2019', 'lklkksaklas', 'aslksakl', 'dlsdklds', 'sdklsdlk', 32197058, '', '2019-03-28 20:27:26'),
(4, '#KNHL-180790140/2019', 'kaskskk dskdskd', 'dsksdkd sdksdkds', 'dskkds dskslksd', 'Malaria', 32197058, '', '2019-03-28 20:29:22'),
(5, '#KNHL-180790140/2019', 'kkksa saksakk', 'sakksk dskkdsk', 'dkskdsk dskdksk dskdsk', 'Malaria', 32197058, '', '2019-03-28 20:30:15'),
(6, '#KNHL-180790140/2019', 'kkksks dsmsdkksd dskksd', 'dskskks sdksdk dsksdk', 'skkskdkds sdkksksd skkdsd', 'Malaria', 32197058, '', '2019-03-28 20:32:08'),
(7, '#KNHL-180790140/2019', 'asllasm saksdkds', 'sksdk sdoewpd', 'sdksd', 'Malaria', 32197058, '', '2019-03-28 20:33:18'),
(8, '#KNHL-180790140/2019', 'kdsksd sdkdsoods sdsdkid', 'sskdksd dskdsk sdkdskk', 'dskdsk dskksdks dsksk', 'sdkkdsksd', 32197058, 'false', '2020-01-22 14:42:08'),
(9, '#KNHL-180790140/2019', 'ksdksd sdksk sdksk skdsksd sdksdk', 'dsksdks sdksk dsksd dsks', 'skks skskk skkdd', 'Malaria', 32197058, 'false', '2020-01-22 14:42:03'),
(10, '#KNHL-180790140/2019', 'kkksd dskdsk dskksd', 'dssdkksd dskdsk dskkds', 'dskskd sdkkds dskd', 'Malaria', 32197058, 'false', '2020-01-22 14:41:57'),
(11, 'KNHL-1844596034/2019', 'dsjsjsjjs sksksks', 'skskkks', 'sdskskkd', 'Malaria', 32197058, 'false', '2020-01-22 14:41:48'),
(12, 'KNHL-1844596034/2019', 'sdsjdjs sjsjjsd', 'sslslds skdsks', 'sdskdsd sdksk', 'Malaria', 32197058, 'false', '2020-01-22 14:41:43'),
(13, '#KNHL-541580616/2019', 'Weight loss and low temperatures', 'These are the lab results', 'These asre the prescriptions', 'Malaria', 32197058, 'false', '2020-01-22 14:41:38'),
(14, '#KNHL-1664154136/2020', 'new symptoms new symptoms', 'new Lab results  new Lab results', 'new prescriptions new prescriptions', 'Coughing', 31092345, 'false', '2020-01-21 14:03:43'),
(15, '#KNHL-1664154136/2020', 'new new new new', 'new new new new', 'new new new new', 'new new new new', 31092345, 'true', '2020-01-22 15:55:22'),
(16, '#KNHL-398947902/2020', 'headache and cold', 'lab results', 'new prescription', 'malaria', 31450987, 'true', '2020-02-24 12:42:09'),
(17, '#KNHL-1527382896/2020', 'stomachache', 'results', 'two tablets', 'diarhoea', 31450981, 'true', '2020-08-15 14:44:36'),
(18, '#KNHL-861883707/2020', 'headache and coughing', 'Tested', 'panadol 500mg  and cough syrup', 'Corona', 31092345, 'false', '2020-10-08 06:47:07'),
(19, '#KNHL-1292822699/2020', 'fjdjs', 'dkkdfkfd', 'ksks', 'sdksdkkd', 31450981, 'false', '2020-10-12 04:18:53'),
(20, '#KNHL-1527382896/2020', 'ksksd', 'ddsldslsl', 'ksldskksl', 'sdlsd', 31450981, 'false', '2020-10-12 04:27:27'),
(21, '#KNHL-1292822699/2020', 'dm,dsdms,d', 'sdsjkjkds', 'skekjkj', 'sdkjskk', 31450981, 'false', '2020-10-12 04:31:19'),
(22, '#KNHL-1292822699/2020', 'kkkllkk lkkkkkkkkkkkk', 'kkkkkkkkkkkkkkkkkk', 'kkkkkk', 'kkkkkkkkkkk', 31450981, 'false', '2020-10-12 04:33:16'),
(23, '#KNHL-1886331639/2020', 'djdsjjkd', 'dsdsklklds', 'dssdkkls', 'kkjsdksd', 31098234, 'true', '2020-10-16 07:23:40'),
(24, '1', 'signs and symptoms', 'Lab results', 'Prescription and Medication', 'Malaria', 31984567, 'false', '2021-01-12 11:30:49'),
(25, '1', 'signs and symptoms', 'Lab Results', 'Prescriptions', 'Disease', 31984567, 'false', '2021-01-12 11:33:45'),
(26, '1', 'Symptoms and Signs', 'Lab Results', 'Prescriptions', 'Disease', 31984567, 'false', '2021-01-12 11:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `id_no` int(11) DEFAULT NULL,
  `gender` text NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `role` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `phone_no`, `id_no`, `gender`, `specialization`, `role`, `password`, `modified_at`, `created_at`) VALUES
(1, 'mike', 'mike@gmail.com', 721098123, 0, 'male', NULL, 'patient', '$2y$10$Cn1Iv1pQdConngY/aTuKO.v70.QWmF3YwJDx2PU9rkA1OCs1v6ZiC', '2021-01-11 02:09:13', '2021-01-12 04:18:07'),
(2, 'James', 'james@gmail.com', 712098123, 31981230, 'male', 'Dentist', 'doctor', '01fe7b08cde8cb8d83958a6d983a8b97', '2021-01-11 22:52:28', '2021-01-12 03:52:28'),
(3, 'John', 'john@gmail.com', 721098124, 31091234, 'male', 'Surgeon', 'doctor', 'bad992042b502179a636a5609d8e23bd', '2021-01-11 23:00:56', '2021-01-12 04:00:56'),
(4, 'admin', 'admin@hospital.co.ke', 721000000, 31000000, 'male', 'admin', 'admin', '$2y$10$kbPuzc6uhNBgHOD6QkVCyebNwHBWy4K.jINKzP3vaFPjBejNWSLsS', '2021-01-12 00:00:00', '2021-01-12 05:00:00'),
(5, 'Sarah', 'sarah@gmail.com', 721098234, 31984567, 'female', 'Nurse', 'doctor', '$2y$10$iGjJbVDcme/2BxYIsZSE3ec1TmOGTXGruVxh2SrSylR6r3wH427HK', '2021-01-12 05:52:55', '2021-01-12 10:52:55'),
(6, 'Abdi', 'abdi@gmail.com', 721098128, 31984562, 'male', 'Surgeon', 'doctor', '$2y$10$NM7D8TaDYFX0H4cXM3rBoeziWPNDrMQTwoXDMPoOhXwFS62abXg0K', '2021-01-12 09:00:43', '2021-01-12 14:00:43'),
(7, 'linus', 'linus@gmail.com', 721097456, NULL, 'male', NULL, 'patient', '$2y$10$BENccS.w8hktqM37Vesgv.3qnN3myS7UaDJc62C8ZejGxoQQZ49lG', '2021-08-10 06:10:14', '2021-08-10 10:10:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `records_history`
--
ALTER TABLE `records_history`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `records_history`
--
ALTER TABLE `records_history`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
