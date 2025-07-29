-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 11:00 AM
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
(75, 'BM97-NOTE', '2023-08-31', '2023-08-31'),
(76, 'BM94-NOTE', '2023-09-28', '2023-09-28'),
(77, 'BM89-NOTE', '2023-11-14', '2023-11-14'),
(78, 'BM79-NOTE', '2023-11-14', '2023-11-14'),
(81, 'BM88-NOTE', '2024-01-02', '2024-01-02'),
(82, 'BM77-NOTE', '2024-02-14', '2024-02-14'),
(83, 'BM-76-NOTE', '2024-05-27', '2024-05-27');

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
(62, 72, 0, '', '', '', '2023-06-14', '2024-01-12', 0, 0),
(64, 74, 0, '', '', '', '2023-08-31', '2024-06-25', 0, 0),
(65, 75, 44, '2024/05/27', '', '2083', '2023-08-31', '2024-06-11', 0, 0),
(66, 76, 60, '2024/06/06 ', 'Unlimited', '2197', '2023-09-28', '2024-06-11', 0, 0),
(67, 77, 0, '', '', '', '2023-11-14', '2024-05-21', 0, 0),
(68, 78, 72, '2024/06/26', '', '2185', '2023-11-14', '2024-06-26', 0, 0),
(71, 81, 23, '', '', '2183', '2024-01-02', '2024-05-27', 0, 0),
(72, 82, 0, '', '', '', '2024-02-14', '2024-06-21', 0, 0),
(73, 83, 48, '2024/06/06', '1日中', '2206番目の修正版', '2024-05-27', '2024-06-06', 0, 0);

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
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `is_admin`, `created_date`, `modified_date`) VALUES
(3, 'May Thinzar Myint', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-23', '2019-05-23'),
(8, 'Aye Mya Thu', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27'),
(9, 'Eaint Thiri San', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27'),
(11, 'Ei Nwe Hnin', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27'),
(13, 'Khaing Khin Soe', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27'),
(19, 'Khin Hnin Wai', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27'),
(20, 'Khin Maw San', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-06-03'),
(21, 'May Mi Kyaw Moe', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27'),
(23, 'Mya Thae Pwint', '$2y$10$Ch5hAsuppzdUNZM3u4WfCO9yD9DbA5WWKVo3iS/B0/ErVXcoVmY/m', 0, '2019-05-27', '2023-08-21'),
(25, 'Myo Ohnmar Mon', '$2y$10$eljMnPgh11Ek/qK8/sE7yeut5R4gZWxEcdVi7WMCI98.Cg6hFvsLi', 1, '2019-05-27', '2023-11-16'),
(27, 'Naw Zin Mar Myint', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27'),
(28, 'Nyein Kay Khaing', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2019-05-27', '2019-05-27'),
(39, 'Paing Phyo Kyaw', '$2y$10$FbfP28jbYy2H0IgsPH3HxuxR1pJ7MHdyxLHTmI7jFiWvQuUcaegf.', 0, '2020-06-08', '2023-08-21'),
(40, 'Thet Phyo Win', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2020-06-08', '2020-07-17'),
(44, 'Nang San Win', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2020-06-08', '2020-07-17'),
(45, 'May Zun Phoo Wai', '$2y$10$7P6ttOfcBSN8qQXh/D5wkuS6P7hR8KRQGV.ODuRG3OGUzy1.geK8e', 1, '2020-06-08', '2023-10-02'),
(48, 'Aye Myat Thuzar', '$2y$10$lusV/2.L53waMCU0/Xbpl.Ja38y.mHJOKbx0q8XAktOauqJvQYRHy', 1, '2020-06-08', '2023-08-21'),
(49, 'Wutt Hmone Phu ', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2020-06-08', '2020-07-17'),
(51, 'Htet Htet Hlaing', '$2y$10$JA77HB06dai8wtruo.w2VOd/csAMhoWNblwj9FMZTk1.71SUFTxYW', 0, '2020-07-17', '2020-07-17'),
(60, 'Phyo Myint Kyaw', '$2y$10$8177RBdemDOtHAROL/k.j.7q8oNriINC0eXTUlMhRkNoBa5cZTrty', 0, '2023-06-14', '2023-06-14'),
(62, 'Nandar Shwe Nyein', '$2y$10$fgcP.mPCvKBh3ItiyvwJ..1tnd87zc7JaZ5lZVQSPP3ohLqOPOBCm', 0, '2023-06-14', '2023-06-14'),
(63, 'Khaing Shwe Sin', '$2y$10$zEXOOIvAY.d0KGG22iB/GeqXcyivU4n9OidUB5FaRITQ0wYMw4Xsu', 0, '2023-06-14', '2023-06-14'),
(68, 'Su Wutt Hmone', '$2y$10$tJYrG2fPIco032TDdsq5reM7rZWTBj.QdxANN8aJlfzt5lC4XXU7u', 0, '2023-06-14', '2023-06-14'),
(69, 'Pyone Thinzar', '$2y$10$h/KBhrp.GxnQaVAjbDBBie1GcsQDFPyuOi..1JTWZUgDUAc8l76du', 0, '2023-06-14', '2023-11-20'),
(70, 'Phoo Pwint Wai Zin', '$2y$10$yDCBa3dNVP7JckjWMED3LeooX5NmDJEiOu9wPCz4ypMcLPIynPBFq', 0, '2023-06-14', '2023-06-14'),
(71, 'Hsu Pyae Maung', '$2y$10$IdvoWSfjVpbnahNvxsjTOubkJOqCJwxt24vFs8zsV.7GGCb00JD6i', 0, '2024-05-08', '2024-05-08'),
(72, 'Han Su Lin Htet', '$2y$10$yQyfDKEA1ovsh7iWQMyAKOWjQSXC10OpbWMV1aUF9FdVvsASQ8giy', 0, '2024-05-08', '2024-05-08'),
(73, 'Saw Shine', '$2y$10$Zl.MrtlfM.eIvMq/L6oE3O2fz3M8Q.XKBzYaInGQMqCntxWPsVtPG', 0, '2024-05-08', '2024-05-08'),
(74, 'Yell Khant', '$2y$10$ExbhnFgh4VtxepyScsKNduMJ/otDVwNGCJov6PLqFcp1VG6DrgtS2', 0, '2024-05-08', '2024-05-08'),
(75, 'Lin Thet Tun', '$2y$10$ZzbsOP2u1WUQwAEtArgQk.upFRRhMGmp4bSInrqr3aTkrSwJgScHO', 0, '2024-05-08', '2024-05-08'),
(76, 'Win Sandar Moe', '$2y$10$8FsnmTx2dKjDDwPD2pJ0yOxDvr6eUA6gWG1OnaJBPoxqpCAAyeTHy', 0, '2024-05-08', '2024-05-08'),
(77, 'Sai Myat Oo', '$2y$10$CDvdZ.4CDX7bdDH.Uy3GeO2H.cpgRKgmJx7F9Nn8jRMH2agZfkcUK', 0, '2024-05-08', '2024-05-08'),
(78, 'Yamin Thura Oo', '$2y$10$rnd1f6aHteBIuGaMGou9m.wMwILERj3.j443baqHFeVWzwvnbTSw6', 0, '2024-05-08', '2024-05-08'),
(79, 'Hnin Yu Wai', '$2y$10$RaWGK/rtzdx2yWNA1lL5b.Ep9GBvWFUbOvUyJQOlqlH28zDyjwG..', 0, '2024-05-08', '2024-05-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `computer`
--
ALTER TABLE `computer`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `sharing_computer`
--
ALTER TABLE `sharing_computer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
