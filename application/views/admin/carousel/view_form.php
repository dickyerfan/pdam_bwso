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
                    <?= isset($carousel) ? 'Edit Data' : 'Tambah Data Baru' ?>
                </div>
                <div class="card-body">
                    <form action="<?= isset($carousel) ? base_url('admin_carousel/update/' . $carousel->id) : base_url('admin_carousel/simpan') ?>" 
                          method="POST" 
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="judul" 
                                           name="judul" 
                                           value="<?= isset($carousel) ? $carousel->judul : set_value('judul') ?>"
                                           placeholder="Masukkan judul carousel" 
                                           required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tipe" class="form-label">Tipe <span class="text-danger">*</span></label>
                                    <select class="form-select" id="tipe" name="tipe" required>
                                        <option value="hero" <?= (isset($carousel) && $carousel->tipe == 'hero') ? 'selected' : '' ?>>Hero (Slider Utama)</option>
                                        <option value="modal" <?= (isset($carousel) && $carousel->tipe == 'modal') ? 'selected' : '' ?>>Modal (Popup)</option>
                                    </select>
                                    <small class="text-muted">Hero = slider di atas, Modal = popup saat buka halaman</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
                                    <input type="number" 
                                           class="form-control" 
                                           id="urutan" 
                                           name="urutan" 
                                           value="<?= isset($carousel) ? $carousel->urutan : set_value('urutan', '1') ?>"
                                           min="1" 
                                           required>
                                    <small class="text-muted">Urutan tampilan (1 = pertama)</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
                            <textarea class="form-control" 
                                      id="keterangan" 
                                      name="keterangan" 
                                      rows="3" 
                                      placeholder="Masukkan keterangan carousel"
                                      required><?= isset($carousel) ? $carousel->keterangan : set_value('keterangan') ?></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="link" class="form-label">Link URL (Opsional)</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="link" 
                                   name="link" 
                                   value="<?= isset($carousel) ? $carousel->link : set_value('link') ?>"
                                   placeholder="Contoh: ijenWater atau https://example.com">
                            <small class="text-muted">Kosongkan jika tidak ada link. Isi dengan URL tujuan jika gambar diklik (contoh: <code>ijenWater</code> untuk link internal).</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="gambar" class="form-label">Gambar Carousel <?= isset($carousel) ? '' : '<span class="text-danger">*</span>' ?></label>
                            <input type="file" 
                                   class="form-control" 
                                   id="gambar" 
                                   name="gambar" 
                                   accept="image/jpeg,image/png,image/webp"
                                   <?= isset($carousel) ? '' : 'required' ?>>
                            <small class="text-muted">Format: JPG, PNG, WebP. Maksimal 5MB.</small>
                        </div>

                        <?php if (isset($carousel)): ?>
                            <div class="form-group mb-3">
                                <label class="form-label">Gambar Saat Ini:</label>
                                <div>
                                    <img src="<?= base_url('assets/img/hero-carousel/' . $carousel->gambar) ?>" 
                                         alt="<?= $carousel->judul ?>" 
                                         style="max-width: 300px; height: auto; border-radius: 5px; border: 2px solid #dee2e6;">
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group mb-3" id="preview-container" style="display: none;">
                            <label class="form-label">Preview Gambar Baru:</label>
                            <div>
                                <img id="preview-image" 
                                     src="#" 
                                     alt="Preview" 
                                     style="max-width: 300px; height: auto; border-radius: 5px; border: 2px solid #dee2e6;">
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> <?= isset($carousel) ? 'Update Data' : 'Simpan Data' ?>
                            </button>
                            <a href="<?= base_url('admin_carousel') ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        $('#gambar').change(function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview-image').attr('src', e.target.result);
                    $('#preview-container').show();
                }
                reader.readAsDataURL(file);
            } else {
                $('#preview-container').hide();
            }
        });
    </script>
