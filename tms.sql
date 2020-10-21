-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 08:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `id_reward` int(11) NOT NULL,
  `nama_reward` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `poin` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id_reward`, `nama_reward`, `deskripsi`, `poin`, `stok`) VALUES
(1, 'Cuti 3 hari', 'dapet cuti selama 3 hari', 25, 15);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `nama_task` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `dari` int(11) NOT NULL,
  `ke` int(11) NOT NULL,
  `poin` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL COMMENT '0:waiting,1:onprogress,2:finish',
  `created_at` datetime NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `nama_task`, `deskripsi`, `dari`, `ke`, `poin`, `status`, `created_at`, `deadline`) VALUES
(1, 'Module MyTask', 'cbsajcbhsabchbajsbchasbc', 2, 2, 0, 2, '2019-12-10 07:25:07', '2019-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `role` int(11) NOT NULL COMMENT '1:super, 2:HR, 3:bos, 4:karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `email`, `no_telp`, `role`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', NULL, NULL, NULL, NULL, 1),
(2, 'adjie', '1d4ad7cb75f172f6135dd892f772a011', 'Andhika Adjie', 'Malang', 'andhikaadjie23@gmail.com', '089681155971', 3),
(3, 'nania', '3730524583e0821e8a33824e797515f8', 'Nania Anabela', 'Pasuruan', 'naniaanabela@gmail.com', '08364783568', 4),
(4, 'tika', 'c27cd12c8034c739304c22a3a3748e39', 'Tika Yuliana', 'Tulungagung', 'tikayuliana@gmail.com', '0888346783434', 2),
(5, 'haliza', 'f8320b0696517b79f57067f98d4f8e00', 'Haliza', 'jalan jalan', 'haliza@gmail.com', '08467283657', 4),
(6, 'karina', 'a37b2a637d2541a600d707648460397e', 'Karina', 'jalan aspal', 'karina@gmail.com', '0873678356578', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id_reward`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id_reward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
