<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4" style="font-size: 1.5rem;"><?= $title ?></h1>

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-form me-1"></i>
                    <?= isset($detail) ? 'Edit Data' : 'Tambah Data Baru' ?> - <?= $upk->nama_upk ?>
                </div>
                <div class="card-body">
                    <form action="<?= isset($detail) ? base_url('admin_kapasitas/updateDetail/' . $detail->id) : base_url('admin_kapasitas/simpanDetail') ?>" method="POST">
                        <input type="hidden" name="upk_id" value="<?= $upk->id ?>">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lokasi" class="form-label">Nama Lokasi <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= isset($detail) ? $detail->lokasi : set_value('lokasi') ?>" placeholder="Contoh: SB Bondowoso 1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lps" class="form-label">Kapasitas (LPS) <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" class="form-control" id="lps" name="lps" value="<?= isset($detail) ? $detail->lps : set_value('lps') ?>" placeholder="Contoh: 5.63" required>
                                    <small class="text-muted">Liter per detik</small>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> <?= isset($detail) ? 'Update Data' : 'Simpan Data' ?>
                            </button>
                            <a href="<?= base_url('admin_kapasitas/detail/' . $upk->id) ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
