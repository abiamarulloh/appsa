-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Jun 2020 pada 16.27
-- Versi server: 10.2.32-MariaDB-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abiamaru_appsa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `name_app` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `name_school` varchar(250) DEFAULT NULL,
  `address_school` varchar(250) DEFAULT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `name_app`, `author`, `image`, `name_school`, `address_school`, `date`) VALUES
(1, 'APPSA', 'Abi Amarulloh', '03005226-8799-41d8-8f12-bb52ce612408_200x2001.png', 'SMK DEMO', 'Kawasan Bisnis CBD Ciledug, Jl. HOS Cokroaminoto No.29-35, RT.001/RW.001, Karang Tengah, Kec. Ciledug, Kota Tangerang, Banten 15157', 1589260478);

-- --------------------------------------------------------

--
-- Struktur dari tabel `date_graduation`
--

CREATE TABLE `date_graduation` (
  `id` int(11) NOT NULL,
  `name_graduation` varchar(200) NOT NULL,
  `date_graduation` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `haid`
--

CREATE TABLE `haid` (
  `id` int(11) NOT NULL,
  `nisn_tbl_murid` varchar(250) NOT NULL,
  `tanggal` date NOT NULL,
  `harike` varchar(250) NOT NULL,
  `waktu` varchar(11) NOT NULL,
  `date` int(11) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` int(11) NOT NULL,
  `singkatan_jurusan` varchar(250) NOT NULL,
  `nama_jurusan` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `singkatan_jurusan`, `nama_jurusan`, `status`) VALUES
(6, 1, 'TKJ', 'TEKNIK KOMPUTER DAN JARINGAN', 1),
(7, 2, 'AKL', 'AKUNTANSI KEUANGAN DAN KELEMBAGAAN', 1),
(8, 3, 'OTKP', 'Otomatisasi Teknologi', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_pdf`
--

CREATE TABLE `laporan_pdf` (
  `id` int(11) NOT NULL,
  `input_left` varchar(250) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_pdf`
--

INSERT INTO `laporan_pdf` (`id`, `input_left`, `date`) VALUES
(1, 'Developer', 1587305932);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `url` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `nama_menu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `menu_id`, `url`, `icon`, `nama_menu`) VALUES
(1, 1, 'dashboard', 'fas fa-fw fa-tachometer-alt', 'Dashboard'),
(2, 2, 'murid', 'fas fa-fw fa-user', 'Murid'),
(3, 3, 'haid', 'fab fa-fw fa-canadian-maple-leaf', 'Haid'),
(4, 4, 'poin_pelanggaran', 'fas fa-fw fa-gavel', 'Poin pelanggaran'),
(5, 5, 'users', 'fas fa-fw fa-chalkboard-teacher', 'Users'),
(6, 6, 'jurusan', 'fab fa-fw fa-black-tie', 'Jurusan'),
(8, 8, 'poin_prestasi', 'fas fa-trophy fa-fw', 'Poin prestasi'),
(10, 10, 'managemen_menu', 'fas fa-fw fa-bars', 'Management Menu'),
(12, 11, 'mutasi', 'fab fa-fw fa-buffer', 'Mutasi'),
(13, 12, 'upacara', 'fas fa-graduation-cap fa-fw', 'Upacara'),
(14, 13, 'about', 'fas fa-info fa-fw', 'About us'),
(15, 14, 'setting_pdf', 'fas fa-cog fa-fw', 'Setting Laporan PDF');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_role`
--

CREATE TABLE `menu_role` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_role`
--

INSERT INTO `menu_role` (`id`, `menu_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(8, 2, 4),
(9, 4, 4),
(10, 3, 2),
(11, 8, 1),
(12, 8, 4),
(16, 10, 1),
(20, 11, 1),
(21, 12, 1),
(22, 12, 2),
(23, 12, 4),
(24, 13, 1),
(25, 13, 4),
(26, 14, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid_poin_prestasi`
--

CREATE TABLE `murid_poin_prestasi` (
  `id` int(11) NOT NULL,
  `nisn_id` varchar(250) NOT NULL,
  `poin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `id` int(11) NOT NULL,
  `pelanggaran` varchar(250) NOT NULL,
  `pasal` varchar(250) NOT NULL,
  `poin` varchar(250) NOT NULL,
  `tindakan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poin`
--

INSERT INTO `poin` (`id`, `pelanggaran`, `pasal`, `poin`, `tindakan`) VALUES
(77, 'Mencuri', '1 ayat 1', '10', 'diperingatkan'),
(78, 'Buang Sampah Sembarangan', '1 ayat 2', '10', 'diperingatkan'),
(79, 'Narkoba', '2 ayat 2', '100', 'dikeluarkan'),
(80, 'menghamili / dihamili', '3 ayat 5', '100', 'di keluarkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin_prestasi`
--

CREATE TABLE `poin_prestasi` (
  `id` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `jenis_prestasi` varchar(250) NOT NULL,
  `warna_prestasi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poin_prestasi`
--

INSERT INTO `poin_prestasi` (`id`, `kode`, `jenis_prestasi`, `warna_prestasi`) VALUES
(1, 1, 'Prestasi akademik', 'bg-primary text-white'),
(2, 2, 'Prestasi non akademik', 'bg-success text-white'),
(3, 3, 'Kedisiplinan', 'bg-danger text-white'),
(4, 4, 'Keorganisasian', 'bg-info text-white');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role_id`, `role`) VALUES
(1, 1, 'admin'),
(2, 2, 'osis'),
(4, 4, 'walikelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_poin_prestasi`
--

CREATE TABLE `sub_poin_prestasi` (
  `id` int(11) NOT NULL,
  `kode_prestasi` varchar(250) NOT NULL,
  `sub_jenis_prestasi` varchar(250) NOT NULL,
  `poin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_poin_prestasi`
--

INSERT INTO `sub_poin_prestasi` (`id`, `kode_prestasi`, `sub_jenis_prestasi`, `poin`) VALUES
(13, '2', 'Lomba Programming', '20'),
(14, '2', 'Lompat Jauh', '5'),
(15, '1', 'Rangking 1', '5'),
(16, '1', 'rangking 2', '3'),
(17, '3', 'Selalu datang tepat waktu', '10'),
(18, '3', 'Buang sampah pada tempatnya', '15'),
(19, '4', 'OSIS', '10'),
(20, '4', 'Rohis', '20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_murid`
--

CREATE TABLE `tbl_murid` (
  `nisn_id` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `kelas` int(11) NOT NULL COMMENT 'jika 4 "lulus"',
  `jurusan` int(11) NOT NULL,
  `jk` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `date_graduation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_murid`
--

INSERT INTO `tbl_murid` (`nisn_id`, `nama`, `kelas`, `jurusan`, `jk`, `date`, `date_graduation`) VALUES
('00123192', 'Tony Mulyadi', 3, 2, 1, 1587009311, 0),
('001291921', 'Jodi Bray', 2, 2, 1, 1587009182, 0),
('00238712', 'Zilzian Tedy ', 3, 1, 1, 1587009253, 0),
('0120128', 'Fajrina ', 2, 1, 0, 1587009075, 0),
('02381231', 'Diki Wardiman', 3, 1, 1, 1587009205, 0),
('02392839', 'Abi amarulloh', 3, 1, 1, 1587009278, 0),
('0930112', 'Putri Rahmadini', 2, 2, 0, 1587009101, 0),
('3846128', 'Fahrezi Zainul', 2, 1, 1, 1587009119, 0),
('92371237', 'Irfan Zidy', 2, 2, 1, 1587009156, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_murid_poin`
--

CREATE TABLE `tbl_murid_poin` (
  `id` int(11) NOT NULL,
  `nisn_id` varchar(250) NOT NULL,
  `poin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `description` varchar(250) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role_id`, `nama`, `email`, `password`, `kelas_id`, `jurusan_id`, `description`, `date`) VALUES
(18, 1, 'Administrator', 'admin@gmail.com', '$2y$10$YXUaFyEc51bdpvA/6Dsowue3/T46lA94VMZaYw05o2QUX9LQUvNrK', 0, 0, 'Developer', 1586930933),
(19, 4, 'suwito', 'suwito@gmail.com', '$2y$10$Iwy..P1dgSCRSSnKYRmroeVrurjsQ1kril6hoVzF0Y7.MamWMKdhK', 1, 1, 'Walikelas', 1587304475),
(20, 1, 'Fachri Hawari', 'fachri@gmail.com', '$2y$10$D7wLOsWZXK4FrsLMt69TL.RgTYnX6kQ9cLb4jYiytYseabHlN4Wj.', NULL, NULL, 'Wakil Kesiswaan', 1587009565),
(21, 4, 'Miftahul Khoeriyah', 'miftah@gmail.com', '$2y$10$9hpseYEhPsM5VJeMfWN8tO6vB30JEZlD6VCfdbweKkW3gbgXf7Fay', 1, 2, 'Walikelas', 1587009616),
(22, 4, 'Anjar Ox', 'anjar@gmail.com', '$2y$10$z.vP49J9Yor/IO/sc1J5eeqtHjlOaf.XCvHcMnSd6c/qYgwgV.wia', 2, 1, 'Walikelas', 1587009799),
(24, 4, 'muchlis', 'muchlis@gmail.com', '$2y$10$iXcuSoJ1FCEckjDsz84KQuG8iEQVdNFledWLmHtf9MU2vGtBGAcru', 2, 2, 'Walikelas', 1587009929),
(25, 4, 'Fariz', 'fariz@gmail.com', '$2y$10$Ea.S4sl.c/xnV4.13KqWLO95B9NprPSEiPXrb0w3DbCTma9sb2CZy', 3, 1, 'Walikelas', 1587010168),
(26, 4, 'edo', 'edo@gmail.com', '$2y$10$PLcqZS/6/bi3.NTTX8kEoeSdiBmkLykIBBYvGUqi6w19yGLSOIEjS', NULL, NULL, 'Walikelas', 1587012603);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `date_graduation`
--
ALTER TABLE `date_graduation`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `haid`
--
ALTER TABLE `haid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn_tbl_murid` (`nisn_tbl_murid`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_pdf`
--
ALTER TABLE `laporan_pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `murid_poin_prestasi`
--
ALTER TABLE `murid_poin_prestasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn_id` (`nisn_id`);

--
-- Indeks untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `poin_prestasi`
--
ALTER TABLE `poin_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_poin_prestasi`
--
ALTER TABLE `sub_poin_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_murid`
--
ALTER TABLE `tbl_murid`
  ADD PRIMARY KEY (`nisn_id`);

--
-- Indeks untuk tabel `tbl_murid_poin`
--
ALTER TABLE `tbl_murid_poin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn_id` (`nisn_id`),
  ADD KEY `nisn_id_2` (`nisn_id`),
  ADD KEY `nisn_id_3` (`nisn_id`),
  ADD KEY `nisn_id_4` (`nisn_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `date_graduation`
--
ALTER TABLE `date_graduation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `haid`
--
ALTER TABLE `haid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `laporan_pdf`
--
ALTER TABLE `laporan_pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `murid_poin_prestasi`
--
ALTER TABLE `murid_poin_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `poin`
--
ALTER TABLE `poin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `poin_prestasi`
--
ALTER TABLE `poin_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_poin_prestasi`
--
ALTER TABLE `sub_poin_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_murid_poin`
--
ALTER TABLE `tbl_murid_poin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `haid`
--
ALTER TABLE `haid`
  ADD CONSTRAINT `haid_ibfk_1` FOREIGN KEY (`nisn_tbl_murid`) REFERENCES `tbl_murid` (`nisn_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `murid_poin_prestasi`
--
ALTER TABLE `murid_poin_prestasi`
  ADD CONSTRAINT `murid_poin_prestasi_ibfk_1` FOREIGN KEY (`nisn_id`) REFERENCES `tbl_murid` (`nisn_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_murid_poin`
--
ALTER TABLE `tbl_murid_poin`
  ADD CONSTRAINT `tbl_murid_poin_ibfk_1` FOREIGN KEY (`nisn_id`) REFERENCES `tbl_murid` (`nisn_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
