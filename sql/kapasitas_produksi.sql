-- Tabel UPK
CREATE TABLE `kapasitas_upk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_upk` varchar(100) NOT NULL,
  `modal_id` varchar(50) NOT NULL COMMENT 'ID modal di view',
  `urutan` int(11) DEFAULT 1,
  `aktif` enum('0','1') DEFAULT '1',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Detail Kapasitas
CREATE TABLE `kapasitas_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upk_id` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `lps` decimal(10,2) NOT NULL COMMENT 'Liter per detik',
  `aktif` enum('0','1') DEFAULT '1',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `upk_id` (`upk_id`),
  CONSTRAINT `kapasitas_detail_ibfk_1` FOREIGN KEY (`upk_id`) REFERENCES `kapasitas_upk` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data UPK
INSERT INTO `kapasitas_upk` (`nama_upk`, `modal_id`, `urutan`, `aktif`) VALUES
('UPK Bondowoso', 'bwsMap', 1, '1'),
('UPK Sukosari 1', 'suko1Map', 2, '1'),
('UPK Maesan', 'msnMap', 3, '1'),
('UPK Tegalampel', 'tglMap', 4, '1'),
('UPK Tapen', 'tpnMap', 5, '1'),
('UPK Prajekan', 'pjkMap', 6, '1'),
('UPK Tlogosari', 'tlgMap', 7, '1'),
('UPK Wringin', 'wrgMap', 8, '1'),
('UPK Curahdami', 'crdMap', 9, '1'),
('UPK Tamanan', 'tmnMap', 10, '1'),
('UPK Tenggarang', 'tgrMap', 11, '1'),
('UPK Tamankrocok', 'tmkMap', 12, '1'),
('UPK Wonosari', 'wnsMap', 13, '1'),
('UPK Sukosari 2', 'suko2Map', 14, '1');

-- Insert detail Bondowoso
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(1, 'SB 1 ( Jl. A. Yani )', 5.63),
(1, 'SB 2 ( Jl. Mastrip )', 6.09),
(1, 'SB 4 ( Nangkaan )', 0.44),
(1, 'SB 6 ( Pancoran )', 0.42),
(1, 'SB 7 ( Unibo )', 1.79),
(1, 'SB 10 ( Penambangan )', 6.48),
(1, 'SB Poncogati', 3.46),
(1, 'SB EDC', 1.78),
(1, 'SB Ground', 6.75),
(1, 'SB Wijayakusuma', 3.27);

-- Insert detail Sukosari 1
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(2, 'MAG Sumberwringin', 6.31);

-- Insert detail Maesan
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(3, 'MAG Tanahwulan', 7.48);

-- Insert detail Tegalampel
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(4, 'SB Tegalampel 1', 2.58),
(4, 'SB Tegalampel 2', 4.96),
(4, 'SB Locare', 1.11),
(4, 'SB Karanganyar', 1.96);

-- Insert detail Tapen
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(5, 'SB Tapen', 3.23),
(5, 'MAG Mangli ( Tapen )', 2.93),
(5, 'MAG Mangli ( Klabang )', 0.64),
(5, 'SB Besuk', 2.69);

-- Insert detail Prajekan
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(6, 'SB Prajekan 1', 4.31),
(6, 'SB Prajekan 2', 1.08);

-- Insert detail Tlogosari
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(7, 'MAG Sumberbalen', 1.66),
(7, 'SB Pakisan', 2.62);

-- Insert detail Wringin
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(8, 'SB Wringin', 2.80),
(8, 'MAG Wringin', 2.85);

-- Insert detail Curahdami
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(9, 'SB Curahdami', 8.70);

-- Insert detail Tamanan
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(10, 'SB Tamanan', 1.92);

-- Insert detail Tenggarang
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(11, 'SB Kajar', 4.07);

-- Insert detail Tamankrocok
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(12, 'SB Tamankrocok', 3.30);

-- Insert detail Wonosari
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(13, 'MAG Tegaljati', 5.36);

-- Insert detail Sukosari 2
INSERT INTO `kapasitas_detail` (`upk_id`, `lokasi`, `lps`) VALUES
(14, 'SB Wonokusumo', 3.44),
(14, 'MAG Tegaljati', 4.39);
