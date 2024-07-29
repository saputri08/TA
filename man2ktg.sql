-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2024 at 09:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `man2ktg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` char(36) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `foto`, `email`, `password`, `created_at`, `updated_at`) VALUES
('1a2249ab-c40d-4712-b1ef-36bbc2084794', 'Admin', NULL, 'admin@gmail.com', '$2y$12$8nCm2TBXO2Wp12fPBAhJoeOzDlqQJyQZIO6YfvWlj9U4z0fZGg/by', '2024-05-26 01:06:29', '2024-07-26 17:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` char(36) NOT NULL,
  `id_kelas` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_kelas`, `created_at`, `updated_at`) VALUES
('9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c8146fd-0785-4809-a43f-607896b0879e', '2024-07-17 09:49:22', '2024-07-17 09:49:22'),
('9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '2024-07-17 09:51:18', '2024-07-17 09:51:18'),
('9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c814774-ad75-4753-9872-93e708750e19', '2024-07-17 09:51:33', '2024-07-17 09:51:33'),
('9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '2024-07-17 09:51:53', '2024-07-17 09:51:53'),
('9c94fa28-5245-4c66-a41c-4a448679c91b', '9c8d4d4c-095b-4456-b6b4-437107408a4c', '2024-07-22 08:24:20', '2024-07-22 08:24:20'),
('9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '2024-07-22 08:24:42', '2024-07-22 08:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_grup`
--

CREATE TABLE `anggota_grup` (
  `id` char(36) NOT NULL,
  `id_anggota` char(36) DEFAULT NULL,
  `id_siswa` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anggota_grup`
--

INSERT INTO `anggota_grup` (`id`, `id_anggota`, `id_siswa`, `created_at`, `updated_at`) VALUES
('9c8b0adf-ed42-4619-9cba-9fabc09eb004', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', '2024-07-17 09:52:48', '2024-07-17 09:52:48'),
('9c8b0afb-b6a6-46bf-a838-ca55afb41d1e', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', '2024-07-17 09:53:06', '2024-07-17 09:53:06'),
('9c8b0b2f-9830-4259-9984-f8ec6adb16d1', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', '2024-07-17 09:53:40', '2024-07-17 09:53:40'),
('9c918e82-5b5c-465e-bdd9-290934f6d8ba', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', '2024-07-20 15:35:51', '2024-07-20 15:35:51'),
('9c956139-ed0e-46e1-9e26-d05c41bb3bf2', '9c94fa28-5245-4c66-a41c-4a448679c91b', '9c888dd8-0f69-4ca3-9647-daa83e1e635d', '2024-07-22 13:12:33', '2024-07-22 13:12:33'),
('9c9568e2-3d18-4ca3-a560-abdb2b9d01ce', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', '2024-07-22 13:33:57', '2024-07-22 13:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` char(36) NOT NULL,
  `id_kelas` char(36) DEFAULT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk_guru` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `id_kelas`, `nip`, `nama_guru`, `foto`, `tmp_lahir`, `tgl_lahir`, `jk_guru`, `email`, `password`, `alamat`, `created_at`, `updated_at`) VALUES
('9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '199409032020122025', 'Muslihatun S.Pd', NULL, 'Kendal', '1994-09-03', 'Perempuan', 'muslihatun@gmail.com', '$2y$12$J12xmTwfkYM1zjZHfGur5.cvJM5ZPV6aTQF50afuEBEy.6iPxcN8K', 'Jl. Soekarno Hatta No. 349 Kendal. Desa/Kelurahan, : LANGENHARJO. Kecamatan/Kota', '2024-07-12 14:56:08', '2024-07-16 07:49:28'),
('9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', '198601282009122002', 'Emy Awalliah, S.P.d', NULL, 'Pontianak', '1985-01-28', 'Perempuan', 'emyawalliah@gmail.com', '$2y$12$EcJFqULhOUjEEGdSznMvZ.nU0xqikjJfif1KslgAX0JSUytaYj6py', 'Jl. Ahmad Yani Pontianak, Kelurahan Parit Tokaya Kecamatan Pontianak Selatan, Kota Pontianak, Provinsi Kalimantan Barat.', '2024-07-12 15:01:06', '2024-07-16 07:50:05'),
('9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', '199512212020122020', 'Rahmawati Kartika Sari, S.Pd', NULL, 'Sintang', '1995-12-21', 'Perempuan', 'Rahmawati12@gmail.com', '$2y$12$fORj7HGJqUdsOeXENtWl5unVsFtA8jtlZVLoQJNaBWYgNK/rZOAwC', 'Jalan Lintas Melawi RT 003 RW 001,Kelurahan Ladang ,Kec . Sintang, Kab. Sintang', '2024-07-12 15:07:11', '2024-07-16 07:50:18'),
('9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', '197704132005011004', 'Musruji, S.Pd', NULL, 'Ketapang', '1977-04-13', 'Laki-laki', 'musruji13@gmail.com', '$2y$12$eR5XlwR/pv4iuHKZpsxO7.n8G6UoSc2ND4vOZ2.arDyLIjaS4vEOi', 'JL. Gatot Subroto. Desa/Kelurahan, : PAYA KUMANG. Kecamatan/Kota', '2024-07-12 15:10:41', '2024-07-16 07:50:33'),
('9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '196709232006041001', 'Dra.Siti Barkiah Tristantia', NULL, 'Sintang', '1964-11-13', 'Perempuan', 'sitibarkiah@gmail.com', '$2y$12$PEevlUicXRtO5ow9GexQGe9CcuVMyu0xAwFrI5KIub0Sj5YQfIIiu', 'Jln. MT. Haryono - Kel. Kapuas Kanan Hulu - Kec. Sintang', '2024-07-12 15:15:41', '2024-07-18 14:34:21'),
('9c956414-c558-4b60-b1cc-d51a73b19c15', '9c814661-c418-4a59-8a13-054ac653116f', '199105192020121007', 'Singgih Herlambang, S.Pd', NULL, 'Batu Ampar', '1991-05-19', 'Laki-laki', 'singgih@gmail.com', '$2y$12$DgvQoMehKJxC267RjAc6hun3M.YCoMQMReLaRHW17P6OV7lIz7cMO', 'Jl. Lumba-lumba No.5 Kelurahan, Sei Jodoh, Kecamatan, Batu Ampar', '2024-07-22 13:20:31', '2024-07-22 13:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `kepsek`
--

CREATE TABLE `kepsek` (
  `id` char(36) NOT NULL,
  `id_kelas` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_kepsek` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk_kepsek` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kepsek`
--

INSERT INTO `kepsek` (`id`, `id_kelas`, `nip`, `nama_kepsek`, `foto`, `tmp_lahir`, `tgl_lahir`, `jk_kepsek`, `email`, `password`, `alamat`, `created_at`, `updated_at`) VALUES
('9c889c58-867d-4ca6-89da-368f64cab10c', NULL, '197911132009031002', 'Moh Sunja\'i,S.Pd.I', NULL, 'Demak', '1979-11-13', 'Laki-laki', 'sunjai@gmail.com', '$2y$12$BfYaC6LlCBlcRjvUoaN1/OyPv/0ZMr.8eMi6D2uZodZCFHE2.ghkO', 'Jln. Sultan Trenggono No. 23 · location icon Desa Karangrejo, Kecamatan Wonosalam, Kabupaten Demak,', '2024-07-16 04:52:05', '2024-07-23 08:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` char(36) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(50) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat` longtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `nama`, `foto`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `alamat`, `email`, `password`, `created_at`, `updated_at`) VALUES
('9c888dd8-0f69-4ca3-9647-daa83e1e635d', '221278', '0082375659', 'Nur Alfiyah', NULL, 'Ketapang', '2008-07-05', 'Perempuan', 'Islam', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', 'nuralfiyah@gmail.com', '$2y$12$FD4TaCKtazLVrWTRSJQujOFI8Aw0ZdcxrqF69iMd2W/t.rY5EUPKy', '2024-07-16 04:11:32', '2024-07-16 05:20:06'),
('9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', '221280', '0059561092', 'Rangga', NULL, 'Ketapang', '2009-12-19', 'Laki-laki', 'Islam', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', 'rangga@gmail.com', '$2y$12$63tZCJCEGICoAmqwOod02ueAxcmr7kS16eTOk/JGtcLoT8zlTwTK6', '2024-07-16 05:22:32', '2024-07-16 05:22:32'),
('9c88d6d5-f7a6-4831-9bab-1aa30842d0db', '221289', '0079724503', 'Sulistia', NULL, 'Ketapang', '2007-02-13', 'Perempuan', 'Islam', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', 'sulistia@gmail.com', '$2y$12$B1L6GXw5FQpmnkhcqYwW3OrvgcNgMqdXT5krgQ4y1WnoffU/aQQ82', '2024-07-16 07:35:39', '2024-07-16 07:35:39'),
('9c895664-709d-4d7b-9f6f-44a71424f15b', '221294', '0063339678', 'Ibnu Aziz', NULL, 'Ketapang', '2006-11-23', 'Laki-laki', 'Islam', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', 'ibnu@gmail.com', '$2y$12$C5rQSnCF.w26zM2WafwTm.3/wqWtTE.D5SJ0JFdQ4.1zuDk772XHW', '2024-07-16 13:32:19', '2024-07-16 13:32:19'),
('9c8acb93-6b57-4652-a1fd-1a1bfd500e28', '211209', '0069575487', 'Arif Rahman', NULL, 'Ketapang', '2006-06-10', 'Laki-laki', 'Islam', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', 'arif@gmail.com', '$2y$12$os6OtUIGjIIx/5BZbrnu8.7mrlOwkRnObhxsp4ch9c7SF0q5t39bi', '2024-07-17 06:55:48', '2024-07-17 06:55:48'),
('9c8ae86a-51b1-4d75-bd97-5080462a4318', '221283', '0062882215', 'Ridho', NULL, 'Ketapang', '2006-07-10', 'Laki-laki', 'Islam', 'Rahadi Usman Sungai Bakau Matan Hilir Selatan,Ketapang,Kalimantan Barat', 'ridho@gmail.com', '$2y$12$tyjGkR4APtpi0eRwZR3Vcu.EO02XAeyVaEo4IL2Ifa1jasMg1Mtg2', '2024-07-17 08:16:27', '2024-07-17 08:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb__ekskul`
--

CREATE TABLE `tb__ekskul` (
  `id` char(36) NOT NULL,
  `id_anggota` char(36) DEFAULT NULL,
  `id_kelas` char(36) DEFAULT NULL,
  `id_siswa` char(36) DEFAULT NULL,
  `ekskul_kegiatan` varchar(255) DEFAULT NULL,
  `ekskul_nilai` varchar(255) DEFAULT NULL,
  `ekskul_keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb__ekskul`
--

INSERT INTO `tb__ekskul` (`id`, `id_anggota`, `id_kelas`, `id_siswa`, `ekskul_kegiatan`, `ekskul_nilai`, `ekskul_keterangan`, `created_at`, `updated_at`) VALUES
('9c8b1449-49f4-4c8b-88eb-44b00e169a0b', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', 'Pramuka', '90', 'Memiliki sikap baik dan terampil dalam LKBB dan menguasai sandi morse', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-4c96-4e7f-966b-db0f126dce2e', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', 'Olahraga', '85', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam permainan bola kecil', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1a14-f706-4316-9614-4a636517cdee', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', 'Pramuka', '87', 'Memiliki sikap baik dan terampil dalam LKBB dan menguasai sandi morse', '2024-07-17 10:35:19', '2024-07-17 10:35:19'),
('9c8b1a14-f936-4ce3-9b59-993c1437b41e', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', 'Olahraga', '90', 'Memiliki kemampuan baik terutamakemampuan dalam permainan bola kecil', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b244c-efdf-4f55-b5c0-7ec20b5af2d4', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c814774-ad75-4753-9872-93e708750e19', '9c895664-709d-4d7b-9f6f-44a71424f15b', 'Pramuka', '85', 'Memiliki sikap baik dan terampil dalam LKBB dan menguasai sandi morse', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-f31c-4e7f-8233-0fce2d03715c', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c814774-ad75-4753-9872-93e708750e19', '9c895664-709d-4d7b-9f6f-44a71424f15b', 'Olahraga', '85', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam permainan bola kecil', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b39bd-b578-4cba-abb7-7f63fffd1c00', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8ae86a-51b1-4d75-bd97-5080462a4318', 'Pramuka', '87', 'Memiliki sikap baik dan terampil dalam LKBB dan menguasai sandi morse', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-b931-478e-9c12-45292e271ca1', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8ae86a-51b1-4d75-bd97-5080462a4318', 'Olahraga', '90', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam permainan bola kecil', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c957de6-cf7b-4874-9295-97db5d602e4d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', 'wkwk', 'kwk', 'kwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c9582b0-3c65-45f3-81ca-6bc8b6d55496', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', 'kwkwk', 'wkwk', 'wkkwk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9583a3-b9ce-45d1-ad3c-9e2db111872a', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', 'WK', '90', 'WLW', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9721a6-0bc6-4b7e-9769-882e49eba444', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', 'fdgh', '09', 'dfghb', '2024-07-23 10:06:25', '2024-07-23 10:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb__kelas`
--

CREATE TABLE `tb__kelas` (
  `id` char(36) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `id_tahun_ajar` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb__kelas`
--

INSERT INTO `tb__kelas` (`id`, `nama_kelas`, `id_tahun_ajar`, `created_at`, `updated_at`) VALUES
('9c814661-c418-4a59-8a13-054ac653116f', 'X (IPA)', '9c814528-38dd-4b04-a9ec-6c9794d39770', '2024-07-12 13:20:55', '2024-07-12 13:20:55'),
('9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'XI (IPA)', '9c814503-567b-4e76-b426-3f002c4c65b9', '2024-07-12 13:21:11', '2024-07-12 13:21:11'),
('9c81468d-1f7f-4f7c-9627-1a8e65ca68f7', 'XI (IPA)', '9c814528-38dd-4b04-a9ec-6c9794d39770', '2024-07-12 13:21:23', '2024-07-12 13:21:23'),
('9c8146b6-271b-4956-a4aa-242deeda798e', 'XII (IPA)', '9c814503-567b-4e76-b426-3f002c4c65b9', '2024-07-12 13:21:50', '2024-07-12 13:21:50'),
('9c8146c8-d89a-49cd-af8d-045d1f7d424a', 'XII (IPA)', '9c814528-38dd-4b04-a9ec-6c9794d39770', '2024-07-12 13:22:02', '2024-07-12 13:22:02'),
('9c8146fd-0785-4809-a43f-607896b0879e', 'X (IPS)', '9c814503-567b-4e76-b426-3f002c4c65b9', '2024-07-12 13:22:37', '2024-07-12 13:22:37'),
('9c81472b-a492-4388-8d8f-a222d4079be5', 'X (IPS)', '9c814528-38dd-4b04-a9ec-6c9794d39770', '2024-07-12 13:23:07', '2024-07-12 13:23:07'),
('9c814774-ad75-4753-9872-93e708750e19', 'XI (IPS)', '9c814503-567b-4e76-b426-3f002c4c65b9', '2024-07-12 13:23:55', '2024-07-12 13:23:55'),
('9c814788-b27e-4086-8059-73db802d4ba9', 'XI (IPS)', '9c814528-38dd-4b04-a9ec-6c9794d39770', '2024-07-12 13:24:08', '2024-07-12 13:24:08'),
('9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'XII (IPS)', '9c814503-567b-4e76-b426-3f002c4c65b9', '2024-07-12 13:24:37', '2024-07-12 13:24:37'),
('9c8147dd-639b-43b3-8e7b-52afc70b8a8b', 'XII (IPS)', '9c814528-38dd-4b04-a9ec-6c9794d39770', '2024-07-12 13:25:04', '2024-07-12 13:25:04'),
('9c8d4d4c-095b-4456-b6b4-437107408a4c', 'X (IPA)', '9c814503-567b-4e76-b426-3f002c4c65b9', '2024-07-18 12:50:12', '2024-07-18 12:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb__mapel`
--

CREATE TABLE `tb__mapel` (
  `id` char(36) NOT NULL,
  `id_guru` char(36) NOT NULL,
  `id_kelas` char(36) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `kelompok` varchar(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb__mapel`
--

INSERT INTO `tb__mapel` (`id`, `id_guru`, `id_kelas`, `nama_mapel`, `kelompok`, `created_at`, `updated_at`) VALUES
('9c88a998-9356-4154-91c5-33dd7cd3386e', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Fikih', 'A', '2024-07-16 05:29:08', '2024-07-17 10:00:04'),
('9c88a9f8-e90b-4fa2-ac12-39b08e251ab9', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Sejarah Kebudayaan Islam', 'A', '2024-07-16 05:30:11', '2024-07-16 05:30:11'),
('9c88aa31-56df-4f56-92ba-32f8c4b0c73e', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', '2024-07-16 05:30:48', '2024-07-16 05:30:48'),
('9c88aa67-67d3-4aba-91a3-bc25f4a1d5f3', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Bahasa Indonesia', 'A', '2024-07-16 05:31:23', '2024-07-16 05:31:23'),
('9c88aad4-9f1b-45bc-9117-94f6dad75959', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Bahasa Arab', 'A', '2024-07-16 05:32:35', '2024-07-16 05:32:35'),
('9c88ab1c-fc73-4284-9222-7e1dc3920efd', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Matematika Peminatan', 'A', '2024-07-16 05:33:22', '2024-07-16 05:33:22'),
('9c88ab43-0c63-48cc-b0d2-5fcb4f8f101d', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Sejarah Indonesia', 'A', '2024-07-16 05:33:47', '2024-07-16 05:33:47'),
('9c88b077-5749-49e2-b5f0-1c320d2cf10a', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Seni Budaya', 'B', '2024-07-16 05:48:21', '2024-07-16 05:48:21'),
('9c88b0a9-1c7d-49f3-b258-030ed5564185', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Pendidikan Jesmani, Olahraga dan Kesehatan', 'B', '2024-07-16 05:48:53', '2024-07-16 05:48:53'),
('9c88b0cc-5454-484f-981a-cd7f58dfa578', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Prakarya dan Kewirausahaan', 'B', '2024-07-16 05:49:16', '2024-07-16 05:49:16'),
('9c88b0ef-7152-4d2d-8462-13a4332c63c9', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Keterampilan Multimedia', 'B', '2024-07-16 05:49:39', '2024-07-16 05:49:39'),
('9c88b133-a0e8-4289-a489-90149717fc82', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Matematika Dasar', 'C', '2024-07-16 05:50:24', '2024-07-16 05:50:24'),
('9c88b155-5ab7-45be-a554-c60f73a75688', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Biologi', 'C', '2024-07-16 05:50:46', '2024-07-16 05:50:46'),
('9c88b173-28fc-45c7-ad8f-cd5dcb7bb1f1', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Fisika', 'C', '2024-07-16 05:51:06', '2024-07-16 05:51:06'),
('9c88b18c-d832-438f-a748-ae494ad716e7', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Kimia', 'C', '2024-07-16 05:51:22', '2024-07-16 05:51:22'),
('9c88b1b9-7a16-4595-96da-e07537912a5a', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Geografi', 'C', '2024-07-16 05:51:52', '2024-07-16 05:51:52'),
('9c88b1d2-5e05-44fc-ac1a-437aacc6376d', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Ekonomi', 'C', '2024-07-16 05:52:08', '2024-07-16 05:52:08'),
('9c88d744-a951-498c-9519-afcd09c8ec9d', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Al Qur\'an Hadis', 'A', '2024-07-16 07:36:50', '2024-07-16 07:36:50'),
('9c88d76c-452c-4c74-b87e-193cb94480c9', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Akidah Akhlak', 'A', '2024-07-16 07:37:16', '2024-07-16 07:37:16'),
('9c88d78d-4e75-403d-83d0-8a978d315f5e', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Fikih', 'A', '2024-07-16 07:37:38', '2024-07-16 07:37:38'),
('9c88d7af-b4df-4133-8679-fec9ebe010cf', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Sejarah Kebudayaan Islam', 'A', '2024-07-16 07:38:01', '2024-07-16 07:38:01'),
('9c88d7ca-8f58-4df1-980c-ee8ff89adf6f', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', '2024-07-16 07:38:18', '2024-07-16 07:38:18'),
('9c88d7e9-1b70-4c66-82d0-3420ae10a28b', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Bahasa Indonesia', 'A', '2024-07-16 07:38:38', '2024-07-16 07:38:38'),
('9c88d805-4fe5-4f9d-80bc-e465f2858b74', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Bahasa Arab', 'A', '2024-07-16 07:38:57', '2024-07-16 07:38:57'),
('9c88d828-241f-4ee7-87cf-a823ee300e66', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Matematika Peminatan', 'A', '2024-07-16 07:39:19', '2024-07-16 07:39:19'),
('9c88d841-ce97-434f-b31a-61eaf51d7c16', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Sejarah Indonesia', 'A', '2024-07-16 07:39:36', '2024-07-16 07:39:36'),
('9c88d85f-3584-414d-86ca-13d993c985f8', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Bahasa Inggris', 'A', '2024-07-16 07:39:56', '2024-07-16 07:39:56'),
('9c88d886-76ea-48f4-8142-3b72cc2c16a3', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Seni Budaya', 'B', '2024-07-16 07:40:21', '2024-07-16 07:40:21'),
('9c88d8aa-20d0-4cde-9eb9-679f222dbb1d', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Pendidikan Jesmani, Olahraga dan Kesehatan', 'B', '2024-07-16 07:40:45', '2024-07-16 07:40:45'),
('9c88d8cc-6bde-4590-a45e-61b1122d2418', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Prakarya dan Kewirausahaan', 'B', '2024-07-16 07:41:07', '2024-07-16 07:41:07'),
('9c88d8ef-9575-4445-9acf-b9453aaf0468', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Keterampilan Multimedia', 'B', '2024-07-16 07:41:30', '2024-07-16 07:41:30'),
('9c88d912-edd3-4dea-94e4-cf7501f8ecf1', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Matematika Dasar', 'C', '2024-07-16 07:41:53', '2024-07-16 07:41:53'),
('9c88d931-54f6-44b8-94cb-40f0043e4d54', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Biologi', 'C', '2024-07-16 07:42:13', '2024-07-16 07:42:13'),
('9c88d94a-ed32-4a3a-b20f-87fe37cd0c5a', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Fikih', 'C', '2024-07-16 07:42:30', '2024-07-16 07:42:30'),
('9c88d965-3858-4ed8-9144-c7dc3c2cf45f', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Kimia', 'C', '2024-07-16 07:42:47', '2024-07-16 07:42:47'),
('9c88d981-4a61-48b5-9a9f-74141de9668f', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Geografi', 'C', '2024-07-16 07:43:06', '2024-07-16 07:43:06'),
('9c88d998-62ac-40eb-9746-92192970cece', '9c81686f-e673-4fbe-a9f4-452e7e96081f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', 'Ekonomi', 'C', '2024-07-16 07:43:21', '2024-07-16 07:43:21'),
('9c8957f1-3659-4024-adc8-9795e0d8ada1', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Al Qur\'an Hadis', 'A', '2024-07-16 13:36:38', '2024-07-16 13:36:38'),
('9c895858-d741-4fee-beb5-2f14a3a58a0b', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Akidah Akhlak', 'A', '2024-07-16 13:37:46', '2024-07-16 13:37:46'),
('9c895891-9186-4174-a030-1cd8f7ba963f', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Fikih', 'A', '2024-07-16 13:38:23', '2024-07-16 13:38:23'),
('9c8958cd-6ac0-4ce3-b888-7723389d7221', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Sejarah Kebudayaan Islam', 'A', '2024-07-16 13:39:03', '2024-07-16 13:39:03'),
('9c895960-f7de-4827-b7ce-ea14e9005cab', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', '2024-07-16 13:40:39', '2024-07-16 13:40:39'),
('9c8959cf-be06-42b3-a754-93eee9c961e5', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Bahasa Indonesia', 'A', '2024-07-16 13:41:52', '2024-07-16 13:41:52'),
('9c895a1d-6075-47ab-8e8c-efc29f238e7d', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Bahasa Arab', 'A', '2024-07-16 13:42:43', '2024-07-16 13:42:43'),
('9c895aa6-e611-471a-b045-a411e692cf66', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Matematika Peminatan', 'A', '2024-07-16 13:44:13', '2024-07-16 13:44:13'),
('9c895b09-f509-4871-a18e-836df62b5aa0', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Sejarah Indonesia', 'A', '2024-07-16 13:45:18', '2024-07-16 13:45:18'),
('9c895b8f-97c7-47ed-8fc1-ac39f807ff28', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Bahasa Indonesia', 'A', '2024-07-16 13:46:45', '2024-07-16 13:46:45'),
('9c895be3-1375-455f-b5a4-2f79ad0ffd34', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Seni Budaya', 'B', '2024-07-16 13:47:40', '2024-07-16 13:47:40'),
('9c895c98-7277-4a4c-896f-1f6a2c4789d5', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Pendidikan Jesmani, Olahraga dan Kesehatan', 'B', '2024-07-16 13:49:39', '2024-07-16 13:49:39'),
('9c895e04-4763-4047-ac3a-775068596c2d', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Prakarya dan Kewirausahaan', 'B', '2024-07-16 13:53:37', '2024-07-16 13:53:37'),
('9c895e41-4e9b-4bde-9e70-358fa8408bec', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Keterampilan Multimedia', 'B', '2024-07-16 13:54:17', '2024-07-16 13:54:17'),
('9c895ea9-2a35-48aa-8194-819cef32d356', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Matematika Dasar', 'C', '2024-07-16 13:55:25', '2024-07-16 13:55:25'),
('9c895eff-a256-4348-b228-f371c7de330e', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Biologi', 'C', '2024-07-16 13:56:22', '2024-07-16 13:56:22'),
('9c895f4e-adf5-4d67-b65b-0b3f6e0d58ad', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Fisika', 'C', '2024-07-16 13:57:14', '2024-07-16 13:57:14'),
('9c895f9d-e649-4da8-8f2e-1a4b65e98195', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Kimia', 'C', '2024-07-16 13:58:06', '2024-07-16 13:58:06'),
('9c895ffd-6c41-4c22-94c5-173abb7b0106', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Geografi', 'C', '2024-07-16 13:59:08', '2024-07-16 13:59:08'),
('9c89604b-da5e-474d-8d85-0036d1a9c8f2', '9c816da3-ab88-490c-b126-46798c3f347d', '9c814774-ad75-4753-9872-93e708750e19', 'Ekonomi', 'C', '2024-07-16 14:00:00', '2024-07-16 14:00:00'),
('9c8af2dd-dad8-40da-95e6-83692ec301ca', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Al Qur\'an Hadis', 'A', '2024-07-17 08:45:40', '2024-07-17 09:27:35'),
('9c8af305-9e7f-4a71-b0d0-d825b85c06d7', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Akidah Akhlak', 'A', '2024-07-17 08:46:06', '2024-07-17 09:27:58'),
('9c8af325-e709-415c-91d8-aa67098eb74d', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Fikih', 'A', '2024-07-17 08:46:27', '2024-07-17 09:28:18'),
('9c8af345-32f1-472b-a763-d879a4fe83ff', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Sejarah Kebudayaan Islam', 'A', '2024-07-17 08:46:48', '2024-07-17 09:28:45'),
('9c8af36f-14d1-41d4-b4cb-1da5d9e40432', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', '2024-07-17 08:47:15', '2024-07-17 09:29:01'),
('9c8af388-a9cb-44ad-8da6-927dacbe3135', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Bahasa Indonesia', 'A', '2024-07-17 08:47:32', '2024-07-17 09:29:21'),
('9c8af3bd-0051-424e-b652-4948dbc5b74a', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Bahasa Arab', 'A', '2024-07-17 08:48:06', '2024-07-17 09:29:54'),
('9c8af3d8-4a85-4016-991c-b4c647f68c1f', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Matematika Peminatan', 'A', '2024-07-17 08:48:24', '2024-07-17 09:30:07'),
('9c8af3f2-8fea-41a6-b645-58b10ba58cb7', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Sejarah Indonesia', 'A', '2024-07-17 08:48:41', '2024-07-17 09:30:21'),
('9c8af419-ff88-47d8-9a50-ed62957ced23', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Bahasa Inggris', 'A', '2024-07-17 08:49:07', '2024-07-17 09:30:46'),
('9c8af451-23b9-4f65-a9ba-5b60807d0f0d', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Seni Budaya', 'B', '2024-07-17 08:49:43', '2024-07-17 09:31:11'),
('9c8af473-979d-434f-aaea-af66a259b033', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Pendidikan Jesmani, Olahraga dan Kesehatan', 'B', '2024-07-17 08:50:06', '2024-07-17 09:31:27'),
('9c8af491-86f9-4d04-99f9-a58f638f8ee7', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Prakarya dan Kewirausahaan', 'B', '2024-07-17 08:50:25', '2024-07-17 09:31:48'),
('9c8af4aa-c953-47c8-a56a-a58abf8b27b6', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Keterampilan Multimedia', 'B', '2024-07-17 08:50:42', '2024-07-17 09:32:01'),
('9c8af4de-ded5-40ae-b95e-2305222b30c8', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Matematika Dasar', 'C', '2024-07-17 08:51:16', '2024-07-17 09:32:14'),
('9c8af55b-4883-4cd1-9e73-549fc52a8bc2', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Biologi', 'C', '2024-07-17 08:52:38', '2024-07-17 09:32:27'),
('9c8af57c-62fe-4e66-9c0d-e93c83c75133', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Fisika', 'C', '2024-07-17 08:52:59', '2024-07-17 09:32:41'),
('9c8af59a-97c3-4a4f-9e5f-c3f549551a8d', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Kimia', 'C', '2024-07-17 08:53:19', '2024-07-17 09:32:54'),
('9c8af5b5-f27d-45ae-98d4-f5d4a73a10ad', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Geografi', 'C', '2024-07-17 08:53:37', '2024-07-17 09:33:10'),
('9c8af5d0-b1de-4a2b-bcb8-69f134806a17', '9c816a35-c2db-4964-a55b-0302987002a9', '9c8146b6-271b-4956-a4aa-242deeda798e', 'Ekonomi', 'C', '2024-07-17 08:53:55', '2024-07-17 09:33:22'),
('9c8b041d-5231-4321-89d1-fbd986a2a375', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Al Qur\'an Hadis', 'A', '2024-07-17 09:33:54', '2024-07-17 09:33:54'),
('9c8b0437-9c2e-462f-86bf-69b2108926c8', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Akidah Akhlak', 'A', '2024-07-17 09:34:11', '2024-07-17 09:34:11'),
('9c8b0454-5955-4092-b3b3-ebe2e8626f5e', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Fikih', 'A', '2024-07-17 09:34:30', '2024-07-17 09:34:30'),
('9c8b0471-0da9-4bcd-acfc-0ebabe0b8f49', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Sejarah Kebudayaan Islam', 'A', '2024-07-17 09:34:49', '2024-07-17 09:34:49'),
('9c8b048c-79c3-4012-aeef-ff002e98cb18', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', '2024-07-17 09:35:07', '2024-07-17 09:35:07'),
('9c8b04a6-b9f2-48df-a4e2-476cd9606c5e', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Bahasa Indonesia', 'A', '2024-07-17 09:35:24', '2024-07-17 09:35:24'),
('9c8b04bf-23a1-4d2c-a12e-cc22f022bc62', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Bahasa Arab', 'A', '2024-07-17 09:35:40', '2024-07-17 09:35:40'),
('9c8b0507-a4ab-4f0d-bc3a-d1469c336d63', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Matematika Peminatan', 'A', '2024-07-17 09:36:27', '2024-07-17 09:36:27'),
('9c8b052f-1bd5-4953-a202-0cac19a4f842', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Sejarah Indonesia', 'A', '2024-07-17 09:36:53', '2024-07-17 09:36:53'),
('9c8b054a-8b98-46f4-9c2f-f3d3bca2a839', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Bahasa Inggris', 'A', '2024-07-17 09:37:11', '2024-07-17 09:37:11'),
('9c8b0570-e2fe-438e-9fff-08b511423a89', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Seni Budaya', 'B', '2024-07-17 09:37:36', '2024-07-17 09:37:36'),
('9c8b058f-8c60-473c-b2ab-658ea2ab0616', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Pendidikan Jesmani, Olahraga dan Kesehatan', 'B', '2024-07-17 09:37:56', '2024-07-17 09:38:40'),
('9c8b05ef-3823-409d-9685-2855ae924d4b', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Prakarya dan Kewirausahaan', 'B', '2024-07-17 09:38:59', '2024-07-17 09:38:59'),
('9c8b0606-8a5b-42a9-9b34-77685184b385', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Keterampilan Multimedia', 'B', '2024-07-17 09:39:14', '2024-07-17 09:39:14'),
('9c8b0693-5e85-4691-a8b2-610e38c287e0', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Matematika Dasar', 'C', '2024-07-17 09:40:47', '2024-07-17 09:40:47'),
('9c8b06b2-b3af-4e22-9b6b-e436de8a7913', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Biologi', 'C', '2024-07-17 09:41:07', '2024-07-17 09:41:07'),
('9c8b06e1-f4f0-4bd0-8683-737f5a231c8b', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Fisika', 'C', '2024-07-17 09:41:38', '2024-07-17 09:41:38'),
('9c8b070c-73c6-4467-8ee5-c9dff3ae4a2e', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Kimia', 'C', '2024-07-17 09:42:06', '2024-07-17 09:42:06'),
('9c8b0727-a87e-4c2e-bef5-25f4c2717c1d', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Geografi', 'C', '2024-07-17 09:42:24', '2024-07-17 09:42:24'),
('9c8b0740-c285-4e92-9d2f-2f808ae3a0ec', '9c816f6c-b7a1-4c2b-9156-15799a0fa232', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', 'Ekonomi', 'C', '2024-07-17 09:42:40', '2024-07-17 09:42:40'),
('9c8b0cb0-b7a2-4efd-8c6c-90bf0fba0278', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Al Qur\'an Hadis', 'A', '2024-07-17 09:57:52', '2024-07-17 09:57:52'),
('9c8b0cde-0fbf-4530-a5a4-4ff0755d95b0', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Akidah Akhlak', 'A', '2024-07-17 09:58:22', '2024-07-17 09:58:22'),
('9c8b0e9f-1047-43d4-a282-a059bd623502', '9c816c63-8390-4554-a612-a0c779df7df5', '9c8146fd-0785-4809-a43f-607896b0879e', 'Bahasa Inggris', 'A', '2024-07-17 10:03:16', '2024-07-17 10:03:16'),
('9c956495-7342-426c-9c1c-72a7b094975a', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Al Qur\'an Hadis', 'A', '2024-07-22 13:21:55', '2024-07-22 13:57:19'),
('9c9564b0-2bd4-4094-9233-01f3425fd05b', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Akidah Akhlak', 'A', '2024-07-22 13:22:13', '2024-07-22 13:57:39'),
('9c9564cf-5546-415e-8731-6e78f2ec61e4', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Fikih', 'A', '2024-07-22 13:22:33', '2024-07-22 13:57:56'),
('9c9564ec-b3e4-407a-a908-75a890d78141', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Sejarah Kebudayaan Islam', 'A', '2024-07-22 13:22:52', '2024-07-22 13:55:15'),
('9c95652f-b551-4f7b-95ab-58d4541f6547', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', '2024-07-22 13:23:36', '2024-07-22 13:58:49'),
('9c95654a-4f9e-4be2-a4d2-8fe7c1e90f2b', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Bahasa Indonesia', 'A', '2024-07-22 13:23:54', '2024-07-22 13:59:32'),
('9c956563-ac3e-4bbc-a50f-50e43b8cdf7f', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Bahasa Arab', 'A', '2024-07-22 13:24:10', '2024-07-22 13:59:48'),
('9c956598-4510-4e06-8227-9b8fee0f3039', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Matematika Peminatan', 'A', '2024-07-22 13:24:45', '2024-07-22 14:00:15'),
('9c9565b0-1379-4bc3-8a3c-f79c87cc9ec9', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Sejarah Indonesia', 'A', '2024-07-22 13:25:00', '2024-07-22 14:00:34'),
('9c9565d2-ad2d-4f3f-bc29-52f16a6695c4', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Bahasa Inggris', 'A', '2024-07-22 13:25:23', '2024-07-22 14:00:56'),
('9c9565ff-96b7-48a5-ab1b-5453730fc9e8', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Seni Budaya', 'B', '2024-07-22 13:25:53', '2024-07-22 14:01:28'),
('9c956624-c16c-40e4-a944-c14205829eda', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Pendidikan Jesmani, Olahraga dan Kesehatan', 'B', '2024-07-22 13:26:17', '2024-07-22 14:01:45'),
('9c956643-8e70-4a29-9379-85244f310043', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Prakarya dan Kewirausahaan', 'B', '2024-07-22 13:26:37', '2024-07-22 14:02:42'),
('9c956671-3470-4936-a9b8-80d4bfd988a7', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Keterampilan Multimedia', 'B', '2024-07-22 13:27:07', '2024-07-22 14:03:06'),
('9c95668e-93a8-4c54-9d91-8a6ce35b7e74', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Matematika Dasar', 'C', '2024-07-22 13:27:26', '2024-07-22 14:03:20'),
('9c9566ac-1eb1-4fa9-b65a-b0fd8695268f', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Biologi', 'C', '2024-07-22 13:27:46', '2024-07-22 14:03:38'),
('9c9566d0-f591-4153-8603-ad4d8f5fd46d', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Fisika', 'C', '2024-07-22 13:28:10', '2024-07-22 14:03:54'),
('9c9566e7-7877-4aa7-9825-fe41daa6e2dd', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Kimia', 'C', '2024-07-22 13:28:25', '2024-07-22 14:04:10'),
('9c9566ff-1e62-4c70-8ab3-98247d43f5cb', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Geografi', 'C', '2024-07-22 13:28:40', '2024-07-22 14:04:22'),
('9c95671c-38d0-40aa-9298-796ec29cb2fa', '9c956414-c558-4b60-b1cc-d51a73b19c15', '9c8d4d4c-095b-4456-b6b4-437107408a4c', 'Ekonomi', 'C', '2024-07-22 13:28:59', '2024-07-22 14:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb__nilai`
--

CREATE TABLE `tb__nilai` (
  `id` char(36) NOT NULL,
  `id_kelas` char(36) DEFAULT NULL,
  `id_mapel` char(36) DEFAULT NULL,
  `id_anggota` char(36) DEFAULT NULL,
  `id_siswa` char(36) DEFAULT NULL,
  `tahun_pelajaran` varchar(50) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `kkm_pengetahuan` varchar(255) DEFAULT NULL,
  `nilai_pengetahuan` varchar(255) DEFAULT NULL,
  `predikat_pengetahuan` varchar(255) DEFAULT NULL,
  `nilai_keterampilan` varchar(255) DEFAULT NULL,
  `predikat_keterampilan` varchar(255) DEFAULT NULL,
  `keterangan_pengetahuan` mediumtext,
  `keterangan_keterampilan` mediumtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb__nilai`
--

INSERT INTO `tb__nilai` (`id`, `id_kelas`, `id_mapel`, `id_anggota`, `id_siswa`, `tahun_pelajaran`, `semester`, `kkm_pengetahuan`, `nilai_pengetahuan`, `predikat_pengetahuan`, `nilai_keterampilan`, `predikat_keterampilan`, `keterangan_pengetahuan`, `keterangan_keterampilan`, `created_at`, `updated_at`) VALUES
('9c8b1449-0e4f-4bfb-8fa9-095582377ab1', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88a998-9356-4154-91c5-33dd7cd3386e', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '93', 'A', '92', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Menganalisis al\r\nqowaidul khamsah', 'Terampil terutama dalam Menyajikan\r\nhasil analisis contoh penerapan kaidah\r\n‘am dan khash', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-21d4-472d-a63e-a25b68eecf01', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88a9f8-e90b-4fa2-ac12-39b08e251ab9', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '95', 'A', '95', 'A', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam\r\nMenganalisis peran umat Islam pada\r\nmasa penjajahan dan kemerdekaan', 'Sangat terampil terutama dalam Menilai\r\nperan umat Islam pada masa penjajahan\r\ndan kemerdekaan dalam menumbuhkan\r\nsikap cinta tanah air dan bela negara', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-2478-47ee-bfc2-038a04c44c52', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88aa31-56df-4f56-92ba-32f8c4b0c73e', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam makna hak dan\r\nkewajiban warga negara', 'Sangat terampil terutama dalam makna\r\nhak dan kewajiban warga negara', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-2668-496a-bebd-4a0efab969f6', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88aa67-67d3-4aba-91a3-bc25f4a1d5f3', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '93', 'A', '80', 'C', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Menyajikan Hasil\r\nInterprestasi Buku Fiksi dan Menganalisis\r\nIsi Kebahasaan Novel', 'Terampil terutama dalam Menyusun dan\r\nmerancang isi novel', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-2855-404f-97cd-9a2fb36b1f99', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88aad4-9f1b-45bc-9117-94f6dad75959', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '92', 'B', '88', 'B', 'Memiliki kemampuan cukup baik\r\nterutama kemampuan dalam memahami\r\nfungsi sosial, struktur teks dan unsur\r\nkebahasaan yang melibatkan tindak tutur\r\nmembandingkan sesuatu dengan\r\nmemperhatikan bentuk, makna dan\r\nfungsi dari susunan gramatikal', 'Cukup terampil terutama dalam\r\nmendemonstrasikan tindak tutur,\r\nmembandingkan sesuatu dengan\r\nmemperhatikan bentuk, makna dan\r\nfungsi dari susunan gramatikal baik\r\nsecara lisan maupun tulisan', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-2a8a-4471-869b-f3abdf2b8e14', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88ab1c-fc73-4284-9222-7e1dc3920efd', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '83', 'C', '85', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Mendeskripsikan dan\r\nmenentukan peluang kejadian majemuk\r\n(peluang kejadian-kejadian saling bebas,\r\nsaling lepas, dan kejadian bersyarat) dari\r\nsuatu percobaan acak', 'Terampil terutama dalam Menyelesaikan\r\nmasalah yang berkaitan dengan peluang\r\nkejadian majemuk (peluang, kejadiankejadian saling bebas, saling lepas, dan\r\nkejadian bersyarat)', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-2c1f-4077-9740-047addce64a1', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88ab43-0c63-48cc-b0d2-5fcb4f8f101d', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '81', 'C', '84', 'C', 'Memiliki kemampuan cukup baik\r\nterutama kemampuan dalam\r\nMengevaluasi perkembangan Revolusi\r\nHijau di Indonesia', 'Terampil terutama dalam Merekonstruksi\r\nperkembangan politik, ekonomi, sosial\r\nbudaya dan pendidikan pada masa Orde\r\nBaru dan Reformasi, menyajikan dalam\r\nbentuk tulisan', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-2e05-4e39-bf7e-522f524becbd', '9c8146fd-0785-4809-a43f-607896b0879e', '9c8b0cb0-b7a2-4efd-8c6c-90bf0fba0278', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Kewajiban\r\nberdakwah dan metodenya serta fase\r\natau tahapannya dalam menyerukan\r\namar ma`ruf nahi munkar', 'Terampil terutama dalam membaca teks\r\nayat terkait kewajiban berdakwah (amar\r\nma`ruf nahi munkar dan ayat tentang\r\nperintah bermusyawarah dengan\r\nmenjunjung tinggi kejujuran dan keadilan', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-302a-48d8-af8f-3fa8940e10a8', '9c8146fd-0785-4809-a43f-607896b0879e', '9c8b0cde-0fbf-4530-a5a4-4ff0755d95b0', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '94', 'A', '95', 'A', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Memahami\r\nRagam Sikap Terpuji, mendefenisikan\r\nRagam Sikap Tercela, serta memahami\r\nEtika dalam Organisasi dan Profesi', 'Sangat terampil terutama dalam\r\nMenganasilisis Ragam Sikap Terpuji,\r\nmengidentifikasi Ragam Akhlak Tercela,\r\nmenjelaskan Etika dalam Organisasi dan\r\nProfesi', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-31df-4560-bc4b-0103ca8c11dc', '9c8146fd-0785-4809-a43f-607896b0879e', '9c8b0e9f-1047-43d4-a282-a059bd623502', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '87', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Understanding\r\nsong`s lirick', 'Cukup terampil terutama dalam Text\r\ncaption and news item', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-3396-424a-b758-436102041600', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b077-5749-49e2-b5f0-1c320d2cf10a', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '87', 'B', '87', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Konsep dan\r\nPengertian Kritik Tari', 'Terampil terutama dalam Konsep dan\r\nPengertian Kritik Tari', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-36fe-4fca-9aec-d302e9814dc5', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b0a9-1c7d-49f3-b258-030ed5564185', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam permainan bola kecil', 'Terampil terutama dalam permainan bola\r\nkecil', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-38c0-4523-b744-887e6ca929f4', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b0cc-5454-484f-981a-cd7f58dfa578', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '94', 'A', '94', 'A', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Pengolahan\r\nMakanan Fungsional', 'Sangat terampil terutama dalam\r\nPengolahan Makanan Fungsional', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-3ab4-44df-a0e9-bef94cd70c3e', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b0ef-7152-4d2d-8462-13a4332c63c9', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '88', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Memahami aplikasi\r\nberbasis web dalam editing photo', 'Terampil terutama dalam penggunaan\r\naplikasi editing video', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-3dc9-44e7-b8c7-81fbcd3f8de4', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b133-a0e8-4289-a489-90149717fc82', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '85', 'B', '85', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Menjelaskan dan\r\nmenentukan distribusi peluang binomial\r\nberkaitan dengan fungsi peluang binomial', 'Terampil terutama dalam menyelesaikan\r\nmasalah berkaitan dengan distribusi\r\npeluang binomial suatu percobaan (acak)\r\ndan penarikan kesimpulannya', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-3fc5-4860-9ad8-a32d2594a27a', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b155-5ab7-45be-a554-c60f73a75688', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '86', 'B', '85', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Metabolisme Sel', 'Terampil terutama dalam Metabolisme Sel', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-41cd-4701-918a-85e4499e6b7b', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b173-28fc-45c7-ad8f-cd5dcb7bb1f1', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '89', 'B', '89', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Arus dan tegangan\r\nbolak balik, dualisme gelombang cahaya,\r\nTeori atom, inti atom dan radioaktivitas', 'Terampil terutama dalam Arus dan\r\ntegangan bolak balik, Gelombang\r\ncahaya, perkembangan teori atom dan\r\ninti atom', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-43b1-4537-8204-a50c909a326e', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b18c-d832-438f-a748-ae494ad716e7', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '92', 'B', '86', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Benzena dan\r\nTurunannya', 'Terampil terutama dalam Benzena dan\r\nturunannya', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-4564-478d-95d6-d82a89707071', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b1b9-7a16-4595-96da-e07537912a5a', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '91', 'B', '86', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Interaksi Indonesia\r\ndengan negara maju dan berkembang\r\ndalam konteks pasar bebas', 'Terampil terutama dalam Interaksi\r\nIndonesia dengan negara maju dan\r\nberkembang dalam konteks pasar bebas', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1449-4718-49be-b33e-554f6b3a4aff', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88b1d2-5e05-44fc-ac1a-437aacc6376d', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, 'Ganjil', '78', '95', 'A', '95', 'A', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Penyusunan\r\nSiklus Akuntansi Pada Perusahaan Jasa', 'Sangat terampil terutama dalam\r\nPenyusunan Siklus Akuntansi Pada\r\nPerusahaan Jasa', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1a14-adeb-4cf8-b7d5-0e57cae62b7b', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d744-a951-498c-9519-afcd09c8ec9d', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '90', 'B', '92', 'B', 'Memiliki kemampuan sangat baikterutama kemampuan dalam Kewajibanberdakwah dan metodenya serta faseatau tahapannya dalam menyerukanamar ma`ruf nahi munkar', 'Terampil terutama dalam membaca teksayat terkait kewajiban berdakwah (amarma`ruf nahi munkar dan ayat tentangperintah bermusyawarah denganmenjunjung tinggi kejujuran dan keadilan', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-c3df-4c13-99ab-b780e631528a', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d76c-452c-4c74-b87e-193cb94480c9', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '90', 'B', '95', 'A', 'Memiliki kemampuan sangat baikterutama kemampuan dalam MemahamiRagam Sikap Terpuji, mendefenisikanRagam Sikap Tercela, serta memahamiEtika dalam Organisasi dan Profesi', 'Sangat terampil terutama dalamMenganasilisis Ragam Sikap Terpuji,mengidentifikasi Ragam Akhlak Tercela,menjelaskan Etika dalam Organisasi danProfesi', '2024-07-17 10:35:19', '2024-07-23 10:10:48'),
('9c8b1a14-c665-4a81-9e26-56698a2336b8', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d78d-4e75-403d-83d0-8a978d315f5e', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Menganalisis alqowaidul khamsah', 'Terampil terutama dalam Menyajikanhasil analisis contoh penerapan kaidah‘am dan khash', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-cab7-4458-8109-1db7ef0b01b5', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d7af-b4df-4133-8679-fec9ebe010cf', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '93', 'A', '93', 'A', 'Memiliki kemampuan sangat baikterutama kemampuan dalamMenganalisis peran umat Islam padamasa penjajahan dan kemerdekaan', 'Sangat terampil terutama dalam Menilaiperan umat Islam pada masa penjajahandan kemerdekaan dalam menumbuhkansikap cinta tanah air dan bela negara', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-cd0f-476f-ba5e-8df10449ac54', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d7ca-8f58-4df1-980c-ee8ff89adf6f', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '92', 'B', '94', 'A', 'Memiliki kemampuan baik terutamakemampuan dalam makna hak dankewajiban warga negara', 'Sangat terampil terutama dalam maknahak dan kewajiban warga negara', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-d0f4-431a-946d-a002bd5b95d3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d7e9-1b70-4c66-82d0-3420ae10a28b', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Menyajikan HasilInterprestasi Buku Fiksi dan MenganalisisIsi Kebahasaan Novel', 'Terampil terutama dalam Menyusun danmerancang isi novel', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-d2c7-45c5-8045-40143d5c38da', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d805-4fe5-4f9d-80bc-e465f2858b74', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '83', 'C', '80', 'C', 'Memiliki kemampuan cukup baikterutama kemampuan dalam memahamifungsi sosial, struktur teks dan unsurkebahasaan yang melibatkan tindak tuturmembandingkan sesuatu denganmemperhatikan bentuk, makna danfungsi dari susunan gramatikal', 'Cukup terampil terutama dalammendemonstrasikan tindak tutur,membandingkan sesuatu denganmemperhatikan bentuk, makna danfungsi dari susunan gramatikal baiksecara lisan maupun tulisan', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-d8e3-404a-8a34-62a2671c06ba', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d828-241f-4ee7-87cf-a823ee300e66', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '88', 'B', '92', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Mendeskripsikan danmenentukan peluang kejadian majemuk(peluang kejadian-kejadian saling bebas,saling lepas, dan kejadian bersyarat) darisuatu percobaan acak', 'Terampil terutama dalam Menyelesaikanmasalah yang berkaitan dengan peluangkejadian majemuk (peluang, kejadiankejadian saling bebas, saling lepas, dankejadian bersyarat)', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-db56-41fa-bbda-08a3651ae3e6', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d841-ce97-434f-b31a-61eaf51d7c16', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '83', 'C', '85', 'B', 'Memiliki kemampuan cukup baikterutama kemampuan dalamMengevaluasi perkembangan RevolusiHijau di Indonesia', 'Terampil terutama dalam Merekonstruksiperkembangan politik, ekonomi, sosialbudaya dan pendidikan pada masa OrdeBaru dan Reformasi, menyajikan dalambentuk tulisan', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-dd82-4573-8638-b035144d0ecf', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d85f-3584-414d-86ca-13d993c985f8', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '90', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Understandingsong`s lirick', 'Cukup terampil terutama dalam Textcaption and news item', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-dfc0-44ac-92c2-5d306195f8f2', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d886-76ea-48f4-8142-3b72cc2c16a3', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '90', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Konsep danPengertian Kritik Tari', 'Terampil terutama dalam Konsep danPengertian Kritik Tari', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-e2eb-44be-919a-f61663a8fae4', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d8aa-20d0-4cde-9eb9-679f222dbb1d', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam permainan bola kecil', 'Terampil terutama dalam permainan bolakecil', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-e4d1-4330-b5ae-6f4aa262bb9b', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d8cc-6bde-4590-a45e-61b1122d2418', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '94', 'A', '95', 'A', 'Memiliki kemampuan sangat baikterutama kemampuan dalam PengolahanMakanan Fungsional', 'Sangat terampil terutama dalamPengolahan Makanan Fungsional', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-e68c-4a10-85d8-b49518eafae8', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d8ef-9575-4445-9acf-b9453aaf0468', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '92', 'B', '90', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Memahami aplikasiberbasis web dalam editing photo', 'Terampil terutama dalam penggunaanaplikasi editing video', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-e954-41ad-8623-3a509533e5bf', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d912-edd3-4dea-94e4-cf7501f8ecf1', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '85', 'B', '85', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Menjelaskan danmenentukan distribusi peluang binomialberkaitan dengan fungsi peluang binomial', 'Terampil terutama dalam menyelesaikanmasalah berkaitan dengan distribusipeluang binomial suatu percobaan (acak)dan penarikan kesimpulannya', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-eb9f-4bc6-a88d-194d44acf265', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d931-54f6-44b8-94cb-40f0043e4d54', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '86', 'B', '86', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Metabolisme Sel', 'Terampil terutama dalam Metabolisme Sel', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-eda5-4dd9-9094-c3c1e4ee63ce', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d94a-ed32-4a3a-b20f-87fe37cd0c5a', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '89', 'B', '92', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Arus dan teganganbolak balik, dualisme gelombang cahaya,Teori atom, inti atom dan radioaktivitas', 'Terampil terutama dalam Arus dantegangan bolak balik, Gelombangcahaya, perkembangan teori atom daninti atom', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-f0f8-4713-903e-e10ad9d8e08c', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d965-3858-4ed8-9144-c7dc3c2cf45f', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '92', 'B', '90', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Benzena danTurunannya', 'Terampil terutama dalam Benzena danturunannya', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-f330-4ab6-b81b-22bcad8da109', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d981-4a61-48b5-9a9f-74141de9668f', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '91', 'B', '90', 'B', 'Memiliki kemampuan baik terutamakemampuan dalam Interaksi Indonesiadengan negara maju dan berkembangdalam konteks pasar bebas', 'Terampil terutama dalam InteraksiIndonesia dengan negara maju danberkembang dalam konteks pasar bebas', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b1a14-f4ee-48d0-a512-4b8aec4e1633', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d998-62ac-40eb-9746-92192970cece', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '90', 'B', '87', 'B', 'Memiliki kemampuan sangat baikterutama kemampuan dalam PenyusunanSiklus Akuntansi Pada Perusahaan Jasa', 'Sangat terampil terutama dalamPenyusunan Siklus Akuntansi PadaPerusahaan Jasa', '2024-07-17 10:35:19', '2024-07-23 10:10:20'),
('9c8b244c-9c43-4704-9b91-e4857264e6c5', '9c814774-ad75-4753-9872-93e708750e19', '9c8957f1-3659-4024-adc8-9795e0d8ada1', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '87', 'B', '90', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Kewajiban\r\nberdakwah dan metodenya serta fase\r\natau tahapannya dalam menyerukan\r\namar ma`ruf nahi munkar', 'Terampil terutama dalam membaca teks\r\nayat terkait kewajiban berdakwah (amar\r\nma`ruf nahi munkar dan ayat tentang\r\nperintah bermusyawarah dengan\r\nmenjunjung tinggi kejujuran dan keadilan', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-b40f-4075-bf8a-eafeac81c5ec', '9c814774-ad75-4753-9872-93e708750e19', '9c895858-d741-4fee-beb5-2f14a3a58a0b', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Memahami\r\nRagam Sikap Terpuji, mendefenisikan\r\nRagam Sikap Tercela, serta memahami\r\nEtika dalam Organisasi dan Profesi', 'Sangat terampil terutama dalam\r\nMenganasilisis Ragam Sikap Terpuji,\r\nmengidentifikasi Ragam Akhlak Tercela,\r\nmenjelaskan Etika dalam Organisasi dan\r\nProfesi', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-b756-4c1f-a503-5c5169058ac1', '9c814774-ad75-4753-9872-93e708750e19', '9c895891-9186-4174-a030-1cd8f7ba963f', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '85', 'B', '87', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Menganalisis al\r\nqowaidul khamsah', 'Terampil terutama dalam Menyajikan\r\nhasil analisis contoh penerapan kaidah\r\n‘am dan khash', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-ba5b-40ea-baf2-32cb94ceb45c', '9c814774-ad75-4753-9872-93e708750e19', '9c8958cd-6ac0-4ce3-b888-7723389d7221', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '92', 'B', '90', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam\r\nMenganalisis peran umat Islam pada\r\nmasa penjajahan dan kemerdekaan', 'Sangat terampil terutama dalam Menilai\r\nperan umat Islam pada masa penjajahan\r\ndan kemerdekaan dalam menumbuhkan\r\nsikap cinta tanah air dan bela negara', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-bd0d-4267-acc6-f3e6d8fbee96', '9c814774-ad75-4753-9872-93e708750e19', '9c895960-f7de-4827-b7ce-ea14e9005cab', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '90', 'B', '92', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam makna hak dan\r\nkewajiban warga negara', 'Sangat terampil terutama dalam makna\r\nhak dan kewajiban warga negara', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-bf48-45d1-bae1-0946046fe40e', '9c814774-ad75-4753-9872-93e708750e19', '9c8959cf-be06-42b3-a754-93eee9c961e5', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '90', 'B', '94', 'A', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Menyajikan Hasil\r\nInterprestasi Buku Fiksi dan Menganalisis\r\nIsi Kebahasaan Novel', 'Terampil terutama dalam Menyusun dan\r\nmerancang isi novel', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-c216-4795-a86a-4eafbb910113', '9c814774-ad75-4753-9872-93e708750e19', '9c895a1d-6075-47ab-8e8c-efc29f238e7d', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '87', 'B', '86', 'B', 'Memiliki kemampuan cukup baik\r\nterutama kemampuan dalam memahami\r\nfungsi sosial, struktur teks dan unsur\r\nkebahasaan yang melibatkan tindak tutur\r\nmembandingkan sesuatu dengan\r\nmemperhatikan bentuk, makna dan\r\nfungsi dari susunan gramatikal', 'Cukup terampil terutama dalam\r\nmendemonstrasikan tindak tutur,\r\nmembandingkan sesuatu dengan\r\nmemperhatikan bentuk, makna dan\r\nfungsi dari susunan gramatikal baik\r\nsecara lisan maupun tulisan', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-c448-4e54-9712-b844d2d75acd', '9c814774-ad75-4753-9872-93e708750e19', '9c895aa6-e611-471a-b045-a411e692cf66', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '88', 'B', '88', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Mendeskripsikan dan\r\nmenentukan peluang kejadian majemuk\r\n(peluang kejadian-kejadian saling bebas,\r\nsaling lepas, dan kejadian bersyarat) dari\r\nsuatu percobaan acak', 'Terampil terutama dalam Menyelesaikan\r\nmasalah yang berkaitan dengan peluang\r\nkejadian majemuk (peluang, kejadiankejadian saling bebas, saling lepas, dan\r\nkejadian bersyarat)', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-c718-4aeb-8691-b50f9f498a64', '9c814774-ad75-4753-9872-93e708750e19', '9c895b09-f509-4871-a18e-836df62b5aa0', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '92', 'B', '90', 'B', 'Memiliki kemampuan cukup baik\r\nterutama kemampuan dalam\r\nMengevaluasi perkembangan Revolusi\r\nHijau di Indonesia', 'Terampil terutama dalam Merekonstruksi\r\nperkembangan politik, ekonomi, sosial\r\nbudaya dan pendidikan pada masa Orde\r\nBaru dan Reformasi, menyajikan dalam\r\nbentuk tulisan', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-ca27-4632-a603-654a9e763d9d', '9c814774-ad75-4753-9872-93e708750e19', '9c895b8f-97c7-47ed-8fc1-ac39f807ff28', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Understanding\r\nsong`s lirick', 'Cukup terampil terutama dalam Text\r\ncaption and news item', '2024-07-17 11:03:53', '2024-07-17 11:03:53'),
('9c8b244c-d04b-46d9-83b7-56b453ee35a8', '9c814774-ad75-4753-9872-93e708750e19', '9c895be3-1375-455f-b5a4-2f79ad0ffd34', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '95', 'A', '89', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Konsep dan\r\nPengertian Kritik Tari', 'Terampil terutama dalam Konsep dan\r\nPengertian Kritik Tari', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-d2e1-444d-b5b0-132e412290a7', '9c814774-ad75-4753-9872-93e708750e19', '9c895c98-7277-4a4c-896f-1f6a2c4789d5', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '93', 'A', '92', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam permainan bola kecil', 'Terampil terutama dalam permainan bola\r\nkecil', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-d5ab-4eb6-9f80-6d26ac772a88', '9c814774-ad75-4753-9872-93e708750e19', '9c895e04-4763-4047-ac3a-775068596c2d', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '90', 'B', '88', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Pengolahan\r\nMakanan Fungsional', 'Sangat terampil terutama dalam\r\nPengolahan Makanan Fungsional', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-d7df-43a1-8692-4181c43af5c9', '9c814774-ad75-4753-9872-93e708750e19', '9c895e41-4e9b-4bde-9e70-358fa8408bec', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '87', 'B', '87', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Memahami aplikasi\r\nberbasis web dalam editing photo', 'Terampil terutama dalam penggunaan\r\naplikasi editing video', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-daae-4231-997a-fa66368f4749', '9c814774-ad75-4753-9872-93e708750e19', '9c895ea9-2a35-48aa-8194-819cef32d356', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '87', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Menjelaskan dan\r\nmenentukan distribusi peluang binomial\r\nberkaitan dengan fungsi peluang binomial', 'Terampil terutama dalam menyelesaikan\r\nmasalah berkaitan dengan distribusi\r\npeluang binomial suatu percobaan (acak)\r\ndan penarikan kesimpulannya', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-dd48-4b6a-99a1-3ba6fef02b38', '9c814774-ad75-4753-9872-93e708750e19', '9c895eff-a256-4348-b228-f371c7de330e', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '90', 'B', '95', 'A', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Metabolisme Sel', 'Terampil terutama dalam Metabolisme Sel', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-dfef-49cb-a210-3fdac0dd5437', '9c814774-ad75-4753-9872-93e708750e19', '9c895f4e-adf5-4d67-b65b-0b3f6e0d58ad', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '95', 'A', '91', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Arus dan tegangan\r\nbolak balik, dualisme gelombang cahaya,\r\nTeori atom, inti atom dan radioaktivitas', 'Terampil terutama dalam Arus dan\r\ntegangan bolak balik, Gelombang\r\ncahaya, perkembangan teori atom dan\r\ninti atom', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-e3cf-4d2d-941a-90e6fe816cc9', '9c814774-ad75-4753-9872-93e708750e19', '9c895f9d-e649-4da8-8f2e-1a4b65e98195', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '90', 'B', '93', 'A', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Benzena dan\r\nTurunannya', 'Terampil terutama dalam Benzena dan\r\nturunannya', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-e66e-4967-a6ee-86d54f7daafc', '9c814774-ad75-4753-9872-93e708750e19', '9c895ffd-6c41-4c22-94c5-173abb7b0106', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '89', 'B', '89', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Interaksi Indonesia\r\ndengan negara maju dan berkembang\r\ndalam konteks pasar bebas', 'Terampil terutama dalam Interaksi\r\nIndonesia dengan negara maju dan\r\nberkembang dalam konteks pasar bebas', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b244c-e9cc-4cae-a908-f0aa984c9983', '9c814774-ad75-4753-9872-93e708750e19', '9c89604b-da5e-474d-8d85-0036d1a9c8f2', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, 'Ganjil', '78', '88', 'B', '87', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Penyusunan\r\nSiklus Akuntansi Pada Perusahaan Jasa', 'Sangat terampil terutama dalam\r\nPenyusunan Siklus Akuntansi Pada\r\nPerusahaan Jasa', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b39bd-4e17-44ab-9ae7-fb81c5be0e5f', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b041d-5231-4321-89d1-fbd986a2a375', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '89', 'B', '90', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Kewajiban\r\nberdakwah dan metodenya serta fase\r\natau tahapannya dalam menyerukan\r\namar ma`ruf nahi munkar', 'Terampil terutama dalam membaca teks\r\nayat terkait kewajiban berdakwah (amar\r\nma`ruf nahi munkar dan ayat tentang\r\nperintah bermusyawarah dengan\r\nmenjunjung tinggi kejujuran dan keadilan', '2024-07-17 12:03:50', '2024-07-17 12:03:50'),
('9c8b39bd-7980-4c37-8ac2-e05803a582a4', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b0437-9c2e-462f-86bf-69b2108926c8', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Memahami\r\nRagam Sikap Terpuji, mendefenisikan\r\nRagam Sikap Tercela, serta memahami\r\nEtika dalam Organisasi dan Profesi', 'Sangat terampil terutama dalam\r\nMenganasilisis Ragam Sikap Terpuji,\r\nmengidentifikasi Ragam Akhlak Tercela,\r\nmenjelaskan Etika dalam Organisasi dan\r\nProfesi', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-7cdf-41f0-8d81-081a05009bee', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b0454-5955-4092-b3b3-ebe2e8626f5e', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '87', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Menganalisis al\r\nqowaidul khamsah', 'Terampil terutama dalam Menyajikan\r\nhasil analisis contoh penerapan kaidah\r\n‘am dan khash', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-8027-4730-be76-53ff6883048f', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b0471-0da9-4bcd-acfc-0ebabe0b8f49', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '94', 'A', '93', 'A', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam\r\nMenganalisis peran umat Islam pada\r\nmasa penjajahan dan kemerdekaan', 'Sangat terampil terutama dalam Menilai\r\nperan umat Islam pada masa penjajahan\r\ndan kemerdekaan dalam menumbuhkan\r\nsikap cinta tanah air dan bela negara', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-82fa-49eb-8739-55b9ae5276b8', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b048c-79c3-4012-aeef-ff002e98cb18', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '90', 'B', '87', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam makna hak dan\r\nkewajiban warga negara', 'Sangat terampil terutama dalam makna\r\nhak dan kewajiban warga negara', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-8602-4f28-a49c-2121590f4ad2', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b04a6-b9f2-48df-a4e2-476cd9606c5e', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '88', 'B', '88', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Menyajikan Hasil\r\nInterprestasi Buku Fiksi dan Menganalisis\r\nIsi Kebahasaan Novel', 'Terampil terutama dalam Menyusun dan\r\nmerancang isi novel', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-8882-4aab-9563-91527115e46e', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b04bf-23a1-4d2c-a12e-cc22f022bc62', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '84', 'C', '85', 'B', 'Memiliki kemampuan cukup baik\r\nterutama kemampuan dalam memahami\r\nfungsi sosial, struktur teks dan unsur\r\nkebahasaan yang melibatkan tindak tutur\r\nmembandingkan sesuatu dengan\r\nmemperhatikan bentuk, makna dan\r\nfungsi dari susunan gramatikal', 'Cukup terampil terutama dalam\r\nmendemonstrasikan tindak tutur,\r\nmembandingkan sesuatu dengan\r\nmemperhatikan bentuk, makna dan\r\nfungsi dari susunan gramatikal baik\r\nsecara lisan maupun tulisan', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-8b83-41cd-845b-9f7e0722aa20', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b0507-a4ab-4f0d-bc3a-d1469c336d63', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '80', 'C', '80', 'C', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Mendeskripsikan dan\r\nmenentukan peluang kejadian majemuk\r\n(peluang kejadian-kejadian saling bebas,\r\nsaling lepas, dan kejadian bersyarat) dari\r\nsuatu percobaan acak', 'Terampil terutama dalam Menyelesaikan\r\nmasalah yang berkaitan dengan peluang\r\nkejadian majemuk (peluang, kejadiankejadian saling bebas, saling lepas, dan\r\nkejadian bersyarat)', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-8fc5-43a4-b261-89bbf2b880b0', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b052f-1bd5-4953-a202-0cac19a4f842', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '93', 'A', '93', 'A', 'Memiliki kemampuan cukup baik\r\nterutama kemampuan dalam\r\nMengevaluasi perkembangan Revolusi\r\nHijau di Indonesia', 'Terampil terutama dalam Merekonstruksi\r\nperkembangan politik, ekonomi, sosial\r\nbudaya dan pendidikan pada masa Orde\r\nBaru dan Reformasi, menyajikan dalam\r\nbentuk tulisan', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-927b-406d-9bc8-e6975602a40e', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b054a-8b98-46f4-9c2f-f3d3bca2a839', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Understanding\r\nsong`s lirick', 'Cukup terampil terutama dalam Text\r\ncaption and news item', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-9590-4f2a-a3ee-040f5f43f504', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b0570-e2fe-438e-9fff-08b511423a89', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '89', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Konsep dan\r\nPengertian Kritik Tari', 'Terampil terutama dalam Konsep dan\r\nPengertian Kritik Tari', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-986e-4f25-88b6-85b69d38256d', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b058f-8c60-473c-b2ab-658ea2ab0616', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '96', 'A', '87', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam permainan bola kecil', 'Terampil terutama dalam permainan bola\r\nkecil', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-9c3d-46fb-9d82-894dbc032a0e', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b05ef-3823-409d-9685-2855ae924d4b', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '90', 'B', '91', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Pengolahan\r\nMakanan Fungsional', 'Sangat terampil terutama dalam\r\nPengolahan Makanan Fungsional', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-9f0f-458b-8633-87bf37b0a81c', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b0606-8a5b-42a9-9b34-77685184b385', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '87', 'B', '88', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Memahami aplikasi\r\nberbasis web dalam editing photo', 'Terampil terutama dalam penggunaan\r\naplikasi editing video', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-a1be-46d7-87d0-dc8113af0873', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b0693-5e85-4691-a8b2-610e38c287e0', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '83', 'C', '85', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Menjelaskan dan\r\nmenentukan distribusi peluang binomial\r\nberkaitan dengan fungsi peluang binomial', 'Terampil terutama dalam menyelesaikan\r\nmasalah berkaitan dengan distribusi\r\npeluang binomial suatu percobaan (acak)\r\ndan penarikan kesimpulannya', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-a5d5-42b7-9966-3d84cd125931', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b06b2-b3af-4e22-9b6b-e436de8a7913', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '85', 'B', '84', 'C', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Metabolisme Sel', 'Terampil terutama dalam Metabolisme Sel', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-a9b7-4ce8-a83f-3fcc4d20af25', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b06e1-f4f0-4bd0-8683-737f5a231c8b', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '90', 'B', '87', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Arus dan tegangan\r\nbolak balik, dualisme gelombang cahaya,\r\nTeori atom, inti atom dan radioaktivitas', 'Terampil terutama dalam Arus dan\r\ntegangan bolak balik, Gelombang\r\ncahaya, perkembangan teori atom dan\r\ninti atom', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-acee-4771-9aa3-22f3e020987a', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b070c-73c6-4467-8ee5-c9dff3ae4a2e', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '86', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Benzena dan\r\nTurunannya', 'Terampil terutama dalam Benzena dan\r\nturunannya', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-b006-4498-b424-a2ef2bab9486', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b0727-a87e-4c2e-bef5-25f4c2717c1d', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutama\r\nkemampuan dalam Interaksi Indonesia\r\ndengan negara maju dan berkembang\r\ndalam konteks pasar bebas', 'Terampil terutama dalam Interaksi\r\nIndonesia dengan negara maju dan\r\nberkembang dalam konteks pasar bebas', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c8b39bd-b291-44e8-85e2-4f536beb9437', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8b0740-c285-4e92-9d2f-2f808ae3a0ec', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, 'Ganjil', '78', '93', 'A', '90', 'B', 'Memiliki kemampuan sangat baik\r\nterutama kemampuan dalam Penyusunan\r\nSiklus Akuntansi Pada Perusahaan Jasa', 'Sangat terampil terutama dalam\r\nPenyusunan Siklus Akuntansi Pada\r\nPerusahaan Jasa', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c957de5-cae6-49f7-ad03-0801b781dca4', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af2dd-dad8-40da-95e6-83692ec301ca', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-a7bb-4c65-9389-164c3853fbab', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af305-9e7f-4a71-b0d0-d825b85c06d7', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-a9e8-431e-bd7b-9347e2bec5be', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af325-e709-415c-91d8-aa67098eb74d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'kwkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-abf3-48b9-a18e-dbb63867e38a', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af345-32f1-472b-a763-d879a4fe83ff', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-adf1-4fbe-8726-06b630420339', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af36f-14d1-41d4-b4cb-1da5d9e40432', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-afd2-4f4d-9a13-116fff3b3dda', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af388-a9cb-44ad-8da6-927dacbe3135', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkkw', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-b22d-4aaa-a480-25fbbd003347', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af3bd-0051-424e-b652-4948dbc5b74a', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-b44a-45f3-8e29-a6c74128f428', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af3d8-4a85-4016-991c-b4c647f68c1f', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-b5f3-43d2-bc07-73578976f976', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af3f2-8fea-41a6-b645-58b10ba58cb7', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-b7e0-4c9c-bb54-8b08a312cf24', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af419-ff88-47d8-9a50-ed62957ced23', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-b99f-4b15-b025-1c4be4e0ad5d', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af451-23b9-4f65-a9ba-5b60807d0f0d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-bb7d-42e7-adea-87d53cd47edc', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af473-979d-434f-aaea-af66a259b033', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'kwkw', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-bd85-4d3e-8d39-4cdb13875427', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af491-86f9-4d04-99f9-a58f638f8ee7', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-c011-4322-8d57-cd1b3a88ab80', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af4aa-c953-47c8-a56a-a58abf8b27b6', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kwkw', 'kwkw', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-c1d6-43c5-97b8-7a1a7a2bae02', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af4de-ded5-40ae-b95e-2305222b30c8', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kwkw', 'wkwkw', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-c3ae-4f6e-bd32-d7ea79ba5188', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af55b-4883-4cd1-9e73-549fc52a8bc2', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kwkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-c58d-41e9-ac4e-9fdd23c7201c', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af57c-62fe-4e66-9c0d-e93c83c75133', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'kwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-c780-4fd0-8bcd-a7ebf1a3a6f9', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af59a-97c3-4a4f-9e5f-c3f549551a8d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkkw', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-c92e-4718-b657-a2b663697c74', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af5b5-f27d-45ae-98d4-f5d4a73a10ad', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c957de6-cbaf-464f-88c1-b62d74fbd058', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af5d0-b1de-4a2b-bcb8-69f134806a17', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkkwk', 'kwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c9582af-fe4c-476d-8c91-7187047fd0be', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af2dd-dad8-40da-95e6-83692ec301ca', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-10f6-4cad-8e37-57f534e098e1', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af305-9e7f-4a71-b0d0-d825b85c06d7', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkwk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-1345-4ebc-9b61-dd387c2cecb7', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af325-e709-415c-91d8-aa67098eb74d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-1536-44f0-8b36-d03169fa34b5', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af345-32f1-472b-a763-d879a4fe83ff', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'kwkw', '2024-07-22 14:46:06', '2024-07-22 14:46:06');
INSERT INTO `tb__nilai` (`id`, `id_kelas`, `id_mapel`, `id_anggota`, `id_siswa`, `tahun_pelajaran`, `semester`, `kkm_pengetahuan`, `nilai_pengetahuan`, `predikat_pengetahuan`, `nilai_keterampilan`, `predikat_keterampilan`, `keterangan_pengetahuan`, `keterangan_keterampilan`, `created_at`, `updated_at`) VALUES
('9c9582b0-1868-4fe7-9485-4e621895ab38', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af36f-14d1-41d4-b4cb-1da5d9e40432', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkkw', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-1cd6-4424-b59b-48b2d66e3d6f', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af388-a9cb-44ad-8da6-927dacbe3135', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkkw', 'wkkw', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-1e71-4dc1-ae41-78c478eb5f6b', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af3bd-0051-424e-b652-4948dbc5b74a', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkkw', 'wkkw', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-20f6-449c-b674-201cd38f4d45', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af3d8-4a85-4016-991c-b4c647f68c1f', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkkw', 'kkwk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-2392-4a73-86bd-e27030afaceb', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af3f2-8fea-41a6-b645-58b10ba58cb7', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkkw', 'wkkw', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-2549-448f-b696-d994b17b95ca', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af419-ff88-47d8-9a50-ed62957ced23', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkkw', 'wkkw', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-26e8-42e7-8514-5df0ca885989', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af451-23b9-4f65-a9ba-5b60807d0f0d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkkw', 'kkwk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-2811-4d6f-8aea-d99b105df3c9', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af473-979d-434f-aaea-af66a259b033', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wk', 'kww', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-29bc-4d6b-8467-c18b25f951a7', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af491-86f9-4d04-99f9-a58f638f8ee7', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'w', 'kwk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-2abc-418d-a397-ac37b83c647d', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af4aa-c953-47c8-a56a-a58abf8b27b6', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kwk', 'wk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-2c96-4dca-b672-dd747f6a3882', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af4de-ded5-40ae-b95e-2305222b30c8', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kwk', 'kw', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-2eaf-4de2-b5be-e13b156ed9c9', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af55b-4883-4cd1-9e73-549fc52a8bc2', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kwk', 'kwkwk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-3058-4a6e-a40a-20d9cd74a882', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af57c-62fe-4e66-9c0d-e93c83c75133', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kw', 'kwk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-3288-4bf4-bd2a-111f5da09cf1', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af59a-97c3-4a4f-9e5f-c3f549551a8d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kwk', 'wk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-3689-467c-b39e-134943c68da2', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af5b5-f27d-45ae-98d4-f5d4a73a10ad', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'kwk', 'kwkwk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9582b0-38ab-4dc6-b102-2eba81dc1edf', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af5d0-b1de-4a2b-bcb8-69f134806a17', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'wkwk', 'wkkk', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9583a3-847d-46b4-82e7-7360e16905bb', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af2dd-dad8-40da-95e6-83692ec301ca', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-92b5-4f91-8e9c-a72e078b9048', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af305-9e7f-4a71-b0d0-d825b85c06d7', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-946c-49f9-933d-9b4bf94867ae', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af325-e709-415c-91d8-aa67098eb74d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-967d-4788-a55e-7c84cb2873f5', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af345-32f1-472b-a763-d879a4fe83ff', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-98f1-4394-9084-26c8927c44fb', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af36f-14d1-41d4-b4cb-1da5d9e40432', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-9b1e-4f0a-a3e3-c64e8c992bbe', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af388-a9cb-44ad-8da6-927dacbe3135', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-9cdd-40aa-8085-f5f2a89a6e1c', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af3bd-0051-424e-b652-4948dbc5b74a', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-9f54-4828-a57a-4882c5182056', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af3d8-4a85-4016-991c-b4c647f68c1f', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWKW', 'WKWK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-a0ef-42bb-9934-328b0900f9be', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af3f2-8fea-41a6-b645-58b10ba58cb7', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WWKK', 'WKWK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-a2a0-4b50-a9e6-a6cca8bf3fb3', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af419-ff88-47d8-9a50-ed62957ced23', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:45', '2024-07-22 14:48:45'),
('9c9583a3-a586-4717-998f-353e03e3964a', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af451-23b9-4f65-a9ba-5b60807d0f0d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKK', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9583a3-a73b-42a9-a1d5-722de1c0a2a9', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af473-979d-434f-aaea-af66a259b033', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9583a3-a97a-49f4-94c5-4385be6643f3', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af491-86f9-4d04-99f9-a58f638f8ee7', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9583a3-ab5c-46ab-9773-648e9162a215', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af4aa-c953-47c8-a56a-a58abf8b27b6', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9583a3-ad96-419b-a5fc-f043a660ff78', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af4de-ded5-40ae-b95e-2305222b30c8', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9583a3-af45-4fe6-a8cb-f70a37fc1f1b', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af55b-4883-4cd1-9e73-549fc52a8bc2', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9583a3-b162-4f5a-8182-8b536871c47b', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af57c-62fe-4e66-9c0d-e93c83c75133', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9583a3-b351-419b-9498-97a1f0479c92', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af59a-97c3-4a4f-9e5f-c3f549551a8d', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWKW', 'WKWK', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9583a3-b4fd-425c-9a16-d7b4dd4bcb69', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af5b5-f27d-45ae-98d4-f5d4a73a10ad', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'WKWK', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9583a3-b6f0-40c1-a2e4-cf3bd4be6f5b', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8af5d0-b1de-4a2b-bcb8-69f134806a17', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, 'Ganjil', '78', '90', 'B', '90', 'B', 'WKWK', 'KWKW', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9721a4-fd81-4cd6-bc94-aed813a3102b', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d744-a951-498c-9519-afcd09c8ec9d', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '89', 'B', 'sdfvgnm', 'sdfghnm', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-dc52-42bc-a979-6319d4944d8d', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d76c-452c-4c74-b87e-193cb94480c9', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '98', 'A', 'sdfgbn', 'dfgbn', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-de3b-46ed-8d91-44e3a94c8d33', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d78d-4e75-403d-83d0-8a978d315f5e', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '89', 'B', 'dfgb', 'xcfvb', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-e05a-49a1-9ee4-ce84a398af0d', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d7af-b4df-4133-8679-fec9ebe010cf', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '89', 'B', 'dfvbn', 'dfvbn', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-e27a-4acc-b255-593e18ff62d3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d7ca-8f58-4df1-980c-ee8ff89adf6f', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '89', 'B', 'sdfgvbn', 'sdfvbn', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-e457-439f-a4f0-93c7791c563f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d7e9-1b70-4c66-82d0-3420ae10a28b', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '89', 'B', 'sdfvbn', 'sdfvb', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-e60e-4071-850c-7e2c47402407', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d805-4fe5-4f9d-80bc-e465f2858b74', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '98', 'A', 'dfvbn', 'sdfcvb', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-e825-4a2a-8047-7b7710780de7', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d828-241f-4ee7-87cf-a823ee300e66', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '89', 'B', 'sdfvb', 'asdxcfvb', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-e9e1-4c49-9fdb-133a39a1c95c', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d841-ce97-434f-b31a-61eaf51d7c16', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '98', 'A', 'xcvb', 'dxcvbn', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-eb9e-4bd1-a2bf-133d54245923', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d85f-3584-414d-86ca-13d993c985f8', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '98', 'A', 'dfvgb', 'sdfvb', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-ed52-4790-9814-85b869f95744', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d886-76ea-48f4-8142-3b72cc2c16a3', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '89', 'B', 'zxc', 'dfgb', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-f085-4e01-8d91-4609c831f5b5', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d8aa-20d0-4cde-9eb9-679f222dbb1d', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '98', 'A', 'dfghjk', 'bnm', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-f26a-408f-81aa-aeb7af05b9cf', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d8cc-6bde-4590-a45e-61b1122d2418', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '98', 'A', 'sdfgh', 'sdfghnm', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-f42e-40c5-8522-2c3f99f29db2', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d8ef-9575-4445-9acf-b9453aaf0468', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '89', 'B', 'sdfghnm', 'dfgvbnm', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-f6d0-425d-8f4b-a9ff761c6150', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d912-edd3-4dea-94e4-cf7501f8ecf1', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '78', 'C', '98', 'A', 'dfgvb', 'dfvbn', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-f88f-4b07-9189-4bc275678928', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d931-54f6-44b8-94cb-40f0043e4d54', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '787', NULL, '89', 'B', 'dfgvbn', 'sdfgvbn', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-fa4c-4fe2-925c-1b410ea06a10', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d94a-ed32-4a3a-b20f-87fe37cd0c5a', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '88', 'B', '89', 'B', 'dfgn', 'sdfgbn', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-fc31-458f-b561-0af0ffe21be5', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d965-3858-4ed8-9144-c7dc3c2cf45f', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '89', 'B', 'sdfgh', 'sdfgb', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a5-fe68-43d6-9d0d-c9bf9385514f', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d981-4a61-48b5-9a9f-74141de9668f', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '98', 'A', 'sdfgh', 'sdfgh', '2024-07-23 10:06:25', '2024-07-23 10:06:25'),
('9c9721a6-0041-4c96-9589-abf86b4c5f15', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d998-62ac-40eb-9746-92192970cece', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, 'Ganjil', '78', '87', 'B', '89', 'B', 'sdfgh', 'sdfgh', '2024-07-23 10:06:25', '2024-07-23 10:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb__nilai_tambahan`
--

CREATE TABLE `tb__nilai_tambahan` (
  `id` char(36) NOT NULL,
  `id_anggota` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_kelas` char(36) DEFAULT NULL,
  `id_siswa` char(36) DEFAULT NULL,
  `spiritual_sikap` varchar(255) DEFAULT NULL,
  `sosial_sikap` varchar(255) DEFAULT NULL,
  `spiritual_sikap_keterangan` mediumtext,
  `sosial_sikap_keterangan` mediumtext,
  `izin` varchar(50) DEFAULT NULL,
  `sakit` varchar(50) DEFAULT NULL,
  `tanpaketerangan` varchar(50) DEFAULT NULL,
  `catatan_wali` mediumtext,
  `tanggapan_ortu` mediumtext,
  `keterangan_lulus` varchar(255) DEFAULT NULL,
  `qr_kepsek` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb__nilai_tambahan`
--

INSERT INTO `tb__nilai_tambahan` (`id`, `id_anggota`, `id_kelas`, `id_siswa`, `spiritual_sikap`, `sosial_sikap`, `spiritual_sikap_keterangan`, `sosial_sikap_keterangan`, `izin`, `sakit`, `tanpaketerangan`, `catatan_wali`, `tanggapan_ortu`, `keterangan_lulus`, `qr_kepsek`, `created_at`, `updated_at`) VALUES
('9c8b1449-86d3-4b0d-9bcd-1226d750b15d', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', 'SANGAT BAIK', 'SANGAT BAIK', 'Sikap spiritual yang ditunjukkan sangat baik dalam menghargai perilaku beriman dan bertakwa kepada Tuhan\r\nYME dan berakhlak mulia dalam kehidupan di madrasah dan masyarakat, sangat rajin berdoa, sangat rajin\r\nmemberi salam, sangat rajin mengikuti shalat berjamaah dan sangat pandai bersyukur', 'Sikapnya sangat baik dalam menghargai keluhuran nilai-nilai Pancasila sebagai pandangan hidup bangsa\r\ndengan selalu memperhatikan tata tertib madrasah, memiliki kejujuran baik, memiliki kedisiplinan sangat baik,\r\nmemiliki tanggung jawab sangat baik, memiliki toleransi sangat baik, memiliki sikap gotong royong baik, memiliki\r\nkesantunan sangat baik dan memiliki kepercayaan diri yang sangat baik', '5', '1', '0', 'angan pernah bosan untuk terus belajar dan terus bersemangat untuk meraih cita-cita mu', NULL, NULL, 'app/QR/nvHZM.png', '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1a15-3497-4684-8478-8f078eb7cd48', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', 'SANGAT BAIK', 'SANGAT BAIK', 'Sikap spiritual yang ditunjukkan sangat baik dalam menghargai perilaku beriman dan bertakwa kepada TuhanYME dan berakhlak mulia dalam kehidupan di madrasah dan masyarakat, sangat rajin berdoa, sangat rajinmemberi salam, sangat rajin mengikuti shalat berjamaah dan sangat pandai bersyukur', 'Sikapnya sangat baik dalam menghargai keluhuran nilai-nilai Pancasila sebagai pandangan hidup bangsadengan selalu memperhatikan tata tertib madrasah, memiliki kejujuran baik, memiliki kedisiplinan sangat baik,memiliki tanggung jawab sangat baik, memiliki toleransi sangat baik, memiliki sikap gotong royong baik, memilikikesantunan sangat baik dan memiliki kepercayaan diri yang sangat baik', '2', '2', '0', 'Jangan pernah bosan untuk terus belajar dan terus bersemangat untuk meraih cita-cita mu', NULL, NULL, 'app/QR/jKpRS.png', '2024-07-17 10:35:19', '2024-07-23 10:10:19'),
('9c8b244d-5848-484b-98a9-3efa80224261', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c814774-ad75-4753-9872-93e708750e19', '9c895664-709d-4d7b-9f6f-44a71424f15b', 'SANGAT BAIK', 'SANGAT BAIK', 'Sikap spiritual yang ditunjukkan sangat baik dalam menghargai perilaku beriman dan bertakwa kepada Tuhan\r\nYME dan berakhlak mulia dalam kehidupan di madrasah dan masyarakat, sangat rajin berdoa, sangat rajin\r\nmemberi salam, sangat rajin mengikuti shalat berjamaah dan sangat pandai bersyukur', 'Sikapnya sangat baik dalam menghargai keluhuran nilai-nilai Pancasila sebagai pandangan hidup bangsa\r\ndengan selalu memperhatikan tata tertib madrasah, memiliki kejujuran baik, memiliki kedisiplinan sangat baik,\r\nmemiliki tanggung jawab sangat baik, memiliki toleransi sangat baik, memiliki sikap gotong royong baik, memiliki\r\nkesantunan sangat baik dan memiliki kepercayaan diri yang sangat baik', '5', '1', '1', 'Jangan pernah bosan untuk terus belajar dan terus bersemangat untuk meraih cita-cita mu', NULL, NULL, 'app/QR/2QU3s.png', '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b39be-0ed2-45e1-901c-c07bba2fb64e', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8ae86a-51b1-4d75-bd97-5080462a4318', 'SANGAT BAIK', 'SANGAT BAIK', 'Sikap spiritual yang ditunjukkan sangat baik dalam menghargai perilaku beriman dan bertakwa kepada Tuhan\r\nYME dan berakhlak mulia dalam kehidupan di madrasah dan masyarakat, sangat rajin berdoa, sangat rajin\r\nmemberi salam, sangat rajin mengikuti shalat berjamaah dan sangat pandai bersyukur', 'Sikapnya sangat baik dalam menghargai keluhuran nilai-nilai Pancasila sebagai pandangan hidup bangsa\r\ndengan selalu memperhatikan tata tertib madrasah, memiliki kejujuran baik, memiliki kedisiplinan sangat baik,\r\nmemiliki tanggung jawab sangat baik, memiliki toleransi sangat baik, memiliki sikap gotong royong baik, memiliki\r\nkesantunan sangat baik dan memiliki kepercayaan diri yang sangat baik', '3', '5', '1', 'Jangan pernah bosan untuk terus belajar dan terus bersemangat untuk meraih cita-cita mu', NULL, NULL, 'app/QR/SqbFR.png', '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c957de8-5705-4a30-b8e0-28db3b6ba095', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', 'BAIK', 'BAIK', 'wkwkdsfghjk', 'wkwk', 'wkwk', 'wkwk', 'wkwkw', 'wkwk', 'kwk', NULL, 'app/QR/RoC29.png', '2024-07-22 14:32:44', '2024-07-22 15:02:08'),
('9c9582b0-8057-46ae-a5a6-8321a9eef0d4', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', 'CUKUP', 'BAIK', 'wkwk', 'wkwk', '10', '10', '10', 'wkwk', NULL, NULL, 'app/QR/KSNpc.png', '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9583a3-e9a0-49f0-8f8b-563a86abc308', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', 'SANGAT BAIK', 'BAIK', 'wkwk', 'WKWK', '33', '33', '33', 'WWW', NULL, NULL, 'app/QR/BzmSK.png', '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9721a7-ac63-43ca-ac1f-79b0b32f2be5', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', 'SANGAT BAIK', 'SANGAT BAIK', 'df', 'sdff', '33', '33', '33', 'xdcvgbnm', NULL, NULL, 'app/QR/4ur8o.png', '2024-07-23 10:06:26', '2024-07-23 10:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb__prestasi`
--

CREATE TABLE `tb__prestasi` (
  `id` char(36) NOT NULL,
  `id_anggota` char(36) DEFAULT NULL,
  `id_kelas` char(36) DEFAULT NULL,
  `id_siswa` char(36) DEFAULT NULL,
  `prestasi` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb__prestasi`
--

INSERT INTO `tb__prestasi` (`id`, `id_anggota`, `id_kelas`, `id_siswa`, `prestasi`, `keterangan`, `created_at`, `updated_at`) VALUES
('9c8b1449-4f73-4031-a46d-a51f8cc91bb6', '9c8b09a6-740d-4b06-a614-2514fde3ebb2', '9c8146fd-0785-4809-a43f-607896b0879e', '9c88a73c-20cc-4ab6-a6b4-3d3c35a7baba', NULL, NULL, '2024-07-17 10:19:07', '2024-07-17 10:19:07'),
('9c8b1a14-fb88-4553-96ec-97a1de30a42c', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, NULL, '2024-07-17 10:35:19', '2024-07-17 10:35:19'),
('9c8b244c-f61e-4806-9cb1-f3366fbf90de', '9c8b0a6d-f6f0-4f25-bd10-787f8a4c5c3a', '9c814774-ad75-4753-9872-93e708750e19', '9c895664-709d-4d7b-9f6f-44a71424f15b', NULL, NULL, '2024-07-17 11:03:54', '2024-07-17 11:03:54'),
('9c8b39bd-bc84-42cd-a044-6957dd530c1a', '9c8b0a8c-cbc9-4cc9-a5f8-dca9957c9848', '9c8147b5-6224-42e3-bd52-560b4c0e77f2', '9c8ae86a-51b1-4d75-bd97-5080462a4318', NULL, NULL, '2024-07-17 12:03:51', '2024-07-17 12:03:51'),
('9c957de6-d327-48a9-b450-6c74f2072130', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', 'wkwk', 'wkwk', '2024-07-22 14:32:43', '2024-07-22 14:32:43'),
('9c9582b0-3fd2-449a-b018-8f0fa597d22f', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, NULL, '2024-07-22 14:46:06', '2024-07-22 14:46:06'),
('9c9583a3-be6c-492f-a329-0e00bc5cc77c', '9c94fa49-529a-4e01-b8fd-28edaf9f1660', '9c8146b6-271b-4956-a4aa-242deeda798e', '9c8acb93-6b57-4652-a1fd-1a1bfd500e28', NULL, NULL, '2024-07-22 14:48:46', '2024-07-22 14:48:46'),
('9c9721a6-174d-44ba-9d09-a6d13113fc95', '9c8b0a57-0276-4a4c-a8c3-9a451375c4c3', '9c81467a-54fb-4ada-8d8f-7e70f0894cbf', '9c88d6d5-f7a6-4831-9bab-1aa30842d0db', NULL, NULL, '2024-07-23 10:06:25', '2024-07-23 10:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb__tahun_ajar`
--

CREATE TABLE `tb__tahun_ajar` (
  `id` char(36) NOT NULL,
  `tahun_mulai` varchar(255) NOT NULL,
  `tahun_selesai` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb__tahun_ajar`
--

INSERT INTO `tb__tahun_ajar` (`id`, `tahun_mulai`, `tahun_selesai`, `deskripsi`, `created_at`, `updated_at`) VALUES
('9c814503-567b-4e76-b426-3f002c4c65b9', '2023', '2024', 'Ganjil', '2024-07-12 13:17:05', '2024-07-12 13:17:05'),
('9c814528-38dd-4b04-a9ec-6c9794d39770', '2023', '2024', 'Genap', '2024-07-12 13:17:29', '2024-07-12 13:17:29'),
('9c8f9f65-d092-4a89-9fdb-5359818d6a21', '2023', '2024', 'p', '2024-07-19 16:31:25', '2024-07-19 16:31:25'),
('9c8f9fdd-ebfd-4eb6-9eb4-da3158228b26', '2023', '2024', 'okeeewedrf', '2024-07-19 16:32:43', '2024-07-22 08:18:07'),
('9c95c193-296f-43e8-b907-7d9f511bc15a', '2010', '2011', 'Ganjil', '2024-07-22 17:41:57', '2024-07-22 17:41:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `anggota_grup`
--
ALTER TABLE `anggota_grup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb__ekskul`
--
ALTER TABLE `tb__ekskul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb__kelas`
--
ALTER TABLE `tb__kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tahun_ajar` (`id_tahun_ajar`);

--
-- Indexes for table `tb__mapel`
--
ALTER TABLE `tb__mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tb__nilai`
--
ALTER TABLE `tb__nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb__nilai_tambahan`
--
ALTER TABLE `tb__nilai_tambahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa_2` (`id_siswa`),
  ADD KEY `id_kelas_2` (`id_kelas`),
  ADD KEY `id_anggota_2` (`id_anggota`);

--
-- Indexes for table `tb__prestasi`
--
ALTER TABLE `tb__prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `tb__tahun_ajar`
--
ALTER TABLE `tb__tahun_ajar`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb__kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anggota_grup`
--
ALTER TABLE `anggota_grup`
  ADD CONSTRAINT `anggota_grup_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_grup_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb__kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD CONSTRAINT `kepsek_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb__kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb__ekskul`
--
ALTER TABLE `tb__ekskul`
  ADD CONSTRAINT `tb__ekskul_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__ekskul_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__ekskul_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `tb__kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb__kelas`
--
ALTER TABLE `tb__kelas`
  ADD CONSTRAINT `tb__kelas_ibfk_1` FOREIGN KEY (`id_tahun_ajar`) REFERENCES `tb__tahun_ajar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb__mapel`
--
ALTER TABLE `tb__mapel`
  ADD CONSTRAINT `tb__mapel_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb__kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__mapel_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb__nilai`
--
ALTER TABLE `tb__nilai`
  ADD CONSTRAINT `tb__nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__nilai_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb__kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__nilai_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `tb__mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__nilai_ibfk_4` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb__nilai_tambahan`
--
ALTER TABLE `tb__nilai_tambahan`
  ADD CONSTRAINT `tb__nilai_tambahan_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__nilai_tambahan_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb__kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__nilai_tambahan_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb__prestasi`
--
ALTER TABLE `tb__prestasi`
  ADD CONSTRAINT `tb__prestasi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__prestasi_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb__kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb__prestasi_ibfk_3` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
