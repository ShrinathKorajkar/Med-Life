-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 12:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medlifedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnose`
--

CREATE TABLE `diagnose` (
  `SNO` int(11) NOT NULL,
  `AADHAR_NO` decimal(12,0) DEFAULT NULL,
  `T_DATE` date NOT NULL DEFAULT current_timestamp(),
  `APPEAREANCE` varchar(20) NOT NULL,
  `BP` varchar(10) NOT NULL,
  `MASS` float NOT NULL,
  `TEMP` int(11) NOT NULL,
  `PULSE` varchar(10) NOT NULL,
  `REMARKS` varchar(100) NOT NULL,
  `MEDICATION` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnose`
--

INSERT INTO `diagnose` (`SNO`, `AADHAR_NO`, `T_DATE`, `APPEAREANCE`, `BP`, `MASS`, `TEMP`, `PULSE`, `REMARKS`, `MEDICATION`) VALUES
(1, '945632840305', '2022-01-05', 'Swollen inside mouth', '100/60', 62, 37, '78', 'Improvement', 'B-complex'),
(2, '945632840305', '2021-08-12', 'skin rashes', '100/69', 55, 92, '60', 'Better than before', 'dicloxacillin'),
(3, '945632840305', '2021-09-25', 'feelings of sadness', '100/70', 65, 95, '65', 'Recovering', 'citalopram'),
(4, '945632840305', '2022-01-28', 'muscle pain', '100/57', 70, 99, '82', 'Getting Worse', 'myoril 4mg'),
(5, '945632840305', '2022-02-04', 'swelling', '100/78', 50, 98, '62', 'Some test tobe done', 'Aspirin');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `DOC_ID` varchar(11) NOT NULL,
  `DOC_NAME` varchar(25) NOT NULL,
  `PASSWORDS` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`DOC_ID`, `DOC_NAME`, `PASSWORDS`) VALUES
('BEG3495387', 'Dr. Philip Vaz', '$2y$10$MTcPW3IRrERd3PVyGx2sw.iDwSui9G5UwDzZC/TkrIoXrW8/vEFQW'),
('BEG4546347', 'Dr. Praveen Kumar', '$2y$10$lf0jwOySssVlVHj/dmYV2uH5gB.k8HZ1Ogfu78Rih0b73JPRbOYkq'),
('BEG7848058', 'Dr. Naveen Angadi', '$2y$10$sCWLddkRcTnRO8fJ9kH2We7Q/WXVDgHyU8gT/G4AQEy3ApzeCppda'),
('BEG8225210', 'Dr. Archana Uppin', '$2y$10$30H8wws3myPQpK./kaQFi.lBq2E1H2EDeKOhiHHcErx1cR/b8tLdC'),
('BEG9543210', 'Dr. V Gokak', '$2y$10$0rrfIChWOWgy5ciIx77F8OyB1.x1kd.8661kg1yXERV/Lxbx4CcrK');

-- --------------------------------------------------------

--
-- Table structure for table `med_history`
--

CREATE TABLE `med_history` (
  `SNO` int(11) NOT NULL,
  `AADHAR_NO` decimal(12,0) DEFAULT NULL,
  `S_DATE` date NOT NULL DEFAULT current_timestamp(),
  `E_DATE` date DEFAULT current_timestamp(),
  `SYMPTOMS` varchar(100) NOT NULL,
  `DISEASE` varchar(25) NOT NULL,
  `MEDICATION` varchar(100) DEFAULT NULL,
  `DOC_NAME` varchar(25) DEFAULT NULL,
  `STAT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `med_history`
--

INSERT INTO `med_history` (`SNO`, `AADHAR_NO`, `S_DATE`, `E_DATE`, `SYMPTOMS`, `DISEASE`, `MEDICATION`, `DOC_NAME`, `STAT`) VALUES
(1, '945632840305', '2021-12-05', '2021-12-22', 'Swollen mouth', 'mouth ulcers', 'B-complex', 'Dr. Philip Vaz', 'Cured'),
(2, '646787204425', '2021-09-21', '2021-10-25', 'Blood in Stool', 'Ulcerative Collotis', 'Infliximab, mesacol', 'Dr. V Gokak', 'Cured'),
(3, '646787204425', '2021-03-17', '2021-03-22', 'Swelling in legs', 'Blood clot', 'Acitron', 'Dr. Archana Uppin', 'Cured'),
(4, '945632840305', '2022-04-12', '0000-00-00', 'Swollen mouth', 'mouth ulcers', 'B-complex', 'Dr. Philip Vaz', 'Active'),
(5, '943208807080', '2020-05-01', '2020-06-11', 'Swollen hand due to accident', 'Crack in hand bone', 'Calcium, Codiene, Tereperatide', 'Dr. Naveen Angadi', 'Cured'),
(6, '945632840305', '2019-01-10', '2021-02-05', 'skin rashes', 'diaberes', 'dicloxacillin', 'Dr. Philip Vaz', 'Cured'),
(7, '945632840305', '2020-02-12', '2021-02-25', 'feelings of sadness', 'depression', 'citalopram', 'Dr. Praveen Kumar', 'Cured'),
(8, '945632840305', '2021-04-10', '2021-04-22', 'muscle pain', 'lupus', 'myoril 4mg', 'Dr. V Gokak', 'Cured'),
(9, '945632840305', '2021-10-12', '2021-10-20', 'swelling', 'yeast infection', 'Aspirin', 'Dr. Archana Uppin', 'Cured'),
(10, '945632840305', '2021-02-05', '2021-03-11', 'runny nose', 'Colds and flu', 'crocin', 'Dr. Naveen Angadi', 'Cured');

-- --------------------------------------------------------

--
-- Table structure for table `other_med`
--

CREATE TABLE `other_med` (
  `SNO` int(11) NOT NULL,
  `AADHAR_NO` decimal(12,0) DEFAULT NULL,
  `MEDS` varchar(100) DEFAULT NULL,
  `ALLERGIES` varchar(50) DEFAULT NULL,
  `INJURY` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_med`
--

INSERT INTO `other_med` (`SNO`, `AADHAR_NO`, `MEDS`, `ALLERGIES`, `INJURY`) VALUES
(1, '945632840305', NULL, 'Dust', 'Fracture in hand'),
(2, '646787204425', NULL, NULL, NULL),
(3, '943208807080', 'Tenepride(sugar)', NULL, NULL),
(4, '505911565147', NULL, 'Dust', 'Tonsins operation'),
(5, '697967634778', 'Gabadine 300 mg , Emazen D', NULL, 'Slip Disk');

-- --------------------------------------------------------

--
-- Table structure for table `p_details`
--

CREATE TABLE `p_details` (
  `SNO` int(11) NOT NULL,
  `AADHAR_NO` decimal(12,0) DEFAULT NULL,
  `AGE` int(11) NOT NULL,
  `BLOOD_GRP` varchar(5) NOT NULL,
  `DOB` date NOT NULL,
  `CONTACT_NO` decimal(10,0) NOT NULL,
  `ECONTACT_NO` decimal(10,0) NOT NULL,
  `GENDER` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_details`
--

INSERT INTO `p_details` (`SNO`, `AADHAR_NO`, `AGE`, `BLOOD_GRP`, `DOB`, `CONTACT_NO`, `ECONTACT_NO`, `GENDER`) VALUES
(1, '945632840305', 20, 'B +ve', '2001-06-23', '7848058034', '9341960712', 'Male'),
(2, '646787204425', 40, 'A +ve', '1980-04-24', '9164073799', '9341960712', 'Female'),
(3, '943208807080', 50, 'AB +v', '1970-07-07', '9341960712', '7848058034', 'Male'),
(4, '505911565147', 20, 'B +ve', '2001-07-18', '7619153471', '9591690590', 'Male'),
(5, '697967634778', 58, 'O +ve', '1963-04-08', '9591690590', '7619153471', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `AADHAR_NO` decimal(12,0) NOT NULL,
  `USERNAME` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`AADHAR_NO`, `USERNAME`) VALUES
('505911565147', 'Prathamesh Chougule'),
('646787204425', 'Sunanda Korajkar'),
('697967634778', 'Seema Chougule'),
('943208807080', 'Krishna Korajkar'),
('945632840305', 'Shrinath Korajkar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnose`
--
ALTER TABLE `diagnose`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`DOC_ID`);

--
-- Indexes for table `med_history`
--
ALTER TABLE `med_history`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `other_med`
--
ALTER TABLE `other_med`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `p_details`
--
ALTER TABLE `p_details`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`AADHAR_NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnose`
--
ALTER TABLE `diagnose`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `med_history`
--
ALTER TABLE `med_history`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `other_med`
--
ALTER TABLE `other_med`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p_details`
--
ALTER TABLE `p_details`
  MODIFY `SNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
