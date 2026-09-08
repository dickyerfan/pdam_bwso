<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                <h4 class="mb-0"><i class="fas fa-clipboard-list me-2"></i><?= strtoupper($title) ?></h4>
                <div>
                    <a href="<?= base_url('kuisioner/rekap') ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fas fa-file-pdf me-1"></i> Cetak Rekap PDF</a>
                    <!-- <a href="<?= base_url('dashboard_baru') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a> -->
                </div>
            </div>

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
                                    <th class="text-center">Rata-rata Skor</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th width="80">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($responden)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($responden as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center fw-bold"><?= $row->no_pel ?></td>
                                            <td><?= $row->nama_pelanggan ?></td>
                                            <td><span class="badge bg-secondary"><?= $row->wilayah ?></span></td>
                                            <td class="text-center">
                                                <span class="badge <?php
                                                                    if ($row->rata_rata >= 4) echo 'bg-success';
                                                                    elseif ($row->rata_rata >= 3) echo 'bg-warning text-dark';
                                                                    else echo 'bg-danger';
                                                                    ?> fs-6"><?= number_format($row->rata_rata, 2) ?></span>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row->rata_rata >= 4.5) echo '<span class="text-success fw-bold">Sangat Puas</span>';
                                                elseif ($row->rata_rata >= 3.5) echo '<span class="text-success">Puas</span>';
                                                elseif ($row->rata_rata >= 2.5) echo '<span class="text-warning">Cukup</span>';
                                                elseif ($row->rata_rata >= 1.5) echo '<span class="text-danger">Kurang</span>';
                                                else echo '<span class="text-danger fw-bold">Sangat Kurang</span>';
                                                ?>
                                            </td>
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
                                        <td colspan="8" class="text-center text-muted">Belum ada data kuisioner</td>
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
        $(document).ready(function() {
            $('#tableResponden').DataTable();
        });
    </script>