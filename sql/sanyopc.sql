-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2025 at 11:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanyopc`
--

-- --------------------------------------------------------

--
-- Table structure for table `computer`
--

CREATE TABLE `computer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `computer`
--

INSERT INTO `computer` (`id`, `name`, `created_date`, `modified_date`) VALUES
(72, 'BM49-NOTE', '2023-06-14', '2023-06-14'),
(74, 'BM95-NOTE', '2023-08-31', '2023-08-31'),
(76, 'BM94-NOTE', '2023-09-28', '2023-09-28'),
(77, 'BM89-NOTE', '2023-11-14', '2023-11-14'),
(78, 'BM79-NOTE', '2023-11-14', '2023-11-14'),
(81, 'BM88-NOTE', '2024-01-02', '2024-01-02'),
(82, 'BM77-NOTE', '2024-02-14', '2024-02-14'),
(83, 'BM72-NOTE', '2024-05-27', '2025-07-22'),
(84, 'BM97-NOTE', '2025-07-21', '2025-07-21'),
(91, 'BM100-NOTE', '2025-07-22', '2025-07-22'),
(96, 'BM330-NOTE', '2025-07-23', '2025-07-23'),
(97, 'BM104-NOTE', '2025-07-23', '2025-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `count` int(25) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `count`, `created_date`, `modified_date`, `remark`) VALUES
(2, 'Coffee', 3, '2023-08-31', '2025-07-29', NULL),
(3, 'Mate', 4, '2023-08-31', '2025-07-29', NULL),
(4, 'Sugar', 1, '2023-09-28', '2025-02-28', NULL),
(5, 'Garbage Bag', 3, '2023-11-14', '2025-07-21', NULL),
(6, 'Detergent', 1, '2023-11-14', '2025-02-28', NULL),
(15, 'Tissue', 3, '2025-07-24', '2025-07-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_history`
--

CREATE TABLE `inventory_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `remark` varchar(225) NOT NULL,
  `count` int(25) NOT NULL,
  `total_count` int(25) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inventory_history`
--

INSERT INTO `inventory_history` (`id`, `user_id`, `inventory_id`, `remark`, `count`, `total_count`, `created_date`, `modified_date`) VALUES
(1, 45, 5, 'Take Out', 1, 3, '2024-08-09', '2024-08-09'),
(2, 45, 2, 'Take in', 2, 4, '2024-08-09', '2024-08-09'),
(3, 40, 2, 'Take Out', 1, 3, '2024-08-09', '2024-08-09'),
(4, 45, 6, 'Take in', 2, 3, '2024-08-09', '2024-08-09'),
(5, 45, 4, 'Take in', 1, 2, '2024-08-09', '2024-08-09'),
(6, 48, 3, 'Take in', 2, 3, '2025-02-28', '2025-02-28'),
(7, 48, 3, 'Take Out', 0, 3, '2025-02-28', '2025-02-28'),
(8, 48, 4, 'Take in', 0, 2, '2025-02-28', '2025-02-28'),
(9, 48, 4, 'Take in', 1, 3, '2025-02-28', '2025-02-28'),
(10, 48, 4, 'Take Out', 2, 1, '2025-02-28', '2025-02-28'),
(11, 48, 2, 'Take Out', 2, 1, '2025-02-28', '2025-02-28'),
(12, 48, 3, 'Take Out', 2, 1, '2025-02-28', '2025-02-28'),
(13, 48, 5, 'Take Out', 2, 1, '2025-02-28', '2025-02-28'),
(14, 48, 6, 'Take Out', 2, 1, '2025-02-28', '2025-02-28'),
(15, 48, 7, 'Take Out', 2, 1, '2025-02-28', '2025-02-28'),
(16, 48, 5, 'Take in', 3, 4, '2025-02-28', '2025-02-28'),
(17, 48, 2, 'Take in', 0, 1, '2025-05-02', '2025-05-02'),
(18, 48, 2, 'Take in', 1, 2, '2025-05-02', '2025-05-02'),
(19, 48, 2, 'Take Out', 0, 2, '2025-05-02', '2025-05-02'),
(20, 48, 2, 'Take Out', 0, 2, '2025-05-02', '2025-05-02'),
(21, 48, 2, 'Take Out', 0, 2, '2025-05-02', '2025-05-02'),
(22, 48, 2, 'Take Out', 0, 2, '2025-05-02', '2025-05-02'),
(23, 48, 2, 'Take Out', 0, 2, '2025-05-02', '2025-05-02'),
(24, 48, 2, 'Take Out', -1, 3, '2025-05-02', '2025-05-02'),
(25, 40, 2, 'Take in', 1, 4, '2025-05-06', '2025-05-06'),
(26, 40, 2, 'Take in', 2, 6, '2025-05-13', '2025-05-13'),
(27, 40, 2, 'Take Out', 1, 5, '2025-05-13', '2025-05-13'),
(28, 8, 1, 'Take Out', -1, 2, '2025-07-18', '2025-07-18'),
(29, 3, 1, 'Take Out', 2, 0, '2025-07-18', '2025-07-18'),
(30, 84, 1, 'Take Out', 1, -1, '2025-07-21', '2025-07-21'),
(31, 48, 1, 'Take in', 5, 4, '2025-07-21', '2025-07-21'),
(32, 48, 2, 'Take Out', 0, 5, '2025-07-21', '2025-07-21'),
(33, 48, 1, 'Take Out', 5, -1, '2025-07-21', '2025-07-21'),
(34, 48, 1, 'Take in', 6, 5, '2025-07-21', '2025-07-21'),
(35, 68, 1, 'Take Out', -1, 6, '2025-07-21', '2025-07-21'),
(36, 68, 1, 'Take Out', 1, 5, '2025-07-21', '2025-07-21'),
(37, 68, 1, 'Take Out', 6, -1, '2025-07-21', '2025-07-21'),
(38, 48, 1, 'Take in', 6, 5, '2025-07-21', '2025-07-21'),
(39, 8, 1, 'Take Out', 7, -2, '2025-07-21', '2025-07-21'),
(40, 48, 1, 'Take in', 7, 5, '2025-07-21', '2025-07-21'),
(41, 8, 5, 'Take Out', 0, 4, '2025-07-21', '2025-07-21'),
(42, 8, 1, 'Take Out', -1, 6, '2025-07-21', '2025-07-21'),
(43, 8, 5, 'Take Out', -1, 5, '2025-07-21', '2025-07-21'),
(44, 8, 5, 'Take Out', -2, 7, '2025-07-21', '2025-07-21'),
(45, 8, 5, 'Take Out', 10, -3, '2025-07-21', '2025-07-21'),
(46, 8, 5, 'Take Out', 9, -12, '2025-07-21', '2025-07-21'),
(47, 48, 5, 'Take in', 15, 3, '2025-07-21', '2025-07-21'),
(48, 8, 1, 'Take Out', 1, 5, '2025-07-21', '2025-07-21'),
(49, 8, 2, 'Take Out', 1, 4, '2025-07-21', '2025-07-21'),
(50, 8, 1, 'Take Out', 1, 4, '2025-07-21', '2025-07-21'),
(51, 48, 1, 'Take in', 6, 10, '2025-07-24', '2025-07-24'),
(52, 48, 2, 'Take in', 3, 7, '2025-07-24', '2025-07-24'),
(53, 48, 15, 'Take in', 2, 7, '2025-07-24', '2025-07-24'),
(54, 48, 2, 'Take Out', 3, 4, '2025-07-24', '2025-07-24'),
(55, 48, 15, 'Take Out', 4, 3, '2025-07-24', '2025-07-24'),
(56, 48, 3, 'Take in', 3, 3, '2025-07-28', '2025-07-28'),
(57, 48, 3, 'Take in', 2, 2, '2025-07-28', '2025-07-28'),
(58, 48, 3, 'Take in', 6, 6, '2025-07-28', '2025-07-28'),
(59, 48, 2, 'Take Out', 2, 2, '2025-07-29', '2025-07-29'),
(60, 48, 2, 'Take in', 4, 4, '2025-07-29', '2025-07-29'),
(61, 48, 2, 'Take Out', 1, 3, '2025-07-29', '2025-07-29'),
(62, 48, 2, 'Take Out', 1, 3, '2025-07-29', '2025-07-29'),
(63, 48, 3, 'Take Out', 1, 5, '2025-07-29', '2025-07-29'),
(64, 48, 3, 'Take Out', 1, 4, '2025-07-29', '2025-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `sharing_computer`
--

CREATE TABLE `sharing_computer` (
  `id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `estimate_time` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `row_count` int(11) NOT NULL,
  `login_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sharing_computer`
--

INSERT INTO `sharing_computer` (`id`, `com_id`, `user_id`, `start_date`, `estimate_time`, `remark`, `created_date`, `modified_date`, `row_count`, `login_user`) VALUES
(62, 72, 0, '', '', '', '2023-06-14', '2025-07-23', 1, 48),
(64, 74, 0, '', '', '', '2023-08-31', '2024-06-25', 0, 0),
(66, 76, 60, '2024/06/06 ', 'Unlimited', '2197', '2023-09-28', '2024-06-11', 0, 0),
(67, 77, 0, '', '', '', '2023-11-14', '2024-05-21', 0, 0),
(68, 78, 72, '2024/06/26', '', '2185', '2023-11-14', '2024-06-26', 0, 0),
(71, 81, 23, '', '', '2183', '2024-01-02', '2024-05-27', 0, 0),
(72, 82, 0, '', '', '', '2024-02-14', '2024-06-21', 0, 0),
(73, 83, 0, '', '', '', '2024-05-27', '2025-07-21', 1, 48),
(74, 96, 0, '', '', '', '2025-07-24', '2025-07-29', 1, 48);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `name_in_mm` varchar(255) DEFAULT NULL,
  `name_in_jpn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `is_admin`, `created_date`, `modified_date`, `name_in_mm`, `name_in_jpn`) VALUES
(3, 'May Thinzar Myint', '$2y$10$0XxOtVhfrmx71tB6SXyqFOeSW2M1NHdFgzoIZ8Evdl3/l9XDcWUgy', 0, '2019-05-23', '2025-07-18', NULL, NULL),
(8, 'Aye Mya Thu', '$2y$10$XOcigRN3DBltMbxSM6FpiOHkMXT4feHiS9xAV1TdsDUzx6kXAxHYm', 0, '2019-05-27', '2025-07-29', 'အေးမြသူ', 'エイ・ミャ・トゥ'),
(9, 'Eaint Thiri San', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27', NULL, NULL),
(11, 'Ei Nwe Hnin', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27', NULL, NULL),
(13, 'Khaing Khin Soe', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27', NULL, NULL),
(19, 'Khin Hnin Wai', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27', NULL, NULL),
(20, 'Khin Maw San', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2025-07-23', 'ခင်မော်စန်း', 'キン・マウ・サン'),
(21, 'May Mi Kyaw Moe', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27', NULL, NULL),
(23, 'Mya Thae Pwint', '$2y$10$Ch5hAsuppzdUNZM3u4WfCO9yD9DbA5WWKVo3iS/B0/ErVXcoVmY/m', 0, '2019-05-27', '2023-08-21', NULL, NULL),
(25, 'Myo Ohnmar Mon', '$2y$10$eljMnPgh11Ek/qK8/sE7yeut5R4gZWxEcdVi7WMCI98.Cg6hFvsLi', 1, '2019-05-27', '2023-11-16', NULL, NULL),
(27, 'Naw Zin Mar Myint', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27', NULL, NULL),
(28, 'Nyein Kay Khaing', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27', NULL, NULL),
(39, 'Paing Phyo Kyaw', '$2y$10$FbfP28jbYy2H0IgsPH3HxuxR1pJ7MHdyxLHTmI7jFiWvQuUcaegf.', 0, '2020-06-08', '2023-08-21', NULL, NULL),
(40, 'Thet Phyo Win', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 1, '2020-06-08', '2025-05-05', 'သက်ဖြိုးဝင်း', 'テッピョーウィン'),
(44, 'Nang San Win', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2020-06-08', '2020-07-17', NULL, NULL),
(45, 'May Zun Phoo Wai', '$2y$10$0IhugRYHdLrYJE.U2Fs39O54JhlpaEn1/xp/HXRP3LWWIZaI2zv/u', 1, '2020-06-08', '2024-08-09', NULL, NULL),
(48, 'Aye Myat Thuzar', '$2y$10$FOj4KGjm9hcBsHpKyhKpFOVFLy81TxvliO47jrM9PebAzD3Hl7qQq', 1, '2020-06-08', '2024-08-16', NULL, NULL),
(49, 'Wutt Hmone Phu ', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2020-06-08', '2020-07-17', NULL, NULL),
(51, 'Htet Htet Hlaing', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2020-07-17', '2020-07-17', NULL, NULL),
(62, 'Nandar Shwe Nyein', '$2y$10$fgcP.mPCvKBh3ItiyvwJ..1tnd87zc7JaZ5lZVQSPP3ohLqOPOBCm', 0, '2023-06-14', '2023-06-14', NULL, NULL),
(63, 'Khaing Shwe Sin', '$2y$10$zEXOOIvAY.d0KGG22iB/GeqXcyivU4n9OidUB5FaRITQ0wYMw4Xsu', 0, '2023-06-14', '2023-06-14', NULL, NULL),
(68, 'Su Wutt Hmone', '$2y$10$pB3SSR03jT7c67YWXzmPdeimCGXjLYld7H/9FSzmHS0dO3wnkwMhS', 0, '2023-06-14', '2025-07-21', NULL, NULL),
(70, 'Phoo Pwint Wai Zin', '$2y$10$yDCBa3dNVP7JckjWMED3LeooX5NmDJEiOu9wPCz4ypMcLPIynPBFq', 0, '2023-06-14', '2023-06-14', NULL, NULL),
(71, 'Hsu Pyae Maung', '$2y$10$IdvoWSfjVpbnahNvxsjTOubkJOqCJwxt24vFs8zsV.7GGCb00JD6i', 0, '2024-05-08', '2024-05-08', NULL, NULL),
(72, 'Han Su Lin Htet', '$2y$10$yQyfDKEA1ovsh7iWQMyAKOWjQSXC10OpbWMV1aUF9FdVvsASQ8giy', 0, '2024-05-08', '2024-05-08', NULL, NULL),
(73, 'Saw Shine', '$2y$10$Zl.MrtlfM.eIvMq/L6oE3O2fz3M8Q.XKBzYaInGQMqCntxWPsVtPG', 0, '2024-05-08', '2024-05-08', NULL, NULL),
(74, 'Yell Khant', '$2y$10$ExbhnFgh4VtxepyScsKNduMJ/otDVwNGCJov6PLqFcp1VG6DrgtS2', 0, '2024-05-08', '2024-05-08', NULL, NULL),
(75, 'Lin Thet Tun', '$2y$10$ZzbsOP2u1WUQwAEtArgQk.upFRRhMGmp4bSInrqr3aTkrSwJgScHO', 0, '2024-05-08', '2024-05-08', NULL, NULL),
(76, 'Win Sandar Moe', '$2y$10$8FsnmTx2dKjDDwPD2pJ0yOxDvr6eUA6gWG1OnaJBPoxqpCAAyeTHy', 0, '2024-05-08', '2024-05-08', NULL, NULL),
(77, 'Sai Myat Oo', '$2y$10$CDvdZ.4CDX7bdDH.Uy3GeO2H.cpgRKgmJx7F9Nn8jRMH2agZfkcUK', 0, '2024-05-08', '2024-05-08', NULL, NULL),
(78, 'Yamin Thura Oo', '$2y$10$rnd1f6aHteBIuGaMGou9m.wMwILERj3.j443baqHFeVWzwvnbTSw6', 0, '2024-05-08', '2024-05-08', NULL, NULL),
(79, 'Hnin Yu Wai', '$2y$10$RaWGK/rtzdx2yWNA1lL5b.Ep9GBvWFUbOvUyJQOlqlH28zDyjwG..', 0, '2024-05-08', '2024-05-08', NULL, NULL),
(83, 'Thet Maung Maung', '$2y$10$sCt9OjXOOO9rVDErBY3OJ.fjpfm1LLC0rsNiBz7.BeTVJUqUnlCoq', 0, '2025-07-08', '2025-07-08', 'သက်မောင်မောင်', 'テッマウン'),
(84, 'Phyo Myint Kyaw', '$2y$10$0PnsCnUCE55iA9HJtH8xcubmSzAFZmmTV45ZHHBYo6Y9UGaN0Pt8m', 0, '2025-07-08', '2025-07-10', 'ဖြိုးမြင့်ကျော်', 'ピョーミンチョー');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_history`
--
ALTER TABLE `inventory_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sharing_computer`
--
ALTER TABLE `sharing_computer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `computer`
--
ALTER TABLE `computer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inventory_history`
--
ALTER TABLE `inventory_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sharing_computer`
--
ALTER TABLE `sharing_computer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
