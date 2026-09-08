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
                    <?= isset($upk) ? 'Edit Data' : 'Tambah Data Baru' ?>
                </div>
                <div class="card-body">
                    <form action="<?= isset($upk) ? base_url('admin_kapasitas/updateUpk/' . $upk->id) : base_url('admin_kapasitas/simpanUpk') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nama_upk" class="form-label">Nama UPK <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_upk" name="nama_upk" value="<?= isset($upk) ? $upk->nama_upk : set_value('nama_upk') ?>" placeholder="Contoh: UPK Bondowoso" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="modal_id" class="form-label">Modal ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="modal_id" name="modal_id" value="<?= isset($upk) ? $upk->modal_id : set_value('modal_id') ?>" placeholder="Contoh: bwsMap" required>
                                    <small class="text-muted">ID unik untuk modal Bootstrap (huruf, angka, strip)</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="urutan" name="urutan" value="<?= isset($upk) ? $upk->urutan : set_value('urutan', '1') ?>" min="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> <?= isset($upk) ? 'Update Data' : 'Simpan Data' ?>
                            </button>
                            <a href="<?= base_url('admin_kapasitas') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
