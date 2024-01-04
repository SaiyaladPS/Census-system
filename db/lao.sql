-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 09:53 AM
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
-- Database: `lao`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `ci_id` int(100) NOT NULL,
  `ci_img` varchar(255) NOT NULL,
  `ci_fname` varchar(255) NOT NULL,
  `ci_lname` varchar(255) NOT NULL,
  `ci_gander` varchar(255) NOT NULL,
  `ci_tel` varchar(255) NOT NULL,
  `vi_id` int(100) NOT NULL,
  `ci_date` date NOT NULL,
  `ci_dob` date NOT NULL,
  `pro_id` int(100) NOT NULL,
  `dis_id` int(100) NOT NULL,
  `ci_how` varchar(255) NOT NULL,
  `ci_son` varchar(255) NOT NULL,
  `ci_soso` varchar(255) NOT NULL,
  `ci_sol` varchar(255) NOT NULL,
  `ci_sll` varchar(255) NOT NULL,
  `ci_aso` varchar(255) NOT NULL,
  `ci_out` date NOT NULL,
  `ci_in` date NOT NULL,
  `ci_remak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`ci_id`, `ci_img`, `ci_fname`, `ci_lname`, `ci_gander`, `ci_tel`, `vi_id`, `ci_date`, `ci_dob`, `pro_id`, `dis_id`, `ci_how`, `ci_son`, `ci_soso`, `ci_sol`, `ci_sll`, `ci_aso`, `ci_out`, `ci_in`, `ci_remak`) VALUES
(2, '1.jpg', 'ມີ', 'ແສງພະຫັດ', 'Male', '22055115', 3, '2023-12-20', '2003-06-17', 2, 2, '5555', 'ລາວລຸ່ມ', 'ລາວ', 'ລາວ', 'ພຸດ', 'ນັກສືກສາ', '2023-12-21', '0000-00-00', ''),
(3, 'portrait-handsome-cartoon-businessman-character-man-blue-background-use-laptop-presentation-3d-render-illustration_839035-118734.jpg', 'ເຮຍບອຍ', 'ລຸງເຊລີ້', 'Male', '2055555', 5, '2023-12-20', '2001-12-20', 3, 3, '555555', 'ລາວເທິງ', 'ອາເມລິກາ', 'ລາວ', 'ຄຮິດຕຽນ', 'ນັກທຸລະກິດ', '2023-12-21', '0000-00-00', ''),
(5, '3.jpg', 'ແສງພະຈັນ', 'ມະນີວັນ', 'Girl', '20545488', 3, '2023-12-20', '2003-12-04', 2, 2, '5555', 'ລາວລຸ່ມ', 'ລາວ', 'ລາວ', 'ພຸດ', 'ປ/ຊ', '0000-00-00', '2023-12-21', 'ຍ້າຍເຂົ້າໃຫມ່'),
(6, 'FFFFFF.png', 'ເຈມ', 'ແສງພະວົງ', 'Male', '0', 3, '2023-12-21', '2019-12-04', 2, 2, '5555', 'ລາວລຸ່ມ', 'ລາວ', 'ລາວ', 'ພຸດ', 'ເດັກ', '0000-00-00', '2023-12-21', 'ເກີດໃຫມ່');

-- --------------------------------------------------------

--
-- Table structure for table `different`
--

CREATE TABLE `different` (
  `di_id` int(100) NOT NULL,
  `di_img` varchar(255) NOT NULL,
  `di_fname` varchar(255) NOT NULL,
  `di_lname` varchar(255) NOT NULL,
  `di_num` varchar(255) NOT NULL,
  `di_pn` varchar(255) NOT NULL,
  `di_dob` varchar(100) NOT NULL,
  `di_soso` varchar(100) NOT NULL,
  `di_sll` varchar(100) NOT NULL,
  `di_gander` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `different`
--

INSERT INTO `different` (`di_id`, `di_img`, `di_fname`, `di_lname`, `di_num`, `di_pn`, `di_dob`, `di_soso`, `di_sll`, `di_gander`) VALUES
(1, 'download.jpg', 'Json', 'KKN', '526544412', 'ສະຫະລັດອາເມລິກາ', '1999-10-04', 'ອາເມລິກາ', 'ຄຮິດຕຽນ', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dis_id` int(100) NOT NULL,
  `dis_name` varchar(255) DEFAULT NULL,
  `pro_id` int(100) DEFAULT NULL,
  `dis_remak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `dis_name`, `pro_id`, `dis_remak`) VALUES
(1, 'ພຽງ', 1, ''),
(2, 'ວຽງຄຳ', 2, ''),
(3, 'ບໍລິຄັນ', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `monk`
--

CREATE TABLE `monk` (
  `mo_id` int(100) NOT NULL,
  `mo_img` varchar(255) NOT NULL,
  `mo_fname` varchar(255) NOT NULL,
  `mo_lname` varchar(255) NOT NULL,
  `mo_oname` varchar(255) NOT NULL,
  `mo_sol` varchar(255) NOT NULL,
  `mo_soso` varchar(100) NOT NULL,
  `mo_sll` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `monk`
--

INSERT INTO `monk` (`mo_id`, `mo_img`, `mo_fname`, `mo_lname`, `mo_oname`, `mo_sol`, `mo_soso`, `mo_sll`) VALUES
(1, 'images.png', 'ພະອາຈານ', 'ສົມພອນ', 'ວັດປ່ານານິນ', 'ລາວ', 'ລາວ', 'ພຸດ');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `pe_id` int(11) NOT NULL,
  `pe_img` varchar(255) NOT NULL,
  `pe_fname` varchar(255) NOT NULL,
  `pe_lname` varchar(255) NOT NULL,
  `pe_gander` varchar(255) NOT NULL,
  `pe_tel` varchar(100) NOT NULL,
  `vi_id` int(100) NOT NULL,
  `pe_date` date NOT NULL,
  `pe_dob` date NOT NULL,
  `pro_id` int(100) NOT NULL,
  `dis_id` int(100) NOT NULL,
  `pe_how` varchar(255) NOT NULL,
  `pe_son` varchar(255) NOT NULL,
  `pe_soso` varchar(255) NOT NULL,
  `pe_sol` varchar(255) NOT NULL,
  `pe_sll` varchar(255) NOT NULL,
  `pe_aso` varchar(255) NOT NULL,
  `pe_date_in` date NOT NULL,
  `pe_remak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`pe_id`, `pe_img`, `pe_fname`, `pe_lname`, `pe_gander`, `pe_tel`, `vi_id`, `pe_date`, `pe_dob`, `pro_id`, `dis_id`, `pe_how`, `pe_son`, `pe_soso`, `pe_sol`, `pe_sll`, `pe_aso`, `pe_date_in`, `pe_remak`) VALUES
(3, '1.jpg', 'ມີ', 'ແສງພະຫັດ', 'Male', '22055115', 3, '2023-12-20', '2003-06-17', 2, 2, '5555', 'ລາວລຸ່ມ', 'ລາວ', 'ລາວ', 'ພຸດ', 'ນັກສືກສາ', '2023-12-21', 'ແຕ່ງດອງ'),
(4, '2.jpg', 'ຈັນດາ', 'ແສງພະຫັດ', 'Male', '202225511', 3, '2023-12-20', '2023-12-05', 2, 2, '2000', 'ລາວລຸ່ມ', 'ລາວ', 'ລາວ', 'ພຸດ', 'ນັກສືກສາ', '2023-12-21', 'ຍ້າຍອອກ'),
(8, '3.jpg', 'ແສງພະຈັນ', 'ມະນີວັນ', 'Girl', '20545488', 3, '2023-12-20', '2023-12-04', 2, 2, '5555', 'ລາວລຸ່ມ', 'ລາວ', 'ລາວ', 'ພຸດ', 'ປ/ຊ', '2023-12-21', 'ຍ້າຍເຂົ້າໃຫມ່'),
(9, '2.jpg', 'ຈັນດາ', 'ແສງພະຫັດ', 'Male', '202225511', 3, '2023-12-20', '2023-12-05', 2, 2, '0', 'ລາວລຸ່ມ', 'ລາວ', 'ລາວ', 'ພຸດ', 'ນັກສືກສາ', '2023-12-21', 'ເສຍຊິວິດ'),
(10, 'FFFFFF.png', 'ເຈມ', 'ແສງພະວົງ', 'Male', ' ', 3, '2023-12-21', '2023-12-04', 2, 2, '5555', 'ລາວລຸ່ມ', 'ລາວ', 'ລາວ', 'ພຸດ', 'ເດັກ', '2023-12-21', 'ເກີດໃຫມ່');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `pro_id` int(100) NOT NULL,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_remak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`pro_id`, `pro_name`, `pro_remak`) VALUES
(1, 'ໄຊຍະບູລີ', ''),
(2, 'ວຽງຈັນ', ''),
(3, 'ບໍລິຄຳໄຊ', '');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `ty_id` int(100) NOT NULL,
  `ty_name` varchar(255) DEFAULT NULL,
  `ty_remak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`ty_id`, `ty_name`, `ty_remak`) VALUES
(4, 'ຄົນຕ່າງດ້າວ', ''),
(5, 'ພົນລະເມືອງລາວ', ''),
(6, 'ພະສົງ', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `us_id` int(11) NOT NULL,
  `us_username` varchar(100) NOT NULL,
  `us_password` varchar(100) NOT NULL,
  `us_ali` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`us_id`, `us_username`, `us_password`, `us_ali`) VALUES
(1, 'Mona', '202cb962ac59075b964b07152d234b70', 'ປກສເມືອງວຽງຄຳ'),
(3, 'Nata', '202cb962ac59075b964b07152d234b70', 'ປກສແຂວງ');

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `vi_id` int(100) NOT NULL,
  `pro_id` int(100) DEFAULT NULL,
  `dis_id` int(100) DEFAULT NULL,
  `vi_name` varchar(255) DEFAULT NULL,
  `vi_remak` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`vi_id`, `pro_id`, `dis_id`, `vi_name`, `vi_remak`) VALUES
(3, 2, 2, 'ໂນນສະຫວ່າງ', ''),
(4, 2, 2, 'ໂພນໝີ', ''),
(5, 3, 3, 'ສີສະຫວ່າງ', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`ci_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `vi_id` (`vi_id`);

--
-- Indexes for table `different`
--
ALTER TABLE `different`
  ADD PRIMARY KEY (`di_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `monk`
--
ALTER TABLE `monk`
  ADD PRIMARY KEY (`mo_id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`pe_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`),
  ADD KEY `vi_id` (`vi_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ty_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`us_id`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`vi_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `dis_id` (`dis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citizens`
--
ALTER TABLE `citizens`
  MODIFY `ci_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `different`
--
ALTER TABLE `different`
  MODIFY `di_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dis_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `monk`
--
ALTER TABLE `monk`
  MODIFY `mo_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `pro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `ty_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `village`
--
ALTER TABLE `village`
  MODIFY `vi_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citizens`
--
ALTER TABLE `citizens`
  ADD CONSTRAINT `citizens_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `citizens_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`),
  ADD CONSTRAINT `citizens_ibfk_3` FOREIGN KEY (`vi_id`) REFERENCES `village` (`vi_id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`);

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `people_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`),
  ADD CONSTRAINT `people_ibfk_3` FOREIGN KEY (`vi_id`) REFERENCES `village` (`vi_id`);

--
-- Constraints for table `village`
--
ALTER TABLE `village`
  ADD CONSTRAINT `village_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `village_ibfk_2` FOREIGN KEY (`dis_id`) REFERENCES `district` (`dis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
