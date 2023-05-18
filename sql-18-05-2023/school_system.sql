-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4307
-- Generation Time: May 18, 2023 at 03:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `addresses` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `addresses`) VALUES
(1, 'P.O. Box: 2835, P.C.: 130, Sultanate of Oman, Tel.: 24035800, Mobile: 99045180 | P.O. Box: ۲۸۳٥, P.C.: ۱۳۰, Sultanate of Oman, Tel.: ۲٤۰۳٥۸۰۰, Mobile: ۹۹۰٤٥۱۸۰ E-mail: info@ais-om.com, www.ais-om.com, Tax Card No. 8136517, VA');

-- --------------------------------------------------------

--
-- Table structure for table `add_instructors`
--

CREATE TABLE `add_instructors` (
  `id` int(11) NOT NULL,
  `name_of_instructor` varchar(225) DEFAULT NULL,
  `p_no` varchar(225) DEFAULT NULL,
  `p_address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joined_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `availability_daily_check_report`
--

CREATE TABLE `availability_daily_check_report` (
  `id` int(11) NOT NULL,
  `availability_daily_check_report` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability_daily_check_report`
--

INSERT INTO `availability_daily_check_report` (`id`, `availability_daily_check_report`) VALUES
(1, 'To be maintained');

-- --------------------------------------------------------

--
-- Table structure for table `availability_operations_manual_cab`
--

CREATE TABLE `availability_operations_manual_cab` (
  `id` int(11) NOT NULL,
  `availability_operations_manual_cab` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability_operations_manual_cab`
--

INSERT INTO `availability_operations_manual_cab` (`id`, `availability_operations_manual_cab`) VALUES
(1, 'To be proved');

-- --------------------------------------------------------

--
-- Table structure for table `company_name`
--

CREATE TABLE `company_name` (
  `id` int(11) NOT NULL,
  `c_name` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_name`
--

INSERT INTO `company_name` (`id`, `c_name`) VALUES
(1, 'ABC TEXG'),
(2, 'DBC TEST'),
(3, 'M/S. AI Awaafi AI Wafia Tading & Cont. Co');

-- --------------------------------------------------------

--
-- Table structure for table `conclusion`
--

CREATE TABLE `conclusion` (
  `id` int(11) NOT NULL,
  `conclusion` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conclusion`
--

INSERT INTO `conclusion` (`id`, `conclusion`) VALUES
(1, 'Fit for its intended use');

-- --------------------------------------------------------

--
-- Table structure for table `declaration`
--

CREATE TABLE `declaration` (
  `id` int(11) NOT NULL,
  `declaration` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `declaration`
--

INSERT INTO `declaration` (`id`, `declaration`) VALUES
(1, 'I hereby declare that the above information in correct and the equirment has been tested and thoroughly examined in accordance with the appl');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_in_course`
--

CREATE TABLE `enrolled_in_course` (
  `id` int(11) NOT NULL,
  `e_course` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolled_in_course`
--

INSERT INTO `enrolled_in_course` (`id`, `e_course`) VALUES
(1, 'PHP'),
(2, 'Safe Use & Operation of Backhoe Loader.');

-- --------------------------------------------------------

--
-- Table structure for table `id_card_generator`
--

CREATE TABLE `id_card_generator` (
  `id` int(11) NOT NULL,
  `person_name` int(11) DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `date_of_expiry` date DEFAULT NULL,
  `examinor_name` int(11) DEFAULT NULL,
  `userimage` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inspected_by`
--

CREATE TABLE `inspected_by` (
  `id` int(11) NOT NULL,
  `inspected_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspected_by`
--

INSERT INTO `inspected_by` (`id`, `inspected_by`) VALUES
(1, 'Engr. Tahir Zeb');

-- --------------------------------------------------------

--
-- Table structure for table `name_address_owner`
--

CREATE TABLE `name_address_owner` (
  `id` int(11) NOT NULL,
  `name_and_address_owner` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `name_address_owner`
--

INSERT INTO `name_address_owner` (`id`, `name_and_address_owner`) VALUES
(1, 'usama hameed');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `note` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `note`) VALUES
(1, 'Please refer to the backlog of this certificate for detail checklist');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_form_data`
--

CREATE TABLE `pdf_form_data` (
  `id` int(11) NOT NULL,
  `certificate_number` varchar(255) NOT NULL,
  `sticker_number` varchar(255) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `name_address_owner` varchar(255) DEFAULT NULL,
  `manufacture_date` varchar(225) DEFAULT NULL,
  `inspection_place` varchar(255) DEFAULT NULL,
  `ref_standard` varchar(255) DEFAULT NULL,
  `registration_number_owner_no` varchar(255) DEFAULT NULL,
  `model_serial_number` varchar(255) DEFAULT NULL,
  `manufacturer_documentation` varchar(255) DEFAULT NULL,
  `prev_inspection_date_cert_no` varchar(225) DEFAULT NULL,
  `next_inspection_date` varchar(225) DEFAULT NULL,
  `prev_load_test_date_cert_no` varchar(225) DEFAULT NULL,
  `next_load_test_date` varchar(225) DEFAULT NULL,
  `availability_of_operations_manual` varchar(255) DEFAULT NULL,
  `load_chart_in_cab` varchar(255) DEFAULT NULL,
  `accessory_certificate` varchar(255) DEFAULT NULL,
  `availability_of_daily_check_report` varchar(255) DEFAULT NULL,
  `engine_serial_number` varchar(255) DEFAULT NULL,
  `ground_clearance` varchar(255) DEFAULT NULL,
  `net_power` varchar(255) DEFAULT NULL,
  `bucket_width` varchar(255) DEFAULT NULL,
  `bucket_capacity` varchar(255) DEFAULT NULL,
  `dig_depth_backhoe` varchar(255) DEFAULT NULL,
  `conclusion` varchar(255) DEFAULT NULL,
  `declaration` varchar(255) DEFAULT NULL,
  `inspected_by` varchar(255) DEFAULT NULL,
  `verified_by` varchar(255) DEFAULT NULL,
  `inspection_date` varchar(225) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `addresses` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdf_form_data`
--

INSERT INTO `pdf_form_data` (`id`, `certificate_number`, `sticker_number`, `reference_number`, `name_address_owner`, `manufacture_date`, `inspection_place`, `ref_standard`, `registration_number_owner_no`, `model_serial_number`, `manufacturer_documentation`, `prev_inspection_date_cert_no`, `next_inspection_date`, `prev_load_test_date_cert_no`, `next_load_test_date`, `availability_of_operations_manual`, `load_chart_in_cab`, `accessory_certificate`, `availability_of_daily_check_report`, `engine_serial_number`, `ground_clearance`, `net_power`, `bucket_width`, `bucket_capacity`, `dig_depth_backhoe`, `conclusion`, `declaration`, `inspected_by`, `verified_by`, `inspection_date`, `note`, `addresses`) VALUES
(1, 'ISNTC875449', 'ST687378', 'MCT396208', 'usama hameed', 'asdsad', 'JALAN', 'BSEN 474-4: 2006 + A2:2012', 'asdasdas', 'dsfsdfds', 'asdasd', '2023-05-12', '2023-05-17', '2023-05-17', '2023-05-17', 'To be proved', 'asdsadsa', 'dsfsdfdsf', 'To be maintained', 'sadsadsa', 'sdfsdfds', 'asdasd', 'sdfsdf', 'asdasdsa', 'sdfsfd', 'Fit for its intended use', 'I hereby declare that the above information in correct and the equirment has been tested and thoroughly examined in accordance with the appl', 'Engr. Tahir Zeb', 'Mr.Umer Zeb', '2023-05-10', 'Please refer to the backlog of this certificate for detail checklist', 'P.O. Box: 2835, P.C.: 130, Sultanate of Oman, Tel.: 24035800, Mobile: 99045180 | P.O. Box: ۲۸۳٥, P.C.: ۱۳۰, Sultanate of Oman, Tel.: ۲٤۰۳٥۸۰۰, Mobile: ۹۹۰٤٥۱۸۰ E-mail: info@ais-om.com, www.ais-om.com, Tax Card No. 8136517, VA');

-- --------------------------------------------------------

--
-- Table structure for table `place_inspection`
--

CREATE TABLE `place_inspection` (
  `id` int(11) NOT NULL,
  `place_inspection` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `place_inspection`
--

INSERT INTO `place_inspection` (`id`, `place_inspection`) VALUES
(1, 'JALAN');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `p_position` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `p_position`) VALUES
(1, 'DEVELOPER'),
(2, 'Designer');

-- --------------------------------------------------------

--
-- Table structure for table `ref_standard`
--

CREATE TABLE `ref_standard` (
  `id` int(11) NOT NULL,
  `ref_standard` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_standard`
--

INSERT INTO `ref_standard` (`id`, `ref_standard`) VALUES
(1, 'BSEN 474-4: 2006 + A2:2012');

-- --------------------------------------------------------

--
-- Table structure for table `trainee`
--

CREATE TABLE `trainee` (
  `id` int(11) NOT NULL,
  `name_of_trainee` varchar(225) DEFAULT NULL,
  `phone` varchar(225) DEFAULT NULL,
  `address` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `enrolled_in_course` int(11) DEFAULT NULL,
  `enrolled_on` date DEFAULT NULL,
  `certificate_no` varchar(255) DEFAULT NULL,
  `instructor_name` int(11) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_until` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verified_by`
--

CREATE TABLE `verified_by` (
  `id` int(11) NOT NULL,
  `verified_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verified_by`
--

INSERT INTO `verified_by` (`id`, `verified_by`) VALUES
(1, 'Mr.Umer Zeb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_instructors`
--
ALTER TABLE `add_instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availability_daily_check_report`
--
ALTER TABLE `availability_daily_check_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availability_operations_manual_cab`
--
ALTER TABLE `availability_operations_manual_cab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_name`
--
ALTER TABLE `company_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conclusion`
--
ALTER TABLE `conclusion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `declaration`
--
ALTER TABLE `declaration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrolled_in_course`
--
ALTER TABLE `enrolled_in_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `id_card_generator`
--
ALTER TABLE `id_card_generator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspected_by`
--
ALTER TABLE `inspected_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `name_address_owner`
--
ALTER TABLE `name_address_owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf_form_data`
--
ALTER TABLE `pdf_form_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_inspection`
--
ALTER TABLE `place_inspection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_standard`
--
ALTER TABLE `ref_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainee`
--
ALTER TABLE `trainee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verified_by`
--
ALTER TABLE `verified_by`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `add_instructors`
--
ALTER TABLE `add_instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `availability_daily_check_report`
--
ALTER TABLE `availability_daily_check_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `availability_operations_manual_cab`
--
ALTER TABLE `availability_operations_manual_cab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_name`
--
ALTER TABLE `company_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conclusion`
--
ALTER TABLE `conclusion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `declaration`
--
ALTER TABLE `declaration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enrolled_in_course`
--
ALTER TABLE `enrolled_in_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `id_card_generator`
--
ALTER TABLE `id_card_generator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inspected_by`
--
ALTER TABLE `inspected_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `name_address_owner`
--
ALTER TABLE `name_address_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pdf_form_data`
--
ALTER TABLE `pdf_form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `place_inspection`
--
ALTER TABLE `place_inspection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_standard`
--
ALTER TABLE `ref_standard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainee`
--
ALTER TABLE `trainee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `verified_by`
--
ALTER TABLE `verified_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
