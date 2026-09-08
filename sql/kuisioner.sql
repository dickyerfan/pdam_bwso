-- ============================================
-- Tabel: kuisioner_pertanyaan
-- Menyimpan daftar pertanyaan kuisioner
-- ============================================

CREATE TABLE `kuisioner_pertanyaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL COMMENT 'Kategori pertanyaan',
  `pertanyaan` text NOT NULL,
  `urutan` int(11) DEFAULT 1,
  `aktif` enum('1','0') DEFAULT '1',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert pertanyaan kuisioner
INSERT INTO `kuisioner_pertanyaan` (`kategori`, `pertanyaan`, `urutan`, `aktif`) VALUES
('Pelayanan', 'Bagaimana kualitas pelayanan yang Anda terima dari Perumdam Ijen Tirta?', 1, '1'),
('Pelayanan', 'Seberapa cepat penanganan pengaduan yang Anda sampaikan?', 2, '1'),
('Pelayanan', 'Bagaimana sikap dan profesionalisme petugas di lapangan?', 3, '1'),
('Tarif', 'Apakah tarif air minum yang dikenakan sudah sesuai dengan layanan yang diterima?', 4, '1'),
('Tarif', 'Bagaimana kemudahan proses pembayaran rekening air?', 5, '1'),
('Kualitas Air', 'Bagaimana kualitas air yang Anda terima di rumah?', 6, '1'),
('Kualitas Air', 'Apakah aliran air cukup lancar dan stabil?', 7, '1'),
('Pengaduan', 'Seberapa mudah proses penyampaian pengaduan?', 8, '1'),
('Pengaduan', 'Apakah pengaduan Anda telah ditindaklanjuti dengan baik?', 9, '1'),
('KePUasan', 'Secara keseluruhan, seberapa puas Anda dengan layanan Perumdam Ijen Tirta?', 10, '1');

-- ============================================
-- Tabel: kuisioner_jawaban
-- Menyimpan jawaban dari pelanggan
-- ============================================

CREATE TABLE `kuisioner_jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `no_pel` varchar(20) DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `nilai` int(11) NOT NULL COMMENT 'Skor 1-5 (Sangat Buruk - Sangat Baik)',
  `komentar` text DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_pertanyaan` (`id_pertanyaan`),
  CONSTRAINT `fk_jawaban_pertanyaan` FOREIGN KEY (`id_pertanyaan`) REFERENCES `kuisioner_pertanyaan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
