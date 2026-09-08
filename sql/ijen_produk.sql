-- Tabel Produk Ijen Water
CREATE TABLE `ijen_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` varchar(50) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `modal_id` varchar(50) NOT NULL COMMENT 'ID modal Bootstrap',
  `urutan` int(11) DEFAULT 1,
  `aktif` enum('0','1') DEFAULT '1',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data produk
INSERT INTO `ijen_produk` (`nama_produk`, `deskripsi`, `harga`, `gambar`, `modal_id`, `urutan`, `aktif`) VALUES
('Kemasan Gelas 220ml', 'Air Mineral Ijen Water kemasan gelas 220ml dalam 1 dus berisi 48pcs', 'Rp. 15.000,-', 'gelas.png', 'gelas', 1, '1'),
('Kemasan Botol 330ml', 'Air Mineral Ijen Water kemasan botol 330ml dalam 1 dus berisi 24pcs', 'Rp. 33.000,-', '330.png', 'botol1', 2, '1'),
('Kemasan Botol 500ml', 'Air Mineral Ijen Water kemasan botol 500ml dalam 1 dus berisi 24pcs', 'Rp. 35.000,-', '500.png', 'botol2', 3, '1'),
('Kemasan Botol 1500ml', 'Air Mineral Ijen Water kemasan botol 1500ml dalam 1 dus berisi 12pcs', 'Rp. 38.000,-', '1500.png', 'botol3', 4, '1'),
('Kemasan Galon 19 liter', 'Air Mineral Ijen Water kemasan galon 19liter', 'Rp. 11.000,-', 'galon.png', 'galon', 5, '1');
