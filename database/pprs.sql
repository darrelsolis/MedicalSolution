-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2018 at 11:16 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pprs`
--
CREATE DATABASE IF NOT EXISTS `pprs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pprs`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `physician_id` int(11) NOT NULL,
  `visit_type` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `approval` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `patient_id`, `physician_id`, `visit_type`, `date`, `time`, `status`, `approval`) VALUES
(4, 60, 74, 'Checkup', '2017-03-17', '21:30:00', 'Done', 'Approved'),
(5, 79, 75, 'Treatment', '2017-03-17', '21:00:00', 'Done', 'Approved'),
(12, 79, 75, 'Treatment', '2017-03-20', '13:00:00', 'Cancelled', 'Approved'),
(13, 79, 77, 'Treatment', '2017-03-18', '23:30:00', 'Done', 'Approved'),
(14, 83, 77, 'Checkup', '2017-03-20', '14:30:00', 'Done', 'Approved'),
(15, 79, 75, 'Treatment', '2017-03-20', '15:30:00', 'Cancelled', 'Denied'),
(16, 84, 77, 'Checkup', '2017-03-20', '21:00:00', 'Done', 'Approved'),
(18, 60, 77, 'Checkup', '2017-03-20', '19:30:00', 'Done', 'Approved'),
(19, 78, 87, 'Checkup', '2017-03-31', '19:30:00', 'Ongoing', 'Approved'),
(21, 88, 87, 'Checkup', '2017-03-21', '09:30:00', 'Done', 'Approved'),
(22, 83, 77, 'Checkup', '2017-03-21', '10:30:00', 'Done', 'Approved'),
(23, 83, 77, 'Checkup', '2017-03-28', '19:30:00', 'Ongoing', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

CREATE TABLE `checkup` (
  `checkup_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `bloodPressure` varchar(20) NOT NULL,
  `allergies` varchar(100) NOT NULL,
  `complain` text NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `checkup`
--

INSERT INTO `checkup` (`checkup_id`, `weight`, `height`, `bloodPressure`, `allergies`, `complain`, `feedback`) VALUES
(32, 63, 166, '120/20', 'None', 'Heartburn', 'Rest for a while, stay away from physical stress'),
(35, 62, 159, '125/20', 'None', 'Rotator cuff pain', 'Minor dislocation at right rotator cuff. Observe pain within 1 week. If pain is unbearable, come back here.'),
(38, 63, 159, '120/30', 'Heavy sneezing due to dust', 'Calf pain', 'Cramps and pain are due to lack of potassium. Eat bananas and drink your fluids. '),
(39, 75, 160, '120/20', 'None', 'Colds', 'Drink 8 glasses of water everyday.'),
(41, 65, 165, '120/20', 'None', 'Heartburn', 'Avoid stress as this may cause your heartburn to increase'),
(42, 67, 165, '120/20', 'None', 'Hallucination', 'Hallucination is normal. This is caused by the chemotherapy'),
(44, 65, 170, '120/50', 'None', 'Frequent pain in the cerebral cortex part', 'Have your head checked via X-ray'),
(46, 72, 170, '130/20', 'None', 'Experiences heartburn at night', 'Sleep at least 8 hours every day. Avoid strenuous activities.'),
(47, 67, 165, '120/20', 'None', 'Migraine', 'Sleep early'),
(49, 63, 160, '130/20', 'None', 'Headache', 'Headache is caused by stress. Sleep early, atleast 8 hours'),
(50, 60, 175, '120/30', 'None', 'Back pain', 'Pain due to strenous activity, need rest'),
(51, 70, 150, '120/20', 'None', 'Heartburn', 'Heartburn due to stress'),
(53, 61, 175, '120/30', 'None', 'Headache', 'Avoid sleeping late');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `genericName` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `genericName`, `description`, `stock`, `price`) VALUES
(9, 'Advil', 'Ibubrofen', 'Ibuprofen is used for the treatment of mild to moderate pain, inflammation and fever caused by many and diverse diseases.', 70, 12.00),
(10, 'Pepcid', 'Famotidine Intravenous', 'Famotidine is used to treat ulcers of the stomach and intestines and to prevent intestinal ulcers from coming back after they have healed. This medication is also used to treat certain stomach and throat (esophagus) problems (such as erosive esophagitis, gastroesophageal reflux disease-GERD, Zollinger-Ellison syndrome).\r\n', 10, 300.00),
(11, 'Alternagel', 'Aluminum Hydroxide', 'This medication is used to treat the symptoms of too much stomach acid such as stomach upset, heartburn, and acid indigestion. Aluminum hydroxide is an antacid that works quickly to lower the acid in the stomach. Liquid antacids usually work faster/better than tablets or capsules.', 50, 950.00),
(12, 'Biogesic', 'Paracetamol', 'Relief of fever, minor aches & pains.', 20, 3.75);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `bloodType` varchar(5) NOT NULL,
  `bloodPressure` varchar(20) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `allergies` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `bloodType`, `bloodPressure`, `weight`, `height`, `allergies`) VALUES
(60, 'B+', '120/20', 67, 165, 'Seafoods'),
(76, 'AB+', '120/30', 61, 175, 'None'),
(78, 'O+', '120/50', 65, 170, 'None'),
(79, 'AB-', '180/70', 89, 120, 'None'),
(81, 'B-', '100/30', 67, 165, 'None'),
(83, 'A-', '120/20', 70, 150, 'Crabs'),
(84, 'B-', '130/20', 72, 170, 'None'),
(88, 'A+', '130/20', 63, 160, 'None'),
(89, 'B-', '', 53, 154, 'Chicken and eggs'),
(91, 'A-', '120/40', 75, 160, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `physician`
--

CREATE TABLE `physician` (
  `physician_id` int(11) NOT NULL,
  `licenseNumber` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `physician`
--

INSERT INTO `physician` (`physician_id`, `licenseNumber`, `department`) VALUES
(74, 'APL9829', 'Gynaecology'),
(75, 'KSI8290', 'Radiotherapy'),
(77, 'MNJ1365', 'Cardiology'),
(85, 'LSP2910', 'Psychiatry'),
(87, 'PLX2910', 'Family Medicine'),
(90, 'LKS1239', 'Family Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `visit_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `dosage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`visit_id`, `medicine_id`, `quantity`, `dosage`) VALUES
(32, 10, 5, '2 times a day'),
(34, 10, 2, 'Twice a day if pain occurs'),
(35, 9, 3, 'Once a day'),
(36, NULL, NULL, NULL),
(38, 9, 20, 'Take only when pain is unbearable.'),
(39, NULL, NULL, NULL),
(40, NULL, NULL, NULL),
(41, 9, 2, '2 times a day'),
(42, NULL, NULL, NULL),
(43, NULL, NULL, NULL),
(44, NULL, NULL, NULL),
(45, NULL, NULL, NULL),
(46, 11, 5, 'Only once a day before sleeping at night.'),
(47, NULL, NULL, NULL),
(49, NULL, NULL, NULL),
(50, 9, 5, 'Once a day'),
(51, NULL, NULL, NULL),
(52, NULL, NULL, NULL),
(53, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatment_id` int(11) NOT NULL,
  `diagnosis` text NOT NULL,
  `treatment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treatment_id`, `diagnosis`, `treatment`) VALUES
(34, 'Knee is starting to heal. Continue rest for 1 month.', 'Soft tissue injury treatment and gave some ice compression'),
(36, 'Cancer is slowly growing. Come back after 4 weeks for the treatment again.', 'Radiation therapy '),
(40, 'Patient has weak heart', 'Slow cardio'),
(43, 'Cancer is slowly dying due to continuous chemotherapy', 'Chemotherapy'),
(45, 'Radiation therapy is doing good for the patient', 'Radiation therapy'),
(52, 'Heartburn', 'Slow cardio');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `dateRegistered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`user_id`, `email`, `password`, `firstname`, `lastname`, `gender`, `birthdate`, `address`, `contact`, `user_type`, `dateRegistered`) VALUES
(4, 'darrelsolis.360@gmail.com', '123', 'Darrel', 'Solis', 'Male', '1997-07-18', 'Lapu-lapu', '0925-234-8929', 'Admin', '2013-11-02'),
(60, 'ticod.41@gmail.com', '123', 'Christian Genrel', 'Ticod', 'Male', '1995-01-18', 'Hipodromo', '09492381204', 'Patient', '2017-03-10'),
(74, 'kim@gmail.com', '123', 'Kim', 'Yap', 'Female', '1990-11-08', 'Cebu City', '09283910283', 'Physician', '2017-03-12'),
(75, 'james.lopez@yahoo.com', '123', 'James', 'Lopez', 'Male', '1992-08-17', 'Minglanilla', '09492381204', 'Physician', '2017-03-12'),
(76, 'steven.tan@gmail.com', '123', 'Steven Carl', 'Tan', 'Male', '1997-01-13', 'Bulacao, Cebu', '09239661021', 'Patient', '2017-03-12'),
(77, 'delacruzglenn23@gmail.com', '12345', 'Glenn Mathew', 'De la Cruz', 'Male', '1995-09-23', 'Banawa', '2361160', 'Physician', '2017-03-14'),
(78, 'louis.loren@gmail.com', '123', 'Louis', 'Loren', 'Male', '1997-02-07', 'Highway 77 Talamban Cebu City', '09124893304', 'Patient', '2017-03-14'),
(79, 'johnny.doe@gmail.com', '123', 'Johnny Mike', 'Doe', 'Male', '1990-12-10', 'San Fernando, Cebu', '09234820192', 'Patient', '2017-03-14'),
(81, 'johnson.peter@gmail.com', '123', 'Peter Michael', 'Johnson', 'Male', '1992-11-16', 'Carcar', '09238419230', 'Patient', '2017-03-20'),
(83, 'dave@gmail.com', '123', 'David', 'Lee', 'Male', '1994-08-06', 'Mandaue City', '09458239201', 'Patient', '2017-03-20'),
(84, 'luke_simmons@gmail.com', '123', 'Luke ', 'Simmons', 'Male', '1996-09-12', 'Pooc, Talisay', '09239428120', 'Patient', '2017-03-20'),
(85, 'will.chu@gmail.com', '123', 'William Gabriel', 'Chu', 'Male', '1992-09-17', 'Labangon, Cebu', '09238471291', 'Physician', '2017-03-20'),
(87, 'marissa@gmail.com', '123', 'Marissa', 'Cuenco', 'Female', '1981-10-17', 'Banilad, Cebu', '09328263941', 'Physician', '2017-03-20'),
(88, 'joseph_reyes@gmail.com', '123', 'Joseph', 'Reyes', 'Male', '1992-07-12', 'Lagtang, Talisay', '09238593022', 'Patient', '2017-03-21'),
(89, 'ajoan.cruz@gmail.com', '123', 'Alaiza Joan', 'Cruz', 'Female', '1995-11-18', 'Liloan, Cebu', '09234759102', 'Patient', '2017-03-21'),
(90, 'vincent@gmail.com', '123', 'Vincent', 'Velila', 'Male', '1995-03-12', 'Talisay City, Cebu', '09432039123', 'Physician', '2017-03-22'),
(91, 'phillip_redulla@yahoo.com', '123', 'Jhonne Philip', 'Redulla', 'Male', '1993-01-18', 'Camella Homes, Lawaan', '292-1028', 'Patient', '2017-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `visit_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `physician_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `visit_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`visit_id`, `patient_id`, `physician_id`, `date`, `time`, `visit_type`) VALUES
(32, 76, 77, '2017-03-15', '15:30:35', 'Checkup'),
(34, 76, 74, '2017-03-15', '22:16:55', 'Treatment'),
(35, 60, 74, '2017-03-15', '22:24:58', 'Checkup'),
(36, 79, 75, '2017-03-17', '21:19:13', 'Treatment'),
(38, 60, 74, '2017-03-17', '21:55:17', 'Checkup'),
(39, 79, 77, '2017-03-18', '22:11:04', 'Checkup'),
(40, 79, 77, '2017-03-18', '23:13:05', 'Treatment'),
(41, 83, 77, '2017-03-20', '14:40:43', 'Checkup'),
(42, 83, 75, '2017-03-20', '19:44:05', 'Checkup'),
(43, 81, 75, '2017-03-20', '19:45:19', 'Treatment'),
(44, 78, 75, '2017-03-20', '19:48:29', 'Checkup'),
(45, 83, 75, '2017-03-20', '19:50:08', 'Treatment'),
(46, 84, 77, '2017-03-20', '20:57:20', 'Checkup'),
(47, 60, 77, '2017-03-20', '22:11:49', 'Checkup'),
(49, 88, 87, '2017-03-21', '09:53:35', 'Checkup'),
(50, 76, 77, '2017-03-21', '09:30:03', 'Checkup'),
(51, 83, 77, '2017-03-21', '10:08:10', 'Checkup'),
(52, 84, 77, '2017-03-21', '10:10:29', 'Treatment'),
(53, 76, 87, '2017-03-20', '17:00:00', 'Checkup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `ap_patient_id` (`patient_id`),
  ADD KEY `ap_physician_id` (`physician_id`);

--
-- Indexes for table `checkup`
--
ALTER TABLE `checkup`
  ADD PRIMARY KEY (`checkup_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `physician`
--
ALTER TABLE `physician`
  ADD PRIMARY KEY (`physician_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD KEY `p_visit_id` (`visit_id`),
  ADD KEY `p_medicine_id` (`medicine_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatment_id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visit_id`),
  ADD KEY `visit_patient_id` (`patient_id`),
  ADD KEY `visit_physician_id` (`physician_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `ap_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `userdata` (`user_id`),
  ADD CONSTRAINT `ap_physician_id` FOREIGN KEY (`physician_id`) REFERENCES `userdata` (`user_id`);

--
-- Constraints for table `checkup`
--
ALTER TABLE `checkup`
  ADD CONSTRAINT `checkup_id` FOREIGN KEY (`checkup_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_id` FOREIGN KEY (`patient_id`) REFERENCES `userdata` (`user_id`);

--
-- Constraints for table `physician`
--
ALTER TABLE `physician`
  ADD CONSTRAINT `physician_id` FOREIGN KEY (`physician_id`) REFERENCES `userdata` (`user_id`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `p_medicine_id` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`),
  ADD CONSTRAINT `p_visit_id` FOREIGN KEY (`visit_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_id` FOREIGN KEY (`treatment_id`) REFERENCES `visit` (`visit_id`);

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_patient_id` FOREIGN KEY (`patient_id`) REFERENCES `userdata` (`user_id`),
  ADD CONSTRAINT `visit_physician_id` FOREIGN KEY (`physician_id`) REFERENCES `userdata` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
