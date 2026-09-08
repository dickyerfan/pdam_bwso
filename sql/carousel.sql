-- Tabel Carousel untuk Slider Hero & Modal
CREATE TABLE `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL COMMENT 'Link URL jika gambar diklik',
  `tipe` enum('hero','modal') DEFAULT 'hero' COMMENT 'hero = slider utama, modal = popup carousel',
  `urutan` int(11) DEFAULT 1,
  `aktif` enum('0','1') DEFAULT '1',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert gambar hero carousel
INSERT INTO `carousel` (`gambar`, `judul`, `keterangan`, `link`, `tipe`, `urutan`, `aktif`) VALUES
('hero1.jpg', 'Selamat Datang', 'Perumdam Ijen Tirta Bondowoso', NULL, 'hero', 1, '1'),
('hero2.jpg', 'Pelayanan Terbaik', 'Menyediakan air bersih untuk masyarakat', NULL, 'hero', 2, '1'),
('hero3.jpg', 'Air Bersih', 'Kebutuhan air bersih terpenuhi', NULL, 'hero', 3, '1');

-- Insert gambar modal carousel
INSERT INTO `carousel` (`gambar`, `judul`, `keterangan`, `link`, `tipe`, `urutan`, `aktif`) VALUES
('info_pdam.jpeg', 'Info PDAM', 'Informasi terbaru', NULL, 'modal', 1, '1'),
('pdampopup.png', 'Promo', 'Promo spesial', NULL, 'modal', 2, '1'),
('ijen.jpg', 'Ijen Water', 'Klik untuk lihat Detail Ijen Water', 'ijenWater', 'modal', 3, '1');

-- Query untuk tambah kolom pada tabel yang sudah ada:
-- ALTER TABLE `carousel` ADD COLUMN `tipe` enum('hero','modal') DEFAULT 'hero' COMMENT 'hero = slider utama, modal = popup carousel' AFTER `link`;
