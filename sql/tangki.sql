-- Tabel Kontak Person Tangki
CREATE TABLE `tangki_kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `urutan` int(11) DEFAULT 1,
  `aktif` enum('0','1') DEFAULT '1',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Tarif Tangki
CREATE TABLE `tangki_tarif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tarif` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `urutan` int(11) DEFAULT 1,
  `aktif` enum('0','1') DEFAULT '1',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert Kontak Person
INSERT INTO `tangki_kontak` (`nama`, `no_hp`, `urutan`, `aktif`) VALUES
('Bpk. MADE', '082316384231', 1, '1'),
('Bpk. ANGGA', '085228134138', 2, '1');

-- Insert Tarif
INSERT INTO `tangki_tarif` (`nama_tarif`, `harga`, `urutan`, `aktif`) VALUES
('Kegiatan Sosial', 'Rp. 275.000', 1, '1'),
('Kegiatan Umum Masyarakat', 'Rp. 300.000', 2, '1'),
('Kegiatan Bisnis / Perdagangan', 'Rp. 350.000', 3, '1');
