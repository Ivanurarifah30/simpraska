-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2024 pada 06.48
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpraska`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nar` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `npm` varchar(50) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nar`, `nama`, `ttl`, `alamat`, `npm`, `fakultas`, `jurusan`, `no_telp`, `status`, `keterangan`, `foto`) VALUES
(4, 'NAR.001.375.12.PENA', 'Muhammad Heri Ramadhan', 'Banjarmasin, 18 Maret 1989', 'Jalan Handil Bakti Rt.006 Rw.000', '-', 'FKIP', 'Bimbingan dan Konseling', '082250202606', '', 'Bekerja', 'male.png'),
(5, 'NAR.002.376.12.PENA', 'Elva Febri Erendra, S.Pd', 'Lokbuntar, 03 Februari 1992', 'Desa Lokbuntar', '10.21.0006', 'FKIP ', 'Bimbingan dan Konseling', '085346550625', 'tidak aktif', 'Bekerja', 'female.png'),
(6, 'NAR.003.375.12.PENA', 'Arif Nur Budiman', 'Magelang, 03 Maret 1987', 'Tabalong', '09.22.0297', 'FKIP', 'Bimbingan dan Konseling', '085248779948', 'tidak aktif', 'Bekerja', 'male.png'),
(7, 'NAR.084.376.21.AR', 'Eka Widya Astuti, S.Pd', 'Pulau Sawangi, 28 Mei 1992', 'Jln,Pulau Sewangi Rt.01, Batola', '10.21.0014', 'FKIP ', 'Bahasa Inggris', '081545068950', 'tidak aktif', 'Bekerja', 'female.png'),
(8, 'NAR.008.375.14.APOR', 'Ahmad Subeki', 'Kandangan, 18 April 1992', 'Desa Beringin, Kec, Alalak', '11.22.0366', 'FKIP', 'Bimbingan dan Konseling', '082353361585', 'tidak aktif', 'Bekerja', 'male.png'),
(9, 'NAR.009.376.14.APOR', 'Nida Wati', 'Pasit Kaltim, 09 Februari 1995', 'Jln, Kelayan A II Gg, Kenari', '13.22.0073', 'FKIP', 'Bimbingan dan Konseling', '0895413694879', 'tidak aktif', 'Bekerja', 'female.png'),
(10, 'NAR.010.375.14.APOR', 'Ganang Prasetyo', 'Kulon Progo, 28 Agustus 1995', 'Batu Mandi, Balangan', '13.63.0337', 'Teknologi Informasi', 'Teknik Informatika', '082255921575', '', 'Bekerja', 'male.png'),
(11, 'NAR.079.375.21.AR', 'Muhammad Jayadi', 'Anjir  Muara, 13 Juli 2003', 'Sepakat Bersama', '2005020101', 'FSI', 'Ekonomi Syariah', '085753155017', 'aktif', 'kuliah', 'male.png'),
(12, 'NAR.080.376.21.AR', 'Putri Purnama Sari', 'Terusan Karya, 05 Agustus 2001', 'Terusan Raya', '2007010175', 'FKM', 'Kesehatan Masyarakat', '081257958909', 'aktif', 'kuliah', 'female.png'),
(13, 'NAR.081.375.21.AR', 'Syukur Prasetiyo', 'Tanjung Balai Karimun, 19 Januari 2002', 'Desa Pandan Sari', '2008010055', 'FH', 'Ilmu Hukum', '085245469738', 'tidak aktif', 'kuliah', 'male.png'),
(14, 'NAR.084.376.21.AR', 'Iva Nur Arifah', 'Demak, 30 Agustus 2002', 'Lamandau, Kalimantan Tengah', '2010010056', 'Teknologi Informasi', 'Teknik Informatika', '082253217390', 'aktif', 'kuliah', 'iva.png'),
(15, 'NAR.096.376.22.AR', 'Heriyanti Tri Wulandari', 'Paringin, 13 Juli 2003', 'Gunung Pandau, Parigin', '2101010178', 'FISIP', 'Ilmu Komunikasi', '083150592934', 'aktif', 'kuliah', 'IMG_1243.PNG'),
(16, 'NAR.055.375.19.AR', 'Aditya Darma Putra, S.Km', 'Banjarmasin, 24 Mei 2001', 'Komp. Mantui Raya N0.239', '18070275', 'FKM', 'Kesehatan Masyarakat', '087842022078', 'tidak aktif', 'Lulus Kuliah', 'male.png'),
(17, 'NAR.062.376.19.AR', 'Maysarah', 'Katingan, 20 September 1999', 'Jln.Keruing Indah Batola', '18520037', 'FSI', 'PGMI', '-', 'tidak aktif', 'Bekerja', 'female.png'),
(18, 'NAR.066.376.20.AR', 'Nurlaila Sofia Aziza, S.Km', 'Banjarmasin 09 Desember 2009', 'Jl. Manarap Tengah', '19070049', 'FKM', 'Kesehatan Masyarakat', '-', 'tidak aktif', 'Bekerja', 'female.png'),
(19, 'NAR.101.376.22.AR', 'Dina Mariana', 'Kotabaru, 11 November 2002', 'Batu Licin', '2101020152', 'FISIP', 'Administrasi Publik', '081257709917', 'aktif', 'kuliah', 'DINA.png'),
(20, 'NAR.001.375.12.PENA', 'Syukur Prasetiyo', 'Kotabaru, 11 November 2002', 'Jalan Handil Bakti Rt.006 Rw.000', '2010010056', 'FKIP', 'PGMI', '085346550625', 'aktif', 'kuliah', 'male.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_arsipan`
--

CREATE TABLE `tb_arsipan` (
  `id_data` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `kategori` enum('Surat-surat','Arsipan Lainnya','') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `upload_file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_arsipan`
--

INSERT INTO `tb_arsipan` (`id_data`, `nama_file`, `tahun`, `kategori`, `keterangan`, `upload_file`) VALUES
(2, 'Permohonan Penerbitan Surat Keputusan', '2022', 'Arsipan Lainnya', '-', '001. Surat permohonan SK Dewan Pengurus (4).docx'),
(3, 'SK DEWAN', '2022', 'Surat-surat', 'SK', 'Sk Pramuka.pdf'),
(4, 'birokrasi kampus', '2022', 'Arsipan Lainnya', 'Materi', 'Birokrasi Kampus.pptx'),
(5, 'ART', '2022', 'Arsipan Lainnya', 'MUSRA VIII', 'ART (Anggaran Rumah Tangga) Musra VIII.pdf'),
(6, 'AD', '2022', 'Arsipan Lainnya', 'MUSRA VIII', 'AD (Anggaran Dasar) Musra VIII.pdf'),
(7, 'GBHR Pramuka Uniska', '2022', 'Arsipan Lainnya', 'MUSRA VIII', 'GBHR Musra VIII.pdf'),
(8, 'Dinamika Kelompok', '2022', 'Arsipan Lainnya', 'Materi', 'ppt dinamika kelompok.pptx'),
(9, 'Jukran Gugug Depan', '2021', 'Arsipan Lainnya', 'Materi', 'JUKRAN GUDEP.pdf'),
(10, 'SYARAT KECAKAPAN KHUSUS PRAMUKA PENEGAK DAN PANDEGA', '2022', 'Arsipan Lainnya', 'skk', 'SYARAT KECAKAPAN KHUSUS PRAMUKA PENEGAK DAN PANDEGA.docx'),
(11, 'Format Berita Acara', '2021', 'Arsipan Lainnya', 'Berita Acara', 'BERITA ACARA.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_danakas`
--

CREATE TABLE `tb_danakas` (
  `id_kas` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_transaksi` enum('Pemasukan','Pengeluaran','','') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `saldo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_danakas`
--

INSERT INTO `tb_danakas` (`id_kas`, `tgl_transaksi`, `jenis_transaksi`, `keterangan`, `jumlah`, `saldo`) VALUES
(1, '2023-11-20', 'Pemasukan', 'Kas masuk demisioner', 5836, 5836),
(2, '2024-01-03', 'Pengeluaran', 'Perbaikan Printer', 100, 5736),
(3, '2024-01-31', 'Pemasukan', 'Kas masuk Rektorat', 6000, 11736),
(4, '2024-02-08', 'Pengeluaran', 'Kas keluar reka kerja PBK', 4620, 7116),
(5, '2024-03-06', 'Pengeluaran', 'Pembelian bagde racana dan bagde Uniska', 430, 6686),
(6, '2024-04-04', 'Pengeluaran', 'Pembelian kertas buffalo F4', 30, 6656),
(7, '2024-05-30', 'Pengeluaran', 'Kas keluar reka kerja USCC', 1500, 5156),
(8, '2024-06-21', 'Pengeluaran', 'Pembayaran kegiatan night discussion', 313, 4843),
(9, '2024-08-01', 'Pemasukan', 'Pengembalian kas sisa reka kerja USCC', 5651, 10494),
(10, '2024-08-03', 'Pemasukan', 'Kas masuk rektorat', 6000, 16494),
(11, '2024-08-12', 'Pengeluaran', 'Pembelian tenda posko', 12000, 4494),
(12, '2024-08-06', 'Pemasukan', 'Kas Masuk Dana Rektor', 6500, 10994);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_inventaris`
--

CREATE TABLE `tb_inventaris` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `kondisi` enum('Baik','Sedang','Rusak') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_pengecekan` date NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_inventaris`
--

INSERT INTO `tb_inventaris` (`id_barang`, `nama_barang`, `jumlah`, `kondisi`, `keterangan`, `tgl_pengecekan`, `foto`) VALUES
(2, 'Laptop', '1', 'Baik', 'Ada', '2024-06-06', 'advan-stylus-360_.webp'),
(3, 'Box Plastik', '5', 'Sedang', 'Ada', '2024-06-12', 'container-box-30-transparan-soft-ungu-polos.jpg'),
(4, 'Kipas Angin', '2', 'Baik', 'Ada', '2024-06-27', '2bfcf1d2-4fc1-4fe6-99f7-3987cb668b2c.jpg'),
(5, 'Lemari Besi', '1', 'Baik', 'Ada', '2024-07-12', '2bfcf1d2-4fc1-4fe6-99f7-3987cb668b2c.jpg'),
(6, 'Printer', '1', 'Baik', 'Ada', '2024-07-13', '2bfcf1d2-4fc1-4fe6-99f7-3987cb668b2c.jpg'),
(7, 'Plakat', '27', 'Baik', 'Ada', '2024-07-18', '2bfcf1d2-4fc1-4fe6-99f7-3987cb668b2c.jpg'),
(8, 'Tenda Besi', '1', 'Baik', 'Ada', '2024-07-26', '2bfcf1d2-4fc1-4fe6-99f7-3987cb668b2c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kdr`
--

CREATE TABLE `tb_kdr` (
  `id_kdr` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` enum('KDR Putra','KDR Putri') NOT NULL,
  `periode` varchar(100) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kdr`
--

INSERT INTO `tb_kdr` (`id_kdr`, `id_anggota`, `nama`, `jabatan`, `periode`, `foto`) VALUES
(2, 14, 'Iva Nur Arifah', 'KDR Putri', '2022/2023', 'iva.png'),
(3, 13, 'Syukur Prasetiyo', 'KDR Putra', '2022/2023', 'male.png'),
(4, 11, 'Muhammad Jayadi', 'KDR Putra', '2023/2024', 'female.png'),
(5, 19, 'Di', 'KDR Putri', '2023/2024', 'DINA.png'),
(6, 16, 'Aditya Darma Putra, S.Km', 'KDR Putra', '2020-2021', 'male.png'),
(7, 18, 'Nurlaila Sofia Aziza, S.Km', 'KDR Putri', '2021/2022', 'female.png'),
(8, 17, 'Maysarah, S.Pd', 'KDR Putri', '2020/2021', 'female.png'),
(9, 9, 'Nida Wati', 'KDR Putri', '2017-2018', 'female.png'),
(10, 10, 'Ganang Prasetyo', 'KDR Putra', '2017-2018', 'male.png'),
(11, 6, 'Arif Nur Budiman', 'KDR Putra', '2014-2015', 'male.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lpj`
--

CREATE TABLE `tb_lpj` (
  `id_lpj` int(11) NOT NULL,
  `id_proker` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `kategori` enum('LPJ_Kegiatan','LPJ_pengurus') NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `upload_lpj` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lpj`
--

INSERT INTO `tb_lpj` (`id_lpj`, `id_proker`, `nama_kegiatan`, `tahun`, `kategori`, `keterangan`, `upload_lpj`) VALUES
(11, 13, 'Uniska Scout Creative Competition', '2022', 'LPJ_Kegiatan', '-', '66c167481eebd.pdf'),
(12, 11, 'Unit Kajian Kepramukaan', '2022-2023', 'LPJ_pengurus', 'LPJ Proker selama 1 periode', '66c16789ccdd3.pdf'),
(13, 14, 'Pengembaraan Bakti Kader', '2022', 'LPJ_Kegiatan', '-', '66c167b448a2f.pdf'),
(14, 10, 'Unit Pramuka Peduli', '2022-2023', 'LPJ_pengurus', 'LPJ Proker selama 1 periode', '66c167e34df02.pdf'),
(15, 12, 'Unit Protokol', '2022-2023', 'LPJ_pengurus', 'LPJ Proker selama 1 periode', '66c16818a3242.pdf'),
(16, 15, 'Kemah Orientasi Dasar XI', '2022', 'LPJ_Kegiatan', '-', '66c1d521e1334.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembina`
--

CREATE TABLE `tb_pembina` (
  `id_pembina` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` enum('Majelis Pembimbing Gugusdepan','Pembina Gugusdepan Putera','Pembina Gugusdepan Puteri') NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pembina`
--

INSERT INTO `tb_pembina` (`id_pembina`, `nip`, `nama`, `status`, `jabatan`, `no_telp`, `foto`) VALUES
(1, 'NIK. 060 105 197', 'Prof. Ir. Abd. Malik, S.Pt., M.Si., Ph.D, IPU, ASEAN Eng', 'Majelis Pembimbing Gugusdepan', 'Ketua', '08xxx', 'download (1).jfif'),
(2, 'NIK. 060611530', 'H. Idzani Muttaqin, ST., MT.', 'Majelis Pembimbing Gugusdepan', 'Wakil Ketua', '08115137600', ''),
(3, 'NIK', 'Dr. Muhammad Yuliansyah, M.Pd', 'Majelis Pembimbing Gugusdepan', 'Ketua Harian', '085102359191', 'male.png'),
(4, 'NIP.197510112005011003', 'Budi Setiadi, S.Kom., M.Kom.', 'Majelis Pembimbing Gugusdepan', 'Sekretaris', '08115568899', 'male.png'),
(5, 'NIK.061512855', 'Agus Jalpi, SKM., M.Kes.', 'Majelis Pembimbing Gugusdepan', 'Anggota', '08xxx', 'male.png'),
(6, 'NIK.0619051128', 'Juraida Ulpah, SKM., MM', 'Majelis Pembimbing Gugusdepan', 'Anggota', '08xxx', 'female.png'),
(7, 'NIK.061611958', 'Muhammad Suprapto,ST., MT.', 'Majelis Pembimbing Gugusdepan', 'Anggota', '08xxx', 'male.png'),
(8, 'NIK.0617071005', 'Yusup Indra Wijaya,S.Kom.,M.Kom.', 'Majelis Pembimbing Gugusdepan', 'Anggota', '085259004449', 'male.png'),
(9, 'NIK.061507780', 'Gusti Hijrah Maharani Putra, SE., MM', 'Majelis Pembimbing Gugusdepan', 'Anggota', '08xxx', 'male.png'),
(10, 'NIK.', 'H. Abdul Hafiz, M.Pd.I', 'Pembina Gugusdepan Putera', 'Ketua Gudep Putra', '0852651754354', 'male.png'),
(11, 'NIP. 19750913 200501 2 001', 'Dr. Hj. Silvia Ratna, S.Kom., M.Kom', 'Pembina Gugusdepan Puteri', 'Ketua Gudep Putri', '082253192222', 'female.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penanggungjawab`
--

CREATE TABLE `tb_penanggungjawab` (
  `id_pj` int(11) NOT NULL,
  `id_anggota` int(100) NOT NULL,
  `id_pembina` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_penanggungjawab`
--

INSERT INTO `tb_penanggungjawab` (`id_pj`, `id_anggota`, `id_pembina`, `nama`, `jabatan`) VALUES
(2, 12, 1, 'Muhammad Jayadi', 'Ketua Dewan Racana Putra'),
(3, 4, 1, 'Muhammad Heri Ramadhan', 'Pendiri Racana'),
(4, 14, 11, 'Dr.Hj.Silvia Ratna, S.Kom., M.Kom', 'Ketua Gudep Putri'),
(5, 12, 6, 'Putri Purnama Sari', 'Bendahara Umum'),
(9, 15, 11, 'Heriyanti Tri Wulandari', 'Co Unit Protokol'),
(10, 10, 1, 'Ganaang Prasetyo', 'Pemangku Adat Putra'),
(11, 14, 11, 'Iva Nur Arifah', 'Pemangku Adat Putri'),
(12, 13, 10, 'Syukur Prasetiyo', 'Pemangku Adat Putra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Admin','Anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`, `status`) VALUES
(1, 'Iva Nur Arifah', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Iva Nur Arifah', 'NAR.084.376.21.AR', 'bbe949ced7d08396c20c89e6891ae31d', 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `ukm` varchar(100) NOT NULL,
  `racana` varchar(100) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `ukm`, `racana`, `nama_instansi`, `alamat`) VALUES
(1, 'Pramuka', 'Pangeran Samudera Puteri Mayang Sari Gugus Depan 02.375-02.376', 'Universitas Islam Kalimantan Muhammad Arsyad Al-Banjari', 'Sekretariat UKM Pramuka, Kampus Uniska Adhyaksa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_proker`
--

CREATE TABLE `tb_proker` (
  `id_proker` int(11) NOT NULL,
  `nama_proker` varchar(100) NOT NULL,
  `tgl_ditetapkan` date NOT NULL,
  `status` enum('Direncanakan','Berlangsung','Selesai') NOT NULL,
  `id_pj` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `upload_rab` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_proker`
--

INSERT INTO `tb_proker` (`id_proker`, `nama_proker`, `tgl_ditetapkan`, `status`, `id_pj`, `keterangan`, `upload_rab`) VALUES
(10, 'Unit Pramuka Peduli', '2023-12-14', 'Direncanakan', 5, '-', 'Unit Pramuka peduli.pptx'),
(11, 'Unit Kajian Kepramukaan', '2023-12-20', 'Direncanakan', 2, 'Co Unit Kajian Kepramukaan', 'UNIT KAJIAN KEPRAMUKAAN .pptx'),
(12, 'Unit Protokol', '2023-12-20', 'Berlangsung', 2, 'Co Unit Protokol', 'Protokol.pdf'),
(13, 'Uniska Scout Creative Competition', '2024-04-04', 'Selesai', 2, 'Kegiatan Tahunan', 'Permohonan Bantuan Dana PT Adaro Indonesia.pdf'),
(14, 'Pengembaraan Bakti Kader', '2024-01-18', 'Selesai', 2, 'Kegiatan Tahunan - Ketua Dewan Racana', 'Hasil Survei  PBK 2022.pdf'),
(15, 'Kemah Orientasi Kader', '2024-06-06', 'Direncanakan', 2, 'Ketua Dewan Racana', 'Lporan Persiapan Bendahara Musra VII.xlsx'),
(16, 'Program Kerja Dewan', '2024-07-18', 'Direncanakan', 2, 'Ketua Dewan Racana', '1. LPJ KETUA DEWAN RACANA PERIODE 2022-2023.pdf');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `tb_arsipan`
--
ALTER TABLE `tb_arsipan`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `tb_danakas`
--
ALTER TABLE `tb_danakas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indeks untuk tabel `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_kdr`
--
ALTER TABLE `tb_kdr`
  ADD PRIMARY KEY (`id_kdr`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `tb_lpj`
--
ALTER TABLE `tb_lpj`
  ADD PRIMARY KEY (`id_lpj`),
  ADD KEY `id_proker` (`id_proker`);

--
-- Indeks untuk tabel `tb_pembina`
--
ALTER TABLE `tb_pembina`
  ADD PRIMARY KEY (`id_pembina`);

--
-- Indeks untuk tabel `tb_penanggungjawab`
--
ALTER TABLE `tb_penanggungjawab`
  ADD PRIMARY KEY (`id_pj`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_pembina` (`id_pembina`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD PRIMARY KEY (`id_proker`),
  ADD KEY `id_pj` (`id_pj`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_arsipan`
--
ALTER TABLE `tb_arsipan`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_danakas`
--
ALTER TABLE `tb_danakas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kdr`
--
ALTER TABLE `tb_kdr`
  MODIFY `id_kdr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_lpj`
--
ALTER TABLE `tb_lpj`
  MODIFY `id_lpj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_pembina`
--
ALTER TABLE `tb_pembina`
  MODIFY `id_pembina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_penanggungjawab`
--
ALTER TABLE `tb_penanggungjawab`
  MODIFY `id_pj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_kdr`
--
ALTER TABLE `tb_kdr`
  ADD CONSTRAINT `tb_kdr_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Ketidakleluasaan untuk tabel `tb_lpj`
--
ALTER TABLE `tb_lpj`
  ADD CONSTRAINT `tb_lpj_ibfk_1` FOREIGN KEY (`id_proker`) REFERENCES `tb_proker` (`id_proker`);

--
-- Ketidakleluasaan untuk tabel `tb_penanggungjawab`
--
ALTER TABLE `tb_penanggungjawab`
  ADD CONSTRAINT `tb_penanggungjawab_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `tb_penanggungjawab_ibfk_2` FOREIGN KEY (`id_pembina`) REFERENCES `tb_pembina` (`id_pembina`);

--
-- Ketidakleluasaan untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD CONSTRAINT `tb_proker_ibfk_1` FOREIGN KEY (`id_pj`) REFERENCES `tb_penanggungjawab` (`id_pj`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
