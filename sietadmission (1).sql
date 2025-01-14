-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 11:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sietadmission`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserName` varchar(20) DEFAULT NULL,
  `UserEmailId` varchar(30) NOT NULL,
  `UserPassword` varchar(20) NOT NULL,
  `UserCorrectPassword` varchar(20) NOT NULL,
  `UserType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiryform2`
--

CREATE TABLE `enquiryform2` (
  `id` int(255) NOT NULL,
  `StudentName` varchar(30) DEFAULT NULL,
  `StudentMobileNo` bigint(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `StudentEmailId` varchar(25) DEFAULT NULL,
  `EmisId` bigint(25) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `FatherName` varchar(30) DEFAULT NULL,
  `ParentsMobileNo` bigint(11) DEFAULT NULL,
  `FatherOccupation` varchar(30) DEFAULT NULL,
  `Nationality` varchar(30) DEFAULT NULL,
  `Religion` varchar(30) DEFAULT NULL,
  `Community` varchar(10) DEFAULT NULL,
  `District` varchar(30) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  `Pincode` int(7) DEFAULT NULL,
  `Village` varchar(30) DEFAULT NULL,
  `ApproachedBy` varchar(30) DEFAULT NULL,
  `FacultyName` varchar(30) DEFAULT NULL,
  `RecommendedStudentName` varchar(30) DEFAULT NULL,
  `RecommendedStudentYear` varchar(20) DEFAULT NULL,
  `RecommendedStudentDepartment` varchar(30) DEFAULT NULL,
  `SeekingAdmission` varchar(30) DEFAULT NULL,
  `Board10` varchar(20) DEFAULT NULL,
  `SchoolName10` varchar(50) DEFAULT NULL,
  `SchoolName12` varchar(50) DEFAULT NULL,
  `TotalMark10` int(4) DEFAULT NULL,
  `TotalMark12` int(4) DEFAULT NULL,
  `MediumOfInstruction10` varchar(10) DEFAULT NULL,
  `MediumOfInstruction12` varchar(10) DEFAULT NULL,
  `Group12` varchar(50) DEFAULT NULL,
  `NameOfInstitution` varchar(30) DEFAULT NULL,
  `DeptChoice1` varchar(30) DEFAULT NULL,
  `DeptChoice2` varchar(30) DEFAULT NULL,
  `DeptChoice3` varchar(30) DEFAULT NULL,
  `PhysicsMark` int(4) DEFAULT NULL,
  `ChemistryMark` int(4) DEFAULT NULL,
  `MathsMark` int(4) DEFAULT NULL,
  `CutOff` float DEFAULT NULL,
  `RegisterNo12` int(15) DEFAULT NULL,
  `CGPA` float DEFAULT NULL,
  `NameOfUGcourse` varchar(20) DEFAULT NULL,
  `NameOfDiplomaCourse` varchar(30) DEFAULT NULL,
  `PercentageDiploma` varchar(5) DEFAULT NULL,
  `NameOfTheCollege` varchar(30) DEFAULT NULL,
  `Sport` varchar(20) DEFAULT NULL,
  `SportName` varchar(20) DEFAULT NULL,
  `SportLevel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `umis`
--

CREATE TABLE `umis` (
  `ProfilePhoto` longblob DEFAULT NULL,
  `EmisId` bigint(20) DEFAULT NULL,
  `Salutation` varchar(10) DEFAULT NULL,
  `StudName` varchar(50) DEFAULT NULL,
  `StudEmailID` varchar(255) DEFAULT NULL,
  `StudDOB` date DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `BloodGroup` varchar(4) DEFAULT NULL,
  `Nationality` varchar(50) DEFAULT NULL,
  `Religion` varchar(50) DEFAULT NULL,
  `Community` varchar(50) DEFAULT NULL,
  `CommunityDocument` longblob DEFAULT NULL,
  `Caste` varchar(50) DEFAULT NULL,
  `AadhaarNumber` bigint(20) DEFAULT NULL,
  `AadhaarDocument` longblob DEFAULT NULL,
  `FirstGraduate` varchar(4) DEFAULT NULL,
  `FirstGraduateDocument` longblob DEFAULT NULL,
  `SpecialAdmissionQuota` varchar(4) DEFAULT NULL,
  `DifferentlyAbled` varchar(4) DEFAULT NULL,
  `StudentMobileNo` bigint(20) NOT NULL,
  `P_Country` varchar(50) DEFAULT NULL,
  `P_State` varchar(50) DEFAULT NULL,
  `MigrationDocument` longblob DEFAULT NULL,
  `P_LocationType` varchar(10) DEFAULT NULL,
  `P_District` varchar(50) DEFAULT NULL,
  `P_Taluk` varchar(50) DEFAULT NULL,
  `P_Village` varchar(50) DEFAULT NULL,
  `P_Block` varchar(50) DEFAULT NULL,
  `P_Pincode` bigint(20) DEFAULT NULL,
  `P_VillagePanchayat` varchar(50) DEFAULT NULL,
  `P_PostalAddress` varchar(250) DEFAULT NULL,
  `C_Country` varchar(50) DEFAULT NULL,
  `C_State` varchar(50) DEFAULT NULL,
  `C_LocationType` varchar(10) DEFAULT NULL,
  `C_District` varchar(50) DEFAULT NULL,
  `C_Taluk` varchar(50) DEFAULT NULL,
  `C_Village` varchar(50) DEFAULT NULL,
  `C_Block` varchar(50) DEFAULT NULL,
  `C_Pincode` bigint(20) DEFAULT NULL,
  `C_VillagePanchayat` varchar(50) DEFAULT NULL,
  `C_PostalAddress` varchar(250) DEFAULT NULL,
  `FatherName` varchar(50) DEFAULT NULL,
  `FatherOccupation` varchar(75) DEFAULT NULL,
  `MotherName` varchar(50) DEFAULT NULL,
  `MotherOccupation` varchar(75) DEFAULT NULL,
  `GuardianName` varchar(50) DEFAULT NULL,
  `Orphan` varchar(5) DEFAULT NULL,
  `AnnualFamilyIncome` int(11) DEFAULT NULL,
  `IncomeDocument` longblob DEFAULT NULL,
  `ParentsMobileNumber` bigint(20) DEFAULT NULL,
  `AccountNumber` bigint(20) DEFAULT NULL,
  `IfscCode` varchar(50) DEFAULT NULL,
  `BankName` varchar(75) DEFAULT NULL,
  `BankBranch` varchar(75) DEFAULT NULL,
  `City` varchar(75) DEFAULT NULL,
  `AcademicYearJoining` varchar(75) DEFAULT NULL,
  `StreamType` varchar(50) DEFAULT NULL,
  `CourseType` varchar(50) DEFAULT NULL,
  `Course` varchar(75) DEFAULT NULL,
  `Branch` varchar(75) DEFAULT NULL,
  `MediumOfInstruction` varchar(100) DEFAULT NULL,
  `ModeOfStudy` varchar(15) DEFAULT NULL,
  `DateOfAdmission` date DEFAULT NULL,
  `TypeOfAdmission` varchar(20) DEFAULT NULL,
  `counsellingNumber` varchar(30) DEFAULT NULL,
  `CounsellingDocument` longblob DEFAULT NULL,
  `RegistrationNumber` bigint(20) DEFAULT NULL,
  `LateralEntry` varchar(5) DEFAULT NULL,
  `DiplomaDocument` longblob DEFAULT NULL,
  `Hosteller` varchar(5) DEFAULT NULL,
  `SeekingAdmissionFor` varchar(100) DEFAULT NULL,
  `SchoolName10` varchar(50) DEFAULT NULL,
  `Board10` varchar(15) NOT NULL,
  `SchoolName12` varchar(50) DEFAULT NULL,
  `TotalMark10` int(4) DEFAULT NULL,
  `TotalMark10Document` longblob DEFAULT NULL,
  `TotalMark12` int(4) DEFAULT NULL,
  `TotalMark12Document` longblob DEFAULT NULL,
  `MediumOfInstruction10` varchar(50) DEFAULT NULL,
  `MediumOfInstruction12` varchar(50) DEFAULT NULL,
  `Group12` varchar(50) DEFAULT NULL,
  `PhysicsMark` int(4) DEFAULT NULL,
  `ChemistryMark` int(4) DEFAULT NULL,
  `MathsMark` int(4) DEFAULT NULL,
  `CutOff` float DEFAULT NULL,
  `RegisterNo12` varchar(20) DEFAULT NULL,
  `CGPA` float DEFAULT NULL,
  `NameOfUGcourse` varchar(20) DEFAULT NULL,
  `NameOfUGCollege` varchar(100) DEFAULT NULL,
  `UGDocument` longblob DEFAULT NULL,
  `NameOfDiplomaCourse` varchar(50) DEFAULT NULL,
  `PercentageDiploma` varchar(5) DEFAULT NULL,
  `NameOfDiplomaCollege` varchar(100) DEFAULT NULL,
  `Sport` varchar(20) DEFAULT NULL,
  `SportName` varchar(20) DEFAULT NULL,
  `SportLevel` varchar(20) DEFAULT NULL,
  `TransferCertificate` longblob DEFAULT NULL,
  `SignaturePhoto` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
