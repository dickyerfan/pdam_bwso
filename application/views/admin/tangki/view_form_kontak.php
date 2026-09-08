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
                    <?= isset($kontak) ? 'Edit Data' : 'Tambah Data Baru' ?>
                </div>
                <div class="card-body">
                    <form action="<?= isset($kontak) ? base_url('admin_tangki/updateKontak/' . $kontak->id) : base_url('admin_tangki/simpanKontak') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($kontak) ? $kontak->nama : set_value('nama') ?>" placeholder="Contoh: Bpk. MADE" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="no_hp" class="form-label">No HP <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= isset($kontak) ? $kontak->no_hp : set_value('no_hp') ?>" placeholder="Contoh: 082316384231" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="urutan" name="urutan" value="<?= isset($kontak) ? $kontak->urutan : set_value('urutan', '1') ?>" min="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= isset($kontak) ? 'Update' : 'Simpan' ?></button>
                            <a href="<?= base_url('admin_tangki') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
