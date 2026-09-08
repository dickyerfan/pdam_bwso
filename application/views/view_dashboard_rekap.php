<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                <h4 class="mb-0"><i class="fas fa-chart-line me-2"></i><?= strtoupper($title) ?></h4>
                <span class="text-muted" style="font-size:0.85rem;">Update: <?= date('d M Y H:i') ?></span>
            </div>

            <!-- Cards Ringkasan -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #0d6efd, #0b5ed7);">
                        <div class="card-body text-white">
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
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #198754, #157347);">
                        <div class="card-body text-white">
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
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
                        <div class="card-body text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-white-50 small">IKP Keseluruhan</div>
                                    <div class="fs-3 fw-bold">
                                        <?php if ($ikp_keseluruhan && $ikp_keseluruhan->rata_rata) : ?>
                                            <?= number_format($ikp_keseluruhan->rata_rata, 2) ?> / 5
                                        <?php else : ?>
                                            -
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <i class="fas fa-star fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #dc3545, #bb2d3b);">
                        <div class="card-body text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-white-50 small">Total UPK</div>
                                    <div class="fs-3 fw-bold"><?= count($pengaduan_per_upk) ?></div>
                                </div>
                                <i class="fas fa-building fa-2x opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Baris 1 -->
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

            <!-- Grafik Baris 2 -->
            <div class="row mb-4">
                <div class="col-xl-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-chart-bar me-1"></i> Pengaduan Per UPK
                        </div>
                        <div class="card-body">
                            <canvas id="chartUpk" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-star me-1"></i> IKP Per Kategori
                        </div>
                        <div class="card-body">
                            <canvas id="chartIKP" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rekap Detail Per UPK -->
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
                                        // Group rekap by UPK
                                        $rekap_grouped = [];
                                        foreach ($rekap_detail_upk as $row) {
                                            $rekap_grouped[$row->wil_layanan][$row->jenis_aduan] = $row->total;
                                        }
                                        $jenis_list = ['Air Mati', 'Air Keruh', 'Kebocoran', 'Water Meter', 'Pemakaian', 'Lain-lain'];
                                        $no = 1;
                                        $grand_total = 0;
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

            <!-- IKP Per Wilayah & Pengaduan Terbaru -->
            <div class="row mb-4">
                <div class="col-xl-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white fw-bold">
                            <i class="fas fa-map-marker-alt me-1"></i> IKP Per Wilayah
                        </div>
                        <div class="card-body">
                            <?php if (!empty($ikp_wilayah)) : ?>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Wilayah</th>
                                                <th class="text-center">Rata-rata Skor</th>
                                                <th class="text-center">Responden</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ikp_wilayah as $row) : ?>
                                                <tr>
                                                    <td><?= $row->wilayah ?></td>
                                                    <td class="text-center">
                                                        <span class="badge <?php
                                                                            if ($row->rata_rata >= 4) echo 'bg-success';
                                                                            elseif ($row->rata_rata >= 3) echo 'bg-warning text-dark';
                                                                            else echo 'bg-danger';
                                                                            ?>"><?= number_format($row->rata_rata, 2) ?></span>
                                                    </td>
                                                    <td class="text-center"><?= $row->total ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row->rata_rata >= 4.5) echo '<span class="text-success fw-bold">Sangat Puas</span>';
                                                        elseif ($row->rata_rata >= 3.5) echo '<span class="text-success">Puas</span>';
                                                        elseif ($row->rata_rata >= 2.5) echo '<span class="text-warning">Cukup</span>';
                                                        elseif ($row->rata_rata >= 1.5) echo '<span class="text-danger">Kurang</span>';
                                                        else echo '<span class="text-danger fw-bold">Sangat Kurang</span>';
                                                        ?>
                                                    </td>
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
        document.addEventListener('DOMContentLoaded', function() {
            // DataTable (needs jQuery - init via setTimeout to wait for footer jQuery)
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
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    }
                }
            });

            // Chart Jenis Pengaduan (Pie)
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
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12
                            }
                        }
                    }
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
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        },
                        x: {
                            ticks: {
                                maxRotation: 45,
                                minRotation: 45
                            }
                        }
                    }
                }
            });

            // Chart IKP Per Kategori (Radar)
            new Chart(document.getElementById('chartIKP'), {
                type: 'radar',
                data: {
                    labels: <?= json_encode(array_column($ikp_kategori, 'kategori')) ?>,
                    datasets: [{
                        label: 'Rata-rata Skor',
                        data: <?= json_encode(array_map(function ($x) {
                                    return round($x->rata_rata, 2);
                                }, $ikp_kategori)) ?>,
                        backgroundColor: 'rgba(25,135,84,0.2)',
                        borderColor: '#198754',
                        borderWidth: 2,
                        pointBackgroundColor: '#198754'
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        r: {
                            beginAtZero: true,
                            max: 5,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>