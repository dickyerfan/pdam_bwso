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
                    <?= isset($tarif) ? 'Edit Data' : 'Tambah Data Baru' ?>
                </div>
                <div class="card-body">
                    <form action="<?= isset($tarif) ? base_url('admin_tangki/updateTarif/' . $tarif->id) : base_url('admin_tangki/simpanTarif') ?>" method="POST">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nama_tarif" class="form-label">Nama Tarif <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_tarif" name="nama_tarif" value="<?= isset($tarif) ? $tarif->nama_tarif : set_value('nama_tarif') ?>" placeholder="Contoh: Kegiatan Sosial" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="harga" name="harga" value="<?= isset($tarif) ? $tarif->harga : set_value('harga') ?>" placeholder="Contoh: Rp. 275.000" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="urutan" name="urutan" value="<?= isset($tarif) ? $tarif->urutan : set_value('urutan', '1') ?>" min="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= isset($tarif) ? 'Update' : 'Simpan' ?></button>
                            <a href="<?= base_url('admin_tangki') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
