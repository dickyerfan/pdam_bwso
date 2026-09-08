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
                    <?= isset($produk) ? 'Edit Data' : 'Tambah Data Baru' ?>
                </div>
                <div class="card-body">
                    <form action="<?= isset($produk) ? base_url('admin_produk/update/' . $produk->id) : base_url('admin_produk/simpan') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= isset($produk) ? $produk->nama_produk : set_value('nama_produk') ?>" placeholder="Contoh: Kemasan Gelas 220ml" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="harga" name="harga" value="<?= isset($produk) ? $produk->harga : set_value('harga') ?>" placeholder="Contoh: Rp. 15.000,-" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="modal_id" class="form-label">Modal ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="modal_id" name="modal_id" value="<?= isset($produk) ? $produk->modal_id : set_value('modal_id') ?>" placeholder="Contoh: gelas" required>
                                    <small class="text-muted">ID unik untuk modal Bootstrap (huruf, angka, tanpa spasi)</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="urutan" name="urutan" value="<?= isset($produk) ? $produk->urutan : set_value('urutan', '1') ?>" min="1" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="2" required><?= isset($produk) ? $produk->deskripsi : set_value('deskripsi') ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gambar" class="form-label">Gambar Produk</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp">
                                    <small class="text-muted">Format: JPG, PNG, WebP. Maks 5MB. Folder: assets/img/ijenWater/</small>
                                </div>
                            </div>
                            <?php if (isset($produk) && $produk->gambar) : ?>
                                <div class="col-md-6">
                                    <label class="form-label">Gambar Saat Ini:</label>
                                    <div>
                                        <img src="<?= base_url('assets/img/ijenWater/' . $produk->gambar) ?>" style="max-width: 150px; border-radius: 5px; border: 2px solid #dee2e6;">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= isset($produk) ? 'Update' : 'Simpan' ?></button>
                            <a href="<?= base_url('admin_produk') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
