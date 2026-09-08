-- ============================================
-- Tabel: no_pengaduan_upk
-- Untuk menyimpan No Pengaduan WA Kepala UPK
-- ============================================

CREATE TABLE `no_pengaduan_upk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_upk` varchar(100) NOT NULL,
  `nama_kepala` varchar(100) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `aktif` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data contoh (sesuaikan dengan data UPK yang ada)
INSERT INTO `no_pengaduan_upk` (`nama_upk`, `nama_kepala`, `no_wa`, `aktif`) VALUES
('UPK Bondowoso', 'Nama Kepala', '6281234567890', '1'),
('UPK Sukosari 1', 'Nama Kepala', '6281234567891', '1'),
('UPK Maesan', 'Nama Kepala', '6281234567892', '1'),
('UPK Tegalampel', 'Nama Kepala', '6281234567893', '1'),
('UPK Tapen', 'Nama Kepala', '6281234567894', '1'),
('UPK Prajekan', 'Nama Kepala', '6281234567895', '1'),
('UPK Tlogosari', 'Nama Kepala', '6281234567896', '1'),
('UPK Wringin', 'Nama Kepala', '6281234567897', '1'),
('UPK Curahdami', 'Nama Kepala', '6281234567898', '1'),
('UPK Tamanan', 'Nama Kepala', '6281234567899', '1'),
('UPK Tenggarang', 'Nama Kepala', '6281234567800', '1'),
('UPK Tamankrocok', 'Nama Kepala', '6281234567801', '1'),
('UPK Wonosari', 'Nama Kepala', '6281234567802', '1'),
('UPK Klabang', 'Nama Kepala', '6281234567803', '1'),
('UPK Sukosari 2', 'Nama Kepala', '6281234567804', '1');
