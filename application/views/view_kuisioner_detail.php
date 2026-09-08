<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <div class="d-flex justify-content-between align-items-center mt-3 mb-3">
                <h4 class="mb-0"><i class="fas fa-file-alt me-2"></i><?= strtoupper($title) ?></h4>
                <a href="<?= base_url('dashboard_baru/kuisioner_list') ?>" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>

            <?php if (!empty($detail)) : ?>

                <!-- Info Responden -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <small class="text-muted">No Pelanggan</small>
                                <div class="fw-bold fs-5"><?= $detail[0]->no_pel ?></div>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Nama Pelanggan</small>
                                <div class="fw-bold fs-5"><?= $detail[0]->nama_pelanggan ?></div>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Wilayah</small>
                                <div><span class="badge bg-primary fs-6"><?= $detail[0]->wilayah ?></span></div>
                            </div>
                            <div class="col-md-3">
                                <small class="text-muted">Tanggal Isi</small>
                                <div class="fw-bold"><?= date('d/m/Y H:i', strtotime($detail[0]->created_at)) ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Jawaban -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white fw-bold">
                        <i class="fas fa-list-check me-1"></i> Detail Jawaban
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="table-light text-center">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Kategori</th>
                                        <th>Pertanyaan</th>
                                        <th width="80" class="text-center">Skor</th>
                                        <th width="150">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($detail as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><span class="badge bg-info"><?= $row->kategori ?></span></td>
                                            <td><?= $row->pertanyaan ?></td>
                                            <td class="text-center fw-bold fs-5"><?= $row->nilai ?></td>
                                            <td>
                                                <?php
                                                if ($row->nilai == 5) echo '<span class="text-success fw-bold">Sangat Baik</span>';
                                                elseif ($row->nilai == 4) echo '<span class="text-success">Baik</span>';
                                                elseif ($row->nilai == 3) echo '<span class="text-secondary">Cukup</span>';
                                                elseif ($row->nilai == 2) echo '<span class="text-warning">Buruk</span>';
                                                else echo '<span class="text-danger fw-bold">Sangat Buruk</span>';
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <?php else : ?>
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5 text-muted">
                        <i class="fas fa-inbox fa-3x mb-3"></i>
                        <p>Data tidak ditemukan</p>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </main>