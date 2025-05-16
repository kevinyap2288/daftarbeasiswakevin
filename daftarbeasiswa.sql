-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 03:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daftarbeasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id_log`, `id_user`, `username`, `action`, `ip_address`, `timestamp`) VALUES
(332, 4, 'test', 'User login', '::1', '2025-04-13 10:17:08'),
(333, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-13 10:17:09'),
(334, 4, 'test', 'User logout', '::1', '2025-04-13 10:17:12'),
(335, 4, 'test', 'User login', '::1', '2025-04-13 10:19:55'),
(336, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-13 10:19:56'),
(337, 4, 'test', 'User logout', '::1', '2025-04-13 10:30:26'),
(338, 4, 'test', 'User login', '::1', '2025-04-13 20:15:39'),
(339, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-13 20:15:41'),
(340, 4, 'test', 'User logout', '::1', '2025-04-13 20:35:09'),
(341, 4, 'test', 'User login', '::1', '2025-04-13 20:56:12'),
(342, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-13 20:56:13'),
(343, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-13 20:56:43'),
(344, 4, 'test', 'User logout', '::1', '2025-04-13 21:02:20'),
(345, 4, 'test', 'User login', '::1', '2025-04-13 21:03:57'),
(346, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-13 21:03:59'),
(347, 4, 'test', 'User logout', '::1', '2025-04-13 21:14:38'),
(348, 4, 'test', 'User login', '::1', '2025-04-13 21:15:41'),
(349, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-13 21:15:43'),
(350, 4, 'test', 'User logout', '::1', '2025-04-13 21:27:01'),
(351, 4, 'test', 'User login', '::1', '2025-04-15 02:31:43'),
(352, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-15 02:31:48'),
(353, 4, 'test', 'User login', '::1', '2025-04-15 21:16:56'),
(354, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-15 21:17:00'),
(355, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-15 21:17:11'),
(356, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-15 21:18:04'),
(357, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-15 21:40:50'),
(358, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-15 21:40:57'),
(359, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-15 21:42:04'),
(360, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-15 21:43:54'),
(361, 4, 'test', 'User logout', '::1', '2025-04-15 21:56:07'),
(362, 4, 'test', 'User login', '::1', '2025-04-16 21:27:25'),
(363, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-16 21:27:27'),
(364, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-16 21:27:53'),
(365, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-16 21:29:01'),
(366, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-16 21:29:08'),
(367, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-16 21:30:55'),
(368, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-16 21:36:00'),
(369, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-16 21:36:17'),
(370, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-16 21:39:41'),
(371, 4, 'test', 'User login', '::1', '2025-04-17 10:20:22'),
(372, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-17 10:20:23'),
(373, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-17 10:25:18'),
(374, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-17 10:54:20'),
(375, 4, 'test', 'User logout', '::1', '2025-04-17 11:18:12'),
(376, 4, 'test', 'User login', '::1', '2025-04-17 11:48:44'),
(377, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-17 11:48:44'),
(378, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-17 11:48:48'),
(379, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-17 11:48:52'),
(380, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-17 11:54:21'),
(381, 4, 'test', 'User login', '::1', '2025-04-18 09:21:12'),
(382, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-18 09:21:13'),
(383, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-18 09:21:18'),
(384, 4, 'test', 'User logout', '::1', '2025-04-18 09:35:21'),
(385, 4, 'test', 'User login', '::1', '2025-04-18 10:00:38'),
(386, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-18 10:00:39'),
(387, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-18 10:11:30'),
(388, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-18 10:15:48'),
(389, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-18 10:24:40'),
(390, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-18 10:25:21'),
(391, 4, 'test', 'User logout', '::1', '2025-04-18 10:37:21'),
(392, 4, 'test', 'User login', '::1', '2025-04-18 10:40:12'),
(393, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-18 10:40:13'),
(394, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-18 10:40:37'),
(395, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-18 10:41:38'),
(396, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-18 10:51:08'),
(397, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-18 10:57:48'),
(398, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-18 11:00:01'),
(399, 4, 'test', 'User logout', '::1', '2025-04-18 11:16:31'),
(400, 4, 'test', 'User login', '::1', '2025-04-19 11:28:13'),
(401, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-19 11:28:17'),
(402, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 11:28:32'),
(403, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 11:28:38'),
(404, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 11:30:46'),
(405, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 11:32:35'),
(406, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 11:41:39'),
(407, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 11:43:02'),
(408, 4, 'test', 'User logout', '::1', '2025-04-19 12:00:36'),
(409, 4, 'test', 'User login', '::1', '2025-04-19 12:04:17'),
(410, 4, 'test', 'User login', '::1', '2025-04-19 12:04:20'),
(411, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-19 12:04:22'),
(412, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 12:04:29'),
(413, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 12:04:36'),
(414, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 12:05:01'),
(415, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 12:08:01'),
(416, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 12:08:08'),
(417, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 12:08:39'),
(418, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 12:09:09'),
(419, 4, 'test', 'User logout', '::1', '2025-04-19 12:21:57'),
(420, 4, 'test', 'User login', '::1', '2025-04-19 12:27:09'),
(421, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-19 12:27:13'),
(422, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 12:27:41'),
(423, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 12:28:06'),
(424, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 12:34:19'),
(425, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 12:34:40'),
(426, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 12:37:29'),
(427, 4, 'test', 'User logout', '::1', '2025-04-19 12:47:49'),
(428, 4, 'test', 'User login', '::1', '2025-04-19 12:49:31'),
(429, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-19 12:49:34'),
(430, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-19 12:49:43'),
(431, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-20 00:51:10'),
(432, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-20 00:51:59'),
(433, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-20 00:56:39'),
(434, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 12:56:46'),
(435, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 13:11:01'),
(436, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-20 01:12:34'),
(437, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-19 13:13:11'),
(438, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-20 01:13:36'),
(439, 4, 'test', 'User logout', '::1', '2025-04-19 13:33:49'),
(440, 4, 'test', 'User login', '::1', '2025-04-19 13:46:29'),
(441, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-19 13:46:31'),
(442, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-19 13:47:21'),
(443, 4, 'test', 'User login', '::1', '2025-04-20 05:38:04'),
(444, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-20 05:38:05'),
(445, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-20 05:45:36'),
(446, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-20 05:46:49'),
(447, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-20 05:58:02'),
(448, 4, 'test', 'User logout', '::1', '2025-04-20 06:48:49'),
(449, 4, 'test', 'User login', '::1', '2025-04-20 06:49:45'),
(450, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-20 06:49:45'),
(451, 4, 'test', 'User logout', '::1', '2025-04-20 07:00:59'),
(452, 4, 'test', 'User login', '::1', '2025-04-20 07:02:57'),
(453, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-20 07:02:59'),
(454, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-20 07:13:22'),
(455, 4, 'test', 'User logout', '::1', '2025-04-20 07:23:38'),
(456, 3, 'tes', 'User login', '::1', '2025-04-20 08:10:24'),
(457, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-20 08:10:25'),
(458, 3, 'tes', 'User mengakses pendaftaran', '::1', '2025-04-20 20:10:29'),
(459, 3, 'tes', 'User mengakses pendaftaran', '::1', '2025-04-20 20:10:40'),
(460, 3, 'tes', 'User melakukan pendaftaran', '::1', '2025-04-20 08:10:43'),
(461, 3, 'tes', 'User mengakses pendaftaran', '::1', '2025-04-20 20:10:57'),
(462, 3, 'tes', 'User mengakses pendaftaran', '::1', '2025-04-20 20:37:19'),
(463, 3, 'tes', 'User melakukan pendaftaran', '::1', '2025-04-20 08:37:22'),
(464, 3, 'tes', 'User mengakses pendaftaran', '::1', '2025-04-20 20:37:39'),
(465, 3, 'tes', 'User melihat Logs', '::1', '2025-04-20 08:40:55'),
(466, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-20 08:41:41'),
(467, 3, 'tes', 'User mengakses pendaftaran', '::1', '2025-04-20 20:41:46'),
(468, 3, 'tes', 'User mengakses pendaftaran', '::1', '2025-04-20 20:54:27'),
(469, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-20 08:54:35'),
(470, 3, 'tes', 'User logout', '::1', '2025-04-20 08:54:40'),
(471, 4, 'test', 'User login', '::1', '2025-04-20 11:23:14'),
(472, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-20 11:23:15'),
(473, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-20 23:24:32'),
(474, 4, 'test', 'User melakukan pendaftaran', '::1', '2025-04-20 11:24:53'),
(475, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-20 23:25:15'),
(476, 4, 'test', 'User melihat riwayat pendaftaran', '::1', '2025-04-20 11:25:20'),
(477, 4, 'test', 'User logout', '::1', '2025-04-20 11:26:02'),
(478, 3, 'tes', 'User login', '::1', '2025-04-20 11:26:10'),
(479, 3, 'tes', 'User login', '::1', '2025-04-20 11:26:10'),
(480, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-20 11:26:11'),
(481, 3, 'tes', 'User melihat riwayat pendaftaran', '::1', '2025-04-20 11:26:15'),
(482, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-20 11:26:25'),
(483, 26, 'Atrocitext', 'User  terdaftar dengan nama: Atrocitext', '::1', '2025-04-21 11:23:56'),
(484, 3, 'tes', 'User login', '::1', '2025-04-21 11:25:20'),
(485, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-21 11:25:20'),
(486, 3, 'tes', 'User mengakses pendaftaran', '::1', '2025-04-21 23:25:45'),
(487, 3, 'tes', 'User melakukan pendaftaran', '::1', '2025-04-21 11:26:05'),
(488, 3, 'tes', 'User mengakses pendaftaran', '::1', '2025-04-21 23:26:51'),
(489, 3, 'tes', 'User melihat riwayat pendaftaran', '::1', '2025-04-21 11:26:55'),
(490, 3, 'tes', 'User melihat Logs', '::1', '2025-04-21 11:27:16'),
(491, 3, 'tes', 'User mengakses dashboard', '::1', '2025-04-21 11:27:31'),
(492, 3, 'tes', 'User logout', '::1', '2025-04-21 11:27:44'),
(493, 4, 'test', 'User login', '::1', '2025-04-21 11:27:55'),
(494, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-21 11:27:56'),
(495, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-21 11:28:14'),
(496, 4, 'test', 'User melihat Logs', '::1', '2025-04-21 11:28:22'),
(497, 4, 'test', 'User melihat Logs', '::1', '2025-04-21 11:28:34'),
(498, 4, 'test', 'User melihat Logs', '::1', '2025-04-21 11:28:41'),
(499, 4, 'test', 'User melihat riwayat pendaftaran', '::1', '2025-04-21 11:28:48'),
(500, 4, 'test', 'User melihat riwayat pendaftaran', '::1', '2025-04-21 11:29:11'),
(501, 4, 'test', 'User melihat riwayat pendaftaran', '::1', '2025-04-21 11:29:21'),
(502, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-21 11:29:27'),
(503, 4, 'test', 'User logout', '::1', '2025-04-21 11:29:32'),
(504, 26, 'Atrocitext', 'User login', '::1', '2025-04-21 11:30:59'),
(505, 26, 'Atrocitext', 'User mengakses dashboard', '::1', '2025-04-21 11:30:59'),
(506, 26, 'Atrocitext', 'User logout', '::1', '2025-04-21 11:31:06'),
(507, 4, 'test', 'User login', '::1', '2025-04-21 12:38:09'),
(508, 4, 'test', 'User mengakses dashboard', '::1', '2025-04-21 12:38:12'),
(509, 4, 'test', 'User melihat riwayat pendaftaran', '::1', '2025-04-21 12:39:26'),
(510, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-22 00:39:32'),
(511, 4, 'test', 'User mengakses table User', '::1', '2025-04-21 12:42:28'),
(512, 4, 'test', 'User melihat Logs', '::1', '2025-04-21 12:45:25'),
(513, 4, 'test', 'User mengakses pendaftaran', '::1', '2025-04-22 00:45:37'),
(514, 4, 'test', 'User melihat riwayat pendaftaran', '::1', '2025-04-21 12:45:41'),
(515, 4, 'test', 'User mengakses table User', '::1', '2025-04-21 12:45:44'),
(516, 4, 'test', 'User logout', '::1', '2025-04-21 12:49:25'),
(517, 25, 'test0', 'User login', '::1', '2025-04-21 12:49:41'),
(518, 25, 'test0', 'User mengakses dashboard', '::1', '2025-04-21 12:49:45'),
(519, 25, 'test0', 'User mengakses table Restore User', '::1', '2025-04-21 12:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `tipe_beasiswa` enum('Beasiswa Akademik','Beasiswa Non-Akademik','Beasiswa Lain') DEFAULT NULL,
  `tanggal_buka` date DEFAULT NULL,
  `tanggal_tutup` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `tipe_beasiswa`, `tanggal_buka`, `tanggal_tutup`) VALUES
(1, 'Beasiswa Akademik', '2025-04-18', '2025-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `jurusan` enum('Teknik Informatika','Teknik Mesin','Akuntansi','Teknologi Informasi','Kedokteran Umum','Pendidikan Guru Sekolah Dasar','Pendidikan Matematika') DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nik`, `jurusan`, `id_user`) VALUES
(1, 'test', '1000021', 'Akuntansi', 1),
(2, 'test2', '1000028', 'Kedokteran Umum', 1),
(3, 'test54', '100002022', 'Pendidikan Guru Sekolah Dasar', 1),
(4, 'Atrocitext', '10000247', 'Akuntansi', 1),
(5, 'test232432', '1000021111', 'Teknik Informatika', 1),
(6, 'kevin1', '1000028222', 'Akuntansi', NULL),
(7, 'test1112122323', '1000020311313', NULL, 3),
(8, 'James', '100000092', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, '13323@gmail.com', '11076f58119218ab4a6b5d0c8de9534bb4b2c5d5280ad061332fd7793fd6f4331ca3844d6ca4a32cf3eb3fd3cff264e63054', '2025-04-02 03:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_beasiswa` int(11) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `nilai_ipk` varchar(255) DEFAULT NULL,
  `bukti_ipk` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_beasiswa`, `id_mahasiswa`, `tanggal_daftar`, `nilai_ipk`, `bukti_ipk`, `status`, `keterangan`) VALUES
(1, 1, 1, '2025-04-19', NULL, '1745080242_6a3fe6b0d62ab921f68f.jpg', '', NULL),
(2, 1, 1, '2025-04-19', NULL, '1745080978_f91a5d46b09f148f35d1.jpg', '', NULL),
(3, 1, 2, '2025-04-19', '3.4', '1745082297_75637834917eab6d4e3c.jpg', 'Diterima', NULL),
(4, 1, 3, '2025-04-19', '3.6', '1745082545_9cea6a9d2c2f54b7cbc6.jpg', 'Ditolak', NULL),
(5, 1, 4, '2025-04-19', '3.6', '1745084245_aa82059f5dbfe05c0458.jpg', 'Sedang Diajukan', NULL),
(6, 1, 5, '2025-04-19', '3.6', '1745086415_1641ac7c761b8fdc9eb3.jpg', 'Sedang Diajukan', NULL),
(7, 1, 6, '2025-04-20', '3.6', '1745154656_77bc92b52df31d8bbe01.jpg', 'Sedang Diajukan', NULL),
(8, 1, 7, '2025-04-20', '3.64', '1745156258_78214bb12c05dc0df8f8.jpg', 'Diterima', NULL),
(9, 1, 8, '2025-04-21', '3.64', '1745252811_3ffda00f28803e3bd7aa.jpg', 'Ditolak', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_app`
--

CREATE TABLE `pengaturan_app` (
  `id_pengaturan` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `logo` varchar(255) DEFAULT 'assets/img/default-logo.png',
  `logo_web` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan_app`
--

INSERT INTO `pengaturan_app` (`id_pengaturan`, `judul`, `logo`, `logo_web`) VALUES
(1, 'Pendaftaran Beasiswa', '1743759745_a7c078eb8db759f99009.png', '1743759829_e97215254eb0005146ad.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('0','1','2') NOT NULL DEFAULT '2',
  `delete_status` enum('0','1') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `nama`, `email`, `password`, `level`, `delete_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 'tes', 'tes@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-04-07 08:55:17', NULL),
(4, 'test', 'tes@gm', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(5, 'awg', 'aw@gmail', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(7, 'hey', 'hey@gmail.com', '202cb962ac59075b964b07152d234b70', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(8, 'res', 'res@gmail', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(9, 'Farsya', 'farsya@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(10, 'tess', 'tess@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(13, 'Sapi Bakar', 'sapi@gmail', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-04-05 16:42:57', NULL),
(18, 'beh', 'beh@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(19, 'rawr', 'rawr@gmail', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(20, 'wakakaf', 'wakaka@gmail', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(22, 'dwa', 'sd@g', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(23, 'wawa', 'wawa@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(25, 'test0', 'teo10@co.6', 'c4ca4238a0b923820dcc509a6f75849b', '0', '0', '2025-03-31 13:51:22', NULL, '2025-03-31 13:51:22', NULL),
(26, 'Atrocitext', 'atreum9@gmail.com', '6d1d06f775e9421c3617c20b8f4b6461', '1', '0', '2025-03-31 13:51:22', NULL, '2025-04-21 16:30:49', NULL),
(27, 'a', 'a@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1', '1', '2025-03-31 13:51:22', NULL, '2025-04-06 17:57:55', NULL),
(28, 'test11', 'abc@gmail.com', '1492c0f80ac57b167e0794e4d1624a80', '1', '0', '2025-04-06 20:27:54', 1, '2025-04-07 08:50:52', 1),
(31, 'username', 'kevin2288oof@gmail.com', 'c17ffb399b49fcc1f88d6e03f750771a', '2', '0', '2025-04-06 20:51:10', 1, '2025-04-07 09:03:39', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nama_mahasiswa` (`nama_mahasiswa`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `pengaturan_app`
--
ALTER TABLE `pengaturan_app`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id_beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengaturan_app`
--
ALTER TABLE `pengaturan_app`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
