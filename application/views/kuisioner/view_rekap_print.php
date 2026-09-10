<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, sans-serif; font-size: 13px; color: #333; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 3px double #333; padding-bottom: 15px; }
        .header h1 { font-size: 18px; margin-bottom: 5px; }
        .header h2 { font-size: 14px; font-weight: normal; color: #666; }
        .header p { font-size: 11px; color: #999; margin-top: 5px; }
        .section { margin-bottom: 25px; }
        .section-title { font-size: 14px; font-weight: bold; background: #f0f0f0; padding: 8px 12px; margin-bottom: 10px; border-left: 4px solid #333; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #ccc; padding: 6px 10px; text-align: left; font-size: 12px; }
        th { background: #f5f5f5; font-weight: 600; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .ringkasan { display: flex; gap: 20px; margin-bottom: 20px; }
        .ringkasan-card { flex: 1; border: 1px solid #ddd; border-radius: 8px; padding: 15px; text-align: center; }
        .ringkasan-card .angka { font-size: 28px; font-weight: bold; color: #333; }
        .ringkasan-card .label { font-size: 11px; color: #666; margin-top: 3px; }
        .mutu-badge { display: inline-block; padding: 4px 12px; border-radius: 4px; color: #fff; font-weight: bold; font-size: 14px; }
        .mutu-a { background: #198754; }
        .mutu-b { background: #0dcaf0; }
        .mutu-c { background: #ffc107; color: #333; }
        .mutu-d { background: #dc3545; }
        .footer { margin-top: 40px; text-align: center; font-size: 10px; color: #999; border-top: 1px solid #ddd; padding-top: 10px; }
        .btn-print { display: inline-block; background: #0d6efd; color: #fff; padding: 10px 25px; border: none; border-radius: 5px; cursor: pointer; font-size: 14px; margin-bottom: 20px; }
        .btn-print:hover { background: #0b5ed7; }
        @media print { body { padding: 10px; font-size: 11px; } .no-print { display: none !important; } .section { page-break-inside: avoid; } }
    </style>
</head>

<body>

    <div class="no-print" style="text-align:center; margin-bottom:10px;">
        <button class="btn-print" onclick="window.print()"><i class="fas fa-print"></i> Cetak / Simpan sebagai PDF</button>
        <div style="margin-top:10px; font-size:11px; color:#666;">
            <strong>Cara simpan PDF:</strong> Klik tombol di atas → Pilih <strong>"Save as PDF"</strong> di dialog printer → Klik Simpan
        </div>
    </div>

    <div class="header">
        <h1>REKAP HASIL KUISIONER KEPUASAN PELANGGAN</h1>
        <h2>Perumdam Ijen Tirta Bondowoso</h2>
        <p>
            Dicetak: <?= date('d F Y H:i') ?>
            <?php if ($mode == 'periode' && $filter_dari && $filter_sampai) : ?>
                | Periode: <?= date('d/m/Y', strtotime($filter_dari)) ?> - <?= date('d/m/Y', strtotime($filter_sampai)) ?>
            <?php else : ?>
                | Semua Data (sejak <?= $tanggal_awal ? date('d/m/Y', strtotime($tanggal_awal)) : '-' ?>)
            <?php endif; ?>
        </p>
        <p>Metode: PermenPANRB No. 14 Tahun 2017 (Skala Likert 1-4, Konversi ke Skala 100)</p>
    </div>

    <?php if ($ikm) : ?>

    <!-- Ringkasan IKM -->
    <div class="section">
        <div class="section-title">RINGKASAN INDEKS KEPUASAN MASYARAKAT (IKM)</div>
        <div class="ringkasan">
            <div class="ringkasan-card">
                <div class="angka"><?= $ikm['total_responden'] ?></div>
                <div class="label">Total Responden</div>
            </div>
            <div class="ringkasan-card">
                <div class="angka"><?= number_format($ikm['nilai_ikm'], 2) ?></div>
                <div class="label">Nilai IKM (Skala 100)</div>
            </div>
            <div class="ringkasan-card">
                <div class="angka">
                    <span class="mutu-badge mutu-<?= strtolower($ikm['mutu']) ?>"><?= $ikm['mutu'] ?></span>
                </div>
                <div class="label">Mutu Pelayanan</div>
            </div>
            <div class="ringkasan-card">
                <div class="angka" style="font-size:20px;"><?= $ikm['keterangan'] ?></div>
                <div class="label">Kinerja Unit Pelayanan</div>
            </div>
        </div>
    </div>

    <!-- Perhitungan Per Kategori -->
    <div class="section">
        <div class="section-title">PERHITUNGAN IKM PER KATEGORI UNSUR PELAYANAN</div>
        <table>
            <thead>
                <tr>
                    <th width="30" class="text-center">No</th>
                    <th>Kategori Unsur Pelayanan</th>
                    <th width="120" class="text-center">Rata-rata Skor (1-4)</th>
                    <th width="100" class="text-center">Bobot</th>
                    <th width="120" class="text-center">Skor Tertimbang</th>
                    <th width="120" class="text-center">Konversi (x25)</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($ikm['detail_kategori'] as $kat) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $kat['kategori'] ?></td>
                        <td class="text-center"><?= number_format($kat['rata_rata'], 2) ?></td>
                        <td class="text-center"><?= number_format($ikm['bobot'], 2) ?></td>
                        <td class="text-center"><?= number_format($kat['skor_tertimbang'], 4) ?></td>
                        <td class="text-center"><?= number_format($kat['skor_konversi'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr style="background:#e9ecef; font-weight:bold;">
                    <th colspan="2" class="text-center">TOTAL</th>
                    <th class="text-center"><?= number_format($ikm['skor_rata_rata'], 4) ?></th>
                    <th class="text-center">1.00</th>
                    <th class="text-center"><?= number_format($ikm['skor_rata_rata'], 4) ?></th>
                    <th class="text-center" style="font-size:16px;"><?= number_format($ikm['nilai_ikm'], 2) ?></th>
                </tr>
            </tfoot>
        </table>
        <p style="font-size:11px; color:#666; margin-top:5px;">
            <strong>Rumus:</strong> IKM = Σ(Rata-rata Kategori × Bobot) × 25 = <?= number_format($ikm['skor_rata_rata'], 4) ?> × 25 = <strong><?= number_format($ikm['nilai_ikm'], 2) ?></strong>
        </p>
    </div>

    <!-- Keterangan Mutu -->
    <div class="section">
        <div class="section-title">KETERANGAN INTERVAL IKM DAN MUTU PELAYANAN</div>
        <table>
            <thead>
                <tr>
                    <th width="150" class="text-center">Interval IKM</th>
                    <th width="60" class="text-center">Mutu</th>
                    <th>Keterangan / Kinerja</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">88,31 – 100,00</td>
                    <td class="text-center"><span class="mutu-badge mutu-a" style="font-size:12px;">A</span></td>
                    <td>Sangat Baik</td>
                </tr>
                <tr>
                    <td class="text-center">76,61 – 88,30</td>
                    <td class="text-center"><span class="mutu-badge mutu-b" style="font-size:12px;">B</span></td>
                    <td>Baik</td>
                </tr>
                <tr>
                    <td class="text-center">65,00 – 76,60</td>
                    <td class="text-center"><span class="mutu-badge mutu-c" style="font-size:12px;">C</span></td>
                    <td>Kurang Baik</td>
                </tr>
                <tr>
                    <td class="text-center">25,00 – 64,99</td>
                    <td class="text-center"><span class="mutu-badge mutu-d" style="font-size:12px;">D</span></td>
                    <td>Tidak Baik</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Rata-rata Per Pertanyaan -->
    <div class="section">
        <div class="section-title">RATA-RATA SKOR PER PERTANYAAN</div>
        <table>
            <thead>
                <tr>
                    <th width="30" class="text-center">No</th>
                    <th>Kategori</th>
                    <th>Pertanyaan</th>
                    <th width="100" class="text-center">Rata-rata</th>
                    <th width="80" class="text-center">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($rata_per_pertanyaan as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><small><?= $row->kategori ?></small></td>
                        <td><?= $row->pertanyaan ?></td>
                        <td class="text-center"><?= number_format($row->rata_rata, 2) ?></td>
                        <td class="text-center"><?= $row->jumlah ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- IKM Per Wilayah -->
    <?php if (!empty($ikm_per_wilayah)) : ?>
        <div class="section">
            <div class="section-title">INDEKS KEPUASAN MASYARAKAT PER WILAYAH / UPK</div>
            <table>
                <thead>
                    <tr>
                        <th width="30" class="text-center">No</th>
                        <th>Wilayah / UPK</th>
                        <th width="80" class="text-center">Responden</th>
                        <th width="100" class="text-center">Skor (1-4)</th>
                        <th width="100" class="text-center">IKM (x25)</th>
                        <th width="60" class="text-center">Mutu</th>
                        <th width="120">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($ikm_per_wilayah as $row) : ?>
                        <?php
                        $skor = floatval($row->rata_rata);
                        $ikm_upk = floatval($row->skor_konversi);
                        if ($ikm_upk >= 88.31) { $mutu_upk = 'A'; $ket_upk = 'Sangat Baik'; $class_upk = 'mutu-a'; }
                        elseif ($ikm_upk >= 76.61) { $mutu_upk = 'B'; $ket_upk = 'Baik'; $class_upk = 'mutu-b'; }
                        elseif ($ikm_upk >= 65.00) { $mutu_upk = 'C'; $ket_upk = 'Kurang Baik'; $class_upk = 'mutu-c'; }
                        else { $mutu_upk = 'D'; $ket_upk = 'Tidak Baik'; $class_upk = 'mutu-d'; }
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row->wilayah ?></td>
                            <td class="text-center"><?= $row->total ?></td>
                            <td class="text-center"><?= number_format($skor, 2) ?></td>
                            <td class="text-center"><span class="mutu-badge <?= $class_upk ?>" style="font-size:12px;"><?= number_format($ikm_upk, 2) ?></span></td>
                            <td class="text-center"><strong><?= $mutu_upk ?></strong></td>
                            <td><?= $ket_upk ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <?php endif; ?>

    <!-- Daftar Responden -->
    <?php if (!empty($responden)) : ?>
        <div class="section">
            <div class="section-title">DAFTAR RESPONDEN</div>
            <table>
                <thead>
                    <tr>
                        <th width="30" class="text-center">No</th>
                        <th width="80">No Pel</th>
                        <th>Nama Pelanggan</th>
                        <th>Wilayah</th>
                        <th width="80" class="text-center">Skor</th>
                        <th width="80" class="text-center">Konversi</th>
                        <th width="50" class="text-center">Mutu</th>
                        <th>Saran & Masukan</th>
                        <th width="100">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($responden as $row) : ?>
                        <?php
                        $skor = floatval($row->rata_rata);
                        $konversi = $skor * 25;
                        if ($konversi >= 88.31) { $mutu_r = 'A'; $class_r = 'mutu-a'; }
                        elseif ($konversi >= 76.61) { $mutu_r = 'B'; $class_r = 'mutu-b'; }
                        elseif ($konversi >= 65.00) { $mutu_r = 'C'; $class_r = 'mutu-c'; }
                        else { $mutu_r = 'D'; $class_r = 'mutu-d'; }
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row->no_pel ?></td>
                            <td><?= $row->nama_pelanggan ?></td>
                            <td><?= $row->wilayah ?></td>
                            <td class="text-center"><?= number_format($skor, 2) ?></td>
                            <td class="text-center"><span class="mutu-badge <?= $class_r ?>" style="font-size:11px;"><?= number_format($konversi, 2) ?></span></td>
                            <td class="text-center"><strong><?= $mutu_r ?></strong></td>
                            <td><?= !empty($row->saran) ? htmlspecialchars($row->saran) : '-' ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($row->tanggal)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <div class="footer">
        <p>Rekap ini dihasilkan secara otomatis dari sistem kuisioner online Perumdam Ijen Tirta Bondowoso</p>
        <p>Mengacu pada Peraturan Menteri PANRB No. 14 Tahun 2017 tentang Pedoman Penyusunan Survei Kepuasan Masyarakat</p>
    </div>

</body>

</html>
