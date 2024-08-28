-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2024 at 09:35 AM
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
('1a2249ab-c40d-4712-b1ef-36bbc2084794', 'Admin', 'app/images/admin/1a2249ab-c40d-4712-b1ef-36bbc2084794-1722346705-zANQV.jpg', 'admin@gmail.com', '$2y$12$8nCm2TBXO2Wp12fPBAhJoeOzDlqQJyQZIO6YfvWlj9U4z0fZGg/by', '2024-05-26 01:06:29', '2024-08-12 03:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` char(36) NOT NULL,
  `id_guru` char(36) DEFAULT NULL,
  `id_kelas` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_tahun_ajar` char(36) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_guru`, `id_kelas`, `id_tahun_ajar`, `created_at`, `updated_at`) VALUES
('9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb92623-4d96-467d-938c-d0ec35ab21fa', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca9000b-3a20-41cc-aa4a-34e7d9ee7846', '2024-08-09 10:17:10', '2024-08-09 10:17:10'),
('9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9cb92623-4d96-467d-938c-d0ec35ab21fa', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca90025-bcbe-4163-a04f-0b7b6752d63d', '2024-08-09 10:17:32', '2024-08-09 10:17:32');

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
('9cbb48f6-c1fa-4cba-b693-07240c8c0578', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cc2d319-f2a6-4713-9343-22a044c27ec4', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', '2024-08-14 03:23:12', '2024-08-14 03:23:12');

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
('9cb8f158-dea1-46c4-8d20-52f2123b39a1', NULL, '198002242007102002', 'Yuniar, S.Pd.I', NULL, 'Ketapang', '1980-02-24', 'Perempuan', 'yuniar@gmail.com', '$2y$12$GxnEdB2PKibbhL89raN7u.CDRwBvD6Y8.MmqsPJsPmAmM42FEdUYe', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', '2024-08-09 05:29:30', '2024-08-09 05:29:30'),
('9cb8f205-8447-49eb-87ee-0b13346f6a64', NULL, '198401212023211015', 'Erwan Sahroni, S.Pd.I', NULL, 'Ketapang', '1984-01-21', 'Laki-laki', 'erwan@gmail.com', '$2y$12$UL/.o6Xj7qlS3wmWqBQ1bekNYAg7U8zaWA1AdL2fT3OVE3hGskwSW', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', '2024-08-09 05:31:23', '2024-08-09 05:31:23'),
('9cb8fa5e-ee72-42dc-9f8b-9a67628ae355', NULL, '198706092009122003', 'Sri Kurniati, S.Pd', NULL, 'Ngabang', '1987-06-09', 'Perempuan', 'sri@gmail.com', '$2y$12$p/KsgjydKDmqGhkviB.K7eYDCZnd8dRObCGjCUgDtgjCpCuNaXTTW', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', '2024-08-09 05:54:44', '2024-08-09 05:54:44'),
('9cb8fb91-ca52-4227-9989-01cf8d09b1f9', NULL, '196709232006041001', 'Dra.Siti Barkiah Tristanti', NULL, 'Sintang', '1964-11-13', 'Perempuan', 'sitibarkiah@gmail.com', '$2y$12$AGWeBndUK3x7n7vSyIUmkeHEfM6p8k2Fpk54D7uSNplvrh/lvZOS2', 'Jln. MT. Haryono - Kel. Kapuas Kanan Hulu - Kec. Sintang', '2024-08-09 05:58:05', '2024-08-09 05:58:05'),
('9cb8fd5d-85b3-4958-84d7-368b13a66a14', NULL, '196805051997031004', 'Drs.Abd.Haris Nasution', NULL, 'Ketapang', '1980-07-21', 'Laki-laki', 'haris@gmail.com', '$2y$12$LHd5JHm/Bq82umsO3kE7zeSVijzbrFVUU1RU.ABpZxnZc87dbl0lu', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', '2024-08-09 06:03:06', '2024-08-09 06:03:06'),
('9cb92484-20ea-4322-aa46-15894e9d92c4', NULL, '197704132005011004', 'Musruji, S.Ag', NULL, 'Ketapang', '1777-04-13', 'Laki-laki', 'musruji@gmail.com', '$2y$12$0ncJJFULIg.3GnYdWn7cZOLj1GUGFi9Dl1seoIFbw3Zo7UXmPFoF6', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', '2024-08-09 07:52:35', '2024-08-09 07:52:35'),
('9cb925b1-7501-45ba-ae4c-b97fb16c0d1f', NULL, '197911132009031002', 'Emy Awalliah, S.Si', NULL, 'Pontianak', '1986-01-28', 'Perempuan', 'emyawalliah@gmail.com', '$2y$12$53cP/lvRh7N12hBtG0NWPO5Z1KJYLUIUW3YEi2D//41CRagfU14bm', 'Jl. Ahmad Yani Pontianak, Kelurahan Parit Tokaya Kecamatan Pontianak Selatan, Kota Pontianak, Provinsi Kalimantan Barat.', '2024-08-09 07:55:52', '2024-08-09 07:55:52'),
('9cb92623-4d96-467d-938c-d0ec35ab21fa', NULL, '199105192020121007', 'Singgih Herlambang, S.Pd', NULL, 'Batu Ampar', '1991-05-19', 'Laki-laki', 'singgih@gmail.com', '$2y$12$kdrJ7fYFW0iq/obQ0u2Xqe7Zs16fhi3vHc.x0Qy4aOwrNnzOyH1oe', 'Jl. Lumba-lumba No.5 Kelurahan, Sei Jodoh, Kecamatan, Batu Ampar', '2024-08-09 07:57:07', '2024-08-09 07:57:07'),
('9cb926ea-50b4-4062-810a-3ace1aa1ca20', NULL, '199409032020122025', 'Muslihatun S.Pd', NULL, 'Kandall', '1994-09-03', 'Perempuan', 'muslihatun@gmail.com', '$2y$12$p09LXcu31utAzsj2Pzv/M.1Se3cCcGHdwcY4lXKZm0wWCBd21moMq', 'Jl. Soekarno Hatta No. 349 Kendal. Desa/Kelurahan, LANGENHARJO. Kecamatan/Kota', '2024-08-09 07:59:17', '2024-08-12 04:14:06'),
('9cb92759-8c7e-410c-a63f-ee61e29e7cff', NULL, '199512212020122020', 'Rahmawati Kartika Sari, S.Pd', NULL, 'Sintang', '1995-12-21', 'Perempuan', 'Rahmawati12@gmail.com', '$2y$12$syybuL6vOC4FxUhf8u.4kOsWB42rx6YckHq09WCUUy602MWHdkeAi', 'Jln. MT. Haryono - Kel. Kapuas Kanan Hulu - Kec. Sintang', '2024-08-09 08:00:30', '2024-08-09 08:00:30'),
('9cb92816-436f-4bab-b48f-fc7fa02068d9', NULL, '1988110720201122011', 'Indrahmawati, S.Pd.I', NULL, 'Kandal', '1988-11-07', 'Perempuan', 'mawati@gmail.com', '$2y$12$G9hWZwAldcxYFQPM3HrQKuv388kX95V9K19Wc7FnpFmR14z8onFby', 'Jl. Soekarno Hatta No. 349 Kendal. Desa/Kelurahan, LANGENHARJO. Kecamatan/Kota', '2024-08-09 08:02:34', '2024-08-09 08:02:34'),
('9cb928e6-e89c-4664-855f-51c4c541c118', NULL, '198903182023211021', 'Faisal, S.Pd.I', NULL, 'Ketapang', '1984-03-13', 'Laki-laki', 'faisal@gmail.com', '$2y$12$2etymZJjtmnXP7sZX1VvKuwR2FWnHliAE087VRhXzO9sczmLyzfl2', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', '2024-08-09 08:04:51', '2024-08-09 08:04:51'),
('9cb92a08-1524-46b3-b905-b1fd7eed4e6d', NULL, '1995102610233212024', 'Lia Zulfarnida, S.Pd.I', NULL, 'Ketapang', '1995-06-16', 'Perempuan', 'lia@gmail.com', '$2y$12$PSSNbsu/OFFP8NJFJ3y4m.ijvJbWeOc8.Cdg3K.thlkALXUX48rku', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', '2024-08-09 08:08:00', '2024-08-09 08:08:00'),
('9cb92ab6-aee5-4990-8933-ec54efa28106', NULL, '1995061720223212036', 'Lisa Rosalina, S.Pd.I', NULL, 'Ketapang', '1993-02-24', 'Perempuan', 'lisa@gmail.com', '$2y$12$Qvx06knXMBJNeNQ2zlGX0ul4jmMu7.EUNR7cwreU5yxzLdddQHlDi', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', '2024-08-09 08:09:54', '2024-08-09 08:09:54'),
('9cb92b6a-236a-41d6-b95a-ac386326d676', NULL, '1991051920201210003', 'Sri Izzati, S.Pd.I', NULL, 'Ketapang', '1992-01-19', 'Perempuan', 'izzati@gmail.com', '$2y$12$eGNT2kE2hCQjO8Af12Rv/.3buRLxqg39R2KvfWc.BA9c0c9OX96he', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', '2024-08-09 08:11:52', '2024-08-09 08:11:52'),
('9cb92bff-9542-4417-b025-36c4d365a5b7', NULL, '199409042020122025', 'Nurkamsiah,S.Pd.I', NULL, 'Ketapang', '1994-07-26', 'Perempuan', 'nur@gmail.com', '$2y$12$JgIFgvCcXRK0L59ESsplp.7NZmM2Q4ogw3ecMhw7zVgRUc0KmatTy', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', '2024-08-09 08:13:30', '2024-08-09 08:13:30'),
('9cb92cd1-8135-47ca-8ad1-ba6f1da03a95', NULL, '199512212020332020', 'Samudi, S.Pd.I', NULL, 'Pontianak', '1980-08-23', 'Laki-laki', 'samudi@gmail.com', '$2y$12$v2dtEMVxjw66upknb4zaCeH5C.8uv1g2MRZcfycWlC86YK8eF/9VG', 'Jl. Ahmad Yani Pontianak, Kelurahan Parit Tokaya Kecamatan Pontianak Selatan, Kota Pontianak, Provinsi Kalimantan Barat.', '2024-08-09 08:15:48', '2024-08-09 08:15:48'),
('9cb92d65-50b9-40ba-b752-0c26f6fba225', NULL, '199512212020122031', 'Weni, A.Md.Kom', NULL, 'Ketapang', '1999-09-12', 'Perempuan', 'weni@gmail.com', '$2y$12$ox/dUkU/wtdmb2.nUftW7O5Bgrtpas4exCiHLiekus4MimTPsBVBm', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', '2024-08-09 08:17:24', '2024-08-09 08:17:24'),
('9cb92ddd-a49a-4816-8acc-c87d335927fa', NULL, '197704162005011004', 'Umi Latifah,S.Pd.I', NULL, 'Ketapang', '1995-03-29', 'Perempuan', 'umi@gmail.com', '$2y$12$5lsUkwv1pAxHerHBjI5O8ukZj0mrsux1GO8TiCo2lu4TW2Wtl03u6', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', '2024-08-09 08:18:43', '2024-08-09 08:18:43'),
('9cb92e6a-9970-49c6-a697-c80dd8d64f08', NULL, '199104192020121007', 'Zanatin Maswa, S.Pd.I', NULL, 'Ketapang', '1999-01-24', 'Perempuan', 'zanatin@gmail.com', '$2y$12$3scPHnkIMcxfFL8ZvsX1kOnfmmOuCHngBXjjlJxmhpwA2cDrSxZHm', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', '2024-08-09 08:20:16', '2024-08-09 08:20:16');

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
('9c889c58-867d-4ca6-89da-368f64cab10c', NULL, '197911122009031002', 'Moh Sunja\'i,S.Pd.I', 'app/images/kepsek/9c889c58-867d-4ca6-89da-368f64cab10c-1722353247-hFALr.jpg', 'Demakk', '1979-11-13', 'Laki-laki', 'sunjai@gmail.com', '$2y$12$BfYaC6LlCBlcRjvUoaN1/OyPv/0ZMr.8eMi6D2uZodZCFHE2.ghkO', 'Jln. Sultan Trenggono No. 23 · location icon Desa Karangrejo, Kecamatan Wonosalam, Kabupaten Demak,', '2024-07-16 04:52:05', '2024-08-11 08:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `ob`
--

CREATE TABLE `ob` (
  `id` char(36) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ob`
--

INSERT INTO `ob` (`id`, `nama`, `created_at`, `updated_at`) VALUES
('9ca59ad7-280d-43e4-841c-3a53a1bd614f', NULL, '2024-07-30 14:46:53', '2024-07-30 14:46:53');

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
('9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', '221278', '0082375659', 'Nur Alfiyah', NULL, 'Ketapang', '2008-07-05', 'Perempuan', 'Islam', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', 'nuralfiyah@gmail.com', '$2y$12$R.WZ.9pTq8H6mxUBPawjgOIn4neXlumLhGGPyNNsGKdFgfK2iPz4.', '2024-07-31 12:25:44', '2024-07-31 12:25:44'),
('9ca76bf6-5dc5-415e-b25f-06eb1b77451b', '221280', '0059561092', 'Rangga', NULL, 'Ketapang', '2009-12-19', 'Laki-laki', 'Islam', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', 'rangga@gmail.com', '$2y$12$RjE3TCH8F6SEK2Dgd3TJs.O8nEqwyBL2sQxC9UDTZeE/n/mwY5xTa', '2024-07-31 12:27:27', '2024-07-31 12:27:27'),
('9ca76c87-3dbc-4b82-884f-bbc302df23d0', '221289', '0079724503', 'Sulistia', NULL, 'Ketapang', '2007-02-13', 'Perempuan', 'Islam', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', 'sulistia@gmail.com', '$2y$12$0b6KQE1ILznJMFbZiC9.EeYDJ1TOk9H04Rb6D72zuXwG5bDV1SmE2', '2024-07-31 12:29:02', '2024-07-31 12:29:02'),
('9ca76d25-4b91-48c7-8bc8-4914c2150ea4', '221294', '0063339678', 'Ibnu Aziz', NULL, 'Ketapang', '2006-11-23', 'Laki-laki', 'Islam', 'Rahadi Usman SUNGAI BESAR, MATAN HILIR SELATAN, KETAPANG, KALIMANTAN BARAT, 78822, 78822', 'ibnu@gmail.com', '$2y$12$Jy1umcFhmbzVP8z6vJC0oOCsjcOPGX4MM7Nbc6wa.MQjN5YBG1n0G', '2024-07-31 12:30:46', '2024-07-31 12:30:46'),
('9ca76dc1-38dd-4173-b592-4ec92586da0e', '211209', '0069575487', 'Arif Rahman', NULL, 'Ketapang', '2006-06-18', 'Laki-laki', 'Islam', 'Rahadi Usman Sungai Pelang, Matan Hilir Selatan,Ketapang,Kalimantan Barat', 'arif@gmail.com', '$2y$12$AB8ey54vNGJT8uopp4ekQeX15abQeT05SdQsujB3.EkxBBdn7cDMa', '2024-07-31 12:32:28', '2024-07-31 12:32:28'),
('9ca76ecc-2088-45cf-a109-97d907c27f5a', '221283', '0062882215', 'Ridho', NULL, 'Ketapang', '2006-07-10', 'Laki-laki', 'Islam', 'Rahadi Usman Sungai Bakau Matan Hilir Selatan,Ketapang,Kalimantan Barat', 'ridho@gmail.com', '$2y$12$gsPgcTb4Yy0EFzRjOmzNgeDQj4/uU1bTzxVqA49xzA5j4r5jd5HF2', '2024-07-31 12:35:23', '2024-07-31 12:35:23');

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
('9cb95887-59d9-4714-b1d3-4a34a2f88e36', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', 'Pramuka', '90', 'Terampil dalam bidang LKBB', '2024-08-09 10:18:01', '2024-08-10 09:34:32'),
('9cb958ca-b272-47e3-ae39-624424a89eeb', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', 'Pramuka', '90', 'Terampil dalam bidang LKBB', '2024-08-09 10:18:45', '2024-08-10 09:38:15'),
('9cbb4479-915a-43a0-8563-83e6a9513998', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', 'Olahraga', '90', 'Memiliki kemampuan baik terutama kemampuan dalam permainan bola kecil', '2024-08-10 09:13:36', '2024-08-10 09:34:32'),
('9cbb48f7-4f91-401b-9d6d-b3a27535db5e', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', 'Olahraga', '90', 'Memiliki kemampuan baik terutama kemampuan dalam permainan bola kecil', '2024-08-10 09:26:09', '2024-08-10 09:38:15'),
('9cbef029-5a04-49e8-af23-93e822e816b1', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, NULL, NULL, '2024-08-12 05:01:09', '2024-08-12 05:01:09'),
('9cc2cca4-cb20-4523-a341-3dbbfd3fc917', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, NULL, NULL, '2024-08-14 03:05:09', '2024-08-14 03:05:09'),
('9cc2d31a-879a-4ceb-8658-541829f32a5c', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, NULL, NULL, '2024-08-14 03:23:13', '2024-08-14 03:23:13');

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
('9cb95203-5253-4eaa-b068-b1a80417ba1b', 'X (IPA)', NULL, '2024-08-09 09:59:48', '2024-08-09 09:59:48'),
('9cbb3e44-3495-4181-98e9-b88413131608', 'X (IPS)', NULL, '2024-08-10 08:56:15', '2024-08-10 08:56:15'),
('9cbb3e68-28b4-4276-aa91-d870d60d352f', 'XI (IPA)', NULL, '2024-08-10 08:56:38', '2024-08-10 08:56:38'),
('9cbb3e78-5929-4922-bae5-15c489aec5de', 'XI (IPS)', NULL, '2024-08-10 08:56:48', '2024-08-10 08:56:48'),
('9cbb3e87-a779-4e88-bc97-1eb0c9ac7e12', 'XII (IPA)', NULL, '2024-08-10 08:56:58', '2024-08-10 08:56:58'),
('9cbb3e9c-b408-4c98-8517-8cbbb53e6ae1', 'XII (IPS)', NULL, '2024-08-10 08:57:12', '2024-08-10 08:57:12');

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
('9cbb3fe9-d7fb-426c-96fa-48f4561ea921', '9cb8f158-dea1-46c4-8d20-52f2123b39a1', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Al Qur\'an Hadis', 'A', '2024-08-10 09:00:51', '2024-08-10 09:00:51'),
('9cbb400f-26ef-4c6b-a22c-1b2c39b9aa72', '9cb8f205-8447-49eb-87ee-0b13346f6a64', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Akidah Akhlak', 'A', '2024-08-10 09:01:15', '2024-08-10 09:01:15'),
('9cbb4036-4ce7-4b30-bfd3-d5926f06725a', '9cb8fb91-ca52-4227-9989-01cf8d09b1f9', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Fikih', 'A', '2024-08-10 09:01:41', '2024-08-10 09:01:41'),
('9cbb406d-baad-4686-926b-975b64eb75b1', '9cb92484-20ea-4322-aa46-15894e9d92c4', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Sejarah Kebudayaan Islam', 'A', '2024-08-10 09:02:17', '2024-08-10 09:02:17'),
('9cbb40a4-24bd-4f18-a988-96d6a8730364', '9cb92816-436f-4bab-b48f-fc7fa02068d9', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Pendidikan Pancasila dan Kewarganegaraan', 'A', '2024-08-10 09:02:53', '2024-08-10 09:02:53'),
('9cbb40ee-092e-4a5f-988a-01d476c00187', '9cb92ab6-aee5-4990-8933-ec54efa28106', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Bahasa Indonesia', 'A', '2024-08-10 09:03:41', '2024-08-10 09:03:41'),
('9cbb4108-4d17-404a-9066-02e33439d8b5', '9cb928e6-e89c-4664-855f-51c4c541c118', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Bahasa Arab', 'A', '2024-08-10 09:03:58', '2024-08-10 09:03:58'),
('9cbb4127-9133-4747-83b0-a2d4452e2f46', '9cb8fa5e-ee72-42dc-9f8b-9a67628ae355', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Matematika Peminatan', 'A', '2024-08-10 09:04:19', '2024-08-10 09:04:19'),
('9cbb4148-2723-4dd9-a6e5-4f854daddae3', '9cb92e6a-9970-49c6-a697-c80dd8d64f08', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Sejarah Indonesia', 'A', '2024-08-10 09:04:40', '2024-08-10 09:04:40'),
('9cbb416e-0645-42db-8aaa-793d764f0014', '9cb92b6a-236a-41d6-b95a-ac386326d676', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Bahasa Inggris', 'A', '2024-08-10 09:05:05', '2024-08-10 09:05:05'),
('9cbb4199-2d8d-4dfc-9350-208cdca1794b', '9cb92ddd-a49a-4816-8acc-c87d335927fa', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Seni Budaya', 'B', '2024-08-10 09:05:33', '2024-08-10 09:05:33'),
('9cbb41c7-aea5-4d55-9378-4e7aaf49b4c2', '9cb92cd1-8135-47ca-8ad1-ba6f1da03a95', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Pendidikan Jesmani, Olahraga dan Kesehatan', 'B', '2024-08-10 09:06:04', '2024-08-10 09:06:04'),
('9cbb41ee-78df-4d5b-9446-9aed7087b0ec', '9cb92a08-1524-46b3-b905-b1fd7eed4e6d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Prakarya dan Kewirausahaan', 'B', '2024-08-10 09:06:29', '2024-08-10 09:06:29'),
('9cbb423b-6122-4db8-9982-241fc4a27580', '9cb92d65-50b9-40ba-b752-0c26f6fba225', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Keterampilan Multimedia', 'B', '2024-08-10 09:07:20', '2024-08-10 09:07:20'),
('9cbb4273-e70b-44ad-b731-b4af552a6da8', '9cb92623-4d96-467d-938c-d0ec35ab21fa', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Matematika Dasar', 'C', '2024-08-10 09:07:57', '2024-08-10 09:08:51'),
('9cbb42fd-ec3b-4c5e-9bc4-5dedf7e38515', '9cb92759-8c7e-410c-a63f-ee61e29e7cff', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Biologi', 'C', '2024-08-10 09:09:27', '2024-08-10 09:09:27'),
('9cbb432d-7771-4ea5-afa3-7b923892e630', '9cb8fd5d-85b3-4958-84d7-368b13a66a14', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Fisika', 'C', '2024-08-10 09:09:58', '2024-08-10 09:09:58'),
('9cbb4344-c6f1-4d6b-bc26-3e8daefd8841', '9cb925b1-7501-45ba-ae4c-b97fb16c0d1f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Kimia', 'C', '2024-08-10 09:10:13', '2024-08-10 09:10:13'),
('9cbb4374-7da3-423a-9333-e36c3e917001', '9cb926ea-50b4-4062-810a-3ace1aa1ca20', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Geografi', 'C', '2024-08-10 09:10:45', '2024-08-10 09:11:33'),
('9cbb4401-857a-48aa-8448-fd2e63081d66', '9cb92bff-9542-4417-b025-36c4d365a5b7', '9cb95203-5253-4eaa-b068-b1a80417ba1b', 'Ekonomi', 'C', '2024-08-10 09:12:17', '2024-08-10 09:12:49');

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
('9cbb4477-880a-4e7b-abed-0eca4062f654', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb3fe9-d7fb-426c-96fa-48f4561ea921', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, '93', 'A', '90', 'B', 'Memiliki kemampuan sangat baik terutama kemampuan dalam Kewajiban berdakwah dan metodenya serta fase atau tahapannya dalam menyerukan amar ma`ruf nahi munkar', 'Terampil terutama dalam membaca teks ayat terkait kewajiban berdakwah (amar ma`ruf nahi munkar dan ayat tentang perintah bermusyawarah dengan menjunjung tinggi kejujuran dan keadilan', '2024-08-10 09:13:35', '2024-08-10 09:41:51'),
('9cbb4477-8b56-4288-9276-951a82c975d4', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb400f-26ef-4c6b-a22c-1b2c39b9aa72', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, '89', 'B', '90', 'B', 'Memiliki kemampuan sangat baik terutama kemampuan dalam Memahami Ragam Sikap Terpuji, mendefenisikan Ragam Sikap Tercela, serta memahami Etika dalam Organisasi dan Profesi', 'Sangat terampil terutama dalam Menganasilisis Ragam Sikap Terpuji, mengidentifikasi Ragam Akhlak Tercela, menjelaskan Etika dalam Organisasi dan Profesi', '2024-08-10 09:13:35', '2024-08-10 09:45:24'),
('9cbb4477-8d54-4d74-819f-9dcb7d1f518c', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4036-4ce7-4b30-bfd3-d5926f06725a', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-8ec2-415f-b873-ace71243d172', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb406d-baad-4686-926b-975b64eb75b1', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-908b-49a5-b8a2-ac1044428ac2', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40a4-24bd-4f18-a988-96d6a8730364', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-920f-4f60-8989-df774d912861', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40ee-092e-4a5f-988a-01d476c00187', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-93c5-4a98-856c-1f1a3e59a45a', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4108-4d17-404a-9066-02e33439d8b5', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-95c2-47f4-be2d-b074ed799ee4', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4127-9133-4747-83b0-a2d4452e2f46', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, '87', 'B', '90', 'B', 'Memiliki kemampuan baik terutama kemampuan dalam Mendeskripsikan dan menentukan peluang kejadian majemuk (peluang kejadian-kejadian saling bebas, saling lepas, dan kejadian bersyarat) dari suatu percobaan acak', 'Terampil terutama dalam Menyelesaikan masalah yang berkaitan dengan peluang kejadian majemuk (peluang, kejadiankejadian saling bebas, saling lepas, dan kejadian bersyarat)', '2024-08-10 09:13:35', '2024-08-10 09:48:15'),
('9cbb4477-9772-45bf-bd64-1a5e5ea51190', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4148-2723-4dd9-a6e5-4f854daddae3', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-9916-4bce-92cc-7963f406c234', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb416e-0645-42db-8aaa-793d764f0014', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-9ac3-46de-b438-cc74f9aa05f9', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4199-2d8d-4dfc-9350-208cdca1794b', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-9c8d-49b2-ba15-c432e8c4b3ab', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41c7-aea5-4d55-9378-4e7aaf49b4c2', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-9eaf-441c-b575-452cadf8104b', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41ee-78df-4d5b-9446-9aed7087b0ec', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-a048-40c0-b057-4468a4bf1169', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb423b-6122-4db8-9982-241fc4a27580', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-a1d3-4d69-9597-9340ffef3ab0', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4273-e70b-44ad-b731-b4af552a6da8', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, '88', 'B', '90', 'B', 'Memiliki kemampuan baik terutama kemampuan dalam Menjelaskan dan menentukan distribusi peluang binomial berkaitan dengan fungsi peluang binomial', 'Terampil terutama dalam menyelesaikan masalah berkaitan dengan distribusi peluang binomial suatu percobaan (acak) dan penarikan kesimpulannya', '2024-08-10 09:13:35', '2024-08-10 09:34:32'),
('9cbb4477-a3c1-4b59-a680-1c16dca388db', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb42fd-ec3b-4c5e-9bc4-5dedf7e38515', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-a591-4b5c-a41d-8ebd0f34d759', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb432d-7771-4ea5-afa3-7b923892e630', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-a71f-4bde-9e67-a5a1f47d85a5', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4344-c6f1-4d6b-bc26-3e8daefd8841', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-a8ba-473a-b593-42e85c7b710c', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4374-7da3-423a-9333-e36c3e917001', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb4477-aa9a-4f57-917b-679ed19e031d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4401-857a-48aa-8448-fd2e63081d66', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:13:35', '2024-08-10 09:13:35'),
('9cbb48f6-d26a-4022-b4bc-5c18b04dd8df', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb3fe9-d7fb-426c-96fa-48f4561ea921', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, '96', 'A', '95', 'A', 'Memiliki kemampuan sangat baik terutama kemampuan dalam Kewajiban berdakwah dan metodenya serta fase atau tahapannya dalam menyerukan amar ma`ruf nahi munkar', 'Terampil terutama dalam membaca teks ayat terkait kewajiban berdakwah (amar ma`ruf nahi munkar dan ayat tentang perintah bermusyawarah dengan menjunjung tinggi kejujuran dan keadilan', '2024-08-10 09:26:09', '2024-08-10 09:42:38'),
('9cbb48f6-d65a-4dd1-9d56-75a982ca11a1', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb400f-26ef-4c6b-a22c-1b2c39b9aa72', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, '92', 'B', '92', 'B', 'Memiliki kemampuan sangat baik terutama kemampuan dalam Memahami Ragam Sikap Terpuji, mendefenisikan Ragam Sikap Tercela, serta memahami Etika dalam Organisasi dan Profesi', 'Sangat terampil terutama dalam Menganasilisis Ragam Sikap Terpuji, mengidentifikasi Ragam Akhlak Tercela, menjelaskan Etika dalam Organisasi dan Profesi', '2024-08-10 09:26:09', '2024-08-10 09:46:11'),
('9cbb48f6-d7f6-44d2-bf6e-2f6765747e4b', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4036-4ce7-4b30-bfd3-d5926f06725a', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f6-d96c-4132-afdc-f509e2a74419', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb406d-baad-4686-926b-975b64eb75b1', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f6-df96-438f-b9d5-0b35117c75d2', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40a4-24bd-4f18-a988-96d6a8730364', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f6-e3f8-4463-80ad-bc644889fbd2', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40ee-092e-4a5f-988a-01d476c00187', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f6-e8e6-4cea-a35a-25e391009c49', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4108-4d17-404a-9066-02e33439d8b5', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f6-ec1c-4274-a3a8-e504ff015e0a', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4127-9133-4747-83b0-a2d4452e2f46', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutama kemampuan dalam Mendeskripsikan dan menentukan peluang kejadian majemuk (peluang kejadian-kejadian saling bebas, saling lepas, dan kejadian bersyarat) dari suatu percobaan acak', 'Terampil terutama dalam Menyelesaikan masalah yang berkaitan dengan peluang kejadian majemuk (peluang, kejadiankejadian saling bebas, saling lepas, dan kejadian bersyarat)', '2024-08-10 09:26:09', '2024-08-10 09:48:53'),
('9cbb48f6-efd0-4463-afbd-e3a31075a064', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4148-2723-4dd9-a6e5-4f854daddae3', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f6-f1e8-4659-bd70-008c03cd99b9', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb416e-0645-42db-8aaa-793d764f0014', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f6-f3ef-4d25-bb17-cd4da7fd5fd2', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4199-2d8d-4dfc-9350-208cdca1794b', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f7-03b2-4cb5-ae27-5dcf6f378535', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41c7-aea5-4d55-9378-4e7aaf49b4c2', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f7-057e-4f68-934d-03be8a601031', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41ee-78df-4d5b-9446-9aed7087b0ec', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f7-09a5-4e4e-a18c-97bce84fc3a0', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb423b-6122-4db8-9982-241fc4a27580', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f7-0b78-4065-963f-fb5d760873d8', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4273-e70b-44ad-b731-b4af552a6da8', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, '90', 'B', '90', 'B', 'Memiliki kemampuan baik terutama kemampuan dalam Menjelaskan dan menentukan distribusi peluang binomial berkaitan dengan fungsi peluang binomial', 'Terampil terutama dalam menyelesaikan masalah berkaitan dengan distribusi peluang binomial suatu percobaan (acak) dan penarikan kesimpulannya', '2024-08-10 09:26:09', '2024-08-10 09:38:15'),
('9cbb48f7-0e20-4205-a800-742084a582af', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb42fd-ec3b-4c5e-9bc4-5dedf7e38515', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f7-1174-466e-bfcc-340b1be6463f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb432d-7771-4ea5-afa3-7b923892e630', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f7-1300-4710-a2fb-a67650e453ad', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4344-c6f1-4d6b-bc26-3e8daefd8841', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f7-152c-49d4-90f0-f2af542f8c2d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4374-7da3-423a-9333-e36c3e917001', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbb48f7-181f-493e-bce1-d553730837df', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4401-857a-48aa-8448-fd2e63081d66', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Genap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbef027-a644-4b78-99ff-f858fa4eea61', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb3fe9-d7fb-426c-96fa-48f4561ea921', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-a98d-41b9-81b3-469abc43fae4', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb400f-26ef-4c6b-a22c-1b2c39b9aa72', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-ab20-4be2-b585-efaad7d6734f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4036-4ce7-4b30-bfd3-d5926f06725a', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-acca-4e78-ba90-235e6071d0d5', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb406d-baad-4686-926b-975b64eb75b1', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-b17d-4b8a-afd5-9ff721925bac', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40a4-24bd-4f18-a988-96d6a8730364', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-b40d-46d5-bd9c-ddaa9e837c69', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40ee-092e-4a5f-988a-01d476c00187', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-b701-4279-b5fc-d3d8100f5ab4', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4108-4d17-404a-9066-02e33439d8b5', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-b918-4c56-8a15-9ec406159a0b', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4127-9133-4747-83b0-a2d4452e2f46', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-bb1b-4749-85da-8937852aa0c7', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4148-2723-4dd9-a6e5-4f854daddae3', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-bd79-442e-a457-3231a62f947e', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb416e-0645-42db-8aaa-793d764f0014', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-bf02-426f-9ace-73d0d80cfa9d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4199-2d8d-4dfc-9350-208cdca1794b', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-c07b-4174-bd17-c601ac644803', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41c7-aea5-4d55-9378-4e7aaf49b4c2', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-c258-4e93-a79e-51132bf4426d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41ee-78df-4d5b-9446-9aed7087b0ec', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-c3ee-48dc-8e5a-b4060b67b32b', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb423b-6122-4db8-9982-241fc4a27580', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-c5ea-4ccf-af6b-c475bfd6ba02', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4273-e70b-44ad-b731-b4af552a6da8', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-c782-4add-b783-79bd45eac11b', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb42fd-ec3b-4c5e-9bc4-5dedf7e38515', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-c976-4543-ae78-666428da4591', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb432d-7771-4ea5-afa3-7b923892e630', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-cbca-4719-a98a-ec28f7473fd9', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4344-c6f1-4d6b-bc26-3e8daefd8841', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-cd72-44a3-8786-d0f4fbd880ca', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4374-7da3-423a-9333-e36c3e917001', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cbef027-d06e-41b5-9866-6dd66d693a66', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4401-857a-48aa-8448-fd2e63081d66', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-12 05:01:08', '2024-08-12 05:01:08'),
('9cc2cca3-001d-4acf-93b8-950a887a45a0', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb3fe9-d7fb-426c-96fa-48f4561ea921', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-052d-4e39-9f9b-48c7d3fb3119', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb400f-26ef-4c6b-a22c-1b2c39b9aa72', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-0724-4fbc-9343-3596499852f4', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4036-4ce7-4b30-bfd3-d5926f06725a', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-08b9-4043-aa63-689d920c5295', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb406d-baad-4686-926b-975b64eb75b1', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-0a61-4737-aff5-3e1011bde0a6', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40a4-24bd-4f18-a988-96d6a8730364', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-0c00-4ac9-8bc7-51df89ce4403', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40ee-092e-4a5f-988a-01d476c00187', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-0dad-4a17-a3f6-ff4e0f7f37a2', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4108-4d17-404a-9066-02e33439d8b5', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-0f41-4723-aa8d-605a7abc4c59', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4127-9133-4747-83b0-a2d4452e2f46', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-112f-4a5b-899f-c4880e23c16d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4148-2723-4dd9-a6e5-4f854daddae3', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-13f9-4351-a73c-519b99cd0c43', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb416e-0645-42db-8aaa-793d764f0014', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-159b-4671-828a-e7f0bcc9e509', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4199-2d8d-4dfc-9350-208cdca1794b', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-176e-46c1-ac99-48139fe1c75c', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41c7-aea5-4d55-9378-4e7aaf49b4c2', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-1941-46f8-b103-278053e6615e', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41ee-78df-4d5b-9446-9aed7087b0ec', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-1ae6-4ca5-8b10-4e1ec523a22d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb423b-6122-4db8-9982-241fc4a27580', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-1c5b-4159-a95b-b12c56afff08', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4273-e70b-44ad-b731-b4af552a6da8', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-1df8-40e4-ad03-b872d41c96c7', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb42fd-ec3b-4c5e-9bc4-5dedf7e38515', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-1f90-4af0-a838-b1fd23875cbb', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb432d-7771-4ea5-afa3-7b923892e630', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-2111-407c-869e-fc3e56e6699a', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4344-c6f1-4d6b-bc26-3e8daefd8841', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-228f-414d-947a-d7732d97b1d7', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4374-7da3-423a-9333-e36c3e917001', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2cca3-243b-4517-b297-402f6300b20c', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4401-857a-48aa-8448-fd2e63081d66', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:05:08', '2024-08-14 03:05:08'),
('9cc2d31a-0c29-4f3d-b48c-d267c5390e4c', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb3fe9-d7fb-426c-96fa-48f4561ea921', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-0f4e-4257-baf4-a9158ddfb05d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb400f-26ef-4c6b-a22c-1b2c39b9aa72', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-113f-415f-9a68-2ef620a7025f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4036-4ce7-4b30-bfd3-d5926f06725a', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-15c7-44bb-9a5f-fa36657c808d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb406d-baad-4686-926b-975b64eb75b1', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-1887-4a56-8e7e-448bd5408ba7', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40a4-24bd-4f18-a988-96d6a8730364', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-1ae4-423c-a9ec-a219b93ce05a', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb40ee-092e-4a5f-988a-01d476c00187', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-1c60-4dea-b44b-d9e8b76384bd', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4108-4d17-404a-9066-02e33439d8b5', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-1ddc-4b87-b55a-3362b7fe9947', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4127-9133-4747-83b0-a2d4452e2f46', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-1f74-48e5-8381-cc157967535d', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4148-2723-4dd9-a6e5-4f854daddae3', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-21f7-439e-8b94-1df15c7239ae', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb416e-0645-42db-8aaa-793d764f0014', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-23a5-4f78-8d79-c2bf67b209b3', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4199-2d8d-4dfc-9350-208cdca1794b', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-254d-4b0a-bea7-ae52ccec8bd1', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41c7-aea5-4d55-9378-4e7aaf49b4c2', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-2735-4c4a-91f2-cb1bb3c47c52', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb41ee-78df-4d5b-9446-9aed7087b0ec', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-28cc-473d-909c-f814a8658330', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb423b-6122-4db8-9982-241fc4a27580', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-2a4a-448e-8200-9797e5cb56b4', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4273-e70b-44ad-b731-b4af552a6da8', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-2bfd-4613-bbea-d83e4fed575b', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb42fd-ec3b-4c5e-9bc4-5dedf7e38515', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-3004-4e7a-b201-e49d1c12f6da', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb432d-7771-4ea5-afa3-7b923892e630', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-317f-4287-b3ab-d29efbe40705', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4344-c6f1-4d6b-bc26-3e8daefd8841', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-32eb-49d3-968a-77ccc77e156c', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4374-7da3-423a-9333-e36c3e917001', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12'),
('9cc2d31a-358a-4eb2-8f56-52b2fd40317c', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9cbb4401-857a-48aa-8448-fd2e63081d66', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, 'Ganjil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-14 03:23:12', '2024-08-14 03:23:12');

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
('9cb95887-511e-4323-b1e0-ab54a721615b', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', 'SANGAT BAIK', 'SANGAT BAIK', 'Sikap spiritual yang ditunjukkan sangat baik dalam menghargai perilaku beriman dan bertakwa kepada Tuhan YME dan berakhlak mulia dalam kehidupan di madrasah dan masyarakat, sangat rajin berdoa, sangat rajin memberi salam, sangat rajin mengikuti shalat berjamaah dan sangat pandai bersyukur', 'Sikapnya sangat baik dalam menghargai keluhuran nilai-nilai Pancasila sebagai pandangan hidup bangsa dengan selalu memperhatikan tata tertib madrasah, memiliki kejujuran baik, memiliki kedisiplinan sangat baik, memiliki tanggung jawab sangat baik, memiliki toleransi sangat baik, memiliki sikap gotong royong baik, memiliki kesantunan sangat baik dan memiliki kepercayaan diri yang sangat baik', '2', '3', '0', 'Jangan pernah bosan untuk terus belajar dan terus bersemangat untuk meraih cita-cita mu', NULL, NULL, 'app/QR/BqZPO.png', '2024-08-09 10:18:01', '2024-08-10 09:34:32'),
('9cb958ca-9e25-45ed-8ebf-9ec38612fe86', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', 'SANGAT BAIK', 'SANGAT BAIK', 'Sikap spiritual yang ditunjukkan sangat baik dalam menghargai perilaku beriman dan bertakwa kepada Tuhan YME dan berakhlak mulia dalam kehidupan di madrasah dan masyarakat, sangat rajin berdoa, sangat rajin memberi salam, sangat rajin mengikuti shalat berjamaah dan sangat pandai bersyukur', 'Sikapnya sangat baik dalam menghargai keluhuran nilai-nilai Pancasila sebagai pandangan hidup bangsa dengan selalu memperhatikan tata tertib madrasah, memiliki kejujuran baik, memiliki kedisiplinan sangat baik, memiliki tanggung jawab sangat baik, memiliki toleransi sangat baik, memiliki sikap gotong royong baik, memiliki kesantunan sangat baik dan memiliki kepercayaan diri yang sangat baik', '1', '1', '0', 'Jangan pernah bosan untuk terus belajar dan terus bersemangat untuk meraih cita-cita mu', NULL, 'LULUS', 'app/QR/PqOpg.png', '2024-08-09 10:18:45', '2024-08-10 09:38:15'),
('9cbb4479-7a33-4e0c-bde4-1f42ce871f7f', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'app/QR/CDLYQ.png', '2024-08-10 09:13:36', '2024-08-10 09:13:36'),
('9cbb48f7-4b27-4702-998d-f4689c341cb9', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'app/QR/56wUy.png', '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbef029-53f6-4dba-ad3b-6a0a50d2c5ca', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'app/QR/3Rfq3.png', '2024-08-12 05:01:09', '2024-08-12 05:01:09'),
('9cc2cca4-b2b7-4511-9618-403925a182a9', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'app/QR/QfEkC.png', '2024-08-14 03:05:09', '2024-08-14 03:05:09'),
('9cc2d31a-739a-4c28-aaeb-14fd983c870b', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'app/QR/gu9Md.png', '2024-08-14 03:23:13', '2024-08-14 03:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb__pengumuman`
--

CREATE TABLE `tb__pengumuman` (
  `id` char(36) NOT NULL,
  `id_tahun_ajar` char(36) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb__pengumuman`
--

INSERT INTO `tb__pengumuman` (`id`, `id_tahun_ajar`, `tanggal_mulai`, `tanggal_selesai`, `isi`, `created_at`, `updated_at`) VALUES
('9cbb4636-8086-418a-aaab-d1f911337552', '9ca9000b-3a20-41cc-aa4a-34e7d9ee7846', '2024-08-17', '2024-08-30', 'Tolong Segera Input Nilai Siswa', '2024-08-10 09:18:27', '2024-08-10 09:18:27'),
('9cbb4698-5ae0-46b9-bd42-29a651690c6d', '9ca90025-bcbe-4163-a04f-0b7b6752d63d', '2024-09-12', '2024-09-29', 'Tolong Segera Input Nilai Siswa Semester Genap', '2024-08-10 09:19:32', '2024-08-10 09:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb__pengumuman_detail`
--

CREATE TABLE `tb__pengumuman_detail` (
  `id` char(36) NOT NULL,
  `id_pengumuman` char(36) NOT NULL,
  `id_guru` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb__pengumuman_detail`
--

INSERT INTO `tb__pengumuman_detail` (`id`, `id_pengumuman`, `id_guru`, `created_at`, `updated_at`) VALUES
('9cbb4d9d-1180-466c-abcd-a9ef004763f6', '9cbb4698-5ae0-46b9-bd42-29a651690c6d', '9cb92623-4d96-467d-938c-d0ec35ab21fa', '2024-08-10 09:39:09', '2024-08-10 09:39:09'),
('9cbb4dac-bd01-43c7-ae06-2e494f874276', '9cbb4636-8086-418a-aaab-d1f911337552', '9cb92623-4d96-467d-938c-d0ec35ab21fa', '2024-08-10 09:39:19', '2024-08-10 09:39:19'),
('9cbb4eec-ac43-4698-b006-089a60bac474', '9cbb4698-5ae0-46b9-bd42-29a651690c6d', '9cb8f158-dea1-46c4-8d20-52f2123b39a1', '2024-08-10 09:42:49', '2024-08-10 09:42:49'),
('9cbb4ef5-c6b6-4c3b-9700-03169da827cd', '9cbb4636-8086-418a-aaab-d1f911337552', '9cb8f158-dea1-46c4-8d20-52f2123b39a1', '2024-08-10 09:42:55', '2024-08-10 09:42:55'),
('9cbb5037-09c2-4627-868f-d68fd0b2ba34', '9cbb4698-5ae0-46b9-bd42-29a651690c6d', '9cb8f205-8447-49eb-87ee-0b13346f6a64', '2024-08-10 09:46:26', '2024-08-10 09:46:26'),
('9cbb5041-8333-493a-b0b0-249eefd76c5b', '9cbb4636-8086-418a-aaab-d1f911337552', '9cb8f205-8447-49eb-87ee-0b13346f6a64', '2024-08-10 09:46:32', '2024-08-10 09:46:32'),
('9cbb512d-2cd4-49c5-9835-b43e37fd274a', '9cbb4698-5ae0-46b9-bd42-29a651690c6d', '9cb8fa5e-ee72-42dc-9f8b-9a67628ae355', '2024-08-10 09:49:07', '2024-08-10 09:49:07'),
('9cbb5135-7efb-4b0a-8d14-81399fbaa835', '9cbb4636-8086-418a-aaab-d1f911337552', '9cb8fa5e-ee72-42dc-9f8b-9a67628ae355', '2024-08-10 09:49:12', '2024-08-10 09:49:12');

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
('9cb95887-54ed-407e-988c-149514f28a14', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, NULL, '2024-08-09 10:18:01', '2024-08-09 10:18:01'),
('9cb958ca-ad14-4ee0-9432-33a8fbdeb850', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, NULL, '2024-08-09 10:18:45', '2024-08-09 10:18:45'),
('9cbb4479-8955-4846-b447-0a024dd55c67', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, NULL, '2024-08-10 09:13:36', '2024-08-10 09:13:36'),
('9cbb48f7-4d2f-45e8-aa2d-353163481691', '9cb9585a-6eb3-4cc3-9b22-77e0a87e942f', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, NULL, '2024-08-10 09:26:09', '2024-08-10 09:26:09'),
('9cbef029-57dc-4d0d-b83a-b6a615e67ae4', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, NULL, '2024-08-12 05:01:09', '2024-08-12 05:01:09'),
('9cc2cca4-beb4-4e13-a552-436d126198c0', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76bf6-5dc5-415e-b25f-06eb1b77451b', NULL, NULL, '2024-08-14 03:05:09', '2024-08-14 03:05:09'),
('9cc2d31a-79b4-4b3d-955a-7319e951beb8', '9cb95838-c84d-4c0f-bf4d-03ed3babbe28', '9cb95203-5253-4eaa-b068-b1a80417ba1b', '9ca76b58-70d5-4753-bdcb-5bce3f25ccc0', NULL, NULL, '2024-08-14 03:23:13', '2024-08-14 03:23:13');

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
('9ca9000b-3a20-41cc-aa4a-34e7d9ee7846', '2023', '2024', 'Ganjil', '2024-08-01 07:17:21', '2024-08-01 07:17:21'),
('9ca90025-bcbe-4163-a04f-0b7b6752d63d', '2023', '2024', 'Genap', '2024-08-01 07:17:38', '2024-08-01 07:17:38');

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
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_tahun_ajar` (`id_tahun_ajar`);

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
-- Indexes for table `ob`
--
ALTER TABLE `ob`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb__pengumuman`
--
ALTER TABLE `tb__pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb__pengumuman_detail`
--
ALTER TABLE `tb__pengumuman_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengumuman` (`id_pengumuman`),
  ADD KEY `id_guru` (`id_guru`);

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
