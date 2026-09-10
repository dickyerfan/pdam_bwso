<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                <h4 class="mb-0"><i class="fas fa-clipboard-list me-2"></i><?= strtoupper($title) ?></h4>
                <div>
                    <a href="<?= base_url('kuisioner/rekap') ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf me-1"></i> Cetak Rekap PDF</a>
                </div>
            </div>

            <!-- Filter Periode -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body py-3">
                    <form id="filterForm" method="GET" action="<?= base_url('dashboard_baru/kuisioner_list') ?>" class="row align-items-end g-2">
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
                            <a href="<?= base_url('dashboard_baru/kuisioner_list') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-redo me-1"></i> Reset</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Ringkasan IKM -->
            <?php if ($ikm) : ?>
            <div class="row mb-4">
                <div class="col-xl-4 col-md-6 mb-3">
                    <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #0d6efd, #0b5ed7);">
                        <div class="card-body text-white d-flex flex-column justify-content-center" style="min-height:100px;">
                            <div class="text-white-50 small">Total Responden</div>
                            <div class="fs-3 fw-bold"><?= $ikm['total_responden'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-3">
                    <?php
                    $ikm_nilai = $ikm['nilai_ikm'];
                    $ikm_mutu = $ikm['mutu'];
                    if ($ikm_mutu == 'A') $card_bg = 'linear-gradient(135deg, #198754, #157347)';
                    elseif ($ikm_mutu == 'B') $card_bg = 'linear-gradient(135deg, #0dcaf0, #0aa2c8)';
                    elseif ($ikm_mutu == 'C') $card_bg = 'linear-gradient(135deg, #ffc107, #fd7e14)';
                    else $card_bg = 'linear-gradient(135deg, #dc3545, #bb2d3b)';
                    ?>
                    <div class="card border-0 shadow-sm h-100" style="background: <?= $card_bg ?>;">
                        <div class="card-body text-white d-flex flex-column justify-content-center" style="min-height:100px;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="text-white-50 small">IKM (Skala 100)</div>
                                    <div class="fs-3 fw-bold"><?= number_format($ikm_nilai, 2) ?></div>
                                </div>
                                <div class="text-center">
                                    <div class="fs-2 fw-bold"><?= $ikm_mutu ?></div>
                                    <div class="small"><?= $ikm['keterangan'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 mb-3">
                    <div class="card border-0 shadow-sm h-100 bg-light">
                        <div class="card-body d-flex flex-column justify-content-center" style="min-height:100px;">
                            <div class="small text-muted">Rumus PermenPANRB No. 14/2017</div>
                            <div class="small">Bobot per Kategori: <strong><?= number_format($ikm['bobot'], 2) ?></strong></div>
                            <div class="small">Skor Rata-rata Tertimbang: <strong><?= number_format($ikm['skor_rata_rata'], 4) ?></strong></div>
                            <div class="small">Konversi: <strong><?= number_format($ikm['skor_rata_rata'], 4) ?> × 25 = <?= number_format($ikm_nilai, 2) ?></strong></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Tabel Responden -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">
                    <i class="fas fa-users me-1"></i> Semua Responden (<?= count($responden) ?> orang)
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover" id="tableResponden" width="100%">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>No Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Wilayah</th>
                                    <th class="text-center">Skor (1-4)</th>
                                    <th class="text-center">Konversi (x25)</th>
                                    <th class="text-center">Mutu</th>
                                    <th>Tanggal</th>
                                    <th width="80">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($responden)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($responden as $row) : ?>
                                        <?php
                                        $skor = floatval($row->rata_rata);
                                        $konversi = $skor * 25;
                                        if ($konversi >= 88.31) { $mutu = 'A'; $ket = 'Sangat Baik'; $badge = 'bg-success'; }
                                        elseif ($konversi >= 76.61) { $mutu = 'B'; $ket = 'Baik'; $badge = 'bg-info'; }
                                        elseif ($konversi >= 65.00) { $mutu = 'C'; $ket = 'Kurang Baik'; $badge = 'bg-warning text-dark'; }
                                        else { $mutu = 'D'; $ket = 'Tidak Baik'; $badge = 'bg-danger'; }
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center fw-bold"><?= $row->no_pel ?></td>
                                            <td><?= $row->nama_pelanggan ?></td>
                                            <td><span class="badge bg-secondary"><?= $row->wilayah ?></span></td>
                                            <td class="text-center"><?= number_format($skor, 2) ?></td>
                                            <td class="text-center"><span class="badge <?= $badge ?> fs-6"><?= number_format($konversi, 2) ?></span></td>
                                            <td class="text-center fw-bold"><?= $mutu ?> - <?= $ket ?></td>
                                            <td class="text-nowrap"><?= date('d/m/Y H:i', strtotime($row->tanggal)) ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('dashboard_baru/kuisioner_detail/' . $row->no_pel) ?>" class="btn btn-info btn-sm" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="9" class="text-center text-muted">Belum ada data kuisioner</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        function toggleFilter() {
            var mode = document.getElementById('modeSelect').value;
            var periodeFields = document.querySelectorAll('.periode-field');
            periodeFields.forEach(function(el) {
                el.style.display = (mode == 'periode') ? '' : 'none';
            });
        }

        $(document).ready(function() {
            $('#tableResponden').DataTable();
        });
    </script>
