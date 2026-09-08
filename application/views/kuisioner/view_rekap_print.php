<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            font-size: 13px;
            color: #333;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px double #333;
            padding-bottom: 15px;
        }

        .header h1 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .header h2 {
            font-size: 14px;
            font-weight: normal;
            color: #666;
        }

        .header p {
            font-size: 11px;
            color: #999;
            margin-top: 5px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            background: #f0f0f0;
            padding: 8px 12px;
            margin-bottom: 10px;
            border-left: 4px solid #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px 10px;
            text-align: left;
            font-size: 12px;
        }

        th {
            background: #f5f5f5;
            font-weight: 600;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .skor-box {
            display: inline-block;
            width: 28px;
            height: 28px;
            line-height: 28px;
            text-align: center;
            border-radius: 4px;
            color: #fff;
            font-weight: bold;
            font-size: 12px;
        }

        .skor-5 {
            background: #198754;
        }

        .skor-4 {
            background: #0dcaf0;
        }

        .skor-3 {
            background: #6c757d;
        }

        .skor-2 {
            background: #ffc107;
            color: #333;
        }

        .skor-1 {
            background: #dc3545;
        }

        .ringkasan {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .ringkasan-card {
            flex: 1;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
        }

        .ringkasan-card .angka {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .ringkasan-card .label {
            font-size: 11px;
            color: #666;
            margin-top: 3px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
            color: #999;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .btn-print {
            display: inline-block;
            background: #0d6efd;
            color: #fff;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .btn-print:hover {
            background: #0b5ed7;
        }

        .btn-back {
            display: inline-block;
            background: #6c757d;
            color: #fff;
            padding: 10px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #5a6268;
        }

        @media print {
            body {
                padding: 10px;
                font-size: 11px;
            }

            .no-print {
                display: none !important;
            }

            .section {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>

    <div class="no-print" style="text-align:center; margin-bottom:10px;">
        <button class="btn-print" onclick="window.print()"><i class="fas fa-print"></i> Cetak / Simpan sebagai PDF</button>
        <!-- <a href="<?= base_url('kuisioner') ?>" class="btn-back"><i class="fas fa-arrow-left"></i> Kembali</a> -->
        <div style="margin-top:10px; font-size:11px; color:#666;">
            <strong>Cara simpan PDF:</strong> Klik tombol di atas → Pilih <strong>"Save as PDF"</strong> atau <strong>"Simpan sebagai PDF"</strong> di dialog printer → Klik Simpan
        </div>
    </div>

    <div class="header">
        <h1>REKAP HASIL KUISIONER KEPUASAN PELANGGAN</h1>
        <h2>Perumdam Ijen Tirta Bondowoso</h2>
        <p>Dicetak: <?= date('d F Y H:i') ?> | Total Responden: <?= $total_responden ?> orang</p>
    </div>

    <!-- Ringkasan -->
    <div class="section">
        <div class="section-title">RINGKASAN UMUM</div>
        <div class="ringkasan">
            <div class="ringkasan-card">
                <div class="angka"><?= $total_responden ?></div>
                <div class="label">Total Responden</div>
            </div>
            <div class="ringkasan-card">
                <div class="angka"><?= $ikp_keseluruhan && $ikp_keseluruhan->rata_rata ? number_format($ikp_keseluruhan->rata_rata, 2) : '-' ?></div>
                <div class="label">Rata-rata IKP (Skala 1-5)</div>
            </div>
            <div class="ringkasan-card">
                <div class="angka">
                    <?php
                    if ($ikp_keseluruhan && $ikp_keseluruhan->rata_rata) {
                        $avg = $ikp_keseluruhan->rata_rata;
                        if ($avg >= 4.5) echo 'Sangat Puas';
                        elseif ($avg >= 3.5) echo 'Puas';
                        elseif ($avg >= 2.5) echo 'Cukup';
                        elseif ($avg >= 1.5) echo 'Kurang';
                        else echo 'Sangat Kurang';
                    } else echo '-';
                    ?>
                </div>
                <div class="label">Tingkat Kepuasan</div>
            </div>
        </div>
    </div>

    <!-- IKP Per Kategori -->
    <div class="section">
        <div class="section-title">INDEKS KEPUASAN PELANGGAN PER KATEGORI</div>
        <table>
            <thead>
                <tr>
                    <th width="30" class="text-center">No</th>
                    <th>Kategori</th>
                    <th width="120" class="text-center">Rata-rata Skor</th>
                    <th width="100" class="text-center">Responden</th>
                    <th width="150">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($ikp_kategori as $row) : ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $row->kategori ?></td>
                        <td class="text-center">
                            <span class="skor-box skor-<?= round($row->rata_rata) ?>"><?= number_format($row->rata_rata, 2) ?></span>
                        </td>
                        <td class="text-center"><?= $row->total_responden ?></td>
                        <td>
                            <?php
                            if ($row->rata_rata >= 4.5) echo 'Sangat Puas';
                            elseif ($row->rata_rata >= 3.5) echo 'Puas';
                            elseif ($row->rata_rata >= 2.5) echo 'Cukup';
                            elseif ($row->rata_rata >= 1.5) echo 'Kurang';
                            else echo 'Sangat Kurang';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
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
                        <td class="text-center">
                            <span class="skor-box skor-<?= round($row->rata_rata) ?>"><?= number_format($row->rata_rata, 2) ?></span>
                        </td>
                        <td class="text-center"><?= $row->jumlah ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- IKP Per Wilayah -->
    <?php if (!empty($ikp_wilayah)) : ?>
        <div class="section">
            <div class="section-title">INDEKS KEPUASAN PELANGGAN PER WILAYAH</div>
            <table>
                <thead>
                    <tr>
                        <th width="30" class="text-center">No</th>
                        <th>Wilayah</th>
                        <th width="120" class="text-center">Rata-rata Skor</th>
                        <th width="100" class="text-center">Responden</th>
                        <th width="150">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($ikp_wilayah as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row->wilayah ?></td>
                            <td class="text-center">
                                <span class="skor-box skor-<?= round($row->rata_rata) ?>"><?= number_format($row->rata_rata, 2) ?></span>
                            </td>
                            <td class="text-center"><?= $row->total ?></td>
                            <td>
                                <?php
                                if ($row->rata_rata >= 4.5) echo 'Sangat Puas';
                                elseif ($row->rata_rata >= 3.5) echo 'Puas';
                                elseif ($row->rata_rata >= 2.5) echo 'Cukup';
                                elseif ($row->rata_rata >= 1.5) echo 'Kurang';
                                else echo 'Sangat Kurang';
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <!-- Daftar Responden -->
    <?php if (!empty($responden)) : ?>
        <div class="section">
            <div class="section-title">DAFTAR RESPONDEN</div>
            <table>
                <thead>
                    <tr>
                        <th width="30" class="text-center">No</th>
                        <th width="100">No Pel</th>
                        <th>Nama Pelanggan</th>
                        <th>Wilayah</th>
                        <th width="100" class="text-center">Skor</th>
                        <th width="120">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($responden as $row) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $row->no_pel ?></td>
                            <td><?= $row->nama_pelanggan ?></td>
                            <td><?= $row->wilayah ?></td>
                            <td class="text-center">
                                <span class="skor-box skor-<?= round($row->rata_rata) ?>"><?= number_format($row->rata_rata, 2) ?></span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($row->tanggal)) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <div class="footer">
        <p>Rekap ini dihasilkan secara otomatis dari sistem kuisioner online Perumdam Ijen Tirta Bondowoso</p>
        <p>Dokumen ini dapat dicetak atau disimpan sebagai file PDF untuk keperluan analisis internal</p>
    </div>

</body>

</html>