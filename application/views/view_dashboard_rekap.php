<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <!-- Header + Filter -->
            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                <h4 class="mb-0"><i class="fas fa-chart-line me-2"></i><?= strtoupper($title) ?></h4>
                <span class="text-muted" style="font-size:0.85rem;">Update: <?= date('d M Y H:i') ?></span>
            </div>

            <!-- Filter Periode -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body py-3">
                    <form id="filterForm" method="GET" action="<?= base_url('dashboard_baru') ?>" class="row align-items-end g-2">
                        <div class="col-auto">
                            <label class="form-label fw-bold small">Mode Tampilan</label>
                            <select name="mode" id="modeSelect" class="form-select form-select-sm" onchange="toggleFilter()">
                                <option value="keseluruhan" <?= $mode == 'keseluruhan' ? 'selected' : '' ?>>Keseluruhan</option>
                                <option value="periode" <?= $mode == 'periode' ? 'selected' : '' ?>>Per Periode</option>
                            </select>
                        </div>
                        <div class="col-auto periode-field" style="<?= $mode == 'keseluruhan' ? 'display:none' : '' ?>">
                            <label class="form-label fw-bold small">Dari Tanggal</label>
                            <input type="date" name="dari" class="form-control form-control-sm" value="<?= $filter_dari ?>">
                        </div>
                        <div class="col-auto periode-field" style="<?= $mode == 'keseluruhan' ? 'display:none' : '' ?>">
                            <label class="form-label fw-bold small">Sampai Tanggal</label>
                            <input type="date" name="sampai" class="form-control form-control-sm" value="<?= $filter_sampai ?>">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-filter me-1"></i> Filter</button>
                            <a href="<?= base_url('dashboard_baru') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-redo me-1"></i> Reset</a>
                        </div>
                    </form>
                    <small class="text-muted mt-1 d-block">
                        <i class="fas fa-info-circle me-1"></i>
                        Mode: <strong><?= $mode == 'periode' && $filter_dari && $filter_sampai ? 'Per Periode (' . date('d/m/Y', strtotime($filter_dari)) . ' - ' . date('d/m/Y', strtotime($filter_sampai)) . ')' : 'Keseluruhan (sejak ' . ($tanggal_awal ? date('d/m/Y', strtotime($tanggal_awal)) : '-') . ')' ?></strong>
                    </small>
                </div>
            </div>

            <!-- Cards Ringkasan IKM -->
            <?php
            $ikm_nilai = $ikm ? $ikm['nilai_ikm'] : 0;
            $ikm_mutu = $ikm ? $ikm['mutu'] : '-';
            $ikm_ket = $ikm ? $ikm['keterangan'] : '-';
            if ($ikm_mutu == 'A') $card_bg = 'linear-gradient(135deg, #198754, #157347)';
            elseif ($ikm_mutu == 'B') $card_bg = 'linear-gradient(135deg, #0dcaf0, #0aa2c8)';
            elseif ($ikm_mutu == 'C') $card_bg = 'linear-gradient(135deg, #ffc107, #fd7e14)';
            else $card_bg = 'linear-gradient(135deg, #dc3545, #bb2d3b)';
            ?>
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #0d6efd, #0b5ed7);">
                        <div class="card-body text-white d-flex flex-column justify-content-center" style="min-height:100px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-white-50 small">Total Pengaduan</div>
                                    <div class="fs-3 fw-bold"><?= $total_pengaduan ?></div>
                                </div>
                                <i class="fas fa-comments fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #198754, #157347);">
                        <div class="card-body text-white d-flex flex-column justify-content-center" style="min-height:100px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-white-50 small">Total Responden</div>
                                    <div class="fs-3 fw-bold"><?= $total_responden ?></div>
                                </div>
                                <i class="fas fa-clipboard-check fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-0 shadow-sm h-100" style="background: <?= $card_bg ?>;">
                        <div class="card-body text-white d-flex flex-column justify-content-center" style="min-height:100px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-white-50 small">IKM (Skala 100)</div>
                                    <div class="fs-3 fw-bold"><?= $ikm ? number_format($ikm_nilai, 2) : '-' ?></div>
                                </div>
                                <div class="text-center">
                                    <div class="fs-2 fw-bold"><?= $ikm_mutu ?></div>
                                    <div class="small"><?= $ikm_ket ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #6f42c1, #5a32a3);">
                        <div class="card-body text-white d-flex flex-column justify-content-center" style="min-height:100px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-white-50 small">Total UPK</div>
                                    <div class="fs-3 fw-bold"><?= count($ikm_per_wilayah) ?></div>
                                </div>
                                <i class="fas fa-building fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail IKM Per Kategori -->
            <?php if ($ikm && !empty($ikm['detail_kategori'])) : ?>
            <div class="row mb-4">
                <div class="col-xl-8 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-calculator me-1"></i> Perhitungan IKM Per Kategori (PermenPANRB No. 14/2017)
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th width="5%">No</th>
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
                                                <td class="fw-semibold"><?= $kat['kategori'] ?></td>
                                                <td class="text-center"><?= number_format($kat['rata_rata'], 2) ?></td>
                                                <td class="text-center"><?= number_format($ikm['bobot'], 2) ?></td>
                                                <td class="text-center"><?= number_format($kat['skor_tertimbang'], 4) ?></td>
                                                <td class="text-center"><?= number_format($kat['skor_konversi'], 2) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot class="table-dark text-center">
                                        <tr>
                                            <th colspan="2">TOTAL</th>
                                            <th><?= number_format($ikm['skor_rata_rata'], 4) ?></th>
                                            <th>1.00</th>
                                            <th><?= number_format($ikm['skor_rata_rata'], 4) ?></th>
                                            <th class="fs-5"><?= number_format($ikm_nilai, 2) ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="mt-2">
                                <small class="text-muted">
                                    <strong>Rumus:</strong> IKM = Σ(Rata-rata Kategori × Bobot) × 25 = <?= number_format($ikm['skor_rata_rata'], 4) ?> × 25 = <strong><?= number_format($ikm_nilai, 2) ?></strong>
                                    | Mutu: <strong><?= $ikm_mutu ?> (<?= $ikm_ket ?>)</strong>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-chart-radar me-1"></i> Grafik IKM Per Kategori
                        </div>
                        <div class="card-body">
                            <canvas id="chartIKP" height="250"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Grafik Baris 1: Pengaduan -->
            <div class="row mb-4">
                <div class="col-xl-8 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-chart-bar me-1"></i> Pengaduan Per Bulan
                        </div>
                        <div class="card-body">
                            <canvas id="chartBulan" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-chart-pie me-1"></i> Jenis Pengaduan
                        </div>
                        <div class="card-body">
                            <canvas id="chartJenis" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Baris 2: UPK -->
            <div class="row mb-4">
                <div class="col-xl-12 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-chart-bar me-1"></i> Pengaduan Per UPK
                        </div>
                        <div class="card-body">
                            <canvas id="chartUpk" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rekap Detail Per UPK (Pengaduan) -->
            <div class="row mb-4">
                <div class="col-xl-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-table me-1"></i> Rekap Pengaduan Per UPK & Jenis
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover" id="tableRekap" width="100%">
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>UPK / Wilayah</th>
                                            <th>Air Mati</th>
                                            <th>Air Keruh</th>
                                            <th>Kebocoran</th>
                                            <th>Water Meter</th>
                                            <th>Pemakaian</th>
                                            <th>Lain-lain</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rekap_grouped = [];
                                        foreach ($rekap_detail_upk as $row) {
                                            $rekap_grouped[$row->wil_layanan][$row->jenis_aduan] = $row->total;
                                        }
                                        $jenis_list = ['Air Mati', 'Air Keruh', 'Kebocoran', 'Water Meter', 'Pemakaian', 'Lain-lain'];
                                        $no = 1;
                                        foreach ($pengaduan_per_upk as $upk) :
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td class="fw-bold"><?= $upk->wil_layanan ?></td>
                                                <?php
                                                $total_upk = 0;
                                                foreach ($jenis_list as $jenis) :
                                                    $val = isset($rekap_grouped[$upk->wil_layanan][$jenis]) ? $rekap_grouped[$upk->wil_layanan][$jenis] : 0;
                                                    $total_upk += $val;
                                                ?>
                                                    <td class="text-center"><?= $val ?></td>
                                                <?php endforeach; ?>
                                                <td class="text-center fw-bold"><?= $total_upk ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- IKM Per Wilayah & Pengaduan Terbaru -->
            <div class="row mb-4">
                <div class="col-xl-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-map-marker-alt me-1"></i> IKM Per Wilayah (Skala 100)
                        </div>
                        <div class="card-body">
                            <?php if (!empty($ikm_per_wilayah)) : ?>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Wilayah / UPK</th>
                                                <th class="text-center">Responden</th>
                                                <th class="text-center">Skor (1-4)</th>
                                                <th class="text-center">IKM (x25)</th>
                                                <th class="text-center">Mutu</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ikm_per_wilayah as $row) : ?>
                                                <?php
                                                $skor = floatval($row->rata_rata);
                                                $ikm_upk = floatval($row->skor_konversi);
                                                if ($ikm_upk >= 88.31) { $mutu_upk = 'A'; $ket_upk = 'Sangat Baik'; $badge_upk = 'bg-success'; }
                                                elseif ($ikm_upk >= 76.61) { $mutu_upk = 'B'; $ket_upk = 'Baik'; $badge_upk = 'bg-info'; }
                                                elseif ($ikm_upk >= 65.00) { $mutu_upk = 'C'; $ket_upk = 'Kurang Baik'; $badge_upk = 'bg-warning text-dark'; }
                                                else { $mutu_upk = 'D'; $ket_upk = 'Tidak Baik'; $badge_upk = 'bg-danger'; }
                                                ?>
                                                <tr>
                                                    <td class="fw-semibold"><?= $row->wilayah ?></td>
                                                    <td class="text-center"><?= $row->total ?></td>
                                                    <td class="text-center"><?= number_format($skor, 2) ?></td>
                                                    <td class="text-center"><span class="badge <?= $badge_upk ?> fs-6"><?= number_format($ikm_upk, 2) ?></span></td>
                                                    <td class="text-center fw-bold"><?= $mutu_upk ?></td>
                                                    <td><?= $ket_upk ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else : ?>
                                <div class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-2"></i>
                                    <p>Belum ada data kuisioner</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-clock me-1"></i> Pengaduan Terbaru
                        </div>
                        <div class="card-body">
                            <?php if (!empty($pengaduan_terbaru)) : ?>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>No Pel</th>
                                                <th>Wilayah</th>
                                                <th>Jenis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pengaduan_terbaru as $row) : ?>
                                                <tr>
                                                    <td class="text-nowrap"><?= date('d/m/Y', strtotime($row->tgl_aduan)) ?></td>
                                                    <td><?= $row->no_pel ?></td>
                                                    <td><span class="badge bg-secondary"><?= $row->wil_layanan ?></span></td>
                                                    <td><span class="badge bg-info"><?= $row->jenis_aduan ?></span></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php else : ?>
                                <div class="text-center text-muted py-4">
                                    <i class="fas fa-inbox fa-2x mb-2"></i>
                                    <p>Belum ada pengaduan</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        function toggleFilter() {
            var mode = document.getElementById('modeSelect').value;
            var periodeFields = document.querySelectorAll('.periode-field');
            periodeFields.forEach(function(el) {
                el.style.display = (mode == 'periode') ? '' : 'none';
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                if (typeof $ !== 'undefined') {
                    $('#tableRekap').DataTable();
                }
            }, 500);

            // Chart Pengaduan Per Bulan
            new Chart(document.getElementById('chartBulan'), {
                type: 'line',
                data: {
                    labels: <?= json_encode($chart_bulan_labels) ?>,
                    datasets: [{
                        label: 'Jumlah Pengaduan',
                        data: <?= json_encode($chart_bulan_data) ?>,
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13,110,253,0.1)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 5,
                        pointBackgroundColor: '#0d6efd'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } }
                }
            });

            // Chart Jenis Pengaduan (Doughnut)
            new Chart(document.getElementById('chartJenis'), {
                type: 'doughnut',
                data: {
                    labels: <?= json_encode($chart_jenis_labels) ?>,
                    datasets: [{
                        data: <?= json_encode($chart_jenis_data) ?>,
                        backgroundColor: ['#dc3545', '#ffc107', '#198754', '#0d6efd', '#6f42c1', '#6c757d']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'bottom', labels: { boxWidth: 12 } } }
                }
            });

            // Chart Pengaduan Per UPK (Bar)
            new Chart(document.getElementById('chartUpk'), {
                type: 'bar',
                data: {
                    labels: <?= json_encode($chart_upk_labels) ?>,
                    datasets: [{
                        label: 'Pengaduan',
                        data: <?= json_encode($chart_upk_data) ?>,
                        backgroundColor: 'rgba(255,193,7,0.8)',
                        borderColor: '#ffc107',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } },
                        x: { ticks: { maxRotation: 45, minRotation: 45 } }
                    }
                }
            });

            // Chart Radar IKM Per Kategori
            <?php if ($ikm && !empty($ikm['detail_kategori'])) : ?>
            new Chart(document.getElementById('chartIKP'), {
                type: 'radar',
                data: {
                    labels: <?= json_encode(array_column($ikm['detail_kategori'], 'kategori')) ?>,
                    datasets: [{
                        label: 'Skor Konversi (x25)',
                        data: <?= json_encode(array_map(function($x) { return round($x['skor_konversi'], 2); }, $ikm['detail_kategori'])) ?>,
                        backgroundColor: 'rgba(25,135,84,0.2)',
                        borderColor: '#198754',
                        borderWidth: 2,
                        pointBackgroundColor: '#198754'
                    }]
                },
                options: {
                    responsive: true,
                    scales: { r: { beginAtZero: true, max: 100, ticks: { stepSize: 20 } } },
                    plugins: { legend: { display: false } }
                }
            });
            <?php endif; ?>
        });
    </script>
