<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4" style="font-size: 1.5rem;"><?= $title ?></h1>

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-form me-1"></i>
                    <?= isset($upk) ? 'Edit Data' : 'Tambah Data Baru' ?>
                </div>
                <div class="card-body">
                    <form action="<?= isset($upk) ? base_url('admin_upk/update/' . $upk->id) : base_url('admin_upk/simpan') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_upk" class="form-label">Nama UPK <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_upk" name="nama_upk" value="<?= isset($upk) ? $upk->nama_upk : set_value('nama_upk'); ?>" placeholder="Contoh: UPK Bondowoso" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_kepala" class="form-label">Nama Kepala UPK <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_kepala" name="nama_kepala" value="<?= isset($upk) ? $upk->nama_kepala : set_value('nama_kepala'); ?>" placeholder="Nama lengkap kepala UPK" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="no_wa" class="form-label">No WhatsApp <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="no_wa" name="no_wa" value="<?= isset($upk) ? $upk->no_wa : set_value('no_wa'); ?>" placeholder="Contoh: 6281234567890 (format internasional)" required>
                                    <small class="text-muted">Gunakan format: 628xxx (awalan 62 untuk Indonesia)</small>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> <?= isset($upk) ? 'Update Data' : 'Simpan Data' ?>
                            </button>
                            <a href="<?= base_url('admin_upk') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>